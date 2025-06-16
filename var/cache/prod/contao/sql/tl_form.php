<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'title' => 'varchar(255) NOT NULL default \'\'',
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'jumpTo' => 'int(10) unsigned NOT NULL default 0',
  'confirmation' => 'text NULL',
  'sendViaEmail' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'mailerTransport' => 'varchar(255) NOT NULL default \'\'',
  'recipient' => 'varchar(1022) NOT NULL default \'\'',
  'subject' => 'varchar(255) NOT NULL default \'\'',
  'format' => 'varchar(12) NOT NULL default \'raw\'',
  'skipEmpty' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'storeValues' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'targetTable' => 'varchar(64) NOT NULL default \'\'',
  'customTpl' => 'varchar(64) NOT NULL default \'\'',
  'method' => 'varchar(12) NOT NULL default \'POST\'',
  'novalidate' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'attributes' => 'varchar(255) NOT NULL default \'\'',
  'formID' => 'varchar(64) NOT NULL default \'\'',
  'ajax' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'allowTags' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'mp_forms_getParam' => 
  array (
    'type' => 'string',
    'length' => 255,
    'default' => 'step',
    'notnull' => true,
  ),
  'mp_forms_sessionRefParam' => 
  array (
    'type' => 'string',
    'length' => 255,
    'default' => 'ref',
    'notnull' => true,
  ),
  'mp_forms_backFragment' => 'varchar(255) NOT NULL default \'\'',
  'mp_forms_nextFragment' => 'varchar(255) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
  'alias' => 'index',
);

$this->arrRelations = array (
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
