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
  'type' => 'varchar(255) NOT NULL default \'\'',
  'mode' => 'varchar(255) NOT NULL default \'\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'description' => 'varchar(255) NOT NULL default \'\'',
  'source' => 'varchar(32) NOT NULL default \'\'',
  'target' => 'varchar(255) NOT NULL default \'\'',
  'tableSRC' => 'varchar(255) NOT NULL default \'\'',
  'singleSRC' => 'binary(16) NULL',
  'templateSRC' => 'varchar(128) NOT NULL default \'\'',
  'hookSRC' => 'varchar(255) NOT NULL default \'\'',
  'filenameLogic' => 'varchar(255) NOT NULL default \'\'',
  'sendToBrowser' => 'char(1) NOT NULL default \'\'',
  'path' => 'binary(16) NULL',
  'uniqueSource' => 'varchar(255) NOT NULL default \'\'',
  'uniqueTarget' => 'varchar(255) NOT NULL default \'\'',
  'allowUpdate' => 'char(1) NOT NULL default \'\'',
  'allowInsert' => 'char(1) NOT NULL default \'\'',
  'allowDelete' => 'char(1) NOT NULL default \'\'',
  'purgeTable' => 'char(1) NOT NULL default \'\'',
  'delimiter' => 'varchar(16) NOT NULL default \'\'',
  'cronjob' => 'char(1) NOT NULL default \'\'',
  'cron' => 'varchar(32) NOT NULL default \'\'',
  'backup' => 'char(1) NOT NULL default \'\'',
  'maxRange' => 'int(5) NOT NULL default \'1\'',
  'isPublished' => 'char(1) NOT NULL default \'\'',
  'published' => 'char(1) NOT NULL default \'\'',
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
