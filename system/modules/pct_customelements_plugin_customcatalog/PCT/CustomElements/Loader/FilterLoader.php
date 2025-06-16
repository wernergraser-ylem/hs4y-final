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
namespace PCT\CustomElements\Loader;

use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * FilterLoader
 * Load Filter config and autoload files 
 */
class FilterLoader
{
	/**
	 * Base path
	 * @var string
	 */
	public static $strBase = '';
	
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
	/**
	 * Languages loaded
	 * @var array
	 */
	protected static $arrLanguageFiles = array();
	
	
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance()
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static();
		}
		return static::$objInstance;
	}
	
	
	/**
	 * Set the base path
	 * @param string
	 */
	public static function setBasePath($strPath)
	{
		static::$strBase = $strPath;
	}
	
	
	/**
	 * Load a filter class 
	 * @param string
	 */
	public static function load($strFilter)
	{
		$arrDef = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$strFilter];
		
		$f_config = Controller::rootDir().'/'.$arrDef['path'].'/config/config.php';
		if(file_exists($f_config) && !class_exists($arrDef['class'],false))
		{
			require_once($f_config);
		}
		
		// autoloader files
		$f_autoload = Controller::rootDir().'/'.$arrDef['path'].'/config/autoload.php';
		if(file_exists($f_autoload))
		{
			require_once($f_autoload);
		}
		
		// load dca files
		if(!empty($arrDef['tables']) > 0 && is_array($arrDef['tables']))
		{
			foreach($arrDef['tables'] as $strTable)
			{
				static::loadDcaFile($strTable,$strFilter);
			}
		}
	}
	
	
	/**
	 * Load all registered filters
	 */
	public static function loadAll()
	{
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'] as $type => $arrDef)
		{
			static::load($type);
		}
	}
	
	
	/**
	 * Load a dca file
	 * @param string	Table name
	 */
	public static function loadDcaFile($strTable,$strFilter)
	{
		$arrDef = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$strFilter];
		
		$file = Controller::rootDir().'/'.$arrDef['path'].'/dca/'.$strTable.'.php';
		if(file_exists($file))
		{
			require($file);
		}
	}
	
	
	/**
	 * Load all dca files for a table
	 * @param string	Table name
	 */
	public static function loadDcaFiles($strTable)
	{
		if(empty($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']) || !is_array($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']))
		{
			return;
		}
		
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'] as $type => $arrDef)
		{
			static::loadDcaFile($strTable,$type);
		}
	}
	
	
	/**
	 * Load a language file
	 * @param string	Table nameTable name or file name
	 * @param string	Filter name
	 * @param string	Language
	 * @param boolean	Reload the file bypass php caching
	 */
	public static function loadLanguageFile($strName,$strFilter,$strLanguage=null,$blnNoCache=false)
	{
		$arrDef = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$strFilter];
		
		if($strLanguage === null)
		{
			$strLanguage = str_replace('-', '_', $GLOBALS['TL_LANGUAGE']);
		}
		
		// return if language file has been loaded already
		if($blnNoCache === false && isset(static::$arrLanguageFiles[$strName.'_'.$strFilter][$strLanguage]) && static::$arrLanguageFiles[$strName.'_'.$strFilter][$strLanguage] !== null)
		{
			return;
		}
		
		$file = Controller::rootDir().'/'.$arrDef['path'].'/languages/'.$strLanguage.'/'.$strName.'.php';
		if(file_exists($file))
		{
			$blnNoCache === true ? require($file) : require_once($file);
			
			// mark as loaded
			static::$arrLanguageFiles[$strName.'_'.$strFilter][$strLanguage] = true;
		}
	}
	
	
	/**
	 * Load all language files for a table
	 * @param string	Table name or file name
	 * @param string	Language
	 * @param boolean	Reload the file bypass php caching
	 */
	public static function loadLanguageFiles($strName,$strLanguage=null,$blnNoCache=false)
	{
		if(empty($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']) || !is_array($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']))
		{
			return;
		}
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'] as $type => $arrDef)
		{
			static::loadLanguageFile($strName,$type,$strLanguage,$blnNoCache);
		}
	}
	
	
	/**
	 * Load plugins when the system has been initialized
	 */
	public function loadOnSystem()
	{
		static::getInstance()->loadAll();
	}
}