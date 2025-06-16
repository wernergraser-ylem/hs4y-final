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
 * @filter		Select filter
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'combiner';

/**
 * Palettes
 */
$arrPalettes['title_legend'] = array('type','be_description','description');
$arrPalettes['settings_legend'] = 'combiner';
$arrPalettes['expert_legend'] = 'published';
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['fields']['combiner'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['combiner'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array('and','or'),
	'reference'				  => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['combiner'],
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'                     => "varchar(4) NOT NULL default ''",
);