<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\ThemeDesigner;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\StringUtil;

/**
 * Class file
 * Versions
 */
class Versions extends \PCT\ThemeDesigner
{
	/**
	 * The form template
	 * @param string
	 */
	protected $strFormTemplate = 'td_versions_form';
	
	/**
	 * The form name
	 * @param string
	 */
	protected $strFormName = 'themedesigner_version';
	
	
	
	
	/**
	 * ThemeDesigner config array
	 * @var array
	 */
	protected $arrConfig = array();
	
	/**
	 * Init
	 */
	public function __construct($intHardLimit=0)
	{
		if(!is_array($GLOBALS['PCT_THEMEDESIGNER_CONFIG']))
		{
			return;
		}
		
		$this->arrConfig = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'];
	}
	
	
	/**
	 * Setter
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		switch($strKey)
		{
			case 'template':
				$strKey = 'strFormTemplate';
				break;
		}
		
		$this->{$strKey} = $varValue;
	}
	
	
	/**
	 * Getter
	 * @param string
	 */
	public function get($strKey)
	{
		return $this->{$strKey};
	}
	
	
	/**
	 * Form listener
	 * @param object
	 * called from generatePage Hook
	 */
	public function formListener($objPage)
	{
		// check if Themer loads a layout
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		
		$strTheme = $objRoot->pct_theme ?: 'eclipse_default';
		
		// reset
		if((int)\Contao\Input::get('themedesigner_reset') === 1 && \Contao\Config::get('pct_themedesigner_hidden') === false)
		{
			// disable others
			\Contao\Database::getInstance()->prepare("UPDATE tl_pct_themedesigner %s WHERE theme=?")->set( array('active'=>'') )->execute($strTheme);
		}
		
		if(\Contao\Config::get('pct_themedesigner_hidden') || \Contao\Input::post('FORM_SUBMIT') != $this->strFormName)
		{
			return;	
		}
		
				
		$intActiveVersion = (int)\Contao\Input::post('versions') > 0 ? (int)\Contao\Input::post('versions') : 0;
				
		// save
		if(\Contao\Input::post('save') != '')
		{
			$objDatabase = \Contao\Database::getInstance();
			$arrData = $this->getSession();
			
			// convert objects to arrays
			if(is_array($arrData) && count($arrData) > 0)
			{
				foreach($arrData as $key => $value)
				{
					if(is_object($value) || is_array($value) && !empty($value))
					{
						$tmp = array();
						foreach($value as $k => $v)
						{
							$tmp[$k] = $v;
						}
						$arrData[$key] = $tmp;
						unset($tmp);
					}
				}
			}
			
			$intTime = time();
			
			$arrSet = array
			(
				'tstamp'		=> $intTime,
				'data'			=> $arrData,
				'active'		=> 1,
				'theme'			=> $strTheme
			);
			
			// set description
			$strDescription = \Contao\Input::post('description') ?: '';
			
			if($strDescription != '')
			{
				$arrSet['description'] = $strDescription;
			}
			
			#// update
			#if($intActiveVersion > 0)
			#{
			#	$objStmt = \Contao\Database::getInstance()->prepare("UPDATE tl_pct_themedesigner %s WHERE id=?")->set($arrSet)->execute($intActiveVersion);
			#	
			#	// disable others
			#	$objDatabase->prepare("UPDATE tl_pct_themedesigner %s WHERE id!=?")->set( array('active'=>'') )->execute($intActiveVersion);
			#}
			// insert
			
			// disable others
			$objDatabase->prepare("UPDATE tl_pct_themedesigner %s WHERE theme=?")->set( array('active'=>'') )->execute($strTheme);
			
			// insert new version
			$objStmt = $objDatabase->prepare("INSERT INTO tl_pct_themedesigner %s")->set($arrSet)->execute();
			
			$insertId = $objStmt->__get('insertId');
			
			if( !isset($arrSet['description']) )
			{
				$arrSet['description'] = '';
			}
			
			// if no description, update the record with a fallback description
			if( strlen($arrSet['description']) < 1 && $insertId > 0)
			{
				$strDescription = sprintf(sprintf($GLOBALS['TL_LANG']['pct_themedesigner']['version_opt_label'],$insertId));
				$objDatabase->prepare("UPDATE tl_pct_themedesigner %s WHERE id=?")->set( array('description'=> $strDescription ) )->execute($insertId);
			}
			
			$strVersion = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'],$insertId,$intTime);
			
			// create the stylesheet
			$this->createStylesheet( $strVersion );
			
			// reload to flush post
			return \Contao\Controller::reload();
		}
		
		// restore
		if($intActiveVersion)
		{
			$objVersion = \PCT\ThemeDesigner\Model::findByPk($intActiveVersion);
			
			if($objVersion !== null)
			{
				$arrData = StringUtil::deserialize($objVersion->data);
				
				// clear session
				$this->setSession();
				
				// apply session
				$this->setSession($arrData);
				
				$objDatabase = \Contao\Database::getInstance();
				
				// set version to active	
				$objDatabase->prepare("UPDATE tl_pct_themedesigner %s WHERE id=?")->set( array('active'=>1) )->execute($intActiveVersion);
				
				// disable others
				$objDatabase->prepare("UPDATE tl_pct_themedesigner %s WHERE id!=? AND theme=?")->set( array('active'=>'') )->execute($intActiveVersion,$objVersion->theme);
				
				$strVersion = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'],\Contao\StringUtil::standardize($objVersion->description),time(),$objVersion->theme);
							
				// create the stylesheet
				$this->createStylesheet( $strVersion );
			}
			
			// reload to flush post
			return \Contao\Controller::reload();
		}
	}
	
	
	/**
	 * Render the navigation block
	 * @return string
	 */
	public function render($strTemplate='themedesigner')
	{
		global $objPage;
		
		// check if Themer loads a layout
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		
		// define constants
		$strTheme = $objRoot->pct_theme ?: 'eclipse_default';
		
		//-- rendering from here
		$objTemplate = new \Contao\FrontendTemplate($strTemplate);
		$objTemplate->type = 'versions';
		
		$objDatabase = \Contao\Database::getInstance();
		if(!$objDatabase->tableExists('tl_pct_themedesigner'))
		{
			$objTemplate->error = 'Table tl_pct_themedesigner does not exist. Versioning is disabled';
			
			return $objTemplate->parse();
		}
		
		// @var object model
		$objActiveVersion = \PCT\ThemeDesigner\Model::findActive();
		
		// @var object model collection
		$objVersions = \PCT\ThemeDesigner\Model::findByTheme($strTheme);
		
		// @var object \Contao\FrontendTemplate
		$objFormTemplate = new \Contao\FrontendTemplate( $this->strFormTemplate );
		$objFormTemplate->method = 'post';
		$objFormTemplate->formId = $this->strFormName;
		$objFormTemplate->formSubmit = $this->strFormName;
		
		// save button
		$objFormTemplate->hasSave = true;
		$arr = array(
			'id'	=> $this->strFormName.'_save',
			'name'	=> 'save', 
			'strName' => 'save',
			'value' => $GLOBALS['TL_LANG']['pct_themedesigner']['submit_save'] ?: 'save',
			'label'	=> $GLOBALS['TL_LANG']['pct_themedesigner']['submit_save'] ?: 'Save',
			'class' => 'submit',
			'tableless' => true,
		);
		$objSaveSubmit = new \Contao\FormSubmit($arr);
		$objSaveSubmit->addAttribute('value','save');
		$objFormTemplate->saveSubmit = $objSaveSubmit->generate();
		$objFormTemplate->saveLabel = $GLOBALS['TL_LANG']['pct_themedesigner']['submit_save'] ?: 'Save';
		
		// descritpion input
		$objFormTemplate->hasSave = true;
		$arr = array(
			'id'	=> $this->strFormName.'_description',
			'name'	=> 'description', 
			'strName' => 'description',
			'value' => '',
			'placeholder'	=> $GLOBALS['TL_LANG']['pct_themedesigner']['description_placeholder'] . ($objVersions === null ? '*' : ''),
			'label'	=> '',
			'class' => 'text',
			'tableless' => true,
		);
		
		$strClass = '\Contao\FormText';
		if( version_compare(ContaoCoreBundle::getVersion(),'5.0','<=') )
		{
			$strClass = '\Contao\FormTextField';
		}
		$objDescriptionInput = new $strClass($arr);
		$objFormTemplate->descriptionInput = $objDescriptionInput->parse();
		$objFormTemplate->descriptionInputId = $this->strFormName.'_description';
		$objFormTemplate->descriptionInputPlaceholder = $GLOBALS['TL_LANG']['pct_themedesigner']['description_placeholder'];
		
		#$objFormTemplate->desciptionInputLabel = $GLOBALS['TL_LANG']['pct_themedesigner']['submit_save'] ?: 'Save';
		
		
		// versions select
		$objVersions = \PCT\ThemeDesigner\Model::findByTheme($strTheme);
		if($objVersions === null)
		{
			$objVersions = array();
		}
		
		$intActiveVersion = 0;
			
		$arrOptions = array();
		foreach($objVersions as $objVersion)
		{
			$label = $objVersion->description ?: sprintf($GLOBALS['TL_LANG']['pct_themedesigner']['version_opt_label'],$objVersion->id);
			$arrOptions[] = array('value' => $objVersion->id, 'label' => $label);
			
			if($objVersion->active)
			{
				$intActiveVersion = $objVersion->id;
			}
		}
		
		// blank option
		\Contao\ArrayUtil::arrayInsert($arrOptions,0,array( array('value'=>'', 'label'=>'-')));
		
		$arr = array(
			'id'	=> $this->strFormName.'_versions',
			'name'	=> 'versions', 
			'strName' => 'versions',
			'value' => $intActiveVersion,
			'label'	=> $GLOBALS['TL_LANG']['pct_themedesigner']['versions_label'] ?? 'Versions',
			'options' => $arrOptions,
			'eval'	=> array('includeBlankOption'=>true,'submitOnChange'=>true),
			'class' => 'submit',
			'tableless' => true,
		);
		
		
		$strClass = '\Contao\FormSelect';
		if( version_compare(ContaoCoreBundle::getVersion(),'5.0','<=') )
		{
			$strClass = 'Contao\FormSelectMenu';
		}
		$objSelect = new $strClass($arr);
		$objFormTemplate->versionsSelect = $objSelect->parse();
		$objFormTemplate->versionsSelectId = $this->strFormName.'_versions';
		$objFormTemplate->versionsLabel = $GLOBALS['TL_LANG']['pct_themedesigner']['versions_label'] ?? 'Save';
		$objFormTemplate->submitOnChange = true;
		
		$objFormTemplate->hasVersions = count($arrOptions) > 0 ? true  : false;
		
		$objTemplate->content = $objFormTemplate->parse();
		
		return $objTemplate->parse();
	}
}