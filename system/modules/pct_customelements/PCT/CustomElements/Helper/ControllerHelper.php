<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Helper;

/**
 * Class file
 * ControllerHelper
 */
class ControllerHelper extends \Contao\Controller
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
	 * Call Contao Controller function
	 * @param string	Name of function
	 * @param array
	 */
	public function call($strMethod, $arrArguments)
	{
		if (method_exists($this, $strMethod))
		{
			return call_user_func_array(array($this, $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: Controller::' . $strMethod);
	}
	
	/**
	 * Call Contao Controller function
	 * @param string	Name of function
	 * @param array
	 */
	public static function callstatic($strMethod, $arrArguments)
	{
		if (method_exists(static::getInstance(), $strMethod))
		{
			return call_user_func_array(array(static::getInstance(), $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: Controller::' . $strMethod);
	}
}