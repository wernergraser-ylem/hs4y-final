<?php

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
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_seo_helper';

/**
 * Register the classes
 */
$classMap = array
(
	'PCT\SEO' 					=> $path.'/PCT/SEO.php',
	'PCT\SEO\ContaoCallbacks' 	=> $path.'/PCT/SEO/ContaoCallbacks.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();