<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	AttributeFiles
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;


/**
 * Imports
 */
use Contao\FilesModel;
use Contao\StringUtil;
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;


/**
 * Class file
 * Files
 */
class Files extends Attribute
{
	/**
	 * Tell the vault to store how to save the data (binary,blob)
	 * Leave empty to varchar
	 * @var boolean
	 */
	protected $saveDataAs = '';
		
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
		
		// toggle show files only or folders only
		$arrEval['files'] = $this->get('eval_files') ? 0 : 1;
		
		if($this->get('isDownload'))
		{
			$arrEval['isDownloads'] = true;
		
			// restricted file types
			if(!$this->get('eval_extensions'))
			{
				$arrEval['extensions'] = $GLOBALS['TL_CONFIG']['allowedDownload'];
			}
		}
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'fileTree',
			'eval'			=> $arrEval,
			'sql'			=> "binary(16) NULL",
		);
		
		if($this->get('eval_multiple'))
		{
			$arrReturn['sql'] = "blob NULL";
		}
		
		// make attribute sortable
		if($this->get('sortBy') == 'custom' && isset($arrEval['multiple']) && $arrEval['multiple'])
		{
			$arrReturn['sortable'] = true;
			$arrReturn['eval']['isSortable'] = true;
		}
		
		return $arrReturn;
	}


	/**
	 * Parse widget callback
	 * Generate the widgets and add them to the child list
	 * Optional, return the whole compiled widget as html string
	 * @param object	Widget
	 * @param string	Name of the field
	 * @param array		Field definition
	 * @param object	DataContainer
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC)
	{
		// validate the input
		$objWidget->validate();

		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}
		
		$strBuffer = $objWidget->parse();
		
		// load data container and language file
		ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
		ControllerHelper::callstatic('loadLanguageFile',array('tl_content'));
		
		$options = \Contao\StringUtil::deserialize($this->get('options'));
		if(empty($options) || !is_array($options) || $objWidget->multiple)
		{
			return $strBuffer;
		}
		
		// generate a checkbox field for the 'new window' option 
		if(in_array('linkTitle', $options))
		{
			$strName = $strField.'_linkTitle';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['linkTitle'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// generate a text field for the link text option 
		if(in_array('titleText', $options))
		{
			$strName = $strField.'_titleText';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['titleText'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		return $strBuffer;
	}


	/**
	 * Return the field definition for an options field
	 * @param string
	 * @return array
	 */
	public function getOptionFieldDefinition($strOption)
	{
		if( $this->get('eval_multiple') )
		{
			return array();
		}

		ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
		$arrReturn = $GLOBALS['TL_DCA']['tl_content']['fields'][$strOption] ?? array();
		$arrReturn['saveDataAs'] = 'varchar';

		return $arrReturn;
	}
	
	
	/**
	 * Render the attribute and return html
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		// convert to array
		$varValue = StringUtil::deserialize($varValue);
		if($this->get('eval_multiple') && !is_array($varValue))
		{
			$varValue = array_filter(explode(',', $varValue));
		}

		# issue: #342
		if(is_array($varValue))
		{
			$varValue = array_filter($varValue);
		}
		
		$objOrig = $this->getActiveRecord();
		$objActiveRecord = new \Contao\ContentModel();
		$objActiveRecord->mergeRow( $objOrig->row() );
		$objActiveRecord->__set('strPk',$objActiveRecord->id);
		$objActiveRecord->customTpl = '';
		$objActiveRecord->start = '';
		$objActiveRecord->stop = '';
		$objActiveRecord->invisible = '';
		$objActiveRecord->autogrid = 0;
		$objActiveRecord->cssID = $objAttribute->get('cssID');
		$objActiveRecord->isCustomElement = true;
		$objActiveRecord->headline = '';
		$objActiveRecord->inline = $objAttribute->get('inline');

		// a non ce attribute template is coming in
		if( \property_exists($this,'isCustomTemplate') && $this->isCustomTemplate)
		{
			$objActiveRecord->customTpl = $objAttribute->get('template');
		}
		
		$objMyAttribute = null;
		if($this->get('isDownload') && $this->get('eval_multiple'))
		{
			$objMyAttribute = new \Contao\ContentDownloads($objActiveRecord);
			$objMyAttribute->multiSRC = $varValue;
			$objMyAttribute->sortBy = $objAttribute->get('sortBy');
			$objMyAttribute->orderSRC = $varValue;
			$objMyAttribute->inline = $objAttribute->get('inline');

			// respect individual ordering via record
			if(isset($objActiveRecord->{'orderSRC_'.$strField}))
			{
				$objMyAttribute->orderSRC = $objActiveRecord->{'orderSRC_'.$strField};
			}
		}
		else if($this->get('isDownload') && !$this->get('eval_multiple'))
		{
			$arrOptionValues = $objAttribute->loadOptionValues($strField);
			$objMyAttribute = new \Contao\ContentDownload($objActiveRecord);
			$objMyAttribute->singleSRC = $varValue;
			$objMyAttribute->linkTitle = $arrOptionValues['linkTitle'] ?? '';
			$objMyAttribute->titleText = $arrOptionValues['titleText'] ?? '';
			if( !empty($objMyAttribute->linkTitle) || !empty($objMyAttribute->titleText) )
			{
				$objMyAttribute->overwriteLink = true;
			}
			$objMyAttribute->inline = $objAttribute->get('inline');
			
			$objFile = FilesModel::findByPk($varValue);
			if( $objFile !== null )
			{
				// handle single folders
				$path = $objFile->path;
				if(is_dir($path))
				{
					$this->set('eval_multiple',true);
					return $this->renderCallback($strField,$varValue,$objTemplate,$objAttribute);
				}
			}
		}
		else if(!$this->get('isDownload'))
		{
			// respect individual ordering via record
			if(isset($objActiveRecord->{'orderSRC_'.$strField}))
			{
				$varValue = $objActiveRecord->{'orderSRC_'.$strField};
			}
			
			// make sure it is an array
			if(!is_array($varValue))
			{
				$varValue = explode(',', $varValue);
			}
			
			$paths = array();
			if(count($varValue) > 0)
			{
				foreach($varValue as $v)
				{
					$file = FilesModel::findByPk($v);
					if( $file !== null )
					{
						$paths[] = FilesModel::findByPk($v)->path;
					}
				}
			}
			
			return \implode(',', $paths);
		}
		// render raw
		else {return '';}
		
		$arrCssID = \Contao\StringUtil::deserialize($this->get('cssID'));
		$arrClass = array('attribute',$this->get('type'));
		if(strlen($arrCssID[1]) > 0)
		{
			$arrClass = array_unique(array_merge($arrClass,explode(' ',$arrCssID[1])));
		}
		$arrCssID[1] = implode(' ',$arrClass);
		$objMyAttribute->cssID = $arrCssID;
		$objMyAttribute->space = array();
		
		// merge with object vars
		foreach($objActiveRecord->row() as $k => $v)
		{
			if( isset($objMyAttribute->{$k}) )
			{
				$objActiveRecord->{$k} = $objMyAttribute->{$k};
			}
		}
				
		// pass to template
		$objTemplate->activeRecord = clone($objActiveRecord);
		$objTemplate->element = clone($objMyAttribute);

		// download: remove cid parameter
		if( \Contao\Input::get('file') != '' && empty($_GET['file']) === false && isset($_GET['cid']) )
		{
			\Contao\Input::setGet('cid',null);
		}

		// generate the attribute and place html in attribute template
		$objTemplate->value = $objMyAttribute->generate();
		
		// bypass the CE attribute template when a Contao template is in use
		if( \property_exists($objAttribute,'isCustomTemplate') && $objAttribute->isCustomTemplate)
		{
			return $objTemplate->value;
		}
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @return string
	 */
	public function processWildcardValue($varValue,$objAttribute)
	{
		if($objAttribute->get('type') != 'files' || empty($varValue))
		{
			return $varValue;
		}
		
		$varValue = \Contao\StringUtil::deserialize($varValue);
		
		if(!is_array($varValue))
		{
			$varValue = array_filter( explode(',',$varValue) );
		}
		
		$objFiles = \Contao\FilesModel::findMultipleByUuids($varValue);
		
		$strReturn = '';
		if($objAttribute->get('isDownload'))
		{
			$tmp = array();
			foreach($objFiles as $file)
			{
				$tmp[] = '<a href="'.$file->path.'" title="'.$file->name.'" download>'.$file->path.'</a>';
			}
			$strReturn = implode(', ', $tmp);
			unset($tmp);
		}
		else
		{
			$strReturn = implode(', ', $objFiles->fetchEach('path'));
		}
				
		return $strReturn;
		
	}
}