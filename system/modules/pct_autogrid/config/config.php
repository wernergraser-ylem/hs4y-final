<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

/**
 * Constants
 */
define('PCT_AUTOGRID_VERSION', '4.1.3');
define('PCT_AUTOGRID_PATH', 'system/modules/pct_autogrid');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/'.PCT_AUTOGRID_PATH.'/config/autoload.php' );
}

/**
 * Globals
 */
$GLOBALS['PCT_AUTOGRID']['css']					= PCT_AUTOGRID_PATH.'/assets/css/grid.min.css|static';
$GLOBALS['PCT_AUTOGRID']['be_css']				= PCT_AUTOGRID_PATH.'/assets/css/be_styles.css';
if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$GLOBALS['PCT_AUTOGRID']['be_css']				= PCT_AUTOGRID_PATH.'/assets/css/be_styles_c5.css';
}
$GLOBALS['PCT_AUTOGRID']['presets_css']			= PCT_AUTOGRID_PATH.'/assets/css/presets.min.css';
$GLOBALS['PCT_AUTOGRID']['startElements']		= array('autogridColStart','autogridRowStart','autogridGridStart');
$GLOBALS['PCT_AUTOGRID']['stopElements']		= array('autogridColStop','autogridRowStop','autogridGridStop');
$GLOBALS['PCT_AUTOGRID']['wrapperElements']		= array_merge($GLOBALS['PCT_AUTOGRID']['startElements'],$GLOBALS['PCT_AUTOGRID']['stopElements']);
$GLOBALS['PCT_AUTOGRID']['debug']				= false;
$GLOBALS['PCT_AUTOGRID']['BACKEND']['ajaxInteractionDelay'] = 1200; // ms before firing an ajax request
$GLOBALS['PCT_AUTOGRID']['createSiblingOnCreate']	= array('autogridRowStart'=>'autogridRowStop','autogridColStart'=>'autogridColStop');
$GLOBALS['PCT_AUTOGRID']['deleteSiblingOnDelete']	= array('autogridRowStart'=>'autogridRowStop','autogridColStart'=>'autogridColStop','autogridGridStart'=>'autogridGridStop');
$GLOBALS['PCT_AUTOGRID']['deleteNestedOnDelete']	= array('autogridGridStart' => array('autogridColStart','autogridRowStart'), 'autogridRowStart' => array('autogridColStart'), 'autogridColStart' => array('autogridRowStart','autogridGridStart') );
$GLOBALS['PCT_AUTOGRID']['CACHE'] 				= array();
$GLOBALS['PCT_AUTOGRID']['child_record_callback']['tl_content'] = array('tl_content','addCteType');
$GLOBALS['PCT_AUTOGRID']['showButtons']		= array('autogridColStart');
$GLOBALS['PCT_AUTOGRID']['assetsLoaded'] = false;
$GLOBALS['PCT_AUTOGRID']['autogridRowStarted'] = false;
$GLOBALS['PCT_AUTOGRID']['autogridColStarted'] = false;
$GLOBALS['PCT_AUTOGRID']['autogridGridStarted'] = false;
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR'] = array();
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridRowStart'] = false;
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridColStart'] = false;
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridGridStart'] = false;

// support i18nl10n extension
$bundles = array_keys(System::getContainer()->getParameter('kernel.bundles'));
if( in_array('i18nl10n', $bundles) )
{
	$GLOBALS['PCT_AUTOGRID']['child_record_callback']['tl_content'] = array('tl_content_l10n','addCteType');
}
// support RMS
if( in_array('SrhinowContaoRmsBundle', $bundles) )
{
	$GLOBALS['PCT_AUTOGRID']['child_record_callback']['tl_content'] = array('\Srhinow\ContaoRmsBundle\EventListener\Dca\Content','addCteType');
}

$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR'] = array();		

//-- classic human classes
$GLOBALS['PCT_AUTOGRID']['classes_100'] = array
(
	'full',
	'one_half',
	'one_third','two_third',
	'one_fourth','two_fourth','three_fourth',
	'one_fifth','two_fifth','three_fifth','four_fifth',
	'one_sixth','two_sixth','three_sixth','four_sixth','five_sixth',
);
$GLOBALS['PCT_AUTOGRID']['mobile_classes_100'] = array
(
	'full',
	'one_half_m',
	'one_third_m','two_third_m',
	'one_fourth_m','two_fourth_m','three_fourth_m',
	'one_fifth_m','two_fifth_m','three_fifth_m','four_fifth_m',
	'one_sixth_m','two_sixth_m','three_sixth_m','four_sixth_m','five_sixth_m',
);
$GLOBALS['PCT_AUTOGRID']['offsets_100']				= array
(
	'offset_one_half',
	'offset_one_third','offset_two_third',
	'offset_one_fourth','offset_two_fourth','offset_three_fourth',
	'offset_one_fifth','offset_two_fifth','offset_three_fifth','offset_four_fifth',
	'offset_one_sixth','offset_two_sixth','offset_three_sixth','offset_four_sixth','offset_five_sixth',
);

//-- clockwise classes
$GLOBALS['PCT_AUTOGRID']['classes']						= array_reverse( array('col_1','col_2','col_3','col_4','col_5','col_6','col_7','col_8','col_9','col_10','col_11','col_12') );
$GLOBALS['PCT_AUTOGRID']['tablet_classes'] 				= array_reverse( array('col_1_t','col_2_t','col_3_t','col_4_t','col_5_t','col_6_t','col_7_t','col_8_t','col_9_t','col_10_t','col_11_t','col_12_t') );
$GLOBALS['PCT_AUTOGRID']['mobile_classes'] 				= array_reverse( array('col_1_m','col_2_m','col_3_m','col_4_m','col_5_m','col_6_m','col_7_m','col_8_m','col_9_m','col_10_m','col_11_m','col_12_m') );
// offsets
$GLOBALS['PCT_AUTOGRID']['offsets'] 					= array('offset_col_1','offset_col_2','offset_col_3','offset_col_4','offset_col_5','offset_col_6','offset_col_7','offset_col_8','offset_col_9','offset_col_10','offset_col_11','offset_col_12');
// align
$GLOBALS['PCT_AUTOGRID']['alignments']						= array('align_left','align_center', 'align_right');
$GLOBALS['PCT_AUTOGRID']['alignments::autogridColStart']	= array('align_left_top', 'align_left_center', 'align_left_bottom', 'align_center_top', 'align_center_center', 'align_center_bottom', 'align_right_top', 'align_right_center', 'align_right_bottom');
// gutter
$GLOBALS['PCT_AUTOGRID']['gutters'] 					= array('gutter_s','gutter_m','gutter_l','gutter_none');
$GLOBALS['PCT_AUTOGRID']['padding_classes'] 			= array('p-xl','p-l','p-m','p-s','p-xs');


/**
 * Field definitions
 */
// autogrid related fields
$GLOBALS['PCT_AUTOGRID']['autogrid_fields'] = array
(
	'autogrid'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
		'sql'					  => "char(1) NOT NULL default ''",
	),
	'autogrid_css'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_css'],
		'exclude'                 => true,
		'inputType'				  => 'select',
		'default'				  => 'col_12',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper','getDesktopClasses'),
		'eval'                    => array('tl_class'=>'w50','chosen'=>true,'decodeEntities'=>true,'doNotSaveEmpty'=>true),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_css'],
		'sql'					  => "varchar(64) NOT NULL default ''",
		// grid preset reference
		'grid'					  => 'desktop',
		'load_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','loadGridDefinition'),
		),
		'save_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','restoreDefaultOnEmpty'),
		)
	),
	'autogrid_mobile'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_mobile'],
		'exclude'                 => true,
		'inputType'				  => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper','getMobileClasses'),
		'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>1,'chosen'=>true),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_css'],
		'sql'					  => "varchar(64) NOT NULL default ''",
		// grid preset reference
		'grid'					  => 'mobile',
		'load_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','loadGridDefinition'),
		),
		'save_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','restoreDefaultOnEmpty'),
		)
	),
	'autogrid_tablet'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_tablet'],
		'exclude'                 => true,
		'inputType'				  => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper','getTabletClasses'),
		'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>1,'chosen'=>true),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_css'],
		'sql'					  => "varchar(64) NOT NULL default ''",
		// grid preset reference
		'grid'					  => 'tablet',
		'load_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','loadGridDefinition'),
		),
		'save_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','restoreDefaultOnEmpty'),
		)
	),
	'autogrid_offset'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_offset'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper','getOffsetClasses'),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_offset'],
		'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>true,'chosen'=>true),
		'sql'					  => "varchar(32) NOT NULL default ''",
	),
	'autogrid_align'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_align'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper','getAlignmentClasses'),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_align'],
		'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>true,'chosen'=>true),
		'sql'					  => "varchar(32) NOT NULL default ''",
	),
	'autogrid_align_mobile'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_align_mobile'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper','getAlignmentClasses'),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_align'],
		'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>true,'chosen'=>true),
		'sql'					  => "varchar(32) NOT NULL default ''",
	),
	'autogrid_gutter'	=> array(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_gutter'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper', 'getGutterClasses'),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_gutter'],
		'eval'                    => array('includeBlankOption'=>true,'tl_class' => 'w50'),
		'sql'					  => "varchar(16) NOT NULL default ''",
	),
	'autogrid_sameheight'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_sameheight'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_sameheight'],
		'eval'                    => array('tl_class'=>'w50 m12'),
		'sql'					  => "char(1) NOT NULL default ''",
	),
	'autogrid_class' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_class'],
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	// reference id
	'autogrid_id' => array
	(
		'sql'                     => "int(10) NOT NULL default '0'"
	)
);
// general fields
$GLOBALS['PCT_AUTOGRID']['fields'] = array
(
	
);

// wildcard fields
$GLOBALS['PCT_AUTOGRID']['BE_WILDCARD'] = array('autogrid_css','autogrid_tablet','autogrid_mobile','autogrid_gutter','autogrid_sameheight');

// define which css fields relate to the type of content element
$GLOBALS['PCT_AUTOGRID']['cssByType']['*'] 				= array();

/**
 * Field definitions (global)
 */
if( isset($GLOBALS['PCT_AUTOGRID']['GRID_PRESETS']) === false )
{
	$GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'] = array();
}

// include presets
$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
if( file_exists($rootDir.'/'.PCT_AUTOGRID_PATH.'/config/presets.php') )
{
	include_once ($rootDir.'/'.PCT_AUTOGRID_PATH.'/config/presets.php');
}

/**
 * Rgister backend keys
 */
$GLOBALS['BE_MOD']['content']['article']['grid_preset'] = array('PCT\AutoGrid\Backend\PageGridPreset','run');

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['autogrid_node'] = array
(
	'autogridRowStart' 			=> 'PCT\AutoGrid\ContentAutoGridRow',
	'autogridRowStop' 			=> 'PCT\AutoGrid\ContentAutoGridRow',
	'autogridColStart' 			=> 'PCT\AutoGrid\ContentAutoGridCol',
	'autogridColStop' 			=> 'PCT\AutoGrid\ContentAutoGridCol',
	'autogridGridStart' 		=> 'PCT\AutoGrid\ContentAutoGridGrid',
	'autogridGridStop' 			=> 'PCT\AutoGrid\ContentAutoGridGrid',	
);


/**
 * Front end form fields
 */
$GLOBALS['TL_FFL']['autogridRowStart'] 	= 'PCT\AutoGrid\WidgetAutoGridRow';
$GLOBALS['TL_FFL']['autogridRowStop'] 	= 'PCT\AutoGrid\WidgetAutoGridRow';
$GLOBALS['TL_FFL']['autogridColStart'] 	= 'PCT\AutoGrid\WidgetAutoGridCol';
$GLOBALS['TL_FFL']['autogridColStop'] 	= 'PCT\AutoGrid\WidgetAutoGridCol';

/**
 * Wrappers
 */
$GLOBALS['TL_WRAPPERS']['start'][] 	= 'autogridColStart';
$GLOBALS['TL_WRAPPERS']['stop'][] 	= 'autogridColStop';
$GLOBALS['TL_WRAPPERS']['start'][] 	= 'autogridRowStart';
$GLOBALS['TL_WRAPPERS']['stop'][] 	= 'autogridRowStop';
$GLOBALS['TL_WRAPPERS']['start'][] 	= 'autogridGridStart';
$GLOBALS['TL_WRAPPERS']['stop'][] 	= 'autogridGridStop';


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['loadDataContainer'][] 	= array('PCT\AutoGrid\DcaHelper','loadAssets');
$GLOBALS['TL_HOOKS']['generatePage'][] 			= array('PCT\AutoGrid\Core','loadAssets');
$GLOBALS['TL_HOOKS']['getContentElement'][] 	= array('PCT\AutoGrid\ContaoCallbacks','getContentElementCallback');
$GLOBALS['TL_HOOKS']['parseWidget'][] 			= array('PCT\AutoGrid\ContaoCallbacks','parseWidgetCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('PCT\AutoGrid\ContaoCallbacks','parseTemplateCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 		= array('PCT\AutoGrid\Backend\BackendIntegration','parseTemplateCallback');
$GLOBALS['TL_HOOKS']['initializeSystem'][] 		= array('PCT\AutoGrid\Controller','initSystem');
$GLOBALS['TL_HOOKS']['initializeSystem'][] 		= array('PCT\AutoGrid\Controller','loadAssets');
$GLOBALS['TL_HOOKS']['addCustomRegexp'][] 		= array('PCT\AutoGrid\ContaoCallbacks', 'addCustomRegexpCallback');
$GLOBALS['TL_HOOKS']['isVisibleElement'][] 		= array('PCT\AutoGrid\ContaoCallbacks','isVisibleElementCallback');