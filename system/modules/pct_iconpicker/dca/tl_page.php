<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addFontIcon';

/**
 * Palettes
 */
$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
{
	if(!is_array($GLOBALS['PCT_ICONPICKER']['pageIgnoreList']))
	{
		$GLOBALS['PCT_ICONPICKER']['pageIgnoreList'] = array();
	}
	
	foreach($GLOBALS['TL_DCA']['tl_page']['palettes'] as $type => $palette)
	{
		if(!in_array($type, $GLOBALS['PCT_ICONPICKER']['pageIgnoreList']) && $type != '__selector__')
		{
			$GLOBALS['TL_DCA']['tl_page']['palettes'][$type] .= ';{fontIcon_legend:hide},addFontIcon;';
		}
	}
}

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addFontIcon'] = 'fontIcon';

/**
 * Fields
 */ 
$GLOBALS['TL_DCA']['tl_page']['fields']['addFontIcon'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['addFontIcon'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_page']['fields']['fontIcon'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['fontIcon'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'clr w50'),
	'explanation'             => 'fontIcons',
	'wizard' => array
	(
		array('PCT\IconPicker\IconPicker', 'fontIconPicker')
	),
	'sql'					  => "varchar(32) NOT NULL default ''",
);