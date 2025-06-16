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

/**
 * Class file
 * InsertTags
 */
class InsertTags extends \Contao\Controller
{
	/**
	 * Replace ThemeDesigner inserttags
	 * @param string
	 * @return mixed
	 */
	public function replaceTags($strTag)
	{
		$arrElements = explode('::', $strTag);
		
		$varReturn = null;
		if($arrElements[0] == 'td')
		{
			$arrConfig = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'];
			$strSection = $arrElements[1];
			$strField = $arrElements[2];
			$strKey = $arrElements[3] ?: '';
			
			if($arrConfig[$strSection]['fields'][$strField])
			{
				if(strlen($strKey) > 0 && $arrConfig[$strSection]['fields'][$strField][$strKey])
				{
					$varReturn = $arrConfig[$strSection]['fields'][$strField][$strKey];
				}
			}
		}
		else if($arrElements[0] == 'user_privacy_settings')
		{
			$varReturn = \Contao\Input::cookie($GLOBALS['PCT_THEMEDESIGNER']['privacy_session_name']);
		}
		
		return ($varReturn !== null ? $varReturn : false);
	}
}