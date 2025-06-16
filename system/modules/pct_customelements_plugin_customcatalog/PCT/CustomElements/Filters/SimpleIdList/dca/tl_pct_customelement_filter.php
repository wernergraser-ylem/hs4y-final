<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		SimpleIdList
 * @link		http://contao.org
 */

$strType = 'simpleIdList';

/**
 * Load language files
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile('tl_pct_customelement_filter',$strType);

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'defaultMulti'; 
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultMulti']['label']	= $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['text'];
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultMulti']['inputType'] = 'text';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultMulti']['eval']['tl_class'] = 'long';
}