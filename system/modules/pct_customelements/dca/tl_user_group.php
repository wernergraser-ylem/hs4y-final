<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_pct_customelements
 * @link		http://contao.org
 */

/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['default'] = str_replace('fop;', 'fop;{pct_customelement_legend},pct_customelements,pct_customelementsp,protect_pct_customelement_groups,pct_customelement_groupsp,protect_pct_customelement_attributes,pct_customelement_attributesp;', $GLOBALS['TL_DCA']['tl_user_group']['palettes']['default']);

/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['__selector__'][] = 'protect_pct_customelement_groups';
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['__selector__'][] = 'protect_pct_customelement_attributes';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_user_group']['subpalettes']['protect_pct_customelement_groups'] = 'pct_customelement_groups';
$GLOBALS['TL_DCA']['tl_user_group']['subpalettes']['protect_pct_customelement_attributes'] = 'pct_customelement_attributes';


/**
 * Add fields to tl_user_group
 */
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelements'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelements'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_pct_customelement.title',
	'eval'                    => array('multiple'=>true,'submitOnChange'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelementsp'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelementsp'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('create', 'delete'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('multiple'=>true,'tl_class'=>'clr'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['protect_pct_customelement_groups'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['protect_pct_customelement_groups'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_groups'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_groups'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'		  => array('PCT\CustomElements\Backend\TableUserGroup','getCustomElementGroups'),
	'eval'                    => array('multiple'=>true,'tl_class'=>'clr'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_groupsp'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_groupsp'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('create', 'delete','cut'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_groupsp'],
	'eval'                    => array('multiple'=>true,'tl_class'=>'clr'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['protect_pct_customelement_attributes'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['protect_pct_customelement_attributes'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_attributes'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_attributes'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'		  => array('PCT\CustomElements\Backend\TableUserGroup','getCustomElementAttributes'),
	'eval'                    => array('multiple'=>true,'tl_class'=>'clr'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_attributesp'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_attributesp'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('create','edit','delete','cut'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_attributesp'],
	'eval'                    => array('multiple'=>true,'tl_class'=>'clr'),
	'sql'                     => "blob NULL"
);