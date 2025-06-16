<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2020
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */

$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
if( \in_array('pct_themer', $bundles) === false || (\in_array('pct_themer', $bundles) === true && (boolean)\Contao\Config::get('pct_themedesigner_nofonts') === true) )
{
	/**
	 * Palettes
	 */
	$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(',webfonts',',webfonts,webfonts_optin,',$GLOBALS['TL_DCA']['tl_layout']['palettes']['default']);
}

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_layout']['fields']['webfonts_optin'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['webfonts_optin'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);