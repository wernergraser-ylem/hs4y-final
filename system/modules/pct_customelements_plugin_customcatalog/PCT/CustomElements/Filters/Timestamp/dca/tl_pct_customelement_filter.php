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
 * @filter		Timestamp filter
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'timestamp';
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
#$arrPalettes['settings_legend'][] = 'isRadio';
$arrPalettes['settings_legend'][] = 'defaultValue';
$arrPalettes['settings_legend'][] = 'mode';
$arrPalettes['settings_legend'][] = 'includeReset';
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_datepicker'));
	}
	
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['template']['default'] = 'customcatalog_filter_datepicker';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['attr_id']['options_values'] = array('timestamp','text');
	// override the defaultValue field to use it as a datepicker
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['defaultValue']['eval'] = array('datepicker'=>true, 'tl_class'=>'w50 clr wizard');

	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['label'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['timestamp_mode'];
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['inputType'] = 'select';
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['options'] = array('ht','hte','lt','lte');
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['reference'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['timestamp_mode'];
	$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['mode']['eval'] = array('tl_class'=>'clr','chosen'=>true);	
}
