<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'headline' => 'varchar(255) NOT NULL default \'\'',
  'jumpTo' => 'int(10) unsigned NOT NULL default 0',
  'allowComments' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'notify' => 'varchar(32) NOT NULL default \'notify_admin\'',
  'sortOrder' => 'varchar(32) NOT NULL default \'ascending\'',
  'perPage' => 'smallint(5) unsigned NOT NULL default 0',
  'moderate' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'bbcode' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'requireLogin' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'disableCaptcha' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
  'jumpTo' => 'index',
);

$this->arrRelations = array (
  'jumpTo' => 
  array (
    'table' => 'tl_page',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
