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
 
/**
 * Namespace
 */
namespace PCT\CustomElements\Helper;

/**
 * Imports
 */
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * FilterHelper
 *
 * Provide various functions to gather filter informations
 */
class FilterHelper
{
	/**
	 * Return all registered filters as array
	 * @return array
	 */
	public static function getRegisteredFilters()
	{
		if(empty($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']))
		{
			return array();
		}
		
		return array_keys($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']);
	}
	
	
	/**
	 * Return the class name of a filter by its type
	 * @param string
	 * @return string
	 */
	public static function getClassByType($strType)
	{
		if(!$GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$strType]['class'])
		{
			return '';
		}
		
		return $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$strType]['class'];
	}
}