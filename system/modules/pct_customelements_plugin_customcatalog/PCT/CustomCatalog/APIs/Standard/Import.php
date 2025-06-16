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
namespace PCT\CustomCatalog\API\Standard;

/**
 * Class file
 * Import
 * Provide various functions to import data into CCs
 */
class Import extends \PCT\CustomCatalog\API\Base
{
	/**
	 * Public flag: Close api after completing the jobs
	 * Will return before sending any set data to the output department
	 * @param boolean
	 */
	public $doImport = true;

	
	/**
	 * Update array will contain all records that should be updated
	 * @var array
	 */
	protected $arrUpdate = array();
	
	/**
	 * Insert array will contain all records that should be inserted
	 * @var array
	 */
	protected $arrInsert = array();
	
	/**
	 * Revised array will contain all records that should be deleted
	 * @var array
	 */
	protected $arrDelete = array();
	
	/**
	 * Associate array by primary key with records that should be updated
	 * @var array
	 */
	protected $arrUpdateRecords = array();
	
	
	/**
	 * Run
	 * {@inheritdoc}
	 * (is mandatory by interface)
	 */
	public function run()
	{
		$objDatabase = \Contao\Database::getInstance();
		
		// track start time
		$this->report('startTime',time());
		
		// @var \CustomCatalog || \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog
		$objCC = $this->getCustomCatalog();
		if($objCC === null)
		{
			return;
		}
		
		$strTable = $objCC->getTable();
		if(strlen($strTable) < 1)
		{
			throw new \Exception('Table name should not be empty');
		}
		// check if the table exists
		else if(!$objDatabase->tableExists($strTable))
		{
			throw new \Exception('Table does not exist');
		}
		
		// track table
		$this->report('table',$strTable);
		
		// set table
		$this->setTable($strTable);
		
		//-- valid processing from here
		
		// open a session
		$arrSession = $this->getSession();
		
		// track starting time
		$arrSession['started'] = time();
		
		// get the jobs
		$this->arrJobs = $this->getActiveJobs();
		
		// get the affected records (current records in target table)
		// @var array
		$arrRecords = $this->getRecords();
		
		// get the import data from the source
		// @var array
		$arrSource = $this->getSourceData();
		
		if(empty($arrSource))
		{
		   $this->addError("No import data found for table $strTable");
		}
		
		if( $this->hasErrors() )
		{
			$arrSession['errors'] = $this->getErrors();
			$arrSession['completedWithErrors'] = true;
			
			$this->setSession( $arrSession );
			return;
		}

		// run the jobs
		$arrSet = $this->runJobs();		
		
		// set the output
		$this->setOutput($arrSet);
		
		// no import data
		if(count($arrSet) < 1)
		{
			$this->addError("No import data for table ".$strTable);
			
			$arrSession['completed'] = time();
			
			$this->setSession( $arrSession );
			return;	
		}
		
		
		// bypass the whole import department
		if(!$this->doImport)
		{
			// complete
			$this->done();
			
			return;
		}
		
		// create backup
		if($this->backup)
		{
			$this->createBackup();
		}
		
		// empty table
		if($this->purgeTable)
		{
			$this->purgeTable();
		}
		
		// do the import
		$this->import($arrSet);
				
		// complete
		$this->done();		
		
		// throw errors
		if($this->hasCriticalErrors() && (boolean)\Contao\Config::get('customcatalog_api_stopOnCriticalErrors') === true)
		{
			$strErrors = $this->getErrorsAsString('CRITICAL');
			$this->throwException($strErrors);
		}
	}
	
	
	/**
	 * Do the import
	 * @param array		The final data
	 */
	public function import($arrSet=null)
	{
		if($arrSet === null)
		{
			$arrSet = $this->getOutput();
		}
		
		if(!is_array($arrSet))
		{
			return;
		}
				
		// @var object \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder
		$objQueryBuilder = \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder::getInstance();
		// @var object \Database
		$objDatabase = \Contao\Database::getInstance();
		$arrRecords = $this->getRecords();
		$arrSource = $this->getSource();
		$strTable = $this->getTable();
		

		// strip fields from set array that do not exist in the target table
		$arrSet = $objQueryBuilder->stripFields($arrSet,$strTable);

		// track records to be deleted
		if($this->allowDelete && (count($arrRecords) > 0 && count($arrSet) > 0) && (strlen($this->uniqueTarget) > 0 && strlen($this->uniqueSource) > 0) )
		{
			// keys that exist in current records compared to keys coming in source records
			$tmp = \array_diff_key( $arrRecords, $arrSet );
			if( !empty($tmp) )
			{
				foreach( $tmp as $intPk => $row)
				{
					$this->addToDeleteList($row);
					// remove from records array
					unset( $arrRecords[$intPk] );
				}
				unset($tmp);
			}
		}
		// track records to be updated
		if($this->allowUpdate && (count($arrRecords) > 0 && count($arrSet) > 0) && (strlen($this->uniqueTarget) > 0 && strlen($this->uniqueSource) > 0) )
		{
			// keys that exist in current records compared to keys coming in source records
			$tmp = \array_intersect_key( $arrRecords, $arrSet );
			if( !empty($tmp) )
			{
				foreach( $tmp as $intPk => $row)
				{
					$arr = array
					(
						'pk' 			=> $this->uniqueTarget,			// primary key
						'pk_value'		=> $row[$this->uniqueTarget],	// primary value
						'data'			=> $arrSet[$intPk]				// new data
					);
					
					// add to update list
					$this->addToUpdateList($arr);
					
					// remove from set array
					unset( $arrSet[$intPk] );
				}
			}
		}


		// track records to be inserted
		if( $this->allowInsert && count($arrSet) > 0 )
		{
			$tmp = array();
			foreach( $arrSet as $intPk => $row )
			{
				// strip primary keys
				if( $this->uniqueTarget && isset($row[$this->uniqueTarget]) )
				{
					unset($row[ $this->uniqueTarget ]);
				}
			}

			// track new records
			$this->arrInsert[$strTable] = $arrSet;
		}
		
		// track the results of the database statements
		$arrResult = array();		
		
//! UPDATEs
		if(!empty($this->arrUpdate))
		{
			try
			{
				$result = array();
				
				// store the ids of the updated records
				$records = array();
			
				foreach($this->arrUpdate as $table => $arrData)
				{
					if(!is_array($arrData) || count($arrData) < 1)
					{
						continue;
					}
					
					$objQueryBuilder->setTable($table);
					
					$records[$table] = array();
					
					if($this->uniqueTarget)
					{
						$result['pk'] = $this->uniqueTarget;
					}
					
					foreach($arrData as $data)
					{
						if(!isset($data['data']))
						{
							continue;
						}
						
						$row = $data['data'];
						$pk = $data['pk'];
						$pk_value = $row[$this->uniqueTarget];
						
						$result['pk_value'] = $row[$this->uniqueTarget];
						
						$objStmt = $objQueryBuilder
						// set primary key
						->primary($pk)
						// set primary value
						->primary_value($pk_value)
						// build update statement
						->prepareUpdate($row);
						
						// execute
						if($objStmt !== null)
						{
							$objStmt->execute();
						}
						
						$result['query'] = $objStmt->__get('query');
						
						// track updated record
						$records[$table][] = $pk_value;
					}	
				}
				
				// add to results
				$arrResult['UPDATE'] = $records;
				
				// free variables
				unset($result);
				unset($records);
			}
			catch(\Exception $e)
			{
			   // track error
			   $arrErrors['UPDATE'][] = $e->getMessage();
			   
			   // track as critical
			   $this->addCriticalError( $e->getMessage() );
			}
		}

//! INSERTs		
		if(!empty($this->arrInsert))
		{
			try
			{
				$result = array();
				
				// store the ids of the new records
				$records = array();
				foreach($this->arrInsert as $table => $rows)
				{
					// set the table
					$objQueryBuilder->setTable($table);
					$records[$table] = array();
					
					// build the insert statements
					$arrStatements = $objQueryBuilder->prepareInsert($rows);
					
					// execute
					if(!empty($arrStatements) && is_array($arrStatements) )
					{
						foreach($arrStatements as $objStatement)
						{
							$objStatement->execute();
							// get the id of the new record
							$insertId = $objStatement->__get('insertId');
							// store new record id
							$records[$table][] = $insertId;
						}
					}
				}
				
				// add to results
				$arrResult['INSERT'] = $records;
				
				// free variables
				unset($result);
				unset($records);
			}
			catch(\Exception $e)
			{
				// track error
				$arrErrors['INSERT'][] = $e->getMessage();
				// track as critical
				$this->addCriticalError( $e->getMessage() );
			}
		}
		
//! DELETEs
		if(!empty($this->arrDelete))
		{
			try
			{
				$strPk = $this->uniqueTarget;
				$result = array();
				$records = array();
				foreach($this->arrDelete as $table => $rows)
				{
					if(count($rows) < 1)
					{
						continue;
					}
					
					$arrPkValues = array();
					foreach($rows as $row)
					{
						if(isset($row[$strPk]))
						{
							$arrPkValues[] = $row[$strPk];
						}
					}
					
					if(count($arrPkValues) > 0)
					{
						$objStmt = $objDatabase->prepare("DELETE FROM ".$table." WHERE ".$strPk." IN (".implode(',', $arrPkValues).")")->execute();
										
						// store the deleted records
						$records[$table] = array_merge($records[$table] ?: array(), $arrPkValues);
					}
				}
					
				
				$arrResult['DELETE'] = $records;
				
				// free variables
				unset($result);
				unset($records);
			}
			catch(\Exception $e)
			{
				// track error
				$arrErrors['DELETE'][] = $e->getMessage();
				
				// track as critical
				$this->addCriticalError( $e->getMessage() );
			}
		}
		
		// add result to report
		$this->report('result',$arrResult);
	}
	
	
	/**
	 * Find update data
	 * @return array
	 */
	public function findUpdateRecords()
	{
		if($this->isModified('findUpdateRecords'))
		{
			return $this->arrUpdateRecords;
		}
		
		$arrRecords = $this->getRecords();
		$arrSource = $this->getSourceData();
		
		$arrReturn = array();
		foreach($arrRecords as $target_row)
		{
			foreach($arrSource as $i => $source_row)
			{
				if($target_row[$this->uniqueTarget] == $source_row[$this->uniqueSource])
				{
					$arrReturn[$this->uniqueTarget][] = $target_row[$this->uniqueTarget];
				}
			}
		}
		
		// set
		$this->arrUpdateRecords = $arrReturn;
		
		// mark as modified
		$this->markAsModified('findUpdateRecords');
		
		return $arrReturn;
	}
	
	
	/**
	 * Add to the update list
	 * @param array
	 */
	public function addToUpdateList($arrData)
	{
		$t = $this->getTable();
		$this->arrUpdate[$t][] = $arrData;
	}
	
	
	/**
	 * Add to the insert list
	 * @param array
	 */
	public function addToInsertList($arrData)
	{
		$t = $this->getTable();
		$this->arrInsert[$t][] = $arrData;
	}
	
	
	/**
	 * Add to the delete list
	 * @param array
	 */
	public function addToDeleteList($arrData)
	{
		$t = $this->getTable();
		$this->arrDelete[$t][] = $arrData;
	}	
}