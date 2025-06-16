<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'source' => 'varchar(32) NOT NULL default \'\'',
  'parent' => 'int(10) unsigned NOT NULL default 0',
  'date' => 'varchar(64) NOT NULL default \'\'',
  'name' => 'varchar(64) NOT NULL default \'\'',
  'email' => 'varchar(255) NOT NULL default \'\'',
  'website' => 'varchar(128) NOT NULL default \'\'',
  'member' => 'int(10) unsigned NOT NULL default 0',
  'comment' => 'text NULL',
  'addReply' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'author' => 'int(10) unsigned NOT NULL default 0',
  'reply' => 'text NULL',
  'published' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'ip' => 'varchar(64) NOT NULL default \'\'',
  'notified' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'notifiedReply' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'published' => 'index',
  'source,parent,published' => 'index',
);

$this->arrRelations = array (
  'member' => 
  array (
    'table' => 'tl_member',
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
