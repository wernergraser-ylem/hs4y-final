<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Restrict content elements
 */
if(Controller::isBackend() && in_array(\Contao\Input::get('act'),array('edit','editAll','overrideAll')) )
{
	$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_content');
	$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchCurrent();

	if($objCC !== null)
	{
		$strTable = ($objCC->mode == 'new' ? $objCC->tableName : $objCC->existingTable);
		$arrChildTables = StringUtil::deserialize($objCC->cTables) ?: array();
		
		if(count($arrChildTables) < 1)
		{
			return;
		}
		
		foreach($arrChildTables as $childTable)
		{
			if(strlen(strpos($childTable, '::')) < 1)
			{
				continue;
			}
			
			// fetch the custom catalog configs for tl_content
			$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog WHERE restrictCte=1 AND mode=? AND existingTable=? AND pTable=?")->execute('existing','tl_content',$strTable);
			if($objResult->numRows > 0)
			{
				while($objResult->next())
				{
					if(strlen($objResult->restrictedCte) < 1)
					{
						continue;
					}
					// remove the content elements
					$objDcaHelper->removeContentElements(StringUtil::deserialize($objResult->restrictedCte));
				}
			}
		}
	}
}	
			