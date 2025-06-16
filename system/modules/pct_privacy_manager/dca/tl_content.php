<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2020
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['privacy_iframe'] = '{type_legend},type,headline;privacy_url,privacy_size,privacy_level;{protected_legend:hide},protected;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID,space';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['privacy_url'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['privacy_url'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'dcaPicker'=>true, 'tl_class'=>'wizard'),
	'sql'                     => "mediumtext NULL"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['privacy_size'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['privacy_size'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'natural', 'nospace'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_content']['fields']['privacy_level'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['privacy_level'],
	'default'                 => 1,
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array(1,2,3),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "smallint(5) unsigned NOT NULL default '0'"
);