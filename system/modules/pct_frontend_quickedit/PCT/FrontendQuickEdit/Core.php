<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */


/**
 * Namespace
 */
namespace PCT\FrontendQuickEdit;

use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\Environment;
use Contao\FrontendTemplate;
use Contao\StringUtil;
use Contao\Image;
use PCT\FrontendQuickEdit\Controller;

/**
 * Class file
 * Core
 */
class Core
{
	/**
	 * Add a new interface html string
	 * @param string	The unique selector
	 * @param string	The interface html output string
	 */
	public static function addInterface($strKey, $strValue)
	{
		$GLOBALS['PCT_QUICKEDIT_INTERFACES'][$strKey] = $strValue;
	}


	/**
	 * Add a new model
	 * @param string	The unique selector
	 * @param string	The model object
	 */
	public static function addModel($strKey, $objModel)
	{
		$GLOBALS['PCT_QUICKEDIT_MODELS'][$strKey] = $objModel;
	}


	/**
	 * Get the CSS/Jquery selector
	 * @param integer $strTable 
	 * @param integer $intId 
	 * @return string
	 */
	public static function getJquerySelector($strTable,$intId)
	{
		if( !isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['_COUNTER_'][$strTable][$intId]) )
		{
			$GLOBALS['PCT_FRONTEND_QUICKEDIT']['_COUNTER_'][$strTable][$intId] = 0;
		}
		// check if element has been used before
		return \sprintf($GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssIdLogic'],$strTable.'-'.$intId.'_'.(int)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['_COUNTER_'][$strTable][$intId]);
	}


	/**
	 * Return the size css class
	 * @param string
	 * @return string
	 */
	// !getSizeClass
	public static function getSizeClass($strElement,$strButton='')
	{
		$arrSizes = $GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES'] ?? array();
		
		if ( empty($arrSizes) === true )
		{
			return 'size-s';
		}
		
		$strReturn = $arrSizes[ $strElement ] ?? 'size-s';
		if( strlen($strButton) > 0 && isset($arrSizes[ $strElement.'::'.$strButton ]) )
		{
			$strReturn = $arrSizes[ $strElement.'::'.$strButton ];
		}
		
		return $strReturn;
	}


	/**
	 * Generate the interface
	 * @param object
	 * @param string	Frontend template 
	 * @return string
	 */
	public static function getInterfaceByModel($objModel, $strTemplate='')
	{
		$strTable = $objModel->table;
		
		if( \method_exists($objModel,'getTable') === true )
		{
			$strTable = $objModel->getTable();
		}

		if( $objModel->isCustomCatalog )
		{
			$strTable = 'isCustomCatalog';
		}

		// template
		if( empty($strTemplate) === true )
		{
			$strTemplate = $GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements'][$strTable];
			// special template
			if( $objModel->type !== null && isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements'][$strTable.'::'.$objModel->type]) )
			{
				$strTemplate = $GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements'][$strTable.'::'.$objModel->type];
			}
		}
				
		$strReturn = '';
		switch($strTable)
		{
			case 'tl_content':
				if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'article') && Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_ELEMENT_TYPE, $objModel->type )  )
				{
					$strReturn = static::interface_contentelement($objModel, $strTemplate);
				}
				break;
			case 'tl_article':
				if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'article') )
				{
					$strReturn = static::interface_article($objModel, $strTemplate);
				}
				break;
			case 'tl_module':
				if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_THEME,'modules') && Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'themes') && Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_FRONTEND_MODULE_TYPE, $objModel->type ) )
				{
					$strReturn = static::interface_module($objModel, $strTemplate);
				}
				break;
			case 'tl_news':
				if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'news') )
				{
					$strReturn = static::interface_news($objModel, $strTemplate);
				}
				break;
			case 'tl_calendar_events':
				if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'calendar') )
				{
					$strReturn = static::interface_events($objModel, $strTemplate);
				}
				break;
			case 'tl_form':
				if( Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'form') && Controller::hasAccess( ContaoCorePermissions::USER_CAN_EDIT_FORM,$objModel->id) )
				{
					$strReturn = static::interface_form($objModel, $strTemplate);
				}
				break;
			case 'isCustomCatalog':
				$strReturn = static::interface_customcatalog($objModel, $strTemplate);
				$strTable = $objModel->getTable();
				break;
			default:
				$strReturn = static::interface_default($objModel, $strTemplate);
				break;
		}

		if( empty($strReturn) === false )
		{
			if( !isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['_COUNTER_'][$strTable][$objModel->id]) )
			{
				$GLOBALS['PCT_FRONTEND_QUICKEDIT']['_COUNTER_'][$strTable][$objModel->id] = 0;
			}
			// count interfaces processed for each element
			$GLOBALS['PCT_FRONTEND_QUICKEDIT']['_COUNTER_'][$strTable][$objModel->id]++;
		}

		return $strReturn;
	}


	// !-- interface_default
	protected static function interface_default($objModel, $strTemplate='')
	{
		$strTable = $objModel->table;
		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);

		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		$objConfig->ptable = $objModel->ptable ?: 'tl_article';
		$objConfig->do = $objModel->do;
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);

		// operation buttons
		$strBackend = Environment::get('base').'contao';
		$arrLabels = $GLOBALS['TL_LANG'][$objConfig->table];

		// generate the buttons
		$objConfig->buttons = array();
		
		// edit
		$params = array('do'=>$objConfig->do,'table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=> Controller::request_token() ,);
		$objConfig->buttons['edit'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_edit.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'edit',
			'title'		=> sprintf( $arrLabels['edit'][1], $objConfig->id ),
		);
		
		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate ?: 'interface_default' );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer;
		$objTemplate->selector = $objConfig->selector;
		$objTemplate->buttons = $objConfig->buttons;
		$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];

		return $objTemplate->parse();
	}


	// !-- interface_contentelement
	protected static function interface_contentelement($objModel, $strTemplate='')
	{
		$strTable = 'tl_content';
		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);
		if( isset($objModel->ptable) && !empty($objModel->ptable) )
		{
			Controller::loadLanguageFile($objModel->ptable);
		}
		
		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		$objConfig->ptable = $objModel->ptable ?: 'tl_article';
		
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);

		// operation buttons
		$strBackend = Environment::get('base').'contao';
		$arrLabels = $GLOBALS['TL_LANG'][$objConfig->table];
		$arrLabelsPtable = $GLOBALS['TL_LANG'][$objConfig->ptable];
			
		// generate the buttons
		$objConfig->buttons = array();
		
		$strSizeKey = 'contentelements';
		// ! tl_article
		if( $objModel->ptable == 'tl_article' )
		{
			$params = array('do'=>'article','table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=> Controller::request_token() ,);
			$title = $arrLabels['edit'] ?? '';
			if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
			{
				$title = $arrLabels['edit'][1];
			}
			$objConfig->buttons['edit'] = array
			(
				'href' 	=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_edit.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'edit',
				'title'		=> sprintf($title, $objConfig->id ),
				'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
			);
			// list view
			unset( $params['act'] );
			
			$params['id'] = $objConfig->pid;
			$title = $arrLabelsPtable['edit'] ?? '';
			if( isset($arrLabelsPtable['edit']) && is_array($arrLabelsPtable['edit']) )
			{
				$title = $arrLabelsPtable['edit'][1];
			}
			$objConfig->buttons['edit_list'] = array
			(
				'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'edit_list',
				'title'		=> sprintf( $title, $objConfig->id ),
				'attributes' => ' data-key="edit_list" data-css="listview tl_content-listview" data-size="'.static::getSizeClass($strSizeKey,'edit_list').'"'
			);
		}
		// ! tl_news
		else if( $objModel->ptable == 'tl_news' )
		{
			$title = $arrLabels['edit'] ?? '';
			if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
			{
				$title = $arrLabels['edit'][1];
			}
			$params = array('do'=>'news','table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
			$objConfig->buttons['edit'] = array
			(
				'href' 	=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_edit.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'edit',
				'title'		=> sprintf( $title, $objConfig->id ),
				'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
			);
			
			$params = array('do'=>'news','table'=>$objConfig->table,'id'=>$objConfig->pid,'rt'=>Controller::request_token(),);
			$title = $arrLabels['editheader'] ?? '';
			if( isset($arrLabels['editheader']) && is_array($arrLabels['editheader']) )
			{
				$title = $arrLabels['editheader'][1];
			}
			$objConfig->buttons['editheader'] = array
			(
				'href' 	=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_edit.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'editheader',
				'title'		=> sprintf( $title, $objConfig->id ),
				'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'editheader').'"'
			);
			
			$params = array('do'=>'news','table'=>$objConfig->ptable,'id'=>$objConfig->pid,'rt'=>Controller::request_token(),);
			$objConfig->buttons['editplist'] = array
			(
				'href' 	=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'editplist',
				'title'		=> sprintf( $title, $objConfig->id ),
				'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'editplist').'"'
			);
		}
		// ! tl_calendar
		else if( $objModel->ptable == 'tl_calendar_events' )
		{
			$params = array('do'=>'calendar','table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
			$title = $arrLabels['edit'] ?? '';
			if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
			{
				$title = $arrLabels['edit'][1];
			}
			$objConfig->buttons['edit'] = array
			(
				'href' 	=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_edit.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'edit',
				'title'		=> sprintf( $title, $objConfig->id ),
				'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
			);
			
			$params = array('do'=>'calendar','table'=>$objConfig->table,'id'=>$objConfig->pid,'rt'=>Controller::request_token(),);
			$title = $arrLabels['editheader'] ?? '';
			if( isset($arrLabels['editheader']) && is_array($arrLabels['editheader']) )
			{
				$title = $arrLabels['editheader'][1];
			}
			$objConfig->buttons['editheader'] = array
			(
				'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'editheader',
				'title'		=> sprintf( $title, $objConfig->id ),
				'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'editheader').'"'
			);
		}
		else
		{
			// hook
		}

		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons;
		$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable.'::'.$objModel->type]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable.'::'.$objModel->type];
		}

		return $objTemplate->parse();
	}


	// !-- interface_article
	protected static function interface_article($objModel, $strTemplate='')
	{
		$strTable = 'tl_article';
		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);
		Controller::loadLanguageFile('modules');

		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		$objConfig->ptable = $GLOBALS['TL_DCA'][$strTable]['config']['ptable'] ?? 'tl_article';
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);

		// operation buttons
		$strSizeKey = 'articles';
		$strBackend = Environment::get('base').'contao';
		$arrLabels = array_merge($GLOBALS['TL_LANG'][$objConfig->table], $GLOBALS['TL_LANG']['MOD']);

		// generate the buttons
		$objConfig->buttons = array();
		
		// list view
		$params = array('do'=>'article','table'=>'tl_content','id'=>$objConfig->id,'rt'=>Controller::request_token(),);
		$title = $arrLabels['edit'] ?? '';
		if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
		{
			$title = $arrLabels['edit'][1];
		}
		$objConfig->buttons['editheader'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg'),
			'target' 	=> '',
			'class'		=> 'editheader',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-key="editheader" data-size="'.static::getSizeClass($strSizeKey,'editheader').'"'
		);
		// edit
		$params = array('do'=>'article','table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
		$title = $arrLabels['editheader'] ?? '';
		if( isset($arrLabels['editheader']) && is_array($arrLabels['editheader']) )
		{
			$title = $arrLabels['editheader'][1];
		}
		$objConfig->buttons['edit'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_setting.svg'),
			'target' 	=> '',
			'class'		=> 'edit',
			'title'		=> sprintf($title, $objConfig->id ),
			'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
		);

		// edit_node 
		$title =  $arrLabels['article'] ?? '';
		if( isset($arrLabels['article']) && is_array($arrLabels['article']) )
		{
			$title =  $arrLabels['article'][1];
		}
		
		$params = array('do'=>'article','pn'=>$objModel->pid,'rt'=>Controller::request_token());
		$objConfig->buttons['edit_node'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_articles_overview.svg'),
			'target' 	=> '',
			'class'		=> 'edit_node',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-key="edit_node" data-size="'.static::getSizeClass($strSizeKey,'edit_node').'"'
		);
		
		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons;
		$objTemplate->clickToEdit = false;
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];
		}
		return $objTemplate->parse();
	}


	// !-- interface_module
	protected static function interface_module($objModel, $strTemplate='')
	{
		$strTable = $objModel::getTable();
		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);

		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);
		// operation buttons
		$strSizeKey = 'modules';
		$strBackend = Environment::get('base').'contao';
		$arrLabels = $GLOBALS['TL_LANG'][$objConfig->table];

		// generate the buttons
		$objConfig->buttons = array();
		
		// edit
		$params = array('do'=>'themes','table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
		$title = $arrLabels['edit'] ?? '';
		if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
		{
			$title = $arrLabels['edit'][1];
		}
		$objConfig->buttons['edit'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_setting.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'edit',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
		);

		// type: navigation
		if( \in_array($objModel->type, array('navigation','customnav')) && Controller::hasAccess( ContaoCorePermissions::USER_CAN_ACCESS_MODULE,'page') )
		{
			Controller::loadLanguageFile('modules');
			
			// edit tl_page
			$params = array('do'=>'page','rt'=>Controller::request_token(),);
			$objConfig->buttons['edit_page'] = array
			(
				'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
				'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_pagemount_small.svg'),
				'target' 	=> $objUser->pct_frontend_quickedit_target,
				'class'		=> 'edit_page',
				'title'		=> sprintf( $GLOBALS['TL_LANG']['MOD']['page'][1], $objConfig->id ),
				'attributes' => ' data-size="'.static::getSizeClass('pagemount').'"'
			);
		}
		
		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons ?? array();
		$objTemplate->clickToEdit = false;
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];
		}
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable.'::'.$objModel->type]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable.'::'.$objModel->type];
		}
		
		return $objTemplate->parse();
	}


	// !-- interface_news
	protected static function interface_news($objModel, $strTemplate='')
	{
		$strTable = $objModel::getTable();

		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);

		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);

		// operation buttons
		$strSizeKey = 'contentelements';
		$strBackend = Environment::get('base').'contao';
		$arrLabels = $GLOBALS['TL_LANG'][$objConfig->table];

		// generate the buttons
		$objConfig->buttons = array();
		
		// list view
		$params = array('do'=>'news','table'=>'tl_news','id'=>$objConfig->pid,'rt'=>Controller::request_token(),);
		$title = $arrLabels['edit'] ?? '';
		if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
		{
			$title = $arrLabels['edit'][1];
		}
		$objConfig->buttons['editheader'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg') ?: Image::getHtml('system/themes/flexible/icons/header.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'editheader',
			'title'		=> sprintf( $arrLabels['edit'][1], $objConfig->id ),
			'attributes' => ' data-key="editheader" data-size="'.static::getSizeClass($strSizeKey,'editheader').'"'
		);
		
		// edit
		$params = array('do'=>'news','table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
		$title = $arrLabels['editheader'] ?? '';
		if( isset($arrLabels['editheader']) && is_array($arrLabels['editheader']) )
		{
			$title = $arrLabels['editheader'][1];
		}
		$objConfig->buttons['edit'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_edit.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'edit',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
		);

		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons;
		$objTemplate->clickToEdit = false;
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];
		}
		return $objTemplate->parse();
	}


	// !-- interface_events
	protected static function interface_events($objModel, $strTemplate='')
	{
		$strTable = $objModel::getTable();
		
		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);

		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);

		// operation buttons
		$strSizeKey = 'contentelements';
		$strBackend = Environment::get('base').'contao';
		$arrLabels = $GLOBALS['TL_LANG'][$objConfig->table];

		// generate the buttons
		$objConfig->buttons = array();
		
		// list view
		$params = array('do'=>'calendar','table'=>$objConfig->table,'id'=>$objConfig->pid,'rt'=>Controller::request_token(),);
		$title = $arrLabels['editheader'] ?? '';
		if( isset($arrLabels['editheader']) && is_array($arrLabels['editheader']) )
		{
			$title = $arrLabels['editheader'][1];
		}
		$objConfig->buttons['editheader'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'editheader',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-key="editheader" data-size="'.static::getSizeClass($strSizeKey,'editheader').'"'
		);
		
		// edit
		$params = array('do'=>'calendar','table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
		$title = $arrLabels['edit'] ?? '';
		if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
		{
			$title = $arrLabels['edit'][1];
		}
		$objConfig->buttons['edit'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_setting.svg') ?: Image::getHtml('system/themes/flexible/icons/header.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'edit',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
		);

		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons;
		$objTemplate->clickToEdit = false;
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];
		}
		return $objTemplate->parse();
	}


	// !-- interface_form
	protected static function interface_form($objModel, $strTemplate='')
	{
		$strTable = $objModel::getTable();
		
		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);

		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);

		// operation buttons
		$strSizeKey = 'contentelements';
		$strBackend = Environment::get('base').'contao';
		$arrLabels = $GLOBALS['TL_LANG'][$objConfig->table];

		// generate the buttons
		$objConfig->buttons = array();
		
		// edit
		// list view
		$params = array('do'=>'form','table'=>'tl_form_field','id'=>$objConfig->id,'rt'=>Controller::request_token(),);
		$title = $arrLabels['editheader'] ?? '';
		if( isset($arrLabels['editheader']) && is_array($arrLabels['editheader']) )
		{
			$title = $arrLabels['editheader'][1];
		}
		$objConfig->buttons['editheader'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'editheader',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-key="editheader" data-css="listview" data-size="'.static::getSizeClass($strSizeKey,'editheader').'"'
		);
		
		// edit
		$params = array('do'=>'form','id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
		$title = $arrLabels['editheader'] ?? '';
		if( isset($arrLabels['editheader']) && is_array($arrLabels['editheader']) )
		{
			$title = $arrLabels['editheader'][1];
		}
		$objConfig->buttons['edit'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_setting.svg') ?: Image::getHtml('system/themes/flexible/icons/header.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'edit',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-key="editheader" data-size="'.static::getSizeClass($strSizeKey,'edit').'"'
		);

		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons;
		$objTemplate->clickToEdit = false;
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];
		}
		return $objTemplate->parse();
	}


	// !-- interface_customcatalog
	protected static function interface_customcatalog($objModel, $strTemplate='')
	{
		$strTable = $objModel->table;
		// get the current active backend user
		// @var object
		$objUser = Controller::findActiveBackendUser();
		
		// load DataContainer
		#Controller::loadDataContainer($strTable);
		// load language file
		Controller::loadLanguageFile($strTable);

		$objConfig = new \StdClass;
		$objConfig->user = $objUser;
		// mandatory
		$objConfig->table = $strTable;
		$objConfig->type = $objModel->type;
		$objConfig->id = $objModel->id;
		$objConfig->pid = $objModel->pid ?: 0;
		$objConfig->ptable = $objModel->ptable ?: 'tl_article';
		$objConfig->do = $objModel->do;
		// optional
		$objConfig->row = $objModel;
		$objConfig->selector = static::getJquerySelector($strTable,$objModel->id);

		// operation buttons
		$strBackend = Environment::get('base').'contao';
		$arrLabels = $GLOBALS['TL_LANG'][$objConfig->table] ?? array();

		// generate the buttons
		$objConfig->buttons = array();
		
		// edit
		$params = array('do'=>$objConfig->do,'table'=>$objConfig->table,'id'=>$objConfig->id,'act'=>'edit','rt'=>Controller::request_token(),);
		$title = $arrLabels['edit'] ?? '';
		if( isset($arrLabels['edit']) && is_array($arrLabels['edit']) )
		{
			$title = $arrLabels['edit'][1];
		}
		$objConfig->buttons['edit'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_edit.svg') ?: Image::getHtml('system/themes/flexible/icons/edit.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'edit',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-size="'.static::getSizeClass('isCustomCatalog','edit').'"'
		);

		// list view
		unset( $params['act'] );
		$objConfig->buttons['edit_list'] = array
		(
			'href' 		=> StringUtil::decodeEntities( $strBackend.'?'.http_build_query($params) ),
			'icon'	  	=> Image::getHtml(\PCT_FRONTEND_QUICKEDIT_PATH.'/assets/img/icon_list.svg'),
			'target' 	=> $objUser->pct_frontend_quickedit_target,
			'class'		=> 'edit_list',
			'title'		=> sprintf( $title, $objConfig->id ),
			'attributes' => ' data-key="edit_list" data-css="listview tl_content-listview" data-size="'.static::getSizeClass('isCustomCatalog','edit_list').'"'
		);
		
		// @var object
		$objTemplate = new FrontendTemplate( $strTemplate ?: 'interface_default' );
		
		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons;
		$objTemplate->clickToEdit = false;
		if( isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable]) )
		{
			$objTemplate->clickToEdit = (boolean)$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit'][$strTable];
		}
		return $objTemplate->parse();
	}



	/**
	 * Add the frontend quickedit interface and javascript to an html element
	 * @param string	The html string of an element
	 * @param object	The configuration object
	 * @return string	
	 */
	// ! [addTo] add the Frontend QuickEdit interface to a html element
	public static function addTo($strBuffer,$objConfig)
	{
		// required information: table, id
		if( empty($objConfig->table) || empty($objConfig->id) )
		{
			throw new \Exception('Missing table or ID information');
		}
		// no html 
		else if( empty($objConfig->buffer) && empty($strBuffer) )
		{
			throw new \Exception('Missing HTML buffer information');
		}
		
		// @var object
		$objTemplate = new FrontendTemplate( $GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements'][$objConfig->table] );
		
		// the unique js, jquery selector
		if( empty($objConfig->selector) )
		{
			$objConfig->selector = sprintf($GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssIdLogic'],$objConfig->table.'-'.$objConfig->id);
			// mark the jquery must set the CSS id
			$objTemplate->setCssID = true;
		}
		
		// the elements html
		if($objConfig->buffer === null)
		{
			$objConfig->buffer = $strBuffer;
		}

		$objTemplate->Config = $objConfig;
		$objTemplate->User = $objConfig->user;

		$objTemplate->buffer = $objConfig->buffer ?? '';
		$objTemplate->selector = $objConfig->selector ?? '';
		$objTemplate->buttons = $objConfig->buttons;
		
		$strReturn = $objTemplate->parse();
		
		return $strReturn;
	}

}