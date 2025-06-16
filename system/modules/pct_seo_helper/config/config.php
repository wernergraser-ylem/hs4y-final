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

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;
if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_seo_helper/config/autoload.php' );
}

define('PCT_SEO_HELPER_VERSION', '2.1.0');

if( !isset($GLOBALS['PCT_SEO']) )
{
	$GLOBALS['PCT_SEO'] = array();
}

if( !isset($GLOBALS['SEO_SCRIPTS']) )
{
	$GLOBALS['SEO_SCRIPTS'] = array();
}

if( !isset($GLOBALS['SEO_SCRIPTS_FILE']) )
{
	$GLOBALS['SEO_SCRIPTS_FILE'] = array();
}

if( !isset($GLOBALS['SEO_SCRIPTS_FILE_PROCESSED']) )
{
	$GLOBALS['SEO_SCRIPTS_FILE_PROCESSED'] = array();
}


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseFrontendTemplate'][] 	= array('PCT\SEO\ContaoCallbacks', 'parseFrontendTemplateCallback');
$GLOBALS['TL_HOOKS']['parseFrontendTemplate'][]		= array('PCT\SEO\ContaoCallbacks','collectScriptSections');
$GLOBALS['TL_HOOKS']['generatePage'][]				= array('PCT\SEO\ContaoCallbacks','generatePageCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][]				= array('PCT\SEO\ContaoCallbacks','parseTemplateCallback');