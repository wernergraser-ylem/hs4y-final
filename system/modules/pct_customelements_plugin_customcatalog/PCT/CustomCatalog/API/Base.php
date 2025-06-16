<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomCatalog\API;


/**
 * Imports
 */

use Contao\ArrayUtil;
use Contao\StringUtil;
use Contao\System;
use \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * Base
 * Provide the basic stack of methods to communicate with an API class
 */
abstract class Base extends \PCT\CustomCatalog\API\Controller implements \PCT\CustomCatalog\Interfaces\ApiInterface
{
	/**
	 * Jobs array
	 * @var array
	 */
	protected $arrJobs = array();
	
	/**
	 * Array stack of affected records
	 * @param array
	 */
	protected $arrAffected = array();
	
	/**
	 * Source data array
	 * If source table has an unique primary key, the array will use these values as keys
	 * @var array
	 */
	protected $arrSource = array();
	
	/**
	 * Limit value for sql queries
	 * @var integer
	 */
	protected $intLimit = 0;
	
	/**
	 * Offset value for sql queries
	 * @var integer
	 */
	protected $intOffset = 0;
	
	/**
	 * The active job object
	 * @param object
	 */
	protected $objActiveJob;
	
	/**
	 * The output array after the api has been completed
	 * @var array
	 */
	protected $arrOutput;
	
	
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
	}
	
	
	/**
	 * Return the name of the api
	 * @return string
	 */
	public function getName()
	{
		\Contao\System::loadLanguageFile('apis');
		$strReturn = '';
		if($GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type]['label'][0] != '')
		{
			$strReturn = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type]['label'][0];
		}
		return $strReturn;
	}
	
	
	/**
	 * Return the title of the api
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}
	
	
	/**
	 * Return the definition array
	 * @return array
	 */
	public function getDefinition()
	{
		return $GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type];
	}
	
	
	/**
	 * Override the getTable method
	 * @return string
	 */
	public function getTable()
	{
		if(strlen($this->strTable) > 0)
		{
			return $this->strTable;
		}
		
		return $this->getCustomCatalog()->getTable();
	}
	
	
	/**
	 * Return the delimiter character
	 * @return string
	 */
	public function getDelimiter()
	{
		$strReturn = $this->delimiter;
		
		switch( $this->delimiter )
		{
			case 'semicolon':
				$strReturn = ';';
				break;
			case 'tab':
				$strReturn = "\t";
				break;
			case 'comma':
				$strReturn = ',';
				break;
			default:
				// get custom delimiter
				if( isset($GLOBALS['PCT_CUSTOMCATALOG_API']['DELIMITER'][$this->delimiter]) && strlen($GLOBALS['PCT_CUSTOMCATALOG_API']['DELIMITER'][$this->delimiter]) > 0)
				{
					$strReturn = $GLOBALS['PCT_CUSTOMCATALOG_API']['DELIMITER'][$this->delimiter];
				}
				break;
		}
		
		return $strReturn;
	}
	
	
	
	/**
	 * Return the custom catalog object
	 * @return object
	 */
	public function getCustomCatalog()
	{
		return ($this->objCustomCatalog !== null ? $this->objCustomCatalog : \Contao\CustomCatalog::findById($this->pid));
	}


//! -- Jobs management
	
	
	/**
	 * Return all jobs as collection
	 * @return array
	 */
	public function getJobs($blnIsActive=false)
	{
		$objCollection = null;
		if($blnIsActive)
		{
			$objCollection =  \PCT\CustomCatalog\Models\JobModel::findPublishedByPid( $this->get('id') );
		}
		else
		{
			$objCollection =  \PCT\CustomCatalog\Models\JobModel::findByPid( $this->get('id') );
		}
		
		if($objCollection === null)
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($objCollection as $objModel)
		{
			$objJob = new \PCT\CustomCatalog\API\Job( $objModel->row() );
			$objJob->setModel( $objModel );
			$objJob->setAPI($this);
			$arrReturn[] = $objJob;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all active jobs
	 * @return object
	 */
	public function getActiveJobs()
	{
		return $this->getJobs(true);
	}
	
	
	/**
	 * Return a job model by its id
	 * @param integer	Id of the job record
	 * @return object	JobModel
	 */
	public function getJob($intId)
	{
		if($intId < 1)
		{
			return null;
		}
		
		$objModel = \PCT\CustomCatalog\Models\JobModel::findByPk($intId);
		if($objModel === null)
		{
			return null;
		}
		
		$objReturn = new \PCT\CustomCatalog\API\Job( $objModel->row() );
		$objReturn->setModel( $objModel );
		$objReturn->setAPI($this);
		
		return $objReturn;	
	}
	
	
	/**
	 * Set the active job
	 * @param object
	 */
	public function setActiveJob($objValue)
	{
		$this->objActiveJob = $objValue;
		
		// mark as modified
		$this->markAsModified('objActiveJob');
	}
	
	
	/**
	 * Return the active job
	 * @return object|null
	 */
	public function getActiveJob()
	{
		if($this->isModified('objActiveJob'))
		{
			return $this->objActiveJob;
		}
		
		// if the current job is not defined but called via GET or POST, try to find the job model and set it active
		if($this->objActiveJob === null && (\Contao\Input::get('job') > 0 || \Contao\Input::post('job') > 0))
		{
			$this->objActiveJob = $this->getJob(\Contao\Input::post('job') ?: \Contao\Input::get('job'));
		}
		
		return $this->objActiveJob;
	}
	
	
	/**
	 * Run the jobs and return the output array
	 * @return array
	 */
	public function runJobs()
	{
		// @var array Source data
		$arrSource = $this->getSource();
		// @var array Active API jobs
		$arrJobs = $this->getActiveJobs();
		// @var array Errors
		$arrErrors = $this->getErrors();	
		// @var array Return array
		$arrReturn = array();

		if(empty($arrSource))
		{
			return array();
		}
		
		// run through each import data
		foreach($arrSource as $i => $arrData)
		{
			if(count($arrData) < 1)
			{
				continue;
			}
			
			// take the current data
			$arrReturn[$i] = $arrData;
			
			// direct import. No jobs
			if(count($arrJobs) < 1)
			{
				continue;
			}
						
			// memory array
			$arrMemory[$i] = array();
			
			// apply the jobs for each import data stack
			foreach($arrJobs as $ii => $objJob)
			{
				// get last manipulation state from memory
				if(count($arrMemory) > 0 && $ii > 0)
				{
					$arrData = $arrMemory[$i][$ii - 1];
				}
				
				// make the current data index accessible
				$objJob->set('data_index', $i);
				
				// make job index accessible
				$objJob->set('job_index', $ii);
				
				// mark as active job
				$this->setActiveJob($objJob);
				
				//-- Step 1: Attach the current import stack to the job
				$objJob->input($arrData);
				//-- Step 2: 
				
				// Execute the job directly without catching execptions in debug mode (makes debugging more easy)
				if((boolean)\Contao\Config::get('customcatalog_api_stopOnCriticalErrors') === true && (boolean)\Contao\Config::get('debugMode') === true)
				{
					$objJob->execute();
				}
				else
				{
					// Execute the job inside a try statement to catch exceptions
					try
					{
					   $objJob->execute();
					}
					catch(\Exception $e)
					{
					   // track error
					   $arrErrors['JOBS'][$objJob->id] = $e->getMessage();
					   
					   // also track as critical
					   $this->addCriticalError( $e->getMessage() );
					   
					   // move on to next job when a real exception occured
					   continue;
					}
				}				
				
				$blnSkip = false;
				// check for protocol errors
				if( $objJob->hasErrors() )
				{
					switch($objJob->onError)
					{
						// continue with next job
						case 'skip':
							$blnSkip = true;
							break;
						break;
						// close the whole API process
						case 'escape';
							// write error to session
							$arrErrors['JOBS'][$objJob->id] = 'Closed the API process at '.\Contao\Date::parse('d.m.Y H:i',time()).' with errors: '.$objJob->getErrorsAsString();
							
							// write log
							\Contao\System::getContainer()->get('monolog.logger.contao.general')->info($arrErrors['JOBS'][$objJob->id]);
							// return here
							return;
						break;
						// just keep on running but log the error
						default:
							$arrErrors['JOBS'][$objJob->id] = $objJob->getErrorsAsString();
						break;
					}
				}

				if( $blnSkip === true )
				{
					continue;
				}
				
				//-- Step 3: Get the output
				$arrOutput = $objJob->output();
				// remapping
				if( empty($objJob->reference) === false && isset($arrOutput[ $objJob->target ]) )
				{
					$arrOutput[ $objJob->reference ] = $arrOutput[ $objJob->target ];
					// remove old reference
					unset( $arrOutput[ $objJob->target ] );
				}
				// new values
				$diff_values = array_values( array_merge( array_diff($arrOutput,$arrData), array_diff($arrData,$arrOutput) ) );
				// keys injected or removed
				$diff_new_keys = array_diff_key($arrOutput,$arrData);
				$diff_remove_keys = array_diff_key($arrData,$arrOutput);
				
				// columns count will be different
				if( (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['debug'] === true && (count($diff_remove_keys) > 0 || count($diff_new_keys) > 0) )
				{
					$this->addError("The column count will be different. (job:".$objJob->id.")");
				}
				
				// new values applied
				if(count($diff_values) > 0 || count($diff_new_keys) > 0)
				{
					$arrReturn[$i] = array_merge($arrReturn[$i],$arrOutput);
				}
				
				// remove columns
				if(count($diff_remove_keys) > 0)
				{
				   foreach(array_keys($diff_remove_keys) as $k)
				   {
				   		unset($arrReturn[$i][$k]);
				   }
				}
				
				// update memory
				$arrMemory[$i][$ii] = $arrOutput;
			}
		}
		
		// -- HOOK --
		// Allow extensions to manipulate the final records before they will be applied to the database
		$arrReturn = \PCT\CustomCatalog\API\Hooks::callstatic('dataOutputHook',array($arrReturn,$this->getTable(),$this));
		
		return $arrReturn;
	}
	
	
	
	/**
	 * Set the affected rows collection. Should be an indexed array
	 * @param array
	 */
	public function setAffected($arrRows)
	{
		$this->arrAffected = $arrRows;
		// mark as modified
		$this->markAsModified('arrAffected');
	}
	
	
	/**
	 * Return the  affected rows
	 * @param integer	Limitation of the query
	 * @param integer	An offset for the query
	 * @param string	Custom sql conditions
	 * @return array
	 */
	public function getRecords($intLimit=0, $intOffset=0, $strConditions='', $strOrder='')
	{
		//-- read from object scope
		if($this->isModified('arrAffected'))
		{
			return $this->arrAffected;
		}
		
		//-- read from cache
		$arrCache = Cache::getApiAffectedData($this->id);
		if($arrCache !== null)
		{
			return $arrCache;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		
		$strTable = $this->getCustomCatalog()->getTable();
		if( strlen($strTable) < 1 || !$objDatabase->tableExists($strTable) )
		{
			return array();	
		}
		
		$objStmt = $objDatabase->prepare("SELECT * FROM ".$strTable . (strlen($strConditions) > 0 ? " WHERE ".$strConditions : ""). (strlen($strOrder) > 0 ? " ORDER BY ".$strOrder : "") );
		
		// set limitation and offsets
		if($intLimit > 0 || $intOffset > 0)
		{
			// set in object scope
			$this->set('intLimit', $intLimit);
			$this->set('intOffset', $intOffset);
			$objStmt->limit($intLimit,$intOffset);
		}

		// Hook: getRecordsHook to manipulate the database statement
		$objStmt = \PCT\CustomCatalog\API\Hooks::callstatic('getRecordsHook',array($objStmt,$this));
		if( $objStmt === null )
		{
			return array();
		}

		$objResult = $objStmt->execute();
		
		$arrResult = $objResult->fetchAllAssoc();
		
		if(!is_array($arrResult))
		{
			$arrResult = array();
		}

		// reindex by primary key
		if( isset($this->uniqueTarget) && !empty($this->uniqueTarget) )
		{
			$strPk = $this->uniqueTarget;
			$tmp = array();
			foreach($arrResult as $i => $row)
			{
				$tmp[ $row[$strPk] ] = $row;
			}
			$arrResult = $tmp;
			unset($tmp);
		}

		// set
		$this->setAffected( array_filter($arrResult) );
		
		// store the data in global cache
		Cache::addApiAffectedData($this->id,$arrResult);
		
		return $arrResult;
	}
	
	
	/**
	 * Return one record by the primary key
	 * @return array
	 */
	public function getRecord($varPk)
	{
		return $this->getRecords(1,0,$this->uniqueTarget.'='.$varPk);
	}
	
	
	/**
	 * Return the output array
	 * @return array
	 */
	public function getOutput()
	{
		return $this->arrOutput;
	}
	
	
	/**
	 * Return the result of the execution
	 * @return array||null
	 */
	public function setOutput($arrData)
	{
		$this->arrOutput = $arrData;
		
		// mark as modified
		$this->markAsModified('arrOutput');
		
		return $this->arrOutput;
	}
	
	
	/**
	 * Start the start of an api process. Start its session and write system log
	 */
	public function start()
	{
		// track end time
		$this->report('startTime',time());
		
		// open a session
		$arrSession = $this->getSession();
		
		// track starting time
		$arrSession['started'] = time();
		
		// set the session
		$this->setSession( $arrSession );
		
		// send onComplete event
		$this->triggerEvent('onStart');
	}
	
	
	/**
	 * Complete the api process and write final report
	 */
	public function done()
	{
		$arrSession = $this->getSession();
		
		$time = time();
		
		// track end time
		$this->report('endTime',$time);
		// track execution time
		$this->report('executionTime', abs($this->report('endTime') - $this->report('startTime')) );
		// track the result of the whole api
		$this->report('result',$this->getReport());
		// flag complete
		$this->report('complete',true);
		
		$arrSession['completed'] = $time;
		
		// track the errors
		if( $this->hasErrors() )
		{
			$this->report('errors',$this->getErrorsAsString());
			$this->report('completedWithErrors', true);
			$arrSession['completedWithErrors'] = true;
		}
		
		// store the report in the session
		$arrSession['report'] = $this->getReport();
		
		// set the session
		$this->setSession( $arrSession );
		
		// send onComplete event
		$this->triggerEvent('onComplete');
		
		// call the apiComplete Hook
		\PCT\CustomCatalog\API\Hooks::callstatic('apiCompleteHook',array($this));
	}
	
	
//! -- Source data management


	/**
	 * Return the source data
	 * @return array
	 */
	public function getSource()
	{
		if($this->isModified('arrSource'))
		{
			return $this->get('arrSource');
		}
		
		return $this->getSourceData();
	}


	/**
	 * Set the source data. Should be an indexed array
	 * @param array
	 */
	public function setSource($arrData)
	{
		$this->set('arrSource',$arrData);
		
		// mark as modified
		$this->markAsModified('arrSource');
		
		// store the source data in global cache
		Cache::addApiSourceData($this->id,$arrData);
	}

	
	/**
	 * Return the data from the selected source
	 * @param string		Pass a primary key identifier e.g. an alias or id
	 * @param mixed			The value of the primary key to locate a certain stack
	 * @return array
	 */
	public function getSourceData($strPk='',$varPk=null)
	{
		if( isset( $this->uniqueTarget ) && !empty( $this->uniqueTarget ) && empty($strPk) )
		{
			$strPk =  $this->uniqueTarget;
		}

		$ident = '';
		if(strlen($strPk) > 0)
		{
			$ident = '::'.$strPk;
		} 
		
		//-- read from cache
		$arrCache = Cache::getApiSourceData($this->id.$ident);
		if($arrCache !== null)
		{
			if(strlen($strPk) > 0 && $varPk !== null)
			{
				return (!isset($arrCache[$varPk]) ? array() : $arrCache[$varPk]);
			}
			return $arrCache;
		}
		
		//-- read from opject scope
		if($this->isModified('arrSource'.$ident))
		{
			// return a certain stack 
			if(strlen($strPk) > 0 && $varPk !== null)
			{
				return (!isset($this->arrSource[$varPk]) ? array() : $this->arrSource[$varPk]);
			}
			return $this->arrSource; 
		}
		
		//-- read from sources
		$arrReturn = array();
		
		//-- read from a foreign table
		if($this->source == 'table' && strlen($this->tableSRC) > 0 && \Contao\Database::getInstance()->tableExists($this->tableSRC))
		{
			$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$this->tableSRC)->execute();
			$arrReturn = $objResult->fetchAllAssoc();
		}
		//-- read from file
		else if($this->source == 'file' && isset($this->singleSRC))
		{
			$objFile = \Contao\FilesModel::findByPk($this->singleSRC);
			if($objFile === null || !file_exists( Controller::rootDir() .'/'.$objFile->path))
			{
				return array();
			}
			
			$objFile = new \Contao\File($objFile->path,true);
			
			$arrReturn = array();
			
			// CSV files
			if($objFile->extension == 'csv')
			{
				$delimiter = $this->getDelimiter();
				$enclosure = null;
				// get custom enclosure
				if( isset($GLOBALS['PCT_CUSTOMCATALOG_API']['ENCLOSURE'][$this->id]) && strlen($GLOBALS['PCT_CUSTOMCATALOG_API']['ENCLOSURE'][$this->id]) > 0)
				{
					$enclosure = $GLOBALS['PCT_CUSTOMCATALOG_API']['ENCLOSURE'][$this->id];
				}
				
				$arr_csv = array_filter(explode(PHP_EOL, $objFile->getContent()),'strlen');
				
				if(is_array($arr_csv) && count($arr_csv) > 0)
				{
					$fields = array();
					foreach($arr_csv as $i => $line) 
					{
						$s = str_getcsv($line,$delimiter,$enclosure);
						if(count($s) < 1)
						{
						   continue;
						}
						
						// line one has the field names
						if($i == 0)
						{
						   $fields = str_getcsv($line,$delimiter,$enclosure);
						   continue;
						}
						
						if(count($fields) != count($s))
						{
							continue;
						}
						
						$row = array_combine($fields, $s);
						
						$index = $i - 1;
						//  has primary key and value is not empty
						if(in_array($strPk, $fields) && strlen($strPk) > 0 && !empty($row[$strPk]))
						{
							$index = $row[$strPk];   
						}
						
						$arrReturn[$index] = $row;
					}
				}
			}
		}
		//-- read from php array
		else if($this->source == 'template' && isset($this->templateSRC))
		{
			$strTable = $this->getTable();
			$strFile = \Contao\TemplateLoader::getPath($this->templateSRC,'html5');
			
			if(file_exists($strFile))
			{
				include_once($strFile);
				$arrReturn = ${$strTable};
				
				if(!is_array($arrReturn))
				{
					$arrReturn = array();
				}
			}
		}
		// read from keyfield_callback
		else if( isset($GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type]['keyfield_callback']) && is_array($GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type]['keyfield_callback']) && count($GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type]['keyfield_callback']) > 0 )
		{
			$callback = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type]['keyfield_callback'];
			$arrReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($objDC);
		}
	
		// Hook: getSourceDataHook to manipulate the source data array
		$arrReturn = \PCT\CustomCatalog\API\Hooks::callstatic('getSourceDataHook',array($this, $arrReturn));
		
		// return here to avoid caching
		if( isset($this->addToCache) && $this->addToCache === false )
		{
			return $arrReturn;
		}

		// set source
		// if a unique primary key is applied, mark the source as unique by this key
		$this->set('arrSource'.$ident,$arrReturn);
		
		// mark as modified
		$this->markAsModified('arrSource'.$ident);
		
		// store the source data in global cache
		Cache::addApiSourceData($this->id.$ident,$arrReturn);
			
		return $arrReturn;
		
	}


//! -- Session management

	
	/**
	 * Return the current session array of the api
	 * @return array
	 */
	public function getSession()
	{
		// read from local storage
		$arrData = array();
		if($GLOBALS['PCT_CUSTOMCATALOG_API']['SETTINGS']['useLocalStorage'])
		{
			if(!file_exists( Controller::rootDir() .'/system/tmp/cc_api/'.$this->id.'/local.storage'))
			{
				return array();
			}
			
			include(Controller::rootDir().'/system/tmp/cc_api/'.$this->id.'/local.storage');
			$arrData = ${'session'};
			// deserialize the data
			$arrData = StringUtil::deserialize($arrData);
		}
		else
		{
			$arrData = System::getContainer()->get('request_stack')->getSession()->get('PCT_CUSTOMCATALOG_API');
		}
		
		
		return is_array($arrData[$this->id]) ? $arrData[$this->id] : array();
	}
	
	
	/**
	 * Set the session for the api
	 * @param array
	 */
	public function setSession($arrSet)
	{
		if($GLOBALS['PCT_CUSTOMCATALOG_API']['SETTINGS']['useLocalStorage'])
		{
			$objFile = new \Contao\File('system/tmp/cc_api/'.$this->id.'/local.storage');
			$data = array($this->id => $arrSet);
			// serialize data to minify the string
			$data = serialize($data);
			$str = strval(var_export($data, true));
			$objFile->write('<?php $session='.$str.';');
			$objFile->close();
		}
		
		$objSession = System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get('PCT_CUSTOMCATALOG_API');
		if(!is_array($arrSession))
		{
			$arrSession = array();
		}
		$arrSession[$this->id] = $arrSet;
		$objSession->set('PCT_CUSTOMCATALOG_API',$arrSession);
	}
	
	
	/**
	 * Clear the api session
	 */
	public function removeSession()
	{
		if($GLOBALS['PCT_CUSTOMCATALOG_API']['SETTINGS']['useLocalStorage'] && file_exists(Controller::rootDir().'/system/tmp/cc_api/'.$this->id.'/local.storage'))
		{
			$objFile = new \Contao\File('system/tmp/cc_api/'.$this->id.'/local.storage');
			$objFile->delete();
		}
		
		$objSession = System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get('PCT_CUSTOMCATALOG_API');
		unset($arrSession[$this->id]);
		$objSession->set('PCT_CUSTOMCATALOG_API',$arrSession);
	}


//! -- Errors	
	
	
	/**
	 * Close the api process with an error
	 * @param string
	 */
	public function closeWithError($strMessage='')
	{
		// close
		$this->done();
		
		// Write log
		if(\Contao\Config::get('debugMode'))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('API error: '.$strMessage);
		}
		
		if(\Contao\Environment::get('isAjaxRequest'))
		{
			if(!is_array(json_decode($strMessage)))
			{
				$strMessage = json_encode(array('error'=>$strMessage,'onError'=>'escape'));
			}
			die( $strMessage );
		}
	}
	  

//! -- Event handlers

	
	/**
	 * On start event
	 */
	public function onStart()
	{
		if(\Contao\Config::get('debugMode'))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info( 'CustomCatalog API ('.$this->id.') has been started at '.\Contao\Date::parse('d.m.Y H:i',time()) );
		}
	}
	
	
	/**
	 * On complete event
	 */
	public function onComplete()
	{
		if(\Contao\Config::get('debugMode'))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info( 'CustomCatalog API ('.$this->id.') has been completed at '.\Contao\Date::parse('d.m.Y H:i',time()) );
		}
	}
	
	
	/**
	 * On error event
	 */
	public function onError()
	{
		if(\Contao\Config::get('debugMode'))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info( 'CustomCatalog API ('.$this->id.') has errors '.\Contao\Date::parse('d.m.Y H:i',time()) );
		}
	}
	
	
//! -- Database 

	
	/**
	 * Purge the table
	 * @param boolean	True to create backup
	 * @param string
	 * @return boolean
	 */
	public function purgeTable($blnCreateBackup=false)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$strTable = $this->getTable();
		if( strlen($strTable) < 1 )
		{
			return false;
		}
		
		$objCount = $objDatabase->prepare("SELECT count(*) as count FROM $strTable")->execute();
		if($objCount->numRows < 1 || $objCount->count < 1)
		{
			return false;
		}
		
		if($blnCreateBackup)
		{
			$this->createBackup();
		}
		
		\Contao\Database::getInstance()->execute("DELETE FROM ".$strTable);
		
		// log
		\Contao\System::getContainer()->get('monolog.logger.contao.general')->info("CustomCatalog API ".$this->id.": Purge $strTable");

		return true;
	}


//! -- Backup management
	
	
	/**
	 * Create a new backup in tl_undo
	 * @return integer||null	The id of the new backup record
	 */
	public function createBackup()
	{
		$strTable = $this->getTable();
		if( strlen($strTable) < 1 )
		{
			return;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		
		// find all records
		$objRecords = $objDatabase->execute("SELECT * FROM ".$strTable);
		
		if($objRecords->numRows < 1)
		{
			return null;
		}
		
		$strInfo = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG_API']['MSC']['backupCreated'],'(id='.$this->id.')');
		
		$arrSet = array
		(
			'tstamp'		=> time(),
			'fromTable'		=> $strTable,
			'query'			=> $strInfo,
			'data' 			=> array($strTable => $objRecords->fetchAllAssoc()),
			'affectedRows' 	=> $objRecords->numRows,
		);
		
		$arrSet['pid'] = 1;
		if( Controller::isBackend() )
		{
			$objUser = \Contao\BackendUser::getInstance();
		}
		else if( Controller::isFrontend() )
		{
			$objUser = \Contao\FrontendUser::getInstance();
		}
		
		if($objUser->id > 0)
		{
			$arrSet['pid'] = $objUser->id;
		}
		
		$objStmt = $objDatabase->prepare("INSERT INTO tl_undo %s")->set($arrSet)->execute();
		
		$intReturn = $objStmt->__get('insertId');
		
		// log
		\Contao\System::getContainer()->get('monolog.logger.contao.general')->info("CC API (".$this->id."): Created Backup for $strTable : tl_undo.id=".$intReturn);
	
		return $intReturn;
	}
	
//! -- Inserttags

	
	/**
	 * Replace api related inserttags
	 * @param string
	 * @return string
	 */
	public function replaceInsertTags($strValue)
	{
		if(strlen($strValue) < 1 || !is_string($strValue))
		{
			return $strValue;
		}
		
		// replace known tags
		$arrTags = array
		(
			'{{table}}' 	=> $this->getTable(),
			'{{id}}' 		=> $this->id,
		);
		
		$strReturn = str_replace( array_keys($arrTags), array_values($arrTags), $strValue);
		
		// replace Contaos Inserttags
		$strReturn = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($strReturn,false);
			
		return $strReturn;
	}
	
	
}