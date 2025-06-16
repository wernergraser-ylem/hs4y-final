<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
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
 * CustomElementModel
 */
class CustomElementModel extends \Contao\Model 
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_pct_customelement';
	
	
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
	 * Find a custom element model by an alias
	 * @param string     The custom element alias
	 * @param array		 Custom options array
	 * @return \PCT\CustomElements\Model\CustomElementModel or null		
	 */
	public static function findByAlias($strAlias, $arrOptions=array())
	{
		return static::findOneBy('alias', array($strAlias), $arrOptions);
	}
	
	
	/**
	 * Find a custom element model by a custom sql string
	 * @param string
	 * @param array		Wildcard values array
	 *
	 * @return \PCT\CustomElements\Model\CustomElementModel or null	
	 */
	public static function findByCustomSql($strQuery, $arrValues, $arrOptions=array())
	{
		return static::findOneBy(array($strQuery), $arrValues, $arrOptions);
	}	
}