<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\Themer;

/**
 * Imports
 */

use Contao\ArticleModel;
use Contao\Database;
use Contao\Dbafs;
use Contao\Input;
use Contao\Controller;
use Contao\Date;
use Contao\PageModel;
use Contao\System;
use Contao\Validator;
use Contao\StringUtil;

/**
 * Class file
 * Themer
 *
 * Provide various methods to import theme demo templates
 */
class Import extends \PCT\Themer
{	
	/**
	 * Unix timestamp when import started
	 * @var integer
	 */
	protected $intTime = 0;
	
	/**
	 * pid look up array
	 * @var array
	 */
	protected $arrPids = array();
	
	/**
	 * pid look up array
	 * @var array
	 */
	protected $arrNewRecords = array();
	
	/**
	 * Theme record id
	 * @var integer
	 */
	protected $intTheme = 0;
	
	/**
	 * Stores files information
	 * @var array
	 */
	protected $arrTl_files = array();
	
		
	/**
	 * Run the import for a root page id
	 * @param integer
	 * @return boolean	TRUE if the import was successfull
	 */
	public function run($intRoot)
	{
		$objRoot = \Contao\PageModel::findByPk($intRoot);
		if($objRoot->type != 'root' || strlen($objRoot->pct_theme) < 1)
		{
			return false;
		}
		
		// catch theme id from POST on first save
		$this->intTheme = $objRoot->pct_theme_cto;
		if($this->intTheme < 1 && Input::post('pct_theme_cto') > 0)
		{
			$this->intTheme = Input::post('pct_theme_cto');
		}
		
		$this->setRootPage($objRoot);
		
		$strPath = $GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['template_path'] ?? 'templates/demo_installer';
		$this->setName( $GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['label'] );

		// includes $arrImport
		include \Contao\TemplateLoader::getPath('demo_'.$objRoot->pct_theme, 'php', $strPath);
		
		if(!isset($arrImport))
		{
			return false;
		}
		
		$this->intRoot = $intRoot;
		$this->intTime = time();
		$objDatabase = Database::getInstance();
		$objSession = System::getContainer()->get('request_stack')->getSession();
		$rootDir = System::getContainer()->getParameter('kernel.project_dir');

		// set ssl on root page
		$objDatabase->prepare("UPDATE tl_page %s WHERE id=?")->set( array('useSSL'=> \Contao\Environment::get('ssl') ) )->execute($this->intRoot);		

		if( isset($arrImport['sql']['tl_files']) && is_array($arrImport['sql']['tl_files']))
		{
			$this->arrTl_files = $arrImport['sql']['tl_files'];
			unset($arrImport['sql']['tl_files']);
		}
		
		// rebuild array by tables names as keys
		$arrData = array();
		foreach($arrImport['sql'] as $data)
		{
			if(strlen($data['table']) < 1)
			{
				continue;
			}
			
			$arrData[ $data['table'] ][] = $data;
		}
		
		#$this->arrLookUp = array('tl_content'=>array());
		#foreach($arrData as $table => $records)
		#{
		#	foreach($records as $data)
		#	{
		#		$row = array_combine( array_values($data['fields']),array_values($data['values']) );
		#		$ptable = $row['ptable'];
		#		$id  =$row['id'];
		#		if($ptable)
		#		{
		#			$this->arrLookUp[$table][$ptable][$id] = $row;
		#			continue;
		#		}
		#		$this->arrLookUp[$table][$id] = $row;
		#	}
		#}
		
		$arrVaultData = $arrData['tl_pct_customelement_vault'] ?? array();
		unset($arrData['tl_pct_customelement_vault']);
		
		#$arrData = array('tl_page'=>$arrData['tl_page'],'tl_article'=>$arrData['tl_article']);
		
		// move tl_content, tl_module on last positions so we have all nessessary records created before
		$arrTables = array_keys($arrData);
		if(in_array('tl_module', $arrTables))
		{
			unset($arrTables[ array_search('tl_module', $arrTables) ]);
			$arrTables[] = 'tl_module';
		}
		if(in_array('tl_content', $arrTables))
		{
			unset($arrTables[ array_search('tl_content', $arrTables) ]);
			$arrTables[] = 'tl_content';
		}
		
		$arrNewRecords = array();
		foreach($arrTables as $strTable)
		{
			$arrNewRecords = $this->mergeData($arrNewRecords,$this->prepareData($strTable,$arrData));
		}
		
		//-- tl_content related
		if( isset($arrData['tl_content']) && \is_array($arrData['tl_content']) && !empty($arrData['tl_content']) )
		{
			$strTable = 'tl_content';
			foreach($arrData[$strTable] as $data)
			{
				$row = array_combine( array_values($data['fields']),array_values($data['values']));
				
				$oldId = $row['id'];
				$id = $this->arrPids[$strTable][$oldId] ?? 0;
				
				$obj = \Contao\ContentModel::findByPk($id);
				if($obj === null)
				{
					continue;
				}
				
				$row = $obj->row();
				
				// hyperlink clear url
				if( in_array($obj->type, array('hyperlink','ce_revolutionslider_hyperlink')) || \strpos($row['url'],'link_url') )
				{
					$row['url'] = '#';
					$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set($row)->execute($obj->id);
				}

				// tl_module included 
				if($obj->type == 'module' && $obj->module > 0)
				{
					$table = 'tl_module';
					$field = 'module';
					if( isset($this->arrPids[$table][$row[$field]]) && $obj->{$field} != $this->arrPids[$table][$row[$field]] && $this->arrPids[$table][$row[$field]] > 0)
					{
						$row[$field] = $this->arrPids[$table][$row[$field]];
						// update the record	
						$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set($row)->execute($obj->id);
					}
				}
				// tl_revolutionslider included
				else if($obj->type == 'revolutionslider' && $obj->revolutionslider > 0)
				{
					$table = 'tl_revolutionslider';
					$field = 'revolutionslider';
					if($obj->{$field} != $this->arrPids[$table][$row[$field]] && $this->arrPids[$table][$row[$field]] > 0)
					{
						$row[$field] = $this->arrPids[$table][$row[$field]];
						// update the record	
						$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set($row)->execute($obj->id);
					}
				}
				// tl_article includes
				else if($obj->type == 'article' && strlen($obj->articleAlias) > 0)
				{
					$table = 'tl_article';
					$field = 'articleAlias';
					if($obj->{$field} != $this->arrPids[$table][$row[$field]] && $this->arrPids[$table][$row[$field]] > 0)
					{
						$row[$field] = $this->arrPids[$table][$row[$field]];
						// update the record	
						$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set($row)->execute($obj->id);
					}
				}
				// tl_content includes
				else if($obj->type == 'alias' && strlen($obj->cteAlias) > 0)
				{
					$table = 'tl_content';
					$field = 'cteAlias';
					if($obj->{$field} != $this->arrPids[$table][$row[$field]] && $this->arrPids[$table][$row[$field]] > 0)
					{
						$row[$field] = $this->arrPids[$table][$row[$field]];
						// update the record	
						$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set($row)->execute($obj->id);
					}
				}
				// tl_form includes
				else if($obj->type == 'form' && strlen($obj->form) > 0)
				{
					$table = 'tl_form';
					$field = 'form';
					if($obj->{$field} != $this->arrPids[$table][$row[$field]] && $this->arrPids[$table][$row[$field]] > 0)
					{
						$row[$field] = $this->arrPids[$table][$row[$field]];
						// update the record	
						$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set($row)->execute($obj->id);
					}
				}
			}
		}
		
		//-- tl_module related
		if( isset($arrData['tl_module']) && is_array($arrData['tl_module']) && !empty($arrData['tl_module']) )
		{
			$strTable = 'tl_module';
			foreach($arrData[$strTable] as $data)
			{
				$row = array_combine( array_values($data['fields']),array_values($data['values']));
				
				$oldId = $row['id'];
				$id = $this->arrPids[$strTable][$oldId] ?? 0;
				
				$obj = \Contao\ModuleModel::findByPk($id);
				if($obj === null)
				{
					continue;
				}
				
				$row = $obj->row();
				
				$blnUpdate = false;
				
					
				// tl_news_archive, tl_news, tl_content included
				if( in_array($obj->type, array('newslist','newsreader')) && isset($obj->news_archives))
				{
					$table = 'tl_news_archive';
					$field = 'news_archives';
					$archives = StringUtil::deserialize($obj->{$field});
					
					$tmp = array();
					foreach($archives as $oldArchiveId)
					{
						if( isset($this->arrPids[$table][$oldArchiveId]) )
						{
							$tmp[] = $this->arrPids[$table][$oldArchiveId];
						}
					}
					$row[$field] = $tmp;
					unset($tmp);
					
					// update the record	
					$blnUpdate = true;
				}
				// tl_calender, tl_calendar_events, tl_content included
				else if( in_array($obj->type, array('eventlist','eventreader')) && isset($obj->cal_calendar))
				{
					$table = 'tl_calendar';
					$field = 'cal_calendar';
					$archives = StringUtil::deserialize($obj->{$field});
					
					$tmp = array();
					foreach($archives as $oldArchiveId)
					{
						$tmp[] = $this->arrPids[$table][$oldArchiveId];
					}
					$row[$field] = $tmp;
					unset($tmp);
					
					// update the record	
					$blnUpdate = true;
				}
				
				if($blnUpdate)
				{
					// update the record	
					$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set($row)->execute($obj->id);
				}
			}
		}
		
		// tl_pct_customelement_vault
		if( \is_array($arrVaultData) && !empty($arrVaultData) )
		{
			$strTable = 'tl_pct_customelement_vault';
			foreach($arrVaultData as $data)
			{
				$row = array_combine( array_values($data['fields']),array_values($data['values']));
				$source = $row['source'];
				if(strlen($source) < 1 || !$objDatabase->tableExists($source))
				{
					continue;
				}
				
				$oldId = $row['id'];
				unset($row['id']);
				
				$intPid = 0;
				if($this->arrPids[$source][$row['pid']] > 0)
				{
					$intPid = $this->arrPids[$source][$row['pid']];
				}
				
				$row['tstamp'] = $this->intTime;
				$row['pid'] = $intPid;
				
				// convert values
				if($row['type'] == 'wizard')
				{
					$arrWizard = StringUtil::deserialize($row['data_blob']);
					if(count($arrWizard) < 1 || !is_array($arrWizard))
					{
						continue;
					}
					
					if(count($arrWizard['values']) < 1)
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
			      		
						// migration: center_center -> crop
						if( isset($v[2]) && $v[2] == 'center_center' )
						{
							$v[2] = 'crop';
							$arrWizard['values'][$field] = $v;
						}

						if(!is_array($v))
				      	{
							// link_url inserttag
							if( \strpos($v,'link_url') )
							{
								$arrWizard['values'][$field] = '#';
							}

							if(Validator::isStringUuid($v))
							{
								$uuid = $v;
								$bin = null;
								if($this->arrTl_files[$uuid])
								{
									$strFile = $this->arrTl_files[$uuid];
									if(file_exists($rootDir.'/'.$strFile))
									{
										$objFile = Dbafs::addResource($strFile);
										if($objFile)
										{
											$bin = $objFile->uuid;
										}
									}
								}
								else
								{
									$bin = StringUtil::uuidToBin($uuid);
								}
								
								if($bin !== null)
								{
									$arrWizard['values'][$field] = StringUtil::binToUuid($bin);
								}
							}
						}
						// binary in multiSRC fields
				   		else if(in_array($field, $GLOBALS['PCT_THEMER']['multiSRC_fields']) && is_array($v))
				   		{
				   			$arrValue = StringUtil::deserialize($v);
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
											$objFile = Dbafs::addResource($strFile);
											if($objFile)
											{
												$bin = $objFile->uuid;
											}
										}
									}
									else
									{
										$bin = StringUtil::uuidToBin($uuid);
									}
									
									if($bin !== null)
									{
										$tmp[] = StringUtil::binToUuid($bin);
									}
				   				}
				   				
				   				$arrWizard['values'][$field] = serialize($tmp);
				   				unset($tmp);
				   			}
				   		}
					}
					
					$row['data_blob'] = $arrWizard;
				}
				
				
				// INSERT
				$objStatement = $objDatabase->prepare("INSERT INTO ".$strTable." %s")->set($row)->execute();
				$_insertId = $objStatement->__get('insertId');
				
				$this->arrNewRecords[$strTable][] = $_insertId;
				
				// store as new pid
				$this->arrPids[$strTable][$oldId] = $_insertId; 
			}
		}

		//!-- post import scripts
		// set footer article in root page
		$objPage = PageModel::findBy( array('pid=? AND title=?'), array($intRoot,'Footer') );
		if( $objPage !== null )
		{
			$objArticle = ArticleModel::findByPid( $objPage->id,array('limit'=>1,'order' => ArticleModel::getTable().'.sorting' ) );
			if( $objArticle !== null )
			{
				$objDatabase->prepare("UPDATE tl_page %s WHERE id=?")->set( array('addArticle'=>true,'article'=>$objArticle->id) )->execute($intRoot);
			}
		}
		
		// set topbar article in root page
		$objPage = PageModel::findBy( array('pid=? AND title=?'), array($intRoot,'TopBar') );
		if( $objPage !== null )
		{
			$objArticle = ArticleModel::findByPid( $objPage->id,array('limit'=>1,'order' => ArticleModel::getTable().'.sorting' ) );
			if( $objArticle !== null )
			{
				$objDatabase->prepare("UPDATE tl_page %s WHERE id=?")->set( array('addArticle'=>true,'article_top'=>$objArticle->id) )->execute($intRoot);
			}
		}
		
		// get the session data
		$arrSession = $objSession->get('contao_backend');
		$arrSession['PCT_THEMER']['IMPORT'][$this->intRoot] = $this->arrNewRecords;
		$objSession->set('contao_backend',$arrSession);
		
		return true;
	}
	
	
	/**
	 * Prepare the sql array
	 */
	protected function prepareData($strTable, $arrData=array(), array $arrReturn=array())
	{
		$objDatabase = Database::getInstance();
		$arrRecords = $arrData[$strTable];
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		
		if(!is_array($arrRecords) || count($arrRecords) < 1 || !$objDatabase->tableExists($strTable))
		{
			return $arrReturn;
		}
		
		// load the datacontainer
		if( !isset($GLOBALS['TL_DCA'][$strTable]['config']) )
		{
			Controller::loadDataContainer($strTable);
		}
		
		// parent table
		$strPtable = '';
		if( isset($GLOBALS['TL_DCA'][$strTable]['config']['ptable']) && strlen($GLOBALS['TL_DCA'][$strTable]['config']['ptable']) > 0)
		{
			$strPtable = $GLOBALS['TL_DCA'][$strTable]['config']['ptable'];
		}
		
		// dynamicPtable
		$blnDynamic = false;
		if( isset($GLOBALS['TL_DCA'][$strTable]['config']['dynamicPtable']) )
		{
			$blnDynamic = (boolean)$GLOBALS['TL_DCA'][$strTable]['config']['dynamicPtable'];
		}
		
		if($strTable == 'tl_pct_customelement_vault')
		{
			$blnDynamic = true;
		}

		$arrSkips = $GLOBALS['PCT_DEMOINSTALLER']['SKIP'][$strTable] ?? array();
		
		foreach($arrRecords as $i => $data)
		{
			$intPid = 0;
			
			$fields = $data['fields'];
			$values = $data['values'];
			
			// check if field still exists
			foreach($fields as $k => $f)
			{
				if($strTable == 'tl_page' && $f == '_rootId_')
				{
					$intPid = $this->intRoot;	
				}
				
				if(!$objDatabase->fieldExists($f,$strTable))
				{
					unset($fields[$k]);
					unset($values[$k]);
					continue;
				}

				$values[$k] = StringUtil::deserialize($values[$k]);

				// migration: image sizes: center_center to crop
				if( isset($values[$k][2]) && $values[$k][2] == 'center_center' )
				{
					$values[$k][2] = 'crop';
				}

				// image textfields
				if(in_array($f, $GLOBALS['PCT_THEMER']['imageText_fields']) && !empty($values[$k]))
				{
					$uuid = $values[$k];
					if( isset($this->arrTl_files[$uuid]) && $this->arrTl_files[$uuid])
					{
						$strFile = $this->arrTl_files[$uuid];
						if(file_exists($rootDir.'/'.$strFile))
						{
							$objFile = Dbafs::addResource($strFile);
							$values[$k] = \Contao\StringUtil::binToUuid( $objFile->uuid );
						}
					}
					continue;
				}
				
				// check if a value is a uuid string
				if( isset($values[$k]) && Validator::isStringUuid($values[$k]) )
				{
					$uuid = $values[$k];
					
					$bin = null;
					if( isset($this->arrTl_files[$uuid]) && $this->arrTl_files[$uuid])
					{
						$strFile = $this->arrTl_files[$uuid];
						if(file_exists($rootDir.'/'.$strFile))
						{
							$objFile = Dbafs::addResource($strFile);
							if($objFile)
							{
								$bin = $objFile->uuid;
							}
						}
					}
					else
					{
						$bin = StringUtil::uuidToBin($uuid);
					}
									
					$values[$k] = $bin;
				}
				
				// binary in multiSRC fields
				if(in_array($f, $GLOBALS['PCT_THEMER']['multiSRC_fields']) && !empty($values[$k]))
				{
					$arrValue = StringUtil::deserialize($values[$k]);
					if(is_array($arrValue) && count($arrValue) > 0)
					{
						$tmp = array();
						foreach($arrValue as $uuid)
						{
							$bin = null;
							
							if( isset($this->arrTl_files[$uuid]) && $this->arrTl_files[$uuid])
							{
								$strFile = $this->arrTl_files[$uuid];
								if(file_exists($rootDir.'/'.$strFile))
								{
									$objFile = Dbafs::addResource($strFile);
									if($objFile)
									{
										$bin = $objFile->uuid;
									}
								}
							}
							else
							{
								$bin = StringUtil::uuidToBin($uuid);
							}
							$tmp[] = $bin;
						}
						
						$values[$k] = serialize($tmp);
						unset($tmp);
					}
				}
			}
			
			// build set array
			$row = array_combine( array_values($fields),array_values($values));
			
			// !skip records by id or alias
			$idOrAlias = $row['alias'] ?? $row['id'] ?? null;
				
			if( $idOrAlias !== null && \in_array($idOrAlias,$arrSkips) )
			{
				continue;
			}

			// update timestamp
			if(isset($row['tstamp']))
			{
				$row['tstamp'] = $this->intTime;
			}
			
			// has a ptable field
			if($blnDynamic && strlen($row['ptable']) > 0)
			{
				$strPtable = $row['ptable'];
			}
			// has a source field
			else if($blnDynamic && strlen($row['source']) > 0)
			{
				$strPtable = $row['source'];
			}

			
			if( \in_array($strTable,array('tl_module')) && isset($row['name']) )
			{
				$f = 'name';
				$a = \strtolower($row[$f]);
				$b = \strtolower( $this->getName() );
				if( \strpos($a,$b) === false )
				{
					$row[$f] .= ' (Demo: '.$this->getName().')';
				}
			}
			else if( in_array($strTable,array('tl_form','tl_calendar_events','tl_news_archive')) && isset($row['title']) )
			{
				$f = 'title';
				$a = \strtolower($row[$f]);
				$b = \strtolower( $this->getName() );
				if( \strpos($a,$b) === false )
				{
					$row[$f] .= ' (Demo: '.$this->getName().')';
				}
			}

			// !Migration: tl_module.news_order: date DESC - order_date_desc
			if( \in_array($strTable,array('tl_module')) && isset($row['news_order']) )
			{
				if( $row['news_order'] == 'date DESC' )
				{
					$row['news_order'] = 'order_date_desc';
				}
			}

			// !Migration: CE widgets: center_center - crop
			$ce_field = $GLOBALS['PCT_THEMER_CE_FIELDS'][$strTable] ?? 'pct_customelement';
			if( isset($row[$ce_field]) && !empty($row[$ce_field]) )
			{
				$arrWizard = \Contao\StringUtil::deserialize($row[$ce_field]);
				
				if(empty($arrWizard['values']) || !is_array($arrWizard['values']))
				{
					continue;
				}
				
				foreach($arrWizard['values'] as $field => $v)
				{
					$v = StringUtil::deserialize( $v );
					// center_center - crop
					if( isset($v[2]) && $v[2] == 'center_center' )
					{
						$v[2] = 'crop';
					}
					$arrWizard['values'][$field] = $v;

					// image values

					if(!is_array($v))
					{
						// link_url inserttag
						if( \strpos($v,'link_url') )
						{
							$arrWizard['values'][$field] = '#';
						}

						if(Validator::isStringUuid($v))
						{
							$uuid = $v;
							$bin = null;
							if( isset($this->arrTl_files[$uuid]) && !empty($this->arrTl_files[$uuid]) )
							{
								$strFile = $this->arrTl_files[$uuid];
								if(file_exists($rootDir.'/'.$strFile))
								{
									$objFile = Dbafs::addResource($strFile);
									if($objFile)
									{
										$bin = $objFile->uuid;
									}
								}
							}
							else
							{
								$bin = StringUtil::uuidToBin($uuid);
							}
							
							if($bin !== null)
							{
								$arrWizard['values'][$field] = StringUtil::binToUuid($bin);
							}
						}
					}
					// binary in multiSRC fields
					else if(in_array($field, $GLOBALS['PCT_THEMER']['multiSRC_fields']) && is_array($v))
					{
						$arrValue = StringUtil::deserialize($v);
						if(is_array($arrValue) && count($arrValue) > 0)
						{
							$tmp = array();
							foreach($arrValue as $v)
							{
								$bin = null;
								if( isset($this->arrTl_files[$uuid]) && !empty($this->arrTl_files[$uuid]) )
								{
									$strFile = $this->arrTl_files[$uuid];
									if(file_exists($rootDir.'/'.$strFile))
									{
										$objFile = Dbafs::addResource($strFile);
										if($objFile)
										{
											$bin = $objFile->uuid;
										}
									}
								}
								else
								{
									$bin = StringUtil::uuidToBin($uuid);
								}
								
								if($bin !== null)
								{
									$tmp[] = StringUtil::binToUuid($bin);
								}
							}
							
							$arrWizard['values'][$field] = serialize($tmp);
							unset($tmp);
						}
					}
				}
			
				$row[$ce_field] = $arrWizard;
			}

			// !Migration: RS tl_pct_revolutionslider.sliderStyle
			if( \in_array($strTable,array('tl_revolutionslider')) && isset($row['sliderStyle']) )
			{
				if( $row['sliderStyle'] == 'responsive' )
				{
					$row['sliderStyle'] = 'auto';
				}
			}
			
			// append an info to the title
			if( isset($row['title']) && strlen($row['title']) > 0 && strlen($GLOBALS['PCT_THEMER']['appendTitle']) > 0)
			{
				$row['title'] .= sprintf( $GLOBALS['PCT_THEMER']['appendTitle'],$this->getName(),Date::parse('d.m.Y H:i',time()) );
			}
			else if( isset($row['name']) && strlen($row['name']) > 0 && strlen($GLOBALS['PCT_THEMER']['appendTitle']) > 0)
			{
				$row['name'] .= sprintf( $GLOBALS['PCT_THEMER']['appendTitle'],$this->getName(),Date::parse('d.m.Y H:i',time()) );
			}

			// remember the old id
			$oldId = $row['id'];
			unset($row['id']);
			
			// find pid
			if(strlen($strPtable) > 0)
			{
				if( isset($row['pid']) && $row['pid'] > 0 && isset($this->arrPids[$strPtable][$row['pid']]) && $this->arrPids[$strPtable][$row['pid']] > 0)
				{
					$intPid = $this->arrPids[$strPtable][$row['pid']];
				}
				else if($strTable == 'tl_module')
				{
					$intPid = $this->intTheme;
				}
			}
			// nested record of same table in MODE 5
			else if( isset($GLOBALS['TL_DCA'][$strTable]['list']['sorting']['mode']) && in_array($GLOBALS['TL_DCA'][$strTable]['list']['sorting']['mode'],array(5)) && $row['pid'] > 0 && isset($this->arrPids[$strTable][$row['pid']]) && $this->arrPids[$strTable][$row['pid']] > 0)
			{
				$intPid = $this->arrPids[$strTable][$row['pid']];
			}
			
			// set new pid
			if(isset($row['pid']))
			{
				$row['pid'] = $intPid;
			}
			
			// relink redirects
			foreach($GLOBALS['PCT_THEMER']['singleJumpTo_fields'] as $field)
			{
				$oldJumpTo = $row[$field] ?? 0;
				if($oldJumpTo > 0 && isset($this->arrPids['tl_page'][$oldJumpTo]) && $this->arrPids['tl_page'][$oldJumpTo] > 0 && $oldJumpTo !=  $this->arrPids['tl_page'][$oldJumpTo])
				{
					$row[$field] = $this->arrPids['tl_page'][$oldJumpTo];
				}
			}
			
			// relink multiple page selections
			foreach($GLOBALS['PCT_THEMER']['multiJumpTo_fields'] as $field)
			{
				$pages = \Contao\StringUtil::deserialize($row[$field] ?? array() );
				if(empty($pages) || !is_array($pages))
				{
					continue;
				}
				
				$tmp = array();
				foreach($pages as $oldPageId)
				{
					if( !isset($this->arrPids['tl_page'][$oldPageId]) )
					{
						continue;
					}
					$tmp[] = $this->arrPids['tl_page'][$oldPageId];
				}
				$row[$field] = $tmp;
				unset($tmp);
			}
			
			$tmp = array();
			foreach($row as $k => $v)
			{
				if( !$objDatabase->fieldExists($k,$strTable) )
				{
					continue;
				}
				
				if( !in_array($strTable.'.'.$k,$GLOBALS['PCT_THEMER']['zero_value_fields']) && empty($v) )
				{
					continue;
				}
								
				$tmp[$k] = $v;
			}
			$row = $tmp;
			unset($tmp);
			
			// INSERT
			$objStatement = $objDatabase->prepare("INSERT INTO ".$strTable." %s")->set($row)->execute();
			$_insertId = $objStatement->__get('insertId');
			
			$arrReturn[$strTable][] = $_insertId;
			
			$this->arrNewRecords[$strTable][] = $_insertId;
			
			// store as new pid
			$this->arrPids[$strTable][$oldId] = $_insertId;
		}
			
		return $arrReturn;
	}
	
	
}