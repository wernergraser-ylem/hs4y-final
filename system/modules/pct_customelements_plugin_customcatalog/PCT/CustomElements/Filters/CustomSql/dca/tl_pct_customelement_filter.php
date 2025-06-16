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
 * @filter		CustomSQL
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'customsql';

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'customsql';
unset($arrPalettes['template_legend']);
unset($arrPalettes['expert_legend'][array_search('urlparam',$arrPalettes['expert_legend'])]);
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['customsql'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['customsql'],
	'exclude'                 => true,
	'inputType'               => 'textarea',
	'eval'					  => array('tl_class'=>'','decodeEntities'=>true,'mandatory'=>true),
	'sql'                     => "tinytext NULL"
);