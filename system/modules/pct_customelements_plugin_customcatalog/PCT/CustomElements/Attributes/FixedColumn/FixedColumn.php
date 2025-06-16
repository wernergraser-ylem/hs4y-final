<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2022
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	FixedColumn
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

use Contao\System;

/**
 * Class file
 * FixedColumn
 */
class FixedColumn extends \PCT\CustomElements\Core\Attribute
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
			'sql'			=> "varchar(255) NOT NULL default ''",
			'default'		=> System::getContainer()->get('contao.insert_tag.parser')->replace( $this->get('defaultValue') ?? '' )
		);

		// sql type
		if( empty($this->eval_rowscols) === false )
		{
			$arrReturn['sql'] = $this->eval_rowscols;
		}

		return $arrReturn;
	}
	
	
	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @param string
	 * @param array
	 * @param object
	 * @param mixed
	 * @return string
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC)
	{
		return '';
	}	
}