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

/**
 * Class file
 * Quickinfo
 */
class Quickinfo extends \PCT\ThemeDesigner
{
	/**
	 * Render the navigation block
	 * @return string
	 */
	public function render($strTemplate='themedesigner_quickinfo')
	{
		// load language file
		\Contao\System::loadLanguageFile('themedesigner');
		
		global $objPage;
		
		// check if Themer loads a layout
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		
		// define constants
		$strTheme = $objRoot->pct_theme ?: 'eclipse_default';
		
		$objTemplate = new \Contao\FrontendTemplate($strTemplate);
		$objTemplate->theme = $GLOBALS['PCT_THEMER']['THEMES'][$strTheme]['label'] ?: $strTheme;
		
		$arrSession = $this->getSession();
		$arrSwitch = $arrSession['SWITCH'];
		$arrCounter = array();
		
		$arrLabels = $GLOBALS['TL_LANG']['PCT_THEMEDESIGNER_QUICKINFO']['labels'];
		
		// find visible elements
		$arrElements = array();
		
		$i = 0;
		foreach($this->arrConfig as $strSection => $arrSection)
		{
			if( !isset($arrSection['fields']) || !is_array($arrSection['fields']))
			{
				continue;
			}
			
			$arrTogglerLabels = $arrSection['toggler_label'] ?: array();
			
			foreach($arrSection['fields'] as $strField => $arrField)
			{
				if( !isset($arrField['config']['showInQuickInfo']) )
				{
					continue;
				}
				
				$selector = $strSection.'__'.$strField;
				$key = $strSection.'__'.$strField;
					
				// if TD are unique by their name, use them
				if((boolean)$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] === true)
				{
					$selector = $strField;
				}
				
				if( isset($arrField['name']) )
				{
					$selector = $arrField['name'];
				}
				
				$strSwitch = $selector.(!empty($arrCounter['SWITCHES'][$selector]) ? '__'.$arrCounter['SWITCHES'][$selector] : '');
				if( isset($arrField['switch']) && strlen($arrField['switch']) > 0)
				{
					$strSwitch = $arrField['switch'];
				}

				if( !isset($arrCounter['SWITCHES'][$selector]) )
				{
					$arrCounter['SWITCHES'][$selector] = 0; 
				}
				
				$arrCounter['SWITCHES'][$selector]++;
				
				$arrClass = array($selector);
				$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
				if($i == 0)
				{
					$arrClass[] = 'first';
				}
				else if($i >= count($arrSection['fields']) - 1)
				{
					$arrClass[] = 'last';
				}
				
				// switch is on
				if( (isset($arrSwitch[$strSwitch]) && (boolean)$arrSwitch[$strSwitch] === false) || (!isset($arrSwitch[$strSwitch]) && (boolean)$arrField['config']['notActiveByDefault'] === true) )
				{
					$arrClass[] = 'hidden';
				}

				$label = $arrField['label'][0] ?? '';
				if( isset($arrLabels[$selector]) )
				{
					$label = $arrLabels[$selector];
				}
				
				$tmp = array
				(
					'label'			=> $label,
					'description'	=> $arrField['label'][1],
					'selector' 		=> $selector,
					'definition' 	=> $arrField,
					'class'			=> implode(' ', $arrClass),
					'value'			=> $this->findValueByField($selector) ?: '',
					'switch'		=> $strSwitch,
				);
				
				$arrElements[$selector] = $tmp;
				
				unset($tmp);
				$i++;
			}
		}
		
		$objTemplate->elements = $arrElements;
				
		return $objTemplate->parse();
	}
}