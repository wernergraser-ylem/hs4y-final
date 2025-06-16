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
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Class file
 * TemplateFilter
 */
#[\AllowDynamicProperties]
class TemplateFilter
{
	/**
	 * Initialize and attach an attribute object
	 * @param object	CustomElement Attribute
	 */
	public function __construct($objFilter=null)
	{
		if(!is_object($objFilter) || empty($objFilter) || is_null($objFilter))
		{
			return null;
		}
		$this->filter = $objFilter;
	}
	
	
	/**
	 * Return the value of the attribute
	 * @return mixed
	 */
	public function value() 
	{ 
		// Store processed values
		if(!isset($this->value) && isset($this->attribute)) 
		{
			$this->value = $this->filter->getValue();
		}
		
		return $this->value;
	}
	
	
	/**
	 * Render the attribute and return html string
	 * @return string
	 */
	public function render() 
	{
		// Store processed values
		if(!isset($this->html) && isset($this->filter))
		{
			$this->html = $this->filter->render();
		}
		return $this->html;
	}
	
	
	/**
	 * Shortcut to render()
	 */
	public function html() {return $this->render();}
	
	
	/**
	 * Return the attribute object
	 * @return object
	 */
	public function filter() {return $this->filter;}
	
}
 