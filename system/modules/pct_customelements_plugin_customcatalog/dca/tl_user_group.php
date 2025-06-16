<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_user_group']['config']['onload_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableUserGroup', 'loadCustomCatalogDca');


/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['default'] = str_replace('fop;', 'fop;{pct_customcatalog_legend},pct_customcatalogs,pct_customcatalogsp;', $GLOBALS['TL_DCA']['tl_user_group']['palettes']['default']);

/**
 * Add fields to tl_user_group
 */
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customcatalogs'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customcatalogs'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_pct_customcatalog.title',
	'eval'                    => array('multiple'=>true,'submitOnChange'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customcatalogsp'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customcatalogsp'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('create', 'delete'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);
