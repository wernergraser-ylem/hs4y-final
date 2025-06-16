<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'name' => 'varchar(128) NOT NULL default \'\'',
  'author' => 'varchar(128) NOT NULL default \'\'',
  'folders' => 'blob NULL',
  'screenshot' => 'binary(16) NULL',
  'templates' => 'varchar(255) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
  0 => 'name',
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
