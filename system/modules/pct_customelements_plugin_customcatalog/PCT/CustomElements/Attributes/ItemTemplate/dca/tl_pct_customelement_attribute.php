<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_cusotmelements_plugin_customcatalog
 * @attribute	ItemTemplate
 * @link		http://contao.org
 */


/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$objActiveRecord = $objDcaHelper->getActiveRecord();

$strType = 'itemtemplate';

/**
 * Load language file
 */
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile($objDcaHelper->getTable(),$strType);

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removeField('template');
$arrPalettes['settings_legend'] = array('defaultValue');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType )
{
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['label'] = $GLOBALS['TL_LANG'][$objDcaHelper->getTable()]['custom_template_groups'];
}