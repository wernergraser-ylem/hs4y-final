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

#$GLOBALS['TL_DCA']['tl_form_field']['list']['sorting']['child_record_callback'] = array('PCT\IconPicker\Backend\TableFormField', 'listFormFields');

/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'addFontIcon';

/**
 * Palettes
 */
$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
{
	if(!is_array($GLOBALS['PCT_ICONPICKER']['fflIgnoreList']))
	{
		$GLOBALS['PCT_ICONPICKER']['fflIgnoreList'] = array();
	}

	foreach($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $type => $palette)
	{
		if(!in_array($type, $GLOBALS['PCT_ICONPICKER']['fflIgnoreList']) && $type != '__selector__')
		{
			$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$type] .= ';{fontIcon_legend:hide},addFontIcon;';
		}
	}
}

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['addFontIcon'] = 'fontIcon';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_form_field']['fields']['addFontIcon'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['addFontIcon'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['fontIcon'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['fontIcon'],
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
