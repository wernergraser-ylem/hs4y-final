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

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\StringUtil;
use Contao\System;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class TableCustomElement
 */
class TableCustomCatalogJob extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\Contao\System::import(\Contao\BackendUser::class, 'User');
		\Contao\System::loadLanguageFile('apis');
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

		// workaround for Contao "action" field selector bug
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['addTitle']['eval']['submitOnChange'] = false;
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['published']['eval']['submitOnChange'] = false;
		
		// @var object
		$objApi = \PCT\CustomCatalog\Models\ApiModel::findByPk($objDC->activeRecord->pid ?? 0);
		
		// set the source field to the current table in export mode
		if($objApi !== null && $objApi->type == 'standard' && $objApi->mode == 'export')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['source']['options_callback'] = array(get_class($this),'getCurrentFields');
		}

		// allow custom reference fields by API
		if($objApi !== null && isset($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objApi->type]['reference']) && \is_array($GLOBALS['PCT_CUSTOMCATALOG']['API'][$objApi->type]['reference']) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['reference']['options'] = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$objApi->type]['reference'];
			unset( $GLOBALS['TL_DCA'][$objDC->table]['fields']['reference']['options_callback'] );
		}

		// remove the reference field for imports
		if( $objApi !== null && $objApi->mode == 'import' )
		{
			unset( $GLOBALS['TL_DCA'][$objDC->table]['fields']['reference'] );
		}
		
		// set tiny for text action
		if($objDC->activeRecord->action == 'text')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval']['rte'] = 'tinyMCE';
		}
		
		// if mode is php set code text field to w50
		if( isset($objDC->activeRecord->action) && $objDC->activeRecord->action == 'source' && isset($objDC->activeRecord->mode) && $objDC->activeRecord->mode == 'php')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['label'][1] = $GLOBALS['TL_LANG']['tl_pct_customcatalog_job']['mode']['_php_'];
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval']['rte'] = '';
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval']['tl_class'] = 'w50';
		}
		
		// set valueSRC to size 2 for headlines
		if( isset($objDC->activeRecord->action) && $objDC->activeRecord->action == 'headline')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['valueSRC']['inputType'] = 'inputUnit';
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['valueSRC']['options'] = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
		}
		// empty valueSRC field if toogled from headline to text
		else if($objDC->activeRecord->action == 'value' && is_array(\Contao\StringUtil::deserialize($objDC->activeRecord->valueSRC)))
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['valueSRC']['load_callback'][] = array(get_class($this),'loadEmptyFieldValue');		
		}
		// set valueSRC to file picker or external url for file
		else if($objDC->activeRecord->action == 'file')
		{
			// show backend notice
			\Contao\Message::addInfo($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG_API']['MSC']['ressourceInfo_files']);
			
			// add the auto mode option on first position and make it default value
			\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA'][$objDC->table]['fields']['mode']['options'],0,array('auto'));
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['mode']['default'] = 'auto';
			
			// source should not be mandatory now but has a submitOnChange
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['source']['eval']['mandatory'] = false;
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['source']['eval']['submitOnChange'] = true;
			
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['label'] = $GLOBALS['TL_LANG'][$objDC->table]['action_file']['code']; 
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval'] = array('rgxp'=>'url','decodeEntities'=>true, 'fieldType'=>'radio', 'filesOnly'=>true, 'tl_class'=>'clr long wizard');	
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['wizard'] = array(array(get_class($this), 'filePicker'));
			// convert to file inserttag
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['save_callback'][] = array(get_class($this),'storeFileInsertTag');
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['save_callback'][] = array(get_class($this),'checkExternalResources');
			// convert back to readable paths
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['load_callback'][] = array(get_class($this),'getPathFromInsertTag');
			
			// if user selects a source, the code field should be readonly
			if(strlen($objDC->activeRecord->source) > 0)
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval']['readonly'] = true;
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['wizard'] = false;
			}
		}
		// set valueSRC to file picker or external url for file
		else if($objDC->activeRecord->action == 'files')
		{
			// show backend notice
			\Contao\Message::addInfo($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG_API']['MSC']['ressourceInfo_files']);
			
			// add the auto mode option on first position and make it default value
			\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA'][$objDC->table]['fields']['mode']['options'],0,array('auto'));
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['mode']['default'] = 'auto';
			
			// source should not be mandatory now but has a submitOnChange
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['source']['eval']['mandatory'] = false;
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['source']['eval']['submitOnChange'] = true;
			
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['inputType'] = 'textarea';
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['label'] = $GLOBALS['TL_LANG'][$objDC->table]['action_files']['code']; 
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval'] = array('decodeEntities'=>true, 'fieldType'=>'checkbox', 'filesOnly'=>true, 'tl_class'=>'clr long wizard','style'=>'min-height:50px;resize:vertical;');	
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['wizard'] = array(array(get_class($this), 'filePicker'));
			// convert to file inserttag code
			#$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['save_callback'][] = array(get_class($this),'storePathsAsUuid');
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['save_callback'][] = array(get_class($this),'checkExternalResources');
			// convert back to readable paths
			#$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['load_callback'][] = array(get_class($this),'getPathsFromUuid');
			
			// if user selects a source, the code field should be readonly
			if(strlen($objDC->activeRecord->source) > 0)
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval']['readonly'] = true;
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['wizard'] = false;
			}
		}
		// relations
		else if($objDC->activeRecord->action == 'relations')
		{
			$GLOBALS['TL_LANG']['MSC']['ow_value'] = $GLOBALS['TL_LANG'][$objDC->table]['action_relations']['code']['A'];
			$GLOBALS['TL_LANG']['MSC']['ow_label'] = $GLOBALS['TL_LANG'][$objDC->table]['action_relations']['code']['B'];
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['inputType'] = 'optionWizard';
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['label'] = $GLOBALS['TL_LANG'][$objDC->table]['action_relations']['code']; 
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['code']['eval'] = array('allowHtml'=>true, 'doNotSaveEmpty'=>true, 'style'=>'width:142px;height:66px');	
		}


		// set target by selected type
		if($objDC->activeRecord->type == 'field')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['target']['inputType'] = 'select';
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['target']['options_callback'] = array(get_class($this), 'getCurrentFields');
		}

		// toggle by type and mode selector e.g. type_default_mode_import
		if( isset($GLOBALS['TL_DCA'][$objDC->table]['palettes']['type_'.$objDC->activeRecord->type.'_mode_'.$objDC->activeRecord->mode]) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = $GLOBALS['TL_DCA'][$objDC->table]['palettes']['type_'.$objDC->activeRecord->type.'_mode_'.$objDC->activeRecord->mode];
		}
	}
	
	
	/**
	 * Return all job types as array
	 * @param object
	 * @retrun array
	 */
	public function getTypes($objDC)
	{
		$arrReturn = array('default' => $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options']);
		
		// include custom actions from api extensions
		foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'] as $k => $arrDef)
		{
			if( isset($arrDef['jobs']) && is_array($arrDef['jobs']) && !empty($arrDef['jobs']))
			{
				$arrReturn[$k] = array_keys($arrDef['jobs']);
			}
		}
		
		return  $arrReturn;
	}
	
	
	/**
	 * Return all job actions as array
	 * @param object
	 * @retrun array
	 */
	public function getActions($objDC)
	{
		$arrReturn = array('default' => $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options']);
		
		// include custom actions from api extensions
		foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'] as $k => $arrDef)
		{
			if( isset($arrDef['actions']) && is_array($arrDef['actions']) && !empty($arrDef['actions']))
			{
				$arrReturn[$k] = array_keys($arrDef['actions']);
			}
		}
		
		return  $arrReturn;
	}
	
	
	/**
	 * Get job rules as array
	 * @param object
	 * @return array
	 */
	public function getRules($objDC)
	{
		$objApi = \PCT\CustomCatalog\Models\ApiModel::findByPk($objDC->activeRecord->pid);
		if($objApi === null)
		{
			return array();
		}
		
		$arrReturn = array();
		
		// include custom rules from api extensions
		foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'] as $k => $arrDef)
		{
			if(is_array($arrDef['modes'][$objApi->mode]['rules']) && !empty($arrDef['modes'][$objApi->mode]['rules']))
			{
				$arrReturn[$objApi->mode.'_rule'] = $arrDef['modes'][$objApi->mode]['rules'];
			}
		}
		
		return  $arrReturn;
	}
	
	
	/**
	 * Return the fields of the data source
	 * @param object
	 */
	public function getForeignFields($objDC)
	{
		$objApiModel = \PCT\CustomCatalog\Models\ApiModel::findByPk($objDC->activeRecord->pid);
		$objTableApi = new \PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomCatalogApi;
		
		$dc = new \StdClass;
		$dc->id = $objApiModel->id;
		$dc->activeRecord = $objApiModel;
		
		return $objTableApi->getForeignFields($dc);
	}
	
	
	/**
	 * Return all registered API Hooks
	 * @param object
	 * @retrun array
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
		if(strlen($objDC->activeRecord->type) > 0 && $objDC->activeRecord->type != 'default' && is_array($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['hooks']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['hooks']))
		{
			foreach($GLOBALS['PCT_CUSTOMCATALOG']['API'][ $objDC->activeRecord->type ]['hooks'] as $callback)
			{
				$arrReturn[ $objDC->activeRecord->type ][] = $callback[0] . '::'.$callback[1];
			}
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
		$objAPI = \PCT\CustomCatalog\Models\ApiModel::findByPk($objDC->activeRecord->pid);
		if(!$objAPI)
		{
			return array();
		}
		
		$objAttributes = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::fetchAllByCustomCatalog($objAPI->pid);
		if(!$objAttributes)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objAttributes->next())
		{
			$arrReturn[ $objAttributes->id ] = $objAttributes->title . ' ['.$objAttributes->alias.']';;
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
		$objApi = \PCT\CustomCatalog\Models\ApiModel::findByPk($objDC->activeRecord->pid);
		if($objApi === null)
		{
			return array();
		}
		
		$objCC = \Contao\CustomCatalog::fetchById($objApi->pid);
		
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
	 * Load an empty field value
	 * @param value
	 * @param object
	 */
	public function loadEmptyFieldValue($varValue,$objDC=null)
	{
		return '';
	}
	
	
	/**
	 * Header callback
	 * @param array
	 * @param object
	 */
	public function listHeaderFields($arrFields,$objDC)
	{
		$this->loadLanguageFile($objDC->__get('parentTable'));
		
		if( !is_array($GLOBALS['TL_DCA'][$objDC->__get('parentTable')]) )
		{
			$this->loadDataContainer($objDC->__get('parentTable'));
		}
		
		$objApi = \PCT\CustomCatalog\Models\ApiModel::findByPk($objDC->id);
		$key = $GLOBALS['TL_LANG'][$objDC->__get('parentTable')]['mode'][0] ?: 'mode';
		$value = $GLOBALS['TL_DCA'][$objDC->__get('parentTable')]['fields']['mode']['reference'][$objApi->mode] ?: $objApi->mode;
		
		$arrFields[$key] = $value;
				
		return $arrFields;
	}
	
	
	/**
	 * Generate label
	 * @param array
	 * @return string
	 */
	public function listRecords($arrRow)
	{
		$objApi = \PCT\CustomCatalog\Models\ApiModel::findByPk($arrRow['pid']);
		
		$title = $arrRow['target'];
		if($arrRow['addTitle'])
		{
			$title = $arrRow['title'];
		}
		
		$strBuffer = '<div class="cte_type ' . ($arrRow['published'] ? 'published': '') . '"><strong>' . $title . '</strong>'.($arrRow['description'] ? '<span style="margin-left:5px" class="tl_gray">'.$arrRow['description'].'</span>' : '').'</div>';
		
		$arrFields = $GLOBALS['TL_DCA']['tl_pct_customcatalog_job']['list']['label']['fields'];
		
		// show hookSRC field instead of mode
		if($arrRow['action'] == 'hook' && in_array('mode', $arrFields))
		{
			unset($arrFields[ array_search('mode', $arrFields) ]);
			$arrFields[] = 'hookSRC';
		}
		// add hookSRC field
		else if($arrRow['action'] == 'source' && $arrRow['mode'] == 'hook')
		{
			$arrFields[] = 'hookSRC';
		}	
	
		
		$tmp = array();
		foreach($arrFields as $f)
		{
			if(!$arrRow[$f]) 
			{
				continue;
			}
			$key = $GLOBALS['TL_LANG']['tl_pct_customcatalog_job'][$f][0] ?: $f;
			$value = $GLOBALS['TL_DCA']['tl_pct_customcatalog_job']['fields'][$f]['reference'][$arrRow[$f]] ?? $arrRow[$f];
			$tmp[$f] = '<div>'.$key.': '.$value.'</div>';
		}
		
		if($arrRow['action'] == 'value')
		{
			unset($tmp['mode']);
		}
		
		$strBuffer .= implode('', $tmp);
		
		$icon = '';
		
		// call the custom child_record_callback Hook
		$strBuffer = \PCT\CustomElements\Core\Hooks::callstatic('child_record_callback',array('tl_pct_customcatalog_job',$arrRow,$icon,$strBuffer));
		
		return $strBuffer;
		
	}
	
	
	/**
	 * Return the link picker wizard
	 * @param DataContainer
	 * @return string
	 */
	public function pagePicker($objDC)
	{
		return ' <a href="contao/page.php?do=' . \Contao\Input::get('do') . '&amp;table=' . $objDC->table . '&amp;field=' . $objDC->field . '&amp;value=' . rawurlencode(str_replace(array('{{link_url::', '}}'), '', $objDC->value)) . '&amp;switch=0' . '" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':768,\'title\':\'' . StringUtil::specialchars(str_replace("'", "\\'", $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['label'][0])) . '\',\'url\':this.href,\'id\':\'' . $objDC->field . '\',\'tag\':\'ctrl_'. $objDC->field . ((\Contao\Input::get('act') == 'editAll') ? '_' . $objDC->id : '') . '\',\'self\':this});return false">' . \Contao\Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}
	
	
	/**
	 * Return the file picker wizard
	 * @param DataContainer
	 * @return string
	 */
	public function filePicker($objDC)
	{
		return ' <a href="contao/file.php?do=' . \Contao\Input::get('do') . '&amp;table=' . $objDC->table . '&amp;field=' . $objDC->field . '&amp;value=' . rawurlencode(str_replace(array('{{link_url::', '}}'), '', $objDC->value)) . '&amp;switch=0&amp;id='.\Contao\Input::get('id') . '" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':768,\'title\':\'' . StringUtil::specialchars(str_replace("'", "\\'", $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['label'][0])) . '\',\'url\':this.href,\'id\':\'' . $objDC->field . '\',\'tag\':\'ctrl_'. $objDC->field . ((\Contao\Input::get('act') == 'editAll') ? '_' . $objDC->id : '') . '\',\'self\':this});return false">' . \Contao\Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}
	
	
	/**
	 * Convert a file path to the file inserttag before saving to the database
	 * @param string
	 * @return string
	 * Called from save_callback
	 */
	public function storeFileInsertTag($varValue, $objDC)
	{
		if(!is_file(Controller::rootDir().'/'.$varValue))
		{
			return $varValue;
		}
		
		// add file resource
		$objFile = \Contao\FilesModel::findOneByHash( \Contao\Dbafs::addResource($varValue)->hash );
		
		return '{{file::'.\Contao\StringUtil::binToUuid($objFile->uuid).'}}';
	}
	
	
	/**
	 * Convert a file inserttag back to the real pack
	 * @param mixed
	 * @param object
	 * @return string
	 * Called from load_callback
	 */
	public function getPathFromInsertTag($varValue, $objDC)
	{
		if(empty($varValue))
		{
			return $varValue;
		}
		
		if(is_array($varValue))
		{
			$varValue = implode(',', $varValue);
		}
		
		$arrElements = explode('::', str_replace(array('{{','}}'),'',$varValue));
		if($arrElements[0] != 'file')
		{
			return $varValue;
		}
		return \Contao\FilesModel::findByUuid($arrElements[1])->path ?: '';
	}
	
	
	/**
	 * Check if an external resource exists
	 * @param string
	 * @param object
	 * @return string
	 * Called from save_callback
	 */
	public function checkExternalResources($varValue, $objDC)
	{
		$arrValues = \Contao\StringUtil::deserialize($varValue);
		if(!is_array($arrValues))
		{
			$arrValues = array_map('trim',explode(',', $arrValues));
		}
		
		$arrErrors = array();
		foreach($arrValues as $value)
		{
			if(strlen(strpos($value, 'http')) < 1)
			{
				continue;
			}
			
			// try to load resource
			if(file_get_contents($value) == '')
			{
				$arrErrors[] = 'File '.$value.' not found or zero byte.';
			}
		}
		
		if(count($arrErrors) > 0)
		{
			throw new \Exception(implode('\n', $arrErrors));
		}
		
		return $varValue;
	}
	
	
	/**
	 * Store file locations as uuids
	 * @param string
	 * @param object
	 * @return string
	 * Called from save_callback
	 */
	public function storePathsAsUuid($varValue, $objDC)
	{
		$arrValues = \Contao\StringUtil::deserialize($varValue);
		if(!is_array($arrValues))
		{
			$arrValues = array_map('trim',explode(',', $arrValues));
		}
		
		$arrErrors = array();
		
		$arrSet = array();
		foreach($arrValues as $value)
		{
			// local file
			if(file_exists(Controller::rootDir().'/'.$value))
			{
				// add file resource
				$objFile = \Contao\FilesModel::findOneByHash( \Contao\Dbafs::addResource($value)->hash ); 
				if($objFile !== null)
				{
					$arrSet[] = \Contao\StringUtil::binToUuid($objFile->uuid);
				}
				continue;
			}
			else if(strlen(strpos($value, 'http')) > 0)
			{
				// try to load resource
				if(file_get_contents($value) == '')
				{
					$arrErrors[] = 'File '.$value.' not found or zero byte.';
				}
				
				$arrSet[] = $value;
			}
			
		}
		
		if(count($arrErrors) > 0)
		{
			throw new \Exception(implode('\n', $arrErrors));
		}
		
		if(count($arrSet) > 0)
		{
			$varValue = implode(',', $arrSet);
		}
		
		return $varValue;
	}
	
	
	/**
	 * Convert uuids back to readable paths
	 * @param string
	 * @param object
	 * @return string
	 */
	public function getPathsFromUuid($varValue, $objDC)
	{
		$arrValues = \Contao\StringUtil::deserialize($varValue);
		if(!is_array($arrValues))
		{
			$arrValues = array_map('trim',explode(',', $arrValues));
		}
		
		$arrSet = array();
		foreach($arrValues as $value)
		{
			if(\Contao\Validator::isStringUuid($value))
			{
				$arrSet[] = \Contao\FilesModel::findByUuid($value)->path;
			}
			else
			{
				$arrSet[] = $value;
			}
		}
		
		if(count($arrSet) > 0)
		{
			$varValue = implode(',', $arrSet);
		}
		
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
		$table = 'tl_pct_customcatalog_job';
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
}