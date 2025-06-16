<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute Select
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */

use Contao\StringUtil;
use PCT\CustomElements\Core\Attribute as Attribute;

/**
 * Class file
 * Select
 */
class Select extends Attribute
{
	/**
	 * Tell the vault to store how to save the data (binary,blob)
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
		$arrOptions = array();
		$arrReference = array();

		$options = \Contao\StringUtil::deserialize($this->get('options'));
		if(is_array($options) && !empty($options))
		{
			foreach($options as $opt)
			{
				#$arrOptions[$opt['value']] = $opt['label'];
				$arrOptions[] = $opt['value'];
				$arrReference[$opt['value']] = $opt['label'];
				// add translation for current language
				$this->addTranslation($opt['value'],$opt['label'],$GLOBALS['TL_LANGUAGE']);
			}
		}
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> ($this->get('isRadio') ? 'radio' : 'select'),
			'eval'			=> array_merge($this->getEval(),array('chosen'=>true)),
			'options'		=> $arrOptions,
			'sql'			=> "varchar(64) NOT NULL default ''",
			'reference'		=> $arrReference,
		);
		
		if($this->get('eval_multiple'))
		{
			$arrReturn['sql'] = "blob NULL";	
		}
		
		return $arrReturn;
	}
	
	/**
	 * Render the attribute and return html
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$arrFieldDef = $this->getFieldDefinition();
	
		$varValue = \Contao\StringUtil::deserialize($varValue);
		
		if(!$objAttribute->get('eval_multiple') || !is_array($varValue))
		{
			$varValue = array_filter(array($varValue));
		}
		
		if(count($varValue) < 1)
		{
			return $objTemplate->parse();
		}
		
		foreach($varValue as $value)
		{
			if($this->hasTranslation($value))
			{
				$arrValues[] = $this->getTranslatedValue($value);
			}
			else
			{
				$arrValues[] = $arrFieldDef['options'][$value];
			}
		}
								
		// generate the attribute and place html in attribute template
		$objTemplate->value = implode(',',$arrValues);
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
		if($objAttribute->get('type') != 'select' || empty($varValue))
		{
			return $varValue;
		}
		
		$strReturn = $varValue;
		$arrOptions =  StringUtil::deserialize( $objAttribute->get('options') ) ?? array();
		foreach($arrOptions as $opt)
		{
			if( $opt['value'] == $varValue )
			{
				$strReturn = $opt['label']; #.'('.$varValue.')';
			}
		}
		
		return $strReturn;
	}

}