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
namespace PCT\CustomCatalog\API;

/**
 * Class file
 * Hooks
 */
class Hooks extends \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks
{
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 */
	public static function getInstance()
	{
		return new static();
	}
	
	
	/**
	 * Call the dataOutput HOOK
	 * Triggered right before sending the data to the output departments
	 * @param array		The current database set array
	 * @param string	The table name
	 * @param object	The API processed
	 * @return array
	 * Triggered in: PCT\CustomCatalog\API\Standard\Import
	 */
	protected function dataOutputHook($arrSet,$strTable,$objApi)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['dataOutput']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['dataOutput']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['dataOutput'] as $callback)
			{
				$arrSet = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrSet,$strTable,$objApi);
			}
		}
		
		return $arrSet;
	}
	
	
	/**
	 * Call the apiComplete HOOK
	 * Triggered when an api sends done() 
	 * @param object	The API processed
	 * @return array
	 * Triggered in: PCT\CustomCatalog\API\Base
	 */
	protected function apiCompleteHook($objApi)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['apiComplete']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['apiComplete']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['apiComplete'] as $callback)
			{
				\Contao\System::importStatic($callback[0])->{$callback[1]}($objApi);
			}
		}
	}


	/**
	 * Call the getRecords HOOK
	 * Triggered right before executing the database statement for fetching the records for the API process
	 * @param object	The current database object
	 * @param object	The API processed
	 * @return object
	 * Triggered in: PCT\CustomCatalog\API\Base
	 */
	protected function getRecordsHook($objStatement, $objApi)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['getRecords']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['getRecords']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['getRecords'] as $callback)
			{
				$objStatement = \Contao\System::importStatic($callback[0])->{$callback[1]}($objStatement, $objApi);
			}
		}
		return $objStatement;
	}


	/**
	 * Call the getSourceData HOOK
	 * Triggered right before executing the database statement for fetching the records for the API process
	 * @param object	The current database object
	 * @param array		The current source data array
	 * @return array
	 * Triggered in: PCT\CustomCatalog\API\Base
	 */
	protected function getSourceDataHook($objApi, $arrReturn)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['getSourceData']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['getSourceData']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['getSourceData'] as $callback)
			{
				$arrReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($objApi, $arrReturn);
			}
		}
		return $arrReturn;
	}
	
}