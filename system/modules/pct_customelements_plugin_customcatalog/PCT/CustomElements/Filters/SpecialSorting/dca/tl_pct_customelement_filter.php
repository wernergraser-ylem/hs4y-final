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
 * @filter		Sorting, alphabetic
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
if( isset($objActiveRecord) && in_array($objActiveRecord->type, array('sorting_by_filter','sorting_by_attribute')))
{
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_select'));
	}
	
	// remove the isStrict field
	$arrPalettes = $objDcaHelper->removeField('isStrict');
	
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['template']['default'] = 'customcatalog_filter_select';
}

// sorting special by attributes
if( isset($objActiveRecord) && $objActiveRecord->type == 'sorting_by_attribute' )
{
	$arrPalettes['settings_legend'][] = 'attr_id';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['attr_id']['options_values'] = array('tags','selectdb');
}
// sorting special by filter
else if( isset($objActiveRecord) && $objActiveRecord->type == 'sorting_by_filter' )
{
	$arrPalettes['settings_legend'][] = 'conditional_filters';	
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['conditional_filters']['inputType'] = 'select';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['conditional_filters']['eval']['multiple'] = false;
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['conditional_filters']['eval']['tl_class'] = 'w50';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['conditional_filters']['eval']['mandatory'] = true;
}

$arrPalettes['settings_legend'][] = 'label';
$arrPalettes['settings_legend'][] = 'includeReset';
$arrPalettes['settings_legend'][] = 'isRadio';
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_by_attribute'] = $objDcaHelper->generatePalettes($arrPalettes);
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_by_filter'] = $objDcaHelper->generatePalettes($arrPalettes);


