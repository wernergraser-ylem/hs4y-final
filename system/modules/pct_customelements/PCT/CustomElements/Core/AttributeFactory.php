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

use Contao\Database;
use Contao\StringUtil;
use PCT\CustomElements\Core\Origin as Origin;
use PCT\CustomElements\Helper\QueryBuilder as QueryBuilder;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Core\Cache as Cache;
use PCT\CustomElements\Models\AttributeModel as AttributeModel;

/**
 * Class file
 * AttributeFactory
 * Generate attributes
 */
class AttributeFactory
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
			$objModel = new AttributeModel($objModel,false);
		}

		if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$objModel->type]) )
		{
			return null;
		}
		
		$strClass = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$objModel->type]['class'];
		if(strlen($strClass) < 1)
		{
			return null;
		}
		
		if(!class_exists($strClass))
		{
			\PCT\CustomElements\Loader\AttributeLoader::load($objModel->type);
		}
		
		try
		{
			if(!class_exists($strClass))
			{
				throw new \Exception('Cannot load Attribute class or class not found: '.$strClass);
			}
			
		}
		catch(\Exception $e)
		{
			throw new \Exception($e->getMessage());
		}
		
		$objReturn = new $strClass( $objModel->row() );
		$objReturn->setModel($objModel);
		
		// trigger the onFactoryCreate Hook
		\PCT\CustomElements\Core\Hooks::callstatic('onFactoryCreateHook',array($objReturn,$objModel));
		
		return $objReturn;
	}
	
	
	/**
	 * Find all active attributes and return as array
	 * @return array
	 */
	public static function findAll()
	{
		$objCollection = AttributeModel::findAll();
		if($objCollection === null)
		{
			return array();
		}
		
		$objRegistry = \Contao\Model\Registry::getInstance();
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objAttribute = static::create( $objModel );
			if($objAttribute === null)
			{
				continue;
			}
			
			$arrReturn[] = $objAttribute;
			
			// add to cache
			Cache::addAttribute($objAttribute->id,$objAttribute);
			Cache::addAttribute($objAttribute->uuid,$objAttribute);
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Find a CustomElement instance by an ID
	 * @param id
	 * @return object	Filter instance
	 */
	public static function findById($intId, $arrOptions=array())
	{
		// look up from Cache
		if(Cache::getAttribute($intId))
		{
			return Cache::getAttribute($intId);
		}
		
		$objModel = AttributeModel::findByPk($intId,$arrOptions);
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
		Cache::addAttribute($objReturn->id, $objReturn);
		Cache::addAttribute($objReturn->uuid, $objReturn);

		return $objReturn;
	}
	
	
	/**
	 * Fetch an attribute by its id
	 * @param integer
	 * @return object	\PCT\CustomElements\Models\AttributeModel
	 */
	public static function fetchById($intId, $arrOptions=array())
	{
		return AttributeModel::findByPk($intId, $arrOptions);	
	}
	
	
	/**
	 * Generate the published attribute by a given id return the Attribute object
	 * @param integer
	 * @return object Attribute
	 */
	public static function findPublishedById($intId, $arrOptions=array())
	{
		// look up from Cache
		if(Cache::getAttribute($intId))
		{
			$objReturn = Cache::getAttribute($intId);
			if((boolean)$objReturn->get('published') === false )
			{
				return null;
			}
			return $objReturn;
		}
			
		$objModel = AttributeModel::findPublishedById($intId,$arrOptions);
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
		Cache::addAttribute($objReturn->id, $objReturn);
		Cache::addAttribute($objReturn->uuid, $objReturn);
		
		return $objReturn;
}
	
	
	/**
	 * Fetch the published attribute by a given id return the database result object
	 * @param integer
	 * @return object Attribute
	 */
	public static function fetchPublishedById($intId, $arrOptions=array())
	{
		return AttributeModel::findPublishedById($intId, $arrOptions);
	}
	
	
	/**
	 * Fetch the attributes by a given set of ids return the database result object
	 * @param integer
	 * @return object Attribute
	 */
	public static function fetchMultipleById($arrIds, $arrOptions=array())
	{
		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "tl_pct_customelement_attribute.sorting";
		}
		
		return AttributeModel::findMultipleByIds($arrIds,$arrOptions);
	}
	
	
	/**
	 * Generate the attribute by a given id return the Attribute object
	 * @param integer
	 * @return object Attribute
	 */
	public static function findByUuid($strUuid, $arrOptions=array())
	{
		// look up from Cache
		if(Cache::getAttribute($strUuid))
		{
			return Cache::getAttribute($strUuid);
		}
		
		$objModel = AttributeModel::findByUuid($strUuid,$arrOptions);
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
		Cache::addAttribute($objReturn->id, $objReturn);
		Cache::addAttribute($strUuid, $objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Generate the attribute by a given alias return the Attribute object
	 * @param integer
	 * @return object Attribute
	 */
	public static function findByAlias($strAlias, $arrOptions=array())
	{
		$objModel = AttributeModel::findByAlias($strAlias,$arrOptions);
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
		Cache::addAttribute($objReturn->id, $objReturn);
		Cache::addAttribute($objReturn->uuid, $objReturn);
		
		return $objReturn;
	}
	

	/**
	 * Fetch the attribute by a given alias return the Attribute object
	 * @param integer
	 * @return object Attribute
	 */
	public static function fetchByAlias($strAlias, $arrOptions=array())
	{
		return AttributeModel::findByAlias($strAlias,$arrOptions);	
	}
	
	
	/**
	 * Find an attribute by its alias in a customelement by ID or Alias
	 * @param string
	 * @param integer|string		Id or Alias of the CE
	 * @return object
	 */
	public static function findByAliasAndCustomElement($strAlias,$varCE,$arrOptions=array())
	{
		// look up from cache
		if(Cache::getAttribute('ce_'.$varCE.'_'.$strAlias))
		{
			return Cache::getAttribute('ce_'.$varCE.'_'.$strAlias);
		}
		
		$objCE = \PCT\CustomElements\Core\CustomElementFactory::findByIdOrAlias($varCE,$arrOptions);
		if($objCE === null)
		{
			return null;
		}

		// handle copies
		$isCopy = false;
		if(strlen(strpos($strAlias, '#')) > 0)
		{
			$arr = explode('#', $strAlias);
			$strAlias = $arr[0];
			$isCopy = true;
		}
		
		$strCEwhere = "SELECT id FROM tl_pct_customelement WHERE id=".$objCE->id;
		
		$strQuery = "tl_pct_customelement_attribute.alias=? AND pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid IN(".$strCEwhere.") GROUP BY id)";
		
		$objCollection = AttributeModel::findByCustomSql($strQuery,array($strAlias));
		if($objCollection === null)
		{
			return null;
		}
		
		$arrModels = $objCollection->getModels();
		
		$objReturn = static::create( $arrModels[0] );
		if($objReturn === null)
		{
			return null;
		}
		
		// add to cache
		Cache::addAttribute($objReturn->id, $objReturn);
		Cache::addAttribute($objReturn->uuid, $objReturn);
		Cache::addAttribute('ce_'.$objCE->id.'_'.$strAlias, $objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Find an attribute by its uuid in a customelement by ID or Alias
	 * @param string
	 * @param integer|string		Id or Alias of the CE
	 * @return object
	 */
	public static function findByUuidAndCustomElement($strUuid,$varCE,$arrOptions=array())
	{
		// look up from cache
		if(Cache::getAttribute('ce_'.$varCE.'_'.$strUuid))
		{
			return Cache::getAttribute('ce_'.$varCE.'_'.$strUuid);
		}
		
		$objCE = \PCT\CustomElements\Core\CustomElementFactory::findByIdOrAlias($varCE,$arrOptions);
		if($objCE === null)
		{
			return null;
		}

		$strCEwhere = "SELECT id FROM tl_pct_customelement WHERE id=".$objCE->id;
		
		$strQuery = "tl_pct_customelement_attribute.uuid=? AND pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid IN(".$strCEwhere.") GROUP BY id)";
		
		$objCollection = AttributeModel::findByCustomSql($strQuery,array($strUuid));
		if($objCollection === null)
		{
			return null;
		}
		
		$arrModels = $objCollection->getModels();
		
		$objReturn = static::create( $arrModels[0] );
		if($objReturn === null)
		{
			return null;
		}
		
		// add to cache
		Cache::addAttribute($objReturn->id, $objReturn);
		Cache::addAttribute($objReturn->uuid, $objReturn);
		Cache::addAttribute('ce_'.$objCE->id.'_'.$strUuid, $objReturn);
		Cache::addAttribute('ce_'.$objCE->alias.'_'.$strUuid, $objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Generate all attributes in a group and return them as array
	 * @param integer
	 * @return array
	 */
	public static function findByParentId($intPid, $arrOptions=array())
	{
		$arrCache = Cache::getData();
		
		// look up from cache
		$strKey = 'AttributeFactory::'.__FUNCTION__;
		if(isset($arrCache['ATTRIBUTE'][$strKey][$intPid]) && $arrCache['ATTRIBUTE'][$strKey][$intPid] !== null)
		{
			return $arrCache['ATTRIBUTE'][$strKey][$intPid];
		}
		
		
		$objCollection = AttributeModel::findByPid($intPid,$arrOptions);
		if($objCollection === null)
		{
			return null;
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objAttribute = static::create( $objModel );
			if($objAttribute === null)
			{
				continue;
			}
			
			$arrReturn[] = $objAttribute;
			
			// add to cache
			Cache::addAttribute($objAttribute->id, $objAttribute);
			Cache::addAttribute($objAttribute->uuid, $objAttribute);
			Cache::addAttribute('group_'.$intPid.'_'.$objAttribute->alias, $objAttribute);
		}
		
		// add to cache
		$arrCache['ATTRIBUTE'][$strKey][$intPid] = $arrReturn;
		Cache::setData($arrCache);
		
		return $arrReturn;
	}
	
	
	/**
	 * Generate all attributes in a group and return them as array
	 * @param integer
	 * @return array
	 */
	public static function findByAliasAndPid($strAlias, $intPid, $arrOptions=array())
	{
		// look up from cache
		if(Cache::getAttribute('group_'.$intPid.'_'.$strAlias))
		{
			return Cache::getAttribute('group_'.$intPid.'_'.$strAlias);
		}
		
		$objModel = AttributeModel::findByAliasAndPid($strAlias, $intPid,$arrOptions);
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
		Cache::addAttribute($objReturn->id, $objReturn);
		Cache::addAttribute($objReturn->uuid, $objReturn);
		Cache::addAttribute('group_'.$intPid.'_'.$objReturn->alias, $objReturn);

		return $objReturn;

	}
	
	
	/**
	 * Generate all attributes in a group and return them as array
	 * @param integer
	 * @return array
	 */
	public static function findPublishedByParentId($intPid, $arrOptions=array())
	{
		$arrCache = Cache::getData();
		
		// look up from cache
		$strKey = 'AttributeFactory::'.__FUNCTION__;
		if( isset($arrCache['ATTRIBUTE'][$strKey][$intPid]) && $arrCache['ATTRIBUTE'][$strKey][$intPid] !== null)
		{
			return $arrCache['ATTRIBUTE'][$strKey][$intPid];
		}
		
		$objCollection = AttributeModel::findPublishedByPid($intPid, $arrOptions);
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objAttribute = static::create( $objModel );
			if($objAttribute === null)
			{
				continue;
			}
			
			$arrReturn[] = $objAttribute;
			
			// add to cache
			Cache::addAttribute($objAttribute->id, $objAttribute);
			Cache::addAttribute($objAttribute->uuid, $objAttribute);
			Cache::addAttribute('ce_'.$intPid.'_'.$objAttribute->alias, $objAttribute);
		}
		
		// add to cache
		$arrCache['ATTRIBUTE'][$strKey][$intPid] = $arrReturn;
		Cache::setData($arrCache);
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the attribute (mainly a copy) by its alias and origin information
	 * @param string
	 * @param integer
	 * @param string
	 * @return object
	 */
	public static function findByAliasAndOrigin($strAlias,$intPid,$strTable)
	{
		$arrData = array();
		
		$objDatabase = Database::getInstance();

		if(Cache::getWizard($intPid,$strTable))
		{
			$arrData = StringUtil::deserialize(Cache::getWizard($intPid,$strTable));
		}
		else if( $objDatabase->tableExists('tl_pct_customelement_vault') )
		{
			// check if there is a wizzard data for this record
			$objWizard = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_vault WHERE pid=? AND source=? AND type=?")->limit(1)->execute($intPid,$strTable,'wizard');
			if($objWizard->numRows < 1)
			{
				return null;
			}
		
			$arrData = StringUtil::deserialize($objWizard->data_blob);
		}
		
		if(empty($arrData))
		{
			return null;
		}
		
		foreach($arrData as $k => $data)
		{
			if(!is_array($data)) {continue;}
			// work on copies only
			if(!$data['isCopy'] || empty($data['attributes'])) {continue;}
			foreach($data['attributes'] as $attribute)
			{
				if($attribute['alias'] == $strAlias)
				{
					// generate parent attribute
					$objAttribute = AttributeFactory::findById($attribute['id']);
					// set uuid to copy uuid
					$objAttribute->set('uuid',$attribute['uuid']);
				}
			}
		}
		
		return $objAttribute;
	}
	
	
	/**
	 * Return the attribute by its uuid located in a wizard. Finds clones
	 * @param string
	 * @param integer
	 * @param string
	 * @return object|null
	 */
	public static function findCloneByUuidAndOrigin($strUuid,$intPid,$strTable,$intAttribute=0)
	{
		$arrWizard = \PCT\CustomElements\Core\Vault::getWizardData($intPid,$strTable,$intAttribute);
		if( isset($arrWizard['clones']) && is_array($arrWizard['clones']))
		{
			foreach($arrWizard['clones'] as $attr_id => $arrUuids)
			{
				if(empty($arrUuids) || !is_array($arrUuids))
				{
					continue;
				}
				
				if(in_array($strUuid, $arrUuids))
				{
					return \PCT\CustomElements\Core\AttributeFactory::findById($attr_id);
				}
			}
		}
		return null;
	}
	
	
	/**
	 * Find attributes by the custom element
	 * @param integer
	 * @return array
	 */
	public static function findMultipleByCustomElement($intId, $arrOptions=array())
	{
		$arrCache = Cache::getData();
		
		$strKey = 'AttributeFactory::'.__FUNCTION__;
		if( isset($arrCache['ATTRIBUTE'][$strKey][$intId]) && $arrCache['ATTRIBUTE'][$strKey][$intId] !== null)
		{
			return $arrCache['ATTRIBUTE'][$strKey][$intId];
		}
		
		$strQuery = "tl_pct_customelement_attribute.pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid=".$intId.")";
		$objCollection = AttributeModel::findByCustomSql($strQuery,array(),$arrOptions);
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$arrReturn[] = static::create( $objModel );
		}
		
		// add to cache
		$arrCache['ATTRIBUTE'][$strKey][$intId] = $arrReturn;
		Cache::setData($arrCache);
		
		return $arrReturn;
	}
	
	
	/**
	 * Find attributes by the custom element
	 * @param integer
	 * @return object	Database Result
	 */
	public static function fetchMultipleByCustomElement($intId, $arrOptions=array())
	{
		$strQuery = "tl_pct_customelement_attribute.pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid=".$intId.")";
		return AttributeModel::findByCustomSql($strQuery,array(),$arrOptions);
	}
	
	
	/**
	 * Find attributes by the custom element
	 * @param integer
	 * @return array
	 */
	public static function findMultiplePublishedByCustomElement($intId, $arrOptions=array())
	{
		$arrCache = Cache::getData();
		
		$strKey = 'AttributeFactory::'.__FUNCTION__;
		if($arrCache['ATTRIBUTE'][$strKey][$intId] !== null)
		{
			return $arrCache['ATTRIBUTE'][$strKey][$intId];
		}
		
		$strQuery = "tl_pct_customelement_attribute.pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid=".$intId.") AND tl_pct_customelement_attribute.published=1";
		$objCollection = AttributeModel::findByCustomSql($strQuery,array(),$arrOptions);
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$arrReturn[] = static::create( $objModel );
		}
		
		// add to cache
		$arrCache['ATTRIBUTE'][$strKey][$intId] = $arrReturn;
		Cache::setData($arrCache);
		
		return $arrReturn;
	}
	
	
	/**
	 * Find attributes by the custom element
	 * @param integer
	 * @return object	Database Result
	 */
	public static function fetchMultiplePublishedByCustomElement($intId, $arrOptions=array())
	{
		$strQuery = "tl_pct_customelement_attribute.pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid=".$intId.") AND tl_pct_customelement_attribute.published=1";
		return AttributeModel::findByCustomSql($strQuery,array(),$arrOptions);
	}
		
	
	/**
	 * Return the class defintion for an attribute by its type name
	 * @param string
	 * @return string
	 */
	public static function getAttributeClassByType($strName)
	{
		return $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$strName]['class'];
	}
	
	
	/**
	 * Return the system columns as array
	 * @return array
	 */
	public static function getSystemColumns()
	{
		return array('id','pid','tstamp','sorting');
	}
	
	
	/**
	 * Return a unique generic name
	 * @param object DataContainer
	 * @param string
	 * @param integer
	 * @return object DataContainer
	 */
	public static function generateUuid($objDC, $intLength=15, $strCharSet='1234567890abcdefghijklmnopqrstuvwxyz')
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$strTable = $objDC->table;
		if(isset($objDC->ref_table))
		{
			$strTable = $objDC->ref_table;
		}
		
		$objUuid = $objDatabase->prepare("SELECT id,uuid FROM ".$strTable." WHERE id=?")->limit(1)->execute($objDC->id);
		if($objUuid->numRows > 0 && strlen($objUuid->uuid) > 0)
		{
			return $objDC;
		}
		
		$strUuid = static::generatePassword($intLength,$strCharSet);
		
		$objSiblings = $objDatabase->prepare("SELECT id FROM ".$strTable." WHERE uuid=? AND id!=?")->limit(1)->execute($strUuid,$objDC->id);
		// generate a new uuid this one is taken
		if($objSiblings->numRows > 0)
		{
			return static::generateUuid($objDC,$intLength+1);
		}
		
		return $strUuid;
	}
	
	/**
	 * Generate a random string
	 * @param integer
	 * @return string
	 */
	public static function generatePassword($intLength=8,$strCharSet='')
	{
		if(!$strCharSet)
		{
			$strCharSet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		}
		
		$max = strlen($strCharSet);
		$rand = rand(0,$max);
		
		$return = '';
		for($i = 0; $i <= $intLength-1; $i++)
		{
			$rand = rand(0,$max);
			$return .= substr($strCharSet, $rand,1);
		}
		
		return $return;
	}
	
		
	/**
	 * Get the attribute id in the session registry by the generic name
	 * @param string
	 * @param integer
	 * @param string
	 * @return integer
	 */
	public static function getAttributeIdFromSession($strName,$intElement=0,$strTable='')
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession =  $objSession->get('pct_customelements');
		$arrRegistry = $arrSession['registry'];
		
		// use the global as fallback if session fails
		if(!$arrSession['registry'])
		{
			$arrRegistry = $GLOBALS['PCT_CUSTOMELEMENTS_REGISTRY'];
		}
		
		if(!$strTable)
		{
			$strTable = \Contao\Input::get('table');
		}
		
		if($intElement < 1)
		{
			$intElement = \Contao\Input::get('id');
		}
		
		if(empty($arrRegistry[$strTable]))
		{
			return null;
		}
				
		return $arrRegistry[$strTable][$intElement][$strName]['id'];		
	}
}