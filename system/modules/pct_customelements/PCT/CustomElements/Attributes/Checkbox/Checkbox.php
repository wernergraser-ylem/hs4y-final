<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute Checkbox
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
 * Checkbox
 */
class Checkbox extends Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'checkbox',
			'default'		=> $this->get('defaultValue') ? true : false,
			'eval'			=> $this->getEval(),
			'sql'			=> "char(1) NOT NULL default ''",
		);
		
		return $arrReturn;
	}
}