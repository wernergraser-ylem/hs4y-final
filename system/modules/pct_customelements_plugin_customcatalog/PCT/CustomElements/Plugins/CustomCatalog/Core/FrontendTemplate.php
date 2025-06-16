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
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;


/**
 * Class file
 * FrontendTemplate
 */
class FrontendTemplate extends \PCT\CustomElements\Core\FrontendTemplate
{
	/**
	 * Return the custom catalog as object
	 * @return object
	 */
	public function getCustomCatalog()
	{
		return $this->raw;
	}


	/**
	 * Return the filter processed as object
	 * @return object
	 */
	public function getFilter()
	{
		return $this->raw;
	}


	/**
	 * Override the fields() method
	 * @param string
	 * @return object
	 */
	public function field($strAlias)
	{
		if(isset($this->field[$strAlias]))
		{
			return $this->field[$strAlias];
		}
		else if(isset($this->customelement_field[$strAlias]))
		{
			return $this->customelement_field[$strAlias];
		}
		else
		{
			return new \PCT\CustomElements\Core\TemplateAttribute(null);;
		}
	}


	/**
	 * Return the specific filter object
	 * @param string
	 * @return object
	 */
	public function filter($strAlias)
	{
		if(isset($this->filter[$strAlias]))
		{
			return $this->filter[$strAlias];
		}
		else if(isset($this->customelement_filter[$strAlias]))
		{
			return $this->customelement_filter[$strAlias];
		}
		else
		{
			return new \PCT\CustomElements\Plugins\CustomCatalog\Core\TemplateFilter(null);;
		}
	}


	/**
	 * Return the value count of a filter
	 * @param mixed
	 * @return integer
	 */
	public function countValue($varValue,$blnCached=true)
	{
		$objFilter = $this->getFilter();
		if(!$objFilter)
		{
			return -1;
		}
		
		return $objFilter->getValueCount($varValue,$blnCached);
	}
}