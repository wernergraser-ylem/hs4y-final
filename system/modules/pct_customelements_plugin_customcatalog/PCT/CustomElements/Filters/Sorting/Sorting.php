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
 * @filter		Sorting
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;

/**
 * Class file
 * Sorting
 */
class Sorting extends \PCT\CustomElements\Filter
{
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// set the filter name
		$strName = $this->get('urlparam') ? $this->get('urlparam') : $GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter'].'_'.$this->get('id');
		
		$this->setName($strName);
		
		// load the language files
		\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile('default',$this->get('type'));
		
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
		$arrValues = array_filter($this->getValue()) ?: array();
		
		if(empty($arrValues))
		{
			return array();
		}
		
		$options = array();
		foreach($arrValues as $k)
		{
			$sorting = 'asc';
			$field = $k;
			
			$blnPreg = preg_match("/(.*)\[(.*)\]/", $k, $arrMatch);
			if($blnPreg)
			{
				$field = $arrMatch[1];
				$sorting = $arrMatch[2];
			}
				
			// mysql has no natural order for numeric values, so we multiply 
			if($this->get('type') == 'sorting_numeric')
			{
				$field .= "+0"; 
			}
			
			$options['order'] = array($field,$sorting);
			
			// hook for custom sortings per attribute/field
			$strCustomOrder = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('customOrderHook',array($arrMatch[1],$sorting,$this));
			if(!empty($strCustomOrder))
			{
				$options['order'] = array($strCustomOrder);
			}
		}
		
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
		$values = $this->getSelectOptions();

		$options = array();
		$isSelected = false;
		
		// build options array
		if(!empty($values) && is_array($values))
		{
			foreach($values as $i => $v)
			{
				$tmp = array
				(
					'id'		=> $strName.'_'.$i,
					'value'		=> $i,
					'label'		=> $v,
					'selected'	=> '',
				);
				if($this->isSelected($i))
				{
					$tmp['selected'] = $this->get('isRadio') ? 'checked' : 'selected';
					$isSelected = true;
				}
				$options[] = $tmp;
			}
		}
		
		// insert blank option for resetting the filter
		if($this->get('includeReset'))
		{
			$label = !$isSelected ? '-' : $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['sorting_reset'];
			$blank = array('value'=>$strName.'_reset','label'=>$label,'selected'=>'');
			\Contao\ArrayUtil::arrayInsert($options,0,array($blank));
		}
		
		$objTemplate->options = $options;
		$objTemplate->name = $strName;
		$objTemplate->radio = $this->get('isRadio');
		$objTemplate->label = $this->get('label');
		
		return $objTemplate->parse();
	}

	
	/**
	 * Prepare the options for the widget
	 * @return array
	 */
	protected function getSelectOptions()
	{
		$arrIds = StringUtil::deserialize($this->get('attr_ids'));
		
		if(empty($arrIds) || !is_array($arrIds))
		{
			return array();
		}
		
		$arrOption = array
		(
			'order' => "field(id,".implode(',',$arrIds).")",
		);
		
		$objAttributes = \PCT\CustomElements\Core\AttributeFactory::fetchMultipleById($arrIds,$arrOption);
		if(!$objAttributes)
		{
			return array();
		}
		
		if(strlen($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['asc']) < 1)
		{
			$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['asc'] = '%s';
		}
		if(strlen($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['desc']) < 1)
		{
			$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['desc'] = '%s';
		}
		
		$arrReturn = array();
		while($objAttributes->next())
		{
			$arrReturn[$objAttributes->alias.'[asc]'] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['asc'], $objAttributes->title ?: $objAttributes->alias);
			$arrReturn[$objAttributes->alias.'[desc]'] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['desc'], $objAttributes->title ?: $objAttributes->alias);
		}
		
		return $arrReturn;
	}
}