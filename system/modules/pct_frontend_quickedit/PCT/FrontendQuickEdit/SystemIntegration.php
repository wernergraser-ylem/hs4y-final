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

use Contao\Environment;
use Contao\Input;
use Contao\PageModel;
use PCT\FrontendQuickEdit\Controller;

/**
 * Class file
 * SystemIntegration
 *
 * Provide various function to integrate the frontend builder in Contao system related operations
 */
class SystemIntegration
{
	/**
	 * Initialize
	 * called from initializeSystem Hook
	 */
	public function initialize()
	{
		if( Controller::isBackend() || Controller::isActive() === false)
		{
			return;
		}
	}
	
	
	/**
	 * Load backend assets
	 * @param object
	 * called from initializeSystem
	 */
	public function loadBackendAssets()
	{
		if( Controller::isFrontend() || Controller::isActive() === false )
		{
			return;
		}

		// load backend styles when loaded in iframe
		if( (int)Input::get('iframe') == 1 )
		{
			$GLOBALS['TL_CSS'][] = \PCT_FRONTEND_QUICKEDIT_PATH.'/assets/css/iframe.css|static';
		}
	}


	/**
	 * Load frontend assets
	 * @param object
	 * called from generatePage Hook
	 */
	public function loadFrontendAssets($objPage)
	{
		// check if backend login hash is set
		if( Controller::isFrontend() && Input::get('login_success') !== null && Input::get('hash') != '' )
		{
			$objUser = Controller::findActiveBackendUser();
			if( $objUser === null )
			{
				die('login_success');
			}
			
			$strHash = \md5( $objUser->id );

			// validate hash
			if( Input::get('hash') == $strHash )
			{
				die('login_success');
			}
		}

		if( Controller::isBackend() || Controller::isActive() === false )
		{
			return;
		}
		
		$GLOBALS['TL_CSS'][] = \PCT_FRONTEND_QUICKEDIT_PATH.'/assets/css/styles.css|static';
	}


	/**
	 * Redirect to a login_success page after backend user login
	 * @return void 
	 */
	public function backendUserLoggedIn($objUser)
	{
		if( Controller::isBackend() && (boolean)Input::get('fqe') === true )
		{
			$strHash = \md5( $objUser->id );
			$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
			$objPage = PageModel::findByPk( Input::get('page') );
			Controller::redirect( $objRouter->generate($objPage).'?login_success&hash='.$strHash);
		}		
	}
}