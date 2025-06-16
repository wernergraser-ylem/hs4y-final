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
 * @filter		Range filter
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'range';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Load language file
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile($objDcaHelper->getTable(),$strType);


/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'attr_id';
$arrPalettes['settings_legend'][] = 'label';
$arrPalettes['settings_legend'][] = 'min_value';
$arrPalettes['settings_legend'][] = 'max_value';
$arrPalettes['settings_legend'][] = 'steps_value';
$arrPalettes['settings_legend'][] = 'mode';
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_range'));
	}
	
	// set the template selection default value
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['template']['default'] = 'customcatalog_filter_range';
	
	// set attribute selection to number attributes only
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['attr_id']['options_values'] = array('number','text','timestamp');

	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['label'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['range_mode'];
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['inputType'] = 'select';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['options'] = array('ht','hte','lt','lte','equal','between');
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['reference'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['range_mode'];
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['eval'] = array('tl_class'=>'clr','chosen'=>true);	
}