<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\ThemeDesigner;

use Contao\CoreBundle\ContaoCoreBundle;

/**
 * Class file
 * Backend
 *
 */
class Frontend extends \Contao\Frontend
{
	public function getPageIdFromUrlCallback($arrFragments)
	{
		if(\Contao\Input::get('themedesigner_iframe'))
		{
			$arrFragments[] = 'themedesigner_iframe';
		}
		return $arrFragments;
	}	
	

	/**
	 * Append GET parameter to all urls in the iframe
	 * @param array
	 * @param string
	 * @param string
	 * @return string
	 */
	public function generateFrontendUrlCallback($arrRow, $strParams, $strUrl)
	{
		global $objPage;
		
		// do not manipulate active pages
		if(\Contao\Input::get('themedesigner_iframe') != '' && $arrRow['id'] != $objPage->id)
		{
			if(strlen(strpos($strUrl, '?')) > 0)
			{
				$strUrl .= '&themedesigner_iframe=1';
			}
			else
			{
				$strUrl .= '?themedesigner_iframe=1';
			}
		}
		return $strUrl;
	}


	/**
	 * Remove error pages (403,404,503 etc.) from PageRegistry to avoid routing errors when trying to display in themdesigner
	 * @param object
	 * @param object
	 * called from loadPageDetails
	 */
	public function removeErrorPagesFromPageRegistry($objParentModels, $objModel)
	{
		if( \version_compare(ContaoCoreBundle::getVersion(),'4.13','>=') === true && \in_array($objModel->type, $GLOBALS['PCT_THEMEDESIGNER']['contaoErrorPages']) === true )
		{
			$objPageRegistry = \Contao\System::getContainer()->get('contao.routing.page_registry');
			$objPageRegistry->remove( $objModel->type );
		}
	}


	/**
	 * Bypass the maintenance mode in themedesigner iframe
	 * @param mixed $objParentModels 
	 * @param mixed $objModel 
	 * @return void 
	 * @throws InvalidArgumentException 
	 */
	public function bypassMaintenanceMode($objParentModels, $objModel)
	{
		if( \Contao\Input::get('themedesigner_iframe') !== null)
		{
			$objTemplate = new \Contao\FrontendTemplate('fe_page');
			if( $objTemplate->hasAuthenticatedBackendUser() === true )
			{
				$objModel->maintenanceMode = false;
			}
		}
	}
}
