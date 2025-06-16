<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 * @link		http://contao.org
 */
 

/**
 * Namespace
 */
namespace PCT\ThemeSettings\Backend;

/**
 * Class file
 * TableFormField
 */
class TableFormField extends \Contao\Backend
{
	/**
	 * Modify the DCA
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\FormFieldModel::findByPk($objDC->id);
		}
		
		$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'] = \str_replace('invisible','invisible,visibility_css',$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default']);
		
		// margin fields and AG fields
		foreach ($GLOBALS['TL_DCA'][$objDC->table]['palettes'] as $k => $v) 
		{
			if( $k == '__selector__' )
			{
				continue;
			}
			// inject after tabindex field
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k] = str_replace('tabindex', 'tabindex,margin_t,margin_b,margin_t_m,margin_b_m,', $GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k]);
		
			// visibility_css
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k] = \str_replace('invisible','invisible,visibility_css',$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k]);
		
		
		}
	}
}