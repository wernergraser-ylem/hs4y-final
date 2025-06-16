<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */


/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration as BackendIntegration;
use PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory as AttributeFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;

/**
 * Class file
 * InsertTags
 */
class InsertTags extends \Contao\Controller
{
	/**
	 * Custom catalog object
	 * @param object
	 */
	protected $objCustomCatalog = null;
	
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance()
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static();
		}

		return static::$objInstance;
	}
	
	
	/**
	 * Replace CustomCatalog related inserttags
	 *
	 * @param string
	 * @return mixed 
	 */
	public function replaceTags($strTag)
	{
		$arrElements = explode('::', $strTag);
		switch($arrElements[0])
		{
			case 'customcataloglist':
				// total_per_page
				if($arrElements[1] == 'total_per_page')
				{
					$objModule = \Contao\ModuleModel::findByPk($arrElements[2]);
					if($objModule === null)
					{
						return false;
					}
					
					$objCC = CustomCatalogFactory::findByModule( $objModule );
					$objFilterCollection = \PCT\CustomElements\Core\FilterFactory::createCollectionByFilterset( \Contao\StringUtil::deserialize($objModule->customcatalog_filtersets) );
					
					// add a dynamic filter for the custom where clause
					if(strlen($objModule->customcatalog_sqlWhere) > 0)
					{
						$where = trim(InsertTags::getInstance()->replaceCustomCatalogInsertTags(\Contao\StringUtil::decodeEntities($this->customcatalog_sqlWhere),$objCC));
						$objWhereFilter = new \PCT\CustomElements\Filters\SimpleFilter();
						$options = array
						(
							'column'	=> 'id',
							'where'		=> $where,
						);
						$objWhereFilter->setOptions($options);
						$objFilterCollection->add($objWhereFilter);
					}
					
					// filter by active language
					if($objModule->customcatalog_filter_actLang && (boolean)$objCC->get('multilanguage') == true)
					{
						$objLanguageFilter = new \PCT\CustomElements\Filters\LanguageSwitch();
						$objLanguageFilter->setTable($this->customcatalog);
						$strLanguage = str_replace('-','_',$GLOBALS['TL_LANGUAGE']);
						
						// apply filter only if no manual language switch is aktive
						if(!$objLanguageFilter->getLanguage() || $objLanguageFilter->getLanguage() == $strLanguage )
						{
							$objLanguageFilter->setLanguage($strLanguage);
							$objLanguageFilter->filterActiveLanguage = true;
							$objFilterCollection->add($objLanguageFilter);
						}
					}
					
					// set the filters
					$objCC->setFilters($objFilterCollection);
					
					// total number of items
					$intTotal = $objCC->getTotal();
						
					// Pagination (basically the same as \Contao\ModuleNewslist)
					$intPerPage = $objModule->customcatalog_perPage;
					// handle dynamic page breaks
					if(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlPerPageParameter'].$objModule->id) > 0)
					{
						$intPerPage = \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlPerPageParameter'].$objModule->id);
					}
					
					$min = 1;
					$max = $intPerPage;
					
					if($intPerPage > 0 && $intPerPage < $intTotal)
					{
						$offset = $objModule->customcatalog_offset;
						$total = $intTotal - $offset;
						$limit = null;
						
						if ($objModule->customcatalog_limit > 0)
						{
							$total = min($objModule->customcatalog_limit, $total);
						}
					
						$page = \Contao\Input::get( $GLOBALS['PCT_CUSTOMCATALOG']['urlPaginationParameter'].$objModule->id ) ? : 1;
						
						$limit = $intPerPage;
						$offset += (max($page, 1) - 1) * $intPerPage;
						$skip = intval($this->customcatalog_offset);
						
						if ($offset + $limit > $total + $skip)
						{
							$limit = $total + $skip - $offset;
						}
						
						if($page > 0)
						{
							$limit = $limit * $page;
						}
						
						$min = $offset + 1;
						$max = $min + $intPerPage - 1;
					}
					
					if($max > $intTotal || $intPerPage > $intTotal)
					{
						$max = $intTotal;
					}
					
					if($intTotal < 1)
					{
						$min = 0;
						$max = 0;
					}
								
					return sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['total_per_page'],$min, $max);
				}
				
				break;
			case 'sql':
				if( Controller::isFrontend() )
				{
					return false;
				}
				
				$objResult = \Contao\Database::getInstance()->prepare($arrElements[1])->execute();
				if($objResult->numRows < 1)
				{
					return false;
				}
				$field = (strlen($arrElements[2]) > 0 ? trim($arrElements[2]) : 'id');
				$arrReturn = array();
					
				while($objResult->next())
				{
					$value = \Contao\StringUtil::deserialize($objResult->$field);
					if(is_array($value))
					{
						$value = implode(',', $value);
					}
					$arrReturn[] = $value;
				}
				return implode(',', $arrReturn);
				break;
			// !backend contao defaults
			case 'be_user':
				if(!$arrElements[2])
				{
					$this->import('BackendUser','User');
					return $this->User->{$arrElements[1]};
				}
				
				if(is_numeric($arrElements[1]))
				{
					$strWhere = 'id=?';
				}
				else
				{
					$strWhere = 'username=?';
				}
				
				$objUser = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_user WHERE ".$strWhere)->limit(1)->execute($arrElements[1]);
				
				return $objUser->$arrElements[2];
				break;
			// !cc, cc_url
			case 'cc':
			case 'cc_url':
				// backend custom catalog inserttags
				if( Controller::isBackend() )
				{
					$objCC = $this->objCustomCatalog;
					if(!$objCC)
					{
						return false;
					}
					switch($arrElements[1])
					{
						case 'table':
							return $objCC->getTable();
							break;
						default:
							return false;
							break;
					}
				}

				// check if first element is a table / cc
				$varCC = $arrElements[1];
				if(is_numeric($varCC))
				{
					$objCC = CustomCatalogFactory::findById($varCC);
				}
				else if(is_string($varCC) && !is_numeric($varCC))
				{
					$objCC = CustomCatalogFactory::findByTableName($varCC);
				}

				if( $objCC !== null )
				{
					if( \Contao\Database::getInstance()->tableExists( $objCC->getTable() ) === false  )
					{
						return false;
					}

					// inject page id by cc config
					\Contao\ArrayUtil::arrayInsert($arrElements,1,array($objCC->jumpTo));
				}
				
				$varPage = $arrElements[1];
				$varCC = $arrElements[2];
				$varEntry = $arrElements[3];
					
				if(is_numeric($varCC))
				{
					$objCC = CustomCatalogFactory::findById($varCC);
				}
				else if(is_string($varCC) && !is_numeric($varCC))
				{
					$objCC = CustomCatalogFactory::findByTableName($varCC);
				}

				if( $objCC === null )
				{
					return false;
				}

				// respect language
				$strLanguage = '';
				if( $objCC->get('multilanguage') )
				{
					$strLanguage = Multilanguage::getActiveFrontendLanguage();
				}

				// find entry
				$objEntry = $objCC->findPublishedItemByIdOrAlias($varEntry,$strLanguage);
				// build detail link
				$objJumpTo = \Contao\PageModel::findPublishedByIdOrAlias( $varPage );

				$objModule = new \stdClass;
				$objModule->customcatalog_jumpTo = $objJumpTo->id;
				$objCC->setOrigin( $objModule );
				
				$arrLinks = $objCC->prepareDetailsLinks($objEntry);
				
				$objAliasSource = null;
				if( $objCC->getAliasField() )
				{
					$objAliasAttribute = AttributeFactory::findByCustomCatalog( $objCC->getAliasField(), $objCC->id );
					$objAliasSource = AttributeFactory::findById( $objAliasAttribute->aliasSource );
				}

				$strLink = $arrElements[2];
				if( $objAliasSource !== null )
				{
					$strLink = $objEntry->{$objAliasSource->alias};
				}

				$strReturn = '';
				// return prebuild link
				if( $arrElements[0] == 'cc' )
				{
					$strReturn =  sprintf('<a href="%s" title="%s">%s</a>',$arrLinks['detail']['url'],$varEntry,$strLink);
				}
				else if( $arrElements[0] == 'cc_url' )
				{
					$strReturn = $arrLinks['detail']['url'];
				}

				return $strReturn;
			break;
			// customcatalog inserttags
			case 'pct_customcatalog':
			case 'customcatalog':
				
				$objCC = null;
				if(Cache::getCustomCatalog($arrElements[1]))
				{
					$objCC = Cache::getCustomCatalog($arrElements[1]);
				}
				else
				{
					if(is_numeric($arrElements[1]))
					{
						$objCC = CustomCatalogFactory::findById($arrElements[1]);
					}
					else if(is_string($arrElements[1]) && !is_numeric($arrElements[1]))
					{
						$objCC = CustomCatalogFactory::findByTableName($arrElements[1]);
					}
				}
				
				if(!$objCC)
				{
					return false;
				}
				
				$strAliasField = $objCC->getAliasField();
				$strTable = $objCC->get('tableName');
				$strField = $arrElements[3] ?? '';
				$strRenderer = $arrElements[4] ?? '';
				
				// fetch the item and its value
				switch($arrElements[2])
				{
					case 'total':
						// simulate a frontend module
						$objModule = new \StdClass;
						$objModule->customcatalog_filter_showAll = true;
						$objCC->setOrigin($objModule);
						
						// add filtersets
						if($arrElements[3])
						{
							$objFilterCollection = \PCT\CustomElements\Core\FilterFactory::createCollectionByFilterset( explode(',',$arrElements[3]) );
							// set the filters
							$objCC->setFilters($objFilterCollection);
						}
						
						return $objCC->getTotal();
						break;
					// reverse total, returns 0 if list is empty
					case 'rtotal':
						// simulate a frontend module
						$objModule = new \StdClass;
						$objModule->customcatalog_filter_showAll = false;
						$objCC->setOrigin($objModule);
						
						// add filtersets
						if($arrElements[3])
						{
							$objFilterCollection = \PCT\CustomElements\Core\FilterFactory::createCollectionByFilterset( explode(',',$arrElements[3]) );
							// set the filters
							$objCC->setFilters($objFilterCollection);
						}
						
						return $objCC->getTotal();
						break;
					// read entry data on detail pages
					case 'autoitem':
						
						if($objCC->mode == 'existing')
						{
							$strTable = $objCC->get('existingTable');
						}
						
						$item = \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'],false,true);
						if(strlen($item) < 1 && isset($_GET['auto_item']))
						{
							$item = $_GET['auto_item'];
						}
						
						$objRow = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE ".(strlen($strAliasField) > 0 ? $strAliasField."=?" : 'id=?'))->limit(1)->execute($item);
						
						break;				
					default:
						$objRow = null;
						$objDatabase = \Contao\Database::getInstance();
						
						// fetch by id	
						if(is_numeric($arrElements[2]))
						{
							$objRow = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($arrElements[2]);
						}
						// fetch by alias
						else if(is_string($arrElements[2]) && !is_numeric($arrElements[2]) && strlen($strAliasField) > 0)
						{
							$objRow = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE ".$strAliasField."=?")->limit(1)->execute($arrElements[2]);
						}
						
						break;
				}
				
				if($objRow->numRows < 1)
				{
					return '';
				}
				
				$varValue = $objRow->{$strField};
				
				if(strlen($strRenderer) < 1)
				{
					return $varValue;
				}
				
				$objAttribute = AttributeFactory::findByAlias($strField);
				$objAttribute->setValue($varValue);
				$objAttribute->set('objActiveRecord',$objRow);
				$objAttribute->objCustomCatalog = $objCC;
				
				$strBuffer = '';
				switch($strRenderer)
				{
					case 'html': 
					case 'render':
						$objCallbacks = new \PCT\CustomElements\Plugins\CustomCatalog\Attributes\AttributeCallbacks();
						$strBuffer = $objCallbacks->renderAttribute($strField,$varValue,null,$objAttribute);
						break;
					case 'label':
						if( $objAttribute->hasTranslation($varValue) )
						{
							$strBuffer = $objAttribute->getTranslatedValue($varValue);
						}
						else
						{
							$arrOptions = \Contao\StringUtil::deserialize( $objAttribute->get('options') ) ?? array();
							foreach($arrOptions as $option)
							{
								if( isset($option['value']) && $option['value'] == $varValue )
								{
									$strBuffer = trim($option['label']);
									break;
								}
							}
						}
						break;
					default:
						$strBuffer = $varValue;
						break;
				}
				
				$strBuffer = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($strBuffer);

				return $strBuffer;
				
				break;
			// debugger
			case 'pct_customcatalog_debug':
			case 'customcatalog_debug':
				switch($arrElements[1])
				{
					case 'time':
							return $GLOBALS['PCT_CUSTOMCATALOG']['process']['time'];
					case 'attributes':
						return $GLOBALS['PCT_CUSTOMCATALOG']['process']['attributes'];
					case 'count':
					case 'customcatalogs':
						return $GLOBALS['PCT_CUSTOMCATALOG']['process']['customcatalogs'];
					default:
						return false;
						break;
				}
				break;
			// filter urls	
			case 'customcatalog_filterurl':
				$intCC = $arrElements[1];
				
				if(is_string($intCC) && !is_numeric($intCC))
				{
					$objCC = CustomCatalogFactory::findByTableName($intCC);
					$intCC = $objCC->id;
				}
								
				$arrSession = \Contao\System::getContainer()->get('request_stack')->getSession()->get($GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName']);
				if(!empty($arrSession[$intCC]) && is_array($arrSession[$intCC]))
				{
					return $arrSession[$intCC]['CURRENT']['url'];
				}
				else if(strlen(\Contao\Environment::get('queryString')) > 0)
				{
					return \Contao\Environment::get('queryString');
				}
				
				break;
			case 'table':
				if(!$this->objCustomCatalog)
				{
					return false;
				}
				return $this->objCustomCatalog->getTable();
				break;
			
			// related or related to statements
			case 'related':
			case 'relatedto':
				// fetch the catalog config
				$varCC = $arrElements[1];
				if(is_string($varCC) && !is_numeric($varCC))
				{
					$objCC = CustomCatalogFactory::fetchByTableName($varCC);
					$varCC = $objCC->id;
				}
				
				// fetch the related source attribute
				$varAttr = $arrElements[2];
				if(is_string($varAttr) && !is_numeric($varAttr))
				{
					$objAttribute = AttributeFactory::fetchByAlias($varAttr);
					$varAttr = $objAttribute->id;
				}
				
				$objFilterRelated = new \PCT\CustomElements\Filters\RelatedItems();
				$objFilterRelated->set('config_id',$varCC);
				$objFilterRelated->set('attr_id',$varAttr);
				
				return "'".implode(',', $objFilterRelated->findMatchingIds() )."'";
				
				break;
			// Inputs
			case 'input':
				$varReturn = null;	
				switch($arrElements[1])
				{
					case 'get':
						$varReturn = \Contao\Input::get( $arrElements[2] );
						break;
					case 'post':
						$varReturn = \Contao\Input::post( $arrElements[2] );
						break;
					case 'cookie':
						$varReturn = \Contao\Input::cookie( $arrElements[2] );
						break;
					default:
						// bypass inserttag
						return false;
						break;
				}
				
				// default return value	
				if( empty($varReturn) && !empty($arrElements[3]) )
				{
					$varReturn = $arrElements[3];
				}					
				
				return $varReturn;
				
			default:
				if(!$this->objCustomCatalog)
				{
					return false;
				}
				
				$strTable = $this->objCustomCatalog->getTable();
				
				// check if inserttag is an attribute
				$objAttribute = AttributeFactory::findByCustomCatalog($arrElements[0],$this->objCustomCatalog->get('id'));
				
				if(!$objAttribute)
				{
					return false;
				}
				
				$strField = $objAttribute->get('alias');
				$arrFieldDef = $objAttribute->getFieldDefinition();
				
				$objResult = \Contao\Database::getInstance()->prepare("SELECT id,".$strField." FROM ".$strTable)->execute();
				if($objResult->numRows < 1)
				{
					return '';
				}
				
				$searchValue = (isset($arrElements[1]) ? true : false);
				
				$searchValues = array();
				if($searchValue)
				{
					$searchValues = explode(',', $arrElements[1]);
				}
				
				$arrMatch = array(); 
				
				// search for value
				// convert blob data to comma list
				if($objAttribute->get('saveDataAs') == 'blob' || strlen(strpos(strtolower($arrFieldDef['sql']),'blob')) > 0)
				{
					$arrIds = array();
					$arr = array();
					while($objResult->next())
					{
						$values = \Contao\StringUtil::deserialize($objResult->{$strField});
						if(!is_array($values))
						{
							$values = explode(',', $values);
						}
						
						if(array_intersect($values, $searchValues))
						{
							$arrIds[] = $objResult->id;
						}
						
						$arr = array_merge($arr,$values);
					}
					
					if(count($arr) < 1 && count($arrIds) < 1)
					{
						return '';
					}
					
					if(!$searchValue)
					{
						$str = "'".implode(',', array_filter(array_unique($arr)))."'";
					}
					else
					{
						if(count($arrIds) < 1)
						{
							return '';
						}
						$str = 'id IN('.implode(',', $arrIds).')';
					}
					
					return $str;
				}
				
				return false;
				break;
		}
		return false;
	}
	

	/**
	 * Replace hash inserttags
	 *
	 * @param string
	 * @return mixed
	 */
	public function replaceHashTags($strTag)
	{
		$arrElements = explode('::', $strTag);
		switch($arrElements[0])
		{
			// render backend navigation for a custom catalog
			case 'be_cc_navigation':
				if(!$arrElements[1])
				{
					return false;
				}
				
				$strCE = $arrElements[1];
				$intConfig = $arrElements[2];
				
				$objMenu = new \PCT\CustomElements\Plugins\CustomCatalog\Backend\Quickmenu();
				
				return $objMenu->render($intConfig);
				break;
			// render the language panel in edit view
			case 'form_panel_language':
				if(!$arrElements[1])
				{
					return false;
				}
				
				$strTable = $arrElements[1];
				$objDC = new \StdClass;
				$objDC->table = $strTable;
				
				$objBackendHelper = new BackendIntegration();
				$strPanel = $objBackendHelper->languagePanel($objDC);
				
				$objTemplate = new \Contao\BackendTemplate('be_cc_languagepanel');
				$objTemplate->action = \Contao\Environment::get('request');
				$objTemplate->token = \Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
				$objTemplate->panels = array('language'=>$strPanel);
				return $objTemplate->parse();
				break;
			
			default:
				return false;
				break;
		}
		
		return false;
	}


	/**
	 * Replace custom catalog backend inserttags
	 * @param string
	 * @param object
	 * @return string
	 */
	public function replaceCustomCatalogInsertTags($strText,$objCustomCatalog)
	{
		$this->objCustomCatalog = $objCustomCatalog;
		
		$strReturn = $this->replaceTags($strText);
		if( empty($strReturn) || \strpos($strReturn,'{{') )
		{
			$strReturn = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($strText);
		}
		return $strReturn;
	}
}