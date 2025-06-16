<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default \'0\'',
  'sorting' => 'int(10) unsigned NOT NULL default \'0\'',
  'tstamp' => 'int(10) unsigned NOT NULL default \'0\'',
  'type' => 'varchar(128) NOT NULL default \'\'',
  'target' => 'varchar(96) NOT NULL default \'\'',
  'source' => 'varchar(96) NOT NULL default \'\'',
  'action' => 'varchar(64) NOT NULL default \'\'',
  'mode' => 'varchar(128) NOT NULL default \'\'',
  'reference' => 'varchar(96) NOT NULL default \'\'',
  'code' => 'text NULL',
  'addTitle' => 'char(1) NOT NULL default \'\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'description' => 'varchar(255) NOT NULL default \'\'',
  'attr_id' => 'char(10) NOT NULL default \'\'',
  'valueSRC' => 'varchar(255) NOT NULL default \'\'',
  'hookSRC' => 'varchar(255) NOT NULL default \'\'',
  'sqlSRC' => 'mediumtext NULL',
  'tstampSRC' => 'varchar(10) NOT NULL default \'\'',
  'multiSRC' => 'blob NULL',
  'published' => 'char(1) NOT NULL default \'\'',
  'onError' => 'varchar(32) NOT NULL default \'\'',
  'rule' => 'varchar(32) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
