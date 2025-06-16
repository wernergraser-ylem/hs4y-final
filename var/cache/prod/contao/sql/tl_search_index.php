<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'pid' => 'int(10) unsigned NOT NULL',
  'termId' => 'int(10) unsigned NOT NULL',
  'relevance' => 'smallint(5) unsigned NOT NULL',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'termId,pid' => 'primary',
  'pid' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
