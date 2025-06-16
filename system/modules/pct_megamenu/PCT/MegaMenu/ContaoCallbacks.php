<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_megamenu
 * @link		http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\MegaMenu;

use Contao\Environment;
use Contao\ModuleModel;
use Contao\PageModel;

/**
 * Class file
 * ContaoCallbacks
 *
 * Provide various callbacks to contao hooks
 */
class ContaoCallbacks
{
	/**
	 * Replace insert tags
	 * @param string
	 * @return boolean||mixed
	 *
	 * called from replaceInsertTags Hook
	 */
	public function replaceInsertTagsCallback($strElement)
	{
		$arrElements = explode('::', $strElement);
		
		// megamenu
		if( $arrElements[0] == 'megamenu' )
		{
			if( !isset($GLOBALS['PCT_MEGAMENUS_INCLUDED']) )
			{
				$GLOBALS['PCT_MEGAMENUS_INCLUDED'] = 0;
			}
			
			$objModel = new ModuleModel();
			$objModel->customTpl = $arrElements[1] ?? 'mod_pct_megamenu';
			$objModel->type = 'pct_megamenu';
			$objModel->id = 'it_'.(int)$GLOBALS['PCT_MEGAMENUS_INCLUDED']++;
			$objModule = new Module($objModel);
			return $objModule->generate();
		}
		
		return false;
	}


	/**
	 * Return the current request address for any megamenu pages
	 * @param mixed $arrRow 
	 * @param mixed $strParams 
	 * @param mixed $strUrl 
	 * @return string
	 * 
	 * called from generateFrontendUrl Hook
	 */
	public function generateFrontendUrlCallback($arrRow, $strParams, $strUrl)
	{
		if( $arrRow['type'] == 'pct_megamenu' )
		{
			global $objPage;
			$objFirst = PageModel::findFirstPublishedByPid($arrRow['pid']);
			if( $objPage === null || $objFirst === null )
			{
				return $strUrl;
			}
			// do NOT change the url when MegaMenu page is the first published and called or when the page called is the root page
			else if( (isset($objFirst) && $objFirst->id == $arrRow['id'] && isset($objPage) && $objPage->id == $arrRow['id']) || (isset($objPage) && $objPage->type == 'root') )
			{
				return $strUrl;
			}
			$strUrl = './';
		}
		return $strUrl;
	}
}