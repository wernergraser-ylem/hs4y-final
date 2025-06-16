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


// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_customelements';

/**
 * Register the classes
 */
$classMap = array
(
	'PCT\CustomElements\Core\Controller'							=> $path.'/PCT/CustomElements/Core/Controller.php',
	'PCT\CustomElements\Core\Attribute'								=> $path.'/PCT/CustomElements/Core/Attribute.php',
	'PCT\CustomElements\Core\AttributeFactory'						=> $path.'/PCT/CustomElements/Core/AttributeFactory.php',
	'PCT\CustomElements\Core\Group'									=> $path.'/PCT/CustomElements/Core/Group.php',
	'PCT\CustomElements\Core\GroupFactory'							=> $path.'/PCT/CustomElements/Core/GroupFactory.php',
	'PCT\CustomElements\Core\CustomElement'							=> $path.'/PCT/CustomElements/Core/CustomElement.php',
	'PCT\CustomElements\Core\CustomElements'						=> $path.'/PCT/CustomElements/Core/CustomElements.php',
	'PCT\CustomElements\Core\CustomElementFactory'					=> $path.'/PCT/CustomElements/Core/CustomElementFactory.php',
	'PCT\CustomElements\Core\Vault'									=> $path.'/PCT/CustomElements/Core/Vault.php',
	'PCT\CustomElements\Core\Origin'								=> $path.'/PCT/CustomElements/Core/Origin.php',
	'PCT\CustomElements\Core\InsertTags'							=> $path.'/PCT/CustomElements/Core/InsertTags.php',
	'PCT\CustomElements\Core\Hooks'									=> $path.'/PCT/CustomElements/Core/Hooks.php',
	'PCT\CustomElements\Core\Callbacks'								=> $path.'/PCT/CustomElements/Core/Callbacks.php',
	'PCT\CustomElements\Core\TemplateAttribute'						=> $path.'/PCT/CustomElements/Core/TemplateAttribute.php',
	'PCT\CustomElements\Core\FrontendTemplate'						=> $path.'/PCT/CustomElements/Core/FrontendTemplate.php',
	'PCT\CustomElements\Core\Cache'									=> $path.'/PCT/CustomElements/Core/Cache.php',
	'PCT\CustomElements\Core\SystemIntegration'						=> $path.'/PCT/CustomElements/Core/SystemIntegration.php',
	// Maintenance													   
	'PCT\CustomElements\Core\Maintenance\Jobs'						=> $path.'/PCT/CustomElements/Core/Maintenance/Jobs.php',
	'PCT\CustomElements\Core\Maintenance\WizardUpdater'				=> $path.'/PCT/CustomElements/Core/Maintenance/WizardUpdater.php',
	'PCT\CustomElements\Core\Maintenance\AttributeUpdater'			=> $path.'/PCT/CustomElements/Core/Maintenance/AttributeUpdater.php',
	'PCT\CustomElements\Core\Maintenance\VaultUpdater'				=> $path.'/PCT/CustomElements/Core/Maintenance/VaultUpdater.php',
	// Loader														   
	'PCT\CustomElements\Loader\CustomElementsLoader'				=> $path.'/PCT/CustomElements/Loader/CustomElementsLoader.php',
	'PCT\CustomElements\Loader\AttributeLoader'						=> $path.'/PCT/CustomElements/Loader/AttributeLoader.php',
	// DCA Backend													   
	'PCT\CustomElements\Backend\BackendIntegration'					=> $path.'/PCT/CustomElements/Backend/BackendIntegration.php',
	'PCT\CustomElements\Backend\TableCustomElement'					=> $path.'/PCT/CustomElements/Backend/TableCustomElement.php',
	'PCT\CustomElements\Backend\TableCustomElementAttribute'		=> $path.'/PCT/CustomElements/Backend/TableCustomElementAttribute.php',
	'PCT\CustomElements\Backend\TableCustomElementGroup'			=> $path.'/PCT/CustomElements/Backend/TableCustomElementGroup.php',
	'PCT\CustomElements\Backend\TableUserGroup'						=> $path.'/PCT/CustomElements/Backend/TableUserGroup.php',
	'PCT\CustomElements\Backend\TableContent'						=> $path.'/PCT/CustomElements/Backend/TableContent.php',
	'PCT\CustomElements\Backend\TableModule'						=> $path.'/PCT/CustomElements/Backend/TableModule.php',
	'PCT\CustomElements\Backend\Import'								=> $path.'/PCT/CustomElements/Backend/Import.php',
	'PCT\CustomElements\Backend\Plugins'							=> $path.'/PCT/CustomElements/Backend/Plugins.php',
	'PCT\CustomElements\Backend\TableCustomElementPlugin'			=> $path.'/PCT/CustomElements/Backend/TableCustomElementPlugin.php',
	// Helper														   
	'PCT\CustomElements\Helper\ControllerHelper'					=> $path.'/PCT/CustomElements/Helper/ControllerHelper.php',
	'PCT\CustomElements\Helper\DcaHelper'							=> $path.'/PCT/CustomElements/Helper/DcaHelper.php',
	'PCT\CustomElements\Helper\QueryBuilder'						=> $path.'/PCT/CustomElements/Helper/QueryBuilder.php',
	'PCT\CustomElements\Helper\DataContainerHelper'					=> $path.'/PCT/CustomElements/Helper/DataContainerHelper.php',
	// Frontend														   
	'PCT\CustomElements\Frontend\ContentCustomElement'				=> $path.'/PCT/CustomElements/Frontend/ContentCustomElement.php',
	'PCT\CustomElements\Frontend\ModuleCustomElement'				=> $path.'/PCT/CustomElements/Frontend/ModuleCustomElement.php',
	// Attributes													   
	'PCT\CustomElements\Attributes\Text'							=> $path.'/PCT/CustomElements/Attributes/Text/Text.php',	
	'PCT\CustomElements\Attributes\Headline'						=> $path.'/PCT/CustomElements/Attributes/Headline/Headline.php',	
	'PCT\CustomElements\Attributes\Url'								=> $path.'/PCT/CustomElements/Attributes/Url/Url.php',	
	'PCT\CustomElements\Attributes\Textarea'						=> $path.'/PCT/CustomElements/Attributes/Textarea/Textarea.php',	
	'PCT\CustomElements\Attributes\Select'							=> $path.'/PCT/CustomElements/Attributes/Select/Select.php',	
	'PCT\CustomElements\Attributes\Checkbox'						=> $path.'/PCT/CustomElements/Attributes/Checkbox/Checkbox.php',	
	'PCT\CustomElements\Attributes\CheckboxMenu'					=> $path.'/PCT/CustomElements/Attributes/CheckboxMenu/CheckboxMenu.php',	
	'PCT\CustomElements\Attributes\Image'							=> $path.'/PCT/CustomElements/Attributes/Image/Image.php',	
	'PCT\CustomElements\Attributes\BackendExplanation'				=> $path.'/PCT/CustomElements/Attributes/BackendExplanation/BackendExplanation.php',	
	'PCT\CustomElements\Attributes\Gallery'							=> $path.'/PCT/CustomElements/Attributes/Gallery/Gallery.php',	

	// Widgets														  
	'PCT\CustomElements\Widgets\WidgetCustomElement'				=> $path.'/PCT/CustomElements/Widgets/WidgetCustomElement.php',	
	// Models
	'PCT\CustomElements\Models\AttributeModel'						=> $path.'/PCT/CustomElements/Models/AttributeModel.php',
	'PCT\CustomElements\Models\CustomElementModel'					=> $path.'/PCT/CustomElements/Models/CustomElementModel.php',	
	'PCT\CustomElements\Models\GroupModel'							=> $path.'/PCT/CustomElements/Models/GroupModel.php',	
	'PCT\CustomElements\Models\VaultModel'							=> $path.'/PCT/CustomElements/Models/VaultModel.php',
	// Interfaces
	'PCT\CustomElements\Interfaces\Attribute'						=> $path.'/PCT/CustomElements/Interfaces/Attribute.php',
);

// add attributes
$classMap['PCT\CustomElements\Attributes\Checkbox']	= $path.'/PCT/CustomElements/Attributes/Checkbox/Checkbox.php';
$classMap['PCT\CustomElements\Attributes\CheckboxMenu']	= $path.'/PCT/CustomElements/Attributes/CheckboxMenu/CheckboxMenu.php';
$classMap['PCT\CustomElements\Attributes\Colorpicker']	= $path.'/PCT/CustomElements/Attributes/Colorpicker/Colorpicker.php';
$classMap['PCT\CustomElements\Attributes\Files'] = $path.'/PCT/CustomElements/Attributes/Files/Files.php';
$classMap['PCT\CustomElements\Attributes\Files\TableHelper'] = $path.'/PCT/CustomElements/Attributes/Files/TableHelper.php';
$classMap['PCT\CustomElements\Attributes\Files\TableCustomElementAttribute'] = $path.'/PCT/CustomElements/Attributes/Files/TableCustomElementAttribute.php';
$classMap['PCT\CustomElements\Attributes\Image'] = $path.'/PCT/CustomElements/Attributes/Image/Image.php';
$classMap['PCT\CustomElements\Attributes\IncludeElement'] = $path.'/PCT/CustomElements/Attributes/IncludeElement/IncludeElement.php';
$classMap['PCT\CustomElements\Attributes\IncludeElement\TableCustomElementAttribute'] = $path.'/PCT/CustomElements/Attributes/IncludeElement/TableCustomElementAttribute.php';
$classMap['PCT\CustomElements\Attributes\ListElement'] = $path.'/PCT/CustomElements/Attributes/ListElement/ListElement.php';
$classMap['PCT\CustomElements\Attributes\Number'] = $path.'/PCT/CustomElements/Attributes/Number/Number.php';
$classMap['PCT\CustomElements\Attributes\OptionWizard'] = $path.'/PCT/CustomElements/Attributes/OptionWizard/OptionWizard.php';
$classMap['PCT\CustomElements\Attributes\Select'] = $path.'/PCT/CustomElements/Attributes/Select/Select.php';
$classMap['PCT\CustomElements\Attributes\Table'] = $path.'/PCT/CustomElements/Attributes/Table/Table.php';
$classMap['PCT\CustomElements\Attributes\Text']		= $path.'/PCT/CustomElements/Attributes/Text/Text.php';
$classMap['PCT\CustomElements\Attributes\Textarea']		= $path.'/PCT/CustomElements/Attributes/Textarea/Textarea.php';
$classMap['PCT\CustomElements\Attributes\Timestamp']		= $path.'/PCT/CustomElements/Attributes/Timestamp/Timestamp.php';
$classMap['PCT\CustomElements\Attributes\Url']		= $path.'/PCT/CustomElements/Attributes/Url/Url.php';

// plugins
$classMap['PCT\CustomElements\Plugins\Export\Export']		= $path.'/PCT/CustomElements/Plugins/Export/Export.php';
$classMap['PCT\CustomElements\Plugins\Export\TableCustomElement']		= $path.'/PCT/CustomElements/Plugins/Export/TableCustomElement.php';
	
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();

/**
 * Register the templates
 */
$path = 'system/modules/pct_customelements';
\Contao\TemplateLoader::addFiles(array
(
	// backend
	'be_tl_customelement_group'     		=> $path.'/templates/backend',
	'be_widget_customelement'				=> $path.'/templates/backend',
	'be_field_customelement'				=> $path.'/templates/backend',
	'be_page_import'						=> $path.'/templates/backend',
	'be_page_export'						=> $path.'/templates/backend',
	'be_ce_wildcard'     					=> $path.'/templates/backend',
	'be_js_moo_fxslide'				=> $path.'/templates/backend',
	'tinymce'						=> $path.'/templates/backend',
	'be_maintenance_jobs'			=> $path.'/templates/backend',
	'be_maintenance_wizardupdater'	=> $path.'/templates/backend',
	'be_maintenance_attributeupdater'=> $path.'/templates/backend',
	'be_maintenance_vaultupdater'	=> $path.'/templates/backend',
	// frontend
	'customelement_simple'			=> $path.'/templates',
	'customelement_grouped'			=> $path.'/templates',
	'customelement_attr_default'    => $path.'/templates',	
	'customelement_attr_optionwizard'	=> $path.'/PCT/CustomElements/Attributes/OptionWizard/templates',
));