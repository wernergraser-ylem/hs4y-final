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
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Frontend;

/**
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Core\FilterFactory as FilterFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;
use PCT\CustomElements\Plugins\CustomCatalog\Core\InsertTags as InsertTags;

/**
 * Class file
 * ModuleList
 */
class ModuleList extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_customcatalog';
	
	/**
	 * Display wildcard
	 */
	public function generate()
	{
		if ( Controller::isBackend() )
		{
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD']['customcataloglist'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			
			return $objTemplate->parse();
		}
		
		// set template
		if($this->customcatalog_mod_template != $this->strTemplate)
		{
			$this->strTemplate = $this->customcatalog_mod_template;
		}
		
		if (isset($_GET['table']) || strlen(\Contao\Input::get('table')) > 0)
		{
			\Contao\Input::setGet('table', \Contao\Input::get('table'));
			\Contao\Input::setGet('pid', \Contao\Input::get('pid'));
		}
		
		return parent::generate();
	}


	/**
	 * Generate the module
	 * @return string
	 */
	protected function compile()
	{
		$objCC = CustomCatalogFactory::findByModule($this->objModel);
		if($objCC === null)
		{
			return '';
		}
		
		// fill the cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::fillCache($objCC->id);
		
		// prepare the filters
		$objFilterCollection = FilterFactory::createCollectionByFilterset( \Contao\StringUtil::deserialize($this->customcatalog_filtersets));
		
		// add a dynamic filter to filter by the parent id or parent alias
		if(\Contao\Input::get('table') && \Contao\Input::get('pid') && \Contao\Input::get('table') == $objCC->getTable())
		{
			$intPidOrAlias = \Contao\Input::get('pid');
			if(is_string($intPidOrAlias) && !is_numeric($intPidOrAlias))
			{
				$objParentCC = CustomCatalogFactory::findByTableName($objCC->get('pTable'));
				$objParentEntry = $objParentCC->findPublishedItemByIdOrAlias($intPidOrAlias);
				$intPidOrAlias = $objParentEntry->id;
			}
			
			$objParentFilter = new \PCT\CustomElements\Filters\SimpleFilter();
			$options = array
			(
				'column'	=> 'pid',
				'operation'	=> '=',
				'value'		=> $intPidOrAlias,
			);
			
			$objParentFilter->setOptions($options);
			$objFilterCollection->add($objParentFilter);
		}
		
		// add a dynamic filter for the custom where clause
		if(strlen($this->customcatalog_sqlWhere) > 0)
		{
			$where = trim(InsertTags::getInstance()->replaceCustomCatalogInsertTags( \Contao\StringUtil::decodeEntities($this->customcatalog_sqlWhere),$objCC));
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
		if($this->customcatalog_filter_actLang && (boolean)$objCC->get('multilanguage') == true)
		{
			$objLanguageFilter = new \PCT\CustomElements\Filters\LanguageSwitch();
			$objLanguageFilter->setTable($this->customcatalog);
			$strLanguage = str_replace('-','_',$GLOBALS['TL_LANGUAGE']);
			
			// apply filter only if no manual language switch is aktive
			if(!$objLanguageFilter->getLanguage() || $objLanguageFilter->getLanguage() == $strLanguage )
			{
				$objLanguageFilter->setLanguage($strLanguage);
				$objLanguageFilter->filterActiveLanguage = true;
				$objLanguageFilter->bypassActiveFilterCheck = true;
				$objFilterCollection->add($objLanguageFilter);
			}
		}
		
		// filter by timestamp: start
		$intTime = time();
		if($this->customcatalog_filter_start > 0)
		{
			$objTimestampFilterStart = FilterFactory::findById($this->customcatalog_filter_start);
			$varValue = $objTimestampFilterStart->getValue();
			if(empty($varValue))
			{
				$objTimestampFilterStart->setValue($intTime);
			}
			$objFilterCollection->add($objTimestampFilterStart);
		}
		// filter by timestamp: stop
		if($this->customcatalog_filter_stop > 0)
		{
			$objTimestampFilterStop = FilterFactory::findById($this->customcatalog_filter_stop);
			$varValue = $objTimestampFilterStop->getValue();
			if(empty($varValue))
			{
				$objTimestampFilterStop->setValue($intTime+86400);
			}
			$objFilterCollection->add($objTimestampFilterStop);
		}
		
		// set the filters
		$objCC->setFilters($objFilterCollection);
		
		// set limit
		$objCC->setLimit($this->customcatalog_limit);
		
		// set offset
		$objCC->setOffset($this->customcatalog_offset);
		
		// add the sorting
		if(strlen($this->customcatalog_sortField) > 0)
		{
			$sortField = $this->customcatalog_sortField;
			$sorting = $this->customcatalog_sorting;
			if($sorting == 'rand')
			{
				$sortField = 'RAND()';
				$sorting = '';
			}
			$objCC->setDefaultSorting($sortField,$sorting);
		}
		
		// add the custom sorting
		if($this->customcatalog_sqlSorting)
		{
			$objCC->addSorting($this->customcatalog_sqlSorting);
		}
		
		// add the custom ID list and its sorting
		$bundles = \array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		if($this->multiSRC && \in_array('pct_tabletree_widget',$bundles))
		{
			$objCustomIdList = new \PCT\CustomElements\Filters\SimpleFilter( \Contao\StringUtil::deserialize($this->multiSRC) );
			// add the ID filter
			$objCC->addFilter($objCustomIdList);
			// add the sorting by the orderSRC field values
			$arrOrderIds = array_filter( \Contao\StringUtil::deserialize($this->orderSRC) ?: array() );
			if( empty($arrOrderIds) === false && empty($this->customcatalog_sqlSorting) === true && empty($this->customcatalog_sortField) === true )
			{
				$objCC->addSorting('FIELD(id,'.implode(',', $arrOrderIds).')');
			}
		}
		
		// add a default sorting by default "orderby" paramter
		if(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter']) || \Contao\Input::post($GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter']))
		{
			$objCC->addSorting(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter']) ?: \Contao\Input::post($GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter']));
		}

		// total number of items
		$intTotal = $objCC->getTotal();
			
		// Pagination (basically the same as \Contao\ModuleNewslist)
		$intPerPage = $this->customcatalog_perPage;
		// handle dynamic page breaks
		if(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlPerPageParameter'].$this->id) > 0)
		{
			$intPerPage = \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlPerPageParameter'].$this->id);
		}
		
		if($intPerPage > 0 && $intPerPage < $intTotal)
		{
			$offset = $this->customcatalog_offset;
			$total = $intTotal - $offset;
			$limit = null;
			
			if ($this->customcatalog_limit > 0)
			{
				$total = min($this->customcatalog_limit, $total);
			}
		
			$id = $GLOBALS['PCT_CUSTOMCATALOG']['urlPaginationParameter'] .$this->id;
			$page = \Contao\Input::get($id) ? : 1;
			
			if ($page < 1 || $page > max(ceil($total/$intPerPage), 1))
			{
				global $objPage;
				$objPage->noSearch = 1;
				$objPage->cache = 0;

				// throw a page not found exception
				throw new \Contao\CoreBundle\Exception\PageNotFoundException('Page not found: ' . \Contao\Environment::get('uri'));
				
				return;
			}
			
			$limit = $intPerPage;
			$offset += (max($page, 1) - 1) * $intPerPage;
			$skip = intval($this->customcatalog_offset);
			
			if ($offset + $limit > $total + $skip)
			{
				$limit = $total + $skip - $offset;
			}
			
			// set new limit and offset
			$objCC->setLimit($limit);
			$objCC->setOffset($offset);
			
			$objPagination = new \Contao\Pagination($total,$intPerPage, \Contao\Config::get('maxPaginationLinks') ,$id);
			$this->Template->pagination = $objPagination->generate();
			
			// add rel="prev" in page head
			if($objPagination->hasPrevious())
			{
				$GLOBALS['TL_HEAD'][] = '<link rel="prev" href="'.str_replace($id.'='.$page,$id.'='.($page - 1),\Contao\Environment::get('request')).'">';
			}
			// add rel="next" in page head
			if($objPagination->hasNext())
			{
				$GLOBALS['TL_HEAD'][] = '<link rel="next" href="'.str_replace($id.'='.$page,$id.'='.($page + 1),\Contao\Environment::get('request')).'">';
			}
		}
		
		$arrCssID = \Contao\StringUtil::deserialize($this->cssID);
		$arrClasses = explode(' ', $arrCssID[1]);
		$arrClasses[] = $objCC->getTable();
		$arrCssID[1] = implode(' ', array_filter(array_unique($arrClasses),'strlen') );
		
		$this->cssID = $arrCssID;

		// render / generate custom catalog	
		#$this->Template->customcatalog = $objCC->render();
		$this->Template->CustomCatalog = $objCC;
		$this->Template->total = $intTotal;
		
		// class variables for inheritage
		$this->CustomCatalog = $objCC;
	}

}