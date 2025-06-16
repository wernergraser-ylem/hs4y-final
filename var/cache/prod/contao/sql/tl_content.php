<?php

$this->arrMeta = array (
  'engine' => 'InnoDB',
  'charset' => 'utf8mb4',
  'collate' => 'utf8mb4_unicode_ci',
);

$this->arrFields = array (
  'align_css' => 'varchar(32) NOT NULL default \'\'',
  'color_css' => 'varchar(32) NOT NULL default \'\'',
  'bgcolor_css' => 'varchar(32) NOT NULL default \'\'',
  'border_css' => 'varchar(32) NOT NULL default \'\'',
  'style_css' => 'varchar(32) NOT NULL default \'\'',
  'format_css' => 'varchar(32) NOT NULL default \'\'',
  'width_css' => 'varchar(16) NOT NULL default \'\'',
  'seo' => 'char(1) NOT NULL default \'\'',
  'visibility_css' => 'varchar(32) NOT NULL default \'\'',
  'helper_css' => 'text null',
  'animation_type' => 'varchar(96) NOT NULL default \'\'',
  'animation_speed' => 'varchar(32) NOT NULL default \'\'',
  'animation_delay' => 'varchar(32) NOT NULL default \'\'',
  'margin_t' => 'varchar(16) NOT NULL default \'\'',
  'margin_b' => 'varchar(16) NOT NULL default \'\'',
  'margin_t_m' => 'varchar(16) NOT NULL default \'\'',
  'margin_b_m' => 'varchar(16) NOT NULL default \'\'',
  'animate_style_css' => 'varchar(16) NOT NULL default \'\'',
  'icon_position' => 'varchar(16) NOT NULL default \'\'',
  'autogrid_grid' => 'varchar(128) NOT NULL default \'\'',
  'autogrid_bgcolor' => 'varchar(64) NOT NULL default \'\'',
  'autogrid_bgimage' => 'varchar(255) NOT NULL default \'\'',
  'autogrid_bgposition' => 'varchar(32) NOT NULL default \'\'',
  'autogrid_bgrepeat' => 'varchar(32) NOT NULL default \'\'',
  'autogrid_bgsize' => 'varchar(16) NOT NULL default \'\'',
  'autogrid_padding' => 'varchar(128) NOT NULL default \'\'',
  'autogrid_padding_css' => 'varchar(8) NOT NULL default \'\'',
  'autogrid_styles' => 'varchar(255) NOT NULL default \'\'',
  'autogrid_addStyling' => 'char(1) NOT NULL default \'\'',
  'autogrid_sticky' => 'char(1) NOT NULL default \'\'',
  'autogrid_sticky_offset' => 'varchar(8) NOT NULL default \'\'',
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
  'ptable' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'tl_article\'',
  'sorting' => 'int(10) unsigned NOT NULL default 0',
  'tstamp' => 'int(10) unsigned NOT NULL default 0',
  'type' => 
  array (
    'name' => 'type',
    'type' => 'string',
    'length' => 128,
    'default' => 'text',
    'customSchemaOptions' => 
    array (
      'collation' => 'ascii_bin',
    ),
  ),
  'headline' => 'varchar(255) NOT NULL default \'a:2:{s:5:"value";s:0:"";s:4:"unit";s:2:"h2";}\'',
  'sectionHeadline' => 'varchar(255) NOT NULL default \'a:2:{s:5:"value";s:0:"";s:4:"unit";s:2:"h2";}\'',
  'text' => 'mediumtext NULL',
  'addImage' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'showPreview' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'inline' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'overwriteMeta' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'singleSRC' => 'binary(16) NULL',
  'alt' => 'varchar(255) NOT NULL default \'\'',
  'imageTitle' => 'varchar(255) NOT NULL default \'\'',
  'size' => 'varchar(128) COLLATE ascii_bin NOT NULL default \'\'',
  'imageUrl' => 'text NULL',
  'fullsize' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'caption' => 'varchar(255) NOT NULL default \'\'',
  'floating' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'above\'',
  'html' => 'mediumtext NULL',
  'unfilteredHtml' => 'mediumtext NULL',
  'listtype' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'\'',
  'listitems' => 'blob NULL',
  'tableitems' => 'mediumblob NULL',
  'summary' => 'varchar(255) NOT NULL default \'\'',
  'thead' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'tfoot' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'tleft' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'sortable' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'sortIndex' => 'smallint(5) unsigned NOT NULL default 0',
  'sortOrder' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'ascending\'',
  'closeSections' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'mooHeadline' => 'varchar(255) NOT NULL default \'\'',
  'mooStyle' => 'varchar(255) NOT NULL default \'\'',
  'mooClasses' => 'varchar(255) NOT NULL default \'\'',
  'highlight' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'\'',
  'markdownSource' => 'varchar(12) COLLATE ascii_bin NOT NULL default \'sourceText\'',
  'code' => 'text NULL',
  'url' => 'text NULL',
  'target' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'overwriteLink' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'titleText' => 'varchar(255) NOT NULL default \'\'',
  'linkTitle' => 'varchar(255) NOT NULL default \'\'',
  'embed' => 'varchar(255) NOT NULL default \'\'',
  'rel' => 'varchar(64) NOT NULL default \'\'',
  'useImage' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'multiSRC' => 'blob NULL',
  'useHomeDir' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'perRow' => 'smallint(5) unsigned NOT NULL default 4',
  'perPage' => 'smallint(5) unsigned NOT NULL default 0',
  'numberOfItems' => 'smallint(5) unsigned NOT NULL default 0',
  'sortBy' => 'varchar(32) COLLATE ascii_bin NOT NULL default \'\'',
  'metaIgnore' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'galleryTpl' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'customTpl' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'playerSRC' => 'blob NULL',
  'youtube' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'\'',
  'vimeo' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'posterSRC' => 'binary(16) NULL',
  'playerSize' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
  'playerOptions' => 'text NULL',
  'playerStart' => 'varchar(16) NOT NULL default \'\'',
  'playerStop' => 'varchar(16) NOT NULL default \'\'',
  'playerCaption' => 'varchar(255) NOT NULL default \'\'',
  'playerAspect' => 'varchar(8) COLLATE ascii_bin NOT NULL default \'\'',
  'splashImage' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'playerPreload' => 'varchar(8) COLLATE ascii_bin NOT NULL default \'\'',
  'playerColor' => 'varchar(6) COLLATE ascii_bin NOT NULL default \'\'',
  'youtubeOptions' => 'text NULL',
  'vimeoOptions' => 'text NULL',
  'sliderDelay' => 'int(10) unsigned NOT NULL default 0',
  'sliderSpeed' => 'int(10) unsigned NOT NULL default 300',
  'sliderStartSlide' => 'smallint(5) unsigned NOT NULL default 0',
  'sliderContinuous' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'data' => 'text NULL',
  'cteAlias' => 'int(10) unsigned NOT NULL default 0',
  'articleAlias' => 'int(10) unsigned NOT NULL default 0',
  'article' => 'int(10) unsigned NOT NULL default 0',
  'form' => 'int(10) unsigned NOT NULL default 0',
  'module' => 'int(10) unsigned NOT NULL default 0',
  'protected' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'groups' => 'blob NULL',
  'cssID' => 'varchar(255) NOT NULL default \'\'',
  'invisible' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'start' => 'varchar(10) COLLATE ascii_bin NOT NULL default \'\'',
  'stop' => 'varchar(10) COLLATE ascii_bin NOT NULL default \'\'',
  'pct_customelement' => 'longblob NULL',
  'revolutionslider' => 'int(10) NOT NULL default \'0\'',
  'revolutionslider_data_easing' => 'varchar(64) NOT NULL default \'\'',
  'revolutionslider_data_speed' => 'varchar(8) NOT NULL default \'0.5\'',
  'revolutionslider_data_start' => 'varchar(4) NOT NULL default \'\'',
  'revolutionslider_data_animation_start' => 'varchar(32) NOT NULL default \'\'',
  'revolutionslider_data_animation_end' => 'varchar(16) NOT NULL default \'\'',
  'revolutionslider_data_position' => 'varchar(96) NOT NULL default \'\'',
  'revolutionslider_data_position_m' => 'varchar(96) NOT NULL default \'\'',
  'revolutionslider_data_pos9grid' => 'varchar(64) NOT NULL default \'\'',
  'revolutionslider_data_autoplay' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_data_nextslideatend' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_OUT' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_videoType' => 'varchar(16) NOT NULL default \'\'',
  'revolutionslider_video_controls' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_video_loop' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_video_size' => 'varchar(64) NOT NULL default \'\'',
  'revolutionslider_video_aspect' => 'varchar(8) NOT NULL default \'\'',
  'revolutionslider_text_bold' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_text_italic' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_text_fontsize' => 'varchar(128) NOT NULL default \'\'',
  'revolutionslider_data_easing_OUT' => 'varchar(64) NOT NULL default \'\'',
  'revolutionslider_data_speed_OUT' => 'varchar(8) NOT NULL default \'0.5\'',
  'revolutionslider_data_start_OUT' => 'varchar(4) NOT NULL default \'\'',
  'revolutionslider_frames' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_data_frames' => 'mediumtext NULL',
  'useSVG' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_visibility' => 'char(1) NOT NULL default \'\'',
  'revolutionslider_parallax' => 'char(2) NOT NULL default \'\'',
  'privacy_url' => 'mediumtext NULL',
  'privacy_size' => 'varchar(64) NOT NULL default \'\'',
  'privacy_level' => 'smallint(5) unsigned NOT NULL default \'0\'',
  'addFontIcon' => 'char(1) NOT NULL default \'\'',
  'fontIcon' => 'varchar(32) NOT NULL default \'\'',
  'com_order' => 'varchar(16) COLLATE ascii_bin NOT NULL default \'ascending\'',
  'com_perPage' => 'smallint(5) unsigned NOT NULL default 0',
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
  'com_disableCaptcha' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'com_requireLogin' => 
  array (
    'type' => 'boolean',
    'default' => false,
  ),
  'com_template' => 'varchar(64) COLLATE ascii_bin NOT NULL default \'\'',
);

$this->arrUniqueFields = array (
);

$this->arrKeys = array (
  'id' => 'primary',
  'tstamp' => 'index',
  'ptable,pid,invisible,start,stop' => 'index',
  'type' => 'index',
);

$this->arrRelations = array (
  'cteAlias' => 
  array (
    'table' => 'tl_content',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'articleAlias' => 
  array (
    'table' => 'tl_article',
    'field' => 'id',
    'type' => 'hasOne',
    'load' => 'lazy',
  ),
  'article' => 
  array (
    'table' => 'tl_article',
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
  'module' => 
  array (
    'table' => 'tl_module',
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
