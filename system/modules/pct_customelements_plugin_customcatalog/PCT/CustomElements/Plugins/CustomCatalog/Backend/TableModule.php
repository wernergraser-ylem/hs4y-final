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
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

/**
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog as CustomCatalog;
use PCT\CustomElements\FilterFactory as FilterFactory;
use PCT\CustomElements\Helper\TableHelper as TableHelper;

/**
 * Class file
 * TableModule
 */
class TableModule extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\Contao\System::import(\Contao\BackendUser::class, 'User');
	}
	
	
	/**
	 * Modify the dca on load
	 */
	public function modifyDca($objDC)
	{
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}

		// remove the customcatalog_filter_actLang when CC is not multi lingual
		$objCC = CustomCatalogFactory::findByModule($objActiveRecord);
		
		if($objActiveRecord->type == 'customcatalogfilter')
		{
			// load filter module templates
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_mod_template']['options_callback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getFilterModuleTemplates');
			// change the label	
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_setVisibles']['label'] = $GLOBALS['TL_LANG']['tl_module']['customcatalog_setVisibles']['fil'];
			// filterset field should be a submitOnChange field
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_filtersets']['eval']['submitOnChange'] = true;
			// filterset field better be a checkbox wizard to support manuall sortings
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_filtersets']['inputType'] = 'checkboxWizard';
			// update jumpTo label
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_jumpTo']['label'] = &$GLOBALS['TL_LANG']['tl_module']['customcatalog_jumpTo_filter'];
			// update customcatalog_filter_showAll label
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_filter_showAll']['label']= &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_showAll_customcatalogfilter'];
		}
		else if($objActiveRecord->type == 'customcatalog_apistarter')
		{
			// load api module templates
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_mod_template']['options_callback'] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getApiModuleTemplates');
		}
		else if($objActiveRecord->type == 'customcataloglist')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['hardLimit']['label'] = &$GLOBALS['TL_LANG']['tl_module']['customcatalog_hideSitemap'];
	
			// use the multiSRC field to store a custom sorted id list
			$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
			if( $objCC !== null && in_array('pct_tabletree_widget',$bundles) )
			{	
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['multiSRC']['label'] = &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_customIdList'];
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['multiSRC']['inputType'] = 'pct_tabletree';
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['multiSRC']['eval'] = array('tl_class'=>'clr','multiple'=>true,'fieldType'=>'checkbox','isSortable'=>true,'orderField'=>'orderSRC');
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['multiSRC']['tabletree']['source'] = $objCC->getTable();	
			}
		}
		
		// remove the customcatalog_filter_actLang when CC is not multi lingual
		if( $objCC !== null && !$objCC->multilanguage)
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_filter_actLang']);
		}		
	}


	/**
	 * Return all custom catalog tables as array
	 * @param object
	 */
	public function getCustomCatalogs($objDC)
	{
		$objCCs = CustomCatalogFactory::fetchAllActive();
		if($objCCs === null)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objCCs->next())
		{
			$strTable = ($objCCs->mode == 'new' ? $objCCs->tableName : $objCCs->existingTable);
			if(strlen($strTable) < 1)
			{
				continue;
			}
			
			$arrReturn[$objCCs->id] = $objCCs->title . '[id:'.$objCCs->id.' table:'.($objCCs->mode == 'new' ? $objCCs->tableName : $objCCs->existingTable).']';
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all custom catalog layout templates as array
	 * @param object 
	 */
	public function getLayoutTemplates($objDC)
	{
		$intPid = $objDC->activeRecord->pid;

		if (\Contao\Input::get('act') == 'overrideAll')
		{
			$intPid = \Contao\Input::get('id');
		}
		
		$cc1 = $this->getTemplateGroup('customcatalog');
		$cc2 = $this->getTemplateGroup('cc_');
		
		$arrTemplates = array_unique(array_merge($cc1,$cc2));
		
		// filter Attribute templates '..._attr_...'
		if(count($arrTemplates) > 0)
		{
			foreach($arrTemplates as $i => $strTpl)
			{
				if(strlen(strpos($strTpl, '_attr_')) > 0 || strlen(strpos($strTpl, '_filter_')) > 0 || strlen(strpos($strTpl, '_item_')) > 0)
				{
					unset($arrTemplates[$i]);
				}
			}
		}
		
		return $arrTemplates;
	}
	
	
	/**
	 * Return all custom catalog module templates as array
	 * @param object 
	 */
	public function getModuleTemplates($objDC)
	{
		return $this->getTemplateGroup('mod_customcatalog');
	}
	
	
	/**
	 * Return all custom catalog filter module templates as array
	 * @param object 
	 */
	public function getFilterModuleTemplates($objDC)
	{
		return $this->getTemplateGroup('mod_customcatalogfilter');
	}
	
	
	/**
	 * Return all custom catalog api module templates as array
	 * @param object 
	 */
	public function getApiModuleTemplates($objDC)
	{
		return $this->getTemplateGroup('mod_customcatalogapi');
	}
	
	
	/**
	 * Return all custom catalog filter sets for the selected custom catalog as array
	 * @param object
	 */
	public function getFiltersets($objDC)
	{
		if(strlen($objDC->activeRecord->customcatalog) < 1)
		{
			return array();
		}
		
		$objFiltersets = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_filterset WHERE pid=(SELECT id FROM tl_pct_customcatalog WHERE tableName=? OR id=?)")
						->execute($objDC->activeRecord->customcatalog,$objDC->activeRecord->customcatalog);
		if($objFiltersets->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objFiltersets->next())
		{
			$arrReturn[$objFiltersets->id] = $objFiltersets->title;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Get all visibles (attributes or filters) depending on active type as array
	 * @param object
	 * @return array
	 */
	public function getVisibles($objDC)
	{
		switch($objDC->activeRecord->type)
		{
			case 'customcataloglist':
			default:
				return $this->getAttributes($objDC);
				break;
			case 'customcatalogfilter':
				return $this->getFiltersByFiltersets($objDC);
				break;
		}
	}
	
	
	/**
	 * Return all attributes as array
	 * @param object
	 * @return array
	 */
	public function getAttributes($objDC)
	{
		if(strlen($objDC->activeRecord->customcatalog) < 1)
		{
			return array();
		}
		$objTableCustomCatalog = TableHelper::getTableClass('tl_pct_customcatalog');
		$objCC = CustomCatalogFactory::findByModule($objDC->activeRecord);
		
		if(!$objCC || !$objTableCustomCatalog)
		{
			return array();
		}
		
		$dc = clone($objDC);
		$dc->pid = $objCC->get('pid');
		
		#$dc->activeRecord = clone($objDC->activeRecord);
		$dc->activeRecord = new \StdClass;
		$dc->activeRecord->id = $objDC->activeRecord->id;
		$dc->activeRecord->pid = $objCC->get('pid');
		
		$arrReturn = $objTableCustomCatalog->getAttributes($dc);
		
		#$arrReturn = array_merge($GLOBALS['PCT_CUSTOMCATALOG']['systemColumns'],$arrAttributes);
		natcasesort($arrReturn);
		
		return $arrReturn;
	}
	
	/**
	 * Return all filters by the selected filtersets as array
	 * @param object
	 * @return array
	 */
	public function getFiltersByFiltersets($objDC)
	{
		if(strlen($objDC->activeRecord->customcatalog) < 1 || strlen($objDC->activeRecord->customcatalog_filtersets) < 1)
		{
			return array();
		}
		
		$collection = \PCT\CustomElements\Core\FilterFactory::createCollectionByFilterset(\Contao\StringUtil::deserialize($objDC->activeRecord->customcatalog_filtersets));
		if($collection->getCount() < 1)
		{
			return array();
		}
		
		foreach($collection->getFilters() as $objFilter)
		{
			// filter the list
			if(!empty($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_values']))
			{
				if(!in_array($objFilter->get('type'), $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_values']))
				{
					continue;
				}
			}
			
			$arrReturn[$objFilter->get('id')] = $objFilter->get('title') ? $objFilter->get('title') : $objFilter->get('alias');
		}
	
		return $arrReturn;
	}
	
	
	/**
	 * Return all filters from the selected custom catalog
	 * @param object
	 * @return array 
	 */
	public function getFilters($objDC)
	{
		if(strlen($objDC->activeRecord->customcatalog) < 1)
		{
			return array();
		}
		
		$objFilters = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_filter WHERE pid IN(SELECT id FROM tl_pct_customelement_filterset WHERE pid=(SELECT id FROM tl_pct_customcatalog WHERE tableName=? OR id=?) AND published=1 GROUP BY id)")
						->execute($objDC->activeRecord->customcatalog,$objDC->activeRecord->customcatalog);
		if($objFilters->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objFilters->next())
		{
			// filter the list
			if(!empty($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_values']))
			{
				if(!in_array($objFilters->type, $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_values']))
				{
					continue;
				}
			}
			
			$arrReturn[$objFilters->id] = $objFilters->title ?: $objFilters->alias;
		}
	
		return $arrReturn;
	}
	
	
	/**
	 * Set the source options
	 * @param object
	 * @return array
	 * Idea taken from \tl_news
	 */
	public function getSourceOptions($objDC)
	{
		if ($this->User->isAdmin)
		{
			return array('jumpTo', 'childTable');
		}

		$arrOptions = array('jumpTo');

		// childTable option
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		if ( $objSecurity->isGranted('contao_user.alexf','tl_module::customcatalog_childTable') )
		{
			$arrOptions[] = 'childTable';
		}

		if ($objDC->activeRecord && $objDC->activeRecord->customcatalog_source != '')
		{
			$arrOptions[] = $objDC->activeRecord->customcatalog_source;
		}

		return array_unique($arrOptions);
	}
	
		
	/**
	 * Find all apis of the selected catalog and return them as array
	 * @param object
	 * @return array
	 */
	public function getApis($objDC)
	{
		$objApis = \PCT\CustomCatalog\Models\ApiModel::findByPidOrTable($objDC->activeRecord->customcatalog,array('order'=>"tl_pct_customcatalog_api.title"));
		if($objApis === null)
		{
			return array();
		}
		return $objApis->fetchEach('title');
	}
	 
	
}