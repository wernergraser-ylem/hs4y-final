<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */
 

// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_frontend_quickedit';


/**
 * Register the classes
 */
$classMap = array
(
	'PCT\FrontendQuickEdit\Core' 					=> $path.'/PCT/FrontendQuickEdit/Core.php',
	'PCT\FrontendQuickEdit\ContaoCallbacks'			=> $path.'/PCT/FrontendQuickEdit/ContaoCallbacks.php',
	'PCT\FrontendQuickEdit\Controller'				=> $path.'/PCT/FrontendQuickEdit/Controller.php',
	'PCT\FrontendQuickEdit\SystemIntegration'		=> $path.'/PCT/FrontendQuickEdit/SystemIntegration.php',
	'PCT\FrontendQuickEdit\InsertTags' 				=> $path.'/PCT/FrontendQuickEdit/InsertTags.php',
	'PCT\FrontendQuickEdit\Backend\TableUser' 		=> $path.'/PCT/FrontendQuickEdit/Backend/TableUser.php',
	'PCT\FrontendQuickEdit\Backend\TableThemeDesigner' => $path.'/PCT/FrontendQuickEdit/Backend/TableThemeDesigner.php',
	'PCT\FrontendQuickEdit\Frontend\ModuleBackendLogin' 	=> $path.'/PCT/FrontendQuickEdit/Frontend/ModuleBackendLogin.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();

/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'interface_contentelement'	=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_contentelement_sliderStart'		=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_contentelement_swiper-slider-start'	=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_contentelement_autogridColStart'	=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_contentelement_revolutionslider'	=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_customcatalog'	=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_article' 		=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_module' 			=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_news' 			=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_events' 			=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'interface_form' 			=> 'system/modules/pct_frontend_quickedit/templates/interface',
	'script_pct_frontend_quickedit'	=> 'system/modules/pct_frontend_quickedit/templates/scripts',
	'be_widget_sizes_wizard'	=> 'system/modules/pct_frontend_quickedit/templates/widgets',
	'mod_backendlogin'		=> 'system/modules/pct_frontend_quickedit/templates/modules',
));