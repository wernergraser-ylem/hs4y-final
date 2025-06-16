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
 * TableCustomElementAttribute
 */
class TableCustomElementAttribute extends \Contao\Backend
{
	/**
	 * Modify DCA
	 * @param array
	 * @return string
	 */
	public function modifyDca($objDC)
	{
		if( isset($objDC->activeRecord->type) && $objDC->activeRecord->type == 'iconpicker' )
		{
			$search = array('__FIELDDEFINITION__','__EVAL__');
			$replace = array('options','eval_mandatory');
			$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$objDC->activeRecord->type] = str_replace($search, $replace, $GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes']['default']);
			$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$objDC->activeRecord->type]['options'] = array('iconpicker');
			$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$objDC->activeRecord->type ]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options']['iconpicker'];
		}
	}
}