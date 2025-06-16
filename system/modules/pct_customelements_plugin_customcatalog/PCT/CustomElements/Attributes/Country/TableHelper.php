<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements_plugin_customcatalog
 * @attribute	SelectDb
 * @link		http://contao.org
 * @license     LGPL
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes\SelectDb;

/**
 * Class file
 * TableHelper
 */
class TableHelper extends \Contao\Backend
{
	/**
	 * Return all contao tables as array
	 * @param object
	 */
	public function getAllTables($objDC)
	{
		return \Contao\Database::getInstance()->listTables();
	}
	
	
	/**
	 * Return all fields as array from the selected table
	 * @object
	 */
	public function getFields($objDC)
	{
		if(strlen($objDC->activeRecord->selectdb_table) < 1)
		{
			return array();
		}
		
		$fields = \Contao\Database::getInstance()->getFieldNames($objDC->activeRecord->selectdb_table);
		
		$fields = array_combine($fields,array_values($fields));
		unset($fields['PRIMARY']);
		
		return $fields;
	}
}