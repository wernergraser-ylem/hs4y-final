<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\ThemeDesigner;

/**
 * Class file
 * Model
 */
class Model extends \Contao\Model
{
	/**
	 * Table
	 * @var string
	 */
	protected static $strTable = 'tl_pct_themedesigner';
	
	
	/**
	 * Find the active themedesigner version
	 * @param array
	 * @return object
	 */
	public static function findActive($arrOptions=array())
	{
		return static::findBy(array(static::$strTable.'.active=?'),array(1),$arrOptions);
	}
	
	
	/**
	 * Find the active themedesigner version by a theme name
	 * @param string
	 * @return object
	 */
	public static function findActiveByTheme($strValue,$arrOptions=array())
	{
		return static::findBy(array(static::$strTable.'.active=?',static::$strTable.'.theme=?'),array(1,$strValue),$arrOptions);
	}

	
	
	/**
	 * Find all themedesigner records by a theme
	 * @param string
	 * @param array
	 * @return object
	 */
	public static function findByTheme($strValue,$arrOptions=array())
	{
		return static::findBy(array(static::$strTable.'.theme=?'),array($strValue),$arrOptions);
	}
}