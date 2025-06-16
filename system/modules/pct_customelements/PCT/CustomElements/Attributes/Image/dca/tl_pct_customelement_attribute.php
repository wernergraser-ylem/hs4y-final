<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package  	pct_customelements
 * @subpackage 	AttributeImage
 * @link  		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

/**
 * Palettes
 */
$type = 'image';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('options','size');
$arrPalettes['eval_legend'] = array('eval_mandatory','eval_extensions','eval_path');
$arrPalettes['be_setting_legend'] = array('eval_tl_class_w50','eval_tl_class_clr','be_visible');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_extensions']['eval']['tl_class'] = 'w50 clr m12';

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$type];
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['options'] = array
(
	'alt',
	'title',
	'size',
	'imageUrl',
	'fullsize',
	'caption'
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$type];
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['size']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute'][$type]['size'];
