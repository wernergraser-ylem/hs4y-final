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
namespace Contao;

/**
 * Class file
 * ContaoModel
 * 
 * Usage:
 * $objEntry = \ContaoModel::getInstance('MY-CC-TABLE')->findById(ID-OF-THE-RECORD);
 */
class ContaoModel extends \Contao\Model 
{
	/**
	 * Create a new Instance 
	 */
	public function __construct($objResult=null,$blnRegister=false)
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
			static::$objInstance = new static();
		}
		
		if(strlen($strTable) > 0)
		{
			static::setTable($strTable);
		}
		
		return static::$objInstance;
	}
	
	
	/**
	 * Set the table name
	 * @param string
	 */
	public static function setTable($strTable)
	{
		static::$strTable = $strTable;
		
		// register
		if(!isset($GLOBALS['TL_MODELS'][$strTable]))
		{
			$GLOBALS['TL_MODELS'][$strTable] = '\Contao\ContaoModel';
		}
	}
	
	
	/**
	 * Return a Model by ID
	 * @param integer	ID of the record
	 * @param array		Options array
	 *
	 * @return \ContaoModel|null
	 */
	public static function findById($intId, array $arrOptions=array())
	{
		return static::findByPk($intId, $arrOptions);
	}
}