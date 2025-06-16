<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpacke	pct_customelements_plugin_customcatalog
 * @attribute	Protection
 * @link		http://contao.org
 */

/**
 * Globals
 */
if(!isset($GLOBALS['PCT_CUSTOMCATALOG']['PROTECTION_HELPER']))
{
	$GLOBALS['PCT_CUSTOMCATALOG']['PROTECTION_HELPER'] = array();
}

/**
 * Hooks
 */
$GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField'][] 		= array('PCT\CustomElements\Attributes\Protection','addToProtectionPlan');
$GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'][] 	= array('PCT\CustomElements\Attributes\Protection','applyBackendFilter');
$GLOBALS['CUSTOMCATALOG_HOOKS']['generalDataContainer'][] 		= array('PCT\CustomElements\Attributes\Protection','autoSubmitUserData');
