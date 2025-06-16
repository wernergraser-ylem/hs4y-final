<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{pct_themerdesigner_legend:hide},pct_themedesigner_hidden;';

/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['__selector__'][] = 'pct_themedesigner_hidden';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_settings']['subpalettes']['pct_themedesigner_hidden'] = 'pct_themedesigner_off';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_themedesigner_off'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['pct_themedesigner_off'],
	'inputType'		=> 'checkbox',
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_themedesigner_hidden'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['pct_themedesigner_hidden'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('submitOnChange'=>true),
	'sql'			=> "char(1) NOT NULL default ''",
);