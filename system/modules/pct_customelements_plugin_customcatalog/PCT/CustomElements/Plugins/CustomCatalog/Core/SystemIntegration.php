<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Imports
 */

use Contao\Config;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Files;
use Contao\StringUtil;
use Contao\System;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks as Hooks;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;
use PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper as DCAHelper;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory as AttributeFactory;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage;

/**
 * Class
 * SystemIntegration
 */
class SystemIntegration extends \Contao\System
{
	/**
	 * Import the user object
	 */
	public function __construct()
	{
		parent::__construct();

		// disable the json dca file when updating the database
		if(\Contao\Environment::get('isAjaxRequest') || \Contao\Input::get('update') == 'database' || static::isInstallTool())
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'] = true;
		}

		// overwrite CustomCatalog Globals through Contao config

		if( Config::get('customcatalog_list_baseRecordIsFallback') !== null )
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['LIST']['baseRecordIsFallback'] = Config::get('customcatalog_list_baseRecordIsFallback');
		}

		if( Config::get('customcatalog_reader_baseRecordIsFallback') !== null )
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['READER']['baseRecordIsFallback'] = Config::get('customcatalog_reader_baseRecordIsFallback');
		}
		
		if( Config::get('customcatalog_showEmptyResults') !== null )
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['showEmptyResults'] = Config::get('customcatalog_showEmptyResults');
		}
		
		// set the reserved words global
		if(is_array($GLOBALS['PCT_CUSTOMCATALOG']['reservedWords']))
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['reservedWords'] = array_unique( array_merge($GLOBALS['PCT_CUSTOMCATALOG']['reservedWords'],static::getReservedWords()) );
		}

		// set the system modules folder logic
		if($GLOBALS['PCT_CUSTOMCATALOG']['folderLogic'] === null)
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['folderLogic'] = 'pct_customcatalog_%s';
		}

		// disable DCA cache
		if( (boolean)\Contao\Config::get('customcatalog_bypassDCACache') === true )
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] = true;
		}
		
		// bypass DCA cache on ajax request like reloads
		if( \Contao\Environment::get('isAjaxRequest') )
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] = true;
		}
	}


	/**
	 * Write globals
	 */
	public static function writeGlobals()
	{
		$objCCs = CustomCatalogFactory::findAllActive();
		if($objCCs === null)
		{
			return;
		}
		
		$objDatabase = \Contao\Database::getInstance();

		foreach($objCCs as $objCC)
		{
			// tablename
			$strTable = ($objCC->mode == 'new' ? $objCC->tableName : $objCC->existingTable);
			if( !$objDatabase->tableExists($strTable) )
			{
				continue;
			}
			
			$strAlias = static::getBackendModuleAlias($objCC->id);

			// store the active custom catalogs with their alias for further use
			$GLOBALS['PCT_CUSTOMCATALOG']['active_modules'][] = $strAlias;
			$GLOBALS['PCT_CUSTOMCATALOG']['tables'][] = $strTable;
			$GLOBALS['PCT_CUSTOMCATALOG']['configs'][] = array('id'=>$objCC->id,'table'=>$strTable,'alias'=>$strAlias);
		}
	}


// ! System integration


	/**
	 * Run function on system initialization
	 * @param integer Load a specific CustomCatalog config
	 */
	public function initSystem($intConfig = 0)
	{
		// check if module is running and is activated and if database is up to date
		if(static::isReady() === false)
		{
			return;
		}
		
		// load language files in backend
		static::loadLanguageFiles();
		
		$blnInstallTool = static::isInstallTool();
		$blnDatabaseUpdate = static::isDatabaseUpdate();
		$blnBackend = static::isBackend();
		
		// nothing to do when not in backend and not running the install tool and not loaded directly
		if( Controller::isBackend() && !$blnBackend && !$blnInstallTool && $intConfig < 1)
		{
			return;
		}
		
		if(version_compare(PCT_CUSTOMELEMENTS_VERSION,PCT_CUSTOMCATALOG_REQ_CE,'<'))
		{
			// add a backend message
			$this->loadLanguageFile('exception');
			$GLOBALS['PCT_CUSTOMELEMENTS']['MESSAGES']['error'][] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['XPT']['customelements_version_too_low'],PCT_CUSTOMCATALOG_VERSION,PCT_CUSTOMCATALOG_REQ_CE,PCT_CUSTOMELEMENTS_VERSION);
			return;
		}

		// set globals
		static::writeGlobals();
		
		$objCCs = array();
		// all CCs for database update
		if($blnDatabaseUpdate || $blnInstallTool)
		{
			$objCCs = CustomCatalogFactory::findAllActive();
		}
		// find CC by id
		else if($intConfig > 0)
		{
			$objCCs[] = CustomCatalogFactory::findById($intConfig);
		}
		// find CC by do parameter
		else if($intConfig < 1 && \Contao\Input::get('do') != '' && !$blnDatabaseUpdate)
		{
			$objCCs[] = CustomCatalogFactory::findCurrent( \Contao\Input::get('do') );
		
			if(\Contao\Input::get('table') != '')
			{
				if((int)\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['urlChildConfigParameter']) > 0)
				{
					$objCCs[] = CustomCatalogFactory::findById( \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['urlChildConfigParameter']) );
				}
				else
				{
					$objCCs[] = CustomCatalogFactory::findByTableName( \Contao\Input::get('table') );
				}
			}
		}
		
		$objCCs = array_filter($objCCs);
		
		// return if there is nothing to do
		if($objCCs === null || count($objCCs) < 1)
		{
			return;
		}

		// return if no Backend User is logged in and we are not in the install tool
		//if( Controller::isBackend() && !$blnInstallTool && $intConfig < 1)
		//{
		//	return;
		//}
		
		// bypass cache in install tool
		if( $blnInstallTool || $blnDatabaseUpdate )
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] = true;
		}
		
		
		// environemnt
		$rootDir = Controller::rootDir();
		$objContainer = \Contao\System::getContainer();
		$strEnvironemnt = $objContainer->getParameter('kernel.environment');
		$strCacheFolder = 'var/cache';
		$strCacheFolder .= '/'.$strEnvironemnt.'/cc_dca';
				
		// create DCA
		foreach($objCCs as $objCC)
		{
			$intTimeStart = microtime(true);
		
			$strTable = $objCC->getTable();
			
			// fill the cache
			if(!$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'])
			{
				static::fillCache($objCC->id);
			}

			$strDCA_CacheFile = $strCacheFolder.'/id_'.$objCC->id.'.json';
			$blnRefreshDCA = false;
			
			// read DCA from cache
			if( file_exists(Controller::rootDir().'/'.$strDCA_CacheFile) === true && (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] === false && $objCC->mode != 'existing')
			{
				$GLOBALS['TL_DCA'][$strTable] = json_decode(file_get_contents(Controller::rootDir().'/'.$strDCA_CacheFile), true);
				if( \is_array($GLOBALS['TL_DCA'][$strTable]) === false )
				{
					$blnRefreshDCA = true;
				}
				else
				{
					// flag as cached DCA
					$GLOBALS['TL_DCA'][$strTable]['cacheFile'] = $strDCA_CacheFile;
				}
			}
			else
			{
				$blnRefreshDCA = true;
			}

			// backend filters should always be processed live
			if( \Contao\Input::post('FORM_SUBMIT') == 'tl_filters' || \Contao\Input::post('language') != '' )
			{
				$blnRefreshDCA = true;
			}
			// language has been changed
			if( $objCC->multilanguage )
			{
				$strLangugae = Multilanguage::getActiveBackendLanguage($strTable);
				if( isset($GLOBALS['TL_DCA'][$strTable]['CC_LANGUAGE']) && $GLOBALS['TL_DCA'][$strTable]['CC_LANGUAGE'] != $strLangugae || empty($strLangugae) )
				{
					$blnRefreshDCA = true;
				}
			}
			// CC is in extende mode
			if( $objCC->mode == 'existing' )
			{
				$blnRefreshDCA = true;
			}
			
			// refresh the DCA
			if( $blnRefreshDCA == true )
			{
				// clear cache
				if( (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] === false )
				{
					// purge existing cache file
					\PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance::purgeFileCache($objCC);
					
					// reset any old DCA information
					if( empty($GLOBALS['TL_DCA'][$strTable]['cacheFile']) === false )
					{
						unset( $GLOBALS['TL_DCA'][$strTable] );
					}
				}

				// create DCA
				static::createDCA($objCC->id);
			}

			if( !isset($GLOBALS['TL_DCA'][$strTable]) )
			{
				System::getContainer()->get('monolog.logger.contao.error')->info('No DCA information found for table:'.$strTable);
				return;
			}
			
			$arrDCA = $GLOBALS['TL_DCA'][$strTable];
			
			//! remove contao dca cache file
			if( $blnRefreshDCA === true )
			{
				#Files::getInstance()->rrdir('var/cache/prod/contao', true);
				// clear contao dca cache file
				foreach(array('dev','prod') as $env)
				{
					if( \file_exists($rootDir.'/var/cache/'.$env.'/contao/dca/'.$strTable.'.php') )
					{
						Files::getInstance()->delete('/var/cache/'.$env.'/contao/dca/'.$strTable.'.php');
					}
				}
			}

			//! create new cache file
			if( $blnRefreshDCA === true || (file_exists(Controller::rootDir().'/'.$strDCA_CacheFile) === false && ( isset($GLOBALS['TL_DCA'][$strTable]) && \is_array($GLOBALS['TL_DCA'][$strTable]) && isset($GLOBALS['TL_DCA'][$strTable]['config']) ) && (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] === false) )
			{
				$objFile = new \Contao\File($strDCA_CacheFile,true);
				$strContent = json_encode( $arrDCA );
				$objFile->write($strContent);
				$objFile->close();

				// log processing time
				if( (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['debug'] === true )
				{
					\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('DCA ['.$strTable.'] cache file created: ' . $strDCA_CacheFile);
				}
				unset($objFile);
			}
			
			// TODO:: Caching here?
			
			//! create DCA file
			$strDCA_file = 'system/modules/'.sprintf($GLOBALS['PCT_CUSTOMCATALOG']['folderLogic'],$strTable).'/dca/'.$strTable.'.php';
			$objFile = new \Contao\File($strDCA_file,true);
			$strContent = '';
			if( $objCC->mode == 'new' )
			{
				$strContent = "<?php \n // CustomCatalog (id=$objCC->id) DCA for table [".$strTable."]\n";
				$strContent .= sprintf("\$GLOBALS['TL_DCA']['%s'] = ",$strTable).var_export($arrDCA,true).';';
			}
			else if( $objCC->mode == 'existing' )
			{
				// create dca file for existing tables	
				$arrContent = array();
				
				// default fields
				$arrDefaultDca = DCAHelper::getDefaultDataContainerArray();
				if( isset($arrDefaultDca['fields']) && is_array($arrDefaultDca['fields']) )
				{
					// index
					// sql index
					foreach( array_keys($arrDefaultDca['fields']) as $alias )
					{
						// no index field
						if( !isset($arrDefaultDca['config']['sql']['keys'][$alias]) )
						{
							continue;
						}

						if( !isset($arrDCA['config']['sql']['keys'][$alias]) )
						{
							$arrDCA['config']['sql']['keys'][$alias] = $arrDefaultDca['config']['sql']['keys'][$alias];
						}

						if( isset($arrDefaultDca['config']['sql']['keys'][$alias]) && !empty($arrDefaultDca['config']['sql']['keys'][$alias]) )
						{
							$arrContent[] = sprintf("\$GLOBALS['TL_DCA']['%s']['config']['sql']['keys']['%s'] = ".'"%s"',$strTable,$alias,$arrDCA['config']['sql']['keys'][$alias]).";";
						}
					}
						
					//field sqls
					foreach( array_keys($arrDefaultDca['fields']) as $alias )
					{
						if( !isset($arrDCA['fields'][$alias]['sql']) )
						{
							$arrDCA['fields'][$alias]['sql'] = $arrDefaultDca['fields'][$alias]['sql'];
						}
						
						$arrContent[] = sprintf("\$GLOBALS['TL_DCA']['%s']['fields']['%s']['sql'] = ".'"%s"',$strTable,$alias,$arrDCA['fields'][$alias]['sql']).";";
					}
				}
					
				$objAttributes = AttributeFactory::fetchAllByCustomCatalog( $objCC->id );
				if( $objAttributes !== null )
				{
					while($objAttributes->next())
					{
						$alias = $objAttributes->alias;
						if( !isset($arrDCA['fields'][$alias]) || empty($arrDCA['fields'][$alias]['sql']) )
						{
							continue;
						}
						$arrContent[] = sprintf("\$GLOBALS['TL_DCA']['%s']['fields']['%s']['sql'] = ".'"%s"',$strTable,$alias,$arrDCA['fields'][$alias]['sql']).";";
					}
				}
					
				if( !empty($arrContent) )
				{
					$strContent = "<?php \n // CustomCatalog (id=$objCC->id) DCA for extending table [".$strTable."]\n";
					$strContent = str_replace("\t", "", $strContent);
					$strContent .= implode("\n", $arrContent);
				}			
			}
			// write file content
			$objFile->write( $strContent );
			$objFile->close();
			
			if( (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['debug'] === true )
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('DCA file ('.$strDCA_file.') created for CustomCatalog table '.$strTable);
			}
			unset($objFile);
			
			// log processing time
			if( (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['debug'] === true )
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('DCA ['.$strTable.'] processing time: ' . number_format( (microtime(true) - $intTimeStart),'6') .'s'.($blnRefreshDCA === true ? ' (build cache)' : ' (cached)'));
			}
		}
		
		//!--- Post-SYSTEM initialization
		// Do work that require all customcatalog DCAs created
		$arrLoadDataContainers = array();
		$objDatabase = \Contao\Database::getInstance();
		$objUser = \Contao\BackendUser::getInstance();
		$strProjectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		
		foreach($objCCs as $objCC)
		{
			$strTable= $objCC->getTable();
			$strPtable = $objCC->get('pTable');

			if( !isset($GLOBALS['TL_DCA'][$strTable]) || !is_array($GLOBALS['TL_DCA'][$strTable]))
			{
				continue;
			}

			// BE_CHILDS: dynamic parent table and childs
			if( isset($GLOBALS['TL_DCA'][$strTable]['BE_CHILDS']) && \is_array($GLOBALS['TL_DCA'][$strTable]['BE_CHILDS']) && empty($GLOBALS['TL_DCA'][$strTable]['BE_CHILDS']) === false )
			{
				foreach($GLOBALS['TL_DCA'][$strTable]['BE_CHILDS'] as $t)
				{
					\Contao\Controller::loadDataContainer($t);
					$GLOBALS['TL_DCA'][$t]['config']['ptable'] = $strTable;
				}
			}

			// BE_ATTRIBUTES
			if( Controller::isBackend() && isset($GLOBALS['TL_DCA'][$strTable]['BE_ATTRIBUTES']) && \is_array($GLOBALS['TL_DCA'][$strTable]['BE_ATTRIBUTES']) && empty($GLOBALS['TL_DCA'][$strTable]['BE_ATTRIBUTES']) === false )
			{
				foreach($GLOBALS['TL_DCA'][$strTable]['BE_ATTRIBUTES'] as $intAttribute)
				{
					// @var object
					$objCE = CustomElementFactory::findById( $objCC->get('pid') );
				
					// @var object
					$objAttribute = AttributeFactory::findById( $intAttribute );
					if( $objAttribute === null )
					{
						continue;
					}
					else if( !isset($GLOBALS['TL_DCA'][$strTable]['fields'][$objAttribute->alias]) )
					{
						continue;
					}
					
					$arrFieldDef = $GLOBALS['TL_DCA'][$strTable]['fields'][$objAttribute->alias];
					
					// field definition
					$arrData = array
					(
						'id'  => $objAttribute->get('id'),
						'name'  => $objAttribute->alias,
						'type'  => $objAttribute->get('type'),
						'fieldDef'  => $arrFieldDef,
					);
					
					// HOOK: modify the field definition array
					Hooks::callstatic('prepareFieldHook',array($arrData,$objAttribute->alias,$objAttribute,$objCC,$objCE,new static()));
				}
			}


			// BE_FILTERS
			if( Controller::isBackend() && isset($GLOBALS['TL_DCA'][$strTable]['BE_FILTERS']) && \is_array($GLOBALS['TL_DCA'][$strTable]['BE_FILTERS']) && empty($GLOBALS['TL_DCA'][$strTable]['BE_FILTERS']) === false )
			{
				$arrFilters = array();
				foreach($GLOBALS['TL_DCA'][$strTable]['BE_FILTERS'] as $intAttribute)
				{
					$objAttribute = AttributeFactory::findById( $intAttribute );
					if( $objAttribute === null )
					{
						continue;
					}
					
					// @var object
					$objCE = CustomElementFactory::findById( $objCC->get('pid') );
			
					// set origins
					$objAttribute->set('objCustomElement',$objCE);
					$objAttribute->set('objCustomCatalog',$objCC);
					$objOrigin = new \PCT\CustomElements\Core\Origin;
					$objOrigin->setTable( $strTable );
					$objAttribute->set('objOrigin',$objOrigin);
					
					// support custom filtering
					if($objAttribute->get('be_filter') && method_exists($objAttribute, 'getBackendFilterOptions') && $objDatabase->tableExists($strTable) && !$blnInstallTool )
					{
						$fieldName = $objAttribute->get('alias');
						$arrData = $objAttribute->getFieldDefinition();
						if( $objDatabase->fieldExists($fieldName,$strTable) )
						{
							$arrFilters[ $fieldName ] = $objAttribute->getBackendFilterOptions($arrData,$fieldName,$objAttribute,$objCC,$objCE,new static());
						}
					}
				}
				
				$arrFilters = array_filter($arrFilters,'count');
				if( empty($arrFilters) === false )
				{
					if( !isset($GLOBALS['TL_DCA'][$strTable]['list']['sorting']['filter']) || \is_array($GLOBALS['TL_DCA'][$strTable]['list']['sorting']['filter']) === false )
					{
						$GLOBALS['TL_DCA'][$strTable]['list']['sorting']['filter'] = array();
					}
					$GLOBALS['TL_DCA'][$strTable]['list']['sorting']['filter'] = array_merge($GLOBALS['TL_DCA'][$strTable]['list']['sorting']['filter'],$arrFilters);
				}
			}
			
			// custom limit, offset filtering in mode 5,5.1
			if( Controller::isBackend() && \in_array($objCC->get('list_mode'), array(5, 5.1)) )
			{
				$arrSession = System::getContainer()->get('request_stack')->getSession()->getBag('contao_backend');
				if( isset($arrSession['filter'][$strTable]['limit']) && !empty($arrSession['filter'][$strTable]['limit']) && $arrSession['filter'][$strTable]['limit'] != 'all' )
				{
					$tmp = \explode(',',$arrSession['filter'][$strTable]['limit']);
					if( !isset($tmp[1]) )
					{
						$tmp[1] = null;
					}
					$intRows = Config::get('resultsPerPage');
					$intOffset = $tmp[1];
					$objResult = $objDatabase->prepare("SELECT id FROM ".$strTable)->limit($intRows,$intOffset)->query();
					if( $objResult->numRows > 0 )
					{
						$GLOBALS['TL_DCA'][$strTable]['list']['sorting']['filter'][] = array('FIND_IN_SET(id,?)',implode(',',\array_unique( $objResult->fetchEach('id') )));
					}
				}
			}
	
			// BE SUBPALETTES
			if( isset($GLOBALS['TL_DCA'][$strTable]['BE_SUBPALETTES']) && \is_array($GLOBALS['TL_DCA'][$strTable]['BE_SUBPALETTES']) && empty($arrDCA['BE_SUBPALETTES']) === false )
			{
				$GLOBALS['TL_DCA'][$strTable]['subpalettes'] = $GLOBALS['TL_DCA'][$strTable]['BE_SUBPALETTES']['fields'];
				$GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__'] = $GLOBALS['TL_DCA'][$strTable]['BE_SUBPALETTES']['selector'];
			}
		
			// Default Button lables
			$GLOBALS['TL_LANG'][$strTable]['new']  = isset($GLOBALS['TL_LANG'][$strTable]['new']) ? $GLOBALS['TL_LANG'][$strTable]['new'] : $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['new'];
			$GLOBALS['TL_LANG'][$strTable]['edit']  = isset($GLOBALS['TL_LANG'][$strTable]['edit']) ? $GLOBALS['TL_LANG'][$strTable]['edit'] : $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['edit'];
			// global operations
			$GLOBALS['TL_DCA'][$strTable]['list']['global_operations']['all']['label'] = $GLOBALS['TL_LANG']['MSC']['all'];
			
			$edit_config = array
			(
					'label'  => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['edit_config'],
					'href'  => 'do=pct_customelements&amp;table=tl_pct_customcatalog&amp;id='.$objCC->get('id').'&amp;act=edit',
					'class'  => 'header_edit_config',
					'attributes'=> 'onclick="Backend.getScrollOffset();" accesskey="e"',
			);
			$GLOBALS['TL_DCA'][$strTable]['list']['global_operations']['edit_config'] = $edit_config;

			$objSecurity = \Contao\System::getContainer()->get('security.helper');
			// remove without permission	
			if( Controller::isBackend() && static::isBackend() === false && static::isInstallTool() === false && ( $objUser === null || !$objUser->isAdmin || !$objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) )
			{
				unset($GLOBALS['TL_DCA'][$strTable]['list']['global_operations']['edit_config']);
			}
			
			// language references
			if( isset($GLOBALS['TL_DCA'][$strTable]['TL_LANG']) && \is_array($GLOBALS['TL_DCA'][$strTable]['TL_LANG']) && empty($GLOBALS['TL_DCA'][$strTable]['TL_LANG']) === false )
			{
				$GLOBALS['TL_LANG'][$strTable] = array_merge($GLOBALS['TL_LANG'][$strTable], $GLOBALS['TL_DCA'][$strTable]['TL_LANG']);
			}

			// palette translations
			if( isset($GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTable]['palettes']) && \is_array($GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTable]['palettes']) && empty($GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTable]['palettes']) === false )
			{
				foreach($GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTable]['palettes'] as $strGroupAlias => $strGroupTitle)
				{
					$GLOBALS['TL_LANG'][$strTable][$strGroupAlias.'_legend'] = $strGroupTitle;
				}
			}

			// wizards, xlabels, laben translations
			foreach($GLOBALS['TL_DCA'][$strTable]['fields'] ?? array() as $strField => $arrField)
			{
				if( isset($arrField['xlabel']) && \is_array($arrField['xlabel']) )
				{
					$arrLoadDataContainers[] = $arrField['xlabel'][0][0];
				}
				if( isset($arrField['wizard']) && \is_array($arrField['wizard']) )
				{
					$arrLoadDataContainers[] = $arrField['wizard'][0][0];
				}
				// label translations
				if( isset($GLOBALS['TL_LANG'][$strTable][$strField]) && \is_array($GLOBALS['TL_LANG'][$strTable][$strField]) )
				{
					$GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['label'] = $GLOBALS['TL_LANG'][$strTable][$strField];
				}
				// set reference
				if ( !isset($arrField['reference']) && (isset($arrField['options']) || isset($arrField['options_callback'])) )
				{
					$GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['reference'] = $GLOBALS['TL_LANG'][$strTable][$strField] ?? array();
				}
			}

			// reformat the parent labels in mode 6
			if(in_array($objCC->get('list_mode'), array(6) ) && strlen($strPtable) > 0 && \Contao\Input::get('table') == $strTable)
			{
				$objParentCC = CustomCatalogFactory::findByTableName($strPtable);
				if($objParentCC && isset($GLOBALS['TL_DCA'][$strPtable]))
				{
					$arrFields = StringUtil::deserialize($objCC->get('list_headerFields'));
					if(!empty($arrFields) && is_array($arrFields))
					{
						$GLOBALS['TL_DCA'][$strPtable]['list']['label']['fields'] = $arrFields;
						$GLOBALS['TL_DCA'][$strPtable]['list']['label']['format'] = substr( str_repeat('%s,', count($arrFields)), 0,-1 );
						unset($GLOBALS['TL_DCA'][$strPtable]['list']['label']['label_callback']);
					}
				}
			}

			// kickstart dca files
			if ( file_exists($strProjectDir. '/contao/dca/'.$strTable.'.php') === true )
			{
				include $strProjectDir. '/contao/dca/'.$strTable.'.php';
			}
		}

		// load required data containers
		foreach( array_filter(array_unique($arrLoadDataContainers)) as $table)
		{
			\Contao\Controller::loadDataContainer($table);
		}
		
		// kickstart dcaconfig.php 
		if (file_exists($strProjectDir. '/system/config/dcaconfig.php'))
		{
			include $strProjectDir . '/system/config/dcaconfig.php';
		}
	}


// !-- DCA Integration


	/**
	 * Create the DCA array by a CC config ID
	 * @param integer Id of the CC config
	 */
	public static function createDCA($intConfig)
	{
		// create the CE and CC object
		$objCC = CustomCatalogFactory::findById($intConfig);
		if( $objCC === null )
		{
			return;
		}
		
		$objCE = CustomElementFactory::findById($objCC->pid);
		if($objCC === null || $objCE === null)
		{
			return;
		}

		$blnInstallTool = static::isInstallTool();
		$blnDatabaseUpdate = static::isDatabaseUpdate();
		$blnHasChilds = false;
		$blnIsChild = false;

		$objDcaHelper = DCAHelper::getInstance();
		$objDatabase = \Contao\Database::getInstance();
		$objUser = \Contao\BackendUser::getInstance();
				
		// mode
		$strMode = $objCC->get('mode');

		// table name
		$strTableName = $objCC->getTable();
		
		if( empty($strTableName) )
		{
			return;
		}
		
		// load the language file
		\Contao\System::loadLanguageFile($strTableName);
		
		$strTitle = $objCC->get('title');
		if(!$objCC->get('useTitleAsName'))
		{
			$strTitle = $objCE->get('title');
		}

		// if there are more than one configuration per customelement append the id of the configuration
		$strAlias = static::getBackendModuleAlias($objCC->id);
		
		if(strlen($objCC->get('pTable')) > 0)
		{
			$blnIsChild = true;
		}

		// get tables, bypass caching when a child table configuration is found by
		$arrTables = static::getAccessibleTables($objCC->id,true);
		
		// automatically add the child tables to the accible tables (makes it easier for the user)
		
		$arrChilds = array();
		if($objCC->get('cTables'))
		{
			$arrChilds = static::getChildTables($objCC->id);
			$blnHasChilds = true;
		}

		//-- Prepare the data container DCA array
		$arrDCA = array();
		
		// load the DCA for managed existing tables first
		if($objCC->get('isManageable') && $objCC->get('mode') == 'existing')
		{
			\Contao\Controller::loadDataContainer($strTableName);	
		}
		
		// use existing DCAs. e.g. from a dca file
		if(isset($GLOBALS['TL_DCA'][$strTableName]) && is_array($GLOBALS['TL_DCA'][$strTableName]))
		{
			$arrDCA = $GLOBALS['TL_DCA'][$strTableName];
			// check that the DCA array fits the minimum requirements then return it
			$arrDCA = DcaHelper::checkDataContainerArrayAgainstDefault($arrDCA);
			
		}
		else
		{
			// get the default datacontainer array
			$arrDCA = DcaHelper::getDefaultDataContainerArray();
		}

		// add the switchToEdit Option if CC has child tables
		if($blnHasChilds && !isset($arrDCA['config']['switchToEdit']))
		{
			$arrDCA['config']['switchToEdit'] = true;
		}

		// !handle existing dynamic parent tables
		if($strMode == 'existing')
		{
			if (!isset($GLOBALS['loadDataContainer'][$strTableName]))
			{
				$GLOBALS['PCT_CUSTOMCATALOG']['loadDataContainer'][$strTableName] = true;
				\Contao\Controller::loadDataContainer($strTableName);
			}
			
			if(strlen($objCC->get('pTable')) > 0)
			{
				$objParentCC = CustomCatalogFactory::findByTableName($objCC->get('pTable'));
				$objParentCE = CustomElementFactory::findById($objParentCC->pid);

				if($objParentCC === null || $objParentCE === null)
				{
					return;
				}

				$strParentDo = static::getBackendModuleAlias( $objParentCC->get('id') );
				
				// skip if we are not in a CC
				if(!in_array(\Contao\Input::get('do'), array($strParentDo)) )
				{
					return;
				}

				$GLOBALS['TL_DCA'][$strTableName]['config']['dynamicPtable'] = true;
				$GLOBALS['TL_DCA'][$strTableName]['config']['ptable'] = $objParentCC->getTable();
				// all done here move on to the next CC
				return;
			}
			
			// continue here because we do not want to manage the table
			if(!$objCC->get('isManageable') && $objCC->get('mode') == 'existing')
			{
				return;
			}

			if(!is_array($GLOBALS['TL_DCA'][$strTableName]['fields']))
			{
				$GLOBALS['TL_DCA'][$strTableName]['fields'] = array();
			}

			if(!array_key_exists('ptable', $GLOBALS['TL_DCA'][$strTableName]['fields']))
			{
				$GLOBALS['TL_DCA'][$strTableName]['fields']['ptable'] = array('sql'=>"varchar(64) NOT NULL default ''");
			}
		}

		// handle child table configurations
		if($blnIsChild)
		{
			$arrDCA['fields']['ptable'] = array('sql'=>"varchar(64) NOT NULL default ''");
			if(strlen($objCC->get('pTable')) > 0)
			{
				$objParentCC = CustomCatalogFactory::findByTableName($objCC->get('pTable'));
				if( $objParentCC === null )
				{
					return ;
				}
				
				$objParentCE = CustomElementFactory::findById($objParentCC->pid);
				
				if($objParentCC === null || $objParentCE === null)
				{
					return;
				}
				
				$arrDCA['config']['ptable'] = $objParentCC->getTable();
				$arrDCA['config']['dynamicPtable'] = true;
							
#				// set table to be a dynamic child table for copy and copyAll mode
#				if( ( in_array(\Contao\Input::get('act'), array('copy','copyAll') ) || in_array(\Contao\Input::get('mode'), array('copy','copyAll') ) ) && in_array(\Contao\Input::get('do'), array($objParentCE->get('alias'), sprintf($GLOBALS['PCT_CUSTOMCATALOG']['backendUrlLogic'],$objParentCE->get('alias'),$objParentCC->get('id')) )) )
#				{
#					
#				}
#
#				// set table to be a dynamic child table
#				#if(\Contao\Input::get('table') == $strTableName && in_array(\Contao\Input::get('do'), array($objParentCE->alias, sprintf($GLOBALS['PCT_CUSTOMCATALOG']['backendUrlLogic'],$objParentCE->alias,$objParentCC->id) )) )
#				if(\Contao\Input::get('table') == $strTableName)
#				{
#					ControllerHelper::callstatic('loadDataContainer',array($strTableName));
#					$GLOBALS['TL_DCA'][$strTableName]['config']['dynamicPtable'] = true;
#					$GLOBALS['TL_DCA'][$strTableName]['config']['ptable'] = $objParentCC->getTable();
#				}
			}
		}

		// [config] child tables
		if($blnHasChilds)
		{
			$childs = $arrChilds;
			foreach($arrChilds as $i => $v)
			{
				// tl_content configurations
				if(strlen(strpos($v, '::')) > 0)
				{
					$split = explode('::', $v);
					$childs[$i] = $split[0];
				}
			}
			$childs = array_filter($childs);

			// dynically add the tablename as parent table in foreign DCA arrays
			$objCurrentCC = CustomCatalogFactory::findCurrent();
			if($objCurrentCC)
			{
				if(!empty($childs) && $strTableName == $objCurrentCC->getTable())
				{
					foreach($childs as $v)
					{
						if (!isset($GLOBALS['loadDataContainer'][$v]))
						{
							$GLOBALS['PCT_CUSTOMCATALOG']['loadDataContainer'][$v] = true;
							\Contao\Controller::loadDataContainer($v);
						}
						
						$GLOBALS['TL_DCA'][$v]['config']['ptable'] = $strTableName;

						// store for post dca processing
						$arrDCA['BE_CHILDS'][] = $v;
					}
				}
			}

			// merge with existing child tables
			if( isset($arrDCA['config']['ctable']) && is_array($arrDCA['config']['ctable']) && count($arrDCA['config']['ctable']) > 0)
			{
				$arrDCA['config']['ctable'] = array_unique(array_merge($arrDCA['config']['ctable'],$childs));
			}
			else
			{
				$arrDCA['config']['ctable'] = $childs;
			}
			unset($childs);
		}

		// ![list] mode
		$arrDCA['list']['sorting']['mode'] = $objCC->get('list_mode');

		// custom modes
		if( in_array($objCC->get('list_mode'), array('5','5.1')) )
		{
			$arrDCA['list']['sorting']['mode'] = 5;
			$arrDCA['list']['sorting']['rootPaste'] = true;
		}
		
		// fallback to filterable list views
		if( Controller::isBackend() && in_array($objCC->get('list_mode'), array('5','5.1')) )
		{
			// reset list to a filterable view if user wants to filter
			$objSession = System::getContainer()->get('request_stack')->getSession();
			$arrSession = $objSession->all();
			unset($arrSession['filter'][$strTableName]['limit']);
			
			if(!empty($arrSession['filter'][$strTableName]))
			{
				$arrDCA['list']['sorting']['mode'] = 1;
			}
		}

		// ![list] panel layout
		$arrDCA['list']['sorting']['panelLayout'] = $objCC->get('list_panelLayout');

		// ![list] sorting flag (default: 11)
		if($objCC->get('list_flag') > 0)
		{
			$arrDCA['list']['sorting']['flag'] = $objCC->get('list_flag');
		}

		// ![list] sorting fields (default: sorting)
		if($objCC->get('list_fields'))
		{
			$listFields = StringUtil::deserialize($objCC->get('list_fields'));
			$arrDCA['list']['sorting']['fields'] = !is_array($listFields) ? array($listFields) : $listFields;
		}
		
		if (!isset($arrSession['sorting'][$strTableName]))
		{
			$arrSession['sorting'][$strTableName] = '';
		}
		
		// fallback: use id as sort field if nothing else is selected
		if( !isset($arrSession['sorting'][$strTableName]) || !isset($arrDCA['list']['sorting']['fields']) || empty($arrDCA['list']['sorting']['fields']) )
		{
			$arrDCA['list']['sorting']['fields'] = array('id');
		}

		// overwrite the object class
		$objCE = new \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomElement( $objCE->getData() );

		// generate the custom element
		$objCE->prepareForDca($blnInstallTool ? false : true);

		$blnHasFields = true;
		if(!$objCE->get('arrGroups'))
		{
			$blnGeneratePalettesAndAttributes = false;
		}

		$strDefaultSelector = 'default';
		$arrPalettes = array();
		$arrSelectors = array();
		$arrSubpalettes = array();
		$arrListLabels = array();
		$arrFields = array();
		$arrSelectorAttributes = array('paletteselect');
		$arrFilters = array();
		$arrSystemColumns = static::getSystemColumns();
		$blnIsEditMode = false;
		
		if( in_array(\Contao\Input::get('act'), array('edit','editAll','overrideAll')) )
		{
			$blnIsEditMode = true;
		}
	
		// !generate subpalettes
		if($blnHasFields)
		{
			foreach($objCE->get('arrGroups') as $objGroup)
			{
				if(!$objGroup->get('arrAttributes') || !$objGroup->get('published'))
				{
					continue;
				}

				foreach($objGroup->get('arrAttributes') as $objAttribute)
				{
					if($objAttribute === null)
					{
						continue;
					}

					$fieldName = $objAttribute->get('alias');
					if(in_array($objAttribute->get('type'),$arrSelectorAttributes) )
					{
						$arrSelectors[] = $fieldName;
						continue;
					}

					if(!$objAttribute->get('isSelector'))
					{
						continue;
					}

					$arrSelectors[] = $fieldName;
					$arrSubs = StringUtil::deserialize( $objAttribute->get('subpalettes') );
					if(!is_array($arrSubs))
					{
						$arrSubs = array_filter( explode(',', $arrSubs) );
					}
					
					if(count($arrSubs) > 0)
					{
						// reorder attributes by their sorting
						$ordered = array();
						foreach($arrSubs as $attr_id)
						{
							$objSubAttribute = AttributeFactory::findById($attr_id);

							if(!$objSubAttribute)
							{
								continue;
							}

							if(!$objSubAttribute->get('published'))
							{
								continue;
							}

							$sorting = $objSubAttribute->get('sorting');
							if(isset($ordered[$sorting]))
							{
								$sorting += 1;
							}

							$ordered[$sorting] = $attr_id;
						}
						ksort($ordered);
						$arrSubs = $ordered;
						unset($ordered);

						foreach($arrSubs as $attr_id)
						{
							$objSubAttribute = AttributeFactory::findById($attr_id);

							if(!$objSubAttribute)
							{
								continue;
							}

							$arrSubpalettes[$fieldName][] = $objSubAttribute->get('alias');

							// !handle generic options fields in subpalettes
							if($objSubAttribute->get('options'))
							{
								$options = StringUtil::deserialize($objSubAttribute->get('options'));
								foreach($options as $option)
								{
									$f = $objSubAttribute->get('alias').'_'.$option;
									$arrSubpalettes[$fieldName][] = $f;
								}
							}
						}
					}
				}
			}

			// !add subpalettes
			if(empty($arrDCA['subpalettes']))
			{
				$arrDCA['subpalettes'] = $objDcaHelper->generateSubpalettes($arrSubpalettes);
			}
			else
			{
				$subs = $objDcaHelper->generateSubpalettes($arrSubpalettes);
				$arrDCA['subpalettes'] = array_merge($arrDCA['subpalettes'],$subs);
			}

			// add selectors
			if(!isset($arrDCA['palettes']['__selector__']) || empty($arrDCA['palettes']['__selector__']))
			{
				$arrDCA['palettes']['__selector__'] = array_unique($arrSelectors);
			}
			else
			{
				$arrDCA['palettes']['__selector__'] = array_unique(array_merge($arrDCA['palettes']['__selector__'],$arrSelectors));
			}

			// store for post dca processing
			$arrDCA['BE_SUBPALETTES']['fields'] = $arrDCA['subpalettes'];
			$arrDCA['BE_SUBPALETTES']['selector'] = $arrDCA['palettes']['__selector__'];
		}

		$blnLoadDataContainers = false;
		// load tl_content, tl_module data containers in case fields use their definitions etc.
		if($blnInstallTool || $blnDatabaseUpdate || !in_array(\Contao\Input::get('act'),array('show','popup')) )
		{
			if(!isset($GLOBALS['TL_DCA']['tl_content']['config']['dataContainer']))
			{
				\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
			}
			if(!isset($GLOBALS['TL_DCA']['tl_module']['config']['dataContainer']))
			{
				\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadDataContainer',array('tl_module'));
			}
		}
		
		// !generate palettes
		if($blnHasFields)
		{
			$strPublishedField = $objCC->getPublishedField();
			
			foreach($objCE->get('arrGroups') as $objGroup)
			{
				if(!$objGroup->get('arrAttributes'))
				{
					continue;
				}
				else if(!$objGroup->get('published') && !$blnDatabaseUpdate && !$blnInstallTool)
				{
					continue;
				}

				// set origins
				$objGroup->set('objCustomElement',$objCE);
				$objGroup->set('objCustomCatalog',$objCC);

				$strSelector = $strDefaultSelector;
				$strGroupTitle = $objGroup->get('title') ? $objGroup->get('title') : 'palette_'.$objGroup->get('id');
				$strGroupAlias = $objGroup->get('alias') ? $objGroup->get('alias') : $objGroup->get('id');
				
				if( isset($GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTableName]) )
				{
					$strGroupTitle = $GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTableName]['palettes'][$objGroup->get('alias')] ?: $GLOBALS['TL_LANG']['CUSTOMCATALOG']['*']['palettes'][$objGroup->get('alias')];
				}
				

				$strLegend = $strGroupAlias.'_legend';
				if($objGroup->get('legend_hide'))
				{
					$strLegend = $strGroupAlias.'_legend:hide';
				}

				// build upon existing palettes
				if( !empty($arrDCA['palettes'][$strSelector]) )
				{
					$arrPalettes[$strSelector] =  $objDcaHelper->splitPalette($arrDCA['palettes'][$strSelector]);
				}

				// auto generate a translated label for the palette by the group title
				$GLOBALS['TL_LANG'][$strTableName][$strGroupAlias.'_legend'] = $strGroupTitle;

				// store the language information in the DCA
				$arrDCA['TL_LANG'][$strGroupAlias.'_legend'] = $strGroupTitle; 

				$arrPalettes[$strSelector][$strLegend] = array();
				
				// !generate attributes
				foreach($objGroup->get('arrAttributes') as $objAttribute)
				{
					if(!$objAttribute)
					{
						continue;
					}

					// skip unpublished attributes
					if(!$objAttribute->get('published') && !$blnDatabaseUpdate && !$blnInstallTool)
					{
						continue;
					}
					
					$bolAddFieldToPalette = true;

					$fieldName = $objAttribute->get('alias');
					$varDefault = $objAttribute->get('defaultValue');
					
					// ignore system columns
					if( in_array($fieldName, $arrSystemColumns) )
					{
						continue;
					}
					// skip exsting fields in extenden tables
					else if( $strMode == 'existing' && $objDatabase->fieldExists($fieldName,$strTableName) && isset($GLOBALS['TL_DCA'][$strTableName]['fields'][$fieldName]['inputType']) && !empty($GLOBALS['TL_DCA'][$strTableName]['fields'][$fieldName]['inputType']) )
					{
						continue;
					}
					
					// set origins
					$objAttribute->set('objCustomElement',$objCE);
					$objAttribute->set('objCustomCatalog',$objCC);
					
					// get the field definition
					$arrFieldDef = $objAttribute->getFieldDefinition();
					
					// default values
					if(!empty($varDefault) && empty($arrFieldDef['default']))
					{
						$arrFieldDef['default'] = $varDefault;
					}
										
					// !field definition
					$arrData = array
					(
						'id'  => $objAttribute->get('id'),
						'name'  => $fieldName,
						'type'  => $objAttribute->get('type'),
						'fieldDef'  => $arrFieldDef,
					);

					// add the orderSRC field when there is a multiple files field
					if( isset($arrData['fieldDef']['sortable']) && $arrData['fieldDef']['sortable'])
					{
						$arrDCA['fields']['orderSRC_'.$fieldName]= array('sql'=> "blob NULL");
						$arrData['fieldDef']['eval']['orderField'] = 'orderSRC_'.$fieldName;
					}

					// add the submitOnChange option to selectors
					if($objAttribute->get('isSelector'))
					{
						$arrData['fieldDef']['eval']['submitOnChange'] = true;
					}

					// is visiblity toggler
					if( $strPublishedField == $fieldName )
					{
						$arrData['fieldDef']['toggle'] = true;
					}

					// !be_filter: is backend filter
					if($objAttribute->get('be_filter'))
					{
						$arrData['fieldDef']['filter'] = true;
					}

					// !be_search: is searchable in backend
					if($objAttribute->get('be_search'))
					{
						$arrData['fieldDef']['search'] = true;
					}

					// !be_sorting: is sorting field in backend
					if($objAttribute->get('be_sorting'))
					{
						$arrData['fieldDef']['sorting'] = true;
					}
					
					// !be_visible: wildcards
					if($objAttribute->get('be_visible'))
					{
						$arrListLabels[] = $objAttribute->get('alias');
					}
					
					// HOOK: modify the field definition array
					$arrData = Hooks::callstatic('prepareFieldHook',array($arrData,$fieldName,$objAttribute,$objCC,$objCE,new static()));
					
					// skip fields without name or without definition
					if(count($arrData) < 1 || strlen($arrData['name']) < 1 || count($arrData['fieldDef']) < 1)
					{
						continue;
					}

					if(strlen($arrData['name']) > 0)
					{
						$fieldName = $arrData['name'];
					}

					// add a referance for foreignKey values
					if( isset($arrData['fieldDef']['foreinKey']) && ( !isset($arrData['fieldDef']['reference']) || !\is_array($arrData['fieldDef']['reference']) ) )
					{
						$foreignKey = \explode('.',$arrData['fieldDef']['foreinKey']);
						$t = $foreignKey[0];
						$f = $foreignKey[1];
						if( $objDatabase->tableExists($t) === true && $objDatabase->fieldExists('id',$t) && $objDatabase->fieldExists($f, $t))
						{
							$objRefs = $objDatabase->prepare("SELECT id,".$f." FROM ".$t)->execute();
							if($objRefs->numRows > 0)
							{
								$reference = array();
								while($objRefs->next())
								{
									$reference[ $objRefs->id ] = $objRefs->{$f};
								}
								$arrData['fieldDef']['reference'] = $reference;
							}
							unset($reference);
						}
						unset($t);
						unset($f);
						unset($foreignKey);
					}
					
					// !add field to the dca array collection
					$arrDCA['fields'][$fieldName] = $arrData['fieldDef'];
					
					// check if field is part of a subpalette
					if(count($arrSubpalettes) > 0)
					{
						foreach($arrSubpalettes as $selector => $arrSubs)
						{
							if(in_array($fieldName, $arrSubs))
							{
								$bolAddFieldToPalette = false;
							}
						}
					}

					// !handle generic options fields
					$arrOptionFields = array();
					if($objAttribute->get('options') && !in_array($objAttribute->get('type'), $GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields']))
					{
						$options = StringUtil::deserialize($objAttribute->get('options'));
						if(!is_array($options))
						{
							$options = explode(',', $options);
						}

						foreach($options as $option)
						{
							if( is_array($option) || in_array($option, $GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields']) || in_array($objAttribute->get('type').'['.$option.']', $GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields']))
							{
								continue;
							}

							$f = $fieldName.'_'.$option;
							
							// check if the attribute has a getOptionFieldDefinition method
							if(method_exists($objAttribute,'getOptionFieldDefinition'))
							{
								$arrFieldDef = $objAttribute->getOptionFieldDefinition($option);
								$arrClass = explode(' ', $arrFieldDef['eval']['tl_class'] ?? '');
								
								if(!in_array('wizard',$arrClass) && ( isset($arrFieldDef['eval']['datepicker']) && $arrFieldDef['eval']['datepicker'] || isset($arrFieldDef['eval']['dcaPicker']) && $arrFieldDef['eval']['dcaPicker']))
								{
									$arrClass[] = 'wizard';
								}
								
								$arrFieldDef['eval']['tl_class'] = implode(' ', $arrClass);
							}
							
							// HOOK: set option field definitions
							$arrFieldDefFromHook = Hooks::callstatic('getOptionFieldDefinitionHook',array($arrData,$fieldName,$option,$objAttribute,$objCC,$objCE,new static()) );
							if(is_array($arrFieldDefFromHook) && count($arrFieldDefFromHook) > 0)
							{
								$arrFieldDef = $arrFieldDefFromHook;
								unset($arrFieldDefFromHook);
							}
							
							// options_callback is a function, not an array
							if( (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] === false && isset($arrFieldDef['options_callback']) && \is_callable($arrFieldDef['options_callback']) )
							{
								$dc = new \StdClass;
								$dc->table = $strTableName;
								$dc->id = \Contao\Input::get('id');
								$arrFieldDef['options'] = $arrFieldDef['options_callback']($dc);
								unset($arrFieldDef['options_callback']);
								unset($dc);
							}	
							
							$arrDCA['fields'][$f] = $arrFieldDef;
							
							// add fields to palettes
							#$arrPalettes[$strSelector][$strLegend][] = $f;
							$arrOptionFields[] = $f;
							$arrFields[] = $f;
						}
					}
					
					// collect attributes for post cache processing
					$arrDCA['BE_ATTRIBUTES'][] = $objAttribute->get('id');
					
					if(!$bolAddFieldToPalette)
					{
						continue;
					}

					// add field to the palettes
					$arrPalettes[$strSelector][$strLegend][] = $fieldName;

					// add the option fields below the regular field
					if(count($arrOptionFields) > 0)
					{
						\Contao\ArrayUtil::arrayInsert($arrPalettes[$strSelector][$strLegend],array_search($fieldName,$arrPalettes[$strSelector][$strLegend])+1,$arrOptionFields);
					}

					// collect all fields for further use
					$arrFields[] = $fieldName;

					// support custom filtering
					if( Controller::isBackend() && $objAttribute->get('be_filter') && method_exists($objAttribute, 'getBackendFilterOptions') && $objDatabase->tableExists($strTableName) && !$blnInstallTool)
					{
						// check if field exists before adding a backend filter option
						if($objDatabase->fieldExists($fieldName,$strTableName))
						{
							$arrFilters[ $fieldName ] = $objAttribute->getBackendFilterOptions($arrData,$fieldName,$objAttribute,$objCC,$objCE,new static());
						}
					}

					// collect attributes with backend filters for post cache processing
					if( $objAttribute->get('be_filter') )
					{
						$arrDCA['BE_FILTERS'][] = $objAttribute->get('id');
					}
				}

				// update DCA array
				if( !empty($arrDCA['palettes'][$strSelector]) )
				{
					$arrDCA['palettes'][$strSelector] = $objDcaHelper->generatePalettes($arrPalettes[$strSelector]);
				}
			}
		}

		if( isset($arrDCA['BE_ATTRIBUTES']) && \is_array($arrDCA['BE_ATTRIBUTES']) )
		{
			$arrDCA['BE_ATTRIBUTES'] = \array_unique($arrDCA['BE_ATTRIBUTES']);
		}
		if( isset($arrDCA['BE_FILTERS']) && \is_array($arrDCA['BE_FILTERS']) )
		{
			$arrDCA['BE_FILTERS'] = \array_unique($arrDCA['BE_FILTERS']);
		}
		
		// palettes
		unset($arrPalettes['__selector__']);
		foreach($arrPalettes as $selector => $palette)
		{
			$arrDCA['palettes'][$selector] = $objDcaHelper->generatePalettes($palette);
		}
	
		// !Label output
		if(!empty($arrListLabels) && !$objCC->get('label_overwrite'))
		{
			$arrDCA['list']['label']['fields'] = $arrListLabels;
			$arrDCA['list']['label']['label_callback'] = array(get_class($objDcaHelper),'generateListLabels');
		}
		// is there is text in the label overwrite field, use it
		else if( (!empty($arrListLabels) || empty($arrListLabels)) && $objCC->get('label_overwrite') && !isset($arrDCA['list']['label']['label_callback']))
		{
			$arrDCA['list']['label']['label_callback'] = array(get_class($objDcaHelper),'generateListLabels');
		}
		// default, render all field values
		else
		{
			if(count($arrFields) > 0)
			{
				#$arrDCA['list']['label']['fields'] = array('id');
				$arrDCA['list']['label']['fields'] = array_unique(array_merge($arrDCA['list']['label']['fields'] ?: array(),$arrFields));
				$arrDCA['list']['label']['format'] = str_repeat('%s,', count($arrDCA['list']['label']['fields']));
				$arrDCA['list']['label']['format'] = substr($arrDCA['list']['label']['format'], 0,-1);
			}
		}

		// !apply backend filters
		if(count($arrFilters) > 0)
		{
			$arrDCA['list']['sorting']['filter'] = array_filter($arrFilters,'count');
		}

		// ![list] operations
		if($objCC->get('list_operations') || (isset($arrDCA['isDefaultCustomCatalogDCA']) && $arrDCA['isDefaultCustomCatalogDCA']) )
		{
			if(!is_array($arrDCA['list']['operations']))
			{
				$arrDCA['list']['operations'] = array();
			}

			$buttons = StringUtil::deserialize($objCC->get('list_operations')) ?: array();
			$operations = array();

			// fallback to default buttons
			if(count($buttons) < 1 && $arrDCA['isDefaultCustomCatalogDCA'])
			{
				$buttons = array_keys($arrDCA['list']['operations']);
			}

			// remove the toggle button if no published checkbox field is selected
			if(strlen($objCC->get('publishedField')) < 1 && in_array('toggle', $buttons))
			{
				unset($buttons[array_search('toggle', $buttons)]);
			}

			foreach($buttons as $k)
			{
				if(!array_key_exists($k, $arrDCA['list']['operations']))
				{
					// hook for custom buttons here
					$arrButton = $objDcaHelper->getCustomButton($k,$objCC,$objCE,new static());
					// delete button if the hook returns an empty value
					if(empty($arrButton))
					{
						unset($operations[$k]);
						continue;
					}
					$operations[$k] = $arrButton;
				}
				else
				{
					// add the langpid to the edit button in a multilanguage environment
					if($k == 'edit' && !isset($operations[$k]['button_callback']))
					{
						$operations[$k] = $objDcaHelper->getCustomButton($k,$objCC,$objCE,new static());
					}
					// add the langpid to the edit button in a multilanguage environment
					else if($k == 'delete' && !isset($operations[$k]['button_callback']))
						{
							$operations[$k] = $objDcaHelper->getCustomButton($k,$objCC,$objCE,new static());
						}
					else
					{
						$operations[$k] = $arrDCA['list']['operations'][$k];
					}
				}
			}

			// make the cut button more flexible
			if( in_array($objCC->get('list_mode'),array('5.1')) )
			{
				$arrDCA['list']['sorting']['paste_button_callback'] = array(get_class($objDcaHelper),'getPasteButtonWithoutPasteInto');
			}

			// fallback. Include the default buttons set
			if(count($operations) < 1)
			{
				$operations = $arrDCA['list']['operations'];
			}

			$arrDCA['list']['operations'] = $operations;
		}

		// add the edit header button if the custom catalog has childs that are not standalone backend modules
		if($blnHasChilds)
		{
			$pos = 0;
			if(array_key_exists('edit', $arrDCA['list']['operations']))
			{
				$pos = array_search('edit', array_keys($arrDCA['list']['operations']));
			}

			$insertEditHeader = false;
		
			// !generate child table buttons
			foreach($arrChilds as $i => $strChildTable)
			{
				$blnDynamicChild = false;
				
				$childTable = $strChildTable;
				
				$objChildCC = null;
				if($childTable != 'tl_content')
				{
					// check if child table is active
					if(!$GLOBALS['PCT_CUSTOMCATALOG']['childTableMustBeAConfiguration'])
					{
						continue;
					}
					
					// handle existing tables with relations to another configuration
					if(strlen(strpos($childTable, '::')) > 0)
					{
						$split = explode('::', $childTable);
						$childTable = $split[0];
						$childId = $split[1];
						$objChildCC = CustomCatalogFactory::findById($childId);
						
						$blnDynamicChild = true;
					}
					else
					{
						$objChildCC = CustomCatalogFactory::findByTableName($childTable);
					}	
					
					if($objChildCC === null)
					{
						continue;
					}
					else if(!$objChildCC->get('active'))
					{
						continue;
					}
					
					$childTable = $objChildCC->getTable();
				}
				
				$pos += $i;
				$edit = $objDcaHelper->getCustomButton('editchild');
				$edit['href'] = sprintf($edit['href'],$childTable).($blnDynamicChild ? '&amp;'.$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['urlChildConfigParameter'].'='.$objChildCC->id : '');
				
				// use child custom catalog icon as edit icon
				if($objChildCC)
				{
					if($objChildCC->get('icon'))
					{
						$file = \Contao\FilesModel::findByPk( $objChildCC->get('icon') );
						if( $file !== null )
						{
							$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
							$edit['icon'] = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$file->path, array('16','16','center_center') )->getUrl($projectDir);;
						}
					}
				}
				
				if(!isset($arrDCA['list']['operations']['edit_'.$strChildTable]))
				{
					\Contao\ArrayUtil::arrayInsert($arrDCA['list']['operations'],$pos,array('edit_'.$strChildTable=>$edit));
				}
				
				$insertEditHeader = true;
			}

			// remove the regular edit button and insert the editheader button
			if($insertEditHeader)
			{
				unset($arrDCA['list']['operations']['edit']);

				// insert edit header button one position higher than the last child table processed
				if(!array_key_exists('editheader', $arrDCA['list']['operations']))
				{
					$editheader = $objDcaHelper->getCustomButton('editheader');
					
					if( \version_compare(ContaoCoreBundle::getVersion(),'5.0','<') )
					{
						$pos += 1;
					}
					\Contao\ArrayUtil::arrayInsert($arrDCA['list']['operations'],$pos,array('editheader'=>$editheader));
				}
			}
		}

		

		// [list] global operations
		// add a shortcut to the config
		if(!is_array($arrDCA['list']['global_operations']))
		{
			$arrDCA['list']['global_operations'] = array();
		}
		
		if( isset($objUser) && $objUser !== null && isset($objUser->isAdmin) && !array_key_exists('edit_config',$arrDCA['list']['global_operations']))
		{
			$GLOBALS['TL_LANG']['tl_pct_customcatalog']['edit_config'][1] = \sprintf($GLOBALS['TL_LANG']['tl_pct_customcatalog']['edit_config'][1],$objCC->get('id'));
			$arrDCA['list']['global_operations']['edit_config'] = array
			(
				'label'  => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['edit_config'],
				'href'  => 'do=pct_customelements&amp;table=tl_pct_customcatalog&amp;id='.$objCC->get('id').'&amp;act=edit',
				'class'  => 'header_edit_config',
				'attributes'=> 'onclick="Backend.getScrollOffset();" accesskey="e"',
			);
		}

		// set header fields in mode 4
		if($blnIsChild)
		{
			$headerFields = $objCC->get('list_headerFields') ? StringUtil::deserialize($objCC->get('list_headerFields')) : array('id','tstamp');
			$objDcaHelper->set('pTable',$objCC->get('pTable'));
			$objDcaHelper->set('headerFields',$headerFields);
			$objDcaHelper->set('listLabels',$arrListLabels);
			$arrDCA['list']['sorting']['child_record_callback'] = array(get_class($objDcaHelper),'listChildRecords');
			$arrDCA['list']['sorting']['headerFields'] = $headerFields;
		}
			
		// !multilanguage
		if( Controller::isBackend() && $objCC->get('multilanguage'))
		{
			// fill the cache
			Cache::addLanguageRecord($strTableName);

			// manipulate the current listview
			if(\Contao\Input::get('act') != 'edit' && \Contao\Input::get('do') == $strAlias)
			{
				$objSession = System::getContainer()->get('request_stack')->getSession();
				$arrSession = $objSession->all();
				unset($arrSession['filter'][$strTableName]['limit']);

				// get currently running backend filters for the table
				$blnActiveBackendFilters = false;

				if( !empty($arrSession['filter'][$strTableName]) )
				{
					$blnActiveBackendFilters = true;
				}
				else if( isset($arrSession['search'][$strTableName]['value']) && strlen($arrSession['search'][$strTableName]['value']) > 0)
				{
					$blnActiveBackendFilters = true;
				}

				if( !empty($arrSession[$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession']][$strTableName]) )
				{
					$blnActiveBackendFilters = true;
				}

				// set the backend filter
				$lang = Multilanguage::getActiveBackendLanguage($strTableName);
				$ids = array();
				$langIds = array();

				// find language entries and store them in the cache
				if($lang)
				{
					$langIds = Multilanguage::findLanguageRecords($strTableName,$lang);
				}
				else
				{
					$langIds = Multilanguage::findLanguageRecords($strTableName);
				}

				$ids = array_unique(array_merge($ids,$langIds));
				
				if(count($ids) < 1)
				{
					$ids = array(-1);
				}

				// filter the list down to the language records when no backend filter is active
				if( $blnActiveBackendFilters === false && !empty($ids) )
				{
					if($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['showAllLanguagesInPanel'])
					{
						if(strlen($lang) < 1)
						{
							$ids = array_unique(array_merge($ids,$langIds));

							$arrDCA['list']['sorting']['filter'][] = array('NOT FIND_IN_SET(id,?)',implode(',', $ids));
						}
						else
						{
							$arrDCA['list']['sorting']['filter'][] = array('FIND_IN_SET(id,?)',implode(',', $ids));
						}
					}
					else
					{
						if(strlen($lang) > 0)
						{
							$arrDCA['list']['sorting']['filter'][] = array('FIND_IN_SET(id,?)',implode(',', $ids));
						}
						else
						{
							$arrDCA['list']['sorting']['filter'][] = array('NOT FIND_IN_SET(id,?)',implode(',', $ids));
						}
					}
				}
				
				// handle mode 5
				if( in_array($objCC->get('list_mode'),array(5,'5.1')) && $objDatabase->tableExists($strTableName) )
				{
					if(strlen($lang) < 1)
					{
						$ids = Multilanguage::findBaseRecords($strTableName);
					}

					// find parent records
					if(count($ids) > 0)
					{
						$arrPids = $objDatabase->getParentRecords($ids,$strTableName);
						if(count($arrPids) > 0)
						{
							$ids = array_unique( array_merge($ids,$arrPids) );
						}
					}

					if(strlen($lang) < 1 && empty($ids))
					{
						unset($ids);
					}
					
					if( is_array($ids) && !empty($ids) )
					{
						// reorder ids by sorting
						$arrDCA['list']['sorting']['root'] = $objDatabase->execute("SELECT id FROM $strTableName WHERE id IN(".implode(',',$ids).") ORDER BY sorting")->fetchEach('id');
						$arrDCA['list']['sorting']['rootPaste'] = true;
					}
				}

				// flag the language
				$arrDCA['CC_LANGUAGE'] = $lang;

			}

			// multilanguage panel
			$arrPanelLayout = $objDcaHelper->getPanelLayoutAsArray($arrDCA['list']['sorting']['panelLayout']);
			\Contao\ArrayUtil::arrayInsert($arrPanelLayout,-1,array('language'));
			$arrDCA['list']['sorting']['panelLayout'] = $objDcaHelper->generatePanelLayout($arrPanelLayout);
			$arrDCA['list']['sorting']['panel_callback']['language'] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','languagePanel');
		}

		// add a general load callback
		$arrDCA['config']['onload_callback']['generalLoadCallback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','generalLoadCallback');
		// add a general save callback
		$arrDCA['config']['onsubmit_callback']['generalSubmitCallback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','generalSubmitCallback');
		// add a general delete callback
		$arrDCA['config']['ondelete_callback']['generalDeleteCallback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','generalDeleteCallback');
		// add a general cut callback
		$arrDCA['config']['oncut_callback']['generalCutCallback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','generalCutCallback');
		// add a general copy callback
		$arrDCA['config']['oncopy_callback']['generalCopyCallback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','generalCopyCallback');
		// add a general create callback
		$arrDCA['config']['oncreate_callback']['generalCreateCallback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','generalCreateCallback');
		
		// reset couple DCA settings when the CC is in existing mode
		if( $strMode == 'existing' )
		{
			// reset [list]
			$arrDCA['list'] = $GLOBALS['TL_DCA'][$strTableName]['list'];
		}

		// HOOK allow other extensions to manipulate the generated dca array
		$arrDCA = Hooks::callstatic('prepareDataContainerHook',array($arrDCA,$objCC,$objCE,new static()));

		// print an error to the screen and stop processing when the DCA is empty
		if( (empty($arrDCA) || !isset($arrDCA) || strlen($strTableName) < 1) && \Contao\Input::get('do') != 'pct_customelements' && \Contao\Input::get('table') == 'pct_customcatalog' && !in_array(\Contao\Input::get('act'), array('edit','editAll','overrideAll')) )
		{
			print(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['XPT']['emptyDataContainerArray'],$strTableName));
			return;
		}

		// flag the DCA array as completely created by CC
		$arrDCA['createdByCustomCatalog'] = true;

		// !set the dca
		$GLOBALS['TL_DCA'][$strTableName] = $arrDCA;
		
		// register the contao model class
		if(!isset($GLOBALS['TL_MODELS'][$strTableName]) && $strMode != 'existing')
		{
			$GLOBALS['TL_MODELS'][$strTableName] = 'Contao\ContaoModel';
		}
	}


	/**
	 * Return the config count array
	 * @return array
	 */
	public static function getConfigCount()
	{
		// check if module is running and is activated and if database is up to date
		if( !\Contao\Database::getInstance()->tableExists('tl_pct_customcatalog') )
		{
			return array();
		}
		
		$arrCount = Cache::get('CONFIGURATION_COUNTS');
		if($arrCount !== null)
		{
			return $arrCount;
		}

		// count the number of configurations
		$objCCs = CustomCatalogFactory::findAllActive();

		$arrCount = null;
		if($objCCs !== null)
		{
			$arrCount = array();
			foreach($objCCs as $objCC)
			{
				$arrCount[$objCC->pid][] = $objCC->id;
			}

			// store the count in the Cache
			Cache::add('CONFIGURATION_COUNTS',$arrCount);
		}

		return $arrCount;
	}



// !-- Backend-Integration


	/**
	 * Create the backend module globals
	 *
	 * called from initializeSystem Hook
	 */
	public function createBackendModules()
	{
		// check if all requirements has been passed to initialize
		if(static::isReady() === false)
		{
			return;
		}
		
		$objCCs = CustomCatalogFactory::findAllActive();
		if($objCCs === null)
		{
			return;
		}

		// load language files
		\Contao\System::loadLanguageFile('default');
		\Contao\System::loadLanguageFile('modules');

		foreach($objCCs as $objCC)
		{
			if($objCC->mode == 'existing')
			{
				continue;
			}
			
			// create the CE and CC object
			$objCE = CustomElementFactory::findById($objCC->pid);
			if($objCE === null)
			{
				continue;
			}

			// title
			$strTitle = $objCC->get('title');
			if(!$objCC->get('useTitleAsName'))
			{
				$strTitle = $objCE->get('title');
			}

			$strMode = $objCC->get('mode');

			// tablename
			$strTable = $objCC->getTable();
			
			// backend alias
			$strAlias = $this->getBackendModuleAlias($objCC->id);

			// icon
			$strIcon = '';
			if($objCC->get('icon'))
			{
				$objFile = \Contao\FilesModel::findByPk($objCC->get('icon'));
				if( $objFile !== null )
				{
					$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
					$strIcon = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, array('16','16','center_center') )->getUrl($projectDir);;
				}
			}

			// add the table name to the backend module accessible tables, bypass caching when a child table configuration is found
			$arrTables = $this->getAccessibleTables($objCC->id,true,(\Contao\Input::get('table') != '' && \Contao\Input::get('do') != '' ? true : false));
			
			$blnIsChild = false;
			if(strlen($objCC->get('pTable')) > 0)
			{
				$blnIsChild = true;
			}
			
			// integrate the module
			$this->integrateBackendModule($objCC->id,$strTitle,$strAlias,$strTable,$strIcon,$arrTables,$blnIsChild);
		}
	}


	/**
	 * Return the backend alias (do GET parameter) as string
	 * @param integer Id of the config
	 * @return string
	 */
	public static function getBackendModuleAlias($intConfig)
	{
		// check if module is running and is activated and if database is up to date
		if( !\Contao\Database::getInstance()->tableExists('tl_pct_customcatalog'))
		{
			return '';
		}

		$objCC = CustomCatalogFactory::findById($intConfig);
		if($objCC === null)
		{
			return '';
		}

		$objCE = CustomElementFactory::findById($objCC->pid);
		if($objCE === null)
		{
			return '';
		}

		$arrCount = static::getConfigCount();

		$strReturn = $objCE->get('alias');
		if( !empty($arrCount[$objCE->get('id')]) )
		{
			$strReturn = sprintf($GLOBALS['PCT_CUSTOMCATALOG']['backendUrlLogic'],$objCE->get('alias'),$objCC->get('id'));
		}

		return $strReturn;
	}


	/**
	 * Return all accessible tables as array
	 * @param integer ID of the config
	 * @param boolean Load childs
	 * @return array
	 */
	public static function getAccessibleTables($intConfig,$blnFindChilds=false,$blnByPassCache=false)
	{
		// check if all requirements has been passed to initialize
		if(static::isReady() === false)
		{
			return;
		}

		$strCache = 'CUSTOMCATALOG_TABLES::'.$intConfig;

		// look up from cache
		if(Cache::get($strCache) !== null && !$blnByPassCache)
		{
			return Cache::get($strCache);
		}

		$objCC = CustomCatalogFactory::findById($intConfig);
		if($objCC === null)
		{
			return array();
		}

		// tablename
		$strTable = $objCC->getTable();

		// add the table name to the backend module accessible tables
		$arrReturn = array( $strTable );

		// add more accessible tables to backend module if the mode is parent
		if($objCC->get('tables') && $objCC->get('moreTables') > 0)
		{
			$arrReturn = array_unique(array_merge($arrReturn,StringUtil::deserialize($objCC->get('tables'))));
		}

		// automatically add the child tables to the accessible tables (makes it easier for the user)
		if($blnFindChilds)
		{
			$arrChilds = static::getChildTables($intConfig,true);
			if(count($arrChilds) > 0)
			{
				$tmp = array();
				foreach($arrChilds as $child)
				{
					if(strlen(strpos($child, '::')) > 0)
					{
						$split = explode('::', $child);
						$child = $split[0];
					}
					$tmp[] = $child;
				}
				$arrChilds = $tmp;
				unset($tmp);
			}
			
			$arrReturn = array_unique(array_merge($arrReturn,$arrChilds));
		}

		$arrReturn = array_filter(array_unique($arrReturn));

		// add to cache
		Cache::add($strCache,$arrReturn);

		return $arrReturn;
	}


	/**
	 * Return all child tables as array
	 * @param integer ID of the config
	 */
	public static function getChildTables($intConfig,$blnDeepScan=false,$blnByPassCache=false)
	{
		// check if all requirements has been passed to initialize
		if(static::isReady() === false)
		{
			return;
		}
		
		$strCache = 'CUSTOMCATALOG_CHILDTABLES::'.$intConfig;

		// look up from cahce
		if(Cache::get($strCache) !== null && !$blnByPassCache)
		{
			return Cache::get($strCache);
		}

		$objCC = CustomCatalogFactory::findById($intConfig);
		if($objCC === null)
		{
			return array();
		}

		$arrReturn = StringUtil::deserialize($objCC->get('cTables'));	
		
		if(!is_array($arrReturn))
		{
			$arrReturn = array();
		}
		
		if($blnDeepScan)
		{
			$arrReturn = static::findAllTables($arrReturn);
			$arrReturn = array_unique(array_filter($arrReturn));
			$blnByPassCache = true;
		}
		
		if(!$blnByPassCache)
		{
			// add to cache
			Cache::add($strCache,$arrReturn);
		}
		
		return $arrReturn;
	}


	/**
	 * Integrate the custom catalog as a backend module
	 * @param string Alias of the CC
	 * @param string The table name
	 * @param string The bcakend icon
	 * @param array  The connected tables
	 * @param object The CustomCatalog object
	 */
	protected function integrateBackendModule($intConfig,$strTitle,$strAlias,$strTable,$strIcon,$arrTables,$blnIsChild=false)
	{
		$objCC = CustomCatalogFactory::findById($intConfig);
		if($objCC === null)
		{
			return;
		}

		//-- Prepare the module MOD array
		$arrMOD = array
		(
			'tables'   => $arrTables,
		);
		
		// integrate grid-presets page
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		if( \in_array('pct_autogrid',$bundles) )
		{
			$arrMOD['grid_preset'] = array('PCT\AutoGrid\Backend\PageGridPreset','run'); 
		}
		// integrate elementset library page
		if( \in_array('pct_theme_settings', $bundles) )
		{
			$arrMOD['contentelementset'] = array('PCT\ThemeSettings\Backend\PageContentElementSet','run'); 
		}
		
		// inject a whole new backend section and make it globally accessible
		if($objCC->get('newSection'))
		{
			$strSectionName = $objCC->get('sectionName');
			$strSectionAlias = $objCC->get('sectionAlias');

			$injectPos = 0;
			if(!in_array($objCC->get('injectBelow'),array('__beforeAll__','__belowAll__')))
			{
				$injectPos = array_search($objCC->get('injectBelow'), array_keys($GLOBALS['BE_MOD']) );
				$injectPos += 1;
			}
			elseif($objCC->get('injectBelow') == '__beforeAll__')
			{
				$injectPos = 0;
			}
			elseif($objCC->get('injectBelow') == '__belowAll__')
			{
				$injectPos = count($GLOBALS['BE_MOD']);
			}
			else {}

			\Contao\ArrayUtil::arrayInsert($GLOBALS['BE_MOD'], $injectPos,array($strSectionAlias => array($strAlias => $arrMOD)));
			
			// set icon
			if($strIcon)
			{
				$GLOBALS['BE_MOD'][$strSectionAlias][$strAlias]['icon'] = $strIcon;
			}
			
			// section label
			$GLOBALS['TL_LANG']['MOD'][$strSectionAlias][0] = $strSectionName;
		}
		elseif(!$objCC->get('newSection') && $objCC->get('beSection'))
		{
			$injectPos = 0;
			$strSection = $objCC->get('beSection');

			// fallback, if section is from a custom catalog that might have been turned off
			if(!is_array($GLOBALS['BE_MOD'][$strSection]))
			{
				// create section
				\Contao\ArrayUtil::arrayInsert($GLOBALS['BE_MOD'], 0,array($strSection => array($strAlias => $arrMOD)));

				// section label
				$GLOBALS['TL_LANG']['MOD'][$strSection][0] = ucfirst($strSection);
				$GLOBALS['TL_LANG']['MOD'][$strSection][1] = 'Hello, I am: "'.$strSection.'"';
			}
			else
			{
				if(!in_array($objCC->get('injectBelow'),array('__beforeAll__','__belowAll__')))
				{
					$injectPos = array_search($objCC->get('injectBelow'), array_keys($GLOBALS['BE_MOD'][$strSection]));
					$injectPos += 1;
				}
				elseif($objCC->get('injectBelow') == '__beforeAll__')
				{
					$injectPos = 0;
				}
				elseif($objCC->get('injectBelow') == '__belowAll__')
				{
					$injectPos = count($GLOBALS['BE_MOD'][$strSection]);
				}
				else {}

				\Contao\ArrayUtil::arrayInsert($GLOBALS['BE_MOD'][$strSection], $injectPos,array($strAlias => $arrMOD));
				
				// set icon
				if($strIcon)
				{
					$GLOBALS['BE_MOD'][$strSection][$strAlias]['icon'] = $strIcon;
				}
			}
		}

		// backend module label
		$GLOBALS['TL_LANG']['MOD'][$strAlias][0] = isset($GLOBALS['TL_LANG']['MOD'][$strAlias][0]) ? $GLOBALS['TL_LANG']['MOD'][$strAlias][0] : $strTitle;
		$GLOBALS['TL_LANG']['MOD'][$strAlias][1] = 'Hello, I am: "'.$strTitle.'"';

		if($objCC->get('mode') == 'existing' || $blnIsChild)
		{
			$GLOBALS['TL_LANG']['MOD'][$strTable] = $strTitle;
		}
	}

	/**
	 * Add CustomCatalogs to Contaos DCA pickers
	 */
	public function addToDcaPicker()
	{
		// check if all requirements has been passed to initialize
		if(static::isReady() === false || static::isBackend() === false)
		{
			return;
		}
			
		$objCCs = CustomCatalogFactory::findAllActive();
		if($objCCs === null)
		{
			return;
		}

		$objContainer = \Contao\System::getContainer();
		$objFactory = $objContainer->get('contao.picker.builder');
		$objMenuFactory = $objContainer->get('knp_menu.factory');
		$objRouter = $objContainer->get('router');
		$objTranslator = $objContainer->get('translator');
		
		foreach($objCCs as $objCC)
		{
			if( empty($objCC->jumpTo) )
			{
				continue;
			}
			
			// set picker tab label
			$GLOBALS['TL_LANG']['MSC'][$objCC->title] = $objCC->title;

			$objProvider = new \Contao\Picker\CustomCatalogPickerProvider($objMenuFactory,$objRouter,$objTranslator);
			#$objProvider->setTokenStorage( $objContainer->get('security.token_storage') );
			$objProvider->strTable = $objCC->getTable();
			$objProvider->strName = $objCC->title;
			$objProvider->strBackendModule = static::getBackendModuleAlias($objCC->id);
			$objFactory->addProvider($objProvider);
		}
	}


//!-- General Methods

	/**
	 * Return boolean true when all requirements has been passed
	 * @return boolean
	 */
	public static function isReady()
	{
		// bypass
		if( isset($GLOBALS['PCT_CUSTOMCATALOG']['forceLoading']) )
		{
			return (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['forceLoading'];
		}
		// check if module is running and is activated and if database is up to date
		if( !\Contao\Database::getInstance()->tableExists('tl_pct_customcatalog') )
		{
			return false;
		}
		// front end is always ok
		else if( Controller::isFrontend() )
		{
			return true;
		}
		// user is logged in contao backend
		else if( Controller::isBackend() && static::isBackend() === true)
		{
			$objUser =  \Contao\BackendUser::getInstance();
			if($objUser->id < 1)
			{
				return false;
			}
			return true;
		}
		// user is in install tool
		else if( Controller::isBackend() && static::isInstallTool() === true)
		{
			return true;
		}
		// user is performing a database update
		else if( Controller::isBackend() && static::isDatabaseUpdate() === true)
		{
			return true;	
		}
		// forced loading
		else if( isset($GLOBALS['PCT_CUSTOMCATALOG']['loadDataContainer'][\Contao\Input::get('table')]) && $GLOBALS['PCT_CUSTOMCATALOG']['loadDataContainer'][\Contao\Input::get('table')] )
		{
			return true;
		}
		// loaded by popups
		else if(\Contao\Input::get('act') == 'show' || \Contao\Environment::get('isAjaxRequest') || \Contao\Input::get('switch') || \Contao\Input::get('popup'))
		{
			return true;
		}
		else 
		{
			return false;
		}
	}


	/**
	 * Return boolean true if install tool is running
	 * @return boolean
	 */
	public static function isInstallTool()
	{
		if(strlen(strpos(\Contao\Environment::get('scriptName'), '/contao/install.php')) > 0 || strlen(strpos(\Contao\Environment::get('requestUri'), '/contao/install')) > 0)
		{
			return true;
		}
		else if( strlen(strpos(\Contao\Environment::get('scriptName'), '/contao-manager.phar.php')) > 0 )
		{
			return true;
		}
		return false;
	}
	
	
	/**
	 * Return boolean true if backend is running
	 * @return boolean
	 */
	public static function isBackend()
	{
		if( Controller::isBackend() && !static::isInstallTool() )
		{
			return true;
		}
		return false;
	}


	/**
	 * Return boolean true if database update is processing
	 * @return boolean
	 */
	public static function isDatabaseUpdate()
	{
		if(\Contao\Input::get('update') || in_array(\Contao\Input::get('do'), array('repository_manager','composer')) || \Contao\Input::get('key') == 'db_update' )
		{
			return true;
		}
		else if( strlen(strpos(\Contao\Environment::get('scriptName'), '/contao-manager.phar.php')) > 0 )
		{
			return true;
		}
		else if( isset($GLOBALS['CC_DATABASE_UPDATE']) )
		{
			return (boolean)$GLOBALS['CC_DATABASE_UPDATE'];
		}
		return false;
	}


	/**
	 * Return the system columns as array
	 * @return array
	 */
	public static function getSystemColumns()
	{
		return !is_array($GLOBALS['PCT_CUSTOMCATALOG']['systemColumns']) ?: array('id','pid','tstamp','sorting','ptable') ;
	}


	/**
	 * Load a set of language files
	 * @param string
	 * called from loadDataContainer HOOK
	 */
	public static function loadLanguageFiles()
	{
		if( Controller::isFrontend() )
		{
			return;
		}

		ControllerHelper::callstatic('loadLanguageFile',array('tl_content'));
		ControllerHelper::callstatic('loadLanguageFile',array('tl_article'));
		ControllerHelper::callstatic('loadLanguageFile',array('tl_module'));
		ControllerHelper::callstatic('loadLanguageFile',array('default'));
		ControllerHelper::callstatic('loadLanguageFile',array('modules'));
		ControllerHelper::callstatic('loadLanguageFile',array('tl_pct_customcatalog'));
		ControllerHelper::callstatic('loadLanguageFile',array('exception'));
	}


// ! -- [loadDataContainer] Callback


	/**
	 * Load a customcatalog directly to the dca
	 * @param string
	 * called from loadDataContainer HOOK
	 */
	public function loadCustomCatalog($strTable,$blnForced=false)
	{
		// check if module is running and is activated and if database is up to date
		if(static::isReady() === false)
		{
			return;
		}
		
		$arrCCs = array();
		if(CustomCatalogFactory::validateByTableName($strTable))
		{
			$arrCCs = CustomCatalogFactory::findMultipleByTableName($strTable);
		}
		
		if( empty($arrCCs) === true )
		{
			return;
		}

		// load the DataContainer for popups
		if(\Contao\Input::get('act') == 'show' || \Contao\Environment::get('isAjaxRequest') || \Contao\Input::get('switch') || \Contao\Input::get('popup'))
		{
			$blnForced = true;
		}
		// forced
		else if(isset($GLOBALS['PCT_CUSTOMCATALOG']['loadDataContainer'][$strTable]))
		{
			$blnForced = true;
			unset($GLOBALS['PCT_CUSTOMCATALOG']['loadDataContainer'][$strTable]);
		}
		// existing tables
		else if( isset($GLOBALS['loadDataContainer'][$strTable]) && (boolean)$GLOBALS['loadDataContainer'][$strTable] === true)
		{
			$blnForced = true;
		}

		// brute force load existing and manageable tables
		foreach($arrCCs as $i => $objCC)
		{
			// skip inactive
			if( (boolean)$objCC->active === false )
			{
				// remove from further processing	
				unset( $arrCCs[$i] );

				continue;
			}

			// extend existing tables
			if( $objCC->existingTable == $strTable )
			{
				$this->initSystem( $objCC->id );
				// remove from further processing	
				unset( $arrCCs[$i] );
			}
		}

		if( empty($arrCCs) === true )
		{
			return;
		}

		// force loading. e.g. usefull when called from the front end
		if($blnForced)
		{
			foreach($arrCCs as $objCC)
			{
				// skip inactive
				if( (boolean)$objCC->active === false )
				{
					continue;
				}
				$this->initSystem( $objCC->id );
			}
		}
	}


	/**
	 * Load the DCA of a custom catalog by tablename or ID
	 * @param mixed  TableName of ID
	 */
	public function loadDCA($varValue,$blnCached=false)
	{
		// by table name
		if(is_string($varValue) && !is_numeric($varValue))
		{
			$this->initSystem( CustomCatalogFactory::findByTableName($varValue)->id );
		}
		else if(is_numeric($varValue) || is_integer($varValue))
		{
			$this->initSystem($varValue);
		}
	}


	/**
	 * Find all tables recursivly
	 * @param array
	 * @return array
	 */
	public static function findAllTables($varTable,$arrReturn=array())
	{
		if(!is_array($varTable))
		{
			$varTable = array($varTable);
		}

		if(count($varTable) < 1)
		{
			return $arrReturn;
		}

		$blnRecursive = false;

		$tmp = array();
		foreach($varTable as $strTable)
		{
			#// tl_content configurations
			#if(strlen(strpos($strTable, '::')) > 0)
			#{
			#	$split = explode('::', $strTable);
			#	$strTable = $split[0];
			#}
			
			if(!in_array($strTable, $arrReturn))
			{
				$arrReturn[] = $strTable;
			}

			$objCC = CustomCatalogFactory::fetchByTableName($strTable);
			if( $objCC === null )
			{
				continue;
			}


			$cTables = StringUtil::deserialize($objCC->cTables) ?: array();
			if(count($cTables) > 0)
			{
				$tmp = array_merge($tmp,$cTables);
				$blnRecursive = true;
			}

			if($objCC->moreTables)
			{
				$tmp = array_merge($tmp, StringUtil::deserialize($objCC->tables) ?: array() );
				$blnRecursive = true;
			}

			if($blnRecursive)
			{
				return static::findAllTables($tmp,$arrReturn);
			}
		}

		return $arrReturn;
	}


	/**
	 * List of unsave or reserved sql words
	 * @return array
	 */
	public static function getReservedWords()
	{
		$arrReturn = array( 'KEY', 'GROUP', 'ADD', 'ALL', 'ALLOCATE', 'ALTER', 'AND', 'ANY', 'ARE', 'AS', 'ASC', 'ASSERTION', 'AT', 'AUTHORIZATION', 'AVG', 'BEGIN', 'BETWEEN', 'BIT', 'BOOLEAN', 'BOTH', 'BY', 'CALL', 'CASCADE', 'CASCADED', 'CASE', 'CAST', 'CHAR', 'CHARACTER', 'CHECK', 'CLOSE', 'COLLATE', 'COLLATION', 'COLUMN', 'COMMIT', 'CONNECT', 'CONDITION', 'CONNECTION', 'CONSTRAINT', 'CONSTRAINTS', 'CONTINUE', 'CONVERT', 'CORRESPONDING', 'COUNT', 'CREATE', 'CURRENT', 'CURRENT_DATE', 'CURRENT_TIME', 'CURRENT_TIMESTAMP', 'CURRENT_USER', 'CURSOR', 'DEALLOCATE', 'DEC', 'DECIMAL', 'DECLARE', 'DEFERRABLE', 'DEFERRED', 'DELETE', 'DESC', 'DESCRIBE', 'DIAGNOSTICS', 'DISCONNECT', 'DISTINCT', 'DOUBLE', 'DROP', 'ELSE', 'END', 'ENDEXEC', 'ESCAPE', 'EXCEPT', 'EXCEPTION', 'EXEC', 'EXECUTE', 'EXISTS', 'EXPLAIN', 'EXTERNAL', 'FALSE', 'FETCH', 'FIRST', 'FLOAT', 'FOR', 'FOREIGN', 'FOUND', 'FROM', 'FULL', 'FUNCTION', 'GET', 'GET_CURRENT_CONNECTION', 'GLOBAL', 'GO', 'GOTO', 'GRANT', 'GROUP', 'HAVING', 'HOUR', 'IDENTITY', 'IMMEDIATE', 'IN', 'INDICATOR', 'INITIALLY', 'INNER', 'INOUT', 'INPUT', 'INSENSITIVE', 'INSERT', 'INT', 'INTEGER', 'INTERSECT', 'INTO', 'IS', 'ISOLATION', 'JOIN', 'KEY', 'LAST', 'LEFT', 'LIKE', 'LONGINT', 'LOWER', 'LTRIM', 'MATCH', 'MAX', 'MIN', 'MINUTE', 'NATIONAL', 'NATURAL', 'NCHAR', 'NVARCHAR', 'NEXT', 'NO', 'NOT', 'NULL', 'NULLIF', 'NUMERIC', 'OF', 'ON', 'ONLY', 'OPEN', 'OPTION', 'OR', 'ORDER', 'OUT', 'OUTER', 'OUTPUT', 'OVERLAPS', 'PAD', 'PARTIAL', 'PREPARE', 'PRESERVE', 'PRIMARY', 'PRIOR', 'PRIVILEGES', 'PROCEDURE', 'PUBLIC', 'READ', 'REAL', 'REFERENCES', 'RELATIVE', 'RESTRICT', 'REVOKE', 'RIGHT', 'ROLLBACK', 'ROWS', 'RTRIM', 'SCHEMA', 'SCROLL', 'SECOND', 'SELECT', 'SESSION_USER', 'SET', 'SMALLINT', 'SOME', 'SPACE', 'SQL', 'SQLCODE', 'SQLERROR', 'SQLSTATE', 'SUBSTR', 'SUBSTRING', 'SUM', 'SYSTEM_USER', 'TABLE', 'TEMPORARY', 'TIMEZONE_HOUR', 'TIMEZONE_MINUTE', 'TO', 'TRAILING', 'TRANSACTION', 'TRANSLATE', 'TRANSLATION', 'TRUE', 'UNION', 'UNIQUE', 'UNKNOWN', 'UPDATE', 'UPPER', 'USER', 'USING', 'VALUES', 'VARCHAR', 'VARYING', 'VIEW', 'WHENEVER', 'WHERE', 'WITH', 'WORK', 'WRITE', 'XML', 'XMLEXISTS', 'XMLPARSE', 'XMLSERIALIZE', 'YEAR', );

		if(!empty($GLOBALS['PCT_CUSTOMCATALOG']['reservedWords']) && is_array($GLOBALS['PCT_CUSTOMCATALOG']['reservedWords']))
		{
			$arrReturn = array_unique( array_merge($arrReturn,$GLOBALS['PCT_CUSTOMCATALOG']['reservedWords']) );
		}

		return $arrReturn;
	}


//! -- Caching

	
	/**
	 * Fill the Cache for a CC
	 * @param integer	The ID of the CC config
	 */
	public static function fillCache($intConfig)
	{
		if($GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'] === true)
		{
			return;
		}

		if( !isset($GLOBALS['PCT_CUSTOMCATALOG']['isCached'][$intConfig]) )
		{
			$GLOBALS['PCT_CUSTOMCATALOG']['isCached'][$intConfig] = false;
		}

		// caching already done
		if((boolean)$GLOBALS['PCT_CUSTOMCATALOG']['isCached'][$intConfig] === true)
		{
			return;
		}
		
		// create the CE and CC object
		$objCC = CustomCatalogFactory::findById($intConfig);
		$objCE = CustomElementFactory::findById($objCC->pid);

		if($objCE === null || $objCC === null)
		{
			return;
		}
		
		// register the contao model class for new CC tables
		if(!isset($GLOBALS['TL_MODELS'][$objCC->getTable()]) && $objCC->get('mode') == 'new')
		{
			$GLOBALS['TL_MODELS'][$objCC->getTable()] = 'Contao\ContaoModel';
		}

		Cache::addCustomCatalog( $objCC->getTable(),$objCC);
		Cache::addCustomCatalog($objCC->get('id'),$objCC);
		Cache::addCustomElement($objCE->get('id'),$objCE);
		Cache::addCustomElement($objCE->get('alias'),$objCE);
		$arrCache = Cache::getData();

		// attributes: look up from cache
		$objAttributes = AttributeFactory::fetchAllByCustomElement($objCE->id);

		// groups: look up from cache
		$objGroups = Cache::getDatabaseResult('GroupFactory::fetchAllByCustomElement',$objCE->id);
		if(!$objGroups)
		{
			// add groups to the cache
			$objGroups = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid=? ORDER BY sorting")->execute($objCE->id);

			// add this query to the cache
			Cache::addDatabaseResult('GroupFactory::fetchAllByCustomElement',$objCC->get('pid'),$objGroups);
		}
		
		if($objAttributes !== null)
		{
			$objAttributes->reset();

			while($objAttributes->next())
			{
				$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($objAttributes->id);
				if($objAttribute === null)
				{
					continue;
				}

				// since we have all information set objects
				$objAttribute->set('objCustomElement',$objCE);
				$objAttribute->set('objCustomCatalog',$objCC);
				
				$strAlias = $objAttribute->get('alias');

				// in group sets we have individual attributes but with identical alias
				$objGroup = $arrCache['GROUP'][$objAttributes->pid];
				if($objGroup)
				{
					if(strlen($objGroup->get('selector')) > 0)
					{
						$strAlias .= '::'.$objGroup->get('selector');
					}
				}

				Cache::addAttribute($objAttribute->get('id'),$objAttribute);
				Cache::addAttribute('ce_'.$objCE->get('id').'_'.$strAlias,$objAttribute);
				Cache::addAttribute('cc_'.$objCC->get('id').'_'.$strAlias,$objAttribute);
				Cache::addAttribute('cc_'.$objCC->getTable().'_'.$strAlias,$objAttribute);

				// generic option fields should be referenced to the regular attribute
				$arrOptions = StringUtil::deserialize($objAttribute->get('options'));
				if(!empty($arrOptions) && is_array($arrOptions))
				{
					foreach($arrOptions as $strOption)
					{
						if( \is_array($strOption) )
						{
							continue;
						}

						Cache::addAttribute('ce_'.$objCE->get('id').'_'.$strAlias.'['.$strOption.']',$objAttribute);
						Cache::addAttribute('cc_'.$objCC->get('id').'_'.$strAlias.'['.$strOption.']',$objAttribute);
						Cache::addAttribute('cc_'.$objCC->getTable().'_'.$strAlias.'['.$strOption.']',$objAttribute);
					}
				}

				// orderSRC_ fields
				if($objAttribute->get('sortBy'))
				{
					$strAlias = 'orderSRC_'.$strAlias;

					Cache::addAttribute('ce_'.$objCE->get('id').'_'.$strAlias,$objAttribute);
					Cache::addAttribute('cc_'.$objCC->get('id').'_'.$strAlias,$objAttribute);
					Cache::addAttribute('cc_'.$objCC->getTable().'_'.$strAlias,$objAttribute);
				}
			}
		}
		
		// flag
		$GLOBALS['PCT_CUSTOMCATALOG']['isCached'][$intConfig] = true;
	}


//!-- Event Listener registration

	/**
	 * Register EventListeners
	 * @return void 
	 */
	public function registerEventListeners()
	{
		if( version_compare(ContaoCoreBundle::getVersion(),'5.0','<') )
		{
			return;
		}

		$objContainer = System::getContainer();
		$objEventDispatcher = $objContainer->get('event_dispatcher');
		// register sitemap event listener
		$objEventDispatcher->addListener('contao.sitemap',array('PCT\CustomCatalog\EventListener\SitemapListener','invoke'));
	}

}