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
namespace PCT\CustomElements\Core;

/**
 * Imports
 */
use PCT\CustomElements\Helper\QueryBuilder as QueryBuilder;
use PCT\CustomElements\FilterCollection as FilterCollection;
use PCT\CustomElements\Helper\FilterHelper as FilterHelper;
use PCT\CustomElements\Models\FilterModel as FilterModel;

/**
 * Class file
 * Filterfactory
 */
abstract class FilterFactory
{
	/**
	 * Reference object
	 * @var object
	 */
	protected $objOrigin = null;
	
	
	/**
	 * Create a CustomCatalog object instance by a model instance
	 * @param object	Model
	 */
	public static function create($objModel)
	{
		// create the filter class
		$strClass = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$objModel->type]['class'];
		if(strlen($strClass) < 1)
		{
			return null;
		}
		
		if(!class_exists($strClass))
		{
			\PCT\CustomElements\Loader\FilterLoader::load($objModel->type);
		}
		
		try
		{
			if(!class_exists($strClass))
			{
				throw new \Exception('Cannot load Filter class or class not found: '.$strClass);
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
	 * Find a Filter instance by an ID
	 * @param id
	 * @return object	Filter instance
	 */
	public static function findById($intId)
	{
		if(\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilter($intId) !== null)
		{
			return \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilter($intId);
		}
		
		$objModel = FilterModel::findByPk($intId);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		
		// add to \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::addFilter($intId,$objReturn);

		return $objReturn;
	}
	
	
	/**
	 * Fetch a filter by its ID and return as Model
	 * @param integer
	 * @return object
	 */
	public static function fetchById($intId, $arrOptions=array())
	{
		return FilterModel::findByPk($intId,$arrOptions);
	}


	/**
	 * Find a published filter instance by its ID
	 * @param integer
	 * @return object	Filter instance
	 */
	public static function findPublishedById($intId, $arrOptions=array())
	{
		if(\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilter($intId) !== null)
		{
			$objReturn = \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilter($intId);
			if($objReturn->get('published'))
			{
				return $objReturn;
			}
			return null;
		}

		$objModel = FilterModel::findByPk($intId,array('column'=>array(FilterModel::getTable().'.published=1')), $arrOptions);
		if($objModel === null)
		{
			return null;
		}

		$objReturn = static::create( $objModel );
		
		// add to cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::addFilter($intId,$objReturn);

		return $objReturn;
	}


	/**
	 * Find published filters by filterset id (pid) and return as array
	 * @param integer
	 * @return array
	 */
	public static function findPublishedByPid($intPid,$arrOptions=array())
	{
		if(\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilterCollection($intPid.'_published') !== null)
		{
			return \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilterCollection($intPid.'_published');
		}
		
		$objCollection = FilterModel::findPublishedByPid($intPid,$arrOptions);
		if($objCollection === null)
		{
			return null;
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objReturn = static::create( $objModel );
			
			// add to cache
			\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::addFilter($objModel->id,$objReturn);
			
			$arrReturn[] = $objReturn;
		}
		
		// add to cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::addFilterCollection($intPid.'_published',$arrReturn);

		return $arrReturn;
	}

	
	/**
	 * Find all filters by their PID and return as object
	 * @param integer
	 * @return array
	 */
	public static function findByPid($intPid, $arrOptions=array())
	{
		if(\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilterCollection($intPid) !== null)
		{
			return \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilterCollection($intPid);
		}
		
		$objCollection = FilterModel::findByPid($intPid,$arrOptions);
		if($objCollection === null)
		{
			return null;
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objReturn = static::create( $objModel );
			
			// add to cache
			\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::addFilter($objModel->id,$objReturn);
			
			$arrReturn[] = $objReturn;
		}
		
		// add to cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::addFilterCollection($intPid,$arrReturn);
			
		
		return $arrReturn;
	}
	
	
	/**
	 * Prepare a new filter collection and return as object
	 * @return object	PCT\CustomElements\Core\FilterCollection
	 */
	public static function newCollection()
	{
		return new FilterCollection();
	}
	
	
	/**
	 * Create a new collection by a given filterset id or ids
	 * @param mixed
	 * @param boolean
	 * @return object
	 */
	public static function createCollectionByFilterset($varFilterset, $bolOrdered=true)
	{
		if(!is_array($varFilterset) && is_integer($varFilterset))
		{
			$varFilterset = array($varFilterset);
		}
		
		$objReturn = new FilterCollection();
				
		if(empty($varFilterset))
		{
			return $objReturn;
		}
		
		// look up from cache
		$strCacheKey = 'collection_'.implode('_', $varFilterset);
		if( \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilterCollection($strCacheKey) !== null)
		{
			return \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::getFilterCollection($strCacheKey);
		}
		
		if(empty($varFilterset))
		{
			return $objReturn;
		}
		
		$objFiltersets = \PCT\CustomElements\Models\FiltersetModel::findMultiplePublishedByIds( $varFilterset,array('order'=>'FIELD(id,'.implode(',',$varFilterset).')') );
		if($objFiltersets === null)
		{
			return $objReturn;
		}
		
		// prepare filters
		while($objFiltersets->next())
		{
			$objFilters = static::findPublishedByPid($objFiltersets->id);
			if($objFilters === null)
			{
				continue;
			}
			
			foreach($objFilters as $objFilter)
			{
				// add the filter to the collection
				$objReturn->add($objFilter);

			}
		}
		
		// add to cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Cache::addFilterCollection($strCacheKey,$objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Return the class name of a filter by its type
	 * @param string
	 * @param string
	 */
	public static function getClassByType($strType)
	{
		return FilterHelper::getClassByType($strType);
	}
	
		
	/**
	 * Remove a filter from a page url and return the url string
	 * @param string|integer
	 * @param object
	 * @param string
	 * @return string
	 */
	public static function removeFromUrl($objFilter, $strUrl='',$strMethod='POST')
	{
		if(strlen($strUrl) < 1)
		{
			$strUrl = \Contao\Environment::get('request');
		}
		
		return \PCT\CustomElements\Helper\Functions::callstatic('removeFromUrl',array( $objFilter->getName() , $strUrl));
	}
}