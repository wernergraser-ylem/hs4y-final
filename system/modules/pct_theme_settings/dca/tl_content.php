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
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableContent', 'modifyDca');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableContent', 'enableViewportPanel');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\BackendIntegration', 'loadAssets');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableContent', 'addThemeSettingsButton');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\ThemeSettings\Backend\TableContent', 'toggleThemeSettingsFieldValue');

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['text'] = str_replace('text;', 'text,align_css,color_css,format_css,width_css,seo;', $GLOBALS['TL_DCA']['tl_content']['palettes']['text']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['headline'] = str_replace('headline', 'headline,align_css,color_css,width_css,seo;', $GLOBALS['TL_DCA']['tl_content']['palettes']['headline']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['hyperlink'] = str_replace('rel', 'rel,align_css,color_css,border_css,format_css,animate_style_css,icon_position;', $GLOBALS['TL_DCA']['tl_content']['palettes']['hyperlink']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['accordionSingle'] = str_replace('mooClasses', 'mooClasses,style_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['accordionSingle']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['accordionStart'] = str_replace('mooClasses', 'mooClasses,style_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['accordionStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['list'] = str_replace('listtype', 'listtype,style_css,color_css', $GLOBALS['TL_DCA']['tl_content']['palettes']['list']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['table'] = str_replace('tleft', 'tleft,style_css,color_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['table']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart'] = str_replace('autogrid_padding;', 'autogrid_padding,color_css,bgcolor_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridRowStart'] 	= str_replace('autogrid_padding;', 'autogrid_padding,color_css,bgcolor_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridRowStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridGridStart'] 	= str_replace('autogrid_padding;', 'autogrid_padding,color_css,bgcolor_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridGridStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_text'] = str_replace('revolutionslider_text_fontsize,', 'revolutionslider_text_fontsize,color_css,', $GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_text']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_hyperlink'] = str_replace('rel', 'rel,color_css,border_css,format_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_hyperlink']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['image'] = str_replace('overwriteMeta', 'overwriteMeta,align_css,border_css,style_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['image']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['pct_contentelementset_start'] = '{type_legend},type,headline;;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['pct_contentelementset_stop'] = '';
// export content element sets
$GLOBALS['TL_DCA']['tl_content']['select']['buttons_callback'][] = array('PCT\ThemeSettings\Backend\TableContent','buttonsCallback');

// redirect to key=contentelementset after user clicked the paste button
$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
{
	if( \Contao\Input::get('rkey') == 'contentelementset' && \Contao\Input::get('act') == 'create')
	{
		\Contao\Controller::redirect( \Contao\Controller::addToUrl('rkey=&amp;key=contentelementset&rt='.\Contao\Input::get('rt')) );
	}

	// Content element set export has been called, redirect to export page
	if( (boolean)\Contao\Config::get('contentelementset_export') === true && \Contao\Input::post('contentelementset_export') != '' && !empty($_POST['IDS']))
	{
		// store the selected element ids in the session
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objSession->set( 'contentelementset_export_ids',\Contao\Input::post('IDS') );
		
		$_SESSION['contentelementset_export_ids'] = \Contao\Input::post('IDS');
		
		// redirect to the export interface	
		\Contao\Controller::redirect( \Contao\Controller::addToUrl('key=contentelementset_export&rt='.\Contao\Input::get('rt')) );
	}
}

/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'],0,$GLOBALS['PCT_THEME_SETTINGS']['fields']);
$fields = array
(
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
	'bgcolor_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'border_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['border_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['border_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['border_css'],
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
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'format_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['format_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['format_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['format_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'width_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['width_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['content_width_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['width_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'seo'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['seo'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
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
	'helper_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'		  => array('PCT\ThemeSettings\Backend\TableContent','getThemeHelperClasses'),
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'],
		'eval'                    => array('includeBlankOption'=>true, 'chosen'=>true, 'multiple'=>true, 'tl_class'=>'w50'),
		'sql'                     => "text null"
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
	'animate_style_css'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['animate_style_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => $GLOBALS['PCT_THEME_SETTINGS']['animate_style_classes'],
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['animate_style_css'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'icon_position'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_theme_settings']['icon_position'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'				  => array('icon-pos-before','icon-pos-after'),
		'reference'				  => &$GLOBALS['TL_LANG']['dca_theme_settings']['icon_position'],
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'],0,$fields);
