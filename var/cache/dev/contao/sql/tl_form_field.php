<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'margin_t' => 'varchar(16) NOT NULL default \'\'',
  'margin_b' => 'varchar(16) NOT NULL default \'\'',
  'margin_t_m' => 'varchar(16) NOT NULL default \'\'',
  'margin_b_m' => 'varchar(16) NOT NULL default \'\'',
  'autogrid' => 'char(1) NOT NULL default \'\'',
  'autogrid_css' => 'varchar(64) NOT NULL default \'\'',
  'autogrid_mobile' => 'varchar(64) NOT NULL default \'\'',
  'autogrid_tablet' => 'varchar(64) NOT NULL default \'\'',
  'autogrid_offset' => 'varchar(32) NOT NULL default \'\'',
  'autogrid_align' => 'varchar(32) NOT NULL default \'\'',
  'autogrid_align_mobile' => 'varchar(32) NOT NULL default \'\'',
  'autogrid_gutter' => 'varchar(16) NOT NULL default \'\'',
  'autogrid_sameheight' => 'char(1) NOT NULL default \'\'',
  'autogrid_class' => 'varchar(255) NOT NULL default \'\'',
  'autogrid_id' => 'int(10) NOT NULL default \'0\'',
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default 0',
  'sorting' => 'int(10) unsigned NOT NULL default 0',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'type' => 
  array (
    'name' => 'type',
    'type' => 'string',
    'length' => 64,
    'default' => 'text',
  ),
  'label' => 'varchar(255) NOT NULL default \'\'',
  'name' => 'varchar(64) NOT NULL default \'\'',
  'text' => 'text NULL',
  'html' => 'text NULL',
  'options' => 'blob NULL',
  'mandatory' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'rgxp' => 'varchar(32) NOT NULL default \'\'',
  'placeholder' => 'varchar(255) NOT NULL default \'\'',
  'customRgxp' => 'varchar(255) NOT NULL default \'\'',
  'errorMsg' => 'varchar(255) NOT NULL default \'\'',
  'minlength' => 'int(10) unsigned NOT NULL default 0',
  'maxlength' => 'int(10) unsigned NOT NULL default 0',
  'maxImageWidth' => 'int(10) unsigned NOT NULL default 0',
  'maxImageHeight' => 'int(10) unsigned NOT NULL default 0',
  'minval' => 'varchar(10) NOT NULL default \'\'',
  'maxval' => 'varchar(10) NOT NULL default \'\'',
  'step' => 'varchar(10) NOT NULL default \'\'',
  'size' => 'varchar(255) NOT NULL default \'a:2:{i:0;i:4;i:1;i:40;}\'',
  'multiple' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'mSize' => 'smallint(5) unsigned NOT NULL default 0',
  'extensions' => 'varchar(255) NOT NULL default \'jpg,jpeg,gif,png,pdf,doc,docx,xls,xlsx,ppt,pptx\'',
  'storeFile' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'uploadFolder' => 'binary(16) NULL',
  'useHomeDir' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'doNotOverwrite' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'class' => 'varchar(255) NOT NULL default \'\'',
  'value' => 'varchar(255) NOT NULL default \'\'',
  'accesskey' => 'char(1) NOT NULL default \'\'',
  'fSize' => 'smallint(5) unsigned NOT NULL default 0',
  'customTpl' => 'varchar(64) NOT NULL default \'\'',
  'slabel' => 'varchar(255) NOT NULL default \'\'',
  'imageSubmit' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'singleSRC' => 'binary(16) NULL',
  'invisible' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'isConditionalFormField' => 'char(1) NOT NULL default \'\'',
  'conditionalFormFieldCondition' => 'text NULL',
  'mp_forms_backButton' => 
  array (
    'type' => 'string',
    'length' => 255,
    'default' => '',
    'notnull' => true,
  ),
  'mp_forms_backFragment' => 
  array (
    'type' => 'string',
    'length' => 255,
    'default' => '',
    'notnull' => true,
  ),
  'mp_forms_nextFragment' => 
  array (
    'type' => 'string',
    'length' => 255,
    'default' => '',
    'notnull' => true,
  ),
  'mp_forms_downloadTemplate' => 'varchar(64) NOT NULL default \'\'',
  'mp_forms_downloadInline' => 'char(1) COLLATE ascii_bin NOT NULL default \'\'',
  'visibility_css' => 'varchar(32) NOT NULL default \'\'',
  'addFontIcon' => 'char(1) NOT NULL default \'\'',
  'fontIcon' => 'varchar(32) NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'pid,invisible' => 'index',
  'tstamp' => 'index',
);

$this->arrRelations = array (
  'pid' => 
  array (
    'table' => 'tl_form',
    'field' => 'id',
    'type' => 'belongsTo',
    'load' => 'lazy',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
