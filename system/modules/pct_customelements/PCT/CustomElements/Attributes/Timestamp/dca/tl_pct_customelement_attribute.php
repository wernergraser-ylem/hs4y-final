<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeTimestamp
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

/**
 * Palettes
 */
$type = 'timestamp';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('options','date_rgxp','date_format');
$arrPalettes['eval_legend'] = array('eval_mandatory','eval_rgxp');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['date_format'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['date_format'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['date_rgxp'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['date_rgxp'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'				  => 'datetime',
	'options'				  => array('datim','date','time'),
	'reference'				  => $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['date_rgxp'],
	'eval'                    => array('tl_class'=>'clr w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);


$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$type];
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['inputType'] = 'checkbox';
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['eval']['multiple'] = true;
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['options'] = array
(
	'datepicker',
);
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$type];
