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
namespace PCT\CustomElements\Core;

/**
 * Imports
 */

use Contao\System;
use \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder as QueryBuilder;

/**
 * Class file
 * Controller
 * Provide general methods to access any object or modify it
 */
#[\AllowDynamicProperties]
abstract class Controller
{
	/**
	 * Data array
	 * @var array
	 */
	protected $arrData = array();
	
	/**
	 * Custom modified array
	 * @var array
	 */
	protected $arrModified = array();
	
	/**
	 * Reference object
	 * @var object
	 */
	protected $objOrigin = null;
	
	/**
	 * Model object
	 * @var object
	 */
	protected $objModel;

	/**	
	 * The Session object
	 */
	protected $Session = null;
	
	
	/**
	 * Getters
	 * @param string
	 * @return mixed
	 */
	public function get($strKey)
	{
		if( \property_exists($this,$strKey) )
		{
			return $this->{$strKey};
		}
		else if(isset($this->arrData[$strKey]))
		{
			return $this->arrData[$strKey];
		}
		else{}
	}
	
	
	/**
	 * Setters
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		if(array_key_exists($strKey, $this->arrData))
		{
			$this->arrData[$strKey] = $varValue;
		}
		$this->{$strKey} = $varValue;
	}

	
	/**
	 * Set data array
	 * @param array
	 */
	public function setData($arrData, $blnDirectAccessible=true)
	{
		if(!is_array($arrData))
		{
			return;
		}
		
		$this->arrData = $arrData;
		
		// make object accessible
		if($blnDirectAccessible)
		{
			foreach($arrData as $k => $v)
			{
				$this->{$k} = $v;
			}
		}
	}
	
	
	/**
	 * Return the data array
	 * @param array
	 */
	public function getData()
	{
		return $this->arrData;
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
	 * @param string
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
	
	
	/**
	 * Add a new flag to the modfied array
	 * @param string
	 */
	public function markAsModified($strKey)
	{
		$this->setModified($strKey);
	}

	
	/**
	 * Return the table of the customcatalog
	 * @return string
	 */
	public function getTable()
	{
		return ($this->get('mode') == 'new' ? $this->get('tableName') : $this->get('existingTable') );
	}
	
	
	/**
	 * Set a model
	 * @param object
	 */
	public function setModel($objModel)
	{
		$this->objModel = $objModel;
	}
	
	
	/**
	 * Return the model
	 * @return object
	 */
	public function getModel()
	{
		return $this->objModel;
	}
	

	/**
	 * Set the orgin
	 * @param object Origin
	 */
	public function setOrigin($objOrigin)
	{
		$this->set('objOrigin',$objOrigin);
	}
	
	
	/**
	 * Get the reference model object
	 * @return object
	 */
	public function getOrigin()
	{
		return $this->get('objOrigin');
	}


	public static function isBackend()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) ) 
		{
			return true;
		}
		return false;
	}

	public static function isFrontend()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) ) 
		{
			return true;
		}
		return false;
	}

	public static function request_token()
	{
		return System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
	}

	public static function rootDir()
	{
		return System::getContainer()->getParameter('kernel.project_dir');
	}

	
	/**
	 * Return boolean true if install tool is running
	 * @return boolean
	 */
	public static function isInstallTool()
	{
		if(strlen(strpos(\Contao\Environment::get('scriptName'), '/contao/install.php')) > 0 || strlen(strpos(\Contao\Environment::get('requestUri'), '/contao/install')) > 0)
		{
			return true;
		}
		else if( strlen(strpos(\Contao\Environment::get('scriptName'), '/contao-manager.phar.php')) > 0 )
		{
			return true;
		}
		return false;
	}
}