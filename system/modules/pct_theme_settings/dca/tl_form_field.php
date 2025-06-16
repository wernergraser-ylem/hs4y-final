<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2019 Leo Feyer
 *
 * @copyright   Tim Gatzky 2019
 * @author      Tim Gatzky <info@tim-gatzky.de>
 * @package     pct_theme_settings
 * @link        http://contao.org
 */


/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_theme_settings');


/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableFormField', 'modifyDca');


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['visibility_css'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'],
	'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'],
	'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(32) NOT NULL default ''"
);

\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_form_field']['fields'],0,array
(
	'margin_t' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t'],
		'inputType'               => 'select',
		'options'                 => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'clr w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'margin_b' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b'],
		'inputType'               => 'select',
		'options'                 => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_classes'],
		'reference'               => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true,'tl_class'=>'w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'margin_t_m' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t_m'],
		'inputType'               => 'select',
		'options'                 => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_m_classes'],
		'reference'               => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'clr w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'margin_b_m' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b_m'],
		'inputType'               => 'select',
		'options'                 => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_m_classes'],
		'reference'               => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true,'tl_class'=>'w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	)
));
	