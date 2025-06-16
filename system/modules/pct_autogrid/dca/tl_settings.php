<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_autogrid');

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{autogrid_legend:hide},pct_autogrid_disable_be_preview';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_autogrid_disable_be_preview'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['pct_autogrid_disable_be_preview'],
	'inputType'		=> 'checkbox',
	'sql'			=> "char(1) NOT NULL default ''",
);