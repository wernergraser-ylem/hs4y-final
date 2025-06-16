<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default \'0\'',
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'isCTE' => 'char(1) NOT NULL default \'\'',
  'isFMD' => 'char(1) NOT NULL default \'\'',
  'isWrapper' => 'varchar(8) NOT NULL default \'\'',
  'template' => 'varchar(64) NOT NULL default \'\'',
  'protected' => 'char(1) NOT NULL default \'\'',
  'user_groups' => 'blob NULL',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
  0 => 'alias',
);

$this->arrKeys = array (
  'id' => 'primary',
  'alias' => 'index',
);

$this->arrRelations = array (
  'user_groups' => 
  array (
    'table' => 'tl_user_group',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
