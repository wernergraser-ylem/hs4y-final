<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default \'0\'',
  'tstamp' => 'int(10) unsigned NOT NULL default \'0\'',
  'sorting' => 'int(10) unsigned NOT NULL default \'0\'',
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'allowCopy' => 'char(1) NOT NULL default \'\'',
  'allowCut' => 'char(1) NOT NULL default \'\'',
  'hidden' => 'char(1) NOT NULL default \'\'',
  'legend_hide' => 'char(1) NOT NULL default \'\'',
  'protected' => 'char(1) NOT NULL default \'\'',
  'user_groups' => 'blob NULL',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'published' => 'char(1) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid' => 'index',
  'tstamp' => 'index',
);

$this->arrRelations = array (
  'pid' => 
  array (
    'table' => 'tl_pct_customelement',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
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
