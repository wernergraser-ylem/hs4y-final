<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_megamenu
 * @link		http://contao.org
 */

 
/**
 * Config
 */
#$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\PrivacyManager\Backend\TableModule', 'modifyDca'); 


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['pct_megamenu'] = '{title_legend},name,headline,type;{reference_legend:hide},defineRoot;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';
