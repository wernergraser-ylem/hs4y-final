<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	Pagetree
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */

use Contao\Database;
use Contao\Input;
use Contao\PageModel;
use Contao\StringUtil;
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache;

/**
 * Class file
 * Pagetree
 */
class Pagetree extends Attribute
{
	/**
	 * Tell the vault to store how to save the data (binary,blob)
	 * Leave empty to varchar
	 * @var boolean
	 */
	protected $saveDataAs = '';

	protected $defaultValue = '';


	/**
	 * Create new instance
	 * @param array
	 */ 
	public function __construct($arrData=array())
	{
		if(count($arrData) > 0)
		{
			$this->setData($arrData);
		}
		
		if($this->get('eval_multiple'))
		{
			$this->saveDataAs = 'blob';
		}
	}	

	
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		$arrEval['fieldType'] ='radio';
		if( isset($arrEval['multiple']) && $arrEval['multiple'])
		{
			$arrEval['fieldType'] ='checkbox';
		}

		$arrEval['relation'] = array('type'=>'hasOne', 'load'=>'eager');
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'pageTree',
			'foreinKey'		=> 'tl_page.title',
			'eval'			=> $arrEval,
			'sql'			=> "int(10) unsigned NOT NULL default '0'",
		);

		$sql_version = \Contao\Database::getInstance()->prepare('SELECT @@version AS version')->execute();
		if( \version_compare($sql_version->version,'8','>=') && \strpos( \strtolower($sql_version->version), 'mariadb') === false )
		{
			$arrReturn['sql'] = "int unsigned NOT NULL default '0'";
		}
		
		if($this->get('eval_multiple'))
		{
			$arrReturn['sql'] = "blob NULL";
			$arrReturn['sortable'] = true;
		}

		if( isset($this->defaultValue) )
		{
			$arrReturn['eval']['rootNodes'] = \array_filter( StringUtil::deserialize($this->defaultValue) ?: array() );
		}

		return $arrReturn;
	}


	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @return string
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC)
	{
		// validate the input
		#$objWidget->validate();

		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}
		
		$strBuffer = $objWidget->parse();
		
		#$arrData = $this->getFieldDefinition();
		
		return $strBuffer;
	}

	
	/**
	 * Render the attribute and return html
	 * @return string
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$varValue = StringUtil::deserialize($varValue);
		
		if(!is_array($varValue))
		{
			$varValue = array_filter(explode(',', $varValue));
		}
		
		if(count($varValue) > 0) 
		{
			$objPages = \Contao\PageModel::findMultipleByIds($varValue);
			$pages = array();
			if( $objPages !== null )
			{
				foreach($objPages as $objPage)			
				{
					$pages[] = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace('{{link_url::'.$objPage->id.'}}');
				}
			}
			$objTemplate->value = implode(',', $pages);
		}
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Modify the field DCA settings for customcatalogs
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @param object
	 * @param object
	 * @return array
	 * called by prepareField Hook
	 */	
	public function prepareField($arrData,$strField,$objAttribute,$objCC,$objCE,$objSystemIntegration)
	{
		$strTable = $objCC->getTable();
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDatabase->tableExists($strTable))
		{
			return $arrData;
		}
		
		if($objAttribute->get('type') != 'pagetree' || !$objDatabase->fieldExists($strField,$strTable))
		{
			return $arrData;
		}
		
		// no need to load the references
		if( \Contao\Input::get('act') == '' && !$objAttribute->get('be_visible') && !$objAttribute->get('be_filter') )
		{
			return $arrData;
		}
		
		// fetch pages selected in all entries
		$objValues = $objDatabase->prepare("SELECT DISTINCT ".$strField." FROM ".$strTable." WHERE ".$strField.' IS NOT NULL OR '.$strField.'!=""')->execute();
		if($objValues->numRows < 1)
		{
			return $arrData;
		}
		
		$arrPages = array();
		while($objValues->next())
		{
			$pages = StringUtil::deserialize($objValues->{$strField});
			if(!is_array($pages))
			{
				$pages = explode(',', $pages);
			}
			
			$arrPages = array_merge($arrPages,$pages);
		}
		
		$arrPages = array_filter($arrPages);
		
		if(count($arrPages) < 1)
		{
			return $arrData;
		}
		
		$objPages = $objDatabase->prepare("SELECT * FROM tl_page WHERE id IN(".implode(',', array_unique($arrPages)).")")->execute();
		
		$arrReference = array();
		while($objPages->next())
		{
			$arrReference[$objPages->id] = $objPages->title;	
		}
		
		$arrData['fieldDef']['reference'] = $arrReference;
		
		return $arrData;
	}
	
	
	/**
	 * Custom backend filtering routing
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @return array
	 */
	public function getBackendFilterOptions($arrData,$strField,$objAttribute,$objCC)
	{
		// add filter result to cache
		$cacheKey = 'PageTree::filterResult::'.$strField;
		$arrReturn = Cache::getFilterResult($cacheKey);
		if( $arrReturn !== null && is_array($arrReturn) )
		{
			return $arrReturn;
		}

		$strTable = $objCC->getTable();
		
		$objRows = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE ".$strField. " IS NOT NULL")->execute();
		if($objRows->numRows < 1)
		{
			return array();
		}

		
		$objContainer = \Contao\System::getContainer();

		$objSession = $objContainer->get('request_stack')->getSession();
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'];
		$arrSession = $objSession->get($strSession);

		if( !isset($arrSession[$strSession][$strTable]) )
		{
			$arrSession[$strSession][$strTable] = array();
		}

		$varFilterValue = $arrSession[$strSession][$strTable][$strField] ?? null;
		$varSearchValue = $arrSession[$strSession.'_search'][$strTable]['value'] ?? '';
		$strSearchField = $arrSession[$strSession.'_search'][$strTable]['field'] ?? '';
		
		// filter
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

		// find matching page ids from readable search values
		if( $strSearchField == $strField && !empty($varSearchValue)&& \is_string($varSearchValue) && !\is_numeric($varSearchValue) )
		{
			$objResult = Database::getInstance()->prepare("SELECT id FROM tl_page WHERE LOWER (alias) LIKE '%$varSearchValue%' OR LOWER (title) LIKE '%$varSearchValue%' ")->execute();
			if($objResult->numRows > 0)
			{
				$varSearchValue = $objResult->fetchEach('id');
			}
		}
		
		$arrIds = array();
		while($objRows->next())
		{
			$values = StringUtil::deserialize($objRows->{$strField});
			if(!is_array($values))
			{
				$values = array($values);
			}

			// search value is an array
			if( \is_array($varSearchValue) && \array_intersect($varSearchValue,$values) )
			{
				$arrIds[] = $objRows->id;
			}

			if(!in_array($varSearchValue, $values) && !in_array($varFilterValue, $values))
			{
				continue;
			}

			$arrIds[] = $objRows->id;
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

		$arrReturn = array('FIND_IN_SET(id,?)',implode(',',array_unique($arrIds))) ;

		Cache::addFilterResult($cacheKey,$arrReturn);

		return $arrReturn;
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
		if($objAttribute->get('type') != 'pagetree' || empty($varValue))
		{
			return $varValue;
		}
		
		$varValue = StringUtil::deserialize($varValue);
		
		if(!is_array($varValue))
		{
			$varValue = array_filter(explode(',', $varValue));
		}
		
		$objPages = \Contao\PageModel::findMultipleByIds($varValue);
		if($objPages === null)
		{
			return $varValue;
		}
		
		return implode(',',$objPages->fetchEach('title') ?: array());
	}

}