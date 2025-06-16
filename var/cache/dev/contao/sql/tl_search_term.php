<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'term' => 'varchar(64) BINARY NOT NULL',
  'documentFrequency' => 'int(10) unsigned NOT NULL',
);

$this->arrUniqueFields = array (
  0 => 'term',
);

$this->arrKeys = array (
  'id' => 'primary',
  'term' => 'unique',
  'documentFrequency' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
