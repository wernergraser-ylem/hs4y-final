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
namespace PCT\CustomElements\Helper;

/**
 * Imports
 */
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * Functions
 *
 * Provide various functions helper functions
 */
class Functions
{
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
	
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance()
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static();
		}

		return static::$objInstance;
	}
	
	
	/**
	 * Call function
	 * @param string	Name of function
	 * @param array
	 */
	public function call($strMethod, $arrArguments)
	{
		if (method_exists($this, $strMethod))
		{
			return call_user_func_array(array($this, $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: Functions::' . $strMethod);
	}
	
	
	/**
	 * Call function
	 * @param string	Name of function
	 * @param array
	 */
	public static function callstatic($strMethod, $arrArguments)
	{
		if (method_exists(static::getInstance(), $strMethod))
		{
			return call_user_func_array(array(static::getInstance(), $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: Functions::' . $strMethod);
	}
	
	
	/**
	 * Strip GET parameters from any url
	 * @param string	GET param name
	 * @return string	New url string
	 */
	public static function removeFromUrl($strParam,$strUrl='')
	{
		if(strlen($strUrl) < 1)	
		{
			$strUrl = \Contao\Environment::get('request');
		}
		
		$strReturn = '';
		$arrUrl = parse_url( urldecode($strUrl) );
		
		$arrGET = array();
		
		// remove a regular GET parameter
		if( isset($arrUrl['query']) && strlen($arrUrl['query']) > 0)
		{
			parse_str( $arrUrl['query'] ,$params);
			unset($params[$strParam]);
			$arrGET = $params;
		}
		
		// remove a url fragment GET parameter
		$tmp = explode('.', $arrUrl['path']);
		$strBase = $tmp[0] ?? '';
		$strDocument = $tmp[1] ?? '';
		
		$arrUrlFragments = explode('/',$strBase);
		
		// strip the .php fragment and rebuild it
		if($strBase == 'index' && !\Contao\Config::get('rewriteURL') )
		{
			$arrUrlFragments[0] = $strBase.'.'.$strDocument;
			$strDocument = 'html';
		}
		
		foreach($arrUrlFragments as $i => $chunk)
		{
			if($strParam == $chunk)
			{
				unset($arrUrlFragments[$i]);
			}
			if(\Contao\Input::get($strParam) == $chunk)
			{
				unset($arrUrlFragments[$i]);
			}
		}
		
		$strReturn = implode('/', $arrUrlFragments).(strlen($strDocument) > 0 ? '.'.$strDocument : '').(count($arrGET) > 0 ? '?'.http_build_query($arrGET) : '');
		
		return $strReturn;
	}
	
	
	/**
	 * Add GET parameters to any url
	 * @param string	GET param name
	 * @return string	New url string
	 * @param boolean	Allow empty values in parameters
	 */
	public static function addToUrl($strParam,$strUrl='',$blnAllowEmpty=true)
	{
		if(strlen($strUrl) < 1)	
		{
			$strUrl = \Contao\Environment::get('request');
		}
		$strUrl = urldecode($strUrl);
		$arrUrl = parse_url($strUrl);
		parse_str( $arrUrl['query'] ?? '',$arrParams);
		
		// check parameter string for GET parameters
		$strParam = \Contao\StringUtil::decodeEntities($strParam);
		$arrChunks = explode('&',$strParam);
		if(count($arrChunks) > 0)
		{
			foreach($arrChunks as $arr)
			{
				$a = explode('=',$arr);
				if(!$blnAllowEmpty && $a[1] === null)
				{
					continue;
				}

				if( isset($a[0]) && !empty($a[0]) )
				{
					$arrParams[$a[0]] = $a[1];
				}	
			}
		}
		else
		{
			$arrParams[$strParam];
		}
		
		$url = $arrUrl['path'].(!empty($arrParams) ? '?'.http_build_query($arrParams) : '');
		
		return $url;
	}
	
	
	/**
	 * Check if a string is not strict UTF-8
	 * @param string
	 * @param array
	 * @return boolean
	 */
	public static function utf8_strict($strHaystack,$arrAdditionalChars=array())
	{
		$arrChars = array('Ã¤','Ã¶','Ã¼','Ã„','Ã‐','Ãœ','ÃŸ');
		if(count($arrAdditionalChars) > 0)
		{
			$arrChars = array_unique(array_merge($arrChars,$arrAdditionalChars));
		}
		
		foreach($arrChars as $chr)
		{
			if(strlen(strpos($strHaystack, $chr)) > 0)
			{
				return false;
			}
		}
		return true;
	}
	
	
	/**
	 * Recursily merge multidomensional arrays
	 * @param array
	 * @param array
	 * @return array
	 * Copyright idea: https://stackoverflow.com/questions/25712099/php-multidimensional-array-merge-recursive
	 */
	public static function array_merge_recursive_ex(array $array1, array $array2)
	{
	    $merged = $array1;
	
	    foreach ($array2 as $key => & $value) {
	        if (is_array($value) && isset($merged[$key]) && is_array($merged[$key])) {
	            $merged[$key] = static::array_merge_recursive_ex($merged[$key], $value);
	        } else if (is_numeric($key)) {
	             if (!in_array($value, $merged)) {
	                $merged[] = $value;
	             }
	        } else {
	            $merged[$key] = $value;
	        }
	    }
	
	    return $merged;
	}
	
	
	/**
	 * Combines two n-depth arrays 
	 * @param array
	 * @param array
	 * @param boolean	Allow overwriting values
	 * @param array		Memory
	 * @return array
	 */
	public static function array_combine_recursive($arrA, $arrB, $varKey='', $blnOverwrite=false, $arrReturn=array())
	{
		if(!is_array($arrA)) {$arrA = array();}
		if(!is_array($arrB)) {$arrB = array();}
		if(!is_array($arrReturn)) {$arrReturn = array();}
		
		// first: check that there are atleast the same keys
		$diff = array_diff_assoc($arrB,$arrA);
		if(count($diff) > 0)
		{
			// work at a certain key
			if($varKey > 0 || strlen($varKey) > 0)
			{
				// replace a key
				if($blnOverwrite) {	$arrReturn[$varKey] = $diff; }
				// append a key
				else { $arrReturn[$varKey] += $diff; }
			}
			// whole array
			else
			{
				if($blnOverwrite) { $arrReturn = array_merge($arrB,$arrA); }
				else {$arrReturn += $diff;}
			}
		}
		
		// second: check the existing keys in both
		$both = array_intersect_assoc($arrA,$arrB);
		if(count($both) > 0)
		{
			foreach($both as $k => $v)
			{
				if(is_array($v))
				{
					if(!is_array($arrReturn[$k])) {$arrReturn[$k] = array();}
					
					if($blnOverwrite) 
					{ $arrReturn[$k] = $arrB[$k]; }
			   		else 
			   		{ $arrReturn[$k] = array_merge($arrB[$k],$v); }
		   		
					static::array_combine_recursive($arrB[$k],$arrA[$k],$k,$blnOverwrite,$arrReturn);
					continue;
				}
				
				if($blnOverwrite) { $arrReturn[$k] = $arrB[$k]; }
				else { $arrReturn[$k] = $v; }
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Rebuild an array by the value of an associate key
	 * @param string	Key
	 * @param array
	 * @return array
	 */
	public static function array_unique_assoc($strNeedle,$arrInput)
	{
		$arrReturn = array();
		foreach($arrInput as $i => $arr)
		{
			$k = $arr[$strNeedle];
			if($k !== null)
			{
				$arrReturn[$k] = $arr;
			}
			else
			{
				$arrReturn[$i] = $arr;
			}
		}
		return $arrReturn;
	}
	
}