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
 * @filter		LanguageSwitch
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'languageSwitch';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Selectors
 */
$objDcaHelper->addSelector('setLanguageText');

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('label','defaultValue','languageStrictMode','setLanguageText'); 
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_filter'], 'customcatalog_filter_select'));
	}
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['template']['default'] = 'customcatalog_filter_select';

	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['label'] = &$GLOBALS['TL_LANG'][$objDcaHelper->getTable()]['defaultValue'][$strType];
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['inputType'] = 'select';
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['eval'] = array('tl_class'=>'clr','includeBlankOption'=>true);
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['options_callback'] = array('PCT\CustomElements\Filters\LanguageSwitch\TableFilter','getCustomCatalogLanguages');
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['reference'] = &$GLOBALS['TL_LANG'][$objDcaHelper->getTable()]['defaultValue'][$strType];
}


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['subpalettes']['setLanguageText'] = 'languageText';


/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields'],0,array
(
	'languageStrictMode' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['languageStrictMode'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'					  => array('tl_class'=>'clr'),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'setLanguageText' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['setLanguageText'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'					  => array('submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'languageText' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['languageText'],
		'exclude'                 => true,
		'inputType'               => 'optionWizard',
		'eval'					  => array('allowHtml'=>true),
		'sql'                     => "blob NULL"
	),
));