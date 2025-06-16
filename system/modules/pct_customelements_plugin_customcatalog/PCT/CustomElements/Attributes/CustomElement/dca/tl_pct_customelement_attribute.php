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
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$objActiveRecord = $objDcaHelper->getActiveRecord();
$strType = 'customelement';

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removePalette('be_setting_legend');
$arrPalettes = $objDcaHelper->removeField('template');
$arrPalettes['settings_legend'][] = 'include_item';
$arrPalettes['expert_legend'][] = 'hidden';
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
if( isset($objActiveRecord) && $objActiveRecord->type == $strType )
{
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['include_item']['options_callback'] = array('PCT\CustomElements\Attributes\CustomElement\TableHelper','getCustomElements');
}
