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
  'title' => 'varchar(255) NOT NULL default \'\'',
  'subtitle' => 'tinytext NULL',
  'transition' => 'varchar(64) NOT NULL default \'\'',
  'slideUrl' => 'varchar(255) NOT NULL default \'\'',
  'newWindow' => 'char(1) NOT NULL default \'\'',
  'masterspeed' => 'varchar(16) NOT NULL default \'\'',
  'delay' => 'varchar(10) NOT NULL default \'\'',
  'lazyload' => 'char(1) NOT NULL default \'\'',
  'singleSRC_thumb' => 'binary(16) NULL',
  'singleSRC' => 'binary(16) NULL',
  'size' => 'varchar(128) COLLATE ascii_bin NOT NULL default \'\'',
  'background' => 'varchar(16) NOT NULL default \'\'',
  'data_bgfit' => 'varchar(16) NOT NULL default \'\'',
  'data_bgposition' => 'varchar(16) NOT NULL default \'\'',
  'data_bgrepeat' => 'char(1) NOT NULL default \'\'',
  'data_bgcolor' => 'varchar(64) NOT NULL default \'\'',
  'kenburns' => 'char(1) NOT NULL default \'\'',
  'data_duration' => 'int(10) NOT NULL default \'0\'',
  'data_bgposition_OUT' => 'varchar(16) NOT NULL default \'\'',
  'data_bgscale' => 'varchar(255) NOT NULL default \'\'',
  'data_ease' => 'varchar(64) NOT NULL default \'\'',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'published' => 'char(1) NOT NULL default \'\'',
  'videoSRC' => 'binary(16) NULL',
  'videoURL' => 'varchar(255) NOT NULL default \'\'',
  'loop' => 'char(1) NOT NULL default \'\'',
  'nextslideatend' => 'char(1) NOT NULL default \'\'',
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
