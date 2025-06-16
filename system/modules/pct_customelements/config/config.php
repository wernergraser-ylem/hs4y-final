<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ArrayUtil;
use Contao\System;

/**
 * Constants
 */
define('PCT_CUSTOMELEMENTS_PATH', 'system/modules/pct_customelements');
define('PCT_CUSTOMELEMENTS_VERSION', '5.1.0');
define('PCT_CUSTOMELEMENTS_FONTAWESOME_VERSION','4.7.0');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/'.PCT_CUSTOMELEMENTS_PATH.'/config/autoload.php' );
}

/**
 * Globals
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables']					= array('tl_content','tl_module','tl_page','tl_article','tl_news_archive','tl_news','tl_calendar','tl_calendar_events','tl_revolutionslider_slides','tl_revolutionslider'); // list of tables that are allowed to include custom elements
$GLOBALS['PCT_CUSTOMELEMENTS']['restrictedTables']				= array('tl_files','tl_templates','tl_theme','tl_style_sheet','tl_layout','tl_image_size');
$GLOBALS['PCT_CUSTOMELEMENTS']['defaultWildcardImageSize'] 		= array('','50','proportional');
$GLOBALS['PCT_CUSTOMELEMENTS_REGISTRY']							= array();
if(!isset($GLOBALS['PCT_CUSTOMELEMENTS']['cache']))
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['cache'] = array();
}							
$GLOBALS['PCT_CUSTOMELEMENTS']['debug']							= false;
$GLOBALS['PCT_CUSTOMELEMENTS']['saveValuesInWizard']			= true;	// attribute values will be saved in the wizard data array
$GLOBALS['PCT_CUSTOMELEMENTS']['cacheLimit']['wizard']			= 0; // limit the number of wizard datas cached automatically 
$GLOBALS['PCT_CUSTOMELEMENTS']['cacheWizardsInBackend']			= true; // if set to true, wizard data will be cached in the backend. (frontend is enabled by default)
$GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao'] 	= array('headline','singleSRC','multiSRC','cssID','guests','invisible'); // if your CC has fields that exist in the tl_content table from contao, add the fieldname to this list to avoid that contao processes the field when rendering the attribute e.g. having a field 'headline' in your table and then rendering a files attribute with downlods. Contao renders the headline value as well because it finds the headline field in the active record.
$GLOBALS['PCT_CUSTOMELEMENTS']['exportCustomCatalogTables']		= false; // if set to true, the export will include the tables create with customcatalog
$GLOBALS['PCT_CUSTOMELEMENTS']['path_to_export']				= 'templates';
$GLOBALS['PCT_CUSTOMELEMENTS']['path_to_import']				= 'templates';
$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
if( in_array('pct_theme_templates', $bundles) )
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['path_to_import'] = 'system/modules/pct_theme_templates/pct_templates/ce_imports';
}

$GLOBALS['PCT_CUSTOMELEMENTS']['ignoreOptionFields']			= array('list','table','checkboxMenu','select'); // add attributes that uses the options column for simpel optional values not for generic option fields
// content element set export
$GLOBALS['PCT_CUSTOMELEMENTS']['multiSRC_fields']				= array('multiSRC');
$GLOBALS['PCT_CUSTOMELEMENTS']['singleJumpTo_fields'] 			= array('jumpTo','customcatalog_jumpTo','reg_jumpTo'); // relink single pages 

$GLOBALS['PCT_CUSTOMELEMENTS']['sourceField'] = array
(
	'tl_content' => 'pct_customelement',
	'tl_module' => 'pct_customelement',
);
$GLOBALS['PCT_CUSTOMELEMENTS']['basicEntities'] = array('[nbsp]'=>'&nbsp;','[lt]'=>'&lt;','[gt]'=>'&gt;','[shy]'=>'&shy;','[&]'=>'&amp;','[br]'=>'</br>','&#35;'=>'#','&#61;'=>'=');

if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']) || !is_array($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']) )
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'] = array();
}


// register plugins
if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']) || !is_array($GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']) )
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS'] = array();
}

/**
 * Back end modules
 */
ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['content'], count($GLOBALS['BE_MOD']['content']), array
(
	'pct_customelements' => array
	(
		'tables' 		=> array('tl_pct_customelement','tl_pct_customelement_group','tl_pct_customelement_attribute','tl_pct_customelement_vault'),
		'icon'   		=> PCT_CUSTOMELEMENTS_PATH.'/assets/img/icon.svg',
		'import'		=> array('PCT\CustomElements\Backend\Import', 'createInterface'),
		'export'		=> array('PCT\CustomElements\Plugins\Export\Export','createInterface'),
	)
));

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['pct_customelements_node'] = array();

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_customelements_node'] = array();

/**
 * Back end form fields
 */
$GLOBALS['BE_FFL']['pct_customelement']					= 'PCT\CustomElements\Widgets\WidgetCustomElement';

/**
 * Register the model classes
 */
$GLOBALS['TL_MODELS']['tl_pct_customelement_attribute'] = 'PCT\CustomElements\Models\AttributeModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement'] 			= 'PCT\CustomElements\Models\CustomElementModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_group'] 	= 'PCT\CustomElements\Models\GroupModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_vault'] 	= 'PCT\CustomElements\Models\VaultModel';

/**
 * Default rendering classes
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['TL_CTE'] 				= 'PCT\CustomElements\Frontend\ContentCustomElement';
$GLOBALS['PCT_CUSTOMELEMENTS']['TL_FMD'] 				= 'PCT\CustomElements\Frontend\ModuleCustomElement';
$GLOBALS['PCT_CUSTOMELEMENTS']['palette']				= '{type_legend},type;###CUSTOMELEMENT_WIDGET###';

/**
 * Maintenance
 */
$GLOBALS['TL_MAINTENANCE'][] = 'PCT\CustomElements\Core\Maintenance\Jobs';
// Jobs
$GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'] = array
(
	'resolveVault'	=> array
	(
		'callback'	=> array('PCT\CustomElements\Core\Maintenance\VaultUpdater','resolve'),
		'key'		=> 'resolveVault',
	),
);



/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelements';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelementsp';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_groups';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_groupsp';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_attributes';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_attributesp';
$GLOBALS['TL_PERMISSIONS'][] = 'protect_pct_customelement_groups';
$GLOBALS['TL_PERMISSIONS'][] = 'protect_pct_customelement_attributes';


// register attributes
\Contao\ArrayUtil::arrayInsert($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'],0,array
(
	'text'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['text'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Text',
		'class'		=> 'PCT\CustomElements\Attributes\Text',
		'icon'		=> 'fa fa-file-text-o'
	),
	'headline'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['headline'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Headline',
		'class'		=> 'PCT\CustomElements\Attributes\Headline',
		'icon'		=> 'fa fa-header'
	),
	'url'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['url'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Url',
		'class'		=> 'PCT\CustomElements\Attributes\Url',
		'icon'		=> 'fa fa-globe'
	),
	'files'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['files'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Files',
		'class'		=> 'PCT\CustomElements\Attributes\Files',
		'icon'		=> 'fa fa-file-o'
	),
	'textarea'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['textarea'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Textarea',
		'class'		=> 'PCT\CustomElements\Attributes\Textarea',
		'icon'		=> 'fa fa-file-text'
	),
	'select'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['select'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Select',
		'class'		=> 'PCT\CustomElements\Attributes\Select',
		'icon'		=> 'fa fa-sort'
	),
	'checkboxMenu'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['checkboxMenu'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/CheckboxMenu',
		'class'		=> 'PCT\CustomElements\Attributes\CheckboxMenu',
		'icon'		=> 'fa fa-check-square-o'
	),
	'checkbox'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['checkbox'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Checkbox',
		'class'		=> 'PCT\CustomElements\Attributes\Checkbox',
		'icon'		=> 'fa fa-check-square-o'
	),
	'image'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['image'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Image',
		'class'		=> 'PCT\CustomElements\Attributes\Image',
		'icon'		=> 'fa fa-file-image-o'
	),
	'backend_explanation' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['backend_explanation'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/BackendExplanation',
		'class'		=> 'PCT\CustomElements\Attributes\BackendExplanation',
		'icon'		=> 'fa fa-info-circle'
	),
	'include' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['include'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/IncludeElement',
		'class'		=> 'PCT\CustomElements\Attributes\IncludeElement',
		'icon'		=> 'fa fa-code-fork'
	),
	'timestamp' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['timestamp'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Timestamp',
		'class'		=> 'PCT\CustomElements\Attributes\Timestamp',
		'icon'		=> 'fa fa-calendar'
	),
	'table' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['table'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Table',
		'class'		=> 'PCT\CustomElements\Attributes\Table',
		'icon'		=> 'fa fa-table'
	),
	'list' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['list'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/ListElement',
		'class'		=> 'PCT\CustomElements\Attributes\ListElement',
		'icon'		=> 'fa fa-list'
	),
	'number' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['number'],
		'path'		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Number',
		'class'		=> 'PCT\CustomElements\Attributes\Number',
		'icon'		=> 'fa fa-calculator'
	),
	'optionWizard' => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['optionWizard'],
		'path'		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/OptionWizard',
		'class'		=> 'PCT\CustomElements\Attributes\OptionWizard',
		'icon'		=> 'fa fa-reorder'
	),
	'colorpicker'	=> array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['colorpicker'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Colorpicker',
		'class'		=> 'PCT\CustomElements\Attributes\Colorpicker',
		'icon'		=> 'fa fa-file-text-o'
	),
	'gallery'	 => array
	(
		'label'		=> &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['gallery'],
		'path' 		=> PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Attributes/Gallery',
		'class'		=> 'PCT\CustomElements\Attributes\Gallery',
		'icon'		=> 'fa fa-image',
		'backendWildcardSize' => array('50','50','center_center'),
	)
));

// export plugin
$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']['export'] = array
(
	'path' => PCT_CUSTOMELEMENTS_PATH.'/PCT/CustomElements/Plugins/Export',
);

/**
 * Hooks
 */
// load attributes
$GLOBALS['TL_HOOKS']['initializeSystem'][] 					= array('PCT\CustomElements\Loader\AttributeLoader','loadOnSystem');
#// load plugins
$GLOBALS['TL_HOOKS']['initializeSystem'][] 				= array('PCT\CustomElements\Core\SystemIntegration', 'initSystem');
#$GLOBALS['TL_HOOKS']['initializeSystem'][] 				= array('PCT\CustomElements\Core\SystemIntegration', 'showVaultMigrationAlert');
$GLOBALS['TL_HOOKS']['initializeSystem'][] 				= array('PCT\CustomElements\Backend\BackendIntegration','loadAssets');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 				= array('PCT\CustomElements\Backend\BackendIntegration', 'injectJavascriptInBackendPage');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 				= array('PCT\CustomElements\Backend\BackendIntegration', 'injectVersionnumberInBackendPage');
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_HOOKS']['loadDataContainer'],0,array(array('PCT\CustomElements\Helper\DcaHelper', 'initializeBackend')) );
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 				= array('PCT\CustomElements\Core\InsertTags', 'replaceTags');
$GLOBALS['TL_HOOKS']['executePostActions'][] 				= array('PCT\CustomElements\Helper\DcaHelper', 'executePostActions');
$GLOBALS['TL_HOOKS']['executePreActions'][] 				= array('PCT\CustomElements\Helper\DcaHelper', 'executePreActions');
$GLOBALS['TL_HOOKS']['reviseTable'][] 						= array('PCT\CustomElements\Core\Vault', 'purgeDuplicates');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['observeClipboard'][] 		= array('PCT\CustomElements\Core\Callbacks','observeClipboard');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['createCopyInVault'][] 	= array('PCT\CustomElements\Core\Callbacks','createCopyInVault');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['removeFromVault'][] 		= array('PCT\CustomElements\Core\Callbacks','removeFromVault');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareForDca'][]			= array('PCT\CustomElements\Helper\DcaHelper', 'storeAttributeDCA');
$GLOBALS['TL_HOOKS']['reviseTable'][] 						= array('PCT\CustomElements\Helper\DcaHelper', 'clearSession');
