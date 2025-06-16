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

use Contao\Date;

/**
 * Class file
 * Timestamp
 */
class Timestamp extends \PCT\CustomElements\Filter
{
	/**
	 * The attribute
	 * @param object
	 */
	protected $objAttribute = null;
	
	/**
	 * Flag if filter should include entries with empty values
	 * @param boolean
	 */
	protected $bolAllowEmpty = true;
	
	
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// fetch the attribute the filter works on
		$this->objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($this->get('attr_id'));
	
		// point the filter to the attribute or use the urlparameter
		$name = $this->get('urlparam') ? $this->get('urlparam') : $this->objAttribute->alias;
		$target = $this->objAttribute->alias;
		
		// set the filter name
		$this->setName($name);
		
		// point the filter to the attribute
		$this->setFilterTarget($target);
	}
	
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$value = implode('',$this->getValue());
		
		if(strlen($this->get('defaultValue')) > 0)
		{
			$value = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($this->get('defaultValue'));
		}

		// convert date formats to timestamp
		$value = $this->getUnix($value);
		
		if(empty($value))
		{
			return array();
		}

		$t = $this->getFilterTarget();
		
		// compare to current time if no target has been set
		if(strlen($t) < 1)
		{
			$t = time();	
		}
		
		$where = '';
		switch($this->get('mode'))
		{
			case 'ht': default:
				$where = $t.'<'.$value;
				break;
			case 'hte':
				$where = $t.'<='.$value;
				break;
			case 'lte':
				$where = $t.'>='.$value;
				break;
			case 'lt':
				$where = $t.'>'.$value;
				break;
		}
		
		$options = array
		(
			'column'	=> $t,
			'where'		=> '('.$where . ($this->bolAllowEmpty ? ' OR '.$t."='' " : '').')',
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
		$objTemplate->name = $strName;
		$objTemplate->label = $this->get('label');
		$objTemplate->dateFormat = \Contao\Config::get('dateFormat') ?? 'Y-m-d';
		$objTemplate->value = implode(',',$varValue);
		return $objTemplate->parse();
	}
	
	
	/**
	 * Setter
	 * @param boolean
	 */
	public function allowEmpty($bolValue)
	{
		$this->bolAllowEmpty = $bolValue;
	}
	
	
	/**
	 * Get the timestamp from a dateformat
	 * @param string
	 * @return string
	 */
	protected function getUnix($strValue)
	{
		$objDate = null;
		if(\Contao\Validator::isDate($strValue))
		{
			$objDate = new Date($strValue,Date::getNumericDateFormat($strValue));
		}
		else if(\Contao\Validator::isDatim($strValue))
		{
			$objDate = new Date($strValue,Date::getNumericDatimFormat($strValue));
		}
		else if(\Contao\Validator::isTime($strValue))
		{
			$objDate = new Date($strValue,Date::getNumericTimeFormat($strValue));
		}
		else if(strlen($strValue) > 0)
		{
			$objDate = new Date($strValue);
		}
		
		if(!$objDate)
		{
			return '';
		}
		
		return $objDate->__get('tstamp');
	}
}