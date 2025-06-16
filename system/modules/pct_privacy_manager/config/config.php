<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) Leo Feyer
 *
 * @copyright Tim Gatzky 2020
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

/**
 * Constants
 */
define('PCT_PRIVACY_MANAGER_VERSION', '2.1.1');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_privacy_manager/config/autoload.php' );
}

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_privacy_manager'] = array
(
	'privacy_in' 	=> 'PCT\PrivacyManager\ModuleOptIn',
	'privacy_out' 	=> 'PCT\PrivacyManager\ModuleOptOut',
);


/**
 * Content elements
 */
$GLOBALS['TL_CTE']['media']['privacy_iframe'] = 'PCT\PrivacyManager\ContentPrivacyIframe';


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['getPageLayout'][] 		= array('PCT\PrivacyManager\ContaoCallbacks','getPageLayoutCallback');