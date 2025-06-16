<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\ThemeSettings\Backend;

use Contao\Backend;
use Contao\Input;
use Contao\Environment;
use Contao\BackendTemplate;
use Contao\System;

/**
 * Class file
 * BackendIntegration
 */
class BackendIntegration extends Backend
{
	/**
	 * Load Autogrid scripts to backend template
	 * @object template
	 */
	public function parseTemplateCallback($objTemplate)
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) )
		{
			return;
		}
		else if( in_array(Input::get('act'), array('edit','show','create')) || Input::get('switch') != '' || Environment::get('isAjaxRequest') )
		{
			return;
		}
		// check if viewport is supposed to be shown
		else if( !isset($GLOBALS['PCT_THEME_SETTINGS']['includeViewport']) || (boolean)$GLOBALS['PCT_THEME_SETTINGS']['includeViewport'] === false )
		{
			return;
		}

		if($objTemplate->getName() == 'be_main')
		{
			// viewport panel 
			$objViewportPanel = new BackendTemplate('be_viewport_panel');
			$strViewportPanel = $objViewportPanel->parse();
			
			// </body>
			$objTemplate->mootools .= $strViewportPanel;
		}
	}

	/**
	 * Inject theme classes in content elements
	 * @param object
	 * @param string
	 * @param objElement
	 * @return string
	 */
	public function getContentElementCallback($objRow, $strBuffer, $objElement)
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) )
		{
			return $strBuffer;
		}
		
		// apend theme settings script to
		$objJsTemplate = new BackendTemplate('be_js_themesettings');
		$objJsTemplate->setData( $objRow->row() );
		$objJsTemplate->context = 'listElement';
		
		return $strBuffer . $objJsTemplate->parse();
	}


	/**
	 * Load backend assets
	 */
	public function loadAssets()
	{
		$GLOBALS['TL_CSS'][] = $GLOBALS['PCT_THEME_SETTINGS']['css'];
	}
}