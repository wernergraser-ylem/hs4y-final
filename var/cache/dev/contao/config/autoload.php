<?php

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2019 Leo Feyer
 *
 * @copyright	Tim Gatzky 2019, Premium-Contao-Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package 	pct_seo_helper
 * @link    	https://contao.org, https://www.premium-contao-themes.com
 * @license 	http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_seo_helper';
/**
 * Register the classes
 */
$classMap = array('PCT\\SEO' => $path . '/PCT/SEO.php', 'PCT\\SEO\\ContaoCallbacks' => $path . '/PCT/SEO/ContaoCallbacks.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_tabletree
 * @link		http://contao.org
 * @license     LGPL
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_tabletree_widget';
/**
 * Register the classes
 */
$classMap = array('PCT\\Widgets\\TableTree' => $path . '/PCT/Widgets/TableTree/TableTree.php', 'PCT\\Widgets\\WidgetTableTree' => $path . '/PCT/Widgets/TableTree/WidgetTableTree.php', 'PCT\\Widgets\\TableTree\\TableTreeHelper' => $path . '/PCT/Widgets/TableTree/TableTreeHelper.php', 'PCT\\Widgets\\TableTree\\ContaoCallbacks' => $path . '/PCT/Widgets/TableTree/ContaoCallbacks.php', 'PCT\\Widgets\\TableTree\\Backend\\PageTableTree' => $path . '/PCT/Widgets/TableTree/Backend/PageTableTree.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array(
    // widgets
    'be_pct_tabletree' => 'system/modules/pct_tabletree_widget/templates',
));
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package pct_megamenu
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_megamenu';
/**
 * Register the classes
 */
$classMap = array('PCT\\MegaMenu\\TablePage' => $path . '/PCT/MegaMenu/TablePage.php', 'PCT\\MegaMenu\\Module' => $path . '/PCT/MegaMenu/Module.php', 'PCT\\MegaMenu\\Page' => $path . '/PCT/MegaMenu/Page.php', 'PCT\\MegaMenu\\ContaoCallbacks' => $path . '/PCT/MegaMenu/ContaoCallbacks.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('nav_pct_megamenu' => 'system/modules/pct_megamenu/templates', 'mod_pct_megamenu' => 'system/modules/pct_megamenu/templates'));
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package pct_theme_updater
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_theme_updater';
/**
 * Register the classes
 */
$classMap = array('PCT\\ThemeUpdater' => $path . '/PCT/ThemeUpdater.php', 'PCT\\ThemeUpdater\\SystemCallbacks' => $path . '/PCT/ThemeUpdater/SystemCallbacks.php', 'PCT\\ThemeUpdater\\InstallerHelper' => $path . '/PCT/ThemeUpdater/InstallerHelper.php', 'PCT\\ThemeUpdater\\Maintenance' => $path . '/PCT/ThemeUpdater/Maintenance.php', 'PCT\\ThemeUpdater\\Maintenance\\Jobs' => $path . '/PCT/ThemeUpdater/Maintenance/Jobs.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('be_pct_theme_updater' => 'system/modules/pct_theme_updater/templates', 'be_js_pct_theme_updater' => 'system/modules/pct_theme_updater/templates', 'pct_theme_updater_breadcrumb' => 'system/modules/pct_theme_updater/templates', 'be_maintenance_theme_updater' => 'system/modules/pct_theme_updater/templates'));
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package pct_autogrid
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_themer';
/**
 * Register the classes
 */
$classMap = array(
    // Themer
    'PCT\\Themer' => $path . '/PCT/Themer.php',
    'PCT\\Themer\\Import' => $path . '/PCT/Themer/Import.php',
    'PCT\\Themer\\Export' => $path . '/PCT/Themer/Export.php',
    'PCT\\Themer\\Backend' => $path . '/PCT/Themer/Backend.php',
    'PCT\\Themer\\DemoInstaller' => $path . '/PCT/Themer/DemoInstaller.php',
    'PCT\\ThemeDesigner' => $path . '/PCT/ThemeDesigner.php',
    'PCT\\ThemeDesigner\\Navigation' => $path . '/PCT/ThemeDesigner/Navigation.php',
    'PCT\\ThemeDesigner\\Section' => $path . '/PCT/ThemeDesigner/Section.php',
    'PCT\\ThemeDesigner\\Quickinfo' => $path . '/PCT/ThemeDesigner/Quickinfo.php',
    'PCT\\ThemeDesigner\\Versions' => $path . '/PCT/ThemeDesigner/Versions.php',
    'PCT\\ThemeDesigner\\Model' => $path . '/PCT/ThemeDesigner/Model.php',
    'PCT\\ThemeDesigner\\InsertTags' => $path . '/PCT/ThemeDesigner/InsertTags.php',
    'PCT\\ThemeDesigner\\Backend' => $path . '/PCT/ThemeDesigner/Backend.php',
    'PCT\\ThemeDesigner\\Frontend' => $path . '/PCT/ThemeDesigner/Frontend.php',
);
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array(
    'be_page_pct_theme_export' => 'system/modules/pct_themer/templates/backend',
    'be_pct_demoinstaller' => 'system/modules/pct_themer/templates/backend',
    'themedesigner' => 'system/modules/pct_themer/templates/themedesigner',
    'themedesigner_quickinfo' => 'system/modules/pct_themer/templates/themedesigner',
    'js_themedesigner' => 'system/modules/pct_themer/templates/themedesigner/js',
    'js_themedesigner_selector' => 'system/modules/pct_themer/templates/themedesigner/js',
    'js_themedesigner_iframe_helper' => 'system/modules/pct_themer/templates/themedesigner/js',
    'js_themedesigner_webfonts_optin' => 'system/modules/pct_themer/templates/themedesigner/js',
    'js_stylesheet' => 'system/modules/pct_themer/templates/themedesigner/js',
    'fe_page_themedesigner' => 'system/modules/pct_themer/templates/themedesigner',
    'td_nav' => 'system/modules/pct_themer/templates/themedesigner',
    'td_section' => 'system/modules/pct_themer/templates/themedesigner',
    'td_versions_form' => 'system/modules/pct_themer/templates/themedesigner',
    'td_devices_and_zoom' => 'system/modules/pct_themer/templates/themedesigner',
    // css constructor
    'stylesheet' => 'system/modules/pct_themer/templates/themedesigner/css',
    'css_webfonts' => 'system/modules/pct_themer/templates/themedesigner/css',
    // form fields
    'td_form_checkbox_single' => 'system/modules/pct_themer/templates/themedesigner/forms',
    'td_form_select_fontpicker' => 'system/modules/pct_themer/templates/themedesigner/forms',
    'td_form_textfield_colorpicker' => 'system/modules/pct_themer/templates/themedesigner/forms',
    'td_form_textfield_slider' => 'system/modules/pct_themer/templates/themedesigner/forms',
    'td_form_upload_dropzone' => 'system/modules/pct_themer/templates/themedesigner/forms',
));
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2019 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_autogrid';
/**
 * Register the classes
 */
$classMap = array('PCT\\AutoGrid\\Core' => $path . '/PCT/AutoGrid/Core.php', 'PCT\\AutoGrid\\Controller' => $path . '/PCT/AutoGrid/Controller.php', 'PCT\\AutoGrid\\ContaoCallbacks' => $path . '/PCT/AutoGrid/ContaoCallbacks.php', 'PCT\\AutoGrid\\DcaHelper' => $path . '/PCT/AutoGrid/DcaHelper.php', 'PCT\\AutoGrid\\ContentAutoGridRow' => $path . '/PCT/AutoGrid/ContentAutoGridRow.php', 'PCT\\AutoGrid\\ContentAutoGridCol' => $path . '/PCT/AutoGrid/ContentAutoGridCol.php', 'PCT\\AutoGrid\\ContentAutoGridGrid' => $path . '/PCT/AutoGrid/ContentAutoGridGrid.php', 'PCT\\AutoGrid\\WidgetAutoGridRow' => $path . '/PCT/AutoGrid/WidgetAutoGridRow.php', 'PCT\\AutoGrid\\WidgetAutoGridCol' => $path . '/PCT/AutoGrid/WidgetAutoGridCol.php', 'PCT\\AutoGrid\\GridPreset' => $path . '/PCT/AutoGrid/GridPreset.php', 'PCT\\AutoGrid\\Backend\\PageGridPreset' => $path . '/PCT/AutoGrid/Backend/PageGridPreset.php', 'PCT\\AutoGrid\\Models\\ContentModel' => $path . '/PCT/AutoGrid/Models/ContentModel.php', 'PCT\\AutoGrid\\Models\\FormFieldModel' => $path . '/PCT/AutoGrid/Models/FormFieldModel.php', 'PCT\\AutoGrid\\Backend\\TableContent' => $path . '/PCT/AutoGrid/Backend/TableContent.php', 'PCT\\AutoGrid\\Backend\\TableFormField' => $path . '/PCT/AutoGrid/Backend/TableFormField.php', 'PCT\\AutoGrid\\Backend\\TableModule' => $path . '/PCT/AutoGrid/Backend/TableModule.php', 'PCT\\AutoGrid\\Backend\\TableArticle' => $path . '/PCT/AutoGrid/Backend/TableArticle.php', 'PCT\\AutoGrid\\Backend\\TableUser' => $path . '/PCT/AutoGrid/Backend/TableUser.php', 'PCT\\AutoGrid\\Backend\\BackendIntegration' => $path . '/PCT/AutoGrid/Backend/BackendIntegration.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('ce_autogrid_row' => 'system/modules/pct_autogrid/templates', 'ce_autogrid_col' => 'system/modules/pct_autogrid/templates', 'ce_autogrid_grid' => 'system/modules/pct_autogrid/templates', 'form_autogrid_row' => 'system/modules/pct_autogrid/templates', 'form_autogrid_col' => 'system/modules/pct_autogrid/templates', 'autogrid' => 'system/modules/pct_autogrid/templates', 'be_autogrid_wildcard' => 'system/modules/pct_autogrid/templates/backend', 'be_autogrid_infobox' => 'system/modules/pct_autogrid/templates/backend', 'be_js_autogrid' => 'system/modules/pct_autogrid/templates/backend', 'be_autogrid_buttons' => 'system/modules/pct_autogrid/templates/backend', 'be_page_grid_preset' => 'system/modules/pct_autogrid/templates/backend', 'be_mod_grid_preview' => 'system/modules/pct_autogrid/templates/backend', 'be_autogrid_row' => 'system/modules/pct_autogrid/templates/backend', 'be_autogrid_col' => 'system/modules/pct_autogrid/templates/backend', 'be_autogrid_grid' => 'system/modules/pct_autogrid/templates/backend', 'be_autogrid_viewport_panel' => 'system/modules/pct_autogrid/templates/backend'));
}

namespace {
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
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_customelements';
/**
 * Register the classes
 */
$classMap = array(
    'PCT\\CustomElements\\Core\\Controller' => $path . '/PCT/CustomElements/Core/Controller.php',
    'PCT\\CustomElements\\Core\\Attribute' => $path . '/PCT/CustomElements/Core/Attribute.php',
    'PCT\\CustomElements\\Core\\AttributeFactory' => $path . '/PCT/CustomElements/Core/AttributeFactory.php',
    'PCT\\CustomElements\\Core\\Group' => $path . '/PCT/CustomElements/Core/Group.php',
    'PCT\\CustomElements\\Core\\GroupFactory' => $path . '/PCT/CustomElements/Core/GroupFactory.php',
    'PCT\\CustomElements\\Core\\CustomElement' => $path . '/PCT/CustomElements/Core/CustomElement.php',
    'PCT\\CustomElements\\Core\\CustomElements' => $path . '/PCT/CustomElements/Core/CustomElements.php',
    'PCT\\CustomElements\\Core\\CustomElementFactory' => $path . '/PCT/CustomElements/Core/CustomElementFactory.php',
    'PCT\\CustomElements\\Core\\Vault' => $path . '/PCT/CustomElements/Core/Vault.php',
    'PCT\\CustomElements\\Core\\Origin' => $path . '/PCT/CustomElements/Core/Origin.php',
    'PCT\\CustomElements\\Core\\InsertTags' => $path . '/PCT/CustomElements/Core/InsertTags.php',
    'PCT\\CustomElements\\Core\\Hooks' => $path . '/PCT/CustomElements/Core/Hooks.php',
    'PCT\\CustomElements\\Core\\Callbacks' => $path . '/PCT/CustomElements/Core/Callbacks.php',
    'PCT\\CustomElements\\Core\\TemplateAttribute' => $path . '/PCT/CustomElements/Core/TemplateAttribute.php',
    'PCT\\CustomElements\\Core\\FrontendTemplate' => $path . '/PCT/CustomElements/Core/FrontendTemplate.php',
    'PCT\\CustomElements\\Core\\Cache' => $path . '/PCT/CustomElements/Core/Cache.php',
    'PCT\\CustomElements\\Core\\SystemIntegration' => $path . '/PCT/CustomElements/Core/SystemIntegration.php',
    // Maintenance
    'PCT\\CustomElements\\Core\\Maintenance\\Jobs' => $path . '/PCT/CustomElements/Core/Maintenance/Jobs.php',
    'PCT\\CustomElements\\Core\\Maintenance\\WizardUpdater' => $path . '/PCT/CustomElements/Core/Maintenance/WizardUpdater.php',
    'PCT\\CustomElements\\Core\\Maintenance\\AttributeUpdater' => $path . '/PCT/CustomElements/Core/Maintenance/AttributeUpdater.php',
    'PCT\\CustomElements\\Core\\Maintenance\\VaultUpdater' => $path . '/PCT/CustomElements/Core/Maintenance/VaultUpdater.php',
    // Loader
    'PCT\\CustomElements\\Loader\\CustomElementsLoader' => $path . '/PCT/CustomElements/Loader/CustomElementsLoader.php',
    'PCT\\CustomElements\\Loader\\AttributeLoader' => $path . '/PCT/CustomElements/Loader/AttributeLoader.php',
    // DCA Backend
    'PCT\\CustomElements\\Backend\\BackendIntegration' => $path . '/PCT/CustomElements/Backend/BackendIntegration.php',
    'PCT\\CustomElements\\Backend\\TableCustomElement' => $path . '/PCT/CustomElements/Backend/TableCustomElement.php',
    'PCT\\CustomElements\\Backend\\TableCustomElementAttribute' => $path . '/PCT/CustomElements/Backend/TableCustomElementAttribute.php',
    'PCT\\CustomElements\\Backend\\TableCustomElementGroup' => $path . '/PCT/CustomElements/Backend/TableCustomElementGroup.php',
    'PCT\\CustomElements\\Backend\\TableUserGroup' => $path . '/PCT/CustomElements/Backend/TableUserGroup.php',
    'PCT\\CustomElements\\Backend\\TableContent' => $path . '/PCT/CustomElements/Backend/TableContent.php',
    'PCT\\CustomElements\\Backend\\TableModule' => $path . '/PCT/CustomElements/Backend/TableModule.php',
    'PCT\\CustomElements\\Backend\\Import' => $path . '/PCT/CustomElements/Backend/Import.php',
    'PCT\\CustomElements\\Backend\\Plugins' => $path . '/PCT/CustomElements/Backend/Plugins.php',
    'PCT\\CustomElements\\Backend\\TableCustomElementPlugin' => $path . '/PCT/CustomElements/Backend/TableCustomElementPlugin.php',
    // Helper
    'PCT\\CustomElements\\Helper\\ControllerHelper' => $path . '/PCT/CustomElements/Helper/ControllerHelper.php',
    'PCT\\CustomElements\\Helper\\DcaHelper' => $path . '/PCT/CustomElements/Helper/DcaHelper.php',
    'PCT\\CustomElements\\Helper\\QueryBuilder' => $path . '/PCT/CustomElements/Helper/QueryBuilder.php',
    'PCT\\CustomElements\\Helper\\DataContainerHelper' => $path . '/PCT/CustomElements/Helper/DataContainerHelper.php',
    // Frontend
    'PCT\\CustomElements\\Frontend\\ContentCustomElement' => $path . '/PCT/CustomElements/Frontend/ContentCustomElement.php',
    'PCT\\CustomElements\\Frontend\\ModuleCustomElement' => $path . '/PCT/CustomElements/Frontend/ModuleCustomElement.php',
    // Attributes
    'PCT\\CustomElements\\Attributes\\Text' => $path . '/PCT/CustomElements/Attributes/Text/Text.php',
    'PCT\\CustomElements\\Attributes\\Headline' => $path . '/PCT/CustomElements/Attributes/Headline/Headline.php',
    'PCT\\CustomElements\\Attributes\\Url' => $path . '/PCT/CustomElements/Attributes/Url/Url.php',
    'PCT\\CustomElements\\Attributes\\Textarea' => $path . '/PCT/CustomElements/Attributes/Textarea/Textarea.php',
    'PCT\\CustomElements\\Attributes\\Select' => $path . '/PCT/CustomElements/Attributes/Select/Select.php',
    'PCT\\CustomElements\\Attributes\\Checkbox' => $path . '/PCT/CustomElements/Attributes/Checkbox/Checkbox.php',
    'PCT\\CustomElements\\Attributes\\CheckboxMenu' => $path . '/PCT/CustomElements/Attributes/CheckboxMenu/CheckboxMenu.php',
    'PCT\\CustomElements\\Attributes\\Image' => $path . '/PCT/CustomElements/Attributes/Image/Image.php',
    'PCT\\CustomElements\\Attributes\\BackendExplanation' => $path . '/PCT/CustomElements/Attributes/BackendExplanation/BackendExplanation.php',
    'PCT\\CustomElements\\Attributes\\Gallery' => $path . '/PCT/CustomElements/Attributes/Gallery/Gallery.php',
    // Widgets
    'PCT\\CustomElements\\Widgets\\WidgetCustomElement' => $path . '/PCT/CustomElements/Widgets/WidgetCustomElement.php',
    // Models
    'PCT\\CustomElements\\Models\\AttributeModel' => $path . '/PCT/CustomElements/Models/AttributeModel.php',
    'PCT\\CustomElements\\Models\\CustomElementModel' => $path . '/PCT/CustomElements/Models/CustomElementModel.php',
    'PCT\\CustomElements\\Models\\GroupModel' => $path . '/PCT/CustomElements/Models/GroupModel.php',
    'PCT\\CustomElements\\Models\\VaultModel' => $path . '/PCT/CustomElements/Models/VaultModel.php',
    // Interfaces
    'PCT\\CustomElements\\Interfaces\\Attribute' => $path . '/PCT/CustomElements/Interfaces/Attribute.php',
);
// add attributes
$classMap['PCT\\CustomElements\\Attributes\\Checkbox'] = $path . '/PCT/CustomElements/Attributes/Checkbox/Checkbox.php';
$classMap['PCT\\CustomElements\\Attributes\\CheckboxMenu'] = $path . '/PCT/CustomElements/Attributes/CheckboxMenu/CheckboxMenu.php';
$classMap['PCT\\CustomElements\\Attributes\\Colorpicker'] = $path . '/PCT/CustomElements/Attributes/Colorpicker/Colorpicker.php';
$classMap['PCT\\CustomElements\\Attributes\\Files'] = $path . '/PCT/CustomElements/Attributes/Files/Files.php';
$classMap['PCT\\CustomElements\\Attributes\\Files\\TableHelper'] = $path . '/PCT/CustomElements/Attributes/Files/TableHelper.php';
$classMap['PCT\\CustomElements\\Attributes\\Files\\TableCustomElementAttribute'] = $path . '/PCT/CustomElements/Attributes/Files/TableCustomElementAttribute.php';
$classMap['PCT\\CustomElements\\Attributes\\Image'] = $path . '/PCT/CustomElements/Attributes/Image/Image.php';
$classMap['PCT\\CustomElements\\Attributes\\IncludeElement'] = $path . '/PCT/CustomElements/Attributes/IncludeElement/IncludeElement.php';
$classMap['PCT\\CustomElements\\Attributes\\IncludeElement\\TableCustomElementAttribute'] = $path . '/PCT/CustomElements/Attributes/IncludeElement/TableCustomElementAttribute.php';
$classMap['PCT\\CustomElements\\Attributes\\ListElement'] = $path . '/PCT/CustomElements/Attributes/ListElement/ListElement.php';
$classMap['PCT\\CustomElements\\Attributes\\Number'] = $path . '/PCT/CustomElements/Attributes/Number/Number.php';
$classMap['PCT\\CustomElements\\Attributes\\OptionWizard'] = $path . '/PCT/CustomElements/Attributes/OptionWizard/OptionWizard.php';
$classMap['PCT\\CustomElements\\Attributes\\Select'] = $path . '/PCT/CustomElements/Attributes/Select/Select.php';
$classMap['PCT\\CustomElements\\Attributes\\Table'] = $path . '/PCT/CustomElements/Attributes/Table/Table.php';
$classMap['PCT\\CustomElements\\Attributes\\Text'] = $path . '/PCT/CustomElements/Attributes/Text/Text.php';
$classMap['PCT\\CustomElements\\Attributes\\Textarea'] = $path . '/PCT/CustomElements/Attributes/Textarea/Textarea.php';
$classMap['PCT\\CustomElements\\Attributes\\Timestamp'] = $path . '/PCT/CustomElements/Attributes/Timestamp/Timestamp.php';
$classMap['PCT\\CustomElements\\Attributes\\Url'] = $path . '/PCT/CustomElements/Attributes/Url/Url.php';
// plugins
$classMap['PCT\\CustomElements\\Plugins\\Export\\Export'] = $path . '/PCT/CustomElements/Plugins/Export/Export.php';
$classMap['PCT\\CustomElements\\Plugins\\Export\\TableCustomElement'] = $path . '/PCT/CustomElements/Plugins/Export/TableCustomElement.php';
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
$path = 'system/modules/pct_customelements';
\Contao\TemplateLoader::addFiles(array(
    // backend
    'be_tl_customelement_group' => $path . '/templates/backend',
    'be_widget_customelement' => $path . '/templates/backend',
    'be_field_customelement' => $path . '/templates/backend',
    'be_page_import' => $path . '/templates/backend',
    'be_page_export' => $path . '/templates/backend',
    'be_ce_wildcard' => $path . '/templates/backend',
    'be_js_moo_fxslide' => $path . '/templates/backend',
    'tinymce' => $path . '/templates/backend',
    'be_maintenance_jobs' => $path . '/templates/backend',
    'be_maintenance_wizardupdater' => $path . '/templates/backend',
    'be_maintenance_attributeupdater' => $path . '/templates/backend',
    'be_maintenance_vaultupdater' => $path . '/templates/backend',
    // frontend
    'customelement_simple' => $path . '/templates',
    'customelement_grouped' => $path . '/templates',
    'customelement_attr_default' => $path . '/templates',
    'customelement_attr_optionwizard' => $path . '/PCT/CustomElements/Attributes/OptionWizard/templates',
));
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_frontend_quickedit';
/**
 * Register the classes
 */
$classMap = array('PCT\\FrontendQuickEdit\\Core' => $path . '/PCT/FrontendQuickEdit/Core.php', 'PCT\\FrontendQuickEdit\\ContaoCallbacks' => $path . '/PCT/FrontendQuickEdit/ContaoCallbacks.php', 'PCT\\FrontendQuickEdit\\Controller' => $path . '/PCT/FrontendQuickEdit/Controller.php', 'PCT\\FrontendQuickEdit\\SystemIntegration' => $path . '/PCT/FrontendQuickEdit/SystemIntegration.php', 'PCT\\FrontendQuickEdit\\InsertTags' => $path . '/PCT/FrontendQuickEdit/InsertTags.php', 'PCT\\FrontendQuickEdit\\Backend\\TableUser' => $path . '/PCT/FrontendQuickEdit/Backend/TableUser.php', 'PCT\\FrontendQuickEdit\\Backend\\TableThemeDesigner' => $path . '/PCT/FrontendQuickEdit/Backend/TableThemeDesigner.php', 'PCT\\FrontendQuickEdit\\Frontend\\ModuleBackendLogin' => $path . '/PCT/FrontendQuickEdit/Frontend/ModuleBackendLogin.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('interface_contentelement' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_contentelement_sliderStart' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_contentelement_swiper-slider-start' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_contentelement_autogridColStart' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_contentelement_revolutionslider' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_customcatalog' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_article' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_module' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_news' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_events' => 'system/modules/pct_frontend_quickedit/templates/interface', 'interface_form' => 'system/modules/pct_frontend_quickedit/templates/interface', 'script_pct_frontend_quickedit' => 'system/modules/pct_frontend_quickedit/templates/scripts', 'be_widget_sizes_wizard' => 'system/modules/pct_frontend_quickedit/templates/widgets', 'mod_backendlogin' => 'system/modules/pct_frontend_quickedit/templates/modules'));
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Revolutionslider
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_revolutionslider';
/**
 * Register the classes
 */
$classMap = array(
    // RevolutionSlider
    'RevolutionSlider\\Backend\\TableContent' => $path . '/RevolutionSlider/Backend/TableContent.php',
    'RevolutionSlider\\Backend\\TableRevolutionSlider' => $path . '/RevolutionSlider/Backend/TableRevolutionSlider.php',
    'RevolutionSlider\\Backend\\TableRevolutionSliderSlides' => $path . '/RevolutionSlider/Backend/TableRevolutionSliderSlides.php',
    'RevolutionSlider\\Backend\\TableUserGroup' => $path . '/RevolutionSlider/Backend/TableUserGroup.php',
    'RevolutionSlider\\Core\\Factory' => $path . '/RevolutionSlider/Core/Factory.php',
    'RevolutionSlider\\Core\\InsertTags' => $path . '/RevolutionSlider/Core/InsertTags.php',
    'RevolutionSlider\\Core\\RevolutionSlider' => $path . '/RevolutionSlider/Core/RevolutionSlider.php',
    'RevolutionSlider\\Core\\Slide' => $path . '/RevolutionSlider/Core/Slide.php',
    'RevolutionSlider\\Core\\SlideFactory' => $path . '/RevolutionSlider/Core/SlideFactory.php',
    'RevolutionSlider\\Frontend\\ContentRevolutionSlider' => $path . '/RevolutionSlider/Frontend/ContentRevolutionSlider.php',
    'RevolutionSlider\\Frontend\\ContentRevolutionSliderVideo' => $path . '/RevolutionSlider/Frontend/ContentRevolutionSliderVideo.php',
    'RevolutionSlider\\Frontend\\ContentRevolutionSliderText' => $path . '/RevolutionSlider/Frontend/ContentRevolutionSliderText.php',
    'RevolutionSlider\\Frontend\\ContentRevolutionSliderImage' => $path . '/RevolutionSlider/Frontend/ContentRevolutionSliderImage.php',
    'RevolutionSlider\\Frontend\\ContentRevolutionSliderHyperlink' => $path . '/RevolutionSlider/Frontend/ContentRevolutionSliderHyperlink.php',
    'RevolutionSlider\\Models\\Slider' => $path . '/RevolutionSlider/Models/Slider.php',
    'RevolutionSlider\\Models\\Slides' => $path . '/RevolutionSlider/Models/Slides.php',
);
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('ce_revolutionslider' => 'system/modules/pct_revolutionslider/templates', 'ce_revolutionslider_video' => 'system/modules/pct_revolutionslider/templates', 'ce_revolutionslider_text' => 'system/modules/pct_revolutionslider/templates', 'ce_revolutionslider_image' => 'system/modules/pct_revolutionslider/templates', 'ce_revolutionslider_hyperlink' => 'system/modules/pct_revolutionslider/templates', 'js_revoslider_default' => 'system/modules/pct_revolutionslider/templates', 'revoslider_default' => 'system/modules/pct_revolutionslider/templates'));
}

namespace {
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
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_privacy_manager';
/**
 * Register the classes
 */
$classMap = array('PCT\\PrivacyManager\\ModuleOptIn' => $path . '/PCT/PrivacyManager/ModuleOptIn.php', 'PCT\\PrivacyManager\\ModuleOptOut' => $path . '/PCT/PrivacyManager/ModuleOptOut.php', 'PCT\\PrivacyManager\\ContentPrivacyIframe' => $path . '/PCT/PrivacyManager/ContentPrivacyIframe.php', 'PCT\\PrivacyManager\\Backend\\TableModule' => $path . '/PCT/PrivacyManager/Backend/TableModule.php', 'PCT\\PrivacyManager\\ContaoCallbacks' => $path . '/PCT/PrivacyManager/ContaoCallbacks.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('mod_privacy_default' => 'system/modules/pct_privacy_manager/templates/modules', 'mod_privacy_medium' => 'system/modules/pct_privacy_manager/templates/modules', 'mod_privacy_slim' => 'system/modules/pct_privacy_manager/templates/modules', 'mod_auto_optout' => 'system/modules/pct_privacy_manager/templates/modules', 'ce_privacy_iframe' => 'system/modules/pct_privacy_manager/templates/elements', 'ce_hyperlink_optout' => 'system/modules/pct_privacy_manager/templates/elements', 'j_privacymanager' => 'system/modules/pct_privacy_manager/templates/scripts', 'privacy_webfonts' => 'system/modules/pct_privacy_manager/templates'));
}

namespace {
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
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_theme_settings';
/**
 * Register the classes
 */
$classMap = array(
    'PCT\\ThemeSettings\\Core' => $path . '/PCT/ThemeSettings/Core.php',
    'PCT\\ThemeSettings\\ContaoCallbacks' => $path . '/PCT/ThemeSettings/ContaoCallbacks.php',
    'PCT\\ThemeSettings\\Backend\\TableContent' => $path . '/PCT/ThemeSettings/Backend/TableContent.php',
    'PCT\\ThemeSettings\\Backend\\TableArticle' => $path . '/PCT/ThemeSettings/Backend/TableArticle.php',
    'PCT\\ThemeSettings\\Backend\\TableModule' => $path . '/PCT/ThemeSettings/Backend/TableModule.php',
    'PCT\\ThemeSettings\\Backend\\TableFormField' => $path . '/PCT/ThemeSettings/Backend/TableFormField.php',
    'PCT\\ThemeSettings\\Backend\\TablePage' => $path . '/PCT/ThemeSettings/Backend/TablePage.php',
    'PCT\\ThemeSettings\\Backend\\TableUser' => $path . '/PCT/ThemeSettings/Backend/TableUser.php',
    'PCT\\ThemeSettings\\Backend\\BackendIntegration' => $path . '/PCT/ThemeSettings/Backend/BackendIntegration.php',
    'PCT\\ThemeSettings\\Backend\\PageContentElementSet' => $path . '/PCT/ThemeSettings/Backend/PageContentElementSet.php',
    'PCT\\ThemeSettings\\Backend\\PageContentElementSetExport' => $path . '/PCT/ThemeSettings/Backend/PageContentElementSetExport.php',
    'PCT\\ThemeSettings\\PageImage\\Module' => $path . '/PCT/ThemeSettings/PageImage/Module.php',
    'PCT\\ThemeSettings\\PageArticle\\Module' => $path . '/PCT/ThemeSettings/PageArticle/Module.php',
    'PCT\\ThemeSettings\\Portfolio\\ModuleList' => $path . '/PCT/ThemeSettings/Portfolio/ModuleList.php',
    'PCT\\ThemeSettings\\Portfolio\\ModuleReader' => $path . '/PCT/ThemeSettings/Portfolio/ModuleReader.php',
    'PCT\\ThemeSettings\\Portfolio\\ModuleFilter' => $path . '/PCT/ThemeSettings/Portfolio/ModuleFilter.php',
    'PCT\\License' => $path . '/PCT/License.php',
    // ContentElementSet
    'Contao\\PCT\\ContentElementSet' => $path . '/Contao/PCT/ContentElementSet.php',
    'PCT\\ThemeSettings\\ContentElementSet' => $path . '/PCT/ThemeSettings/ContentElementSet.php',
);
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array(
    'mod_article' => 'system/modules/pct_theme_settings/templates',
    'ce_headline_seo' => 'system/modules/pct_theme_settings/templates',
    'ce_text_seo' => 'system/modules/pct_theme_settings/templates',
    'ce_pct_contentelementset' => 'system/modules/pct_theme_settings/templates',
    'block_searchable_seo' => 'system/modules/pct_theme_settings/templates',
    //pageimage,article
    'mod_pageimage' => 'system/modules/pct_theme_settings/templates/page',
    'mod_pagearticle' => 'system/modules/pct_theme_settings/templates/page',
    'mod_pagearticle_top' => 'system/modules/pct_theme_settings/templates/page',
    // portfolio
    'mod_portfoliolist' => 'system/modules/pct_theme_settings/templates/portfolio',
    'mod_portfolioreader' => 'system/modules/pct_theme_settings/templates/portfolio',
    'mod_portfoliofilter' => 'system/modules/pct_theme_settings/templates/portfolio',
    'portfoliofilter_php' => 'system/modules/pct_theme_settings/templates/portfolio',
    'portfoliofilter_isotope' => 'system/modules/pct_theme_settings/templates/portfolio',
    'portfolio_latest' => 'system/modules/pct_theme_settings/templates/portfolio',
    'fe_license_banner' => 'system/modules/pct_theme_settings/templates/license',
    'be_license_banner' => 'system/modules/pct_theme_settings/templates/license',
    //backend
    'be_viewport_panel' => 'system/modules/pct_theme_settings/templates/backend',
    'be_js_themesettings' => 'system/modules/pct_theme_settings/templates/backend',
    'be_page_contentelementset' => 'system/modules/pct_theme_settings/templates/backend',
    'be_page_contentelementset_export' => 'system/modules/pct_theme_settings/templates/backend',
    'be_article_themesettingsbutton' => 'system/modules/pct_theme_settings/templates/backend',
    'be_content_themesettingsbutton' => 'system/modules/pct_theme_settings/templates/backend',
));
}

namespace {
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
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_customelements_plugin_customcatalog';
/**
 * Register the classes
 */
$classMap = array(
    // Core
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Controller' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/Controller.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\CustomCatalog' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomCatalog.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\CustomCatalogFactory' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomCatalogFactory.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\CustomElementFactory' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomElementFactory.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\CustomElement' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/CustomElement.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\InsertTags' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/InsertTags.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\AttributeFactory' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/AttributeFactory.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Hooks' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/Hooks.php',
    #	'PCT\CustomElements\Plugins\CustomCatalog\Core\Attribute'							=> $path.'/PCT/CustomElements/Plugins/CustomCatalog/Core/Attribute.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\SystemIntegration' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/SystemIntegration.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/Maintenance.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\RowTemplate' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/RowTemplate.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\FrontendTemplate' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/FrontendTemplate.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\TemplateFilter' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/TemplateFilter.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Multilanguage' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/Multilanguage.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Cache' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Core/Cache.php',
    'PCT\\CustomElements\\Core\\FilterFactory' => $path . '/PCT/CustomElements/Core/FilterFactory.php',
    'PCT\\CustomElements\\Core\\Filter' => $path . '/PCT/CustomElements/Core/Filter.php',
    'PCT\\CustomElements\\Core\\FilterCollection' => $path . '/PCT/CustomElements/Core/FilterCollection.php',
    'PCT\\CustomElements\\Filter' => $path . '/PCT/CustomElements/Filter.php',
    'PCT\\CustomElements\\FilterCollection' => $path . '/PCT/CustomElements/FilterCollection.php',
    // Filters
    'PCT\\CustomElements\\Filters\\Controller' => $path . '/PCT/CustomElements/Filters/Controller.php',
    'PCT\\CustomElements\\Filters\\Base' => $path . '/PCT/CustomElements/Filters/Base.php',
    'PCT\\CustomElements\\Filters\\SimpleFilter' => $path . '/PCT/CustomElements/Filters/SimpleFilter.php',
    'PCT\\CustomElements\\Filters\\Checkbox' => $path . '/PCT/CustomElements/Filters/Checkbox/Checkbox.php',
    'PCT\\CustomElements\\Filters\\Combiner' => $path . '/PCT/CustomElements/Filters/Combiner/Combiner.php',
    'PCT\\CustomElements\\Filters\\CustomHtml' => $path . '/PCT/CustomElements/Filters/CustomHtml/CustomHtml.php',
    'PCT\\CustomElements\\Filters\\CustomSql' => $path . '/PCT/CustomElements/Filters/CustomSql/CustomSql.php',
    'PCT\\CustomElements\\Filters\\Geolocation' => $path . '/PCT/CustomElements/Filters/Geolocation/Geolocation.php',
    'PCT\\CustomElements\\Filters\\Hook' => $path . '/PCT/CustomElements/Filters/Hook/Hook.php',
    'PCT\\CustomElements\\Filters\\Hook\\HookExample' => $path . '/PCT/CustomElements/Filters/Hook/HookExample.php',
    'PCT\\CustomElements\\Filters\\LanguageSwitch' => $path . '/PCT/CustomElements/Filters/LanguageSwitch/LanguageSwitch.php',
    'PCT\\CustomElements\\Filters\\LanguageSwitch\\TableFilter' => $path . '/PCT/CustomElements/Filters/LanguageSwitch/TableFilter.php',
    'PCT\\CustomElements\\Filters\\Pagebreak' => $path . '/PCT/CustomElements/Filters/Pagebreak/Pagebreak.php',
    'PCT\\CustomElements\\Filters\\Pagetree' => $path . '/PCT/CustomElements/Filters/Pagetree/Pagetree.php',
    'PCT\\CustomElements\\Filters\\Protection' => $path . '/PCT/CustomElements/Filters/Protection/Protection.php',
    'PCT\\CustomElements\\Filters\\Range' => $path . '/PCT/CustomElements/Filters/Range/Range.php',
    'PCT\\CustomElements\\Filters\\RelatedItems' => $path . '/PCT/CustomElements/Filters/RelatedItems/RelatedItems.php',
    'PCT\\CustomElements\\Filters\\RelatedItems\\TableHelper' => $path . '/PCT/CustomElements/Filters/RelatedItems/TableHelper.php',
    'PCT\\CustomElements\\Filters\\Select' => $path . '/PCT/CustomElements/Filters/Select/Select.php',
    'PCT\\CustomElements\\Filters\\SelectDb' => $path . '/PCT/CustomElements/Filters/SelectDb/SelectDb.php',
    'PCT\\CustomElements\\Filters\\SimpleCondition' => $path . '/PCT/CustomElements/Filters/SimpleCondition/SimpleCondition.php',
    'PCT\\CustomElements\\Filters\\SimpleIdList' => $path . '/PCT/CustomElements/Filters/SimpleIdList/SimpleIdList.php',
    'PCT\\CustomElements\\Filters\\Sorting' => $path . '/PCT/CustomElements/Filters/Sorting/Sorting.php',
    'PCT\\CustomElements\\Filters\\SortingByFilter' => $path . '/PCT/CustomElements/Filters/SpecialSorting/SortingByFilter.php',
    'PCT\\CustomElements\\Filters\\SortingByAttribute' => $path . '/PCT/CustomElements/Filters/SpecialSorting/SortingByAttribute.php',
    'PCT\\CustomElements\\Filters\\Text' => $path . '/PCT/CustomElements/Filters/Text/Text.php',
    'PCT\\CustomElements\\Filters\\Timestamp' => $path . '/PCT/CustomElements/Filters/Timestamp/Timestamp.php',
    'PCT\\CustomElements\\Filters\\Wrapper' => $path . '/PCT/CustomElements/Filters/Wrapper/Wrapper.php',
    // Models
    'PCT\\CustomElements\\Models\\Model' => $path . '/PCT/CustomElements/Models/Model.php',
    'PCT\\CustomElements\\Models\\FilterModel' => $path . '/PCT/CustomElements/Models/FilterModel.php',
    'PCT\\CustomElements\\Models\\FiltersetModel' => $path . '/PCT/CustomElements/Models/FiltersetModel.php',
    'PCT\\CustomElements\\Models\\CustomCatalogModel' => $path . '/PCT/CustomElements/Models/CustomCatalogModel.php',
    'PCT\\CustomCatalog\\Models\\ApiModel' => $path . '/PCT/CustomCatalog/Models/ApiModel.php',
    'PCT\\CustomCatalog\\Models\\JobModel' => $path . '/PCT/CustomCatalog/Models/JobModel.php',
    // Loader
    'PCT\\CustomElements\\Loader\\FilterLoader' => $path . '/PCT/CustomElements/Loader/FilterLoader.php',
    'PCT\\CustomElements\\Loader\\ApiLoader' => $path . '/PCT/CustomElements/Loader/ApiLoader.php',
    // Backend
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/BackendIntegration.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomCatalog.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElement' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElement.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementAttribute' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElementAttribute.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableModule.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableUser' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableUser.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableUserGroup' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableUserGroup.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilterset' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElementFilterset.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomElementFilter.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Import' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/Import.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/Quickmenu.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomCatalogApi.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogJob' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/TableCustomCatalogJob.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\DbUpdatePage' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Backend/DbUpdatePage.php',
    // Frontend
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleList' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleList.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleReader' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleReader.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleFilter' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleFilter.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\Pagination' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Frontend/Pagination.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleApiStarter' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Frontend/ModuleApiStarter.php',
    // Helper
    'PCT\\CustomElements\\Helper\\InstallerHelper' => $path . '/PCT/CustomElements/Helper/InstallerHelper.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Helper/DcaHelper.php',
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\QueryBuilder' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Helper/QueryBuilder.php',
    'PCT\\CustomElements\\Helper\\FilterHelper' => $path . '/PCT/CustomElements/Helper/FilterHelper.php',
    'PCT\\CustomElements\\Helper\\ModelHelper' => $path . '/PCT/CustomElements/Helper/ModelHelper.php',
    'PCT\\CustomElements\\Helper\\TableHelper' => $path . '/PCT/CustomElements/Helper/TableHelper.php',
    'PCT\\CustomElements\\Helper\\Functions' => $path . '/PCT/CustomElements/Helper/Functions.php',
    'PCT\\CustomElements\\Helper\\DataContainerHelper' => $path . '/PCT/CustomElements/Helper/DataContainerHelper.php',
    // API
    'PCT\\CustomCatalog\\API\\Backend\\BackendPage' => $path . '/PCT/CustomCatalog/API/Backend/BackendPage.php',
    'PCT\\CustomCatalog\\API\\Factory' => $path . '/PCT/CustomCatalog/API/Factory.php',
    'PCT\\CustomCatalog\\API\\Base' => $path . '/PCT/CustomCatalog/API/Base.php',
    'PCT\\CustomCatalog\\API\\Controller' => $path . '/PCT/CustomCatalog/API/Controller.php',
    'PCT\\CustomCatalog\\API\\Job' => $path . '/PCT/CustomCatalog/API/Job.php',
    'PCT\\CustomCatalog\\API\\Hooks' => $path . '/PCT/CustomCatalog/API/Hooks.php',
    'PCT\\CustomCatalog\\API\\Cron' => $path . '/PCT/CustomCatalog/API/Cron.php',
    'PCT\\CustomCatalog\\API\\Standard\\Core' => $path . '/PCT/CustomCatalog/APIs/Standard/Core.php',
    'PCT\\CustomCatalog\\API\\Standard\\Import' => $path . '/PCT/CustomCatalog/APIs/Standard/Import.php',
    'PCT\\CustomCatalog\\API\\Standard\\Export' => $path . '/PCT/CustomCatalog/APIs/Standard/Export.php',
    'PCT\\CustomCatalog\\API\\Standard\\Backend\\ExportPage' => $path . '/PCT/CustomCatalog/APIs/Standard/Backend/ExportPage.php',
    'PCT\\CustomCatalog\\API\\Standard\\Backend\\ImportPage' => $path . '/PCT/CustomCatalog/APIs/Standard/Backend/ImportPage.php',
    // Interfaces
    'PCT\\CustomCatalog\\Interfaces\\ApiInterface' => $path . '/PCT/CustomCatalog/Interfaces/ApiInterface.php',
    'PCT\\CustomCatalog\\Interfaces\\JobInterface' => $path . '/PCT/CustomCatalog/Interfaces/JobInterface.php',
    // Vendors
    'HashInsertTags' => $path . '/vendor/hashinserttags/HashInsertTags.php',
    // Contao classes
    'Contao\\CustomCatalog' => $path . '/Contao/CustomCatalog.php',
    'Contao\\ContaoModel' => $path . '/Contao/ContaoModel.php',
    // Picker
    'Contao\\Picker\\CustomCatalogPickerProvider' => $path . '/Contao/Picker/CustomCatalogPickerProvider.php',
    // Attributes
    'PCT\\CustomElements\\Plugins\\CustomCatalog\\Attributes\\AttributeCallbacks' => $path . '/PCT/CustomElements/Plugins/CustomCatalog/Attributes/AttributeCallbacks.php',
    'PCT\\CustomElements\\Attributes\\Alias' => $path . '/PCT/CustomElements/Attributes/Alias/Alias.php',
    'PCT\\CustomElements\\Attributes\\Country' => $path . '/PCT/CustomElements/Attributes/Country/Country.php',
    'PCT\\CustomElements\\Attributes\\CustomElement' => $path . '/PCT/CustomElements/Attributes/CustomElement/CustomElement.php',
    'PCT\\CustomElements\\Attributes\\CustomElement\\TableHelper' => $path . '/PCT/CustomElements/Attributes/CustomElement/TableHelper.php',
    'PCT\\CustomElements\\Attributes\\CustomElement\\Helper' => $path . '/PCT/CustomElements/Attributes/CustomElement/Helper.php',
    'PCT\\CustomElements\\Attributes\\FixedColumn' => $path . '/PCT/CustomElements/Attributes/FixedColumn/FixedColumn.php',
    'PCT\\CustomElements\\Attributes\\Geolocation' => $path . '/PCT/CustomElements/Attributes/Geolocation/Geolocation.php',
    'PCT\\CustomElements\\Attributes\\ItemTemplate' => $path . '/PCT/CustomElements/Attributes/ItemTemplate/ItemTemplate.php',
    'PCT\\CustomElements\\Attributes\\MetaDescription' => $path . '/PCT/CustomElements/Attributes/MetaDescription/MetaDescription.php',
    'PCT\\CustomElements\\Attributes\\MetaKeywords' => $path . '/PCT/CustomElements/Attributes/MetaKeywords/MetaKeywords.php',
    'PCT\\CustomElements\\Attributes\\Pagetree' => $path . '/PCT/CustomElements/Attributes/Pagetree/Pagetree.php',
    'PCT\\CustomElements\\Attributes\\Protection' => $path . '/PCT/CustomElements/Attributes/Protection/Protection.php',
    'PCT\\CustomElements\\Attributes\\RateIt' => $path . '/PCT/CustomElements/Attributes/RateIt/RateIt.php',
    'PCT\\CustomElements\\Attributes\\RateIt\\TableCustomElementAttribute' => $path . '/PCT/CustomElements/Attributes/RateIt/TableCustomElementAttribute.php',
    'PCT\\CustomElements\\Attributes\\RateIt\\FilterHelper' => $path . '/PCT/CustomElements/Attributes/RateIt/FilterHelper.php',
    'PCT\\CustomElements\\Attributes\\SelectDb' => $path . '/PCT/CustomElements/Attributes/SelectDb/SelectDb.php',
    'PCT\\CustomElements\\Attributes\\SelectDb\\TableHelper' => $path . '/PCT/CustomElements/Attributes/SelectDb/TableHelper.php',
    'PCT\\CustomElements\\Attributes\\SelectPalette' => $path . '/PCT/CustomElements/Attributes/SelectPalette/SelectPalette.php',
    'PCT\\CustomElements\\Attributes\\SimpleColumn' => $path . '/PCT/CustomElements/Attributes/SimpleColumn/SimpleColumn.php',
    'PCT\\CustomElements\\Attributes\\TranslationWidget' => $path . '/PCT/CustomElements/Attributes/TranslationWidget/TranslationWidget.php',
    // EventListeners
    'PCT\\CustomCatalog\\EventListener\\SitemapListener' => $path . '/PCT/CustomCatalog/EventListener/SitemapListener.php',
);
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array(
    // backend
    'be_cc_navigation' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_nav_default' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'mod_be_cc_navigation' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_cc_languagepanel' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_scripts' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_customelement_attr_default' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_cc_quickmenu' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_page_api' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_page_api_export_run' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_page_api_export_summary' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_page_api_import_run' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_page_api_import_summary' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_page_db_update' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_cc_api_report' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_module_icon_css' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_customelement_wildcard' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    'be_customelement_simple' => 'system/modules/pct_customelements_plugin_customcatalog/templates/backend',
    // frontend
    'mod_customcatalog' => 'system/modules/pct_customelements_plugin_customcatalog/templates',
    'mod_customcatalogfilter' => 'system/modules/pct_customelements_plugin_customcatalog/templates',
    'mod_customcatalogapi' => 'system/modules/pct_customelements_plugin_customcatalog/templates',
    'customcatalog_default' => 'system/modules/pct_customelements_plugin_customcatalog/templates',
    'customcatalog_grouped' => 'system/modules/pct_customelements_plugin_customcatalog/templates',
    'customcatalog_item_default' => 'system/modules/pct_customelements_plugin_customcatalog/templates',
    // forms
    'form_customcatalog_filter' => 'system/modules/pct_customelements_plugin_customcatalog/templates/forms',
    // filters
    'customcatalog_filter_default' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_select' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_select_sorted' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_linklist' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_countryselect' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_hidden' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_geosearch' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_range' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_text_autocomplete' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    'customcatalog_filter_datepicker' => 'system/modules/pct_customelements_plugin_customcatalog/templates/filters',
    // attributes
    'customelement_attr_googlemap' => 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
    'customelement_attr_rateit' => 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
    'customelement_attr_tags_include_catalog' => 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
    'customelement_attr_select_include_catalog' => 'system/modules/pct_customelements_plugin_customcatalog/templates/attributes',
));
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Pct_iconpicker
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir') . '/vendor/composer/../../system/modules/pct_iconpicker';
/**
 * Register the classes
 */
$classMap = array('PCT\\IconPicker\\IconPicker' => $path . '/PCT/IconPicker/IconPicker.php', 'PCT\\IconPicker\\ContaoCallbacks' => $path . '/PCT/IconPicker/ContaoCallbacks.php', 'PCT\\IconPicker\\IconPickerFactory' => $path . '/PCT/IconPicker/IconPickerFactory.php', 'PCT\\IconPicker\\IconPickerWidget' => $path . '/PCT/IconPicker/IconPickerWidget.php', 'PCT\\IconPicker\\Backend\\TableFormField' => $path . '/PCT/IconPicker/Backend/TableFormField.php', 'PCT\\IconPicker\\Backend\\TableContent' => $path . '/PCT/IconPicker/Backend/TableContent.php', 'PCT\\IconPicker\\Backend\\TableCustomElementAttribute' => $path . '/PCT/IconPicker/Backend/TableCustomElementAttribute.php', 'PCT\\IconPicker\\AttributeIconPicker' => $path . '/PCT/IconPicker/AttributeIconPicker.php', 'PCT\\IconPicker\\Backend\\PageIconPicker' => $path . '/PCT/IconPicker/Backend/PageIconPicker.php');
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('be_iconpicker' => 'system/modules/pct_iconpicker/templates', 'be_widget_iconpicker' => 'system/modules/pct_iconpicker/templates'));
}

namespace {
/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array('mod_pageimage' => 'system/modules/pct_theme_templates/templates/modules', 'mod_pagearticle' => 'system/modules/pct_theme_templates/templates/modules'));
}
