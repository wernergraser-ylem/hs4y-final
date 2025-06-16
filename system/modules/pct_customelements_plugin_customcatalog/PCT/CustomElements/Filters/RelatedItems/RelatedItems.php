<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		Related item filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;

/**
 * Class file
 * RelatedItems
 */
class RelatedItems extends \PCT\CustomElements\Filter
{
	/**
	 * Apply the filter and return it
	 * @return object
	 */
	public function prepareFilter()
	{
		$objFilter = new SimpleFilter( $this->findMatchingIds($this->get('mode')) );
		return $objFilter;
	}
	
	
	/**
	 * Find matching ids and return them as array
	 * @param string
	 * @return array
	 */
	public function findMatchingIds($strMode='normal')
	{
		if(strlen($strMode) < 1 || $strMode == 'normal')
		{
			return $this->findMatchesInAttribute();
		}
		else if($strMode == 'related')
		{
			return $this->findMatchesInRelatedEntry();
		}
		
		return array();
	}
	
	
	/**
	 * Find the ids saved in the the selected attribute
	 * @return array	Return an array of matched ids
	 */
	protected function findMatchesInAttribute()
	{
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($this->get('attr_id')); 
		
		if(!$objAttribute)
		{
			return array();
		}
		
		$strLanguage = \PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage::getActiveFrontendLanguage();
		$strField = $objAttribute->get('alias');
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
		
		$strSource = '';
		$strValueField = '';
		$strKeyField = '';
		
		if($objAttribute->get('type') == 'tags')
		{
			// fetch related entry ids from an tags attribute
			$strSource = 'tl_pct_customelement_tags';
			$strValueField = 'title';
			$strKeyField = 'id';
			if($objAttribute->get('tag_custom'))
			{
				$strSource = $objAttribute->get('tag_table');
				$strValueField = $objAttribute->get('tag_value');
				$strKeyField = $objAttribute->get('tag_key');
			}
		}
		else if($objAttribute->get('type') == 'selectdb')
		{
			$strSource = $objAttribute->get('selectdb_table');
			$strValueField = $objAttribute->get('selectdb_value');
			$strKeyField = $objAttribute->get('selectdb_key');
		}
		
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findByTableName($strSource);
		if(!$objCC)
		{
			return array();
		}
		
		// find active entry by auto items parameter
		$objEntry = $objCC->findPublishedItemByIdOrAlias(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']),$strLanguage);
		if(!$objEntry)
		{
			return array();
		}
		
		$arrIds = array();
		if($strKeyField == 'id')
		{
			$arrIds = StringUtil::deserialize($objEntry->{$strField}) ?? array();
			if(!is_array($arrIds))
			{
				$arrIds = array_filter( explode(',', $arrIds) );
			}
		}
		else
		{
			$arrIds = array();
			$varNeedle = $objEntry->{$strKeyField};
			
			// search for the entry ids
			$objEntries = \Contao\Database::getInstance()->prepare("SELECT ".$strKeyField.','.$strField." FROM ".$this->getTable()." WHERE (".$strField." IS NOT NULL OR ".$strField."!='')".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
			while($objEntries->next())
			{
			  	$arrRelated = StringUtil::deserialize($objEntries->{$strField}) ?? array();
				if(!is_array($arrRelated))
				{
					$arrRelated = array_filter(explode(',', $arrRelated),'strlen');
				}
				
				$arrIds = array_merge($arrIds, $arrRelated);
			}
		}
		
		if(count($arrIds) < 1)
		{
			return array();
		}
		
		// set the filter value
		$this->setValue( array_unique($arrIds) );

		return $arrIds;
	}
	
	
	/**
	 * Find the ids saved in the related attribute
	 * @return array	Return an array of matched ids
	 */
	protected function findMatchesInRelatedEntry()
	{
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findById($this->get('config_id')); 
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($this->get('attr_id')); 
		
		if(!$objAttribute || !$objCC)
		{
			return array();
		}
		
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $objCC->getPublishedField() : '');
		
		// find active entry by auto items parameter
		$objEntry = $objCC->findPublishedItemByIdOrAlias(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']));
		
		$strField = $objAttribute->get('alias');
		
		$arrValues = StringUtil::deserialize($objEntry->{$strField});
		if(!is_array($arrValues))
		{
			$arrValues = array_filter(explode(',', $arrValues));
		}

		if( empty($arrValues) )
		{
			return array();
		}
		
		$strSource = '';
		$strValueField = '';
		$strKeyField = '';
		
		if($objAttribute->get('type') == 'tags')
		{
			// fetch related entry ids from an tags attribute
			$strSource = 'tl_pct_customelement_tags';
			$strValueField = 'title';
			$strKeyField = 'id';
			if($objAttribute->get('tag_custom'))
			{
				$strSource = $objAttribute->get('tag_table');
				$strValueField = $objAttribute->get('tag_value');
				$strKeyField = $objAttribute->get('tag_key');
			}
		}
		else if($objAttribute->get('type') == 'selectdb')
		{
			$strSource = $objAttribute->get('selectdb_table');
			$strValueField = $objAttribute->get('selectdb_value');
			$strKeyField = $objAttribute->get('selectdb_key');
		}
	
		$arrIds = array();
		
		$objEntries = \Contao\Database::getInstance()->prepare("SELECT ".$strKeyField." FROM ".$strSource." WHERE (".$strValueField." IS NOT NULL OR ".$strValueField."!='')".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
		
		if($objEntries->numRows > 0)
		{
			while($objEntries->next())
			{
				$arrRelated = StringUtil::deserialize($objEntries->{$strKeyField});
				if(!is_array($arrRelated))
				{
					$arrRelated = array_filter(explode(',', $arrRelated));
				}
				
				if(count(array_intersect($arrRelated,$arrValues)) > 0)
				{
					$arrIds[] = $objEntries->{$strKeyField};
				}
			}
		}
		
		if(count($arrIds) < 1)
		{
			return array();
		}
		
		// set the filter value
		$this->setValue( array_unique($arrIds) );
		
		return $arrIds;
	}
}