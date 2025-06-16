<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core;

/**
 * Import
 */
use PCT\CustomElements\Core\TemplateAttribute as TemplateAttribute;

/**
 * Class file
 * CustomElements FrontendTemplate
 */
class FrontendTemplate extends \Contao\FrontendTemplate
{
	/**
	 * Create an TemplateAttribute object and return it
	 * @param string	Alias of an attribute
	 * @return object
	 */
	public function field($strAlias)
	{
		if(isset($this->customelement_field[$strAlias]))
		{
			return $this->customelement_field[$strAlias];
		}
		// return the base attribute here because the Zero counter would be the base attribute any ways
		else if(strlen(strpos($strAlias,'#0')))
		{
			$strAlias = str_replace('#0', '', $strAlias);
			return $this->field($strAlias);
		}
		else if(isset($this->customelement_attribute))
		{
			$arrData = $this->customelement_attribute->getData();
			if(isset($arrData[$strAlias]))
			{
				return $arrData[$strAlias];
			}
		}
		else
		{
			return new TemplateAttribute(null);
		}
		
		return new TemplateAttribute(null);
	}
	
	
	/**
	 * Return all attributes in the template as array
	 * @return array
	 */
	public function fields()
	{
		if(is_array($this->customelement_fields))
		{
			return $this->customelement_fields;
		}
		// todo: generate fields here
		return array();
	}
	
	
	/**
	 * Return a specific group by its alias
	 * @param string	Alias of the group
	 * @return object
	 */
	public function group($strAlias)
	{
		if(isset($this->customelement_group[$strAlias]))
		{
			return $this->customelement_group[$strAlias];
		}
		return null;
	}
	
	
	/**
	 * Return the groups array
	 * @return array
	 */
	public function groups()
	{
		if(is_array($this->customelement_groups))
		{
			return $this->customelement_groups;
		}
		// todo: generate groups here
		return array();
	}
	
	
	/**
	 * Set or get the origin object
	 * @param object
	 * @return object
	 */
	public function origin($objOrigin=null)
	{
		if(isset($objOrigin))
		{
			$this->origin = $objOrigin;
		}
		return $this->origin;
	}
		
	
	/**
	 * Return the attribute data or the whole data array
	 * @param string
	 * @return mixed
	 */
	public function data($strKey='')
	{
		if(!isset($this->customelement_attribute))
		{
			return null;
		}
		
		$arrData = $this->customelement_attribute->getData();
		if(strlen($strKey) > 0)
		{
			return $arrData[$strKey];
		}
		return $arrData;
	}
	
	
	/**
	 * Return the attribute as object
	 * @return object
	 */
	public function attribute()
	{
		if(isset($this->customelement_attribute))
		{
			return $this->customelement_attribute;
		}
		return null;
	}
}