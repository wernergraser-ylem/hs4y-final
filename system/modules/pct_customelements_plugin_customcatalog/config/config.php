<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;
use Contao\Input;
use Contao\Config;
use Contao\ArrayUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;
use PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration;

/**
 * Constants
 */
if( \defined('PCT_CUSTOMCATALOG_VERSION') === false )
{
	define('PCT_CUSTOMCATALOG_VERSION', '5.1.0');
	define('PCT_CUSTOMCATALOG_PATH','system/modules/pct_customelements_plugin_customcatalog');
	define('PCT_CUSTOMCATALOG_REQ_CE', '5.0.0'); // the minimum required CustomElements Version
}

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_customelements_plugin_customcatalog/config/autoload.php' );
}

$blnRegisterAttributes = true;
$blnRegisterFilters = true;
$blnRegisterAPIs = true;
$blnInitialize = true;
$blnShowBackendAlert = false;

// return if customelements module is not installed or Contao has not been installed before, Database class alias does not exist
$bundles = array_keys(System::getContainer()->getParameter('kernel.bundles'));
if( !in_array('pct_customelements', $bundles) || !class_exists('Database',true) )
{
	$blnInitialize = false;
}
		
/**
 * Globals
 */
if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'])) {$GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'] = array();}				
if(!isset($GLOBALS['CUSTOMCATALOG_HOOKS'])) {$GLOBALS['CUSTOMCATALOG_HOOKS'] = array();}
if(!isset($GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields'])) {$GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields'] = array();}
if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['API'])) {$GLOBALS['PCT_CUSTOMELEMENTS']['API'] = array();}
$GLOBALS['PCT_CUSTOMCATALOG']['autoManageDcaFiles']					= true;
$GLOBALS['PCT_CUSTOMCATALOG']['deleteDcaFileOnCustomCatalogDelete'] = true; // when set to true, the generic extension folder in /system/modules will be deleted when the associated customcatalog is being deleted
$GLOBALS['PCT_CUSTOMCATALOG']['deleteLanguageRecordOnBaseRecordDelete'] = true; // if set to true, language records related to the base record will be deleted when the base record is being deleted
$GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']					= 'items'; // defines the url parameter for the details link
$GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter']				= 'orderby'; // defines the url parameter for the sorting GET parameter
$GLOBALS['PCT_CUSTOMCATALOG']['urlPerPageParameter']				= 'perPage_c'; // defines the url parameter for pagebreak. the ID of the list module will be added e.g. perPage_c1 
$GLOBALS['PCT_CUSTOMCATALOG']['urlPaginationParameter']				= 'page_c'; // defines the url parameter for paginations. the ID of the list module will be added e.g. page_c1 
$GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']				= 'language'; // defines the url parameter for the active language records 
$GLOBALS['PCT_CUSTOMCATALOG']['urlCustomParameters']				= array(); // add custom url parameters that will be respected in the url when applying filters
$GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters']			= array(); // add custom url parameters that will be ignored in the url when applying filters
$GLOBALS['PCT_CUSTOMCATALOG']['resetGETfiltersWithPageReload']		= true; // if true, resetting a filter set by a GET parameter will reload the page 
$GLOBALS['PCT_CUSTOMCATALOG']['respectActiveGETparams']				= true; // if true, GET filters will respect other GET parameters in the url
$GLOBALS['PCT_CUSTOMCATALOG']['debug']								= false;
$GLOBALS['PCT_CUSTOMCATALOG']['systemColumns']						= array('id','pid','tstamp','sorting','ptable');
$GLOBALS['PCT_CUSTOMCATALOG']['reservedWords']						= array();
$GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesSharedWithContao'] 		= array('headline','singleSRC','multiSRC','cssID','guests','invisible'); // if your CC has fields that exist in the tl_content table from contao, add the fieldname to this list to avoid that contao processes the field when rendering the attribute e.g. having a field 'headline' in your table and then rendering a files attribute with downlods. Contao renders the headline value as well because it finds the headline field in the active record.
$GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields']					= array_merge($GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields'], array('list','table','checkboxMenu','checkbox','select','selectdb','headline','alias','url[pagepicker]','iconpicker','tags','protection','timestamp','text','number','metadescription','metakeywords','protection','itemtemplate','include','pagetree','paletteselect','translationWidget','customelement','simpleColumn','colorpicker')); // add attributes that uses the options column for simpel optional values not for generic option fields
$GLOBALS['PCT_CUSTOMCATALOG']['active_modules']						= array();
$GLOBALS['PCT_CUSTOMCATALOG']['manageExistingTables']				= false; // set to true if you want customcatalog to manage your existing tables (use with care)
$GLOBALS['PCT_CUSTOMCATALOG']['childTableMustBeAConfiguration']		= true; // set here if a selected child table must have a valid,active configuration before it will be handled as a child
$GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName']					= 'customcatalogfilter'; // name of the session key to store active filters in
$GLOBALS['PCT_CUSTOMCATALOG']['backendUrlLogic']					= '%s_%s'; // name of CC _ ID of CC
$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession']				= 'cc_filter_helper';
$GLOBALS['PCT_CUSTOMCATALOG']['folderLogic']						= 'pct_customcatalog_%s'; // name of CC table
$GLOBALS['PCT_CUSTOMCATALOG']['makeReferenceAttributeUnique'] 		= false; // set to true if you don't want to delete the referenced attribute when it's parent attribute is being deleted and if you don't want to copy all data from the default attribute to the referenced attribute. Only the alias will be copied
$GLOBALS['PCT_CUSTOMCATALOG']['configs'] 							= array();
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['indicateSelectorsInListview'] = true;
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['selector_css_classes']	= array('cc_green','cc_blue','cc_red','cc_orange','cc_yellow','cc_lilac','cc_dark-grey');
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector']				= array();
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSubpalette']			= array();
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession']		= 'pct_customcatalog_quickmenu';
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['wildcardLabelFormat'] 	= '%s: <b>%s</b>';
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['showAllLanguagesInPanel']	= true; // set to false to show only languages that have at least one entry
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['urlChildConfigParameter'] = 'config';
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['QLAM']['mode']			= 'copy'; // set to "create" to create new entries without a copy of the reference entry
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['QLAM']['linkTextLogic']	= '<span class="country">%s</span> (<span class="iso">%s</span>)'; // placeholder will be replaced by the language name (Contao language array) and by the language iso key
$GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesMarkedOnCopy']				= array();
$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'] 			= false;
$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] 		= false;
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['READER']['baseRecordIsFallback'] = false; // if set to true, the base record will be shown as a fallback when the language record return does not exist
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['LIST']['baseRecordIsFallback'] = true; // show all base records as fallback when active language filtering is turned on but there are no language records for the current page language
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['LIST']['disableDefaultSorting'] = true; // if false, the default sorting will remain active when a user sorting filter is active 
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] = false; // if true, filtering will respect published entries only
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['showEmptyResults'] = false; // if true, values with empty results will not be excluded but show result count (0)
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['renderOptionFields']		= false; // set to true, if you want to render optional fields like singleSRC_fullsize etc. in the frontend (values remain available in the template)
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['renderUnpublishedGroups'] = false; // if set to false, unpublished groups will be skiped in Frontend
// API Settings
$GLOBALS['PCT_CUSTOMCATALOG_API']['SETTINGS']['skipObsoleteUpdateData'] = true; // if set to true, obsolete update data will be skiped. default: data will become part of the insert data
$GLOBALS['PCT_CUSTOMCATALOG_API']['SETTINGS']['useLocalStorage']		= true; // if set to true, default data will be stored in a local file in /system/cache. false will store the data in the session

/**
 * Store active front end language
 */
if( Controller::isFrontend() && Config::get('addLanguageToUrl') && Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']) != '')
{
	$GLOBALS['PCT_CUSTOMCATALOG']['activeFrontendLanguage'] = Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']);
}

/**
 * Enable debug mode
 */
if ( (boolean)Config::get('customcatalog_debug') === true )
{
	$GLOBALS['PCT_CUSTOMCATALOG']['debug'] = true;
}

/**
 * Register the plugin
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']['customcatalog'] = array
(
	// access
	'tables' 	=> array('tl_pct_customelement','tl_pct_customelement_group','tl_pct_customelement_attribute'),
	// requirements
	'requires'	=> array('pct_customelements'=>PCT_CUSTOMCATALOG_REQ_CE),
);


/**
 * Back end modules
 */
// Register more tables to the pct_customelement module
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customcatalog';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customelement_filterset';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customelement_filter';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customcatalog_api';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customcatalog_job';

// Register backend keys
if(\Contao\Input::get('table') == 'tl_pct_customcatalog_api')
{
	$GLOBALS['BE_MOD']['content']['pct_customelements']['ready'] 		= array('PCT\CustomCatalog\API\Backend\BackendPage', 'run');
	$GLOBALS['BE_MOD']['content']['pct_customelements']['run'] 			= array('PCT\CustomCatalog\API\Backend\BackendPage', 'run');
	$GLOBALS['BE_MOD']['content']['pct_customelements']['summary'] 		= array('PCT\CustomCatalog\API\Backend\BackendPage', 'run');
}

// Register backend key for database update page
$GLOBALS['BE_MOD']['content']['pct_customelements']['db_update']		= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\DbUpdatePage', 'run');

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_customcatalog_node'] = array
(
	'customcataloglist' 			=> 'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleList',
	'customcatalogreader' 			=> 'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleReader',
	'customcatalogfilter' 			=> 'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleFilter',
	'customcatalog_apistarter' 		=> 'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleApiStarter',
);

$GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE']['updateBaseEntries'] = array
(
	'callback'	=> array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','createBaseLanguageEntriesJob'),
	'key'		=> 'updateBaseEntries',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE']['purgeFileCache'] = array
(
	'callback'	=> array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeFileCacheJob'),
	'key'		=> 'purgeFileCache',
);


/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'wrapperStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'wrapperStop';



/**
 * Permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customcatalogs';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customcatalogsp';


/**
 * Register the model classes
 */
$GLOBALS['TL_MODELS']['tl_pct_customcatalog'] 			= 'PCT\CustomElements\Models\CustomCatalogModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_filter'] 	= 'PCT\CustomElements\Models\FilterModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_filterset'] = 'PCT\CustomElements\Models\FiltersetModel';
$GLOBALS['TL_MODELS']['tl_pct_customcatalog_api'] 		= 'PCT\CustomCatalog\Models\ApiModel';
$GLOBALS['TL_MODELS']['tl_pct_customcatalog_job'] 		= 'PCT\CustomCatalog\Models\JobModel';

/**
 * Register attributes
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['alias'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['alias'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/Alias',
	'class'		=> 'PCT\CustomElements\Attributes\Alias',
	'icon'		=> 'fa fa-anchor',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metakeywords'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metakeywords'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/MetaKeywords',
	'class'		=> 'PCT\CustomElements\Attributes\MetaKeywords',
	'icon'		=> 'fa fa-share-alt',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metadescription'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metadescription'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/MetaDescription',
	'class'		=> 'PCT\CustomElements\Attributes\MetaDescription',
	'icon'		=> 'fa fa-share-alt-square',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['pagetree'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['pagetree'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/Pagetree',
	'class'		=> 'PCT\CustomElements\Attributes\Pagetree',
	'icon'		=> 'fa fa-sitemap',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['selectdb'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['selectdb'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/SelectDb',
	'class'		=> 'PCT\CustomElements\Attributes\SelectDb',
	'icon'		=> 'fa fa-sort',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/Geolocation',
	'class'		=> 'PCT\CustomElements\Attributes\Geolocation',
	'icon'		=> 'fa fa-globe',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['rateit'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['rateit'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/RateIt',
	'class'		=> 'PCT\CustomElements\Attributes\RateIt',
	'icon'		=> 'fa fa-star',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['customelement'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['customelement'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/CustomElement',
	'class'		=> 'PCT\CustomElements\Attributes\CustomElement',
	'icon'		=> 'fa fa-star',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['itemtemplate'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['itemtemplate'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/ItemTemplate',
	'class'		=> 'PCT\CustomElements\Attributes\ItemTemplate',
	'icon'		=> 'fa fa-magic',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['translationWidget'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['translationWidget'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/TranslationWidget',
	'class'		=> 'PCT\CustomElements\Attributes\TranslationWidget',
	'icon'		=> 'fa fa-magic',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['simpleColumn'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['simpleColumn'],
	'path' 		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/SimpleColumn',
	'class'		=> 'PCT\CustomElements\Attributes\SimpleColumn',
	'icon'		=> 'fa fa-database',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['protection'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['protection'],
	'path' 		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/Protection',
	'class'		=> 'PCT\CustomElements\Attributes\Protection',
	'icon'		=> 'fa fa-lock',
	'settings'	=> array('feUserLoggedIn'=>true),
);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['country'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['country'],
	'path' 		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Attributes/Country',
	'class'		=> 'PCT\CustomElements\Attributes\Country',
	'icon'		=> 'fa fa-flag',
);


/**
 * Register filters
 */

ArrayUtil::arrayInsert($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'], 0, array
(
	'simpleIdList' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['simpleIdList'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/SimpleIdList',
		'class'		=> 'PCT\CustomElements\Filters\SimpleIdList',
		'icon'		=> 'fa fa-list-ol'
	),
	'languageSwitch' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['languageSwitch'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/LanguageSwitch',
		'class'		=> 'PCT\CustomElements\Filters\LanguageSwitch',
		'icon'		=> 'fa fa-language'
	),
	'select' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['select'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Select',
		'class'		=> 'PCT\CustomElements\Filters\Select',
		'icon'		=> 'fa fa-sort'
	),
	'checkbox' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['checkbox'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Checkbox',
		'class'		=> 'PCT\CustomElements\Filters\Checkbox',
		'icon'		=> 'fa fa-check'
	),
	'customsql' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['customsql'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/CustomSql',
		'class'		=> 'PCT\CustomElements\Filters\CustomSql',
		'icon'		=> 'fa fa-database'
	),
	'combiner' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['combiner'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Combiner',
		'class'		=> 'PCT\CustomElements\Filters\Combiner',
		'icon'		=> 'fa fa-cube'
	),
	'text' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['text'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Text',
		'class'		=> 'PCT\CustomElements\Filters\Text',
		'icon'		=> 'fa fa-italic'
	),
	'range' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['range'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Range',
		'class'		=> 'PCT\CustomElements\Filters\Range',
		'icon'		=> 'fa fa-sliders'
	),
	'pagetree' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['pagetree'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Pagetree',
		'class'		=> 'PCT\CustomElements\Filters\Pagetree',
		'icon'		=> 'fa fa-sitemap'
	),
	'selectdb' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['selectdb'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/SelectDb',
		'class'		=> 'PCT\CustomElements\Filters\SelectDb',
		'icon'		=> 'fa fa-sort',
		'settings'	=> array('useIdsAsFilterValue'=>true)
	),
	'hook' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['hook'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Hook',
		'class'		=> 'PCT\CustomElements\Filters\Hook',
		'icon'		=> 'fa fa-chain'
	),
	'timestamp' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['timestamp'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Timestamp',
		'class'		=> 'PCT\CustomElements\Filters\Timestamp',
		'icon'		=> 'fa fa-calendar'
	),
	'sorting_alphabetic' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_alphabetic'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Sorting',
		'class'		=> 'PCT\CustomElements\Filters\Sorting',
		'icon'		=> 'fa fa-sort-alpha-asc'
	),
	'sorting_numeric' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_numeric'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Sorting',
		'class'		=> 'PCT\CustomElements\Filters\Sorting',
		'icon'		=> 'fa fa-sort-numeric-asc'
	),
	'sorting_by_filter' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_by_filter'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/SpecialSorting',
		'class'		=> 'PCT\CustomElements\Filters\SortingByFilter',
		'icon'		=> 'fa fas fa-sort-amount-asc'
	),
	'sorting_by_attribute' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_by_attribute'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/SpecialSorting',
		'class'		=> 'PCT\CustomElements\Filters\SortingByAttribute',
		'icon'		=> 'fa fas fa-sort-amount-asc'
	),
	'pagebreak' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['pagebreak'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Pagebreak',
		'class'		=> 'PCT\CustomElements\Filters\Pagebreak',
		'icon'		=> 'fa fa-book'
	),
	'geolocation' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['geolocation'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Geolocation',
		'class'		=> 'PCT\CustomElements\Filters\Geolocation',
		'icon'		=> 'fa fa-globe'
	),
	'relatedItems' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['relatedItems'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/RelatedItems',
		'class'		=> 'PCT\CustomElements\Filters\RelatedItems',
		'icon'		=> 'fa fa-smile-o'
	),
	'simpleCondition' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['simpleCondition'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/SimpleCondition',
		'class'		=> 'PCT\CustomElements\Filters\SimpleCondition',
		'icon'		=> 'fa fa-filter'
	),
	'wrapperStart' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['wrapperStart'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Wrapper',
		'class'		=> 'PCT\CustomElements\Filters\Wrapper',
		'icon'		=> 'fa fa-filter'
	),
	'wrapperStop' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['wrapperStop'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Wrapper',
		'class'		=> 'PCT\CustomElements\Filters\Wrapper',
		'icon'		=> 'fa fa-filter'
	),
	'protection' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['protection'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/Protection',
		'class'		=> 'PCT\CustomElements\Filters\Protection',
		'icon'		=> 'fa fa-lock',
		'settings'	=> array('isStrict'=>true)
	),
	'customhtml' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['customhtml'],
		'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomElements/Filters/CustomHtml',
		'class'		=> 'PCT\CustomElements\Filters\CustomHtml',
		'icon'		=> 'fa fa-terminal',
	),
));


/**
 * Register APIs
 */
// the "default" API integrates basic communication via hooks for imports and exports
$GLOBALS['PCT_CUSTOMCATALOG']['API']['standard'] = array
(
	'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['API']['standard'],
	'path'		=> PCT_CUSTOMCATALOG_PATH.'/PCT/CustomCatalog/APIs/Standard', // only needed when nested config folders
	'class'		=> 'PCT\CustomCatalog\API\Standard\Core', // The default class if no callbacks for modes have been registered
	'modes' 	=> array
	(
		// register the "import" mode
		'import' => array
		(
			// register its own callback method
			'callback' 	=> array('PCT\CustomCatalog\API\Standard\Import','run'),
			// register its backend callback to render a backend page: keys: ready, run, summary. Leave empty if you do not want to provide backend executions
			'key'		=> array
			(
				'run' 		=> array('PCT\CustomCatalog\API\Standard\Backend\ImportPage','render_run'),
				'summary' 	=> array('PCT\CustomCatalog\API\Standard\Backend\ImportPage','render_summary'),
			),
			// register its own rules
			'rules'		=> array('update','insert')
		),
		// register the "export" mode
		'export' => array
		(
			// register its own callback method
			'callback' 	=> array('PCT\CustomCatalog\API\Standard\Export','run'),
			// register its backend callback to render a backend page: keys: ready, run, summary. Leave empty if you do not want to provide backend executions
			'key'		=> array
			(
				'run' 		=> array('PCT\CustomCatalog\API\Standard\Backend\ExportPage','render_run'),
				'summary' 	=> array('PCT\CustomCatalog\API\Standard\Backend\ExportPage','render_summary'),
			),
		),
	)
);


/**
 * Hooks
 */
#$GLOBALS['TL_HOOKS']['sqlCompileCommands'][]					= array('PCT\CustomElements\Helper\InstallerHelper','sqlCompileCommandsCallback');	

// load filters
$GLOBALS['TL_HOOKS']['initializeSystem'][] 						= array('PCT\CustomElements\Loader\FilterLoader','loadOnSystem');	

// load APIs
$GLOBALS['TL_HOOKS']['initializeSystem'][] 						= array('PCT\CustomElements\Loader\ApiLoader','loadOnSystem');	


if( Controller::isBackend() )
{
	// integrate backend modules
	$GLOBALS['TL_HOOKS']['initializeSystem'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration','createBackendModules');
}
// initialize the system
$GLOBALS['TL_HOOKS']['initializeSystem'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration','initSystem');


if( SystemIntegration::isInstallTool() === false )
{
	$GLOBALS['TL_HOOKS']['initializeSystem'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration','addToDcaPicker');
	$GLOBALS['TL_HOOKS']['initializeSystem'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','loadAssets');
	$GLOBALS['TL_HOOKS']['parseBackendTemplate'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','displayDatabaseUpdateAlertbox');
	$GLOBALS['TL_HOOKS']['parseBackendTemplate'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','displayBackendAlerts');
	$GLOBALS['TL_HOOKS']['parseBackendTemplate'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','replaceQuickmenuInserttag');
	$GLOBALS['TL_HOOKS']['parseTemplate'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','injectJavascriptInBackendPage');
	$GLOBALS['TL_HOOKS']['parseTemplate'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','injectCSSInBackendPage');
	$GLOBALS['TL_HOOKS']['parseTemplate'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','injectVersionnumberInBackendPage');
	$GLOBALS['TL_HOOKS']['parseTemplate'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','injectLanguagePanelInEditView');
	$GLOBALS['TL_HOOKS']['loadDataContainer'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration','loadCustomCatalog');
	$GLOBALS['TL_HOOKS']['initializeSystem'][] 					= array('PCT\CustomCatalog\API\Cron','initialize');
}
$GLOBALS['TL_HOOKS']['initializeSystem'][] 						= array('PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration','registerEventListeners');
$GLOBALS['TL_HOOKS']['loadDataContainer'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration','loadLanguageFiles');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Core\InsertTags','replaceTags');
$GLOBALS['TL_HOOKS']['replaceHashInsertTags'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Core\InsertTags','replaceHashTags');
$GLOBALS['TL_HOOKS']['executePreActions'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\Quickmenu','toggleQuickMenuListener');
$GLOBALS['TL_HOOKS']['executePreActions'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','languagePanelAjaxHelper');
$GLOBALS['TL_HOOKS']['executePreActions'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','databaseUpdateAlertboxAjaxHelper');
$GLOBALS['TL_HOOKS']['executePreActions'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','executePreActionsCallback');
$GLOBALS['TL_HOOKS']['isAllowedToEditComment'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','isAllowedToEditCommentCallback');
$GLOBALS['TL_HOOKS']['getUserNavigation'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration', 'injectQuickmenuInUserNavigation');
// maintenance
$GLOBALS['TL_HOOKS']['getSearchablePages'][] 					= array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','getSearchablePages');
$GLOBALS['TL_HOOKS']['reviseTable'][] 							= array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeCustomCatalogData');
$GLOBALS['TL_HOOKS']['reviseTable'][] 							= array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','onReviseTableCallback');
$GLOBALS['TL_CRON']['daily'][] 									= array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeRevisedLanguageEntries');

$GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareRendering'][] 			= array('PCT\CustomElements\Plugins\CustomCatalog\Attributes\AttributeCallbacks','renderAttribute');
$GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Attributes\AttributeCallbacks','prepareField');
$GLOBALS['CUSTOMCATALOG_HOOKS']['getOptionFieldDefinition'][] 	= array('PCT\CustomElements\Plugins\CustomCatalog\Attributes\AttributeCallbacks','getOptionFieldDefinition');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['getQueryOption'][] 			= array('PCT\CustomElements\Filter','handleBlobValues');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['child_record_callback'][] 	= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute','listAttributesCallback');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['importChain'][] 				= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\Import','addCustomCatalogImports');
$GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'][] 			= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','addPaletteSwitchToEditView');
$GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'][] 			= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','toggleAttributeLabels');
$GLOBALS['PCT_TABLETREE_HOOKS']['getCustomPanel'][] 			= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','injectLanguagePanelInTableTree');
