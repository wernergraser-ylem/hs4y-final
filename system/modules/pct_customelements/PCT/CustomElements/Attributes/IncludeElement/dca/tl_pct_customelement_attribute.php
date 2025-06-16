<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeInclude
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
 * Config
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['config']['onload_callback'][] = array('PCT\CustomElements\Attributes\IncludeElement\TableCustomElementAttribute', 'modifyPalette');

/**
 * Palettes
 */
$type = 'include';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('include_type','include_item');
$arrPalettes['be_setting_legend'][] = 'eval_includeBlankOption';
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['include_type'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['include_type'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'				  => '',
	'options'				  => array('article','content','form','module'),
	'reference'				  => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['include_type'],
	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true,'chosen'=>true),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['include_item'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['include_item'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'		  => array
	(
		'PCT\CustomElements\Attributes\IncludeElement\TableCustomElementAttribute','getIncludeItem'
	),
	'eval'                    => array('tl_class'=>'clr','chosen'=>true,'includeBlankOption'=>true),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);