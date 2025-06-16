<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2022, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 */

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{pct_theme_settings_legend:hide},pct_license_log,pct_license_suffixes,contentelementset_export;';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_license_log'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['pct_license_log'],
	'inputType'		=> 'checkbox',
	'eval'			=> array(),
	'sql'			=> "char(1) NOT NULL default ''",
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_license_suffixes'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['pct_license_suffixes'],
	'inputType'		=> 'text',
	'eval'			=> array('tl_class'=>'long','placeholder'=>'.com.eu,.de.eu'),
	'sql'			=> "smalltext NULL",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['contentelementset_export'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['contentelementset_export'],
	'inputType'		=> 'checkbox',
	'sql'			=> "char(1) NOT NULL default ''",
);
