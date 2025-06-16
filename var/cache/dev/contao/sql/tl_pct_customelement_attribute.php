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
  'uuid' => 'varchar(16) NOT NULL default \'\'',
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'type' => 'varchar(32) NOT NULL default \'\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'description' => 'varchar(255) NOT NULL default \'\'',
  'template' => 'varchar(64) NOT NULL default \'\'',
  'protected' => 'char(1) NOT NULL default \'\'',
  'user_groups' => 'blob NULL',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'published' => 'char(1) NOT NULL default \'\'',
  'options' => 'blob NULL',
  'hidden' => 'char(1) NOT NULL default \'\'',
  'defaultValue' => 'mediumtext NULL',
  'size' => 'varchar(128) COLLATE ascii_bin NOT NULL default \'\'',
  'eval_mandatory' => 'char(1) NOT NULL default \'\'',
  'eval_rgxp' => 'varchar(16) NOT NULL default \'\'',
  'eval_rowscols' => 'varchar(255) NOT NULL default \'\'',
  'eval_multiple' => 'char(1) NOT NULL default \'\'',
  'eval_size' => 'char(3) NOT NULL default \'\'',
  'eval_rte' => 'char(1) NOT NULL default \'\'',
  'eval_submitOnChange' => 'char(1) NOT NULL default \'\'',
  'eval_allowHtml' => 'char(1) NOT NULL default \'\'',
  'eval_files' => 'char(1) NOT NULL default \'\'',
  'eval_filesOnly' => 'char(1) NOT NULL default \'\'',
  'eval_extensions' => 'varchar(255) NOT NULL default \'\'',
  'eval_path' => 'binary(16) NULL',
  'eval_attributeType' => 'varchar(16) NOT NULL default \'\'',
  'eval_includeBlankOption' => 'char(1) NOT NULL default \'\'',
  'eval_datepicker' => 'char(1) NOT NULL default \'\'',
  'eval_pagepicker' => 'char(1) NOT NULL default \'\'',
  'eval_tl_style' => 'varchar(255) NOT NULL default \'\'',
  'eval_minlength' => 'int(10) NOT NULL default \'0\'',
  'eval_maxlength' => 'int(10) NOT NULL default \'0\'',
  'eval_tl_class_w50' => 'char(1) NOT NULL default \'\'',
  'eval_tl_class_clr' => 'char(1) NOT NULL default \'\'',
  'eval_tl_class_m12' => 'char(1) NOT NULL default \'\'',
  'eval_tl_class_long' => 'char(1) NOT NULL default \'\'',
  'be_visible' => 'char(1) NOT NULL default \'\'',
  'isDownload' => 'char(1) NOT NULL default \'\'',
  'inline' => 'char(1) NOT NULL default \'\'',
  'sortBy' => 'varchar(32) NOT NULL default \'\'',
  'tinyTpl' => 'varchar(64) NOT NULL default \'\'',
  'isRadio' => 'char(1) NOT NULL default \'\'',
  'include_type' => 'varchar(32) NOT NULL default \'\'',
  'include_item' => 'int(10) unsigned NOT NULL default \'0\'',
  'date_format' => 'varchar(255) NOT NULL default \'\'',
  'date_rgxp' => 'varchar(8) NOT NULL default \'\'',
  'min_value' => 'char(10) NOT NULL default \'\'',
  'max_value' => 'char(10) NOT NULL default \'\'',
  'number_format' => 'varchar(255) NOT NULL default \'\'',
  'galleryTpl' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'aliasSource' => 'int(10) NOT NULL default \'0\'',
  'selectdb_table' => 'varchar(255) NOT NULL default \'\'',
  'selectdb_key' => 'varchar(128) NOT NULL default \'\'',
  'selectdb_value' => 'varchar(128) NOT NULL default \'\'',
  'selectdb_sorting' => 'varchar(128) NOT NULL default \'\'',
  'selectdb_translations' => 'varchar(128) NOT NULL default \'\'',
  'selectdb_where' => 'varchar(255) NOT NULL default \'\'',
  'rateit_counter' => 'int(10) NOT NULL default \'0\'',
  'isSelector' => 'char(1) NOT NULL default \'\'',
  'subpalettes' => 'blob NULL',
  'be_filter' => 'char(1) NOT NULL default \'\'',
  'be_search' => 'char(1) NOT NULL default \'\'',
  'be_sorting' => 'char(1) NOT NULL default \'\'',
  'isToggler' => 'char(1) NOT NULL default \'\'',
  'icon' => 'binary(16) NULL',
  'icon_off' => 'binary(16) NULL',
  'eval_unique' => 'char(1) NOT NULL default \'\'',
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
    'table' => 'tl_pct_customelement_group',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
  'user_groups' => 
  array (
    'table' => 'tl_user_group',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
