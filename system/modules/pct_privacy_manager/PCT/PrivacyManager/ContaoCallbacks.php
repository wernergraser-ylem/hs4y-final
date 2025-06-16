<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) Leo Feyer
 *
 * @copyright Tim Gatzky 2020
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\PrivacyManager;

/**
 * Imports
 */
use Contao\FrontendTemplate;
use Contao\LayoutModel;
use Contao\System;


/**
 * Class file
 * ContaoCallbacks
 */
class ContaoCallbacks extends System
{
	/**
	 * Load Google Fonts after optin
	 * @param mixed $objPage 
	 * @param mixed $objLayout 
	 * @param mixed $objPageRegular 
	 * @return void 
	 * 
	 * called from getPageLayout Hook
	 */
	public function getPageLayoutCallback($objPage, $objLayout, $objPageRegular)
	{
		if( (boolean)$objLayout->webfonts_optin === false )
		{
			return;
		}
		
		$strFonts = $objLayout->webfonts;
		// if TD is active and is supposed to not load fonts, fetch the fonts new
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		if( \in_array('pct_themer', $bundles) === false || (\in_array('pct_themer', $bundles) === true && (boolean)\Contao\Config::get('pct_themedesigner_nofonts') === true) )
		{
			$arrOrigLayout = LayoutModel::findByPk( $objLayout->id )->originalRow();
			$strFonts = $arrOrigLayout['webfonts'];
		}
		
		$objTemplate = new FrontendTemplate('privacy_webfonts');
		$objTemplate->webfonts = $strFonts;
		$objTemplate->Layout = $objLayout;
		$objTemplate->Page = $objPage;
		$objTemplate->PageRegular = $objPageRegular;
		// add to custom script section
		$objLayout->script .= $objTemplate->parse();
		// clear webfonts
		$objLayout->webfonts = '';
	}
}