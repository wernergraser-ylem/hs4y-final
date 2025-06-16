<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_user']['config']['onload_callback'][] = array('PCT\FrontendQuickEdit\Backend\TableUser', 'modifyDCA');


/**
 * Palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['login'] .= ';{pct_frontend_quickedit_legend:hide},pct_frontend_quickedit';


/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_frontend_quickedit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['pct_frontend_quickedit'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);