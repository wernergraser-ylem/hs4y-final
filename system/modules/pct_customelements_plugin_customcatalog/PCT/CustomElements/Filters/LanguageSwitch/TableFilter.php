<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		LanguageSwitch
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters\LanguageSwitch;

use Contao\StringUtil;

/**
 * Class file
 * TableFilter
 */
class TableFilter extends \Contao\Backend
{
	/**
	 * Return all active languages of the parent custom catalog
	 * @param object
	 * @return array
	 */
	public function getCustomCatalogLanguages($objDC)
	{
		$objCC = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog WHERE id=(SELECT pid FROM tl_pct_customelement_filterset WHERE id=?) AND multilanguage=1")->limit(1)->execute($objDC->activeRecord->pid);
		if($objCC->numRows < 1)
		{
			return;
		}
		
		$arrReturn = array('__base__'=>'__base__');
		$arrLanguages = \Contao\System::getLanguages();
		foreach( StringUtil::deserialize($objCC->languages) ?? array() as $k)
		{
			$arrReturn[$k] = $arrLanguages[$k];
		}
		
		return $arrReturn;
	}
}