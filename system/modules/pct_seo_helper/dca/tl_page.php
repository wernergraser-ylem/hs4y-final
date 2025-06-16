<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2019 Leo Feyer
 *
 * @copyright	Tim Gatzky 2019, Premium-Contao-Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package 	pct_seo_helper
 * @link    	https://contao.org, https://www.premium-contao-themes.com
 * @license 	http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = str_replace('description','description,pct_structured_data',$GLOBALS['TL_DCA']['tl_page']['palettes']['regular']);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['pct_structured_data'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_page']['pct_structured_data'],
	'exclude'		=> true,
	'inputType'		=> 'textarea',
	'eval'			=> array('allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html'),
	'sql'			=> "mediumtext NULL"
);