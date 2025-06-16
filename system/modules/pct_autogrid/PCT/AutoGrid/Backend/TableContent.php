<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\AutoGrid\Backend;

/**
 * Imports
 */

use Contao\ArrayUtil;
use Contao\BackendUser;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Database;
use Contao\Input;
use Contao\System;
use PCT\AutoGrid\Controller;
use PCT\AutoGrid\Models\ContentModel as ContentModel;
use PCT\AutoGrid\Core as AutoGrid;

/**
 * Class file
 * TableContent
 */
class TableContent extends \Contao\Backend
{
	/**
	 * Table
	 */
	protected $strTable = 'tl_content';
	
	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\Contao\System::import(BackendUser::class, 'User');
		$this->Session = \Contao\System::getContainer()->get('request_stack')->getSession();
		if( $this->Database === null )
		{
			$this->Database = \Contao\Database::getInstance();
		}
	}


	/**
	 * Perform self-check
	 * @param object
	 * 
	 * called from onload_callback
	 */
	public function selfCheckReferences($objDC)
	{
		$arrSession = $this->Session->get('NEW_AG_ELEMENTS');
		if( !is_array($arrSession) )
		{
			$arrSession = array();
		}
		
		// return when AG is in the middle of copy
		if( empty( $arrSession[$objDC->table] ) === false )
		{
			return;
		}

		$intPid = $objDC->id;
		$strPtable = $objDC->ptable ?: 'tl_article';
		$objDatabase = Database::getInstance();
		
		// check if there are AG start elements that has a not up to date reference
		$strWhere = '(type="autogridGridStart" AND autogrid_id != id) OR (type="autogridRowStart" AND autogrid_id != id) OR (type="autogridColStart" AND autogrid_id != id)';
		$objCheck = $objDatabase->prepare("SELECT COUNT(*) as count FROM ".$objDC->table." WHERE pid=? AND ptable=? AND (".$strWhere.")")->execute($intPid,$strPtable);
		
		if( $objCheck->count < 1 )
		{
			return;
		}

		$objElements = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE pid=? AND ptable=?")->execute($intPid,$strPtable);
		if( $objElements->numRows < 1 )
		{
			return;
		}

		while($objElements->next())
		{
			$dc = clone($objDC);
			$dc->id = $objElements->id;
			$this->storeNewElements($objElements->id,$dc);
		}
		
		$this->updateNewElements($objDC);
	}



	/**
	 * Modify the DCA
	 * @param object
	 * 
	 * called from onload_callback
	 */
	public function modifyDCA($objDC)
	{
		// Insert new flex preset button
		$tmp = array
		(
			'label'               => &$GLOBALS['TL_LANG']['MSC']['new_flex'],
			'icon'				  => PCT_AUTOGRID_PATH.'/assets/img/new_flex.svg',
			'href'                => '',
			'class'               => 'header_edit_all',
			'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"',
			'button_callback'	  =>array('PCT\AutoGrid\DcaHelper','getNewFlexButton'),
		);
		\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['list']['global_operations'],0,array('new_flex'=>$tmp));
		unset($tmp);
		
		
		// Insert delete with children button, delete whole block
		$tmp = array
		(
			'label'               => &$GLOBALS['TL_LANG']['MSC']['deleteBlock'],
			'href'                => 'action=delete_block',
			'icon'                => PCT_AUTOGRID_PATH.'/assets/img/delete_child.svg',
			'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteBlockConfirm'] . '\'))return false;Backend.getScrollOffset()"',			
			'button_callback'	  => array('PCT\AutoGrid\DcaHelper','getDeleteBlockButton'),
		);
		\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['list']['operations'],array_search('delete',array_keys($GLOBALS['TL_DCA']['tl_content']['list']['operations'] ?? array() ))+1,array('delete_block'=>$tmp));
		unset($tmp);


		// redirect to key=grid_preset after user clicked the paste button
		if( Controller::isBackend() && \Contao\Input::get('rkey') == 'grid_preset' && \Contao\Input::get('act') == 'create')
		{
			\Contao\Controller::redirect( \Contao\Controller::addToUrl('rkey=&amp;key=grid_preset&rt='.\Contao\Input::get('rt')) );
		}

		// toggle icon attributes (maybe some day Contao will respect them)
		$tmp = $GLOBALS['TL_DCA'][$objDC->table]['list']['operations']['toggle']['attributes'] ?? '';
		$tmp .= ' data-class="toggle"';
		$GLOBALS['TL_DCA'][$objDC->table]['list']['operations']['toggle']['attributes'] = $tmp;
		
		if( version_compare(ContaoCoreBundle::getVersion(),'5.3','<') )
		{
			// override the toggleIcon
			$GLOBALS['TL_DCA'][$objDC->table]['list']['operations']['toggle']['button_callback'] = array(\get_class($this),'toggleIconCallback');
		}
		
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);
		}

		if( $objDC->activeRecord === null )
		{
			return;
		}

		// load specific templates
		if( \in_array($objDC->activeRecord->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array(\get_class($this),'loadTemplates');
		}

		// autogrid fields
		$strPalette = $GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] ?? '';

		// make sure the palette has not been modified before
		if( !empty($strPalette) && strlen(strpos($strPalette, ',autogrid')) < 1 )
		{
			$replace = ',protected';
			if(strlen(strpos($strPalette, $replace)) > 0)
			{
				$strPalette = str_replace($replace,$replace.';{autogrid_legend},autogrid;',$strPalette);
			}
			else
			{
				$strPalette .= ';{autogrid_legend},autogrid;';
			}
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = $strPalette;
		}
	}


	/**
	 * Load templates to customTpl field
	 * @param object
	 * @return array
	 */
	public function loadTemplates($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);
		}

		if( $objDC->activeRecord === null )
		{
			return;
		}

		$arrReturn = array();

		switch( $objDC->activeRecord->type )
		{
			case 'autogridRowStart':
			case 'autogridRowStop':
				$arrReturn = $this->getTemplateGroup('ce_autogrid_row',array(),'ce_autogrid_row');
				unset( $arrReturn['ce_autogrid_row'] );
				break;
			case 'autogridGridStart':
			case 'autogridGridStop':
				$arrReturn = $this->getTemplateGroup('ce_autogrid_grid',array(),'ce_autogrid_grid');
				unset( $arrReturn['ce_autogrid_grid'] );
				break;
			case 'autogridColStart':
			case 'autogridColStop':
				$arrReturn = $this->getTemplateGroup('ce_autogrid_col',array(),'ce_autogrid_col');
				unset( $arrReturn['ce_autogrid_col'] );
				break;
			default: 
				return $this->getTemplateGroup('ce_');
				break;
		}

		return $arrReturn;
	}
	
	
	/**
	 * Adjust the backend limit to avoid open grid previews
	 */
	public function adjustLimit()
	{
		$intLimit = $GLOBALS['TL_CONFIG']['resultsPerPage'];
		
		$strPtable = 'tl_article';
		if( \Contao\Input::get('do') == 'news' )
		{
			$strPtable = 'tl_news';
		}
		else if( \Contao\Input::get('do') == 'calendar' )
		{
			$strPtable = 'tl_calendar_events';
		}

		$intPid = \Contao\Input::get('id');
		if( \Contao\Input::get('mode') !== null && in_array(\Contao\Input::get('mode'),array('copyAll','cutAll','paste','copy')) )
		{
			$intPid = \Contao\ContentModel::findByPk( \Contao\Input::get('id') )->pid;
		}
		
		// fetch all records to be displayed
		$objModels = \Contao\ContentModel::findBy( array('pid=?','ptable=?'), array($intPid,$strPtable), array('limit'=>$intLimit) );
		if($objModels === null)
		{
			return;
		}
		
		$arrIds = array();
		foreach($objModels as $i => $objModel)
		{
			$arrIds[] = $objModel->id;
			
			if( in_array($objModel->type, array('autogridGridStart','autogridRowStart')) === true )
			{
				$objStop = ContentModel::findSiblingByTypeAndPidAndPtableAndAutoGridId($objModel->type, $objModel->pid, $objModel->ptable, $objModel->autogrid_id);
				if( $objStop !== null )
				{
					$objBetween = ContentModel::findBetween($objModel->id, $objStop->id);
					if($objBetween)
					{
						$arrIds = array_merge($arrIds,$objBetween->fetchEach('id'));
					}
					$arrIds[] = $objStop->id;
				}
			}
		}
		
		$intCount = count( array_unique($arrIds) );
		
		if( $intLimit < $intCount )
		{
			$GLOBALS['TL_CONFIG']['resultsPerPage'] = $intCount;
			
			// log
			if($GLOBALS['PCT_AUTOGRID']['debug'] === true)
			{
				System::getContainer()->get('monolog.logger.contao.general')->info('Auto adjust backend list limit to fit grid view: tl_content.pid='.\Contao\Input::get('id'));
			}
		}
	}
	
	
	/**
	 * List elements
	 * @param array
	 * @return string
	 *
	 * called from child_record_callback
	 */
	public function listRecord($arrRow)
	{
		$arrHelperCallback = $GLOBALS['PCT_AUTOGRID']['child_record_callback']['tl_content'];
		
		$objHelper = new $arrHelperCallback[0];
		$strBuffer = $objHelper->{$arrHelperCallback[1]}($arrRow);
		
		// @var object
		$objModel = new ContentModel();
		$objModel->setRow($arrRow);
		
		// deactivate autogrid for any element not being a wrapper element
		if( !in_array($objModel->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) && (boolean)$objModel->autogrid === true)
		{
			// column started but not in a row || not in flex row in general
			if( (isset($GLOBALS['PCT_AUTOGRID']['autogridColStarted']) && !$GLOBALS['PCT_AUTOGRID']['autogridRowStarted']) || !$GLOBALS['PCT_AUTOGRID']['autogridRowStarted'])
			{
				$objModel->autogrid = 0;
				$this->setAutoGrid($objModel->id, false);
			}
			// element is in column and inside row
			else if( isset($GLOBALS['PCT_AUTOGRID']['autogridRowStarted']) && isset($GLOBALS['PCT_AUTOGRID']['autogridColStarted']) )
			{
				// check if element is wrapped between autogridRows or autogridCols
				$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridColStart')) ) );
				$objStart = ContentModel::findPreviousById($objModel->id, $arrOptions);
				if( $objStart->type == 'autogridRowStart')
				{
					$objModels = ContentModel::findAllByStartId($objStart->id);
					$arrIds = $objModels->fetchEach('id');
					if( \in_array($objModel->id, $arrIds) )
					{
						$objModel->autogrid = 1;
						$this->setAutoGrid($objModel->id, true);
					}
					else
					{
						$objModel->autogrid = 0;
						$this->setAutoGrid($objModel->id, false);
					}
				}
				else if( $objStart->type == 'autogridColStart' )
				{
					$objModel->autogrid = 0;
					$this->setAutoGrid($objModel->id, false);
				}
			}
		}
		
		// activate autogrid for wrapper elements
		if( in_array($objModel->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
		{
			$objModel->autogrid = 1;
		}

		

		// do not manipulate elements outside of AG
		#if( (boolean)$objModel->autogrid === false )
		#{
		#	return $strBuffer;
		#}
		
		//--- Rows
		$start = 'autogridRowStart';
		$stop = 'autogridRowStop';

		if( isset($GLOBALS['PCT_AUTOGRID']['autogridGridPreview_ids']) === false )
		{
			$GLOBALS['PCT_AUTOGRID']['autogridGridPreview_ids'] = array();
		}
		
		if($objModel->type == $start && !in_array($objModel->id, $GLOBALS['PCT_AUTOGRID']['autogridGridPreview_ids']))
		{
			$GLOBALS['PCT_AUTOGRID']['autogridRowStarted'] = true;

			$GLOBALS['PCT_AUTOGRID']['autogridRowsStart'][] = $objModel->id;
			
			// fetch the whole AG block
			// @var object
			$objModels = ContentModel::findAllByStartId($objModel->id);
			if($objModels !== null)
			{
				$arrIds = $objModels->fetchEach('id');
				$intStop = end( $arrIds );
				
				// store ids processed
				$GLOBALS['PCT_AUTOGRID']['autogridGridPreview_ids'][] = $objModel->id;#$arrIds;
				$GLOBALS['PCT_AUTOGRID']['autogridRowStarter'] = $objModel->id;
				$GLOBALS['PCT_AUTOGRID']['autogridRowStopper'] = $intStop;

				$GLOBALS['PCT_AUTOGRID']['autogridGridPreviews'][$objModel->id] = array
				(
					'ids'	=> $arrIds,
					'start'	=> $objModel->id,
					'stop'	=> $intStop#$objStop->id,
				);

				// generate backend grid view
				$objGridPreview = new \Contao\BackendTemplate('be_mod_grid_preview');
				$objGridPreview->setData( $objModel->row() );
				$objGridPreview->models = $objModels;
				$objGridPreview->flex = true;
				$strPreview = $objGridPreview->parse();
				$strPreview = \Contao\StringUtil::substrHtml($strPreview,strlen($strPreview));
				$GLOBALS['PCT_AUTOGRID']['autogridGridPreviews'][$objModel->id]['html'] = $strPreview;
			}
		}
		else if($objModel->type == $stop && isset($GLOBALS['PCT_AUTOGRID']['autogridRowStopper']) && $objModel->id == $GLOBALS['PCT_AUTOGRID']['autogridRowStopper'])
		{
			$GLOBALS['PCT_AUTOGRID']['autogridRowsStop'][] = $objModel->id;

			unset($GLOBALS['PCT_AUTOGRID']['autogridRowStarted']);
		}
		//--
		
		//-- Cols
		$start = 'autogridColStart';
		$stop = 'autogridColStop';
		if($objModel->type == $start)
		{
			$GLOBALS['PCT_AUTOGRID']['autogridColStarted'] = true;

			// start a new collection
			$GLOBALS['PCT_AUTOGRID']['autogridColsStart'][] = $objModel->id;
		}
		else if($objModel->type == $stop)
		{
			$GLOBALS['PCT_AUTOGRID']['autogridColsStop'][] = $objModel->id;

			unset($GLOBALS['PCT_AUTOGRID']['autogridColStarted']);
		}
		
		//-- Grids
		$start = 'autogridGridStart';
		$stop = 'autogridGridStop';
		
		if($objModel->type == $start)
		{
			$GLOBALS['PCT_AUTOGRID']['autogridGridStarted'] = true;

			// start a new collection
			$GLOBALS['PCT_AUTOGRID']['autogridGridStart'][] = $objModel->id;
			
			// fetch the whole AG block
			// @var object
			$objModels = ContentModel::findAllByStartId($objModel->id);

			if($objModels !== null)
			{
				$arrIds = $objModels->fetchEach('id');
				
				$GLOBALS['PCT_AUTOGRID']['autogridGridPreviews'][$objModel->id] = array
				(
					'ids'	=> $arrIds,
					'start'	=> $objModel->id,
					'stop'	=> end( $arrIds ),
				);
				
				// generate backend grid view
				$objGridPreview = new \Contao\BackendTemplate('be_mod_grid_preview');
				$objGridPreview->setData( $objModel->row() );
				$objGridPreview->models = $objModels;
				$objGridPreview->grid = true;
				$strPreview = $objGridPreview->parse();
				
				$strPreview = \Contao\StringUtil::substrHtml($strPreview,strlen($strPreview));
			
				$GLOBALS['PCT_AUTOGRID']['autogridGridPreviews'][$objModel->id]['html'] = $strPreview;
			}
		}
		else if($objModel->type == $stop)
		{
			$GLOBALS['PCT_AUTOGRID']['autogridGridStop'][] = $objModel->id;

			unset($GLOBALS['PCT_AUTOGRID']['autogridGridStarted']);
		}

		// @var object
		$objJsTemplate = new \Contao\BackendTemplate('be_js_autogrid');
		$objJsTemplate->setData( $objModel->row() );
		$objJsTemplate->context = 'listElement';
		$objJsTemplate->blnShowButtons = true;
		if( \in_array($objModel->type, array('autogridRowStart','autogridGridStart','autogridColStop','autogridRowStop','autogridGridStop') ) )
		{
			$objJsTemplate->blnShowButtons = false;
		}

		// add autogrid to template
		AutoGrid::addToTemplate($objJsTemplate);
		
		// collect a couple input related classes
		$arrInputClasses = array( \Contao\Input::get('act'), \Contao\Input::get('mode') );
		$objJsTemplate->input_classes = implode(' ', array_unique( array_filter( $arrInputClasses ) ) );

		// append the JS helper stuff
		$strBuffer .= $objJsTemplate->parse();
		
		if($objModel->autogrid_id && $GLOBALS['PCT_AUTOGRID']['debug'] === true)
		{
			// show reference
			$strBuffer .= '<div>'.$objModel->id.' <-> '.$objModel->autogrid_id .'</div>';
		}

		//---
		// !toggle autogrid in flex rows
		$start = 'autogridRowStart';
		$stop = 'autogridRowStop';
		
		if($objModel->type == $start)
		{
			$blnReload = false;
			// fetch the whole AG block
			// @var object
			$objModels = ContentModel::findAllByStartId($objModel->id);
			if($objModels !== null)
			{
				foreach($objModels as $model)
				{
					if( in_array($model->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) || (boolean)$model->autogrid === true )
					{
						continue;
					}

					$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridColStart')) ) );
					$objStart = ContentModel::findPreviousById($model->id, $arrOptions);
					if( $objStart->type == 'autogridColStart' && (boolean)$model->autogrid === false )
					{
						continue;
					}
				
					$this->setAutoGrid($model->id, true);
					
					// flag reload
					$blnReload = true;
				}		
			}
			
			if($blnReload === true)
			{
				\Contao\Controller::reload();
			}
		}

		return $strBuffer;	
	}
	
	
	/**
	 * Show the name of the grid preset as backend information to the user
	 * @param object
	 */
	public function showInfoInGridPresets($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);
		}
		
		if( in_array(\Contao\Input::get('act'),array('edit')) && $objDC->activeRecord->type == 'autogridGridStart' && !empty($objDC->activeRecord->autogrid_grid) )
		{
			$arrPreset = \PCT\AutoGrid\GridPreset::getGridPreset($objDC->activeRecord->autogrid_grid);
			$name = $GLOBALS['TL_LANG']['autogrid_grid'][ $objDC->activeRecord->autogrid_grid ] ?: $objDC->activeRecord->autogrid_grid;
			if($arrPreset['label'])
			{
				$name = $arrPreset['label'];
			}
			\Contao\Message::addInfo( sprintf($GLOBALS['TL_LANG']['AUTOGRID_MESSAGES']['gridInfo'],$name) );

			// show additional info when user settings varies from preset
			if( $objDC->activeRecord->autogrid_css != $arrPreset['grid']['desktop'] )
			{
				\Contao\Message::addInfo( sprintf($GLOBALS['TL_LANG']['AUTOGRID_MESSAGES']['gridInfo_customSettings'], $objDC->activeRecord->autogrid_css, $arrPreset['grid']['desktop']) );
			}
		}
	}
	
		
	/**
	 * Delete the sibling STOP element and AG Elements between when a START element is being deleted
	 * @param object
	 * @param integer
	 * 
	 * @called from ondelete_callback
	 */
	public function deleteSiblings($objDC,$intUndo)
	{
		// do not trigger in multi modes
		if( in_array(\Contao\Input::get('act'), array('select','deleteAll') ) )
		{
			return;
		}

		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);
		}
		
		$strType = $objDC->activeRecord->type;
		if( array_key_exists($strType, $GLOBALS['PCT_AUTOGRID']['deleteSiblingOnDelete']) === false )
		{
			return;
		}
				
		$objStop = ContentModel::findSiblingByTypeAndPidAndPtableAndAutoGridId($strType,$objDC->activeRecord->pid,$objDC->activeRecord->ptable,$objDC->activeRecord->autogrid_id);
		if( $objStop === null )
		{
			return;
		}
		
		$arrEffected = $GLOBALS['PCT_AUTOGRID']['deleteNestedOnDelete'][$strType] ?: array();

		$objBetween = ContentModel::findBetween($objDC->id, $objStop->id);
		if($objBetween !== null)
		{
			while($objBetween->next())
			{
				// do not delete elements depending on start element
				if( in_array($objBetween->type, $arrEffected) === false )
				{
					// turn AG off
					$model = ContentModel::findByPk($objBetween->id);
					$model->__set('autogrid',0);
					$model->save();
					continue;
				}

				// check if record is part of AG and delete it
				if( in_array($objBetween->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
				{
					$dc = clone($objDC);
					$dc->activeRecord = null;
					$dc->intId = $objBetween->id;
					$dc->delete(true);
				}
			}
		}
		
		// delete STOP
		$dc = clone($objDC);
		$dc->activeRecord = null;
		$dc->intId = $objStop->id;
		$dc->delete(true);
	}
	
	
	/**
	 * Update the autogrid references after copy events
	 * @param integer
	 * @param object
	 * 
	 * @called from oncopy_callback
	 */
	public function storeNewElements($intId, $objDC)
	{
		$objDC->activeRecord = \Contao\ContentModel::findByPk($intId);
		
		$strType = $objDC->activeRecord->type;
		
		if( in_array($strType, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) === false )
		{
			return;
		}
		
		$arrSession = $this->Session->get('NEW_AG_ELEMENTS');
		if( !is_array($arrSession) )
		{
			$arrSession = array();
		}
		
		$arrSession[$objDC->table][] = $intId;
		
		$this->Session->set('NEW_AG_ELEMENTS',$arrSession);
	}
	
	
	/**
	 * Update the newly created AG elements after copy
	 * @param object
	 */
	public function updateNewElements($objDC)
	{
		$arrSession = $this->Session->get('NEW_AG_ELEMENTS');
		
		if( empty($arrSession[$objDC->table]) === true )
		{
			return;
		}
		
		if( is_array($arrSession[$objDC->table]) === false )
		{
			return;
		}
		
		$arrElements = $arrSession[$objDC->table];
		
		// update the references in the grid
		$arrUpdated = \PCT\AutoGrid\Controller::updateElementsWithIdentifyier($objDC->table,$arrElements);
		
		// log
		if( empty($arrUpdated) === false )
		{
			System::getContainer()->get('monolog.logger.contao.general')->info('Updated AutoGrid elements (oncopy) in '.$objDC->table.': '.implode(',', $arrUpdated));			
		}
		unset($arrUpdated);
		
		//clear the session
		$arrSession[$objDC->table] = array();
		$this->Session->set('NEW_AG_ELEMENTS',$arrSession);
	}
	
	
	/**
	 * Observe the clipboard and add sibling AG elements to the clipboard
	 * @param object
	 * 
	 * @called from onload_callback
	 */
	public function observeClipboard($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);
		}
		
		$strType = $objDC->activeRecord->type ?? '';
	
		if( $objDC->activeRecord !== null && !in_array($strType, array('autogridGridStart','autogridColStart','autogridRowStart')) )		
		{
			return;
		}
		
		$arrClipboard = $this->Session->get('CLIPBOARD');
		#$strMode = $arrClipboard[$objDC->table]['mode'];
		
		$arrIds = $arrClipboard[$objDC->table]['id'] ?? array();
		
		if( isset($arrClipboard[$objDC->table]['id']) && !is_array($arrClipboard[$objDC->table]['id']) )
		{
			$arrIds = array( $arrClipboard[$objDC->table]['id'] );
		}
				
		if( empty($arrIds) === true )
		{
			return;
		}
				
		foreach($arrIds as $id)
		{
			$dc = clone($objDC);
			$dc->activeRecord = \Contao\ContentModel::findByPk($id);
			if( $dc->activeRecord === null )
			{
				continue;
			}

			$objStop = ContentModel::findSiblingByTypeAndPidAndPtableAndAutoGridId($strType,$dc->activeRecord->pid, $dc->activeRecord->ptable, $dc->activeRecord->autogrid_id);
			if($objStop === null)
			{
				continue;
			}
			
			$objBetween = ContentModel::findBetween($dc->id,$objStop->id);
			if($objBetween !== null)
			{
				$arrIds =  array_merge($arrIds, $objBetween->fetchEach('id') );
			}
			
			// add stop
			$arrIds[] = $objStop->id;
		}
	
		// cut
		if( \Contao\Input::get('mode') == 'cut' || \Contao\Input::get('act') == 'cut' )
		{
			$arrClipboard[$objDC->table]['id'] = $arrIds;
			$arrClipboard[$objDC->table]['mode'] = 'cutAll';
			$this->Session->set('CLIPBOARD',$arrClipboard);
			// simulate multiple cut
			if( \Contao\Input::get('act') == 'cut' )
			{
				$url = \Contao\StringUtil::decodeEntities( $this->addToUrl('act=cutAll') );
				$this->redirect( $url );
			}
		}
		// copy
		if( \Contao\Input::get('mode') == 'copy' || \Contao\Input::get('act') == 'copy' )
		{
			$arrClipboard[$objDC->table]['id'] = $arrIds;
			$arrClipboard[$objDC->table]['mode'] = 'copyAll';
			$this->Session->set('CLIPBOARD',$arrClipboard);
			// simulate multiple copy
			if( \Contao\Input::get('act') == 'copy' )
			{
				$url = \Contao\StringUtil::decodeEntities( $this->addToUrl('act=copyAll') );
				$this->redirect( $url );
			}
		}
	}
	
	
	/**
	 * Create sibling row-stop element
	 * @param integer
	 * @param object
	 */
	public function createSiblingStopElement($objDC)
	{
		$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);
		
		// no start element or just a submitOnChange
		if( array_key_exists($objDC->activeRecord->type, $GLOBALS['PCT_AUTOGRID']['createSiblingOnCreate']) === false || \Contao\Input::post('SUBMIT_TYPE') == 'auto' )
		{
			return;
		}
		
		// element is flagged, check if it has a stop sibling already
		$objStop = null;
		if( $objDC->activeRecord->autogrid_id > 0 )
		{
			$objStop = ContentModel::findSiblingByTypeAndPidAndPtableAndAutoGridId($objDC->activeRecord->type,$objDC->activeRecord->pid,$objDC->activeRecord->ptable,$objDC->activeRecord->autogrid_id);		
		}
		
		if( $objStop !== null )
		{
			return;
		}
		
		$strStop = $GLOBALS['PCT_AUTOGRID']['createSiblingOnCreate'][$objDC->activeRecord->type];
		
		$arrSet = $objDC->activeRecord->row();
		unset($arrSet['id']);
		// reference the start element
		$arrSet['type'] = $strStop;
		$arrSet['sorting'] = $objDC->activeRecord->sorting + 1;
		$arrSet['autogrid_id'] = $objDC->id;
		$this->Database->prepare("INSERT INTO ".$objDC->table." %s")->set($arrSet)->execute();
		
		// update this element
		$objDC->activeRecord->__set('autogrid_id',$objDC->id);
		$objDC->activeRecord->save();
	}


	/**
	 * oncopy event listener
	 * @param integer
	 * @param object
	 * 
	 * called from oncopy_callback
	 */
	public function oncopy_toggleAutoGrid($intId,$objDC)
	{
		// do not effect the block-copy-event from AG
		$arrSession = $this->Session->get('NEW_AG_ELEMENTS');
		if( isset($arrSession[$objDC->table]) && is_array($arrSession[$objDC->table]) === true && empty($arrSession[$objDC->table]) === false && \Contao\Input::get('act') == 'copyAll' )
		{
			return;
		}
		$dc = clone($objDC);
		$dc->id = $intId;
		$this->toggleAutoGrid($dc);
	}

	
	/**
	 * oncut event listener
	 * @param integer
	 * @param object
	 * 
	 * called from oncut_callback
	 */
	public function oncut_toggleAutoGrid($objDC)
	{
		$this->toggleAutoGrid( clone($objDC) );
	}


	/**
	 * Enable or disable AG on contao events or data container information
	 * @param object
	 */
	public function toggleAutoGrid($objDC=null)
	{
		if( $objDC === null || (int)$objDC->id < 1 )
		{
			return;
		}
		
		$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);

		$strSession = 'TOGGLE_AG_ELEMENTS_'.$objDC->table;
		// get further ids that should be ignored
		$arrIgnore = $this->Session->get($strSession ) ?: array();
		if( is_array($arrIgnore) === false )
		{
			$arrIgnore = array();
		}
		// do not manipulate elements effected when an AG Start elements is being called
		if( in_array($objDC->activeRecord->type,$GLOBALS['PCT_AUTOGRID']['startElements']) === true )
		{
			$objEffected = ContentModel::findAllByStartId($objDC->id);
			// store effected records in session
			if( $objEffected !== null )
			{
				$arrIgnore = array_unique( array_merge($arrIgnore, $objEffected->fetchEach('id')) );
				$this->Session->set($strSession,$arrIgnore);
			}
		}
		// if the element should no be effected return here
		if( in_array($objDC->id, $arrIgnore) === true )
		{
			// reduce array
			unset($arrIgnore[ array_search($objDC->id, $arrIgnore) ]);
			// update session
			$this->Session->set($strSession,$arrIgnore);
			return;
		}

		// check if element is wrapped between autogridRows or autogridCols
		$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridColStart')) ) );

		$objStart = ContentModel::findPreviousById($objDC->id, $arrOptions);
		#$objStart = $this->Database->prepare("SELECT * FROM ".$objDC->table." WHERE pid=? AND ptable=? AND sorting <= ? AND ".$this->Database->findInSet('type',array('autogridRowStart,autogridColStart'))." ORDER BY sorting ASC")->limit(1)->execute($objDC->activeRecord->pid,$objDC->activeRecord->ptable,$objDC->activeRecord->sorting);
		
		// no start element before and AG is active -> disable
		if( $objStart !== null && (int)$objStart->id < 1 && (boolean)$objDC->activeRecord->autogrid === true )
		{
			return $this->setAutoGrid($objDC->id, false);
		}
		
		// find stop element and elements between
		if( $objStart !== null )
		{
			$objStop = ContentModel::findSiblingByTypeAndPidAndPtableAndAutoGridId($objStart->type,$objStart->pid,$objStart->ptable,$objStart->autogrid_id);		
			if( $objStop !== null )
			{
				$objBetween = ContentModel::findBetween($objStart->id,$objStop->id,array(),true);
				$arrBetween = array();
				if( $objBetween !== null )
				{
					$arrBetween = $objBetween->fetchEach('id');
				}
		
				// elements is between grid columns
				if( in_array($objDC->id, $arrBetween) === true && $objStart->type == 'autogridColStart'  )
				{
					return $this->setAutoGrid($objDC->id, false);
				}
				// elements is between flex rows
				else if( in_array($objDC->id, $arrBetween) === true && $objStart->type == 'autogridRowStart'  )
				{
					return $this->setAutoGrid($objDC->id, true);
				}
				// between nothing
				else
				{
					return $this->setAutoGrid($objDC->id, false);
				}
			}
		}
	}


	/**
	 * Update the AutoGrid state for a certain record
	 * @param integer
	 * @param boolean
	 * @param array
	 */
	public function setAutoGrid($intId, $blnValue, $arrSet=array())
	{
		// @var object
		$objModel = \Contao\ContentModel::findByPk($intId);
		$objModel->__set('autogrid',$blnValue);
		if( count($arrSet) > 0 )
		{
			foreach($arrSet as $k => $v)
			{
				$objModel->__set($k,$v);
			}
		}
		$objModel->save();
		return $blnValue;
	}


	/**
	 * Active AutoGrid for new elements inbetween flex rows or deactivate inbetween cols
	 * @param integer
	 * @param object
	 * 
	 * called from onsubmit_callback
	 */
	public function activateAutoGridInFlexRows($objDC)
	{
		$objModel = ContentModel::findByPk($objDC->id);
		
		// fetch closest start element before
		$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridColStart')) ) );
		$objStart = ContentModel::findPreviousById($objDC->id, $arrOptions);
		
		// deactivate autogrid inbetween autogridCols
		if( $objStart !== null && $objStart->type == 'autogridColStart' )
		{
			$objBetween = ContentModel::findAllByStartId($objStart->id);
			if( $objBetween !== null )
			{
				if( in_array($objDC->activeRecord->id, $objBetween->fetchEach('id') ) && (boolean)$objModel->autogrid === true )
				{
					// show backend info
					\Contao\Message::addInfo($GLOBALS['TL_LANG']['AUTOGRID_MESSAGES']['colInfo']);

					// @var object
					$objModel->__set('autogrid',0);
					$objModel->save();
				}
			}
		}
		// activate autogrid inbetween autogridCols
		else if( $objStart !== null && $objStart->type == 'autogridRowStart' )
		{
			$objBetween = ContentModel::findAllByStartId($objStart->id);
			if( $objBetween !== null )
			{
				if( in_array($objDC->activeRecord->id, $objBetween->fetchEach('id') ) && (boolean)$objModel->autogrid === false )
				{
					// show backend info
					\Contao\Message::addInfo($GLOBALS['TL_LANG']['AUTOGRID_MESSAGES']['flexInfo']);

					// @var object
					$objModel->__set('autogrid',1);
					if( empty($objModel->autogrid_css) )
					{
						$objModel->__set('autogrid_css','col_12');
					}
					$objModel->save();
				}
			}
		}
	}


	/**
	 * Toggle autogrid block visibility listener
	 * @param object
	 */
	public function toggleBlockAjaxListener($objDC)
	{
		if( (boolean)\Contao\Environment::get('isAjaxRequest') === false || \Contao\Input::get('action') != 'toggleAutoGridBlockVisibility' || (int)\Contao\Input::get('elem') < 1 )
		{
			return;
		}

		$objElements = ContentModel::findAllByStartId( (int)\Contao\Input::get('elem') );
		if( $objElements === null )
		{
			return;
		}
		
		$blnVisible =  ( (int)\Contao\Input::get('state') == 0 ? false : true );
		$arrElements = $objElements->fetchEach('id');
		$intTime = time();

		$objSecurity = \Contao\System::getContainer()->get('security.helper');

		// call the tl_content.toggleVisibility for each element
		foreach($arrElements as $id)
		{
			$dc = clone($objDC);
			$dc->intId = $dc->id = $id;
			
			// Check the field access
			if ( !$objSecurity->isGranted('contao_user.alexf','tl_content::invisible') )
			{
				System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to publish/unpublish content element ID "'. $id.'"');
				
				throw new \Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to show/hide content element ID ' . $id . '.');
			
				\Contao\Controller::redirect('contao/main.php?act=error');
			}

			// @var object Version
			$objVersions = new \Contao\Versions('tl_content', $id);
			$objVersions->initialize();

			// update the record
			// @var object
			$objModel = ContentModel::findByPk( $id );
			$objModel->__set('invisible',($blnVisible === true ? 1 : 0) );
			if( version_compare(ContaoCoreBundle::getVersion(),'5.3','<') )
			{
				$objModel->__set('invisible',($blnVisible === true ? '1' : '') );
			}
			$objModel->__set('tstamp',$intTime);
			$objModel->save();

			// Trigger the save_callback
			if ( isset($GLOBALS['TL_DCA']['tl_content']['fields']['invisible']['save_callback']) && is_array($GLOBALS['TL_DCA']['tl_content']['fields']['invisible']['save_callback']))
			{
				foreach ($GLOBALS['TL_DCA']['tl_content']['fields']['invisible']['save_callback'] as $callback)
				{
					$blnVisible = \Contao\System::importStatic($callback[0])->{$callback[1]}($blnVisible,$dc);
				}
			}

			// create new version
			$objVersions->create();
		};
	}


	/**
	 * Toggle autogrid block visibility listener
	 * @param object
	 */
	public function toggleAutoGridFieldValue($objDC)
	{
		if( (boolean)\Contao\Environment::get('isAjaxRequest') === false || \Contao\Input::get('action') != 'toggleAutoGridFieldValue' || (int)\Contao\Input::get('elem') < 1 )
		{
			return;
		}

		$intId = (int)\Contao\Input::get('elem');
		$varValue =  \Contao\Input::get('state');
		$strField = \Contao\Input::get('field');

		// @var object Version
		$objVersions = new \Contao\Versions('tl_content', $intId );
		$objVersions->initialize();

		// update the record
		// @var object
		$objModel = ContentModel::findByPk( $intId  );
		
		// Trigger the save_callback
		if ( isset($GLOBALS['TL_DCA']['tl_content']['fields'][$strField]['save_callback']) && is_array($GLOBALS['TL_DCA']['tl_content']['fields'][$strField]['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_content']['fields'][$strField]['save_callback'] as $callback)
			{
				$varValue = \Contao\System::importStatic($callback[0])->{$callback[1]}($varValue,$objDC);
			}
		}

		$objModel->__set('tstamp', time() );
		$objModel->__set($strField,$varValue);
		$objModel->save();

		// create new version
		$objVersions->create();
	}


	/**
	 * Create a flex grid on preset
	 * @param object
	 */
	//! create flex from preset
	public function createFlexFromPreset($objDC)
	{
		if( (int)\Contao\Input::get('flex_cols') < 1 )
		{
			return;
		}

		$intIncrementSorting = 64;
		
		// @var object Database
		$objDatabase = \Contao\Database::getInstance();
		$strTable = $objDC->table;
		
		$objPasteAfter = null;
		
		if(Input::get('mode') == 1)
		{
			$objPasteAfter = ContentModel::findByPk(\Contao\Input::get('pid'));
		}
		else if(\Contao\Input::get('mode') == 2 && $strTable == 'tl_content') // root
		{
			$ptable = $GLOBALS['TL_DCA'][$strTable]['config']['ptable'];
			
			// find lowest sorting
			$objResult = Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE pid=? AND ptable=? ORDER BY sorting")->limit(1)->execute(Input::get('pid'),$ptable);
			
			$sorting = ($objResult->sorting > 0 ? $objResult->sorting - 16 : 0);
			if($sorting < 0)
			{
				$sorting = 0;
			}
			
			// build psydo paste after element
			$objPasteAfter = new \StdClass;
			$objPasteAfter->pid = Input::get('pid');
			$objPasteAfter->sorting = $sorting;
			$objPasteAfter->ptable = $ptable;
		}
		
		if($objPasteAfter === null)
		{
			return false;
		}

		$arrData = array();
		$time = time();
		
		// insert a wrapper start at first position
		$arrWrapper = array
		(
			'type' 				=> 'autogridRowStart',
			'pid'  				=> $objPasteAfter->pid,
			'ptable'			=> $objPasteAfter->ptable,
			'tstamp'			=> $time,
		);
		ArrayUtil::arrayInsert($arrData[$strTable],0,array($arrWrapper));
		
		// add autogridColStart/Stop elements depending on the columns count
		$intCols = Input::get('flex_cols');
		
		$strGrid = 'col_12';
		switch($intCols)
		{
			case 2: $strGrid = 'col_6'; break;
			case 3: $strGrid = 'col_4'; break;
			case 4: $strGrid = 'col_3'; break;
		}

		$arrStart = $arrStop = array
		(
			'pid' 		=> $objPasteAfter->pid,
			'ptable' 	=> $objPasteAfter->ptable,
			'tstamp'	=> $time,
		);
		
		$arrStart['autogrid_css'] = $strGrid;
		$arrStart['type'] = 'autogridColStart';
		$arrStop['type'] = 'autogridColStop';
				
		for($i = 1; $i <= $intCols; $i++)
		{
			$arrData[$strTable][] = $arrStart;
			$arrData[$strTable][] = $arrStop;
		}
		
		// insert a wrapper stop at last position
		$arrWrapper = array
		(
			'type' 				=> 'autogridRowStop',
			'pid'  				=> $objPasteAfter->pid,
			'ptable'			=> $objPasteAfter->ptable,
			'tstamp'			=> $time,
		);
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
					if( !isset($arrMoveRecords[$strTable]) )
					{
						$arrMoveRecords[$strTable] = array();
					}
					$arrMoveRecords[$strTable] = array_merge($arrMoveRecords[$strTable] ?: array(),$objElementBelow->fetchEach('id'));
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
				System::getContainer()->get('monolog.logger.contao.general')->info('New flex set included in '.$strTable.' (ids:'.implode(',', $ids).')');
			}
		}
		
		// clear clipboard
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrClipboard = $objSession->get('CLIPBOARD');
		unset($arrClipboard[$strTable]);
		$objSession->set('CLIPBOARD',$arrClipboard);
		
		// back and clear clipboard
		\Contao\Controller::redirect( $this->addToUrl('',true,array('act','mode','flex_cols') ) );
	}


	/**
	 * Inject class toggle in toggle icon in case it does not exist
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 */
	public function toggleIconCallback($row, $href, $label, $title, $icon, $attributes)
	{
		$objHelper = new \tl_content;
		$strReturn = '';

		if( \method_exists($objHelper,'toggleIcon') === true )
		{
			$strReturn = $objHelper->toggleIcon($row, $href, $label, $title, $icon, $attributes);
		}
		$strReturn = \str_replace('<a','<a data-class="toggle"',$strReturn);
		
		return $strReturn;
	}


	/**
	 * Toggle autogrid viewport listener
	 * @param object
	 */
	public function toggleAutoGridViewport()
	{
		if( (boolean)\Contao\Environment::get('isAjaxRequest') === false || \Contao\Input::post('action') != 'toggleAutoGridViewport')
		{
			return;
		}

		$strViewport = $this->Session->get('AUTOGRID_VIEWPORT') ?? '';
		if( Input::post('viewport') !== null )
		{
			$strViewport = Input::post('viewport');
		}
		$this->Session->set('AUTOGRID_VIEWPORT', $strViewport);
	}
}