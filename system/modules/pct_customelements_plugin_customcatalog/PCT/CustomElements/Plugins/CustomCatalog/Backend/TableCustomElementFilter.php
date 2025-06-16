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

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\StringUtil;
use Contao\System;
use PCT\CustomElements\Helper\FilterHelper as FilterHelper;
use PCT\CustomElements\Loader\FilterLoader as FilterLoader;
use PCT\CustomElements\Models\FilterModel;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;

/**
 * Class TableCustomElementFilterset
 */
class TableCustomElementFilter extends \Contao\Backend
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
	 * Load filter files
	 * @param mixed $objDC 
	 */
	public function loadDcaAndLanguageFiles($objDC)
	{
		// Load filters and language files
		\PCT\CustomElements\Loader\FilterLoader::loadDcaFiles($objDC->table);
		\PCT\CustomElements\Loader\FilterLoader::loadLanguageFiles($objDC->table);
		\PCT\CustomElements\Loader\FilterLoader::loadLanguageFiles('filters');
	}
	
	
	/**
	 * Generate label
	 * @param array
	 * @return string
	 */
	public function listRecords($arrRow)
	{
		$type = $arrRow['type'];
		
		$classes = array($type);
		
		$icon = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$type]['icon'];
			
		// call the toggleIcon Hook
		$icon = \PCT\CustomElements\Core\Hooks::callstatic('toggleIconHook',array('tl_pct_customelement_filter',$arrRow,$icon));
		
		$imgIcon = '';
		$cssIcon = '';
		if(strlen($icon) > 0)
		{
			if(is_file(Controller::rootDir().'/'.$icon))
			{
				$imgIcon = $icon;
			}
			else
			{
				$cssIcon = $icon;
			}
		}
		else
		{
			$cssIcon = 'fa fa-filter';
		}
		
		$strIcon = '<i class="icon '.$cssIcon.'"></i>';
		if(strlen($imgIcon) > 0)
		{
			$strIcon = '<img class="icon" src="'.$imgIcon.'"/>';
		}
		
		if($arrRow['type'] == 'combiner')
		{
			$arrRow['title'] = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS']['combiner']['label'][0]. ' ('.strtoupper($arrRow['combiner']).')';
		}
		
		$strBuffer = sprintf('<div class="tl_content_left '.implode(' ', $classes).'">%s'. $arrRow['title']. ($arrRow['description']?'<p class="tl_gray description">'.$arrRow['description'].'</p>':'') .'</div>',$strIcon);
		
		// call the custom child_record_callback Hook
		$strBuffer = \PCT\CustomElements\Core\Hooks::callstatic('child_record_callback',array('tl_pct_customelement_filter',$arrRow,$icon,$strBuffer));
		
		return $strBuffer;
		
	}


	/**
	 * Return all registered filters as array
	 * @param object
	 */
	public function getFilters($objDC)
	{
		$arrFilters = FilterHelper::getRegisteredFilters();
		
		$arrReturn = array();
		foreach($arrFilters as $type)
		{
			FilterLoader::loadLanguageFile('filters',$type);
			$arrReturn[$type] = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$type]['label'] ? $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$type]['label'][0] : $type;
		}
		
		natcasesort($arrReturn);
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all filter templates as array
	 * @param object
	 */
	public function getTemplates($objDC)
	{
		$intPid = $objDC->activeRecord->pid;

		if (\Contao\Input::get('act') == 'overrideAll')
		{
			$intPid = \Contao\Input::get('id');
		}

		$ce = $this->getTemplateGroup('customelement_filter');
		$cc1 = $this->getTemplateGroup('customcatalog_filter');
		$cc2 = $this->getTemplateGroup('cc_filter');
		return array_unique(array_merge($ce,$cc1,$cc2));
	}
	
	
	/**
	 * Return all attributes as array
	 * @param object
	 * @return array
	 */
	public function getAttributes($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objCC = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE id=(SELECT pid FROM tl_pct_customelement_filterset WHERE id=?)")->limit(1)->execute($objDC->activeRecord->pid);
		
		$objAttributes = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::fetchAllByCustomCatalog($objCC->id);
		if(!$objAttributes)
		{
			return array();
		}
		
		$values = array();
		if( isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values']) && is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values']))
		{
			$values = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values'];
		}
		
		$distinct = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['distinctField'] ?? '';
		
		$arrReturn = array();
		$arrDistinct = array();
		while($objAttributes->next())
		{
			if(strlen($distinct) > 0)
			{
				if(in_array($objAttributes->{$distinct},$arrDistinct))
				{
					continue;
				}
				$arrDistinct[] = $objAttributes->{$distinct};
			}
			
			if(count($values) > 0)
			{
				if(in_array($objAttributes->type, $values))
				{
					$arrReturn[$objAttributes->id] = $objAttributes->title . ' ['.$objAttributes->alias.']';
					continue;
				}
			}
			else
			{
				$arrReturn[$objAttributes->id] = $objAttributes->title . ' ['.$objAttributes->alias.']';
			}
		}
		
		natcasesort($arrReturn);
		
		return $arrReturn;
	}
	
	
	/**
	 * Return frontend modules as array
	 * @param object
	 * @return array
	 */
	public function getModules($objDC)
	{
		$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_module")->execute();
		if($objResult->numRows < 1)
		{
			return;
		}
		
		$values = array();
		if( isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values']) && is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values']))
		{
			$values = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values'];
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			if(count($values) > 0)
			{
				if(in_array($objResult->type, $values))
				{
					$arrReturn[$objResult->id] = $objResult->name . ' ['.$objResult->id.']';
					continue;
				}
			}
			else
			{
				$arrReturn[$objResult->id] =$objResult->name . ' ['.$objResult->id.']';
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return frontend modules as array
	 * @param object
	 * @return array
	 */
	public function getConfigurations($objDC)
	{
		$objConfigs = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchAllActive();
		
		$arrReturn = array();
		while($objConfigs->next())
		{	
			$arrReturn[$objConfigs->id] = $objConfigs->title . '[id:'.$objConfigs->id.' table:'.($objConfigs->mode == 'new' ? $objConfigs->tableName : $objConfigs->existingTable).']';
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all sibling filters and return as array
	 * @param object
	 * @return array
	 */
	public function getSiblingFilters($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objCC = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE id=(SELECT pid FROM tl_pct_customelement_filterset WHERE id=?)")->limit(1)->execute($objDC->activeRecord->pid);
		$objFiltersets = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_filterset WHERE pid=?")->execute($objCC->id);
		$objFilters = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id!=? AND NOT FIND_IN_SET(type,'combiner') AND pid IN(".implode(',', $objFiltersets->fetchEach('id')).") ORDER BY title")->execute($objDC->id);
		if($objFilters->numRows < 1)
		{
			return array();
		}
	
		$arrReturn = array();
		while($objFilters->next())
		{
			$arrReturn[$objFilters->id] = $objFilters->title;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the backend description for a filter
	 * @param object
	 * @return string
	 */
	public function getBackendDescription($objDC)
	{
		if(!$objDC->activeRecord->type)
		{
			return '';
		}
		
		$this->loadLanguageFile('default');
		
		$strBuffer = $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$objDC->activeRecord->type]['label'][1];
		if(strlen($strBuffer) < 1)
		{
			return '';
		}
				
		return '<div class="field backend_explanation clr widget">'.$strBuffer.'</div>';
	}
	 
	
	
	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$table = 'tl_pct_customelement_filter';
		$security = System::getContainer()->get('security.helper');

		if (!$security->isGranted(ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, $table.'::published'))
		{
			return '';
		}

		$href .= '&amp;id=' . $row['id'];

		if (!$row['published'])
		{
			$icon = 'invisible.svg';
		}

		$titleDisabled = (is_array($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label']) && isset($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label'][2])) ? sprintf($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label'][2], $row['id']) : $title;

		$data_icon = 'visible.svg';
		$data_icon_disabled = 'invisible.svg';
		if( version_compare('4.13',ContaoCoreBundle::getVersion(),'<=') )
		{
			$data_icon = \Contao\Image::getPath($data_icon);
			$data_icon_disabled = \Contao\Image::getPath($data_icon_disabled);
		}
		
		return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars(!$row['published'] ? $title : $titleDisabled) . '" data-title="' . StringUtil::specialchars($title) . '" data-title-disabled="' . StringUtil::specialchars($titleDisabled) . '" data-action="contao--scroll-offset#store" onclick="return AjaxRequest.toggleField(this,true)">' . \Contao\Image::getHtml($icon, $label, 'data-icon="'.$data_icon.'" data-icon-disabled="'.$data_icon_disabled.'" data-state="' . ($row['published'] ? 1 : 0) . '"') . '</a> ';
	}
	
	
	/**
	 * Return the edit button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function editButton($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $$objSecurity->isGranted('contao_user.pct_customcatalog_filtersp.create')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
}