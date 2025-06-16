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
 * @filter		Conditions
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * Combiner
 */
class Combiner extends \PCT\CustomElements\Filter
{
	/**
	 * Do not render the filter
	 * @var boolean
	 */
	protected $blnDoNotRender = true;
	
	/**
	 * @inherit doc
	 */
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		return array('eval'=>array('combiner'=>$this->get('combiner')));
	}
}