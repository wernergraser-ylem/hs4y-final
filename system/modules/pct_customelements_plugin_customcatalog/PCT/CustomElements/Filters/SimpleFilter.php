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
 * @filter		Default filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Imports
 */
use \PCT\CustomElements\Core\FilterFactory as FilterFactory;

/**
 * Class file
 * SimpleFilter
 */
class SimpleFilter extends \PCT\CustomElements\Core\Filter
{
	/**
	 * Init
	 */
	public function __construct($arrIds=array())
	{
		if(empty($arrIds))
		{
			return;
		}
		
		$options = array
		(
			'column'	=> 'id',
			'operation'	=> 'IN',
			'value'		=> $arrIds,
		);
		$this->setOptions($options);
	}
}