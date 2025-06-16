<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		Custom html filter widget
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'customhtml';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Load language file
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile($objDcaHelper->getTable(),$strType);
\Contao\System::loadLanguageFile('tl_content');

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'defaultMulti';
$arrPalettes['settings_legend'][] = 'customsql';
$arrPalettes['settings_legend'][] = 'label';
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultMulti'] = array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_content']['html'],
		'exclude'                 => true,
		'search'                  => true,
		'inputType'               => 'textarea',
		'eval'                    => array('tl_class'=>'clr','mandatory'=>true, 'allowHtml'=>true, 'class'=>'monospace', 'rte'=>'ace|html'),
	);
}
