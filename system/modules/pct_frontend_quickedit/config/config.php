<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */
 
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

/**
 * Constants
 */
define('PCT_FRONTEND_QUICKEDIT_VERSION', '2.1.1');
define('PCT_FRONTEND_QUICKEDIT_PATH','system/modules/pct_frontend_quickedit');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_frontend_quickedit/config/autoload.php' );
}

/**
 * Globals
 */
$GLOBALS['PCT_FRONTEND_QUICKEDIT'] = array();
$GLOBALS['PCT_FRONTEND_QUICKEDIT_CONFIG'] = array();
$GLOBALS['PCT_QUICKEDIT_INTERFACES'] = array();
$GLOBALS['PCT_QUICKEDIT_MODELS'] = array();
if( !isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']) )
{
	$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES'] = array();
}

// Settings
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['dataAttributePrefix'] 	= 'pct-edit__%s'; // the prefix for the data- attribute e.g. data-pctfb_id="123"
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssIdLogic'] 			= 'pct-edit__%s'; // the unique cssID logic incase an element has no CSS-ID to identify
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['CSS'] 					= PCT_FRONTEND_QUICKEDIT_PATH.'/assets/css/styles.css';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['scrollPositionKey'] 	= 'PCT_FRONTEND_EDIT_SCROLLPOSITION'; // localStorage key for the scroll position
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['sizeClassKey']			= 'PCT_FRONTEND_EDIT_WINDOW_SIZE';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['windowOpenKey']			= 'PCT_FRONTEND_EDIT_WINDOW_SRC';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['liveModeKey']			= 'PCT_FRONTEND_EDIT_LIVE_MODE';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssSizeClasses']		= array('size-s','size-l');
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['timer']					= 300; // timer in seconds before auto refresh
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssDisabledClass']		= 'edit-off';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content']	= true; // true: click an element will open the editor directly. false: click the "edit" button to open the editor
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::form'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::module'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_news'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::swiper-slider-start'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::portfoliofilter'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::google_map'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::openstreetmap'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::tabs'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::revolutionslider'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::autogridColStart'] = false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_module'] = true;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_module::html'] = true;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['isCustomCatalog']	= true;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['contentelements::edit_list'] = 'size-l';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['contentelements::editheader'] = 'size-l';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['articles::editheader'] = 'size-l';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['isCustomCatalog::edit'] = 'size-s';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['isCustomCatalog::edit_list'] = 'size-l';

// define templates
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements'] 		= array
(
	'tl_content'	=> 'interface_contentelement',
	'tl_article'	=> 'interface_article',
	'tl_module'		=> 'interface_module',
	'tl_news'		=> 'interface_news',
	'tl_calendar_events'	=> 'interface_events',
	'tl_form'		=> 'interface_form',
	'isCustomCatalog'		=> 'interface_customcatalog',
);
// special templates
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::sliderStart'] = 'interface_contentelement_sliderStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::swiper-slider-start'] = 'interface_contentelement_swiper-slider-start';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::autogridColStart'] = 'interface_contentelement_autogridColStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::revolutionslider'] = 'interface_contentelement_revolutionslider';

// excludes
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridGridStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridGridStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridRowStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridRowStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridColStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'grid_gallery_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'video_background_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'youtube_background_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'youtube_background_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'bgimage_content_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'imagemap_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'popup_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'frame_end';
#$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'swiper-slider-start';
#$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'swiper-slider-end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'swiper-slider-divider';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'tabs_divider';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'tabs_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'wrap_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'timeline_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'bgimage_end';
#$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_text';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_hyperlink';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_video';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_image';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'bgimage_content_divider';

$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_module'][] = 'newsreader';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_module'][] = 'eventreader';
// exclude wrappers and all in between [start] => [stop]
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START']['tl_content']['sliderStart'] = 'sliderStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START']['tl_content']['swiper-slider-start'] = 'swiper-slider-end';

// Offset elemente
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_revolutionslider > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_bgimage > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_player > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .mod_pageimage > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_headerimage > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_vertical_spacer_px > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = 'body.horizontal_scrolling #slider .mod_article > .pct_edit_interface';

// Back end form fields
$GLOBALS['BE_FFL']['pctSizesWizard'] = 'PCT\FrontendQuickEdit\Widgets\SizesWizard';

// Front end modules
$GLOBALS['FE_MOD']['miscellaneous']['backendlogin'] = 'PCT\FrontendQuickEdit\Frontend\ModuleBackendLogin';

/**
 * Hooks
 */ 
$GLOBALS['TL_HOOKS']['initializeSystem'][] 		= array('PCT\FrontendQuickEdit\SystemIntegration','loadBackendAssets');
$GLOBALS['TL_HOOKS']['generatePage'][] 			= array('PCT\FrontendQuickEdit\SystemIntegration','loadFrontendAssets');
$GLOBALS['TL_HOOKS']['getContentElement'][] 	= array('PCT\FrontendQuickEdit\ContaoCallbacks','getFrontendElementCallback');
$GLOBALS['TL_HOOKS']['getFrontendModule'][] 	= array('PCT\FrontendQuickEdit\ContaoCallbacks','getFrontendElementCallback');
$GLOBALS['TL_HOOKS']['generatePage'][] 			= array('PCT\FrontendQuickEdit\ContaoCallbacks','generatePageCallback');
$GLOBALS['TL_HOOKS']['isVisibleElement'][] 		= array('PCT\FrontendQuickEdit\ContaoCallbacks','isVisibleElementCallback');
$GLOBALS['TL_HOOKS']['parseArticles'][] 		= array('PCT\FrontendQuickEdit\ContaoCallbacks','parseArticlesCallback');
$GLOBALS['TL_HOOKS']['getAllEvents'][] 			= array('PCT\FrontendQuickEdit\ContaoCallbacks','getAllEventsCallback');
$GLOBALS['CUSTOMCATALOG_HOOKS']['getEntries'][] = array('PCT\FrontendQuickEdit\ContaoCallbacks','getCustomCatalogEntriesCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('PCT\FrontendQuickEdit\ContaoCallbacks','parseTemplateCallback');
$GLOBALS['TL_HOOKS']['parseFrontendTemplate'][] = array('PCT\FrontendQuickEdit\ContaoCallbacks','parseFrontendTemplateCallback');
$GLOBALS['TL_HOOKS']['postLogin'][] 		= array('PCT\FrontendQuickEdit\SystemIntegration','backendUserLoggedIn');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 	= array('PCT\FrontendQuickEdit\ContaoCallbacks','replaceInsertTagsCallback');
