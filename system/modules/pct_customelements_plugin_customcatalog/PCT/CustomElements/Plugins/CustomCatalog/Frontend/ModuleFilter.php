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

use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\TemplateFilter as TemplateFilter;
use PCT\CustomElements\Core\FilterFactory as FilterFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * ModuleFilter
 */
class ModuleFilter extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_customcatalogfilter';
	
	/**
	 * Display wildcard
	 */
	public function generate()
	{
		if ( Controller::isBackend() )
		{
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD']['customcatalogfilter'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			
			return $objTemplate->parse();
		}
		
		// return and do not index the page when there is no table selected
		if(!$this->customcatalog || strlen($this->customcatalog) < 1)
		{
			global $objPage;
			$objPage->noSearch = 1;
			$objPage->cache = 0;
			return '';
		}
		
		// set template
		if($this->customcatalog_mod_template != $this->strTemplate)
		{
			$this->strTemplate = $this->customcatalog_mod_template;
		}
		
		return parent::generate();
	}


	/**
	 * Generate the module
	 * @return string
	 */
	protected function compile()
	{
		if(!$this->customcatalog_filtersets)
		{
			return '';
		}
		
		$objModel = $this->objModel;
		
		$objCC = CustomCatalogFactory::findByModule($objModel);
		if(!$objCC)
		{
			return;
		}

		$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
		
		// fill the cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::fillCache($objCC->id);
		
		// create a new template object and inherit from contaos default
		$objTemplate = $this->Template;
		$this->Template = new \PCT\CustomElements\Plugins\CustomCatalog\Core\FrontendTemplate($this->strTemplate);
		$this->Template->setData($objTemplate->getData());
		
		$objFilterCollection = FilterFactory::createCollectionByFilterset( \Contao\StringUtil::deserialize($this->customcatalog_filtersets));
		
		// return if there is no active filter
		if($objFilterCollection->getCount() < 1)
		{
			$this->Template->empty = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_empty'];
			return;
		}
		
		// check if we are on a reader page. if so, keep the active item alive
		$strActiveItem = '';
		if(\Contao\Config::getInstance()->get('useAutoItem') && \Contao\Input::get('auto_item',false,true))
		{
			$strActiveItem = '/'.\Contao\Input::get('auto_item',false,true);
		}
		else if(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']))
		{
			if(\Contao\Config::getInstance()->get('rewriteURL'))
			{
				$strActiveItem = '/'.$GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'].'/'.\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']);
			}
			else
			{
				$strActiveItem = $GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'].'='.$strActiveItem;
			}
		}
		
		// jump to
		global $objPage;
		$strAction = '';
		if($this->customcatalog_jumpTo > 0)
		{
			$objJumpTo = \Contao\PageModel::findByPk($this->customcatalog_jumpTo);
		}
		else
		{
			$objJumpTo = $objPage;
		}
		
		// add active item parameter
		$blnAddActiveItem = false;
		if($this->customcatalog_jumpTo < 1 || ($this->customcatalog_jumpTo == $objPage->id && strlen($strActiveItem) > 0) )
		{
			$blnAddActiveItem = true;
		}

		$strAction = $objRouter->generate($objJumpTo,array('parameters'=>($blnAddActiveItem ? $strActiveItem : null)));
			
		// attach the filters to the custom catalog
		$objCC->setFilters($objFilterCollection);
		
		$arrFilters = array();
		$arrFormFields = array();
		$arrFiltersAssoc = array();
		$arrVisibles = (strlen($this->customcatalog_visibles) > 0 ? \Contao\StringUtil::deserialize($this->customcatalog_visibles) : array() );
		foreach($objFilterCollection->getFilters() as $i => $objFilter)
		{
			// trigger the processFilter hook
			$objFilter = \PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('processFilterHook',array($objFilter,$objCC));
			
			// filter by visibles
			if($this->customcatalog_setVisibles && !in_array($objFilter->get('id'), $arrVisibles) || $objFilter->get('blnDoNotRender') === true)
			{
				continue;
			}
			
			$strName = $objFilter->getName();
			$arrClass = array('filter',$objFilter->get('type'),$strName);
			$i == 0 ? $arrClass[] = 'first' : '';
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			$i >= $objFilterCollection->getCount() -1 ? $arrClass[] = 'last' : '';
			
			$objTemplateFilter = new TemplateFilter($objFilter);
			$objTemplateFilter->name = $strName;
			$objTemplateFilter->label = $objFilter->get('label');
			$objTemplateFilter->class = implode(' ', $arrClass);	
			
			$arrFilters[] = $objTemplateFilter;
			$arrFormFields[] = $strName;
			$arrFiltersAssoc[$strName] = $objTemplateFilter;
		}
		$this->Template->filters = $arrFilters;
	
		if(count($arrFormFields) < 1)
		{
			$this->Template->empty = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_empty'];
			return;
		}
		
		// form vars
		$formName = (strlen($this->customcatalog_filter_formID) > 0 ? $this->customcatalog_filter_formID : 'cc_filter_'.$this->id);
		
		// submit button
		if(!$this->customcatalog_filter_submit)
		{
			$this->Template->hasSubmit = true;
			
			$objSubmit = new \Contao\FormSubmit();
			$objSubmit->__set('id', $formName);
			$objSubmit->__set('value', $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_submit'] ? $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_submit'] : 'submit');
			$objSubmit->__set('label', $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_submit'] ? $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_submit'] : 'submit');
			$objSubmit->__set('class','submit');
			$objSubmit->addAttribute('value',$objSubmit->__get('value'));
			$this->Template->submit = $objSubmit->generateWithError();
			$this->Template->submitLabel = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_submit'] ?: 'submit';
		}
		
		// clear button
		$objReset = new \Contao\FormSubmit();
		$objReset->__set('id', $formName.'_clear');
		$objReset->__set('value', $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_clear'] ?: 'clear');
		$objReset->__set('label', $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_clear'] ?: 'clear');
		$objReset->__set('class','clear_filters');
		$objReset->__set('name',$formName.'_clear');
		$objReset->addAttribute('value',$objReset->__get('value'));
		$this->Template->clear = $objReset->generateWithError();
		$this->Template->clearLabel = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_clear'] ? : 'clear';
		
		// clearall button
		$objResetAll = new \Contao\FormSubmit();
		$objResetAll->__set('id', $formName.'_clearall');
		$objResetAll->__set('value', $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_clearAll'] ?: 'clear all');
		$objResetAll->__set('label', $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_clearAll'] ?: 'clear all');
		$objResetAll->__set('class','clearall clear_all_filters');
		$objResetAll->__set('name',$formName.'_clearall');
		$objResetAll->addAttribute('value',$objResetAll->__get('value'));
		$this->Template->clearAll = $objResetAll->generateWithError();
		$this->Template->clearAllLabel = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_clearAll'] ?: 'clear all';
		

		// clear all
		if(\Contao\Input::post($formName.'_clearall') !== null || \Contao\Input::get($formName.'_clearall') !== null )
		{
			// remove the filter session
			$objCC->removeFilterSession();
			$this->redirect( $objRouter->generate($objPage,array('parameters'=>$strActiveItem)) );
		}
		// clear filter and redirect
		else if(\Contao\Input::post($formName.'_clear') || \Contao\Input::get($formName.'_clear'))
		{
			// get the active filters for this CC
			$arrActFilters = $objCC->getActiveFilters();
			
			// remove from url
			$strRedirect = '';
			foreach($arrActFilters as $name => $value)
			{
				foreach($objFilterCollection->getFilters() as $i => $objFilter)
				{
					if($objFilter->getName() == $name)
					{
						$strRedirect = \PCT\CustomElements\Core\FilterFactory::removeFromUrl($objFilter,$strRedirect);
					}
				}
			}
			
			if(strlen($strRedirect) > 0)
			{
				$strRedirect = \PCT\CustomElements\Helper\Functions::removeFromUrl($formName.'_clear',$strRedirect);
				$this->redirect($strRedirect);
			}
			
			// remove the filter session
			$objCC->removeFilterSession();
			
			$this->redirect( $objRouter->generate($objPage,array('parameters'=>$strActiveItem)) );
		}
		
		
		// redirect to filter url
		if($this->customcatalog_filter_method == 'post' && \Contao\Input::post('FORM_SUBMIT') == $formName)
		{
			// generate the filter url parameters as array
			$arrFilterUrlParams = $objCC->generateFilterUrlParams($objCC->getFilters(),$this->customcatalog_filter_method);
			
			// build the url parameter string
			$strFilterUrlParams = $objCC->generateFilterUrl($arrFilterUrlParams,$this->customcatalog_filter_method);
			
			// get filter url
			$strRedirect = $objRouter->generate($objJumpTo,array('parameters'=>$strFilterUrlParams ? $strFilterUrlParams:''));
		
			// get respectable filter parameters
			$arrRespectableParams = $objCC->getRespectableUrlParams(array_keys($arrFilterUrlParams),$this->customcatalog_filter_method);
			if(count($arrRespectableParams) > 0)
			{
				// filter by submitted filters
				foreach($objCC->getFilters() as $objFilter)
				{
					$param = $objFilter->getName();
					if(!array_key_exists($param, $arrRespectableParams) && !\Contao\Input::post($param))
					{
						unset($arrRespectableParams[$param]);
					}
				}
				
				if(strlen(strpos($strRedirect, '?')) > 0 || strlen(strpos($strRedirect, '&#63;')) > 0)
				{
					$strRedirect = StringUtil::ampersand(str_replace(array('?','&#63;'), '', $strRedirect).'?'.http_build_query($arrRespectableParams) );
				}
				else
				{
					$strRedirect .= StringUtil::ampersand('?'.http_build_query($arrRespectableParams));
				}
			}
			
			// store the applied filters in the session to keep them alive even after reloading the page
			$objCC->storeFilterSession();
			
			// redirect
			$this->redirect($strRedirect);
		}
		
		// add the current GET parameters to the form action url
		if($this->customcatalog_filter_method == 'post')
		{
			$arrFilterUrlParams = array();
			foreach($objCC->getFilters() as $objFilter)
			{
				$arrFilterUrlParams[] = $objFilter->getName();
			}
			// get respectable filter parameters
			$arrRespectableParams = $objCC->getRespectableUrlParams($arrFilterUrlParams,$this->customcatalog_filter_method);
			if(count($arrRespectableParams) > 0)
			{
				if(strlen(strpos($strAction, '?')) > 0 || strlen(strpos($strAction, '&#63;')) > 0)
				{
					$strAction = StringUtil::ampersand(str_replace(array('?','&#63;'), '', $strAction).'?'.http_build_query($arrRespectableParams) );
				}
				else
				{
					$strAction .= StringUtil::ampersand('?'.http_build_query($arrRespectableParams));
				}
			}
		}
		
		// create hidden fields to for any GET parameter in the url that is not been created by a filter
		$strHidden = '';
		if($this->customcatalog_filter_method == 'get')
		{
			$arrRespectableParams = $objCC->getRespectableUrlParams();
			foreach($arrRespectableParams as $f => $v)
			{
				if(\Contao\Input::get($f) == '')
				{
					unset($arrRespectableParams[$f]);
				}
				
				if(is_array($v))
				{
					$v = implode(',', $v);
				}
				$strHidden .= '<input type="hidden" name="'.$f.'" value="'.$v.'">';
			}
		}
		
		// form attributes
		$attributes = array();
		if($this->customcatalog_filter_submit)
		{
			$attributes[] = 'onchange="this.submit();"';
		}
		
		$arrCssID = \Contao\StringUtil::deserialize($this->cssID);
		$arrClasses = explode(' ', $arrCssID[1]);
		$arrClasses[] = $objCC->getTable();
		$arrCssID[1] = implode(' ', array_filter(array_unique($arrClasses),'strlen') );
		
		$this->cssID = $arrCssID;
		
		$this->Template->formSubmit = $formName;
		$this->Template->formId = $formName;
		$this->Template->formName = $formName;
		$this->Template->method = $this->customcatalog_filter_method ? $this->customcatalog_filter_method : 'get';
		$this->Template->action = $strAction;
		$this->Template->tableless = true;
		$this->Template->fields = implode('',$arrFormFields);
		$this->Template->filters = $arrFiltersAssoc;
		$this->Template->filter = $arrFiltersAssoc;
		$this->Template->formClass = 'filterform';
		$this->Template->attributes = implode('', $attributes);
		$this->Template->submitOnChange = true;
		$this->Template->hidden = $strHidden;
		
		// class variables for inheritage
		$this->CustomCatalog = $objCC;
	}
	
	
	/**
	 * Add filter fields by filter modules with the same formular id
	 * @param string
	 */
	protected function findSiblingFilters($strTable)
	{
		$objCC = CustomCatalogFactory::findByTableName($strTable);
			
		$objDatabase = \Contao\Database::getInstance();
		$objModules = $objDatabase->prepare("SELECT * FROM tl_module WHERE id!=? AND type=? AND customcatalog=?")->execute($this->id,'customcatalogfilter',$strTable);
		if($objModules->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objModules->next())
		{
			$objFilterCollection = FilterFactory::createCollectionByFilterset(\Contao\StringUtil::deserialize($objModules->customcatalog_filtersets));
			$objCC->setFilters($objFilterCollection);
			$arrFilterUrlParams = array_filter( $objCC->generateFilterUrlParams($objCC->getFilters(),$objModules->customcatalog_filter_method));
			
			$arrReturn = array_merge($arrReturn, $arrFilterUrlParams);
		}
		
		return $arrReturn;
	}
	
}