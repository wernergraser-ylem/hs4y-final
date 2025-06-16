<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

/**
 * Constants
 */
define('PCT_THEMER_VERSION', '5.0.3');
define('PCT_THEMER_PATH','system/modules/pct_themer');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_themer/config/autoload.php' );
}

/**
 * Globals
 */
$GLOBALS['PCT_THEMER']['fileLogic'] = 'templates/demo_installer/demo_%s.php'; // e.g. demo_minimalist.php
$GLOBALS['PCT_THEMER']['appendTitle'] = ''; //  [imported by %s (%s)]
$GLOBALS['PCT_THEMER']['defaultLayout'] = 'Content-Page - Full Width';
if(!isset($GLOBALS['PCT_THEMER']['THEMES']))
{
	$GLOBALS['PCT_THEMER']['THEMES'] 	= array();
}
$GLOBALS['PCT_THEMER']['multiSRC_fields'] = array('multiSRC'); // blob value fields that contain binary data
$GLOBALS['PCT_THEMER']['singleJumpTo_fields'] = array('jumpTo','customcatalog_jumpTo','reg_jumpTo'); // relink single pages 
$GLOBALS['PCT_THEMER']['multiJumpTo_fields'] = array('pages'); // relink multiple page selections
$GLOBALS['PCT_THEMER']['imageText_fields'] = array('bgimage','autogrid_bgimage');
$GLOBALS['PCT_THEMER_CE_FIELDS'] = array
(
	'tl_content'=>'pct_customelement',
	'tl_module' => 'pct_customelement'
);
$GLOBALS['PCT_THEMER']['zero_value_fields'] = array('tl_module.numberOfItems','tl_content.numberOfItems');

// ThemeDesigner
$GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'] = '%s_%s'; // logic: versionname_timestamp (optional:)_demo-name
$GLOBALS['PCT_THEMEDESIGNER_CSS_FILE'] = 'files/cto_layout/themedesigner/css/%s.css';
$GLOBALS['PCT_THEMEDESIGNER_FONTS_CSS_FILE'] = 'files/cto_layout/themedesigner/fonts_css/%s_fonts.css';
$GLOBALS['PCT_THEMEDESIGNER']['maxFileSize'] = 3000000; // byte
$GLOBALS['PCT_THEMEDESIGNER']['allowedUploadTypes'] = 'jpg,jpeg,gif,png,svg,gif';
$GLOBALS['PCT_THEMEDESIGNER']['uploadFolder']	 = 'files/cto_layout/themedesigner/uploads';
$GLOBALS['PCT_THEMEDESIGNER']['googlefontsFolder']	 = 'files/cto_layout/fonts/googlefonts';
$GLOBALS['PCT_THEMEDESIGNER']['bypassServerCache'] = true;
$GLOBALS['PCT_THEMEDESIGNER']['CSS'] = PCT_THEMER_PATH.'/assets/css/themedesigner.css';
$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] = true;
$GLOBALS['PCT_THEMEDESIGNER']['startSection'] = 'LOGO';
if(!isset($GLOBALS['PCT_THEMEDESIGNER']['fonts']))
{
	$GLOBALS['PCT_THEMEDESIGNER']['fonts'] = array();
}
$GLOBALS['PCT_THEMEDESIGNER']['fontPickerStyleIdent'] = '_style';
$GLOBALS['PCT_THEMEDESIGNER']['fontPickerWeightIdent'] = '_weight';
$GLOBALS['PCT_THEMEDESIGNER']['useIframe'] = true;
$GLOBALS['PCT_THEMEDESIGNER']['showFieldsWithNoDevice'] = true; // show or hide fields that have no device definced in config by default
$GLOBALS['PCT_THEMEDESIGNER']['showNaviWithNoDevice'] = true; // show or hide fields elements that have no device defined in config
$GLOBALS['PCT_THEMEDESIGNER']['showPaletteWithNoDevice'] = true; // show or hide fields elements that have no device defined in config
$GLOBALS['PCT_THEMEDESIGNER']['contaoErrorPages'] = array('error_401','error_403','error_404','error_503');

$GLOBALS['PCT_THEMEDESIGNER']['ajaxUrl'] = PCT_THEMER_PATH.'/assets/html/themedesigner.php';
if(!isset($GLOBALS['PCT_THEMEDESIGNER']['demoMode']))
{
	$GLOBALS['PCT_THEMEDESIGNER']['demoMode'] = false;
}
if(!isset($GLOBALS['PCT_THEMEDESIGNER']['excludes']))
{
	$GLOBALS['PCT_THEMEDESIGNER']['excludes'] = array('eclipse_intro'); // exclude pages by id or by theme 
}
if(!isset($GLOBALS['PCT_THEMEDESIGNER']['privacy_session_name']))
{
	$GLOBALS['PCT_THEMEDESIGNER']['privacy_session_name'] = 'user_privacy_settings';
}

// Demo-Installer
$GLOBALS['PCT_DEMOINSTALLER']['SKIP'] = array
(
	'tl_module' => array('langswitch','search','socials','login'),
);

/**
 * Register backend page / key
 */
// Themer
if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$GLOBALS['BE_MOD']['content']['page']['theme_export'] = array('PCT\Themer\Backend', 'exportTheme');
}
else
{
	$GLOBALS['BE_MOD']['design']['page']['theme_export'] = array('PCT\Themer\Backend', 'exportTheme');
}


// ThemerDesigner
$GLOBALS['BE_MOD']['design']['pct_themedesigner'] = array
(
	'tables' => array('tl_pct_themedesigner'),
	'icon'	 => PCT_THEMER_PATH.'/assets/img/icon.gif',
	'stylesheet' => PCT_THEMER_PATH.'/assets/css/be_styles.css',
);
// ThemerDesigner
$GLOBALS['BE_MOD']['design']['pct_demoinstaller'] = array
(
	'callback'   	=> 'PCT\Themer\DemoInstaller',
	'icon'	 		=> PCT_THEMER_PATH.'/assets/img/icon_demoinstaller.gif',
	'stylesheet' 	=> PCT_THEMER_PATH.'/assets/css/be_styles.css',
);

/**
 * Hooks
 */ 
// Themer
$GLOBALS['TL_HOOKS']['parseTemplate'][] 			= array('PCT\Themer','addThemeFiles');
$GLOBALS['TL_HOOKS']['getPageLayout'][] 			= array('PCT\Themer','addThemeFonts');

// ThemeDesigner
if( (boolean)\Contao\Database::getInstance()->tableExists('tl_image_size') === true && ( (boolean)\Contao\Config::get('pct_themedesigner_off') === false || (boolean)\Contao\Config::get('pct_themedesigner_hidden') === false ) )
{
	// define Theme Designer active constant
	define('THEMEDESIGNER_ACTIVE',1);

	#$GLOBALS['TL_HOOKS']['getPageIdFromUrl'][]		= array('PCT\ThemeDesigner\Frontend','getPageIdFromUrlCallback');
	$GLOBALS['TL_HOOKS']['loadPageDetails'][] 		= array('PCT\ThemeDesigner\Frontend','removeErrorPagesFromPageRegistry');
	$GLOBALS['TL_HOOKS']['loadPageDetails'][] 		= array('PCT\ThemeDesigner\Frontend','bypassMaintenanceMode');
	$GLOBALS['TL_HOOKS']['generateFrontendUrl'][]  	= array('PCT\ThemeDesigner\Frontend','generateFrontendUrlCallback');
	$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('PCT\ThemeDesigner','loadConfig');
	$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('PCT\ThemeDesigner','addFonts');
	
	$GLOBALS['TL_HOOKS']['parseTemplate'][]			= array('PCT\ThemeDesigner','addToTemplate');
	$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('PCT\ThemeDesigner','addToLayout');
	
	$GLOBALS['TL_HOOKS']['generatePage'][] 			= array('PCT\ThemeDesigner','ajaxListener');
	$GLOBALS['TL_HOOKS']['generatePage'][] 			= array('PCT\ThemeDesigner','addFontsOptin');
	$GLOBALS['TL_HOOKS']['generatePage'][] 			= array('PCT\ThemeDesigner\Versions','formListener');
	$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 	= array('PCT\ThemeDesigner\InsertTags','replaceTags');
	$GLOBALS['TL_HOOKS']['generatePage'][] 			= array('PCT\ThemeDesigner','formListener');
	
	$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
	if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
	{
		$GLOBALS['TL_HOOKS']['initializeSystem'][] 		= array('PCT\ThemeDesigner\Backend','removeIframeSession');
		$GLOBALS['TL_HOOKS']['getSystemMessages'][] 	= array('PCT\ThemeDesigner\Backend','isActiveMessage');
		$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('PCT\ThemeDesigner\Backend','injectIsActiveMessageInBackendPage');
	}
	
	// load iframe layout only when TD is visible
	if((boolean)\Contao\Config::get('pct_themedesigner_hidden') === false)
	{
		$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('PCT\ThemeDesigner','setLayoutTemplate');
	}
	
	if(\Contao\Input::get('themedesigner_iframe'))
	{
		\Contao\Config::set('debugMode',false);
	}
}


/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_pct_themedesigner'] 	= 'PCT\ThemeDesigner\Model';


/**
 * Register theme demos 
 */

// custom default root settings
$GLOBALS['PCT_THEMER']['root'] = array
(
	'addArticle' => 1,
	'article' => 353
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intro'] = array
(
	'label'			=> 'Intro',
	'css'            => array('layout.css|static'),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_minimalist'] = array
(
	'label'			=> 'Minimalist',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-minimalist.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_upside'] = array
(
	'label'			=> 'Upside',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-upside.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructor'] = array
(
	'label'			=> 'Constructor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-constructor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_chef'] = array
(
	'label'			=> 'Chef',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-chef.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agenzy'] = array
(
	'label'			=> 'Agenzy',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','portfolio'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-agenzy.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_finance'] = array
(
	'label'			=> 'Finance',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-finance.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_flatbiz'] = array
(
	'label'			=> 'Flatbiz',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-flatbiz.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_selectist'] = array
(
	'label'			=> 'Selectist',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('portfolio'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-selectist.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photographer'] = array
(
	'label'			=> 'Photographer',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('portfolio','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-photographer.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_skyfall'] = array
(
	'label'			=> 'Skyfall',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-skyfall.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_archit'] = array
(
	'label'			=> 'Archit',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-archit.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_transporter'] = array
(
	'label'			=> 'Transporter',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-transporter.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_magazine'] = array
(
	'label'			=> 'Magazine',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('blog'),
	'layout'		=> 'Content-Page - Sidebar right',
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-magazine.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_studio'] = array
(
	'label'			=> 'Studio',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('portfolio','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-studio.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_titanum'] = array
(
	'label'			=> 'Titanum',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-titanum.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_universe'] = array
(
	'label'			=> 'Universe',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-universe.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_seomatic'] = array
(
	'label'			=> 'Seomatic',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-seomatic.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medical'] = array
(
	'label'			=> 'Medical',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-medical.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_resort'] = array
(
	'label'			=> 'Resort',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-resort.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_company'] = array
(
	'label'			=> 'Company',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-company.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lawyer'] = array
(
	'label'			=> 'Lawyer',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-lawyer.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sportclub'] = array
(
	'label'			=> 'Sportclub',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-sportclub.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_clearsay'] = array
(
	'label'			=> 'Clearsay',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-clearsay.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fitness'] = array
(
	'label'			=> 'Fitness',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-fitness.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bachelor'] = array
(
	'label'			=> 'Bachelor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-bachelor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_creative'] = array
(
	'label'			=> 'Creative',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-creative.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photo'] = array
(
	'label'			=> 'Photo',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('portfolio','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-photo.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_projecta'] = array
(
	'label'			=> 'Projecta',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-projecta.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_blogiq'] = array
(
	'label'			=> 'Blogiq',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('blog'),
	'layout'		=> 'Content-Page - Sidebar right',
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-blogiq.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_frame'] = array
(
	'label'			=> 'Frame',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-frame.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coach'] = array
(
	'label'			=> 'Coach',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-coach.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advisor'] = array
(
	'label'			=> 'Advisor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-advisor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_planner'] = array
(
	'label'			=> 'Planner',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-planner.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_interior'] = array
(
	'label'			=> 'Interior',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-interior.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fashion'] = array
(
	'label'			=> 'Fashion',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-fashion.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smartbiz'] = array
(
	'label'			=> 'SmartBiz',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-smartbiz.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_charity'] = array
(
	'label'			=> 'Charity',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-charity.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleaner'] = array
(
	'label'			=> 'Cleaner',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-cleaner.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotel'] = array
(
	'label'			=> 'Hotel',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-hotel.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_portfolio'] = array
(
	'label'			=> 'Portfolio',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('portfolio'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-portfolio.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_software'] = array
(
	'label'			=> 'Software',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-software.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_energy'] = array
(
	'label'			=> 'Energy',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-energy.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_masonry'] = array
(
	'label'			=> 'Masonry',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('portfolio','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-masonry.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automobile'] = array
(
	'label'			=> 'Automobile',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-automobile.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_carpenter'] = array
(
	'label'			=> 'Carpenter',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-carpenter.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_personal'] = array
(
	'label'			=> 'Personal',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('portfolio','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-personal.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cosmetica'] = array
(
	'label'			=> 'Cosmetica',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-cosmetica.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_parallax'] = array
(
	'label'			=> 'Parallax',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-parallax.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kids'] = array
(
	'label'			=> 'Kids',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-kids.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_designer'] = array
(
	'label'			=> 'Designer',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('portfolio','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-designer.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropage'] = array
(
	'label'			=> 'Micropage',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-micropage.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropagetwo'] = array
(
	'label'			=> 'Micropage Two',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-micropage-two.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business'] = array
(
	'label'			=> 'Business',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-business.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxhelp'] = array
(
	'label'			=> 'Taxhelp',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-taxhelp.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_journal'] = array
(
	'label'			=> 'Journal',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('blog','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-journal.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_event'] = array
(
	'label'			=> 'Event',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-event.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_plumber'] = array
(
	'label'			=> 'Plumber',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-plumber.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musicalian'] = array
(
	'label'			=> 'Musicalian',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-musicalian.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_author'] = array
(
	'label'			=> 'Author',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-author.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hoster'] = array
(
	'label'			=> 'Hoster',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-hoster.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_restaurant'] = array
(
	'label'			=> 'Restaurant',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other','onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-restaurant.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_appify'] = array
(
	'label'			=> 'Appify',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-appify.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onepager'] = array
(
	'label'			=> 'Onepager',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-onepager.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sorento'] = array
(
	'label'			=> 'Sorento',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('onepage','creative'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-sorento.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_immorealty'] = array
(
	'label'			=> 'Immo-Realty',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'installer'	=> false,
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cardealer'] = array
(
	'label'			=> 'Cardealer',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'installer'	=> false,
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_catalog'] = array
(
	'label'			=> 'Catalog',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'installer'	=> false, 
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accommodation'] = array
(
	'label'			=> 'Accommodation',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'installer'	=> false,
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coming_soon'] = array
(
	'label'			=> 'Coming Soon',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-coming-soon-onepage.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsquare'] = array
(
	'label'			=> 'Softsquare',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-softsquare.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_dental'] = array
(
	'label'			=> 'Dental',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-dental.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_penthouse'] = array
(
	'label'			=> 'Penthouse',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-penthouse.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallimmo'] = array
(
	'label'			=> 'Small-Immo',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-small-immo.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallagency'] = array
(
	'label'			=> 'Small-Agency',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','portfolio'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-small-agency.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_translogic'] = array
(
	'label'			=> 'Translogic',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-translogic.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporate'] = array
(
	'label'			=> 'Corporate',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-corporate.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_callcenter'] = array
(
	'label'			=> 'Callcenter',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-callcenter.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_businessious'] = array
(
	'label'			=> 'Businessious',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-businessious.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_landy'] = array
(
	'label'			=> 'Landy',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-landy.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architectural'] = array
(
	'label'			=> 'Architectural',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-architectural.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_powerbiz'] = array
(
	'label'			=> 'Powerbiz',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-powerbiz.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_funeral'] = array
(
	'label'			=> 'Funeral',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-funeral.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrial'] = array
(
	'label'			=> 'Industrial',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-industrial.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_invest'] = array
(
	'label'			=> 'Invest',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-invest.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_yoga'] = array
(
	'label'			=> 'Yoga',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-yoga.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurance'] = array
(
	'label'			=> 'Insurance',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-insurance.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_consultant'] = array
(
	'label'			=> 'Consultant',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-consultant.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sporty'] = array
(
	'label'			=> 'Sporty',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-sporty.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accountant'] = array
(
	'label'			=> 'Accountant',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-accountant.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_garden'] = array
(
	'label'			=> 'Garden',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-garden.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffee'] = array
(
	'label'			=> 'Coffee',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-coffee.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pictures'] = array
(
	'label'			=> 'Pictures',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-pictures.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_arc'] = array
(
	'label'			=> 'Arc',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-arc.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_showcase'] = array
(
	'label'			=> 'Showcase',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-showcase.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_organic'] = array
(
	'label'			=> 'Organic',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-organic.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sanitary'] = array
(
	'label'			=> 'Sanitary',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-sanitary.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_alphabiz'] = array
(
	'label'			=> 'AlphaBiz',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-alphabiz.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxi'] = array
(
	'label'			=> 'Taxi',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-taxi.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onelaw'] = array
(
	'label'			=> 'Onelaw',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-onelaw.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_perfumes'] = array
(
	'label'			=> 'Perfumes',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','creative','onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-perfumes.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctor'] = array
(
	'label'			=> 'Doctor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-doctor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_beauty'] = array
(
	'label'			=> 'Beauty',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('other','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-beauty.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_outdoor'] = array
(
	'label'			=> 'Outdoor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-outdoor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_babypics'] = array
(
	'label'			=> 'Babypics',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-babypics.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pizza'] = array
(
	'label'			=> 'Pizza',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-pizza.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_botox'] = array
(
	'label'			=> 'Botox',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-botox.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architlab'] = array
(
	'label'			=> 'Architlab',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-architlab.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mall'] = array
(
	'label'			=> 'Mall',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-mall.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelpro'] = array
(
	'label'			=> 'Hotel Pro',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(), 
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-hotel-pro.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_slimbiz'] = array
(
	'label'			=> 'SlimBiz',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-slimbiz.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wedding'] = array
(
	'label'			=> 'Wedding',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other','onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-wedding.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nightclub'] = array
(
	'label'			=> 'Nightclub',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-nightclub.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_optician'] = array
(
	'label'			=> 'Optician',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-optician.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_trade'] = array
(
	'label'			=> 'Trade',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-trade.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bakery'] = array
(
	'label'			=> 'Bakery',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-bakery.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advocate'] = array
(
	'label'			=> 'Advocate',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-advocate.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffeeshop'] = array
(
	'label'			=> 'Coffeeshop',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-coffeeshop.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_contractor'] = array
(
	'label'			=> 'Contractor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-contractor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kitchen'] = array
(
	'label'			=> 'Kitchen',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-kitchen.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automechanic'] = array
(
	'label'			=> 'Automechanic',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-automechanic.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_retirement'] = array
(
	'label'			=> 'Retirement',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-retirement.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_petcare'] = array
(
	'label'			=> 'Petcare',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-petcare.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onebiz'] = array
(
	'label'			=> 'OneBiz',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-onebiz.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_directory'] = array
(
	'label'			=> 'Directory',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'installer'	=> false,
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_physio'] = array
(
	'label'			=> 'Physio',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-physio.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleanup'] = array
(
	'label'			=> 'Cleanup',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-cleanup.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electrician'] = array
(
	'label'			=> 'Electrician',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-electrician.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_steelwork'] = array
(
	'label'			=> 'Steelwork',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-steelworks.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cloudtel'] = array
(
	'label'			=> 'CloudTel',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-cloudtel.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_aperture'] = array
(
	'label'			=> 'Aperture',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative','portfolio'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-aperture.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_design'] = array
(
	'label'			=> 'Design',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative','portfolio'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-design.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_stylist'] = array
(
	'label'			=> 'Stylist',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-stylist.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_money'] = array
(
	'label'			=> 'Money',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-money.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artfolio'] = array
(
	'label'			=> 'Artfolio',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative','portfolio'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-artfolio.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_barber'] = array
(
	'label'			=> 'Barber',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-barber.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_workingspace'] = array
(
	'label'			=> 'WorkingSpace',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-workingspace.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lingoo'] = array
(
	'label'			=> 'Lingoo',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-lingoo.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_apartment'] = array
(
	'label'			=> 'Apartment',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-apartment.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pursuit'] = array
(
	'label'			=> 'Pursuit',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-pursuit.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productline'] = array
(
	'label'			=> 'ProductLine',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-productline.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrytech'] = array
(
	'label'			=> 'IndustryTech',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-industrytech.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructionflex'] = array
(
	'label'			=> 'ConstructionFlex',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-constructionflex.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insuranceking'] = array
(
	'label'			=> 'InsuranceKing',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-insuranceking.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsolutions'] = array
(
	'label'			=> 'SoftSolutions',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-softsolutions.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_credit'] = array
(
	'label'			=> 'Credit',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-credit.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wine'] = array
(
	'label'			=> 'Wine',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-wine.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_woodwork'] = array
(
	'label'			=> 'Woodwork',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-woodwork.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_ebusiness'] = array
(
	'label'			=> 'eBusiness',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-ebusiness.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_comingsoon_onepage'] = array
(
	'label'			=> 'Coming Soon Onepage',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-coming-soon-onepage.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agencyline'] = array
(
	'label'			=> 'AgencyLine',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-agencyline.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelapart'] = array
(
	'label'			=> 'HotelApart',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'installer'	=> false,
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_decor'] = array
(
	'label'			=> 'Decor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-decor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_buildr'] = array
(
	'label'			=> 'Buildr',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-buildr.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_redbusiness'] = array
(
	'label'			=> 'RedBusiness',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-redbusiness.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_diners'] = array
(
	'label'			=> 'Diners',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-diners.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporateplus'] = array
(
	'label'			=> 'CorporatePlus',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-corporateplus.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cowork'] = array
(
	'label'			=> 'CoWork',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-cowork.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cupcakes'] = array
(
	'label'			=> 'CupCakes',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-cupcakes.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productcatalog'] = array
(
	'label'			=> 'ProductCatalog',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'installer'	=> false,
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_phonestore'] = array
(
	'label'			=> 'PhoneStore',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-phonestore.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tailor'] = array
(
	'label'			=> 'Tailor',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-tailor.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_highbiz'] = array
(
	'label'			=> 'HighBiz',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-highbiz.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_merchandiser'] = array
(
	'label'			=> 'Merchandiser',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-merchandiser.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_vintage'] = array
(
	'label'			=> 'Vintage',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-vintage.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctors'] = array
(
	'label'			=> 'Doctors',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-doctors.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mybooks'] = array
(
	'label'			=> 'MyBooks',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-mybooks.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agency51'] = array
(
	'label'			=> 'Agency51',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-agency51.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstext'] = array
(
	'label'			=> 'LessText',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-lesstext.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstexttwo'] = array
(
	'label'			=> 'LessTextTwo',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('onepage'),
	'layout'		=> 'One-Page: Horizontal Scrolling',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-lesstexttwo.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tavern'] = array
(
	'label'			=> 'Tavern',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-tavern.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bluespa'] = array
(
	'label'			=> 'Bluespa',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-bluespa.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_whiteone'] = array
(
	'label'			=> 'Whiteone',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-whiteone.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_easyimmo'] = array
(
	'label'			=> 'EasyImmo',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-easyimmo.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_room'] = array
(
	'label'			=> 'Room',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-room.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_webworker'] = array
(
	'label'			=> 'Webworker',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-webworker.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurancegroup'] = array
(
	'label'			=> 'InsuranceGroup',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-insurancegroup.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artgallery'] = array
(
	'label'			=> 'Artgallery',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('creative'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-artgallery.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_toys'] = array
(
	'label'			=> 'Toys',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-toys.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medicine'] = array
(
	'label'			=> 'Medicine',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-medicine.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_audit'] = array
(
	'label'			=> 'Audit',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-audit.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_booklibrary'] = array
(
	'label'			=> 'Book Library',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'installer'	=> false,
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musteragentur'] = array
(
	'label'			=> 'Musteragentur',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-musteragentur.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbuilder'] = array
(
	'label'			=> 'X-Builder',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-xbuilder.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbusiness'] = array
(
	'label'			=> 'X-Business',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-xbusiness.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xstudio'] = array
(
	'label'			=> 'X-Studio',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-xstudio.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xindustry'] = array
(
	'label'			=> 'X-Industry',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-xindustry.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xinvestment'] = array
(
	'label'			=> 'X-Investment',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-xinvestment.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xflowerstore'] = array
(
	'label'			=> 'X-Flowerstore',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-xflowerstore.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbar'] = array
(
	'label'			=> 'X-Bar',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-xbar.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electric_pro'] = array
(
	'label'			=> 'Electric-Pro',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-electric-pro.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_take_away'] = array
(
	'label'			=> 'Take Away',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('onepage'),
	'layout'		=> 'One-Page',
	'root' => array('addArticle'=>''),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-one-page-take-away.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_digitization'] = array
(
	'label'			=> 'Digitization',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-digitization.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_psychology'] = array
(
	'label'			=> 'Psychology',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-psychology.html',
	'root'			=> array
	(
		'article' => 13536
	)
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intranet'] = array
(
	'label'			=> 'Intranet',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-intranet.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_visions'] = array
(
	'label'			=> 'Visions',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-visions.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_itservice'] = array
(
	'label'			=> 'ITService',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-itservice.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_west_consulting'] = array
(
	'label'			=> 'West Consulting',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-west-consulting.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_illusion'] = array
(
	'label'			=> 'Illusion',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-illusion.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business_coach'] = array
(
	'label'			=> 'Business Coach',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-business-coach.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_megamenu'] = array
(
	'label'			=> 'Megamenu',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-megamenu.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_contentpages'] = array
(
	'label'			=> 'Presets: Contentpages',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('presets'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-presets-contentpage.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_default'] = array
(
	'label'			=> 'Default Demo (All Features)',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('other'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-default.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_forms'] = array
(
	'label'			=> 'Presets: Forms',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('presets'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-presets-forms.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_footer'] = array
(
	'label'			=> 'Presets: Footer',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('presets'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-presets-footer.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_news_events'] = array
(
	'label'			=> 'Presets: News & Events',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('presets'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-presets-news-events.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_portfolio'] = array
(
	'label'			=> 'Presets: Portfolio',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('presets'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-presets-portfolio.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_rs'] = array
(
	'label'			=> 'Presets: Revolution Slider Basic-Presets',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('presets'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-presets-revolution-slider.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_solis'] = array
(
	'label'			=> 'Solis',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','new'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-solis.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nova'] = array
(
	'label'			=> 'Nova',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','new'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-nova.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lambda'] = array
(
	'label'			=> 'Lambda',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','new'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-lambda.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_brokengrid'] = array
(
	'label'			=> 'BrokenGrid',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','new'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-brokengrid.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_helion'] = array
(
	'label'			=> 'Helion',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','onepage','new'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-helion.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_veluna'] = array
(
	'label'			=> 'Veluna',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array('business','new'),
	'link'		=> 'https://eclipse.premium-contao-themes.com/demo-veluna.html',
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom1'] = array
(
	'label'			=> 'CustomLayout1',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array(''),
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom2'] = array
(
	'label'			=> 'CustomLayout2',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array(''),
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom3'] = array
(
	'label'			=> 'CustomLayout3',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array(''),
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom4'] = array
(
	'label'			=> 'CustomLayout4',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array(''),
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom5'] = array
(
	'label'			=> 'CustomLayout5',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array(''),
);

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_autogrid_testing'] = array
(
	'label'			=> 'AutoGrid Testing',
	'css'            => array(),
	'scripts'		=> array(),
	'googlefonts'	=> array(),
	'category'		=> array(''),
	'installer'	=> false, 
);

/* Presets Googlefonts */

$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intro']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_default']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_footer']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_forms']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_news_events']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_portfolio']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_contentpages']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_minimalist']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_appify']['googlefonts'] = array('Ubuntu','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sorento']['googlefonts'] = array('Cutive+Mono','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onepager']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_immorealty']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_catalog']['googlefonts'] = array('Lato','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cardealer']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accommodation']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_upside']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructor']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_chef']['googlefonts'] = array('Courgette','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agenzy']['googlefonts'] = array('Montserrat','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_finance']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_flatbiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_selectist']['googlefonts'] = array('Adamina','Anton');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photographer']['googlefonts'] = array('Oswald','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_skyfall']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_archit']['googlefonts'] = array('Karla');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_transporter']['googlefonts'] = array('Lato','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_magazine']['googlefonts'] = array('Patua+One','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_studio']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_titanum']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_universe']['googlefonts'] = array('Raleway','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_seomatic']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medical']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_resort']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_company']['googlefonts'] = array('Montserrat','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lawyer']['googlefonts'] = array('Merriweather','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sportclub']['googlefonts'] = array('Oswald','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_clearsay']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fitness']['googlefonts'] = array('Roboto+Condensed','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bachelor']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_creative']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_projecta']['googlefonts'] = array('Raleway','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_blogiq']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_frame']['googlefonts'] = array('Josefin+Sans','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coach']['googlefonts'] = array('Raleway','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advisor']['googlefonts'] = array('Fjalla+One','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_planner']['googlefonts'] = array('Josefin+Sans','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_interior']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fashion']['googlefonts'] = array('Advent+Pro','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smartbiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_charity']['googlefonts'] = array('Roboto+Slab','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleaner']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotel']['googlefonts'] = array('Merriweather','Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_portfolio']['googlefonts'] = array('Inconsolata','Unica+One');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_software']['googlefonts'] = array('Scada','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_energy']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_masonry']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automobile']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_carpenter']['googlefonts'] = array('Merriweather');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_personal']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cosmetica']['googlefonts'] = array('Raleway','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_parallax']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kids']['googlefonts'] = array('Amatic+SC','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_designer']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropage']['googlefonts'] = array('Lato','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropagetwo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business']['googlefonts'] = array('Bitter','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxhelp']['googlefonts'] = array('Lato','Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_journal']['googlefonts'] = array('Lato','Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_event']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_plumber']['googlefonts'] = array('Open+Sans','Archivo+Narrow');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musicalian']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_author']['googlefonts'] = array('Gentium+Book+Basic');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hoster']['googlefonts'] = array('Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsquare']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_dental']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_penthouse']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallimmo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallagency']['googlefonts'] = array('Inconsolata','Josefin+Slab');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_translogic']['googlefonts'] = array('Roboto+Condensed','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporate']['googlefonts'] = array('Droid+Sans','Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_callcenter']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_businessious']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architectural']['googlefonts'] = array('Raleway','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_powerbiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_funeral']['googlefonts'] = array('Source+Sans+Pro','Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrial']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_invest']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_yoga']['googlefonts'] = array('Cinzel','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurance']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_consultant']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sporty']['googlefonts'] = array('Audiowide','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accountant']['googlefonts'] = array('Cinzel','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_garden']['googlefonts'] = array('Roboto+Slab');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffee']['googlefonts'] = array('Glass+Antiqua','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pictures']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_arc']['googlefonts'] = array('Cinzel','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_showcase']['googlefonts'] = array('Unica+One','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_organic']['googlefonts'] = array('Roboto+Slab','Amatic+SC');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sanitary']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_alphabiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxi']['googlefonts'] = array('Exo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onelaw']['googlefonts'] = array('Source+Sans+Pro','Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_perfumes']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_restaurant']['googlefonts'] = array('Raleway','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_landy']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctor']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_beauty']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_outdoor']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_babypics']['googlefonts'] = array('Quicksand','Sacramento');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pizza']['googlefonts'] = array('Comfortaa','Courgette');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_botox']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architlab']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mall']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelpro']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_slimbiz']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wedding']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nightclub']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_optician']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_trade']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bakery']['googlefonts'] = array('Oswald','Sacramento');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advocate']['googlefonts'] = array('Lato','Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffeeshop']['googlefonts'] = array('Roboto','Glass+Antiqua');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_contractor']['googlefonts'] = array('Poppins','Cardo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kitchen']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automechanic']['googlefonts'] = array('Oswald');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_retirement']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_petcare']['googlefonts'] = array('Comfortaa','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onebiz']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_directory']['googlefonts'] = array('Open+Sans','Comfortaa');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_physio']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleanup']['googlefonts'] = array('Courgette','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electrician']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_steelwork']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cloudtel']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_aperture']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_design']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_stylist']['googlefonts'] = array('Roboto','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_money']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artfolio']['googlefonts'] = array('Poppins','Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_barber']['googlefonts'] = array('Lobster','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_workingspace']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lingoo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_apartment']['googlefonts'] = array('Montserrat','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pursuit']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productline']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrytech']['googlefonts'] = array('Ubuntu');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructionflex']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insuranceking']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsolutions']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_credit']['googlefonts'] = array('Nunito');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wine']['googlefonts'] = array('Cormorant','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_woodwork']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_ebusiness']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_comingsoon_onepage']['googlefonts'] = array('Source+Sans+Pro','Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelapart']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_decor']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_buildr']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_diners']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporateplus']['googlefonts'] = array('Roboto','Roboto+Condensed');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cowork']['googlefonts'] = array('Roboto','Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_phonestore']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cupcakes']['googlefonts'] = array('Glass+Antiqua','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productcatalog']['googlefonts'] = array('Titillium+Web');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tailor']['googlefonts'] = array('Playfair+Display','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_highbiz']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_merchandiser']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_vintage']['googlefonts'] = array('Roboto+Condensed');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctors']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mybooks']['googlefonts'] = array('Merriweather','Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agency51']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstext']['googlefonts'] = array('Source+Sans+Pro','Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstexttwo']['googlefonts'] = array('Roboto+Slab','Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tavern']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bluespa']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_whiteone']['googlefonts'] = array('Nunito','Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_easyimmo']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_room']['googlefonts'] = array('Lato','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurancegroup']['googlefonts'] = array('Ubuntu');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artgallery']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_toys']['googlefonts'] = array('Open+Sans','Vibur');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medicine']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_audit']['googlefonts'] = array('Open+Sans','Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_booklibrary']['googlefonts'] = array('Open+Sans','Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musteragentur']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbuilder']['googlefonts'] = array('Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbusiness']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xindustry']['googlefonts'] = array('Roboto','Exo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xinvestment']['googlefonts'] = array('Roboto','Exo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xflowerstore']['googlefonts'] = array('Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbar']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electric_pro']['googlefonts'] = array('Poppins','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_take_away']['googlefonts'] = array('Poppins','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_digitization']['googlefonts'] = array('Open+Sans','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_psychology']['googlefonts'] = array('Open+Sans','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intranet']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_visions']['googlefonts'] = array('Roboto','Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_itservice']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_west_consulting']['googlefonts'] = array('DM+Serif+Display','Nunito+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_illusion']['googlefonts'] = array('Roboto','Nunito+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business_coach']['googlefonts'] = array('Roboto','Nunito+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_megamenu']['googlefonts'] = array('Arsenal','Jost');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse__rs_presets']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_solis']['googlefonts'] = array('Manrope');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nova']['googlefonts'] = array('Manrope');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lambda']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_brokengrid']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_helion']['googlefonts'] = array('Poppins');


// add templates to the TemplatesLoader
$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
foreach($GLOBALS['PCT_THEMER']['THEMES'] as $strName => $arrData)
{
	if( \array_key_exists('template_path',$arrData) === false )
	{
		$arrData['template_path'] = 'templates/demo_installer';
	}
	if(file_exists($rootDir.'/'.$arrData['template_path'].'/demo_'.$strName))
	{
		\Contao\TemplateLoader::addFiles(array('demo_'.$strName => $arrData['template_path']));
	}
}