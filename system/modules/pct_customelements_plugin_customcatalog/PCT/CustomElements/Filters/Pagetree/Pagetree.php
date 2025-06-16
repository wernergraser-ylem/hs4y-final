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
 * @filter		Pagetree filter
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
 * Pagetree
 * Filters a list by a pagetree field
 */
class Pagetree extends \PCT\CustomElements\Filter
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
		global $objPage;
		$objDatabase = \Contao\Database::getInstance();
		
		$strField = $this->getFilterTarget();
		
		if(strlen($strField) < 1)
		{
			return array();	
		}
		
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
		$cacheKey = 'PageTree::findAll::'.(strlen($strPublished) > 0 ? 'Published' : '');
		$objResult = Cache::getDatabaseResult($cacheKey,$strField);
		if($objResult === null)
		{
			$objResult = $objDatabase->prepare("SELECT id,".$strField." FROM ".$this->getTable()." WHERE ".$strField." IS NOT NULL ".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
		
			// add to cache
			Cache::addDatabaseResult($cacheKey,$strField,$objResult);
		}
		
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$blnHasPreSelectedValues = false;
		
		$arrFilterPages = StringUtil::deserialize($this->get('pages')) ?: array();
		if(!is_array($arrFilterPages) && empty($arrFilterPages) === false )
		{
			$arrFilterPages = array_filter( explode(',', $arrFilterPages) );
			$blnHasPreSelectedValues = true;
		}

		// point on manual filter
		$varValue = $this->getValue();
		if(!empty($varValue))
		{
			$arrFilterPages = $varValue;
			$blnHasPreSelectedValues = true;
		}

		// no filter logic selected
		if( !$this->get('byActivePage') && !$this->get('inheritPages') && !$blnHasPreSelectedValues )
		{
			return array();
		}

		
		// result in cache?
		$cacheKey = 'PageTree::filterResult::'.$strField.(strlen($strPublished) > 0 ? '::Published' : '').'::'.implode(',',$arrFilterPages);
		$arrReturn = Cache::getFilterResult($cacheKey);
		if( $arrReturn !== null && is_array($arrReturn) )
		{
			return $arrReturn;
		}
		
		$arrIds = array();
		while($objResult->next())
		{
			$pages = StringUtil::deserialize($objResult->{$strField});
			if(!is_array($pages))
			{
				$pages = array_filter( explode(',',$pages) );
			}

			// preselected filter pages
			if( $blnHasPreSelectedValues )
			{
				if( $this->get('byActivePage') )
				{
					$arrFilterPages[] = $objPage->id;
				}
				if( $this->get('inheritPages') )
				{
					$arrFilterPages = \array_merge($arrFilterPages, $objDatabase->getChildRecords($arrFilterPages,'tl_page'));
				}
				
				if( !$this->get('inversePages') && count( \array_intersect($pages,$arrFilterPages) ) > 0 )
				{
					$arrIds[] = $objResult->id;
				}
				if( $this->get('inversePages') && \count( \array_intersect($pages, $arrFilterPages) ) <  1 )
				{
					$arrIds[] = $objResult->id;
				}

				continue;
			}

			if( $this->get('byActivePage') )
			{
				$arrFilterPages[] = $objPage->id;
			}
			
			// spread to child records
			if( $this->get('inheritPages') )
			{
				$arrFilterPages = array_unique( array_merge($arrFilterPages,$objDatabase->getChildRecords($arrFilterPages,'tl_page')) );
			}
			
			if(empty($pages) && !$this->get('inversePages'))
			{
				continue;
			}
			else if(empty($pages) && $this->get('inversePages'))
			{
				$arrIds[] = $objResult->id;
				continue;
			}
		
			// normal behaviour
			if( !$this->get('inversePages') && count( \array_intersect($pages,$arrFilterPages) ) > 0 )
			{
				$arrIds[] = $objResult->id;
			}
			// inversed behaviour
			if( $this->get('inversePages') && \count( \array_intersect($pages, $arrFilterPages) ) <  1 )
			{
				$arrIds[] = $objResult->id;
			}
		}

		$options = array
		(
			'column'	=> 'id',
			'operation'	=> 'IN',
			'value'		=> $arrIds,
		);
		
		if( empty($arrIds) )
		{
			$options = array();
		}

		// cache the result
		Cache::addFilterResult($cacheKey,$options);
				
		return $options;
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
		
		// use preselected pages only as values
		$values = array();
		
		if($objFilter->get('pages'))
		{
			$values = StringUtil::deserialize($objFilter->get('pages'));
		}
		// fetch all possible values
		else
		{
			$values = $this->fetchValues($this->getTable(),$this->getFilterTarget());
		}
		
		$options = array();
		$isSelected = false;
		
		// build options array
		if(count($values) > 0)
		{
			foreach($values as $i => $v)
			{
				// find related page
				$objPageModel = \Contao\PageModel::findByPk($v);
				
				// check the condition of the value in relation to other filters
				// skip the value if it would produce an empty result
				if( (!$this->hasResults($v) || $objPageModel === null) && $this->get('showEmptyResults') === false)
				{
					continue;
				}
				
				$label = $objPageModel->pageTitle ?: $objPageModel->title ?: $objPageModel->alias ?: $objPageModel->id;
				$isSelected = $this->isSelected($v);
				
				$tmp = array
				(
					'id'		=> 'ctrl_'.$strName.'_'.$i,
					'value'		=> $v,
					'label'		=> $label,
					'name'  	=> $strName,
					'selected'	=> false
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
			$blank = array('value'=>$strName.'_reset','label'=>$label);
			\Contao\ArrayUtil::arrayInsert($options,0,array($blank));
		}
		
		$objTemplate->options = $options;
		$objTemplate->name = $strName;
		$objTemplate->radio = $this->get('isRadio');
		$objTemplate->label = $this->get('label');
		
		return $objTemplate->parse();
	}

}