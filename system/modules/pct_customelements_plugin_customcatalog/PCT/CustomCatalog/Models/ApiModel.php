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
 * Imports
 */
use PCT\CustomElements\Helper\QueryBuilder as QueryBuilder;

/**
 * Class file
 * ApiModel
 */
class ApiModel extends \Contao\Model
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customcatalog_api';
	
	
	/**
	 * Find all APIs by a customcatalog ID or TableName
	 *
	 * @param integer|string     The CC id or tablename
	 * @return \Model\Collection|\ApiModel[]|\ApiModel|null A collection of models or null
	 */
	public static function findByPidOrTable($varCC, array $arrOptions=array())
	{
		if(is_string($varCC) && !is_numeric($varCC))
		{
			$objCC = \Contao\CustomCatalog::findByTableName($varCC);
			if(!$objCC)
			{
				return null;
			}
			$varCC = $objCC->id;
		} 
		
		$t = static::$strTable;
		$arrColumns = array("$t.pid=?");

		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "$t.sorting";
		}
		
		return static::findBy($arrColumns, array($varCC), $arrOptions);
	}
}