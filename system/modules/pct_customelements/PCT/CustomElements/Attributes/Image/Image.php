<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	AttributeImage
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */

use Contao\Validator;
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * Image
 */
class Image extends Attribute
{
	/**
	 * Tell the vault to store how to save the data (binary,blob)
	 * Leave empty to varchar
	 * @var boolean
	 */
	protected $saveDataAs = 'binary';
	
	/**
	 * Default rendering template
	 * @var string
	 */
	protected $strTemplate = 'customelement_attr_default';
	
		
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
		
		if( $this->get('template') != '' )
		{
			$this->strTemplate = $this->get('template');
		}
	}	

	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		// always add clear to image fields
		if(!$this->get('eval_tl_class_clr'))
		{
			if( !isset($arrEval['tl_class']) )
			{
				$arrEval['tl_class'] = '';
			}
			$arrEval['tl_class'] .= ' clr';
		}
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'fileTree',
			'eval'			=> array_merge($arrEval,array('filesOnly'=>true, 'fieldType'=>'radio')),
			'sql'			=> "binary(16) NULL",
		);
		
		return $arrReturn;
	}
	
	/**
	 * Parse widget callback
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC,$varValue)
	{
		// validate
		if(isset($_POST[$strField]))
		{
			$objWidget->validate();
		}
		
		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}
		
		$strBuffer = $objWidget->parse();
		
		// load data container and language file
		ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
		ControllerHelper::callstatic('loadLanguageFile',array('tl_content'));
		
		$options = \Contao\StringUtil::deserialize($this->get('options'));
		if(empty($options) || !is_array($options))
		{
			return $strBuffer;
		}
		
		// alt field
		if(in_array('alt', $options))
		{
			$strName = $strField.'_alt';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['alt'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// title field
		if(in_array('title', $options))
		{
			$strName = $strField.'_title';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['imageTitle'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// size field 
		if(in_array('size', $options))
		{
			$strName = $strField.'_size';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['size'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// imageUrl field 
		if(in_array('imageUrl', $options))
		{
			$strName = $strField.'_imageUrl';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['imageUrl'];
			$arrFieldDef['eval']['tl_class'] = 'w50 wizard';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// fullscreen/new window field 
		if(in_array('fullsize', $options))
		{
			$strName = $strField.'_fullsize';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['fullsize'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$arrFieldDef['sql'] = "char(1) NOT NULL default ''";
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		// caption field 
		if(in_array('caption', $options))
		{
			$strName = $strField.'_caption';
			$arrFieldDef = $GLOBALS['TL_DCA']['tl_content']['fields']['caption'];
			$arrFieldDef['eval']['tl_class'] = 'w50';
			$arrFieldDef['saveDataAs'] = 'varchar';
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		return $strBuffer;
	}
	
	
	/**
	 * Render the attribute and return html
	 * @param string
	 * @param mixed
	 * @param object
	 * @param object
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$varValue = \Contao\StringUtil::deserialize($varValue);
		
		$objOrig = $this->getActiveRecord();
		$objActiveRecord = new \Contao\ContentModel();
		$objActiveRecord->mergeRow( $objOrig->row() );
		$objActiveRecord->__set('strPk',$objActiveRecord->id);

		$singleSRC = $varValue;
		if( !Validator::isBinaryUuid($varValue) )
		{
			$singleSRC = \Contao\StringUtil::uuidToBin($singleSRC);
		}

		$objActiveRecord->singleSRC = $singleSRC;
		$objActiveRecord->customTpl = '';
		$objActiveRecord->start = '';
		$objActiveRecord->stop = '';
		$objActiveRecord->invisible = '';
		$objActiveRecord->autogrid = 0;
		$objActiveRecord->cssID = $objAttribute->get('cssID');
		$objActiveRecord->isCustomElement = true;
		$blnOverwriteMeta = false;
		// laod option values
		$arrOptionValues = array_filter( $this->loadOptionValues($strField) );
		
		foreach($arrOptionValues as $k => $v)
		{
			$objActiveRecord->{$k} = $v;
			// meta data fields
			if( \in_array($k, array('title','alt','caption','imageUrl') ) )
			{
				$blnOverwriteMeta = true;
			}
		}
		$objActiveRecord->overwriteMeta = $blnOverwriteMeta;
		$objActiveRecord->imageTitle =  $arrOptionValues['title'] ?? '';
		
		// a non ce attribute template is coming in
		if( \property_exists($this,'isCustomTemplate') && $this->isCustomTemplate)
		{
			$objActiveRecord->customTpl = $objAttribute->get('template');
		}

		$objMyAttribute = new \Contao\ContentImage($objActiveRecord);
		$objMyAttribute->customTpl = '';
		$objMyAttribute->type = 'image';
		$objMyAttribute->overwriteMeta = $blnOverwriteMeta;
		
		$objActiveRecord->headline = '';
		$objMyAttribute->imageUrl = $arrOptionValues['imageUrl'] ?? '';
		$objMyAttribute->href = $arrOptionValues['imageUrl'] ?? '';
		$objMyAttribute->fullsize = $arrOptionValues['fullsize'] ?? '';
		$objMyAttribute->caption = $arrOptionValues['caption'] ?? '';
	
		$options = \Contao\StringUtil::deserialize($this->get('options'));
		
		if(!empty($options) && is_array($options) && !empty($arrOptionValues['size']))
		{
			$arrSize = array_filter(\Contao\StringUtil::deserialize($arrOptionValues['size']),'strlen');
			if(count($arrSize) > 0)
			{
				$objMyAttribute->size = $arrOptionValues['size'];
			}
		}
		
		if(!$objMyAttribute->size)
		{
			$objMyAttribute->size = $this->get('size');
		}
		
		$objMyAttribute->space = array();
				
		// pass to template
		$objTemplate->activeRecord = $objActiveRecord;
		$objTemplate->element = $objMyAttribute;
		
		// generate the attribute and place html in attribute template
		$objTemplate->value = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace( $objMyAttribute->generate() ?? '' );
		
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
		if($objAttribute->get('type') != 'image' || empty($varValue))
		{
			return $varValue;
		}

		$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		
		$size = $GLOBALS['PCT_CUSTOMELEMENTS']['defaultWildcardImageSize'];
		$objFile = \Contao\FilesModel::findByPk($varValue);
		if( $objFile === null || \file_exists($projectDir.'/'.$objFile->path) === false )
		{
			return '';
		}

		$image = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, $size)->getUrl($projectDir);
		
		if(strlen($image) < 1)
		{
			return '';
		}
		
		$image = \Contao\Image::getHtml($image);
		return $image;
	}
	
	
	/**
	 * Return the field definition for an options field
	 * @param string
	 * @return array
	 */
	public function getOptionFieldDefinition($strOption)
	{
		$arrReturn = $GLOBALS['TL_DCA']['tl_content']['fields'][$strOption] ?? array();
		$arrReturn['eval']['tl_class'] = 'w50';
		$arrReturn['saveDataAs'] = 'varchar';
		
		if( isset($arrReturn['eval']['datepicker']) || isset($arrReturn['eval']['dcaPicker']) )
		{
			$arrReturn['eval']['tl_class'] .= ' wizard';
		}

		if( \in_array($strOption, array('fullsize')) )
		{
			$arrFieldDef['sql'] = "char(1) NOT NULL default ''";
		}

		return $arrReturn;
	}
}