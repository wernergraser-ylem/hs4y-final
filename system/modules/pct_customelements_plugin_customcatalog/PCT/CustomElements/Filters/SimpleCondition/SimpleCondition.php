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
 * @filter		SimpleCondition
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;

/**
 * Class file
 * SimpleCondition
 */
class SimpleCondition extends \PCT\CustomElements\Filter
{
	/**
	 * Do not render the filter
	 * @var boolean
	 */
	protected $blnDoNotRender = true;
	
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findPublishedById($this->get('attr_id'));
		if(!$objAttribute || strlen($this->get('defaultValue')) < 1)
		{
			return array();
		}
		
		$arrFieldDef = $objAttribute->getFieldDefinition();
		$strField = $objAttribute->get('alias');
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
		
		// handle id lists
		$varValue = $this->get('defaultValue');
		if(strlen(strpos($varValue, '::')) > 0)
		{
			$varValue = str_replace(array('{{','}}'), '', $varValue);
			$arr = explode('::', $varValue);
			$varValue = explode(',',$arr[1]);
		}
		
		$strType = $objAttribute->get('type');
		
		$arrOptions = array();
		switch($strType)
		{
			case 'tags':
			case 'selectDb':
			case 'pagetree':
				if(is_array($varValue))
				{
					$arrIds = array();
					
					$objRows = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$this->getTable()." WHERE ".$objAttribute->get('alias')." IS NOT NULL".(strlen($strPublished) > 0 ? " AND ".$strPublished."=1" : ""))->execute();
					if($objRows->numRows)
					{
						while($objRows->next())
						{
							$values = StringUtil::deserialize($objRows->{$strField});
							if(!is_array($values)) 
							{
								$values = array_filter(explode(',', $values));
							}
							if(count(array_intersect($varValue, $values)) > 0)
							{
								$arrIds[] = $objRows->id;
							}
						}
					}
					
					if(count($arrIds) < 1 && !$this->getCustomCatalog()->getModel()->customcatalog_filter_showAll)
					{
						return array();
					}
					
					$objFilter = new \PCT\CustomElements\Filters\SimpleFilter($arrIds);
					$arrOptions = $objFilter->getOptions();
				}
				// perform text filter search
				else
				{
					$objTextFilter = new \PCT\CustomElements\Filters\Text;
					$objTextFilter->setTable($this->getTable());
					$objTextFilter->setValue($varValue);
					$objTextFilter->set('mode','keyword');
					$objTextFilter->set('attr_ids',array($this->get('attr_id')) );
					$arrOptions = $objTextFilter->getQueryOptionCallback();
				}
				break;
			case 'checkbox':
			case 'select':
				$arrOptions['column'] = $objAttribute->get('alias');
				$arrOptions['operation'] = '=?';
				$arrOptions['value'] = $varValue;
				break;	
			default:
				$arrOptions['column'] = $objAttribute->get('alias');
				$arrOptions['operation'] = 'LIKE';
				$arrOptions['value'] = $varValue;
				break;
		}
		
		return $arrOptions;
	}
}