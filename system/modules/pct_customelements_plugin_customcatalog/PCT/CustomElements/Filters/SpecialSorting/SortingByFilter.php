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

use Contao\StringUtil;

/**
 * Class file
 * SortingByFilter
 */
class SortingByFilter extends \PCT\CustomElements\Filters\Sorting
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

		// find related filter
		$objFilter = \PCT\CustomElements\Core\FilterFactory::findById( StringUtil::deserialize($this->get('conditional_filters')) );
		if($objFilter === null)
		{
			return array();
		}
		
		// check if related filter is active
		$blnPreg = preg_match("/(.*)\[(.*)\]/", $varValue, $arrMatch);
		if( !$blnPreg || $arrMatch[1] != $objFilter->getName() )
		{
			return array();
		}
		
		$arrReturn = array();
		switch($objFilter->get('type'))
		{
			// order by geographical distance
			case 'geolocation':
				// process the filter
				$arrOptions = $objFilter->getQueryOptionCallback();
				
				if(!empty($arrOptions) && $arrOptions['column'] == 'id')
				{
					$ids = $arrOptions['value'];
					if($arrMatch[2] == 'desc')
					{
						$arrIds = array_reverse($ids);
					}
					// order by id field
					$arrReturn['order'] = array('FIELD(id,'.implode(',', $ids).')');
					
					unset($ids);
				}
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
		$objFilter = \PCT\CustomElements\Core\FilterFactory::findById( StringUtil::deserialize($this->get('conditional_filters')) );
		if($objFilter === null)
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

		$name = $objFilter->get('urlparam') ? $objFilter->get('urlparam') : \Contao\StringUtil::standardize($objFilter->get('title'));

		$arrReturn = array();
		$arrReturn[$name.'[asc]'] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['asc'],$objFilter->get('title') ?: $objFilter->id);
		$arrReturn[$name.'[desc]'] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['MSC'][$this->get('type')]['desc'], $objFilter->get('title') ?: $objFilter->id);

		return $arrReturn;
	}
}
