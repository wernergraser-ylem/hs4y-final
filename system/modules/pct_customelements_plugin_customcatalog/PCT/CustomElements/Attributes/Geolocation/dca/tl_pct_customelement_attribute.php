<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpacke	pct_customelements_plugin_customcatalog
 * @attribute	Geolocation
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$objActiveRecord = $objDcaHelper->getActiveRecord();
$strType = 'geolocation';

/**
 * Load language files
 */
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute',$strType);

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_w50');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_clr');
$arrPalettes['settings_legend'] = array('options','size');
$arrPalettes['eval_legend'] = array('eval_mandatory');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
if( $objActiveRecord !== null && $objActiveRecord->type == $strType)
{
	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_attribute'], 'customelement_attr_googlemap'));
	}
	
	// overwrite the size field from the Image Attribute
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['size'] = array
	(
		'label' 		=> $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['size'][$strType],
		'inputType'		=> 'text',
		'eval'			=> array('size'=>2,'multiple'=>true,'mandatory'=>true),
	);
	
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType];
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['options'] = array
	(
		'coords',
		'street',
		'city',
		'zipcode',
		'country',
	);
	
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType];
}
