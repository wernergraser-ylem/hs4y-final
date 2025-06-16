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
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Frontend;

use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * ModuleApiStarter
 */
class ModuleApiStarter extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_customcatalogapi';
	
	/**
	 * Display wildcard
	 */
	public function generate()
	{
		if ( Controller::isBackend() )
		{
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD'][$this->type][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
		
			return $objTemplate->parse();
		}
		
		// set template
		if($this->customcatalog_mod_template != $this->strTemplate)
		{
			$this->strTemplate = $this->customcatalog_mod_template;
		}
		
		$this->CustomCatalog = \Contao\CustomCatalog::findByModule($this->objModel);
		$this->Api = \PCT\CustomCatalog\API\Factory::findById($this->customcatalog_api);
		
		return parent::generate();
	}


	/**
	 * Generate the module
	 * @return string
	 */
	protected function compile()
	{
		if($this->CustomCatalog === null || $this->Api === null)
		{
			return '';
		}
		
		// load language files
		\Contao\System::loadLanguageFile('tl_pct_customcatalog_api');
		
		$this->Template->CustomCatalog = $objCC = $this->CustomCatalog;
		$this->Template->Api = $objApi = $this->Api;
		
		// fill the cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::fillCache($objCC->id);
		
		$arrCssID = \Contao\StringUtil::deserialize($this->cssID);
		$arrClasses = explode(' ', $arrCssID[1]);
		$arrClasses[] = $objCC->getTable();
		$arrCssID[1] = implode(' ', array_filter(array_unique($arrClasses),'strlen') );
		
		$this->cssID = $arrCssID;
		
		$intLimit = $this->customcatalog_limit;
		$intOffset = $this->customcatalog_offset;
		$strSqlWhere = $this->customcatalog_sqlWhere;
		$strSqlSorting =  $this->customcatalog_sqlSorting;
		
		// form
		$strMethod = $this->customcatalog_filter_method ?: 'get';
		$strFormId = 'customcatalog_api_'.$this->id;
		
		// overwrite limit
		if( \Contao\Input::{$strMethod}('limit') > 0 )
		{
			$intLimit =  (int)\Contao\Input::{$strMethod}('limit');
		}
		// overwrite offset
		if( \Contao\Input::{$strMethod}('offset') > 0 )
		{
			$intOffset = (int)\Contao\Input::{$strMethod}('offset');
		}
		
		// allow via parameter key
		$key = \Contao\Input::{$strMethod}('sql_where') ?: \Contao\Input::{$strMethod}('where');
		if( $key != '' && empty( $GLOBALS['PCT_CUSTOMCATALOG_API']['sql_where'][$key] ) === false )
		{
			$strSqlWhere = $GLOBALS['PCT_CUSTOMCATALOG_API']['sql_where'][$key];
		}
		$key = \Contao\Input::{$strMethod}('order');
		if( $key != '' && empty( $GLOBALS['PCT_CUSTOMCATALOG_API']['sql_order'][$key] ) === false )
		{
			$strSqlSorting = $GLOBALS['PCT_CUSTOMCATALOG_API']['sql_order'][$key];
		}

		$this->Template->method = $strMethod;
		$this->Template->action = \Contao\Environment::get('request');
		$this->Template->formId = $strFormId;
		
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
		$objRunSubmit->addAttribute('value',$objRunSubmit->__get('value'));
		
		$this->Template->runSubmit = $objRunSubmit->generateLabel().$objRunSubmit->generate();
		$this->Template->runLabel = $GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['submit_run'] ?: 'Run';
		$this->runSubmitName = $objRunSubmit->__get('name');
		
		// check if api run has been started
		if(\Contao\Input::{$strMethod}('api') == $objApi->id && ( ($strMethod == 'post' && \Contao\Input::{$strMethod}('FORM_SUBMIT') == $strFormId) || ($strMethod == 'get' && ( \Contao\Input::{$strMethod}($objRunSubmit->__get('name')) == $objRunSubmit->__get('value')) || \Contao\Input::{$strMethod}($objRunSubmit->__get('name')) == 1 )  ) )
		{
			// get the affected rows
			// @var array
			// @param integer, integer, string
			$arrRecords = null;
			if ( $objApi->mode == 'export' )
			{
				$arrRecords = $objApi->getRecords( $intLimit, $intOffset, $strSqlWhere, $strSqlSorting );
			}

			if( $arrRecords !== null )
			{
				$objApi->setSource( $arrRecords  );
			}
			
			// check if a certain mode is selected and has a custom callback class
			$arrCallback = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$objApi->type]['modes'][$objApi->mode]['callback'];
			if(is_array($arrCallback) || !empty($arrCallback))
			{
				$objCallback = new $arrCallback[0]( $objApi->getData() );
				if( $arrRecords !== null )
				{
					$objCallback->setSource( $arrRecords );
				}
				$objCallback->{$arrCallback[1]}();
			}
			// no special modes, just start the api routine
			else
			{
				$objApi->run();
			}
		}
	}

}