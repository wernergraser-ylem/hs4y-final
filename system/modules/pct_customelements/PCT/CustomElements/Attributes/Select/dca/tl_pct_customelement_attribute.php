<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeSelect
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

/**
 * Palettes
 */
$type = 'select';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('options');
$arrPalettes['eval_legend'] = array('eval_mandatory','eval_multiple','eval_includeBlankOption','isRadio');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options']['select'];
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['inputType'] = 'optionWizard';

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['isRadio'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isRadio'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);