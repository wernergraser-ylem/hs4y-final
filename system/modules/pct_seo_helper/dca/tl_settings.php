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
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{pct_seo_legend:hide},pct_seo_image_loading,pct_seo_protocol';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_seo_image_loading'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['pct_seo_image_loading'],
	'inputType'		=> 'select',
	'options'		=> array('auto','eager','lazy'),
	'eval'			=> array('includeBlankOption'=>true),
	'sql'			=> "varchar(8) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_seo_protocol'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['pct_seo_protocol'],
	'inputType'		=> 'select',
	'options'		=> array('auto','http1','http2'),
	'eval'			=> array('includeBlankOption'=>true),
	'sql'			=> "varchar(8) NOT NULL default ''",
);