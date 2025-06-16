<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default 0',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'version' => 'smallint(5) unsigned NOT NULL default 1',
  'fromTable' => 'varchar(255) NOT NULL default \'\'',
  'userid' => 'int(10) unsigned NOT NULL default 0',
  'username' => 'varchar(64) NULL',
  'description' => 'varchar(255) NOT NULL default \'\'',
  'editUrl' => 'text NULL',
  'active' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'data' => 'mediumblob NULL',
);

$this->arrUniqueFields = array (
  0 => 'pid,fromTable,version',
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid,fromTable,version' => 'unique',
  'tstamp' => 'index',
  'userid' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
