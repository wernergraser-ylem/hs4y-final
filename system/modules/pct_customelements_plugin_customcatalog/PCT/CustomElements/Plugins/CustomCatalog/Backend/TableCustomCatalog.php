<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage		pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

/**
 * Imports
 */
use PCT\CustomElements\Core\CustomElements as CustomElements;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog as CustomCatalog;
use Contao\Input;
use Contao\StringUtil;

/**
 * Class TableCustomElement
 */
class TableCustomCatalog extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import(\Contao\BackendUser::class, 'User');	
	}


	/**
	 * Modify the data container array on load
	 * @param object
	 */
	public function modifyPalette($objDC)
	{
		$objActiveRecord = $objDC->activeRecord;
		$strModel = \Contao\Model::getClassFromTable($objDC->table);
		if($objActiveRecord === null && class_exists($strModel))
		{
			$objActiveRecord = $strModel::findByPk($objDC->id);
		}
		else if($objActiveRecord === null && !class_exists($strModel))
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if( $objActiveRecord !== null )
		{
			// do not render the sections selection when a new section should be created
			if( $objActiveRecord->newSection)
			{
				unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['beSection']);
				#unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['customcatalog_injectBelow']);
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['injectBelow']['options_callback'] = array(get_class($this),'getMainBackendSections');
			}
	
			// remove list_headerfield when no parent table is set
			if(strlen($objActiveRecord->pTable) < 1 || !$objActiveRecord->pTable)
			{
				unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['list_headerFields']);
			}
			
			// remove the content element restriction option if existing table is not tl_content
			if($objActiveRecord->mode != 'existing' || $objActiveRecord->existingTable != 'tl_content')
			{
				unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['restrictCte']);
			}
		}
	}
	
	
	/**
	 * Generate label
	 * @param array
	 * @return string
	 */
	public function listRecords($arrRow)
	{
		return '<div class="tl_content_left">' . $arrRow['title'] . '</div>';
	}


	/**
	 * Fetch all custom catalog tables and contao tables and return as array
	 * @param object
	 */
	public function getTables($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		
		$objCCs = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id!=? AND active=1")->execute($objDC->id);
		$arrContaoTables = $objDatabase->listTables();
		
		$arrProtectedTables = CustomElements::getInstance()->getRestrictedTables();
		$arrProtectedTables[] = $objDC->table;
		$arrProtectedTables[] = $objActiveRecord->tableName;
		
		$arrReturn = array();
		foreach($arrContaoTables as $i => $strTable)
		{
			if(in_array($strTable, $arrProtectedTables))
			{
				continue;
			}
			$arrReturn[$strTable] = $strTable;
		}
		
		$arrDuplicates = array();
		$tmp = array();
		while($objCCs->next())
		{
			$strTable = $objCCs->mode == 'new' ? $objCCs->tableName : $objCCs->existingTable;
			
			if(in_array($strTable, $arrProtectedTables))
			{
				continue;
			}
			
			if(in_array($strTable,$tmp))
			{
				$arrDuplicates[] = $strTable;			
			}
			
			$tmp[] = $strTable;
		}
		unset($tmp);
		
		$objCCs->reset();
		
		while($objCCs->next())
		{
			$strTable = $objCCs->mode == 'new' ? $objCCs->tableName : $objCCs->existingTable;
			
			if(in_array($strTable, $arrProtectedTables))
			{
				continue;
			}
			
			if(in_array($strTable,$arrDuplicates))
			{
				$arrReturn[$strTable.'::'.$objCCs->id] = $strTable.'::'.$objCCs->title;
				continue;
			}
			
			// handle tl_content
			if($strTable == 'tl_content')
			{
				$arrReturn[$strTable.'::'.$objCCs->id] = $strTable.'::'.$objCCs->title;
				continue;
			}
						
			$arrReturn[$strTable] = $strTable; #$objCCs->title;
		}
		
		$arrReturn = array_unique($arrReturn);
		
		ksort($arrReturn);
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the default table name for the custom catalog is being loaded
	 * @param string
	 * @param object
	 * @return string
	 */
	public function getTableName($varValue, $objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		
		if(strlen($varValue) < 1 && strlen($objActiveRecord->alias) > 0)
		{
			return $this->strTableNamePrefix.$objActiveRecord->alias;
		}
		else if(strlen($varValue) < 1 && strlen($objActiveRecord->alias) < 0)
		{
			return '';
		}
		else {}
		
		return $varValue;
	}
	
	
	/**
	 * Return the default table name for the custom catalog when the field is being saved
	 * @param string
	 * @param object
	 * @return string
	 */
	public function setTableName($varValue, $objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		
		if(strlen($varValue) < 1 && strlen($objActiveRecord->alias) > 0)
		{
			return $this->strTableNamePrefix.$objActiveRecord->alias;
		}
		
		return $varValue;
	}
	
	
	/**
	 * Return a list of all installed content elements as array
	 */
	public function getContentElements()
	{
		$arrReturn = array();
		foreach ($GLOBALS['TL_CTE'] as $k=>$v)
		{
			if (!empty($v))
			{
				$arrReturn[$k] = array_keys($v);
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the languages available as array
	 * @return array
	 */
	public function getLanguagesFormSystem()
	{
		return \Contao\System::getContainer()->get('contao.intl.locales')->getLocales(null, true);
	}
	
	
	/**
	 * Return the backend module sections as array
	 * @param object
	 * @return array
	 */
	public function getMainBackendSections($objDC)
	{
		$this->loadLanguageFile('modules');
		$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		
		foreach($GLOBALS['BE_MOD'] as $section => $arrSection)
		{
			$label = $GLOBALS['TL_LANG']['MOD'][$section];
			if(is_array($label)) {$label = $label[0];}
			
			$arrReturn[$section] = $label ? $label : $section;
		}
		
		// allow other custom catalogs to be selected
		#$arrCCs = CustomCatalog::getTables();
		#if(count($arrCCs) > 0)
		#{
		#	foreach($arrCCs as $section)
		#	{
		#		if(array_key_exists($section, $arrReturn) || $section == $objActiveRecord->tableName)
		#		{
		#			continue;
		#		}
		#		$arrReturn[$section] = $section;
		#	}
		#}
		
		if($objActiveRecord->newSection && strlen($objActiveRecord->sectionName))
		{
			unset($arrReturn[$objActiveRecord->sectionAlias]);
		}
		
		if($objActiveRecord->newSection)
		{
			// add option '-beforeAll-', '-belowAll-'
			\Contao\ArrayUtil::arrayInsert($arrReturn,0,array('__belowAll__'=>'__belowAll__'));
			\Contao\ArrayUtil::arrayInsert($arrReturn,0,array('__beforeAll__'=>'__beforeAll__'));
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the backend module sections as array
	 * @param object
	 */
	public function getInnerBackendSections($objDC)
	{
		$this->loadLanguageFile('modules');
	
		$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		if(!$objActiveRecord->beSection)
		{
			return array();
		}
		
		if(!$GLOBALS['BE_MOD'][$objActiveRecord->beSection])
		{
			return array();
		}
		
		foreach($GLOBALS['BE_MOD'][$objActiveRecord->beSection] as $section => $arrSection)
		{
			$arrReturn[$section] = $GLOBALS['TL_LANG']['MOD'][$section][0] ? $GLOBALS['TL_LANG']['MOD'][$section][0] : $section;
		}
		
		// add option '-beforeAll-', '-belowAll-'
		\Contao\ArrayUtil::arrayInsert($arrReturn,0,array('__belowAll__'=>'__belowAll__'));
		\Contao\ArrayUtil::arrayInsert($arrReturn,0,array('__beforeAll__'=>'__beforeAll__'));
		
		return $arrReturn;
	}
	
	
	/**
	 * Generate the section alias
	 * @param string
	 * @param object
	 * @return string
	 */
	public function generateSectionAlias($varValue, $objDC)
	{
		$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		if(strlen($varValue) < 1)
		{
			$varValue = \Contao\StringUtil::standardize($objActiveRecord->sectionName);
		}
		
		return $varValue;
	}
	
	
	/**
	 * Standardize table name
	 * @param string
	 * @param object
	 * @return string
	 */
	public function standardizeTableName($varValue, $objDC)
	{
		$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		if(strlen($varValue) < 1)
		{
			$varValue = $objActiveRecord->title;
		}
				
		$varValue = str_replace('-', '_', \Contao\StringUtil::standardize($varValue));
		return $varValue;
	}
	
	
	/**
	 * Delete the extension folder on delete
	 * @param object
	 * @param integer
	 */
	public function deleteFolder($objDC, $intUndo=null)
	{
		if($GLOBALS['PCT_CUSTOMCATALOG']['deleteDcaFileOnCustomCatalogDelete'] === false)
		{
			return;
		}
		
		$strTable = $objDC->activeRecord->tableName;
		if($objDC->mode == 'existing' && $GLOBALS['PCT_CUSTOMCATALOG']['autoManageDcaFiles'] === true)
		{
			$strTable = $objDC->activeRecord->existingTable;
		}
		
		$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance();
		$objDcaHelper->deleteDcaFile($strTable);
	}
	
	
	/**
	 * Return the default button options as array
	 * @param object
	 * @return array
	 */
	public function getListOperations($objDC)
	{
		$arrDefault = array('edit','delete','copy','show','cut');
		
		// add copyChilds in Mode5
		if(in_array($objDC->activeRecord->list_mode,array(5)))
		{
			$arrDefault[] = 'copyChilds';
		}
		
		// add the language switch
		if($objDC->activeRecord->multilanguage && strlen($objDC->activeRecord->languages) > 0)
		{
			$arrDefault[] = 'langswitch';
		}
		
		$objDbAttributes = \PCT\CustomElements\Core\AttributeFactory::fetchMultipleByCustomElement($objDC->activeRecord->pid);
		if(!$objDbAttributes)
		{
			return $arrDefault;
		}
		
		$arrTogglers = array();
		$blnHasCheckboxes = false;
		while($objDbAttributes->next())
		{
			if($objDbAttributes->type != 'checkbox')
			{
				continue;
			}
			
			$blnHasCheckboxes = true;
			
			if($objDbAttributes->isToggler)
			{
				$arrTogglers[$objDbAttributes->id] = $objDbAttributes->alias;
				
				// reference
				$GLOBALS['TL_LANG'][$objDC->table][$objDC->field][$objDbAttributes->alias] = $objDbAttributes->title .' ('.$objDbAttributes->alias.')';
			}
		}
		
		if($blnHasCheckboxes)
		{
			$arrDefault[] = 'toggle';
		}
				
		return array_unique(array_merge($arrDefault,$arrTogglers));
	}
	
	
	/**
	 * Get all checkbox attributes and return as array
	 * @param object
	 * @return array
	 */
	public function getCheckboxAttributes($objDC)
	{
		$objDbAttributes = \PCT\CustomElements\Core\AttributeFactory::fetchMultipleByCustomElement($objDC->activeRecord->pid);
		if(!$objDbAttributes)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objDbAttributes->next())
		{
			if($objDbAttributes->type != 'checkbox')
			{
				continue;
			}
			$arrReturn[$objDbAttributes->id] = $objDbAttributes->title . ' ['.$objDbAttributes->alias.']';
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Get all alias attributes and return as array
	 * @param object
	 * @return array
	 */
	public function getAliasAttributes($objDC)
	{
		$objDbAttributes = \PCT\CustomElements\Core\AttributeFactory::fetchMultipleByCustomElement($objDC->activeRecord->pid);
		if(!$objDbAttributes)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objDbAttributes->next())
		{
			if($objDbAttributes->type != 'alias')
			{
				continue;
			}
			$arrReturn[$objDbAttributes->id] = $objDbAttributes->title . ' ['.$objDbAttributes->alias.']';
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all attributes as array
	 * @param object
	 * @return array
	 */
	public function getAttributes($objDC)
	{
		$arrAttributes = \PCT\CustomElements\Core\AttributeFactory::findMultipleByCustomElement($objDC->activeRecord->pid);
		if(empty($arrAttributes))
		{
			return array();
		}
		
		$arrReturn = array();
		foreach($arrAttributes as $objAttribute)
		{
			if(!$objAttribute)
			{
				continue;
			}
			
			// filter by type
			if( isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_values']) && is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_values']))
			{
				if(!in_array($objAttribute->get('type'), $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_values']))
				{
					continue;
				}
			}

			$label = $objAttribute->get('title') . ' ['.$objAttribute->get('alias').']';
			$value = $objAttribute->get('alias');
			
			// allow custom keys
			if( isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_key']) )
			{
				$value = $objAttribute->{$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['option_key']};
			}
			
			$arrReturn[$value] = $label; #array('label'=>$objAttribute->get('title'),'value'=>$objAttribute->get('alias'));
		}
		
		// include system columns
		if( isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['includeSystemColumns']) )
		{
			$tmp = array();
			foreach($GLOBALS['PCT_CUSTOMCATALOG']['systemColumns'] as $k)
			{
				$tmp[$k] = $k;
			}
			\Contao\ArrayUtil::arrayInsert($arrReturn,0,$tmp);
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all attributes from the parent custom catalog as array
	 * @param array
	 */
	public function getParentAttributes($objDC)
	{
		if(!$objDC->activeRecord->pTable)
		{
			return array();
		}
		
		$arrReturn = array();
		
		$objParentCC = CustomCatalogFactory::findByTableName($objDC->activeRecord->pTable);
		if(!$objParentCC)
		{
			return array();
		}
		
		$dc = clone($objDC);
		#$dc->activeRecord = clone($objDC->activeRecord);
		$dc->activeRecord = new \StdClass;
		$dc->activeRecord->id = $objDC->activeRecord->id;
		$dc->activeRecord->pid = $objParentCC->get('pid');
		$arrReturn = $this->getAttributes($dc);
		
		\Contao\ArrayUtil::arrayInsert($arrReturn,0,array('_default_' => array('id','pid','tstamp','sorting')));
		
		return $arrReturn;
	}
	
	
	/**
	 * Update the parent record
	 * @param mixed
	 * @param object
	 */
	public function updateParentTableRecord($varValue, $objDC)
	{
		if(strlen($objDC->activeRecord->pTable) < 1)
		{
			return $varValue;
		}
		
		// add the current table as child table if parent table is a custom catalog
		$objParentCC = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE tableName=?")->limit(1)->execute($objDC->activeRecord->pTable);
		if($objParentCC->numRows < 1)
		{
			return $varValue;
		}
		
		$arrSet = array();
		
		$childTables = \Contao\StringUtil::deserialize($objParentCC->cTables);
		if(!is_array($childTables))
		{
			$childTables = array();
		}
		
		$tableName = $objDC->activeRecord->tableName ?: $objDC->activeRecord->existingTable;
		
		if(!in_array($tableName, $childTables))
		{
			$childTables[] = $tableName;
			$arrSet['cTables'] = serialize($childTables);
		}
		
		if($objDC->activeRecord->dynamicPtable)
		{
			$tables = \Contao\StringUtil::deserialize($objParentCC->tables);
			if(!is_array($tables))
			{
				$tables = array();
			}

			if(!in_array($tableName, $tables))
			{
				$tables[] = $tableName;
				$arrSet['tables'] = serialize($tables);
			}
		}
		
		if(count($arrSet) < 1)
		{
			return $varValue;
		}
		
		\Contao\Database::getInstance()->prepare("UPDATE ".$objDC->table." %s WHERE tableName=?")->set($arrSet)->execute($objDC->activeRecord->pTable);
		
		\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('Added '.$tableName.' as child table in "tl_pct_customcatalog.id='.$objParentCC->id.'" ('.$objDC->activeRecord->pTable.')');

		return $varValue;
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
		$table = 'tl_pct_customcatalog';
		$href .= '&amp;id=' . $row['id'];

		if (!$row['active'])
		{
			$icon = PCT_CUSTOMCATALOG_PATH.'/assets/img/active_off.svg';
		}

		$titleDisabled = (is_array($GLOBALS['TL_DCA'][$table]['list']['operations']['active']['label']) && isset($GLOBALS['TL_DCA'][$table]['list']['operations']['active']['label'][2])) ? sprintf($GLOBALS['TL_DCA'][$table]['list']['operations']['active']['label'][2], $row['id']) : $title;

		$icon_on = PCT_CUSTOMCATALOG_PATH.'/assets/img/active_on.svg';;
		$icon_off = PCT_CUSTOMCATALOG_PATH.'/assets/img/active_off.svg';;

		return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars(!$row['active'] ? $title : $titleDisabled) . '" data-title="' . StringUtil::specialchars($title) . '" data-title-disabled="' . StringUtil::specialchars($titleDisabled) . '" data-action="contao--scroll-offset#store" onclick="return AjaxRequest.toggleField(this,true)">' . \Contao\Image::getHtml($icon, $label, 'data-icon="'.$icon_on.'" data-icon-disabled="'.$icon_off.'" data-state="' . ($row['active'] ? 1 : 0) . '"') . '</a> ';
	}
	
	
	/**
	 * Return the button, check for create rights
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getButtonWithCreateRights($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
	
	
	/**
	 * Return the button, check for delete rights
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getButtonWithDeleteRights($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.delete')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}


	/**
	 * Check permission
	 */
	public function checkPermission($objDC=null)
	{
		if ($this->User->isAdmin)
		{
			return;
		}
		
		$objCE = null;
		if(!\Contao\Input::get('act'))
		{
			$objCE = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement WHERE id=?")->limit(1)->execute(\Contao\Input::get('id'));
		}
		else
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		
			$objCE = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement WHERE id=?")->limit(1)->execute($objActiveRecord->pid);
		}
		
		// Set root IDs
		if (!is_array($this->User->pct_customcatalogs) || empty($this->User->pct_customcatalogs))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('User ('.$this->User->id.') has not enough permissions to create CustomCatalogs for CustomElement ID:'.$objCE->id);
			$this->redirect('contao/main.php?act=error');
		}
		else
		{
			// filter list view
			#$GLOBALS['TL_DCA'][$objDC->table]['list']['sorting']['filter'][] = array('id IN(?)',implode(',',$this->User->pct_customcatalogs));
			$GLOBALS['TL_DCA'][$objDC->table]['list']['sorting']['root'] = $this->User->pct_customcatalogs;
		}
		
		// Check permissions to add new elements
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		if (!$objSecurity->isGranted('contao_user.pct_customcatalogsp.create'))
		{
			$GLOBALS['TL_DCA'][$objDC->table]['config']['closed'] = true;
		}
		
		// Check current action
		switch (\Contao\Input::get('act'))
		{
			case 'edit':
			case 'editAll':
			case 'overrideAll':
			case 'paste':
			case 'copy':
			case 'select':
				if(!$objSecurity->isGranted('contao_user.pct_customcatalogsp.create'))
				{
					\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('User ('.$this->User->id.') has not enough permissions to create CustomCatalogs for CustomElement ID:'.$objCE->id);
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}
}