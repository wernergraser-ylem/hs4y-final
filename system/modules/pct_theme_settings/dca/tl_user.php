<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 
 * @copyright	Tim Gatzky 2023, Premium Contao Themes
 * @package 	pct_theme_settings
 * @link    	https://contao.org
 */

 /**
 * Palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['login'] .= ';{pct_element_library_legend:hide},pct_element_library_favorites';


/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_element_library_favorites'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['pct_element_library_favorites'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr','multiple'=>true),
	'sql'                     => "text NULL",
	'options_callback'		  => array('PCT\ThemeSettings\Backend\TableUser', 'getElementFavorites'),
);