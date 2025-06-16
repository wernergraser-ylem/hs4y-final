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
namespace PCT\AutoGrid;

use Contao\ArrayUtil;
use Contao\System;

/**
 * Class file
 * GridPreset
 * @doc Provide various methods for Grid presets
 */
class GridPreset extends \Contao\Controller
{
	/**
	 * Find all grid preset definitions
	 * @return array
	 */
	public static function getGridPresets()
	{
		return $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'] ?? array();
	}
	
	
	/**
	 * Find a grid preset definitions
	 * @return array
	 */
	public static function getGridPreset($strName)
	{
		return $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][$strName] ?? array();
	}
	
	
	/**
	 * Return all categories as array
	 * @return array
	 */
	public static function getCategories()
	{
		$arrPresets = static::getGridPresets();
		
		$arrReturn = array();
		foreach($arrPresets as $k => $v)
		{
			$category = $v['category'];
			
			if(strlen($category) > 0)
			{
				$arrReturn[] = $category;
			}
		}
		
		return array_unique(array_filter($arrReturn));
	}

		
	/**
	 * Import / insert the content element set
	 * @param string
	 * @param integer
	 * @return boolean
	 */
	public function importByName($strName)
	{
		if( Controller::isBackend() === false || strlen($strName) < 1)
		{
			return false;
		}
		
		// get grid preset definition
		$arrPresets = $this->getGridPresets();
		if( !isset($arrPresets[$strName]) )
		{
			return false;
		}
		
		$intIncrementSorting = 64;
		
		// @var object Database
		$objDatabase = \Contao\Database::getInstance();
		$strTable = \Contao\Input::get('table');
		
		$objPasteAfter = null;
		
		if(\Contao\Input::get('mode') == 1)
		{
			$objPasteAfter = \Contao\ContentModel::findByPk(\Contao\Input::get('pid'));
		}
		else if(\Contao\Input::get('mode') == 2 && $strTable == 'tl_content') // root
		{
			$ptable = $GLOBALS['TL_DCA'][$strTable]['config']['ptable'];
			
			// find lowest sorting
			$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE pid=? AND ptable=? ORDER BY sorting")->limit(1)->execute(\Contao\Input::get('pid'),$ptable);
			
			$sorting = ($objResult->sorting > 0 ? $objResult->sorting - 16 : 0);
			if($sorting < 0)
			{
				$sorting = 0;
			}
			
			// build psydo paste after element
			$objPasteAfter = new \StdClass;
			$objPasteAfter->pid = \Contao\Input::get('pid');
			$objPasteAfter->sorting = $sorting;
			$objPasteAfter->ptable = $ptable;
		}
		
		if($objPasteAfter === null)
		{
			return false;
		}
		
		$arrData = array();
		$time = time();
		$arrPreset = $arrPresets[$strName];
		
		// insert a wrapper start at first position
		$arrWrapper = array
		(
			'type' 				=> 'autogridGridStart',
			'pid'  				=> $objPasteAfter->pid,
			'ptable'			=> $objPasteAfter->ptable,
			'tstamp'			=> $time,
			'autogrid_grid'		=> $strName,
			'autogrid_css'		=> $arrPreset['grid']['desktop'],
			'autogrid_tablet'	=> $arrPreset['grid']['tablet'],
			'autogrid_mobile'	=> $arrPreset['grid']['mobile'],
		);
		// set default values
		if( !empty($arrPreset['default']) )
		{
			$arrWrapper = array_merge($arrWrapper,$arrPreset['default']);
		}
		ArrayUtil::arrayInsert($arrData[$strTable],0,array($arrWrapper));
		
		// add autogridColStart/Stop elements depending on the columns count
		if( (int)$arrPreset['columns'] > 0 )
		{
			$arrStart = $arrStop = array
			(
				'pid' 		=> $objPasteAfter->pid,
				'ptable' 	=> $objPasteAfter->ptable,
				'tstamp'	=> $time,
			);
			
			$arrStart['type'] = 'autogridColStart';
			$arrStop['type'] = 'autogridColStop';
					
			for($i = 1; $i <= (int)$arrPreset['columns']; $i++)
			{
				$arrData[$strTable][] = $arrStart;
				$arrData[$strTable][] = $arrStop;
			}
		}
		
		// insert a wrapper stop at last position
		$arrWrapper = array
		(
			'type' 				=> 'autogridGridStop',
			'pid'  				=> $objPasteAfter->pid,
			'ptable'			=> $objPasteAfter->ptable,
			'tstamp'			=> $time,
			'autogrid_grid'		=> $strName,
		);
		// set default values
		if( !empty($arrPreset['default']) )
		{
			$arrWrapper = array_merge($arrWrapper,$arrPreset['default']);
		}
		ArrayUtil::arrayInsert($arrData[$strTable],count($arrData[$strTable]),array($arrWrapper));
		
		$arrPids = array();
		$arrNewRecords = array();
		$arrMoveRecords = array();
		
		// prepare the set array
		$arrSorting = array('tl_content'=>(int)$objPasteAfter->sorting);
		
		foreach($arrData as $strTable => $arrRows)
		{
			$hasSorting = $objDatabase->fieldExists('sorting',$strTable);
			
			// check if there is an element at the same position
			if($hasSorting)
			{
				$objElementBelow = $objDatabase->prepare
				(
					"SELECT * FROM ".$strTable." WHERE sorting>?".
					((int)$objPasteAfter->pid > 0 ? " AND pid=?" : "").
					(strlen($objPasteAfter->ptable) > 0 ? " AND ptable=?" : "").
					" ORDER BY sorting"
				)->execute($objPasteAfter->sorting,$objPasteAfter->pid,$objPasteAfter->ptable);
				
				if($objElementBelow->numRows > 0)
				{
					$arrMoveRecords[$strTable] = array_merge($arrMoveRecords[$strTable] ?? array(),$objElementBelow->fetchEach('id'));
				}
			}
			
			foreach($arrRows as $i => $arrRow)
			{
				if($hasSorting)
				{
					// sorting
					$sorting = $arrSorting[$strTable] + $intIncrementSorting;
					
					$arrRow['sorting'] = $sorting;
										
					// remember sorting
					$arrSorting[$strTable] = $sorting;
				}
				
				// update
				$arrRow['pid'] = $objPasteAfter->pid;
				
				if(isset($arrRow['tstamp']))
				{
					$arrRow['tstamp'] = $time;
				}
				
				if(strlen($objPasteAfter->ptable) && $objDatabase->fieldExists('ptable',$strTable))
				{
					$arrRow['ptable'] = $objPasteAfter->ptable;
				}
				
				$arrData[$strTable][$i] = $arrRow;
			}
		}
		
		// make a key sort to sort tl_content before tl_pct_...
		ksort($arrData);
		
		// do the insert
		$arrInserts = array();
		foreach($arrData as $strTable => $arrRows)
		{
			$hasSorting = $objDatabase->fieldExists('sorting',$strTable);
			
			foreach($arrRows as $i => $row)
			{
				$type = $row['type'];
				$intOldId = $row['id'] ?? 0;
				unset($row['id']);
				
				$objInsert = $objDatabase->prepare("INSERT INTO ".$strTable." %s")->set($row)->execute();
				
				$_insertId = $objInsert->__get('insertId');
				
				if($intOldId > 0)
				{
					$arrPids[$strTable][$intOldId] = $_insertId;
				}
				
				// remember the ids by type
				$arrInserts[$strTable][$type][] = $_insertId;
				
				$arrNewRecords[$strTable][] = $_insertId;
			}
			
			// flag wrappers
			if( !empty($arrInserts) )
			{
				foreach($arrInserts as $strTable => $arrElements)
				{
					\PCT\AutoGrid\Controller::updateElementsWithoutIdentifyier($strTable,$arrElements);
				}
			}
			
			// move records
			if( isset($arrMoveRecords[$strTable]) && is_array($arrMoveRecords[$strTable]))
			{
				$arrMoveRecords[$strTable] = array_filter(array_unique($arrMoveRecords[$strTable]));
			}
			
			if(!empty($arrMoveRecords[$strTable]))
			{
				$objRecords = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE id IN(".implode(',', $arrMoveRecords[$strTable]).") ORDER BY sorting")->execute();
				while($objRecords->next())
				{
					$sorting = $arrSorting[$strTable] + $intIncrementSorting;
				
					$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set(array('sorting'=>$sorting))->execute($objRecords->id);
					
					$arrSorting[$strTable] = $sorting;	
				}
			}
		}
		
		// log new records
		if(count($arrNewRecords) > 0)
		{
			foreach($arrNewRecords as $strTable => $ids)
			{
				System::getContainer()->get('monolog.logger.contao.general')->info('New set "'.$strName.'" included in '.$strTable.' (ids:'.implode(',', $ids).')');
			}
		}
			
		return true;
	}	
}