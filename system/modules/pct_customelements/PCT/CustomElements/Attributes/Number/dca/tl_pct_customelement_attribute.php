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
 * @attribute	AttributeNumber
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$strType = 'number';

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['title_legend'] = array('type','title','description');
$arrPalettes['settings_legend'] = array('min_value','max_value');
$arrPalettes['eval_legend'] = array('eval_mandatory','eval_rgxp','eval_minlength','eval_maxlength');
\Contao\ArrayUtil::arrayInsert($arrPalettes['expert_legend'],2,'hidden');
\Contao\ArrayUtil::arrayInsert($arrPalettes,3,array('output_legend'=>array('number_format')));
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$objDcaHelper->addFields(array
(
	'min_value' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['min_value'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'clr w50','rgxp'=>'digit'),
		'sql'                     => "char(10) NOT NULL default ''"
	),
	'max_value' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['max_value'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50','rgxp'=>'digit'),
		'sql'                     => "char(10) NOT NULL default ''"
	),
	'number_format' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['number_format'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50','size'=>3,'multiple'=>true),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
));
