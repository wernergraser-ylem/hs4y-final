<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	Attribute SelectDb (database)
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

use Contao\Input;
use Contao\System;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache;

/**
 * Class file
 * SelectDb
 */
class SelectDb extends \PCT\CustomElements\Core\Attribute
{
	protected $arrReference = array();
	protected $arrOptions = array();

	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'				=> array( $this->get('title'),$this->get('description') ),
			'exclude'			=> true,
			'inputType'			=> ($this->get('isRadio') ? 'radio' : 'select'),
			'default'			=> System::getContainer()->get('contao.insert_tag.parser')->replace( $this->get('defaultValue') ?? '' ),
			'eval'				=> array_merge($this->getEval(), array('chosen'=>true) ),
			'sql'				=> "varchar(128) NOT NULL default ''",
		);
		
		if($this->get('eval_multiple'))
		{
			$arrReturn['sql'] = "blob NULL";	
		}

		$arrReturn['options_callback'] = array(\get_class($this),'getOptionsCallback');

		return $arrReturn;
	}

	
	/**
	 * Render the attribute and return html
	 * @return string
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$strValueField = $objAttribute->get('selectdb_value');
		$strKeyField = $objAttribute->get('selectdb_key');
		$strTranslationField = $objAttribute->get('selectdb_translations');
		$strSource = $objAttribute->get('selectdb_table');
		
		if(!$objDatabase->tableExists($strSource))
		{
			return '<p class="error">Source table does not exist</p>';
		}
		
		$objResult = $objDatabase->prepare("SELECT ".$strKeyField.','.$strValueField.($strTranslationField ? ','.$strTranslationField:'')." FROM ".$strSource." WHERE ".$strKeyField."=? ".(strlen($objAttribute->get('selectdb_where')) > 0 ? " AND ".$objAttribute->get('selectdb_where') : "" ).(strlen($objAttribute->get('selectdb_sorting')) > 0 ? " ORDER BY ". $objAttribute->get('selectdb_sorting') : "" ))->limit(1)->execute($varValue);
		
		if($objResult->numRows > 0)
		{
			$objTemplate->result = $objResult;
			
			$strValue = $objResult->{$strValueField};
			
			// store the translations
			$arrTranslations = \Contao\StringUtil::deserialize($objResult->{$strTranslationField});
				
			if(is_array($arrTranslations) && !empty($arrTranslations))
			{
				foreach($arrTranslations as $lang => $arrTranslation)
				{
					$this->addTranslation($objResult->{$strValueField},$arrTranslation['label'],$lang);
				}
			}
			
			if($objAttribute->hasTranslation($strValue))
			{
				$strValue = $objAttribute->getTranslatedValue($strValue);
			}
			
			$objTemplate->value = $strValue;
		}
		
		return $objTemplate->parse();
	}


	/**
	 * Return the option values as array
	 * @param object
	 * @return array
	 */
	public function getOptionsCallback($objDC)
	{
		$isCustomCatalog = ( (isset($GLOBALS['TL_DCA'][$objDC->table]['createdByCustomCatalog']) && $GLOBALS['TL_DCA'][$objDC->table]['createdByCustomCatalog']) ? true :false);

		$objAttribute = null;
		if( $isCustomCatalog === true )
		{
			$objAttribute = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::findByCustomCatalog($objDC->field, $objDC->table);
		}
		else
		{
			$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findByAliasAndCustomElement( $objDC->field, $objDC->activeRecord->type );
		}
		
		if( $objAttribute !== null )
		{
			$this->id = $objAttribute->id;
		}

		$arrReturn = $this->getOptions();
		if( !empty($arrReturn) )
		{
			foreach( $arrReturn as $k => $v )
			{
				$this->arrReference[$k] = $v;
				// add translation for current language
				$this->addTranslation($k,$v,$GLOBALS['TL_LANGUAGE']);
			}
		}

		return $arrReturn;
	}

	
	/**
	 * Load the options
	 * @param 
	 */
	public function getOptions()
	{
		if( $this->isModified('options_'.$this->id) )
		{
			return $this->arrOptions;
		}
		
		#$objAttribute = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::findByDca($objDC);
		$objAttribute = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::findById( $this->id );
		if($objAttribute === null)
		{
			return array();
		}
		
		$objDatabase = \Contao\Database::getInstance();
		
		$strValueField = $objAttribute->get('selectdb_value');;
		$strKeyField = $objAttribute->get('selectdb_key');
		$strTranslationField = $objAttribute->get('selectdb_translations');
		$strSource = $objAttribute->get('selectdb_table');
		
		if(strlen($strKeyField) < 1 || strlen($strValueField) < 1 || strlen($strSource) < 1 || !$objDatabase->tableExists($strSource) )
		{
			return array();
		}
		
		$objResult = \Contao\Database::getInstance()->execute("SELECT ".$strKeyField.','.$strValueField.($strTranslationField ? ','.$strTranslationField:'')." FROM ".$strSource.(strlen(trim($objAttribute->get('selectdb_where'))) > 0 ? " WHERE ". $objAttribute->get('selectdb_where') : "" ).(strlen($objAttribute->get('selectdb_sorting')) > 0 ? " ORDER BY ". $objAttribute->get('selectdb_sorting') : "" ));
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			$strLabel = $objResult->{$strValueField};
			// store the translations
			if(strlen($objResult->{$strTranslationField}) > 0)
			{
				$arrTranslations = \Contao\StringUtil::deserialize($objResult->{$strTranslationField}) ?: array();
				foreach($arrTranslations as $lang => $arrTranslation)
				{
					$this->addTranslation($objResult->{$strValueField},$arrTranslation['label'],$lang);
				}
				
				$strLabel = $this->getTranslatedValue($strLabel);
			}
			
			$arrReturn[$objResult->{$strKeyField}] = $strLabel;
		}

		// set modified
		$this->arrOptions = $arrReturn;
		$this->setModified('options_'.$this->id);

		return $arrReturn;
	}
	
	
	/**
	 * Backend filtering
	 * @param array		The attribute field defintion
	 * @param string	The attribute alias/name
	 * @param object	The attribute object
	 * @param object	The DataContainer Object
	 * @return string	The filter part for the Contao query
	 */
	public function getBackendFilterOptions($arrData,$strField,$objAttribute,$objCC)
	{
		// add filter result to cache
		$cacheKey = 'SelectDb::filterResult::'.$strField;
		$arrReturn = Cache::getFilterResult($cacheKey);
		if( $arrReturn !== null && is_array($arrReturn) )
		{
			return $arrReturn;
		}

		$arrIds = array();
		$strTable = $objCC->getTable();
		
		// get field options
		$objDC = new \StdClass();
		$objDC->table = $strTable;
		$objDC->field = $strField;
		$objDC->attribute_id = $objAttribute->id;

		$arrOptions = $this->getOptions($objDC);

		if(count($arrOptions) < 1)
		{
			return array();
		}
		
		$objSession = System::getContainer()->get('request_stack')->getSession();
		$objDatabase = \Contao\Database::getInstance();
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'];
		$arrSession = $objSession->get($strSession);
		
		$varFilterValue = $arrSession[$strSession][$strTable][$strField] ?? null;
		$varSearchValue = $arrSession[$strSession.'_search'][$strTable]['value'] ?? '';
		$strSearchField = $arrSession[$strSession.'_search'][$strTable]['field'] ?? '';
		
		if( Input::post('FORM_SUBMIT') == 'tl_filters' && Input::post($strField) !== null && Input::post($strField) != 'tl_'.$strField )
		{
			// update helper session
			$arrSession[$strSession][$strTable][$strField] = Input::post($strField);
			$objSession->set($strSession, $arrSession);
			// clear the value from the post data to avoid contaos internal filter routine to process the value
			Input::setPost($strField,null);
		}

		// search
		if( Input::post('FORM_SUBMIT') == 'tl_filters' &&  Input::post('tl_field') == $strField && Input::post('tl_value') !== null )
		{
			// update helper session
			$arrSession[$strSession.'_search'][$strTable]['field'] = $strField;
			$arrSession[$strSession.'_search'][$strTable]['value'] = Input::post('tl_value');
			$objSession->set($strSession, $arrSession);
			// clear the value from the post data to avoid contaos internal filter routine to process the value
			Input::setPost('tl_value',null);
		}


		// contao backend session bag
		$objSessionBag = $objSession->getBag('contao_backend');
		$arrSessionBag = $objSessionBag->all();

		if( isset($arrSessionBag['filter'][$strTable][$strField]) && !empty($arrSessionBag['filter'][$strTable][$strField]) )
		{
			$varFilterValue = $arrSessionBag['filter'][$strTable][$strField];
			// remove from contaos filter session to apply custom filtering
			unset($arrSessionBag['filter'][$strTable][$strField]);
			$objSessionBag->replace($arrSessionBag);
		}
		
		if( isset($arrSessionBag['search'][$strTable]['value']) && !empty($arrSessionBag['search'][$strTable]['value']) )
		{
			$varSearchValue = $arrSessionBag['search'][$strTable]['value'];
			// remove from contaos filter session to apply custom filtering
			unset($arrSessionBag['search'][$strTable]['value']);
			$objSessionBag->replace($arrSessionBag);
		}

		// reset filter
		if( Input::post('FORM_SUBMIT') == 'tl_filters' && Input::post($strField) == 'tl_'.$strField)
		{
			unset($arrSession[$strSession][$strTable][$strField]);
			$objSession->set($strSession,$arrSession);
		}

		// reset search
 		#if( Input::post('FORM_SUBMIT') == 'tl_filters' && Input::post('tl_field') == $strField && Input::post('tl_value') == '')
		#{
		#	unset($arrSession[$strSession.'_search'][$strTable]['field']);
		#	unset($arrSession[$strSession.'_search'][$strTable]['value']);
		#	$objSession->set($strSession,$arrSession);
		#}
		
		// full reset
		if( Input::post('FORM_SUBMIT') == 'tl_filters' && (int)Input::post('filter_reset') > 0 )
		{
			unset($arrSession[$strSession][$strTable][$strField]);
			unset($arrSession[$strSession.'_search'][$strTable]['field']);
			unset($arrSession[$strSession.'_search'][$strTable]['value']);
			$objSession->set($strSession,$arrSession);
			return array();
		}

		// SEARCH: search field is set or user is searching the field right now
		if(!empty($varSearchValue) && $strSearchField == $strField)
		{
			$varValue = array_search($varSearchValue, $arrOptions);
			
			$objResults = $objDatabase->prepare("SELECT id FROM ".$strTable." WHERE ".$objDatabase->findInSet($strField,array($varValue)))->execute();
			if($objResults->numRows > 0)
			{
			   $arrIds = array_merge($arrIds,$objResults->fetchEach('id'));
			}
		}
		
		// FILTER
		if(!empty($varFilterValue))
		{
			$objResults = $objDatabase->prepare("SELECT id FROM ".$strTable." WHERE ".$objDatabase->findInSet($strField,array($varFilterValue)) )->execute();
			if($objResults->numRows > 0)
			{
			   $arrIds = array_merge($arrIds,$objResults->fetchEach('id'));
			}
		}

		// no search hits, set impossible query
		if( empty($arrIds) && $strSearchField == $strField && !empty($varSearchValue) )
		{
			$arrIds = array(-1);
		}
		
		if(count($arrIds) < 1)
		{
			return array();
		}

		$arrReturn = array('FIND_IN_SET(id,?)',implode(',',array_unique($arrIds)));		
		Cache::addFilterResult($cacheKey,$arrReturn);

		return $arrReturn;
	}
	
	
	/**
	 * Custom sorting routine
	 * @param array		The attribute field defintion
	 * @param string	The attribute alias/name
	 * @param object	The attribute object
	 * @param object	The DataContainer Object
	 * @return string	The ORDER BY part for the Contao query
	 */
	public function getBackendSortingOptions($arrData,$strField,$objAttribute,$objDC)
	{
		$_dc = clone($objDC);
		$_dc->field = $strField;
		$_dc->attribte_id = $objAttribute->id;
		
		$arrOptions = $this->getOptions($_dc);
		
		if(count($arrOptions) < 1)
		{
			return array();
		}
		
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findByTableName($objDC->table);
		if($objCC === null)
		{
			return '';
		}
		
		$flag = $objCC->get('list_flag');
		
		// ascending
		if( in_array($flag, array(1,3,11)) || !$flag )
		{
			asort($arrOptions,SORT_NATURAL);
		}
		// descending
		else if( in_array($flag, array(2,4,12)) )
		{
			arsort($arrOptions,SORT_NATURAL);
		}
		
		return 'FIELD('.$objAttribute->get('alias').','.implode(',', array_keys($arrOptions)).')';
	}
	
	
	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @param integer	Id of the Element ( >= CE 1.2.9)
	 * @param string	Name of the table ( >= CE 1.2.9)
	 * @return string
	 */
	public function processWildcardValue($varValue,$objAttribute)
	{
		if($objAttribute->get('type') != 'selectdb')
		{
			return $varValue;
		}
		
		$objTemplate = new \Contao\BackendTemplate('be_customelement_attr_default');
		$objTemplate->setData($objAttribute->getData());
		
		return $this->renderCallback($objAttribute->get('alias'),$varValue,$objTemplate,$objAttribute);
	}
	
}