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
namespace PCT\CustomElements\Plugins\CustomCatalog\Helper;

use Contao\ArrayUtil;

/**
 * Class file
 * QueryBuilder
 * Extends the PCT CustomElements QueryBuilder with methods for CustomCatalog
 */
class QueryBuilder extends \PCT\CustomElements\Helper\QueryBuilder
{
	/**
	 * A Primary key selector
	 * @var string
	 */
	public $primary_key = '';
	
	/**
	 * A Primary value
	 * @var string
	 */
	public $primary_value;
	
	
	/**
	 * Singletone
	 * @param string
	 * @return object QueryBuilder
	 */
	public static function getInstance($strTable='')
	{
		$objReturn = new static();
		
		if(strlen($strTable) > 0)
		{
			$objReturn->setTable($strTable);
		}

		return $objReturn;
	}	
	
	/**
	 * Generate an ORDER BY string by an array
	 * @param array
	 * @return string
	 */
	public function generateORDERBY($arrSorting)
	{
		$arrTmp = array();
		foreach($arrSorting as $arr)
		{
			$fieldOrMethod = \Contao\StringUtil::decodeEntities($arr[0]);
			$isMethod = false;
			if(strlen(strpos($fieldOrMethod,'(')) > 0)
			{
				$isMethod = true;
			}
			
			$arrTmp[] = ($isMethod ? '' : $this->getTable().'.').$fieldOrMethod.' '.strtoupper($arr[1]);	
		}
		$strReturn = trim(implode(',', array_unique($arrTmp) ));
		unset($arrTmp);
		return $strReturn;
	}
	
	
	/**
	 * Generate an ORDER BY string by an array
	 * @param array
	 * @return string
	 */
	public function generateWHERE($arrQuery)
	{
		return parent::generateWHERE($arrQuery);
	}
	
	
	/**
	 * Convert the query array to the contao querybuilder structure
	 * @param array
	 * @return array
	 */
	public function prepareForModel($arrQuery)
	{
		$arrReturn = array();
		
		// convert columns array to Contao columns array structure and values array
		if(is_array($arrQuery['columns']) && !empty($arrQuery['columns']))
		{
			$arrValues = array();
			$arrColumns = array();
			foreach($arrQuery['columns'] as $option)
			{
				$operation = $option['operation'];
				if($operation === '=')
				{
					$operation = '=?';
				}
				$arrReturn['columns'][] = $this->getTable().'.'.$option['column'].$operation;
				$arrReturn['values'][] = $option['value'];
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Build an INSERT statement from an array
	 * @param array		Associate array (single row record array) or sequential array (multiple rows)
	 * @return array	Array of SQL Statements to be executed
	 */
	public function prepareInsert($arrRows)
	{
		if(!is_array($arrRows) || empty($arrRows))
		{
			return null;
		}
		
		// instantiate the Database class
		if( !isset($this->Database) || $this->Database === null)
		{
			$this->Database = \Contao\Database::getInstance();
		}
		
		$strTable = $this->getTable();
		
		if(strlen($strTable) < 1)
		{
			throw new \Exception('No table name');
		}
		else if(!$this->Database->tableExists($strTable))
		{
			throw new \Exception("Table $strTable does not exist");
		}
		
		$arrReturn = array();
		
		// if the array is sequential, combine values in one statement
		foreach($arrRows as $row)
		{
			if(!is_array($row) || empty($row))
			{
				continue;
			}

			// simulate a single row insert statement
			$stmt = $this->Database->prepare("INSERT INTO ".$strTable." %s")->set($row);
			// collect statements
			$arrReturn[] = $stmt; #$stmt->__get('query');
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Build an UPDATE statement from an array
	 * @param string	The primary key
	 * @param array		Associate array (single row record array) or sequential array (multiple rows)
	 * @return object	Database Statement
	 */
	public function prepareUpdate($arrRows)
	{
		if(!is_array($arrRows))
		{
			return null;
		}
		
		// instantiate the Database class
		if( !isset($this->Database) || $this->Database === null)
		{
			$this->Database = \Contao\Database::getInstance();
		}
		
		$strTable = $this->getTable();
		
		if(strlen($strTable) < 1)
		{
			throw new \Exception('No table name');
		}
		else if(!$this->Database->tableExists($strTable))
		{
			throw new \Exception("Table $strTable does not exist");
		}
		
		$strPk = $this->primary_key;
		$varPk = $this->primary_value;
		
		if($varPk !== null);
		{
			if(is_string($varPk) && is_numeric($varPk) === false)
			{
				$varPk = "'".$varPk."'";
			}
		}
		
		// use placeholder if primary key is not set
		if($varPk === null || !isset($varPk))
		{
			$varPk = '?';
		}
		
		// strip fields that do not exist in update table
		foreach($arrRows as $k => $v)
		{
			if(!$this->Database->fieldExists($k,$strTable))
			{
				unset($arrRows[$k]);
			}
		}
		
		// strip primary key from set array
		if( array_key_exists($this->primary_key,$arrRows) )
		{
			unset($arrRows[$this->primary_key]);
		}
		
		$objReturn = $this->Database->prepare("UPDATE ".$strTable." %s WHERE ".$this->primary_key."=".$varPk)->set($arrRows);
		
		return $objReturn;	
	}
	
	
	/**
	 * Set a primary key
	 * @param string
	 * @return object
	 */
	public function primary($strPk)
	{
		$this->primary_key = $strPk;
		
		// return self for chaining
		return $this;
	}
	
	
	/**
	 * Set a primary value
	 * @param mixed
	 * @return object
	 */
	public function primary_value($varPk)
	{
		$this->primary_value = $varPk;
		
		// return self for chaining
		return $this;	
	}
	
	
	/**
	 * Remove fields that do not exist in target table
	 * @param array
	 * @return array
	 */
	public function stripFields($arrRows,$strTable)
	{
		// instantiate the Database class
		if( !isset($this->Database) || $this->Database === null)
		{
			$this->Database = \Contao\Database::getInstance();
		}
		
		if( strlen($strTable) < 1 || !$this->Database->tableExists($strTable))
		{
			return $arrRows;
		}
		
		if(count($arrRows) == 1 && ArrayUtil::isAssoc($arrRows) )
		{
			$arrRows = array($arrRows);
		}
		
		// strip fields that do not exist in insert table
		$arrReturn = array();
		foreach($arrRows as $i => $row)
		{
			if(count($row) < 1)
			{
				continue;
			}
			
			foreach($row as $k => $v)
			{
				if(!$this->Database->fieldExists($k,$strTable))
				{
					continue;
				}
			
				$arrReturn[$i][$k] = $v;
			}
		}
		
		return $arrReturn;
	}
}