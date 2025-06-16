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
 * Vault
 */
class VaultModel extends \Contao\Model 
{
	/**
	 * Table
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customelement_vault';
	
	
	/**
	 * Find a vault record by the pid and source
	 * @param integer $intId    The parent element id
	 * @param string $strSource	The source table name	
	 *
	 * @return \PCT\CustomElements\Models\VaultModel or null
	 */
	public static function findByPidAndSource($intPid,$strSource,$arrOptions=array())
	{
		$t = static::$strTable;
		return static::findBy(array($t.'.pid=?',$t.'.source=?'), array($intPid,$strSource), $arrOptions);
	}
}