<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;

/**
 * Class File
 * CustomElementFactory
 */
class CustomElementFactory extends \PCT\CustomElements\Core\CustomElementFactory
{
	/**
	 * Find a custom element by a custom catalog table name
	 * @param string
	 * @return object
	 */
	public static function findByTableName($strTable, $arrOptions=array())
	{
		$objCC = CustomCatalogFactory::findByTableName($strTable, $arrOptions);
		if($objCC === null)
		{
			return null;
		}
		return static::findById($objCC->pid);
	}
}

