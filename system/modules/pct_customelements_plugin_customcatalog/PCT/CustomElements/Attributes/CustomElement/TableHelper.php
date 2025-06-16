<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @attribute	CustomElement includer
 * @link		http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes\CustomElement;

/**
 * Class file
 * TableHelper
 */
class TableHelper extends \Contao\Backend
{
	/**
	 * Return all customelements as array by their alias
	 * @param object
	 */
	public function getCustomElements($objDC)
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement")->execute();
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			$arrReturn[$objResult->id] = $objResult->title . '[id:'.$objResult->id.', alias:'.$objResult->alias.']';
		}
		return $arrReturn;
	}

}