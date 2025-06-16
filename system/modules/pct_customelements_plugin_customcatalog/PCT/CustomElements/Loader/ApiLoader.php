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
namespace PCT\CustomElements\Loader;

use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * ApiLoader
 * Load API config and autoload files 
 */
class ApiLoader
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
	 * Load an API class 
	 * @param string
	 */
	public static function load($strName)
	{
		$arrDef = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$strName];
		
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
				static::loadDcaFile($strTable,$strName);
			}
		}
	}
	
	
	/**
	 * Load all registered filters
	 */
	public static function loadAll()
	{
		if(empty($GLOBALS['PCT_CUSTOMCATALOG']['API']) || !is_array($GLOBALS['PCT_CUSTOMCATALOG']['API']))
		{
			return;
		}
		
		foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'] as $type => $arrDef)
		{
			static::load($type);
		}
	}
	
	
	/**
	 * Load a dca file
	 * @param string	Table name
	 */
	public static function loadDcaFile($strTable,$strName)
	{
		$arrDef = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$strName];
		
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
		if(empty($GLOBALS['PCT_CUSTOMCATALOG']['API']) || !is_array($GLOBALS['PCT_CUSTOMCATALOG']['API']))
		{
			return;
		}
		
		foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'] as $type => $arrDef)
		{
			static::loadDcaFile($strTable,$type);
		}
	}
	
	
	/**
	 * Load a language file
	 * @param string	Table nameTable name or file name
	 * @param string	API name
	 * @param string	Language
	 * @param boolean	Reload the file bypass php caching
	 */
	public static function loadLanguageFile($strName,$strApi,$strLanguage=null,$blnNoCache=false)
	{
		$arrDef = $GLOBALS['PCT_CUSTOMELEMENTS']['API'][$strApi];
		
		if($strLanguage === null)
		{
			$strLanguage = str_replace('-', '_', $GLOBALS['TL_LANGUAGE']);
		}
		
		// return if language file has been loaded already
		if($blnNoCache === false && static::$arrLanguageFiles[$strName.'_'.$strApi][$strLanguage] !== null)
		{
			return;
		}
		
		$file = Controller::rootDir().'/'.$arrDef['path'].'/languages/'.$strLanguage.'/'.$strName.'.php';
		if(file_exists($file))
		{
			$blnNoCache === true ? require($file) : require_once($file);
			
			// mark as loaded
			static::$arrLanguageFiles[$strName.'_'.$strApi][$strLanguage] = true;
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
		if(count($GLOBALS['PCT_CUSTOMELEMENTS']['API']) < 1)
		{
			return;
		}
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['API'] as $type => $arrDef)
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