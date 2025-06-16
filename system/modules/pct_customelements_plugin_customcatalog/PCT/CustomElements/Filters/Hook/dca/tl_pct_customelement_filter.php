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
 * @filter		Hook filter
 * @link		http://contao.org
 */

/**
 * Load language file
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFiles('default');

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'hook';

/**
 * Palettes
 */
$arrPalettes = array();
$arrPalettes['title_legend'] = array('type','be_description','title','description');
$arrPalettes['settings_legend'][] = 'hook';
$arrPalettes['expert_legend'] = array('published');
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['hook'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['hook'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'reference'				  => $GLOBALS['TL_LANG']['CUSTOMCATALOG_HOOKS']['hookfilter'] ?? array(),
	'eval'					  => array('chosen'=>true,'includeBlankOption'=>true),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

if( isset($GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter']) )
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['hook']['options'] = array_keys($GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter']);
}