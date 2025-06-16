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

 
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\PrivacyManager\Backend\TableModule', 'modifyDca'); 


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['privacy_in'] = '{title_legend},name,headline,type;{privacy_1_legend},privacy_lbl_1,privacy_txt_1;{privacy_2_legend},privacy_lbl_2,privacy_txt_2;{privacy_3_legend},privacy_lbl_3,privacy_txt_3;{privacy_4_legend},privacy_lbl_4,privacy_txt_4;{config_legend},privacy_text,html,privacy_url_1,privacy_url_2,privacy_preselect,privacy_cookie_expires;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['privacy_out'] = '{title_legend},name,type;{redirect_legend},jumpTo,redirectBack;{protected_legend:hide},protected;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID,space';

/**
 * Fields
 */
$fields = array
(
	'privacy_lbl_1'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_1'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxchars'=>128),
		'sql'                     => "varchar(128) NOT NULL default ''",
	),
	'privacy_txt_1'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_1'],
		'exclude'                 => true,
		'inputType'               => 'textarea',
		'eval'                    => array('tl_class'=>'','allowHtml'=>true),
		'sql'                     => "tinytext NULL"
	),
	'privacy_lbl_2'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_2'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxchars'=>128,'tl_class'=>''),
		'sql'                     => "varchar(128) NOT NULL default ''"
	),
	'privacy_txt_2'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_2'],
		'exclude'                 => true,
		'inputType'               => 'textarea',
		'eval'                    => array('tl_class'=>'','allowHtml'=>true),
		'sql'                     => "tinytext NULL"
	),
	'privacy_lbl_3'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_3'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxchars'=>128,'tl_class'=>''),
		'sql'                     => "varchar(128) NOT NULL default ''"
	),
	'privacy_txt_3'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_3'],
		'exclude'                 => true,
		'inputType'               => 'textarea',
		'eval'                    => array('tl_class'=>'','allowHtml'=>true),
		'sql'                     => "tinytext NULL"
	),
	'privacy_lbl_4'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_4'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxchars'=>128,'tl_class'=>''),
		'sql'                     => "varchar(128) NOT NULL default ''"
	),
	'privacy_txt_4'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_4'],
		'exclude'                 => true,
		'inputType'               => 'textarea',
		'eval'                    => array('tl_class'=>'','allowHtml'=>true),
		'sql'                     => "tinytext NULL"
	),
	'privacy_url_1'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_url_1'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'fieldType'=>'radio', 'filesOnly'=>true, 'tl_class'=>'w50 wizard'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'privacy_url_2'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_url_2'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'text',
		'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true,'fieldType'=>'radio', 'filesOnly'=>true, 'tl_class'=>'w50 wizard'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'privacy_text'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_text'],
		'exclude'                 => true,
		'inputType'               => 'textarea',
		'eval'                    => array('rte'=>'tinyMCE', 'tl_class'=>'clr'),
		'sql'                     => "text NULL"
	),
	'privacy_cookie_expires'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_cookie_expires'],
		'inputType'               => 'select',
		'default'				  => 30,
		'options'				  => array(30,15,7,1),
		'eval'                    => array('maxlength'=>5),
		'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
	),
	'privacy_preselect'    => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_module']['privacy_preselect'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'options'				  => array(1,2,3,4),
		'reference'               => &$GLOBALS['TL_LANG']['tl_module']['privacy_preselect_ref'],
		'eval'                    => array('tl_class'=>'clr','multiple'=>true,'includeBlankOption'=>true),
		'sql'                     => "varchar(96) NOT NULL default ''"
	),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_module']['fields'],0,$fields);
