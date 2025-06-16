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
use PCT\CustomElements\Core\Filter as Filter;

/**
 * Class file
 * FilterCollection
 */
abstract class FilterCollection extends \PCT\CustomElements\Plugins\CustomCatalog\Core\Controller
{
	/**
	 * Filter object
	 * @var array
	 */
	protected $arrFilters = array();
	
	/**
	 * Internal filter counter
	 * @var integer
	 */
	protected $intCount = 0;
	
	
	/**
	 * Set a list of filters
	 * @param array
	 */
	public function setFilters($arrValue)
	{
		$this->set('arrFilters',$arrValue);
	}
	
	
	/**
	 * Return the current set of filters
	 * @return object
	 */
	public function getFilters()
	{
		return $this->get('arrFilters');
	}
	
	
	/**
	 * Get the current list of filter ids as array
	 * @return array
	 */
	public function getFilterIds()
	{
		$filters = $this->getFilters();
		if(count($filters) < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($filters as $objFilter)
		{
			$arrReturn[] = $objFilter->get('id');
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Add a filter to the collection and return new stack
	 * @param object	PCT\CustomElements\Filter
	 * @return object
	 */
	public function add(Filter $objFilter)
	{
		$filters = $this->getFilters();
		$filters[] = $objFilter;
		
		// set
		$this->setFilters($filters);
		
		// increase counter
		$this->intCount += 1;
		
		return $this;
	}
	
	
	/**
	 * Remove a filter from the collection and return the new collection
	 * @param integer
	 * @return object
	 */
	public function remove($intFilter)
	{
		$filters = $this->getFilters();
		if(count($filters) < 1)
		{
			return array();
		}
		
		foreach($filters as $i => $objFilter)
		{
			if($objFilter->get('id') == $intFilter)
			{
				unset($filters[$i]);
				
				// decrease counter
				$this->intCount -= 1;
		
				continue;
			}
		}
		
		$this->setFilters($filters);
		return $this;
	}
	
	
	/**
	 * Clear the collection and return the new collection
	 * @return object
	 */
	public function clear()
	{
		$this->setFilters(array());
		return $this;
	}
	
	
	/**
	 * Return the counter value
	 * @return integer
	 */
	public function getCount()
	{
		return $this->intCount;
	}
	
}
