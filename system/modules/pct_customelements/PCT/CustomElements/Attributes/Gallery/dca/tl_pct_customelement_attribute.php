<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeGallery
 * @link		http://contao.org
 */


/**
 * Load language files
 */
$strType = 'gallery';
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute',$strType);
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute','image');

if( !isset($GLOBALS['loadDataContainer']['tl_content']) )
{
	// load datacontainer
	\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
}


/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_w50');
$arrPalettes['settings_legend'] = array('options','size','sortBy','galleryTpl','eval_filesOnly','eval_extensions','eval_path');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
if( $objActiveRecord !== null && $objActiveRecord->type == $strType)
{
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['options'] = array
	(
		'size',
		'imagemargin',
		'perRow',
		'fullsize',
		'perPage',
		'numberOfItems'
	);
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$strType]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType];
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_filesOnly']['eval']['tl_class'] .= ' m12';
	$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_path']['eval']['tl_class'] .= ' m12';
}

$objDcaHelper->addFields(array
(
	'sortBy' => array
	(
		'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['sortBy'],
		'exclude'		=> true,
		'inputType'		=> 'select',
		'options'		=> array('custom', 'name_asc', 'name_desc', 'date_asc', 'date_desc', 'random'),
		'reference'		=> &$GLOBALS['TL_LANG']['tl_content'],
		'eval'			=> array('tl_class'=>'clr'),
		'sql'			=> "varchar(32) NOT NULL default ''"
	),
	'galleryTpl' => $GLOBALS['TL_DCA']['tl_content']['fields']['galleryTpl'],
));