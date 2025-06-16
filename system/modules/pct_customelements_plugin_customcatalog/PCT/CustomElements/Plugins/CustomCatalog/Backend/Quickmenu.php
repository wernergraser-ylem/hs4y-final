<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

/**
 * Imports
 */

use Contao\Backend;
use Contao\BackendUser;
use Contao\Controller;
use Contao\Environment;
use Contao\Input;
use Contao\StringUtil;
use Contao\System;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * Quickmenu
 * Provides the quick menu for the backend menu element
 */
class Quickmenu
{
	/**
	 * Quick menu session array
	 * @var array
	 */
	protected $arrQuickMenuSession = array();
	
	/**
	 * Customcatalog configuration id
	 * @var integer
	 */
	protected $intConfig = 0;
	
	/**
	 * Module template
	 * @var string
	 */
	public $strModuleTemplate = 'mod_be_cc_navigation';
	
	/**
	 * Navigation template
	 * @var string
	 */
	public $strNavTemplate = 'be_nav_default';
	
	/**
	 * Show groups in groupsets in menu
	 * @var boolean
	 */
	public $blnShowGroupsInGroupsets = false;
	
	
	/**
	 * Initialize and render navigation for the given configuration
	 * @param integer	Id of the custom catalog
	 * @return string
	 */
	public function __construct($intConfiguration=0)
	{
		if($intConfiguration < 1)
		{
			return '';
		}
		
		$strBuffer = $this->render($intConfiguration);
		
		return $strBuffer;
	}
	
			
	/**
	 * Generate the backend navigation for a custom catalog config
	 * @param array
	 * @return string
	 */
	public function render($intConfig)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession']);
		$strToken = \Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
		$objUser = BackendUser::getInstance();
		if( \is_array($arrSession) === false )
		{
			$arrSession = array();
		}
		
		$this->arrQuickMenuSession = $arrSession;
		$this->intConfig = $intConfig;
		
		$objFile = new \Contao\File('system/tmp/customcatalog/quickmenu/id_'.$intConfig.'.txt',true);
		
		// return the generated menu from the file
		if( isset($arrSession[$intConfig]['token']) && $arrSession[$intConfig]['token'] == $strToken && $objFile->exists())
		{
			return $objFile->getContent();
		}
		
		$objCC = null;
		if(Cache::getCustomCatalog($intConfig))
		{
			$objCC = Cache::getCustomCatalog($intConfig);
		}
		else
		{
			// fetch the custom catalog config
			$objCC = CustomCatalogFactory::findById($intConfig);
		}
		
		if(!$objCC)
		{
			return '';
		}
		
		// create the CE object
		$objCE = null;
		if(Cache::getCustomElement($objCC->get('pid')))
		{
			$objCE = Cache::getCustomElement(($objCC->get('pid')));
		}
		else
		{
			$objCE = CustomElementFactory::findById(($objCC->get('pid')));
		}
		
		
		ControllerHelper::callstatic('loadLanguageFile',array('default'));
		
#		ControllerHelper::callstatic('loadDataContainer',array('tl_pct_customelement'));
#		ControllerHelper::callstatic('loadDataContainer',array('tl_pct_customcatalog'));
		
		$objTemplate = new \Contao\BackendTemplate($this->strModuleTemplate);
		$objTemplate->class = $objCC->getTable();
		
		//-- Configs
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		
		// configs edit button
		$arrButton = array
		(
			'link'	=> $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['navigation']['tl_pct_customcatalog']['label'][0],
			'title'	=> $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['navigation']['tl_pct_customcatalog']['label'][1] . ' ('.$objCE->get('title').')',
			'class'	=> 'config_editall editall',
			'icon'	=> 'fa fa-pencil',
			'href'	=> StringUtil::ampersand( Backend::addToUrl('&do=pct_customelements&table=tl_pct_customcatalog&id='.$objCE->get('id'),true,array('act') ) ),
			'access'	=> $objUser->isAdmin ?: $objSecurity->isGranted('contao_user.pct_customcatalogsp.create'),
			'is_active' => false,
			'attributes' => '',
			'target' => '',
			'subitems' => '',
		);
		
		$objOverviewButton = new \Contao\BackendTemplate('be_nav_default');
		$objOverviewButton->level = 'level_1';
		$objOverviewButton->items = array($arrButton);
		$objOverviewButton->class = '';
		$objTemplate->editConfigsButton = $objOverviewButton->parse(); #$this->goToGroupsOverviewButton($row, $href, $label, $title, $icon, $attributes);
		
		// other configs
		$objSystemIntegration = new \PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration();
		$arrConfigs = $objSystemIntegration->findAllTables($objCC->getTable());
		if(count($arrConfigs) > 0)
		{
			$objTemplate->hasChildConfigs = true;
			// render configs and filtersets, filter navigation
			$objTemplate->configItems = $this->generateNavigation($objCE->get('id'),'tl_pct_customcatalog');
		}
		
		//-- Groups
		$objGroups = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid=? ORDER BY sorting")->execute($objCE->get('id'));
		if($objGroups->numRows > 0)
		{
			$objTemplate->hasGroups = true;
			
			ControllerHelper::callstatic('loadDataContainer',array('tl_pct_customelement_group'));
			
			//-- groups edit button
			$arrButton = array
			(
				'link'	=> $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['navigation']['tl_pct_customelement_group']['label'][0],
				'title'	=> $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['navigation']['tl_pct_customelement_group']['label'][1] . ' ('.$objCE->get('title').')',
				'class'	=> 'groups_editall editall',
				'icon'	=> 'fa fa-pencil',
				'href'	=> StringUtil::ampersand( Backend::addToUrl('&do=pct_customelements&table=tl_pct_customelement_group&id='.$objCE->get('id'),true,array('act') ) ),
				'access'	=> $objUser->isAdmin ?: $objSecurity->isGranted('contao_user.pct_customelement_groupsp.create'),
				'is_active' => false,
				'attributes' => '',
				'target' => '',
				'subitems' => '',
			);
			
			$objOverviewButton = new \Contao\BackendTemplate('be_nav_default');
			$objOverviewButton->level = 'level_1';
			$objOverviewButton->items = array($arrButton);
			$objOverviewButton->class = '';
			$objTemplate->editGroupsButton = $objOverviewButton->parse(); #$this->goToGroupsOverviewButton($row, $href, $label, $title, $icon, $attributes);
			
			// render attributes
			$objTemplate->attributeItems = $this->generateNavigation($objCE->get('id'),'tl_pct_customelement_group',1,false,true);
		}
		
		$strReturn = $objTemplate->parse();
		
		// store the generated html
		#$arrSession[$intConfig]['html'] = $strReturn;
		
		// write file
		$objFile->write($strReturn);
		$objFile->close();
		
		// store the used request token to compare later
		$arrSession[$intConfig]['token'] = \Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();;
		$objSession->set($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession'],$arrSession);
		
		return $strReturn;
	}
	
	
	/**
	 * Generate the backend navigation for a custom catalog
	 * @param integer
	 * @return string
	 */
	protected function generateNavigation($intPid,$strTable,$intLevel=1,$blnHasFirstItem=false,$blnHasSorting=false,$strTemplate='be_nav_default')
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists($strTable))
		{
			return '';
		}

		\error_reporting(0);
		$objSecurity = \Contao\System::getContainer()->get('security.helper');

		$objUser = BackendUser::getInstance();
		$objTemplate = new \Contao\BackendTemplate($strTemplate);
		$objTemplate->items = array();
		$objTemplate->level = 'level_' . $intLevel++;
		
		$arrItems = array();
		$objElements = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE pid=? ".($blnHasSorting ? "ORDER BY sorting" : ""))->execute($intPid);
		if($objElements->numRows < 1)
		{
			return '';
		}
		
		$intConfig = $this->intConfig;
		$strPermission = str_replace('tl_','',$strTable).'sp';
		
		$strLink = $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['navigation'][$strTable]['label'][0];
		if( empty($strLink) )
		{
			$strLink = $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['navigation']['editall']['label'][0];
		}
		if( empty($strLink) )
		{
			$strLink = 'Edit elements...';
		}
		
		if($blnHasFirstItem)
		{
			$arrFirstItem = array
			(
				'link' 			=> $strLink,
				'title' 		=> $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['navigation'][$strTable]['label'][1] ?: 'Edit elements...',
				'class' 		=> 'sibling editall',
				'icon'			=> 'fa fa-edit',
				'href' 			=> StringUtil::ampersand( Backend::addToUrl('&do=pct_customelements&table='.$strTable.'&id='.$intPid),true,array('act') ),
				'access'		=> $objUser->isAdmin ?: $objSecurity->isGranted('contao_user.'.$strPermission.'.create'),
				'attributes'	=> 'data-table="'.$strTable.'" data-pid="'.$intPid.'"',
				'is_active' => false,
				'target' => '',
				'subitems' => '',
			);
			$arrItems[0] = $arrFirstItem;
		}
		
		while($objElements->next())
		{
			$strAppendLabel = '';
			// groupsets in table tl_pct_customelement_group
			if($strTable == 'tl_pct_customelement_group')
			{
				$objGroupset = null;
				if($this->blnShowGroupsInGroupsets && strlen($objElements->selector) > 0)
				{
					$objGroupset = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_groupset WHERE alias=?")->limit(1)->execute($objElements->selector);
					$strAppendLabel = '('.$objGroupset->title.')';
				}
				else if(!$this->blnShowGroupsInGroupsets && strlen($objElements->selector) > 0)
				{
					continue;
				}
			}
			
			$arrRow = $objElements->row();
			$arrRow['is_active'] = false;
			
			// check in session if element should be toggled open
			if( isset($this->arrQuickMenuSession[$intConfig][$strTable][$objElements->id]) && $this->arrQuickMenuSession[$intConfig][$strTable][$objElements->id] > 0)
			{
				$arrRow['is_active'] = true;
			}
			
			$arrRow['table'] = $strTable;
			$arrRow['class'] = 'sibling';
			$arrRow['icon'] = 'fa fa-pencil';
			if($strTable == 'tl_pct_customelement_attribute')
			{
				$arrRow['icon'] = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$objElements->type]['icon'];
			}
			else if($strTable == 'tl_pct_customelement_filter')
			{
				$arrRow['icon'] = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$objElements->type]['icon'];
			}
			
			$href = Backend::addToUrl('do=pct_customelements&amp;table='.$strTable.'&amp;id='.$objElements->id.'&amp;act=edit');

			$arrRow['title'] = $objElements->title ?: $objElements->id;
			$arrRow['link'] = $objElements->title . ($strAppendLabel ? ' '.$strAppendLabel : '');
			if(strlen($arrRow['link']) < 1)
			{
				$arrRow['link'] = $objElements->alias ?: $objElements->id;
			}
			
			$arrRow['target'] = '';
			$arrRow['href'] = $href;
			$arrRow['access'] = $objUser->isAdmin ?: $objSecurity->isGranted('contao_user.'.$strPermission.'.create');
			$arrRow['attributes'] = 'data-table="'.$strTable.'" data-id="'.$objElements->id.'"';
			
			$strSubItems = '';
			
			// attributes are subitems
			if($strTable == 'tl_pct_customelement_group')
			{
				$strSubItems = $this->generateNavigation($objElements->id,'tl_pct_customelement_attribute',$intLevel,true,true);
			}
			// filtersets are subitems
			else if($strTable == 'tl_pct_customcatalog')
			{
				$strSubItems = $this->generateNavigation($objElements->id,'tl_pct_customelement_filterset',$intLevel,true);
				// api, jobs are subitems
				$strSubItems .= $this->generateNavigation($objElements->id,'tl_pct_customcatalog_api',$intLevel,true,true);
			}
			// filters are subitems
			else if($strTable == 'tl_pct_customelement_filterset')
			{
				$strSubItems = $this->generateNavigation($objElements->id,'tl_pct_customelement_filter',$intLevel,true,true);
			}
			// jobs are subitems of apis
			else if($strTable == 'tl_pct_customcatalog_api')
			{
				$strSubItems = $this->generateNavigation($objElements->id,'tl_pct_customcatalog_job',$intLevel,true,true);
			}
			
			
			$arrRow['subitems'] = $strSubItems;
			
			if(strlen($strSubItems) > 0)
			{
				$arrRow['class'] .= ' submenu';
			}
			
			$arrItems[] = $arrRow;
		}
		
		if(count($arrItems) > 0)
		{
			$arrItems[0]['class'] .= ' first';
			$arrItems[count($arrItems)-1]['class'] .= ' last';
		}
		
		$objTemplate->class = $strTable;
		$objTemplate->items = $arrItems;
		return $objTemplate->parse();
	}
	
	
	/**
	 * Toggle Quick Menu listener
	 * @param string
	 * called from executePreActions Hook
	 */
	public function toggleQuickMenuListener($strAction)
	{
		if($strAction != 'toggleQuickMenu')
		{
			return;
		}
	
		$intConfig = \Contao\Input::post('config_id') ?? 0;
		$intElement = \Contao\Input::post('element_id') ?? 0;
		$strTable = \Contao\Input::post('table') ?? '';
		$intState = \Contao\Input::post('state') ?? 0;
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession']);
		
		if( !isset($arrSession[$intConfig]) || !is_array($arrSession[$intConfig]))
		{
			$arrSession[$intConfig] = array();
		}
		
		// remove from session
		if($intState < 1)
		{
			unset($arrSession[$intConfig][$strTable][$intElement]);
		}
		else
		{
			$arrSession[$intConfig][$strTable][$intElement] = true;
		}
		
		$objSession->set($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession'],$arrSession);
		
		// let the menu rebuild
		$this->removeMenuFromSession($intConfig);
	}


	/**
	 * Return the url ob the backend without any parameters
	 * @return string
	 */
	protected function getCleanUrl($bolRequestToken=true)
	{
		Input::setGet('rt',\Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue());
		
		return \Contao\Environment::get('base').'contao?ref=';
	}


	/**
	 * Call the menu deletation from DCA callback
	 * @param object
	 * called from DCA callbacks
	 */
	public function rebuildMenuOnPageLoad($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$objDbCC = null;
		
		if($objDC->table == 'tl_pct_customcatalog')
		{
			$this->removeMenuFromSession($objDC->id);
		}
		
		if($objDC->table == 'tl_pct_customelement_attribute')
		{
			$objDbCC = $objDatabase->prepare("SELECT id FROM tl_pct_customcatalog WHERE pid IN (SELECT id FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?) GROUP BY id )")
							->execute($objActiveRecord->pid);
		}
		
		if($objDC->table == 'tl_pct_customelement_group')
		{
			$objDbCC = $objDatabase->prepare("SELECT id FROM tl_pct_customcatalog WHERE pid IN (SELECT id FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?) GROUP BY id )")
							->execute($objActiveRecord->id);
		}
		
		if($objDC->table == 'tl_pct_customelement_filterset')
		{
			$objDbCC = $objDatabase->prepare("SELECT id FROM tl_pct_customcatalog WHERE id=?")
							->execute($objActiveRecord->pid);
		}
		
		if($objDC->table == 'tl_pct_customelement_filter')
		{
			$objDbCC = $objDatabase->prepare("SELECT id FROM tl_pct_customcatalog WHERE id IN (SELECT pid FROM tl_pct_customelement_filterset WHERE id=? GROUP BY pid)")
							->execute($objActiveRecord->pid);
		}
		
		if($objDC->table == 'tl_pct_customcatalog_api')
		{
			$this->removeMenuFromSession($objActiveRecord->pid);
		}
		
		if($objDC->table == 'tl_pct_customcatalog_job')
		{
			$objDbCC = $objDatabase->prepare("SELECT id FROM tl_pct_customcatalog WHERE id IN (SELECT pid FROM tl_pct_customcatalog_api WHERE id=? GROUP BY pid)")
							->execute($objActiveRecord->pid);
		}
		
		if( isset($objDbCC->numRows) && $objDbCC->numRows > 0)
		{
			foreach($objDbCC->fetchEach('id') as $intConfig)
			{
				$this->removeMenuFromSession($intConfig);
			}
		}
	}


	/**
	 * Remove the generated html from the session
	 * @param integer
	 */
	public function removeMenuFromSession($intConfig)
	{
		if($intConfig < 1)
		{
			return;
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession']);
		if( isset($arrSession[$intConfig]['html']) )
		{
			unset($arrSession[$intConfig]['html']);
		}
		$objSession->set($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession'],$arrSession);
	}
}