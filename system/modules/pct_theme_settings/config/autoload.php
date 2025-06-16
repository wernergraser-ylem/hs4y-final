<?php

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
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_theme_settings';


/**
 * Register the classes
 */
$classMap = array
(
	'PCT\ThemeSettings\Core' 					=> $path.'/PCT/ThemeSettings/Core.php',
	'PCT\ThemeSettings\ContaoCallbacks' 		=> $path.'/PCT/ThemeSettings/ContaoCallbacks.php',
	'PCT\ThemeSettings\Backend\TableContent' 	=> $path.'/PCT/ThemeSettings/Backend/TableContent.php',
	'PCT\ThemeSettings\Backend\TableArticle' 	=> $path.'/PCT/ThemeSettings/Backend/TableArticle.php',
	'PCT\ThemeSettings\Backend\TableModule' 	=> $path.'/PCT/ThemeSettings/Backend/TableModule.php',
	'PCT\ThemeSettings\Backend\TableFormField' 	=> $path.'/PCT/ThemeSettings/Backend/TableFormField.php',
	'PCT\ThemeSettings\Backend\TablePage' 		=> $path.'/PCT/ThemeSettings/Backend/TablePage.php',
	'PCT\ThemeSettings\Backend\TableUser' 		=> $path.'/PCT/ThemeSettings/Backend/TableUser.php',
	'PCT\ThemeSettings\Backend\BackendIntegration' 	=> $path.'/PCT/ThemeSettings/Backend/BackendIntegration.php',
	'PCT\ThemeSettings\Backend\PageContentElementSet'				=> $path.'/PCT/ThemeSettings/Backend/PageContentElementSet.php',
	'PCT\ThemeSettings\Backend\PageContentElementSetExport'		=> $path.'/PCT/ThemeSettings/Backend/PageContentElementSetExport.php',
	'PCT\ThemeSettings\PageImage\Module' 		=> $path.'/PCT/ThemeSettings/PageImage/Module.php',
	'PCT\ThemeSettings\PageArticle\Module' 		=> $path.'/PCT/ThemeSettings/PageArticle/Module.php',
	'PCT\ThemeSettings\Portfolio\ModuleList' 	=> $path.'/PCT/ThemeSettings/Portfolio/ModuleList.php',
	'PCT\ThemeSettings\Portfolio\ModuleReader' 	=> $path.'/PCT/ThemeSettings/Portfolio/ModuleReader.php',
	'PCT\ThemeSettings\Portfolio\ModuleFilter' 	=> $path.'/PCT/ThemeSettings/Portfolio/ModuleFilter.php',
	'PCT\License' 								=> $path.'/PCT/License.php',
	// ContentElementSet
	'Contao\PCT\ContentElementSet'				=> $path.'/Contao/PCT/ContentElementSet.php',
	'PCT\ThemeSettings\ContentElementSet'		=> $path.'/PCT/ThemeSettings/ContentElementSet.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();


/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'mod_article' 				=> 'system/modules/pct_theme_settings/templates',
	'ce_headline_seo'			=> 'system/modules/pct_theme_settings/templates',
	'ce_text_seo'				=> 'system/modules/pct_theme_settings/templates',
	'ce_pct_contentelementset'	=> 'system/modules/pct_theme_settings/templates',
	'block_searchable_seo'		=> 'system/modules/pct_theme_settings/templates',
	//pageimage,article
	'mod_pageimage' 			=> 'system/modules/pct_theme_settings/templates/page',
	'mod_pagearticle' 			=> 'system/modules/pct_theme_settings/templates/page',
	'mod_pagearticle_top' 		=> 'system/modules/pct_theme_settings/templates/page',
	// portfolio
	'mod_portfoliolist' 		=> 'system/modules/pct_theme_settings/templates/portfolio',
	'mod_portfolioreader' 		=> 'system/modules/pct_theme_settings/templates/portfolio',
	'mod_portfoliofilter' 		=> 'system/modules/pct_theme_settings/templates/portfolio',
	'portfoliofilter_php' 		=> 'system/modules/pct_theme_settings/templates/portfolio',
	'portfoliofilter_isotope' 	=> 'system/modules/pct_theme_settings/templates/portfolio',
	'portfolio_latest' 			=> 'system/modules/pct_theme_settings/templates/portfolio',
	'fe_license_banner' 		=> 'system/modules/pct_theme_settings/templates/license',
	'be_license_banner' 		=> 'system/modules/pct_theme_settings/templates/license',
	//backend
	'be_viewport_panel' 		=> 'system/modules/pct_theme_settings/templates/backend',
	'be_js_themesettings' 		=> 'system/modules/pct_theme_settings/templates/backend',
	'be_page_contentelementset'			=> 'system/modules/pct_theme_settings/templates/backend',
	'be_page_contentelementset_export'	=> 'system/modules/pct_theme_settings/templates/backend',
	'be_article_themesettingsbutton'	=> 'system/modules/pct_theme_settings/templates/backend',
	'be_content_themesettingsbutton'	=> 'system/modules/pct_theme_settings/templates/backend',
));
