<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2018, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	Attribute Country
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Class file
 * Country
 */
class Country extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'				=> array( $this->get('title'),$this->get('description') ),
			'exclude'			=> true,
			'inputType'			=> ($this->get('isRadio') ? 'radio' : 'select'),
			'eval'				=> array_merge(array('chosen'=>true),$this->getEval()),
			'sql'				=> "char(2) NOT NULL default ''",
		);
		
		if($this->get('eval_multiple'))
		{
			$arrReturn['inputType'] = ($this->get('isRadio') ? 'checkboxWizard' : 'select');
			$arrReturn['sql'] = "text NULL";
		}
		
		// load countries
		$arrCountries = \Contao\System::getContainer()->get('contao.intl.countries')->getCountries();
		
		$arrReturn['options'] = $arrCountries;
		if($this->get('defaultValue'))
		{
			$varDefault = \Contao\StringUtil::deserialize( $this->get('defaultValue') );
			
			if(!is_array($varDefault))
			{
				$varDefault = array_filter( explode(',', $varDefault) );
			}
			
			if(count($varDefault) == 1)
			{
				$arrReturn['default'] = implode('',$varDefault);
			}
			else
			{
				$arrReturn['options'] = $varDefault;
			}
		}
		
		return $arrReturn;
	}

	
	/**
	 * Render the attribute and return html
	 * @return string
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		if( \is_array($varValue) === false )
		{
			$varValue = explode(',', $varValue);
		}
		// load countries
		$arrCountries = \Contao\System::getContainer()->get('contao.intl.countries')->getCountries();
		$arrReturn = array();
		foreach($varValue as $k)
		{
			$arrReturn[] = $arrCountries[$k];
		}
		$objTemplate->value = implode(', ', array_filter($arrReturn));
		
		return $objTemplate->parse();
	}

		
	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @param integer	Id of the Element ( >= CE 1.2.9)
	 * @param string	Name of the table ( >= CE 1.2.9)
	 * @return string
	 */
	public function processWildcardValue($varValue,$objAttribute)
	{
		if($objAttribute->get('type') != 'country')
		{
			return $varValue;
		}
		
		$objTemplate = new \Contao\BackendTemplate('be_customelement_attr_default');
		$objTemplate->setData($objAttribute->getData());
		
		return $this->renderCallback($objAttribute->get('alias'),$varValue,$objTemplate,$objAttribute);
	}
	
}