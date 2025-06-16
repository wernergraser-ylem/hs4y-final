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
 
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableModule', 'modifyDca'); 


/**
 * Palettes
 */
// Append news sorting field and news filter palette
if( strpos($GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'],'news_order') === false )
{
	$GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'] = str_replace
	(
		'skipFirst',
		'skipFirst,news_order;',
		$GLOBALS['TL_DCA']['tl_module']['palettes']['newslist']	
	);
}

// pageimage,article
$GLOBALS['TL_DCA']['tl_module']['palettes']['pageimage'] = '{title_legend},name,type;{config_legend},imgSize,bgposition,showLevel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['pagearticle'] = '{title_legend},name,type;{config_legend},showLevel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
// portfoliolist
$GLOBALS['TL_DCA']['tl_module']['palettes']['portfoliolist'] = '{title_legend},name,headline,type;{config_legend},news_archives,numberOfItems,news_featured,perPage,skipFirst,news_order;{layout_legend:hide},style_css,layout_css;{template_legend:hide},news_metaFields,news_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,,space';
// portfoliofilter
$GLOBALS['TL_DCA']['tl_module']['palettes']['portfoliofilter'] = '{title_legend},name,headline,type;{config_legend},news_readerModule;{filter_legend:hide},news_filters,news_sysfilter,news_filter_multiple;{layout_legend:hide},align_css,style_css,color_css;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
// portfolioreader
$GLOBALS['TL_DCA']['tl_module']['palettes']['portfolioreader'] = '{title_legend},name,headline,type;{config_legend},news_archives;{template_legend:hide},news_metaFields,news_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_article']['fields'],0,$GLOBALS['PCT_THEME_SETTINGS']['fields']);
$fields = array
(
	'alias'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['alias'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'search'                  => true,
		'eval'                    => array('rgxp'=>'folderalias', 'doNotCopy'=>true, 'unique'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
		'save_callback' => array
		(
			array('PCT\ThemeSettings\Backend\TableModule', 'generateAlias')
		),
		'sql'                     => "varchar(255) BINARY NOT NULL default ''"
	),
	'align_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['align_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['align_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['align_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'color_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['color_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'style_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['style_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['style_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['style_css'],
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'layout_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['layout_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['layout_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['layout_css'],
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	// news filter
	'news_filters'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_filters'],
		'exclude'                 => true,
		'inputType'               => 'optionWizard',
		'eval'                    => array('tl_class'=>'clr'),
		'sql'                     => "blob NULL"
	),
	'news_sysfilter'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_sysfilter'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'news_portfoliolistModule'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_portfoliolistModule'],
	),
	'news_filter_multiple'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_filter_multiple'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	// page image
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
	// general margin fields
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
	),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_module']['fields'],0,$fields);
// add sorting as news_order option
$GLOBALS['TL_DCA']['tl_module']['fields']['news_order']['options'][] = 'sorting';

	