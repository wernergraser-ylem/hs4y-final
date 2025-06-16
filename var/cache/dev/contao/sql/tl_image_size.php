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
  'name' => 'varchar(64) NULL',
  'imageQuality' => 'int(10) NULL',
  'cssClass' => 'varchar(255) NOT NULL default \'\'',
  'densities' => 'varchar(255) NOT NULL default \'\'',
  'sizes' => 'varchar(255) NOT NULL default \'\'',
  'width' => 'int(10) NULL',
  'height' => 'int(10) NULL',
  'resizeMode' => 'varchar(255) NOT NULL default \'\'',
  'zoom' => 'int(10) NULL',
  'formats' => 'varchar(1024) NOT NULL default \'\'',
  'preserveMetadata' => 'varchar(12) NOT NULL default \'default\'',
  'preserveMetadataFields' => 'blob NULL',
  'skipIfDimensionsMatch' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'lazyLoading' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
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
    'table' => 'tl_theme',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
