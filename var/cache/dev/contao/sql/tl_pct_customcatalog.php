<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default \'0\'',
  'tstamp' => 'int(10) unsigned NOT NULL default \'0\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'useTitleAsName' => 'char(1) NOT NULL default \'\'',
  'protected' => 'char(1) NOT NULL default \'\'',
  'user_groups' => 'blob NULL',
  'tableName' => 'varchar(128) NOT NULL default \'\'',
  'mode' => 'varchar(16) NOT NULL default \'\'',
  'moreTables' => 'char(1) NOT NULL default \'\'',
  'tables' => 'blob NULL',
  'cTables' => 'blob NULL',
  'pTable' => 'blob NULL',
  'existingTable' => 'varchar(128) NOT NULL default \'\'',
  'beSection' => 'varchar(64) NOT NULL default \'0\'',
  'injectBelow' => 'varchar(64) NOT NULL default \'0\'',
  'newSection' => 'char(1) NOT NULL default \'\'',
  'sectionName' => 'varchar(128) NOT NULL default \'\'',
  'sectionAlias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'hidden' => 'char(1) NOT NULL default \'\'',
  'showMenu' => 'char(1) NOT NULL default \'1\'',
  'icon' => 'binary(16) NULL',
  'active' => 'char(1) NOT NULL default \'\'',
  'publishedField' => 'int(10) NOT NULL default \'0\'',
  'isManageable' => 'char(1) NOT NULL default \'\'',
  'list_mode' => 'char(8) NOT NULL default \'1\'',
  'list_fields' => 'blob NULL',
  'list_headerFields' => 'blob NULL',
  'list_flag' => 'char(8) NOT NULL default \'1\'',
  'list_panelLayout' => 'varchar(64) NOT NULL default \'\'',
  'list_disableGrouping' => 'char(1) NOT NULL default \'\'',
  'list_operations' => 'blob NULL',
  'label_overwrite' => 'char(1) NOT NULL default \'\'',
  'label_html' => 'mediumtext NULL',
  'aliasField' => 'int(10) NOT NULL default \'0\'',
  'sitemapField' => 'int(10) NOT NULL default \'0\'',
  'jumpTo' => 'int(10) unsigned NOT NULL default \'0\'',
  'multilanguage' => 'char(1) NOT NULL default \'\'',
  'languages' => 'blob NULL',
  'allowComments' => 'char(1) NOT NULL default \'\'',
  'com_notify' => 'varchar(16) NOT NULL default \'\'',
  'com_sortOrder' => 'varchar(32) NOT NULL default \'\'',
  'com_perPage' => 'smallint(5) unsigned NOT NULL default \'0\'',
  'com_moderate' => 'char(1) NOT NULL default \'\'',
  'com_bbcode' => 'char(1) NOT NULL default \'\'',
  'com_requireLogin' => 'char(1) NOT NULL default \'\'',
  'com_disableCaptcha' => 'char(1) NOT NULL default \'\'',
  'restrictCte' => 'char(1) NOT NULL default \'\'',
  'restrictedCte' => 'blob NULL',
);

$this->arrUniqueFields = array (
  0 => 'tableName',
  1 => 'sectionAlias',
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid' => 'index',
);

$this->arrRelations = array (
  'pid' => 
  array (
    'table' => 'tl_pct_customelement',
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
