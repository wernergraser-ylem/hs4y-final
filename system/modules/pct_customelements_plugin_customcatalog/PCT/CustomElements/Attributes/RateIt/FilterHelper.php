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
 * @attribute	RateIt
 * @link		http://contao.org
 */
 
/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes\RateIt;


/**
 * Class file
 * FilterHelper
 */
class FilterHelper extends \PCT\CustomElements\Filter
{
	/**
	 * Grab the sorting filters pointing at rateit attributes and set the order field to the _value option field
	 * @param object	Current filter object being procssed
	 * @param object
	 * @return object
	 * called from processFilter CUSTOMCATALOG HOOK
	 */
	public function processFilterCallback($objFilter, $objCC)
	{
		if(!$objFilter)
		{
			return null;
		}
		
		if($objFilter->get('type') != 'sorting_numeric')
		{
			return $objFilter;
		}
		
		$arrOptions = $objFilter->apply();
		
		if(empty($arrOptions['order']))
		{
			return $objFilter;
		}
		
		$tmp = explode('+', $arrOptions['order'][0]);
		$strField = $tmp[0];
		$strSorting = $arrOptions['order'][1];
		
		$objAttribute = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::fetchByAliasAndCustomCatalog($strField,$objCC->get('id'));
		if($objAttribute->type != 'rateit')
		{
			return $objFilter;
		}
		
		// set a new value for the sorting filter that points to the _value field
		$objFilter->setValue($strField.'_value'.'['.$strSorting.']');
		
		return $objFilter;
	}
}