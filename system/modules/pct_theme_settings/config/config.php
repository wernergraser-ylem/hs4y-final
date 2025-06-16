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

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

/**
 * Constants
 */
define('PCT_THEME_SETTINGS_VERSION', '2.1.1');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_theme_settings/config/autoload.php' );
}

/**
 * Globals
 */
$GLOBALS['PCT_THEME_SETTINGS']['newslist_order'] 				= array('sorting','author','date');
$GLOBALS['PCT_THEME_SETTINGS']['padding_top_classes'] 			= array('article-pt','article-pt-0','article-pt-xxs','article-pt-xs','article-pt-s','article-pt-m','article-pt-l','article-pt-xl','article-pt-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['padding_bottom_classes'] 		= array('article-pb','article-pb-0','article-pb-xxs','article-pb-xs','article-pb-s','article-pb-m','article-pb-l','article-pb-xl','article-pb-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes']				= array('bg-accent','bg-second','bg-gray','bg-white','bg-black','bg-customColor1','bg-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['article_bgcolor_classes'] 		= array('article-bg-accent','article-bg-second','article-bg-gray','article-bg-customColor1','article-bg-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['width_classes'] 				= array('fullwidth-boxed','fullwidth-boxed-medium','fullwidth-boxed-small','fullwidth','fullwidth-padding-left','fullwidth-padding-right','fullwidth-padding-both','boxed');
$GLOBALS['PCT_THEME_SETTINGS']['bgposition_classes'] 			= array('bg-left-top', 'bg-left-center', 'bg-left-bottom', 'bg-center-top', 'bg-center-center', 'bg-center-bottom', 'bg-right-top', 'bg-right-center', 'bg-right-bottom','parallax');
$GLOBALS['PCT_THEME_SETTINGS']['ol_position_classes'] 			= array('ol-top','ol-right','ol-bottom','ol-left');
$GLOBALS['PCT_THEME_SETTINGS']['ol_width_classes'] 				= array('ol-w100','ol-w75','ol-w50','ol-w25');
$GLOBALS['PCT_THEME_SETTINGS']['ol_opacity_classes']			= array('ol-opacity-100','ol-opacity-90','ol-opacity-80','ol-opacity-70','ol-opacity-60','ol-opacity-50','ol-opacity-40','ol-opacity-30','ol-opacity-20','ol-opacity-10');
$GLOBALS['PCT_THEME_SETTINGS']['ol_bgcolor_css_classes'] 		= array('ol-bg-accent','ol-bg-second','ol-bg-gray','ol-bg-white','ol-bg-black');
$GLOBALS['PCT_THEME_SETTINGS']['align_classes']					= array('h-align-center','h-align-right');
$GLOBALS['PCT_THEME_SETTINGS']['align_classes::portfoliofilter']	= array('align-left','align-center','align-right');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes']					= array('style1','style2');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::table']			= array('table-clean','table-striped','table-striped-dark','table-custom1');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::hyperlink']		= array('button','text');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::list']			= array('style2','style3','customStyle1','customStyle2');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::portfoliofilter']	= array('filter-style1','filter-style2');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::image']			= array('shadow-s','shadow-m','shadow-l');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes']					= array('txt-color-accent','txt-color-second','txt-color-white','txt-color-gray','txt-color-customColor1','txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::text']			= array('txt-color-accent','txt-color-second','txt-color-white','txt-color-gray','txt-color-customColor1','txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::revolutionslider_text']	= array('txt-color-accent','txt-color-second','txt-color-white','txt-color-gray','txt-color-customColor1','txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::list']			= array('txt-color-accent','txt-color-second','txt-color-white','txt-color-gray','txt-color-customColor1','txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::table']			= array('txt-color-accent','txt-color-second','txt-color-white','txt-color-gray','txt-color-customColor1','txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::hyperlink']		= array('btn-accent','btn-accent-outline','btn-second','btn-second-outline','btn-white','btn-white-outline','btn-black','btn-black-outline','btn-gray','btn-gray-outline','btn-trnsp','btn-trnsp-white','btn-customColor1-dark','btn-customColor1-light','btn-customColor2-dark','btn-customColor2-light');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::revolutionslider_hyperlink']	= array('btn-accent','btn-accent-outline','btn-second','btn-second-outline','btn-white','btn-white-outline','btn-black','btn-black-outline','btn-gray','btn-gray-outline','btn-trnsp','btn-trnsp-white','btn-customColor1-dark','btn-customColor1-light','btn-customColor2-dark','btn-customColor2-light');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::portfoliofilter'] 	= array('txt-color-white');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::article'] 		= array('color-accent','color-second','color-gray','color-white','color-customColor1','color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['border_classes']				= array('border-gray-1px','border-gray-5px','border-gray-10px','border-white-1px','border-white-5px','border-white-10px','border-radius-small','border-radius-medium','border-radius-large');
$GLOBALS['PCT_THEME_SETTINGS']['border_classes::hyperlink']		= array('btn-radius-3','btn-radius-5','btn-radius-10','btn-radius-20','btn-radius-50','btn-radius-100');
$GLOBALS['PCT_THEME_SETTINGS']['border_classes::revolutionslider_hyperlink'] = array('border-radius-3','border-radius-5','border-radius-10','border-radius-50','btn-radius-50','btn-radius-100');
$GLOBALS['PCT_THEME_SETTINGS']['format_classes']				= array('format-p-small','format-p-medium','format-p-large','h1','h2','h3','h4','h5','h6');
$GLOBALS['PCT_THEME_SETTINGS']['format_classes::hyperlink']		= array('btn-size-small','btn-size-medium','btn-size-large','btn-size-full');
$GLOBALS['PCT_THEME_SETTINGS']['format_classes::revolutionslider_hyperlink'] = array('btn-size-small','btn-size-medium','btn-size-large','text-link');
$GLOBALS['PCT_THEME_SETTINGS']['content_width_classes'] 		= array('width-l','width-m','width-s');
$GLOBALS['PCT_THEME_SETTINGS']['layout_classes']				= array();
$GLOBALS['PCT_THEME_SETTINGS']['layout_classes::portfoliolist']	= array('portfolio-col1','portfolio-col2','portfolio-col3','portfolio-col4');
$GLOBALS['PCT_THEME_SETTINGS']['visibility_classes']			= array('vis-desktop','vis-mobile','vis-tablet','vis-desktop-mobile','vis-desktop-tablet','vis-mobile-tablet');
$GLOBALS['PCT_THEME_SETTINGS']['animation_type_classes']		= array('fadeIn animate','fadeInLeft animate','fadeInRight animate','fadeInUp animate','fadeInDown animate','fadeInLeftBig animate','fadeInRightBig animate','fadeInUpBig animate','fadeInDownBig animate','flip animate','flipInX animate','flipInY animate','bounce animate','bounceInLeft animate','bounceInRight animate','bounceInUp animate','bounceInDown animate','bounceOut animate','bounceOutLeft animate','bounceOutRight animate','imageZoomOut animate','imageZoomIn animate','imageRotateInfinite animate');
$GLOBALS['PCT_THEME_SETTINGS']['animation_speed_classes']		= array('animate_faster','animate_fast','animate_slow','animate_slower');
$GLOBALS['PCT_THEME_SETTINGS']['animation_delay_classes']		= array('animate_delay_100','animate_delay_200','animate_delay_300','animate_delay_400','animate_delay_500','animate_delay_600','animate_delay_700','animate_delay_800','animate_delay_900');
// helper classes
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_align'] = array('align-left','align-center','align-right');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_letter_spacing'] = array('letter-spacing-xxl','letter-spacing-xl','letter-spacing-l','letter-spacing-m','letter-spacing-s');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_helper'] = array('line-through','uppercase','lowercase','line-height-1','line-height-1-1','line-height-1-2','line-height-1-3','line-height-1-4','line-height-1-5','line-height-1-6','line-height-1-7','line-height-1-8','line-height-1-9','line-height-2');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['mainmenu_helper'] = array('highlight','avoid-click','open-left','click_open','click-default','scroll_to_anchor');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['headline_styles'] = array('headline_style_h1','headline_style_h2','headline_style_h3','headline_style_h4','headline_style_h5','headline_style_h6');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_color'] = array();
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_size'] = array();
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['negativ_margin'] = array();
// margins
$GLOBALS['PCT_THEME_SETTINGS']['margin_top_classes'] 		= array('mt-0','mt-xxs','mt-xs','mt-s','mt-m','mt-l','mt-xl','mt-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_classes'] 	= array('mb-0','mb-xxs','mb-xs','mb-s','mb-m','mb-l','mb-xl','mb-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['margin_top_m_classes'] 		= array('mt-0-m','mt-xxs-m','mt-xs-m','mt-s-m','mt-m-m','mt-l-m','mt-xl-m','mt-xxl-m');
$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_m_classes'] 	= array('mb-0-m','mb-xxs-m','mb-xs-m','mb-s-m','mb-m-m','mb-l-m','mb-xl-m','mb-xxl-m');
$GLOBALS['PCT_THEME_SETTINGS']['animate_style_classes']		= array('animate-style1','animate-style2','animate-style3','animate-style3','animate-style4','animate-style5');


// helper classes field values by table
$GLOBALS['PCT_THEME_SETTINGS']['helper_classes']					= array
(
	'tl_content' => array
	(
		'font_align'	=> $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_align'],
		'font_letter_spacing' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_letter_spacing'],
		'font_helper' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_helper'],
		'font_color' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_color'],
		'font_size' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_size'],
		'negativ_margin' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['negativ_margin'],
		'headline_styles' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['headline_styles'],
		'parallax'	=> array('parallax-speed-1','parallax-speed-2','parallax-speed-3','parallax-speed-4','parallax-speed-5','parallax-speed-6','parallax-speed-7','parallax-speed-8','parallax-speed-9','parallax-speed-10'),
	),
	'tl_page' => array
	(
		'mainmenu_helper' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['mainmenu_helper'],
	),
);



// merge with custom settings
if( !empty($GLOBALS['PCT_THEME_SETTINGS']['custom']) && is_array($GLOBALS['PCT_THEME_SETTINGS']['custom']) )
{
	$GLOBALS['PCT_THEME_SETTINGS'] = array_merge( $GLOBALS['PCT_THEME_SETTINGS'], $GLOBALS['PCT_THEME_SETTINGS']['custom'] );
}
// define which css fields relate to the type of content element
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['*'] 				= array('visibility_css','margin_t','margin_b','margin_t_m','margin_b_m');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['text'] 			= array('align_css','color_css','format_css','width_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['hyperlink'] 		= array('align_css','color_css','style_css','format_css','border_css','animate_style_css','icon_position');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['headline'] 		= array('align_css','color_css','width_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['accordionSingle'] 	= array('style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['accordionStart'] 	= array('style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['table'] 			= array('style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['image'] 			= array('align_css','border_css','style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['list'] 			= array('style_css','color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['table'] 			= array('style_css','color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['portfoliofilter']	= array('style_css','align_css','color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['portfoliolist']	= array('style_css','layout_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['revolutionslider_hyperlink'] = array('color_css','border_css','format_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['revolutionslider_text'] = array('color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['autogridColStart']	= array('color_css','bgcolor_css');

// custom templates by type
if(!isset($GLOBALS['PCT_THEME_SETTINGS']['templateByType']))
{
	$GLOBALS['PCT_THEME_SETTINGS']['templateByType']['headline_seo'] = 'ce_headline_seo';
	$GLOBALS['PCT_THEME_SETTINGS']['templateByType']['text_seo'] = 'ce_text_seo';
}
// fields
$GLOBALS['PCT_THEME_SETTINGS']['fields'] = array();

$GLOBALS['PCT_THEME_SETTINGS']['list_label_callback']['tl_page'] = array('\tl_page','addIcon');
// assets
$GLOBALS['PCT_THEME_SETTINGS']['css'] = 'system/modules/pct_theme_settings/assets/css/be_styles.css';
// import
$GLOBALS['PCT_THEME_SETTINGS']['zero_value_fields'] = array('tl_module.numberOfItems','tl_content.numberOfItems');


/**
 * Rgister backend keys
 */
$GLOBALS['BE_MOD']['content']['article']['contentelementset'] = array('PCT\ThemeSettings\Backend\PageContentElementSet','run'); 
$GLOBALS['BE_MOD']['content']['article']['contentelementset_export'] = array('PCT\ThemeSettings\Backend\PageContentElementSetExport','run'); 
// register backend module keys
$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
if( (\in_array('news',$bundles) || \in_array('ContaoNewsBundle',$bundles)) )
{
	$GLOBALS['BE_MOD']['content']['news']['contentelementset'] = array('PCT\ThemeSettings\Backend\PageContentElementSet','run'); 
}
if( \in_array('calendar', $bundles) || \in_array('ContaoCalendarBundle',$bundles) )
{
	$GLOBALS['BE_MOD']['content']['calendar']['contentelementset'] = array('PCT\ThemeSettings\Backend\PageContentElementSet','run'); 
}

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['pct_contentelementsets_node']['pct_contentelementset_start'] = '\Contao\PCT\ContentElementSet';
$GLOBALS['TL_CTE']['pct_contentelementsets_node']['pct_contentelementset_stop'] = '\Contao\PCT\ContentElementSet';


/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_theme_settings'] = array
(
	'pageimage' 	=> 'PCT\ThemeSettings\PageImage\Module',
	'pagearticle' 	=> 'PCT\ThemeSettings\PageArticle\Module',
#	'portfoliolist'		=> 'PCT\ThemeSettings\Portfolio\ModuleList',
#	'portfoliofilter'	=> 'PCT\ThemeSettings\Portfolio\ModuleFilter',
#	'portfolioreader'	=> 'PCT\ThemeSettings\Portfolio\ModuleReader',
);

/**
 * Elementset categories
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['elementSetCategories'] = array
(
	'favorites' 	=> array('label'=>'Favoriten','icon'=> 'ti-star'),
	'text'  => array('label'=>'Text','icon'=>'ti-text'),
	'image'  => array('label'=>'Bild','icon'=>'ti-image'),
	'tables_lists' => array('label'=>'Tabellen & Listen','icon'=>'ti-list'),
	'links' 			=> array('label'=>'Link-Elemente','icon'=>'ti-link'),
	'accordion_tabs'  	=> array('label'=>'Akkordeon & Tabs','icon'=>'ti-layout-tab'),
	'slider'  		=> array('label'=>'Slider','icon'=>'ti-layout-slider-alt'),
	'gallery_videos'  		=> array('label'=>'Galerie & Videos','icon'=>'ti-gallery'),
   'headers'  		   => array('label'=>'Headers','icon'=>'ti-layout-media-center'),
	'sections'  	=> array('label'=>'Sektion & Hintergründe','icon'=>'ti-layout-accordion-separated'),
   'boxes'  		=> array('label'=>'Boxen','icon'=>'ti-id-badge'),
	'infographics' => array('label'=>'Infografiken','icon'=>'ti-pie-chart'),
   'downloads'  	=> array('label'=>'Downloads','icon'=>'ti-cloud-down'),
   'maps'  		   => array('label'=>'Maps','icon'=>'ti-map-alt'),
	'dividers'  	=> array('label'=>'Trenner & Abstände','icon'=>'ti-split-v'),
);
// order array
$GLOBALS['PCT_ELEMENTSET_LIBRARY_ORDER'] = array();
$GLOBALS['PCT_ELEMENTSET_LIBRARY_CE_FIELDS'] = array
(
	'tl_content'=>'pct_customelement',
	'tl_module' => 'pct_customelement'
);

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['compileArticle'][] 		= array('PCT\ThemeSettings\ContaoCallbacks','compileArticleCallback');
$GLOBALS['TL_HOOKS']['loadDataContainer'][] 	= array('PCT\ThemeSettings\ContaoCallbacks','enableManualSorting');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 	= array('PCT\ThemeSettings\ContaoCallbacks','replaceInsertTagsCallback');
$GLOBALS['TL_HOOKS']['newsListFetchItems']['PCT_MANUAL_ORDER'] 	= array('PCT\ThemeSettings\ContaoCallbacks','newsListFetchItemsCallback');
#$GLOBALS['TL_HOOKS']['newsListCountItems']['PCT_MANUAL_ORDER'] 	= array('PCT\ThemeSettings\ContaoCallbacks','newsListCountItemsCallback');
$GLOBALS['TL_HOOKS']['getContentElement'][] 	= array('PCT\ThemeSettings\ContaoCallbacks','getContentElementCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('PCT\ThemeSettings\ContaoCallbacks','parseTemplateCallback');
$GLOBALS['TL_HOOKS']['isVisibleElement'][] 		= array('PCT\ThemeSettings\ContaoCallbacks','isVisibleElementCallback');
$GLOBALS['TL_HOOKS']['loadFormField'][] 		= array('PCT\ThemeSettings\ContaoCallbacks','loadFormFieldCallback');
$GLOBALS['TL_HOOKS']['initializeSystem'][] 		= array('PCT\ThemeSettings\ContaoCallbacks','initializeSystemCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('PCT\ThemeSettings\Backend\BackendIntegration','parseTemplateCallback');
$GLOBALS['TL_HOOKS']['getContentElement'][] 	= array('PCT\ThemeSettings\Backend\BackendIntegration','getContentElementCallback');
$GLOBALS['TL_HOOKS']['executePostActions'][]	= array('PCT\ThemeSettings\Backend\TableArticle','executePostActionsCallback');
$GLOBALS['TL_HOOKS']['initializeSystem'][] 	= array('PCT\License','checkIntegrity');
$GLOBALS['TL_HOOKS']['initializeSystem'][]	 	= array('PCT\License','checkBackend');
$GLOBALS['TL_HOOKS']['parseTemplate'][]	 		= array('PCT\License','checkFrontend');
$GLOBALS['TL_HOOKS']['initializeSystem'][] 		= array('PCT\License','addBackendInfo');
$GLOBALS['TL_CRON']['hourly'][]	 				= array('PCT\License','sendAdminMailWhenLocked');
// Content element set export has been called
$GLOBALS['TL_HOOKS']['loadDataContainer'][] 	= array('PCT\ThemeSettings\Backend\TableContent','exportElements');