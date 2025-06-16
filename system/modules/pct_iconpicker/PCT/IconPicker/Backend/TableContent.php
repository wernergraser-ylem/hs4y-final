<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\IconPicker\Backend;

/**
 * Class file
 * TableContent
 */
class TableContent extends \Contao\Backend
{
	/**
	 * Overwrite the backend output of a form field row and inject font icon class
	 * @param array
	 * @return string
	 */
	public function modifyDca($objDC)
	{
		if(!is_array($GLOBALS['PCT_ICONPICKER']['cteIgnoreList']))
		{
			$GLOBALS['PCT_ICONPICKER']['cteIgnoreList'] = array();
		} 
		
		foreach($GLOBALS['TL_DCA'][$objDC->table]['palettes'] as $type => $palette)
		{
			if(!in_array($type, $GLOBALS['PCT_ICONPICKER']['cteIgnoreList']) && $type != '__selector__')
			{
				// expert settings
				if(strlen(strpos($GLOBALS['TL_DCA'][$objDC->table]['palettes'][$type], 'space')))
				{
					$replace = ',protected';
					$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$type] = str_replace($replace, $replace.';{fontIcon_legend:hide},addFontIcon;', $GLOBALS['TL_DCA'][$objDC->table]['palettes'][$type]);
					continue;
				}
			
				$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$type] .= ';{fontIcon_legend:hide},addFontIcon';
			}
		}	
	}
}