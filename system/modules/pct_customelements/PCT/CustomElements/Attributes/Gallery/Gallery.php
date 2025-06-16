<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	AttributeGallery
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */

use PCT\CustomElements\Core\Controller;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * AttributeGallery
 */
class Gallery extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Tell the vault to store how to save the data (binary,blob)
	 * Leave empty to varchar
	 * @var boolean
	 */
	protected $saveDataAs = 'blob';
	
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		$arrEval['fieldType'] ='checkbox';
		$arrEval['multiple'] = true;
		$arrEval['isGallery'] = true;
		
		// toggle show files only or folders only
		$arrEval['files'] = $this->get('eval_files') ? 0 : 1;
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'fileTree',
			'eval'			=> $arrEval,
			'sql'			=> "blob NULL",
		);
		
		// make attribute sortable
		if($this->get('sortBy') == 'custom')
		{
			$arrReturn['sortable'] = true;
			$arrReturn['eval']['isSortable'] = true;
		}

		return $arrReturn;
	}
	
	
	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @param string
	 * @param array
	 * @param object
	 * @param mixed
	 * @return string
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC,$varValue)
	{
		if(!is_array($varValue) && !\Contao\Environment::get('isAjaxRequest') && !$objDC->submitted)
		{
			$varValue = explode(',', $varValue);
			$objWidget->__set('value',$varValue);
		}
		
		if(isset($_POST[$strField]))
		{
			// validate
			$objWidget->validate();
		}
		
		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}
		
		$strBuffer = $objWidget->parse();
		
		// load data container and language file
		ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
		ControllerHelper::callstatic('loadLanguageFile',array('tl_content'));
		
		$arrOptions = \Contao\StringUtil::deserialize($this->get('options'));
		if(empty($arrOptions) || !is_array($arrOptions))
		{
			return $strBuffer;
		}
		
		// size field 
		if(in_array('size', $arrOptions))
		{
			$strName = $strField.'_size';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['size'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// imagemargin field
		if(in_array('imagemargin', $arrOptions))
		{
			$strName = $strField.'_imagemargin';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['imagemargin'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// perRow field 
		if(in_array('perRow', $arrOptions))
		{
			$strName = $strField.'_perRow';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['perRow'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// fullscreen/new window field 
		if(in_array('fullsize', $arrOptions))
		{
			$strName = $strField.'_fullsize';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['fullsize'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// perPage field 
		if(in_array('perPage', $arrOptions))
		{
			$strName = $strField.'_perPage';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['perPage'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// numberOfItems field 
		if(in_array('numberOfItems', $arrOptions))
		{
			$strName = $strField.'_numberOfItems';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['numberOfItems'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		return $strBuffer;
	}
	
	
	/**
	 * Return the field definition for an options field
	 * @param string
	 * @return array
	 */
	public function getOptionFieldDefinition($strOption)
	{
		$arrReturn = $GLOBALS['TL_DCA']['tl_content']['fields'][$strOption] ?? array();
		$arrReturn['saveDataAs'] = 'varchar';

		if( $strOption == 'perRow' )
		{
			$arrReturn['sql'] = "varchar(5) NOT NULL default '4'";
		}

		if( \in_array($strOption, array('perPage','numberOfItems')) )
		{
			$arrReturn['sql'] = "varchar(5) NOT NULL default '0'";
		}

		if( \in_array($strOption, array('fullsize')) )
		{
			$arrFieldDef['sql'] = "char(1) NOT NULL default ''";
		}
		
		return $arrReturn;
	}


	/**
	 * Generate the attribute in the frontend
	 * @param string
	 * @param mixed
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @return string
	 * called renderCallback method
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		// catch empty arrays in case contao saves an array with an empty string on first index
		if(is_array($varValue))
		{
			$varValue = array_filter($varValue);
		}
		
		if(empty($varValue))
		{
			return $objTemplate->parse();
		}
		
		
		$objOrigin = $objAttribute->getOrigin();
		$objOrig = $objAttribute->getActiveRecord();
		
		$objActiveRecord = new \Contao\ContentModel();
		$objActiveRecord->mergeRow( $objOrig->row() );
		$objActiveRecord->__set('strPk',$objActiveRecord->id);
		$objActiveRecord->autogrid = 0;
		$objActiveRecord->cssID = $objAttribute->get('cssID');
		$objActiveRecord->isCustomElement = true;

		$arrOptionValues = array();
		$objGallery = new \Contao\ContentGallery($objActiveRecord);
		
		$blnIsCustomElement = true;
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		if(in_array('pct_customelements_plugin_customcatalog', $bundles) && isset($objOrigin) )
		{
			if(\PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::validateByTableName($objOrigin->getTable()) == true)
			{
				$blnIsCustomElement = false;
				
				$strField = $objAttribute->get('alias');
			 	$arrOptionValues = array();
			 	$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
			 	if(!empty($arrOptions) && is_array($arrOptions))
			 	{
				 	foreach($arrOptions as $strOption)
				 	{
					 	$arrOptionValues[$strOption] = $objActiveRecord->{$strField.'_'.$strOption};
				 	}
			 	}
			 	$objAttribute->setOptionValues($arrOptionValues);
			 	$arrOptionValues['orderSRC'] = $objActiveRecord->{'orderSRC_'.$strField};
			}
		}
		
		if($blnIsCustomElement)
		{
			$arrOptionValues = $objAttribute->loadOptionValues($strField);
			$varValue = explode(',', $varValue);
		}

		if( Controller::isBackend() && is_array($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['gallery']['backendWildcardSize']))
		{
			$arrOptionValues['size'] = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['gallery']['backendWildcardSize'];
			$arrOptionValues['perRow'] = 8;
			$arrOptionValues['perPage'] = 0;
			$arrOptionValues['fullsize'] = 0;
		}
		
		// default size
		$arrSize = $objAttribute->get('size');
		
		if(isset($arrOptionValues['size']))
		{
			$arrSize = $arrOptionValues['size'];
		}
		
		$objGallery->type = 'gallery';
		$objGallery->size = \Contao\StringUtil::deserialize($arrSize);
		$objGallery->imagemargin = $arrOptionValues['imagemargin'] ?? 0;
		$objGallery->perRow = $arrOptionValues['perRow'] ?? 3;
		$objGallery->perPage = $arrOptionValues['perPage'] ?? 0;
		$objGallery->fullsize = $arrOptionValues['fullsize'] ?? 0;
		$objGallery->multiSRC = $varValue;
		$objGallery->sortBy = $this->get('sortBy');
		$objGallery->orderSRC = $arrOptionValues['orderSRC'] ?? $varValue;
		$objGallery->galleryTpl = $this->get('galleryTpl');
		$objGallery->numberOfItems = $arrOptionValues['numberOfItems'] ?? 0;
		// generate the gallery
		$objTemplate->value = $objGallery->generate();
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @param integer	Id of the Element ( >= CE 1.2.9)
	 * @param string	Name of the table ( >= CE 1.2.9)
	 * @return string
	 */
	 public function processWildcardValue($varValue,$objAttribute,$intElement=0,$strTable='')
	 {
		if($objAttribute->get('type') != 'gallery')
	 	{
	 		return $varValue;
	 	}
	 	
	 	if( (!$objAttribute->getOrigin() && $intElement < 1 && empty($varValue)) )
	 	{
		 	return '';
	 	}
	 	
	 	$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($intElement);
		$objAttribute->set('objActiveRecord',$objActiveRecord);
		 	
	 	$objTemplate = new \Contao\FrontendTemplate($objAttribute->get('template'));
		 
		// is a custom catalog
		$blnIsCustomElement = true;
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
	 	if( in_array('pct_customelements_plugin_customcatalog',$bundles) )
	 	{
		 	if(\PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findCurrent() || \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::validateByTableName($strTable) == true)
		 	{
			 	$blnIsCustomElement = false;
			 	
			 	$strField = $objAttribute->get('alias');
			 	
			 	$arrOptionValues = array();
			 	$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
			 	if(count($arrOptions) > 0)
			 	{
				 	foreach($arrOptions as $strOption)
				 	{
					 	$arrOptionValues[$strOption] = $objActiveRecord->{$strField.'_'.$strOption};
				 	}
			 	}
			 	$objAttribute->setOptionValues($arrOptionValues);
			 	
			 	$strBuffer = $this->renderCallback($strField,$varValue,$objTemplate,$objAttribute);
		 	}
	 	}
	 	// render the wildcard for a custom element item
	 	
	 	if($blnIsCustomElement)
	 	{
	 	 	$strField = $objAttribute->get('uuid');
		 	
		 	$objOrigin = \PCT\CustomElements\Core\Origin::getInstance();
		 	$objOrigin->set('intPid',$intElement);
		 	$objOrigin->set('strTable',$strTable);
		 	$objAttribute->setOrigin($objOrigin);
		 	
		 	$strBuffer = $this->renderCallback($strField,$varValue,$objTemplate,$objAttribute);
		}
		
		return $strBuffer;
	 }

	
}