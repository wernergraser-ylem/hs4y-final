<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage pct_customelements_plugin_customcatalog
 * @attribute CustomElement includer
 * @link  http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes\CustomElement;

/**
 * Class file
 * Helper
 */
class Helper
{
	/**
	 * Load CustomElement information to the DCA 
	 * @param object
	 */
	public static function load($strTable='')
	{
		$objDbCCs = null;
		
		if(strlen($strTable) < 1)
		{
			$strTable = \Contao\Input::get('table');
		}
		
		if(strlen($strTable) > 0)
		{
			$objDbCCs = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchByTableName($strTable);
		}
		else
		{
			$objDbCCs = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchAllActive();
		}

		if($objDbCCs !== null)
		{
			$objDatabase = \Contao\Database::getInstance();

			$objCEAttributes = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE pid IN (SELECT id FROM tl_pct_customelement_group WHERE pid IN(".implode(',',$objDbCCs->fetchEach('pid')).") GROUP BY id) AND ".$objDatabase->findInSet('type',array('customelement')))->execute();

			// atleast one CC has a customelement attribute
			if($objCEAttributes->numRows > 0)
			{
				$objDbCCs->reset();
				while($objDbCCs->next())
				{
					$strTable = ($objDbCCs->mode == 'new' ? $objDbCCs->tableName : $objDbCCs->existingTable);

					// add the CC table to the CE allowed tables
					$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables'][] = $strTable;

					// add the selection field
					$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']['customcatalog']['selectionfield'][$strTable] = $objCEAttributes->alias;

					$objCE = \PCT\CustomElements\Core\CustomElementFactory::findById($objDbCCs->pid);
					if(!$objCE)
					{
						continue;
					}

					$objDC = new \PCT\CustomElements\Helper\DataContainerHelper;
					$objDC->table = $strTable;
					$objDC->id = \Contao\Input::get('id');

					$arrFields = $objCE->getFieldsForDca($objDC);
					if(!empty($arrFields) && is_array($arrFields))
					{
						foreach($arrFields as $field)
						{
							$arrFieldDef = $field['fieldDef'];
							$strField = $field['name'];
							$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $arrFieldDef;
						}
					}
				}
				array_unique($GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables']);
			}
		}
	}
}