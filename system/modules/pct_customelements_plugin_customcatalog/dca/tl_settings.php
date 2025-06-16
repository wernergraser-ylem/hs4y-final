<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_settings');

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_list_baseRecordIsFallback';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_reader_baseRecordIsFallback';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_strictMode';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_showEmptyResults';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_debug';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_bypassDCACache';
$arrPalettes['customcatalog_api_legend:hide'][] = 'customcatalog_api_stopOnCriticalErrors';
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_list_baseRecordIsFallback'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_list_baseRecordIsFallback'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_reader_baseRecordIsFallback'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_reader_baseRecordIsFallback'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_api_stopOnCriticalErrors'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_api_stopOnCriticalErrors'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_strictMode'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_strictMode'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'clr w50'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_showEmptyResults'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_showEmptyResults'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_debug'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_debug'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_bypassDCACache'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_bypassDCACache'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50'),
	'sql'			=> "char(1) NOT NULL default ''",
);