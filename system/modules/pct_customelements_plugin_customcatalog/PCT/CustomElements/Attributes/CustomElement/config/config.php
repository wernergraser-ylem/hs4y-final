<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @attribute	CustomElement includer
 * @link		http://contao.org
 */

use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

 // support CE DCA from CE attributes in popups and in their ajax reload
 if( Controller::isBackend() && (\Contao\Input::get('act') == 'show' || (\Contao\Input::post('name') != '' && \Contao\Environment::get('isAjaxRequest')) ) )
 {
	\PCT\CustomElements\Loader\AttributeLoader::load('customelement');
	
	$arrCC_Models = array();
	if(\Contao\Input::get('table'))
	{
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchByTableName(\Contao\Input::get('table'));
		if($objCC !== null)
		{
			$arrCC_Models = array($objCC);
		}
	}
	else
	{
		$arrCC_Models = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchAllActive();
	}
	
	// @var object
	$objSystemIntegration = new \PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration;
	// init backend modules
	$objSystemIntegration->createBackendModules();
									
	if(!empty($arrCC_Models))
	{
		$arrCEids = array();
		foreach($arrCC_Models as $objCC_Model)
		{
			$arrCEids[] = $objCC_Model->pid;
		}
		
		$arrCEids = array_filter(array_unique($arrCEids));
		
		$objDatabase = \Contao\Database::getInstance();
				
		// fetch the related CE widget attributes
		$objCEAttributes = null;
		if(count($arrCEids) > 0)
		{
			$objCEAttributes = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE published=1 AND pid IN (SELECT id FROM tl_pct_customelement_group WHERE published=1 AND pid IN(".implode(',',$arrCEids).") GROUP BY id) AND ".$objDatabase->findInSet('type',array('customelement')))->execute();
		}	
		
		// atleast one CC has a customelement attribute
		if($objCEAttributes->numRows > 0)
		{
			while($objCEAttributes->next())
			{
				foreach($arrCC_Models as $objDbCCs)
				{
					$strTable = ($objDbCCs->mode == 'new' ? $objDbCCs->tableName : $objDbCCs->existingTable);
					// add the CC table to the CE allowed tables
					$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables'][] = $strTable;
					
					// add the selection field
					$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']['customcatalog']['selectionfield'][$strTable] = $objCEAttributes->alias;
					
					$objCE = \PCT\CustomElements\Core\CustomElementFactory::findById($objDbCCs->pid);
					
					if($objCE === null)
					{
						continue;
					}
					
					$objCE->setGenericAttribute($objCEAttributes->id);
					
					$objDC = new StdClass;
					$objDC->table = $strTable;
					$objDC->id = \Contao\Input::get('id');
					
					// load the CustomCatalog DCA
					#$objSystemIntegration->loadDCA($strTable);
					
					#$arrFields = $objCE->getFieldsForDca($objDC);
					$arrGroups = \PCT\CustomElements\Core\Vault::getWizardData($objDC->id,$objDC->table,$objCEAttributes->id);
		
					// new structure
					if(isset($arrGroups['alias']))
					{
						$arrGroups = $arrGroups['groups'];
					}
					
					if(empty($arrGroups))
					{
						continue;
					}
		
					$arrFields = array();
					foreach($arrGroups as $group)
					{
						if(empty($group['attributes']))
						{
							continue;
						}
						
						foreach($group['attributes'] as $attr)
						{
							$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($attr['id']);
							if(!$objAttribute)
							{
								continue;
							}
							$objAttribute->set('uuid',$attr['uuid']);
							
							$strField = $objAttribute->get('uuid');
							$arrFieldDef = $objAttribute->getFieldDefinition();

							$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $arrFieldDef;
						}
					}
				}
			}
		}
	}
	$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables'] = array_unique($GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables']);	
}
			

/**
 * Hooks
 */
$GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField'][]  = array('PCT\CustomElements\Attributes\CustomElement','prepareFieldCallback');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['sqlQuery'][]   = array('PCT\CustomElements\Attributes\CustomElement','showDefaultPalette');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['createCopyInVault'][] = array('PCT\CustomElements\Attributes\CustomElement','createCopyInVault');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['removeFromVault'][] = array('PCT\CustomElements\Attributes\CustomElement','removeFromVault');
$GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'][] = array('PCT\CustomElements\Attributes\CustomElement','onloadCustomCatalogDataContainer');
$GLOBALS['CUSTOMCATALOG_HOOKS']['newLanguageEntry'][] = array('PCT\CustomElements\Attributes\CustomElement','onNewLanguageEntry');
$GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDataContainer'][] = array('PCT\CustomElements\Attributes\CustomElement','modifyDca');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue'][] 	= array('PCT\CustomElements\Attributes\CustomElement','processWildcardValue');
