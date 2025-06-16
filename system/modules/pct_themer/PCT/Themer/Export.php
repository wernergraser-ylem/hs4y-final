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

use Contao\Date;
use Contao\StringUtil;

/**
 * Class file
 * Themer
 *
 * Provide various methods to import theme demo templates
 */
class Export extends \PCT\Themer
{
	/**
	 * Export data array
	 * @var array
	 */
	protected $arrExportData = array();

	
	/**
	 * Prepare the export data array from the raw ID array
	 * @param array
	 * @return array
	 */
	public function prepareExport($arrRaw)
	{
		if(count($arrRaw) < 1)
		{
			return array();
		}
		
		$objDatabase = \Contao\Database::getInstance();
		
		$arrStructure = array();
		foreach($arrRaw as $data)
		{
			$arrStructure = $this->mergeData($data,$arrStructure);
		}
		
		$arrReturn = array();
		foreach($arrStructure as $table => $ids)
		{
			if(!$objDatabase->tableExists($table) || count($ids) < 1)
			{
				continue;
			}
			
			$hasSorting = false;
			#if($objDatabase->fieldExists('sorting',$table))
			#{
			#	$hasSorting = true;
			#}
			
			$objResult = null;
			if( $table == 'tl_page' )
			{
				$ids = $objDatabase->getChildRecords($this->getRootPage()->id,'tl_page',true);
		
				$objResult = $objDatabase->prepare("SELECT * FROM tl_page WHERE id IN(".implode(',',$ids).")".' ORDER BY FIELD(id,'.implode(',',$ids).')' )->execute();
		
			}
			else
			{
				$objResult = $objDatabase->prepare("SELECT * FROM ".$table." WHERE id IN(".implode(',', $ids).")".($hasSorting ? " ORDER BY sorting":""))->execute();
			}
			
			if($objResult->numRows < 1)
			{
				continue;
			}
			
			// mark level_1 pages
			if($table == 'tl_page')
			{
				while($objResult->next())
				{
					$row = $objResult->row();
					if($row['pid'] == $this->getRootPage()->id)
					{
						$row['_rootId_'] = $this->getRootPage()->id;
					}
					$arrReturn[$table][] = $row;
				}
			}
			else
			{
				$arrReturn[$table] = $objResult->fetchAllAssoc();
			}	
		}
		
		// HOOK: modify the export array
		if (isset($GLOBALS['PCT_THEMER_HOOKS']['prepareExport']) && count($GLOBALS['PCT_THEMER_HOOKS']['prepareExport']) > 0)
		{
			foreach($GLOBALS['PCT_THEMER_HOOKS']['prepareExport'] as $callback)
			{
				$arrReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrReturn,$this);
			}
		}
		
		// set as export data
		$this->arrExportData = $arrReturn;
		
		return $arrReturn;
	}
	
	
	/**
	 * Prepare the file content from a structured table record array
	 * @param array|null
	 * @return string
	 */
	public function prepareFileContent($arrData)
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
 * Hello, I'm an the Premium Contao Theme demo template file: ".$this->getName()."
 */

";

$arrInfo = array('tstamp' => Date::parse('d.m.Y H:i'), 'theme' => $this->getName());

		$arrInserts = array();
		
		foreach($arrData as $table => $records)
		{
			foreach($records as $row)
			{
				$fields = array_keys($row);
				$values = array_values($row);
				
				// convert binary
				foreach($values as $k => $v)
				{
					$field = $fields[$k];
					
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
					if(in_array($field, $GLOBALS['PCT_THEMER']['multiSRC_fields']) && !empty($row[$field]))
					{
						$arrValue = StringUtil::deserialize($row[$field]);
						if( isset($arrValue) && is_array($arrValue) && count($arrValue) > 0)
						{
							$values[$k] = serialize( array_map('\Contao\StringUtil::binToUuid', $arrValue) );
						
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

					// image textfields
					if(in_array($field, $GLOBALS['PCT_THEMER']['imageText_fields']) && !empty($row[$field]))
					{
						#$uuid = \Contao\StringUtil::binToUuid($v);
						$uuid = $v;
						$objFile = \Contao\FilesModel::findByUuid($v);
						if($objFile)
						{
							$arrInserts['tl_files'][$uuid] = $objFile->path;
						}
						$values[$k] = $uuid;
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

		
		$arrTlPctCustomElementVault = array();
		foreach( \array_keys($GLOBALS['PCT_THEMER_CE_FIELDS']) as $table )
		{
			$ce_field = $GLOBALS['PCT_THEMER_CE_FIELDS'][$table] ?? 'pct_customelement';
			foreach($arrData[$table] ?? array() as $row)
			{
				if( isset($row[ $ce_field ]) && !empty($row[ $ce_field ]) )
				{
					$arrTlPctCustomElementVault[] = array('data_blob'=>$row[ $ce_field ]);
				}
			}
		}

		if( !empty($arrTlPctCustomElementVault) )
		{
			$arrData['tl_pct_customelement_vault'] = $arrTlPctCustomElementVault;
			unset($arrTlPctCustomElementVault);
		}
		
		if( isset($arrData['tl_pct_customelement_vault']) && !empty($arrData['tl_pct_customelement_vault']) )
		{
			foreach($arrData['tl_pct_customelement_vault'] as $row)
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
		      		
		      		$v = StringUtil::deserialize($v);
		      		
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
			   		else if(in_array($field, $GLOBALS['PCT_THEMER']['multiSRC_fields']) && is_array($v))
			   		{
			   			$arrValue = StringUtil::deserialize($v);
			   			if( isset($arrValue) && is_array($arrValue) && count($arrValue) > 0)
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
	$arrParts[1] = '$arrImport["info"] = '.var_export($arrInfo, true).';
	';
	
	$arrParts[2] = '$arrImport["sql"] = '.strval(var_export($arrInserts, true)).';';
	#$arrParts[2] = '$arrImport["sql"] = '.serialize($arrInserts).';';
	
	return implode('', $arrParts);
	}

	
	/**
	 * Write the template file
	 * @param string
	 * @param string
	 * @return object
	 */
	public function writeFile($strFile,$strContent)
	{
		$objFile = new \Contao\File($strFile);
		if( $objFile->exists() )
		{
			$objFile->delete();
		}
		
		$objFile = new \Contao\File($strFile);
		$strContent = str_replace( array("\t","\r"), "", $strContent);
		$strContent = preg_replace(array('/^[\t ]+/m', '/[\t ]+$/m', '/\n\n+/'), array('', '', "\n"), $strContent);
		
		#$objMinify = new MatthiasMullie\Minify\JS();
		#$objMinify->add($strContent);
		#$strContent = $objMinify->minify();
		
		$objFile->write($strContent);
		$objFile->close();

		return $objFile;
	}

		
	/**
	 * Collect all export data by a page id
	 * @param integer
	 */
	public function getRecordsByPageId($intPage)
	{
		$objPage = \Contao\PageModel::findByPk($intPage);
		
		if($objPage === null)
		{
			return array();
		}
		
		$arrReturn = array();
		$objDatabase = \Contao\Database::getInstance();
		
		// tl_page, tl_article, $tl_content
		$arrData = $this->getNestedRecords($objPage->id,'tl_page');
		
		//-- tl_content related elements
		if( isset($arrData['tl_content']) && is_array($arrData['tl_content']) && count($arrData['tl_content']) > 0)
		{
			foreach($arrData['tl_content'] as $id)
			{
				$obj = \Contao\ContentModel::findByPk($id);
				if($obj === null)
				{
					continue;
				}
				
				// tl_module included 
				if($obj->type == 'module' && $obj->module > 0)
				{
					$table = 'tl_module';
					$objModel = \Contao\ModuleModel::findByPk($obj->module);
					if($objModel !== null)
					{
						$arrData[$table][] = $objModel->id; #$objModel->row();
					}
				}
				// tl_revolutionslider included
				else if($obj->type == 'revolutionslider' && $obj->revolutionslider > 0)
				{
					$table = 'tl_revolutionslider';
					$objModel = $objDatabase->prepare("SELECT * FROM ".$table." WHERE id=?")->limit(1)->execute($obj->revolutionslider);
			
					if($objModel !== null && $objModel->numRows > 0)
					{
						$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_revolutionslider_slides';
						$GLOBALS['TL_DCA']['tl_content']['config']['dynamicPtable'] = true;
						
						// merge
						$arrData = $this->mergeData( $this->getNestedRecords($objModel->id,$table),$arrData );
					}
				}
				// tl_article includes
				else if($obj->type == 'article' && strlen($obj->articleAlias) > 0)
				{
					$table = 'tl_article';
					$objModel = \Contao\ArticleModel::findByPk($obj->articleAlias);
					if($objModel !== null)
					{
						// merge
						$arrData = $this->mergeData( $this->getNestedRecords($objModel->id,$table),$arrData);
					}
				}
				// tl_content includes
				else if($obj->type == 'alias' && strlen($obj->cteAlias) > 0)
				{
					$table = 'tl_content';
					$objModel = \Contao\ContentModel::findByPk($obj->cteAlias);
					if($objModel !== null)
					{
						// merge
						$arrData = $this->mergeData( $this->getNestedRecords($objModel->id,$table),$arrData);
					}
				}
				// tl_form, tl_form_fields included
				else if($obj->type == 'form' && $obj->form > 0)
				{
				   $table = 'tl_form';
				   $objModel = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$table." WHERE id=?")->limit(1)->execute($obj->form);
				
				   if($objModel !== null)
				   {
					   	// merge
					   	$arrData = $this->mergeData( $this->getNestedRecords($objModel->id,$table),$arrData );
				   }
				}
			}
		}
		
		//-- tl_module related
		if( isset($arrData['tl_module']) && is_array($arrData['tl_module']) && count($arrData['tl_module']) > 0)
		{
			foreach($arrData['tl_module'] as $id)
			{
				$obj = \Contao\ModuleModel::findByPk($id);
				if($obj === null)
				{
					continue;
				}
				
				// tl_news_archive, tl_news, tl_content included
				if( in_array($obj->type, array('newslist')) && isset($obj->news_archives))
				{
					$archives = StringUtil::deserialize($obj->news_archives);
					if(count($archives) < 1)
					{
						continue;
					}
					
					$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_news';
					$GLOBALS['TL_DCA']['tl_content']['config']['dynamicPtable'] = true;
					
					$table = 'tl_news_archive';
					foreach($archives as $id)
					{
						if( isset($arrData[$table]) && is_array($arrData[$table]))
						{
							if(in_array($id, $arrData[$table]))
							{
								continue;
							}
						}
						// merge
						$arrData = $this->mergeData( $this->getNestedRecords($id,$table),$arrData );
					}
				}
				// tl_calender, tl_calendar_events, tl_content included
				else if( in_array($obj->type, array('eventlist')) && isset($obj->cal_calendar))
				{
					$archives = StringUtil::deserialize($obj->cal_calendar);
					if(count($archives) < 1)
					{
						continue;
					}
					
					$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_calendar_events';
					$GLOBALS['TL_DCA']['tl_content']['config']['dynamicPtable'] = true;
					
					$table = 'tl_calendar';
					foreach($archives as $id)
					{
						if( isset($arrData[$table]) && is_array($arrData[$table]))
						{
							if(in_array($id, $arrData[$table]))
							{
								continue;
							}
						}
						// merge
						$arrData = $this->mergeData( $this->getNestedRecords($id,$table),$arrData );
					}
				}
			}
		}
					
		// -- tl_pct_customelement_vault and make ids unique
		if(count($arrData) > 0 && $objDatabase->tableExists('tl_pct_customelement_vault'))
		{
			$tmp = array();
			foreach($arrData as $table => $ids)
			{
				if(!is_array($ids))
				{
					$ids = array($ids);
				}
				
				#$ids = array_unique($ids);
				$tmp[$table] = array_unique($ids);
				
				if(count($ids) > 0)
				{
					$objVault = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_vault WHERE pid IN(".implode(',', $ids).") AND source=?")->execute($table);
					if($objVault->numRows > 0)
				   	{
				   		if(!is_array($tmp['tl_pct_customelement_vault']))
				   		{
				   			$tmp['tl_pct_customelement_vault'] = array();
				   		}
				   		$tmp['tl_pct_customelement_vault'] = array_merge($tmp['tl_pct_customelement_vault'], $objVault->fetchEach('id'));
				   	
				   		#$objVault->reset();
				   		#
				   		#// walk through wizards and collect binary
				   		#while($objVault->next())
				   		#{
					   	#	if(!$objVault->wizard)
					   	#	{
						#   		continue;
					   	#	}
					   	#	
					   	#	$arrWizard = deserialize($objVault->wizard);
					   	#	if(count($arrWizard['values']) > 0)
					   	#	{
						#   		foreach($arrWizard['values'] as $field => $v)
						#   		{
						#	   		if(\Contao\Validator::isBinaryUuid($v))
						#			{
						#				$uuid = \Contao\StringUtil::binToUuid($v);
						#				
						#				$objFile = \Contao\FilesModel::findByUuid($v);
						#				if($objFile)
						#				{
						#					$arrData['tl_files'][$uuid] = $objFile->path;
						#				}
						#			}
						#		
						#			// binary in multiSRC fields
						#			if(in_array($field, $GLOBALS['PCT_THEMER']['multiSRC_fields']) && !empty($v))
						#			{
						#				$arrValue = deserialize($v);
						#				if(is_array($arrValue) && count($arrValue) > 0)
						#				{
						#					foreach($arrValue as $v)
						#					{
						#						$uuid = \Contao\StringUtil::binToUuid($v);
						#						
						#						$objFile = \Contao\FilesModel::findByUuid($v);
						#						if($objFile)
						#						{
						#							$arrData['tl_files'][$uuid] = $objFile->path;
						#						}
						#					}
						#				}
						#			}
						#   		}
					   	#	}
				   		#}
				   	}
				}
			}
			$arrData = $tmp;
			unset($tmp);
		}
		
		return $arrData;
	}
	
	
	/**
	 * Recursivly wald throug a table record and check if there are child table records depending on DCA settings
	 * @param integer
	 * @param string
	 * @param array
	 * @return array
	 */
	public function getNestedRecords($intRecord,$strTable, array $arrReturn=array())
	{
		$objDatabase = \Contao\Database::getInstance();
		
		// return if table does not exist
		if(!$objDatabase->tableExists($strTable))
		{
			return $arrReturn;
		}
		
		if( !isset($GLOBALS['TL_DCA'][$strTable]['config']) || !$GLOBALS['TL_DCA'][$strTable]['config'])
		{
			\Contao\Controller::loadDataContainer($strTable);
		}
		
		$objResult = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($intRecord);
		if($objResult->numRows < 1)
		{
			return $arrReturn;
		}
		
		$arrReturn[$strTable][] = $objResult->id; #$objResult->row();
		
		// return if table has no child table configurations
		if( !isset($GLOBALS['TL_DCA'][$strTable]['config']['ctable']) || !is_array($GLOBALS['TL_DCA'][$strTable]['config']['ctable']) || count($GLOBALS['TL_DCA'][$strTable]['config']['ctable']) < 1 )
		{
			return $arrReturn;
		}
		
		foreach($GLOBALS['TL_DCA'][$strTable]['config']['ctable'] as $ctable)
		{
			// continue if table does not exist
			if(!$objDatabase->tableExists($ctable))
			{
				continue;
			}
			
			if( !isset($arrReturn[$ctable]) || !is_array($arrReturn[$ctable]))
			{
				$arrReturn[$ctable] = array();
			}
			
			if(!$GLOBALS['TL_DCA'][$ctable]['config'])
			{
				\Contao\Controller::loadDataContainer($ctable);
			}
			
			if( !isset($GLOBALS['TL_DCA'][$ctable]['config']['dynamicPtable']) )
			{
				$GLOBALS['TL_DCA'][$ctable]['config']['dynamicPtable'] = false;
			}
			
			// dynamicPtable
			$blnDynamic = (boolean)$GLOBALS['TL_DCA'][$ctable]['config']['dynamicPtable'];
			
			// parent table
			$strPtable = '';
			if( isset($GLOBALS['TL_DCA'][$ctable]['config']['ptable']) && strlen($GLOBALS['TL_DCA'][$ctable]['config']['ptable']) > 0)
			{
				$strPtable = $GLOBALS['TL_DCA'][$ctable]['config']['ptable'];
			}
			
			// fallback: tl_content used to be a non dynamic table
			if($ctable == 'tl_content' && strlen($strPtable) < 1)
			{
				$strPtable = 'tl_article';
				$blnDynamic = true;
			}
			
			// fetch child records
			$objChilds = null;
			if( $objDatabase->fieldExists('ptable',$ctable) )
			{
				$objChilds = $objDatabase->prepare("SELECT * FROM ".$ctable." WHERE pid=? AND ptable=?")->execute($intRecord,$strPtable);
			}
			else
			{
				$objChilds = $objDatabase->prepare("SELECT * FROM ".$ctable." WHERE pid=?")->execute($intRecord);
			}
			
			if( $objChilds !== null && $objChilds->numRows > 0)
			{
				while($objChilds->next())
				{
					$arrReturn = array_merge($arrReturn,$this->getNestedRecords($objChilds->id,$ctable,$arrReturn));
				}
			}
		}
		
		return $arrReturn;
	}	
}