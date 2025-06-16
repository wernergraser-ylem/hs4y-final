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
use PCT\CustomElements\Core\AttributeFactory as CustomElementAttributeFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Attribute as Attribute;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;


/**
 * Class file
 * AttributeFactory
 */
class AttributeFactory extends CustomElementAttributeFactory
{
	/**
	 * Fetch an attribute by a custom catalog id or table name
	 * @param mixed
	 * @return object	DatabaseResult
	 */
	public static function fetchByCustomCatalog($strAttributeAlias,$varCustomCatalog,$bolIsPublished=false)
	{
		$strKey = 'AttributeFactory::'.__FUNCTION__.'::'.$strAttributeAlias.($bolIsPublished ? '::published' : '');
		
		if(!is_numeric($varCustomCatalog))
		{
			$objCC = CustomCatalogFactory::fetchByTableName($varCustomCatalog);
			$varCustomCatalog = $objCC->id ?? 0;
		}
		
		// look up from cache
		if(Cache::getDatabaseResult($strKey,$varCustomCatalog) !== null)
		{
			return Cache::getDatabaseResult($strKey,$varCustomCatalog);
		}
		
		$objResult = \Contao\Database::getInstance()->prepare("
		SELECT attr.* FROM tl_pct_customelement_attribute AS attr WHERE alias=? AND attr.pid IN
		(
			SELECT g.id FROM tl_pct_customelement_group AS g WHERE g.pid IN
			(
				SELECT cc.pid FROM tl_pct_customcatalog AS cc WHERE id=? GROUP BY cc.pid 
			)".($bolIsPublished ? " AND g.published=1" : "")." GROUP BY g.id
		)".($bolIsPublished ? " AND attr.published=1" : ""))->limit(1)->execute($strAttributeAlias,$varCustomCatalog);
		
		// add to cache
		Cache::addDatabaseResult($strKey,$varCustomCatalog,$objResult);
		
		return $objResult;
	}
	
	
	/**
	 * Find an attribute by a custom catalog table name
	 * @param mixed		integer or string
	 * @return object
	 */
	public static function findByCustomCatalog($strAttributeAlias,$varCustomCatalog,$bolIsPublished=false)
	{
		// look up from cache
		if(Cache::getAttribute('cc_'.$varCustomCatalog.'_'.$strAttributeAlias) !== null)
		{
			$objAttribute = Cache::getAttribute('cc_'.$varCustomCatalog.'_'.$strAttributeAlias);
			if($bolIsPublished && !$objAttribute->get('published'))
			{
				return null;
			}
			return $objAttribute;
		}
		
		$objResult = static::fetchByCustomCatalog($strAttributeAlias,$varCustomCatalog,$bolIsPublished);
		
		if($objResult->numRows < 1)
		{
			return null;
		}
		
		$objReturn = \PCT\CustomElements\Core\AttributeFactory::findById($objResult->id);
		
		// add to cache
		Cache::addAttribute('cc_'.$varCustomCatalog.'_'.$strAttributeAlias,$objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Fetch a published attribute by a custom catalog id or table name
	 * @param mixed		integer or string
	 * @return object
	 */
	public static function fetchPublishedByCustomCatalog($strAttributeAlias,$varCustomCatalog)
	{
		return static::fetchByCustomCatalog($strAttributeAlias,$varCustomCatalog,true);
	}
	
	
	/**
	 * @shortcurt to fetchByCustomCatalog
	 */
	public static function fetchByAliasAndCustomCatalog($strAttributeAlias,$varCustomCatalog)
	{
		return static::fetchByCustomCatalog($strAttributeAlias,$varCustomCatalog);
	}

	
	/**
	 * Find a published attribute by a custom catalog table name
	 * @param mixed		integer or string
	 * @return object
	 */
	public static function findPublishedByCustomCatalog($strAttributeAlias,$varCustomCatalog)
	{
		return static::findByCustomCatalog($strAttributeAlias,$varCustomCatalog,true);
	}
	
	
	/**
	 * Shortcut to findByCustomCatalog
	 * @param string
	 * @param string
	 * @return object
	 */
	public static function findByTable($strAttributeAlias,$strTable)
	{
		return static::findByCustomCatalog($strAttributeAlias,$strTable);
	}
	
	
	/**
	 * Fetch all attributes by a custom catalog id
	 * @param integer
	 * @param boolean
	 * @return object	DatabaseResult
	 */
	public static function fetchAllByCustomCatalog($intCC,$bolIsPublished=false)
	{
		$strKey = 'AttributeFactory::'.__FUNCTION__.($bolIsPublished ? '::published' : '');
		
		// look up from cache
		if(Cache::getDatabaseResult($strKey,$intCC) !== null)
		{
			return Cache::getDatabaseResult($strKey,$intCC);
		}
		
		$objResult = \Contao\Database::getInstance()->prepare("
		SELECT attr.* FROM tl_pct_customelement_attribute AS attr WHERE attr.pid IN
		(
			SELECT g.id FROM tl_pct_customelement_group AS g WHERE g.pid IN
			(
				SELECT cc.pid FROM tl_pct_customcatalog AS cc WHERE id=? GROUP BY cc.pid 
			)".($bolIsPublished ? " AND published=1" : "")." GROUP BY g.id
		)".($bolIsPublished ? " AND published=1" : ""))->execute($intCC);
		
		// add to cache
		Cache::addDatabaseResult($strKey,$intCC,$objResult);
		
		return $objResult;
	}
	
	
	/**
	 * Fetch all attributes by a custom element id
	 * @param integer
	 * @param boolean
	 * @return object	DatabaseResult
	 */
	public static function fetchAllByCustomElement($intCE,$bolIsPublished=false)
	{
		$strKey = 'AttributeFactory::'.__FUNCTION__.($bolIsPublished ? '::published' : '');
		
		// look up from cache
		if(Cache::getDatabaseResult($strKey,$intCE) !== null)
		{
			return Cache::getDatabaseResult($strKey,$intCE);
		}
		
		$objResult = \Contao\Database::getInstance()->prepare("
		SELECT attr.* FROM tl_pct_customelement_attribute AS attr WHERE attr.pid IN
		(
			SELECT g.id FROM tl_pct_customelement_group AS g WHERE g.pid IN
			(
				SELECT ce.id FROM tl_pct_customelement AS ce WHERE id=? GROUP BY ce.id 
			)".($bolIsPublished ? " AND published=1" : "")." GROUP BY g.id
		)".($bolIsPublished ? " AND published=1" : ""))->execute($intCE);
		
		// add to cache
		Cache::addDatabaseResult($strKey,$intCE,$objResult);
		
		return $objResult;
	}
	
	
	/**
	 * Fetch all attributes by a custom catalog from the 'default' palette (or a given palette selector name) and return them
	 * @param integer	CustomCatalog
	 * @param string	Palette name, default is the standard palette
	 * @param boolean	Attribute is published
	 */
	public static function fetchAllInDefaultPaletteByCustomCatalog($intCC,$strPalette='',$bolIsPublished=false)
	{
		$strKey = 'AttributeFactory::'.__FUNCTION__.($strPalette ? '::'.$strPalette : '').($bolIsPublished ? '::published' : '');
		
		// look up from cache
		if(Cache::getDatabaseResult($strKey,$intCC) !== null)
		{
			return Cache::getDatabaseResult($strKey,$intCC);
		}
		
		$objResult = \Contao\Database::getInstance()->prepare("
		SELECT attr.* FROM tl_pct_customelement_attribute AS attr WHERE attr.pid IN
		(
			SELECT g.id FROM tl_pct_customelement_group AS g WHERE selector=? AND g.pid IN
			(
				SELECT cc.pid FROM tl_pct_customcatalog AS cc WHERE id=? GROUP BY cc.pid 
			)".($bolIsPublished ? " AND published=1" : "")." GROUP BY g.id
		)".($bolIsPublished ? " AND published=1" : ""))->execute($strPalette,$intCC);
		
		// add to cache
		Cache::addDatabaseResult($strKey,$intCC,$objResult);
		
		return $objResult;
	}
	
	
	/**
	 * Fetch all attributes by a custom catalog distinct by a set of field names
	 * @param integer	CustomCatalog
	 * @param array		Stack of fieldnames
	 * @param boolean	Attribute is published
	 */
	public static function fetchAllDistinctByCustomCatalog($intCC,$arrDistinct=array(),$bolIsPublished=false)
	{
		$strDistinct = '';
		foreach($arrDistinct as $f)
		{
			$strDistinct .= 'attr.'.$f.',';
		}
		$strDistinct = substr($strDistinct,0,-1);
		
		$objResult = \Contao\Database::getInstance()->prepare("
		SELECT ".(strlen($strDistinct) > 0 ? " DISTINCT ".$strDistinct : "attr.*")." FROM tl_pct_customelement_attribute AS attr WHERE attr.pid IN
		(
			SELECT g.id FROM tl_pct_customelement_group AS g WHERE g.pid IN
			(
				SELECT cc.pid FROM tl_pct_customcatalog AS cc WHERE id=? GROUP BY cc.pid 
			)".($bolIsPublished ? " AND published=1" : "")." GROUP BY g.id
		)".($bolIsPublished ? " AND published=1" : ""))->execute($intCC);
		return $objResult;
	}
	
	/**
	 * Fetch all published attributes by a custom ctalog id
	 * @param integer
	 * @return object	DatabaseResult
	 */
	public static function fetchAllPublishedByCustomCatalog($intCC)
	{
		return static::fetchAllByCustomCatalog($intCC,true);
	}
	
	
	/**
	 * Fetch all attributes by its type and custom catalog id or table name
	 * @param mixed
	 * @return object	DatabaseResult
	 */
	public static function fetchAllByTypeAndCustomCatalog($strType,$varCustomCatalog,$bolIsPublished=false)
	{
		$strKey = 'AttributeFactory::'.__FUNCTION__.'::'.$strType.($bolIsPublished ? '::published' : '');
		
		if(!is_numeric($varCustomCatalog))
		{
			$objCC = CustomCatalogFactory::findByTableName($varCustomCatalog);
			$varCustomCatalog = $objCC->id;
		}
		
		// look up from cache
		if(Cache::getDatabaseResult($strKey,$varCustomCatalog) !== null)
		{
			return Cache::getDatabaseResult($strKey,$varCustomCatalog);
		}
		
		$objResult = \Contao\Database::getInstance()->prepare("
		SELECT attr.* FROM tl_pct_customelement_attribute AS attr WHERE type=? AND attr.pid IN
		(
			SELECT g.id FROM tl_pct_customelement_group AS g WHERE g.pid IN
			(
				SELECT cc.pid FROM tl_pct_customcatalog AS cc WHERE id=? GROUP BY cc.pid 
			)".($bolIsPublished ? " AND g.published=1" : "")." GROUP BY g.id
		)".($bolIsPublished ? " AND attr.published=1" : ""))->execute($strType,$varCustomCatalog);
		
		// add to cache
		Cache::addDatabaseResult($strKey,$varCustomCatalog,$objResult);
		
		return $objResult;
	}
	
	
	/**
	 * Find all attributes by its type and custom catalog id or table name and return as array
	 * @param mixed		integer or string
	 * @return array
	 */
	public static function findAllByTypeAndCustomCatalog($strType,$varCustomCatalog,$bolIsPublished=false)
	{
		$objResult = static::fetchAllByTypeAndCustomCatalog($strType,$varCustomCatalog,$bolIsPublished);
		
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($objResult->id);
			if($objAttribute === null)
			{
				continue;
			}
			$arrReturn[] =  $objAttribute;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Find the attribute by a DCA object
	 * @param string
	 * @return object
	 */
	public static function findByDca($objDC)
	{
		$objReturn = null;
		
		if( (int)$objDC->attribute_id > 0 )
		{
			return static::findById( $objDC->attribute_id );
		}

		$strTable = $objDC->table;
		$strField = $objDC->field;
		
		// is CC
		if(CustomCatalogFactory::validateByTableName($strTable) && !$objDC->isCustomElement)
		{
			$objReturn = static::findByCustomCatalog($strField,$strTable);
		}

		if( $objReturn !== null )
		{
			return $objReturn;
		}

		// is CE
		$objReturn = static::findByUuid($strField);
		
		if( $objReturn === null )
		{
			// check if it is a duplicated attribute and get the parent attribute id from the registry session
			$objReturn = static::findById( static::getAttributeIdFromSession($strField) );
		}
		
		return $objReturn;
	}
	
	
	/**
	 * Find multiple attributes by a set of ids and return as array
	 * @param array
	 * @return array
	 */
	public static function findMultipleById($arrIds,$arrOptions=array())
	{
		if(count($arrIds) < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($arrIds as $id)
		{
			$arrReturn[] = static::findById($id,$arrOptions);
		}
		return $arrReturn;
	}
	
	
	/**
	 * Find multiple published attributes by a set of ids and return as array
	 * @param array
	 * @return array
	 */
	public static function findMultiplePublishedById($arrIds,$arrOptions=array())
	{
		if(count($arrIds) < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($arrIds as $id)
		{
			$arrReturn[] = static::findPublishedById($id,$arrOptions);
		}
		return $arrReturn;
	}

	
}