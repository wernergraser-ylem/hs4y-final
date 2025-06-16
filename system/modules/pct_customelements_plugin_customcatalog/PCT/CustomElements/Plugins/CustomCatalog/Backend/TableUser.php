<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

/**
 * Class file
 * User
 */
class TableUser extends \Contao\Backend
{
	/**
	 * Load the selected CC DCA arrays
	 * @param object
	 */
	public function loadCustomCatalogDca($objDC)
	{
		if($objDC->activeRecord === null)
		{
			$objDC->activeRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$arrCCs = \Contao\StringUtil::deserialize($objDC->activeRecord->pct_customcatalogs);
		if(empty($arrCCs) || !is_array($arrCCs))
		{
			return;
		}
		
		// load the DCAs
		foreach($arrCCs as $intCC)
		{
			\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::createDCA($intCC);
		}
	}
}

