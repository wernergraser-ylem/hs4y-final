<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'alias' => 'varchar(255) BINARY NOT NULL default \'\'',
  'align_css' => 'varchar(32) NOT NULL default \'\'',
  'color_css' => 'varchar(32) NOT NULL default \'\'',
  'style_css' => 'varchar(32) NOT NULL default \'\'',
  'layout_css' => 'varchar(32) NOT NULL default \'\'',
  'news_filters' => 'blob NULL',
  'news_sysfilter' => 'char(1) NOT NULL default \'\'',
  'news_filter_multiple' => 'char(1) NOT NULL default \'\'',
  'bgposition' => 'varchar(32) NOT NULL default \'\'',
  'visibility_css' => 'varchar(32) NOT NULL default \'\'',
  'margin_t' => 'varchar(16) NOT NULL default \'\'',
  'margin_b' => 'varchar(16) NOT NULL default \'\'',
  'margin_t_m' => 'varchar(16) NOT NULL default \'\'',
  'margin_b_m' => 'varchar(16) NOT NULL default \'\'',
  'privacy_lbl_1' => 'varchar(128) NOT NULL default \'\'',
  'privacy_txt_1' => 'tinytext NULL',
  'privacy_lbl_2' => 'varchar(128) NOT NULL default \'\'',
  'privacy_txt_2' => 'tinytext NULL',
  'privacy_lbl_3' => 'varchar(128) NOT NULL default \'\'',
  'privacy_txt_3' => 'tinytext NULL',
  'privacy_lbl_4' => 'varchar(128) NOT NULL default \'\'',
  'privacy_txt_4' => 'tinytext NULL',
  'privacy_url_1' => 'varchar(255) NOT NULL default \'\'',
  'privacy_url_2' => 'varchar(255) NOT NULL default \'\'',
  'privacy_text' => 'text NULL',
  'privacy_cookie_expires' => 'smallint(5) unsigned NOT NULL default \'0\'',
  'privacy_preselect' => 'varchar(96) NOT NULL default \'\'',
  'id' => 'int(10) unsigned NOT NULL auto_increment',
  'pid' => 'int(10) unsigned NOT NULL default 0',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'name' => 'varchar(255) NOT NULL default \'\'',
  'headline' => 'varchar(255) NOT NULL default \'a:2:{s:5:"value";s:0:"";s:4:"unit";s:2:"h2";}\'',
  'type' => 'varchar(128) NOT NULL default \'\'',
  'levelOffset' => 'smallint(5) unsigned NOT NULL default 0',
  'showLevel' => 'smallint(5) unsigned NOT NULL default 0',
  'hardLimit' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'showProtected' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'defineRoot' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'rootPage' => 'int(10) unsigned NOT NULL default 0',
  'navigationTpl' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'customTpl' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'pages' => 'blob NULL',
  'showHidden' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'customLabel' => 'varchar(64) NOT NULL default \'\'',
  'autologin' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'jumpTo' => 'int(10) unsigned NOT NULL default 0',
  'overviewPage' => 'int(10) unsigned NOT NULL default 0',
  'redirectBack' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'pwResetPage' => 'int(10) unsigned NOT NULL default 0',
  'editable' => 'blob NULL',
  'reqFullAuth' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'memberTpl' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'form' => 'int(10) unsigned NOT NULL default 0',
  'queryType' => 'varchar(8) COLLATE ascii_bin NOT NULL default \'and\'',
  'fuzzy' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'contextLength' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'minKeywordLength' => 'smallint(5) unsigned NOT NULL default 4',
  'perPage' => 'smallint(5) unsigned NOT NULL default 0',
  'searchType' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'simple\'',
  'searchTpl' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'inColumn' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'main\'',
  'skipFirst' => 'smallint(5) unsigned NOT NULL default 0',
  'loadFirst' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'singleSRC' => 'binary(16) NULL',
  'imgSize' => 'varchar(128) COLLATE ascii_bin NOT NULL default \'\'',
  'useCaption' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'fullsize' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'multiSRC' => 'blob NULL',
  'html' => 'text NULL',
  'unfilteredHtml' => 'mediumtext NULL',
  'rss_cache' => 'int(10) unsigned NOT NULL default 3600',
  'rss_feed' => 'text NULL',
  'rss_template' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'numberOfItems' => 'smallint(5) unsigned NOT NULL default 3',
  'disableCaptcha' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'reg_groups' => 'blob NULL',
  'reg_allowLogin' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'reg_skipName' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'reg_close' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'\'',
  'reg_deleteDir' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'reg_assignDir' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'reg_homeDir' => 'binary(16) NULL',
  'reg_activate' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'reg_jumpTo' => 'int(10) unsigned NOT NULL default 0',
  'reg_text' => 'text NULL',
  'reg_password' => 'text NULL',
  'data' => 'text NULL',
  'protected' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'groups' => 'blob NULL',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'rootPageDependentModules' => 'blob NULL',
  'faq_categories' => 'blob NULL',
  'faq_readerModule' => 'int(10) unsigned NOT NULL default 0',
  'pct_customelement' => 'longblob NULL',
  'news_archives' => 'blob NULL',
  'news_featured' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'all_items\'',
  'news_jumpToCurrent' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'\'',
  'news_readerModule' => 'int(10) unsigned NOT NULL default 0',
  'news_template' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'news_format' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'news_month\'',
  'news_startDay' => 'smallint(5) unsigned NOT NULL default 0',
  'news_order' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'order_date_desc\'',
  'news_showQuantity' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'news_keepCanonical' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'list_table' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'list_fields' => 'tinytext NULL',
  'list_where' => 'tinytext NULL',
  'list_search' => 'tinytext NULL',
  'list_sort' => 'tinytext NULL',
  'list_info' => 'tinytext NULL',
  'list_info_where' => 'tinytext NULL',
  'list_layout' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'list_info_layout' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'cal_calendar' => 'blob NULL',
  'cal_noSpan' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'cal_hideRunning' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'cal_startDay' => 'smallint(5) unsigned NOT NULL default 1',
  'cal_format' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'cal_month\'',
  'cal_ignoreDynamic' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'cal_order' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'ascending\'',
  'cal_readerModule' => 'int(10) unsigned NOT NULL default 0',
  'cal_limit' => 'smallint(5) unsigned NOT NULL default 0',
  'cal_template' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'cal_ctemplate' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'cal_showQuantity' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'cal_featured' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'all_items\'',
  'cal_keepCanonical' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'newsletters' => 'blob NULL',
  'nl_channels' => 'blob NULL',
  'nl_text' => 'text NULL',
  'nl_hideChannels' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'nl_subscribe' => 'text NULL',
  'nl_unsubscribe' => 'text NULL',
  'nl_template' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'customcatalog' => 'varchar(128) NOT NULL default \'\'',
  'customcatalog_jumpTo' => 'int(10) NOT NULL default \'0\'',
  'customcatalog_limit' => 'int(10) NOT NULL default \'0\'',
  'customcatalog_offset' => 'int(10) NOT NULL default \'0\'',
  'customcatalog_perPage' => 'int(10) NOT NULL default \'0\'',
  'customcatalog_setVisibles' => 'char(1) NOT NULL default \'\'',
  'customcatalog_visibles' => 'blob NULL',
  'customcatalog_sortField' => 'varchar(128) NOT NULL default \'\'',
  'customcatalog_sorting' => 'char(4) NOT NULL default \'\'',
  'customcatalog_attr_image' => 'blob NULL',
  'customcatalog_imgSize' => 'varchar(64) NOT NULL default \'\'',
  'customcatalog_filtersets' => 'blob NULL',
  'customcatalog_filter_submit' => 'char(1) NOT NULL default \'\'',
  'customcatalog_filter_method' => 'varchar(8) NOT NULL default \'\'',
  'customcatalog_filter_formID' => 'varchar(128) NOT NULL default \'\'',
  'customcatalog_filter_showAll' => 'char(1) NOT NULL default \'1\'',
  'customcatalog_filter_actLang' => 'char(1) NOT NULL default \'1\'',
  'customcatalog_filter_start' => 'int(10) NOT NULL default \'0\'',
  'customcatalog_filter_stop' => 'int(10) NOT NULL default \'0\'',
  'customcatalog_template' => 'varchar(64) NOT NULL default \'\'',
  'customcatalog_mod_template' => 'varchar(64) NOT NULL default \'\'',
  'customcatalog_sqlWhere' => 'mediumtext NULL',
  'customcatalog_sqlSorting' => 'tinytext NULL',
  'customcatalog_api' => 'int(10) NOT NULL default \'0\'',
  'com_order' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'ascending\'',
  'com_moderate' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'com_bbcode' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'com_requireLogin' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'com_disableCaptcha' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'com_template' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
  0 => 'alias',
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
  'rootPage' => 
  array (
    'table' => 'tl_page',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'pages' => 
  array (
    'table' => 'tl_page',
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
  'overviewPage' => 
  array (
    'table' => 'tl_page',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'pwResetPage' => 
  array (
    'table' => 'tl_page',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'form' => 
  array (
    'table' => 'tl_form',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'reg_groups' => 
  array (
    'table' => 'tl_member_group',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'reg_jumpTo' => 
  array (
    'table' => 'tl_page',
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
  'faq_categories' => 
  array (
    'table' => 'tl_faq_category',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'faq_readerModule' => 
  array (
    'table' => 'tl_module',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'news_archives' => 
  array (
    'table' => 'tl_news_archive',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'cal_calendar' => 
  array (
    'table' => 'tl_calendar',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'cal_readerModule' => 
  array (
    'table' => 'tl_module',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'newsletters' => 
  array (
    'table' => 'tl_newsletter_channel',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'nl_channels' => 
  array (
    'table' => 'tl_newsletter_channel',
    'field' => 'id',
    'type' => 'hasMany',
    'load' => 'lazy',
  ),
  'customcatalog_jumpTo' => 
  array (
    'table' => 'tl_page',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'eager',
  ),
);

$this->arrEnums = array (
);

$this->blnIsDbTable = true;
