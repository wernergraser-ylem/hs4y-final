<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'url' => 'varchar(2048) NOT NULL default \'\'',
  'showUnpublished' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'restrictToUrl' => 
  array (
    'type' => 'boolean',
    'default' => true,
  ),
  'createdAt' => 'int(10) unsigned NOT NULL default 0',
  'expiresAt' => 'int(10) unsigned NOT NULL default 0',
  'published' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'createdBy' => 'int(10) unsigned NOT NULL default 0',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
  'id,published,expiresAt' => 'index',
);

$this->arrRelations = array (
  'createdBy' => 
  array (
    'table' => 'tl_user',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
