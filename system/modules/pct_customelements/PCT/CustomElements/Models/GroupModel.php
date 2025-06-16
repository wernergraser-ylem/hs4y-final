<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Models;

/**
 * Class file
 * GroupModel
 */
class GroupModel extends \Contao\Model 
{
	/**
	 * Table
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customelement_group';
	
	
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
	 * Find a published group by id
	 * @param integer $intId    The group id
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \PCT\CustomElements\Models\GroupModel or null
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
	 * Find all groups by pid
	 * @param integer $intId    The attribute id
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \Model\Collection or null
	 */
	public static function findByPid($intPid, array $arrOptions=array())
	{
		$t = static::$strTable;
		
		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "sorting";
		}
		
		return static::findBy(array("$t.pid=?"), array($intPid), $arrOptions);
	}
	

	/**
	 * Find all published groups by pid
	 * @param integer $intId    The attribute id
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \Model\Collection or null
	 */
	public static function findPublishedByPid($intPid, array $arrOptions=array())
	{
		$t = static::$strTable;
		
		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "sorting";
		}
		
		return static::findBy(array("$t.pid=?","$t.published=1"), array($intPid), $arrOptions);
	}
	
	
	/**
	 * Find a group by its alias and its pid
	 * @param integer $intId    The attribute id
	 * @param array   $arrOptions An optional options array
	 *
	 * @return \Model\Collection or null
	 */
	public static function findByAliasAndPid($strAlias, $intPid, array $arrOptions=array())
	{
		$t = static::$strTable;
		return static::findOneBy(array("$t.alias=?","$t.pid=?"), array($strAlias,$intPid), $arrOptions);
	}
}