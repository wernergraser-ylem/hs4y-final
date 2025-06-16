<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_autogrid');
\Contao\System::loadLanguageFile('default');

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'selfCheckReferences');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\DcaHelper', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'showInfoInGridPresets');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'observeClipboard');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'toggleBlockAjaxListener');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'createFlexFromPreset');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'toggleAutogridViewport');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'toggleAutoGridFieldValue');

#$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\DcaHelper', 'setReadOnlyFieldValues');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\DcaHelper', 'buttonAjaxListener');
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'],0,array( array('PCT\AutoGrid\DcaHelper', 'deleteBlockListener') ) );
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'createSiblingStopElement');
$GLOBALS['TL_DCA']['tl_content']['config']['ondelete_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'deleteSiblings');
$GLOBALS['TL_DCA']['tl_content']['config']['oncopy_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'storeNewElements');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'updateNewElements');
$GLOBALS['TL_DCA']['tl_content']['config']['oncut_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'oncut_toggleAutoGrid');
$GLOBALS['TL_DCA']['tl_content']['config']['oncopy_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'oncopy_toggleAutoGrid');
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'activateAutoGridInFlexRows');

if( (boolean)\Contao\Config::get('pct_autogrid_disable_be_preview') === false )
{
	$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableContent', 'adjustLimit');
	$GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback'] = array('PCT\AutoGrid\Backend\TableContent', 'listRecord');
}

/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid_bg_type';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid_addStyling';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['autogrid'] = 'autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_offset,autogrid_align,autogrid_class,autogrid_addStyling';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['autogrid_addStyling'] = 'utogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding';

/**
 * Palettes
 */
// selectors
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid_sticky';
// subpalettes
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['autogrid_sticky'] = 'autogrid_sticky_offset';


 // Autogrid Col (Columns)
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart'] 	= '{type_legend},type,autogrid_align,autogrid_align_mobile,autogrid_sticky;{autogrid_bg_legend:hide},autogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridRowStart'] 	= '{type_legend},type,autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_align,autogrid_align_mobile,autogrid_sticky;{autogrid_bg_legend:hide},autogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridGridStart'] 	= 'autogrid_align,autogrid_align_mobile,autogrid_sticky;{autogrid_bg_legend:hide},autogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStop'] 	= '{template_legend:hide},customTpl';
// Autogrid Row
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridRowStart'] 	= '{type_legend},type,autogrid_gutter,autogrid_sameheight;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridRowStop'] 	= '{template_legend:hide},customTpl';
// Autogrid Grid
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridGridStart'] 	= '{type_legend},autogrid_css,autogrid_tablet,autogrid_mobile;autogrid_offset,autogrid_gutter,autogrid_sameheight;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridGridStop'] 	= '{template_legend:hide},customTpl';

	
/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'],0,$GLOBALS['PCT_AUTOGRID']['fields']);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'],0,$GLOBALS['PCT_AUTOGRID']['autogrid_fields']);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'],0,array
(
	// grid preset 
	'autogrid_grid' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_grid'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper','getGridPresets'),
		'reference'               => &$GLOBALS['TL_LANG']['autogrid_grid'],
		'eval'                    => array('tl_class'=>'clr','includeBlankOption'=>true,'chosen'=>true,'submitOnChange'=>true,'mandatory'=>true),
		'sql'                     => "varchar(128) NOT NULL default ''"
	),
	// background
	'autogrid_bgcolor'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['bgcolor'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('maxlength'=>6, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true, 'decodeEntities'=>true, 'tl_class'=>'w50 wizard'),
		'sql'                     => "varchar(64) NOT NULL default ''"
	),
	'autogrid_bgimage'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['bgimage'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50 wizard'),
		'eval'                    => array('filesOnly'=>true, 'extensions'=>\Contao\Config::get('validImageTypes'), 'fieldType'=>'radio','dcaPicker'=> array('do'=>'files', 'context'=>'file', 'icon'=>'pickfile.svg', 'fieldType'=>'radio', 'filesOnly'=>true, 'extensions'=>\Contao\Config::get('validImageTypes')), 'tl_class'=>'w50 wizard'),
		'save_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','saveUuidFromPath'),
		),
		'load_callback'			  => array
		(
			array('PCT\AutoGrid\DcaHelper','loadPathFromUuid'),
		),
		'sql'                     => "varchar(255) NOT NULL default ''",
	),
	'autogrid_bgposition'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['bgposition'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => array('left top', 'left center', 'left bottom', 'center top', 'center center', 'center bottom', 'right top', 'right center', 'right bottom'),
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'autogrid_bgrepeat' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['bgrepeat'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options'                 => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'),
		'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
		'sql'                     => "varchar(32) NOT NULL default ''"
	),
	'autogrid_bgsize' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_bgsize'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(16) NOT NULL default ''"
	),
	'autogrid_padding' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_padding'],
		'exclude'                 => true,
		'inputType'               => 'trbl',
		'options'                 => array('px', '%', 'em', 'rem'),
		'eval'                    => array('includeBlankOption'=>true, 'rgxp'=>'digit_', 'tl_class'=>'w50'),
		'sql'                     => "varchar(128) NOT NULL default ''"
	),
	'autogrid_padding_css'	=> array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_padding_css'],
		'exclude'                 => true,
		'inputType'               => 'select',
		'options_callback'        => array('PCT\AutoGrid\DcaHelper', 'getPaddingClasses'),
		'reference'               => &$GLOBALS['TL_LANG']['dca_autogrid']['values'],
		'eval'                    => array('includeBlankOption'=>true,'tl_class' => 'w50'),
		'sql'					  => "varchar(8) NOT NULL default ''",
	),
	'autogrid_styles' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_styles'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(255) NOT NULL default ''"
	),
	'autogrid_addStyling' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_addStyling'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'autogrid_sticky' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_sticky'],
		'exclude'                 => true,
		'inputType'               => 'checkbox',
		'eval'                    => array('tl_class'=>'clr w50','submitOnChange'=>true),
		'sql'                     => "char(1) NOT NULL default ''"
	),
	'autogrid_sticky_offset' => array
	(
		'label'                   => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_sticky_offset'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>'w50'),
		'sql'                     => "varchar(8) NOT NULL default ''"
	),
));
