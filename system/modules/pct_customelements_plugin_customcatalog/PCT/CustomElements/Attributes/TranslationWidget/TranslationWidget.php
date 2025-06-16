<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpacke	pct_customelements_plugin_customcatalog
 * @attribute	TranslationWidget
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;


/**
 * Class file
 * TranslationWidget
 */
class TranslationWidget extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'				=> array( $this->get('title'),$this->get('description') ),
			'inputType'         => 'metaWizard',
			'eval'				=> array('allowHtml'=>true, 'metaFields'=>array('label')),
			'reference'			=> $GLOBALS['TL_LANG']['tl_pct_customelement_tags']['translations'],
			'sql'				=> "blob NULL"
		);
		
		return $arrReturn;
	}
	
	
	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @return string
	 */
	public function parseWidgetCallback($objWidget)
	{
		return '';
	}
}