<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */
 
/**
 * Namespace
 */
namespace PCT\CustomElements\Helper;

/**
 * Imports
 */
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * TableHelper
 */
class TableHelper extends \Contao\Backend
{
	/**
	 * Find a table class file by the table name
	 * @param string
	 * @return object
	 */
	public static function findTableClass($strTable)
	{
		switch($strTable)
		{
			// customelement
			case 'customelement.tl_module':
				$strClass = '\PCT\CustomElements\Backend\TableModule';
				break;
			case 'customelement.tl_pct_customelement':
				$strClass = '\PCT\CustomElements\Backend\TableCustomElement';
				break;
			case 'customelement.tl_pct_customelement_group':
				$strClass = '\PCT\CustomElements\Backend\TableCustomElementGroup';
				break;
			case 'customelement.tl_pct_customelement_attribute':
				$strClass = '\PCT\CustomElements\Backend\TableCustomElementAttribute';
				break;
			// customcatalog
			case 'tl_pct_customcatalog':
			case 'customcatalog.tl_pct_customcatalog':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomCatalog';
				break;
			case 'customcatalog.tl_module':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule';
				break;
			case 'customcatalog.tl_pct_customelement':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElement';
				break;
			case 'customcatalog.tl_pct_customelement_group':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementGroup';
				break;
			case 'customcatalog.tl_pct_customelement_groupset':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementGroupset';
				break;
			case 'customcatalog.tl_pct_customelement_attribute':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute';
				break;
			case 'customcatalog.tl_pct_customelement_filter':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementFilter';
				break;
			case 'customcatalog.tl_pct_customelement_filterset':
				$strClass = '\PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementFilterset';
				break;
			default:
				return false;
				break;
		}
		
		return $strClass;
	}
	
	
	/**
	 * Find a table class file name by a table name definition and return as object
	 * @param string
	 */
	public static function getTableClass($strTable)
	{
		$strClass = static::findTableClass($strTable);
		
		if(!class_exists($strClass))
		{
			return null;
		}
		
		return new $strClass;
	}
	
	
	/**
	 * Extract an sql defintion into an standardized array
	 * @param string
	 * @return array
	 * Idea taken from Mysqli Class
	 */
	public function getFieldSqlAsArray($strSql)
	{
		$arrChunks = preg_split('/(\([^\)]+\))/', $strSql, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);# explode(' ', $GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['sql']);
		
		$strSql = strtoupper($strSql);
		
		$arrTmp = array();
		if (!empty($arrChunks[1]))
		{
			$arrChunks[1] = str_replace(array('(', ')'), '', $arrChunks[1]);

			// Handle enum fields (see #6387)
			if ($arrChunks[0] == 'enum')
			{
				$arrTmp['length'] = $arrChunks[1];
			}
			else
			{
				$arrSubChunks = explode(',', $arrChunks[1]);
				$arrTmp['length'] = trim($arrSubChunks[0]);

				if (!empty($arrSubChunks[1]))
				{
					$arrTmp['precision'] = trim($arrSubChunks[1]);
				}
			}
		}
		
		$arrType = explode(' ', $arrChunks[0]);
		$arrTmp['type'] = $arrType[0];
		
		if($arrTmp['length'])
		{
			$arrTmp['origtype'] = $arrChunks[0] . '('.$arrTmp['length'].')';
		}
		else
		{
			$arrTmp['origtype'] = $arrChunks[0];
		}
		
		if (!empty($arrChunks[2]))
		{
			$arrTmp['attributes'] = trim($arrChunks[2]);
		}

		if ($objFields->Key != '')
		{
			switch ($objFields->Key)
			{
				case 'PRI':
					$arrTmp['index'] = 'PRIMARY';
					break;

				case 'UNI':
					$arrTmp['index'] = 'UNIQUE';
					break;

				case 'MUL':
					// Ignore
					break;

				default:
					$arrTmp['index'] = 'KEY';
					break;
			}
		}

		// Do not modify the order!
		#$arrTmp['collation'] = $objFields->Collation;
		
		if(strlen(strpos($strSql, 'DEFAULT')))
		{
			$strDefault = substr($strSql, strpos($strSql, "'"), strrpos($strSql, "'") );
			$strDefault = str_replace("'", '', $strDefault);
			if(strlen($strDefault) > 0)
			{
				$arrTmp['default'] = $strDefault;
			}
		}
		
		if(strlen(strpos($strSql, 'NOT NULL')) > 0)
		{
			$arrTmp['null'] = 'NOT NULL';
		}
		else if(strlen(strpos($strSql, 'NULL')) > 0)
		{
			$arrTmp['null'] = 'NULL';
		}
		
		return $arrTmp;
	}
	
	

	
}