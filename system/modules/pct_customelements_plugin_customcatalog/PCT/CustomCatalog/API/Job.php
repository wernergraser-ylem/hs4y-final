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

use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * Job
 * Provide the basic stack of methods to communicate with an API jobs
 */
class Job extends \PCT\CustomCatalog\API\Controller implements \PCT\CustomCatalog\Interfaces\JobInterface
{
	/**
	 * Current database record that is being processed
	 * @var array
	 */
	protected $currentRow = array();
	
	/**
	 * The input array.
	 * @var array
	 */
	protected $arrInput;
	
	/**
	 * The output array after manipluations
	 * @var array
	 */
	protected $arrOutput;
	
	
	/**
	 * Init
	 */
	public function __construct(array $arrData)
	{
		$this->setData($arrData);
	}
	
	
	/**
	 * Execute
	 * {@inheritdoc}
	 * (is mandatory by interface)
	 * 
	 * @return array	The modified array
	 */
	public function execute()
	{
		$objApi = $this->getApi();
		$strTable = $objApi->getCustomCatalog()->getTable();
		$strMode = $objApi->mode;
		$objModelHelper = \PCT\CustomElements\Helper\ModelHelper::getInstance($strTable);
		
		// track mode
		$this->report('mode',$strMode);
		// track start time
		$this->report('startTime',time());
		// track table
		$this->report('table',$strTable);
		
		// get the input 
		$arrInput = $this->input();
		
		// return on update/inserts only
		if( ($this->rule == 'update' && !$this->isUpdate()) || ($this->rule == 'insert' && !$this->isInsert()) )
		{
		   // set the output
		   $this->output($arrInput);
		   
		   // track end time
		   $this->report('endTime',time());
		   // track execution time
		   $this->report('executionTime', abs($this->report('endTime') - $this->report('startTime')) );
		   
		   // mark as completed
		   $this->markAsModified('completed');
		   
		   return $this;
		}
		
		// check if input has an id field
		$intId = $arrInput['id'] ?: 0;
		
		// mark current row
		$this->current_row($arrInput);
		
		// modify the records
		$arrOutput = $arrInput;
		
		// start a field value manipulation
		if($this->type == 'field')
		{
			// field does not exist in the record data
			if(!isset($arrInput[$this->target]))
			{
				$this->addError('Target field '.$strTable.'.'.$this->target.' does not exist in row (id='.$intId.')');
			}
			
			// run field value action
			$arrOutput = $this->fieldValueAction($arrInput);
		}
		
		// set the output
		$this->output($arrOutput);
		
		// -- HOOK ---
		// Allow manipulations on the whole job object from outside
		if (isset($GLOBALS['CUSTOMCATALOG_HOOKS']['executeApiJob']) && count($GLOBALS['CUSTOMCATALOG_HOOKS']['executeApiJob']) > 0)
		{
			foreach($GLOBALS['CUSTOMCATALOG_HOOKS']['executeApiJob'] as $callback)
			{
				\Contao\System::importStatic($callback[0])->{$callback[1]}($strTable, $objApi, $this);
				
				// mark as manipulated by hook
				$this->markAsModified('manipulated::hook('.$callback[0].'.'.$callback[1].')');
			}
		}
		
		// track end time
		$this->report('endTime',time());
		// track execution time
		$this->report('executionTime', abs($this->report('endTime') - $this->report('startTime')) );
		
		// mark as completed
		$this->markAsModified('completed');
		
		// return itself to make it accessible through chaining
		return $this;
	}
	
	
//! -- Field value management
	
	
	/**
	 * Manipulate the target field value and return the new array
	 * @param array		The affected row as array to work on
	 * @return mixed	The manipulated value
	 */
	protected function fieldValueAction($arrData)
	{
		// orig
		$arrReturn = $arrData;
	
		// value before
		$varBefore = $arrData[$this->target];
		
		$varReturn = null;
		// do the action 
		switch($this->action)
		{
			// !ignore, remove the whole column
			case 'exclude':
				unset($arrReturn[$this->target]);
				break;
			// !fixed value
			case 'value':
			case 'headline':
				$varReturn = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($varReturn ?? '',false);
				// apply value
				$arrReturn[$this->target] = $varReturn;
				break;
			// !html, code
			case 'text':
			case 'code':
			case 'html':
				$varReturn = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($this->code,false);
				// apply value
				$arrReturn[$this->target] = $varReturn;
				break;
			// !timestamp
			case 'timestamp':
				$varReturn = $this->tstampSRC;
				// apply value
				$arrReturn[$this->target] = $varReturn;
				break;
			// !relations
			case 'relations':
				$objApi = $this->getApi();
				
				// current row of the source data
				$arrSource = $this->current_row();
				// get the unique field from the source
				$strUniqueSource = $objApi->uniqueSource;
				// get the unique field from the target
				$strUniqueTarget = $objApi->uniqueTarget;
				// primary key value in target
				$varPk = $arrData[$strUniqueTarget];
				
				// break if source data is empty
				if(!is_array($arrSource) || count($arrSource) < 1)
				{
					$arrReturn[$this->target] = $varBefore;
					break;
				}
				
				// check if source data is associated or sequential
				$blnIsAssoc = (count(array_filter(array_keys($arrSource), 'is_string')) > 0 ? true : false);
				
				// source is a nonsequential array 
				$varSource = null;
				if($blnIsAssoc === true)
				{
					$varSource = $arrSource[$this->source];
				}
				// value from source when source is a sequential array
				else
				{
					$varSource = $arrSource[$varPk][$this->source];
				}

				// prepare relations mapping
				$tmp = StringUtil::deserialize( $this->code ) ?: array();
				$arrRelations = array();
				foreach($tmp as $data)
				{
					$arrRelations[ $data['value'] ] = $data['label'];
				}
				// source to target
				$match = false;
				if( isset($arrRelations[ $varSource ]) || \array_key_exists($varSource, $arrRelations) )
				{
					$match = true;
				}
				else if( isset($arrRelations[ (string)$varSource ]) )
				{
					$match = true;
				}
				
				if( $match )
				{
					$varReturn = $arrRelations[ $varSource ];
				}
				
				// apply value
				$arrReturn[$this->target] = $varReturn;
				break;
			// !hook
			case 'hook':
				if(strlen($this->hookSRC) > 0)
				{
					$callback = explode('::',$this->hookSRC);
					$arrReturn[$this->target] = \Contao\System::importStatic($callback[0])->{$callback[1]}($varBefore,$arrData,$this);
				}
				break;
			// !file
			case 'file':
				
				// if a source is selected, recall the method but simulate a "source" action with mode "file"
				if(strlen($this->source) > 0)
				{
					// store temporary
					$this->_mode = $this->mode;
					$this->_action = $this->action;
					
					$this->action = 'source';
					
					return $this->fieldValueAction($arrData);
				}
				
				$valSource = $this->code;
				
				if(strlen($valSource) < 1)
				{
					$arrReturn[$this->target] = $valSource;
					break;
				}
				
				// @var API object
				$objApi = $this->getAPI();
				
				// run file action
				$objFile = $this->fileAction( trim($this->code) );
				
				if($objFile === null)
				{
					// write if file not found and contao is in debug mode
					if((boolean)\Contao\Config::get('debugMode') === true)
					{
						\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('API ('.$objApi->id.') job ('.$this->id.'): File not found or not loadable.');
					}
					$arrReturn[$this->target] = $valSource;
					break;
				}
				
				switch($this->mode)
				{
					// auto mode
					case 'auto':
						// import should return binary
						if($objApi->mode == 'import')
						{
							$arrReturn[$this->target] = $objFile->uuid;
						}
						// export should return path to file
						else if($objApi->mode == 'export')
						{
							$arrReturn[$this->target] = $objFile->path;
						}
						break;
					// binary (e.g. for imports)
					case 'uuidToBin':
						$arrReturn[$this->target] = $objFile->uuid;
						break;
					// uuid
					case 'binToUuid':
						$arrReturn[$this->target] = \Contao\StringUtil::binToUuid($objFile->uuid);
						break;
					// toPath
					case 'toPath':
						$arrReturn[$this->target] = $objFile->path;
						break;
					// copy and default
					case 'copy':
					default:
						$arrReturn[$this->target] = $valSource;
						break;
				}
				
				// hook
				if($this->mode == 'hook' && strlen($this->hookSRC) > 0)
				{
					$callback = explode('::',$this->hookSRC);
					$arrReturn[$this->target] = \Contao\System::importStatic($callback[0])->{$callback[1]}($valSource,$arrData,$this);
				}
				
				break;
			//! files
			case 'files':
				
				// if a source is selected, recall the method but simulate a "source" action with mode "files"
				if(strlen($this->source) > 0)
				{
					// store temporary
					$this->_mode = $this->mode;
					$this->_action = $this->action;
					
					$this->action = 'source';
					$this->mode = 'files';
					
					return $this->fieldValueAction($arrData);
				}
				
				$valSource = $this->code;
				
				if(strlen($valSource) < 1)
				{
					$arrReturn[$this->target] = $valSource;
					break;
				}
				
				// @var API object
				$objApi = $this->getAPI();
				
				$arrFiles = array();
				
				// run file action for each path
				foreach(explode(',', trim($this->code)) as $path)
				{
					$arrFiles[] = $this->fileAction($path);
				}
				
				// filter null values by invalid files
				$arrFiles = array_filter($arrFiles);
				
				if(!is_array($arrFiles) || count($arrFiles) < 1)
				{
					$arrReturn[$this->target] = $valSource;
					break;
				}
				
				// build value array
				$arrValues = array();
				foreach($arrFiles as $objFile)
				{
					switch($this->mode)
					{
						// auto mode
						case 'auto':
							// import should return binary
							if($objApi->mode == 'import')
							{
								$arrValues[] = $objFile->uuid;
							}
							// export should return path to file
							else if($objApi->mode == 'export')
							{
								$arrValues[] = $objFile->path;
							}
							break;
						// binary (e.g. for imports)
						case 'uuidToBin':
							$arrValues[] = $objFile->uuid;
							break;
						// uuid
						case 'binToUuid':
							$arrValues[] = \Contao\StringUtil::binToUuid($objFile->uuid);
							break;
						// toPath
						case 'toPath':
							$arrValues[] = $objFile->path;
							break;
						// copy and default
						case 'copy':
						default:
							$arrValues[] = $objFile->path;
							break;
					}
				}
				
				// hook
				if($this->mode == 'hook' && strlen($this->hookSRC) > 0)
				{
					$callback = explode('::',$this->hookSRC);
					$arrValues = \Contao\System::importStatic($callback[0])->{$callback[1]}($valSource,$arrData,$this);
				}
				
				$arrReturn[$this->target] = $arrValues;
				break;
			//! source
			case 'source':
				$objApi = $this->getApi();
				
				// current row of the source data
				$arrSource = $this->current_row();
				// get the unique field from the source
				$strUniqueSource = $objApi->uniqueSource;
				// get the unique field from the target
				$strUniqueTarget = $objApi->uniqueTarget;
				// primary key value in target
				$varPk = $arrData[$strUniqueTarget];
				
				// break if source data is empty
				if(!is_array($arrSource) || count($arrSource) < 1)
				{
					$arrReturn[$this->target] = $varBefore;
					break;
				}
				
				// check if source data is associated or sequential
				$blnIsAssoc = (count(array_filter(array_keys($arrSource), 'is_string')) > 0 ? true : false);
				
				// source is a nonsequential array 
				$varSource = null;
				if($blnIsAssoc === true)
				{
					$varSource = $arrSource[$this->source];
				}
				// value from source when source is a sequential array
				else
				{
					$varSource = $arrSource[$varPk][$this->source];
				}
				
				// get value from source field selector
				if($this->mode == 'copy' && $varSource !== null)
				{
					$varReturn = $varSource;
				}
				//! source: convert via PHP function
				else if($this->mode == 'php' && $varSource !== null && strlen($this->code) > 0)
				{
					$varReturn = $varSource;
					
					$strCode = trim( \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($this->code,false) );
					// create an php helper file containing the $varReturn variable executing the methods provided	
					$objPhpFile = new \Contao\File('system/tmp/cc_api/api_job_helper_'.$this->id.'.php',true);
					$objPhpFile->write('<?php $varReturn = '.str_replace('?',$varSource,$strCode).'; ?>');
					$objPhpFile->close();
					
					if(file_exists(Controller::rootDir().'/'.$objPhpFile->path))
					{
						include(Controller::rootDir().'/'.$objPhpFile->path);
					}
				}
				//! source: convert the value via hook
				else if($this->mode == 'hook' && strlen($this->hookSRC) > 0)
				{
					$varReturn = $varSource;
					#$varBefore,$arrData,$this
					$callback = explode('::',$this->hookSRC);
					$varReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrSource,$arrData,$this);
				}
				//! source uuidToBin: unique id to binary conversion
				else if($this->mode == 'uuidToBin' && $varSource !== null)
				{
					$varReturn = $valSource;
					
					$valSource = StringUtil::deserialize( $varSource );
					
					if(is_array($valSource))
					{
						$varReturn = serialize( array_map('StringUtil::uuidToBin', $varSource) );
					}
					else if( \Contao\Validator::isStringUuid($valSource) )
					{
						$varReturn = \Contao\StringUtil::uuidToBin($valSource);
					}
				}
				//! source binToUuid: binary value to unique id conversion
				else if($this->mode == 'binToUuid' && $varSource !== null)
				{
					$varReturn = $valSource;
					
					$valSource = StringUtil::deserialize( $varSource );
					
					if(is_array($valSource))
					{
						$varReturn = serialize( array_map('StringUtil::binToUuid', $varSource) );
					}
					else if( \Contao\Validator::isBinaryUuid($valSource) )
					{
						$varReturn = \Contao\StringUtil::binToUuid($valSource);
					}
				}
				//! source toPath: from binary or uuid to a path
				else if($this->mode == 'toPath' && $varSource !== null)
				{
					// is path already
					if(file_exists(Controller::rootDir().'/'.$varSource) || is_dir(Controller::rootDir().'/'.$varSource))
					{
						$arrReturn[$this->target] = \Contao\Dbafs::addResource($varSource)->path;
						break;
					}
					// check for existing file by uuid/binary
					$objFile = \Contao\FilesModel::findByPk($varSource);
					if( $objFile !== null )
					{
						$arrReturn[$this->target] = $objFile->path;
						break;
					}

					$objFile = \Contao\FilesModel::findByPath($varSource);
					if( $objFile !== null )
					{
						$arrReturn[$this->target] = $objFile->path;
						break;
					}
				}
				//! source file
				else if($this->mode == 'file' && $varSource !== null)
				{
					// reset the original variables
					$this->mode = $this->_mode;
					$this->action = $this->_action;
					
					// @var API object
					$objApi = $this->getAPI();
					
					// run file action
					$objFile = $this->fileAction( trim($varSource) );
					
					if($objFile === null)
					{
						// write if file not found and contao is in debug mode
						if((boolean)\Contao\Config::get('debugMode') === true)
						{
							\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('API ('.$objApi->id.') job ('.$this->id.'): File not found or not loadable.');
						}
						$arrReturn[$this->target] = $varSource;
						break;
					}
					
					switch($this->mode)
					{
						// auto mode
						case 'auto':
							// import should return binary
							if($objApi->mode == 'import')
							{
								$varReturn = $objFile->uuid;
							}
							// export should return path to file
							else if($objApi->mode == 'export')
							{
								$varReturn = $objFile->path;
							}
							break;
						// binary (e.g. for imports)
						case 'uuidToBin':
							$varReturn = $objFile->uuid;
							break;
						// uuid
						case 'binToUuid':
							$varReturn = \Contao\StringUtil::binToUuid($objFile->uuid);
							break;
						// toPath
						case 'toPath':
							$varReturn = $objFile->path;
							break;
						// copy and default
						case 'copy':
						default:
							$varReturn = $valSource;
							break;
					}
					
					// hook
					if($this->mode == 'hook' && strlen($this->hookSRC) > 0)
					{
						$callback = explode('::',$this->hookSRC);
						$varReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($valSource,$arrData,$this);
					}

					// free temporary variables
					unset($this->_mode);
					unset($this->_action);
				}
				//! source files
				else if($this->mode == 'files' && $varSource !== null)
				{
					// reset the original variables
					$this->mode = $this->_mode;
					$this->action = $this->_action;
					
					// @var API object
					$objApi = $this->getAPI();
					
					$arrFiles = array();
					
					// run file action for each path
					foreach(explode(',', trim($varSource)) as $path)
					{
						$arrFiles[] = $this->fileAction($path);
					}
					
					// filter null values by invalid files
					$arrFiles = array_filter($arrFiles);
					
					if(!is_array($arrFiles) || count($arrFiles) < 1)
					{
						$arrReturn[$this->target] = $varSource;
						break;
					}
					
					// build value array
					$arrValues = array();
					foreach($arrFiles as $objFile)
					{
						switch($this->mode)
						{
							// auto mode
							case 'auto':
								// import should return binary
								if($objApi->mode == 'import')
								{
									$arrValues[] = $objFile->uuid;
								}
								// export should return path to file
								else if($objApi->mode == 'export')
								{
									$arrValues[] = $objFile->path;
								}
								break;
							// binary (e.g. for imports)
							case 'uuidToBin':
								$arrValues[] = $objFile->uuid;
								break;
							// uuid
							case 'binToUuid':
								$arrValues[] = \Contao\StringUtil::binToUuid($objFile->uuid);
								break;
							// toPath
							case 'toPath':
								$arrValues[] = $objFile->path;
								break;
							// copy and default
							case 'copy':
							default:
								$arrValues[] = $objFile->path;
								break;
						}
					}
				
					// hook
					if($this->mode == 'hook' && strlen($this->hookSRC) > 0)
					{
						$callback = explode('::',$this->hookSRC);
						$arrValues = \Contao\System::importStatic($callback[0])->{$callback[1]}($valSource,$arrData,$this);
					}
					
					$varReturn = $arrValues;
					
					// free temporary variables
					unset($this->_mode);
					unset($this->_action);
				}
				// bypass
				else
				{
					$varReturn = $varBefore;
				}
					
				// apply value
				$arrReturn[$this->target] = $varReturn;
				break;
			//! sql
			case 'sql':
				$query = $this->sqlSRC;
				$col_return = 'id';
				
				// look for return columns
				$arr = explode('->', $query);
				if(count($arr) > 0)
				{
					$query = $arr[0];
					$col_return = $arr[1];
				}
				
				// replace regular inserttags
				$query = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($query,false);
				$objStmt = \Contao\Database::getInstance()->prepare($query)->execute($varBefore);
				$varReturn = $objStmt->{$col_return};
				
				// apply value
				$arrReturn[$this->target] = $varReturn;
				
				break;
			//! bypass
			default:
				$arrReturn[$this->target] = $varBefore;
				break;
		}
			
		return $arrReturn;
	}
	
	
//! -- Action: file
	
	
	/**
	 * Create a local file from a local or external resource and return the file object
	 * @param mixed|string	The source path/url or inserttag to the file
	 */
	protected function fileAction($valSource)
	{
		$objApi = $this->getAPI();
		$objFile = null;
		
		// is file inserttag
		if(strlen(strpos($valSource, '{{file::')) > 0)
		{
			$valSource = str_replace(array('{{file::','}}'),'',$valSource);
			// is uuid
			if(\Contao\Validator::isUuid($valSource))
			{
				$objFile = \Contao\FilesModel::findByUuid($valSource);
			}
			// is local path
			else if(file_exists(Controller::rootDir().'/'.$valSource))
			{
				// add the file to the file system
				$objFile = \Contao\Dbafs::addResource($valSource);
			}
		}
		// is local path
		else if(file_exists(Controller::rootDir().'/'.$valSource))
		{
			// add the file to the file system
			$objFile = \Contao\Dbafs::addResource($valSource);
		}
		// is external url
		else if(strlen(strpos($valSource, 'http')) > 0)
		{
			$basename = pathinfo($valSource,PATHINFO_BASENAME);
			$extension = pathinfo($valSource,PATHINFO_EXTENSION);
			$filename = pathinfo($valSource,PATHINFO_FILENAME);
			if(!in_array( $extension, explode(',',\Contao\Config::get('uploadTypes')) ))
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.errorl')->info('API ('.$objApi->id.') job ('.$this->id.'): File is not allowed upload type. See Contao system settings.');
				return null;
			}
			
			$strPath = \Contao\Config::get('uploadPath') ?? 'files';
			
			// get reference attribute
			if($this->attr_id > 0)
			{
				$objAttribute = \PCT\CustomElements\Models\AttributeModel::findByPk($this->attr_id);
				
				// set new path 
				if(isset($objAttribute->eval_path))
				{
					$strPath = \Contao\FilesModel::findByUuid($objAttribute->eval_path)->path;
				}
				
				// check allowed file types on attribute level
				if($objAttribute->eval_extensions)
				{
					if(!in_array( $extension, explode(',',$objAttribute->eval_extensions) ))
					{
						// log
						\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('API ('.$objApi->id.') job ('.$this->id.'): File is not allowed upload type. See attribute settings: '.$objAttribute->id);
						return null;
					}
				}
			}
			
			$strContent = file_get_contents($valSource);
			if(strlen($strContent) < 1)
			{
				// log
				\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('API ('.$objApi->id.') job ('.$this->id.'): File not '.$valSource.' found or zero byte');
				return null;
			}
			
			$strFile = $strPath.'/'.$basename;
			// create file object
			$objFile = new \Contao\File($strFile,true);
			// load the file content
			$objFile->write( $strContent );
			// close the file handler
			$objFile->close();
			
			// check if file is an image
			$isImage = in_array( $extension, explode(',',\Contao\Config::get('validImageTypes')) );
			
			// create the image
			if($isImage)
			{
				#$objImage = \Contao\Image::create($objFile);
				$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
				$strFile = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path,array())->getUrl($projectDir);
			}
			
			// add the file to the file system
			if(file_exists(Controller::rootDir().'/'.$strFile))
			{
				$objFile = \Contao\Dbafs::addResource($strFile);
			}
		}
		
		return $objFile;
	}

		
	/**
	 * Set or get the current row
	 * @param array|null
	 */
	protected function current_row($varRow=null)
	{
		if($varRow !== null)
		{
			$this->currentRow = $varRow;
		}
		return $this->currentRow;
	}	 

	
//! -- Public methods

	
	/**
	 * Set or get the input data
	 * @param array||null
	 */
	public function input($arrData=null)
	{
		if($arrData !== null)
		{
			$this->arrInput = $arrData;
			
			// mark as modfied
			$this->markAsModified('arrInput');
			
			// return itself to make it accessible through chaining
			return $this;
		}
		
		return $this->arrInput;
	}


	/**
	 * Return the result of the execution
	 * @return array||null
	 */
	public function output($arrData=null)
	{
		if(!$this->isModified('completed') && $arrData === null)
		{
			$this->addError('Job has never been executed.');
			return array();
		}
		
		if(is_array($arrData))
		{
			$this->arrOutput = $arrData;
		}
		
		return $this->arrOutput;
	}

	
	/**
	 * Set the API object
	 * @param object	API instance
	 */
	public function setAPI($objValue)
	{
		$this->objApi = $objValue;
		
		// mark as modfied
		$this->markAsModified('objApi');
	}
	
	
	/**
	 * Return the API object
	 * @return object	API instance
	 */
	public function getAPI()
	{
		if($this->isModified('objApi'))
		{
			return $this->objApi;
		}
		
		$objReturn = \PCT\CustomCatalog\API\Factory::findById($this->pid);
		
		// set
		$this->setAPI($objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Return the title of the job
	 * @return string
	 */
	public function getTitle()
	{
		if( $this->get('addTitle') )
		{
			return $this->get('title');
		}
		return $this->get('target');
	}
			
	
	/**
	 * Return the current row
	 * @return array|null
	 */
	public function getCurrentRow() 
	{
		return $this->current_row();
	}
	
	
	/**
	 * Return the original records
	 * @return array
	 */
	public function getOriginalRecords()
	{
		if(!$this->isModified('arrOriginalRecords') || !$this->isModified('done'))
		{
			$arrRecords = $this->getApi()->getRecords();
			$this->set('arrOriginalRecords',$arrRecords);
			// mark as modfied
			$this->markAsModified('arrOriginalRecords');
		}
		
		return $this->get('arrOriginalRecords');
	}
	
	
	/**
	 * Return boolean true if current job is part of the update plan
	 */
	public function isUpdate()
	{
		if((boolean)$this->getAPI()->allowUpdate === false)
		{
			return false;
		}
		
		$arrInput = $this->input();
		$arrUpdates = $this->getApi()->findUpdateRecords();
		$strPk = $this->getApi()->uniqueTarget;
		
		if(count($arrInput) < 1 || empty($arrUpdates[$strPk]))
		{
			return false;
		}
			
		if(in_array($arrInput[$strPk], $arrUpdates[$strPk]))
		{
			return true;
		}
		
		return false;
	}
	
	
	/**
	 * Return boolean true if current job is part of the insert plan
	 */
	public function isInsert()
	{
		if((boolean)$this->getAPI()->allowInsert === false || $this->isUpdate())
		{
			return false;
		}
		return true;
	}
}