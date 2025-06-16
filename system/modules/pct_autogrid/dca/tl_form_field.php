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

$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\AutoGrid\DcaHelper', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('PCT\AutoGrid\DcaHelper', 'buttonAjaxListener');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'createSiblingStopElement');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['ondelete_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'deleteSiblings');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['oncut_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'oncut_toggleAutoGrid');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['oncopy_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'oncopy_toggleAutoGrid');
#$GLOBALS['TL_DCA']['tl_form_field']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\Backend\TableFormField', 'activateAutoGridInFlexRows');


/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['__selector__'][] = 'autogrid';


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['subpalettes']['autogrid'] = 'autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_offset,autogrid_align,autogrid_class';


/**
 * Palettes
 */
// Autogrid Row
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridRowStart'] 	= '{type_legend},type;autogrid_gutter,autogrid_sameheight;{template_legend},customTpl;{expert_legend:hide},class';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridRowStop'] 		= '{type_legend},type;{template_legend:hide},customTpl;';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridColStart'] 	= '{type_legend},type,autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_align,autogrid_align_mobile;{template_legend},customTpl;{expert_legend:hide},class';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['autogridColStop'] 		= '{template_legend:hide},customTpl';


/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_form_field']['fields'],0,$GLOBALS['PCT_AUTOGRID']['autogrid_fields']);
// set the contao type selection to be a chosen field
$GLOBALS['TL_DCA']['tl_form_field']['fields']['type']['eval']['chosen'] = true;