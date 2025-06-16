<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeBackendExplanation
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
 * BackendExplanation
 */
class BackendExplanation extends Attribute
{
	/**
	 * Do not save the attribute in the vault (do not validate)
	 * @param boolean
	 */
	protected $doNotSave = true;
	
	
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'			=> array(),
			'exclude'		=> true,
			'inputType'		=> 'text',
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
		$objWidget->description = '';
		$objTemplate = new \Contao\BackendTemplate($this->get('template'));
		$objTemplate->value = $this->get('description');
		$objTemplate->class = 'backend_explanation explanation';
		return $objTemplate->parse();
	}

}