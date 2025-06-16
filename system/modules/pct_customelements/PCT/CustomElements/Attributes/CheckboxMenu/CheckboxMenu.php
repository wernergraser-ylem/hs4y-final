<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute CheckboxMenu
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

/**
 * Class file
 * CheckboxMenu
 */
class CheckboxMenu extends Attribute
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
			'inputType'		=> 'checkbox',
			'eval'			=> array_merge($this->getEval(),array('chosen'=>0,'multiple'=>true)),
			'options'		=> $arrOptions,
			'sql'			=> "blob NULL",
			'reference'		=> $arrReference,
		);
		
		return $arrReturn;
	}

	/**
	 * Render the attribute and return html
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$varValue = \Contao\StringUtil::deserialize($varValue,true);
		
		$arrFieldDef = $this->getFieldDefinition();
		
		$strValue = '';
		
		if(!empty($varValue))
		{
			$arr = array();
			// render the labels
			foreach($varValue as $value)
			{
				if($this->hasTranslation($value))
				{
					$strValue = $this->getTranslatedValue($value);
				}
				else
				{
					$strValue = $arrFieldDef['options'][$value];
				}
				$arr[] = $strValue;
			}
			$strValue = implode(',', $arr);
		}
		
		$objTemplate->value = $strValue;
		
		return $objTemplate->parse();
	}
}