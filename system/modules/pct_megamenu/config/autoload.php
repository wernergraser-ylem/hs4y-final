<?php

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
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_megamenu';

/**
 * Register the classes
 */
$classMap = array
(
	'PCT\MegaMenu\TablePage' 			=> $path.'/PCT/MegaMenu/TablePage.php',
	'PCT\MegaMenu\Module' 				=> $path.'/PCT/MegaMenu/Module.php',
	'PCT\MegaMenu\Page' 				=> $path.'/PCT/MegaMenu/Page.php',
	'PCT\MegaMenu\ContaoCallbacks' 		=> $path.'/PCT/MegaMenu/ContaoCallbacks.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();

/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'nav_pct_megamenu' 					=> 'system/modules/pct_megamenu/templates',
	'mod_pct_megamenu' 					=> 'system/modules/pct_megamenu/templates',
));
