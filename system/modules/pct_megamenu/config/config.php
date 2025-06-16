<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_megamenu
 * @link		http://contao.org
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

/**
 * Constants
 */
define('PCT_MEGAMENU_VERSION', '2.0.2');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_megamenu/config/autoload.php' );
}

/** 
 * Frontend Module
 */
$GLOBALS['FE_MOD']['navigationMenu']['pct_megamenu'] = 'PCT\MegaMenu\Module';

/**
 * Page type
 */
$GLOBALS['TL_PTY']['pct_megamenu'] = 'PCT\MegaMenu\Page';

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 	= array('PCT\MegaMenu\ContaoCallbacks','replaceInsertTagsCallback');
$GLOBALS['TL_HOOKS']['getPageStatusIcon'][] 	= array('PCT\MegaMenu\TablePage','getPageIcon');
$GLOBALS['TL_HOOKS']['generateFrontendUrl'][]	= array('PCT\MegaMenu\ContaoCallbacks','generateFrontendUrlCallback');