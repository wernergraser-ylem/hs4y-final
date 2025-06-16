<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	SimpleColumn
 * @link		http://contao.org
 */
 
/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$objActiveRecord = $objDcaHelper->getActiveRecord();
$strType = 'fixedColumn';

/**
 * Load language files
 */
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute',$strType);

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removeField('cssID');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_w50');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_clr');
$arrPalettes['settings_legend'] = array('defaultValue','options','eval_rowscols','eval_tl_style');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( $objActiveRecord !== null && $objActiveRecord->type == $strType )
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['defaultValue']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['defaultValue'][$strType];
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType];
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['options'] = array('oncreate','onsubmit');
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType];
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options']['eval']['mandatory'] = true;
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_rowscols'] = array
	(
		'label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_rowscols'],
		'inputType' => 'radio',
		'options' => array("char(1) NOT NULL default ''","text NULL","blob NULL"),
		'eval' => array('includeBlankOption' => true),	
	);
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_tl_style']['eval']['tl_class'] .= ' clr';
}