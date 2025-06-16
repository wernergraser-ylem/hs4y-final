<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeCheckbox
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$strType = 'checkbox';
$objActiveRecord = $objDcaHelper->getActiveRecord();

	
/**
 * Load language files
 */
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute',$strType);


/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('defaultValue','eval_mandatory');
$arrPalettes['be_setting_legend'] = array('eval_tl_class_w50','eval_tl_class_clr','eval_tl_class_m12','be_visible');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
if( $objActiveRecord !== null && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue'] = array
	(
		'label'		=> $GLOBALS['TL_LANG'][$objDcaHelper->getTable()]['defaultValue'][$strType],
		'inputType'	=> 'select',
		'exclude'	=> true,
		'options'	=> array(1),
		'eval'		=> array('includeBlankOption'=>true),
		'reference'	=> $GLOBALS['TL_LANG'][$objDcaHelper->getTable()]['defaultValue'][$strType]['ref'],
	);
}
