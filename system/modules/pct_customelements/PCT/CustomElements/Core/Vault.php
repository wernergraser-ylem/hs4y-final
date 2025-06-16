<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @link  http://contao.org
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
use Contao\System;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Models\AttributeModel;

/**
 * Class file
 * Vault
 * Provide methods to load and save attribute information to the database
 */
class Vault
{
	/**
	 * Vault table
	 * @var string
	 */
	protected static $strTable   = 'tl_pct_customelement_vault';

	/**
	 * Binary attribute types
	 * @var array
	 */
	protected static $arrBinary  = array('file','files');

	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;

	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance()
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static();
		}

		return static::$objInstance;
	}

	/**
	 * Save the wizzard data
	 * @param integer
	 * @param string
	 * @return mixed
	 */
	public static function saveWizardData($arrValue,$intPid,$strTable='tl_content',$arrOptions=array())
	{
		if( empty($arrValue) )
		{
			return;
		}
		
		$objDatabase = Database::getInstance();

		if( $objDatabase->tableExists($strTable) === false )
		{
			return array();
		}

		$intGenericAttribute = $arrOptions['attr_id'] ?? 0;

		// table.pct_customelement
		$strField = $GLOBALS['PCT_CUSTOMELEMENTS']['sourceField'][ $strTable ] ?? 'pct_customelement';
		if( $objDatabase->fieldExists('pct_customelement',$strTable) )
		{
			$strField = 'pct_customelement';
		}
		
		if( $intGenericAttribute > 0 )
		{
			$strField = AttributeModel::findByPk( $intGenericAttribute )->alias . '_data';
		}

		// dynamic data field
		if( isset($GLOBALS['PCT_CUSTOMELEMENTS_DATA_FIELD'][$strTable][$intGenericAttribute]) )
		{
			$strField = $GLOBALS['PCT_CUSTOMELEMENTS_DATA_FIELD'][$strTable][$intGenericAttribute];
		}

		if( empty($strField) === true )
		{
			return array();
		}

		// return if field does not exist
		if( !$objDatabase->fieldExists($strField,$strTable) )
		{
			return array();
		}

		$objDatabase->prepare("UPDATE $strTable %s WHERE id=?")->set( array( $strField => $arrValue ) )->execute($intPid);
		
		if(!\Contao\Environment::get('isAjaxRequest') && $objDatabase->tableExists(static::$strTable))
		{
			// log
			System::getContainer()->get('monolog.logger.contao.general')->info( 'CustomElement has been saved: '.$strTable.'.id='.$intPid );

			// delete the vault entry
			$objVault = $objDatabase->prepare("SELECT * FROM ".static::$strTable." WHERE pid=? AND source=? AND type=? ".($intGenericAttribute ? " AND attr_id=".$intGenericAttribute : "") )->limit(1)->execute($intPid,$strTable,'wizard');
			if($objVault->numRows > 0)
			{
				$objDatabase->prepare("DELETE FROM ".static::$strTable." WHERE id=?")->execute($objVault->id);
				System::getContainer()->get('monolog.logger.contao.general')->info( 'Vault entry id='.$objVault->id.' has been deleted.' );
			}
		}
	}
	
	
	/**
	 * Return the wizard data as array
	 * @param integer	ID of the element
	 * @param string	Name of the source / table
	 * @param integer	ID of the generic attribute
	 * @return array
	 */
	public static function getWizardData($intPid,$strTable,$intGenericAttribute=0)
	{
		if($intPid < 1 || strlen($strTable) < 1)
		{
			return array();
		}
		
		if( Cache::getWizard($intPid,$strTable,$intGenericAttribute) )
		{
			return Cache::getWizard($intPid,$strTable,$intGenericAttribute);
		}

		$objDatabase = Database::getInstance();
		
		if( $objDatabase->tableExists($strTable) === false )
		{
			return array();
		}

		// table.pct_customelement
		
		$strField = isset($GLOBALS['PCT_CUSTOMELEMENTS']['sourceField'][ $strTable ]) ? $GLOBALS['PCT_CUSTOMELEMENTS']['sourceField'][ $strTable ] : 'pct_customelement';
		if( $objDatabase->fieldExists('pct_customelement',$strTable) === false )
		{
			$strField = 'pct_customelement';
		}
		
		if( $intGenericAttribute > 0 )
		{
			$strField = AttributeModel::findByPk( $intGenericAttribute )->alias . '_data';
		}

		// dynamic data field
		if( isset($GLOBALS['PCT_CUSTOMELEMENTS_DATA_FIELD'][$strTable][$intGenericAttribute]) )
		{
			$strField = $GLOBALS['PCT_CUSTOMELEMENTS_DATA_FIELD'][$strTable][$intGenericAttribute];
		}

		if( empty($strField) === true )
		{
			return array();
		}

		// return if field does not exist
		if( $objDatabase->fieldExists($strField,$strTable) === false )
		{
			return array();
		}

		$arrReturn = array();
		
		// fetch from table.field
		$objWizard = $objDatabase->prepare("SELECT $strField FROM $strTable WHERE id=?")->limit(1)->execute($intPid);
		
		// try fallback and fetch from the vault when empty
		if( $objDatabase->tableExists(static::$strTable) && (empty( $objWizard->{$strField} ) === true || \is_string( StringUtil::deserialize($objWizard->{$strField}) ) ) )
		{
			$objWizard = $objDatabase->prepare("SELECT data_blob FROM ".static::$strTable." WHERE pid=? AND source=? AND type=? ".($intGenericAttribute ? " AND attr_id=".$intGenericAttribute : "") )->limit(1)->execute($intPid,$strTable,'wizard');
			if($objWizard->numRows > 0)
			{
				$arrReturn = StringUtil::deserialize($objWizard->data_blob);
			}
		}
		else
		{
			$arrReturn = StringUtil::deserialize($objWizard->{$strField});
		}
		
		// do not cache when empty anyways
		if( empty($arrReturn) === true )
		{
			return array();
		}

		// add to the cache
		Cache::addWizard($intPid,$strTable,$intGenericAttribute,$arrReturn);
		
		return $arrReturn;
	}

	/**
	 * Return the value of an attribute
	 * @param integer
	 * @param string
	 * @return mixed
	 */
	public static function getAttributeValueByUuid($strField,$intPid,$strTable,$arrOptions=array())
	{
		$arrWizard = static::getWizardData($intPid,$strTable,$arrOptions['genericAttribute'] ?? 0);
		if(empty($arrWizard))
		{
			return null;
		}
		
		// handle generic child option fields
		$strChildField = '';
		if(strlen(strpos($strField, '_')))
		{
			$arrFieldName = explode('_', $strField);
			$strField = $arrFieldName[0];
			$strChildField =  $arrFieldName[1];
		}
		
		$varReturn = null;
		
		//-- look up from wizard
		if(isset($arrWizard['values'][$strField]) && strlen($strChildField) < 1)
		{
			// binary data
			if($arrOptions['saveDataAs'] == 'binary')
			{
				// is up to date
				if(\Contao\Validator::isBinaryUuid($arrWizard['values'][$strField]))
				{
					$varReturn = $arrWizard['values'][$strField];
				}
				else if(\Contao\Validator::isStringUuid($arrWizard['values'][$strField]))
				{
					$varReturn = \Contao\StringUtil::uuidToBin($arrWizard['values'][$strField]);
				}
			}
			else
			{
				$varReturn = $arrWizard['values'][$strField];
			}
		}
		
		if(isset($arrWizard['values'][$strField.'_'.$strChildField]) && strlen($strChildField) > 0)
		{
			$varReturn = $arrWizard['values'][$strField.'_'.$strChildField];
		}
		
		return $varReturn;
	}
	
	
	/**
	 * Return boolean true if a field has been saved before
	 * @param string
	 * @param integer
	 * @param string
	 */
	public static function fieldExists($strField,$intPid,$strTable)
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists(static::$strTable) )
		{
			return;
		}

		$arrWizard = static::getWizardData($intPid,$strTable);
		
		// widget has not been saved before at all
		if( !isset($arrWizard['uuids']) || !is_array($arrWizard['uuids']))
		{
			return false;
		}
		
		if(in_array($strField, $arrWizard['uuids']))
		{
			return true;
		}
		
		// fallback
		$objEntry = $objDatabase->prepare("SELECT id FROM tl_pct_customelement_vault WHERE attr_uuid=? AND pid=? AND source=?")->limit(1)->execute($strField,$intPid,$strTable);
		if($objEntry->numRows > 0 || $objEntry->id > 0)
		{
			return true;
		}
		
		return false;
	}
	

	/**
	 * Public static function to retrieve a value from the vault
	 * @param string
	 * @param integer
	 * @param string
	 */
	public static function getValue($strField,$intPid,$strTable,$arrOptions=array())
	{
		return static::getInstance()->getAttributeValueByUuid($strField,$intPid,$strTable,$arrOptions);
	}

	/**
	 * Remove attributes from vault
	 * @param array
	 */
	public static function removeAttributes($arrUuids,$intPid=0,$bolLog=true)
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists(static::$strTable) )
		{
			return;
		}

		if(empty($arrUuids))
		{
			return;
		}

		if(!is_array($arrUuids))
		{
			$arrUuids = array($arrUuids);
		}

		$objDatabase->execute("DELETE FROM ".static::$strTable." WHERE ".($intPid > 0 ? " pid=".$intPid." AND ":"").\Contao\Database::getInstance()->findInSet('attr_uuid',$arrUuids));
	
		// log
		if($bolLog)
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('DELETE FROM '.static::$strTable.' WHERE attr_uuid IN('.implode(',', $arrUuids).')');
		}
	}

	/**
	 * Remove attributes and generic attributes from vault
	 * @param array
	 */
	public static function removeAttributesById($arrIds,$bolLog=true)
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists(static::$strTable) )
		{
			return;
		}

		if(empty($arrIds))
		{
			return;
		}

		if(!is_array($arrIds))
		{
			$arrIds = array($arrIds);
		}

		$objDatabase->execute("DELETE FROM ".static::$strTable." WHERE ".\Contao\Database::getInstance()->findInSet('attr_id',$arrIds));
	
		// log
		if($bolLog)
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('DELETE FROM '.static::$strTable.' WHERE attr_id IN('.implode(',', $arrIds).')');
		}
	}


	/**
	 * Remove attributes and generic attributes from vault
	 * @param array
	 */
	public static function removeById($arrIds,$bolLog=true)
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists(static::$strTable) )
		{
			return;
		}

		if(empty($arrIds))
		{
			return;
		}

		if(!is_array($arrIds))
		{
			$arrIds = array($arrIds);
		}

		\Contao\Database::getInstance()->execute("DELETE FROM ".static::$strTable." WHERE ".\Contao\Database::getInstance()->findInSet('id',$arrIds));
	
		// log
		if($bolLog)
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('DELETE FROM '.static::$strTable.' WHERE id IN('.implode(',', $arrIds).')');
		}
	}


	/**
	 * Clean the vault from obsolete data
	 * @param string
	 * @param array
	 * @param string
	 * @param array
	 * called from daily cron job HOOK
	 */
	public function purgeVaultCronJob()
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists(static::$strTable) )
		{
			return;
		}

		// purge old session data
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objSession->remove('pct_customelements');
		$objSession->remove('loadCustomElementFields');
		//--
		
		$objCustomElement = \PCT\CustomElements\Core\CustomElements::getInstance();
		
		// get all allowed tables
		$arrTables = $objCustomElement->getAllowedTables();
		if(empty($arrTables))
		{
			// log finished
			return;
		}
		
		$arrObsolete = array(); // collect vault ids that can be removed
		foreach($arrTables as $strSource)
		{
			// fetch vault data
			$objVault = $objDatabase->prepare("SELECT * FROM ".static::$strTable." WHERE source=?")->execute($strSource);
			if($objVault->numRows < 1)
			{
				continue;
			}
			
			$selectfield = $objCustomElement::getSelectionField($strSource);
			$arrCustomElements = $objCustomElement->getCustomElements($strSource);
			
			// check if the corresponding parent record still exists
			while($objVault->next())
			{
				$objParent = $objDatabase->prepare("SELECT id,".$selectfield." FROM ".$strSource." WHERE id=?")->execute($objVault->pid);
				if($objParent->numRows < 1)
				{
					$arrObsolete[] = $objVault->id;
				}
				
				// check if the element still is a customelement
				$strCustomElement = $objParent->$selectfield;
				if(!in_array($strCustomElement, $arrCustomElements))
				{
					$arrObsolete[] = $objVault->id;
				}
			}
		}
		
		$arrObsolete = array_unique($arrObsolete);
		
		if(count($arrObsolete) < 1)
		{
			// log finished
			return;
		}
		
		static::removeById($arrObsolete,false);
		
		// log finished
	}
	
	
	/**
	 * Purge vault entries that does not exist anymore
	 * @called from reviseTable
	 */
	public function purgeVault()
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists(static::$strTable) )
		{
			return;
		}

		$objCustomElement = \PCT\CustomElements\Core\CustomElements::getInstance();
		
		// get all allowed tables
		$arrTables = $objCustomElement->getAllowedTables();
		if(empty($arrTables))
		{
			return;
		}
		
		$objVault = $objDatabase->prepare("SELECT * FROM ".static::$strTable." WHERE ".$objDatabase->findInSet('source',$arrTables))->execute();
		if( $objVault->numRows < 1 )
		{
			return;
		}
		
		$arrIds = array();
		foreach($arrTables as $strSource)
		{
			$arrCustomElements = $objCustomElement->getCustomElements($strSource);
			
			$objVault = $objDatabase->prepare("SELECT * FROM ".static::$strTable." 
			WHERE 
				source=? 
				AND 
				( 
					pid NOT IN ( SELECT id FROM ".$strSource." WHERE ".$objDatabase->findInSet('type',$arrCustomElements).")
			)")->execute($strSource);
			
			if( $objVault->numRows < 1 )
			{
				continue;
			}
			
			$arrIds = array_merge($arrIds, $objVault->fetchEach('id'));			
		}
		
		static::removeById($arrIds,false);	
	}
	
	
	/**
	 * Purge duplicate entries
	 * @called from reviseTable
	 */
	public function purgeDuplicates()
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists(static::$strTable) )
		{
			return;
		}
		
		$objResult = $objDatabase->prepare("SELECT pid,COUNT(*) FROM ".static::$strTable." GROUP BY pid HAVING (COUNT(*) > 1)")->execute();
		if($objResult->numRows < 1)
		{
			return;
		}
		
		$objDups = $objDatabase->prepare("SELECT * FROM ".static::$strTable." WHERE pid IN(".implode(',', $objResult->fetchEach('pid')).")")->execute();
		
		$pid = 0;
		$type = '';
		$attr_id = 0;
		$source = '';
		while( $objDups->next() )
		{
			if( $pid == $objDups->pid && $type == $objDups->type && $attr_id == $objDups->attr_id && $source == $objDups->source )
			{
				$arrIds[] = $objDups->id;
			}
			$pid = $objDups->pid;
			$type = $objDups->type;
			$attr_id = $objDups->attr_id;
			$source = $objDups->source;
		}
		
		static::removeById($arrIds,false);
	}
	
}