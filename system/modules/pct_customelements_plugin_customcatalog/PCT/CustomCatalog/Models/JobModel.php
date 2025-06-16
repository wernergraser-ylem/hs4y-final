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
namespace PCT\CustomCatalog\Models;

/**
 * Class file
 * JobModel
 */
class JobModel extends \Contao\Model
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customcatalog_job';
	
	
	/**
	 * Find all API jobs by a API id
	 *
	 * @param integer $intPid     The API ID
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \Model\Collection|\JobModel[]|\JobModel|null A collection of models or null
	 */
	public static function findByPid($intPid, array $arrOptions=array())
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
	 * Find all published API jobs by a API id
	 * @inherit doc
	 */
	public static function findPublishedByPid($intPid, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.pid=?","$t.published=1");
		$arrValues = array($intPid);
		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "$t.sorting";
		}
		return static::findBy($arrColumns, $arrValues, $arrOptions);
	}

}