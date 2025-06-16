<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute ListElement
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
 * ListElement
 */
class ListElement extends Attribute
{
	/**
	 * Tell the vault how to save the data (binary,blob)
	 * Leave empty to varchar
	 * @var boolean
	 */
	protected $saveDataAs = 'blob';
	
		
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		if(!is_array($GLOBALS['TL_DCA']['tl_content']['config']))
		{
			ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
		}
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'listWizard',
			'eval'			=> array_unique(array_merge($this->getEval(),array('allowHtml'=>true))),
			'sql'			=> "blob NULL",
		);
		return $arrReturn;
	}
	
	
	/**
	 * Generate the list
	 * @param string
	 * @param string		
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @return string
	 * called renderCallback method
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$objOrig = $this->getActiveRecord();
		$objActiveRecord = new \Contao\ContentModel();
		$objActiveRecord->mergeRow( $objOrig->row() );
		$objActiveRecord->__set('strPk',$objActiveRecord->id);
		$objActiveRecord->customTpl = '';
		$objActiveRecord->start = '';
		$objActiveRecord->stop = '';
		$objActiveRecord->invisible = '';
		$objActiveRecord->autogrid = 0;
		$objActiveRecord->cssID = $objAttribute->get('cssID');
		$objActiveRecord->isCustomElement = true;
		$objActiveRecord->headline = '';

		// a non ce attribute template is coming in
		if( \property_exists($this,'isCustomTemplate') && $this->isCustomTemplate)
		{
			$objActiveRecord->customTpl = $objAttribute->get('template');
		}
		
		$objMyAttribute = new \Contao\ContentList($objActiveRecord);
		$objMyAttribute->listitems = $varValue;
		$objMyAttribute->listtype = $this->get('options');
				$objActiveRecord->headline = '';

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