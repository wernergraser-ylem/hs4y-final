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
namespace PCT\CustomElements\Models;

/**
 * Class file
 * FilterModel
 * Provides various functions to communicate with filters
 */
class FilterModel extends \Contao\Model
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customelement_filter';


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
	 * Find all filters by a filterset ID (pid)
	 *
	 * @param integer    ID of the parent filterset
	 * @return \Model\Collection or null
	 */
	public static function findByPid($intPid, $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.pid=?");
		$arrValues = array($intPid);
		
		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "$t.sorting";
		}
		
		return static::findBy($arrColumns, $arrValues, $arrOptions);
	}
	
	
	/**
	 * Find all published filters by a filterset ID (pid)
	 *
	 * @param integer    ID of the parent filterset
	 * @return \Model\Collection or null
	 */
	public static function findPublishedByPid($intPid, $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.pid=?","$t.published=1");
		$arrValues = array($intPid);
		
		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "$t.sorting";
		}
		
		return static::findBy($arrColumns,$arrValues,$arrOptions);
	}
}