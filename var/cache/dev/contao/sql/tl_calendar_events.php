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
  'title' => 'varchar(255) NOT NULL default \'\'',
  'featured' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'author' => 'int(10) unsigned NOT NULL default 0',
  'addTime' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'startTime' => 'bigint(20) NULL',
  'endTime' => 'bigint(20) NULL',
  'startDate' => 'bigint(20) NULL',
  'endDate' => 'bigint(20) NULL',
  'pageTitle' => 'varchar(255) NOT NULL default \'\'',
  'robots' => 'varchar(32) NOT NULL default \'\'',
  'description' => 'text NULL',
  'canonicalLink' => 'varchar(2048) NOT NULL default \'\'',
  'location' => 'varchar(255) NOT NULL default \'\'',
  'address' => 'varchar(255) NOT NULL default \'\'',
  'teaser' => 'text NULL',
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
  'floating' => 'varchar(32) NOT NULL default \'above\'',
  'recurring' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'repeatEach' => 'varchar(64) NOT NULL default \'\'',
  'repeatEnd' => 'int(10) unsigned NOT NULL default 0',
  'recurrences' => 'smallint(5) unsigned NOT NULL default 0',
  'addEnclosure' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'enclosure' => 'blob NULL',
  'source' => 'varchar(32) NOT NULL default \'default\'',
  'linkText' => 'varchar(255) NOT NULL default \'\'',
  'jumpTo' => 'int(10) unsigned NOT NULL default 0',
  'articleId' => 'int(10) unsigned NOT NULL default 0',
  'url' => 'varchar(2048) NOT NULL default \'\'',
  'target' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'cssClass' => 'varchar(255) NOT NULL default \'\'',
  'published' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'start' => 'varchar(10) NOT NULL default \'\'',
  'stop' => 'varchar(10) NOT NULL default \'\'',
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
  'tstamp' => 'index',
  'alias' => 'index',
  'pid,published,featured,start,stop' => 'index',
);

$this->arrRelations = array (
  'pid' => 
  array (
    'table' => 'tl_calendar',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
  'author' => 
  array (
    'table' => 'tl_user',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'jumpTo' => 
  array (
    'table' => 'tl_page',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
  'articleId' => 
  array (
    'table' => 'tl_article',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
