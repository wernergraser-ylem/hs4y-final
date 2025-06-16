<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog 
 * @attribute	Pagetree
 * @link		http://contao.org
 */

/**
 * Globals
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']['pagetree']['settings']['inheritToSelection'] = false; // when true and filter setting inherit to childs is active, the filter will spread its range to child records of the selected pages

/**
 * Hooks
 */
$GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField'][] 		= array('PCT\CustomElements\Attributes\Pagetree','prepareField');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue'][] 	= array('PCT\CustomElements\Attributes\Pagetree','processWildcardValue');