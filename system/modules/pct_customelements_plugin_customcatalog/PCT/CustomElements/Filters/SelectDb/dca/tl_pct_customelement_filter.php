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
 * @filter		SelectDb filter
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'selectdb';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'attr_id'; 
$arrPalettes['settings_legend'][] = 'label';
$arrPalettes['settings_legend'][] = 'includeReset';
$arrPalettes['settings_legend'][] = 'isRadio';
\Contao\ArrayUtil::arrayInsert( $arrPalettes, 3, array('conditions_legend' => array('conditional')) );
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType )
{
	if(\Contao\Input::get('act') == 'edit')
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_select'));
	}
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['template']['default'] = 'customcatalog_filter_select';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['attr_id']['options_values'] = array('selectdb');
}