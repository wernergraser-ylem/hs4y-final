<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

if(!isset($GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter']))
{
	$GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter'] = array();
}
 /**
  * Hook example
  */
$GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter']['myFilterExample'] = array('PCT\CustomElements\Filters\Hook\HookExample','myHookFilterCallback');