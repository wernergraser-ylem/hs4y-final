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
$strType = 'simpleColumn';


/**
 * Load language files
 */
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute',$strType);

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removePalette('be_setting_legend');
$arrPalettes = $objDcaHelper->removeField('cssID');
$arrPalettes['settings_legend'] = array('defaultValue');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);