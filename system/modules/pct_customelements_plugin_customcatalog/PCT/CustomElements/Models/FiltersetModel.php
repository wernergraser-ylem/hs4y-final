<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Models;

/**
 * Class file
 * FiltersetModel
 */
class FiltersetModel extends \Contao\Model 
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customelement_filterset';
	
	
	/**
	 * Find a filterset by its ID
	 * @param integer
	 * @return \PCT\CustomElements\Models\FiltersetModel or null
	 */
	public static function findById($intId, array $arrOptions=array())
	{
		return static::findByPk($intId, $arrOptions);
	}
	
	
	/**
	 * Find a published filterset by its ID
	 * @param integer
	 * @return \PCT\CustomElements\Models\FiltersetModel or null
	 */
	public static function findPublishedById($intId, array $arrOptions=array())
	{
		$model = static::findByPk($intId, $arrOptions);
		if((boolean)$model->published !== true)
		{
			return null;
		}
		return $model;
	}
	
	
	/**
	 * Find published by set of ids
	 * @param array
	 * @return \Model\Collection or null
	 */
	public static function findMultiplePublishedByIds($arrIds, array $arrOptions=array())
	{
		if(count($arrIds) < 1)
		{
			return null;
		}
		
		$t = static::$strTable;
		$arrColumns = array("$t.id IN(".implode(',', $arrIds).")","$t.published=1");
		
		return static::findBy($arrColumns,array(),$arrOptions);
	}
	
	
	/**
	 * Find all filtersets by the table name of a custom catalog
	 * @param string	Table name
	 * @return \Model\Collection or null
	 */
	public static function findByTableName($strTable, array $arrOptions=array())
	{
		$objCC_Model = \PCT\CustomElements\Models\CustomCatalogModel::findByTableName($strTable);
		if($objCC_Model === null)
		{
			return null;
		}
		return static::findBy(array(static::$strTable.".pid=?"),array($objCC_Model->id),$arrOptions);
	}
}