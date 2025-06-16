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
$arrPalettes['settings_legend'][] = 'attr_ids';
$arrPalettes['settings_legend'][] = 'label';
$arrPalettes['settings_legend'][] = 'includeReset';
$arrPalettes['settings_legend'][] = 'isRadio';
// remove the isStrict field
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_alphabetic'] = $objDcaHelper->generatePalettes($arrPalettes);
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_numeric'] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && in_array($objActiveRecord->type, array('sorting_alphabetic','sorting_numeric')))
{
	// remove isStrict
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_alphabetic'] = str_replace('isStrict', '', $GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_alphabetic']);
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_numeric'] = str_replace('isStrict', '', $GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes']['sorting_numeric']);
	
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_select'));
	}
	
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['template']['default'] = 'customcatalog_filter_select';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['attr_ids']['inputType'] = 'checkboxWizard';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['attr_ids']['eval']['distinctField'] = 'alias';
}
