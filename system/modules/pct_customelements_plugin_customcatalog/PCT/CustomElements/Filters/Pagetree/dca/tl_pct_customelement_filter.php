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
 * @filter		Pagetree filter
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'pagetree';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'attr_id'; 
$arrPalettes['settings_legend'][] = 'label'; 
$arrPalettes['settings_legend'][] = 'byActivePage';
$arrPalettes['settings_legend'][] = 'pages';
$arrPalettes['settings_legend'][] = 'inheritPages';
$arrPalettes['settings_legend'][] = 'inversePages';
$arrPalettes['settings_legend'][] = 'includeReset';
\Contao\ArrayUtil::arrayInsert( $arrPalettes, 3, array('conditions_legend' => array('conditional')) );
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['attr_id']['options_values'] = array('pagetree');
}

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['byActivePage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['byActivePage'],
	'exclude'                 => true,
	'default'				  => 1,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default '1'",
);

$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['pages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['pages'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'foreinKey'				  => 'tl_page.title',
	'eval'                    => array('fieldType'=>'checkbox','multiple'=>true, 'tl_class'=>'clr'),
	'sql'                     => "blob NULL",
);

$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['inheritPages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['inheritPages'],
	'exclude'                 => true,
	'default'				  => 1,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['inversePages'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['inversePages'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''",
);