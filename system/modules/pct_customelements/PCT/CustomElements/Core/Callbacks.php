<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 	Tim Gatzky 2014
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package 	pct_customelements
 * @link  		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core;

/**
 * Imports
 */

use Contao\Database;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Core\CustomElements as CustomElements;

/**
 * Class file
 * Callbacks
 *
 * Contains all functions called via hooks
 */
class Callbacks
{
	/**
	 * Store custom element ids in the session for various source tables
	 * @param array
	 * @param string
	 * @param object
	 * @return array
	 */
	public function observeClipboard($arrClipboard, $strTable, $objDC)
	{
		$arrReturn = array();
		if( in_array($strTable, array('tl_news','tl_calendar_events','tl_revolutionslider_slides')) )
		{
			$objDatabase = \Contao\Database::getInstance();
			$arrCustomElements = CustomElements::getInstance()->getCustomElements('tl_content');
			
			// fetch all content elements
			$objCte = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE pid IN(".implode(',', $arrClipboard).") AND ptable=? AND " . $objDatabase->findInSet('type',$arrCustomElements) . " ORDER BY sorting")->execute($strTable);
			if($objCte->numRows < 1)
		   	{
			   	return array();
			}
			
			while($objCte->next())
			{
				$arrIds[$objCte->pid][$objCte->sorting] = $objCte->id; 
			}
			
			$arrReturn = array
			(
				#'source'	=> $objDC->table,
				'ids'		=> $arrIds,
			);
		}
			
		return $arrReturn;
	}
	
	
	/**
	 * Create copies in the vault for various source tables
	 * @param integer	ID of the new contao record
	 * @param string	
	 * @param object
	 * @param object
	 */
	public function createCopyInVault($intRecord, $strTable, $objDC, $objDcaHelper)
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists('tl_pct_customelement_vault') )
		{
			return;
		}

		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		if( in_array($strTable, array('tl_news','tl_calendar_events','tl_revolutionslider_slides')) )
		{
			$objDatabase = \Contao\Database::getInstance();
			$arrSession = $objSession->get('pct_customelements');
			$arrCustomElements = CustomElements::getInstance()->getCustomElements('tl_content');
			
			// fetch the new entries
			$objNewCte = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE pid=? AND ptable=? AND ".$objDatabase->findInSet('type',$arrCustomElements)." ORDER BY sorting")
			->execute($intRecord,$strTable);
			
			if($objNewCte->numRows < 1)
			{
				return;
			}
			
			
			while($objNewCte->next())
			{
				$intSourcePid = $arrSession['clipboard'][$strTable]['PID'][$objDC->id][$objNewCte->sorting];
				$objDcaHelper->duplicateVaultEntry($objNewCte->id,$intSourcePid,'tl_content');
			}
			return;
		}
		else if( in_array($strTable, array('tl_news_archive','tl_calendar','tl_revolutionslider')) )
		{
			$objDatabase = \Contao\Database::getInstance();
			$arrCustomElements = CustomElements::getInstance()->getCustomElements('tl_content');
			$arrSession = $objSession->get('pct_customelements');
			
			$ptable = 'tl_news';
			$identField = 'headline';
			switch($strTable)
			{
				case 'tl_calendar': 
					$ptable = 'tl_calendar_events';
					$identField = 'title';
				case 'tl_revolutionslider': 
					$ptable = 'tl_revolutionslider_slides';
					$identField = 'title';
					break;
			}
			
			// fill the session, collect all CEs in news entries / calendar entries
			$objOld = $objDatabase->prepare("SELECT id,pid,".$identField." FROM ".$ptable." WHERE pid=?")->execute($objDC->id);
			if($objOld->numRows < 1) {return;}
			
			$ids = array();
			while($objOld->next())
			{
				$objCte = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE pid=? AND ptable=? AND ".$objDatabase->findInSet('type',$arrCustomElements)." ORDER BY sorting")
				->execute($objOld->id,$ptable);
				if($objCte->numRows < 1) 
				{
					continue;
				}
				
				$ids[$objOld->$identField] = $objOld->id;
				
				while($objCte->next())
				{
					$arrSession['clipboard'][$ptable]['PID'][$objOld->id][$objCte->sorting] = $objCte->id;
				}
			}
			$objSession->set('pct_customelements',$arrSession);
		
			$objNew = $objDatabase->prepare("SELECT id,pid,".$identField." FROM ".$ptable." WHERE pid=?")->execute($intRecord);
			if($objNew->numRows < 1)
			{
				return ;
			}
			
			// clone the datacontainer and mimic a call from a tl_news/tl_calendar_events table
			$dc = clone($objDC);
			$dc->table = $ptable;
			while($objNew->next())
			{
				$i = $objNew->$identField;
				$dc->id = $ids[$i];
				$dc->intId = $ids[$i];
				// call recursive
				$this->createCopyInVault($objNew->id,$ptable,$dc,$objDcaHelper);
			}
			return;
		}		
	}
	
	
	/**
	 * Remove entries from vault on delete
	 * @param integer
	 * @param string
	 * @param object
	 * @return array
	 */
	public function removeFromVault($intRecord, $strTable, $objDC)
	{
		$objDatabase = Database::getInstance();

		if( !$objDatabase->tableExists('tl_pct_customelement_vault') )
		{
			return array();
		}

		$arrReturn = array();
		if( in_array($strTable, array('tl_news','tl_calendar_events','tl_revolutionslider_slides')) )
		{
			$objDatabase = \Contao\Database::getInstance();
			
			$objCte = $objDatabase->prepare("SELECT id FROM tl_content WHERE pid=? AND ptable=?")->execute($intRecord,$strTable);
			if($objCte->numRows < 1)
			{
				return array();
			}
			
			$objVault = $objDatabase->prepare("SELECT id FROM tl_pct_customelement_vault WHERE pid IN(".implode(',', $objCte->fetchEach('id')).") AND source=?")->execute('tl_content');
			return $objVault->fetchEach('id');
		}
		
		else if( in_array($strTable, array('tl_news_archive','tl_calendar','tl_revolutionslider')) )
		{
			$ptable = '';
			switch($strTable)
			{
				case 'tl_news_archive':
					$ptable = 'tl_news';
					break;
				case 'tl_calendar':
					$ptable = 'tl_calendar_events';
					break;
				case 'tl_revolutionslider':
					$ptable = 'tl_revolutionslider_slides';
					break;
				default:
					return array();
					break;
			}
				
			$objDatabase = \Contao\Database::getInstance();
			
			$objArticles = $objDatabase->prepare("SELECT id FROM tl_news WHERE pid=?")->execute($intRecord);
			if($objArticles->numRows < 1)
			{
				return array();
			}
			
			$objCte = $objDatabase->prepare("SELECT id FROM tl_content WHERE pid IN(".implode(',', $objArticles->fetchEach('id')).") AND ptable=?")->execute($ptable);
			if($objCte->numRows < 1)
			{
				return array();
			}
			
			$objVault = $objDatabase->prepare("SELECT id FROM tl_pct_customelement_vault WHERE pid IN(".implode(',', $objCte->fetchEach('id')).") AND source=?")->execute('tl_content');
			return $objVault->fetchEach('id');
		}
		
		return $arrReturn;
	}
	
}