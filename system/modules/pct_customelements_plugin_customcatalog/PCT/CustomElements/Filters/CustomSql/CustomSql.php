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
 * @filter		CustomSql
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog;

/**
 * Class file
 * CustomSql
 */
class CustomSql extends \PCT\CustomElements\Filter
{
	/**
	 * Do not render the filter
	 * @var boolean
	 */
	protected $blnDoNotRender = true;
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$where = $this->get('customsql') ?: '';
		
		// replace inserttags
		$where = $this->getCustomCatalog()->replaceInsertTags($where);
		
		if( empty($where) )
		{
			return array();
		}
		
		if(!$options['column'] = 'id')
		{
			$options['column'] = 'id';
		}
		$options['where'] = $where;
		$options['eval']['allowEmpty'] = true; // tell the query builder to allow empty value arrays
		return $options;
	}

}