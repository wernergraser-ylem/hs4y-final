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
 * @api			Standard
 */

/**
 * Namespace
 */
namespace PCT\CustomCatalog\API\Standard\Backend;

/**
 * Class file
 * BackendPage
 */
class ExportPage extends \PCT\CustomCatalog\API\Backend\BackendPage
{
	/**
	 * Render the "run" page and parse the template
	 * @param object	\PCT\CustomCatalog\API\Backend\BackendPage
	 * @return string
	 */
	public function render_run($objBackendPage)
	{
		// @var DataContainer
		$this->objDC = $objBackendPage->objDC;
		
		// @var object
		$objApi = $objBackendPage->objApi;
		
		// @var object
		$objCC = $objBackendPage->objCustomCatalog;
		
		$intLimit = 0;
		$intOffset = 0;
		$strCondition = '';
		
		// published records only
		$strPublishedField = $objCC->getPublishedField();
		if(strlen($strPublishedField) && $objApi->isPublished)
		{
			$strCondition .= ' '.$strPublishedField.'=1';
		}
				
		$arrData = array();
		$arrSession = $objApi->getSession();
		
		// Ajax is not running
		if(!\Contao\Environment::get('isAjaxRequest'))
		{
			// clear old session
			$objApi->removeSession();
			
			// get affected records
			$arrData = $objApi->getRecords($intLimit,$intOffset,$strCondition);
			
			// store records in the session for further usage
			$arrSession['INPUT'] = $arrData;
			$arrSession['OUTPUT'] = array();
			$objApi->setSession($arrSession);
			
			// main content template
			$objTemplate = new \Contao\BackendTemplate('be_page_api_export_run');
			$objTemplate->setData( $objBackendPage->Template->getData() );
			$objTemplate->data = $arrData;
			$objTemplate->mode = $objApi->mode;
			
			// process data if no range is set
			if($objApi->maxRange < 1 || $objApi->maxRange >= count($arrData))
			{
				// set the affected records to the single record coming from the ajax index
				$objApi->setSource($arrData);
				
				// do not write any output content
				$objApi->doExport = false;
				
				// run the api
				$objApi->run();
			
				// store the output data in the session 
				$arrOutput = $objApi->getOutput();
				
				$arrSession['OUTPUT'] = $arrOutput;
				
				// store report
				$arrSession['REPORT'] = $objApi->getReport();
				
				$objApi->setSession($arrSession);
			}
			
			// main content	
			$objBackendPage->Template->main = $objTemplate->parse();
		}
		// Ajax is running and new index has been send
		else if(\Contao\Environment::get('isAjaxRequest') && (int)\Contao\Input::get('index') > -1)
		{
			$index = \Contao\Input::get('index');
			$range = $objApi->maxRange;
			if(\Contao\Input::get('range') != $range)
			{
				$range = \Contao\Input::get('range');
			}
			
			$arrData = $arrSession['INPUT'];
			if(!is_array($arrData))
			{
				$arrData = array();
			}
			
			$data = array();
			
			// range is set
			if($range > 1)
			{
				$data = array_splice($arrSession['INPUT'], $index, $range);
			}
			else
			{
				$data = $arrSession['INPUT'][$index];
			}
			
			//  track empty input data
			if(!isset($data))
			{
				$objApi->addCriticalError('Input data is null for index: '.$index);
			}
			
			// set the affected records to the single record coming from the ajax index
			$objApi->setSource($data);
			
			// do not write any output content
			$objApi->doExport = false;
			
			// run the api
			$objApi->run();
		
			// store the output data in the session 
			$arrOutput = $objApi->getOutput();
			
			if(!is_array($arrOutput))
			{
				$arrOutput = array_filter( array($arrOutput) );
			}
			
			if(!is_array($arrSession['OUTPUT']))
			{
				$arrSession['OUTPUT'] = array();
			}
			
			// store output
			$arrSession['OUTPUT'] = array_merge($arrSession['OUTPUT'],$arrOutput);
			
			// store report
			$arrSession['REPORT'][$index] = $objApi->getReport();
			
			$objApi->setSession($arrSession);
		}
		
		// throw errors
		if($objApi->hasCriticalErrors() && (boolean)\Contao\Config::get('customcatalog_api_stopOnCriticalErrors') === true)
		{
			$strErrors = $objApi->getErrorsAsString('CRITICAL');
			$objApi->throwException($strErrors);
		}
		
		return $objBackendPage->Template->parse();
	}


	/**
	 * Render the "summary" page and parse the template
	 * @param object	\PCT\CustomCatalog\API\Backend\BackendPage
	 * @return string
	 */
	public function render_summary($objBackendPage)
	{
		$objBackendPage->Template->headline = sprintf($GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['be_page_api']['headline_summary'],$objBackendPage->objApi->id);;
		
		// @var DataContainer
		$this->objDC = $objBackendPage->objDC;
		
		// @var object
		$objApi = $objBackendPage->objApi;
		
		// @var object
		$objCC = $objBackendPage->objCustomCatalog;
		
		$arrSession = $objApi->getSession();
		
		// Export data
		$arrData = $arrSession['OUTPUT'];
		
		// set the data
		$objApi->setOutput($arrData);
		
		if(count($arrData) > 0)
		{
			// send start event
			$objApi->start();
			
			// proceed
			$objApi->export();
			
			// complete
			$objApi->done();
		}
		
		// get api report
		$arrReport = $arrSession['REPORT'];
		
		// main content template
		$objTemplate = new \Contao\BackendTemplate('be_page_api_export_summary');
		$objTemplate->setData( $objBackendPage->Template->getData() );
		$objTemplate->data = $arrData ?: array();
		
		// we have report data
		if(!empty($arrReport) && is_array($arrReport))
		{
			$objTemplate->hasReport = true;
			
			// single block
			if($objApi->maxRange < 1 || !$objApi->maxRange || $objApi->maxRange >= count($arrData))
			{
				$arrReport = array($arrReport);
			}
			
			// render report list
			$objReportTpl = new \Contao\BackendTemplate('be_cc_api_report');
			$objReportTpl->setData( $objBackendPage->Template->getData() );
			$objReportTpl->report = $arrReport;
			
			$objTemplate->report = $objReportTpl->parse();
		}
		
		// if export is a downloadable file print a download button
		if( in_array($objApi->target, array('template','csv')) )
		{
			$objFile = $objApi->getFile();
			$objTemplate->file = $objFile;
			
			if(!$objApi->sendToBrowser)
			{
				$objTemplate->hasDownload = true;
			}
		}
		
		// main content	
		$objBackendPage->Template->main = $objTemplate->parse();
		
		return $objBackendPage->Template->parse();
	}


}