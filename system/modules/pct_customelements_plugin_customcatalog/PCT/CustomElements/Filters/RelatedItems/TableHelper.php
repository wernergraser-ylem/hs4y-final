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
 * @filter		Related item filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters\RelatedItems;

/**
 * Class file
 * RelatedItem
 */
class TableHelper extends \Contao\Backend
{
	/**
	 * Get all attributes by the selected catalog and return them as array
	 * @param object
	 */
	public function getRelatedAttributes($objDC)
	{
		$objActiveRecord = $objDC->activeRecord;
	 	if(!$objActiveRecord)
	 	{
	 		$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if($objActiveRecord->config_id < 1)
		{
			return array();
		}
		
		$objAttributes = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::fetchAllByCustomCatalog($objActiveRecord->config_id);
		if(!$objAttributes)
		{
			return array();
		}
		
		$values = array();
		if(is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values']))
		{
			$values = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values'];
		}
		
		$distinct = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['distinctField'];
		
		$arrReturn = array();
		$arrDistinct = array();
		while($objAttributes->next())
		{
			if(strlen($distinct) > 0)
			{
				if(in_array($objAttributes->{$distinct},$arrDistinct))
				{
					continue;
				}
				$arrDistinct[] = $objAttributes->{$distinct};
			}
			
			if(count($values) > 0)
			{
				if(in_array($objAttributes->type, $values))
				{
					$arrReturn[$objAttributes->id] = $objAttributes->title . ' [id:'.$objAttributes->id.' type:'.$objAttributes->type.' alias:'.$objAttributes->alias.']';
					continue;
				}
			}
			else
			{
				$arrReturn[$objAttributes->id] = $objAttributes->title . ' [id:'.$objAttributes->id.' type:'.$objAttributes->type.' alias:'.$objAttributes->alias.']';
			}
		}
		
		return $arrReturn;
	}
}