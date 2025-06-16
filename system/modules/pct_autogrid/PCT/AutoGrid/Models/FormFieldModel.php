<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\AutoGrid\Models;

/**
 * Class
 * FormFieldModel
 */
class FormFieldModel extends \Contao\FormFieldModel
{
	/**
	 * Find a sibling, referenced record by its pid and ptable and autogrid_id
	 * @param integer
	 * @param string
	 * @param integer
	 * @param array
	 * @param boolean
	 * @return object||null
	 */
	public static function findSiblingByTypeAndPidAndAutoGridId($strType,$intPid,$intAutoGrid,$arrOptions=array(), $blnDoNotCache=false )
	{
		if(strlen(strpos($strType, 'Start')) > 0)
		{
			$strType = str_replace('Start', 'Stop', $strType);
		}
		$t = static::$strTable;
		$arrColumns = array("$t.id!=?","$t.pid=?","$t.autogrid_id=?","$t.type=?");
		$arrValues = array($intAutoGrid,$intPid,$intAutoGrid,$strType);

		// build an individual hash key
		$key = sha1( implode($t.'_',$arrValues) );
		if( isset($GLOBALS['PCT_AUTOGRID']['CACHE'][$key]) && (boolean)$blnDoNotCache === false )
		{
			return $GLOBALS['PCT_AUTOGRID']['CACHE'][$key];
		}
		
		$objReturn = static::findOneBy($arrColumns, $arrValues, $arrOptions);

		// add to cache
		$GLOBALS['PCT_AUTOGRID']['CACHE'][$key] = $objReturn;

		return $objReturn;
	}
	
	
	/**
	 * Find next consecutive record
	 * @param integer
	 * @param string
	 * @param integer
	 * @param string
	 * @param array
	 * @param boolean
	 * @return object||null
	 */
	public static function findNextPublished($objRow, $arrOptions=array(), $blnDoNotCache=false)
	{
		$t = static::$strTable;
		$arrColumns = array("$t.pid=?","$t.sorting > ?","$t.pid=?");
		$arrValues = array($objRow->pid,$objRow->sorting, $objRow->pid);
		
		// build an individual hash key
		$key = sha1( implode($t.'_',$arrValues) );
		if( isset($GLOBALS['PCT_AUTOGRID']['CACHE'][$key]) && (boolean)$blnDoNotCache === false )
		{
			return $GLOBALS['PCT_AUTOGRID']['CACHE'][$key];
		}

		$objReturn = static::findOneBy($arrColumns, $arrValues, $arrOptions);
		
		// add to cache
		$GLOBALS['PCT_AUTOGRID']['CACHE'][$key] = $objReturn;

		return $objReturn;
	}


	/**	
	 * Find the previous closest element
	 * @param integer		Element to start from
	 * @return object		Model
	 */
	public static function findPreviousById($intId,$arrOptions=array())
	{
		$objRow = static::findByPk($intId);
		if( $objRow === null )
		{
			return null;
		}
		
		// refresh the model
		$objRow->refresh();

		$t = static::$strTable;
		$arrColumns = array("$t.sorting < ?","$t.id != ?","$t.pid=?");
		$arrValues = array($objRow->sorting,$objRow->id,$objRow->pid);
		
		if( is_array($arrOptions['column']) )
		{
			$arrOptions['column'] = array_merge($arrColumns,$arrOptions['column']);
		}

		if( is_array($arrOptions['value']) )
		{
			$arrValues = array_merge($arrValues,$arrOptions['value']);
		}

		$arrOptions['order'] = $t.'.sorting DESC';
		
		return static::findOneBy($arrColumns, $arrValues, $arrOptions);
	}


	/**	
	 * Find the next closest element
	 * @param integer		Element to start from
	 * @return object		Model
	 */
	public static function findNextById($intId,$arrOptions=array())
	{
		$objRow = static::findByPk($intId);
		if( $objRow === null )
		{
			return null;
		}
		
		// refresh the model
		$objRow->refresh();

		$t = static::$strTable;
		$arrColumns = array("$t.sorting > ?","$t.id != ?","$t.pid=?");
		$arrValues = array($objRow->sorting,$objRow->id,$objRow->pid);
		
		if( is_array($arrOptions['column']) )
		{
			$arrOptions['column'] = array_merge($arrColumns,$arrOptions['column']);
		}

		if( is_array($arrOptions['value']) )
		{
			$arrValues = array_merge($arrValues,$arrOptions['value']);
		}

		$arrOptions['order'] = $t.'.sorting ASC';
		
		return static::findOneBy($arrColumns, $arrValues, $arrOptions);
	}


	/**
	 * Find all content elements between a start and stop element id
	 * @param integer
	 * @param integer
	 * @return object
	 * @param boolean
	 */
	public static function findBetween($intStart, $intStop, $arrOptions=array(), $blnDoNotCache=false)
	{
		$objStart = static::findByPk($intStart);
		$objStop = static::findByPk($intStop);
		
		if( $objStart === null || $objStop === null )
		{
			return null;
		}

		$t = static::$strTable;
		$arrColumns = array("id!=?","id!=?","$t.pid=?","$t.sorting BETWEEN ? AND ?");
		$arrValues = array($objStart->id,$objStop->id,$objStart->pid,$objStart->sorting,$objStop->sorting);

		if( !$arrOptions['order'] )
		{
			$arrOptions['order'] = "$t.sorting";
		}

		// build an individual hash key
		$key = sha1( implode($t.'_',$arrValues) );
		if( isset($GLOBALS['PCT_AUTOGRID']['CACHE'][$key]) && (boolean)$blnDoNotCache === false )
		{
			return $GLOBALS['PCT_AUTOGRID']['CACHE'][$key];
		}

		$objReturn = static::findBy($arrColumns, $arrValues, $arrOptions);

		// add to cache
		$GLOBALS['PCT_AUTOGRID']['CACHE'][$key] = $objReturn;

		return $objReturn;
	}


	/**
	 * Find all elements in between a start element by its it
	 * @param interger
	 * @param array
	 * @return object||null
	 */
	public static function findAllByStartId($intStart, $arrOptions=array())
	{
		$objStart = static::findByPk($intStart);
		$objStop = static::findSiblingByTypeAndPidAndAutoGridId($objStart->type,$objStart->pid,$objStart->autogrid_id,array());
		if( $objStart === null || $objStop === null )
		{
			return null;
		}
		$arrIds = array($intStart);
		
		$objBetween = static::findBetween($objStart->id,$objStop->id);
		if( $objBetween !== null )
		{
			$arrIds = array_merge( $arrIds, $objBetween->fetchEach('id') );
		}
		$arrIds[] = $objStop->id;
		
		$t = static::$strTable;
		if( !$arrOptions['order'] )
		{
			$arrOptions['order'] = "$t.sorting";
		}

		return static::findMultipleByIds($arrIds, $arrOptions);
	}
}