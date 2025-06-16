<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_cusotmelements_plugin_customcatalog
 * @attribute	ItemTemplate
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Class file
 * ItemTemplate
 */
class ItemTemplate extends \PCT\CustomElements\Core\Attribute
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
			'exclude'			=> true,
			'inputType'			=> 'select',
			'options_callback'	=> array(get_class($this), 'getTemplates'),
			'eval'				=> array_merge($this->getEval(), array('includeBlankOption'=>true)),
			'sql'				=> "varchar(64) NOT NULL default ''",
		);
		return $arrReturn;
	}
	
	
	/**
	 * Return all templates as array
	 * @param object
	 */
	public function getTemplates($objDC)
	{
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findByAlias($objDC->field) ?: \PCT\CustomElements\Core\AttributeFactory::findByUuid($objDC->field);
		if(!$objAttribute)
		{
			return array();
		}
		
		$intPid = $objDC->activeRecord->pid;

		if (\Contao\Input::get('act') == 'overrideAll')
		{
			$intPid = \Contao\Input::get('id');
		}
		
		$objController = \PCT\CustomElements\Helper\ControllerHelper::getInstance();
		
		$arrCC = $objController->getTemplateGroup('customcatalog_item');
		$arrCustom = array();
		if(strlen($objAttribute->get('defaultValue')) > 0)
		{
			$arrCustomTemplates = explode(',', $objAttribute->get('defaultValue'));
			foreach($arrCustomTemplates as $strTpl)
			{
				$arrCustom = array_merge($arrCustom,$objController->getTemplateGroup($strTpl));
			}
		}
		
		return array_unique(array_merge($arrCC,$arrCustom));
	}
}