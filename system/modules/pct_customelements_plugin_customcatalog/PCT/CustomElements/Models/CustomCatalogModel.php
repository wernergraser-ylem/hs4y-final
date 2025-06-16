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
namespace PCT\CustomElements\Models;

/**
 * Class file
 * CustomCatalogModel
 */
class CustomCatalogModel extends \Contao\Model
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customcatalog';
	
	
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
	 * Find a custom catalog model by a table name
	 * @param string     The CC table name
	 * @param array		 Custom options array
	 * @return \PCT\CustomElements\Model\CustomCatalogModel or null		
	 */
	public static function findByTableName($strTable, $arrOptions=array())
	{
		return static::findOneBy('tableName', $strTable, $arrOptions);
	}


	/**
	 * Find multiple custom catalog models by a table name
	 * @param string     The CC table name
	 * @param array		 Custom options array
	 * @return array		
	 */
	public static function findMultipleByTableName($strTable, $arrOptions=array())
	{
		$arrReturn = array();
		$arrOptions['return'] = 'Collection';
		$tmp = static::findBy('tableName', $strTable, $arrOptions);
		if( $tmp !== null )
		{
			$arrReturn = array_merge($arrReturn,$tmp->getModels());
		}
		$tmp = static::findBy('existingTable', $strTable, $arrOptions);
		if( $tmp !== null )
		{
			$arrReturn = array_merge($arrReturn,$tmp->getModels());
		}
		unset($tmp);
		return $arrReturn;
	}
	
	
	/**
	 * Find all active custom catalogs and return as collection
	 * @param array
	 */
	public static function findAllActive($arrOptions=array())
	{
		if(!\Contao\Database::getInstance()->tableExists(static::$strTable))
		{
			return null;
		}
		$t = static::$strTable;
		$arrColumns = array("$t.active=1","$t.tstamp > 0");
		return static::findBy($arrColumns, array(), $arrOptions);
	}
}