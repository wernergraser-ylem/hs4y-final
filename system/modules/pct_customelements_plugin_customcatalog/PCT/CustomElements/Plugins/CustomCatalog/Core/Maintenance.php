<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;
use stdClass;

/**
 * Class file
 * Maintenance
 */
class Maintenance extends \Contao\Backend
{
	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Trigger the maintainance jobs for multilingual tables
	 * @param string
	 */
	public function onReviseTableCallback($strTable)
	{
		$objDatabase = \Contao\Database::getInstance();
		if( $objDatabase->tableExists($strTable) === false )
		{
			return;
		}
		
		// multilanguage CCs
		$objCC = CustomCatalogFactory::findByTableName($strTable);
		// purge revised entries
		if( $objCC !== null )
		{
			$objDatabase->prepare("DELETE FROM $strTable WHERE tstamp<=0")->execute();
		}
		
		if( $objCC !== null && $objCC->multilanguage )
		{
			$dc = new stdClass;
			$dc->id = $objCC->id;
			$this->purgeLanguageEntries($strTable);
			$this->createBaseLanguageEntries($dc);
		}
	}


	/**
	 * Clean the language reference table from deprecated entries
	 * called via reviseTable Hook
	 */
	public function purgeLanguageEntries($strTable)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists('tl_pct_customcatalog'))
		{
			return;
		}

		// duplicate base records
		#$objDuplicateBaseEntries = $objDatabase->prepare("
		#	SELECT * FROM tl_pct_customcatalog_language 
		#	WHERE 
		#		source=? AND lang='' AND pid=id
		#		AND id IN(SELECT id FROM tl_pct_customcatalog_language WHERE source=? AND lang!='' AND pid >= 0)
		#")->execute($strTable,$strTable);
		
		$objDuplicateBaseEntries = $objDatabase->prepare("
			SELECT * FROM tl_pct_customcatalog_language 
			WHERE 
				source=? AND lang='' AND pid=id
		")->execute($strTable);
		
		if( $objDuplicateBaseEntries->numRows > 0 )
		{
			$ids = $objDuplicateBaseEntries->fetchEach('id');
			$objDatabase->prepare("DELETE FROM tl_pct_customcatalog_language WHERE ".$objDatabase->findInSet('id',$ids)." AND source=? AND id=pid")->execute($strTable);
		}
		
		$arrPurge = array();
		$arrInsertAfterPurge = array();
		
		// find duplicates
		$objDuplicates = $objDatabase->prepare("SELECT COUNT(*) as count,id,pid,tstamp,lang,source FROM tl_pct_customcatalog_language WHERE source=? GROUP BY id,pid,tstamp,lang,source HAVING count > 1")->execute($strTable);
		if($objDuplicates->numRows > 0)
		{
			while($objDuplicates->next())
			{
				$arrPurge[] = $objDuplicates->id;
				$arrInsertAfterPurge[] = $objDuplicates->row();
			}
		}
		
		// revised entries
		$objLangEntries = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE (source=? OR source='') AND id NOT IN (SELECT id FROM ".$strTable.")")->execute($strTable);
		if($objLangEntries->numRows > 0)
		{
			$arrPurge = array_merge($arrPurge,$objLangEntries->fetchEach('id'));
		}

		$objDatabase->prepare("DELETE FROM tl_pct_customcatalog_language WHERE ".$objDatabase->findInSet('id',$arrPurge)." AND source=?")->execute($strTable);
		
		// reinsert the purged duplicates
		if(count($arrInsertAfterPurge) > 0)
		{
			foreach($arrInsertAfterPurge as $set)
			{
				unset($set['count']);
				$objDatabase->prepare("INSERT INTO tl_pct_customcatalog_language %s")->set($set)->execute();
			}
		}
	}
	
	
	/**
	 * Clean the language reference table from deprecated entries based on revised custom catalog tables
	 */
	public function purgeRevisedLanguageEntries()
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists('tl_pct_customcatalog'))
		{
			return;
		}
		
		$objRevisedSources  = $objDatabase->prepare("SELECT DISTINCT source FROM tl_pct_customcatalog_language WHERE source NOT IN (SELECT tableName from tl_pct_customcatalog)")->execute();
		
		if($objRevisedSources->numRows > 0)
		{
			$objDatabase->prepare("DELETE FROM tl_pct_customcatalog_language WHERE ".$objDatabase->findInSet('source',$objRevisedSources->fetchEach('source')))->execute();
		}
	}


	/**
	 * Create a base language reference for existing entries
	 * @param object
	 * @called from tl_pct_customcatalog.onsubmit_callback
	 */
	public function createBaseLanguageEntries($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if( !isset($objDC->activeRecord) || $objDC->activeRecord === null )
		{
			$objDC->activeRecord = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE id=?")->execute($objDC->id);
		}

		// cc table
		$strTable = $objDC->activeRecord->tableName;
		
		// multilanguage is not active, whole config is not active, config is a new table
		if( (boolean)$objDC->activeRecord->multilanguage === false || (boolean)$objDC->activeRecord->active === false || $objDC->activeRecord->mode != 'new' || empty($strTable) === true )
		{
			return;
		}

		if ( !$objDatabase->tableExists($strTable) )
		{
			return;
		}

		// fetch all entries
		$objResult = $objDatabase->prepare("
			SELECT id FROM ".$strTable." 
			WHERE 
				tstamp > 0 AND id > 0
				AND
				(
					id NOT IN (SELECT id FROM tl_pct_customcatalog_language WHERE tstamp > 0 AND source=? AND lang='' AND id=pid)
				)
				AND
				(
					id NOT IN (SELECT id FROM tl_pct_customcatalog_language WHERE tstamp > 0 AND source=? AND lang!='')
				)
			")->execute($strTable,$strTable);
		
		// table is empty or records already exist
		if( $objResult->numRows < 1 )
		{
			return;
		}
		
		$intTime = time();
		$arrValues = array();
		$arrEntries = array();
		
		// build INSERT statement
		while($objResult->next())
		{
			$set = array
			(
				'id' 			=> $objResult->id,
				'pid' 			=> $objResult->id,
				'tstamp'		=> $intTime,
				'source'		=> "'".$strTable."'",
				'lang' 			=> "''",
			);
			$arrValues[] = '('.implode(',', $set).')';
			
			$arrEntries[] = $objResult->id;
		}
	
		$objDatabase->execute("INSERT INTO tl_pct_customcatalog_language (id,pid,tstamp,source,lang) VALUES ".implode(',', $arrValues).';');
		
		// log
		\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('Created language record for base entries (id: '.implode(',', $arrEntries).') in table '.$strTable);
	}


	/**
	 * Maintenance job call
	 * called from system maintenance job 
	 */
	public function createBaseLanguageEntriesJob()
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists('tl_pct_customcatalog'))
		{
			return;
		}
		
		$objCCs = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE active=1 AND multilanguage=1 AND mode=?")->execute('new');
		if($objCCs->numRows < 1)
		{
			return;
		}

		while($objCCs->next())
		{
			$dc = new \StdClass;
			$dc->id = $objCCs->id;
			
			$this->purgeLanguageEntries($objCCs->tableName);
			
			// call
			$this->createBaseLanguageEntries($dc);
		}



		// when triggered from maintenance
		if(\Contao\Input::get('key') == 'updateBaseEntries')
		{
			$objSession = System::getContainer()->get('request_stack')->getSession();

			$objSession->set('PCT_CUSTOMELEMENTS_MESSAGE', sprintf($GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['job_done'],$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['updateBaseEntries'][0]));
				
			// redirect to referer
			$this->redirect($this->getReferer());
		}
	}
	 
		
	/**
	 * Purge revised attributes, groups and groupsets
	 * called via daily cron job
	 */
	public function purgeGroupsetData()
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists('tl_pct_customelement_group'))
		{
			return;
		}
		
		$objGroups = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE CHAR_LENGTH(selector) > 0")->execute();
		if($objGroups->numRows < 1)
		{
			return;
		}

		$arrPurge = array();
		while($objGroups->next())
		{
			// fetch groupset
			#$arrPurge['tl_pct_customelement_groupset'] = array();
			$objGroupset = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_groupset WHERE alias=?")->execute($objGroups->selector);
			
			// groupset does not exist anymore => remove group
			if($objGroupset->numRows < 1)
			{
				$arrPurge['tl_pct_customelement_group'] = array_merge($arrPurge['tl_pct_customelement_group'] ?: array(), array($objGroups->id));
				
				// fetch attributes in revised group
				$objAttributes = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE pid=?")->execute($objGroups->id);
				$arrPurge['tl_pct_customelement_attribute'] = array_merge($arrPurge['tl_pct_customelement_attribute'] ?: array(),$objAttributes->fetchEach('id'));
			}
		}
		
		if(count($arrPurge) < 1)
		{
			return;
		}
		
		$this->purge($arrPurge);
	}
	
		
	/**
	 * Purge the custom catalog tables from revised data
	 * called by revisedTable HOOK
	 */
	public function purgeCustomCatalogData()
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists('tl_pct_customcatalog'))
		{
			return;
		}
		
		$objCCs = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid NOT IN(SELECT id FROM tl_pct_customelement GROUP BY (id))")->execute();
		if($objCCs->numRows < 1)
		{
			return;
		}
		
		$arrPurge = array();
		while($objCCs->next())
		{
			$objCE = $objDatabase->prepare("SELECT * FROM tl_pct_customelement WHERE id=?")->execute($objCCs->pid);
			// all good, continue
			if($objCE->numRows > 0 || $objCE->id > 0)
			{
				continue;
			}
			
			$arrPurge['tl_pct_customcatalog'][] = $objCCs->id;
			
			// check for filtersets and filters
			$objFiltersets = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_filterset WHERE pid=?")->execute($objCCs->id);
			if($objFiltersets->numRows > 0)
			{
				$arrPurge['tl_pct_customelement_filterset'] = $arrPurge['tl_pct_customelement_filterset'] ?? array();
				
				$arrFiltersets = $objFiltersets->fetchEach('id');
				$arrPurge['tl_pct_customelement_filterset'] = array_merge($arrPurge['tl_pct_customelement_filterset'],$arrFiltersets);
				
				
				// filters
				$objFilters = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_filter WHERE pid IN(".implode(',',$arrFiltersets).")")->execute();
				if($objFilters->numRows > 0)
				{
					$arrPurge['tl_pct_customelement_filter'] = $arrPurge['tl_pct_customelement_filter'] ?? array();
					
					$arrPurge['tl_pct_customelement_filter'] = array_merge($arrPurge['tl_pct_customelement_filter'],$objFilters->fetchEach('id'));
				}
			}
			
			// delete the folder
			$strTable = $objCCs->mode == 'new' ? $objCCs->tableName : $objCCs->existingTable;
			$this->purgeFolders($strTable);
		}
		
		if(count($arrPurge) < 1)
		{
			return;
		}
		
		$this->purge($arrPurge);
	}
	
	
	/**
	 * Delete revised dca files from system/modules
	 */
	public function purgeFolders($strTable='')
	{
		if(strlen($strTable) > 0)
		{
			$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance();
			$objDcaHelper->deleteDcaFile($strTable);
			return;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists('tl_pct_customcatalog'))
		{
			return;
		}
		
		$objRevisedCCs = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid NOT IN(SELECT id FROM tl_pct_customelement GROUP BY (id))")->execute();
		
		if($objRevisedCCs->numRows > 0)
		{
			while($objRevisedCCs->next())
			{
				$strTable = $objRevisedCCs->tableName;
				if($objRevisedCCs->mode == 'existing' && $GLOBALS['PCT_CUSTOMCATALOG']['autoManageDcaFiles'] === true)
				{
					$strTable = $objRevisedCCs->existingTable;
				}
				
				$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance();
				$objDcaHelper->deleteDcaFile($strTable);
			}
		}
	}
	
	
	/**
	 * Run the deletation process
	 * @param array
	 */
	protected function purge($arrPurge)
	{
		if(count($arrPurge) < 1)
		{
			return;
		}
	
		$objDatabase = \Contao\Database::getInstance();
		#$this->log('PURGING CUSTOMCATALOGS...','', TL_CRON);
		
		foreach($arrPurge as $strTable => $arrIds)
		{
			if(count($arrIds) < 1)
			{
				continue;
			}
			
			if($GLOBALS['PCT_CUSTOMCATALOG']['debug'])
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('PURGING CUSTOMCATALOGS: DELETE FROM '.$strTable.' WHERE id IN('.implode(',', $arrIds).')');
			}
			
			$objDatabase->prepare("DELETE FROM ".$strTable." WHERE ".$objDatabase->findInSet('id',$arrIds))->execute();
		}
	}
	
	
	/**
	 * Add CustomCatalog items to the indexer
	 *
	 * @param array
	 * @param integer
	 * @param boolean
	 * @return array
	 * Pretty much do the same as the \Contao\News.php class
	 */
	public function getSearchablePages($arrPages, $intRoot=0, $blnIsSitemap=false)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$arrRoot = array();

		if ($intRoot > 0)
		{
			$arrRoot = $objDatabase->getChildRecords($intRoot, 'tl_page');
		}
		
		$arrUrls = array();
		$arrProcessed = array();
		
		$time = \Contao\Date::floorToMinute();
		
		// find all customcatalog list modules
		// hint: the hartLimit field is used as "hide in sitemap" indicator
		$objModules = $objDatabase->prepare("SELECT * FROM tl_module WHERE type=? AND customcatalog!='' AND customcatalog_jumpTo > 0 AND hardLimit!=1")->execute('customcataloglist');
		if($objModules->numRows < 1)
		{
			return $arrPages;
		}
		
		while($objModules->next())
		{
			$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findByModule($objModules);
			
			if( $objCC === null ) 
			{
				continue;
			}

			// alias or id
			$strAliasField = $objCC->getAliasField();
			if(strlen($strAliasField) < 1)
			{
				$strAliasField = 'id';
			}

			$strSitemapAttribute = $objCC->getSitemapField();
			// sitemap attribute: CC has an indivdual sitemap attribute
			if( strlen($strSitemapAttribute) > 0 )
			{
				$objEntries = $this->getCatalogEntriesByModule($objModules);
				
				if($objEntries !== null)
				{
					while($objEntries->next())
					{
						$objEntry = $objCC->findPublishedItemByIdOrAlias($objEntries->{$strAliasField});
						
						if($objEntry === null)
						{
							continue;
						}

						$strBase = \Contao\Environment::get('base');
						
						// @var object Get the related attribute
						$objSitemapAttribute = \PCT\CustomElements\Core\AttributeFactory::findById( $objCC->sitemapField );
						
						// generate the urls depending on the attribute type
						switch( $objSitemapAttribute->type )
						{
							case 'url':
							case 'text':
								$tmp = parse_url( \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace( $objEntry->{$strSitemapAttribute} ) );
								if( strlen($tmp['path']) < 1 )
								{
									break;
								}
								
								$alias = $GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'].'='.$objEntry->{$strAliasField};
								if( $tmp['query'] )
								{
									$tmp['query'] .= $alias;
								}
								else
								{
									$tmp['query'] = $alias;
								}
								$url = $tmp['path'].'?'.$tmp['query'];
								
								if(strlen(strpos($url, $strBase)) < 1)
								{
									$url = $strBase.$url;
								}
								
								$arrUrls[] = $url;
								unset($tmp);
								break;
							case 'pagetree': 
								$pages = \Contao\StringUtil::deserialize( $objEntry->{$strSitemapAttribute} );
								if( !is_array($pages) )
								{
									$pages = explode(',',$pages);
								}
								foreach($pages as $page)
								{
									$objParent = \Contao\PageModel::findWithDetails($page);
									
									if (!$objParent->published || ($objParent->start != '' && $objParent->start > $time) || ($objParent->stop != '' && $objParent->stop <= ($time + 60)))
									{
										continue;
									}
									
									if ($blnIsSitemap && $objParent->sitemap == 'map_never')
									{
										continue;
									}
									
									if($objParent->noSearch)
									{
										continue;
									}

									// check root page
									$objRoot = \Contao\PageModel::findWithDetails( $objParent->rootId );
									if (!$objRoot->published || ($objRoot->start != '' && $objRoot->start > $time) || ($objRoot->stop != '' && $objRoot->stop <= ($time + 60)))
									{
										continue;
									}

									$objEntry = $objCC->findPublishedItemByIdOrAlias($objEntries->{$strAliasField},$objParent->language);
									if( $objEntry === null )
									{
										continue;
									}

									$url = $objCC->generateDetailsUrl($objEntry,$objParent);
									if(strlen(strpos($url, $strBase)) < 1)
									{
										$url = $strBase.$url;
									}
									
									$arrUrls[] = $url;
								}
								break;
						}
					}
				}
			}
			// regular reader page
			else 
			{
				$intJumpTo = $objModules->customcatalog_jumpTo;
				
				// Skip links outside the root nodes
				if (!empty($arrRoot) && !in_array($intJumpTo, $arrRoot))
				{
					continue;
				}
				
				// generate the url
				if (!isset($arrProcessed[$intJumpTo]))
				{
					$objParent = \Contao\PageModel::findWithDetails($intJumpTo);
					
					if(!$objParent)
					{
						continue;
					}

					if ($blnIsSitemap && $objParent->sitemap == 'map_never')
					{
						continue;
					}
					
					if($objParent->noSearch)
					{
						continue;
					}

					// check root page
					$objRoot = \Contao\PageModel::findWithDetails( $objParent->rootId );
					if (!$objRoot->published || ($objRoot->start != '' && $objRoot->start > $time) || ($objRoot->stop != '' && $objRoot->stop <= ($time + 60)))
					{
						continue;
					}
					
					// generate the url
					$feUrl = $objParent->getAbsoluteUrl(\Contao\Config::get('useAutoItem') ? '/%s' : '/'.$GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'].'/%s');
					
					$base = ( $objParent->domain ?: \Contao\Environment::get('base') ) . \Contao\Environment::get('path');
					
					$arrProcessed[$intJumpTo] = array
					(
						#'base'		=> (($objParent->rootUseSSL ? 'https://' : 'http://') . ($objParent->domain ?: \Contao\Environment::get('base')) . \Contao\Environment::get('path') ),
						'base'		=> $base,
						
						'url' 		=> $feUrl,
						'language'	=> $objParent->language,
						'pageModel'	=> $objParent,
					);
				}
				
				$strBase = $arrProcessed[$intJumpTo]['base'];
				$strUrl = $arrProcessed[$intJumpTo]['url'];
				$strLanguage = $arrProcessed[$intJumpTo]['language'];
				$objJumpTo = $arrProcessed[$intJumpTo]['pageModel'];
				$objEntries = $this->getCatalogEntriesByModule($objModules);
				
				if($objEntries !== null)
				{
					while($objEntries->next())
					{
						$objEntry = $objCC->findPublishedItemByIdOrAlias($objEntries->{$strAliasField},$strLanguage);
						
						if($objEntry === null)
						{
							continue;
						}
						
						$url = $objCC->generateDetailsUrl($objEntry,$objJumpTo);
						
						if(strlen(strpos($url, $strBase)) < 1)
						{
							$url = $strBase. \ltrim($url,'/');
						}
						
						// collect urls
						$arrUrls[] = $url;
					}
				}
			}

			// HOOK: getSearchablePages
			$arrUrls = Hooks::callstatic('getSearchablePagesHook',array($arrUrls,$objCC,$arrPages,$intRoot,$blnIsSitemap));;
		}
		
		// protect array
		if( !is_array($arrUrls) )
		{
			$arrUrls = array();
		}

		$arrUrls = array_unique( array_filter($arrUrls) );
		
		foreach($arrUrls as $url)
		{
			// skip urls that has been added before
			if(in_array($url, $arrPages) || strlen($url) < 1)
			{
				continue;
			}
			// add url to index
			$arrPages[] = $url;
		}
		
		return $arrPages;
	}
	

	/**	
	 * Fetch CatalogEntries by a model record
	 * @param object	DatabaseResult||Model||StdClass
	 * @return object 	DatabaseResult
	 */
	protected function getCatalogEntriesByModule($objModule)
	{
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findByModule($objModule);
		
		if( $objCC === null )
		{
			return null;
		}

		$objParent = \Contao\PageModel::findWithDetails($objModule->customcatalog_jumpTo);
		$strLanguage = $objParent->language;

		// respect all entries
		$objModule->customcatalog_filter_showAll = true;
		$objCC->setOrigin($objModule);
		
		// apply language filter
		if($objModule->customcatalog_filter_actLang && strlen($strLanguage) > 0 && $objCC->multilanguage)
		{
			$objLanguageFilter = new \PCT\CustomElements\Filters\LanguageSwitch();
			$objLanguageFilter->setOrigin($objCC);
			$objLanguageFilter->setTable( $objCC->getTable() );
			$objLanguageFilter->setLanguage(str_replace('-','_',$strLanguage));
			$objLanguageFilter->filterActiveLanguage = true;
			$objCC->addFilter($objLanguageFilter);
		}

		// add a dynamic filter for the custom where clause
		if(strlen($objModule->customcatalog_sqlWhere) > 0)
		{
			$objWhereFilter = new \PCT\CustomElements\Filters\SimpleFilter();
			$options = array
			(
				'column'	=> 'id',
				'where'		=> trim( \PCT\CustomElements\Plugins\CustomCatalog\Core\InsertTags::getInstance()->replaceCustomCatalogInsertTags( \Contao\StringUtil::decodeEntities($objModule->customcatalog_sqlWhere) ,$objCC) ),
			);
			$objWhereFilter->setOptions($options);
			$objCC->addFilter($objWhereFilter);
		}
		
		// fetch entries
		return $objCC->prepare();
	}


	/**
	 * Delete customcatalog system/modules folders ondelete
	 * @called from ondelete callbacks
	 */
	public function deleteSystemFolder($objDC,$intUndo)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance();
		
		$objCCs = null;
		if($objDC->table == 'tl_pct_customelement')
		{
			$objCCs = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid=?")->execute($objDC->id);
		}
		
		if($objCCs->numRows < 1)
		{
			return;
		}
		
		while($objCCs->next())
		{
			$strTable = $objCCs->tableName;
			if($objDC->mode == 'existing' && $GLOBALS['PCT_CUSTOMCATALOG']['autoManageDcaFiles'] === true)
			{
				$strTable = $objCCs->existingTable;
			}	
			$objDcaHelper->deleteDcaFile($strTable);
		}
	}


	/**
	 * Purge JSON-Cache
	 */
	public function purgeFileCacheJob()
	{
		static::purgeFileCache();
		
		if(\Contao\Input::get('key') == 'purgeFileCache')
		{
			$objSession = System::getContainer()->get('request_stack')->getSession();

			$objSession->set('PCT_CUSTOMELEMENTS_MESSAGE','Purged CustomCatalog DCA cache');
				
			// redirect to referer
			$this->redirect($this->getReferer());
		}
	}


	/**
	 * Purge the DCA file / files
	 * @param object||null DataContainer or StdClass
	 */
	public static function purgeFileCache($objDC=null)
	{
		if( Controller::isBackend() )
		{
			return;
		}

		if( $objDC === null || !isset($objDC->table) )
		{
			return;
		}

		$objDatabase = \Contao\Database::getInstance();

		#$strEnvironemnt = 'prod';
		#$strCacheFolder = 'system/cache/dca';
		$strEnvironemnt = \Contao\System::getContainer()->getParameter('kernel.environment');
		$strCacheFolder = 'var/cache';
		$strCacheFolder .= '/'.$strEnvironemnt.'/cc_dca';
		
		$arrPurge = array();
		// fetch CC ids by tables
		switch ($objDC->table) 
		{
			case 'tl_pct_customcatalog':
				$arrPurge = array_merge($arrPurge,array( $objDC->id ));
				break;
			case 'tl_pct_customelement':
				$objResult = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid=?")->execute($objDC->id);
				$arrPurge = array_merge($arrPurge,$objResult->fetchEach('id'));
				break;
			case 'tl_pct_customelement_group':
				$objResult = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid=( SELECT id FROM tl_pct_customelement WHERE id=( SELECT pid FROM tl_pct_customelement_group WHERE id=? ) )")->execute($objDC->id);
				$arrPurge = array_merge($arrPurge,$objResult->fetchEach('id'));
				break;
			case 'tl_pct_customelement_attribute':
				$objResult = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid=( SELECT id FROM tl_pct_customelement WHERE id=( SELECT pid FROM tl_pct_customelement_group WHERE id=( SELECT pid FROM tl_pct_customelement_attribute WHERE id=? ) ) )")->execute($objDC->id);
				$arrPurge = array_merge($arrPurge,$objResult->fetchEach('id'));
				break;
			default:
				// single CC id
				if( empty($objDC->id) === false )
				{
					$arrPurge[] = $objDC->id;
				}
				break;
		}

		$arrPurge = array_unique( array_filter($arrPurge) );

		if( empty($arrPurge) === false )
		{
			foreach($arrPurge as $i => $id)
			{
				if( \file_exists(Controller::rootDir().'/'.$strCacheFolder.'/id_'.$id.'.json') )
				{
					\Contao\Files::getInstance()->delete($strCacheFolder.'/id_'.$id.'.json');
					unset( $arrPurge[$i] );
				}
			}

			// log
			if( $GLOBALS['PCT_CUSTOMCATALOG']['debug'] )
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('Purged CustomCatalog DCA cache ['.implode(', ', $arrPurge).']');
			}
		}
		else 
		{
			// purge the whole folder
			if( \is_dir(Controller::rootDir().'/'.$strCacheFolder) )
			{
				\Contao\Files::getInstance()->rrdir($strCacheFolder, true);	
			
				// log
				if( $GLOBALS['PCT_CUSTOMCATALOG']['debug'] )
				{
					\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('Purged CustomCatalog DCA cache');
				}
			}
		}
	}
}