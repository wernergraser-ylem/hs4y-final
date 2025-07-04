<?php

namespace {
/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */
$GLOBALS['TL_DCA']['tl_version'] = array(
    // Config
    'config' => array('sql' => array('keys' => array('id' => 'primary', 'pid,fromTable,version' => 'unique', 'tstamp' => 'index', 'userid' => 'index'))),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'version' => array('sql' => "smallint(5) unsigned NOT NULL default 1"), 'fromTable' => array('sql' => "varchar(255) NOT NULL default ''"), 'userid' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'username' => array('sql' => "varchar(64) NULL"), 'description' => array('sql' => "varchar(255) NOT NULL default ''"), 'editUrl' => array('sql' => "text NULL"), 'active' => array('sql' => array('type' => 'boolean', 'default' => \false)), 'data' => array('sql' => "mediumblob NULL")),
);
}
