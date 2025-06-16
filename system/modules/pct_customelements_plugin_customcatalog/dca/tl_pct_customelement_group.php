<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_group
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_group');
$objActiveRecord = $objDcaHelper->getActiveRecord();


/**
 * Config
 */
// Let the quickmenu rebuild
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\Quickmenu','rebuildMenuOnPageLoad');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\Quickmenu','rebuildMenuOnPageLoad');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeFileCache');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeFileCache');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['published']['save_callback'][] 	= array('PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','purgeFileCacheOnSaveCallback');