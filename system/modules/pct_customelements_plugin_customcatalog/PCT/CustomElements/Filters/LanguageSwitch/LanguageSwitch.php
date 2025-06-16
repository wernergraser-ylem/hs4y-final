<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		LanguageSwitch
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Imports
 */

use Contao\StringUtil;
use \PCT\CustomElements\Helper\QueryBuilder as QueryBuilder;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage;

/**
 * Class file
 * LanguageSwitch
 */
class LanguageSwitch extends \PCT\CustomElements\Filter
{
	/**
	 * Language code name
	 * @var string
	 */
	protected $strLanguage = '';
	
	/**
	 * Filter mode
	 * @var string
	 */
	protected $strMode = '';
	
	
	/**
	 * Create a new filter instance
	 * @param array
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		if( isset($arrData['languageStrictMode']) && $arrData['languageStrictMode'])
		{
			$this->strictModeOn();
		}
		
		// point the filter to the attribute or use the urlparameter
		$strName = $GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'] ?: 'language';
		
		if($this->get('urlparam'))
		{
			$strName = $this->get('urlparam');
		}
		
		// set the filter name
		$this->setName($strName);
		
		// check if the filter should be resetted, if so reset the filter
		if($this->reset($strName))
		{
			$this->reset();
		}
	}
	
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * @param object
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$arrIds = $this->findMatchingIds();
		if(empty($arrIds))
		{
			return array();
		}
		
		$options = array
		(
			'columns' => array
			(
				array
				(
					'column' 	=> 'id',
					'operation'	=> 'IN',
					'value'		=> $arrIds,
				)
			),
		);
		
		return $options;
	}
	
	
	/**
	 * Run the filter and return a list of ids as array
	 * @return array
	 */
	public function findMatchingIds($intEntry=0)
	{
		$strTable = $this->getTable();
		$strLanguage = str_replace('-','_',$this->getLanguage());
		$blnFallback = false;
		
		// find a preselected language
		if($this->get('defaultValue'))
		{
			if($this->get('defaultValue') == '__base__')
			{
				$ids = Multilanguage::findBaseRecords($this->getTable());
			}
			else
			{
				$ids = Multilanguage::findLanguageRecords($this->getTable(),$this->get('defaultValue'));
			}
			if(empty($ids))
			{
				return array();
			}
			
			return $ids;
		}
		
		$strict = $this->isStrictMode();
		
		$active = (count(array_filter($this->getValue(),'strlen')) > 0 ? true : false);
		$objModule = $this->getModule();
		
		// filter active language if filter is language strict and no filter, list module creates the filter (e.g. coming from an inserttag)
		if((int)$objModule->id < 1 && $strict === true)
		{
			$objModule->customcatalog_filter_actLang = true;
		}
		
		$objCC = $this->getCustomCatalog();
		$arrLanguages = $objCC->getLanguages();
		
		if( empty($arrLanguages) || !is_array($arrLanguages) )
		{
			$arrLanguages = array();
		}
		
		if($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['LIST']['baseRecordIsFallback'] === true && !in_array( str_replace('-','_',$strLanguage), $arrLanguages ) && $objModule->customcatalog_filter_actLang)
		{
			$blnFallback = true;
		}
		
		// show active language
		if(!\Contao\Input::get( $this->getName() ) && !\Contao\Input::post( $this->getName() ) && ($objModule->customcatalog_filter_actLang || $this->isModified('arrValue')) )
		{
			$active = true;
			$strict = true;
		}
		
		if($active || $intEntry > 0)
		{
			$strict = true;
		}
		
		$options = array
		(
			'table'	=> 'tl_pct_customcatalog_language',
			'columns' => array
			(
				array
				(
					'column' 	=> 'source',
					'operation'	=> '=',
					'value'		=> $strTable,
				),
				array
				(
					'column' 	=> 'lang',
					'operation'	=> $strict ? '=' : '!=',
					'value'		=> $strLanguage,
				),
			),
		);
		
		// search for a specific entry
		if($intEntry > 0)
		{
			$options['columns'][] = array
			(
				'column' 		=> 'pid',
				'operation' 	=> '=',
				'value'			=> $intEntry,
			);
			$blnFallback = false;
		}
		
		// show base entries as fallback
		if($blnFallback)
		{
			$ids = Multilanguage::findBaseRecords($this->getTable());
			if(count($ids) < 1)
			{
				return array();
			}
			return $ids;
		}
		
		$result = QueryBuilder::getInstance()->fetch($options);
		
		// getValue count
		#objModule->type == 'customcatalogfilter' && $result->numRows < 1)
		#
		#return array(-1);
		#
		
		// return impossible if there is no language record and we do not want to see the whole list
		if($result->numRows < 1 && !$objModule->customcatalog_filter_showAll && !$active)
		{
			return array(-100);
		}
		
		if($result->numRows < 1 && !$objModule->customcatalog_filter_showAll && $active && $objModule->customcatalog_filter_actLang)
		{
			return array(-100);
		}
		
		if(!$active && $objModule->customcatalog_filter_actLang)
		{
			return $result->fetchEach('pid');
		}
		
		if(!$active && !$objModule->customcatalog_filter_actLang && !$objModule->customcatalog_filter_showAll)
		{
			return array(-100);
		}
		
		if(!$active && !$objModule->customcatalog_filter_actLang && $objModule->customcatalog_filter_showAll)
		{
			return array();
		}
			
		// fetch the language entries if all circumstances have been passed
		return $result->fetchEach('id');
	}
	
	
	/**
	 * Return the id of a language sibling entry
	 * @param integer	ID of the base entry
	 * @return integer
	 */
	public function findLanguageSibling($intEntry)
	{
		$arrId = $this->findMatchingIds($intEntry);
		return $arrId[0];
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
		
		$values = $this->getLanguageOptions();
		$options = array();
		$isSelected = false;
		
		$arrLanguages = \Contao\System::getContainer()->get('contao.intl.locales')->getLocales(null, true);
		
		// apply custom language labels
		$arrCustomLabels = array();
		if($this->get('setLanguageText'))
		{
			$arrCustomLabels = StringUtil::deserialize($this->get('languageText'));
			if(!empty($arrCustomLabels) && is_array($arrCustomLabels))
			{
				foreach($arrCustomLabels as $arr)
				{
					$k = $arr['value'];
					if(array_key_exists($k, $arrLanguages))
					{
						$arrLanguages[$k] = $arr['label'];
					}
				}
			}
		}
		
		// build options array
		if(!empty($values))
		{
			foreach($values as $i => $v)
			{
				$isSelected = $this->isSelected($v);
				
				// check against CC language
				if(isset($GLOBALS['PCT_CUSTOMCATALOG']['activeFrontendLanguage']) && $GLOBALS['PCT_CUSTOMCATALOG']['activeFrontendLanguage'] == $v)
				{
					$isSelected = true;
				}
				
				$tmp = array
				(
					'id'		=> 'ctrl_'.$strName.'_'.$i,
					'value'		=> $v,
					'label'		=> $arrLanguages[$v] ?: $v,
					'name'  	=> $strName,
				);
				
				if($isSelected)
				{
					$tmp['selected'] = true;
					$tmp['href'] = $objFilter->removeFromUrl($v,$objJumpTo,$objModule->customcatalog_filter_method);
					$isSelected = true;
				}
				else
				{
					$tmp['href'] = $objFilter->addToUrl($v,$objJumpTo,$objModule->customcatalog_filter_method);
				}
				
				$options[] = $tmp;
			}
		}
	
		$label = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filter_reset'];
		$blank = array('value'=>$strName.'_reset','label'=>$label);
		\Contao\ArrayUtil::arrayInsert($options,0,array($blank));
		
		$objTemplate->options = $options;
		$objTemplate->name = $strName;
		$objTemplate->radio = $this->get('isRadio');
		$objTemplate->label = $this->get('label');
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Return the lanuages possible
	 * @return array
	 */
	public function getLanguageOptions()
	{
		$objCC = $this->getCustomCatalog();
		
		if(!$objCC->get('multilanguage'))
		{
			return array();
		}
		
		return StringUtil::deserialize($objCC->get('languages'));
	}
	
	
	/**
	 * Set the language for the results
	 * @param string
	 */
	public function setLanguage($strValue)
	{
		$this->set('strLanguage',$strValue);
		$this->setValue($strValue);		
	}
	
	
	/**
	 * Return the language code from various sources
	 * @return string
	 */
	public function getLanguage()
	{
		if(strlen($this->strLanguage) > 0)
		{
			return $this->strLanguage;
		}
		
		$strReturn = '';
		
		if($this->getName() != $GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'])
		{
			$values = $this->getValue();
			if(is_array($values))
			{
				$strReturn = $values[0];
			}
		}
		
		if( Controller::isFrontend() && strlen($strReturn) < 1)
		{
		   $strReturn = Multilanguage::getActiveFrontendLanguage();
		}
		else if( Controller::isBackend() && strlen($strReturn) < 1)
		{
		   $strReturn = Multilanguage::getActiveBackendLanguage( \Contao\Input::get('table') );
		}
		
		return $strReturn;
	}
	
	
	/**
	 * Set the mode to strict
	 * @param boolean
	 */
	public function strictModeOn()
	{
		$this->set('strMode','strict');
	}
	
	
	/**
	 * Set the mode to loose
	 * @param boolean
	 */
	public function strictModeOff()
	{
		$this->set('strMode','loose');
	}
	
	
	/**
	 * Return the mode as string
	 * @return string
	 */
	public function getMode()
	{
		return $this->get('strMode');
	}
	
	
	/**
	 * Return true if filter runs in strict mode
	 * @return boolean
	 */
	public function isStrictMode()
	{
		if($this->getMode() == 'strict')
		{
			return true;
		}
		
		return false;
	}	
}