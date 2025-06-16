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
 */

/**
 * Namespace
 */
namespace PCT\CustomCatalog\API;

/**
 * Class file
 * Controller
 * Provide general methods to access any API object or modify it
 */
#[\AllowDynamicProperties]
abstract class Controller extends \PCT\CustomElements\Plugins\CustomCatalog\Core\Controller
{
	/**
	 * Table name
	 * @var string
	 */
	protected $strTable = '';
	
	/**
	 * CustomCatalog object
	 * @var object
	 */
	protected $objCustomCatalog;
	
	/**
	 * Report array to collect information about the job process
	 * @var array
	 */
	protected $arrReport = array();
	
	/**
	 * Errors array
	 * @var array
	 */
	protected $arrErrors = array();
	
	
	/**
	 * Set a table name
	 * @param 	string
	 */
	public function setTable($strValue)
	{
		$this->strTable = $strValue;
	}
	
	
	/**
	 * Return the table name
	 * @return string
	 */
	public function getTable()
	{
		return $this->strTable;
	}
	
	
	/**
	 * Set the custom catalog object
	 * @param object
	 */
	public function setCustomCatalog($objValue)
	{
		$this->objCustomCatalog = $objValue;
	}
	
	
	/**
	 * Return the custom catalog object
	 * @return object
	 */
	public function getCustomCatalog()
	{
		return $this->objCustomCatalog;
	}
	

//! -- Reporting
	
	
	/**
	 * Add a new value to the report or return a value
	 * @param string	Array key identifier
	 * @param mixed		Value
	 */
	protected function report($strKey,$varValue=null)
	{
		if($varValue === null)
		{
			return $this->arrReport[$strKey];
		}
		$this->arrReport[$strKey] = $varValue;
	}
	
	
	
	/**
	 * Return the protocol
	 * @param string	Return a certain report key
	 * @return array
	 */
	public function getReport($strKey='')
	{
		if(strlen($strKey) > 0)
		{
			$this->arrReport[$strKey];
		}
		return $this->arrReport;
	}

//! -- Event handling	
	
	/**
	 * Trigger a certain event
	 * @param string	Event selector
	 */
	public function triggerEvent($strHandler)
	{
		$this->{$strHandler}();
	}
	

//! -- Error handling


	/**
	 * Return boolean true if errors as been tracked, including criticals
	 * @return boolean
	 */
	public function hasErrors()
	{
		return (count($this->arrErrors) > 0 ? true : false);
	}
	
	
	/**
	 * Return boolean true if critical errors as been tracked
	 * @return boolean
	 */
	public function hasCriticalErrors()
	{
		return (!empty($this->arrErrors['CRITICAL']) ? true : false);
	}
	
	/**
	 * Add a new error to the stack
	 * @param string
	 */
	public function addError($strValue, $strKey='GENERAL')
	{
		if(strlen($strValue) < 1)
		{
			return;
		}
		
		if( !isset($this->arrErrors[$strKey]) || !is_array($this->arrErrors[$strKey]))
		{
			$this->arrErrors[$strKey] = array();
		}
		
		// strip errors
		$strValue = utf8_decode($strValue);
			
		if(!in_array($strValue, $this->arrErrors[$strKey]))
		{
			$this->arrErrors[$strKey][] = $strValue;
		}
	}
	
	
	/**
	 * Add a critical error like real exceptions
	 * @param string
	 */
	public function addCriticalError($strValue)
	{
		$this->addError($strValue,'CRITICAL');
	}
		
	
	/**
	 * Return the errors as array
	 * @param string
	 */
	public function getErrors()
	{
		return $this->arrErrors;
	}
	
	
	/**
	 * Set the errors array
	 * @param array
	 */
	public function setErrors($arrInput)
	{
		$this->arrErrors = $arrInput;
	}
	
	
	/**
	 * Return all errors as string
	 * @return string
	 */
	public function getErrorsAsString($strKey='')
	{
		if(!$this->hasErrors())
		{
			return '';
		}
		
		if(strlen($strKey) < 1)
		{
			$tmp = array();
			foreach($this->arrErrors as $k => $v)
			{
				if(strlen($k) < 1)
				{
					continue;
				}
				
				$tmp[] = $this->getErrorsAsString($k);
			}
			return implode('\n', $tmp);
		}
		
		return implode('\n', $this->arrErrors[$strKey]);
	}
	
	
	/**
	 * Throw an exception
	 * If ajax is running throw a json error
	 * @param string 	Can be a json string for custom ajax responses
	 */
	public function throwException($strMessage='')
	{
		// Write log
		if(\Contao\Config::get('debugMode'))
		{
			// Write Log
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('API error: '.$strMessage);

		}
		
		if(\Contao\Environment::get('isAjaxRequest'))
		{
			if(!is_array(json_decode($strMessage)))
			{
				$strMessage = json_encode(array('error'=>$strMessage));
			}
			die( $strMessage );
		}
		else
		{
			throw new \Exception($strMessage);
		}
	}
}