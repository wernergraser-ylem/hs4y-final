<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	OptionWizard ListElement
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Class file
 * OptionWizard
 */
class OptionWizard extends \PCT\CustomElements\Core\Attribute
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
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'optionWizard',
			'eval'			=> array_unique(array_merge($this->getEval(),array('allowHtml'=>true))),
			'sql'			=> "blob NULL",
		);
		return $arrReturn;
	}
	
	
	/**
	 * Generate the output
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
		$varValue = \Contao\StringUtil::deserialize($varValue);
		
		if(!is_array($varValue))
		{
			$varValue = array_filter( explode(',', $varValue) );
		}
		
		$varValue = array_filter($varValue);
		
		if(empty($varValue))
		{
			$objTemplate->parse();
		}
		
		$arrOptions = array();
		foreach($varValue as $i => $option)
		{
			if(empty($option['value']) && empty($option['label']))
			{
				continue;
			}
			
			$arrClass = array('option');
			($i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd');
			($i == 0 ? $arrClass[] = 'first' : '');
			($i == count($varValue) - 1 ? $arrClass[] = 'last' : '');
			
			if($option['default'])
			{
				$arrClass[] = 'default';
			}
			
			$option['class'] = implode(' ',$arrClass);
			
			$arrOptions[$i] = $option; 
		}
		
		if(empty($arrOptions))
		{
			$objTemplate->value = null;
		}
		
		$objTemplate->options = $arrOptions;
		
		return $objTemplate->parse();
	}
}