<?php

namespace {
$GLOBALS['TL_DCA']['tl_content'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'enableVersioning' => \true, 'ctable' => array('tl_content'), 'dynamicPtable' => \true, 'markAsCopy' => 'headline', 'onload_callback' => array(array('tl_content', 'adjustDcaByType'), array('tl_content', 'showJsLibraryHint')), 'sql' => array('keys' => array('id' => 'primary', 'tstamp' => 'index', 'ptable,pid,invisible,start,stop' => 'index', 'type' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_PARENT, 'fields' => array('sorting'), 'panelLayout' => 'filter;search,limit', 'defaultSearchField' => 'text', 'headerFields' => array('title', 'type', 'author', 'tstamp', 'start', 'stop'), 'child_record_callback' => array('tl_content', 'addCteType'), 'renderAsGrid' => \true, 'limitHeight' => 160)),
    // Palettes
    'palettes' => array('__selector__' => array('type', 'addImage', 'sortable', 'useImage', 'overwriteMeta', 'overwriteLink', 'protected', 'splashImage', 'markdownSource', 'showPreview'), 'default' => '{type_legend},type', 'headline' => '{type_legend},type,headline;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'text' => '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'html' => '{type_legend},type;{text_legend},html;{template_legend:hide},customTpl;{protected_legend:hide},protected;{invisible_legend:hide},invisible,start,stop', 'unfiltered_html' => '{type_legend},type;{text_legend},unfilteredHtml;{template_legend:hide},customTpl;{protected_legend:hide},protected;{invisible_legend:hide},invisible,start,stop', 'list' => '{type_legend},type,headline;{list_legend},listtype,listitems;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'description_list' => '{type_legend},type,headline;{list_legend},data;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'table' => '{type_legend},type,headline;{table_legend},tableitems;{tconfig_legend},summary,thead,tfoot,tleft;{sortable_legend:hide},sortable;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'accordion' => '{type_legend},type,headline;{accordion_legend},closeSections;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'element_group' => '{type_legend},type,headline;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'accordionStart' => '{type_legend},type;{moo_legend},mooHeadline,mooStyle,mooClasses;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'accordionStop' => '{type_legend},type;{moo_legend},mooClasses;{template_legend:hide},customTpl;{protected_legend:hide},protected;{invisible_legend:hide},invisible,start,stop', 'accordionSingle' => '{type_legend},type;{moo_legend},mooHeadline,mooStyle,mooClasses;{text_legend},text;{image_legend},addImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'swiper' => '{type_legend},type,headline;{slider_legend},sliderDelay,sliderSpeed,sliderStartSlide,sliderContinuous;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'sliderStart' => '{type_legend},type,headline;{slider_legend},sliderDelay,sliderSpeed,sliderStartSlide,sliderContinuous;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'sliderStop' => '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{invisible_legend:hide},invisible,start,stop', 'code' => '{type_legend},type,headline;{text_legend},highlight,code;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'markdown' => '{type_legend},type,headline;{text_legend},markdownSource;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'template' => '{type_legend},type,headline;{template_legend},data,customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'hyperlink' => '{type_legend},type,headline;{link_legend},url,target,linkTitle,embed,titleText,rel;{imglink_legend:hide},useImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'toplink' => '{type_legend},type;{link_legend},linkTitle;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'image' => '{type_legend},type,headline;{source_legend},singleSRC,size,fullsize,overwriteMeta;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'gallery' => '{type_legend},type,headline;{source_legend},multiSRC,useHomeDir,sortBy,metaIgnore;{image_legend},size,perRow,perPage,numberOfItems,fullsize;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'player' => '{type_legend},type,headline;{source_legend},playerSRC;{player_legend},playerOptions,playerSize,playerPreload,playerCaption,playerStart,playerStop;{poster_legend:hide},posterSRC;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'youtube' => '{type_legend},type,headline;{source_legend},youtube;{player_legend},youtubeOptions,playerSize,playerAspect,playerCaption,playerStart,playerStop;{splash_legend},splashImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'vimeo' => '{type_legend},type,headline;{source_legend},vimeo;{player_legend},vimeoOptions,playerSize,playerAspect,playerCaption,playerStart,playerColor;{splash_legend},splashImage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'download' => '{type_legend},type,headline;{source_legend},singleSRC;{download_legend},inline,overwriteLink;{preview_legend},showPreview;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'downloads' => '{type_legend},type,headline;{source_legend},multiSRC,useHomeDir;{download_legend},inline,sortBy,metaIgnore;{preview_legend},showPreview;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'alias' => '{type_legend},type;{include_legend},cteAlias;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'article' => '{type_legend},type;{include_legend},articleAlias;{protected_legend:hide},protected;{invisible_legend:hide},invisible,start,stop', 'teaser' => '{type_legend},type;{include_legend},article;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'form' => '{type_legend},type,headline;{include_legend},form;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop', 'module' => '{type_legend},type;{include_legend},module;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop'),
    // Sub-palettes
    'subpalettes' => array('addImage' => 'singleSRC,fullsize,size,floating,overwriteMeta', 'sortable' => 'sortIndex,sortOrder', 'useImage' => 'singleSRC,size,overwriteMeta', 'overwriteMeta' => 'alt,imageTitle,imageUrl,caption', 'overwriteLink' => 'linkTitle,titleText', 'protected' => 'groups', 'splashImage' => 'singleSRC,size', 'markdownSource_sourceText' => 'code', 'markdownSource_sourceFile' => 'singleSRC', 'showPreview' => 'size,fullsize,numberOfItems'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'ptable' => array('sql' => "varchar(64) COLLATE ascii_bin NOT NULL default 'tl_article'"), 'sorting' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'type' => array('filter' => \true, 'inputType' => 'select', 'reference' => &$GLOBALS['TL_LANG']['CTE'], 'eval' => array('helpwizard' => \true, 'chosen' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50'), 'sql' => array('name' => 'type', 'type' => 'string', 'length' => 64, 'default' => 'text', 'customSchemaOptions' => array('collation' => 'ascii_bin'))), 'headline' => array('search' => \true, 'inputType' => 'inputUnit', 'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'), 'eval' => array('maxlength' => 200, 'basicEntities' => \true, 'tl_class' => 'w50 clr'), 'sql' => "varchar(255) NOT NULL default 'a:2:{s:5:\"value\";s:0:\"\";s:4:\"unit\";s:2:\"h2\";}'"), 'sectionHeadline' => array('search' => \true, 'inputType' => 'inputUnit', 'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'), 'eval' => array('maxlength' => 255, 'basicEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default 'a:2:{s:5:\"value\";s:0:\"\";s:4:\"unit\";s:2:\"h2\";}'"), 'text' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('mandatory' => \true, 'basicEntities' => \true, 'rte' => 'tinyMCE', 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "mediumtext NULL"), 'addImage' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'showPreview' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'inline' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'overwriteMeta' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'w50 clr'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'singleSRC' => array('inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio', 'mandatory' => \true, 'tl_class' => 'clr'), 'load_callback' => array(array('tl_content', 'setSingleSrcFlags')), 'sql' => "binary(16) NULL"), 'alt' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'imageTitle' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'size' => array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'inputType' => 'imageSize', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true, 'tl_class' => 'w50 clr'), 'sql' => "varchar(128) COLLATE ascii_bin NOT NULL default ''"), 'imageUrl' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 2048, 'dcaPicker' => \true, 'tl_class' => 'w50'), 'sql' => "text NULL"), 'fullsize' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'caption' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'allowHtml' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'floating' => array('inputType' => 'radioTable', 'options' => array('above', 'left', 'right', 'below'), 'eval' => array('cols' => 4, 'tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'above'"), 'html' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('allowHtml' => \true, 'class' => 'monospace', 'rte' => 'ace|html', 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "mediumtext NULL"), 'unfilteredHtml' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('useRawRequestData' => \true, 'class' => 'monospace', 'rte' => 'ace|html', 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "mediumtext NULL"), 'listtype' => array('inputType' => 'select', 'options' => array('ordered', 'unordered'), 'eval' => array('tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['tl_content'], 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default ''"), 'listitems' => array('inputType' => 'listWizard', 'eval' => array('multiple' => \true, 'allowHtml' => \true, 'tl_class' => 'clr'), 'xlabel' => array(array('tl_content', 'listImportWizard')), 'sql' => "blob NULL"), 'tableitems' => array('inputType' => 'tableWizard', 'eval' => array('multiple' => \true, 'allowHtml' => \true, 'doNotSaveEmpty' => \true, 'style' => 'width:142px;height:66px'), 'xlabel' => array(array('tl_content', 'tableImportWizard')), 'sql' => "mediumblob NULL"), 'summary' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'thead' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25 clr'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'tfoot' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'tleft' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'sortable' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'sortIndex' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'sortOrder' => array('inputType' => 'select', 'options' => array('ascending', 'descending'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'ascending'"), 'closeSections' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'mooHeadline' => array('inputType' => 'text', 'eval' => array('maxlength' => 255, 'allowHtml' => \true, 'tl_class' => 'long'), 'sql' => "varchar(255) NOT NULL default ''"), 'mooStyle' => array('inputType' => 'text', 'eval' => array('maxlength' => 255, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'mooClasses' => array('search' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'rgxp' => 'alnum', 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'highlight' => array('inputType' => 'select', 'options' => array('Apache', 'Bash', 'C#', 'C++', 'CSS', 'Diff', 'HTML', 'HTTP', 'Ini', 'JSON', 'Java', 'JavaScript', 'Markdown', 'Nginx', 'Perl', 'PHP', 'PowerShell', 'Python', 'Ruby', 'SCSS', 'SQL', 'Twig', 'YAML', 'XML'), 'eval' => array('includeBlankOption' => \true, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default ''"), 'markdownSource' => array('inputType' => 'select', 'options' => array('sourceText', 'sourceFile'), 'reference' => &$GLOBALS['TL_LANG']['tl_content']['markdownSource'], 'eval' => array('submitOnChange' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(12) COLLATE ascii_bin NOT NULL default 'sourceText'"), 'code' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('mandatory' => \true, 'preserveTags' => \true, 'decodeEntities' => \true, 'class' => 'monospace', 'rte' => 'ace', 'helpwizard' => \true, 'tl_class' => 'clr'), 'explanation' => 'insertTags', 'load_callback' => array(array('tl_content', 'setRteSyntax')), 'sql' => "text NULL"), 'url' => array('label' => &$GLOBALS['TL_LANG']['MSC']['url'], 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 2048, 'dcaPicker' => \true, 'tl_class' => 'w50'), 'sql' => "text NULL"), 'target' => array('label' => &$GLOBALS['TL_LANG']['MSC']['target'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'overwriteLink' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'w50 clr'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'titleText' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'linkTitle' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'embed' => array('inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'rel' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 64, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''"), 'useImage' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'multiSRC' => array('inputType' => 'fileTree', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox', 'isSortable' => \true, 'files' => \true), 'sql' => "blob NULL", 'load_callback' => array(array('tl_content', 'setMultiSrcFlags'))), 'useHomeDir' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'perRow' => array('inputType' => 'select', 'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12), 'eval' => array('tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 4"), 'perPage' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'numberOfItems' => array('label' => &$GLOBALS['TL_LANG']['MSC']['numberOfItems'], 'inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'sortBy' => array('inputType' => 'select', 'options' => array('custom', 'name_asc', 'name_desc', 'date_asc', 'date_desc', 'random'), 'reference' => &$GLOBALS['TL_LANG']['tl_content'], 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default ''"), 'metaIgnore' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'galleryTpl' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\Controller::getTemplateGroup('gallery_');
    }, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'customTpl' => array('inputType' => 'select', 'eval' => array('chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'playerSRC' => array('inputType' => 'fileTree', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox', 'files' => \true, 'mandatory' => \true), 'sql' => "blob NULL"), 'youtube' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'save_callback' => array(array('tl_content', 'extractYouTubeId')), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default ''"), 'vimeo' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'save_callback' => array(array('tl_content', 'extractVimeoId')), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'posterSRC' => array('inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio'), 'sql' => "binary(16) NULL"), 'playerSize' => array('inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'playerOptions' => array('inputType' => 'checkbox', 'options' => array('player_autoplay', 'player_nocontrols', 'player_loop', 'player_playsinline', 'player_muted'), 'reference' => &$GLOBALS['TL_LANG']['tl_content'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "text NULL"), 'playerStart' => array('inputType' => 'text', 'eval' => array('maxlength' => 16, 'nospace' => \true, 'tl_class' => 'w25'), 'sql' => "varchar(16) NOT NULL default ''"), 'playerStop' => array('inputType' => 'text', 'eval' => array('maxlength' => 16, 'nospace' => \true, 'tl_class' => 'w25'), 'sql' => "varchar(16) NOT NULL default ''"), 'playerCaption' => array('inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'playerAspect' => array('inputType' => 'select', 'options' => array('16:9', '16:10', '21:9', '4:3', '3:2'), 'reference' => &$GLOBALS['TL_LANG']['tl_content']['player_aspect'], 'eval' => array('includeBlankOption' => \true, 'nospace' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(8) COLLATE ascii_bin NOT NULL default ''"), 'splashImage' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'playerPreload' => array('inputType' => 'select', 'options' => array('auto', 'metadata', 'none'), 'reference' => &$GLOBALS['TL_LANG']['tl_content']['player_preload'], 'eval' => array('includeBlankOption' => \true, 'nospace' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(8) COLLATE ascii_bin NOT NULL default ''"), 'playerColor' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 6, 'colorpicker' => \true, 'isHexColor' => \true, 'decodeEntities' => \true, 'tl_class' => 'w25 wizard'), 'sql' => "varchar(6) COLLATE ascii_bin NOT NULL default ''"), 'youtubeOptions' => array('label' => &$GLOBALS['TL_LANG']['tl_content']['playerOptions'], 'inputType' => 'checkbox', 'options' => array('youtube_autoplay', 'youtube_controls', 'youtube_cc_load_policy', 'youtube_fs', 'youtube_hl', 'youtube_iv_load_policy', 'youtube_modestbranding', 'youtube_rel', 'youtube_nocookie', 'youtube_loop'), 'reference' => &$GLOBALS['TL_LANG']['tl_content'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "text NULL"), 'vimeoOptions' => array('label' => &$GLOBALS['TL_LANG']['tl_content']['playerOptions'], 'inputType' => 'checkbox', 'options' => array('vimeo_autoplay', 'vimeo_loop', 'vimeo_portrait', 'vimeo_title', 'vimeo_byline', 'vimeo_dnt'), 'reference' => &$GLOBALS['TL_LANG']['tl_content'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "text NULL"), 'sliderDelay' => array('search' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w25'), 'sql' => "int(10) unsigned NOT NULL default 0"), 'sliderSpeed' => array('search' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w25'), 'sql' => "int(10) unsigned NOT NULL default 300"), 'sliderStartSlide' => array('inputType' => 'text', 'eval' => array('tl_class' => 'w25'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'sliderContinuous' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'data' => array('inputType' => 'keyValueWizard', 'sql' => "text NULL"), 'cteAlias' => array('inputType' => 'picker', 'eval' => array('mandatory' => \true, 'tl_class' => 'clr'), 'save_callback' => array(array('tl_content', 'saveAlias')), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy', 'table' => 'tl_content')), 'articleAlias' => array('inputType' => 'picker', 'foreignKey' => 'tl_article.title', 'eval' => array('mandatory' => \true, 'tl_class' => 'clr'), 'save_callback' => array(array('tl_content', 'saveArticleAlias')), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'article' => array('inputType' => 'picker', 'foreignKey' => 'tl_article.title', 'eval' => array('mandatory' => \true, 'tl_class' => 'clr'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'form' => array('inputType' => 'select', 'foreignKey' => 'tl_form.title', 'options_callback' => array('tl_content', 'getForms'), 'eval' => array('mandatory' => \true, 'includeBlankOption' => \true, 'chosen' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50 wizard'), 'wizard' => array(array('tl_content', 'editForm')), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'module' => array('inputType' => 'select', 'foreignKey' => 'tl_module.name', 'eval' => array('mandatory' => \true, 'includeBlankOption' => \true, 'chosen' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50 wizard'), 'wizard' => array(array('tl_content', 'editModule')), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'protected' => array('filter' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'groups' => array('filter' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_member_group.name', 'eval' => array('mandatory' => \true, 'multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'cssID' => array('inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50 clr'), 'sql' => "varchar(255) NOT NULL default ''"), 'invisible' => array('reverseToggle' => \true, 'filter' => \true, 'inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'start' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) COLLATE ascii_bin NOT NULL default ''"), 'stop' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) COLLATE ascii_bin NOT NULL default ''")),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_content extends \Contao\Backend
{
    /**
     * Return the group of a content element
     *
     * @param string $element
     *
     * @return string
     */
    public function getContentElementGroup($element)
    {
        foreach ($GLOBALS['TL_CTE'] as $k => $v) {
            if (\array_key_exists($element, $v)) {
                return $k;
            }
        }
        return \null;
    }
    /**
     * Adjust the DCA by type
     *
     * @param object $dc
     */
    public function adjustDcaByType($dc)
    {
        $objCte = \Contao\ContentModel::findById($dc->id);
        if ($objCte === \null) {
            return;
        }
        switch ($objCte->type) {
            case 'hyperlink':
                unset($GLOBALS['TL_DCA']['tl_content']['fields']['imageUrl']);
                break;
            case 'image':
                $GLOBALS['TL_DCA']['tl_content']['fields']['fullsize']['eval']['tl_class'] .= ' m12';
                break;
            case 'download':
            case 'downloads':
                $GLOBALS['TL_DCA']['tl_content']['fields']['size']['eval']['mandatory'] = \true;
                $GLOBALS['TL_DCA']['tl_content']['fields']['fullsize']['eval']['tl_class'] .= ' m12';
                break;
        }
        if (\Contao\System::getContainer()->get('contao.fragment.compositor')->supportsNesting('contao.content_element.' . $objCte->type)) {
            $GLOBALS['TL_DCA']['tl_content']['config']['switchToEdit'] = \true;
        }
    }
    /**
     * Show a hint if a JavaScript library needs to be included in the page layout
     *
     * @param object $dc
     */
    public function showJsLibraryHint($dc)
    {
        if (\Contao\Input::isPost() || \Contao\Input::get('act') != 'edit') {
            return;
        }
        $security = \Contao\System::getContainer()->get('security.helper');
        // Return if the user cannot access the layout module (see #6190)
        if (!$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_ACCESS_MODULE, 'themes') || !$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_ACCESS_LAYOUTS)) {
            return;
        }
        $objCte = \Contao\ContentModel::findById($dc->id);
        if ($objCte === \null) {
            return;
        }
        switch ($objCte->type) {
            case 'gallery':
                \Contao\Message::addInfo(\sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_mediabox', 'j_colorbox'));
                break;
            case 'sliderStart':
            case 'sliderStop':
                \Contao\Message::addInfo(\sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplate'], 'js_slider'));
                break;
            case 'accordionSingle':
            case 'accordionStart':
            case 'accordionStop':
                \Contao\Message::addInfo(\sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_accordion', 'j_accordion'));
                break;
            case 'table':
                if ($objCte->sortable && ($GLOBALS['TL_CTE']['texts']['table'] ?? \null) === \Contao\ContentTable::class) {
                    \Contao\Message::addInfo(\sprintf($GLOBALS['TL_LANG']['tl_content']['includeTemplates'], 'moo_tablesort', 'j_tablesort'));
                }
                break;
        }
    }
    /**
     * Add the type of content element
     *
     * @param array $arrRow
     *
     * @return string
     */
    public function addCteType($arrRow)
    {
        $key = $arrRow['invisible'] ? 'unpublished' : 'published';
        $type = $GLOBALS['TL_LANG']['CTE'][$arrRow['type']][0] ?? $arrRow['type'];
        // Remove the class if it is a wrapper element
        if (\in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['start']) || \in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['separator']) || \in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['stop'])) {
            if (($group = $this->getContentElementGroup($arrRow['type'])) !== \null) {
                $type = ($GLOBALS['TL_LANG']['CTE'][$group] ?? $group) . ' (' . $type . ')';
            }
        } elseif (\in_array($arrRow['type'], $GLOBALS['TL_WRAPPERS']['single'])) {
            if (($group = $this->getContentElementGroup($arrRow['type'])) !== \null) {
                $type = ($GLOBALS['TL_LANG']['CTE'][$group] ?? $group) . ' (' . $type . ')';
            }
        }
        // Add the ID of the aliased element
        if ($arrRow['type'] == 'alias') {
            $type .= ' ID ' . $arrRow['cteAlias'];
        }
        // Add the protection status
        if ($arrRow['protected'] ?? \null) {
            $groupIds = \Contao\StringUtil::deserialize($arrRow['groups'], \true);
            $groupNames = array();
            if (!empty($groupIds)) {
                if (\in_array(-1, \array_map('intval', $groupIds), \true)) {
                    $groupNames[] = $GLOBALS['TL_LANG']['MSC']['guests'];
                }
                if (\null !== ($groups = \Contao\MemberGroupModel::findMultipleByIds($groupIds))) {
                    $groupNames += $groups->fetchEach('name');
                }
            }
            $key .= ' icon-protected';
            $type .= ' (' . $GLOBALS['TL_LANG']['MSC']['protected'] . ($groupNames ? ': ' . \implode(', ', $groupNames) : '') . ')';
        }
        // Add the headline level (see #5858)
        if ($arrRow['type'] == 'headline' && \is_array($headline = \Contao\StringUtil::deserialize($arrRow['headline']))) {
            $type .= ' (' . $headline['unit'] . ')';
        }
        if ($arrRow['start'] && $arrRow['stop']) {
            $type .= ' <span class="visibility">(' . \sprintf($GLOBALS['TL_LANG']['MSC']['showFromTo'], \Contao\Date::parse(\Contao\Config::get('datimFormat'), $arrRow['start']), \Contao\Date::parse(\Contao\Config::get('datimFormat'), $arrRow['stop'])) . ')</span>';
        } elseif ($arrRow['start']) {
            $type .= ' <span class="visibility">(' . \sprintf($GLOBALS['TL_LANG']['MSC']['showFrom'], \Contao\Date::parse(\Contao\Config::get('datimFormat'), $arrRow['start'])) . ')</span>';
        } elseif ($arrRow['stop']) {
            $type .= ' <span class="visibility">(' . \sprintf($GLOBALS['TL_LANG']['MSC']['showTo'], \Contao\Date::parse(\Contao\Config::get('datimFormat'), $arrRow['stop'])) . ')</span>';
        }
        $objModel = new \Contao\ContentModel();
        $objModel->setRow($arrRow);
        $class = 'cte_preview';
        try {
            $preview = \Contao\StringUtil::insertTagToSrc($this->getContentElement($objModel));
        } catch (\Throwable $exception) {
            $preview = '<p class="tl_error">' . \Contao\StringUtil::specialchars($exception->getMessage()) . '</p>';
        }
        if (!empty($arrRow['sectionHeadline'])) {
            $sectionHeadline = \Contao\StringUtil::deserialize($arrRow['sectionHeadline'], \true);
            if (!empty($sectionHeadline['value']) && !empty($sectionHeadline['unit'])) {
                $preview = '<' . $sectionHeadline['unit'] . '>' . $sectionHeadline['value'] . '</' . $sectionHeadline['unit'] . '>' . $preview;
            }
        }
        // Strip HTML comments to check if the preview is empty
        if (\trim(\preg_replace('/<!--(.|\\s)*?-->/', '', $preview)) == '') {
            $class .= ' empty';
        }
        return '
<div class="cte_type ' . $key . '">' . $type . '</div>
<div class="' . $class . '">' . $preview . '</div>';
    }
    /**
     * Throw an exception if the current article is selected (circular reference)
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function saveArticleAlias($varValue, \Contao\DataContainer $dc)
    {
        if ($dc->activeRecord && $dc->activeRecord->pid == $varValue) {
            throw new \RuntimeException($GLOBALS['TL_LANG']['ERR']['circularPicker']);
        }
        return $varValue;
    }
    /**
     * Throw an exception if the current content element is selected (circular reference)
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function saveAlias($varValue, \Contao\DataContainer $dc)
    {
        if ($dc->activeRecord && $dc->activeRecord->id == $varValue) {
            throw new \RuntimeException($GLOBALS['TL_LANG']['ERR']['circularPicker']);
        }
        return $varValue;
    }
    /**
     * Return the edit form wizard
     *
     * @param DataContainer $dc
     *
     * @return string
     */
    public function editForm(\Contao\DataContainer $dc)
    {
        if ($dc->value < 1) {
            return '';
        }
        $title = \sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'], $dc->value);
        $href = \Contao\System::getContainer()->get('router')->generate('contao_backend', array('do' => 'form', 'table' => 'tl_form_field', 'id' => $dc->value, 'popup' => '1', 'nb' => '1'));
        return ' <a href="' . \Contao\StringUtil::specialcharsUrl($href) . '" title="' . \Contao\StringUtil::specialchars($title) . '" onclick="Backend.openModalIframe({\'title\':\'' . \Contao\StringUtil::specialchars(\str_replace("'", "\\'", $title)) . '\',\'url\':this.href});return false">' . \Contao\Image::getHtml('alias.svg', $title) . '</a>';
    }
    /**
     * Get all forms and return them as array
     *
     * @return array
     */
    public function getForms()
    {
        $user = \Contao\BackendUser::getInstance();
        if (!$user->isAdmin && !\is_array($user->forms)) {
            return array();
        }
        $arrForms = array();
        $objForms = \Contao\Database::getInstance()->execute("SELECT id, title FROM tl_form ORDER BY title");
        $security = \Contao\System::getContainer()->get('security.helper');
        while ($objForms->next()) {
            if ($security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_EDIT_FORM, $objForms->id)) {
                $arrForms[$objForms->id] = $objForms->title . ' (ID ' . $objForms->id . ')';
            }
        }
        return $arrForms;
    }
    /**
     * Return the edit module wizard
     *
     * @param DataContainer $dc
     *
     * @return string
     */
    public function editModule(\Contao\DataContainer $dc)
    {
        if ($dc->value < 1) {
            return '';
        }
        // DataContainer::getCurrentRecord() will check permission on the record
        try {
            $module = $dc->getCurrentRecord($dc->value, 'tl_module');
        } catch (\Contao\CoreBundle\Exception\AccessDeniedException) {
            return '';
        }
        $title = \sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'], $module['id']);
        $href = \Contao\System::getContainer()->get('router')->generate('contao_backend', array('do' => 'themes', 'table' => 'tl_module', 'act' => 'edit', 'id' => $module['id'], 'popup' => '1', 'nb' => '1'));
        return ' <a href="' . \Contao\StringUtil::specialcharsUrl($href) . '" title="' . \Contao\StringUtil::specialchars($title) . '" onclick="Backend.openModalIframe({\'title\':\'' . \Contao\StringUtil::specialchars(\str_replace("'", "\\'", $title)) . '\',\'url\':this.href});return false">' . \Contao\Image::getHtml('alias.svg', $title) . '</a>';
    }
    /**
     * Dynamically set the ace syntax
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return string
     */
    public function setRteSyntax($varValue, \Contao\DataContainer $dc)
    {
        switch ($dc->activeRecord->highlight) {
            case 'C':
            case 'CSharp':
                $syntax = 'c_cpp';
                break;
            case 'CSS':
            case 'Diff':
            case 'Groovy':
            case 'HTML':
            case 'Java':
            case 'JavaScript':
            case 'Perl':
            case 'PHP':
            case 'PowerShell':
            case 'Python':
            case 'Ruby':
            case 'Scala':
            case 'SQL':
            case 'Text':
            case 'Twig':
            case 'YAML':
                $syntax = \strtolower($dc->activeRecord->highlight);
                break;
            case 'VB':
                $syntax = 'vbscript';
                break;
            case 'XML':
            case 'XHTML':
                $syntax = 'xml';
                break;
            default:
                $syntax = 'text';
                break;
        }
        if ($dc->activeRecord->type == 'markdown') {
            $syntax = 'markdown';
        }
        $GLOBALS['TL_DCA']['tl_content']['fields']['code']['eval']['rte'] = 'ace|' . $syntax;
        return $varValue;
    }
    /**
     * Add a link to the list items import wizard
     *
     * @return string
     */
    public function listImportWizard()
    {
        return ' <a href="' . $this->addToUrl('key=list') . '" title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['lw_import'][1]) . '" data-action="contao--scroll-offset#store">' . \Contao\Image::getHtml('tablewizard.svg', $GLOBALS['TL_LANG']['MSC']['tw_import'][0]) . '</a>';
    }
    /**
     * Add a link to the table items import wizard
     *
     * @return string
     */
    public function tableImportWizard()
    {
        return ' <a href="' . $this->addToUrl('key=table') . '" title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['tw_import'][1]) . '" data-action="contao--scroll-offset#store">' . \Contao\Image::getHtml('tablewizard.svg', $GLOBALS['TL_LANG']['MSC']['tw_import'][0]) . '</a> ' . \Contao\Image::getHtml('demagnify.svg', '', 'title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['tw_shrink']) . '" style="cursor:pointer" onclick="Backend.tableWizardResize(0.9)"') . \Contao\Image::getHtml('magnify.svg', '', 'title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['tw_expand']) . '" style="cursor:pointer" onclick="Backend.tableWizardResize(1.1)"');
    }
    /**
     * Dynamically add flags to the "singleSRC" field
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function setSingleSrcFlags($varValue, \Contao\DataContainer $dc)
    {
        if ($dc->activeRecord) {
            switch ($dc->activeRecord->type) {
                case 'text':
                case 'hyperlink':
                case 'image':
                case 'accordionSingle':
                case 'youtube':
                case 'vimeo':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = '%contao.image.valid_extensions%';
                    break;
                case 'download':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = \Contao\Config::get('allowedDownload');
                    break;
                case 'markdown':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = 'md';
                    break;
            }
        }
        return $varValue;
    }
    /**
     * Dynamically add flags to the "multiSRC" field
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function setMultiSrcFlags($varValue, \Contao\DataContainer $dc)
    {
        if ($dc->activeRecord) {
            switch ($dc->activeRecord->type) {
                case 'gallery':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isGallery'] = \true;
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = '%contao.image.valid_extensions%';
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['mandatory'] = !$dc->activeRecord->useHomeDir;
                    break;
                case 'downloads':
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isDownloads'] = \true;
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = \Contao\Config::get('allowedDownload');
                    $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['mandatory'] = !$dc->activeRecord->useHomeDir;
                    break;
            }
        }
        return $varValue;
    }
    /**
     * Extract the YouTube ID from a URL
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function extractYouTubeId($varValue, \Contao\DataContainer $dc)
    {
        if ($dc->activeRecord->youtube != $varValue) {
            $matches = array();
            if (\preg_match('%(?:youtube(?:-nocookie)?\\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\\.be/)([^"&?/ ]{11})%i', $varValue, $matches)) {
                $varValue = $matches[1];
            }
        }
        return $varValue;
    }
    /**
     * Extract the Vimeo ID from a URL
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function extractVimeoId($varValue, \Contao\DataContainer $dc)
    {
        if ($dc->activeRecord->vimeo != $varValue) {
            $matches = array();
            if (\preg_match('%vimeo\\.com/(?:channels/(?:\\w+/)?|groups/(?:[^/]+)/videos/|album/(?:\\d+)/video/|video/)?(\\d+)(?:$|/|\\?)%i', $varValue, $matches)) {
                // Unlisted video privacy hash
                if (\preg_match('%[?&]h=([0-9a-z]+)%i', $varValue, $matchesHash)) {
                    $varValue = $matches[1] . '?h=' . $matchesHash[1];
                } else {
                    $varValue = $matches[1];
                }
            }
        }
        return $varValue;
    }
}
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_autogrid');
\Contao\System::loadLanguageFile('default');
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'selfCheckReferences');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\DcaHelper', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'modifyDCA');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'showInfoInGridPresets');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'observeClipboard');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'toggleBlockAjaxListener');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'createFlexFromPreset');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'toggleAutogridViewport');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'toggleAutoGridFieldValue');
#$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\DcaHelper', 'setReadOnlyFieldValues');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\DcaHelper', 'buttonAjaxListener');
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'], 0, array(array('PCT\\AutoGrid\\DcaHelper', 'deleteBlockListener')));
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'createSiblingStopElement');
$GLOBALS['TL_DCA']['tl_content']['config']['ondelete_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'deleteSiblings');
$GLOBALS['TL_DCA']['tl_content']['config']['oncopy_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'storeNewElements');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'updateNewElements');
$GLOBALS['TL_DCA']['tl_content']['config']['oncut_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'oncut_toggleAutoGrid');
$GLOBALS['TL_DCA']['tl_content']['config']['oncopy_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'oncopy_toggleAutoGrid');
$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'activateAutoGridInFlexRows');
if ((bool) \Contao\Config::get('pct_autogrid_disable_be_preview') === \false) {
    $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\AutoGrid\\Backend\\TableContent', 'adjustLimit');
    $GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback'] = array('PCT\\AutoGrid\\Backend\\TableContent', 'listRecord');
}
/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid_bg_type';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid_addStyling';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['autogrid'] = 'autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_offset,autogrid_align,autogrid_class,autogrid_addStyling';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['autogrid_addStyling'] = 'utogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding';
/**
 * Palettes
 */
// selectors
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'autogrid_sticky';
// subpalettes
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['autogrid_sticky'] = 'autogrid_sticky_offset';
// Autogrid Col (Columns)
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart'] = '{type_legend},type,autogrid_align,autogrid_align_mobile,autogrid_sticky;{autogrid_bg_legend:hide},autogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridRowStart'] = '{type_legend},type,autogrid_css,autogrid_tablet,autogrid_mobile,autogrid_align,autogrid_align_mobile,autogrid_sticky;{autogrid_bg_legend:hide},autogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridGridStart'] = 'autogrid_align,autogrid_align_mobile,autogrid_sticky;{autogrid_bg_legend:hide},autogrid_bgcolor,autogrid_bgimage,autogrid_bgposition,autogrid_bgrepeat,autogrid_bgsize,autogrid_styles,autogrid_padding_css,autogrid_padding;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStop'] = '{template_legend:hide},customTpl';
// Autogrid Row
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridRowStart'] = '{type_legend},type,autogrid_gutter,autogrid_sameheight;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridRowStop'] = '{template_legend:hide},customTpl';
// Autogrid Grid
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridGridStart'] = '{type_legend},autogrid_css,autogrid_tablet,autogrid_mobile;autogrid_offset,autogrid_gutter,autogrid_sameheight;{template_legend},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridGridStop'] = '{template_legend:hide},customTpl';
/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'], 0, $GLOBALS['PCT_AUTOGRID']['fields']);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'], 0, $GLOBALS['PCT_AUTOGRID']['autogrid_fields']);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'], 0, array(
    // grid preset
    'autogrid_grid' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_grid'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getGridPresets'), 'reference' => &$GLOBALS['TL_LANG']['autogrid_grid'], 'eval' => array('tl_class' => 'clr', 'includeBlankOption' => \true, 'chosen' => \true, 'submitOnChange' => \true, 'mandatory' => \true), 'sql' => "varchar(128) NOT NULL default ''"),
    // background
    'autogrid_bgcolor' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['bgcolor'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 6, 'multiple' => \true, 'size' => 2, 'colorpicker' => \true, 'isHexColor' => \true, 'decodeEntities' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(64) NOT NULL default ''"),
    'autogrid_bgimage' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['bgimage'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50 wizard'), 'eval' => array('filesOnly' => \true, 'extensions' => \Contao\Config::get('validImageTypes'), 'fieldType' => 'radio', 'dcaPicker' => array('do' => 'files', 'context' => 'file', 'icon' => 'pickfile.svg', 'fieldType' => 'radio', 'filesOnly' => \true, 'extensions' => \Contao\Config::get('validImageTypes')), 'tl_class' => 'w50 wizard'), 'save_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'saveUuidFromPath')), 'load_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'loadPathFromUuid')), 'sql' => "varchar(255) NOT NULL default ''"),
    'autogrid_bgposition' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['bgposition'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('left top', 'left center', 'left bottom', 'center top', 'center center', 'center bottom', 'right top', 'right center', 'right bottom'), 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'autogrid_bgrepeat' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['bgrepeat'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'), 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'autogrid_bgsize' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_bgsize'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
    'autogrid_padding' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_padding'], 'exclude' => \true, 'inputType' => 'trbl', 'options' => array('px', '%', 'em', 'rem'), 'eval' => array('includeBlankOption' => \true, 'rgxp' => 'digit_', 'tl_class' => 'w50'), 'sql' => "varchar(128) NOT NULL default ''"),
    'autogrid_padding_css' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_padding_css'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getPaddingClasses'), 'reference' => &$GLOBALS['TL_LANG']['dca_autogrid']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(8) NOT NULL default ''"),
    'autogrid_styles' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_styles'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
    'autogrid_addStyling' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_addStyling'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'autogrid_sticky' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_sticky'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'autogrid_sticky_offset' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_sticky_offset'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(8) NOT NULL default ''"),
));
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\CustomElements\\Backend\\TableContent', 'modifyDca');
/**
 * Fields
 */
// increase the default field size
$GLOBALS['TL_DCA']['tl_content']['fields']['type']['sql']['length'] = 128;
$GLOBALS['TL_DCA']['tl_content']['fields']['pct_customelement']['sql'] = 'longblob NULL';
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
 * @link		http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('tl_revolutionslider_slides');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('RevolutionSlider\\Backend\\TableContent', 'modifyPalettes');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('RevolutionSlider\\Backend\\TableContent', 'hideFields');
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider'] = '{type_legend},type,headline;{select_legend},revolutionslider;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video'] = '{type_legend},type,revolutionslider_videoType;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video_local'] = '{type_legend},type,revolutionslider_videoType;{source_legend},multiSRC,singleSRC;{video_settings_legend},revolutionslider_video_size,revolutionslider_data_autoplay,revolutionslider_video_loop,revolutionslider_data_nextslideatend,revolutionslider_video_controls;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video_external'] = '{type_legend},type,revolutionslider_videoType;{source_legend},url;{video_settings_legend},revolutionslider_video_size,revolutionslider_video_aspect,revolutionslider_data_autoplay,revolutionslider_video_loop,revolutionslider_data_nextslideatend,revolutionslider_video_controls;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_text'] = '{type_legend},type;{text_legend},text,revolutionslider_text_fontsize,revolutionslider_text_bold,revolutionslider_text_italic;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_image'] = '{type_legend},type;{source_legend},singleSRC;{image_legend},alt,imageTitle,size,imageUrl,fullsize,useSVG;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_hyperlink'] = '{type_legend},type;{link_legend},url,target,linkTitle,embed,titleText,rel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'revolutionslider_videoType';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'revolutionslider_OUT';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'revolutionslider_frames';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['revolutionslider_OUT'] = 'revolutionslider_data_animation_end,revolutionslider_data_easing_OUT,revolutionslider_data_speed_OUT,revolutionslider_data_start_OUT';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['revolutionslider_frames'] = 'revolutionslider_data_frames';
/**
 * Dynamically add the parent table
 */
if (\Contao\Input::get('do') == 'revolutionslider') {
    $GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_revolutionslider_slides';
    $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('RevolutionSlider\\Backend\\TableContent', 'modifyDCA');
    // remove revolutionslider from cte list to avoid adding a rs as content
    unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider']);
    // remove cte from selection
    if ($GLOBALS['REVOLUTIONSLIDER']['isBundledVersion']) {
        $arrAllowedCte = array('headline', 'text', 'image', 'hyperlink', 'revolutionslider_video');
        $arrAllowedIncludes = array();
        $arrAllowed = \array_merge($arrAllowedCte, $arrAllowedIncludes);
        foreach ($GLOBALS['TL_CTE'] as $node => $arrCte) {
            foreach ($arrCte as $type => $class) {
                if (!\in_array($type, $arrAllowed)) {
                    unset($GLOBALS['TL_CTE'][$node][$type]);
                }
            }
        }
    }
    // add slider palette on top of all available content elements
    foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $cteType => $palette) {
        if (\in_array($cteType, array('__selector__', 'revolutionslider')) || \in_array($cteType, $GLOBALS['REVOLUTIONSLIDER']['cteIgnoreList'])) {
            continue;
        }
        $GLOBALS['TL_DCA']['tl_content']['palettes'][$cteType] = '{effect_legend:hide},revolutionslider_data_animation_start,revolutionslider_data_easing,revolutionslider_data_speed,revolutionslider_data_start,revolutionslider_OUT,revolutionslider_frames,{position_legend:hide},revolutionslider_data_pos9grid,revolutionslider_data_position,revolutionslider_data_position_m;{slide_legend:hide},revolutionslider_parallax,revolutionslider_visibility,revolutionslider_hideMobile;' . $palette;
    }
} else {
    $request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
    if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) && \Contao\Input::get('do') == 'article') {
        // dont show the video cte outside the revolution slider backend
        unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_text']);
        unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_image']);
        unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_hyperlink']);
        unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_video']);
    }
}
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('RevolutionSlider\\Backend\\TableContent', 'getSliders'), 'eval' => array('tl_class' => 'clr w50', 'insertBlankOption' => \true, 'chosen' => \true), 'wizard' => array(array('RevolutionSlider\\Backend\\TableContent', 'getEditSliderButton')), 'sql' => "int(10) NOT NULL default '0'");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_easing'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_easing'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('RevolutionSlider\\Core\\RevolutionSlider', 'getTransitionEasings'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_speed'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_speed'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(8) NOT NULL default '0.5'");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_start'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_start'], 'exclude' => \true, 'inputType' => 'text', 'default' => 0, 'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'), 'sql' => "varchar(4) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_animation_start'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_animation_start'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'fade', 'options_callback' => array('RevolutionSlider\\Core\\RevolutionSlider', 'getStartAnimationClasses'), 'reference' => $GLOBALS['TL_LANG']['revolutionSliderAnimationClasses'], 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(32) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_animation_end'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_animation_end'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'fadeout', 'options_callback' => array('RevolutionSlider\\Core\\RevolutionSlider', 'getEndAnimationClasses'), 'reference' => $GLOBALS['TL_LANG']['revolutionSliderAnimationClasses'], 'eval' => array('tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_position'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_position'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50 clr'), 'sql' => "varchar(96) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_position_m'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_position_m'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50'), 'sql' => "varchar(96) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_pos9grid'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_pos9grid'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('left top', 'center top', 'right top', 'left center', 'center center', 'right center', 'left bottom', 'center bottom', 'right bottom'), 'reference' => $GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgposition'], 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true, 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_autoplay'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_autoplay'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_nextslideatend'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_nextslideatend'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_OUT'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_OUT'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr long', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_videoType'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_videoType'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'local', 'options' => array('local', 'external'), 'reference' => $GLOBALS['TL_LANG']['tl_content']['revolutionslider_videoType'], 'eval' => array('submitOnChange' => \true, 'chosen' => \true, 'tl_class' => 'w50', 'includeBlankOption' => \true), 'sql' => "varchar(16) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_controls'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_controls'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_loop'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_loop'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_size'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_size'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'rgxp' => 'extnd', 'nospace' => \true, 'tl_class' => 'clr w50', 'size' => 2), 'sql' => "varchar(64) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_aspect'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_aspect'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('16:9', '16:10', '21:9', '4:3', '3:2'), 'eval' => array('includeBlankOption' => \true, 'nospace' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(8) NOT NULL default ''");
// rs text element
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_text_bold'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_text_bold'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_text_italic'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_text_italic'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_text_fontsize'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_text_fontsize'], 'exclude' => \true, 'inputType' => 'text', 'default' => '14', 'eval' => array('tl_class' => 'w50', 'multiple' => \true, 'size' => 2, 'rgxp' => 'digit'), 'sql' => "varchar(128) NOT NULL default ''");
// OUT going animations
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_easing_OUT'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_easing'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('RevolutionSlider\\Core\\RevolutionSlider', 'getTransitionEasings'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_speed_OUT'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_speed'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50 clr', 'rgxp' => 'digit'), 'sql' => "varchar(8) NOT NULL default '0.5'");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_start_OUT'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_start'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'), 'sql' => "varchar(4) NOT NULL default ''");
// data-frames
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_frames'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_frames'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => '', 'submitOnChange' => \true, 'decodeEntities' => \true), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_frames'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_frames'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'clr long'), 'sql' => "mediumtext NULL");
$GLOBALS['TL_DCA']['tl_content']['fields']['useSVG'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['useSVG'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'm12 w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_visibility'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_visibility'], 'exclude' => \true, 'inputType' => 'select', 'options' => array(1, 2), 'reference' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_visibility_ref'], 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_parallax'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_parallax'], 'exclude' => \true, 'inputType' => 'select', 'options' => \range(1, 30), 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true), 'sql' => "char(2) NOT NULL default ''");
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2020
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['privacy_iframe'] = '{type_legend},type,headline;privacy_url,privacy_size,privacy_level;{protected_legend:hide},protected;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID,space';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['privacy_url'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['privacy_url'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'url', 'decodeEntities' => \true, 'dcaPicker' => \true, 'tl_class' => 'wizard'), 'sql' => "mediumtext NULL");
$GLOBALS['TL_DCA']['tl_content']['fields']['privacy_size'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['privacy_size'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['privacy_level'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['privacy_level'], 'default' => 1, 'exclude' => \true, 'inputType' => 'select', 'options' => array(1, 2, 3), 'eval' => array('tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default '0'");
}

namespace {
// Dynamically add the permission check and other callbacks
if (\Contao\Input::get('do') == 'calendar') {
    \Contao\System::loadLanguageFile('tl_calendar_events');
    $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('tl_content_calendar', 'generateFeed');
}
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @property Calendar $Calendar
 *
 * @internal
 */
class tl_content_calendar extends \Contao\Backend
{
    /**
     * Check for modified calendar feeds and update the XML files if necessary
     */
    public function generateFeed()
    {
        $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
        $session = $objSession->get('calendar_feed_updater');
        if (empty($session) || !\is_array($session)) {
            return;
        }
        $request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
        if ($request) {
            $origScope = $request->attributes->get('_scope');
            $request->attributes->set('_scope', 'frontend');
        }
        $calendar = new \Contao\Calendar();
        foreach ($session as $id) {
            $calendar->generateFeedsByCalendar($id);
        }
        if ($request) {
            $request->attributes->set('_scope', $origScope);
        }
        $objSession->set('calendar_feed_updater', \null);
    }
}
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2019 Leo Feyer
 *
 * @copyright   Tim Gatzky 2019
 * @author      Tim Gatzky <info@tim-gatzky.de>
 * @package     pct_theme_settings
 * @link        http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_theme_settings');
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableContent', 'modifyDca');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableContent', 'enableViewportPanel');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\BackendIntegration', 'loadAssets');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableContent', 'addThemeSettingsButton');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableContent', 'toggleThemeSettingsFieldValue');
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['text'] = \str_replace('text;', 'text,align_css,color_css,format_css,width_css,seo;', $GLOBALS['TL_DCA']['tl_content']['palettes']['text']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['headline'] = \str_replace('headline', 'headline,align_css,color_css,width_css,seo;', $GLOBALS['TL_DCA']['tl_content']['palettes']['headline']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['hyperlink'] = \str_replace('rel', 'rel,align_css,color_css,border_css,format_css,animate_style_css,icon_position;', $GLOBALS['TL_DCA']['tl_content']['palettes']['hyperlink']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['accordionSingle'] = \str_replace('mooClasses', 'mooClasses,style_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['accordionSingle']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['accordionStart'] = \str_replace('mooClasses', 'mooClasses,style_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['accordionStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['list'] = \str_replace('listtype', 'listtype,style_css,color_css', $GLOBALS['TL_DCA']['tl_content']['palettes']['list']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['table'] = \str_replace('tleft', 'tleft,style_css,color_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['table']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart'] = \str_replace('autogrid_padding;', 'autogrid_padding,color_css,bgcolor_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridRowStart'] = \str_replace('autogrid_padding;', 'autogrid_padding,color_css,bgcolor_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridRowStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridGridStart'] = \str_replace('autogrid_padding;', 'autogrid_padding,color_css,bgcolor_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_autogridGridStart']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_text'] = \str_replace('revolutionslider_text_fontsize,', 'revolutionslider_text_fontsize,color_css,', $GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_text']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_hyperlink'] = \str_replace('rel', 'rel,color_css,border_css,format_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_hyperlink']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['image'] = \str_replace('overwriteMeta', 'overwriteMeta,align_css,border_css,style_css;', $GLOBALS['TL_DCA']['tl_content']['palettes']['image']);
$GLOBALS['TL_DCA']['tl_content']['palettes']['pct_contentelementset_start'] = '{type_legend},type,headline;;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['pct_contentelementset_stop'] = '';
// export content element sets
$GLOBALS['TL_DCA']['tl_content']['select']['buttons_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableContent', 'buttonsCallback');
// redirect to key=contentelementset after user clicked the paste button
$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
    if (\Contao\Input::get('rkey') == 'contentelementset' && \Contao\Input::get('act') == 'create') {
        \Contao\Controller::redirect(\Contao\Controller::addToUrl('rkey=&amp;key=contentelementset&rt=' . \Contao\Input::get('rt')));
    }
    // Content element set export has been called, redirect to export page
    if ((bool) \Contao\Config::get('contentelementset_export') === \true && \Contao\Input::post('contentelementset_export') != '' && !empty($_POST['IDS'])) {
        // store the selected element ids in the session
        $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
        $objSession->set('contentelementset_export_ids', \Contao\Input::post('IDS'));
        $_SESSION['contentelementset_export_ids'] = \Contao\Input::post('IDS');
        // redirect to the export interface
        \Contao\Controller::redirect(\Contao\Controller::addToUrl('key=contentelementset_export&rt=' . \Contao\Input::get('rt')));
    }
}
/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'], 0, $GLOBALS['PCT_THEME_SETTINGS']['fields']);
$fields = array(
    'align_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['align_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['align_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['align_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'color_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['color_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'bgcolor_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'border_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['border_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['border_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['border_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'style_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['style_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['style_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['style_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'format_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['format_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['format_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['format_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'width_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['width_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['content_width_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['width_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
    'seo' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['seo'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    'visibility_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'helper_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\ThemeSettings\\Backend\\TableContent', 'getThemeHelperClasses'), 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'], 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'multiple' => \true, 'tl_class' => 'w50'), 'sql' => "text null"),
    // animation
    'animation_type' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_type'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['animation_type_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_type'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(96) NOT NULL default ''"),
    'animation_speed' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_speed'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['animation_speed_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_speed'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'animation_delay' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_delay'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['animation_delay_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_delay'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    // general margin fields
    'margin_t' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'margin_b' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'margin_t_m' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t_m'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_m_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'margin_b_m' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b_m'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_m_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'animate_style_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animate_style_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['animate_style_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animate_style_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
    'icon_position' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['icon_position'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('icon-pos-before', 'icon-pos-after'), 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['icon_position'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'], 0, $fields);
}

namespace {
/**
 * Restrict content elements
 */
if (\PCT\CustomElements\Plugins\CustomCatalog\Core\Controller::isBackend() && \in_array(\Contao\Input::get('act'), array('edit', 'editAll', 'overrideAll'))) {
    $objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_content');
    $objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchCurrent();
    if ($objCC !== \null) {
        $strTable = $objCC->mode == 'new' ? $objCC->tableName : $objCC->existingTable;
        $arrChildTables = \Contao\StringUtil::deserialize($objCC->cTables) ?: array();
        if (\count($arrChildTables) < 1) {
            return;
        }
        foreach ($arrChildTables as $childTable) {
            if (\strlen(\strpos($childTable, '::')) < 1) {
                continue;
            }
            // fetch the custom catalog configs for tl_content
            $objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog WHERE restrictCte=1 AND mode=? AND existingTable=? AND pTable=?")->execute('existing', 'tl_content', $strTable);
            if ($objResult->numRows > 0) {
                while ($objResult->next()) {
                    if (\strlen($objResult->restrictedCte) < 1) {
                        continue;
                    }
                    // remove the content elements
                    $objDcaHelper->removeContentElements(\Contao\StringUtil::deserialize($objResult->restrictedCte));
                }
            }
        }
    }
}
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\\IconPicker\\Backend\\TableContent', 'modifyDca');
/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'addFontIcon';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['addFontIcon'] = 'fontIcon';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['addFontIcon'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['addFontIcon'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_content']['fields']['fontIcon'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['fontIcon'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'wizard pct_iconpicker_widget w50 contao-ht35'), 'explanation' => 'fontIcons', 'wizard' => array(array('PCT\\IconPicker\\IconPicker', 'fontIconPicker')), 'load_callback' => array(), 'sql' => "varchar(32) NOT NULL default ''");
}

namespace {
// Add palette to tl_content
$GLOBALS['TL_DCA']['tl_content']['palettes']['comments'] = '{type_legend},type,headline;{comment_legend},com_order,com_perPage,com_moderate,com_bbcode,com_requireLogin,com_disableCaptcha;{template_legend:hide},com_template,customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop';
// Add fields to tl_content
$GLOBALS['TL_DCA']['tl_content']['fields']['com_order'] = array('inputType' => 'select', 'options' => array('ascending', 'descending'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default 'ascending'");
$GLOBALS['TL_DCA']['tl_content']['fields']['com_perPage'] = array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0");
$GLOBALS['TL_DCA']['tl_content']['fields']['com_moderate'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_content']['fields']['com_bbcode'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_content']['fields']['com_disableCaptcha'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_content']['fields']['com_requireLogin'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_content']['fields']['com_template'] = array('inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('com_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
}
