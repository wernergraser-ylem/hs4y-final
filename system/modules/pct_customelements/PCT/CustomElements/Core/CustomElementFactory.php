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
use PCT\CustomElements\Core\CustomElement;
use PCT\CustomElements\Core\CustomElements as CustomElements;
use PCT\CustomElements\Core\Cache as Cache;
use PCT\CustomElements\Models\CustomElementModel as CustomElementModel;


/**
 * Class file
 * CustomElementFactory
 */
class CustomElementFactory
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
			$objModel = new CustomElementModel($objModel,false);
		}
		
		$objReturn = new CustomElement();
		$objReturn->setData($objModel->row());
		$objReturn->setModel($objModel);
		
		// trigger the onFactoryCreate Hook
		\PCT\CustomElements\Core\Hooks::callstatic('onFactoryCreateHook',array($objReturn,$objModel));
		
		return $objReturn;
	}
	
	
	/**
	 * Find a CustomElement instance by an ID
	 * @param id
	 * @return object	Filter instance
	 */
	public static function findById($intId)
	{
		if(Cache::getCustomElement($intId))
		{
			return Cache::getCustomElement($intId);
		}
		
		$objModel = CustomElementModel::findByPk($intId);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		
		// add to cache
		Cache::addCustomElement($objModel->id,$objReturn);
		Cache::addCustomElement($objModel->alias,$objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Return the custom element model by its ID
	 * @param integer
	 * @return object CustomElement
	 */
	public static function fetchById($intId,$arrOptions=array())
	{
		return CustomElementModel::findByPk($intId,$arrOptions);
	}
	
	
	/**
	 * Return the CustomElement either by its alias or id
	 * @param mixed
	 * @return object
	 */
	public static function findByIdOrAlias($varCE,$arrOptions)
	{
		if(is_string($varCE) && !is_numeric($varCE))
		{
			return static::findById($varCE,$arrOptions);
		}
		return static::findByAlias($varCE,$arrOptions);
	}

	
	
	/**
	 * Return a CustomElement by its alias
	 * @param string
	 * @return object CustomElement
	 */
	public static function findByAlias($strAlias,$arrOptions=array())
	{
		if(Cache::getCustomElement($strAlias))
		{
			return Cache::getCustomElement($strAlias);
		}
		
		$objModel = CustomElementModel::findByAlias($strAlias, $arrOptions);
		if($objModel === null)
		{
			return null;
		}

		$objReturn = static::create( $objModel );
		
		// add to cache
		Cache::addCustomElement($objModel->id,$objReturn);
		Cache::addCustomElement($objModel->alias,$objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Return the database resqult by the alias
	 * @param string
	 * @return object CustomElement
	 */
	public static function fetchByAlias($strAlias,$arrOptions=array())
	{
		return CustomElementModel::findByAlias($strAlias, $arrOptions);
	}
	
	
	/**
	 * Return a customelement by an attribute id
	 * @param integer	Attribute id
	 * @return object
	 */
	public static function findByAttributeId($intAttribute,$arrOptions=array())
	{
		$strQuery = 'tl_pct_customelement.id=(SELECT pid FROM tl_pct_customelement_group WHERE id=(SELECT pid FROM tl_pct_customelement_attribute WHERE id=?) )';
		$arrWildcards = array($intAttribute);
		
		$objModel = CustomElementModel::findByCustomSql($strQuery,$arrWildcards,$arrOptions);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = static::create( $objModel );
		
		// add to cache
		Cache::addCustomElement($objModel->id,$objReturn);
		Cache::addCustomElement($objModel->alias,$objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Find all active custom elements and return as array
	 * @return array
	 */
	public static function findAll()
	{
		$objCollection = CustomElementModel::findAll();
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$arrReturn[] = static::create( $objModel );
			
			// add to cache
			Cache::addCustomElement($objModel->id,$objModel);
			Cache::addCustomElement($objModel->alias,$objModel);
		}
		
		return $arrReturn;
	}

	
	/**
	 * Return true if the custom element has been changed by a user e.g. after saving
	 * @param integer 	Timestamp
	 * @param string
	 * @return boolean 
	 */
	public static function hasChangedByTimestamp($intTstamp,$strAlias='')
	{
		if(strlen($strAlias) < 1)
		{
			if(\Contao\Input::get('act') != 'edit' || empty( \Contao\Input::get('table') ) )
			{
				return false;
			}
			
			$objActiveRecord = null;
			$strTable = \Contao\Input::get('table');
			$strModel = \Contao\Model::getClassFromTable($strTable);
			if(class_exists($strModel))
			{
				if( \method_exists($strModel,'setTable') )
				{
					$strModel::setTable( $strTable );
				}
				$objActiveRecord = $strModel::findByPk(\Contao\Input::get('id'));
			}
			
			if($objActiveRecord === null)
			{
				$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute(\Contao\Input::get('id'));
			}
			
			// get the selection field for the current table
			$selectionfield = CustomElements::getSelectionField($strTable);
			
			// check if it is a custom element we are in
			if(!static::isCustomElement($objActiveRecord->{$selectionfield},$strTable))
			{
			   return false;
			}
			
			$strAlias = $objActiveRecord->{$selectionfield};
		}
	
		$objResult = \PCT\CustomElements\Models\CustomElementModel::findByAlias($strAlias);
		
		return ($objResult->tstamp != $intTstamp ? true : false);
	}
	
	
	/**
	 * Return true if the name/alias is a custom element
	 * @param string
	 * @param string
	 * @return boolean
	 */
	public static function isCustomElement($strAlias)
	{
		return (\PCT\CustomElements\Models\CustomElementModel::findByAlias($strAlias) !== null ? true : false);
	}
}