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

use Contao\CoreBundle\ContaoCoreBundle;

/**
 * Check Permission and inject the custom catalog button
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement');

// Config
$GLOBALS['TL_DCA']['tl_pct_customelement']['config']['ctable'][] = 'tl_pct_customcatalog';

// enable the database check
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][]	= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','enableDatabaseUpdateCheck');		
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] 	= array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration','enableDatabaseUpdateCheck');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance','purgeFileCache');

$pos = array_search('children', array_keys($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations']));
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations'],$pos + 1, array
	(
		'customcatalog' => array
		(
			'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement']['editconfig'],
			'href'                => 'table=tl_pct_customcatalog',
			'icon'                => PCT_CUSTOMCATALOG_PATH.'/assets/img/icon.png',
			'button_callback'     => array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElement','customCatalogButton')
		)
	)
);