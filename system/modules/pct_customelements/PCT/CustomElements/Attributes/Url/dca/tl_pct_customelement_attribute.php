<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeUrl
 * @link		http://contao.org
 */

/**
 * Load language file
 */
\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadLanguageFile',array('tl_content'));

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

/**
 * Palettes
 */
$type = 'url';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('options');
$arrPalettes['eval_legend'] = array('eval_mandatory','eval_rgxp');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['options'] = array
(
	'pagepicker',
	'target',
	'linkText',
	'titleText',
	'lightbox',
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options']['url'];