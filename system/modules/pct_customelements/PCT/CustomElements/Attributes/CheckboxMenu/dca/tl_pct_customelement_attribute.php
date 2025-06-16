<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeCheckboxMenu
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

/**
 * Palettes
 */
$type = 'checkboxMenu';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('options');
$arrPalettes['eval_legend'] = array('eval_mandatory');
$arrPalettes['be_setting_legend'] = array('eval_tl_class_w50','eval_tl_class_clr','be_visible');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options']['checkboxMenu'];
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['inputType'] = 'optionWizard';