<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpacke	pct_customelements_plugin_customcatalog
 * @filter		RateIt
 * @link		http://contao.org
 */

/**
 * Hooks
 */
$GLOBALS['CUSTOMCATALOG_HOOKS']['processFilter'][] = array('PCT\CustomElements\Attributes\RateIt\FilterHelper','processFilterCallback');