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
 * @filter		Select filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;

/**
 * Class file
 * Text
 */
class Text extends \PCT\CustomElements\Filter
{
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// use the filter title or use the urlparameter as filter name
		$name = $this->get('urlparam') ? $this->get('urlparam') : StringUtil::standardize($this->get('title'));
		
		// set the filter name
		$this->setName($name);
		
		// set strictness
		$this->strictMode( (boolean)$this->get('isStrict') );
	}
	
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$strSearch = $this->getSearchValue();
		
		if(strlen($strSearch) < 1)
		{
			return array();
		}
		
		$attr_ids = StringUtil::deserialize($this->get('attr_ids'));
		
		// search all attributes if none is selected
		if(empty($attr_ids))
		{
			$intCE = $this->getOrigin()->get('pid');
			$options = array
			(
				'fields'	=> array('id','alias')
			);
			$objAttributes = \PCT\CustomElements\Core\AttributeFactory::fetchMultiplePublishedByCustomElement($intCE,$options);
			$arrAttributes = array();
			while($objAttributes->next())
			{
				$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($objAttributes->id);
				if($objAttribute === null)
				{
					continue;
				}
				$arrAttributes[] = $objAttribute;
			}
		}
		else
		{
			$arrAttributes = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::findMultiplePublishedById($attr_ids);
		}
		
		$arrAttributes = array_filter($arrAttributes);
		
		if(count($arrAttributes) < 1)
		{
			return array();
		}
		
		$objSearch = null;
		
		if($this->get('mode') == 'keyword')
		{
			$objSearch = $this->performKeywordSearch($strSearch,$arrAttributes);
		}
		else {return array();}
		
		// log the search query for more information
		if($GLOBALS['PCT_CUSTOMCATALOG']['debug'])
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('Search-Query id('.$this->get('id').'): '.$objSearch->__get('query'));
		}
		
		$options = array
		(
			'column' 	=> 'id',
			'operation'	=> 'IN',
		);
		
		// return on empty results
		if($objSearch->numRows < 1)
		{
			return array();
		}
		else
		{
			$options['value'] = $objSearch->fetchEach('id');
		}
		
		return $options;
	}
	
	
	/**
	 * Return the current search value
	 * @return string
	 */
	protected function getSearchValue()
	{
		$value = $this->getValue();
		
		if(is_array($value))
		{
			$value = implode(',', array_filter($value,'strlen'));
		}
		
		return $value;
	}
	
		
	/**
	 * Perform a regular context search by mysql LIKE and return database sql result
	 * @param string	Search string
	 * @param array		The attributes to search in
	 * @return object	Database Result
	 */
	protected function performKeywordSearch($strKeywords, $arrAttributes)
	{
		#// Clean the keywords
		$strKeywords = \Contao\StringUtil::decodeEntities(  mb_strtolower($strKeywords) );
		
		#// (taken from \Contao\Search.php)
		#if (function_exists('mb_eregi_replace'))
		#{
		#   $strKeywords = mb_eregi_replace('[^[:alnum:] \*\+\'"\.:,_-]|\. |\.$|: |:$|, |,$', ' ', $strKeywords);
		#}
		#else
		#{
		#   $strKeywords = preg_replace(array('/\. /', '/\.$/', '/: /', '/:$/', '/, /', '/,$/', '/[^\pN\pL \*\+\'"\.:,_-]/u'), ' ', $strKeywords);
		#}

		// Check keyword string
		if (!strlen($strKeywords))
		{
			throw new \Exception('Empty keyword string');
		}
		
		// build query option array
		$options = array
		(
			'table'		=> $this->getTable(),
			'columns'	=> array(),
		);
		
		$strWhere = '';
		$arrParts = array();
		$arrKeywords = array();
		$arrFields = array('id');
		foreach($arrAttributes as $i => $objAttribute)
		{
			switch($objAttribute->get('type'))
			{
				// tags
				case 'tags':
					$arrIds = $this->searchTags($strKeywords,$objAttribute);
					if(count($arrIds) > 0)
					{
						$arrParts[] = 'id IN('.implode(',', $arrIds).') ';
					}
				break;
				case 'selectdb':
					$arrIds = $this->searchSelectDb($strKeywords,$objAttribute);
					if(count($arrIds) > 0)
					{
						$arrParts[] = 'id IN('.implode(',', $arrIds).') ';
					}
				break;
				case 'select':
					$arrIds = $this->searchSelect($strKeywords,$objAttribute);
					if(count($arrIds) > 0)
					{
						$arrParts[] = 'id IN('.implode(',', $arrIds).') ';
					}
				case 'headline':
					$arrIds = $this->searchHeadline($strKeywords,$objAttribute);
					if(count($arrIds) > 0)
					{
						$arrParts[] = 'id IN('.implode(',', $arrIds).') ';
					}
				break;
				default:
					$arrFields[] = $objAttribute->get('alias');
					$arrParts[] = $objAttribute->get('alias') .' LIKE ?';
					
					if($this->get('fuzzy'))
					{
						$arrKeywords[] = '%'.$strKeywords.'%';
					}
					else
					{
						$arrKeywords[] = $strKeywords;
					}
					
					// HOOK allow unknown filters to hook into the keyword search
					if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['FILTERS']['TEXT']['keywordSearch']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['FILTERS']['TEXT']['keywordSearch']))
					{
						foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['FILTERS']['TEXT']['keywordSearch'] as $callback)
						{
							$field = $objAttribute->get('alias');
							$arr = \Contao\System::importStatic($callback[0])->{$callback[1]}($field,$strKeywords,$objAttribute,$this);
							
							if(!empty($arr[$field]))
							{
								$arrFields = array_merge($arrFields,$arr[$field]['fields']);
								$arrParts = array_merge($arrParts,$arr[$field]['parts']);
								$arrKeywords = array_merge($arrKeywords,$arr[$field]['keywords']);
							}
						}
					}
					
				break;
			}
		}
		
		
		// add additional custom fields from customsql
		$strCustom = $this->get('customsql');
		if(!empty($strCustom))
		{
			$strSearch = $strKeywords;
			
			if( $this->get('fuzzy') )
			{
				$strSearch = '%'.$strKeywords.'%';
			}

			$arrCustom = array_map('trim',explode(',', $strCustom));
			foreach($arrCustom as $field)
			{
				$arrFields[] = $field;
				$arrParts[] = $field . ' LIKE ?';
				$arrKeywords[] = $strSearch;
			}
		}
		
		if(count($arrParts) < 1)
		{
			return null;
		}
		
		$strWhere = implode($this->isStrict() && !$this->get('fuzzy') ? ' AND ' : ' OR ', $arrParts);
		
		$objSearch = \Contao\Database::getInstance()->prepare("SELECT ".(count($arrFields) > 0 ? implode(',', $arrFields) : '*')." FROM ".$this->getTable()." WHERE ".$strWhere)->query('',$arrKeywords);
		
		return $objSearch;
	}
	
	
	/**
	 * Search in tags attributes and return the matching record ids for the current table
	 * @param string
	 * @param object
	 * @return array
	 */
	protected function searchTags($strKeywords,$objAttribute)
	{
		$arrFieldDef = array
		(
			'table'				=> $this->getTable(),
			'field'				=> $objAttribute->get('alias'),
			'source'			=> 'tl_pct_customelement_tags',
			'valueField'		=> 'title',
			'keyField'			=> 'id',
			'sortingField'		=>	'sorting',
			'translationsField' => 'translations',
			'type'				=> $objAttribute->get('type'),
		);
		
		if($objAttribute->get('tag_custom'))
		{
			$arrFieldDef['source'] 			= $objAttribute->get('tag_table') ?: 'tl_pct_customelement_tags';
			$arrFieldDef['valueField'] 		= $objAttribute->get('tag_value') ?: 'title';
			$arrFieldDef['keyField'] 		= $objAttribute->get('tag_key') ?: 'id';
			$arrFieldDef['sortingField'] 	= $objAttribute->get('tag_sorting') ?: 'sorting';
			$arrFieldDef['translationsField'] = $objAttribute->get('tag_translations') ?: 'translations';
		}
		
		return $this->searchDatabaseAttributes($strKeywords,$arrFieldDef);
	}
	
	
	/**
	 * Search in selectdb attributes and return the matching record ids for the current table
	 * @param string
	 * @param object
	 * @return array
	 */
	protected function searchSelectDb($strKeywords,$objAttribute)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$arrFieldDef = array();
		$arrFieldDef['table'] = $this->getTable();
		$arrFieldDef['field'] = $objAttribute->get('alias');
		$arrFieldDef['source'] = $objAttribute->get('selectdb_table');
		$arrFieldDef['valueField'] = $objAttribute->get('selectdb_value');
		$arrFieldDef['keyField'] = $objAttribute->get('selectdb_key');
		$arrFieldDef['translationsField'] = $objAttribute->get('selectdb_translations');

		return $this->searchDatabaseAttributes($strKeywords,$arrFieldDef);
	}
	
	
	/**
	 * Search in headline attributes and return the matching record ids for the current table
	 * @param string
	 * @param object
	 * @return array
	 */
	protected function searchHeadline($strKeywords,$objAttribute)
	{
		$strField = $objAttribute->get('alias');
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
		
		// check if records with headline data exist
		$objRows = \Contao\Database::getInstance()->prepare("SELECT id,".$strField." FROM ".$this->getTable()." WHERE ".$strField. " IS NOT NULL".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
		if($objRows->numRows < 1)
		{
			return array();
		}
		
		$arrIds = array();
		while($objRows->next())
		{
			$arrValue = StringUtil::deserialize($objRows->{$strField});
			if(!is_array($arrValue) || strlen($arrValue['value']) < 1)
			{
				continue;
			}
			
			$strValue = $arrValue['value'];
			
			if( ($this->get('fuzzy') && strlen(strpos(strtolower($strValue), strtolower($strKeywords))) > 0) || (!$this->get('fuzzy') && strtolower($strValue) == $strKeywords) )
			{
				$arrIds[] = $objRows->id;
			}
		}
		
		return $arrIds;
	}


	/**
	 * Search database related attributes like Tags, Selectdb
	 * @param string
	 * @param array
	 */
	protected function searchDatabaseAttributes($strKeywords,$arrFieldDef)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$strTable = $this->getTable();
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');		
		
		$strField = $arrFieldDef['field'];
		$strSource = $arrFieldDef['source'];
		$strValueField = $arrFieldDef['valueField'];
		$strKeyField = $arrFieldDef['keyField'];
		$strTranslationField = $arrFieldDef['translationsField'];
		
		if(!$objDatabase->fieldExists($strField,$strTable) || !$objDatabase->fieldExists($strValueField,$strSource) || !$objDatabase->tableExists($strSource))
		{
			return array();
		}
		
		// check if records with tags data exist
		$objRows = $objDatabase->prepare("SELECT id,".$strField." FROM ".$strTable." WHERE ".$strField. " IS NOT NULL".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
		if($objRows->numRows < 1)
		{
			return array();
		}
		
		// get the active language
		$strLang = $GLOBALS['TL_LANGUAGE'];
		if(strlen(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'])) > 0)
		{
			$strLang = \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']);
		}
		
		$arrIds = array();
		while($objRows->next())
		{
			$addToList = false;
			$hasTranslations = false;
			
			$arrValues = StringUtil::deserialize($objRows->{$strField});
			if(empty($arrValues))
			{
				continue;
			}
			
			if(!is_array($arrValues))
			{
				$arrValues = explode(',', $arrValues);
			}
			
			// search in translations
			$objTranslations = $objDatabase->prepare("SELECT * FROM ".$strSource." WHERE ".$objDatabase->findInSet($strKeyField, array_unique($arrValues)))->execute();
			
			while($objTranslations->next())
			{
				$arrTranslations = StringUtil::deserialize($objTranslations->{$strTranslationField});
				if(empty($arrTranslations) || !is_array($arrTranslations) || strlen($arrTranslations[$strLang]['label']) < 1 )
				{
					continue;
				}
				
				$hasTranslations = true;
					
				$strValue = $arrTranslations[$strLang]['label'];
				if( ($this->get('fuzzy') && strlen(strpos(strtolower($strValue), strtolower($strKeywords))) > 0) || (!$this->get('fuzzy') && strtolower($strValue) == $strKeywords) )
				{
					$addToList = true;
					break; // break the while statement here because we have atleast one result
				}
			}
			
			// if the field has no translations, search the value directly
			if(!$hasTranslations)
			{
				$objResult = $objDatabase->prepare("SELECT * FROM ".$strSource." WHERE ".$strValueField." LIKE ? AND ".$objDatabase->findInSet($strKeyField, array_unique($arrValues)))->execute( ($this->get('fuzzy') ? '%'.$strKeywords.'%' : $strKeywords ) );
				if($objResult->numRows > 0)
				{
					$addToList = true;	
				}
			}
			
			if(!$addToList)
			{
				continue;
			}
			
			if($hasTranslations && $arrFieldDef['type'] != 'tags')
 			{
				// store the language sibling
				$objLanguageEntry = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE pid=? AND lang=? AND source=?")->limit(1)->execute($objRows->id,$strLang,$strTable);
				if($objLanguageEntry->numRows > 0)
				{
					$arrIds[] = $objLanguageEntry->id;
				}
				// it might be the base entry that has translated values
				else
				{
					$objLanguageEntry = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE id=? AND lang=? AND source=?")->limit(1)->execute($objRows->id,$strLang,$strTable);
					if($objLanguageEntry->numRows > 0)
					{
						$arrIds[] = $objLanguageEntry->id;
					}
				}
			}
			else
			{
				$arrIds[] = $objRows->id;
			}
		}
		
		return array_unique($arrIds);
	}
	
	
	/**
	 * Search regular select attribute
	 * @param string
	 * @param object
	 */
	protected function searchSelect($strKeywords,$objAttribute)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$strTable = $this->getTable();
		$strField = $objAttribute->get('alias');
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
		
		// check if records with data exist
		$objRows = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE ".$strField. " IS NOT NULL".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute($strKeywords);
		if($objRows->numRows < 1)
		{
			return array();
		}
		
		$arrOptions = StringUtil::deserialize($objAttribute->get('options'));
		
		$arrIds = array();
		while($objRows->next())
		{
			$strValue = $objRows->{$strField};
			$strLabel = '';
			foreach($arrOptions as $arrOption)
			{
				if($arrOption['value'] == $strValue)
				{
					$strLabel = $arrOption['label'];
				}
			}
			
			if( ($this->get('fuzzy') && strlen(strpos(strtolower($strLabel), $strKeywords)) > 0) || (!$this->get('fuzzy') && strtolower($strLabel) == $strKeywords) )
			{
				$arrIds[] = $objRows->id;
			}
		}
		
		return $arrIds;
	}
	
	
	/**
	 * Render the filter and return string
	 * @param string	Name of the attribute
	 * @param mixed		Active filter values
	 * @param object	Template object
	 * @param object	The current filter object
	 * @return string
	 */
	public function renderCallback($strName,$varValue,$objTemplate,$objFilter)
	{
		if(is_array($varValue))
		{
			$varValue = implode(',', $varValue);
		}
		
		$objWidget = new \Contao\TextField();
		$objWidget->__set('name', $strName);
		$objWidget->__set('id', $strName);
		$objWidget->__set('value', $varValue);
		$objWidget->__set('label', $objFilter->get('label'));
		$objWidget->__set('placeholder', $objFilter->get('defaultValue'));
		
		$objTemplate->name = $strName;
		$objTemplate->value = $varValue;
		$objTemplate->widget = $objWidget->generateWithError();
		$objTemplate->label = $objWidget->generateLabel();
		$objTemplate->placeholder = $objFilter->defaultValue;
		
		if($this->get('autocomplete'))
		{
			global $objPage;
			
			// get the active language
			$strLang = $GLOBALS['TL_LANGUAGE'];
			if(strlen(\Contao\Input::get('language')) > 0 || strlen(\Contao\Input::get('lang')) > 0)
			{
				$strLang = \Contao\Input::get('language') ?: \Contao\Input::get('lang');
			}
			$objTemplate->autocomplete = true;
			$objTemplate->module_id = $this->get('module_id');
			
			$arrParams = array(
				'action'	=> '"textFilterAutocompleteSearch"',
				'table'		=> '"'.$this->getTable().'"',
				'module_id'	=> $this->get('module_id'),
				'filter_id'	=> $this->get('id'),
				'pageId'	=> $objPage->id,
				'language'	=> '"'.$strLang.'"',
			);
			
			$objTemplate->params = $this->convertParams($arrParams);
		}
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Convert an array to a string to use in javascript
	 * @param array
	 * @return string
	 */
	protected function convertParams($arrParams)
	{
		if(count($arrParams) < 1)
		{
			return '';
		}
		
		$tmp = array();
		foreach($arrParams as $k => $v)
		{
			$tmp[] = $k.':'.$v;
		}
		return implode(',',$tmp);
	}
	
	
	/**
	 * Search optional fields like linkText or caption in image attributes also search geolocation fields 
	 * @param string	Field alias
	 * @param string	Current search value
	 * @param object	The attibute object processed
	 * @param object	The filter
	 * @return array	Array containing a stack of fields, subquery parts, and the keyword
	 */
	public function searchGenericOptionFields($strField,$strKeywords,$objAttribute,$objFilter)
	{
		if( isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$objAttribute->get('type')]['doNotSearchOptions']) && $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$objAttribute->get('type')]['doNotSearchOptions'])
		{
			return null;
		}
		
		$strSearch = $strKeywords;
		
		if($objFilter->get('fuzzy'))
		{
			$strSearch = '%'.$strKeywords.'%';
		}
		
		$arrReturn = array();
		
		// search generic option fields
		$arrOptions = StringUtil::deserialize($objAttribute->get('options'));
		if(!empty($arrOptions) && is_array($arrOptions) && !in_array($objAttribute->get('type'), $GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields']))
		{
			$arrReturn[$strField] = array
			(
				'fields' 		=> array(),
				'parts'	 		=> array(),
				'keywords' 		=> array(),
			);
			
			foreach($arrOptions as $option)
			{
				if( !\Contao\Database::getInstance()->fieldExists($strField.'_'.$option,$objFilter->getTable()) )
				{
					continue;
				}
				
				$config = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$objAttribute->get('type')];
				
				// check if option field is not supposed to be searchable
				if(isset($config['fields'][$option]) && !$config['fields'][$option]['searchable'])
				{
					continue;
				}
				
				$arrReturn[$strField]['fields'][] = $strField.'_'.$option;
				$arrReturn[$strField]['parts'][] = $strField.'_'.$option . ' LIKE ?';
				$arrReturn[$strField]['keywords'][] = $strSearch;
			}
		}
		
		return $arrReturn;
	}
}