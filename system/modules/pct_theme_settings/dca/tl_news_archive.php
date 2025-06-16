<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_news_archive']['palettes']['default'] .= ';{expert_legend:hide},manualSorting;';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_news_archive']['fields']['manualSorting'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_news_archive']['manualSorting'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array(),
	'sql'					  => "char(1) NOT NULL default ''",
);