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
\Contao\System::loadLanguageFile('tl_content');

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TablePage', 'filterPagesOnLockdown');
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TablePage', 'modifyDCA');


/**
 * List
 */
$GLOBALS['TL_DCA']['tl_page']['list']['label']['label_callback'] = array('PCT\ThemeSettings\Backend\TablePage', 'getLabel');
		

/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addImage';
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addArticle';


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addImage'] = 'singleSRC,imgHeadline,imgSubheadline,style_css,height_css,bgcolor_css,color_css';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addArticle'] = 'article,article_top';


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace('includeLayout;','includeLayout;{theme_settings:hide},addImage,addArticle,ribbon,analytics_google,analytics_matomo,google_maps;',$GLOBALS['TL_DCA']['tl_page']['palettes']['root']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] = str_replace('includeLayout;','includeLayout;{theme_settings:hide},addImage,ribbon,addArticle,analytics_google,analytics_matomo,google_maps;',$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = str_replace('includeLayout;','includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;',$GLOBALS['TL_DCA']['tl_page']['palettes']['regular']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['forward'] = str_replace('includeLayout;','includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;',$GLOBALS['TL_DCA']['tl_page']['palettes']['forward']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['redirect'] = str_replace('includeLayout;','includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;',$GLOBALS['TL_DCA']['tl_page']['palettes']['redirect']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['error_403'] = str_replace('includeLayout;','includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;',$GLOBALS['TL_DCA']['tl_page']['palettes']['error_403']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['error_404'] = str_replace('includeLayout;','includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;',$GLOBALS['TL_DCA']['tl_page']['palettes']['error_404']);
foreach(array('root','rootfallback','regular','forward','redirect','error_403','error_404','pct_megamenu') as $type)
{
	$GLOBALS['TL_DCA']['tl_page']['palettes'][$type] = str_replace('stop','stop,visibility_css',$GLOBALS['TL_DCA']['tl_page']['palettes'][$type]);
	$GLOBALS['TL_DCA']['tl_page']['palettes'][$type] = str_replace('cssClass','cssClass,helper_css',$GLOBALS['TL_DCA']['tl_page']['palettes'][$type]);	
}
// favicons template selection
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace('maintenanceMode','favicon_tpl,maintenanceMode',$GLOBALS['TL_DCA']['tl_page']['palettes']['root']);	
$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] = str_replace('favicon','favicon,favicon_tpl',$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback']);	



/**
 * Fields
 */
$fields = array
(
	'ribbon'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['ribbon'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50','maxlength'=>255),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'addImage'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['addImage'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true,'tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'singleSRC'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC'],
		'exclude'                 => true,
		'inputType'               => 'fileTree',
		'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'tl_class'=>'clr'),
		'sql'                     => "binary(16) NULL"
	),
	'style_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['style_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => array('style1','style2','style3'),
		'reference'				  => $GLOBALS['TL_LANG']['dca_theme_settings']['style_css'],
		'eval'                    => array('tl_class'=>'clr w50','includeBlankOption'=>false),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'height_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['height_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => array('height-xxl','height-xl','height-l','height-m','height-s','height-xs','height-xxs'),
		'reference'				  => $GLOBALS['TL_LANG']['dca_theme_settings']['height_css'],
		'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>true),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'imgHeadline'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['imgHeadline'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'clr w50','maxlength'=>255),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'imgSubheadline'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['imgSubheadline'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50','maxlength'=>255),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'addArticle'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['addArticle'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('submitOnChange'=>true,'tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'article'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['article'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\ThemeSettings\Backend\TablePage', 'getArticles'),
		'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true,'tl_class'=>'w50'),
		'sql'                     => "int(10) unsigned NOT NULL default '0'"
	),
	'article_top'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['article_top'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\ThemeSettings\Backend\TablePage', 'getArticles'),
		'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'),
		'sql'                     => "int(10) unsigned NOT NULL default '0'"
	),
	'visibility_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'] ?? array(),
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'bgcolor_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'color_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => $GLOBALS['PCT_THEME_SETTINGS']['color_classes'],
		'reference'               => $GLOBALS['TL_LANG']['dca_theme_settings']['color_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'analytics_google'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['analytics_google'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'analytics_matomo'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['analytics_matomo'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50','size'=>2,'multiple'=>true),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'google_maps'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['google_maps'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'helper_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'		  => array('PCT\ThemeSettings\Backend\TablePage','getThemeHelperClasses'),
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'],
		'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'multiple'=>true, 'tl_class'=>'w50'),
		'sql'                     => "text null"
	),
	'favicon_tpl'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_page']['favicon_tpl'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'default'				  => 'favicons',
		'options_callback' => static function ()
		{
			return \Contao\Controller::getTemplateGroup('favicons');
		},
		'eval'                    => array('chosen'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(64) COLLATE ascii_bin NOT NULL default ''"
	),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_page']['fields'],0,$fields);
