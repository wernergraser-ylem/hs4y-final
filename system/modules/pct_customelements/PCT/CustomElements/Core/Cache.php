<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */
 
/**
 * Namespace
 */
namespace PCT\CustomElements\Core;

/**
 * Imports
 */
use PCT\CustomElements\Core\CustomElement as CustomElement;
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Core\Group as Group;

/**
 * Cache
 */
class Cache
{
	/**
	 * Initialize the global cache array
	 */
	public function __construct()
	{
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']))
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'] = array();
		}

		foreach(array('CUSTOMELEMENT','CONTENTELEMENTSET','PLUGINS','CUSTOMCATALOG','GROUP','ATTRIBUTE','ACTIVE_CUSTOMCATALOGS') as $k )
		{
			if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'][$k]) )
			{
				$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'][$k] = array();
			}
		}
	}
	
	
	/**
	 * Add any data
	 * @param string
	 * @param mixed
	 */
	public static function add($strKey,$varInput)
	{
		switch($strKey)
		{
			case 'customcatalog':
				static::addCustomCatalog($strKey,$varInput);
				break;
			case 'attribute':
				static::addAttribute($strKey,$varInput);
				break;
			default:
				$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'][$strKey] = $varInput;
				break;
		}
	}
	
	
	/**
	 * Return data by key
	 * @param string
	 * @param mixed
	 */
	public static function get($strKey)
	{
		if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'][$strKey]) )
		{
			return null;
		}
		
		if($GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'])
		{
			return null;
		}
		
		switch($strKey)
		{
			default:
				return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'][$strKey];
				break;
		}
		
		return null;
	}

	
	
	/**
	 * Set the whole cache by an array
	 * @param array
	 */
	public static function setData($arrData)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'] = $arrData;
	}
	
	
	/**
	 * Return the cached array data
	 * @return array
	 */
	public static function getData()
	{
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']))
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'] = array();
		}

		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE'];
	}
	
	
	/**
	 * Add an attribute object to the cache by its alias or ID or any other key
	 * @param object	CE/CC Attribute object
	 * @param mixed		String identifiyer
	 */
	public static function addAttribute($varKey,$objInput)
	{
		if($objInput === null)
		{
			return;
		}
		
		$objSet = null;
		
		// create a real object if a database result has been added
		if(strlen(strpos(get_class($objInput), 'Database')) > 0)
		{
			$objSet = new Attribute($objInput->row());
			$objSet = $objSet->generate();
			if(!$objSet)
			{
				return;
			}
			$objSet->db_result = $objInput;
		}
		else
		{
			$objSet = $objInput;
		}
		
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ATTRIBUTE'][$varKey] = $objSet;
	}
	
	
	/**
	 * Return an object by its identifiyer (e.g. alias or id or any other identifiyer used)
	 * @param mixed
	 * @return object 	CE/CC Attribute object
	 */
	public static function getAttribute($varKey)
	{
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ATTRIBUTE'][$varKey]))
		{
			return null;
		}
		return clone($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ATTRIBUTE'][$varKey]);
	}
	
	
	/**
	 * Add an group object to the cache by its alias or ID or any other key
	 * @param object	CE/CC Group object
	 * @param mixed		String identifiyer
	 */
	public static function addGroup($varKey,$objInput)
	{
		$objSet = null;
		
		// create a real object if a database result has been added
		if(strlen(strpos(get_class($objInput), 'Database')) > 0)
		{
			$objSet = new Group($objInput->row());
			$objSet = $objSet->generate();
			if(!$objSet)
			{
				return;
			}
			$objSet->db_result = $objInput;
		}
		else
		{
			$objSet = $objInput;
		}
		
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['GROUP'][$varKey] = $objSet;
	}
	
	
	/**
	 * Return an object by its identifiyer (e.g. alias or id or any other identifiyer used)
	 * @param mixed
	 * @return object 	CE/CC Group object
	 */
	public static function getGroup($varKey)
	{
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['GROUP'][$varKey]) || empty($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['GROUP'][$varKey]) )
		{
			return null;
		}
		return clone($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['GROUP'][$varKey]);
	}
	
	
	/**
	 * Add an array of groups by an identifiyer
	 * @param array|object
	 * @return object 	array
	 */
	public static function addGroupsByPid($varKey,$arrInput)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['GROUPS'][$varKey] = $arrInput;
	}

		
	/**
	 * Return a groups array by its identifiyer
	 * @param mixed
	 * @return array
	 */
	public static function getGroupsByPid($varKey)
	{
		if(!$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['GROUPS'][$varKey])
		{
			return array();
		}
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['GROUPS'][$varKey];
	}
	
	
	/**
	 * Add a customelement object to the cache
	 * @param string
	 * @param object	CustomElement instance
	 */
	public static function addCustomElement($varKey,$objInput)
	{
		$objSet = null;
		
		// create a real object if a database result has been added
		if(strlen(strpos(get_class($objInput), 'Database')) > 0)
		{
			$objSet = new CustomElement($objInput->row());
			if(!$objSet)
			{
				return;
			}
			$objSet->db_result = $objInput;
		}
		else
		{
			$objSet = $objInput;
		}
		
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMELEMENT'][$varKey] = $objSet;
	}
	
	
	/**
	 * Return a customcatalog object from the cache
	 * @param mixed
	 * @return object
	 */
	public static function getCustomElement($varKey)
	{
		if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMELEMENT'][$varKey]) )
		{
			return null;
		}
		return clone($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMELEMENT'][$varKey]);
	}
	
	
	/**
	 * Add an active plugin to the cache
	 * @param string
	 */
	public static function addPlugin($varKey)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['PLUGINS'][$varKey] = $varKey;
	}
	
	
	/**
	 * Return active plugins from the cache
	 * @param string
	 * @return array
	 */
	public static function getPlugins()
	{
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['PLUGINS']))
		{
			return null;
		}
		
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['PLUGINS'];
	}
	
	
	/**
	 * Add a stack of plugins as array
	 * @param array
	 */
	public static function addPlugins($arrData)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['PLUGINS'] = $arrData;
	}
	
	
	/**
	 * Add wizard data to cache
	 * @param integer
	 * @param string
	 * @param integer
	 * @param array||string
	 */
	public static function addWizard($intPid,$strSource,$intGenericAttribut=0,$arrData)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['WIZARD'][$strSource][$intPid][$intGenericAttribut] = $arrData;
	}
	
	
	/**
	 * Return active plugins from the cache
	 * @param string
	 */
	public static function getWizard($intPid,$strSource,$intGenericAttribute=0)
	{
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['WIZARD'][$strSource][$intPid][$intGenericAttribute]))
		{
			return array();
		}
		
		return \Contao\StringUtil::deserialize($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['WIZARD'][$strSource][$intPid][$intGenericAttribute]);
	}
	
	
	/**
	 * Add a content element set data array to the cache
	 * @param string	Key name of the set file
	 * @param array		Data array
	 */
	public static function addContentElementSet($strKey,$arrData)
	{
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET'][$strKey] = $arrData;
	}
	
	
	/**
	 * Add a content element set data array to the cache
	 * @return array
	 */
	public static function getContentElementSet($strKey)
	{
		if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET'][$strKey]))
		{
			return array();
		}
		
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET'][$strKey];
	}
	
	
	/**
	 * Add a whole stack of content element set data 
	 * @param array
	 */
	public static function addContentElementSets($arrInput)
	{
		if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET']) )
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET'] = null;
		}
		$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET'] = $arrInput;
	}
	
	
	/**
	 * Return all content element sets
	 * @return array||null
	 */
	public static function getContentElementSets()
	{
		if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET']) )
		{
			return null;
		}
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CONTENTELEMENTSET'];
	}
	
	
	/**
	 * @shortcut to getCustomElement
	 */
	public static function findCustomElementByAlias($strKey)
	{
		return static::getCustomElement($strKey);
	}
	
	
	/**
	 * @shortcut to getCustomElement
	 */
	public static function findCustomElementById($intKey)
	{
		return static::getCustomCatalog($intKey);
	}
	
	
	/**
	 * Return an customelement object by an attribute object
	 * @param object	Attribute
	 * @return object
	 */
	public static function findCustomElementByGroup($varGroup)
	{
		if(!$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMELEMENT']['_byGroup_'][$varGroup])
		{
			return null;
		}
		return $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['CUSTOMELEMENT']['_byGroup_'][$varGroup];
	}
}