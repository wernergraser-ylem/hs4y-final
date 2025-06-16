<?php

namespace {
/**
 * Table tl_pct_customcatalog_language
 */
$GLOBALS['TL_DCA']['tl_pct_customcatalog_language'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'sql' => array('keys' => array('id' => 'index', 'pid' => 'index'))),
    // Fields
    'fields' => array('id' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default '0'"), 'pid' => array('sql' => "int(10) unsigned NOT NULL default '0'"), 'tstamp' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default '0'"), 'source' => array('sql' => "varchar(128) NOT NULL default ''"), 'lang' => array('sql' => "varchar(8) NOT NULL default ''")),
);
}
