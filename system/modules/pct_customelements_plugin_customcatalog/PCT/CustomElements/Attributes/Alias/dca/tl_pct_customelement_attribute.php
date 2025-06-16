<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeAlias
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$strType = 'alias';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['title_legend'] = array('type','be_description','title','description');
$arrPalettes['settings_legend'] = array('aliasSource','eval_mandatory','number_format');
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

/**
 * Fields
 */
/**
 * Fields
 */
if( $objActiveRecord !== null )
{
	if($objActiveRecord->type == $strType)
	{
		if(\Contao\Input::get('act') == 'edit' && \Contao\Input::get('table') == $objDcaHelper->getTable() )
		{
			$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['number_format'] = array
			(
				'label' 		=> &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['number_format'][$strType],
				'inputType'		=> 'text',
				'eval'			=> array('placeholder'=>'{{myField1}}_{{myField2}}'),
			);
		}
	}
}


$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields']['aliasSource'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['aliasSource'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'		  => array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableCustomElementAttribute','getAttributes'),
	'options_values'		  => array('text'),
	'eval'                    => array('tl_class'=>'w50','chosen'=>true,'mandatory'=>true),
	'sql'                     => "int(10) NOT NULL default '0'"
);