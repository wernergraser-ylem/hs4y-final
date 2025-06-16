<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\ThemeSettings;

use Contao\Dbafs;
use Contao\StringUtil;
use Contao\Validator;

/**
 * Imports
 */


/**
 * Class file
 * ContentElementSet
 */
class ContentElementSet
{
	protected $arrTl_files = array();
	protected $strName = '';
	protected $arrContentElementSets = null;

	/**
	 * Find all content element set templates registered or in templates folder
	 * @return array
	 */
	public function getContentElementSets($blnCached=true)
	{
		if( $blnCached && $this->arrContentElementSets !== null )
		{
			return $this->arrContentElementSets;
		}

		$arrReturn = array();
		
		// load element sets
		foreach(\Contao\Controller::getTemplateGroup('single_') as $k => $name)
		{
			// includes $arrImport
			include \Contao\Controller::getTemplate($k,'html5');
			
			if(!isset($arrImport) || !is_array($arrImport))
			{
				continue;
			}
			
			$arrReturn[$k] = $arrImport;
		}

		// load element sets
		foreach(\Contao\Controller::getTemplateGroup('set_') as $k => $name)
		{
			// includes $arrImport
			include \Contao\Controller::getTemplate($k,'html5');
			
			if(!isset($arrImport) || !is_array($arrImport))
			{
				continue;
			}
			
			$arrReturn[$k] = $arrImport;
		}
		
		// add to cache
		if($blnCached)
		{
			$this->arrContentElementSets = $arrReturn;	
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all categories as array
	 * @return array
	 */
	public function getCategories()
	{
		$arrSets = $this->getContentElementSets();
		
		$arrReturn = array();
		foreach($arrSets as $k => $v)
		{
			$category = $v['category'];
			
			if(strlen($category) > 0 && !\in_array($category,$arrReturn))
			{
				$arrReturn[] = $category;
			}
		}

		asort($arrReturn);
		
		if( \in_array('custom',$arrReturn) )
		{
			\array_unshift($arrReturn,'custom');
		}
		
		$arrReturn = \array_unique($arrReturn);
		
		if( isset($GLOBALS['PCT_CUSTOMELEMENTS']['elementSetCategories']) && \is_array($GLOBALS['PCT_CUSTOMELEMENTS']['elementSetCategories']) )
		{
			$arrReturn = $GLOBALS['PCT_CUSTOMELEMENTS']['elementSetCategories'];
		}

	
		return $arrReturn;
	}
	
	
	/**
	 * Export the content elements by their ids and return the path to the template file
	 * @param array		Ids of the content elements
	 * @param array		Additional parameters to pass to the file
	 * @return object	The files object of the created file
	 */
	public function exportByIds($arrIds,$arrParams)
	{
		if(!is_array($arrIds) || empty($arrIds))
		{
			return null;
		}
		
		$objContentModels = \Contao\ContentModel::findMultipleByIds( $arrIds,array('order'=>'sorting') );
		if($objContentModels === null)
		{
			return null;
		}

		$objDatabase = \Contao\Database::getInstance();
		
		$strTable = 'tl_content';
		
		// find all installed content element CustomElements
		$arrCustomElements = \PCT\CustomElements\Core\CustomElements::getInstance()->getCustomElements($strTable);
		
		$arrExport = array();
		foreach($objContentModels as $objModel)
		{
			$arrRow = $objModel->row();
			
			$arrExport['tl_content'][] = $arrRow;
			
			// tl_pct_customelement_vault
			if(in_array($objModel->type,$arrCustomElements))
			{
				if( $objDatabase->tableExists('tl_pct_customelement_vault') )
				{
					$objVaultModels = \PCT\CustomElements\Models\VaultModel::findByPidAndSource($arrRow['id'],'tl_content');
					if($objVaultModels !== null)
					{
						foreach($objVaultModels as $objVault)
						{
							$arrExport['tl_pct_customelement_vault'][] = $objVault->row();
						}
					}
				}
			}
		}
		
		$this->strName = $arrParams['name'] ?: 'myset_'.\Contao\Input::get('id');
		
		$strContent = $this->prepareFileContent($arrExport,$arrParams);
		if(strlen($strContent) < 1)
		{
			return null;
		}
		
		$strFile = 'templates/'.$this->strName.'.html5';
		$objFile = $this->writeFile($strFile, $strContent);
		
		return $objFile;
	}
	
	
	/**
	 * Prepare the file content from a structured table record array
	 * @param array|null
	 * @param array			Additional content
	 * @return string
	 */
	public function prepareFileContent($arrData,$arrParams=array())
	{
		if(count($arrData) < 1)
		{
			return '';
		}
		
		$strReturn = '';

$arrParts = array();

//-- head
$strHead = 
"<?php
/**
 * Hello, I'm a the content element set template file: ".$this->strName."
 */

";

$arrInfo = array('tstamp' => \Contao\Date::parse('d.m.Y H:i',time()));
if(count($arrParams) > 0)
{
	foreach($arrParams as $k => $v)
	{
		$arrInfo[$k] = $v;
	}
}

		$arrWizards = array();

		$arrInserts = array();
		foreach($arrData as $table => $records)
		{
			foreach($records as $row)
			{
				// CE wizards
				$ce_field = $GLOBALS['PCT_ELEMENTSET_LIBRARY_CE_FIELDS'][$table] ?? 'pct_customelement';
				if( isset($row[$ce_field]) && !empty($row[$ce_field]) )
				{
					$arrWizards[] = $row[$ce_field];
				}


				$fields = array_keys($row);
				$values = array_values($row);
				
				// convert binary
				foreach($values as $k => $v)
				{
					$field = $fields[$k];
					
					if(empty($v))
					{
						unset($fields[$k]);
						unset($values[$k]);
						continue;
					}
					
					if(is_array($v))
					{
						$v = serialize($v);
					}
					
					if(\Contao\Validator::isBinaryUuid($v))
					{
						$uuid = \Contao\StringUtil::binToUuid($v);
						
						$objFile = \Contao\FilesModel::findByUuid($v);
						if($objFile)
						{
							$arrInserts['tl_files'][$uuid] = $objFile->path;
						}
						
						
						$values[$k] = $uuid;
					}
				
					// binary in multiSRC fields
					if(in_array($field, $GLOBALS['PCT_CUSTOMELEMENTS']['multiSRC_fields']) && !empty($row[$field]))
					{
						$arrValue = \Contao\StringUtil::deserialize($row[$field]);
						if(is_array($arrValue) && !empty($arrValue))
						{
							$values[$k] = serialize( array_map('StringUtil::binToUuid', $arrValue) );
						
							foreach($arrValue as $v)
							{
								$uuid = \Contao\StringUtil::binToUuid($v);
								
								$objFile = \Contao\FilesModel::findByUuid($v);
								if($objFile)
								{
									$arrInserts['tl_files'][$uuid] = $objFile->path;
								}
							}
						}
					}
				}
				
				$arrInserts[] = array
				(
					'table'		=> $table,
					'fields'	=> $fields,
					'values'	=> $values,
					#'sql'		=>$this->buildInsert($table,$fields,$values)
				);
			}
		}
		
		if( !empty($arrWizards)	)
		{
			foreach($arrWizards as $data)
			{
				$arrWizard = \Contao\StringUtil::deserialize($data);
				if(empty($arrWizard) || !is_array($arrWizard))
				{
					continue;
				}
				
				if(empty($arrWizard['values']) || !is_array($arrWizard['values']))
				{
					continue;
				}
				
				foreach($arrWizard['values'] as $field => $v)
		   		{
		      		if(empty($v))
		      		{
			      		continue;
		      		}
		      		
		      		$v = \Contao\StringUtil::deserialize($v);
		      		
		      		if(!is_array($v))
		      		{
			      		if(\Contao\Validator::isBinaryUuid($v))
				  		{
				   			$uuid = \Contao\StringUtil::binToUuid($v);
				   			
				   			$objFile = \Contao\FilesModel::findByUuid($v);
				   			if($objFile)
				   			{
				   				$arrInsert['tl_files'][$uuid] = $objFile->path;
							}
				   		}
				   		else if(\Contao\Validator::isStringUuid($v))
				   		{
					   		$uuid = $v;
					   		$bin = \Contao\StringUtil::binToUuid($v);
					   		$objFile = \Contao\FilesModel::findByUuid($uuid);
				   			if($objFile)
				   			{
				   				$arrInserts['tl_files'][$uuid] = $objFile->path;
				   			}
				   		}
				   		
			   		}
			   		
			   		// binary in multiSRC fields
			   		else if(in_array($field, $GLOBALS['PCT_CUSTOMELEMENTS']['multiSRC_fields']) && is_array($v))
			   		{
			   			$arrValue = \Contao\StringUtil::deserialize($v);
			   			if(is_array($arrValue) && !empty($arrValue))
			   			{
			   				foreach($arrValue as $v)
			   				{
			   					$uuid = $v;
						   		$bin = \Contao\StringUtil::binToUuid($v);
						   		$objFile = \Contao\FilesModel::findByUuid($bin);
					   			if($objFile)
					   			{
					   				$arrInserts['tl_files'][$uuid] = $objFile->path;
					   			}
			   				}
			   			}
			   		}
				}
			}
		}

		// build string
		$arrParts[0] = $strHead;
		$arrParts[1] = '$arrImport = '.var_export($arrInfo,true).';
		';
		
		$arrParts[2] = '$arrImport["sql"] = '.strval(var_export($arrInserts, true)).';';
		#$arrParts[2] = '$arrImport["sql"] = '.serialize($arrInserts).';';
		
		return implode('', $arrParts);
	}
	
	
	/**
	 * Write the template file
	 * @param string
	 * @param string
	 * @return boolean
	 */
	public function writeFile($strFile,$strContent)
	{
		$objFile = new \Contao\File($strFile);
		$strContent = str_replace( array("\t","\r"), "", $strContent);
		$strContent = preg_replace(array('/^[\t ]+/m', '/[\t ]+$/m', '/\n\n+/'), array('', '', "\n"), $strContent);
		
		#$objMinify = new MatthiasMullie\Minify\JS();
		#$objMinify->add($strContent);
		#$strContent = $objMinify->minify();
		
		if(!$objFile->exists())
		{
			\Contao\File::putContent($strFile,$strContent);
		}
		else
		{
			$objFile->write($strContent);
		}
		
		return $objFile;
	}
	
	
	/**
	 * Import / insert the content element set
	 * @param string
	 * @param integer
	 * @return boolean
	 */
	public function importByName($strName)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) || strlen($strName) < 1)
		{
			return false;
		}
		
		$strFile = \Contao\Controller::getTemplate($strName,'html5');
		
		if(!file_exists($strFile))
		{
			return false;
		}
		
		
		// includes $arrImport
		include \Contao\Controller::getTemplate($strName,'html5');
		
		if(empty($arrImport['sql']))
		{
			return false;
		}

		// is signle element?
		$bolIsSingle = false;
		if( \strpos($strName, 'set_single') !== false )
		{
			$bolIsSingle = true;
		}

		
		$intIncrementSorting = 64;
		
		// @var object Database
		$objDatabase = \Contao\Database::getInstance();
		
		$objPasteAfter = null;
		
		if(\Contao\Input::get('mode') == 1)
		{
			$objPasteAfter = \Contao\ContentModel::findByPk(\Contao\Input::get('pid'));
		}
		else if(\Contao\Input::get('mode') == 2 && \Contao\Input::get('table') == 'tl_content') // root
		{
			$ptable = $GLOBALS['TL_DCA'][\Contao\Input::get('table')]['config']['ptable'];
			
			// find lowest sorting
			$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM ".\Contao\Input::get('table')." WHERE pid=? AND ptable=? ORDER BY sorting")->limit(1)->execute(\Contao\Input::get('pid'),$ptable);
			
			$sorting = ($objResult->sorting > 0 ? $objResult->sorting - 16 : 0);
			if($sorting < 0)
			{
				$sorting = 0;
			}
			
			// build psydo paste after element
			$objPasteAfter = new \StdClass;
			$objPasteAfter->pid = \Contao\Input::get('pid');
			$objPasteAfter->sorting = $sorting;
			$objPasteAfter->ptable = $ptable;
		}
		
		if($objPasteAfter === null)
		{
			return false;
		}
		
		$this->arrTl_files = null;
		if( isset($arrImport['sql']['tl_files']) && is_array($arrImport['sql']['tl_files']))
		{
			$this->arrTl_files = $arrImport['sql']['tl_files'];
			unset($arrImport['sql']['tl_files']);
		}
		
		$arrData = array();
		foreach($arrImport['sql'] as $data)
		{
			$strTable = $data['table'];
			
			// collect vault data
			if( $strTable == 'tl_pct_customelement_vault' )
			{
				$row = array_combine($data['fields'], $data['values']);
				$arrData[$strTable][] = $row;
				continue;
			}
		
			if(!$objDatabase->tableExists($strTable))
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('Table '.$strTable.' does not exist!');
				
				// throw error
				throw new \Exception('Table '.$strTable.' does not exist!');
			}
			
			$row = array_combine($data['fields'], $data['values']);
			foreach($row as $field => $value)
			{
				if(!$objDatabase->fieldExists($field,$strTable))
				{
					unset($row[$field]);
				}
				
				if( !in_array($strTable.'.'.$field,$GLOBALS['PCT_THEME_SETTINGS']['zero_value_fields']) && empty($value) )
				{
					unset($row[$field]);
				}
			}
			
			$arrData[$strTable][] = $row;
		}
		
		$time = time();
		
		$arrVaultData = $arrData['tl_pct_customelement_vault'] ?? array();
		unset($arrData['tl_pct_customelement_vault']);
		
		// do not wrap single elements
		if( $bolIsSingle === false )
		{
			// insert a wrapper start at first position
			$arrWrapper = array
			(
				'type' 		=> 'pct_contentelementset_start',
				'pid'  		=> $objPasteAfter->pid,
				'ptable'	=> $objPasteAfter->ptable,
				'tstamp'	=> $time,
				'alt'		=> $strName,
			);
			#\Contao\ArrayUtil::arrayInsert($arrData['tl_content'],0,array($arrWrapper));
			
			// insert a wrapper stop at last position
			$arrWrapper = array
			(
				'type' 		=> 'pct_contentelementset_stop',
				'pid'  		=> $objPasteAfter->pid,
				'ptable'	=> $objPasteAfter->ptable,
				'tstamp'	=> $time,
				'alt'		=> $strName,
			);
			#\Contao\ArrayUtil::arrayInsert($arrData['tl_content'],count($arrData['tl_content']),array($arrWrapper));
		}
		$arrPids = array();
		$arrNewRecords = array();
		$arrMoveRecords = array();
		
		// prepare the set array
		$arrSorting = array('tl_content'=>(int)$objPasteAfter->sorting);
		
		foreach($arrData as $strTable => $arrRows)
		{
			$hasSorting = $objDatabase->fieldExists('sorting',$strTable);
			
			// check if there is an element at the same position
			if($hasSorting)
			{
				$objElementBelow = $objDatabase->prepare
				(
					"SELECT * FROM ".$strTable." WHERE sorting>?".
					((int)$objPasteAfter->pid > 0 ? " AND pid=?" : "").
					(strlen($objPasteAfter->ptable) > 0 ? " AND ptable=?" : "").
					" ORDER BY sorting"
				)->execute($objPasteAfter->sorting,$objPasteAfter->pid,$objPasteAfter->ptable);
				
				if($objElementBelow->numRows > 0)
				{
					$arrMoveRecords[$strTable] = array_merge($arrMoveRecords[$strTable] ?? array(),$objElementBelow->fetchEach('id'));
				}
			}
			
			foreach($arrRows as $i => $arrRow)
			{
				if($hasSorting)
				{
					// sorting
					$sorting = $arrSorting[$strTable] + $intIncrementSorting;
					
					$arrRow['sorting'] = $sorting;
										
					// remember sorting
					$arrSorting[$strTable] = $sorting;
				}
				
				// update
				$arrRow['pid'] = $objPasteAfter->pid;
				
				if(isset($arrRow['tstamp']))
				{
					$arrRow['tstamp'] = $time;
				}
				
				if(strlen($objPasteAfter->ptable) && $objDatabase->fieldExists('ptable',$strTable))
				{
					$arrRow['ptable'] = $objPasteAfter->ptable;
				}
				
				$arrData[$strTable][$i] = $arrRow;
			}
		}
		
		// make a key sort to sort tl_content before tl_pct_...
		ksort($arrData);
		
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');

		// do the insert
		foreach($arrData as $strTable => $arrRows)
		{
			$hasSorting = $objDatabase->fieldExists('sorting',$strTable);
			$ce_field = $GLOBALS['PCT_ELEMENTSET_LIBRARY_CE_FIELDS'][$strTable] ?? 'pct_customelement';

			foreach($arrRows as $i => $row)
			{
				$intOldId = $row['id'] ?? 0;
				unset($row['id']);
				
				// check fields and convert binary data
				foreach($row as $f => $v)
				{
					if(!$objDatabase->fieldExists($f,$strTable))
					{
						unset($row[$i][$f]);
						continue;
					}

					// CE widget
					if( $f == $ce_field )
					{
						$arrWizard = StringUtil::deserialize( $row[$f] );

						foreach($arrWizard['values'] as $attr_uuid => $value)
						{
							if( Validator::isStringUuid($value) && isset($this->arrTl_files[$value]) )
							{
								$uuid = $value;
								$strFile = $this->arrTl_files[$uuid];
								if(file_exists($rootDir.'/'.$strFile))
								{
									$objFile = Dbafs::addResource($strFile);
									if($objFile)
									{
										$bin = $objFile->uuid;
										$arrWizard['values'][$attr_uuid] = StringUtil::binToUuid( $objFile->uuid );
									}
								}

								$row[$f] = $arrWizard;
							}
						}
						
						continue;
					}
					
					// check if a value is a uuid string
					if(\Contao\Validator::isStringUuid($v))
					{
						$uuid = $v;
						
						$bin = null;
						if($this->arrTl_files[$uuid])
						{
							$strFile = $this->arrTl_files[$uuid];
							if(file_exists($rootDir.'/'.$strFile))
							{
								$objFile = \Contao\Dbafs::addResource($strFile);
								if($objFile)
								{
									$bin = $objFile->uuid;
								}
							}
						}
						else
						{
							$bin = \Contao\StringUtil::uuidToBin($uuid);
						}
										
						$v = $bin;
						
						$row[$f] = $v;
					}
						
					// binary in multiSRC fields
					if(in_array($f, $GLOBALS['PCT_CUSTOMELEMENTS']['multiSRC_fields']) && !empty($v))
					{
						$arrValue = \Contao\StringUtil::deserialize($v);
						if(is_array($arrValue) && count($arrValue) > 0)
						{
							$tmp = array();
							foreach($arrValue as $uuid)
							{
								$bin = null;
								
								if($this->arrTl_files[$uuid])
								{
									$strFile = $this->arrTl_files[$uuid];
									if(file_exists($rootDir.'/'.$strFile))
									{
										$objFile = \Contao\Dbafs::addResource($strFile);
										if($objFile)
										{
											$bin = $objFile->uuid;
										}
									}
								}
								else
								{
									$bin = \Contao\StringUtil::uuidToBin($uuid);
								}
								$tmp[] = $bin;
							}
							
							$v = serialize($tmp);
							unset($tmp);
							
							$row[$f] = $v;
						}
					}
				}
				
				$objInsert = $objDatabase->prepare("INSERT INTO ".$strTable." %s")->set($row)->execute();
				
				$_insertId = $objInsert->__get('insertId');
				
				if($intOldId > 0)
				{
					$arrPids[$strTable][$intOldId] = $_insertId;
				}
				
				$arrNewRecords[$strTable][] = $_insertId;
			}
			
			// move records
			if( isset($arrMoveRecords[$strTable]) && is_array($arrMoveRecords[$strTable]))
			{
				$arrMoveRecords[$strTable] = array_filter(array_unique($arrMoveRecords[$strTable]));
			}
			
			if(!empty($arrMoveRecords[$strTable]))
			{
				$objRecords = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE id IN(".implode(',', $arrMoveRecords[$strTable]).") ORDER BY sorting")->execute();
				while($objRecords->next())
				{
					$sorting = $arrSorting[$strTable] + $intIncrementSorting;
				
					$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set(array('sorting'=>$sorting))->execute($objRecords->id);
					
					$arrSorting[$strTable] = $sorting;	
				}
			}
		}
		
		// tl_pct_customelement_vault
		if(is_array($arrVaultData) && !empty($arrVaultData))
		{
			foreach($arrVaultData as $row)
			{
				$source = $row['source'];
				if(strlen($source) < 1 || !$objDatabase->tableExists($source))
				{
					continue;
				}
				
				$oldId = $row['id'];
				unset($row['id']);
				
				$intPid = 0;
				if($arrPids[$source][$row['pid']] > 0)
				{
					$intPid = $arrPids[$source][$row['pid']];
				}

				// binary data
				if($row['type'] == 'wizard')
				{
					$arrWizard = \Contao\StringUtil::deserialize($row['data_blob']);
					
					if(empty($arrWizard) || !is_array($arrWizard))
					{
						continue;
					}
					
					if(empty($arrWizard['values']) || !is_array($arrWizard['values']))
					{
						continue;
					}
					
					foreach($arrWizard['values'] as $field => $v)
			   		{
			      		if(empty($v))
			      		{
				      		continue;
			      		}
			      		
			      		$v = \Contao\StringUtil::deserialize($v);
			      		
			      		if(!is_array($v))
				      	{
				      		if(\Contao\Validator::isStringUuid($v))
							{
								$uuid = $v;
								$bin = null;
								if($this->arrTl_files[$uuid])
								{
									$strFile = $this->arrTl_files[$uuid];
									if(file_exists($rootDir.'/'.$strFile))
									{
										$objFile = \Contao\Dbafs::addResource($strFile);
										if($objFile)
										{
											$bin = $objFile->uuid;
										}
									}
								}
								else
								{
									$bin = \Contao\StringUtil::uuidToBin($uuid);
								}
								
								if($bin !== null)
								{
									$arrWizard['values'][$field] = \Contao\StringUtil::binToUuid($bin);
								}
							}
						}
						// binary in multiSRC fields
				   		else if(in_array($field, $GLOBALS['PCT_CUSTOMELEMENTS']['multiSRC_fields']) && is_array($v))
				   		{
				   			$arrValue = \Contao\StringUtil::deserialize($v);
				   			if(is_array($arrValue) && count($arrValue) > 0)
				   			{
				   				$tmp = array();
				   				foreach($arrValue as $v)
				   				{
				   					$bin = null;
									if($this->arrTl_files[$uuid])
									{
										$strFile = $this->arrTl_files[$uuid];
										if(file_exists($rootDir.'/'.$strFile))
										{
											$objFile = \Contao\Dbafs::addResource($strFile);
											if($objFile)
											{
												$bin = $objFile->uuid;
											}
										}
									}
									else
									{
										$bin = \Contao\StringUtil::uuidToBin($uuid);
									}
									
									if($bin !== null)
									{
										$tmp[] = \Contao\StringUtil::binToUuid($bin);
									}
				   				}
				   				
				   				$arrWizard['values'][$field] = serialize($tmp);
				   				unset($tmp);
				   			}
				   		}
					}
					
					$row['data_blob'] = serialize($arrWizard);
				}

				$strField = $GLOBALS['PCT_CUSTOMELEMENTS']['sourceFields'][ $source ] ?? 'pct_customelement';

				$set = array('tstamp' => $time);
				$set[ $strField ] = $arrWizard;

				// UPDATE
				$objDatabase->prepare("UPDATE ".$source." %s WHERE id=?")->set($set)->execute($intPid);
			}
		}
		
		// log new records
		unset($arrNewRecords['tl_pct_customelement_vault']);
		if(count($arrNewRecords) > 0)
		{
			foreach($arrNewRecords as $strTable => $ids)
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('New set "'.$strName.'" included in '.$strTable.' (ids:'.implode(',', $ids));
			}
		}
			
		return true;
	}
	
	
	protected function getNextHighestSorting($strTable,$intSorting,$strPtable='')
	{
		$objResult = \Contao\Database::getInstance()
		->prepare("SELECT * FROM ".$strTable." WHERE pid=? AND sorting=?".(strlen($strPtable) > 0 ? " AND ptable=?" : "") )
		->limit(1)->execute($intSorting,$strPtable);
		if($objResult->numRows < 1)
		{
			return $intSorting;
		}
		else
		{
			return $this->getNextHighestSorting($strTable,$intSorting + 64,$strPtable);
		}
	}
	
}