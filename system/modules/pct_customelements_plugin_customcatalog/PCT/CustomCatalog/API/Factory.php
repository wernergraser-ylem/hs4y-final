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
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;

/**
 * Class file
 * Factory
 */
abstract class Factory 
{
	/**
	 * Generate an API object by its type
	 * @param object	Model, DatabaseResult object
	 * @return object 	API class instance
	 */
	public static function create($objModel)
	{
		// generate the API class
		$strClass = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$objModel->type]['class'] ?? '';
		if(strlen($strClass) < 1)
		{
			return null;
		}
		
		if(!class_exists($strClass))
		{
			\PCT\CustomElements\Loader\ApiLoader::load($objModel->type);
		}
		
		try
		{
			if(!class_exists($strClass))
			{
				throw new \Exception('Cannot load API class or class not found: '.$strClass);
			}
			
		}
		catch(\Exception $e)
		{
			throw new \Exception($e->getMessage());
		}
		
		$objReturn = new $strClass( $objModel->row() );
		
		return $objReturn;
	}
	
	
	/**
	 * Find an API instance by an ID
	 * @param id
	 */
	public static function findById($intId)
	{
		if(Cache::getApi($intId))
		{
			return Cache::getApi($intId);
		}
		
		$objModel = \PCT\CustomCatalog\Models\ApiModel::findByPk($intId);
		
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		
		// add to cache
		Cache::addApi($intId,$objReturn);
		
		return $objReturn;
	}
}