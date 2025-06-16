<?php

namespace {
/**
 * Table tl_pct_customcatalog_api
 */
$GLOBALS['TL_DCA']['tl_pct_customcatalog_api'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_pct_customcatalog', 'ctable' => array('tl_pct_customcatalog_job'), 'switchToEdit' => \false, 'onload_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'redirectToUndo'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'modifyDCA')), 'onsubmit_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad')), 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => 4, 'fields' => array('title'), 'headerFields' => array('title', 'tableName'), 'panelLayout' => 'filter;search,limit', 'child_record_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'listRecords')), 'label' => array('fields' => array('type', 'mode', 'cronjob', 'backup'), 'format' => '%s'), 'global_operations' => array('all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"')), 'operations' => array(
        'edit' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['edit'], 'href' => 'act=edit', 'icon' => 'edit.svg'),
        'job' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['job'], 'href' => 'table=tl_pct_customcatalog_job', 'icon' => 'editor.svg'),
        'ready' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['ready'], 'href' => 'key=ready', 'icon' => 'forward.gif', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getReadyButton')),
        'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['copy'], 'href' => 'act=copy', 'icon' => 'copy.svg'),
        #'cut' => array
        #(
        #   'label'               => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['cut'],
        #   'href'                => 'act=paste&amp;mode=cut',
        #   'icon'                => 'cut.gif',
        #),
        'toggle' => array(
            'label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['toggle'],
            'icon' => 'visible.svg',
            'href' => 'act=toggle&amp;field=published',
            #'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s);"',
            'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'toggleIcon'),
        ),
        'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'),
        'undo' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['undo'], 'href' => '', 'icon' => 'news.gif', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getUndoButton')),
    )),
    // Palettes
    'palettes' => array('__selector__' => array('mode', 'type', 'cronjob', 'source', 'target', 'backup'), 'default' => '{title_legend},type,be_description;', 'standard' => '{title_legend},type,mode,be_description;'),
    // Subpalettes
    'subpalettes' => array('cronjob' => 'cron', 'source_table' => 'tableSRC', 'source_file' => 'delimiter,singleSRC', 'source_template' => 'templateSRC', 'target_hook' => 'hookSRC', 'target_template' => 'filenameLogic,sendToBrowser', 'target_csv' => 'filenameLogic,delimiter,path,sendToBrowser'),
    // Fields
    'fields' => array(
        'id' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL auto_increment"),
        'pid' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'sorting' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'tstamp' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default '0'"),
        // API settings
        'type' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['type'], 'exclude' => \true, 'filter' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getAPIs'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['type'], 'eval' => array('tl_class' => 'w50', 'submitOnChange' => \true, 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "varchar(255) NOT NULL default ''"),
        'mode' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['mode'], 'exclude' => \true, 'filter' => \true, 'inputType' => 'select', 'default' => 'import', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getModes'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['mode'], 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'submitOnChange' => \true, 'includeBlankOption' => \true), 'sql' => "varchar(255) NOT NULL default ''"),
        'be_description' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['description'], 'exclude' => \true, 'eval' => array('tl_class' => 'long'), 'input_field_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getBackendDescription')),
        // settings legend
        'title' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['title'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'description' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['description'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        // data settings
        'source' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['source'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('table', 'file', 'template'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['source'], 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true, 'submitOnChange' => \true), 'sql' => "varchar(32) NOT NULL default ''"),
        'target' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['target'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('hook', 'template', 'csv'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['target'], 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true, 'submitOnChange' => \true), 'sql' => "varchar(255) NOT NULL default ''"),
        // sources
        'tableSRC' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['tableSRC'], 'exclude' => \true, 'inputType' => 'select', 'options' => \Contao\Database::getInstance()->listTables(), 'eval' => array('mandatory' => \true, 'tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true, 'submitOnChange' => \true), 'sql' => "varchar(255) NOT NULL default ''"),
        'singleSRC' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['singleSRC'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio', 'extensions' => 'csv', 'tl_class' => 'w50'), 'sql' => "binary(16) NULL"),
        'templateSRC' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['templateSRC'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getImportTemplates'), 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(128) NOT NULL default ''"),
        'hookSRC' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['hookSRC'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getHooks'), 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        // file exports
        'filenameLogic' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['filenameLogic'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'sendToBrowser' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['sendToBrowser'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'path' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['path'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"),
        // update rules settings
        'uniqueSource' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['uniqueSource'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getForeignFields'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true, 'submitOnChange' => \true), 'sql' => "varchar(255) NOT NULL default ''"),
        'uniqueTarget' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['uniqueTarget'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalogApi', 'getCurrentFields'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true, 'submitOnChange' => \true), 'sql' => "varchar(255) NOT NULL default ''"),
        'allowUpdate' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['allowUpdate'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50'), 'sql' => "char(1) NOT NULL default ''"),
        'allowInsert' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['allowInsert'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
        'allowDelete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['allowDelete'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'purgeTable' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['purgeTable'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => ''), 'sql' => "char(1) NOT NULL default ''"),
        'delimiter' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['delimiter'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('comma', 'semicolon', 'tab'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['delimiter'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
        // cronjob settings
        'cronjob' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['cronjob'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => '', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
        'cron' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['cron'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('weekly', 'daily', 'hourly', 'minutely'), 'reference' => $GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['cron'], 'eval' => array('tl_class' => 'clr'), 'sql' => "varchar(32) NOT NULL default ''"),
        // backup settings
        'backup' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['backup'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => '', 'submitOnChange' => \false), 'sql' => "char(1) NOT NULL default ''"),
        // resources settings
        'maxRange' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['maxRange'], 'exclude' => \true, 'inputType' => 'select', 'default' => 1, 'options' => array(1, 5, 10, 30, 50, 100, 250, 500, 1000), 'eval' => array('rgxp' => 'digit', 'tl_class' => '', 'maxlength' => 5, 'includeBlankOption' => \true, 'chosen' => \true), 'sql' => "int(5) NOT NULL default '1'"),
        'isPublished' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['isPublished'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => ''), 'sql' => "char(1) NOT NULL default ''"),
        // expert settings
        'published' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog_api']['published'], 'exclude' => \true, 'toggle' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    ),
);
// Load filters and language files
\PCT\CustomElements\Loader\ApiLoader::loadDcaFiles('tl_pct_customcatalog_api');
\PCT\CustomElements\Loader\ApiLoader::loadLanguageFiles('tl_pct_customcatalog_api');
\PCT\CustomElements\Loader\ApiLoader::loadLanguageFiles('apis');
}
