<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		QueryWrapper
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strTypeStart = 'wrapperStart';
$strTypeStop = 'wrapperStop';

/**
 * Palettes
 */
$arrPalettes['title_legend'] = array('type','title','be_description','description');
$arrPalettes['expert_legend'] = 'published';
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strTypeStart] = $objDcaHelper->generatePalettes($arrPalettes);
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strTypeStop] = $objDcaHelper->generatePalettes($arrPalettes);