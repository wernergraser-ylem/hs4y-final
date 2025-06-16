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
 * @filter		SimpleCondition
 * @link		http://contao.org
 */

$strType = 'simpleCondition';

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
$arrPalettes = $objDcaHelper->removePalette('template_legend');
$arrPalettes = $objDcaHelper->removeField('urlparam');
$arrPalettes = $objDcaHelper->removeField('cssID');

$arrPalettes['settings_legend'][] = 'attr_id'; 
$arrPalettes['settings_legend'][] = 'defaultValue';
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultValue']['label']	= $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['text'];
}