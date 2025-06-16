<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */


/**
 * Namespace
 */
namespace PCT\FrontendQuickEdit;

use Contao\BackendUser;
use Contao\Config;
use Contao\System;
use Contao\Controller as Contao_Controller;
use Contao\Database;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\StringUtil;

/**
 * Class file
 * Controller
 */
class Controller extends Contao_Controller
{
	protected static $objCurrentBackendUser = null;


	/**
	 * Check if the frontend builder is active for the current backend user session
	 * @return boolean
	 */
	public static function isActive()
	{
		if (defined('PCT_FRONTEND_QUICKEDIT_ACTIVE') === true )
		{
			return PCT_FRONTEND_QUICKEDIT_ACTIVE;
		}
		
		// themedesigner is active
		$bundles = array_keys(System::getContainer()->getParameter('kernel.bundles'));
		if( \in_array('pct_themer', $bundles) && (boolean)Config::get('pct_themedesigner_hidden') === false )
		{
			// define the constant
			define('PCT_FRONTEND_QUICKEDIT_ACTIVE', false);
			
			return PCT_FRONTEND_QUICKEDIT_ACTIVE;
		}
		
		// find active backend user
		$objUser = static::findActiveBackendUser();
		if( $objUser === null )
		{
			define('PCT_FRONTEND_QUICKEDIT_ACTIVE', false);
			return PCT_FRONTEND_QUICKEDIT_ACTIVE;
		}
		
		
		// define the constant
		define('PCT_FRONTEND_QUICKEDIT_ACTIVE', ( (int)$objUser->id > 0) );
	
		return PCT_FRONTEND_QUICKEDIT_ACTIVE;
	}
	
	
	/**
	 * Check for active backend sessions and return the backend user object
	 * @return object||null
	 */
	public static function findActiveBackendUser()
	{
		if( static::$objCurrentBackendUser !== null )
		{
			return static::$objCurrentBackendUser;
		}
		
		$objDatabase = Database::getInstance();

		// check if extension is installed 
		if( $objDatabase->fieldExists('pct_frontend_quickedit','tl_user') === false )
		{
			return null;
		}
		
		if( System::getContainer()->get('contao.security.token_checker')->hasBackendUser() === false )
		{
			return null;
		}
		
		// @var BackendUser
		$objUser = BackendUser::getInstance();
		if( (boolean)$objUser->pct_frontend_quickedit === false )
		{
			return null;
		}

		// cache
		static::$objCurrentBackendUser = $objUser;
		
		return $objUser;
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
	 * Check permissions of the current active backend user
	 * @param string $strPermission 
	 * @param string $strValue 
	 * @return bool 
	 */
	public static function hasAccess( $strPermission='', $strValue='')
	{
		$objUser = static::findActiveBackendUser();
		if( $objUser === null )
		{
			return false;
		}

		if( $objUser->isAdmin )
		{
			return true;
		}

		$blnReturn = false;
		switch($strPermission)
		{
			case ContaoCorePermissions::USER_CAN_ACCESS_MODULE:
				$arr = StringUtil::deserialize( $objUser->modules ) ?? array();
				$blnReturn = ( \is_array($arr) && \in_array($strValue,$arr) );
				break;
			case ContaoCorePermissions::USER_CAN_ACCESS_ELEMENT_TYPE:
				$arr = StringUtil::deserialize( $objUser->elements ) ?? array();
				$blnReturn = ( \is_array($arr) && \in_array($strValue,$arr) );
				break;
			case ContaoCorePermissions::USER_CAN_ACCESS_FRONTEND_MODULE_TYPE:
				$arr = StringUtil::deserialize( $objUser->frontendModules ) ?? array();
				$blnReturn = ( \is_array($arr) && \in_array($strValue,$arr) );
				break;
			case ContaoCorePermissions::USER_CAN_ACCESS_THEME:
				$arr = StringUtil::deserialize( $objUser->themes ) ?? array();
				$blnReturn = ( \is_array($arr) && \in_array($strValue,$arr) );
				break;
			case ContaoCorePermissions::USER_CAN_EDIT_FORM:
				$arr = StringUtil::deserialize( $objUser->forms ) ?? array();
				$blnReturn = ( \is_array($arr) && \in_array($strValue,$arr) );
				break;
		}
		
		return $blnReturn;
	}

}