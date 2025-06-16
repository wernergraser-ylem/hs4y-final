<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		Timestamp filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * CustomHtml
 */
class CustomHtml extends \PCT\CustomElements\Filter
{
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		$strName = \Contao\StringUtil::standardize($this->get('title'));
		if(strlen($this->get('urlparam')) > 0)
		{
			$strName = $this->get('urlparam');
		}
		
		// set the filter name
		$this->setName($strName);
	}
	
	
		/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$objCustomSqlFilter = new \PCT\CustomElements\Filters\CustomSql($this->getData());
		$objCustomSqlFilter->setOrigin( $this->getOrigin() );
		return $objCustomSqlFilter->getQueryOptionCallback();
	}
	
		
	/**
	 * Render the filter and return string
	 * @param string	Name of the attribute
	 * @param mixed		Active filter values
	 * @param object	Template object
	 * @param object	The current filter object
	 * @return string
	 */
	public function renderCallback($strName,$varValue,$objTemplate,$objFilter)
	{
		$objTemplate->name = $strName;
		$objTemplate->label = $objFilter->get('label');
		$objTemplate->value = $varValue;
		$objTemplate->widget = $objTemplate->html = $objFilter->get('defaultMulti');
		return $objTemplate->parse();
	}
}