<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */
 
use Contao\DC_Table;

/**
 * Table tl_pct_customcatalog_language
 */
$GLOBALS['TL_DCA']['tl_pct_customcatalog_language'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'               => DC_Table::class,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'index',
				'pid' => 'index',
			)
		)
	),
	// Fields
	'fields' => array
	(
		'id' => array
		(
			'eval'					  => array('doNotCopy'=>true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
		),
		'pid' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
		),
		'tstamp' => array
		(
			'eval'					  => array('doNotCopy'=>true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
		),
		'source' => array
		(
			'sql'                     => "varchar(128) NOT NULL default ''",
		),
		'lang' => array
		(
			'sql'                     => "varchar(8) NOT NULL default ''",
		), 		
	)
);