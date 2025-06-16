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
 * @attribute	MetaKeywords
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Class file
 * MetaDescription
 */
class MetaDescription extends \PCT\CustomElements\Core\Attribute
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
			'inputType'		=> 'textarea',
			'eval'			=> array_unique(array_merge($this->getEval(),array('style'=>'max-height:60px', 'decodeEntities'=>true))),
			'sql'			=> "tinytext NULL",
		);
		return $arrReturn;
	}
	
	/**
	 * Append keywords
	 * called from renderCallback Hook (PCT\CustomElements\Core\Attribute)
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		if(strlen(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'])) > 0)
		{
			global $objPage;
			$objPage->description .= $varValue;
		}
		return $varValue;
	}
}