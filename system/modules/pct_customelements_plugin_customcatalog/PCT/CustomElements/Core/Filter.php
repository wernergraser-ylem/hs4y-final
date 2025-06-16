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
namespace PCT\CustomElements\Core;

/**
 * Imports
 */

use Contao\StringUtil;
use \PCT\CustomElements\Core\FilterFactory as FilterFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * Filter
 */
abstract class Filter extends \PCT\CustomElements\Filters\Controller
{
	/**
	 * Values array
	 * @var array
	 */
	protected $arrValue = array();
	
	/**
	 * Name of the filter
	 * @var string
	 */
	protected $strName = '';
	
	/**
	 * Name of the field to filter
	 * @var string
	 */
	protected $strField = '';
	
	/**
	 * Strict mode flag
	 * @var boolean
	 */
	protected $bolIsStrict = true;
	
	/**
	 * Do not render flag
	 * @var boolean
	 */
	protected $blnDoNotRender = false;
	
	/**
	 * Modified array
	 * @var array
	 */
	// !$arrModified
	protected $arrModified = array();
	
	/**
	 * Translated labels array
	 * @var array
	 */
	// !$arrTranslations
	protected $arrTranslations = array();
	
	/**
	 * Result count array
	 * @var array
	 */
	// !$arrResultCounts
	protected $arrResultCounts = array();
	
	/**
	 * Create a new filter instance
	 * @param array
	 */
	public function __construct($arrData=array())
	{
		if(!empty($arrData))
		{
			$this->setData($arrData);
		}
	}
	
	
	/**
	 * Generate the filter
	 * @param object
	 */
	public function generate($arrData=array())
	{
		if(count($this->getData()) < 1)
		{
			return null;
		}
		
		// get the class for this filter
		$strClass = FilterFactory::getClassByType($this->get('type'));
		if(!$strClass)
		{
			return null;
		}
		
		if(!class_exists($strClass))
		{
			throw new \Exception('Cannot load class or class not found: '.$strClass);
		}
		
		// create a new generic filter object
		$objFilter = new $strClass($this->getData());
		
		return $objFilter;
	}
	
	
	/**
	 * Apply the filter
	 * @return array	Return the sql options array
	 */
	public function apply()
	{
		if(method_exists($this,'prepareFilter'))
		{
			$options = $this->prepareFilter()->getOptions();
			return $this->getQueryOption($options);
		}
		
		return $this->getQueryOption($this->getOptions());
	}	
	
	
	/**
	 * Generate the query options array and return it as array
	 * @param object
	 * @param array
	 * @return array
	 */
	public function getQueryOption($arrOption)
	{
		// call the individual getQueryOption method for the current filter
		if(method_exists($this,'getQueryOptionCallback'))
		{
			$arrOption = $this->getQueryOptionCallback($arrOption);
		}
		
		// HOOK allow extensions to manipulate the query array
		$arrOption = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('getQueryOptionHook',array($arrOption,$this));
		
		return $arrOption;
	}
	
	
	/**
	 * Set the filter value
	 * @param array
	 */
	public function setValue($varValue)
	{
		$varValue = \Contao\StringUtil::deserialize($varValue);
		if(!is_array($varValue))
		{
			$varValue = array($varValue);
		}
		
		// mark as modified
		$this->setModified('arrValue');
		
		$this->set('arrValue',$varValue);
	}
	
	
	/**
	 * Return the current value or values as array
	 * @param boolean	Processes the values like deserializing the values and imploding arrays to comma lists
	 * @return array
	 */
	public function getValue($strFilterName='',$bolUrlFriendly=false)
	{
		if(strlen($strFilterName) < 1)
		{
			$strFilterName = $this->getName();
		}
		
		// call the individual getValue method for the current filter
		if(method_exists($this,'getValueCallback'))
		{
			return $this->getValueCallback();
		}
		
		// return if the filter values have been modified from outside
		if($this->isModified('arrValue'))
		{
			return $this->get('arrValue');
		}
		
		$values = $this->get('arrValue');
		// get active filter values from GET
		$fromGET = $this->getValueFromGET($strFilterName);
		// get active filter values form POST
		$fromPOST = $this->getValueFromPOST($strFilterName);
		// get active filter values from SESSION
		$fromSession =  $this->getValueFromSession($strFilterName);
		
		// get active filter values from Url
		#$fromUrl =  $this->getValueFromUrl($strFilterName);
		
		$values = array_unique( array_merge($values,$fromGET,$fromPOST,$fromSession) );
		
		$objModule = $this->getModule();
		
		// prepare the value set for the filter
		if($bolUrlFriendly || ($objModule !== null && isset($objModule->customcatalog_filter_method) && $objModule->customcatalog_filter_method == 'post') )
		{
			$values = $this->prepareValues($values);
		}
		
		// filter empty values
		$values = array_filter($values,'strlen');
		
		return $values;
	}
	
	
	/**
	 * Collect active filter values from Input values
	 * @param string
	 * @return array
	 */
	protected function getValueFromInput($strFilterName='',$strMethode='get')
	{
		$varValue = array();
		
		if(strlen($strFilterName) < 1)
		{
			$strFilterName = $this->getName();
		}
		
		if($strMethode == 'post')
		{
			$varValue = \Contao\Input::post($strFilterName);
		}
		// values from GET params
		else
		{
			$varValue = \Contao\Input::get($strFilterName);
		}
		
		// return value is expected to be an array
		if(!is_array($varValue)) 
		{
			$varValue = explode(',', $varValue);
		}
		
		if(!$varValue)
		{
			return array();
		}
				
		return $varValue;
	}
	
	
	/**
	 * Collect active filter values from the current fe user session
	 * @return array
	 */
	public function getValueFromSession($strFilterName='',$intCC=0)
	{
		if($intCC < 1)
		{
			$objCC = $this->getCustomCatalog();
			if(!$objCC) 
			{
				return array();
			}
			$intCC = $objCC->get('id');
		}
		
		$arrSession = \Contao\System::getContainer()->get('request_stack')->getSession()->get($GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName']);
		
		if(!isset($arrSession) || !isset($arrSession[$intCC]) || !is_array($arrSession) || !isset($arrSession[$intCC]['FILTERS']) || !is_array($arrSession[$intCC]['FILTERS']) || count($arrSession[$intCC]['FILTERS']) < 1)
		{
			return array();
		}
		
		$varValue = array();
		if(strlen($strFilterName) > 0)
		{
			$varValue = $arrSession[$intCC]['FILTERS'][$strFilterName]; 		
		}
		else
		{
			$varValue = $arrSession[$intCC]['FILTERS'][$this->getName()];
		}
		
		// return value is expected to be an array
		if(!is_array($varValue)) 
		{
			return array($varValue);
		}
		
		return $varValue;
	}
	
	
	/**
	 * Shortcut to getValuesFromInput('get')
	 */
	public function getValueFromGET($strFilterName='')
	{
		return $this->getValueFromInput($strFilterName,'get');
	}
	
	
	/**
	 * Shortcut to getValuesFromInput('post')
	 */
	public function getValueFromPOST($strFilterName='')
	{
		return $this->getValueFromInput($strFilterName,'post');
	}
	
	
	/**
	 * Get the filter values from the current url or from an url string
	 * @param string
	 * @param string	The url to search in
	 * @return array
	 */
	public function getValueFromUrl($strFilterName='',$strRequest='')
	{
		global $objPage;
		
		if(strlen($strRequest) < 1)
		{
			$strRequest = \Contao\Environment::get('requestUri');
		}
		
		// strip the string
		$strRequest = str_replace(array(\Contao\Environment::get('scriptName'),'.html',$objPage->alias), '', $strRequest);
		
		$arrUrl = parse_url($strRequest);
		// if there is no GET parameter
		$blnSearchGET = false;
		if(isset($arrUrl['query']) || strlen(strpos($strRequest,'?')) > 0)
		{
			$blnSearchGET = true;
		}
		
		$arrUrlChunks = array();
		
		if($blnSearchGET)
		{
			$strRequest = str_replace(array('?','&(amp;)'), '', $strRequest);
			foreach( preg_split('/&(amp;)?/', \Contao\Environment::get('queryString'), -1, PREG_SPLIT_NO_EMPTY) as $fragment)
			{
				$strRequest = str_replace($fragment, '', $strRequest);
				$arrUrlChunks[] = $fragment;
			}
			
			#$arrUrlChunks = array_merge($arrUrlChunks,explode('&',$arrUrl['query']));
		}
		
		$arrUrlChunks = array_merge($arrUrlChunks, array_filter(explode('/', $strRequest),'strlen') );
		if(count($arrUrlChunks) < 1)
		{
			return array();
		}
		
		// return if the filter is not event in the url
		if(!in_array($strFilterName, $arrUrlChunks))
		{
			return array();
		}
		
		$index = array_search($strFilterName, $arrUrlChunks) + 1;
		
		// decode the values
		$arrReturn = array_map('urldecode',explode(',',$arrUrlChunks[$index]));
		
		return $arrReturn;
	}
	
	/**
	 * Add a filter value to the session
	 * @param array
	 * @param integer	(optional) Id of the custom catalog to set the filter for
	 */
	public function addValueToSession($arrValue,$intCC=0)
	{
		if(!is_array($arrValue))
		{
			$arrValue = array($arrValue);
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		if($intCC < 1)
		{
			$objCC = null;
			if(strlen($this->getTable()) > 0 && !$this->getCustomCatalog())
			{
				$objCC = $this->getCustomCatalog($this->getTable());
			}
			else
			{
				$objCC = $this->getCustomCatalog();
			}
			
			if(!$objCC) 
			{
				return array();
			}
			$intCC = $objCC->get('id');
		}
		
		$arrSession = $objSession->get($GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName']);
		
		if(!is_array($arrSession) || !isset($arrSession))
		{
			$arrSession = array();
		}
		// check if a session for this catalog already exists
		else if(!is_array($arrSession[$intCC]))
		{
			$arrSession[$intCC]['FILTERS'] = array();
		}
		
		$arrSession[$intCC]['FILTERS'][$this->getName()] = $arrValue;
		
		$objSession->set($GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName'],$arrSession);
	}
	
	
	/**
	 * Return the filter name. By default it is the alias of the attribute
	 * @return string
	 */
	public function getName()
	{
		if(strlen($this->strName) > 0)
		{
			return $this->strName;
		}
		
		if(strlen($this->get('urlparam')) > 0)
		{
			return $this->get('urlparam');
		}
		
		return '';
	}
	
	
	/**
	 * Set the filter name
	 * @param string
	 */
	public function setName($strValue)
	{
		$this->strName = $strValue;
	}
	
	
	/**
	 * More convenience method name for the protected setName method.
	 * @param string
	 */
	public function setFilterTarget($strValue)
	{
		$this->strField = $strValue;
	}
	
	
	/**
	 * Return the filter field
	 * @return string
	 */
	public function getFilterTarget()
	{
		if(strlen($this->strField) > 0)
		{
			return $this->strField;
		}
		
		if($this->objAttribute != null)
		{
			return $this->objAttribute->alias ? $this->objAttribute->alias : $this->objAttribute->get('alias');
		}
		
		return '';
	}
	
	
	/**
	 * Fetch possible values for the filter
	 * @param string	Table to work on
	 * @param string	Field/Column
	 * @param array		Exceptions
	 * @return array
	 */
	public function fetchValues($strTable,$strField,$arrExceptions=array())
	{
		if($this->isModified('fetchValues'))
		{
			return $this->get('fetchValues');
		}
		
		$options = array
		(
			'table'		=> $strTable,
			'column'	=> $strField,
			'fields'	=> array($strField)
		);
		$objResult = static::fetch($options);
		
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$values = array_map('\Contao\StringUtil::deserialize', $objResult->fetchEach($strField) );
		
		// flat the array
		$tmp = array();
		foreach($values as $v)
		{
			if(!is_array($v)) {$v = array($v);}
			$tmp = array_merge($v ,$tmp);
		}
		$values = array_filter( array_unique($tmp) );
		unset($tmp);
		
		// mark as modified and cached
		$this->set('fetchValues',$values);
		$this->markAsModified('fetchValues');
		
		return $values;
	}
	
	
	/**
	 * Prepare the value set for the filter
	 * Deserialize all values, implode array values to comma seperated strings, flat the array
	 * @param array
	 * @return array
	 */
	protected function prepareValues($arrValues,$bolUnique=true)
	{
		if(count($arrValues) < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($arrValues as $v)
		{
			$v = \Contao\StringUtil::deserialize($v);
			if(is_array($v))
			{
				$v = implode(',', $v);
			}
			$arrReturn[] = $v;
		}
		
		if($bolUnique)
		{
			$arrReturn = array_unique($arrReturn);
		}
	
		return $arrReturn;
	}
	
	
	/**
	 * Return true or false if the filter is supposed to allow empty values
	 * @return boolean
	 */
	protected function filterShowAll()
	{
		$objCC = $this->getCustomCatalog();
		if(!$objCC)
		{
			return false;
		}
		
		$objModule = $this->getCustomCatalog()->getOrigin();
		
		return $objModule->customcatalog_filter_showAll ? true : false;
	}
	
	
	/**
	 * Return true if the filter is selected
	 * @return boolean
	 */
	public function isSelected($strValue)
	{
		$name = $this->getName();
		
		// single value filters
		if(!$this->get('multiple') && (\Contao\Input::get($name) == $strValue || \Contao\Input::post($name) == $strValue) )
		{
			return true;
		}
		
		// check single value filters in session
		$arrSession = \Contao\System::getContainer()->get('request_stack')->getSession()->get($GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName']);
		if(!$this->get('multiple') && isset($arrSession['FILTERS']) && ($arrSession['FILTERS'][$name][1] == $strValue || $arrSession['FILTERS'][$name]['value']  == $strValue) )
		{
			return true;
		}
		
		// multiple value files
		if($this->get('multiple'))
		{
			$varValue = $this->getValue();
			
			if(!is_array($varValue))
			{
				$varValue = str_replace('%2C',',',$varValue);
				$varValue = explode(',', $varValue);
			}
			
			// check GET
			if(is_array($varValue))
			{
				if( in_array($strValue, $varValue) ) 
				{
					return true;
				}
			}
			else
			{
				if(\Contao\Input::get($name) == $strValue)
				{
					return true;
				}
			}
			
			// check POST
			if(is_array($varValue))
			{
				if( in_array($strValue, $varValue) ) 
				{
					return true;
				}
			}
			else
			{
				if(\Contao\Input::post($name) == $strValue)
				{
					return true;
				}
			}
			
			// check url
			$arrValuesFromUrl = $this->getValueFromUrl($name);
			if(in_array($strValue, $arrValuesFromUrl))
			{
				return true;
			}
			
			// check session
			if( isset($arrSession['FILTERS'][$name][1]) && is_array($arrSession['FILTERS'][$name][1]))
			{
				if(in_array($strValue, $arrSession['FILTERS'][$name][1]))
				{
					return true;
				}
			}
		}
		
		return false;
	}

	
	/**
	 * Render a filter widget and return html
	 * @return string
	 */
	public function render()
	{
		global $objPage;
		
		$objTemplate = new \PCT\CustomElements\Plugins\CustomCatalog\Core\FrontendTemplate($this->get('template'));
		$objTemplate->setData($this->getData());
		$objTemplate->raw = $this;
		
		if($this->getCustomCatalog() == null && strlen($this->getTable()) > 0)
		{
			$this->setCustomCatalog( $this->getTable() );
		}
		
		$objModule = $this->getCustomCatalog()->getOrigin();
		$objTemplate->module = $objModule;
		$objTemplate->options = array();
		
		// jumpTo
		$objJumpTo = $objPage;
		if($objModule->customcatalog_jumpTo > 0 && $objModule->customcatalog_jumpTo != $objPage->id)
		{
			$objJumpTo = \Contao\PageModel::findByPk($objModule->customcatalog_jumpTo);
		}
		$objTemplate->jumpTo = $this->jumpTo = $objJumpTo;
		
		
		$varValue = $this->getValue();
		$strName = $this->getName();
		
		// raw values
		$objTemplate->raw = $this;
		
		$arrCssID = \Contao\StringUtil::deserialize($this->get('cssID'));
		$objTemplate->cssID = '';
		if( isset($arrCssID[0]) && strlen(trim($arrCssID[0])) > 0)
		{
			$objTemplate->cssID = 'id="'.trim($arrCssID[0]).'"';
		}
		$arrClass = array('filter','filter_'.$this->get('type'),$strName);
		if( isset($arrCssID[1]) && strlen($arrCssID[1]) > 0)
		{
			$arrClass = array_unique(array_merge($arrClass,explode(' ',$arrCssID[1])));
		}
		$objTemplate->class = implode(' ', $arrClass);
		
		// check if the filter itself calls its render function
		if (method_exists($this, 'renderCallback'))
		{
			$strBuffer = $this->renderCallback($strName,$varValue,$objTemplate,$this);
		}
		else
		{
			$strBuffer = $objTemplate->parse();
		}
		
		// trigger HOOK: allow manipulations on the output
		$strBufferFromHook = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('renderFilterHook',array($strName,$varValue,$objTemplate,$this));
		if(strlen($strBufferFromHook) > 0)
		{
			$strBuffer = $strBufferFromHook;
		}
		
		return $strBuffer;
	}


	/**
	 * Filter blob attributes
	 * @param array
	 * @param object
	 * @return array
	 * called from getQueryOptions HOOK
	 */
	public function handleBlobValues($arrOption, $objFilter)
	{
		$objAttribute = AttributeFactory::findById($objFilter->get('attr_id'));
		
		if(empty($objAttribute))
		{
			return $arrOption;
		}
		
		// make sure we work on blobs only and the filter does not provide its own filtering
		if($objAttribute->get('saveDataAs') != 'blob' || method_exists($objFilter,'getQueryOption') || method_exists($objFilter,'prepareFilter'))
		{
			return $arrOption;
		}
		
		if(empty($arrOption['value']))
		{
			return $arrOption;
		}
		
		$values = array();
		foreach($arrOption['value'] as $v)
		{
			$tmp = explode(',', $v);
			$values = array_merge($tmp,$values);
		}
		
		$values = array_unique($values);
		
		$field = $objFilter->getName();
				
		// fetch blob entries
		$objBlobs = \Contao\Database::getInstance()->execute("
			SELECT id,".$field." 
			FROM ".$objFilter->getTable()." 
			WHERE ".$field." IS NOT NULL");

		if($objBlobs->numRows < 1)
		{
		   return $arrOption;
		}
		
		// walk through the result and collect matching ids
		$ids = array();
		while($objBlobs->next())
		{
			$data = \Contao\StringUtil::deserialize($objBlobs->$field);
			// strict mode
			if($objFilter->isStrict())
			{
				// diff must be empty
				$diff = array_diff($data, $values);
				if(empty($diff))
				{
					$ids[] = $objBlobs->id;
					continue;
				}
			}
			else
			{
				// intersection must not be empty
				$intersect = array_intersect($data, $values);
				if(!empty($intersect))
				{
				   $ids[] = $objBlobs->id;
				   continue;
				}
			}
		}
		
		$arrOption['column'] = 'id';
		$arrOption['operation'] = 'IN';
		$arrOption['value'] = $ids;
		
		return $arrOption;
	}
	
	
	/**
	 * Enable/disable strict mode
	 * @param boolean
	 * @return boolean
	 */
	public function strictMode($bolValue=true)
	{
		$this->bolIsStrict = $bolValue;
		return $bolValue;
	}
	
	
	/**
	 * Return true if the filter runs in strict mode
	 * @return boolean
	 */
	public function isStrict()
	{
		return $this->bolIsStrict;
	}
	
	
	/**
	 * Check if a reset request has been submitted and return boolean. 
	 * Alternative behaviour: Reset a filter, set value to null
	 * @param boolean	Reload the page or not
	 */
	protected function reset($strName='',$bolReload=false)
	{
		if(strlen($strName) > 0)
		{
			if(\Contao\Input::post($strName) == $strName.'_reset' || \Contao\Input::get($strName) == $strName.'_reset')
			{
				return true;
			}
			return false;
		}
		
		$this->setValue(null);
		
		if(\Contao\Input::get($this->getName()) == $this->getName().'_reset' && $GLOBALS['PCT_CUSTOMCATALOG']['resetGETfiltersWithPageReload'] === true)
		{
			$bolReload = true;
		}
		
		if($bolReload)
		{
			// strip filter GET param from url
			$url = \PCT\CustomElements\Helper\Functions::callstatic('removeFromUrl',array($this->getName()) );
			$url = \PCT\CustomElements\Helper\Functions::callstatic('removeFromUrl',array($this->getName().'_reset',$url) );
			// redirect to url without the filter value
			\PCT\CustomElements\Helper\ControllerHelper::callstatic('redirect',array($url));
		}
		
		return true;
	}
	
	
	/**
	 * Public access to reset method
	 * @param boolean
	 */
	public function resetAndReload($blnReload=true)
	{
		return $this->reset($this->getName(),$blnReload);
	}
	
	
	/**
	 * Add a filter value to a page url and return the url string
	 * @param string|integer
	 * @param object
	 * @param string
	 * @return string
	 */
	public function addToUrl($varValue,$objJumpTo=null,$strMethod='POST')
	{
		$arrValues = $this->getValue();
		$strMethod = strtolower($strMethod);
		
		// add the new value to the other active values
		if(!in_array($varValue, $arrValues) && $this->get('multiple') == true)
		{
			$arrValues[] = $varValue;
		}
		else
		{
			$arrValues = array($varValue);
		}
		
		if(!$objJumpTo)
		{
			global $objPage;
			$objJumpTo = $objPage;
		}
		
		$arrFilterParams = array($this->getName() => $arrValues);
		
		// use the custom catalog and it's filter functions as helper
		$objCC = new \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog();
		$objController = \PCT\CustomElements\Helper\ControllerHelper::getInstance();
		
		$strParam = $objCC->generateFilterUrl($arrFilterParams,$strMethod);
		
		$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');

		$feUrl = StringUtil::ampersand( $objRouter->generate($objJumpTo, array('parameters'=>$strMethod == 'post' ? $strParam : '') ) );
		
		if( $strMethod == 'get' && strlen($strParam) > 0)
		{
			$feUrl = \PCT\CustomElements\Helper\Functions::addToUrl($strParam,$feUrl);
		}
		
		return $feUrl;
	}
	
	/**
	 * Remove a filter value from a page url and return the url string
	 * @param string|integer
	 * @param object
	 * @param string
	 * @return string
	 */
	public function removeFromUrl($varValue,$objJumpTo=null,$strMethod='POST')
	{
		$arrValues = $this->getValue();
		
		// return if the value is not active
		if(!in_array($varValue, $arrValues))
		{
			return '';
		}
		
		if(!$objJumpTo)
		{
			global $objPage;
			$objJumpTo = $objPage;
		}
		
		$intIndex = array_search($varValue, $arrValues);
		unset($arrValues[$intIndex]);
		
		$arrFilterParams = array($this->getName() => $arrValues);
		
		// use the custom catalog and it's filter functions as helper
		$objCC = new \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog();
		
		$strParam = '';
		if( $strMethod == 'POST' )
		{
			$strParam = $objCC->generateFilterUrl($arrFilterParams,$strMethod);
		}

		$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
		
		$feUrl = \Contao\StringUtil::ampersand( $objRouter->generate($objJumpTo, array('parameters'=>$strParam) ) );
		
		return $feUrl;
	}
	
	
	/**
	 * Return the modified array
	 * @return array
	 */
	public function getModified()
	{
		return $this->get('arrModified');
	}
	
	
	/**
	 * Set a variable or flag to be modified
	 * @param string
	 */
	public function setModified($strKey)
	{
		$arrModified = $this->getModified();
		$arrModified[$strKey] = true;
		$this->set('arrModified',$arrModified);
	}
	
	
	/**
	 * Return true/false if a key is set
	 * @return boolean
	 */
	protected function isModified($strKey)
	{
		$arrModified = $this->getModified();
		if(array_key_exists($strKey, $arrModified))
		{
			return true;
		}
		return false;
	}

//! --- conditions support ---
	
	/**
	 * Check the condition of a filter value
	 * @param mixed
	 * @param boolean	Use cache or not
	 * @return boolean
	 */
	public function hasResults($varValue,$blnCached=false)
	{
		// return the whole check
		if(!$this->get('conditional'))
		{
			return true;
		}

		$intResults = 0;
		
		$arrResults = $this->get('arrResultCounts') ?: array();
		if(isset($arrResults[$varValue]) && $blnCached)
		{
			$intResults = $arrResults[$varValue];
		}
		else
		{
			// count the possible results for the value
			$intResults = $this->getResultCount($varValue);
			
			$arrResults[$varValue] = $intResults;
			$this->set('arrResultCounts',$arrResults);
		}
		return $intResults > 0 ? true : false;
	}
	
	
	/**
	 * Return the counter for a filter value
	 * @var mixed
	 * @var boolean	 	Use cache or not
	 * @return integer
	 */
	public function getValueCount($varValue,$blnCached=true)
	{
		if( empty($varValue) )
		{
			return 0;
		}

		$arrResults = $this->get('arrResultCounts');
		
		// look up from cache
		if($blnCached === true && isset($arrResults[$varValue]))
		{
			return $arrResults[$varValue];
		}
		
		// do the math
		$intReturn = $this->getResultCount($varValue);
		
		// add to cache
		if($blnCached === true)
		{
			$arrResults[$varValue] = $intReturn;
			$this->set('arrResultCounts',$arrResults);
		}
	
		return $intReturn;
	}
	

	/**
	 * Count possible results when fetching with the current filters active
	 * @param mixed
	 * @return integer
	 */
	protected function getResultCount($varValue)
	{
		$objCC = $this->getCustomCatalog();
		if($objCC === null)
		{
			return 0;
		}
		
		// get current table
		$strTable = $objCC->getTable();
		// modify the filter whether to show empty results or not
		$this->set('showEmptyResults',(boolean)$this->getModule()->customcatalog_filter_showAll);
		$objOrigModule = $this->getModule();

		// simulate list module
		$objModule = clone($this->getModule());
		$objModule->customcatalog_filter_showAll = true;
		$objCC->setOrigin($objModule);
		$objCC->setVisibles(array());
		
		// @var object QueryBuilder
		$objQueryBuilder = \PCT\CustomElements\Helper\QueryBuilder::getInstance();
		$objQueryBuilder->setTable($strTable);
		
		$arrQuery = $objCC->getQueryOption();

		// reset to orig module
		$objCC->setOrigin($objOrigModule);

		// create a helper clone of the current filter to avoid overriding
		$objHelper = clone($this);
		$objHelper->setValue(array($varValue));
		$objHelper->isResultCount = true;

		$arrOptions = $objHelper->getOptions();	
		if(method_exists($objHelper, 'getQueryOptionCallback'))
		{
			$arrOptions = $objHelper->getQueryOptionCallback();
		}
		else
		{
			switch($this->get('type'))
			{
				case 'tags':
					$arrOptions = $objHelper->prepareFilter()->getOptions();
					
					break;
				default:
					// call the getQueryOptionHook
					$arrOptions = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('getQueryOptionHook',array($objHelper->getOptions(),$objHelper));
					break;
			}
		}
	
		if( empty($arrOptions) )
		{
			return 0;
		}
		
		$arrQuery = $objQueryBuilder::combine($arrQuery,$arrOptions);
		
		// kick out relations to unwanted filters
		$arrConditionalFilters = \Contao\StringUtil::deserialize($this->get('conditional_filters')) ?: array();
		if(!is_array($arrConditionalFilters))
		{
			$arrConditionalFilters = array();
		}
		if(empty($arrConditionalFilters) && isset($arrQuery['columns']) && count($arrQuery['columns']) > 0)
		{
			foreach($arrQuery['columns'] as $i => $opt)
			{
				if( isset($opt['filter_id']) && $opt['filter_id'] > 0 && $opt['filter_id'] != $this->get('id') && !in_array($opt['filter_id'], $arrConditionalFilters))
				{
					unset($arrQuery['columns'][$i]);
				}
			}	
		}

		// respect language records
		if($this->getCustomCatalog()->get('multilanguage'))
		{
			$objLanguageFilter = new $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']['languageSwitch']['class'];
			$objLanguageFilter->setOrigin($this->getCustomCatalog());
			$objLanguageFilter->setTable($this->getTable());
			
			// prepare the filter
			$arrLanguageOptions = $objLanguageFilter->getQueryOptionCallback();
			if(count($arrLanguageOptions) > 0 && (is_array($arrLanguageOptions['columns']) || is_array($arrLanguageOptions['column'])) )
			{
				if(!is_array($arrQuery['columns']))
				{
					$arrQuery['columns'] = array();
				}
				
				\Contao\ArrayUtil::arrayInsert($arrQuery['columns'],count($arrQuery['columns']),$arrLanguageOptions['columns']);
			}
		}
		
		return $objQueryBuilder->count($arrQuery);
	}
	
//! --- translations and multilanguage support ---


	/**
	 * Find translations for labels in the backend and return them as array
	 * @param string
	 * @param object
	 * @return null|array
	 */
	public function getTranslatedLabel()
	{
		$strKey = $this->getTable();
		
		$strField = $this->get('alias');
		
		if(!is_array($GLOBALS['TL_LANG'][$strKey][$strField]) || !isset($GLOBALS['TL_LANG'][$strKey][$strField]))
		{
			return null;
		}
		
		return array($GLOBALS['TL_LANG'][$strKey][$strField][0],$GLOBALS['TL_LANG'][$strKey][$strField][1]);
	}

	
	/**
	 * Return the translations array
	 * @return array
	 */
	public function getTranslations()
	{
		return $this->get('arrTranslations');
	}
	
	
	/**
	 * Add a translation for a value to the labels array
	 * @param string	Value key
	 * @param string	Label
	 * @param string	The language code e.g. de, en...
	 */
	public function addTranslation($strValue,$strLabel,$strLanguage)
	{
		// mark as modified	
		$this->setModified('arrTranslations');
		
		$arrTranslations = $this->get('arrTranslations');
		
		// set the translated label for the language
		$arrTranslations[$strValue][$strLanguage] = $strLabel;
		
		$this->set('arrTranslations',$arrTranslations);
	}
	
	
	
	/**
	 * Return boolean true if a value has a translation and set the translated value for further use
	 * @param string
	 * @return boolean
	 */
	public function hasTranslation($strValue,$strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			$strLanguage = \Contao\Input::get('language') ?: \Contao\Input::get('lang') ?: $GLOBALS['TL_LANGUAGE'];
		}
		
		// replace the minus with an underscore
		if($strLanguage == $GLOBALS['TL_LANGUAGE'] && Controller::isFrontend() )
		{
			$strLanguage = str_replace('-','_',$strLanguage);
		}
		
		$arrTranslations = $this->getTranslations();
		if(isset($arrTranslations[$strValue][$strLanguage]) && !empty($arrTranslations[$strValue][$strLanguage]))
		{
			return true;
		}
		
		$strKey = $this->getTable();
		$strField = $this->getName();
		// look in global language array
		if(isset($GLOBALS['TL_LANG'][$strKey][$strField][$strValue]) && !empty($GLOBALS['TL_LANG'][$strKey][$strField][$strValue]) )
		{
			$this->setTranslatedValue($strValue,$GLOBALS['TL_LANG'][$strKey][$strField][$strValue],$strLanguage);
			return true;
		}
		else
		{
			// hook here
			$strTranslation = \PCT\CustomElements\Core\Hooks::callstatic('translateValueHook',array($strField,$strValue,$strKey,$this) );
			if( !empty($strTranslation) )
			{
				$this->setTranslatedValue($strValue,$strTranslation,$strLanguage);
				return true;
			}
		}
		
		return false;
	}
	
	
	/**
	 * Return the translated value
	 * @param string
	 * @param string
	 */
	public function getTranslatedValue($strValue,$strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			$strLanguage = \Contao\Input::get('language') ?: \Contao\Input::get('lang') ?: $GLOBALS['TL_LANGUAGE'];
		}
		
		// replace the minus with an underscore
		if($strLanguage == $GLOBALS['TL_LANGUAGE'] && Controller::isFrontend() )
		{
			$strLanguage = str_replace('-','_',$strLanguage);
		}
		
		// search for the translation
		if(!$this->hasTranslation($strValue,$strLanguage))
		{
			return $strValue;
		}
		
		$arrTranslations = $this->getTranslations();
		
		return $arrTranslations[$strValue][$strLanguage];
	}
	
	
	/**
	 * Set the translated value
	 * @param string
	 * @param string
	 */
	public function setTranslatedValue($strValue,$strTranslation,$strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			$strLanguage = \Contao\Input::get('language') ?: \Contao\Input::get('lang') ?: $GLOBALS['TL_LANGUAGE'];
		}
		$this->addTranslation($strValue,$strTranslation,$strLanguage);
	}

}





