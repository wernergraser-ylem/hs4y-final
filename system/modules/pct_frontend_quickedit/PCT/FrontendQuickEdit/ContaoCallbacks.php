<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) Leo Feyer
 
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */


/**
 * Namespace
 */
namespace PCT\FrontendQuickEdit;

use Contao\CalendarEventsModel;
use Contao\Environment;
use Contao\FormModel;
use Contao\Image;
use Contao\FrontendTemplate;
use PCT\FrontendQuickEdit\Core as FrontendQuickEdit;
use Contao\StringUtil;
use PCT\FrontendQuickEdit\Controller;
use Contao\ModuleModel;
use Contao\NewsModel;
use Contao\ArticleModel;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\Model;
use Contao\System;

/**
 * Class file
 * FrontendQuickEdit
 *
 * Core class for the PCT FrontendQuickEdit
 */
class ContaoCallbacks extends Controller
{	
	/**
	 * Inject a unique CSS class as jquery selector for any element rendered
	 * @param mixed $objElement 
	 * @param mixed $blnReturn 
	 * @return boolean
	 */
	//! [isVisibleElement] Hook
	public function isVisibleElementCallback($objModel, $blnReturn)
	{
		if( Controller::isBackend() )
		{
			return $blnReturn;
		}
		else if( static::isActive() === false || $blnReturn === false )
		{
			return $blnReturn;
		}
		
		// exclude START to STOP wrapper
		if( isset($GLOBALS['EXCLUDE_WRAPPER']) && $GLOBALS['EXCLUDE_WRAPPER'] == $objModel->type )
		{
			unset($GLOBALS['EXCLUDE_WRAPPER']);
			return $blnReturn;
		}

		// exclude inbetween wrappers
		if( isset($GLOBALS['EXCLUDE_WRAPPER']) && $GLOBALS['EXCLUDE_WRAPPER'] !== null )
		{
			return $blnReturn;
		}

		$strTable = $objModel->table ?: '';
		if( \method_exists($objModel,'getTable') === true )
		{
			$strTable = $objModel->getTable();
		}
		
		// include module
		$objIncludeModel = null;
		if( $objModel->type == 'module' && (int)$objModel->module > 0 )
		{
			$objIncludeModel = ModuleModel::findByPk( $objModel->module );
		}
		// include form
		else if( $objModel->type == 'form' && (int)$objModel->form > 0 )
		{
			$objIncludeModel = FormModel::findByPk( $objModel->form );
		}
		
		// bypass modules that will be processed in the getFrontendElement Hook
		if( $strTable == 'tl_module' && in_array($objModel->type, array('html','code','pagearticle')) )
		{
			return $blnReturn;
		}

		// exclude certain elements
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES'][$strTable]) && \is_array($GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES'][$strTable]) === true )
		{
			if( \in_array($objModel->type,$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES'][$strTable]) === true )
			{
				return $blnReturn;
			}
		}
		// exclude START wrapper
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START'][$strTable]) && is_array($GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START'][$strTable]) === true )
		{
			if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START'][$strTable][$objModel->type])  )
			{
				$GLOBALS['EXCLUDE_WRAPPER'] = $GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START'][$strTable][$objModel->type];
				#return $blnReturn;
			}
		}
			
		$arrCssId = StringUtil::deserialize($objModel->cssID);
		if(!is_array($arrCssId))
		{
			$arrCssId = array();
		}

		// editing disabled by class
		$arrClasses = \array_map( 'trim', \explode(' ',$arrCssId[1] ?? '') );
		if( \in_array($GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssDisabledClass'],$arrClasses) )
		{
			return $blnReturn;
		}

		// add unique jquery selector to css class
		$strSelector = FrontendQuickEdit::getJquerySelector($strTable,$objModel->id);
		$arrClasses[] = $strSelector;

		if( $strTable == 'tl_form' )
		{
			$arrAttributes = StringUtil::deserialize($objModel->attributes);
			if( is_array($arrAttributes) && !empty($arrAttributes[1]) )
			{
				$arrAttributes[1] = implode(' ', array_merge($arrClasses, explode(' ',trim($arrAttributes[1])) ) );
			}
			$objModel->__set('attributes',$arrAttributes);
		}
		else
		{
			// inject the placeholder as css class
			$arrCssId[1] = \implode(' ',$arrClasses);
			$objModel->__set('cssID', $arrCssId);
		}


		// generate interface
		$strInterface =  FrontendQuickEdit::getInterfaceByModel($objModel);
		if( empty($strInterface) === false )
		{
			FrontendQuickEdit::addInterface($strSelector,$strInterface);
		}

		$objModel->table = $strTable;
		FrontendQuickEdit::addModel($strSelector,$objModel);
		
		// generate interface of the included element
		if( $objIncludeModel !== null )
		{
			$GLOBALS['is_include'] = true;
			return $this->isVisibleElementCallback($objIncludeModel,$blnReturn);
		}
		
		return $blnReturn;
	}


	/**
	 * Add a script placeholder to the page
	 * @param mixed $objPage 
	 * @param mixed $objLayout 
	 * @param mixed $objPageRegular 
	 * @return void 
	 * 
	 * called from generatePage Hook
	 */
	public function generatePageCallback($objPage, $objLayout, $objPageRegular)
	{
		if( Controller::isBackend() )
		{
			return;
		}
		else if( static::isActive() === false )
		{
			return;
		}
		
		if( empty($GLOBALS['PCT_QUICKEDIT_INTERFACES']) === true )
		{
			return;
		}

		$objLayout->script .= '###FRONTEND_QUICKEDIT_PLACEHOLDER###';
	}


	/**
	 * Add information to the template object
	 * @param object
	 * called from parseTemplate Hook
	 * 
	 * ! [parseTemplate] Hook
	 */
	public function parseTemplateCallback($objTemplate)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) === false )
		{
			return $objTemplate;
		}

		if( !isset($objTemplate->table) || empty($objTemplate->table) )
		{
			return $objTemplate;
		}

		$intId = $objTemplate->id;
		if( (int)$objTemplate->origID > 0 )
		{
			$intId = $objTemplate->origID;
		}

		$strClass = Model::getClassFromTable( $objTemplate->table );
		$objRow = $strClass::findByPk( $intId );
		if( $objRow === null )
		{
			return $objTemplate;
		}

		$arrClasses = \explode(' ', $objTemplate->class);
		
		$arrCssId = StringUtil::deserialize($objRow->__get('cssID'));
		$arrClasses[] = \trim( $arrCssId[1] ?? '' );

		$arrClasses = array_unique( array_filter($arrClasses) );
		
		// add to Contaos $this->class
		if( empty($arrClasses) === false)
		{
			$objTemplate->class = implode(' ', $arrClasses);
		}
	}
	
	
	/**
	 * Replace the script placeholder in the fe_page template
	 * @param string
	 * @param string
	 * @return string
	 *
	 * called from parseFrontendTemplate Hook
	 */
	public function parseFrontendTemplateCallback($strBuffer, $strTemplate)
	{
		if( strpos($strBuffer, '###FRONTEND_QUICKEDIT_PLACEHOLDER###') === false || static::isActive() === false )
		{
			return $strBuffer;
		}

		global $objPage;
		
		// replace inserttags here
		$strBuffer = System::getContainer()->get('contao.insert_tag.parser')->replace($strBuffer);
		#Controller::replaceInsertTags($strBuffer);
		
		System::loadLanguageFile('modules');

		// @var BackendUser
		$objUser = \PCT\FrontendQuickEdit\Controller::findActiveBackendUser();	
		if( $objUser === false )
		{
			return $strBuffer;
		}

		$strBackend = Environment::get('base').'contao';
		
		$objTemplate = new FrontendTemplate('script_pct_frontend_quickedit');
		$objTemplate->Page = $objPage;
		$objTemplate->selectors = \array_keys($GLOBALS['PCT_QUICKEDIT_INTERFACES']);
		$objTemplate->interfaces = $GLOBALS['PCT_QUICKEDIT_INTERFACES'];
		$objTemplate->models = $GLOBALS['PCT_QUICKEDIT_MODELS'];
		
		// backend buttons
		$arrButtons = array();
		// pages, tl_page
		
		if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'page') )
		{
			$params = array('do'=>'page','rt'=> Controller::request_token() );
			$arrButtons['page'] = array
			(
				'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_pagemount.svg') ?: Image::getHtml('system/themes/flexible/icons/pagemounts.svg'),
				'target' 	=> '_blank',
				'title'		=> $GLOBALS['TL_LANG']['MOD']['page'][1],
				'link'		=> $GLOBALS['TL_LANG']['MOD']['page'][0],
			);
		}
		// files, tl_files
		if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'files') )
		{
			$params = array('do'=>'files','rt'=>Controller::request_token());
			$arrButtons['files'] = array
			(
				'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_filemount.svg') ?: Image::getHtml('system/themes/flexible/icons/filemanager.svg'),
				'target' 	=> '_blank',
				'title'		=> $GLOBALS['TL_LANG']['MOD']['files'][1],
				'link'		=> $GLOBALS['TL_LANG']['MOD']['files'][0],
			);
		}
		$objTemplate->be_buttons = $arrButtons;
		
		// backend link
		$objTemplate->be_link = array
		(
			'href' 		=> '',
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_belink.svg') ?: Image::getHtml('system/themes/flexible/icons/content.svg'),
			'target' 	=> '_blank',
			'title'		=> $GLOBALS['TL_LANG']['PCT_FRONTEND_QUICKEDIT']['be_link'][1],
			'link'		=> $GLOBALS['TL_LANG']['PCT_FRONTEND_QUICKEDIT']['be_link'][0],
		);

		// replace the placeholder
		return str_replace('###FRONTEND_QUICKEDIT_PLACEHOLDER###', $objTemplate->parse(), $strBuffer);
	}


	/**
	 * Handle news entries
	 * @param object
	 * @param array
	 * @param object
	 */
	// ! [parseArticles] Hook
	public function parseArticlesCallback($objTemplate, $arrRow, $objModule)
	{
		$objModel = NewsModel::findByPk( $arrRow['id'] );
		$objModel->type = 'news';
		$objModel->table = NewsModel::getTable();
		
		$strSelector = FrontendQuickEdit::getJquerySelector($objModel->table,$objModel->id);
		$objTemplate->class .= ' '.$strSelector;
		// prepare the interface
		$this->isVisibleElementCallback($objModel,true);
	}


	/**
	 * Handle event entries
	 * @param array
	 * @param array
	 * @param integer
	 * @param integer
	 * @param object
	 * @return array
	 */
	// ! [getAllEvents] Hook
	public function getAllEventsCallback($arrEvents, $arrCalendars, $intStart, $intEnd, $objEvents)
	{
		foreach( $arrEvents as $k => $dates )
		{
			foreach( $dates as $kk => $events )
			{
				foreach($events as $i => $event)
				{
					$objModel = CalendarEventsModel::findByPk( $event['id'] );
					$objModel->type = 'calendar_event';
					$objModel->table = CalendarEventsModel::getTable();
					$strSelector = FrontendQuickEdit::getJquerySelector($objModel->table,$objModel->id);
					$event['class'] .= ' '.$strSelector;
					// prepare the interface
					$this->isVisibleElementCallback($objModel,true);
					// update events
					$arrEvents[$k][$kk][$i] = $event;
				}
				
			}
		}
		
		return $arrEvents;
	}


	/**
	 * Handle raw content elements and modules and add an additional seletor wrapper
	 * @param object
	 * @param string
	 * @param object
	 * @return string
	 * called from getContentElement Hook, getFrontendModule Hool
	 */
	// ! [getFrontendElementCallback]
	public function getFrontendElementCallback($objModel, $strBuffer)
	{
		if( Controller::isBackend() )
		{
			return $strBuffer;
		}
		else if( static::isActive() === false )
		{
			return $strBuffer;
		}
		
		// include module
		if( $objModel->type == 'module' && (int)$objModel->module > 0 )
		{
			$objModel = ModuleModel::findByPk( $objModel->module );
		}
		
		if( $objModel->type == 'pagearticle' )
		{
			global $objPage;
			
			$intArticle = $objPage->article;
			if( empty($objPage->article) )
			{
				$arrSources = array();

				$objParents = \Contao\PageModel::findParentsById($objPage->id);
				if($objParents !== null)
				{
					$intLevel = (int)$this->showLevel;
					foreach($objParents as $i => $pageModel)
					{
						// stop level out of scope or no image selected
						if( ($i >= $intLevel && $intLevel > 0) || (boolean)$pageModel->addArticle === false )
						{
							continue;
						}
					
						// collect article resources
						$arrSources[] = $pageModel->article;
					}
				}
					
				$arrSources = array_reverse( array_filter($arrSources) );
				
				$i = count($arrSources) - 1;
				$intArticle = $arrSources[$i] ?? 0;
			}
			
			$objModel = ArticleModel::findByPk( $intArticle );
			if( $objModel === null )
			{
				return $strBuffer;
			}
		}
		
		$strTable = $objModel->table ?: '';
		if( \method_exists($objModel,'getTable') === true )
		{
			$strTable = $objModel->getTable();
		}
		
		$arrReplaceTags = array();
		foreach( array('{{FRONTEND_QUICKEDIT}}','{{FRONTEND_QUICKEDIT|attr}}','{{FRONTEND_QUICKEDIT_PLACEHOLDER}}','FRONTEND_QUICKEDIT_PLACEHOLDER') as $k )
		{
			$blnHasInserttag = (boolean)\strpos( strtolower($strBuffer), strtolower($k));
			if( $blnHasInserttag === true )
			{
				$arrReplaceTags[] = $k;
			}
		}
		
		if( in_array($objModel->type, array('html','code')) === true || $blnHasInserttag )
		{
			// disable editing by css class
			$preg = \preg_match('/class="(.*?)\"/', $strBuffer, $arrResult);
			if( $preg && $blnHasInserttag === false )
			{
				$arrClasses = \array_map( 'trim', \explode(' ',$arrResult[1] ?: '') );
				if( \in_array($GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssDisabledClass'],$arrClasses) )
				{
					return $strBuffer;
				}
			}
			
			// find {{FRONTEND_QUICKEDIT}} placeholders, if not skip
			if ( $blnHasInserttag === false )
			{
				return $strBuffer;
			}
			
			$strSelector = FrontendQuickEdit::getJquerySelector($strTable,$objModel->id);
			// generate the interface
			$strInterface =  FrontendQuickEdit::getInterfaceByModel($objModel);
			
			if( empty($strInterface) === false )
			{
				FrontendQuickEdit::addInterface($strSelector,$strInterface);
			}

			$params = array('data-fq_inserttag="true"','data-fq="'.$strSelector.'"','data-table="'.$strTable.'"','data-id="'.$objModel->id.'"');
			if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable]) && $GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable] === true && isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable.'::'.$objModel->type]) && $GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable.'::'.$objModel->type] !== false )
			{
				$params[] = 'data-clicktoedit="true"';
			}
			
			// add model 	
			FrontendQuickEdit::addModel($strSelector,$objModel);
			$strBuffer = \str_replace($arrReplaceTags, \implode(' ',$params), $strBuffer);
			// add wrapper div with unique selector
			#$strBuffer = '<div class="'.$strSelector.'" data-table="'.$strTable.'" data-table="'.$strTable.'">'.$strBuffer.'</div>';
		}
	
		return $strBuffer;
	}


	/**
	 * Handle CustomCatalog entries
	 * @param array $arrEntries 
	 * @param object $objCC 
	 * @return array
	 */
	// ! [getCustomCatalogEntries] Hook
	public function getCustomCatalogEntriesCallback($arrEntries,$objCC)
	{
		if( empty($arrEntries) === true || Controller::isBackend() )
		{
			return $arrEntries;
		}
		else if( static::isActive() === false  )
		{
			return $arrEntries;
		}

		$strTable = $objCC->getTable();
		$strAlias = \PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::getBackendModuleAlias( $objCC->id );

		foreach($arrEntries as $entry)
		{
			$objModel = $entry->get('objActiveRecord');
			if( empty($objModel) === true || (int)$objModel->id < 1 )
			{
				continue;
			}
	
			// required backend info
			$objModel->table = $strTable;
			$objModel->do = $strAlias;
			$objModel->isCustomCatalog = true;
			
			$strSelector = FrontendQuickEdit::getJquerySelector($strTable,$objModel->id);
			
			$arrClasses = \array_map( 'trim', \explode(' ',$entry->class ?: '') );
			$arrClasses[] = $strSelector;
			$entry->class = \implode(' ',$arrClasses);

			// generate the interface
			$strInterface =  FrontendQuickEdit::getInterfaceByModel($objModel);
			if( empty($strInterface) === false )
			{
				FrontendQuickEdit::addInterface($strSelector,$strInterface);
			}
		}

		return $arrEntries;
	}


	/**
	 * Replace Inserttags
	 * @param mixed $strElement 
	 * @return mixed
	 */
	public function replaceInsertTagsCallback($strElement)
	{
		$arrTags = \explode('::',$strElement);
		if( \strtolower($arrTags[0]) == 'frontend_quickedit' )
		{
			return static::isActive() ? 'FRONTEND_QUICKEDIT_PLACEHOLDER' : ''; 
		}
		return false;
	}
}