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
 * @filter		Text filter
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'text';
$objActiveRecord = $objDcaHelper->getActiveRecord();


/**
 * Load language file
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile($objDcaHelper->getTable(),$strType);

/**
 * Selectors
 */
$objDcaHelper->addSelector('mode');

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'][] = 'attr_ids';
$arrPalettes['settings_legend'][] = 'customsql'; 
$arrPalettes['settings_legend'][] = 'label';
$arrPalettes['settings_legend'][] = 'mode';
$arrPalettes['settings_legend'][] = 'defaultValue';
$arrPalettes['settings_legend'][] = 'autocomplete';
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Subpalettes
 */
$objDcaHelper->addSubpalette('mode_keyword',array('fuzzy'));
$objDcaHelper->addSubpalette('autocomplete',array('module_id'));

/**
 * Fields
 */
if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['attr_ids']['eval']['tl_class'] = 'clr';
	
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['label'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['search_mode'];
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['inputType'] = 'select';
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['options'] = array('keyword');
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['reference'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['search_mode'];
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['eval'] = array('tl_class'=>'clr','chosen'=>true,'submitOnChange'=>true);

	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['module_id']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_filter'][$strType]['module_id'];
	
	// customsql field used for addition optional fields
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['customsql']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_filter'][$strType]['customsql'];
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['customsql']['inputType'] = 'text';
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['customsql']['eval']['mandatory'] = false;
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['customsql']['eval']['tl_class'] = 'long clr';
	
	// show template hint
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable() && $objDcaHelper->getActiveRecord()->autocomplete > 0)
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_text_autocomplete'));
	}
	
}

$objDcaHelper->addFields(
	array
	(
		'fuzzy' => array
		(
			'label'    				=> &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['fuzzy'],
			'exclude'  				=> true,
			'inputType'				=> 'checkbox',
			'eval'     				=> array('tl_class'=>'w50 clr'),
			'sql'      				=> "char(1) NOT NULL default ''",
		),
		'autocomplete' => array
		(
			'label'    				=> &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['autocomplete'],
			'exclude'  				=> true,
			'inputType'				=> 'checkbox',
			'eval'     				=> array('tl_class'=>'clr','submitOnChange'=>true),
			'sql'      				=> "char(1) NOT NULL default ''",
		),
	)
);