<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
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

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder as QueryBuilder;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Core\FilterFactory as FilterFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\InsertTags as InsertTags;
use PCT\CustomElements\Plugins\CustomCatalog\Core\FrontendTemplate as FrontendTemplate;
use PCT\CustomElements\Core\TemplateAttribute as TemplateAttribute;
use PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory as CustomCatalogAttributeFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;

/**
 * Class
 * CustomCatalog
 */
class CustomCatalog extends \PCT\CustomElements\Plugins\CustomCatalog\Core\Controller
{
	/**
	 * Filter array
	 * @var array
	 */
	protected $arrFilters = array();
	
	/**
	 * Sql limit value
	 * @var integer
	 */
	protected $intLimit = 0;
	
	/**
	 * Sql offset value
	 * @var integer
	 */
	protected $intOffset = 0;
	
	/**
	 * The parent custom element
	 * @param object
	 */
	protected $objCustomElement = null;
	
	/**
	 * Sql order field
	 * @var string
	 */
	protected $strSortField = '';
	
	/**
	 * Sql order direction
	 * @var string
	 */
	protected $strSortOrder = '';
	
	/**
	 * Sql sorting/order array
	 * @var array
	 */
	protected $arrSorting = array();
	
	/**
	 * Array of visible fields/attributes
	 * @var array
	 */
	protected $arrVisibles = array();
	
	/**
	 * Current language
	 * @var string
	 */
	protected $strLanguage = '';
	
	/**
	 * Default visible fields
	 */
	protected $arrDefaultVisibles = array('id','pid');
	
	
	/**
	 * Return the parent customelement as object
	 * @return object	CustomElement
	 */
	public function getCustomElement()
	{
		if($this->get('objCustomElement'))
		{
			return $this->get('objCustomElement');
		}
		
		return CustomElementFactory::findById($this->get('pid'));
	}
	
	
	/**
	 * Generate a custom catalog
	 * @return object	CustomCatalog
	 */
	public function generate()
	{
		// get the custom element
		$objCE = $this->getCustomElement();
		$this->set('objCustomElement',$objCE);
		
		// do the work
		$this->prepare();
		
		return $this;
	}
	
	
	/**
	 * Prepare the model, generate all filters etc. and return the database result as object
	 * @return object	Database Statement
	 */
	public function prepare()
	{
		if(!$this->isModified('arrOptions'))
		{
			$arrOptions = $this->getQueryOption();
			// set the options
			$this->setOptions($arrOptions);
		}
		
		// prepareCatalog Hook
		$arrOptions = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('prepareCatalogHook',array($this->getOptions(),$this));
		
		$objResult = $this->getResult($arrOptions);
		
		// log the query
		if($GLOBALS['PCT_CUSTOMCATALOG']['debug'])
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info($objResult->__get('query'));
		}
		
		return $objResult;
	}
	
	
	/**
	 * Render a custom catalog in the frontend
	 * @return string
	 */
	public function render()
	{
		$process_start = 0;
		if($GLOBALS['PCT_CUSTOMCATALOG']['debug'])
		{
			if( !isset($GLOBALS['PCT_CUSTOMCATALOG']['process']['attributes']) )
			{
				$GLOBALS['PCT_CUSTOMCATALOG']['process']['attributes'] = 0;
			}
			if( !isset($GLOBALS['PCT_CUSTOMCATALOG']['process']['time']) )
			{
				$GLOBALS['PCT_CUSTOMCATALOG']['process']['time'] = 0;
			}
			if( !isset($GLOBALS['PCT_CUSTOMCATALOG']['process']['customcatalogs']) )
			{
				$GLOBALS['PCT_CUSTOMCATALOG']['process']['customcatalogs'] = 0;
			}
			// start time measurement
			$process_start = microtime(true);
		}
		
		// generate the custom catalog
		$objResult = $this->prepare();
		
		$objTemplate = new FrontendTemplate($this->getLayoutTemplate());
		$objTemplate->setData($this->getData());
		
		$objTemplate->raw = $this;
		$objTemplate->result = $objResult;
		$objTemplate->count = $objResult->numRows;	
		
		$arrCssID = \Contao\StringUtil::deserialize($this->getCustomElement()->get('cssID'));
		$objTemplate->cssID = $arrCssID[0] ? 'id="'.$arrCssID[0].'"' : '';
		
		$arrClasses = explode(' ', $arrCssID[1]);
		$arrClasses[] = $this->getTable();
		$objTemplate->class = implode(' ', array_filter(array_unique($arrClasses),'strlen') );;
		
		if($objResult->numRows < 1)
		{
			$objTemplate->empty = $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['empty'];
			return $objTemplate->parse();
		}
		
		// return the database result only 
		if($this->getOrigin()->customcatalog_raw)
		{
			return $objTemplate->parse();
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$arrEntries = array();
		$arrCache = Cache::getData();
		$arrVisibles = $this->getVisibles();
		$strAliasField = $this->getAliasField();
		
		$arrGroupsAssoc = array();
		$arrOrderGroups = array();
		$arrOrderFields = array();

		
		$i = 0;
		while($objResult->next())
		{
			$arrFields = array();
			$arrFieldsAssoc = array();
			$arrOrderSRC = array();
			
			// @var object Model
			$objRow = new \Contao\ContaoModel($objResult);
			$objRow->setTable( $this->getTable() );
			$objRow->numRows = 1;
			$arrRow = $objRow->row();
			
			// row template
			$objRowTemplate = new \PCT\CustomElements\Plugins\CustomCatalog\Core\RowTemplate();
			$objRowTemplate->setData($arrRow);
			$objRowTemplate->set('objCustomCatalog',$this);
			$objRowTemplate->set('objOrigin',$this);
			$objRowTemplate->set('objActiveRecord',$objRow);
			
			$strRowTemplate = '';
			
			// find the active palette
			$strActivePalette = '';
			if($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['renderUnpublishedGroups'] === false)
			{
				// attributes: look up from cache
				$objAttributes = Cache::getDatabaseResult('AttributeFactory::fetchAllByCustomElement',$this->get('pid'));
				if(!$objAttributes)
				{
					$objAttributes = AttributeFactory::fetchAllByCustomElement($this->get('pid'));
					
					// add this query to the cache
					Cache::addDatabaseResult('AttributeFactory::fetchAllByCustomElement',$this->get('pid'),$objAttributes);
				}
				
				$arrSelectors = array();
				
				// brute force to find the active view
				while($objAttributes->next())
				{
					if($objAttributes->type == 'paletteselect')
					{
						$arrSelectors[$objAttributes->id] = $objAttributes->row();
						
						if(strlen($objRow->{$objAttributes->alias}) > 0)
						{
							$strActivePalette = $objRow->{$objAttributes->alias};
						}
					}
				}
			}

			$z = 0;
			foreach($arrRow as $field => $value)
			{
				$arrClass = array('field',$field);
				
				$blnSkip = false;
				
				// systemcolumns
				if(in_array($field, $GLOBALS['PCT_CUSTOMCATALOG']['systemColumns']))
				{
					if(in_array($field, $GLOBALS['PCT_CUSTOMCATALOG']['systemColumns']))
					{
						$arrClass[] = 'systemcolumn';
					}
					// create TemplateAttribute object
					$objTplAttribute = new TemplateAttribute();
					$objTplAttribute->class = implode(' ', $arrClass);
					$objTplAttribute->label = $field;
					$objTplAttribute->name = $field;
					$objTplAttribute->value = $objTplAttribute->html = $value;
					
					$arrFieldsAssoc[$field] = $objTplAttribute;
					continue;
				}
				
				// skip the included alias field when not set to be visible
				if($field == $strAliasField && !in_array($field, $arrVisibles) && empty($arrVisibles))
				{
					continue;
				}
				
				// get the attribute depending on the active palette
				$objAttribute = $this->getAttribute($field,$strActivePalette);
					
				// check if field is a generic option
				if($objAttribute && strlen(strpos($field,'_')) > 0)
				{
					$arrName = explode('_', $field);
					$option = $arrName[count($arrName)-1];
					$basename = $objAttribute->get('alias');
					
					if($basename != $field)
					{
						$options = \Contao\StringUtil::deserialize($objAttribute->get('options'));
						if(!is_array($options))
						{
							$options = array($options);
						}
						if(in_array($option, $options))
						{
							$blnSkip = true;
						}
						
						// orderSRC fields
						if($arrName[0] == 'orderSRC')
						{
							$blnSkip = true;
							// remember the value
							$arrOrderSRC[$basename] = $value;
						}
					}
				}
				
				// unknown fields or generic options fields
				if(!isset($objAttribute) || ($blnSkip && !$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['renderOptionFields']) )
				{
					// create TemplateAttribute object
					$objTplAttribute = new TemplateAttribute();
					$objTplAttribute->class = implode(' ', $arrClass);
					$objTplAttribute->label = $field;
					$objTplAttribute->name = $field;
					$objTplAttribute->value = $objTplAttribute->html = $value;
					
					$arrFieldsAssoc[$field] = $objTplAttribute;
					continue;
				}
				
				// mark attribute being in the active palette or not
				if(!isset($objAttribute->inActivePalette) || $objAttribute->inActivePalette === null)
				{
					$objAttribute->inActivePalette = true;
				}
				
				// skip if group is invisible
				$objGroup = \PCT\CustomElements\Core\GroupFactory::findById($objAttribute->get('pid'));
				if(!$objGroup->published && $GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['renderUnpublishedGroups'] === false)
				{
					continue;
				}
				
				// set the orderSRC value
				if( array_key_exists($field, $arrOrderSRC) && !empty($arrOrderSRC[$field]) && $objAttribute->get('eval_multiple') )
				{
					$value = $arrOrderSRC[$field];
				}
				
				// filter empty value arrays when contao saves an array with an empty string instead of NULL
				if(in_array($objAttribute->type,array('gallery','image','files','tags','selectdb')))
				{
					$value = \Contao\StringUtil::deserialize($value);
					if(is_array($value))
					{
						$value = array_filter($value);
					}
					
					if(empty($value))
					{
						$value = null;
					}
				}
				
				// process optional values
				$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
			 	if(!empty($arrOptions) && is_array($arrOptions) && !in_array($objAttribute->get('type'), $GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields']))
			 	{
				 	$arrOptionValues = array();
				 	foreach($arrOptions as $strOption)
				 	{
					 	if(isset($objRow->{$field.'_'.$strOption}))
					 	{
						 	$arrOptionValues[$strOption] = $objRow->{$field.'_'.$strOption};
					 	}
					}
					
					$objAttribute->setOptionValues($arrOptionValues);
				}
				
				// attribute id
				$intAttribute = $objAttribute->get('id');
				// set the generic name to the alias
				$objAttribute->set('uuid',$field);
				// set the value for this attribute. Bypasses the origin
				$objAttribute->setValue($value);
				// set the active record
				$objAttribute->set('objActiveRecord',$objRow);
				// set the custom catalog
				$objAttribute->set('objCustomCatalog',$this);
				// set the custom catalog as origin if the attribute has none
				if($objAttribute->getOrigin() === null)
				{
					$objOrigin = new \PCT\CustomElements\Core\Origin;
					$objOrigin->set('intPid',$objRow->id);
					$objOrigin->set('strTable',$this->getTable());
					$objOrigin->set('isCustomCatalog',true);
					$objAttribute->setOrigin($objOrigin);
				}
				// unpublished attributes
				if($objAttribute->get('published') < 1)
				{
					continue;
				}
				
				$arrClass[] = 'field_'.$z;
				
				// create TemplateAttribute object
				$objTplAttribute = new TemplateAttribute($objAttribute);
				$objTplAttribute->type = $objAttribute->get('type');
				$objTplAttribute->value = $value;
				$objTplAttribute->class = implode(' ', $arrClass);
				$objTplAttribute->label = $objAttribute->get('description') ? $objAttribute->get('description') : $objAttribute->get('title');
				$objTplAttribute->name = $field;
				$objTplAttribute->hidden = ($objAttribute->get('hidden') > 0 ? true : false);
				
				$arrFields[$field] = $objTplAttribute;
				
				// associated by row count
				$arrFieldsAssoc[$field] = $objTplAttribute;
				if(!isset($arrFieldsAssoc[$field.'#0']))
		   		{
			   		$arrFieldsAssoc[$field.'#0'] = $arrFields[$field];
		   		}
		   		else
		   		{
			   		$arrFieldsAssoc[$field.'#'.$i] = $objTplAttribute;
				}
				
				// set a new row template
				if($objAttribute->get('type') == 'itemtemplate')
				{
					$strRowTemplate = $value;
				}
				
				
				$strGroupAlias = $objGroup->get('alias');
				
				// create a new associated group reference
				if(!array_key_exists($strGroupAlias, $arrGroupsAssoc))
				{
					// group class
					$arrGroupClass = array('group_'.$objAttribute->get('pid'),$strGroupAlias);
					
					$strGroupCssId = '';
					$arrGroupCssID = \Contao\StringUtil::deserialize($objGroup->get('cssID'));
					if(strlen($arrGroupCssID[0]) > 0)
					{
						$strGroupCssId = 'id="'.$arrGroupCssID[0].'"';
					}
					if(strlen($arrGroupCssID[1]) > 0)
					{
						$arrGroupClass[] = $arrGroupCssID[1];
					}
					
					$arrGroupsAssoc[$strGroupAlias] = array
					(
						'class'	=> trim(implode(' ', $arrGroupClass)),
						'raw'	=> $objGroup,
					);
					
					if(strlen($strGroupCssId) > 0)
					{
						$arrGroupsAssoc[$strGroupAlias]['cssID'] = $strGroupCssId;
					}
				}
				
				// add attribute
				$arrGroupsAssoc[$strGroupAlias]['fields'][$intAttribute] = $objTplAttribute;
				
				// store groups ordering
				$arrOrderGroups[$objGroup->sorting] = $strGroupAlias;
				
				// store fields
				$arrOrderFields[ $objGroup->get('sorting') ][ $objAttribute->get('sorting') ] = $field;

				$z++;
				
				// count the attributes processed when debugging is enabled
				if($GLOBALS['PCT_CUSTOMCATALOG']['debug'])
				{
					$GLOBALS['PCT_CUSTOMCATALOG']['process']['attributes']++;
				}
			}
			
			// reoder groups by sorting
			$arrGroups = array();
			if(count($arrOrderGroups) > 0 && count($arrGroupsAssoc) > 0)
			{
				// sort
				ksort($arrOrderGroups);
			
				$tmp = array();
				foreach($arrOrderGroups as $sorting => $alias)
				{
					$tmp[$alias] = $arrGroupsAssoc[$alias];
					
					// store linear groups array
					$objGroup = $arrGroupsAssoc[$alias]['raw'];
					$objGroup->fields = $arrGroupsAssoc[$alias]['fields'] ?: array();
					$arrGroups[$alias] = $objGroup;
				}
				$arrGroupsAssoc = $tmp;
				unset($tmp);
			}
			
			// reorder fields by sorting in their groups
			if( !empty($arrOrderFields) )
			{
				ksort($arrOrderFields);
				
				$tmp = array();
				foreach($arrOrderFields as $fields)
				{
					ksort($fields);

					foreach($fields as $field)
					{
						$tmp[$field] = $arrFieldsAssoc[$field];
					}
				}
				$arrFields = $tmp;
				unset($tmp);
			}

			$arrClass = array('entry','entry_'.$i);
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			if($i == 0) {$arrClass[] = 'first';}
			if($i >= $objResult->numRows - 1) {$arrClass[] = 'last';}
			
			$objRowTemplate->set('class',implode(' ', $arrClass));
			$objRowTemplate->set('fields',$arrFields);
			$objRowTemplate->set('field',$arrFieldsAssoc);
			$objRowTemplate->set('groups',$arrGroupsAssoc);
			$objRowTemplate->set('group',$arrGroups);
			
			// links
			$arrLinks = $this->prepareDetailsLinks($objResult);
			$objRowTemplate->set('links',$arrLinks);
			$objRowTemplate->set('more',implode('</br>', $arrLinks['more'] ?: array() ));
			
			// individual template by ItemTemplate attribute
			if(strlen($strRowTemplate) > 0)
			{
				$objRowTemplate->set('strTemplate',$strRowTemplate);
			}
			
			// set the row
			$arrEntries[$i] = $objRowTemplate;
			
			$i++;
		}
		
		// HOOK: modify the entries array before parsing
		$arrEntries = Hooks::callstatic('getEntriesHook',array($arrEntries,$this));
		
		$objTemplate->entries = $arrEntries;
		$objTemplate->field = $arrFieldsAssoc;
		
		// HOOK: modify the html output
		$strBufferFromHook = Hooks::callstatic('renderCatalogHook',array($this,$objTemplate));
		if(strlen($strBufferFromHook) > 0)
		{
			$strBuffer = $strBufferFromHook;
		}
		else
		{
			$strBuffer = $objTemplate->parse();
		}
		
		// stop time measurement
		if($GLOBALS['PCT_CUSTOMCATALOG']['debug'])
		{
			$process_completed = sprintf('%.3f', microtime(true) - $process_start);
			$GLOBALS['PCT_CUSTOMCATALOG']['process']['time'] += $process_completed;
			$GLOBALS['PCT_CUSTOMCATALOG']['process']['customcatalogs']++;
		}
		
		return $strBuffer;
	}
	
	
	/**
	 * Generate the frontend url to the details entry
	 * @param array
	 * @param boolean	Preserve filter parameters
	 * @return string
	 */
	public function prepareDetailsLinks($objRow,$bolPreserveFilters=false)
	{
		global $objPage;
		$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');

		$arrLinks = array();
		
		// jump to page object
		$intJumpTo = $this->getOrigin()->customcatalog_jumpTo;
		if($intJumpTo > 0 && $intJumpTo != $objPage->id)
		{
			$objJumpTo = \Contao\PageModel::findByPk($intJumpTo);
			
			// if page is obsolete, stay on current page
			if($objJumpTo == null)
			{
				$objJumpTo = $objPage;
			}
		}
		else
		{
			$objJumpTo = $objPage;
		}
		
		$arrHtml = array();
		
		// generate link to child tables
		if(strlen($this->get('cTables')) > 0)
		{
			$strAliasField = $this->getAliasField();
			
			$childs = \Contao\StringUtil::deserialize($this->get('cTables'));
			foreach($childs as $child)
			{
				if(strlen(strpos($child, '::')) > 0)
				{
					$split = explode('::', $child);
					$child = $split[0];
				}
				
				$urlparam = '/table/'.$child;
				$urlparam .= '/pid/'.( strlen($strAliasField) > 0 && strlen($objRow->{$strAliasField}) > 0 ? $objRow->{$strAliasField} : $objRow->id);
				
				$link = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['more_child'] ? $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['more_child'] : 'Show entries...';
				
				
				$url = $objRouter->generate($objJumpTo,array('parameters'=>$urlparam));

				$html = sprintf('<a class="more child '.$child.'" href="%s" title="%s">%s</a>',$url,$link,$link);
				
				$arrLinks['childs'][$child] = array
				(
					'link'	=> $link,
					'url'	=> $url,
					'html'	=> $html,
				);
				
				$arrHtml[] = $html;
			}
		}
		
		$url = $this->generateDetailsUrl($objRow, $objJumpTo);
		$link = $GLOBALS['TL_LANG']['MSC']['more'];
		$html = sprintf('<a class="more details" href="%s" title="%s">%s</a>',$url,$link,$link);
		$arrLinks['detail'] = array
		(
			'link'	=> $GLOBALS['TL_LANG']['MSC']['more'],
			'url'	=> $url,
			'html'	=> $html,
		);
		
		$arrHtml[] = $html;
		
		$arrLinks['more'] = $arrHtml;
		
		// call hook to modify the link list from outside
		$arrLinks = Hooks::callstatic('prepareDetailsLinksHook',array($arrLinks,$objRow,$this));
		
		return $arrLinks;
	}
	
	
	/**
	 * Generate the details url and return as string
	 * @param object
	 * @param object|string
	 * @return string
	 */
	public function generateDetailsUrl($objRow, $objJumpTo=null)
	{
		if(!is_object($objJumpTo) && isset($objJumpTo))
		{
			$objJumpTo = \Contao\PageModel::findByPk($objJumpTo);
		}
		
		if(!$objJumpTo)
		{
			global $objPage;
			$objJumpTo = $objPage;
		}
		
		// generate the regular link to the details page
		$aliasField = $this->getAliasField();
		
		$alias = '';
		
		// fetch the alias record
		if(strlen($aliasField) > 0)
		{
			// check if alias field is one of the visible fields
			if(isset($objRow->{$aliasField}))
			{
				$alias = $objRow->{$aliasField};
			}
			else
			{
				$objAlias = \Contao\Database::getInstance()->prepare("SELECT ".$aliasField." FROM ".$this->getTable()." WHERE id=?")->limit(1)->execute($objRow->id);
				$alias = $objAlias->{$aliasField};
			}
		}
		
		if(strlen($alias) < 1)
		{
			$alias = $objRow->id;
		}
		
		$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
		#$feUrl = $urlGenerator->generate($objJumpTo,array('parameters'=>'/'.$alias));
		$feUrl =  $objRouter->generate($objJumpTo,array('parameters'=>'/'.$alias));;

		// hook: manipulate the front end url
		$feUrlFromHook = Hooks::callstatic('generateDetailsUrlHook',array($objRow,$objJumpTo,$this));
		if(!empty($feUrlFromHook))
		{
			$feUrl = $feUrlFromHook;
			unset($feUrlFromHook);
		}
		
		return $feUrl;
	}
	
	
	/**
	 * Set the visible fields/attributes
	 * @param array
	 */
	public function setVisibles($arrValue)
	{
		$this->set('arrVisibles',$arrValue);
		// mark as custom modification
		$this->markAsModified('arrVisibles');
	}
	
	
	/**
	 * Get the visible fields/attributes as array
	 * @param boolean	Include optional fields from attributes
	 * @return array
	 */
	public function getVisibles($blnIncludeOptionalFields=true)
	{
		// a custom list has been set
		if(in_array('arrVisibles',$this->getModified()))
		{
			return $this->get('arrVisibles');
		}
		
		if( count($this->get('arrVisibles')) < 1 && !$this->getOrigin())
		{
			return array();
		}
		
		if(!isset($this->getOrigin()->customcatalog_setVisibles) || !$this->getOrigin()->customcatalog_setVisibles)
		{
			return $this->get('arrVisibles');
		}
		
		$visibles = \Contao\StringUtil::deserialize($this->getOrigin()->customcatalog_visibles);
		if(!is_array($visibles))
		{
			$visibles = array();
		}
		
		// include optional fields
		if(count($visibles) > 0 && $blnIncludeOptionalFields)
		{
			$objDatabase = \Contao\Database::getInstance();
			$strTable = $this->getTable();
			
			foreach($visibles as $field)
			{
				if(in_array($field, $GLOBALS['PCT_CUSTOMCATALOG']['systemColumns']))
				{
					continue;
				}
				
				// look up from cache
				if( Cache::getAttribute('cc_'.$this->get('id').'_'.$field) )
				{
					$objAttribute = Cache::getAttribute('cc_'.$this->get('id').'_'.$field);
				}
				else
				{
					$objAttribute = AttributeFactory::findByAlias($field);
				}
				
				if(!$objAttribute)
				{
					continue;
				}

				// include orderSRC_ fields for galleries, files
				if( $objDatabase->fieldExists('orderSRC_'.$field,$strTable) )
				{
					$visibles[] = 'orderSRC_'.$field;
				}
				
				$optFields = \Contao\StringUtil::deserialize($objAttribute->get('options'));
				if(!is_array($optFields) || count($optFields) < 1)
				{
					continue;
				}
					
				foreach($optFields as $f)
				{
					// check if field is created
					if(!$objDatabase->fieldExists($field.'_'.$f,$strTable))
					{
						continue;
					}
					$visibles[] = $field.'_'.$f;
				}			
			}
		}
		
		// append default visibles
		$arrVisibles = array_unique(array_merge($visibles,$this->arrDefaultVisibles,$this->get('arrVisibles')));
		
		return $arrVisibles;
	}
	
	
	/**
	 * Set a single filter object. Create a new filter collection for this custom catalog object
	 * @param object
	 * @return object
	 */
	public function setFilter($objFilter)
	{
		$objFilter->setTable($this->getTable());
		
		$collection = FilterFactory::newCollection();
		$collection->add($objFilter);
		return $this->setFilters($collection);
	}
	
	
	/**
	 * Set a whole new filter collection or append the existing stack
	 * @param object
	 * @param boolean
	 * @return object
	 */
	protected function setFilterCollection($objFilterCollection, $bolAppend=false)
	{
		if($objFilterCollection === null)
		{
			return $this;
		}
		
		if($bolAppend)
		{
			$stack = $this->getFilters();
			if(count($stack) < 1)
			{
				$this->set('arrFilters',$objFilterCollection->getFilters());	
				return $this;
			}
			
			$stack = array_merge($stack,$objFilterCollection->getFilters());
			
			$filters = array();
			$arr = array(); // just a simple check to avoid a second foreach to flat the array
			foreach($stack as $objFilter)
			{
				if(in_array($objFilter->get('id'), $arr))
				{
					continue;
				}
				
				// pass the custom catalog object to the filter object
				$objFilter->setOrigin($this);
				$objFilter->setTable($this->getTable());
				
				$filters[] = $objFilter;
				$arr[] = $objFilter->get('id');
			}
			unset($arr);
		}
		else
		{
			$filters = $objFilterCollection->getFilters();
			if($objFilterCollection->getCount() > 0)
			{
				$filters = array();
				foreach($objFilterCollection->getFilters() as $objFilter)
				{
					// pass the custom catalog object to the filter object
					$objFilter->setOrigin($this);
					$objFilter->setTable($this->getTable());
					
					$filters[] = $objFilter;
				}
			}
		}
		
		$this->set('arrFilters',$filters);
		
		// pass the custom catalog object to the collection object
		$objFilterCollection->setOrigin($this);
		
		return $this;
	}
	
	
	/**
	 * Shortcut to setFilterCollection()
	 * {@inheritDoc}
	 */
	public function setFilters($objFilterCollection)
	{
		return $this->setFilterCollection($objFilterCollection);
	}
	
	
	/**
	 * Get the filter stack
	 * @return array
	 */
	public function getFilters()
	{
		return $this->get('arrFilters');
	}
	
	
	/**
	 * Return a specific filter
	 * @param string	Name or urlparam of the filter
	 * @param object
	 */
	public function getFilter($strName)
	{
		$arrFilters = $this->getFilters();
		if(count($arrFilters) < 1)
		{
			return null;
		}
		
		foreach($arrFilters as $objFilter)
		{
			if($strName == $objFilter->getName())
			{
				return $objFilter;
			}
		}
		
		return null;
	}

	
	
	/**
	 * Add a new filter collection to the stack and return object
	 * @param object
	 * @return object
	 */
	public function addFilters($objFilterCollection)
	{
		return $this->setFilterCollection($objFilterCollection,true);
	}
	
	
	/**
	 * Add a single filter object to the stack
	 * @param object
	 * @return object
	 */
	public function addFilter($objFilter)
	{
		$arrFilters = $this->getFilters();
		
		// append the existing filter stack
		if(count($arrFilters) > 0)
		{
			$objFilter->setOrigin($this);
			$objFilter->setTable($this->getTable());
			
			$arrFilters[] = $objFilter;
			$this->set('arrFilters',$arrFilters);
			return;
		}
		
		
		$collection = FilterFactory::newCollection();
		$collection->add($objFilter);
		return $this->addFilters($collection);
	}
	
	
	/**
	 * Set the layout template
	 * @param string
	 */
	public function setLayoutTemplate($strValue='')
	{
		$this->set('strTemplate',$strValue);
	}
	
	
	/**
	 * Return the layout template name
	 * @return string
	 */
	public function getLayoutTemplate()
	{
		$strReturn = $this->get('strTemplate');
		
		if(strlen($strReturn) < 1)
		{
			$strReturn = $this->getOrigin()->customcatalog_template;
		}
		
		if(strlen($strReturn) < 1)
		{
			$strReturn = $this->getCustomElement()->get('template');
		}
		
		return $strReturn;
	}
	
	
	/**
	 * Reset the object
	 */
	public function reset()
	{
		$this->set('arrVisibles',array());
		$this->set('arrModified',array());
		$this->set('arrOptions',array());
		$this->set('arrFilters',array());
	}

	
	/**
	 * Prepare the query array and return as array
	 * @return array
	 */
// !getQueryOption
	public function getQueryOption()
	{
		$arrOptions['table'] = $this->getTable();
		$arrOptions['columns'] = array();
		
		if( !isset($GLOBALS['PCT_CUSTOMCATALOG'][$this->getTable()]['strictMode']) )
		{
			$GLOBALS['PCT_CUSTOMCATALOG'][$this->getTable()]['strictMode'] = false;
		}

		// get query options from filters
		$arrFilters = $this->getFilters();
		
		// call the getFilters Hook
		$arrFilters = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('getFiltersHook',array($arrFilters,$this));
		
		// collect filters to be unset after processing
		$arrUnset = array();
		
		// collect strict filters
		$arrStrictFilters = array();
		
		// collect combiners
		$arrCombiners = array();
		
		// flag true if there are query wrappers
		$blnWrappers = false;
		if(!empty($arrFilters) && is_array($arrFilters))
		{
			foreach($arrFilters as $i => $objFilter)
			{
				$objNextFilter = null;
				// next filter
				if( isset($arrFilters[$i+1]) )
				{
					$objNextFilter = $arrFilters[$i+1];
				}
				
				// clone the object to avoid overriding
				if( ((boolean)\Contao\Config::get('customcatalog_strictMode') === true || (boolean)$GLOBALS['PCT_CUSTOMCATALOG'][$this->getTable()]['strictMode'] === true) || (isset($GLOBALS['PCT_CUSTOMCATALOG']['FILTER'][$objFilter->getName()]['strictMode']) || isset($GLOBALS['PCT_CUSTOMCATALOG']['FILTER'][$objFilter->get('id')]['strictMode'])) )
				{
					$objFilter = clone($objFilter);
				}
				
				// set the filter to the current CC table if the filter has not a table set yet
				if(strlen($objFilter->getTable()) < 1)
				{
					$objFilter->setTable($this->getTable());
				}
				
				// call the processFilter Hook
				$objFilter = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('processFilterHook',array($objFilter,$this));
				if(empty($objFilter))
				{
					continue;
				}
				
				$options = $objFilter->apply();
				
				// set the strict mode
				$objFilter->strictMode( (boolean)$objFilter->get('isStrict') );
				
				//  let the strict mode be set on the fly on global level or on table level
				if((boolean)\Contao\Config::get('customcatalog_strictMode') === true || (boolean)$GLOBALS['PCT_CUSTOMCATALOG'][$this->getTable()]['strictMode'] === true)
				{
					$objFilter->strictMode(true);
				}
				
				// let the strict mode be set on the fly on filter level
				if(isset($GLOBALS['PCT_CUSTOMCATALOG']['FILTER'][$objFilter->getName()]['strictMode']) || isset($GLOBALS['PCT_CUSTOMCATALOG']['FILTER'][$objFilter->get('id')]['strictMode']))
				{
					$strictMode = $GLOBALS['PCT_CUSTOMCATALOG']['FILTER'][$objFilter->getName()]['strictMode'] ?: $GLOBALS['PCT_CUSTOMCATALOG']['FILTER'][$objFilter->get('id')]['strictMode'];
					$objFilter->strictMode( (boolean)$strictMode );
				}
				
				// collect strict filters
				if(empty($options) && (boolean)$objFilter->isStrict() === true)
				{
					$arrStrictFilters[$i] = $objFilter->get('id');
				}
				
				// mark filter to be removed
				if(empty($options))
				{
					$arrUnset[] = $i;
				}
				
				// skip empty filter options or filters that should not count
				if(in_array($objFilter->get('type'), array('wrapperStart','wrapperStop','combiner')) )
				{
					// mark filter to be removed later on
					$arrUnset[] = $i;
				}
				
				// flag filters to be removed that should bypass the activeFilter check
				if( isset($objFilter->bypassActiveFilterCheck) && (boolean)$objFilter->bypassActiveFilterCheck === true )
				{
					$arrUnset[] = $i;
				}
				
				// mark wrappers
				if( in_array($objFilter->get('type'), array('wrapperStart','wrapperStop')) )
				{
					$blnWrappers = true;
				}
				
				// filter is strict, returns no result and list should not show all results -> set an impossible result but do not skip the filter processing here
				if(empty($options) && (boolean)$objFilter->isStrict() === true && !$this->getModule()->customcatalog_filter_showAll)
				{
					$options['columns'] = array
					(
						array
						(
							'column' 	=> 'id',
							'operation'	=> 'IN',
							'value' => array($objFilter->get('id') * -1)
						),
					);
				}
				
				// include the filter id
				$options['filter_id'] = $objFilter->get('id');
				// check if the next filter inline is a combiner or a wrapper
				if($objNextFilter !== null)
				{
					if($objNextFilter->get('type') == 'combiner')
					{
						$options['eval']['combiner'] = strtoupper($objNextFilter->get('combiner'));
						// remember combiner for the current filter
						$arrCombiners[ $objFilter->id ] = strtoupper($objNextFilter->get('combiner'));
					}
					// check if filter before is a wrapperStop, then remove all combiners
					else if($objNextFilter->get('type') == 'wrapperStop')
					{
						$options['eval']['combiner'] = ' ';
					}
					// by default subparts are connected with AND
					else if($objFilter->get('type') == 'wrapperStop' && $objNextFilter->get('type') == 'wrapperStart')
					{
						$options['eval']['combiner'] = 'AND';
					}
				}
				
				if( isset($options['columns']) && is_array($options['columns']) && !empty($options['columns']))
				{
					foreach($options['columns'] as $opt)
					{
						// add the evaluation key to the nested options
						$opt['filter_id'] = $objFilter->get('id');
						if( isset($options['eval']) && is_array($options['eval']))
						{
							$opt['eval'] = $options['eval'];
						}
						
						$arrOptions['columns'][] = $opt;
					}
				}
				else
				{
					$arrOptions = QueryBuilder::combine($arrOptions,$options);
				}
				
				// add sortings from filters
				if(!empty($arrOptions['order']) && !empty($arrOptions) && !in_array('sorting', $this->getModified()) )
				{
					if(!is_array($arrOptions['order']))
					{
						$arrOptions['order'] = array($arrOptions['order']);
					}
					
					$this->addSorting($arrOptions['order'][0],$arrOptions['order'][1]);
				}
			}
		}
				
		unset($arrOptions['eval']['combiner']);
		unset($arrOptions['filter_id']);
		unset($arrOptions['where']);
		
		// remove the last filter combiner if it is also the last filter processed
		if(isset($arrOptions['columns'][ count($arrOptions['columns'])-1 ]['eval']['combiner']))
		{
			unset($arrOptions['columns'][ count($arrOptions['columns'])-1 ]['eval']['combiner']);
		}
		
		// double check the there will be no open wrappers
		if($blnWrappers && count($arrOptions['columns']) > 0 && is_array($arrOptions['columns']))
		{
			foreach($arrOptions['columns'] as $i => $data)
			{
				$objFilter = \PCT\CustomElements\Core\FilterFactory::findById($data['filter_id']);
				$objNextFilter = null;
				if( isset($arrOptions['columns'][$i+1]['filter_id']) )
				{
					$objNextFilter = \PCT\CustomElements\Core\FilterFactory::findById($arrOptions['columns'][$i+1]['filter_id']);
				}
				
				// a start wrapper should never be alone at the end
				if( $objFilter !== null && $objFilter->get('type') == 'wrapperStart' && $objNextFilter === null)
				{
					unset($arrOptions['columns'][$i]);
				}
				// a start wrapper should never have a following stop wrapper (empty wrappers not allowed)
				else if( $objFilter !== null && $objFilter->get('type') == 'wrapperStart' && $objNextFilter->get('type') == 'wrapperStop')
				{
					unset($arrOptions['columns'][$i]);
					unset($arrOptions['columns'][$i+1]);
				}
			}
		}
		
		// limit and offset
		$arrOptions['limit'] = array();
		if($this->getLimit() > 0)
		{
			$arrOptions['limit'][0] = $this->getLimit();
		}
		if($this->getOffset() > 0)
		{
			$arrOptions['limit'][1] = $this->getOffset();
		}
		
		// sorting and order
		if(count($this->getSorting()) > 0)
		{
			// remove the default sorting
			$arrSorting = $this->getSorting();
			if( isset($arrSorting['_default_']) && is_array($arrSorting['_default_']) && count($arrSorting) > 1 && !empty( $this->getActiveFilters() ) && (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['LIST']['disableDefaultSorting'] === true )
			{
				unset($arrSorting['_default_']);
			}
			$arrOptions['order'] = QueryBuilder::getInstance($this->getTable())->generateORDERBY($arrSorting);
		}
		
		// strictly set the sorting if it has been modified from outside e.g. by the setSorting method
		if(in_array('sorting', $this->getModified()))
		{
			$arrOptions['order'] = QueryBuilder::getInstance($this->getTable())->generateORDERBY($this->getSorting());
		}

		// published
		$objTokenChecker = \Contao\System::getContainer()->get('contao.security.token_checker');
		
		if($this->get('publishedField') > 0 && !$objTokenChecker->isPreviewMode() )
		{
			$options = array
			(
				'column'	=> $this->getPublishedField(),
				'operation'	=> '=',
				'value'		=> 1
			);
			$arrOptions = QueryBuilder::combine($options,$arrOptions);
		}
		
		$arrActiveFilters = $this->getActiveFilters();
		if($this->get('multilanguage') && array_key_exists($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'], $arrActiveFilters))
		{
			unset($arrActiveFilters[$GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']]);
		}

		// remove certain filters like filters with empty options or combiners
		if(count($arrUnset) > 0)
		{
			foreach($arrUnset as $i)
			{
				if(!empty($arrFilters[$i]))
				{
					$filter = $arrFilters[$i];
					unset($arrFilters[$i]);
					unset($arrActiveFilters[$filter->getName()]);
				}
			}
			
			if(!is_array($arrFilters))
			{
				$arrFilters = array();
			}
			if(!is_array($arrActiveFilters))
			{
				$arrActiveFilters = array();
			}
		}

		
		// in case there are no filters and list is supposed to be displayed empty when there are no filters active
		if( (count($arrFilters) < 1 && empty($arrActiveFilters)) && !$this->getModule()->customcatalog_filter_showAll)
		{
			$options = array
			(
				'column'	=> 'id',
				'operation'	=> '=',
				'value'		=> '-1000'
			);
			$arrOptions = QueryBuilder::combine($options,$arrOptions);
		}
		
		// strict filters
		if( empty($arrStrictFilters) === false )
		{
			foreach($arrStrictFilters as $id)
			{
				$options = array
				(
				   'column'	=> 'id',
				   'operation'	=> 'IN',
				   'value'		=> '-'.$id,
				);
				$arrOptions = QueryBuilder::combine($options,$arrOptions);
			}
		}
		
		// visible attributes
		$arrOptions['fields'] = $this->getVisibles();
		
		// append the alias field
		$strAliasField = $this->getAliasField();
		if(strlen($strAliasField) > 0 && !in_array($strAliasField, $arrOptions['fields']) && count($arrOptions['fields']) > 0)
		{
			$arrOptions['fields'][] = $strAliasField;
		}
		
		return $arrOptions;
	}
	
	
	/**
	 * Set sql limit
	 * @param integer
	 */
	public function setLimit($intValue)
	{
		$this->set('intLimit',$intValue);
	}
	
	
	/**
	 * Return the current sql limit
	 * @return integer
	 */
	public function getLimit()
	{
		return $this->get('intLimit');
	}
	
	
	/**
	 * Set sql offset
	 * @param integer
	 */
	public function setOffset($intValue)
	{
		$this->set('intOffset',$intValue);
	}
	
	
	/**
	 * Return the current sql offset
	 * @return integer
	 */
	public function getOffset()
	{
		return $this->get('intOffset');
	}
	
	
	/**
	 * Set the sql order
	 * @param string
	 * @param string
	 */
	public function setSorting($strField,$strOrder='')
	{
		// handle sortings strings like text[asc]
		$arrTmp = $this->prepareSorting($strField);
		if(!empty($arrTmp))
		{
			$strField = $arrTmp[0];
			$strOrder = $arrTmp[1];
		}
		$this->set('arrSorting',array(array($strField,$strOrder)));
		$this->markAsModified('sorting');
	}
	
	
	/**
	 * Return the orderby array
	 * @param array
	 */
	public function getSorting()
	{
		return $this->get('arrSorting');
	}
	
	
	/**
	 * Add a new field to the sql order
	 * @param string
	 * @param string
	 */
	public function addSorting($strField,$strOrder='')
	{
		// handle sortings strings like text[asc]
		$arrTmp = $this->prepareSorting($strField);
		if(count($arrTmp) > 0)
		{
			$strField = $arrTmp[0];
			$strOrder = $arrTmp[1];
		}
		unset($arrTmp);

		$arrSorting = $this->getSorting();
		
		// remove duplicate sortings on the same field
		if(!empty($arrSorting) && is_array($arrSorting))
		{
			foreach($arrSorting as $i => $arr)
			{
				if($arr[0] == $strField)
				{
					unset($arrSorting[$i]);
				}
			}
		}
		// add new sorting
		$arrSorting[] = array($strField,$strOrder);
		$this->set('arrSorting',$arrSorting);
	}


	/**
	 * Set the default sorting marked by 'default' in the sortings array
	 * @param string
	 * @param string
	 */
	public function setDefaultSorting($strField,$strOrder='')
	{
		// handle sortings strings like text[asc]
		$arrTmp = $this->prepareSorting($strField);
		if(count($arrTmp) > 0)
		{
			$strField = $arrTmp[0];
			$strOrder = $arrTmp[1];
		}
		unset($arrTmp);
		
		$arrSorting = $this->getSorting();
		$arrSorting['_default_'] = array($strField,$strOrder);
		$this->set('arrSorting',$arrSorting);
	}
	
	
	/**
	 * Prepare a sorting string and return as array
	 * @param string
	 * @return array
	 */
	public function prepareSorting($strInput)
	{
		// handle sortings strings like text[asc]
		$arrReturn = array();
		$blnPreg = preg_match("/(.*)\[(.*)\]/", $strInput, $arrMatch);
		if($blnPreg)
		{
			$arrReturn[0] = $arrMatch[1];
			$arrReturn[1] = $arrMatch[2];
		}
		return $arrReturn;
	}
	
	
	/**
	 * Set active language
	 * @param string
	 * @return object
	 */
	public function setActiveLanguage($strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			$strLanguage = $GLOBALS['TL_LANGUAGE'];
		}
		
		if(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']) != '')
		{
			$strLanguage = \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']);
		}
		
		$this->set('strLanguage',$strLanguage);
		
		return $this;
	}
	
	
	/**
	 * Get the active language
	 * @return string
	 */
	public function getActiveLanguage()
	{
		$this->setActiveLanguage();
		return $this->get('strLanguage');
	}


	/**
	 * Return the active languages as array
	 * @return array
	 */
	public function getLanguages()
	{
		if(!$this->get('multilanguage'))
		{
			return array();
		}
		
		return \Contao\StringUtil::deserialize($this->get('languages'));
	}
	
	
	/**
	 * Return true/false if the custom catalog has language records or not
	 */
	public function hasLanguageRecords()
	{
		$arrLanguages = $this->getLanguages();
		
		if(!$this->get('multilanguage') || empty($arrLanguages))
		{
			return false;
		}
		
		// look up from cache
		$objCount = Cache::getDatabaseResult('CustomCatalog::hasLanguageRecords',$this->get('id'));
		if(!$objCount)
		{
			$objCount = \Contao\Database::getInstance()->prepare("SELECT COUNT(id) AS count FROM tl_pct_customcatalog_language WHERE source=?")->execute($this->getTable());
		
			// add this query to the cache
			Cache::addDatabaseResult('CustomCatalog::hasLanguageRecords',$this->get('id'),$objCount);
		}
		
		return ($objCount->count > 0 ? true : false);		
	}

	
	/**
	 * Return the name of the alias field as string
	 * @return string
	 */
	public function getAliasField()
	{
		$intAttribute = $this->get('aliasField');
		if($intAttribute < 1)
		{
			return '';
		}
		
		$objAttribute = AttributeFactory::findById($intAttribute);
		if($objAttribute === null)
		{
			return '';
		}
		
		return $objAttribute->get('alias');
	}


	/**
	 * Return the name of the sitemap field as string
	 * @return string
	 */
	public function getSitemapField()
	{
		$intAttribute = $this->get('sitemapField');
		if($intAttribute < 1)
		{
			return '';
		}
		
		$objAttribute = AttributeFactory::findById($intAttribute);
		if($objAttribute === null)
		{
			return '';
		}
		
		return $objAttribute->get('alias');
	}
	
	
	/**
	 * Return the name of the published field as string
	 * @return string
	 */
	public function getPublishedField()
	{
		$intAttribute = $this->get('publishedField');
		if($intAttribute < 1)
		{
			return '';
		}
		
		$objAttribute = AttributeFactory::findById($intAttribute);
		if($objAttribute === null)
		{
			return '';
		}
		
		return $objAttribute->get('alias');
	}
	
	
	/**
	 * Return a custom catalog entry record by an alias or by the id
	 * @param mixed
	 * @param string	An optional language code string
	 * @return object
	 */
	public function findPublishedItemByIdOrAlias($varValue,$strLanguage='',$arrOptions=array())
	{
		$varValue = StringUtil::decodeEntities($varValue);

		// find the correct entry by the alias respecting the language
		$strLog = '';
		$_varValue = $varValue;
		$strAliasField = $this->getAliasField();
		
		// is strict numeric value = id
		if( \is_numeric($varValue) && \is_integer( (int)$varValue ) && (int)$varValue > 0 )
		{
			$varValue = (int)$varValue;
			// reset the alias field
			$strAliasField = '';
		}
		
		$blnBaseRecordFallback = (boolean)\Contao\Config::get('customcatalog_reader_baseRecordIsFallback');
		
		if(is_string($varValue) && strlen($strLanguage) > 0 && $this->get('multilanguage') && strlen($strAliasField) > 0)
		{
			$strLanguage = str_replace('-','_',$strLanguage);
			$blnFoundLangEntry = false;

			$cacheKey = $this->get('id').'::'.$varValue;
			$objEntries = Cache::getDatabaseResult('CustomCatalog::findPublishedItemByIdOrAlias::objEntries',$cacheKey);
			if(!$objEntries)
			{
				// fetch all entries with the same alias
				$objEntries = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$this->getTable()." WHERE ".$this->getAliasField()."=?")->execute($varValue);
				
				// add this query to the cache
				Cache::addDatabaseResult('CustomCatalog::findPublishedItemByIdOrAlias::objEntries',$cacheKey,$objEntries);
			}
			
			// strict found, just one alias
			if($objEntries->numRows == 1)
			{
				// is wrong language
				if( !Multilanguage::isLanguageRecord($objEntries->id,$this->getTable(),$strLanguage) && !Multilanguage::isBaseRecord($objEntries->id,$this->getTable()))
				{
					$varValue = null;
				
					// log
					$strLog = 'Entry found for alias='.$_varValue.' but of the wrong language';
				}
				// is not supposed to be a fallback
				else if(Multilanguage::isBaseRecord($objEntries->id,$this->getTable()) && $blnBaseRecordFallback === false)
				{
					$varValue = null;
				
					// log
					$strLog = 'Entry found for alias='.$_varValue.' but it is a base record and base record fallback is turned of';
				}
			}
			// multiple founds for the same alias
			else if($objEntries->numRows > 1)
			{
				while($objEntries->next())
				{
					if( Multilanguage::isLanguageRecord($objEntries->id,$this->getTable(),$strLanguage) )
					{
						$varValue = $objEntries->id;
						$blnFoundLangEntry = true;
						break;
					}
				}
				
				// search for fallback base entries
				if(!$blnFoundLangEntry)
				{
					$objEntries->reset();
					while($objEntries->next())
					{
						if( Multilanguage::isBaseRecord($objEntries->id,$this->getTable()))
						{
							$varValue = $objEntries->id;
							break;
						}
					}
				}

				if($varValue === null)
				{
					// log
					$strLog = 'No entries can be found for alias='.$_varValue.'. Please check your alias or multi-language settings.';
				}
				// reset the alias field to continue working with the ID
				else
				{
					$strAliasField = '';
				}
			}	
		}
			
		// value could not be resolved
		if(empty($varValue))
		{
			if((boolean)\Contao\Config::get('debugMode') === true || (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['debug'] === true && strlen($strLog) > 0)
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.error')->info($strLog);
			}
			return null;
		}
		
		// has alias field
		if(strlen($strAliasField) > 0)
		{
			$options = array
			(
				'table'		=> $this->getTable(),
				'columns'	=> array
				(
				   array
				   (
					   'column'		=> $strAliasField,
					   'operation'	=> '=',
					   'value'		=> $varValue,
				   )
				),
			);
		}
		// use ID
		else
		{
			$options = array
			(
				'table'		=> $this->getTable(),
				'columns'	=> array
				(
				   array
				   (
					   'column'		=> 'id',
					   'operation'	=> '=',
					   'value'		=> $varValue,
				   )
				),
			);
		}

		// published field
		$objTokenChecker = \Contao\System::getContainer()->get('contao.security.token_checker');

		$strPublishedField = $this->getPublishedField();
		if( empty($strPublishedField) === false && !$objTokenChecker->isPreviewMode() )
		{
			$options['columns'][] = array
			(
				'column' => $strPublishedField,
				'operation' => '=',
				'value' => 1
			);
		}

		// merge with default options
		if($arrOptions)
		{
			$options = QueryBuilder::combine($options,$arrOptions);
		}

		$objReturn = Cache::getDatabaseResult('CustomCatalog::findPublishedItemByIdOrAlias',$this->get('id'));
		if(!$objReturn || !isset($arrOptions['executeUncached']) || !$arrOptions['executeUncached'])
		{
			$objReturn = QueryBuilder::getInstance()->fetch($options);

			// add this query to the cache
			Cache::addDatabaseResult('CustomCatalog::findPublishedItemByIdOrAlias',$this->get('id'),$objReturn);
		}
		
		// validate the entry. the one fetched via alias must have the same id as the one fetched by a strict numeric value
		if($objReturn->{$strAliasField} != $varValue && strlen($strAliasField) > 0 && (is_numeric($varValue) || is_integer($varValue)) )
		{
			$objValidator = Cache::getDatabaseResult('CustomCatalog::findPublishedItemByIdOrAlias_validator',$this->get('id'));
			
			if($objValidator === null)
			{
				// check that the current alias value is not the id itself
				$validator_options = array
				(
					'table'		=> $this->getTable(),
					'columns'	=> array
					(
					   array
					   (
						   'column'		=> 'id',
						   'operation'	=> '=',
						   'value'		=> $varValue,
					   )
					),
				);
				
				$objValidator = QueryBuilder::getInstance()->fetch($validator_options);
				
				// add this query to the cache
				Cache::addDatabaseResult('CustomCatalog::findPublishedItemByIdOrAlias_validator',$this->get('id'),$objValidator);
			}
			// validate the return entry. it must have: 
			// a: the same id as the validator entry
			// b: an alias set
			// c: must be saved at least once
			if( ($objValidator->id !== null && $objValidator->id != $objReturn->id) || empty($objReturn->{$strAliasField}) || $objReturn->tstamp <= 0)
			{
				$objReturn = $objValidator;
			}
		}
		
		return $objReturn;
	}
	
	
	/**
	 * Return a custom catalog entry record by an alias or by the id
	 * @param mixed
	 * @return object
	 */
	public function fetchPublishedContentElementsById($intValue, $arrOptions=array())
	{
		// just incase an alias is submitted
		if(!is_integer($intValue) && !is_numeric($intValue))
		{
			$strLanguage = Multilanguage::getActiveFrontendLanguage();
			$objEntry = $this->findPublishedItemByIdOrAlias($intValue,$strLanguage,$arrOptions);
			
			if(!$objEntry)
			{
				return null;
			}
			
			$intValue = $objEntry->id;
		}
		
		if($intValue < 1)
		{
			return null;
		}
		
		$options = array
		(
			'table'		=> 'tl_content',
			'columns'	=> array
			(
			   array
			   (
				   'column'		=> 'pid',
				   'operation'	=> '=',
				   'value'		=> $intValue,
			   ),
			   array
			   (
				   'column'		=> 'ptable',
				   'operation'	=> '=',
				   'value'		=> $this->getTable(),
			   ),
			   array
			   (
				   'column'		=> 'invisible',
				   'operation'	=> '!=',
				   'value'		=> 1,
			   )
			),
		);

		if( !isset($arrOptions['order']) )
		{
			$arrOptions['order'] = 'sorting';
		}
	
		// merge with default options
		if($arrOptions)
		{
			$options = QueryBuilder::combine($options,$arrOptions);
		}
		
		return QueryBuilder::getInstance()->fetch($options);
	}
	
	
	/**
	 * Return all published items 
	 */
	public function findPublishedItems($arrOptions=array())
	{
		$strPublishedField = $this->getPublishedField();
		
		$options = array
		(
			'table'		=> $this->getTable(),
			'columns'	=> array
			(
			   array
			   (
				   'column'		=> 'tstamp',
				   'operation'	=> '>',
				   'value'		=> 0,
			   )
			),
		);
		
		if(strlen($strPublishedField) > 0)
		{
			$options['columns'][] = array
			(
				'column'		=> $strPublishedField,
				'operation'		=> '=?',
				'value'			=> 1
			);
		}
		
		// merge with default options
		if($arrOptions)
		{
			$options = QueryBuilder::combine($options,$arrOptions);
		}
		
		$objResult = QueryBuilder::getInstance()->fetch($options);
		
		if($objResult->numRows < 1)
		{
			return null;
		}
		
		return $objResult;
	}
	
	
	/**
	 * Render the content elements 
	 * @param object	Database Result
	 * @return string
	 */
	public function renderContentElements($objCte)
	{
		if($objCte->numRows < 1)
		{
			return '';
		}
		
		$strBuffer = '';
		while($objCte->next())
		{
			$strBuffer .= \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace('{{insert_content::'.$objCte->id.'}}',$this);
		}
	
		return $strBuffer;
	}

// !Filter management

	/**
	 * Generates the filter url parameter string from a set of filters
	 * @param array
	 * @param string
	 * @return string
	 */
	public function generateFilterUrlParams($arrFilters,$strMethod='post')
	{
		$params = array();
		foreach($arrFilters as $objFilter)
		{
			// get the filter name
			$name = $objFilter->getName();
			$id = $objFilter->get('id');
			
			// get current filter value
			$value = array();
			if(strtolower($strMethod) == 'post')
			{
				$value = $objFilter->getValueFromPOST();
			}
			else if(strtolower($strMethod) == 'get')
			{
				$value = $objFilter->getValueFromGET();;
			}
			else if(strtolower($strMethod) == 'session')
			{
				$value = $objFilter->getValueFromSession();;
			}
			else if($strMethod === null || $strMethod === '')
			{
				$value = $objFilter->getValue();
			}
			
			$value = array_filter($value,'strlen');
			if(empty($value))
			{
				continue;
			}
			
			// multiple values
			if(count($value) > 1)
			{
			   $value = implode('%2C', $value);
			}
			else
			{
			   $value = $value[0] ?? '';
			}
			
			$params[$id][$name] = $value;
		}
		
		$urlchunks = array();
		foreach($params as $param)
		{
			foreach($param as $k => $v)
			{
				$urlchunks[$k][] = $v;
			}
		}
		
		return $urlchunks;
	}
	
	
	/**
	 * Generate the filter url as string from an array
	 * @param array
	 * @return string
	 */
	public function generateFilterUrl($arrUrlChunks,$strMethod='POST')
	{
		if(count($arrUrlChunks) < 1)
		{
			return '';
		}
		
		$strReturn = '';
		foreach($arrUrlChunks as $k => $v)
		{
			if(!is_array($v)) 
			{
				$v = explode(',', $v) ?: array();
			}
			
			$v = array_filter($v);
			
			// skip empty values
			if(count($v) < 1)
			{
				continue;
			}
			
			$v = htmlspecialchars(urldecode( implode(',', $v) ));
			if(strtolower($strMethod) == 'post')
			{
				$strReturn .= '/'.$k.'/'.$v;
			}
			else if(strtolower($strMethod) == 'get')
			{
				$strReturn .= '&'.$k.'='.$v;
			}
		}
		
		return $strReturn;
	}
	
	
	/**
	 * Get the respectable url parameters as array
	 * @param array 	Stack of parameters to be ignored
	 * @return array
	 */
	public function getRespectableUrlParams($arrIgnore=array(),$strMethod='post')
	{
		$arrParams = $GLOBALS['PCT_CUSTOMCATALOG']['urlCustomParameters'] ?: array();
		
		// keep the language filter parameter
		if( \Contao\Config::get('addLanguageToUrl') !== null && !\Contao\Config::get('addLanguageToUrl') && strlen(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'])) > 0 )
		{
			$arrParams[] = $GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'];
		}
		
		$arrFilterSession = $this->getFilterSession();
		$arrReturn = array();
		
		foreach($arrParams as $param)
		{
			// skip custom parameters
			if(is_array($GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters']))
			{
				if(in_array($param, $GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters']))
				{
					continue;
				}
			}
			
			if(in_array($param, $arrIgnore))
			{
				continue;
			}
			
			// find active GET params
			if(!empty($_GET[$param]) || \Contao\Input::get($param))
			{
				$arrReturn[$param] = $_GET[$param] ?: \Contao\Input::get($param);
			}
			
			// get value from session
			if($arrFilterSession[$param] && !in_array($param, $arrIgnore))
			{
				$value = $arrFilterSession[$param];
				if(is_array($arrFilterSession[$param]))
				{
					$value = implode(',', $arrFilterSession[$param]);
				}
				$arrReturn[$param] = str_replace('%2C',',',$value);
			}
		}
		
		// handle dynamic GET parameters like paginations
		if(count($_GET) > 0)
		{
			foreach($_GET as $param => $value)
			{
				// skip custom parameters
				if(is_array($GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters']))
				{
					if(in_array($param, $GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters']))
					{
						continue;
					}
				}
				
				if(in_array($param, $arrParams))
				{
					$arrReturn[$param] = $value;
				}
				// orderby should be strict
				else if($param == $GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter'])
				{
					$arrReturn[$param] = $value;
				}
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Store the current filters in the session
	 */
	public function storeFilterSession()
	{
		$arrUrlChunks = $this->getActiveFilters();
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName'] ?: 'customcatalogfilter';
		$arrSession = array($this->get('id') => array
		(
			'CURRENT' => array
			(
				'raw'	=> $arrUrlChunks,
				'url'	=> $this->generateFilterUrl($arrUrlChunks),
			)
		));
		\Contao\System::getContainer()->get('request_stack')->getSession()->set($strSession,$arrSession);
	}
	
	
	/**
	 * Remove the filter session
	 */
	public function removeFilterSession()
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName'] ?: 'customcatalogfilter';
		$arrSession = $objSession->all();
		unset($arrSession[$this->get('id')]);
		$objSession->set($strSession,$arrSession);
	}
	
	
	/**
	 * Return the filter session
	 * @return array
	 */
	public function getFilterSession()
	{
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName'] ?: 'customcatalogfilter';
		$arrSession = \Contao\System::getContainer()->get('request_stack')->getSession()->get($strSession);	
		return $arrSession[$this->get('id')]['CURRENT']['raw'] ?? array();
	}
	 
	
	/**
	 * Find all active filter and return as associated array
	 * @return array
	 */
	public function getActiveFilters()
	{
		return $this->generateFilterUrlParams($this->getFilters(),'');
	}
	
	
	/**
	 * Return all groups sorted by their groupsets as array
	 * @return array
	 */
	public function getGroupsets()
	{
		$objGroups = Cache::getDatabaseResult('GroupFactory::fetchAllByCustomElement',$this->get('pid'));
		if(!$objGroups)
		{
			// add groups to the cache
			$objGroups = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid=? ORDER BY sorting,selector")->execute($this->get('pid'));
			
			// add this query to the cache
			Cache::addDatabaseResult('GroupFactory::fetchAllByCustomElement',$this->get('pid'),$objGroups);
		}
		
		if($objGroups->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objGroups->next())
		{
			$selector = (strlen($objGroups->selector) > 0 ? $objGroups->selector : 'default');
			
			$arrReturn[$selector][] = $objGroups->row();
		}
	
		return $arrReturn;
	}
	
	
	/**
	 * Return an attribute object
	 * @param string	Alias of the attribute
	 * @param string 	The palette name
	 * @return object|null
	 */
	public function getAttribute($strField, $strPalette='')
	{
		return CustomCatalogAttributeFactory::findByCustomCatalog( $strField,$this->get('id') );
	}
	
	
// !General Contao
	
	/**
	 * Replace CustomCatalog related inserttags and regular inserttags
	 * @param string
	 * @param object
	 */
	public function replaceInsertTags($strInput)
	{
		return InsertTags::getInstance()->replaceCustomCatalogInsertTags($strInput,$this);
	}
	
}
