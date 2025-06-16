<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @attribute	RateIt
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$strType = 'rateit';
$objActiveRecord = $objDcaHelper->getActiveRecord();


/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_w50');
$arrPalettes = $objDcaHelper->removeField('eval_tl_class_clr');
$arrPalettes['title_legend'] = array('type','title','description','rateit_counter');
$arrPalettes['settings_legend'] = array('eval_mandatory','min_value','max_value');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( $objActiveRecord !== null && $objActiveRecord->type == $strType)
{
	// store an option value
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('\PCT\CustomElements\Attributes\RateIt\TableCustomElementAttribute','updateOptionField');

	if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable())
	{
		// Show template info
		\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['templateInfo_attribute'], 'customelement_attr_rateit'));
	}
}



/**
 * Fields
 */
$objDcaHelper->addFields(array
(
	'rateit_counter' => array
	(
		'label'			=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['rateit_counter'],
		'inputType'		=> 'text',
		'eval'			=> array('readonly'=>false,'rgxp'=>'digit'),
		'sql'			=> "int(10) NOT NULL default '0'"
	)
));