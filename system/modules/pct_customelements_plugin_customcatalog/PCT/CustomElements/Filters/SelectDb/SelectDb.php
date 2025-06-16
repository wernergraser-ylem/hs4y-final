<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		SelectDb filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache;

/**
 * Class file
 * SelectDb
 */
class SelectDb extends \PCT\CustomElements\Filter
{
	/**
	 * The attribute
	 * @param object
	 */
	protected $objAttribute = null;
	
	
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// fetch the attribute the filter works on
		$this->objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($this->get('attr_id'));
	
		// point the filter to the attribute or use the urlparameter
		$strName = $this->get('urlparam') ? $this->get('urlparam') : $this->objAttribute->alias;
		
		// set the filter name
		$this->setName($strName);
		
		// point the filter to the attribute
		$this->setFilterTarget($this->objAttribute->alias);
		
		// make filter multiple
		if( $this->objAttribute->eval_multiple || $this->objAttribute->type == 'checkboxMenu' )
		{
			$this->set('multiple',true);
		} 

		// show empty results
		$this->set('showEmptyResults',false);
		if(isset($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['showEmptyResults']))
		{
			$this->set('showEmptyResults',(boolean)$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['showEmptyResults']);
		}
	
		// check if the filter should be resetted, if so reset the filter
		if($this->reset($strName))
		{
			$this->reset();
		}
	}
	
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$varValue = $this->getValue();
		if(empty($varValue))
		{
			return array();
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$arrSettings = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']['selectdb']['settings'];
		$strValueField = $this->objAttribute->selectdb_value;
		$strKeyField = $this->objAttribute->selectdb_key;
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
		$blnHasIdField = $objDatabase->fieldExists('id',$this->objAttribute->selectdb_table);
		$strField = $this->getFilterTarget();
	
		$cacheKey = 'SelectDb::filterResult::'.$strField.(strlen($strPublished) > 0 ? '::Published' : '').'::'.implode(',',$varValue);
		$arrReturn = Cache::getFilterResult($cacheKey);
		if( $arrReturn !== null && is_array($arrReturn) )
		{
			return $arrReturn;
		}
		
		$arrOptions = array();
		// in multiple mode we must look up the values from the blob
		if($this->get('multiple') === true)
		{
			$arrIds = array();
			
			$arrValues = $varValue;
			
			// look up from cache
			$objRows = Cache::getDatabaseResult('SelectDb::findAll'.(strlen($strPublished) > 0 ? 'Published' : ''),$strField);
			
			if($objRows === null)
			{
				$objRows = \Contao\Database::getInstance()->prepare("SELECT id,".$strField." FROM ".$this->getTable()." WHERE (".$strField." IS NOT NULL OR ".$strField."!='')".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
				
				// add to cache
				Cache::addDatabaseResult('SelectDb::findAll'.(strlen($strPublished) > 0 ? 'Published' : ''),$strField,$objRows);
			}
			
			while($objRows->next())
			{
			  	$values = StringUtil::deserialize($objRows->{$strField});
				if(!is_array($values))
				{
					$values = array_filter(explode(',', $values));
				}
				
				if(array_intersect($arrValues, $values))
				{
					$arrIds[] = $objRows->id;
				}
			}
			
			$arrIds = array_filter(array_unique($arrIds));
			if(count($arrIds) < 1)
			{
				return array();
			}
			
			$arrOptions = array
			(
				'column'	=> 'id',
				'operation'	=> 'IN',
				'value'		=> $arrIds,
			);
		}
		else
		{
			// use straight id values
			if($blnHasIdField && (boolean)$arrSettings['useIdsAsFilterValue'] === true && $strKeyField == 'id')
			{
				$options = array
				(
					'column'	=> $this->getFilterTarget(),
					'operation'	=> 'FIND_IN_SET',
					'value'		=> $varValue,
				);
				return $options;
			}
			
			// find the value for the key field because this one has been saved in the entry
			$objSource = \Contao\Database::getInstance()->prepare("SELECT ".$strKeyField.','.$strValueField." FROM ".$this->objAttribute->selectdb_table." WHERE ".$strValueField."=?".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->limit(1)->execute($varValue);
			if($objSource->numRows < 1)
			{
				return array();
			}
			
			$arrOptions = array
			(
				'column'	=> $this->getFilterTarget(),
				'operation'	=> 'FIND_IN_SET',
				'value'		=> $objSource->{$strKeyField},
			);
		}
		
		// cache the result
		Cache::addFilterResult($cacheKey,$arrOptions);
		
		return $arrOptions;
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
		$objJumpTo = $objFilter->jumpTo;
		$objModule = $objFilter->getModule();
		
		$values = $this->getSelectOptions();

		$options = array();
		$isSelected = false;
		
		// build options array
		if(!empty($values) && is_array($values))
		{
			foreach($values as $i => $v)
			{
				// check the condition of the value in relation to other filters
				// skip the value if it would produce an empty result
				if(!$this->hasResults($v) && $this->get('showEmptyResults') === false)
				{
					continue;
				}
				
				$isSelected = $this->isSelected($v);
				
				$tmp = array
				(
					'id'		=> 'ctrl_'.$strName.'_'.$i,
					'value'		=> $v,
					'label'		=> $v,
					'name'  	=> $strName,
					'selected' => false,
				);
				
				// translate label
				if($this->hasTranslation($v))
				{
					$tmp['label'] = $this->getTranslatedValue($v);
				}
				
				if($isSelected)
				{
					$tmp['selected'] = true;
					$tmp['href'] = $objFilter->removeFromUrl($v,$objJumpTo,$objFilter->getModule()->customcatalog_filter_method);
					$isSelected = true;
				}
				else
				{
					$tmp['href'] = $objFilter->addToUrl($v,$objJumpTo,$objFilter->getModule()->customcatalog_filter_method);
				}
				
				$options[] = $tmp;
			}
		}
		
		// insert blank option for resetting the filter
		if($this->get('includeReset'))
		{
			$label = !$isSelected ? sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_firstOption'],$this->objAttribute->title) : $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_reset'];
			$blank = array('value'=>$strName.'_reset','label'=>$label,'selected'=>false,'isBlankOption'=>true,'id'=>'ctrl_'.$strName.'_reset');
			\Contao\ArrayUtil::arrayInsert($options,0,array($blank));
		}
		
		$objTemplate->options = $options;
		$objTemplate->name = $strName;
		$objTemplate->radio = $this->get('isRadio');
		$objTemplate->label = $this->get('label');
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Prepare the options for the widget
	 * @return array
	 */
	protected function getSelectOptions()
	{
		$filterValues = $this->fetchValues($this->getTable(),$this->getFilterTarget());
		
		if(empty($filterValues))
		{
			return array();
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$arrSettings = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']['selectdb']['settings'];
		$strValueField = $this->objAttribute->selectdb_value;
		$strKeyField = $this->objAttribute->selectdb_key;
		$strTranslationField = $this->objAttribute->selectdb_translations;
		$blnHasIdField = $objDatabase->fieldExists('id',$this->objAttribute->selectdb_table);
		
		$objResult = $objDatabase->prepare("SELECT ".$strKeyField.','.$strValueField.($strTranslationField ? ','.$strTranslationField:'')." FROM ".$this->objAttribute->selectdb_table." WHERE ".$objDatabase->findInSet($strKeyField,$filterValues).($this->objAttribute->selectdb_where ? " AND ".\Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($this->objAttribute->selectdb_where) : "").(strlen($this->objAttribute->selectdb_sorting) > 0 ? " ORDER BY ". $this->objAttribute->selectdb_sorting : "" ))->execute();
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			$varValue = $objResult->{$strValueField};
			
			// use ID field
			if($blnHasIdField && (boolean)$arrSettings['useIdsAsFilterValue'] === true && $strKeyField == 'id')
			{
				$varValue = $objResult->id;
			}
			// use key field value
			else if(!$blnHasIdField && (boolean)$arrSettings['useIdsAsFilterValue'] === true)
			{
				$varValue = $objResult->{$strKeyField};
			}
			
			$this->addTranslation($varValue,$objResult->{$strValueField},$GLOBALS['TL_LANGUAGE']);
			
			// store the translations
			if(strlen($objResult->{$strTranslationField}) > 0)
			{
				$arrTranslations = StringUtil::deserialize($objResult->{$strTranslationField});
				foreach($arrTranslations as $lang => $arrTranslation)
				{
					$strLabel = $arrTranslation['label'];
					if(strlen($strLabel) < 1)
					{
						$strLabel = $objResult->{$strValueField};
					}
					
					$this->addTranslation($varValue,$strLabel,$lang);
				}
			}
			
			$arrReturn[ $objResult->{$strKeyField} ] = $varValue;
		}
		
		return $arrReturn;
	}

}