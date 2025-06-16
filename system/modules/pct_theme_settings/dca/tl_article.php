<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
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
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableArticle', 'addThemeSettingsButton');
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableArticle', 'filterPagesOnLockdown');
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\BackendIntegration', 'loadAssets');
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableArticle', 'toggleThemeSettingsFieldValue');


/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'background';
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'overlay';


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['background'] = 'bgcolor,bgcolor_css,bgimage,size,bgposition,bgrepeat,bgsize,fullscreen,offsetCssID';
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['overlay'] = 'ol_bgcolor_css,ol_position,ol_width,ol_height,ol_opacity';


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = \str_replace('customTpl', 'customTpl;{theme_settings:hide},layout_css,color_css,padding_t,padding_b,background,overlay;{animation_settings:hide},animation_type,animation_speed,animation_delay;', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = \str_replace('stop', 'stop,visibility_css', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);


/**
 * Fields
 */
$fields = array
(
	// background
	'background'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['background'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true,'tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'bgcolor'   => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>6, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'clr w50 wizard'),
		'sql'                     => "varchar(64) NOT NULL default ''"
	),
	'bgimage'   => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgimage'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50 wizard'),
		'eval'                    => array('filesOnly'=>true, 'extensions'=>\Contao\Config::get('validImageTypes'), 'fieldType'=>'radio','dcaPicker'=> array('do'=>'files', 'context'=>'file', 'icon'=>'pickfile.svg', 'fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>\Contao\Config::get('validImageTypes')), 'tl_class'=>'w50 wizard'),
		'save_callback'			  => array
		(
			array('PCT\ThemeSettings\Backend\TableArticle','saveUuidFromPath'),
		),
		'load_callback'			  => array
		(
			array('PCT\ThemeSettings\Backend\TableArticle','loadPathFromUuid'),
		),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'bgposition'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgposition'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['bgposition_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50','chosen'=>true),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'bgrepeat' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgrepeat'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'),
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'bgsize' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgsize'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'size' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['MSC']['imgSize'],
		'inputType'               => 'imageSize',
		'reference'               => &$GLOBALS['TL_LANG']['MSC'],
		'options_callback' => static function ()
		{
			return \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions();
		},
		'eval'                    => array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(128) COLLATE ascii_bin NOT NULL default ''"
	),
	'bgcolor_css' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true,'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	// overlay
	'overlay'   => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['overlay'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true,'tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'ol_position' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_position'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['ol_position_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>false,'tl_class'=>'w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'ol_width' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_width'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['ol_width_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('tl_class'=>'w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'ol_height' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_height'],
		'exclude'                 => true,
		'inputType'               => 'inputUnit',
		'options'                 => array('px','pct'),
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['units'],
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(128) NOT NULL default ''"
	),
	'ol_bgcolor_css' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_bgcolor_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['ol_bgcolor_css_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true,'tl_class'=>'w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'ol_opacity' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_opacity'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['ol_opacity_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true,'tl_class'=>'w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),

	'fullscreen'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['fullscreen'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr m12 w50'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'offsetCssID'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['offsetCssID'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(196) NOT NULL default ''"
	),
	'layout_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['layout_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['width_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'color_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['color_classes::article'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['color_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	// general
	'padding_t' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['padding_t'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['padding_top_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>false, 'tl_class'=>'clr w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'padding_b' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['padding_b'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['padding_bottom_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>false,'tl_class'=>'w50','chosen'=>true),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'visibility_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	// animation
	'animation_type'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_type'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['animation_type_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_type'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(96) NOT NULL default ''"
	),
	'animation_speed'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_speed'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['animation_speed_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_speed'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'animation_delay'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_delay'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['animation_delay_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_delay'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_article']['fields'],0,$fields);