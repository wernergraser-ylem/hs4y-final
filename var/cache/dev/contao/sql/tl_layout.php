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
  'name' => 'varchar(255) NOT NULL default \'\'',
  'rows' => 'varchar(8) NOT NULL default \'2rwh\'',
  'headerHeight' => 'varchar(255) NOT NULL default \'\'',
  'footerHeight' => 'varchar(255) NOT NULL default \'\'',
  'cols' => 'varchar(8) NOT NULL default \'2cll\'',
  'widthLeft' => 'varchar(255) NOT NULL default \'\'',
  'widthRight' => 'varchar(255) NOT NULL default \'\'',
  'sections' => 'blob NULL',
  'framework' => 'varchar(255) NOT NULL default \'a:2:{i:0;s:10:"layout.css";i:1;s:14:"responsive.css";}\'',
  'external' => 'blob NULL',
  'combineScripts' => 
  array (
    'type' => 'boolean',
    'default' => true,
  ),
  'modules' => 'blob NULL',
  'template' => 'varchar(64) NOT NULL default \'\'',
  'minifyMarkup' => 
  array (
    'type' => 'boolean',
    'default' => true,
  ),
  'lightboxSize' => 'varchar(255) NOT NULL default \'\'',
  'defaultImageDensities' => 'varchar(255) NOT NULL default \'\'',
  'viewport' => 'varchar(255) NOT NULL default \'width=device-width,initial-scale=1.0,shrink-to-fit=no\'',
  'titleTag' => 'varchar(255) NOT NULL default \'\'',
  'cssClass' => 'varchar(255) NOT NULL default \'\'',
  'onload' => 'varchar(255) NOT NULL default \'\'',
  'head' => 'text NULL',
  'addJQuery' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'jquery' => 'text NULL',
  'addMooTools' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'mootools' => 'text NULL',
  'analytics' => 'text NULL',
  'externalJs' => 'blob NULL',
  'scripts' => 'text NULL',
  'script' => 'text NULL',
  'static' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'width' => 'varchar(255) NOT NULL default \'\'',
  'align' => 'varchar(32) NOT NULL default \'center\'',
  'newsfeeds' => 'blob NULL',
  'webfonts_optin' => 'char(1) NOT NULL default \'\'',
  'calendarfeeds' => 'blob NULL',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
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
  'newsfeeds' => 
  array (
    'table' => 'tl_page',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'calendarfeeds' => 
  array (
    'table' => 'tl_calendar_feed',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
