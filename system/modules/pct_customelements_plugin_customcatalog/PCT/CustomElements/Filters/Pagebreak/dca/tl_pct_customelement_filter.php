<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		Pagebreak filter
 * @link		http://contao.org
 */
 
/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'pagebreak';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Load language file
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile($objDcaHelper->getTable(),$strType);


/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removeField('urlparam');
$arrPalettes['settings_legend'][] = 'label';
$arrPalettes['settings_legend'][] = 'module_id';
$arrPalettes['settings_legend'][] = 'defaultMulti';
$arrPalettes['settings_legend'][] = 'isRadio';
$arrPalettes['settings_legend'][] = 'includeReset';
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_select'));
	}
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['module_id']['label'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['module_id'][$strType];
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['module_id']['options_values'] = array('customcataloglist');
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['template']['default'] = 'customcatalog_filter_select';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultMulti']['inputType'] = 'listWizard';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultMulti']['eval']['tl_class'] = 'clr';
}