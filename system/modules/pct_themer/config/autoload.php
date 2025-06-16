<?php

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
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_themer';


/**
 * Register the classes
 */
$classMap = array
(
	// Themer
	'PCT\Themer' 							=> $path.'/PCT/Themer.php',
	'PCT\Themer\Import' 					=> $path.'/PCT/Themer/Import.php',
	'PCT\Themer\Export' 					=> $path.'/PCT/Themer/Export.php',
	'PCT\Themer\Backend' 					=> $path.'/PCT/Themer/Backend.php',
	'PCT\Themer\DemoInstaller'				=> $path.'/PCT/Themer/DemoInstaller.php',
	'PCT\ThemeDesigner' 					=> $path.'/PCT/ThemeDesigner.php',
	'PCT\ThemeDesigner\Navigation'			=> $path.'/PCT/ThemeDesigner/Navigation.php',
	'PCT\ThemeDesigner\Section'				=> $path.'/PCT/ThemeDesigner/Section.php',
	'PCT\ThemeDesigner\Quickinfo' 			=> $path.'/PCT/ThemeDesigner/Quickinfo.php',
	'PCT\ThemeDesigner\Versions'			=> $path.'/PCT/ThemeDesigner/Versions.php',
	'PCT\ThemeDesigner\Model'				=> $path.'/PCT/ThemeDesigner/Model.php',
	'PCT\ThemeDesigner\InsertTags'			=> $path.'/PCT/ThemeDesigner/InsertTags.php',
	'PCT\ThemeDesigner\Backend' 			=> $path.'/PCT/ThemeDesigner/Backend.php',
	'PCT\ThemeDesigner\Frontend' 			=> $path.'/PCT/ThemeDesigner/Frontend.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();

/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'be_page_pct_theme_export'				=> 'system/modules/pct_themer/templates/backend',
	'be_pct_demoinstaller'					=> 'system/modules/pct_themer/templates/backend',
	'themedesigner'							=> 'system/modules/pct_themer/templates/themedesigner',
	'themedesigner_quickinfo'				=> 'system/modules/pct_themer/templates/themedesigner',
	
	'js_themedesigner'						=> 'system/modules/pct_themer/templates/themedesigner/js',
	'js_themedesigner_selector'				=> 'system/modules/pct_themer/templates/themedesigner/js',
	'js_themedesigner_iframe_helper'		=> 'system/modules/pct_themer/templates/themedesigner/js',
	'js_themedesigner_webfonts_optin'		=> 'system/modules/pct_themer/templates/themedesigner/js',
	'js_stylesheet'							=> 'system/modules/pct_themer/templates/themedesigner/js',

	'fe_page_themedesigner'					=> 'system/modules/pct_themer/templates/themedesigner',
	'td_nav'								=> 'system/modules/pct_themer/templates/themedesigner',
	'td_section'							=> 'system/modules/pct_themer/templates/themedesigner',
	'td_versions_form'						=> 'system/modules/pct_themer/templates/themedesigner',
	'td_devices_and_zoom'					=> 'system/modules/pct_themer/templates/themedesigner',

	// css constructor
	'stylesheet'							=> 'system/modules/pct_themer/templates/themedesigner/css',
	'css_webfonts'							=> 'system/modules/pct_themer/templates/themedesigner/css',
	
	// form fields
	'td_form_checkbox_single'				=> 'system/modules/pct_themer/templates/themedesigner/forms',
	'td_form_select_fontpicker'				=> 'system/modules/pct_themer/templates/themedesigner/forms',
	'td_form_textfield_colorpicker'			=> 'system/modules/pct_themer/templates/themedesigner/forms',
	'td_form_textfield_slider'				=> 'system/modules/pct_themer/templates/themedesigner/forms',
	'td_form_upload_dropzone'				=> 'system/modules/pct_themer/templates/themedesigner/forms',
));
