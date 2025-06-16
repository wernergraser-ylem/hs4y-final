<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\IconPicker\Backend\TableContent', 'modifyDca');


/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addFontIcon';


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addFontIcon'] = 'fontIcon';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['addFontIcon'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['addFontIcon'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['fontIcon'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fontIcon'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'wizard pct_iconpicker_widget w50 contao-ht35'),
	'explanation'             => 'fontIcons',
	'wizard' => array
	(
		array('PCT\IconPicker\IconPicker', 'fontIconPicker')
	),
	'load_callback'		  => array
	(
	#	array('PCT\IconPicker\IconPicker', 'attachIcon')
	),
	'sql'					  => "varchar(32) NOT NULL default ''",
);