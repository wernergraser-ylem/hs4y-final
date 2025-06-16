<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute Textarea
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */
use PCT\CustomElements\Core\Attribute as Attribute;

/**
 * Class file
 * Textarea
 */
class Textarea extends Attribute
{
	/**
	 * Tell the vault to store how to save the data (binary,blob,text)
	 * Leave empty to varchar
	 * @var boolean
	 */
	protected $saveDataAs = 'text';

	
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		if( isset($arrEval['rte']) && $arrEval['rte'] )
		{
			$arrEval['rte'] = 'tinyMCE';
		}
		
		// decode entities
		#$arrEval['decodeEntities'] = true;
		$arrEval['basicEntities'] = true;

		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'textarea',
			'eval'          => $arrEval,
			'sql'			=> "mediumtext NULL",
		);
		
		return $arrReturn;
	}
	
	/**
	 * Inject the TinyMCE script for the widget
	 * @param object
	 * @param string
	 * @param array
	 * @param object
	 * @return string
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		// replace basic entities
		$objWidget->__set('value', \str_replace( \array_values($GLOBALS['PCT_CUSTOMELEMENTS']['basicEntities']) , \array_keys($GLOBALS['PCT_CUSTOMELEMENTS']['basicEntities']), $objWidget->__get('value')));
		
		// validate the textarea on submit
		if(\Contao\Input::post('FORM_SUBMIT') == $objDC->table)
		{
			$objWidget->validate();
			
			if($objWidget->hasErrors())
			{
				$objSession->set($strField,'hasErrors');
			}
			else
			{
				$objSession->remove($strField);
			}
		}
				
		if($objSession->get($strField) == 'hasErrors')
		{
			$objWidget->validate();
		}
		
		$objWidget->class = $this->get('uuid');
		
		$strBuffer = $objWidget->parse();
		if( isset($arrFieldDef['eval']['rte']) && $arrFieldDef['eval']['rte'])
		{
			$objTinyMce = new \Contao\BackendTemplate($this->get('tinyTpl'));
			$objTinyMce->base = \Contao\Environment::get('base');
			$strRteLanguage = substr($GLOBALS['TL_LANGUAGE'], 0, 2);
			$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
			$objTinyMce->language = file_exists($rootDir . '/assets/tinymce/langs/' . $strRteLanguage . '.js') ? $strRteLanguage : 'en';
			$objTinyMce->rteFields = implode(',', array('ctrl_'.$this->get('uuid')));
			$objTinyMce->selector = $this->get('uuid');
			$objTinyMce->uploadPath = \Contao\Config::get('uploadPath') ?? 'files';
			$objTinyMce->fileBrowserTypes = null;
			$strTinyMce = $objTinyMce->parse();
	
			$strBuffer .= $strTinyMce;
		}

		return $strBuffer;
	}
	
	/**
	 * Return all tinymce templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getTinyMceTemplates()
	{
		return array_merge( \Contao\Controller::getTemplateGroup('tinymce'), \Contao\Controller::getTemplateGroup('be_') );
	}
}