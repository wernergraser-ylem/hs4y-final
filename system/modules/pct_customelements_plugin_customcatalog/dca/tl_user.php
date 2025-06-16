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
$GLOBALS['TL_DCA']['tl_user']['config']['onload_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableUser', 'loadCustomCatalogDca');

/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['extend'] = str_replace('fop;', 'fop;{pct_customcatalog_legend},pct_customcatalogs,pct_customcatalogsp,protect_pct_customcatalog_groups,pct_customcatalog_groupsp,protect_pct_customcatalog_attributes,pct_customcatalog_attributesp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['extend']);
$GLOBALS['TL_DCA']['tl_user']['palettes']['custom'] = str_replace('fop;', 'fop;{pct_customcatalog_legend},pct_customcatalogs,pct_customcatalogsp,protect_pct_customcatalog_groups,pct_customcatalog_groupsp,protect_pct_customcatalog_attributes,pct_customcatalog_attributesp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['custom']);


/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customcatalogs'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['pct_customcatalogs'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_pct_customcatalog.title',
	'eval'                    => array('multiple'=>true,'submitOnChange'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customcatalogsp'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['pct_customcatalogsp'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('create', 'delete'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);