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
 * @filter		Geolocation filter
 * @link		http://contao.org
 */

/**
 * Load language files
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile('tl_pct_customelement_filter','geolocation');		

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'geolocation';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'attr_id';
$arrPalettes['settings_legend'][] = 'label';
$arrPalettes['settings_legend'][] = 'min_value';
$arrPalettes['settings_legend'][] = 'max_value';
$arrPalettes['settings_legend'][] = 'steps_value';
$arrPalettes['settings_legend'][] = 'defaultValue';
$arrPalettes['settings_legend'][] = 'defaultMulti';
if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_geosearch'));
	}

	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);
	
	// set the template selection default value
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['template']['default'] = 'customcatalog_filter_range';
	
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['defaultValue'][$strType];
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['eval'] = array('tl_class'=>'clr','size'=>2,'multiple'=>true);
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultMulti']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['defaultMulti'][$strType];
	
	// set attribute selection to number attributes only
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['attr_id']['options_values'] = array('geolocation');
}