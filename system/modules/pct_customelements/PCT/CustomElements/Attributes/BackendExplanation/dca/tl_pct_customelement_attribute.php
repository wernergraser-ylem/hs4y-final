<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute BackendExplanation
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$strType = 'backend_explanation';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( $objActiveRecord !== null && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['description'][0]			= 'Ihr Hinweistext';
	$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['description'][1]			= 'Geben Sie den Text ein, der im Backend angezeigt werden soll.';
}
