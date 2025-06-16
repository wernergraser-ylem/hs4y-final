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
 * @filter		Hook filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * Hook
 */
class Hook extends \PCT\CustomElements\Filter
{
	/**
	 * Apply the filter and return it
	 * @return object
	 */
	public function prepareFilter()
	{
		$arrIds = array();
		
		$strCallback = $this->get('hook');
		if(empty($strCallback) || empty($GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter'][$strCallback]))
		{
			return null;
		}
		
		$arrCallback = $GLOBALS['CUSTOMCATALOG_HOOKS']['hookfilter'][$strCallback];

		$arrIds = \PCT\CustomElements\Helper\ControllerHelper::importStatic($arrCallback[0])->{$arrCallback[1]}($this->getOrigin(),$this);
		
		return new SimpleFilter($arrIds);
	}
}