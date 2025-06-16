<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Imports
 */
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * Hooks
 * Collect all callback function for the CustomCatalog Plugin
 */
class Hooks extends \PCT\CustomElements\Core\Hooks
{
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 */
	public static function getInstance()
	{
		return new static();
	}
	
	
	/**
	 * Call function
	 * @param string Name of function
	 * @param array
	 */
	public function call($strMethod, $arrArguments)
	{
		if (method_exists($this, $strMethod))
		{
			return call_user_func_array(array($this, $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: PCT\CustomElements\Core\Hook::' . $strMethod);
	}


	/**
	 * Call function statically
	 * @param string
	 * @param array
	 */
	public static function callstatic($strMethod, $arrArguments)
	{
		if (method_exists(static::getInstance(), $strMethod))
		{
			return call_user_func_array(array(static::getInstance(), $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: PCT\CustomElements\Core\Hook::' . $strMethod);
	}
	
	
	/**
	 * Call the getQueryOption HOOK
	 * Triggered any time a filter builds an sql options array
	 * @param array
	 * @param object	Filter object
	 * @return array
	 * Triggered in: PCT\CustomElements\Plugins\CustomCatalog\Core\Filter
	 */
	protected function getQueryOptionHook($arrOption,$objCaller)
	{
		// HOOK allow extensions to manipulate the query array
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['getQueryOption']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['getQueryOption']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['getQueryOption'] as $callback)
			{
				$arrOption = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrOption,$objCaller);
			}
		}

		return isset($arrOption) ? $arrOption : array();
	}
		
	
	/**
	 * Pass the current data container array right before it is applied
	 * @param array
	 * @param object
	 * @param object
	 * @param object
	 * @return array
	 * Triggered in: PCT\CustomElements\Plugins\CustomCatalog\Helper\SystemHelper
	 */
	protected function prepareDataContainerHook($arrDCA,$objCC,$objCE,$objCaller)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDataContainer']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDataContainer']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDataContainer'] as $callback)
			{
				$arrDCA = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrDCA,$objCC,$objCE,$objCaller);
			}
		}
		
		return isset($arrDCA) ? $arrDCA : array();;
	}
	
	
	/**
	 * Buttons callback
	 * @param string
	 * @param object
	 * @param object
	 * @param object
	 * @return array
	 * Triggered in: PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper
	 */
	protected function getCustomButtonHook($strKey,$objCC,$objCE,$objSystemHelper)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['getCustomButton']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['getCustomButton']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['getCustomButton'] as $callback)
			{
				$arrReturn = ControllerHelper::importStatic($callback[0])->{$callback[1]}($strKey,$objCC,$objCE,$objSystemHelper);
			}
		}
		
		return isset($arrReturn) ? $arrReturn : array();
	}
	
	
	/**
	 * Call the renderFilter HOOK
	 * Triggered before a filter is rendered to the the frontend
	 * @param string		The name of the filter. Usually it's the alias of the attribute
	 * @param array			Current filter value
	 * @param object		The template
	 * @param object		The current filter instance
	 * @return string		Html string of the widget for rendering to the frontend
	 */
	protected function renderFilterHook($strName,$varValue,$objTemplate,$objFilter)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['renderFilter']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['renderFilter']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['renderFilter'] as $callback)
			{
				$strBuffer = ControllerHelper::importStatic($callback[0])->{$callback[1]}($strName,$varValue,$objTemplate,$objFilter);
			}
		}
		
		return isset($strBuffer) ? $strBuffer : '';
	}


	/**
	 * Get filter hook
	 * Triggered after preparing the filter list and before the filters will be processed
	 * @param array
	 * @param object	CustomCatalog
	 */
	protected function getFiltersHook($arrFilters,$objCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['getFilters']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['getFilters']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['getFilters'] as $callback)
			{
				$arrFilters = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrFilters,$objCC);
			}
		}
		return isset($arrFilters) ? $arrFilters : array();
	}
	
	
	/**
	 * Call the getEntries HOOK
	 * Triggered after building the entries array for the output and expects
	 * @param object		The current custom catalog instance
	 * @param object		The template object
	 * @return string		Html string of the widget for rendering to the frontend
	 */
	protected function getEntriesHook($arrEntries,$objCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['getEntries']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['getEntries']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['getEntries'] as $callback)
			{
				$arrEntries = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrEntries,$objCC);
			}
		}
		
		return isset($arrEntries) ? $arrEntries : array();
	}

	
	/**
	 * Call the renderCatalog HOOK
	 * Triggered before a customcatalog is rendered to the the frontend
	 * @param object		The current custom catalog instance
	 * @param object		The template object
	 * @return string		Html string of the widget for rendering to the frontend
	 */
	protected function renderCatalogHook($objCC,$objTemplate)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['renderCatalog']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['renderCatalog']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['renderCatalog'] as $callback)
			{
				$strBuffer = ControllerHelper::importStatic($callback[0])->{$callback[1]}($objCC,$objTemplate);
			}
		}
		
		return isset($strBuffer) ? $strBuffer : '';
	}
	
	
	/**
	 * Call the prepareCatalog HOOK
	 * Triggered after preparing the sql options array. Expects an sql options array as return
	 * @param array			The current sql options array
	 * @param object		The current custom catalog instance
	 * @return array		
	 */
	protected function prepareCatalogHook($arrOptions,$objCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareCatalog']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareCatalog']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareCatalog'] as $callback)
			{
				$arrOptions = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrOptions,$objCC);
			}
		}
		
		return $arrOptions;
	}

//!filters	
	
	/**
	 * Call the processFilter HOOK
	 * Triggered right before applying a filter and processings its sql options. This is the last opportunity to modify the filer before applying
	 * @param array			The current sql options array
	 * @param object		The current custom catalog instance
	 * @return array		
	 */
	protected function processFilterHook($objFilter,$objCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['processFilter']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['processFilter']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['processFilter'] as $callback)
			{
				$objFilter = ControllerHelper::importStatic($callback[0])->{$callback[1]}($objFilter,$objCC);
			}
		}
		
		return isset($objFilter) ? $objFilter : null;
	}
	
	
	/**
	 * Call the customOrder HOOK
	 * Triggered in the sorting filter before passing the order sql option to CCs getQueryOptions method
	 * @param string		The field name
	 * @param string		The sorting direction [asc] [desc]
	 * @param object		The filter object
	 * @return string		The SQL conform order string e.g. "field1 ASC, field2 DESC"		
	 */
	protected function customOrderHook($strField,$strSorting,$objFilter)
	{
		$strReturn = '';
		
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['customOrder']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['customOrder']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['customOrder'] as $callback)
			{
				$strReturn .= ControllerHelper::importStatic($callback[0])->{$callback[1]}($strField,$strSorting,$objFilter);
			}
		}
		
		return $strReturn;
	}
	
	
	/**
	 * Call the generalOnload HOOK
	 * Triggered by the DCA config onload callback for each custom catalog
	 * @param array			The current datacontainer object
	 * @param object		The current active record object
	 * @param object		The current custom catalog database result
	 * @return array		
	 */
	protected function loadDataContainerHook($objDC,$objActiveRecord,$objDbCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'] as $callback)
			{
				ControllerHelper::importStatic($callback[0])->{$callback[1]}($objDC,$objActiveRecord,$objDbCC);
			}
		}
	}
	
	
	/**
	 * Call the general datacontainer action HOOK
	 * Triggered by the DCA config onload callback for each custom catalog
	 * @param array			The current datacontainer object
	 * @param object		The current active record object
	 * @param object		The current custom catalog database result
	 * @return array		
	 */
	protected function generalDataContainerHook($strAction,$objDC,$objActiveRecord,$objDbCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['generalDataContainer']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['generalDataContainer']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['generalDataContainer'] as $callback)
			{
				ControllerHelper::importStatic($callback[0])->{$callback[1]}($strAction,$objDC,$objActiveRecord,$objDbCC);
			}
		}
	}
	
	
	/**
	 * Call the prepareField HOOK
	 * Triggered before a field (fielddefinition) is being processed and added to the palettes.
	 * Return an empty array or null to skip the field
	 * @param array			An array with information about the field processed
	 * @param string		The field name
	 * @param object		The attribute object
	 * @param object		The current custom catalog object
	 * @param object		The current custom element object
	 * @param object		The class object calling (SystemIntegration)
	 * @return array|null	Return empty array or null to skip the field				
	 */
	protected function prepareFieldHook($arrData,$fieldName,$objAttribute,$objCC=null,$objCE=null,$objCaller=null)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField'] as $callback)
			{
				$arrData = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrData,$fieldName,$objAttribute,$objCC,$objCE,$objCaller);
			}
		}
		return isset($arrData) ? $arrData : array();
	}
	
	
	/**
	 * Call the getOptionFieldDefinition HOOK
	 * Triggered when a generic option field is set and should be added to the DCA.
	 * Return should be the field definition for an option field
	 * @param array			An array with information about the field processed
	 * @param string		The field name
	 * @param string		The option name
	 * @param object		The attribute object
	 * @param object		The current custom catalog object
	 * @param object		The current custom element object
	 * @param object		The class object calling (SystemIntegration)
	 * @return array|null	Return empty array or null to skip the field				
	 */
	protected function getOptionFieldDefinitionHook($arrData,$fieldName,$strOption,$objAttribute,$objCC=null,$objCE=null,$objCaller=null)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['getOptionFieldDefinition']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['getOptionFieldDefinition']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['getOptionFieldDefinition'] as $callback)
			{
				$arrData = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrData,$fieldName,$strOption,$objAttribute,$objCC,$objCE,$objCaller);
			}
		}
		return isset($arrData) ? $arrData : array();
	}
	
	
	/**
	 * Call the prepareDetailsLink HOOK
	 * Triggered when the read more links are generated for each entry
	 * @param array			The default links list as array
	 * @param object		The current database result for the entry
	 * @param object		The current custom element object
	 * @return array						
	 */
	protected function prepareDetailsLinksHook($arrLinks,$objRow,$objCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDetailsLinks']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDetailsLinks']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDetailsLinks'] as $callback)
			{
				$arrLinks = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrLinks,$objRow,$objCC);
			}
		}
		return isset($arrLinks) ? $arrLinks : array();
	}
	
	
	/**
	 * Call the generateDetailsUrl HOOK
	 * Triggered when the read more links are generated for each entry
	 * @param object		The current database result for the entry
	 * @param object		The jump to page object
	 * @param object		The current CustomCatalog object
	 * @return string		The front end url						
	 */
	protected function generateDetailsUrlHook($objRow,$objJumpTo,$objCC)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['generateDetailsUrl']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['generateDetailsUrl']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['generateDetailsUrl'] as $callback)
			{
				$strReturn = ControllerHelper::importStatic($callback[0])->{$callback[1]}($objRow,$objJumpTo,$objCC);
			}
		}
		return isset($strReturn) ? $strReturn : '';
	}
	
// !multilanguage
	
	/**
	 * Call the createLanguageEntry HOOK
	 * Triggered when a language entry is being created
	 * @param array			Info object {newId,currId,language,isBaseRecord}
	 * @param object		The current data container object
	 * @param object		The current custom catalog object
	 */
	protected function newLanguageEntryHook($objInfo,$objDC=null,$objCC=null)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['newLanguageEntry']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['newLanguageEntry']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['newLanguageEntry'] as $callback)
			{
				ControllerHelper::importStatic($callback[0])->{$callback[1]}($objInfo,$objDC,$objCC);
			}
		}
	}

// !maintenance
	
	/**
	 * Call the getSearchablePages HOOK
	 * Triggered in Contaos getSearchablePages Routine when creating CC related urls
	 * @param array			The CC related Urls
	 * @param object		The CC object
	 * @param array			The other pages in the site index
	 * @param integer		The root page ID
	 * @param boolean		Whether urls are being processed for a sitemap or for the search index
	 * @return array		The array containing urls
	 */
	protected function getSearchablePagesHook($arrUrls,$objCC,$arrPages,$intRoot,$blnIsSitemap)
	{
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['getSearchablePages']) && !empty($GLOBALS['CUSTOMCATALOG_HOOKS']['getSearchablePages']))
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['getSearchablePages'] as $callback)
			{
				$arrUrls = ControllerHelper::importStatic($callback[0])->{$callback[1]}($arrUrls,$objCC,$arrPages,$intRoot,$blnIsSitemap);
			}
		}
		return isset($arrUrls) ? $arrUrls : array();
	}
}