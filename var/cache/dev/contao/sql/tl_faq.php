<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default 0',
  'sorting' => 'int(10) unsigned NOT NULL default 0',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'question' => 'varchar(255) NOT NULL default \'\'',
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'author' => 'int(10) unsigned NOT NULL default 0',
  'answer' => 'text NULL',
  'pageTitle' => 'varchar(255) NOT NULL default \'\'',
  'robots' => 'varchar(32) NOT NULL default \'\'',
  'description' => 'text NULL',
  'addImage' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'overwriteMeta' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'singleSRC' => 'binary(16) NULL',
  'alt' => 'varchar(255) NOT NULL default \'\'',
  'imageTitle' => 'varchar(255) NOT NULL default \'\'',
  'size' => 'varchar(64) NOT NULL default \'\'',
  'imageUrl' => 'varchar(2048) NOT NULL default \'\'',
  'fullsize' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'caption' => 'varchar(255) NOT NULL default \'\'',
  'floating' => 'varchar(12) NOT NULL default \'above\'',
  'addEnclosure' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'enclosure' => 'blob NULL',
  'published' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'noComments' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
);

$this->arrUniqueFields = array (
  0 => 'alias',
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid,published' => 'index',
  'tstamp' => 'index',
);

$this->arrRelations = array (
  'pid' => 
  array (
    'table' => 'tl_faq_category',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
  'author' => 
  array (
    'table' => 'tl_user',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
