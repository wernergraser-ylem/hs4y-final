<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * Controller
 * Provide general methods to access any object or modify it
 */
#[\AllowDynamicProperties]
abstract class Controller extends \PCT\CustomElements\Plugins\CustomCatalog\Core\Controller
{
	/**
	 * The table name
	 * @var string
	 */
	protected $strTable = '';
	
	
	/**
	 * Get the table name
	 * @return string
	 */
	public function getTable()
	{
		return $this->strTable;
	}
	
	
	/**
	 * Set the table name
	 * @param string
	 */
	public function setTable($strKey)
	{
		$this->strTable = $strKey;
	}

		
	/**
	 * Get or setthe custom catalog instance
	 * @return object
	 */	
	public function getCustomCatalog($varCC=null)
	{
		$objOrigin = $this->getOrigin();
		if(!empty($varCC) && empty($objOrigin))
		{
			$this->setCustomCatalog($varCC);
		}
		
		return $this->getOrigin();
	}
	
	
	/**
	 * Return the module containing the filter
	 * @return object
	 */
	public function getModule()
	{
		$objCC = $this->getOrigin();
		if(!$objCC)
		{
			return null;
		}
		
		return $objCC->getOrigin();
	}
	
	
	/**
	 * Shortcut to setOrigin
	 * @param mixed		integer | string | object
	 */
	public function setCustomCatalog($varCC)
	{
		if(is_object($varCC))
		{
			$this->setOrigin($varCC);
		}
		else if(is_string($varCC) && !is_numeric($varCC))
		{
			$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findByTableName($varCC);
		}
		else
		{
			$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findById($varCC);
		}
		$this->setOrigin($objCC);
	}
}