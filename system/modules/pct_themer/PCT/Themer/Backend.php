<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\Themer;

/**
 * Imports
 */
use Contao\Model;
use Contao\Database;
use Contao\PageModel;
use Contao\Input;
use Contao\Config;
use Contao\BackendTemplate;
use Contao\Environment;
use Contao\Message;
use Contao\System;
use Contao\StringUtil;
use Contao\BackendUser;
use PCT\ThemeDesigner\Model as ThemeDesignerModel;


/**
 * Class file
 * Backend
 *
 */
class Backend extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		System::import(BackendUser::class, 'User');
		$this->Session = System::getContainer()->get('request_stack')->getSession();
		if( $this->Database === null )
		{
			$this->Database = \Contao\Database::getInstance();
		}
	}
	
	
	/**
	 * Modify the DCA on load
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if( empty($objDC->id) )
		{
			return;
		}
		
		$strModel = Model::getClassFromTable($objDC->table) ?? '';
		if($objDC->activeRecord === null && class_exists($strModel))
		{
			$objDC->activeRecord = $strModel::findByPk($objDC->id);
		}
		else if($objDC->activeRecord === null && !class_exists($strModel))
		{
			$objDC->activeRecord = Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$arrTemplates = $this->getTemplates();
		
		// remove the pct_theme_import button
		if(Input::get('act') == 'edit' && ($objDC->activeRecord->tstamp < 1 || strlen($objDC->activeRecord->pct_theme) < 1 || !$GLOBALS['PCT_THEMER']['THEMES'][$objDC->activeRecord->pct_theme]) || !$arrTemplates['demo_'.$objDC->activeRecord->pct_theme] )
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['pct_theme_import']);
		}
	}


	/**
	 * Show backend information when there are root pages without a theme designer save state
	 * @param mixed $objDC 
	 */
	public function showMissingThemeDesignerSavesInfo($objDC)
	{
		if( $objDC->table == 'tl_page' )
		{
			$t = PageModel::getTable();
			$objRoots = PageModel::findBy( array('('.$t.'.type=? OR type=?) AND '.$t.'.published=1 AND ('.$t.'.pct_theme!="" AND '.$t.'.pct_theme IS NOT NULL)'), array('root','rootFallback') );
			if ($objRoots === null)
			{
				return;
			}

			$arrNoSave = array();
			foreach($objRoots as $page)
			{
				if( ThemeDesignerModel::findByTheme( $page->pct_theme ) === null )
				{
					$arrNoSave[ $page->id ] = $page->pct_theme;
				}
			}
			
			if( !empty($arrNoSave) )
			{
				Message::addInfo( $GLOBALS['TL_LANG']['XPT']['pct_themer']['pages_with_no_layout_save'] ?? 'Root pages without Theme-Designer save states found.' );
			}
		}
	}
	

	/**
	 * Export the theme
	 * called via key: theme_export
	 */
	public function exportTheme($objDC=null)
	{
		if(!$this->User->isAdmin || !Config::get('pct_themer_export'))
		{
			return $this->redirect($this->getReferer());
		}

		\error_reporting(E_ERROR | E_PARSE | E_NOTICE);
		
		// check if page is a root page, and has a pct theme selected
		$objRoot = PageModel::findByPk($objDC->id);
		if($objRoot->type != 'root' || strlen($objRoot->pct_theme) < 1 || is_array($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]) == false)
		{
			return $this->redirect($this->getReferer());
		}
		
		$intPage = Input::get('page_id');
		$arrSession = $this->Session->all();
		$strTheme = $GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['label'] ?: $objRoot->pct_theme;
			
		// @obj \PCT\Themer
		$objThemer = new \PCT\Themer\Export;
		$objThemer->setName($strTheme);
		$objThemer->setRootPage($objRoot);
		
		// @obj \BackendTemplate
		$objTemplate = new BackendTemplate('be_page_pct_theme_export');
		$objTemplate->headline = sprintf($GLOBALS['TL_LANG']['pct_themer']['headline'], $strTheme);
		$objTemplate->subheadline = $GLOBALS['TL_LANG']['pct_themer']['infos']['collecting_data'];
		
		// back button
		$objTemplate->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="" href="'.$this->getReferer().'">'.$GLOBALS['TL_LANG']['MSC']['goBack'].'</a>';
		
		// @obj \Model\Collection
		#$objPages = PageModel::findMultipleByIds( $this->Database->getChildRecords($objRoot->id,'tl_page') );
		$ids = $this->Database->getChildRecords($objRoot->id,'tl_page',true);
		
		$objPages = $this->Database->prepare("SELECT * FROM tl_page WHERE id IN(".implode(',',$ids).")". (Config::get('pct_themer_published') ? " AND published=1" : ""). ' ORDER BY FIELD(id,'.implode(',',$ids).')' )->execute();
		
/*
		if(Config::get('pct_themer_published') && $_objPages->numRows > 0)
		{
			while($_objPages->next())
			{
				if($_objPages->pid == $objRoot->id)
				{
					$_arrPages[] = $_objPages->id;
					continue;
				}
				
				$objParent = $this->Database->prepare("SELECT * FROM tl_page WHERE id=?")->execute($_objPages->pid);
				if($objParent->id > 1 && $objParent->published)
				{
					$_arrPages[] = $_objPages->id;
				}
			}
		}
		else
		{
			$_arrPages = $_objPages->fetchEach('id');
		}
*/
		
		#$_arrPages = $_objPages->fetchEach('id');
		
		if($objPages->numRows < 1)
		{
			$objTemplate->hasGlobalError = true;
			$objTemplate->error = $GLOBALS['TL_LANG']['XPT']['pct_themer']['no_active_pages_found'] ?: 'No active pages found';
			return $objTemplate->parse();
		}
		
		$objTemplate->pages = $objPages;
		
		// collect data and store in the session
		if(Environment::get('isAjaxRequest') && Input::get('status') == 'run' && Input::get('page_id') > 0 && Input::get('page_id') != $objRoot->id)
		{
			$arrData = $objThemer->getRecordsByPageId( $intPage );
			// store the founds in the session
			$arrSession['PCT_THEMER']['EXPORT'][$objRoot->id][$intPage] = $arrData;	
		}
		// write the file
		else if(Input::get('status') == 'complete')
		{
			$arrData = $arrSession['PCT_THEMER']['EXPORT'][$objRoot->id] ?? array();
			
			if( empty($arrData) )
			{
				$objTemplate->hasGlobalError = true;
				$objTemplate->error = $GLOBALS['TL_LANG']['XPT']['pct_themer']['no_export_data'] ?: 'No export data found';
				return $objTemplate->parse();
			}
			
			$strFile = sprintf($GLOBALS['PCT_THEMER']['fileLogic'],$objRoot->pct_theme);
			
			$strContent = $objThemer->prepareFileContent( $objThemer->prepareExport($arrData) );
			
			$objFile = $objThemer->writeFile($strFile,$strContent);
			if(!$objFile)
			{
				$objTemplate->hasGlobalError = true;
				$objTemplate->error = 'File ('.$strFile.') could not be created.';
				return $objTemplate->parse();
			}
			
			// send to browser
			if($objFile !== null && (boolean)Input::get('download') === true)
			{
				// clear export session
				unset($arrSession['PCT_THEMER']['EXPORT'][$objRoot->id]);

				$objFile->sendToBrowser();
			}

			
			$objTemplate->content = sprintf($GLOBALS['TL_LANG']['pct_themer']['infos']['file_created'],$strFile);
		}
		
		// set the session
		$this->Session->replace($arrSession);	
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Import the theme
	 * 
	 * called via: pct_theme_import -> save_callback
	 */
	public function importTheme($objDC)
	{
		// skip if user did not press save or save and close
		if(!Input::post('save') && !Input::post('saveNclose'))
		{
			return;
		}

		\error_reporting(E_ERROR | E_PARSE | E_NOTICE);
		
		if(!$objDC->activeRecord)
		{
			$objDC->activeRecord = $this->Database->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if(!$objDC->activeRecord->pct_theme_import || $objDC->activeRecord->tstamp < 1 || strlen($objDC->activeRecord->pct_theme) < 1 || !array_key_exists('demo_'.$objDC->activeRecord->pct_theme, $this->getTemplates() ))
		{
			return;
		}
		
		#// no theme record selected
		#if($objDC->activeRecord->pct_theme_cto < 1)
		#{
		#	throw new \Exception($GLOBALS['TL_LANG']['XPT']['pct_themer']['no_theme_record_selected']);
		#	return 0;
		#}
		
		$arrSession = $this->Session->get('contao_backend');
		
		// return if there is already a session created
		if(isset($arrSession['PCT_THEMER']['IMPORT'][$objDC->activeRecord->id]))
		{
			Message::addError($GLOBALS['TL_LANG']['XPT']['pct_themer']['import_already_done']);
			return ;
		}		
		
		$strTheme = $GLOBALS['PCT_THEMER']['THEMES'][$objDC->activeRecord->pct_theme]['label'] ?: $objDC->activeRecord->pct_theme;
		
		// @var \PCT\Themer
		$objThemer = new \PCT\Themer;
		$objThemer->setName($strTheme);
		
		if( $objThemer->import($objDC->activeRecord->id) )
		{
			Message::addInfo($GLOBALS['TL_LANG']['pct_themer']['import_success']);
		}
		else
		{
			Message::addError('An error occurred while importing the demo template');
		}
		
		// reset the pct_theme value
		$this->Database->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('pct_theme_import'=>0))->execute($objDC->id);
	}
		
	
	/**
	 * Return the edit header button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function exportButton($row, $href, $label, $title, $icon, $attributes)
	{
		if(!$this->User->isAdmin || !Config::get('pct_themer_export') || $row['type'] != 'root')
		{
			return '';
		}
		
		// show alert when no theme is selected
		if(strlen($row['pct_theme']) < 1)
		{
			$href = '';
			$attributes = 'onclick="if(!alert(\'' . $GLOBALS['TL_LANG']['pct_themer']['alert_no_theme_selected'] . '\'))return false;Backend.getScrollOffset()"';
		}
		
		
		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ';
	}
	
	
	/**
	 * Return all demo templates as array
	 *
	 * @return array
	 */
	public function getTemplates()
	{
		return $this->getTemplateGroup('demo');
	}


	/**
	 * Create a new version
	 * @param object
	 *
	 * Called from save_callback
	 */
	public function addNewRecordsToVersion($objDC)
	{
		if($objDC->activeRecord->tstamp < 1)
		{
			return;
		}
		
		$objDatabase = Database::getInstance();

		// find latest version
		$objVersion = $objDatabase->prepare("SELECT * FROM tl_version WHERE fromTable=? AND pid=? AND userid=? AND username=? ORDER BY version DESC")->limit(1)->execute($objDC->table,$objDC->id,$this->User->id, $this->User->username);
		if($objVersion->numRows < 1)
		{
			return;
		}
		
		$arrSession = $this->Session->get('contao_backend');
		
		// add to versions record
		if($arrSession['PCT_THEMER']['IMPORT'][$objDC->id])
		{
			$arrVersion = StringUtil::deserialize($objVersion->data);
			$arrVersion['pct_themer_new_records'] = $arrSession['PCT_THEMER']['IMPORT'][$objDC->id];
		
			// update the version record
			$objDatabase->prepare("UPDATE tl_version %s WHERE id=?")->set(array('data'=>$arrVersion))->execute($objVersion->id);
		}
	}


	/**
	 * Remove records on version change
	 * @param object
	 *
	 * 	Called from onload_callback
	 */
	public function onVersionChange($objDC)
	{
		// remove the import entries stored in the current session
		if(Input::post('FORM_SUBMIT') == 'tl_version' && Input::post('version') != '')
		{
			$objVersion = $this->Database->prepare("SELECT * FROM tl_version WHERE fromTable=? AND pid=? AND version=? AND userid=? AND username=?")
			->limit(1)->execute($objDC->table,$objDC->id,Input::post('version'),$this->User->id, $this->User->username);
			if($objVersion->numRows < 1)
			{
				return;
			}
			
			$arrVersion = StringUtil::deserialize($objVersion->data);
			$arrRecords = $arrVersion['pct_themer_new_records'];
			if(!is_array($arrRecords) || count($arrRecords) < 1)
			{
				return;
			}
			
			foreach($arrRecords as $table => $ids)
			{
				$this->Database->execute("DELETE FROM ".$table." WHERE id IN(".implode(',', $ids).")");
				// write log
				System::getContainer()->get('monolog.logger.contao.general')->info("DELETE by PCT_THEMER on Version ".$objVersion->version." restore : ".$table.".id IN(".implode(',', $ids).")");
			}
		}
	}
}