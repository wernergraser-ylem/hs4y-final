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
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Imports
 */
use \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder as QueryBuilder;
use Contao\System;

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
		elseif(isset($this->arrData[$strKey]))
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
			return;
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
	 * Set the reference model object
	 * @param object
	 */
	public function setOrigin($objModel)
	{
		$this->set('objOrigin',$objModel);
	}
	
	
	/**
	 * Get the reference model object
	 * @return object
	 */
	public function getOrigin()
	{
		return $this->get('objOrigin');
	}
	
	
	/**
	 * Return count of results
	 * @return integer
	 */
	public function getCount()
	{
		if( \method_exists($this,'getQueryOption') === false )
		{
			return 0;
		}
		$arrOptions = $this->getQueryOption();
		return \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder::getInstance()->count($arrOptions);
	}
	
	
	/**
	 * Return the total of records mathing the query
	 * @return integer
	 */
	public function getTotal()
	{
		return $this->getCount();
	}
	
	
	/**
	 * Get the database result
	 * @return object
	 */
	public function getResult($arrOptions)
	{
		if(empty($arrOptions))
		{
			return null;
		}
		return \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder::getInstance()->fetch($arrOptions);
	}
	
	
	/**
	 * Return the count for a sql query
	 * @param array
	 * @return integer
	 */
	public static function count($arrOptions)
	{
		if(empty($arrOptions))
		{
			return -1;
		}
		return \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder::getInstance()->count($arrOptions);
	}


	/**
	 * Call the fetch method for a sql query
	 * @param array
	 * @return object
	 */
	public static function fetch($arrOptions)
	{
		return \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder::getInstance()->fetch($arrOptions);
	}

	
	/**
	 * Simulate an active filtering an return the sql database object
	 * @return object
	 */
	public function getFilterResult()
	{
		if( \method_exists($this,'prepare') === false )
		{
			return null;
		}
		return $this->prepare();
	}
	
	
	/**
	 * Simulate an active filtering an return the sql query as string
	 * @return string
	 */
	public function getFilterQuery()
	{
		return $this->getFilterResult()->query ?: '';
	}
	
	
	/**
	 * Set an sql options array
	 * @param array
	 */
	public function setOptions($arrValue)
	{
		$this->set('arrOptions',$arrValue);
		$this->markAsModified('arrOptions');
	}
	
	
	/**
	 * Get an sql options array
	 * @return array
	 */
	public function getOptions()
	{
		return $this->get('arrOptions');
	}

	
	/**
	 * Return the contao model for a custom catalog record
	 * @param integer
	 * @return object
	 */
	public function getContaoModel($intId)
	{
		return new \PCT\CustomElements\Helper\ModelHelper($this->getTable(),$intId);
	}
	
	
	/**
	 * Return the module model
	 * @return object
	 */
	public function getModule()
	{
		return $this->getOrigin();
	}
	
	
		/**
	 * Check if system is in back end
	 * @return bool 
	 */
	public static function isBackend()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) ) 
		{
			return true;
		}
		return false;
	}


	/**
	 * Check if system is in front end
	 * @return bool 
	 */
	public static function isFrontend()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) ) 
		{
			return true;
		}
		return false;
	}


	/**
	 * Return default request token
	 * @return string 
	 */
	public static function request_token()
	{
		return System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
	}


	/**
	 * Return project directory
	 * @return string
	 */
	public static function rootDir()
	{
		return System::getContainer()->getParameter('kernel.project_dir');
	}
}