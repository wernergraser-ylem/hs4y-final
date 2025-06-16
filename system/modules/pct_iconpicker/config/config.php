<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

/**
 * Constants
 */
define('PCT_ICONPICKER_VERSION', '3.0.5');

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_iconpicker/config/autoload.php' );
}

/**
 * Back end form fields
 */
$GLOBALS['BE_FFL']['iconPicker']						= 'PCT\IconPicker\IconPickerWidget';

$GLOBALS['BE_MOD']['content']['article']['iconpicker'] = array('PCT\IconPicker\Backend\PageIconPicker','run'); 
$GLOBALS['BE_MOD']['content']['form']['iconpicker'] = array('PCT\IconPicker\Backend\PageIconPicker','run'); 
$GLOBALS['BE_MOD']['content']['calendar']['iconpicker'] = array('PCT\IconPicker\Backend\PageIconPicker','run');
$GLOBALS['BE_MOD']['content']['news']['iconpicker'] = array('PCT\IconPicker\Backend\PageIconPicker','run'); 
$GLOBALS['BE_MOD']['design']['themes']['iconpicker'] = array('PCT\IconPicker\Backend\PageIconPicker','run'); 
if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$GLOBALS['BE_MOD']['content']['page']['iconpicker'] = array('PCT\IconPicker\Backend\PageIconPicker','run'); 
}
else
{
	$GLOBALS['BE_MOD']['design']['page']['iconpicker'] = array('PCT\IconPicker\Backend\PageIconPicker','run'); 
}

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['getContentElement'][] 			= array('PCT\IconPicker\ContaoCallbacks', 'getContentElementCallback');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 			= array('PCT\IconPicker\ContaoCallbacks', 'replaceTags');
$GLOBALS['TL_HOOKS']['parseTemplate'][] 				= array('PCT\IconPicker\ContaoCallbacks', 'parseTemplateCallback');


/**
 * Globals
 */
$GLOBALS['PCT_ICONPICKER']['cteIgnoreList']				= array('html'); // content element blacklist
$GLOBALS['PCT_ICONPICKER']['fflIgnoreList']				= array(); // form field blacklist
$GLOBALS['PCT_ICONPICKER']['pageIgnoreList']			= array('root','error_403','error_404'); // page type blacklist
$GLOBALS['PCT_ICONPICKER']['iconClasses']				= array('.icon-','.fa-');
$GLOBALS['PCT_ICONPICKER']['fontaweseomeLocal']			= 'system/modules/pct_iconpicker/assets/vendor/font-awesome/4.7.0/css/font-awesome.min.css';

/**
 * Add an iconpicker attribute
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['iconpicker'] = array
(
	'class'		=> 'PCT\IconPicker\AttributeIconPicker',
);