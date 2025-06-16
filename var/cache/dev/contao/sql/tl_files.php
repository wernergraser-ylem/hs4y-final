<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'binary(16) NULL',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'uuid' => 'binary(16) NULL',
  'type' => 'varchar(16) NOT NULL default \'\'',
  'path' => 'varchar(1022) BINARY NOT NULL default \'\'',
  'extension' => 'varchar(16) BINARY NOT NULL default \'\'',
  'hash' => 'varchar(32) NOT NULL default \'\'',
  'lastModified' => 'int(13) unsigned NULL default NULL',
  'found' => 
  array (
    'type' => 'boolean',
    'default' => true,
  ),
  'name' => 'varchar(255) BINARY NOT NULL default \'\'',
  'importantPartX' => 'DOUBLE unsigned NOT NULL default 0',
  'importantPartY' => 'DOUBLE unsigned NOT NULL default 0',
  'importantPartWidth' => 'DOUBLE unsigned NOT NULL default 0',
  'importantPartHeight' => 'DOUBLE unsigned NOT NULL default 0',
  'meta' => 'blob NULL',
);

$this->arrUniqueFields = array (
  0 => 'path',
  1 => 'uuid',
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid' => 'index',
  'tstamp' => 'index',
  'uuid' => 'unique',
  'path' => 'index',
  'extension' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
