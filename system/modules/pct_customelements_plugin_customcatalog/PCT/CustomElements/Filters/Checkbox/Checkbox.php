<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		Checkbox filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * Checkbox
 */
class Checkbox extends \PCT\CustomElements\Filter
{
	/**
	 * The attribute
	 * @param object
	 */
	protected $objAttribute = null;
	
	
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// fetch the attribute the filter works on
		$this->objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($this->get('attr_id'));
	
		// point the filter to the attribute or use the urlparameter
		$strName = $this->get('urlparam') ? $this->get('urlparam') : $this->objAttribute->alias;
		
		// set the filter name
		$this->setName($strName);
		
		// point the filter to the attribute
		$this->setFilterTarget($this->objAttribute->alias);
		
		// check if the filter should be resetted, if so reset the filter
		if($this->reset($strName))
		{
			$this->reset();
		}
	}
	
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		if(!array_filter($this->getValue(),'strlen'))
		{
			return array();
		}
		
		$options = array
		(
			'column'	=> $this->getFilterTarget(),
			'operation'	=> '=',
			'value'		=> $this->getValue(),
		);
		
		return $options;
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
		if(is_array($varValue))
		{
			$varValue = implode('', $varValue);
		}
		
		$strWidget = sprintf
		(
			'<input type="checkbox" name="%s" class="%s" value="1" %s>',
			$strName,
			'checkbox',
			($varValue >= 1 ? 'checked' : '')
		);
		
		$objTemplate->name = $strName;
		$objTemplate->label = $this->get('label');
		$objTemplate->widget = $strWidget;
		$objTemplate->checked = ($varValue >= 1 ? true : false);
		
		return $objTemplate->parse();
	}
}