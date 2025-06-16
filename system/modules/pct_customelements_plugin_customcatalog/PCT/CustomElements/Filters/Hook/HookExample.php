<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		Hook filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters\Hook;

/**
 * Class file
 * HookExample
 */
class HookExample
{
	/**
	 * Example method called by a hook filter registered in $GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter']['myFilterExample']
	 * Filters the list by the entry ids: 1,2,3
	 * @param object	The CustomCatalog calling the filter
	 * @param object	The Filter itself
	 * @return array	An array with the ids
	 */
	public function myHookFilterCallback($objCustomCatalog,$objFilter)
	{
		return array(1,2,3);
	}
}