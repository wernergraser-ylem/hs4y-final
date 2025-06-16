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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{iconpicker_legend:hide},iconStylesheets,customIconClasses,fontaweseomeSource;';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['iconStylesheets'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['iconStylesheets'],
	'inputType'               => 'fileTree',
	'eval'                    => array('tl_class'=>'clr w50','filesOnly'=>true,'multiple'=>true,'fieldType'=>'checkbox',),
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['customIconClasses'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['customIconClasses'],
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'clr long'),
	'sql'					  => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['fontaweseomeSource'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource'],
	'inputType'               => 'select',
	'default'				  => 'local',
	'options'				  => array('local','cdn'),
	'reference'				  => $GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource'],
	'eval'                    => array('tl_class'=>'','includeBlankOption'=>true),
	'sql'					  => "varchar(16) NOT NULL default ''"
);