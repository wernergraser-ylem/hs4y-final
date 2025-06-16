<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Imports
 */
use PCT\CustomElements\Helper\QueryBuilder as QueryBuilder;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;
use PCT\CustomElements\Models\CustomCatalogModel as CustomCatalogModel;

/**
 * Class File
 * CustomCatalogFactory
 */
abstract class CustomCatalogFactory
{
	/**
	 * Create a CustomCatalog object instance by a model instance
	 * @param object	Model
	 */
	public static function create($objModel)
	{
		$objReturn = new \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog();
		$objReturn->setData($objModel->row());
		$objReturn->db_result = $objModel;
		$objReturn->setModel($objModel);
		return $objReturn;
	}
	
	
	/**
	 * Find an CustomCatalog instance by an ID
	 * @param id
	 */
	public static function findById($intId)
	{
		$objModel = CustomCatalogModel::findByPk($intId);
		if($objModel === null)
		{
			return null;
		}
		return static::create( $objModel );
	}
	
	
	/**
	 * Fetch a custom catalog config by its ID
	 * @param integer
	 * @param array
	 * @return object	Database Result
	 */
	public static function fetchById($intId, $arrOptions=array())
	{
		$objReturn = CustomCatalogModel::findByPk($intId,$arrOptions);
		if($objReturn !== null)
		{
			$objReturn->numRows = 1;
		}
		return $objReturn;
	}

	
	/**
	 * Return all table names from custom catalogs as array
	 * @param boolean
	 * @return array
	 */
	public static function getTables($blnIncludeManagedExisting=true)
	{
		$objCCs = static::findAllActive();
		if($objCCs === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCCs as $objCC)
		{
			// managable existing tables
			if($blnIncludeManagedExisting && $objCC->isManageable && $objCC->mode = 'existing')
			{
				$arrReturn[ $objCC->id ] = $objCC->existingTable;
				continue;
			}
			
			$arrReturn[ $objCC->id ] = $objCC->tableName;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all tables names from custom catalogs without the ones that manage existing tables
	 * @return array
	 */
	#public static function getManageableTables()
	#{
	#	$objResult = static::fetchAllActive();
	#	if($objResult === null)
	#	{
	#		return array();
	#	}
	#	
	#	$arrReturn = array();
	#	while($objResult->next())
	#	{
	#		if(!$objResult->isManageable && $objResult->mode == 'existing')
	#		{
	#			continue;
	#		}
	#		$arrReturn = array_merge($arrReturn,$objResult->fetchEach('tableName'));
	#	}
	#	
	#	return $arrReturn;
	#}

	
	/**
	 * Return all active custom catalogs as array
	 * @return array
	 */
	public static function findAllActive($arrOptions=array())
	{
		if(Cache::getActiveCustomCatalogs() !== null && empty($arrOptions))
		{
			return Cache::getActiveCustomCatalogs();
		}
		
		$objCollection = CustomCatalogModel::findAllActive($arrOptions);
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objCC = static::create( $objModel );
			if($objCC === null)
			{
				continue;
			}
			
			$arrReturn[] = $objCC;
			
			// add to cache
			Cache::addCustomCatalog($objCC->get('id'),$objCC);
			Cache::addCustomCatalog($objCC->getTable(),$objCC);
		}
		
		// add to cache
		Cache::addActiveCustomCatalogs($arrReturn);
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all active custom catalogs as database result object
	 * @return object
	 */
	public static function fetchAllActive($arrOptions=array())
	{
		return CustomCatalogModel::findAllActive($arrOptions);
	}
	
	
	/**
	 * Return all active custom catalogs as database result object
	 * @return object
	 */
	public static function fetchAll($arrOptions=array())
	{
		CustomCatalogModel::findAll($arrOptions);
	}
	
	
	/**
	 * Find a custom catalog instance by a table name
	 * @param string
	 * @param array
	 * @param boolean		Reset the object to the basic state. Looses all data added on the way
	 * @return object		CustomCatalog
	 */
	public static function findByTableName($strTable)
	{
		if(strlen($strTable) < 1)
		{
			return null;
		}
		
		if(Cache::getCustomCatalog($strTable) !== null)
		{
			return Cache::getCustomCatalog($strTable);
		}
		
		$objModel = CustomCatalogModel::findByTableName($strTable);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		if($objReturn === null)
		{
			return null;
		}
		
		// add to cache
		Cache::addCustomCatalog($objReturn->id, $objReturn);
		Cache::addCustomCatalog($strTable, $objReturn);

		return $objReturn;
	}
	
	
	/**
	 * Find a custom catalog model by a table name
	 * @inherit doc
	 */
	public static function fetchByTableName($strTable, $arrOptions=array())
	{
		return CustomCatalogModel::findByTableName($strTable,$arrOptions);
	}

	
	/**
	 * Find multiple custom catalog models by a table name and includes stand alone and existing tables
	 * @param string
	 * @return array
	 */
	public static function findMultipleByTableName($strTable)
	{
		$arrModels = CustomCatalogModel::findMultipleByTableName($strTable);
		if( empty($arrModels) === true )
		{
			return array();
		}

		$arrReturn = array();
		foreach($arrModels as $objModel)
		{
			$objCC = static::create( $objModel );
			if($objCC === null)
			{
				continue;
			}
			
			$arrReturn[] = $objCC;
			
			// add to cache
			Cache::addCustomCatalog($objCC->get('id'),$objCC);
		}

		return $arrReturn;
	}
	
	
	/**
	 * Find a custom catalog config by a table name
	 * @param object
	 * @param array
	 * @return object		CustomCatalog
	 */
	public static function findByModule($objModuleModel,$arrOptions=array())
	{
		$objReturn = null;

		// id
		if( \is_integer($objModuleModel->customcatalog) || \is_numeric($objModuleModel->customcatalog) )
		{
			$objReturn = static::findById($objModuleModel->customcatalog);
		}
		// fallback to table names
		else
		{
			$objReturn = static::findByTableName($objModuleModel->customcatalog);
		}

		if($objReturn === null)
		{
			return null;
		}
		$objReturn->setOrigin($objModuleModel);
		return $objReturn;
	}
	
	
	/**
	 * Find the current custom catalog config the user edits
	 */
	public static function findCurrent($strGetParam='')
	{
		$strAlias = \Contao\Input::get('do');
		
		if(strlen($strGetParam) > 0)
		{
			$strAlias = $strGetParam;
		}
		
		if(\Contao\Input::get('table') != '' && strlen($strGetParam) < 1)
		{
			if(static::validateByTableName(\Contao\Input::get('table')))
			{
				return static::findByTableName(\Contao\Input::get('table'));
			}
		}

		$arrBackendModule = $GLOBALS['PCT_CUSTOMCATALOG']['findByBackendModule'] ?? array();
		
		// check if the config has been processed
		if(is_array($GLOBALS['PCT_CUSTOMCATALOG']['configs']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['configs']))
		{
			foreach($GLOBALS['PCT_CUSTOMCATALOG']['configs'] as $arr)
			{
				if($arr['alias'] == $strAlias || (isset($arrBackendModule[$strAlias]) && $arr['table'] == $arrBackendModule[$strAlias]) )
				{
					return static::findById($arr['id']);
				}
			}
		}
		
		$objCC = static::fetchAllActive();
		
		if($objCC === null)
		{
			return null;
		}
		
		// count the number of configurations
		$arrCount = array();
		foreach($objCC as $objModel)
		{
			$arrCount[$objModel->pid][] = $objModel->id;
		}
		
		while($objCC->next())
		{
			$objCE = \PCT\CustomElements\Core\CustomElementFactory::findById($objCC->pid);
			if(!$objCE)
			{
				continue;
			}
			
			$alias = \PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::getBackendModuleAlias($objCC->id);
			if($strAlias == $alias)
			{
				$strTable = ($objCC->mode == 'new' ? $objCC->tableName : $objCC->existingTable);
				return static::findByTableName($strTable);
			}
		}
		
		return null;
	}
	
	
	/**
	 * Fetch the current custom catalog config the user edits
	 */
	public static function fetchCurrent($strGetParam='')
	{
		if(strlen(\Contao\Input::get('table')) > 0 && strlen($strGetParam) < 1)
		{
			$objReturn = static::findByTableName(\Contao\Input::get('table'));
			if($objReturn !== null)
			{
				$objReturn->numRows = 1;
			}
			return $objReturn;
		}
		else
		{
			$objReturn = static::findCurrent($strGetParam);
			return $objReturn;
		}
	}
	
	
	/**
	 * Fetch all custom catalogs that has a certain table as child table selected
	 * @param string
	 * @return array
	 */
	public static function fetchAllActiveParents($strChildTable)
	{
		$objParents = static::fetchAllActive();
		if($objParents->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objParents->next())
		{
			if(strlen($objParents->cTables) < 1) {continue;}
			$childs = \Contao\StringUtil::deserialize($objParents->cTables);
			
			if(in_array($strChildTable, $childs))
			{
				$arrReturn[] = $objParents->id;
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Validate a table by the table name as custom catalog table
	 * @param string
	 * @return boolean
	 */
	public static function validateByTableName($strTable)
	{
		if(strlen($strTable) < 1)
		{
			return false;
		}
		
		$arrTables = static::getTables() ?: array();
		if(in_array($strTable, $arrTables))
		{
			return true;
		}
				
		return false;
	}
	
	
	/**
	 * Validate a custom catalog table by the id
	 * @param string
	 * @return boolean
	 */
	public static function validateById($intId)
	{
		if($intId < 1 || static::findById($intId) === null)
		{
			return false;
		}
		return true;
	}
}

