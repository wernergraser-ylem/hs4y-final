<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		SimpleIdList
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * SimpleIdList
 */
class SimpleIdList extends \PCT\CustomElements\Filter
{
	/**
	 * Apply the filter and return it
	 * @return object
	 */
	public function prepareFilter()
	{
		$value = ($this->getValue() ? $this->getValue() : explode(',', $this->get('defaultMulti')));
		$objFilter = new SimpleFilter($value);
		return $objFilter;
	}
}