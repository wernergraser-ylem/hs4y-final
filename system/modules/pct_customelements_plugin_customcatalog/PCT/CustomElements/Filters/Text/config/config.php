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
 * @filter		Text filter
 */

/**
 * Hooks
 */
$GLOBALS['CUSTOMELEMENTS_HOOKS']['FILTERS']['TEXT']['keywordSearch'][] = array('PCT\CustomElements\Filters\Text','searchGenericOptionFields');
