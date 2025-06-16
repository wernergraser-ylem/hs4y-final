<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default \'0\'',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'sliderStyle' => 'varchar(64) NOT NULL default \'\'',
  'sliderSize' => 'varchar(255) NOT NULL default \'\'',
  'sliderBreakPoint' => 'varchar(255) NOT NULL default \'\'',
  'sliderType' => 'varchar(32) NOT NULL default \'\'',
  'fullScreenOffsetContainer' => 'varchar(64) NOT NULL default \'\'',
  'transition' => 'varchar(64) NOT NULL default \'\'',
  'delay' => 'int(10) NOT NULL default \'4\'',
  'shuffle' => 'char(1) NOT NULL default \'\'',
  'navigationType' => 'varchar(64) NOT NULL default \'\'',
  'navigationSize' => 'varchar(64) NOT NULL default \'\'',
  'arrowStyle' => 'varchar(32) NOT NULL default \'\'',
  'stopOnHover' => 'char(1) NOT NULL default \'1\'',
  'overlay' => 'varchar(16) NOT NULL default \'\'',
  'startWithSlide' => 'char(3) NOT NULL default \'\'',
  'stopAtSlide' => 'char(3) NOT NULL default \'\'',
  'stopAfterLoops' => 'char(3) NOT NULL default \'\'',
  'thumbAmount' => 'int(4) NOT NULL default \'3\'',
  'sliderTemplate' => 'varchar(64) NOT NULL default \'\'',
  'jsTemplate' => 'varchar(64) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
);

$this->arrRelations = array (
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
