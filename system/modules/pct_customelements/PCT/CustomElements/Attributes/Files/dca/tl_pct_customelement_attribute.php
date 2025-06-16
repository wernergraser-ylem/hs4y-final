<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package  	pct_customelements
 * @subpackage 	AttributeFiles
 * @link  		http://contao.org
 */

/**
 * Load language file
 */
\PCT\CustomElements\Helper\ControllerHelper::loadLanguageFile('tl_content');

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');


/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['config']['onload_callback'][] = array('PCT\CustomElements\Attributes\Files\TableCustomElementAttribute', 'modifyPalette');


/**
 * Palettes
 */
$type = 'files';
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('options','sortBy');
$arrPalettes['eval_legend'] = array('eval_mandatory','eval_multiple','eval_files','eval_filesOnly','eval_extensions','eval_path','isDownload','inline');
$arrPalettes['be_setting_legend'] = array('eval_tl_class_w50','eval_tl_class_m12','eval_tl_class_clr','be_visible');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$type] = $objDcaHelper->generatePalettes($arrPalettes);

$objActiveRecord = $objDcaHelper->getActiveRecord();
if( $objActiveRecord !== null )
{
	if($objActiveRecord->type == $type)
	{
		$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['options'] = array
		(
			'linkTitle',
			'titleText',
		);
		$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['options'][$type]['reference'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$type];
	}
}
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['eval_extensions']['eval']['tl_class'] = 'w50 clr m12';

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['isDownload'] = array
(
	'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isDownload'],
	'exclude'		=> true,
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'clr'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['inline'] = array
(
	'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['inline'],
	'exclude'		=> true,
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'clr'),
	'sql'			=> "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['sortBy'] = array
(
	'label'  		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['sortBy'],
	'exclude'		=> true,
	'inputType'		=> 'select',
	'options'		=> array('custom', 'name_asc', 'name_desc', 'date_asc', 'date_desc', 'random'),
	'reference'		=> &$GLOBALS['TL_LANG']['tl_content'],
	'eval'			=> array('tl_class'=>'clr'),
	'sql'			=> "varchar(32) NOT NULL default ''"
);
