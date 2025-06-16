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
namespace PCT\CustomCatalog\API\Backend;

use Contao\BackendUser;
use Contao\StringUtil;
use Contao\System;

/**
 * Class file
 * BackendPage
 */
class BackendPage extends \Contao\Backend
{
	/**
	 * Ajax object
	 * @var object
	 */
	protected $objAjax;
	
	/**
	 * CustomCatalog object
	 * @var object
	 */
	protected $objCustomCatalog;
	
	/**
	 * Api Model
	 * @var object
	 */
	protected $objApi;
	
	/**
	 * DataContainer object
	 * @var object 
	 */
	protected $objDC;


	/**
	 * Initialize the controller
	 */
	public function __construct()
	{
		\Contao\System::import(BackendUser::class, 'User');
		parent::__construct();
		\Contao\System::import('Database');
		\Contao\System::loadLanguageFile('default');
		$this->Session = System::getContainer()->get('request_stack')->getSession();
	}


	/**
	 * Run the controller and parse the template
	 */
	public function run()
	{
		// Redirect to pages listening to submits
		if(\Contao\Input::get('abort') || \Contao\Input::post('abort'))
		{
			$url = \Contao\Environment::get('request');
			foreach(array('key','abort') as $v)
			{
				$url = \PCT\CustomElements\Helper\Functions::removeFromUrl($v,$url);
			}
			$this->redirect( $url );
		}
		else if(\Contao\Input::get('redirect_to_summary'))
		{
			$url = \Contao\Environment::get('request');
			foreach(array('key','redirect_to_summary') as $v)
			{
				$url = \PCT\CustomElements\Helper\Functions::removeFromUrl($v,$url);
			}
			$this->redirect( \PCT\CustomElements\Helper\Functions::addToUrl('key=summary',$url) );
		}
		
		/** @var \BackendTemplate|object $objTemplate */
		$this->Template = new \Contao\BackendTemplate('be_page_api');
		$this->Template->main = '';
		
		// Ajax request
		if ($_POST && \Contao\Environment::get('isAjaxRequest'))
		{
			$this->objAjax = new \Contao\Ajax(\Contao\Input::post('action'));
			$this->objAjax->executePreActions();
		}

		$strTable = \Contao\Input::get('table');
		$strField = \Contao\Input::get('field');
		$strKey = \Contao\Input::get('key');
		
		// Define the current ID
		if( !defined('CURRENT_ID') )
		{
			define('CURRENT_ID', (\Contao\Input::get('table') ? $this->Session->get('CURRENT_ID') : \Contao\Input::get('id')));	
		}

		$this->loadDataContainer($strTable);
		
		$this->objDC = new \PCT\CustomElements\Helper\DataContainerHelper();
		$this->objDC->table = $strTable;
		$this->objDC->field = $strField;
		$this->objDC->id = \Contao\Input::get('id');
		
		// Set the active record
		if ($this->Database->tableExists($strTable))
		{
			/** @var \Model $strModel $strModel */
			$strModel = \Contao\Model::getClassFromTable($strTable);

			if (class_exists($strModel))
			{
				$objModel = $strModel::findByPk(\Contao\Input::get('id'));

				if ($objModel !== null)
				{
					$this->objDC->activeRecord = $objModel;
				}
			}
		}

		// @var object API 
		$this->objApi = \PCT\CustomCatalog\API\Factory::findById($this->objDC->id);
		
		// return when API not active
		if($this->objApi === null || (boolean)$this->objApi->published === false)
		{
			return $this->render_apiNotActive();
		}
		
		// API definition
		$arrApi = $this->objApi->getDefinition();
		
		// check if a certain mode is selected and has a custom callback class
		$arrCallback = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->objApi->type]['modes'][$this->objApi->mode]['callback'];
		if(is_array($arrCallback) && !empty($arrCallback))
		{
			$this->objApi = new $arrCallback[0]( $this->objApi->getData() );
		}
		
		// Jobs Model
		$this->objJobs = \PCT\CustomCatalog\Models\JobModel::findByPid($this->objDC->id);
		
		// CC Model
		$this->objCustomCatalog = \Contao\CustomCatalog::findById($this->objApi->pid);
		
		// AJAX request
		if ($_POST && \Contao\Environment::get('isAjaxRequest') && $this->objDC !== null)
		{
			$this->objAjax->executePostActions($this->objDC);
		}
		
		// set table
		$this->objApi->setTable( $this->objCustomCatalog->getTable() );
		
		// create backup
		$intBackup = 0;
		if($this->objApi->backup && $strKey == 'ready')
		{
			$intBackup = $this->objApi->createBackup();
		}
		
		// empty table
		$blnPurgeTable = false;
		if($this->objApi->purgeTable && $strKey == 'ready')
		{
			$blnPurgeTable = $this->objApi->purgeTable();
		}
		
		// clear the last API session
		if($strKey == 'ready')
		{
			$this->objApi->removeSession();
		}
		
		$strBack = $GLOBALS['TL_LANG']['MSC']['goBack'];
		if($strKey == 'summary' && strlen($GLOBALS['TL_LANG']['MSC']['goBackToOverview']) > 0)
		{
			$strBack = $GLOBALS['TL_LANG']['MSC']['goBackToOverview'];
		}
		
		// back button
		$this->Template->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="" href="'.$this->getReferer().'">'.$strBack.'</a>';
		
		$this->Template->main = '';
		$this->Template->action = StringUtil::ampersand(\Contao\Environment::get('request'));
		$this->Template->CustomCatalog = $this->objCustomCatalog;
		$this->Template->Api = $this->objApi;
		$this->Template->objApi = $this->objApi;
		$this->Template->objJobs = $this->objJobs;
		$this->Template->objCustomCatalog = $this->objCustomCatalog;
		$this->Template->objDataContainer = $this->objDC;
		$this->Template->backup = $intBackup;
		$this->Template->purgeTable = $blnPurgeTable;
		$this->Template->table = $this->objCustomCatalog->getTable();
		$this->Template->countJobs = ($this->objJobs ? count($this->objJobs->getModels()) : 0);
		
		// Check if API has a backend page callback
		if( isset($arrApi['key'][$strKey]) && is_array($arrApi['key'][$strKey]) && !empty($arrApi['key'][$strKey]))
		{
			$this->Template->headline = sprintf($GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['headline'],$this->objDC->id);
			
			$callback = $arrApi['key'][$strKey];
			return \Contao\System::importStatic($callback[0])->{$callback[1]}($this);
		}
		
		// Check if API mode has a backend page callback
		else if( isset($arrApi['modes'][$this->objApi->mode]['key'][$strKey]) && is_array($arrApi['modes'][$this->objApi->mode]['key'][$strKey]) && count($arrApi['modes'][$this->objApi->mode]['key'][$strKey]) > 0 )
		{
			$this->Template->headline = sprintf($GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['headline'],$this->objDC->id);
			
			$callback = $arrApi['modes'][$this->objApi->mode]['key'][$strKey];
			return \Contao\System::importStatic($callback[0])->{$callback[1]}($this);
		}
		
		// check if the current key has a render method
		if(method_exists($this, 'render_'.$strKey))
		{
			return $this->{'render_'.$strKey}($this);
		}
	
		return $this->render_noBackendPage();	
	}
	
	
	/**
	 * Render the READY backend interface view 
	 * @return string
	 */
	protected function render_ready($objBackendPage=null)
	{
		$this->Template->headline = sprintf($GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['headline'],$this->objDC->id);
		
		// clear any old api session
		$this->objApi->removeSession();
		
		// run submit
		$arr = array
		(
			'id'	=> 'run',
			'name'	=> 'run',
			'strName'	=> 'run',
			'value' => $GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['submit_run'] ?: 'run',
			'label'	=> $GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['submit_run'] ?: 'Run',
			'class' => 'submit tl_submit',
			'tableless' => true,
		);
		$objRunSubmit = new \Contao\FormSubmit($arr);
		$this->Template->runSubmit = $objRunSubmit->generate();
		$this->Template->runLabel = $GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['submit_run'] ?: 'Run';
		$this->runSubmitName = $objRunSubmit->__get('name');
		
		return $this->Template->parse();
	}
	
	
	/**
	 * Render information page when there is no "run" backend page is provided by the current api mode
	 * @return string
	 */
	protected function render_noBackendPage()
	{
		// back button
		$this->Template->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="" href="'.$this->getReferer().'">'.$GLOBALS['TL_LANG']['MSC']['goBack'].'</a>';
		
		$this->Template->headline = sprintf($GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['headline'],$this->objDC->id);
		$this->Template->error = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG_API']['MSC']['noBackendExecutionPage'],\Contao\Input::get('key'));
		return $this->Template->parse();
	}
	
	
	/**
	 * Render information page when API is not active
	 * @return string
	 */
	protected function render_apiNotActive()
	{
		// back button
		$this->Template->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="" href="'.$this->getReferer().'">'.$GLOBALS['TL_LANG']['MSC']['goBack'].'</a>';
		
		$this->Template->headline = sprintf($GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['headline'],$this->objDC->id);
		$this->Template->error = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG_API']['MSC']['apiNotActive'] ? sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG_API']['MSC']['apiNotActive'],$this->objDC->id) : 'API not active';
		return $this->Template->parse();
	}

}