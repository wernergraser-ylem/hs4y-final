<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 * @link		http://contao.org
 */
 

/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_theme_settings');
\Contao\System::loadLanguageFile('default');

/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_news']['palettes']['__selector__'][] = 'addFilter';


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_news']['subpalettes']['addFilter'] = 'filters';


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_news']['palettes']['default'] = \str_replace('teaser;','teaser;{filter_settings:hide},addFilter;',$GLOBALS['TL_DCA']['tl_news']['palettes']['default']);
$GLOBALS['TL_DCA']['tl_news']['palettes']['internal'] = \str_replace('teaser;','teaser;{filter_settings:hide},addFilter;',$GLOBALS['TL_DCA']['tl_news']['palettes']['internal']);
$GLOBALS['TL_DCA']['tl_news']['palettes']['article'] = \str_replace('teaser;','teaser;{filter_settings:hide},addFilter;',$GLOBALS['TL_DCA']['tl_news']['palettes']['article']);
$GLOBALS['TL_DCA']['tl_news']['palettes']['external'] = \str_replace('teaser;','teaser;{filter_settings:hide},addFilter;',$GLOBALS['TL_DCA']['tl_news']['palettes']['external']);


/**
 * Fields
 */
$fields = array
(
	// sorting
	'sorting' => array
	(
		'sql'                     => "int(10) unsigned NOT NULL default '0'",
	),
	// news filter
	'addFilter'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['addFilter'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true,'tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'filters'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['filters'],
		'exclude'                 => true,
		'inputType'               => 'listWizard',
		'eval'                    => array('tl_class'=>'clr'),
		'sql'                     => "blob NULL"
	),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_news']['fields'],0,$fields);