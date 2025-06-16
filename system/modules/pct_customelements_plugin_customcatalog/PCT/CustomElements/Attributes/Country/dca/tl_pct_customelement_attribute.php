<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2018, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @attribute	Country
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
$strType = 'country';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('defaultValue','eval_mandatory','eval_includeBlankOption','isRadio','eval_multiple');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
if( isset($objActiveRecord) && $objActiveRecord->type == $strType )
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType];
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['defaultValue']['inputType'] = 'select';
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['defaultValue']['options'] = \Contao\System::getContainer()->get('contao.intl.countries')->getCountries();
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['defaultValue']['eval'] = array('tl_class'=>'clr','includeBlankOption'=>true, 'chosen'=>true);
}