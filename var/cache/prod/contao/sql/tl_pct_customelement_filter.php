<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'languageStrictMode' => 'char(1) NOT NULL default \'\'',
  'setLanguageText' => 'char(1) NOT NULL default \'\'',
  'languageText' => 'blob NULL',
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default \'0\'',
  'sorting' => 'int(10) unsigned NOT NULL default \'0\'',
  'tstamp' => 'int(10) unsigned NOT NULL default \'0\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'mode' => 'varchar(64) NOT NULL default \'\'',
  'type' => 'varchar(128) NOT NULL default \'\'',
  'description' => 'varchar(255) NOT NULL default \'\'',
  'template' => 'varchar(128) NOT NULL default \'\'',
  'published' => 'char(1) NOT NULL default \'\'',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'attr_id' => 'int(10) NOT NULL default \'0\'',
  'attr_ids' => 'blob NULL',
  'urlparam' => 'varchar(64) NOT NULL default \'\'',
  'isStrict' => 'char(1) NOT NULL default \'\'',
  'label' => 'varchar(255) NOT NULL default \'\'',
  'defaultValue' => 'varchar(255) NOT NULL default \'\'',
  'defaultMulti' => 'text NULL',
  'includeReset' => 'char(1) NOT NULL default \'\'',
  'module_id' => 'int(10) NOT NULL default \'0\'',
  'config_id' => 'int(10) NOT NULL default \'0\'',
  'conditional' => 'char(1) NOT NULL default \'\'',
  'conditional_filters' => 'blob NULL',
  'min_value' => 'char(10) NOT NULL default \'0\'',
  'max_value' => 'char(10) NOT NULL default \'0\'',
  'steps_value' => 'char(6) NOT NULL default \'0\'',
  'isRadio' => 'char(1) NOT NULL default \'\'',
  'customsql' => 'tinytext NULL',
  'combiner' => 'varchar(4) NOT NULL default \'\'',
  'fuzzy' => 'char(1) NOT NULL default \'\'',
  'autocomplete' => 'char(1) NOT NULL default \'\'',
  'byActivePage' => 'char(1) NOT NULL default \'1\'',
  'pages' => 'blob NULL',
  'inheritPages' => 'char(1) NOT NULL default \'\'',
  'inversePages' => 'char(1) NOT NULL default \'\'',
  'hook' => 'varchar(64) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid' => 'index',
);

$this->arrRelations = array (
  'pid' => 
  array (
    'table' => 'tl_pct_customelement_filterset',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
