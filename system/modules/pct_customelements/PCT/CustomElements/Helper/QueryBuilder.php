<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Helper;

/**
 * Imports
 */
use Contao\Database;
use Contao\Model\QueryBuilder as ContaoQueryBuilder;

/**
 * Class
 * StatementBuilder
 *
 * 	$options = array
 *	(
 *	 	'table' => 'tl_content',
 *	 	'column' => 'id',
 *	 	'operation' => '=?'
 *	 	'value' = 10,
 *	);
 *
 */
class QueryBuilder
{
	/**
	 * Table name
	 * @var string
	 */
	protected $strTable = '';
	
	/**
	 * Internal counter of subqueries
	 * @var integer
	 */
	protected static $intCounter;
	
	/**
	 * Options array
	 */
	protected $arrOptions = array();

	/**
	 * Database class
	 */
	protected $Database = null;
	
	
	/**
	 * Singletone
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
	 * Set the table name for the query 
	 * @param string 
	 */
	public function setTable($strTable)
	{
	 	$this->strTable = $strTable;
	}
	
	
	/**
	 * Return the table name
	 * @return string
	 */
	public function getTable()
	{
		return $this->strTable;
	}
	
	
	/**
	 * Build a query string from an options array
	 * @param array
	 * @return string
	 */
	public function find($arrOptions=array())
	{
		$arrOptions['method'] = 'SELECT';
		// call hook
		$arrOptions = \PCT\CustomElements\Core\Hooks::callstatic('sqlQueryHook',array($arrOptions));
		return $this->buildSelectQuery($arrOptions);
	}
	
	
	/**
	 * Run an database statement and return the result as object
	 * @param array
	 * @param boolean
	 * @return object
	 */
	public function fetch($arrOptions,$bolExecute=true)
	{
		$query = $this->find($arrOptions);
		if(!$bolExecute)
		{
			return Database::getInstance()->prepare($query);
		}
		
		$objStatement = Database::getInstance()->prepare($query);
		if( isset($arrOptions['limit']) && !empty($arrOptions['limit']))
		{
			if(!is_array($arrOptions['limit']))
			{
				$arrOptions['limit'] = explode(',', $arrOptions['limit']);
			}
			
			if(count($arrOptions['limit']) < 2)
			{
				$objStatement->limit($arrOptions['limit'][0]);
			}
			else
			{
				$objStatement->limit($arrOptions['limit'][0],$arrOptions['limit'][1]);
			}
		}
		return $objStatement->execute();	
	}
	
	
	/**
	 * Use the Contao QueryBuilder to get the query string
	 * @param array
	 * @return string
	 */
	public static function findByDca($arrOptions)
	{
		return ContaoQueryBuilder::find($arrOptions);
	}
	
	
	/**
	 * Run a database statement from an options array
	 * @param array
	 * @return string
	 */
	protected function buildQuery($arrOptions)
	{
		$arrQuery = $this->prepareQuery($arrOptions);
		if(empty($arrQuery))
		{
			return null;
		}
		
		$strTable = '';
		if( isset($arrOptions['table']) && !empty($arrOptions['table']) )
		{
			$strTable = $arrOptions['table'];
			$this->setTable($strTable);
		}
		else if( empty($this->getTable()) === false )
		{
			$strTable = $this->getTable();
			$arrOptions['table'] = $strTable;
		}
		else 
		{
			throw new \Exception('No table specified');
		}
		
		$arrOrders = array();
		$arrGroupBy = array();
		
		// WHERE
		$strWhere = $this->generateWHERE($arrQuery);
		
		// set double percentages for handling LIKE queries and regular percentage values and sprintf 
		$strWhere = str_replace('%', '%%', $strWhere);
		
		$strLimit = '';
		$strOrderGroup = '';
		
		// check if there are ORDER BY or GROUP BY statements
		foreach($arrQuery['parts'] as $i => $part)
		{	
			if( isset($part['order']) && !empty($part['order']) )
			{
				$arrOrders[] = $part['order'];
			}
			if( isset($part['group']) && !empty($part['group']) )
			{
				$arrGroupBy[] = $part['group'];
			}
		}
		
		if( isset($arrOptions['order']) && !empty($arrOptions['order']) )
		{
			$strOrderGroup = ' ORDER BY '.$arrOptions['order'].' ';
		}
		// overwrite ORDER BY
		if(count($arrOrders) > 0)
		{
			$strOrderGroup = ' ORDER BY '.implode(',',$arrOrders).' ';
		}
		
		if( isset($arrOptions['group']) && !empty($arrOptions['group']) )
		{
			$strOrderGroup = ' GROUP BY '.$arrOptions['group'].' ';
		}
		// overwrite GROUP BY
		if(count($arrGroupBy) > 0)
		{
			$strOrderGroup = ' GROUP BY '.implode(',',$arrGroupBy).' ';
		}

		return "%s %s %s".($strWhere ? " WHERE ".$strWhere : "").($strOrderGroup ? " ".$strOrderGroup : "");
	}
	
	
	/**
	 * Build a SELECT query from an options array
	 * @param array
	 */
	public function buildSelectQuery($arrOptions)
	{
		$query = $this->buildQuery($arrOptions);
		
		// fields
		$fields = '';
		if( isset($arrOptions['fields']) && !empty($arrOptions['fields']) && is_array($arrOptions))
		{
			foreach($arrOptions['fields'] as $f)
			{
				$fields .= $this->getTable().'.'.$f.',';
			}
			$fields = substr($fields,0,-1);
		}
		else
		{
			$fields = $this->getTable().'.*';
		}
		
		return sprintf($query,'SELECT',$fields,'FROM '.$this->getTable());
	}
	
	
	/**
	 * Generates a query array from options
	 * @param array
	 * @param array
	 * @param integer
	 * @return array
	 */
	protected function prepareQuery($arrOptions,$arrQuery=array(),$i=0,$arrMemory=array())
	{
		if(!is_array($arrOptions) )
		{
			return $arrQuery;
		}
		
		unset($arrOptions['table']);
		
		if( !isset($arrQuery['wildcards']) )
		{
			$arrQuery['wildcards'] = array();
		}
		
		if( !isset($arrQuery['parts']) )
		{
			$arrQuery['parts'] = array();
		}
		
		// remember the whole array list
		if($i == 0)
		{
			$arrMemory = $arrOptions;
		}
		
		foreach($arrOptions as $k => $v)
		{
			// handle a whole columns array
			if(is_array($v) && $k === 'columns')
			{
				$arrOptions = $v;
				return $this->prepareQuery($v,$arrQuery,0,$arrMemory);
			}
			
			if(is_array($v) && $k !== 'value' && $k !== 'eval')
			{
				return $this->prepareQuery($v,$arrQuery,$i+1,$arrMemory);
			}
			
			switch($k)
			{
				case 'column':
					$arrQuery['parts'][$i]['column'] = $v;
					break;
				case 'operation':
					if(strlen(strpos($v, '?')))
					{
						$arrQuery['wildcards'][] = $arrOptions['value']; 
						$arrQuery['parts'][$i]['operation'] = $v;
						#$arrQuery['parts'][$i]['wildcard'] = $arrOptions['value'];
						break;
					}
					$arrQuery['parts'][$i]['operation'] = $v;
					break;
				case 'value':
					$arrQuery['parts'][$i]['value'] = $v;
					break;
				case 'eval':
					$arrQuery['parts'][$i]['eval'] = $v;
					break;
				default:
					$arrQuery['parts'][$i][$k] = $v;
					break;
			}
		}
		
		// build a clean index array
		if(!empty($arrQuery['parts']) && is_array($arrQuery['parts']))
		{
			$tmp = array();
			foreach($arrQuery['parts'] as $part)
			{
				$tmp[] = $part;
			}
			$arrQuery['parts'] = $tmp;
			unset($tmp);
		}
		
		if(empty($arrQuery['wildcards']))
		{
			unset($arrQuery['wildcards']);
		}
		
		if($i <= count($arrMemory))
		{
			if( !isset($arrMemory[$i+1]) )
			{
				$arrMemory[$i+1] = null;
			}

			if( !isset($arrMemory[$i]) )
			{
				$arrMemory[$i] = null;
			}
			
			return $this->prepareQuery($arrMemory[$i],$arrQuery,$i+1,$arrMemory);
		}
				
		return $arrQuery;
	}
	
	
	/**
	 * Generate WHERE statement in query and return as array
	 * @param array
	 * @return string
	 */
	protected function generateWHERE($arrQuery)
	{
		$strTable = $this->getTable();
		$strWhere = '';
		$intWildcards = 0;
		
		// filter empty value arrays
		$arrParts = array();
		foreach($arrQuery['parts'] as $i => $part)
		{
			if( !isset($part['where']) )
			{
				$part['where'] = '';
			}
			if( !isset($part['WHERE']) )
			{
				$part['WHERE'] = '';
			}

			if( !empty($part['where']) || !empty($part['WHERE']) || (isset($part['eval']['allowEmpty']) && $part['eval']['allowEmpty']) )
			{
				$arrParts[$i] = $part;
				continue;
			}
			
			// continue on empty values
			if(empty($part['value']))
			{
				continue;
			}
			$arrParts[$i] = $part;
		}
		
		if(empty($arrParts))
		{
			return '';
		}
		
		// build Where condition
		$intCount = 0;
		$intMax = count($arrParts) - 1;
		foreach($arrParts as $i => $part)
		{
			// next part connection
			$combiner = 'AND';
			if( isset($part['eval']['combiner']) && !empty($part['eval']['combiner']) )
			{
				$combiner = $part['eval']['combiner'];
			}
			
			// do not connect when it is the last part of the query
			if($intCount >= $intMax)
			{
				$combiner = '';
			}
			
			//custom where condition
			if( !empty($part['where']) || !empty($part['WHERE']) )
			{
				$where = $part['where'] ? $part['where'] : $part['WHERE'];
				$strWhere .= $where . ' '.trim($combiner).' ';
				$intCount++;
				continue;
			}
		
			$value = $part['value'];
			
			$strCommand = '';
			
			// prepare value
			if(is_array($value) && count($value) > 0)
			{
				$vars = array();
				
				// convert real integer fields to integer values
				if(in_array($part['column'], array('id','pid','sorting')))
				{
					$value = array_map('intval', $value);
				}
				
				foreach($value as $v)
				{
					if(is_integer($v))
					{
						$vars[] = $v;
					}
					else if(is_float($v) || is_numeric($v) || is_string($v))
					{
						$vars[] = "'".$v."'";
					}
				}
				$value = implode(',', $vars);
			}
			else if(is_float($value) || is_numeric($value) || is_string($value))
			{
				$value = "'".$value."'";
			}
			
			$strFindInSet = '';
			
			// replace wildcards
			if(strlen(strpos($part['operation'],'?')))
			{ 
				$strCommand = str_replace('?',$value,$part['operation']);
			}
			else
			{
				switch($part['operation'])
				{
					case 'IN':
						if(!is_array($value))
						{
							$value = explode(',', $value);
						}
						$strCommand = ' IN('.implode(',', $value).') ';
						break;
					case '=':
						$strCommand = $part['operation'].$value;
						break;
					case 'FIND_IN_SET':
						$strFindInSet = Database::getInstance()->findInSet($strTable.'.'.$part['column'],$part['value']);
						$strCommand = 'FIND_IN_SET';
						break;
					default:
						$strCommand = $part['operation'].$value;
						break;
				}
			}
			
			if(!$strCommand || strlen($strCommand) < 1)
			{
				continue;
			}
			
			if(!$strFindInSet || strlen($strFindInSet) < 1)
			{
				$strWhere .= $strTable.'.'.$part['column'].' '.$strCommand;
			}
			else
			{
				$strWhere .= $strFindInSet;
			}
			
			$strWhere .= ' '.trim($combiner).' ';
			
			$intCount++;
		}
		
		// remove white space before =
		$strWhere = \preg_replace("/\s+=/m", "=", $strWhere);
		// remove white space before )
		$strWhere = \preg_replace("/\s+\)/m", ")", $strWhere);
		// remove white space after (
		$strWhere = \preg_replace("/\s+\(/m", "(", $strWhere);
		// strip open ends
		$strWhere = \str_replace( array(' OR )',' OR)',' AND )',' AND)'),')',$strWhere);
		// beautify 
		$strWhere = \str_replace( array(' OR(',' AND('),array(' OR (',' AND ('),$strWhere);
		$strWhere = \str_replace( array('(  '),array('('),$strWhere );
		
		return $strWhere;
	}
	
	
	/**
	 * Combine two option array
	 * @param array
	 * @param array
	 * @return array
	 */
	public static function combine($arrA, $arrB)
	{
		$combined = false;
		
		$arrReturn = array_merge($arrA,$arrB);
		
		if( isset($arrA['columns']) === false )
		{
			$arrA['columns'] = '';		
		}
		
		if( isset($arrB['columns']) === false )
		{
			$arrB['columns'] = '';
		}

		if( isset($arrA['column']) === false )
		{
			$arrA['column'] = '';		
		}
		
		if( isset($arrB['column']) === false )
		{
			$arrB['column'] = '';
		}
		
		if( is_array($arrA['columns']) && !empty($arrA['columns']) && \Contao\ArrayUtil::isAssoc($arrA['columns']) )
		{
			$arrA['columns'] = array($arrA);
		}
		
		if( is_array($arrB['columns']) && !empty($arrB['columns']) && \Contao\ArrayUtil::isAssoc($arrB['columns']) )
		{
			$arrB['columns'] = array($arrB);
		}
		
		
		if( !is_array($arrA['columns']) && strlen($arrA['column']) > 0) 
		{
			$arrReturn['columns'][] = $arrA;
		   unset($arrA);
		   $combined = true;
		}
		if( !is_array($arrB['columns']) && strlen($arrB['column']) > 0) 
		{
			$arrReturn['columns'][] = $arrB;
			unset($arrB);
			$combined = true;
		}
		
		if($combined)
		{
			unset($arrReturn['column']);	
			unset($arrReturn['operation']);	
			unset($arrReturn['value']);
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the count for a sql query
	 * @param array
	 */
	public function count($arrOptions)
	{
		unset($arrOptions['order']);
		unset($arrOptions['group']);
		$query = $this->buildQuery($arrOptions);
		$query = sprintf($query,'SELECT','COUNT(*) AS count','FROM '.$this->getTable());
		$objCount = Database::getInstance()->prepare($query)->execute();
		if($objCount->count < 1)
		{
			return 0;
		}
		
		return $objCount->count;
	}	
}
