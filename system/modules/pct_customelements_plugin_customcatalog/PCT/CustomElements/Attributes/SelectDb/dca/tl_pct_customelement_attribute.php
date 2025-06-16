<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @attribute	SelectDb
 * @link		http://contao.org
 */

/**
 * Imports
 */
use PCT\CustomElements\Helper\DcaHelper as DcaHelper;

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

/**
 * Palettes
 */
$type = 'selectdb';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('selectdb_table','selectdb_key','selectdb_value','selectdb_sorting','selectdb_translations','selectdb_where','defaultValue','eval_mandatory','eval_multiple','eval_includeBlankOption','isRadio');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['selectdb_table'] = array
(
    'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['selectdb_table'],
    'exclude'		=> true,
    'inputType'		=> 'select',
    'options_callback'	=> array('PCT\CustomElements\Attributes\SelectDb\TableHelper','getAllTables'),
    'eval'			=> array('tl_class'=>'w50','chosen'=>true,'mandatory'=>true,'submitOnChange'=>true,'includeBlankOption'=>true,'decodeEntities'=>true),
    'sql'			=> "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['selectdb_key'] = array
(
    'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['selectdb_key'],
    'exclude'		=> true,
    'default'		=> 'id',
    'inputType'		=> 'select',
    'options_callback'	=> array('PCT\CustomElements\Attributes\SelectDb\TableHelper','getFields'),
    'eval'			=> array('tl_class'=>'w50','chosen'=>true,'decodeEntities'=>true,'mandatory'=>true),
    'sql'			=> "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['selectdb_value'] = array
(
    'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['selectdb_value'],
    'exclude'		=> true,
    'inputType'		=> 'select',
    'options_callback'	=> array('PCT\CustomElements\Attributes\SelectDb\TableHelper','getFields'),
    'eval'			=> array('tl_class'=>'w50','chosen'=>true,'decodeEntities'=>true,'mandatory'=>true),
    'sql'			=> "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['selectdb_sorting'] = array
(
    'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['selectdb_sorting'],
    'exclude'		=> true,
    'inputType'		=> 'select',
    'options_callback'	=> array('PCT\CustomElements\Attributes\SelectDb\TableHelper','getFields'),
    'eval'			=> array('tl_class'=>'w50','chosen'=>true,'decodeEntities'=>true,'includeBlankOption'=>true),
    'sql'			=> "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['selectdb_translations'] = array
(
    'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['selectdb_translations'],
    'exclude'		=> true,
    'inputType'		=> 'select',
    'options_callback'	=> array('PCT\CustomElements\Attributes\SelectDb\TableHelper','getFields'),
    'eval'			=> array('tl_class'=>'w50','chosen'=>true,'decodeEntities'=>true,'includeBlankOption'=>true),
    'sql'			=> "varchar(128) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['selectdb_where'] = array
(
    'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['selectdb_where'],
    'exclude'		=> true,
    'inputType'		=> 'text',
	'eval'			=> array('tl_class'=>'clr long','decodeEntities'=>true),
    'sql'			=> "varchar(255) NOT NULL default ''"
);