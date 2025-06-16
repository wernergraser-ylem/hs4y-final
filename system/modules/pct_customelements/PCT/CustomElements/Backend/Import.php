<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @link  http://contao.org
 * @license  http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Backend;

use Contao\File;
use Contao\TemplateLoader;
use PCT\CustomElements\Core\Controller;

/**
 * Class file
 * Import
 */
class Import extends \Contao\Backend
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_page_import';

	/**
	 * Default preview image setting
	 * @var array
	 */
	protected $arrPreviewSize = array(0,80,'proportional');

	/**
	 * Import data array
	 * @var array
	 */
	protected $arrImportData = array();

	/**
	 * Import data array
	 * @var array
	 */
	protected $arrImportChain = array();
	
	/**
	 * Session name
	 * @var string
	 */
	protected $strSession = 'tl_pct_customelement_import';
	
	/**
	 * Flag to also include the old sql based templates
	 * @var boolean
	 */
	protected $blnRunImportFromTemplate = false;
	
	

	/**
	 * Initialize and authenticate backend user
	 */
	public function __construct()
	{
		$this->import(\Contao\BackendUser::class, 'User');	
		parent::__construct();

		// load language files
		$this->loadLanguageFile('default');
		$this->loadLanguageFile('import');

		// include styles
		$GLOBALS['TL_CSS'][] = PCT_CUSTOMELEMENTS_PATH.'/assets/css/styles.css';
	}

	/**
	 * Create the backend inferface
	 * @return string
	 */
	public function createInterface()
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objTemplate = new \Contao\BackendTemplate($this->strTemplate);

		// back button
		$objTemplate->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="" href="'.$this->getReferer().'">'.$GLOBALS['TL_LANG']['MSC']['goBack'].'</a>';
		
		$arrOptions = $this->getImportOptionsFromTemplate();
		
		if( !isset($GLOBALS['TL_LANG']['page_import']['import_select']) )
		{
			$GLOBALS['TL_LANG']['page_import']['import_select'] = array();
		}

		$strRoot = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		foreach(\array_keys($arrOptions) as $k)
		{
			$path = \str_replace($strRoot.'/','', TemplateLoader::getPath($k,'html5') );

			$GLOBALS['TL_LANG']['page_import']['import_select'][$k] = $k . ' <span style="font-size:80%;">('.$path.')</span>';
		}
		
		// template selection widget
		$arrData = array
		(
			'label'                   => &$GLOBALS['TL_LANG']['page_import']['import_select'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'options'      				=> $arrOptions,
			'reference'      			=> &$GLOBALS['TL_LANG']['page_import']['import_select'],
			'eval'                    => array('tl_class'=>'w50','multiple'=>true,'includeBlankOption'=>0),
		);
		
		$strClass = $GLOBALS['BE_FFL'][$arrData['inputType']];
		if(!class_exists($strClass))
		{
			return '';
		}
		
		$objWidget = new $strClass( \Contao\Widget::getAttributesFromDca($arrData, 'import_select', null, 'import_select') );

		$objTemplate->selectionMenu = (empty($arrOptions) ? $GLOBALS['TL_LANG']['page_import']['done'] : $objWidget->parse());

		
		$arrSession = $objSession->get($this->strSession);
		if(!$arrSession)
		{
			$arrSession = array();
		}
		
		$objTemplate->imported = $arrSession['imported'] ?? false;
		$objTemplate->hasError = false;
		
		if(array_key_exists('error', $arrSession))
		{
			$objTemplate->hasError = true;
			$arrError = $arrSession['error'];
			$strError = implode('</br>', $arrError);
			$objTemplate->error = $strError;	
		}
		
		// perform import and reload page to prevend reposts
		if(\Contao\Input::post('run_import'))
		{
			$arrPost = \Contao\Input::post('import_select');
			if(empty($arrPost))
			{
				$this->reload();
			}
			
			foreach($arrPost as $f)
			{
				$arrTemplates = $this->getImportOptionsFromTemplate();
				if(array_key_exists($f, $arrTemplates) )
				{
					$this->importTemplate($f);
				}
				else
				{
					$this->runImport();
				}
			}
			
			
			$this->reload();
		}

		// submit form
		$objTemplate->action = \Contao\Environment::get('request');
		$objTemplate->import_value = $GLOBALS['TL_LANG']['page_import']['import_value'];

		// remove the session when displayed once
		$objSession->remove($this->strSession);

		return $objTemplate->parse();
	}
	
	protected function setImportChain()
	{
		// import chain
		$this->arrImportChain = array
		(
			'tl_pct_customelement' => array
			(
				'master' => 'alias',
				'filter' => array
				(
					array
					(
						'field'  => 'alias',
						'operation' => 'IN',
						'values' => \Contao\Input::post('import_select'),
					),
				),
			),
			'tl_pct_customelement_group' => array
			(
			   'reference' 		=> array('pid','tl_pct_customelement.id'),
			   'master' 		=> 'id',
			),
			'tl_pct_customelement_attribute' => array
			(
			   'reference'  	=> array('pid','tl_pct_customelement_group.id'),
			   'master' 		=> 'id',
			),
		);
		
		// HOOK
		\PCT\CustomElements\Core\Hooks::callstatic('importChainHook',array($this));
	}
	
	
	/**
	 * Run import from template file
	 */
	protected function importTemplate($strTemplate)
	{
		$strFile = TemplateLoader::getPath($strTemplate,'html5');
		include_once $strFile;
		
		if( empty($arrImport) )
		{
			return;
		}
		
		$alias = str_replace(array('import_','.html5'), array('',''), basename($strFile));
		\Contao\System::getContainer()->get('request_stack')->getSession()->set('current_import_alias',$alias);
		$objImport = new \PCT\CustomElements\Backend\Import(); 
		$objImport->runImportFromTemplate($arrImport);
	}
	
	
	/**
	 * Run import from template
	 * @param array
	 */
	public function runImportFromTemplate($arrImport)
	{
		if(empty($arrImport) || !is_array($arrImport))
		{
			return false;
		}
		
		$arrInserts = array_filter(explode('INSERT INTO', $arrImport['sql']),'strlen');
		if(count($arrInserts) < 1)
		{
			return;
		}
				
		$strAlias = \Contao\System::getContainer()->get('request_stack')->getSession()->get('current_import_alias');
		$objDatabase = \Contao\Database::getInstance();
	
		$arrImportData = array();
		foreach($arrInserts as $strInsert)
		{
			if(strlen($strInsert) < 1)
			{
				continue;
			}
			
			$strInsert = "INSERT INTO ".$strInsert;
			$strInsert = preg_replace('/^[#-]+/', '', trim($strInsert));
			preg_match('/^[^`]*`([^`]+)`/', $strInsert,$arrFirst);
			
			$strTable = $arrFirst[1];
			
			// check if table exists
			if(!$objDatabase->tableExists($strTable))
			{
				continue;
			}
			
			$strInsert = preg_replace('/'.$arrFirst[0].'/', '', $strInsert);
			
			$arrSecond = explode(' VALUES ', $strInsert);
			
			// sort out empty value parts
			$arrSecond[1] = str_replace('``', '` `', $arrSecond[1]);
			
			preg_match_all('/`([^`]+)`/', $arrSecond[0],$arrFields);
			preg_match_all('/`([^`]+)`/', $arrSecond[1],$arrValues);
			
			$arrFields = $arrFields[1];
			$arrValues = $arrValues[1];
			
			foreach($arrValues as $i => $v)
			{
				if($v == ' ')
				{
					$arrValues[$i] = '';
				}
			}
			
			
			$arrSet = array();
			foreach($arrFields as $i => $f)
			{
				// check if field exists in table
				if(!$objDatabase->fieldExists($f,$strTable))
				{
					continue;
				}
								
				$arrSet[$f] = $arrValues[$i];
			}
			
			if($strTable == 'tl_pct_customelement')
			{
				$arrImportData[$strTable][$strAlias] = $arrSet;
			}
			else
			{
				$arrImportData[$strTable][] = $arrSet;
			}
		}
		
		$this->arrImportData = $arrImportData;
		$this->blnRunImportFromTemplate = true;
		
		// kick start the regular import method
		$this->runImport();
	}
	

	/**
	 * Run import
	 */
	protected function runImport()
	{
		$this->setImportChain();
		
		if(!$this->arrImportChain || !\Contao\Input::post('import_select'))
		{
			return;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();

		// run through import chain
		$arrImportData = array();
			
		if(!$this->blnRunImportFromTemplate)
		{
			foreach($this->arrImportChain as $table => $info)
			{
				$file = trim($GLOBALS['PCT_CUSTOMELEMENTS']['path_to_import'].'/'.$table.'.sql');
				$objFile = new File($file);
				$data = $this->convertSqlToArray($objFile->getContent(),$info['master']);
	
				if(!is_array($data) || empty($data))
				{
					continue;
				}
	
				if($info['filter'])
				{
					$data = $this->filterImportData($data,$info['filter']);
				}
	
				$arrImportData[$table] = $data;
			}
		}
		else
		{
			$arrImportData = $this->arrImportData;
		}
		
		if(empty($arrImportData))
		{
			return;
		}
		
		
		// filter elements by reference
		foreach($arrImportData as $table => $arrData)
		{
			if(!isset($this->arrImportChain[$table]['reference']) || empty($this->arrImportChain[$table]['reference']))
			{
				continue;
			}

			$ref = explode('.', $this->arrImportChain[$table]['reference'][1]);
			$field = $this->arrImportChain[$table]['reference'][0];
			$pTable = $ref[0];
			$pField = $ref[1];
			$pData = $arrImportData[$pTable];

			if(empty($pData))
			{
				continue;
			}

			$filterValues[$field] = array();
			foreach($pData as $row)
			{
				if(!$row[$pField])
				{
					continue;
				}
				
				// build filter values
				if(!in_array($row[$pField], $filterValues[$field]))
				{
					$filterValues[$field][] = $row[$pField];
				}
			}
			
			if(!empty($filterValues))
			{
				$filter = array
				(
					array
					(
						'field'  => $field,
						'operation' => 'IN',
						'values' => $filterValues[$field],
					),
				);
				
				$arrData = $this->filterImportData($arrData,$filter);
			}
			$arrImportData[$table] = $arrData;
		}

		if(empty($arrImportData))
		{
			return;
		}
		
		$insertId = array();
		$arrReference = array();
		$arrSession = $objSession->get($this->strSession);
		$skipImport = array();
		
		// do the import
		$objDatabase = \Contao\Database::getInstance();
		foreach($arrImportData as $table => $arrData)
		{
			if(!$objDatabase->tableExists($table))
			{
				continue;
			}
			
			$arrReference[$table] = array();
			
			$this->loadDataContainer($table);
			
			// create helper objects
			$objTable = null;
			$objDC = new \PCT\CustomElements\Helper\DataContainerHelper();
			$objDC->table = $table;
			
			if($table == 'tl_pct_customelement')
			{
				$objTable = new \PCT\CustomElements\Backend\TableCustomElement;
			}
			else if($table == 'tl_pct_customelement_group')
			{
				$objTable = new \PCT\CustomElements\Backend\TableCustomElementGroup;
			}
			else if($table == 'tl_pct_customelement_attribute')
			{
				$objTable = new \PCT\CustomElements\Backend\TableCustomElementAttribute;
			}
			
			$time = time();
			
			// build the set array
			$arrSet = array();
			foreach($arrData as $key => $row)
			{
				$title = '';
				if($table == 'tl_pct_customelement')				
				{
					$title = $row['title'];
				} 
								
				$id = $row['id'];
				$unique = array();
				// fill datacontainer object
				foreach($row as $f => $v)
				{
					$objDC->__set($f,$v);
					
					// check unique fields
					$fieldDef = $GLOBALS['TL_DCA'][$table]['fields'][$f] ?? array() ;
					if( isset($fieldDef['eval']['unique']) && $fieldDef['eval']['unique'])
					{
						$unique[$f] = $v;
					}
				}
				
				if(!empty($unique))
				{
					$arrWhere = array();
					foreach($unique as $f => $v)
					{
						$objCheck = $objDatabase->prepare("SELECT * FROM ".$table." WHERE ".$objDatabase->findInSet($f,$v))
								->execute();
						if($objCheck->numRows > 0)
						{
							#throw new \Exception('A unqiue field ('.$f.') with the value ('.$v. ') already exists i: '.$table);
							$strError = sprintf($GLOBALS['TL_LANG']['page_import']['error'],$title,$f,$v,$table);
							$arrErrors = $arrSession['error'] ?? array();
							if(!is_array($arrErrors))
							{
								$arrErrors = array();
							}
							
							$arrErrors[] = $strError;
							$arrSession = array('error'=>array_unique($arrErrors));
							$objSession->set($this->strSession,$arrSession);
							$skipImport[] = $table;
						}
					}
				}
				
				// skip import
				if(in_array($table, $skipImport))
				{
					continue;
				}
				
				// set array
				$arrSet = $row;
				unset($arrSet['id']);
				if($row['tstamp'])
				{
					$arrSet['tstamp'] = $time;
				}
				
				//pid
				if( isset($this->arrImportChain[$table]['reference']) && $this->arrImportChain[$table]['reference'])
				{
					$ref = explode('.', $this->arrImportChain[$table]['reference'][1]);
					$field = $this->arrImportChain[$table]['reference'][0];
					$pTable = $ref[0];
					$pField = $ref[1];
					
					if(in_array($pTable, $skipImport))
					{
						$skipImport[] = $table;
						continue;
					}
					
					if($pField == 'id')
					{
						$arrSet['pid'] = $arrReference[$pTable][$row['pid']];
					}
				}
				
				$fieldsDb = $objDatabase->listFields($table);
				
				$fieldsDbAssoc = array();
				foreach($fieldsDb as $v)
				{
					$fieldsDbAssoc[$v['name']] = $v;
				}
				
				// check if target field is a blob field
				$arrBlobs = array();
				if(!$this->blnRunImportFromTemplate)
				{
					foreach($arrSet as $k => $v)
					{
					   $target = $fieldsDbAssoc[$k];
					   if($target['type'] == 'blob')
					   {
					   	$arrBlobs[$k] = $v;
					   	unset($arrSet[$k]);
					   }
					}
				}
				
				if(array_key_exists('pid', $arrSet) && $arrSet['pid'] === null)
				{
					$arrSet['pid'] = '';
				}
				
				$objInsert = \Contao\Database::getInstance()->prepare("INSERT INTO ".$table." %s")->set($arrSet);
				$objInsert->execute();
				
				$insert_id = $objInsert->__get('insertId');
				
				// update the blob fields for this table
				if(count($arrBlobs) > 0 && !$this->blnRunImportFromTemplate)
				{
					foreach($arrBlobs as $k => $v)
					{
						$objStatement = \Contao\Database::getInstance()->prepare("UPDATE ".$table." SET ".$k."=".$v." WHERE id=?");
						$objStatement->execute($insert_id);
					}
				}
				
				$insertId[$table] = $insert_id;
				$arrReference[$table][$id] = $insert_id;
				
				// store the name of the CustomElement imported in the session
				if($table == 'tl_pct_customelement')				
				{
					$arrSession['imported'][] = $row['title'];
				}
			}
		}
		
		$objSession->set($this->strSession,$arrSession);
	}
	
	
	/**
	 * Collect all import_ template files and return them as array
	 * @return array
	 */
	public function getImportOptionsFromTemplate()
	{
		$arrTemplates = $this->getTemplateGroup('import_');
		return $arrTemplates;
	}
	
	
	/**
	 * Prepare the import data
	 * @param string
	 * @param boolean
	 * @return array
	 */
	public function convertSqlToArray($strSql,$strMasterKey='',$bolSkipEmpty=true,$arrWanted=array())
	{
		// find all information between ( and ) that not inside a string
		$preg = preg_match_all("/(\(.*?)\)/U", $strSql,$result);

		if(!$preg)
		{
			return false;
		}

		$data = $result[0];
		$rowStart = 1;

		$columns = $this->stripSqlString($data[0]);
		$columns = str_replace('`', '', $columns);
		$arrColumns = explode(',', $columns);

		if(!$strMasterKey)
		{
			$strMasterKey = 'id';
		}

		$masterKey = $strMasterKey; // identifiyer
		$masterKeyIndex = array_search($masterKey, $arrColumns);

		$arrReturn = array();
		// build values array
		for($i = $rowStart; $i < count($data); $i++)
		{
			$values = $this->stripSqlString($data[$i]);
			$arrValues = explode(',', $values);

			$key = $arrValues[$masterKeyIndex];
			$key = ltrim($key,"'");
			$key = rtrim($key,"'");

			// skip if we want a certain key only
			if(!empty($arrWanted) && !in_array($key, $arrWanted))
			{
				continue;
			}

			$arrReturn[$key] = array();
			foreach($arrValues as $k => $v)
			{
				$colname = $arrColumns[$k];

				$v = ltrim($v,"'");
				$v = rtrim($v,"'");

				if(strlen($v) < 1 && $bolSkipEmpty || $v == 'NULL' && $bolSkipEmpty)
				{
					continue;
				}

				$arrReturn[$key][$colname] = $v;
			}
		}

		return $arrReturn;
	}


	/**
	 * Filter the import data
	 * @param array
	 */
	public function filterImportData($arrData, $arrFilter)
	{
		if(!$arrData || !$arrFilter)
		{
			return array();
		}

		foreach($arrFilter as $filter)
		{
			if(!is_array($filter['values']))
			{
				$filter['values'] = array($filter['values']);
			}

			$field = $filter['field'];
			$values = $filter['values'];
			$operation = $filter['operation'];

			if(!$field || !$values || !$operation)
			{
				continue;
			}

			foreach($arrData as $index => $row)
			{
				// if the value does not exist in the haystack, continue
				if(!$row[$field])
				{
					continue;
				}

				switch($operation)
				{
					// the value must exist
				case 'IN':
					if(in_array($row[$field], $values))
					{
						continue;
					}
					unset($arrData[$index]);
					break;

					// the value must not exist
				case '!IN':
				case 'NOT IN':
					if(!in_array($row[$field], $values))
					{
						continue;
					}
					unset($arrData[$index]);
					break;

					// remove by default
				default:
					unset($arrData[$index]);
					break;
				}
			}
		}

		return $arrData;
	}

	/**
	 * Prepare sql string
	 * @param string
	 * @return string
	 */
	public function stripSqlString($strInput)
	{
		# remove brackets
		$strInput = ltrim($strInput,'(');
		$strInput = rtrim($strInput,')');

		# remove everything between /* and */
		$strInput = preg_replace("!/\*.*?\*/!ms", "", $strInput);

		# remove whitespaces after semicolons
		$strInput = preg_replace("/;\s+/m", ";", $strInput);

		# remove whitespaces after commata
		$strInput = preg_replace("/,\s+/m", ",", $strInput);

		# replace several newlines with one
		$strInput = preg_replace("/\n{2,}/m", "", $strInput);

		# Leading whitespace
		$strInput = preg_replace("/^\s*/m", "", $strInput);

		# Multiple whitespaces to one
		#$strInput = preg_replace("/ +/m", " ", $strInput);

		# Wrapping whitespace
		$strInput = trim($strInput);

		return $strInput;
	}



}