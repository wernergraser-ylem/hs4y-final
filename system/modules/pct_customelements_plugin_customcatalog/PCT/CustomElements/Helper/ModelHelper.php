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
namespace PCT\CustomElements\Helper;

/**
 * Class file
 * ModelHelper
 */
class ModelHelper extends \Contao\Model
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable;
	
	
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;


	/**
	 * Instantiate this class and return it (Factory)
	 * @param string
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance($strTable='')
	{
		if (!is_object(static::$objInstance))
		{
			$_self = new static(null,false);
			if(strlen($strTable) > 0)
			{
				$_self->setTable($strTable);
			}
			static::$objInstance = $_self;
			
		}
		return static::$objInstance;
	}

	
	
	/**
	 * Create a new Instance 
	 */
	public function __construct($objResult=null,$blnRegister=true)
	{
		if($objResult !== null && $blnRegister === false)
		{
			static::setRow($objResult->row());
		}
		
		if($blnRegister)
		{
			parent::__construct($objResult);
		}
	}
	
	
	/**
	 * Set a table
	 * @param string
	 */
	public static function setTable($strValue)
	{
		static::$strTable = $strValue;
	}
	
	
	/**
	 * Find a record by its id
	 * @param integer
	 */
	public static function findById($intId, $arrOptions=array())
	{
		return static::findByPk($intId, $arrOptions);
	}	
}