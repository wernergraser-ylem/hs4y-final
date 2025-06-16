<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute Headline
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
use PCT\CustomElements\Core\Controller;

/**
 * Class file
 * Headline
 */
class Headline extends Attribute
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
			'inputType'		=> 'inputUnit',
			'options'		=> $this->get('options') ? \Contao\StringUtil::deserialize($this->get('options')) : array('h1','h2','h3','h4','h5','h6'),
			'eval'			=> $this->getEval(),
			'sql'			=> "varchar(255) NOT NULL default ''",
		);
		
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
	 * @return string	HTML output of the widget
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC)
	{
		if($objWidget->__get('value') && !\Contao\Environment::get('isAjaxRequest'))
		{
			if(!is_array($objWidget->__get('value')))
			{
				$varValue = array('value'=>$objWidget->__get('value'),'unit'=>'h1');
				$objWidget->__set('value',$varValue);
				\Contao\Input::setPost($strField,$varValue);
			}			
			
			// validate the input
			$objWidget->validate();
	
			if($objWidget->hasErrors())
			{
				$objWidget->class = 'error';
			}
		}
		return $objWidget->parse();
	}
	
	
	/**
	 * Render the attribute and return html
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$varValue = \Contao\StringUtil::deserialize($varValue);
		
		if(empty($varValue) || strlen($varValue['value']) < 1)
		{
			return $objTemplate->parse();
		}
		
		$arrCssID = \Contao\StringUtil::deserialize($this->get('cssID'));
		$arrClass = array('attribute','ce_'.$this->get('type'),$this->get('type'));
		if(strlen($arrCssID[1]) > 0)
		{
			$arrClass = array_unique(array_merge($arrClass,explode(' ',$arrCssID[1])));
		}
		
		// seo headline
		if( \strpos($varValue['unit'],'.') !== false )
		{
			$arrClass[] = \ltrim($varValue['unit'],'.');
			$varValue['unit'] = 'div';
		}

		$objTemplate->value = '<'.$varValue['unit'].' class="'.implode(' ',$arrClass).'">'.$varValue['value'].'</'.$varValue['unit'].'>';
		
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
		if($objAttribute->get('type') != 'headline' || empty($varValue))
		{
			return $varValue;
		}
		
		$varValue = \Contao\StringUtil::deserialize($varValue);
		// seo headline
		if( \strpos($varValue['unit'],'.') !== false )
		{
			$arrClass[] = \ltrim($varValue['unit'],'.');
			$varValue['unit'] = 'div';
		}

		return '<'.$varValue['unit'].' class="headline">'.$varValue['value'].'</'.$varValue['unit'].'>';
		
	}
	
	
	/**
	 * Load value callback
	 * @param array
	 * @param object
	 * @return mixed
	 */
	public function loadValueCallback($varValue,$objAttribute)
	{
		if($objAttribute->get('type') != 'headline' || Controller::isBackend() )
		{
			return $varValue;
		}
		
		$varValue = \Contao\StringUtil::deserialize($varValue);
			
		if(!is_array($varValue))
		{
			$varValue = explode(',', $varValue);
		}
		
		if( !isset($varValue['value']) || empty($varValue['value']) )
		{
			return '';
		}
		
		return $varValue;
	}

}