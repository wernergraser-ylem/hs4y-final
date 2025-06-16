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


/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

use Contao\BackendTemplate;

/**
 * Class file
 * CustomElement
 */
class CustomElement extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		$arrReturn = array
		(
			'label'     			=> array($this->get('title'),$this->get('description')),
			'exclude'    			=> true,
			'inputType'    			=> 'pct_customelement',
			'input_field_callback'  => array(get_class($this),'generateCustomElementWidget'),
			'eval'					=> array_merge( $arrEval,array('genericAttribute'=>$this->id) ),
			'sql'					=> "varchar(128) NOT NULL default ''",
		);
		
		return $arrReturn;
	}
	
	
	/**
	 * Register the selection field for the customcatalog plugin and set the access level to the CC table
	 */
	public function prepareFieldCallback($arrData,$fieldName,$objAttribute,$objCC=null,$objCE=null,$objCaller=null)
	{
		if($objAttribute->get('type') != 'customelement')
		{
			return $arrData;
		}
		
		// add CC table to the tables affected by CE
		$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables'][] = $objCC->getTable();
		
		// set the selection field, the field saving the name of the CE
		$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']['customcatalog']['selectionfield'][$objCC->getTable()] = $objAttribute->get('alias');
		
		return $arrData;
	}


	/**
	 * Modify the dca for CustomCatalogs
	 * @param array		The current field data array
	 * @param string	The name of the field
	 * @param object	The Attribute instance
	 * @param object	The CustomCatalog configuration
	 * @param object	The CustomElement configuration
	 * @param object	The SystemIntegration instance
	 * @return array	The DCA array
	 * @called from prepareDataContainer CUSTOMCATALOG  HOOK
	 */
	public function modifyDca($arrDCA,$objCC,$objCE,$objSystemIntegration)
	{
		$objAttributes = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid=? GROUP BY id) AND type=?")->execute($objCE->get('id'),'customelement');
		if( $objAttributes->numRows < 1 )
		{
			return $arrDCA;
		}
		
		while( $objAttributes->next() )
		{
			$arrDCA['fields'][ $objAttributes->alias.'_data' ]['sql'] = 'longblob NULL';
		}
		
		return $arrDCA;
	}


	/**
	 * Generate the custom element widget
	 * @param object
	 * @return string
	 */
	public function generateCustomElementWidget($objDC)
	{
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findByAlias($objDC->field) ?: \PCT\CustomElements\Core\AttributeFactory::findByUuid($objDC->field);
		if(!$objAttribute)
		{
			return '';
		}
		
		$objCE = \PCT\CustomElements\Core\CustomElementFactory::findById($objAttribute->get('include_item'));
				
		if($objAttribute->get('include_item') < 1 || !$objCE)
		{
			return '';
		}
		
		// just to be sure, make the current table accessible for CE
		if(!\Contao\Input::get('table'))
		{
			\Contao\Input::setGet('table',$objDC->table);
		}
		
		// deactivate auto save for CE widget when just a subpalette changes
		if(\Contao\Input::post('FORM_SUBMIT') == $objDC->table && \Contao\Input::post('SUBMIT_TYPE') == 'auto')
		{
			\Contao\Input::setPost('FORM_SUBMIT','');
		}
			
		$objCE->setGenericAttribute($objAttribute->get('id'));
	
		// add the CE to the cache by alias
		\PCT\CustomElements\Core\Cache::addCustomElement($objCE->get('alias'),$objCE);
		
		$objActiveRecord = $objDC->activeRecord;
		$objActiveRecord->{$objDC->field} = $objCE->get('alias');
				
		$strName = $objCE->get('alias').'_'.$objAttribute->get('id');
		$objWidget = new $GLOBALS['BE_FFL']['pct_customelement']
		(
			array
			(
				'strId'    => $strName,
				'strTable' => $objDC->table,
				'strField' => $strName,
				'strName'  => $strName,
				'objDataContainer' => $objDC,
				'objActiveRecord' => $objActiveRecord,
				'objCustomElement' => $objCE,
				'intGenericAttribute'	=> $objAttribute->id,
			),
			$objDC
		);
		$objWidget->set('strSelectionField',$objDC->field);
		
		// set dynamic data field
		$GLOBALS['PCT_CUSTOMELEMENTS_DATA_FIELD'][$objDC->table][$objAttribute->id] = $objDC->field.'_data';
		
		$strBuffer = $objWidget->generate();
		
		if(\Contao\Input::post($objDC->field) || $objDC->activeRecord->tstamp > 0)
		{
			\Contao\Database::getInstance()->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set( array($objDC->field => $objCE->get('alias')) )->execute($objDC->id);
		}
		return $strBuffer;
	}
	
	
	/**
	 * Do not parse the widget in custom elements itself
	 * @param object	Widget
	 * @param string	Name of the field
	 * @param array		Field definition
	 * @param object	DataContainer
	 * @return string	HTML output of the widget
	 */
	public function parseWidgetCallback($objWidget, $strField, $arrFieldDef, $objDC, $varValue)
	{
		return $this->generateCustomElementWidget($objDC);		
	}
	
	
	/**
	 * Render the attribute and return html
	 * @return string
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$objCE = \PCT\CustomElements\Core\CustomElementFactory::findById($objAttribute->get('include_item'));
		
		// backend
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
		{
			$objCE->set('template','be_customelement_simple');
		}

		if(empty($objCE))
		{
			return $objTemplate->parse();
		}
		
		$objOrigin = $objAttribute->getOrigin();
		if($objOrigin === null)
		{
			if(\Contao\Config::get('debugMode'))
			{
				$objTemplate->value = '<p class="error">Missing origin object for attribute'.$objAttribute->get('id').'<p>';
			}
			return $objTemplate->parse();
		}
		
		$intOrigId = $objAttribute->get('include_item');
		$strTable = $objOrigin->getTable();
		$intElement = $objOrigin->get('intPid');
		$objCE->setGenericAttribute($objAttribute->get('id')); 
		$objCE->setOrigin( $objOrigin );
		
		// add the CC table to the allowed CE tables
		if(!in_array($strTable, $GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables']))
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables'][] = $strTable;
		}
		
		// is custom catalog
		if(\PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::validateByTableName($strTable))
		{
			$intElement = $objAttribute->getActiveRecord()->id;
			
			// reset the origin to the CC entry
			$objOrigin->set('intPid',$intElement);
			$objOrigin->set('strTable',$strTable);
			$objOrigin->set('objActiveRecord',$objAttribute->getActiveRecord());
			$objCE->setOrigin( $objOrigin );
			
			$arrData = $objCE->getData();
			$arrData['id'] = $intElement;
			$arrData['origId'] = $intOrigId;
			$objCE->setData($arrData);
			
			$objCE->set('id',$intElement);
			$objCE->set('origId',$intOrigId);
		}

		// custom template has been passed
		if( $this->get('template') != 'customelement_attr_default' && !empty($this->get('template')) )
		{
			$objCE->set( 'template', $this->get('template') );
			return $objCE->render();
		}

		// render the custom element
		$objTemplate->value = $objCE->render();
		$objTemplate->origin = $objCE->getOrigin();
		
		return $objTemplate->parse();
	}


	/**
	 * Show only the default palette in custom element widget
	 * @param array
	 * @return array
	 * called from getSqlQuery hook
	 */
	public function showDefaultPalette($arrOptions)
	{
		if($arrOptions['table'] != 'tl_pct_customelement_group')
		{
			return $arrOptions;
		}
		
		$arrOptions['columns'][] = array
		(
			'column' 	=> 'selector',
			'operation' => '=',
			'value'		=> " ",	
		);
		
		return $arrOptions;
	}
	
	
	/**
	 * Copy data
	 * @param integer
	 * @param string
	 * @param object
	 * @param object
	 * @called from $GLOBALS['CUSTOMELEMENTS_HOOKS']['createCopyInVault']
	 */
	public function createCopyInVault($intRecord,$strTable,$objDC,$objDcaHelper)
	{
		if( !\Contao\Database::getInstance()->tableExists('tl_pct_customelement_vault') )
		{
			return;
		}
		
		// check if entry has been successfully duplicated before
		$objWizard = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_vault WHERE pid=? AND source=? AND type=?")->limit(1)->execute($intRecord,$strTable,'wizard');
		if($objWizard->numRows > 0)
		{
			return;
		}
		$objDcaHelper->duplicateVaultEntry($intRecord,$objDC->id,$strTable);
	}
	

	/**
	 * Remove from Vault
	 * @param object
	 * @return array	IDS to remove
	 * called from $GLOBALS['CUSTOMELEMENTS_HOOKS']['removeFromVault']
	 */
	public function removeFromVault($intRecord,$strTable,$objDC)
	{
		if( !\Contao\Database::getInstance()->tableExists('tl_pct_customelement_vault') )
		{
			return array();
		}
		// remove data from vault
		$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_vault WHERE pid=? AND source=?")->execute($intRecord,$strTable);
		return $objResult->fetchEach('id');
	}
	
	
	/**
	 * Append dca actions oncopy, ondelete for CustomCatalog entries
	 * @param object
	 * called from $GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer']
	 */
	public function onloadCustomCatalogDataContainer($objDC)
	{
		$GLOBALS['TL_DCA'][$objDC->table]['config']['oncopy_callback'][] = array(get_class($this),'oncopyCustomCatalogEntry');
		$GLOBALS['TL_DCA'][$objDC->table]['config']['ondelete_callback'][] = array(get_class($this),'ondeleteCustomCatalogEntry');
	}


	/**
	 * Copy CE data when a customcatalog entry is being copied
	 * @param integer
	 * @param object
	 */
	public function oncopyCustomCatalogEntry($intRecord,$objDC)
	{
		$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance();
		$this->createCopyInVault($intRecord,$objDC->table,$objDC,$objDcaHelper);
	}
	
	
	/**
	 * Delete CE data when a customcatalog entry is being deleted
	 * @param integer
	 * @param object
	 */
	public function ondeleteCustomCatalogEntry($objDC)
	{
		\PCT\CustomElements\Core\Vault::removeById( $this->removeFromVault($objDC->id,$objDC->table,$objDC) );
	}
	
	
	/**
	 * Copy widget data when toggling languages
	 * @param object
	 * @param object
	 */
	public function onNewLanguageEntry($objInfo,$objDC)
	{
		$this->oncopyCustomCatalogEntry($objInfo->newId,$objDC);
	}


	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @param integer	Id of the Element ( >= CE 1.2.9)
	 * @param string	Name of the table ( >= CE 1.2.9)
	 * @return string
	 */
	public function processWildcardValue($varValue,$objAttribute,$intId,$strTable)
	{
		if($objAttribute->get('type') != 'customelement')
		{
			return $varValue;
		}

		$objTemplate = new BackendTemplate('be_customelement_wildcard');
		return $this->renderCallback($objAttribute->alias,$varValue,$objTemplate,$objAttribute);
	}
}
