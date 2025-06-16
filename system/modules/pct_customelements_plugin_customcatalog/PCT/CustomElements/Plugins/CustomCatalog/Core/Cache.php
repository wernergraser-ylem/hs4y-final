<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */
 
/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog as CustomCatalog;

/**
 * Cache
 */
class Cache extends \PCT\CustomElements\Core\Cache
{
	/**
	 * Initialize the global cache array
	 */
	public function __construct()
	{
		parent::__construct();

		foreach(array('FILTER','FILTES') as $k )
		{
			if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'][$k]) )
			{
				$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'][$k] = array();
			}
		}
	}
	
	
	/**
	 * Add an filter object to the cache by its ID or any other key
	 * @param string	String identifiyer
	 * @param object	CE/CC Filter object
	 */
	public static function addFilter($varKey,$objInput)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER'][$varKey] = $objInput;
	}
	
	
	/**
	 * Return an object by its identifiyer (e.g. alias or id or any other identifiyer used)
	 * @param string
	 * @return object 	CE/CC Filter object
	 */
	public static function getFilter($varKey)
	{
		if($GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'])
		{
			return null;
		}
		
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER'][$varKey]) || empty($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER'][$varKey]))
		{
			return null;
		}
		return clone($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER'][$varKey]);
	}
	
	
	/**
	 * Add a filter result array
	 * @param string	
	 * @param mixed		The query array or result array or null
	 */
	public static function addFilterResult($varKey,$varValue=null)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER'][$varKey] = $varValue;
	}
	
	
	/**
	 * Return a filter result array
	 * @param string	
	 * @return mixed		
	 */
	public static function getFilterResult($varKey)
	{
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER'][$varKey] ?? null;
	}
	
	
	
	/**
	 * Add a filter collection as array
	 * @param array
	 */
	public static function addFilterCollection($varKey,$arrInput)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTERS'][$varKey] = $arrInput;
	}
	
	
	/**
	 * Return a cached filter collection as array
	 * @param array
	 */
	public static function getFilterCollection($varKey)
	{
		if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTERS'][$varKey]) )
		{
			return null;
		}
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTERS'][$varKey];
	}
	
	
	
	
	/**
	 * Add a customcatalog object to the cache
	 * @param string
	 * @param object	CustomCatalog instance
	 */
	public static function addCustomCatalog($strTableName,$objInput)
	{
		$objSet = null;
		
		// create a real CC object if a database result has been added
		if(strlen(strpos(get_class($objInput), 'Database')) > 0)
		{
			$objSet = new CustomCatalog();
			$objSet->setData($objInput->row());
			$objSet->db_result = $objInput;
		}
		else
		{
			$objSet = $objInput;
		}
		
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMCATALOG'][$strTableName] = $objSet;
	}
	
	
	/**
	 * Return a customcatalog object from the cache
	 * @param mixed
	 * @return object
	 */
	public static function getCustomCatalog($varKey)
	{
		if($GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'])
		{
			return null;
		}
		
		if( isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMCATALOG'][$varKey]) )
		{
			return clone($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMCATALOG'][$varKey]);
		}
	}
	
	
	/**
	 * Add a stack of customcatalog objects to the cache
	 * @param array
	 */
	public static function addActiveCustomCatalogs(array $arrInput)
	{
		static::add('ACTIVE_CUSTOMCATALOGS',$arrInput);
	}
	
	
	/**
	 * Return customcatalog objects to the cache
	 * @return array|null
	 */
	public static function getActiveCustomCatalogs()
	{
		return static::get('ACTIVE_CUSTOMCATALOGS');
	}
	
	
	/**
	 * @shortcut to getCustomCatalog
	 */
	public static function findCustomCatalogByTableName($strTable)
	{
		return static::getCustomCatalog($strTable);
	}
	
	
	/**
	 * @shortcut to getCustomCatalog
	 */
	public static function findCustomCatalogById($intCC)
	{
		return static::getCustomCatalog($intCC);
	}
	
	
	/**
	 * Return a customelement object from the cache
	 * @param mixed
	 * @return object
	 */
	public static function getCustomElement($varKey)
	{
		if(!class_exists('PCT\CustomElements\Core\Cache') || !$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMELEMENT'])
		{
			return null;
		}
		return \PCT\CustomElements\Core\Cache::getCustomElement($varKey);
	}
	
	
	/**
	 * Add a customelement object to the cache
	 * @param mixed
	 * @return object
	 */
	public static function addCustomElement($varKey,$objInput)
	{
		if(!class_exists('PCT\CustomElements\Core\Cache') || !$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMELEMENT'])
		{
			return null;
		}
		return \PCT\CustomElements\Core\Cache::addCustomElement($varKey,$objInput);
	}
	
	
	/**
	 * Add language references by a table name
	 * @param string
	 */
	public static function addLanguageRecord($strTable)
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT DISTINCT * FROM tl_pct_customcatalog_language WHERE source=?")->execute($strTable);
		if($objResult->numRows < 1)
		{
			return;
		}
		
		while($objResult->next())
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['LANGUAGES'][$strTable][$objResult->id] = $objResult->row();
		}
	}
	
	
	/**
	 * Add database results
	 * @param integer
	 * @param object
	 */
	public static function addDatabaseResult($strMethod,$varKey,$varInput)
	{
		$arrCache = static::getData();
		$arrCache['DATABASE_RESULTS'][$strMethod][$varKey] = $varInput;
		static::setData($arrCache);
	}
	
	
	/**
	 * Get a cached database result
	 * @return object|null
	 */
	public static function getDatabaseResult($strMethod,$varKey)
	{
		$arrCache = static::getData();
		
		if(!isset($arrCache['DATABASE_RESULTS'][$strMethod][$varKey]))
		{
			return null;
		}
		
		$objReturn = $arrCache['DATABASE_RESULTS'][$strMethod][$varKey];
		$objReturn->reset();
		return $objReturn;
	}
	
//! -- APIs
	
	/**
	 * Add an api object
	 * @param integer|string
	 */
	public static function addApi($varKey,$objInput)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['API'][$varKey] = $objInput;
	}

	/**
	 * Return a cached api object
	 * @param integer|string
	 * @return object
	 */
	public static function getApi($varKey)
	{
		if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['API'][$varKey]) )
		{
			return null;
		}
		return clone($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['API'][$varKey]);
	}
	
	
	/**
	 * Add an data array
	 * @param integer|string
	 */
	public static function addApiAffectedData($varKey,$varInput)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['API_AFFECTED_DATA'][$varKey] = $varInput;
	}
	
	
	/**
	 * Return a cached data array
	 * @return array|null
	 */
	public static function getApiAffectedData($varKey)
	{
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['API_AFFECTED_DATA'][$varKey] ?? null;
	}
	
	
	/**
	 * Add a source data array
	 * @param integer|string
	 */
	public static function addApiSourceData($varKey,$varInput)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['API_SOURCE_DATA'][$varKey] = $varInput;
	}
	
	
	/**
	 * Return a cached source data array
	 * @return array|null
	 */
	public static function getApiSourceData($varKey)
	{
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['API_SOURCE_DATA'][$varKey] ?? null;
	}
}