<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'token' => 'varchar(24) NOT NULL default \'\'',
  'createdOn' => 'int(10) unsigned NOT NULL default 0',
  'confirmedOn' => 'int(10) unsigned NOT NULL default 0',
  'removeOn' => 'int(10) unsigned NOT NULL default 0',
  'invalidatedThrough' => 'varchar(24) NOT NULL default \'\'',
  'email' => 'varchar(255) NOT NULL default \'\'',
  'emailSubject' => 'varchar(255) NOT NULL default \'\'',
  'emailText' => 'text NULL',
);

$this->arrUniqueFields = array (
  0 => 'token',
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
  'token' => 'unique',
  'removeOn' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
