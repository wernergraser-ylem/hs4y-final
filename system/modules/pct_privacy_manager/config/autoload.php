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
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_privacy_manager';

/**
 * Register the classes
 */
$classMap = array
(
	'PCT\PrivacyManager\ModuleOptIn' 			=> $path.'/PCT/PrivacyManager/ModuleOptIn.php',
	'PCT\PrivacyManager\ModuleOptOut' 			=> $path.'/PCT/PrivacyManager/ModuleOptOut.php',
	'PCT\PrivacyManager\ContentPrivacyIframe'	=> $path.'/PCT/PrivacyManager/ContentPrivacyIframe.php',
	'PCT\PrivacyManager\Backend\TableModule' 	=> $path.'/PCT/PrivacyManager/Backend/TableModule.php',
	'PCT\PrivacyManager\ContaoCallbacks' 		=> $path.'/PCT/PrivacyManager/ContaoCallbacks.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();


/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'mod_privacy_default' 	=> 'system/modules/pct_privacy_manager/templates/modules',
	'mod_privacy_medium' 	=> 'system/modules/pct_privacy_manager/templates/modules',
	'mod_privacy_slim' 		=> 'system/modules/pct_privacy_manager/templates/modules',
	'mod_auto_optout' 		=> 'system/modules/pct_privacy_manager/templates/modules',
	'ce_privacy_iframe' 	=> 'system/modules/pct_privacy_manager/templates/elements',
	'ce_hyperlink_optout'	=> 'system/modules/pct_privacy_manager/templates/elements',
	'j_privacymanager'		=> 'system/modules/pct_privacy_manager/templates/scripts',
	'privacy_webfonts'		=> 'system/modules/pct_privacy_manager/templates'
));
