<?php

namespace {
/**
 * Load language files
 */
\Contao\Controller::loadLanguageFile('tl_article');
/**
 * Table tl_pct_customelement_filter
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_filter'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_pct_customelement_filterset', 'enableVersioning' => \true, 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index')), 'onsubmit_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad')), 'ondelete_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad'))),
    // List
    'list' => array('sorting' => array('mode' => 4, 'fields' => array('sorting'), 'headerFields' => array('title'), 'flag' => 1, 'panelLayout' => 'filter;search,limit', 'child_record_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'listRecords')), 'label' => array('fields' => array('title'), 'format' => '%s'), 'global_operations' => array('all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"')), 'operations' => array('edit' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['edit'], 'href' => 'act=edit', 'icon' => 'edit.svg'), 'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['copy'], 'href' => 'act=paste&amp;mode=copy', 'icon' => 'copy.svg'), 'cut' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['cut'], 'href' => 'act=paste&amp;mode=cut', 'icon' => 'cut.gif'), 'toggle' => array(
        'label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['toggle'],
        'icon' => 'visible.svg',
        'href' => 'act=toggle&amp;field=published',
        #'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s);"',
        'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'toggleIcon'),
    ), 'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'), 'show' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['show'], 'href' => 'act=show', 'icon' => 'show.svg'))),
    // Palettes
    'palettes' => array('__selector__' => array('type', 'conditional'), 'default' => '{title_legend},type,be_description,title,description;{settings_legend},;{template_legend},template;{expert_legend},urlparam,isStrict,cssID,published;'),
    // Subpalettes
    'subpalettes' => array('conditional' => 'conditional_filters'),
    // Fields
    'fields' => array(
        'id' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL auto_increment"),
        'pid' => array('foreignKey' => 'tl_pct_customelement_filterset.title', 'sql' => "int(10) unsigned NOT NULL default '0'", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')),
        'sorting' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'tstamp' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default '0'"),
        // be description
        'be_description' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['be_description'], 'exclude' => \true, 'eval' => array('tl_class' => 'long'), 'input_field_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getBackendDescription')),
        'title' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['title'], 'exclude' => \true, 'search' => \true, 'filter' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'mode' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['mode'], 'exclude' => \true, 'sql' => "varchar(64) NOT NULL default ''"),
        'type' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['type'], 'exclude' => \true, 'filter' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getFilters'), 'eval' => array('mandatory' => \true, 'chosen' => \true, 'includeBlankOption' => \true, 'tl_class' => '', 'submitOnChange' => \true), 'sql' => "varchar(128) NOT NULL default ''"),
        'description' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['description'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'clr long'), 'sql' => "varchar(255) NOT NULL default ''"),
        'template' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['template'], 'exclude' => \true, 'default' => 'customcatalog_filter_default', 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getTemplates'), 'eval' => array('chosen' => \true), 'sql' => "varchar(128) NOT NULL default ''"),
        'published' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['published'], 'exclude' => \true, 'toggle' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
        'cssID' => array('label' => &$GLOBALS['TL_LANG']['tl_article']['cssID'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50 clr'), 'sql' => "varchar(255) NOT NULL default ''"),
        // default fields to use
        'attr_id' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['attr_id'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getAttributes'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true, 'mandatory' => \true, 'distinctField' => 'alias'), 'sql' => "int(10) NOT NULL default '0'"),
        'attr_ids' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['attr_ids'], 'exclude' => \true, 'inputType' => 'checkbox', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getAttributes'), 'eval' => array('tl_class' => '', 'chosen' => \true, 'multiple' => \true, 'includeBlankOption' => \true, 'mandatory' => \true), 'sql' => "blob NULL"),
        'urlparam' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['urlparam'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'rgxp' => 'alias', 'maxlength' => 64), 'sql' => "varchar(64) NOT NULL default ''"),
        'isStrict' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['isStrict'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => "char(1) NOT NULL default ''"),
        'label' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['label'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'defaultValue' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['defaultValue'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'clr w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'defaultMulti' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['defaultMulti'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'tl_class' => 'clr w50'), 'sql' => "text NULL"),
        'includeReset' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['includeReset'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "char(1) NOT NULL default ''"),
        'module_id' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['module_id'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getModules'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "int(10) NOT NULL default '0'"),
        'config_id' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['config_id'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getConfigurations'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "int(10) NOT NULL default '0'"),
        'conditional' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['conditional'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
        'conditional_filters' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['conditional_filters'], 'exclude' => \true, 'inputType' => 'checkbox', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilter', 'getSiblingFilters'), 'eval' => array('tl_class' => 'clr', 'multiple' => \true, 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "blob NULL"),
        'min_value' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['min_value'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50 clr', 'rgxp' => 'digit'), 'sql' => "char(10) NOT NULL default '0'"),
        'max_value' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['max_value'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'), 'sql' => "char(10) NOT NULL default '0'"),
        'steps_value' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filter']['steps_value'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'), 'sql' => "char(6) NOT NULL default '0'"),
    ),
);
// Load filters and language files
\PCT\CustomElements\Loader\FilterLoader::loadDcaFiles('tl_pct_customelement_filter');
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFiles('tl_pct_customelement_filter');
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFiles('filters');
}
