<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	Attribute Number
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
 * Number
 */
class Number extends Attribute
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
			'exclude'		=> true,
			'inputType'		=> 'text',
			'eval'			=> $arrEval,
			'sql'			=> "int(10) unsigned NOT NULL default '0'",
		);

		$sql_version = \Contao\Database::getInstance()->prepare('SELECT @@version AS version')->execute();
		if( \version_compare($sql_version->version,'8','>=') && \strpos( \strtolower($sql_version->version), 'mariadb') === false )
		{
			$arrReturn['sql'] = "int unsigned NOT NULL default '0'";
		}
		
		// validate the input before saving
		$arrReturn['save_callback'] = array
		(
			array(get_class($this),'checkMinAndMaxValue'),
		);
		
		return $arrReturn;
	}


	/**
	 * Check if input is valid
	 * @param integer
	 * @param object
	 * @return integer or exception
	 */
	public function checkMinAndMaxValue($varValue, $objDC)
	{
		$isCustomCatalog = false;
		
		// check the environment if we are in a customcatalog
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));

		if(is_array($GLOBALS['PCT_CUSTOMCATALOG']['active_modules']) && in_array('pct_customelements_plugin_customcatalog',$bundles) )
		{
			if(in_array(\Contao\Input::get('do'), $GLOBALS['PCT_CUSTOMCATALOG']['active_modules']) && !isset($objDC->objAttribute))
			{
				$objDC->objAttribute = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::findByCustomCatalog($objDC->field,$objDC->table);
				$isCustomCatalog = true;
			}
		}
		
		$min = $objDC->objAttribute->get('min_value');
		$max = $objDC->objAttribute->get('max_value');
		
		// load language file
		\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('default','number');
		
		if($varValue < $min && !empty($min))
		{
			$error = sprintf($GLOBALS['TL_LANG']['ATTRIBUTE']['NUMBER']['EXCP']['min_value'],$min);
			if($isCustomCatalog)
			{
				throw new \Exception($error);
			}
			return new \Exception(sprintf($GLOBALS['TL_LANG']['ATTRIBUTE']['NUMBER']['EXCP']['min_value'],$min));
		}
		else if($varValue > $max && !empty($max))
		{
			$error = sprintf($GLOBALS['TL_LANG']['ATTRIBUTE']['NUMBER']['EXCP']['max_value'],$max);
			if($isCustomCatalog)
			{
				throw new \Exception($error);
			}
			return new \Exception($error);
		}
		
		return $varValue;
	}

	
	/**
	 * Render the attribute and return html
	 * @return string
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		// format float numbers
		$arrFormat = \Contao\StringUtil::deserialize($this->get('number_format'));
		if(is_array($arrFormat) && strlen($arrFormat[0]) > 0)
		{
			$varValue = number_format($varValue,$arrFormat[0],$arrFormat[1],$arrFormat[2]);
		}
		$objTemplate->value = $varValue;
		
		return $objTemplate->parse();
	}

}