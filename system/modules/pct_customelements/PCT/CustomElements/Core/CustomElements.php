<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
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

/**
 * Class file
 * CustomElements
 * Provide various functions to retrieve information about the module and its attributes
 */
class CustomElements
{
	/**
	 * Default tables
	 * @var array
	 */
	protected $arrDefaultTables = array('tl_content','tl_module');
	
	/**
	 * Default restricted tables
	 * @var array
	 */
	protected $arrRestrictedTables = array('repository_manager');
	
	
	/**
	 * Default restricted urls
	 * @var array
	 */
	protected $arrRestrictedUrls = array('contao/install.php');
		
	/**
	 * Flag to bypass the permission check
	 * @var boolean
	 */
	protected $bolBypassPermission = false;
	
	/**
	 * Dynamic table
	 * @var string
	 */
	protected $arrDynamicTables = array();

	
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
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
	 * Return all custom elements as array
	 * @param string
	 * @return array
	 */
	public function getCustomElements($strTable='')
	{
		if(!in_array($strTable, static::getAllowedTables()))
		{
			return array();
		}
		
		$strWhere = '';
		if($strTable == 'tl_content') {$strWhere .= 'isCTE=1';}
		if($strTable == 'tl_module') {$strWhere .= 'isFMD=1';}
		
		$objResult = \Contao\Database::getInstance()->execute("SELECT * FROM tl_pct_customelement".($strWhere ? " WHERE ".$strWhere : "")." ORDER BY title");
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		return $objResult->fetchEach('alias');
	}
	
	
	/**
	 * Return the name of a custom element by its id
	 * @param string
	 * @param string
	 * @return string
	 */
	public function findTranslatedNameById($intId,$strTable='')
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT alias FROM tl_pct_customelement WHERE id=?")->execute($intId);
		if($objResult->numRows < 1)
		{
			return '';
		}
		
		return $this->findTranslatedNameByAlias($objResult->alias,$strTable);
	}
	
	
	/**
	 * Return the name of a custom element by its alias
	 * @param string
	 * @param string
	 * @return string
	 */
	public function findTranslatedNameByAlias($strAlias,$strTable='')
	{
		$strType = '';
		if($strTable == 'tl_content') {$strType = 'CTE';}
		if($strTable == 'tl_module') {$strType = 'MOD';}
		
		if(isset($GLOBALS['TL_LANG'][$strType][$strAlias]))
		{
			return $GLOBALS['TL_LANG'][$strType][$strAlias];
		}
		
		$objResult = \Contao\Database::getInstance()->prepare("SELECT title FROM tl_pct_customelement WHERE alias=?")->execute($strAlias);
		if($objResult->numRows < 1)
		{
			return '';
		}
		
		return array($objResult->title,$strAlias);
	}
	
	
	/**
	 * Get the default tables that are allowed to access
	 * @return array
	 */
	public function getDefaultAllowedTables()
	{
		return $this->arrDefaultTables;
	}
	
	
	/**
	 * Set the default tables
	 */
	public function setDefaultAllowedTables($arrTables)
	{
		$this->arrDefaultTables = $arrTables;
	}
	
	
	/**
	 * Return the tables allowed by default
	 * @return array
	 */
	public function getAllowedTables()
	{
		$arrDefaultTables = $this->getDefaultAllowedTables();
		return $arrDefaultTables;
	}
	
	
	/**
	 * Return the restricted tables as array
	 * @return array
	 */
	public function getRestrictedTables()
	{
		return $this->arrRestrictedTables;
	}
	
	
	/**
	 * Return the restricted tables as array
	 * @return array
	 */
	public function getRestrictedUrls()
	{
		return $this->arrRestrictedUrls;
	}
	
	
	/**
	 * Static function to check if the current table is allowed to be accessed
	 * @param string
	 * @return boolean
	 */
	public static function hasAccessToTable($strTable='')
	{
		if( Controller::isFrontend() || static::getInstance()->bolBypassPermission)
		{
			return true;
		}
		
		#fix 12: return false when importing themes to avoid CE initialization and backend user import
		if(\Contao\Input::get('key') == 'importTheme')
		{
			return false;
		}
		
		if(!isset($strTable) || strlen($strTable) < 1)
		{
			$strTable = \Contao\Input::get('table');
		}
		
		if(!isset($strTable) || strlen($strTable) < 1)
		{
			return false;
		}
		
		$arrRestricted = array_unique(array_merge(static::getInstance()->getRestrictedTables(),static::getInstance()->getRestrictedUrls()));
		if(in_array($strTable, $arrRestricted) || in_array(\Contao\Input::get('do'), $arrRestricted) || in_array(\Contao\Environment::get('request'), $arrRestricted))
		{
			return false;
		}
		
		if(in_array($strTable, static::getInstance()->getAllowedTables()) )
		{
			return true;
		}
		
		return false;
	}
	
	
	/**
	 * Gain access to a restricted table e.g. when a custom element widget is created
	 * @param array or string
	 * @array
	 */
	public static function gainAccessToTable($varTable)
	{
		if(!is_array($varTable))
		{
			$varTable = array($varTable);
		}
		
		if(empty($varTable))
		{
			return;
		}
		
		$arrReturn = static::getInstance()->getRestrictedTables();
		foreach($varTable as $v)
		{
			unset($arrReturn[$v]); 
		}
		
		if(empty($arrReturn))
		{
			static::getInstance()->arrRestrictedTables = array();
		}
		
		$defaults = array_unique(array_merge($varTable,static::getInstance()->arrDefaultTables));
		static::getInstance()->arrDefaultTables = $defaults;
		
		static::getInstance()->arrRestrictedTables = $arrReturn;
	}
	
	
	/**
	 * Return the selection field for the current table
	 * @return string
	 */
	public static function getSelectionField($strTable)
	{
		$arrDefaultTables = static::getInstance()->getDefaultAllowedTables();
		
		$strReturn = '';

		// if the current table is one of the default tables, the default selection field is the 'type' column
		if( in_array($strTable, array('tl_content','tl_module')) )
		{
			$strReturn = 'type';
		}
		
		return $strReturn;
	}
	
	
	/**
	 * Gain access to a custom element by bypassing the permission check 
	 */
	public function bypassPermission()
	{
		$this->bolBypassPermission = true;
	}

	/**
	 * Return all registered attributes as array
	 * @return array
	 */
	public function getAttributes()
	{
		return $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'];
	}
	
	/**
	 * Return an attribute definition as array
	 * @param string
	 * @return array
	 */
	public function getAttribute($strAttribute)
	{
		return $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$strAttribute];
	}
	
	/**
	 * Return an array of all attributes with their translated name as value
	 * @return array
	 */
	public function getAttributeNames()
	{
		if(empty($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']))
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'] as $type => $class)
		{
			\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('attributes',$type);
			$arrReturn[$type] = $GLOBALS['TL_LANG']['PCT_ATTRIBUTES'][$type][0] ?? $type;
		}
		
		return $arrReturn;
	}
		
}