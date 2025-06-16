<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
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

use Contao\Message;
use PCT\CustomElements\Core\Cache as Cache;
use Contao\System;

/**
 * Class file
 * SystemIntegration
 */
class SystemIntegration
{
	/**
	 * Initialize
	 */
	public function initSystem()
	{
		$blnInstallTool = false;
		if(strlen(strpos(\Contao\Environment::get('scriptName'), '/contao/install.php')) > 0 || strlen(strpos(\Contao\Environment::get('requestUri'), '/contao/install')) > 0 || strlen(strpos(\Contao\Environment::get('requestUri'), '/contao-manager.phar')) > 0)
		{
			$blnInstallTool = true;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$objRegistry = \Contao\Model\Registry::getInstance();
		$arrCache = Cache::getData();
		
		if(!$objDatabase->tableExists('tl_pct_customelement') || $blnInstallTool === true)
		{
			return;
		}
		
		//-- Cache CEs
		$objCustomElements = $objDatabase->prepare("SELECT * FROM tl_pct_customelement WHERE alias!='' AND tstamp > 0 ORDER BY title")->execute();
				
		if($objCustomElements->numRows > 0)
		{
			while($objCustomElements->next())
			{
				$strAlias = $objCustomElements->alias;

				if($objCustomElements->isCTE)
				{
					// use default class
					if(!isset($GLOBALS['TL_CTE']['pct_customelements_node'][$strAlias]))
					{
						$GLOBALS['TL_CTE']['pct_customelements_node'][$strAlias] = $GLOBALS['PCT_CUSTOMELEMENTS']['TL_CTE'];
					}

					// set name
					if( !isset($GLOBALS['TL_LANG']['CTE'][$strAlias]) )
					{
						$GLOBALS['TL_LANG']['CTE'][$strAlias] = array($objCustomElements->title,$strAlias);
					}

					// store the alias
					$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ACTIVE']['tl_content']['alias'][] = $strAlias;
				}
				if($objCustomElements->isFMD)
				{
					// use default class
					if(  !isset($GLOBALS['FE_MOD']['pct_customelements_node'][$strAlias]) )
					{
						$GLOBALS['FE_MOD']['pct_customelements_node'][$strAlias] = $GLOBALS['PCT_CUSTOMELEMENTS']['TL_FMD'];
					}

					if( !isset($GLOBALS['TL_LANG']['FMD'][$strAlias]) )
					{
						$GLOBALS['TL_LANG']['FMD'][$strAlias] = array();
					}

					// set name
					$GLOBALS['TL_LANG']['FMD'][$strAlias] = array($GLOBALS['TL_LANG']['FMD'][$strAlias] ?: $objCustomElements->title,$strAlias);
					
					// store the alias
					$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ACTIVE']['tl_module']['alias'][] = $strAlias;
				}
				
				$objCE = \PCT\CustomElements\Core\CustomElementFactory::create($objCustomElements);
				
				// add CE to the cache
				Cache::addCustomElement($objCE->id,$objCE);
				Cache::addCustomElement($objCE->alias,$objCE);
				
				// set Wrapper elements
				if($objCustomElements->isWrapper == 'start')
				{
					$GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['start'][] = $strAlias;
				}
				if($objCustomElements->isWrapper == 'stop')
				{
					$GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['stop'][] = $strAlias;
				}
				if($objCustomElements->isWrapper == 'divider')
				{
					$GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['separator'][] = $strAlias;
				}
				
				// reset the group name to avoid "Meine Inhaltselemente (-CE-Title-)"
				if( in_array($objCustomElements->isWrapper, array('start','stop')) && \Contao\Input::get('act') == '' )
				{
					$GLOBALS['TL_LANG']['CTE']['pct_customelements_node'] = '';
				}
				
			}
		}
		
		if($objCustomElements->numRows > 0)
		{
			//-- Cache groups
			$objGroups = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE tstamp > 0 AND pid IN(".implode(',',$objCustomElements->fetchEach('id')).")")->execute();
			if($objGroups->numRows > 0)
			{
				while($objGroups->next())
				{
					$objGroup = \PCT\CustomElements\Core\GroupFactory::create($objGroups);
					if($objGroup === null)
					{
						continue;
					}
					
					$objCE = \PCT\CustomElements\Core\CustomElementFactory::findById($objGroup->pid);
					
					Cache::addGroup($objGroup->id,$objGroup);
					Cache::addGroup('ce_'.$objCE->id.'_'.$objGroup->alias,$objGroup);
					Cache::addGroup('ce_'.$objCE->alias.'_'.$objGroup->alias,$objGroup);
				}
			}
		
			if($objGroups->numRows > 0)
			{
				//-- Cache attributes
				$objAttributes = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE tstamp > 0 AND pid IN(".implode(',',$objGroups->fetchEach('id')).")")->execute();
				if($objAttributes->numRows > 0)
				{
					while($objAttributes->next())
					{
						$objAttribute = \PCT\CustomElements\Core\AttributeFactory::create($objAttributes);
						if($objAttribute === null)
						{
							continue;
						}
						$objGroup = \PCT\CustomElements\Core\GroupFactory::findById($objAttributes->pid);
						$objCE = \PCT\CustomElements\Core\CustomElementFactory::findById($objGroup->pid);

						Cache::addAttribute($objAttribute->id,$objAttribute);
						Cache::addAttribute('ce_'.$objCE->id.'_'.$objAttribute->alias, $objAttribute );
						if( isset($objAttribute->uuid) && !empty($objAttribute->uuid) )
						{
							Cache::addAttribute($objAttribute->uuid,$objAttribute);
							Cache::addAttribute('ce_'.$objCE->id.'_'.$objAttribute->uuid, $objAttribute );
							Cache::addAttribute('ce_'.$objCE->alias.'_'.$objAttribute->uuid, $objAttribute );
						}	
					}
				}
			}
		}
	}
	
	
	/**
	 * Store the Ids of the generated customelements
	 * @param object
	 * @param boolean
	 * @return boolean
	 */
	public function onIsVisibleElement($objElement, $blnIsVisible)
	{
		if(!$blnIsVisible)
		{
			return $blnIsVisible;
		}
		
		$strTable = $objElement->getTable();
		$strType = $objElement->type;
		
		// include module
		if($strType == 'module' && $strTable == 'tl_content')
		{
			$objModuleModel = \Contao\ModuleModel::findByPk($objElement->module);
			return $this->onIsVisibleElement($objModuleModel, $blnIsVisible);
		}
		
		if(!is_array($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ACTIVE'][$strTable]['alias']))
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ACTIVE'][$strTable]['alias'] = array();
		}
		
		// remember the id of the element to laod the wizard data later
		if(in_array($strType, $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ACTIVE'][$strTable]['alias']))
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['ACTIVE'][$strTable]['ids'][] = $objElement->id;
		}
		
		return $blnIsVisible;
	}


	/**
	 * Checks if the deprected vault sill contains extries and displays a backend info.
	 */
	public function showVaultMigrationAlert()
	{
		if( Controller::isBackend() === false )
		{
			return;
		}

		$objDatabase = \Contao\Database::getInstance();
		if( !$objDatabase->tableExists('tl_pct_customelement_vault') )
		{
			unset( $GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE']['resolveVault'] );
			return;
		}
		
		$objUser = System::importStatic('Contao\BackendUser', 'User');
		if( $objUser->id === null )
		{
			return;
		}

		$objResult = $objDatabase->prepare("SELECT COUNT(*) as count FROM tl_pct_customelement_vault WHERE ".$objDatabase->findInSet('source',$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables']))->execute();
		if( $objResult->count < 1 )
		{
			return;
		}
		
		System::loadLanguageFile('default');

		Message::addError('<a href="'.\Contao\Controller::addToUrl('do=maintenance').'">'.$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['migrateVaultAlert'].'</a>');
	}
}