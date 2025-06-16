<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_customelements_plugin_customcatalog';

/**
 * Register the classes
 */
$classMap = array
(
	// Core
	'PCT\CustomElements\Plugins\CustomCatalog\Core\Controller'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/Controller.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomCatalog.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory'				=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomCatalogFactory.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\CustomElementFactory'				=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomElementFactory.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\CustomElement'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomElement.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\InsertTags'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/InsertTags.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory'					=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/AttributeFactory.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks'								=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/Hooks.php',
#	'PCT\CustomElements\Plugins\CustomCatalog\Core\Attribute'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/Attribute.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration'					=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/SystemIntegration.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/Maintenance.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\RowTemplate'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/RowTemplate.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\FrontendTemplate'					=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/FrontendTemplate.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\TemplateFilter'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/TemplateFilter.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/Multilanguage.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Core\Cache'								=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/Cache.php',	
	'PCT\CustomElements\Core\FilterFactory'												=> $path.'/PCT/CustomElements/Core/FilterFactory.php',
	'PCT\CustomElements\Core\Filter'													=> $path.'/PCT/CustomElements/Core/Filter.php',
	'PCT\CustomElements\Core\FilterCollection'											=> $path.'/PCT/CustomElements/Core/FilterCollection.php',
	'PCT\CustomElements\Filter'															=> $path.'/PCT/CustomElements/Filter.php',
	'PCT\CustomElements\FilterCollection'												=> $path.'/PCT/CustomElements/FilterCollection.php',
	// Filters
	'PCT\CustomElements\Filters\Controller'												=> $path.'/PCT/CustomElements/Filters/Controller.php',
	'PCT\CustomElements\Filters\Base'													=> $path.'/PCT/CustomElements/Filters/Base.php',	
	'PCT\CustomElements\Filters\SimpleFilter'											=> $path.'/PCT/CustomElements/Filters/SimpleFilter.php',
	'PCT\CustomElements\Filters\Checkbox'												=> $path.'/PCT/CustomElements/Filters/Checkbox/Checkbox.php',	
	'PCT\CustomElements\Filters\Combiner'												=> $path.'/PCT/CustomElements/Filters/Combiner/Combiner.php',	
	'PCT\CustomElements\Filters\CustomHtml'												=> $path.'/PCT/CustomElements/Filters/CustomHtml/CustomHtml.php',	
	'PCT\CustomElements\Filters\CustomSql'												=> $path.'/PCT/CustomElements/Filters/CustomSql/CustomSql.php',	
	'PCT\CustomElements\Filters\Geolocation'											=> $path.'/PCT/CustomElements/Filters/Geolocation/Geolocation.php',	
	'PCT\CustomElements\Filters\Hook'													=> $path.'/PCT/CustomElements/Filters/Hook/Hook.php',
	'PCT\CustomElements\Filters\Hook\HookExample'										=> $path.'/PCT/CustomElements/Filters/Hook/HookExample.php',	
	'PCT\CustomElements\Filters\LanguageSwitch'											=> $path.'/PCT/CustomElements/Filters/LanguageSwitch/LanguageSwitch.php',	
	'PCT\CustomElements\Filters\LanguageSwitch\TableFilter'								=> $path.'/PCT/CustomElements/Filters/LanguageSwitch/TableFilter.php',	
	'PCT\CustomElements\Filters\Pagebreak'												=> $path.'/PCT/CustomElements/Filters/Pagebreak/Pagebreak.php',	
	'PCT\CustomElements\Filters\Pagetree'												=> $path.'/PCT/CustomElements/Filters/Pagetree/Pagetree.php',	
	'PCT\CustomElements\Filters\Protection'												=> $path.'/PCT/CustomElements/Filters/Protection/Protection.php',	
	'PCT\CustomElements\Filters\Range'													=> $path.'/PCT/CustomElements/Filters/Range/Range.php',	
	'PCT\CustomElements\Filters\RelatedItems'											=> $path.'/PCT/CustomElements/Filters/RelatedItems/RelatedItems.php',
	'PCT\CustomElements\Filters\RelatedItems\TableHelper'								=> $path.'/PCT/CustomElements/Filters/RelatedItems/TableHelper.php',	
	'PCT\CustomElements\Filters\Select'													=> $path.'/PCT/CustomElements/Filters/Select/Select.php',	
	'PCT\CustomElements\Filters\SelectDb'												=> $path.'/PCT/CustomElements/Filters/SelectDb/SelectDb.php',	
	'PCT\CustomElements\Filters\SimpleCondition'										=> $path.'/PCT/CustomElements/Filters/SimpleCondition/SimpleCondition.php',	
	'PCT\CustomElements\Filters\SimpleIdList'											=> $path.'/PCT/CustomElements/Filters/SimpleIdList/SimpleIdList.php',	
	'PCT\CustomElements\Filters\Sorting'												=> $path.'/PCT/CustomElements/Filters/Sorting/Sorting.php',	
	'PCT\CustomElements\Filters\SortingByFilter'										=> $path.'/PCT/CustomElements/Filters/SpecialSorting/SortingByFilter.php',	
	'PCT\CustomElements\Filters\SortingByAttribute'										=> $path.'/PCT/CustomElements/Filters/SpecialSorting/SortingByAttribute.php',	
	'PCT\CustomElements\Filters\Text'													=> $path.'/PCT/CustomElements/Filters/Text/Text.php',	
	'PCT\CustomElements\Filters\Timestamp'												=> $path.'/PCT/CustomElements/Filters/Timestamp/Timestamp.php',	
	'PCT\CustomElements\Filters\Wrapper'												=> $path.'/PCT/CustomElements/Filters/Wrapper/Wrapper.php',	
	// Models
	'PCT\CustomElements\Models\Model'													=> $path.'/PCT/CustomElements/Models/Model.php',
	'PCT\CustomElements\Models\FilterModel'												=> $path.'/PCT/CustomElements/Models/FilterModel.php',
	'PCT\CustomElements\Models\FiltersetModel'											=> $path.'/PCT/CustomElements/Models/FiltersetModel.php',
	'PCT\CustomElements\Models\CustomCatalogModel'										=> $path.'/PCT/CustomElements/Models/CustomCatalogModel.php',
	'PCT\CustomCatalog\Models\ApiModel'													=> $path.'/PCT/CustomCatalog/Models/ApiModel.php',
	'PCT\CustomCatalog\Models\JobModel'													=> $path.'/PCT/CustomCatalog/Models/JobModel.php',
	// Loader
	'PCT\CustomElements\Loader\FilterLoader'											=> $path.'/PCT/CustomElements/Loader/FilterLoader.php',
	'PCT\CustomElements\Loader\ApiLoader'												=> $path.'/PCT/CustomElements/Loader/ApiLoader.php',
	// Backend	
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration'				=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/BackendIntegration.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomCatalog'				=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomCatalog.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElement'				=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElement.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute'		=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElementAttribute.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableModule.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableUser'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableUser.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableUserGroup'					=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableUserGroup.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementFilterset'		=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElementFilterset.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementFilter'			=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElementFilter.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\Import'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/Import.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\Quickmenu'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/Quickmenu.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomCatalogApi'			=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomCatalogApi.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomCatalogJob'			=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomCatalogJob.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Backend\DbUpdatePage'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Backend/DbUpdatePage.php',
	// Frontend
	'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleList'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleList.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleReader'					=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleReader.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleFilter'					=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleFilter.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Frontend\Pagination'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Frontend/Pagination.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Frontend\ModuleApiStarter'				=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleApiStarter.php',
	// Helper
	'PCT\CustomElements\Helper\InstallerHelper'											=> $path.'/PCT/CustomElements/Helper/InstallerHelper.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Helper/DcaHelper.php',
	'PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder'						=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Helper/QueryBuilder.php',
	'PCT\CustomElements\Helper\FilterHelper'											=> $path.'/PCT/CustomElements/Helper/FilterHelper.php',
	'PCT\CustomElements\Helper\ModelHelper'												=> $path.'/PCT/CustomElements/Helper/ModelHelper.php',
	'PCT\CustomElements\Helper\TableHelper'												=> $path.'/PCT/CustomElements/Helper/TableHelper.php',
	'PCT\CustomElements\Helper\Functions'												=> $path.'/PCT/CustomElements/Helper/Functions.php',
	'PCT\CustomElements\Helper\DataContainerHelper'										=> $path.'/PCT/CustomElements/Helper/DataContainerHelper.php',
	// API
	'PCT\CustomCatalog\API\Backend\BackendPage'											=> $path.'/PCT/CustomCatalog/API/Backend/BackendPage.php',
	'PCT\CustomCatalog\API\Factory'														=> $path.'/PCT/CustomCatalog/API/Factory.php',
	'PCT\CustomCatalog\API\Base'														=> $path.'/PCT/CustomCatalog/API/Base.php',
	'PCT\CustomCatalog\API\Controller'													=> $path.'/PCT/CustomCatalog/API/Controller.php',
	'PCT\CustomCatalog\API\Job'															=> $path.'/PCT/CustomCatalog/API/Job.php',
	'PCT\CustomCatalog\API\Hooks'														=> $path.'/PCT/CustomCatalog/API/Hooks.php',
	'PCT\CustomCatalog\API\Cron'														=> $path.'/PCT/CustomCatalog/API/Cron.php',
	'PCT\CustomCatalog\API\Standard\Core'												=> $path.'/PCT/CustomCatalog/APIs/Standard/Core.php',
	'PCT\CustomCatalog\API\Standard\Import'												=> $path.'/PCT/CustomCatalog/APIs/Standard/Import.php',	
	'PCT\CustomCatalog\API\Standard\Export'												=> $path.'/PCT/CustomCatalog/APIs/Standard/Export.php',
	'PCT\CustomCatalog\API\Standard\Backend\ExportPage'									=> $path.'/PCT/CustomCatalog/APIs/Standard/Backend/ExportPage.php',	
	'PCT\CustomCatalog\API\Standard\Backend\ImportPage'									=> $path.'/PCT/CustomCatalog/APIs/Standard/Backend/ImportPage.php',	
	// Interfaces
	'PCT\CustomCatalog\Interfaces\ApiInterface'											=> $path.'/PCT/CustomCatalog/Interfaces/ApiInterface.php',
	'PCT\CustomCatalog\Interfaces\JobInterface'											=> $path.'/PCT/CustomCatalog/Interfaces/JobInterface.php',
	// Vendors
	'HashInsertTags'																	=> $path.'/vendor/hashinserttags/HashInsertTags.php',
	// Contao classes
	'Contao\CustomCatalog'																=> $path.'/Contao/CustomCatalog.php',
	'Contao\ContaoModel'																=> $path.'/Contao/ContaoModel.php',
	// Picker
	'Contao\Picker\CustomCatalogPickerProvider'											=> $path.'/Contao/Picker/CustomCatalogPickerProvider.php',
	// Attributes
	'PCT\CustomElements\Plugins\CustomCatalog\Attributes\AttributeCallbacks'			=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Attributes/AttributeCallbacks.php', 
	'PCT\CustomElements\Attributes\Alias'												=> $path.'/PCT/CustomElements/Attributes/Alias/Alias.php',
	'PCT\CustomElements\Attributes\Country' 											=> $path.'/PCT/CustomElements/Attributes/Country/Country.php',
	'PCT\CustomElements\Attributes\CustomElement' 										=> $path.'/PCT/CustomElements/Attributes/CustomElement/CustomElement.php',
	'PCT\CustomElements\Attributes\CustomElement\TableHelper' 							=> $path.'/PCT/CustomElements/Attributes/CustomElement/TableHelper.php',	
	'PCT\CustomElements\Attributes\CustomElement\Helper' 								=> $path.'/PCT/CustomElements/Attributes/CustomElement/Helper.php',	
	'PCT\CustomElements\Attributes\FixedColumn' 										=> $path.'/PCT/CustomElements/Attributes/FixedColumn/FixedColumn.php',	
	'PCT\CustomElements\Attributes\Geolocation'											=> $path.'/PCT/CustomElements/Attributes/Geolocation/Geolocation.php',	
	'PCT\CustomElements\Attributes\ItemTemplate' 										=> $path.'/PCT/CustomElements/Attributes/ItemTemplate/ItemTemplate.php',	
	'PCT\CustomElements\Attributes\MetaDescription'										=> $path.'/PCT/CustomElements/Attributes/MetaDescription/MetaDescription.php',	
	'PCT\CustomElements\Attributes\MetaKeywords'										=> $path.'/PCT/CustomElements/Attributes/MetaKeywords/MetaKeywords.php',	
	'PCT\CustomElements\Attributes\Pagetree' 											=> $path.'/PCT/CustomElements/Attributes/Pagetree/Pagetree.php',	
	'PCT\CustomElements\Attributes\Protection' 											=> $path.'/PCT/CustomElements/Attributes/Protection/Protection.php',	
	'PCT\CustomElements\Attributes\RateIt'												=> $path.'/PCT/CustomElements/Attributes/RateIt/RateIt.php',
	'PCT\CustomElements\Attributes\RateIt\TableCustomElementAttribute'					=> $path.'/PCT/CustomElements/Attributes/RateIt/TableCustomElementAttribute.php',
	'PCT\CustomElements\Attributes\RateIt\FilterHelper'									=> $path.'/PCT/CustomElements/Attributes/RateIt/FilterHelper.php',
	'PCT\CustomElements\Attributes\SelectDb' 											=> $path.'/PCT/CustomElements/Attributes/SelectDb/SelectDb.php',	
	'PCT\CustomElements\Attributes\SelectDb\TableHelper' 								=> $path.'/PCT/CustomElements/Attributes/SelectDb/TableHelper.php',	
	'PCT\CustomElements\Attributes\SelectPalette' 										=> $path.'/PCT/CustomElements/Attributes/SelectPalette/SelectPalette.php',	
	'PCT\CustomElements\Attributes\SimpleColumn' 										=> $path.'/PCT/CustomElements/Attributes/SimpleColumn/SimpleColumn.php',	
	'PCT\CustomElements\Attributes\TranslationWidget'									=> $path.'/PCT/CustomElements/Attributes/TranslationWidget/TranslationWidget.php',
	// EventListeners
	'PCT\CustomCatalog\EventListener\SitemapListener'									=> $path.'/PCT/CustomCatalog/EventListener/SitemapListener.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();

/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	// backend
	'be_cc_navigation'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_nav_default'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'mod_be_cc_navigation'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_cc_languagepanel'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_scripts'					=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_customelement_attr_default' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_cc_quickmenu'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_page_api'					=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_page_api_export_run'		=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_page_api_export_summary'	=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_page_api_import_run'		=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_page_api_import_summary'	=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_page_db_update'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend', 
	'be_cc_api_report'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_module_icon_css'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_customelement_wildcard'		=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	'be_customelement_simple'		=> 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
	// frontend
	'mod_customcatalog'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates',
	'mod_customcatalogfilter'		=> 'system/modules/pct_customelements_plugin_customcatalog/templates',
	'mod_customcatalogapi'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates',
	'customcatalog_default'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates',
	'customcatalog_grouped'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates',
	'customcatalog_item_default'	=> 'system/modules/pct_customelements_plugin_customcatalog/templates',
	// forms
	'form_customcatalog_filter'		=> 'system/modules/pct_customelements_plugin_customcatalog/templates/forms',
	// filters
	'customcatalog_filter_default'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_select'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_select_sorted'		=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_linklist'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_countryselect' 		=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_hidden' 				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_geosearch'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_range'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_text_autocomplete'	=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	'customcatalog_filter_datepicker'			=> 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
	// attributes
	'customelement_attr_googlemap'				=> 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
	'customelement_attr_rateit'					=> 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
	'customelement_attr_tags_include_catalog'	=> 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
	'customelement_attr_select_include_catalog'	=> 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
	
));