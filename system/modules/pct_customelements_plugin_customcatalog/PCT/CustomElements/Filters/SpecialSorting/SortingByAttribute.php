<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage pct_customelements_plugin_customcatalog
 * @filter  Sorting
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * SortingByAttribute
 */
class SortingByAttribute extends \PCT\CustomElements\Filters\Sorting
{
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 *
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */
	public function getQueryOptionCallback()
	{
		$varValue = array_filter($this->getValue()) ?: array();
		if(is_array($varValue))
		{
			$varValue = implode('', $varValue);
		}

		if(empty($varValue))
		{
			return array();
		}
		
		// find related attribte
		// @var object
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById( $this->get('attr_id') );
		if($objAttribute === null)
		{
			return array();
		}
		
		// check if related filter is active
		$blnPreg = preg_match("/(.*)\[(.*)\]/", $varValue, $arrMatch);
		if( !$blnPreg || $arrMatch[1] != $objAttribute->get('alias') )
		{
			return array();
		}
		
		// get the custom catalog object
		// @var object
		$objCC = $this->getCustomCatalog();
		
		$arrReturn = array();
		switch($objAttribute->get('type'))
		{
			// order by tags
			case 'tags':
				// descending
				if($arrMatch[2] == 'desc')
				{
					$objCC->set('list_flag', 2);
				}
				
				// simulate backend sorting
				$objDC = new \StdClass;
				$objAttribute->setOrigin($objCC);
				$objAttribute->set('objCustomCatalog',$objCC);
				$arrReturn['order'] = $objAttribute->getBackendSortingOptions($objAttribute->getFieldDefinition(),$objAttribute->get('alias'),$objAttribute,$objDC);
				break;
			// oder by selectdb
			case 'selectdb':
				$objDC = new \StdClass;
				$objDC->field = $objAttribute->get('alias');
				$objDC->table = $objCC->getTable();
				// find all values
				$arrValues = $objAttribute->getOptions($objDC);
				
				// descending
				if($arrMatch[2] == 'desc')
				{
					arsort($arrValues,SORT_NATURAL);
				}
				else
				{
					asort($arrValues,SORT_NATURAL);
				}
				
				$arrReturn['order'] = array('FIELD('.$objAttribute->get('alias').','.implode(',', array_keys($arrValues)).')');
				break;
		}

		// hook for custom sortings per attribute/field
		$strCustomOrder = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('customOrderHook',array($arrMatch[1],$arrMatch[2],$this));
		if(!empty($strCustomOrder))
		{
			$arrReturn['order'] = array($strCustomOrder);
		}
		
		return $arrReturn;
	}


	/**
	 * Prepare the options for the widget
	 * @return array
	 */
	protected function getSelectOptions()
	{
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById( $this->get('attr_id') );
		if($objAttribute === null)
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

		$name = $this->get('urlparam') ? $this->get('urlparam') : $objAttribute->get('alias');

		$arrReturn = array();
		$arrReturn[$name.'[asc]'] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['asc'],$objAttribute->get('title') ?: $objAttribute->id);
		$arrReturn[$name.'[desc]'] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['desc'],$objAttribute->get('title') ?: $objAttribute->id);

		return $arrReturn;
	}
}
