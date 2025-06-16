<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package  	pct_customelements
 * @link  		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core;

/**
 * Class file
 * Origin
 * A little helper object for each custom element carrying all important
 * information about the model created the custom element
 */
class Origin
{
	/**
	 * Table
	 * @var string
	 */
	protected static $strTable;
	
	/**
	 * Parent id
	 * @var integer
	 */
	protected static $intPid;
	
	/**
	 * Record of the parent element
	 * @var object
	 */
	protected static $objActiveRecord;
	
	/**
	 * Custom element name
	 * @var string
	 */
	protected static $strName;
	
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
	/**
	 * Custom element object
	 * @var object
	 */
	protected static $objCustomElement;
	
	
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance($arrData=array())
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static($arrData);
		}

		if(!empty($arrData))
		{
			foreach($arrData as $strKey => $varValue)
			{
				static::set($strKey,$varValue);
			}
		}

		return static::$objInstance;
	}
	
	
	/**
	 * Getters
	 * @param string
	 * @return mixed
	 */
	public static function get($strKey)
	{
		if(isset(static::$strKey))
		{
			return static::$strKey;
		}
		
		switch($strKey)
		{
			case 'table': 
			case 'strTable':
				return static::$strTable;
				break;
			case 'pid': 
			case 'intPid':
				return static::$intPid;
				break;
			case 'activeRecord': 
			case 'objActiveRecord':
				return static::$objActiveRecord;
				break;
			case 'customelement': 
			case 'objCustomElement':
				return static::$objCustomElement;
				break;
			default:
				return null;
				break;
		}
	}
	
	
	/**
	 * Setters
	 * @param string
	 * @param mixed
	 * @return mixed
	 */
	public static function set($strKey, $varValue)
	{
		if(isset(static::$strKey))
		{
			static::$strKey = $varValue;
		}
		
		switch($strKey)
		{
			case 'table': 
			case 'strTable':
				static::$strTable = $varValue;
				break;
			case 'pid': 
			case 'intPid':
				static::$intPid = $varValue;
				break;
			case 'activeRecord': 
			case 'objActiveRecord':
				static::$objActiveRecord = $varValue;
				break;
			case 'name':
			case 'strName':
				static::$strName = $varValue;
				break;
			case 'customelement':
			case 'objCustomElement':
				static::$strName = $varValue;
			default:
				return null;
				break;
		}
	}

	/**
	 * Set the origin table
	 * @param string
	 */
	public static function setTable($strTable)
	{
		static::set('strTable',$strTable);
	}
	
	/**
	 * Get the origin table
	 * @return string
	 */
	public static function getTable()
	{
		return static::$strTable;
	}
	
	/**
	 * Set the origin element id
	 * @param integer
	 */
	public static function setParent($intElement)
	{
		static::set('intPid',$intElement);
	}
	
	/**
	 * Set the elements record
	 * @param object
	 */
	public static function setActiveRecord($objDbResult)
	{
		static::set('objActiveRecord',$objDbResult);
	}
	
	/**
	 * Set the custom element
	 * @param object
	 */
	public static function setCustomElement($objCE)
	{
		static::set('objCustomElement',$objCE);
	}
	
	/**
	 * Set the custom element
	 * @param object
	 */
	public static function getCustomElement()
	{
		return static::get('objCustomElement');
	}
}