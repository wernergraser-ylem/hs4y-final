<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'background' => 'char(1) NOT NULL default \'\'',
  'bgcolor' => 'varchar(64) NOT NULL default \'\'',
  'bgimage' => 'varchar(255) NOT NULL default \'\'',
  'bgposition' => 'varchar(32) NOT NULL default \'\'',
  'bgrepeat' => 'varchar(32) NOT NULL default \'\'',
  'bgsize' => 'varchar(16) NOT NULL default \'\'',
  'size' => 'varchar(128) COLLATE ascii_bin NOT NULL default \'\'',
  'bgcolor_css' => 'varchar(32) NOT NULL default \'\'',
  'overlay' => 'char(1) NOT NULL default \'\'',
  'ol_position' => 'varchar(16) NOT NULL default \'\'',
  'ol_width' => 'varchar(16) NOT NULL default \'\'',
  'ol_height' => 'varchar(128) NOT NULL default \'\'',
  'ol_bgcolor_css' => 'varchar(16) NOT NULL default \'\'',
  'ol_opacity' => 'varchar(16) NOT NULL default \'\'',
  'fullscreen' => 'char(1) NOT NULL default \'\'',
  'offsetCssID' => 'varchar(196) NOT NULL default \'\'',
  'layout_css' => 'varchar(32) NOT NULL default \'\'',
  'color_css' => 'varchar(32) NOT NULL default \'\'',
  'padding_t' => 'varchar(16) NOT NULL default \'\'',
  'padding_b' => 'varchar(16) NOT NULL default \'\'',
  'visibility_css' => 'varchar(32) NOT NULL default \'\'',
  'animation_type' => 'varchar(96) NOT NULL default \'\'',
  'animation_speed' => 'varchar(32) NOT NULL default \'\'',
  'animation_delay' => 'varchar(32) NOT NULL default \'\'',
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default 0',
  'sorting' => 'int(10) unsigned NOT NULL default 0',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'author' => 'int(10) unsigned NOT NULL default 0',
  'inColumn' => 'varchar(32) NOT NULL default \'main\'',
  'showTeaser' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'teaserCssID' => 'varchar(255) NOT NULL default \'\'',
  'teaser' => 'text NULL',
  'printable' => 'varchar(255) NOT NULL default \'\'',
  'customTpl' => 'varchar(64) NOT NULL default \'\'',
  'protected' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'groups' => 'blob NULL',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'published' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'start' => 'varchar(10) NOT NULL default \'\'',
  'stop' => 'varchar(10) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
  'alias' => 'index',
  'pid,published,inColumn,start,stop' => 'index',
);

$this->arrRelations = array (
  'pid' => 
  array (
    'table' => 'tl_page',
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
  'groups' => 
  array (
    'table' => 'tl_member_group',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
