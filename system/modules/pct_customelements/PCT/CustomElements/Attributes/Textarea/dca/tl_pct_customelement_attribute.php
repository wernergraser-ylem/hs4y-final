<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeTextarea
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

/**
 * Palettes
 */
$type = 'textarea';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('defaultValue');
$arrPalettes['eval_legend'] = array('eval_mandatory','eval_rte','eval_tl_style','eval_allowHtml');
$arrPalettes['be_setting_legend'] = array('eval_tl_class_w50','eval_tl_class_clr','be_visible');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Selector
 */
$objDcaHelper->addSelector('eval_rte');

/**
 * Subpalettes
 */
$objDcaHelper->addSubpalette('eval_rte',array('tinyTpl'));

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_rte']['eval']['tl_class'] = 'clr';
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_rte']['eval']['submitOnChange'] = true;
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['tinyTpl'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['tinyTpl'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('PCT\CustomElements\Attributes\Textarea', 'getTinyMceTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "varchar(64) NOT NULL default ''",
);