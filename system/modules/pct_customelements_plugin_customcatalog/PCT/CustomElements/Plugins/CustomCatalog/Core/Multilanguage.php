<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

use Contao\System;

/**
 * Class file
 * Multilanguage
 * Probide methods to work with multilanguage catalogs
 */
class Multilanguage extends System
{
	/**
	 * Table name
	 * @var string
	 */
	protected $strTable = 'tl_pct_customcatalog_language';
	
	/**
	 * Cache key
	 * @var string
	 */
	protected $strCache = 'LANGUAGE';

	
	public function __construct() {}

	/**
	 * Return the active language by a table name
	 * @param string
	 * @return string
	 */
	public static function getActiveBackendLanguage($strTable)
	{
		if( !Controller::isBackend() )
		{
			return '';
		}
		
		if(\Contao\Input::get('language') || isset($_GET['language']))
		{
			return \Contao\Input::get('language');
		}
		
		$arrSession = System::getContainer()->get('request_stack')->getSession()->get('pct_customelement_active_language');
		if( !isset($arrSession[$strTable]) || strlen($arrSession[$strTable]) < 1)
		{
			return '';
		}
		return $arrSession[$strTable];
	}
	
	
	/**
	 * Return the active language
	 * @param string
	 * @return string
	 */
	public static function getLanguage($strTable='')
	{
		if( Controller::isBackend() && strlen($strTable) > 0)
		{
			$arrSession = System::getContainer()->get('request_stack')->getSession()->get('pct_customelement_active_language');
			if( !isset($arrSession[$strTable]) )
			{
				return '';
			}
			
			return (strlen($arrSession[$strTable]) > 0 ? $arrSession[$strTable] : '');
		}
	}
	
	
	/**
	 * Set the active language
	 * @param string	The table name
	 * @param string	The language as string
	 */
	public static function setActiveBackendLanguage($strLanguage,$strTable)
	{
		if( !Controller::isBackend() )
		{
			return;
		}	
		$objSession = System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get('pct_customelement_active_language');
		$arrSession[$strTable] = $strLanguage;
		$objSession->set('pct_customelement_active_language',$arrSession);
	}
	
	
	/**
	 * Resets the active language for a table
	 * @param string
	 */
	public static function resetLanguageByTable($strTable)
	{
		$objSession = System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get('pct_customelement_active_language');
		unset($arrSession[$strTable]);
		$objSession->set('pct_customelement_active_language',$arrSession);
	}
	
	
	/**
	 * Return the active language string in the frontend
	 * @return string
	 */
	public static function getActiveFrontendLanguage()
	{
		$strLanguage = $GLOBALS['TL_LANGUAGE'];
		
		if(strlen(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'])) > 0 || strlen(\Contao\Input::post($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'])) > 0)
		{
			$strLanguage = \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']) ?: \Contao\Input::post($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']);
		}
		
		if(isset($GLOBALS['PCT_CUSTOMCATALOG']['activeFrontendLanguage']))
		{
			$strLanguage = $GLOBALS['PCT_CUSTOMCATALOG']['activeFrontendLanguage'];
		}	
		
		$strLanguage = str_replace('-','_',$strLanguage);
	
		return $strLanguage ?: '';
	}
	
	
	/**
	 * Return the base record id by a language entry id and language string
	 * @param integer	ID of the language record
	 * @param string	Tablename
	 * @param string	Language code
	 */
	public static function getBaseRecordId($intLanguageRecord,$strTable,$strLanguage)
	{
		$arrCache = Cache::getData();
		if( isset($arrCache['LANGUAGES'][$strTable][$intLanguageRecord]['pid']) )
		{
			return $arrCache['LANGUAGES'][$strTable][$intLanguageRecord]['pid'];
		}
		
		// look up from cache
		$objResult = \Contao\Database::getInstance()->prepare("SELECT pid FROM tl_pct_customcatalog_language WHERE id=? AND source=? AND lang=?")->limit(1)->execute($intLanguageRecord,$strTable,$strLanguage);
		return $objResult->numRows > 0 ? $objResult->pid : 0;
	}
	
	
	/**
	 * Return the language record id by a base entry id and language string
	 * @param integer	ID of the language record
	 * @param string	Tablename
	 * @param string	Language code
	 */
	public static function getLanguageRecordId($intRecord,$strTable,$strLanguage)
	{
		$arrCache = Cache::getData();
		if(!empty($arrCache['LANGUAGES'][$strTable]) && is_array($arrCache['LANGUAGES'][$strTable]))
		{
			foreach($arrCache['LANGUAGES'][$strTable] as $langid => $data)
			{
				if($data['pid'] == $intRecord && $data['lang'] == $strLanguage)
				{
					return $langid;
				}
			}
		}
		
		// look up from cache
		$objResult = \Contao\Database::getInstance()->prepare("SELECT id FROM tl_pct_customcatalog_language WHERE pid=? AND source=? AND lang=?")->limit(1)->execute($intRecord,$strTable,$strLanguage);
		return $objResult->numRows > 0 ? $objResult->id : 0;
		
	}
	
	
	/**
	 * Return the language record by a base entry id and language string
	 * @param integer	ID of the language record
	 * @param string	Tablename
	 * @param string	Language code
	 */
	public static function findLanguageRecord($intRecord,$strTable,$strLanguage)
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE id=? AND source=? AND lang=?")->limit(1)->execute($intRecord,$strTable,$strLanguage);
		return $objResult->numRows > 0 ? $objResult : null;
	}
	
	
	/**
	 * Return the base record by a base entry id and language string
	 * @param integer	ID of the record
	 * @param string	Tablename
	 * @param string	Language code
	 */
	public static function findBaseRecord($intRecord,$strTable,$strLanguage)
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE pid=? AND source=? AND lang=? GROUP BY pid")->limit(1)->execute($intRecord,$strTable,$strLanguage);
		return $objResult->numRows > 0 ? $objResult : null;
	}
	
	
	/**
	 * Return true if the given entry id is a language record
	 * @param integer	ID of the language record
	 * @param string	Tablename
	 * @param string	Language code
	 */
	public static function isLanguageRecord($intRecord,$strTable,$strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			return false;
		}
		$objResult = \Contao\Database::getInstance()->prepare("SELECT id FROM tl_pct_customcatalog_language WHERE id=? AND tstamp>0 AND source=?".(strlen($strLanguage) > 0 ? " AND lang='$strLanguage'" : ""))->limit(1)->execute($intRecord,$strTable);
		return $objResult->id > 0 ? true : false;
	}


	/**
	 * Return true if the given entry id is a base record
	 * @param integer	ID of the language record
	 * @param string	Tablename
	 */
	public static function isBaseRecord($intRecord,$strTable)
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT id FROM tl_pct_customcatalog_language WHERE pid=? AND source=?")->limit(1)->execute($intRecord,$strTable);
		return $objResult->numRows > 0 ? true : false;
	}

	
	/**
	 * Return all language records by a tablename and language code
	 * @param string	Tablename
	 * @param string	Language code
	 */
	public static function findLanguageRecords($strTable,$strLanguage='')
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT DISTINCT id FROM tl_pct_customcatalog_language WHERE source=?".(strlen($strLanguage) > 0 ? " AND lang='$strLanguage'" : " AND lang!=''"))->execute($strTable);
		return $objResult->numRows > 0 ? $objResult->fetchEach('id') : array();
	}
	
	
	/**
	 * Return all language siblings of a given record id by a tablename and language code
	 * param integer	ID of the base record
	 * @param string	Tablename
	 * @param string	Language code
	 * @return array	IDs of the language records
	 */
	public static function findLanguageSiblings($intBaseRecord,$strTable,$strLanguage='')
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT DISTINCT id FROM tl_pct_customcatalog_language WHERE id!=? AND pid=? AND source=?".(strlen($strLanguage) > 0 ? " AND lang='$strLanguage'" : ""))->execute($intBaseRecord,$intBaseRecord,$strTable);
		return $objResult->numRows > 0 ? $objResult->fetchEach('id') : array();
	}
	
	
	/**
	 * Return all language siblings associated by their language code
	 * param integer	ID of the base record
	 * @param string	Tablename
	 * @param string	Language code
	 * @return array	IDs of the language records associated by the language code
	 */
	public static function findAssocLanguageSiblings($intBaseRecord,$strTable,$strLanguage='')
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE id!=? AND pid=?  AND source=?".(strlen($strLanguage) > 0 ? " AND lang='$strLanguage'" : ""))->execute($intBaseRecord,$intBaseRecord,$strTable);
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			$arrReturn[$objResult->lang] = $objResult->id;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all language entries associated by their language code
	 * @param string	Tablename
	 * @param string	Language code
	 * @return array	IDs of the language records associated by the language code
	 */
	public static function findAssocLanguageRecords($strTable,$strLanguage='')
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE source=?".(strlen($strLanguage) > 0 ? " AND lang=?" : ""))->execute($strTable,$strLanguage);
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			$arrReturn[$objResult->lang][] = $objResult->id;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all base records by a tablename
	 * @param string	Tablename
	 * @param string	Language code
	 */
	public static function findBaseRecords($strTable)
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT id FROM ".$strTable." WHERE id IN( SELECT pid FROM tl_pct_customcatalog_language WHERE source=? GROUP BY pid )")->execute($strTable);
		return $objResult->numRows > 0 ? $objResult->fetchEach('id') : array();
	}
	
	
	/**
	 * Insert a new language entry
	 * @param integer	Id of the entry
	 * @param string	Table name
	 */
	public static function insertNewLanguageEntry($intId,$intBaseEntry,$strTable,$strLanguage)
	{
		$arrSet = array
		(
			'id'		=> $intId,
			'pid'		=> $intBaseEntry ?: 0,
			'lang'		=> $strLanguage ?: '',
			'source'	=> $strTable,
			'tstamp'	=> time(),
		);
		\Contao\Database::getInstance()->prepare("INSERT INTO tl_pct_customcatalog_language %s")->set($arrSet)->execute();
		
		if(strlen($strLanguage) > 0)
		{
			// log language ref
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('A new language reference has been saved for: '.$strTable.'.id='.$intBaseEntry. ' language '.$strLanguage);
		}
		else
		{
			// log base record
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('A new language base record has been saved for: '.$strTable.'.id='.$intBaseEntry);
		}
	}
	
	
	/**
	 * Update an existing language record
	 * @param integer	Id of the entry
	 * @param string	Table name
	 */
	public static function updateLanguageRecord($intId,$strTable,$arrSet)
	{
		\Contao\Database::getInstance()->prepare("UPDATE tl_pct_customcatalog_language %s WHERE id=? AND source=?")->set($arrSet)->execute($intId,$strTable);
	}
}