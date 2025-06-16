<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');

// Modify the dca on load
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onload_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute','modifyDca');
// Disable the save_callback for the alias field
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute','disableAliasGeneration');
// Enable the database update alert check
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','enableDatabaseUpdateCheck');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','enableDatabaseUpdateCheck');
// Let the quickmenu rebuild
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\Quickmenu','rebuildMenuOnPageLoad');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\Quickmenu','rebuildMenuOnPageLoad');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeFileCache');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeFileCache');


/**
 * Subpalettes
 */
$objDcaHelper->addSubpalette('isSelector',array('subpalettes'));
$objDcaHelper->addSubpalette('isToggler',array('icon','icon_off'));

/**
 * Fields
 */
$objDcaHelper->addFields(array
(
	'isSelector'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isSelector'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
		'sql'					  => "char(1) NOT NULL default ''",
	),
	'subpalettes'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['subpalettes']['attribute_mode'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'		  => array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute','getAttributesForSubpalettes'),
		'eval'                    => array('tl_class'=>'clr','multiple'=>true,'chosen'=>true),
		'sql'					  => "blob NULL",
	),
	'be_filter'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['be_filter'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'w50 clr'),
		'sql'					  => "char(1) NOT NULL default ''",
	),
	'be_search'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['be_search'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'					  => "char(1) NOT NULL default ''",
	),
	'be_sorting'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['be_sorting'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'					  => "char(1) NOT NULL default ''",
	),
	'isToggler'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isToggler'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
		'sql'					  => "char(1) NOT NULL default ''",
	),
	'icon'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['icon'],
		'exclude'                 => true,
		'inputType'               => 'fileTree',
		'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'tl_class'=>'clr w50', 'mandatory'=>true),
		'sql'                     => "binary(16) NULL",
	),
	'icon_off'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['icon_off'],
		'exclude'                 => true,
		'inputType'               => 'fileTree',
		'eval'                    => array('filesOnly'=>true, 'fieldType'=>'radio', 'tl_class'=>'w50', 'mandatory'=>true),
		'sql'                     => "binary(16) NULL",
	),
	'eval_unique'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_unique'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'w50',),
		'sql'                     => "char(1) NOT NULL default ''",
	),
));

// sanitize alias
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['alias']['save_callback'][] 	= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute','sanitizeAlias');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['published']['save_callback'][] 	= array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','purgeFileCacheOnSaveCallback');
