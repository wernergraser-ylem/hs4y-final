<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core;

/**
 * Imports
 */
use PCT\CustomElements\Core\Origin as Origin;
use PCT\CustomElements\Helper\QueryBuilder as QueryBuilder;
use PCT\CustomElements\Core\Cache as Cache;
use PCT\CustomElements\Models\GroupModel as GroupModel;


/**
 * Class file
 * CustomElement
 * Generate CustomElements Groups and their attribute fields
 */
class GroupFactory
{
	/**
	 * Create a CustomElement object instance by a model instance
	 * @param object	Model or DatabaseResult
	 * @return object	\PCT\CustomElements\Core\CustomElement
	 */
	public static function create($objModel)
	{
		// if a database result is coming
		if(strlen(strpos(get_class($objModel), 'Database')) > 0 && strlen(strpos(get_class($objModel), 'Result')) > 0)
		{
			$objModel = new GroupModel($objModel,false);
		}
		
		$objReturn = new Group();
		$objReturn->setData($objModel->row());
		$objReturn->setModel($objModel);
		
		// trigger the onFactoryCreate Hook
		\PCT\CustomElements\Core\Hooks::callstatic('onFactoryCreateHook',array($objReturn,$objModel));
		
		return $objReturn;
	}
	
	
	/**
	 * Generate the attribute groups by a given id and return the Group object with all its attributes
	 * @param integer
	 * @return object Group
	 */
	public static function findById($intId, $arrOptions=array())
	{
		if($intId < 1)
		{
			return null;
		}
		
		// look up from cache
		if(Cache::getGroup($intId))
		{
			return Cache::getGroup($intId);
		}
		
		$objModel = GroupModel::findByPk($intId);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		
		// add to cache
		Cache::addGroup($objReturn->id, $objReturn);
		Cache::addGroup('ce_'.$objReturn->pid.'_'.$objReturn->alias, $objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Fetch the attribute groups by a given id and return the Group object with all its attributes
	 * @param integer
	 * @return object GroupModel
	 */
	public static function fetchById($intId, $arrOptions=array())
	{
		return GroupModel::findByPk($intId,$arrOptions);
	}
	
	
	/**
	 * Generate the published attribute groups by a given id and return the Group object with all its attributes
	 * @param integer
	 * @return object Group
	 */
	public static function findPublishedById($intId, $arrOptions=array())
	{
		if($intId < 1)
		{
			return null;
		}
		
		// look up from cache
		if(Cache::getGroup($intId) && (boolean)Cache::getGroup($intId)->published === true)
		{
			return Cache::getGroup($intId);
		}
		
		$objModel = GroupModel::findPublishedById($intId, $arrOptions);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		
		// add to cache
		Cache::addGroup($objReturn->id, $objReturn);
		Cache::addGroup('ce_'.$objReturn->pid.'_'.$objReturn->alias, $objReturn);
		
		return $objReturn;
	}

	
	/**
	 * Generate all attribute groups by a given id and return as array
	 * @param integer
	 * @return array
	 */
	public static function findByParentId($intPid, $arrOptions=array())
	{
		if(Cache::getGroupsByPid($intPid))
		{
			return Cache::getGroupsByPid($intPid);
		}
		
		$objCollection = GroupModel::findByPid($intPid, $arrOptions);
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objGroup = static::create( $objModel );
			
			$arrReturn[] = $objGroup;
			
			// add to cache
			Cache::addGroup($objGroupn->id, $objGroup);
		}
		
		// add the groups to the cache
		Cache::addGroupsByPid($intPid,$arrReturn);
		
		return $arrReturn;
	}
	
	
	/**
	 * Generate all published attribute groups by a given id and return as array
	 * @param integer
	 * @return array
	 */
	public static function findPublishedByParentId($intPid, $arrOptions=array())
	{
		$arrCache = Cache::getData();
		
		// look up from cache
		$strKey = 'GroupFactory::'.__FUNCTION__;
		if( isset($arrCache['GROUP'][$strKey][$intPid]) && $arrCache['GROUP'][$strKey][$intPid] !== null)
		{
			return $arrCache['GROUP'][$strKey][$intPid];
		}
		
		$objCollection = GroupModel::findPublishedByPid($intPid, $arrOptions);
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objGroup = static::create( $objModel );
			
			$arrReturn[] = $objGroup;
			
			// add to cache
			Cache::addGroup($objGroup->id, $objGroup);
		}
		
		// add the groups to the cache
		Cache::add('CE_GROUPS_'.$intPid,$arrReturn);
		
		// add to cache
		$arrCache['GROUP'][$strKey][$intPid] = $arrReturn;
		Cache::setData($arrCache);
		
		return $arrReturn;
	}
	
	
	/**
	 * Find a group by its alias in a customelement by ID or Alias
	 * @param string
	 * @param integer|string		Id or Alias of the CE
	 * @return object
	 */
	public static function findByAliasAndCustomElement($strAlias,$varCE,$arrOptions=array())
	{
		// look up from cache
		if(Cache::getGroup('ce_'.$varCE.'_'.$strAlias))
		{
			return Cache::getGroup('ce_'.$varCE.'_'.$strAlias);
		}
		
		$objCE = \PCT\CustomElements\Core\CustomElementFactory::findByIdOrAlias($varCE,$arrOptions);
		if($objCE === null)
		{
			return null;
		}
		
		$objModel = GroupModel::findByAliasAndPid($strAlias,$objCE->id,$arrOptions);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		
		// add to cache
		Cache::addGroup($objReturn->id, $objReturn);
		Cache::addGroup('ce_'.$objCE->id.'_'.$strAlias, $objReturn);
		Cache::addGroup('ce_'.$objCE->alias.'_'.$strAlias, $objReturn);
		
		return $objReturn;
	}	
}