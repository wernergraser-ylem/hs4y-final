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

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class TableCustomElement
 */
class TableCustomCatalogApi extends \Contao\Backend
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
	 * Load API files
	 * @param mixed $objDC 
	 */
	public function loadDcaAndLanguageFiles($objDC)
	{
		\Contao\System::loadLanguageFile('apis');
		// Load filters and language files
		\PCT\CustomElements\Loader\ApiLoader::loadDcaFiles($objDC->table);
		\PCT\CustomElements\Loader\ApiLoader::loadLanguageFiles($objDC->table);
		\PCT\CustomElements\Loader\ApiLoader::loadLanguageFiles('apis');
	}
	
	
	/**
	 * Modify the dca onload
	 * @param object
	 */
	public function modifyDCA($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDC->activeRecord)
		{
			$objDC->activeRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if( $objDC->activeRecord === null )
		{
			return;
		}
		
		// set the dynamicSRC label depending on the selection
		if( isset($GLOBALS['TL_LANG'][$objDC->table]['dynamicSRC_'.$objDC->activeRecord->target]) && is_array($GLOBALS['TL_LANG'][$objDC->table]['dynamicSRC_'.$objDC->activeRecord->target]) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['dynamicSRC']['label'] = &$GLOBALS['TL_LANG'][$objDC->table]['dynamicSRC_'.$objDC->activeRecord->target];
		}
		
		// toggle palettes by mode selector correctly using format mode_VALUE
		if( isset($GLOBALS['TL_DCA'][$objDC->table]['palettes']['mode_'.$objDC->activeRecord->mode]) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = $GLOBALS['TL_DCA'][$objDC->table]['palettes']['mode_'.$objDC->activeRecord->mode];
		}
		// toggle by type and mode selector e.g. type_default_mode_import
		else if( isset($GLOBALS['TL_DCA'][$objDC->table]['palettes']['type_'.$objDC->activeRecord->type.'_mode_'.$objDC->activeRecord->mode]) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = $GLOBALS['TL_DCA'][$objDC->table]['palettes']['type_'.$objDC->activeRecord->type.'_mode_'.$objDC->activeRecord->mode];
		}

		// hide [mode] when no API type is selected to when the current API has not specific modes tp selet
		if( empty($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['modes']) )
		{
			unset( $GLOBALS['TL_DCA'][$objDC->table]['fields']['mode'] );
		}
		
		// hide allowUpdate, allowDelete when no unique fields set
		if(!$objDC->activeRecord->uniqueTarget || !$objDC->activeRecord->uniqueSource)
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['allowUpdate']['eval']['tl_class'] = 'hidden';
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['allowDelete']['eval']['tl_class'] = 'hidden';
		}
	}
	
	
	/**
	 * Return all installed API extensions as array
	 * @param object
	 * @return array
	 */
	public function getAPIs($objDC)
	{
		$arrReturn = array();
		
		if( !isset($GLOBALS['PCT_CUSTOMCATALOG']['API']) || empty($GLOBALS['PCT_CUSTOMCATALOG']['API']) || !is_array($GLOBALS['PCT_CUSTOMCATALOG']['API']))
		{
			return array();
		}
		
		foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'] as $k => $arrDef)
		{
			$label = $k;
			if( isset($arrDef['label'][0]) && strlen($arrDef['label'][0]) > 0)
			{
				$label = $arrDef['label'][0];
			}
			$arrReturn[$k] = $label;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the mode types as array
	 * @param object
	 * @return array
	 */
	public function getModes($objDC)
	{
		$arrReturn = array();
		
		// default modes
		$arrReturn['standard'] = array_keys($GLOBALS['PCT_CUSTOMCATALOG']['API']['standard']['modes']);
		
		// include modes by selected API
		if(strlen($objDC->activeRecord->type) > 0 && $objDC->activeRecord->type != 'standard' && is_array($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['modes']) && count($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['modes']) > 0 )
		{
			$arrReturn[ $objDC->activeRecord->type ] = array_keys($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['modes']);
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return the fields of the current CC table as array
	 * @param object
	 * @return array
	 */
	public function getCurrentFields($objDC)
	{
		$objCC = \Contao\CustomCatalog::fetchById($objDC->activeRecord->pid);
		
		$strTable = $objCC->mode == 'new' ? $objCC->tableName : $objCC->existingTable;
		if(strlen($strTable) < 1 || !\Contao\Database::getInstance()->tableExists($strTable))
		{
			return array();
		}
		
		$arrFields = \Contao\Database::getInstance()->listFields($strTable);
		
		$arrReturn = array();
		foreach($arrFields as $field)
		{
			if($field['name'] == 'PRIMARY')
			{
				continue;
			}
			$arrReturn[] = $field['name'];
		}
		
		return array_unique($arrReturn);
	}
	
	
	/**
	 * Return the fields of the data source
	 * @param object
	 * @return array
	 */
	public function getForeignFields($objDC)
	{
		$arrReturn = array();
		if($objDC->activeRecord->source == 'table' && strlen($objDC->activeRecord->tableSRC) > 0)
		{
			if(!\Contao\Database::getInstance()->tableExists($objDC->activeRecord->tableSRC))
			{
				return array();
			}
			
			$arrFields = \Contao\Database::getInstance()->listFields($objDC->activeRecord->tableSRC);
			
			foreach($arrFields as $field)
			{
				if($field['name'] == 'PRIMARY')
				{
					continue;
				}
				$arrReturn[ $field['name'] ] = $field['name'];
			}
		}
		else if($objDC->activeRecord->source == 'file' && !empty($objDC->activeRecord->singleSRC))
		{
			$objFile = \Contao\FilesModel::findByPk($objDC->activeRecord->singleSRC);
			if($objFile === null || !file_exists(Controller::rootDir().'/'.$objFile->path))
			{
				return array();
			}
			
			$objFile = new \Contao\File($objFile->path,true);
			$arrReturn = array();
			switch($objFile->extension)
			{
				case 'csv':
					$objApi = \PCT\CustomCatalog\API\Factory::findById($objDC->id);
					if($objApi === null)
					{
						return array();
					}
					
					$delimiter = $objApi->getDelimiter();
					$enclosure = null;
					// get custom enclosure
					if( isset($GLOBALS['PCT_CUSTOMCATALOG_API']['ENCLOSURE'][$this->id]) && strlen($GLOBALS['PCT_CUSTOMCATALOG_API']['ENCLOSURE'][$this->id]) > 0)
					{
						$enclosure = $GLOBALS['PCT_CUSTOMCATALOG_API']['ENCLOSURE'][$this->id];
					}
					
					$csv = array_filter(explode(PHP_EOL, $objFile->getContent()),'strlen');
					
					$array = array();
					foreach($csv as $line) 
					{
					   $s =  str_getcsv($line,$delimiter,$enclosure);
					   if(count($s) < 1)
					   {
						   continue;
					   }
					   $array[] = $s;
					}
					
					// fields should be in first line
					$arrReturn = array_values($array[0]);
					
					break;
				default:
					
					// read from keyfield_callback
					if( is_array($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['keyfield_callback']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['keyfield_callback']) )
					{
						$callback = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['keyfield_callback'];
						$arrReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($objDC);
					}
					
					break;
			}
		}
		// read from php array
		else if($objDC->activeRecord->source == 'template' && strlen($objDC->activeRecord->templateSRC) > 0)
		{
			$objCC = \Contao\CustomCatalog::fetchById($objDC->activeRecord->pid);
		
			$strTable = $objCC->mode == 'new' ? $objCC->tableName : $objCC->existingTable;
			$strFile = \Contao\TemplateLoader::getPath($objDC->activeRecord->templateSRC,'html5');
			
			if(file_exists($strFile))
			{
				include_once($strFile);
				$array = ${$strTable};
				if(is_array($array) && count($array) > 0)
				{
					$arrReturn = array_keys($array[0]);
				}
			}
		}
		// read from keyfield_callback
		else if( isset($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['keyfield_callback']) && is_array($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['keyfield_callback']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['keyfield_callback']) )
		{
			$callback = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['keyfield_callback'];
			$arrReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($objDC);
		}
		
		return array_unique($arrReturn);
	}
	
	
	/**
	 * Return the hooks as array
	 * @param object
	 * @return array
	 */
	public function getHooks($objDC)
	{
		$arrReturn = array();
		
		if(is_array($GLOBALS['PCT_CUSTOMCATALOG_API']['HOOKS']) && !empty($GLOBALS['PCT_CUSTOMCATALOG_API']['HOOKS']))
		{
			foreach($GLOBALS['PCT_CUSTOMCATALOG_API']['HOOKS'] as $callback)
			{
				$arrReturn['global'][] = $callback[0] . '::'.$callback[1];
			}
		}
		
		// include hooks by selected API
		if(strlen($objDC->activeRecord->type) > 0 && $objDC->activeRecord->type != 'standard' && is_array($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['hooks']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['hooks']) )
		{
			foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['hooks'] as $callback)
			{
				$arrReturn[ $objDC->activeRecord->type ][] = $callback[0] . '::'.$callback[1];
			}
		}
	
		return $arrReturn;
	}
	
		
	/**
	 * Return api import templates as array
	 * @param object
	 * @return array
	 */
	public function getImportTemplates($objDC)
	{
		return $this->getTemplateGroup('api_');
	}

	
	/**
	 * Return the backend description for an API extension
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
		
		$strBuffer = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$objDC->activeRecord->type]['label'][1] ?? '';
		if(strlen($strBuffer) < 1)
		{
			return '';
		}
				
		return '<div class="field backend_explanation clr widget">'.$strBuffer.'</div>';
	}
	
	

	/**
	 * Generate label
	 * @param array
	 * @return string
	 */
	public function listRecords($arrRow)
	{
		$mode = $arrRow['mode'];
		
		$classes = array($arrRow['type'],'tl_pct_customcatalog_api');
		
		$cssIcon = 'fa';
		
		if($mode == 'import')
		{
			$cssIcon .= ' fa-download';
		}
		else if($mode == 'export')
		{
			$cssIcon .= ' fa-upload';
		}
		
		$strIcon = '<i class="icon '.$cssIcon.'"></i>';
		
		$strAPI = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['API'][$arrRow['type']][0] ?? $arrRow['type'];
		
		$strBuffer = '<div class="cte_type ' . ($arrRow['published'] ? 'published ': 'unpublished ') .implode(' ', $classes). '">'.$strIcon.'<strong>' . $arrRow['title'] . '</strong>'.($arrRow['description'] ? '<span style="margin-left:5px" class="tl_gray">'.$arrRow['description'].'</span>' : '').'</div>';
		
		foreach($GLOBALS['TL_DCA']['tl_pct_customcatalog_api']['list']['label']['fields'] as $f)
		{
			$key = $GLOBALS['TL_LANG']['tl_pct_customcatalog_api'][$f][0] ?: $f;
			$value = $GLOBALS['TL_DCA']['tl_pct_customcatalog_api']['fields'][$f]['reference'][$arrRow[$f]] ?? $arrRow[$f];
			
			if($f == 'type')
		 	{
			 	$value = $strAPI;
		 	}
			else if($f == 'cronjob' && $arrRow[$f])
			{
				$f = 'cron';
				$key = $GLOBALS['TL_LANG']['tl_pct_customcatalog_api'][$f][0] ?: $f;
				$value = $GLOBALS['TL_DCA']['tl_pct_customcatalog_api']['fields'][$f]['reference'][$arrRow[$f]] ?: $arrRow[$f];
			}
			
			if(empty($value))
			{
				continue;
				#$value = '-';
			}
						
			$strBuffer .= '<div>'.$key.': '.$value.'</div>';
		}
		
		#if($arrRow['cronjob'])
		#{
		#	$f = 'cron';
		#	$key = $GLOBALS['TL_LANG']['tl_pct_customcatalog_api'][$f][0] ?: $f;
		#	$strBuffer .= '<div>'.$key.': '.$value.'</div>';
		#}
		
		return $strBuffer;
		
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
		$table = 'tl_pct_customcatalog_api';
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
	 * Redirect to tl_undo
	 * @param object
	 */
	public function redirectToUndo($objDC)
	{
		if(\Contao\Input::get('undo') == '')
		{
			return ;
		}
		
		$objCC = \Contao\CustomCatalog::findByTableName( \Contao\Input::get('undo') );
		if($objCC === null)
		{
			return;
		}

		// redirect to tl_undo and set backend search to table name
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->all();
		$arrSession['search']['tl_undo']['field'] = "data";
		$arrSession['search']['tl_undo']['value'] = $objCC->getTable();
		$objSession->replace($arrSession);
		
		$this->redirect( \Contao\Environment::get('base').\Contao\Environment::get('script').'?do=undo&ref='.\Contao\Input::get('ref') );
	}
	
	
	/**
	 * Return the undo button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getUndoButton($row, $href, $label, $title, $icon, $attributes)
	{
		if(!$this->User->isAdmin)
		{
			return '';
		}
		
		$objCC = \Contao\CustomCatalog::findById( $row['pid'] );
		if($objCC === null)
		{
			return '';
		}
		
		$strTable = $objCC->getTable();
		
		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id'].'&undo='.$strTable).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ';
	}
	
	
	/**
	 * Return the undo button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getReadyButton($row, $href, $label, $title, $icon, $attributes)
	{
		if(!$this->User->isAdmin)
		{
			return '';
		}
		
		if (!$row['published'])
		{
			#$icon = 'forward_1.gif';
		}
				
		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label, 'data-state="' . (!$row['published'] ? 0 : 1) . '"').'</a> ';
	}
}