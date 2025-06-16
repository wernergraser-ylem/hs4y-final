<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	Attribute Table
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
 * Table
 */
class Table extends Attribute
{
	/**
	 * Save data as
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
			'inputType'		=> 'tableWizard',
			'eval'			=> array_unique(array_merge($this->getEval(),array('allowHtml'=>true,'doNotSaveEmpty'=>true, 'style'=>'width:142px;height:66px'))),
			'xlabel' => array
			(
				array('tl_content', 'tableImportWizard')
			),
			'sql'			=> "mediumblob NULL"
		);
		
		return $arrReturn;
	}

	
	/**
	 * Render the attribute in the frontend
	 * @param string
	 * @param string		Unix timestamp
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @return string
	 * called renderCallback method
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		if(empty($varValue))
		{
			return '';
		}
		
		$objOrig = $this->getActiveRecord();
		$objActiveRecord = new \Contao\ContentModel();
		$objActiveRecord->mergeRow( $objOrig->row() );
		$objActiveRecord->__set('strPk',$objActiveRecord->id);
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

		$objMyAttribute = new \Contao\ContentTable($objActiveRecord);
		$objMyAttribute->tableitems = $varValue;
		
		// table head
		$options = \Contao\StringUtil::deserialize($objAttribute->get('options'));
		if(is_array($options))
		{
			if(in_array('thead', $options))
			{
				$objMyAttribute->thead = 1;
			}
			if(in_array('tfoot', $options))
			{
				$objMyAttribute->tfoot = 1;
			}
			if(in_array('tleft', $options))
			{
				$objMyAttribute->tleft = 1;
			}
		}
		
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
	
	
	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @return string
	 */
	public function processWildcardValue($varValue,$objAttribute)
	{
		if($objAttribute->get('type') != 'table' || empty($varValue))
		{
			return $varValue;
		}
		$objRow = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE id=?")
						->limit(1)
						->execute($objAttribute->get('id'));
		$objMyAttribute = new \Contao\ContentTable($objRow);
		$objMyAttribute->tableitems = \Contao\StringUtil::deserialize($varValue);
		
		return $objMyAttribute->generate();
	}
}