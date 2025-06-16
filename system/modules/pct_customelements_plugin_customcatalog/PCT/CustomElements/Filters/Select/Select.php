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
 * Select
 */
class Select extends \PCT\CustomElements\Filter
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
		if(!array_filter($this->getValue(),'strlen'))
		{
			return array();
		}
		
		$arrOptions = array();
		// in multiple mode we must look up the values from the blob
		if($this->get('multiple') === true)
		{
			$arrIds = array();
			
			$arrValues = $this->getValue();
			$strField = $this->getFilterTarget();
			$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
			
			$objCache = new \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache();
		
			// look up from cache
			$objRows = $objCache::getDatabaseResult('Select::findAll'.(strlen($strPublished) > 0 ? 'Published' : ''),$strField);
			
			if($objRows === null)
			{
				$objRows = \Contao\Database::getInstance()->prepare("SELECT id,".$strField." FROM ".$this->getTable()." WHERE (".$strField." IS NOT NULL OR ".$strField."!='')".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
				
				// add to cache
				$objCache::addDatabaseResult('Select::findAll'.(strlen($strPublished) > 0 ? 'Published' : ''),$strField,$objRows);
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
			$arrOptions = array
			(
				'column'	=> $this->getFilterTarget(),
				'operation'	=> 'FIND_IN_SET',
				'value'		=> $this->getValue(),
			);
		}
		
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
		
		$labels = StringUtil::deserialize($this->objAttribute->options);
		
		$options = array();
		$isSelected = false;
		
		// build options array
		if(count($values) > 0)
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
				
				$label = $v;
				if(!empty($labels) && is_array($labels))
				{
					foreach($labels as $tmp)
					{
						if( \is_array($tmp) === false )
						{
							$label = $tmp;
							continue;
						}

						if($tmp['value'] == $v)
						{
							$label = $tmp['label'];
						}
					}
				}

				$tmp = array
				(
					'id'		=> 'ctrl_'.$strName.'_'.$i,
					'value'		=> $v,
					'label'		=> $label,
					'name'  	=> $strName,
					'selected' => false,
					'isBlankOption' => false,
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
			$blank = array('value'=>$strName.'_reset','label'=>$label,'selected'=>'','isBlankOption'=>true,'id'=>'ctrl_'.$strName.'_reset');
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
		return $this->fetchValues($this->getTable(),$this->getFilterTarget());
	}

}