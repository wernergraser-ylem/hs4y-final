<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute Url
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * Url
 */
class Url extends Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> false,
			'inputType'		=> 'text',
			'eval'			=> array_merge($arrEval,array('decodeEntities'=>true,'maxlength'=>255,'filesOnly'=>true,'fieldType'=>'radio')),
			'sql'			=> "varchar(255) NOT NULL default ''",
		);
		
		$options = \Contao\StringUtil::deserialize($this->get('options'));
		if(empty($options) || !is_array($options))
		{
			return $arrReturn;
		}
		
		// set field to w50 if there are option fields
		if( !empty($options) )
		{
			if( !isset($arrReturn['eval']['tl_class']) )
			{
				$arrReturn['eval']['tl_class'] = '';
			}
			
			$arrReturn['eval']['tl_class'] .= ' w50';
		}
		
		if(in_array('pagepicker',$options))
		{
			$arrReturn['eval']['rgxp'] = 'url';
			$arrReturn['eval']['decodeEntities'] = true;
			$arrReturn['eval']['dcaPicker'] = true;
			$arrReturn['eval']['tl_class'] .= ' wizard';
		}
		
		return $arrReturn;
	}
	
	/**
	 * Parse widget callback
	 * Generate the widgets and add them to the child list
	 * Optional, return the whole compiled widget as html string
	 * @param object	Widget
	 * @param string	Name of the field
	 * @param array		Field definition
	 * @param object	DataContainer
	 * @return string	HTML output of the widget
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC)
	{
		$objWidget->__set('autofocus','autofocus');
		
		// validate the input
		$objWidget->validate();

		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}
		
		$strBuffer = $objWidget->parse();
		
		// load data container and language file
		ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
		ControllerHelper::callstatic('loadLanguageFile',array('tl_content'));
		
		$options = \Contao\StringUtil::deserialize($this->get('options'));
		if(empty($options) || !is_array($options))
		{
			return $strBuffer;
		}
		
		// generate a checkbox field for the 'new window' option 
		if(in_array('target', $options))
		{
			$strName = $strField.'_target';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['target'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// generate a text field for the link text option 
		if(in_array('titleText', $options))
		{
			$strName = $strField.'_titleText';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['titleText'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// generate a text field for the link text option 
		if(in_array('linkText', $options))
		{
			$strName = $strField.'_linkText';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['linkTitle'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// generate a text field for the lb option 
		if(in_array('lightbox', $options))
		{
			$strName = $strField.'_lightbox';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['rel'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		return $strBuffer;
	}
	
	/**
	 * Render the attribute and return html
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$class = implode(' ', array($this->get('type')) ) ;
		
		$objOrig = $this->getActiveRecord();
		$objActiveRecord = new \Contao\ContentModel();
		$objActiveRecord->mergeRow( $objOrig->row() );
		$objActiveRecord->__set('strPk',$objActiveRecord->id);
		$objActiveRecord->customTpl = '';
		$objActiveRecord->autogrid = 0;
		$objActiveRecord->cssID = $objAttribute->get('cssID');
		$objActiveRecord->isCustomElement = true;
		$objActiveRecord->headline = '';
		$objActiveRecord->start = '';
		$objActiveRecord->stop = '';
		$objActiveRecord->invisible = '';

		// a non ce attribute template is coming in
		if( \property_exists($this,'isCustomTemplate') && $this->isCustomTemplate)
		{
			$objActiveRecord->customTpl = $objAttribute->get('template');
		}

		$arrOptionValues = $objAttribute->loadOptionValues($strField);
		
		$objMyAttribute = new \Contao\ContentHyperlink($objActiveRecord);
		$objMyAttribute->type = $objAttribute->get('type');
		$objMyAttribute->target = $arrOptionValues['target'] ?? '';
		$objMyAttribute->rel = $arrOptionValues['lightbox'] ?? '';
		$objMyAttribute->url = $varValue;
		$objMyAttribute->titleText = $arrOptionValues['titleText'] ?? '';
		$objMyAttribute->linkTitle = $arrOptionValues['linkText'] ?? '';
		
		$arrCssID = \Contao\StringUtil::deserialize($objAttribute->get('cssID'));
		$arrClass = array('attribute',$objAttribute->get('type'));
		if(strlen($arrCssID[1]) > 0)
		{
			$arrClass = array_unique(array_merge($arrClass,explode(' ',$arrCssID[1])));
		}
		$arrCssID[1] = implode(' ',$arrClass);
		$objMyAttribute->cssID = $arrCssID;
		$objMyAttribute->space = array();
		
		$objTemplate->value = $objMyAttribute->generate();
				
		// pass to template
		$objTemplate->activeRecord = $objActiveRecord;
		$objTemplate->element = $objMyAttribute;
	
		// bypass the CE attribute template when a Contao template is in use
		if( \property_exists($objAttribute,'isCustomTemplate') && $objAttribute->isCustomTemplate)
		{
			return $objTemplate->value;
		}
		
		return $objTemplate->parse();
	}

}