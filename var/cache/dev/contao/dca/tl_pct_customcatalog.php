<?php

namespace {
/**
 * Load language file
 */
$this->loadLanguageFile('tl_module');
$this->loadLanguageFile('tl_content');
$this->loadLanguageFile('tl_news_archive');
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFiles('tl_pct_customcatalog');
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customcatalog');
$objActiveRecord = $objDcaHelper->getActiveRecord();
/**
 * Table tl_pct_customcatalog
 */
$GLOBALS['TL_DCA']['tl_pct_customcatalog'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_pct_customelement', 'ctable' => array('tl_pct_customelement_filterset'), 'enableVersioning' => \true, 'onload_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'checkPermission'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'modifyPalette')), 'ondelete_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'deleteFolder'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'enableDatabaseUpdateCheck'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeFileCache')), 'onsubmit_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'enableDatabaseUpdateCheck'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'createBaseLanguageEntries'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad'), array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeFileCache')), 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => 4, 'fields' => array('title'), 'headerFields' => array('title'), 'flag' => 1, 'panelLayout' => 'filter;search,limit', 'child_record_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'listRecords')), 'label' => array('fields' => array('title'), 'format' => '%s'), 'global_operations' => array('all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"')), 'operations' => array('edit' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['edit'], 'href' => 'act=edit', 'icon' => 'edit.svg', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getButtonWithCreateRights')), 'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['copy'], 'href' => 'act=copy', 'icon' => 'copy.svg', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getButtonWithCreateRights')), 'active' => array(
        'label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['active'],
        'icon' => \PCT_CUSTOMCATALOG_PATH . '/assets/img/active_on.svg',
        'href' => 'act=toggle&amp;field=active',
        #	'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleCustomCatalogActiveState(this,%s);"',
        'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'toggleIcon'),
    ), 'filterset' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['filterset'], 'href' => 'table=tl_pct_customelement_filterset', 'icon' => 'filter-apply.svg', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getButtonWithCreateRights')), 'api' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['api'], 'href' => 'table=tl_pct_customcatalog_api', 'icon' => 'modules.svg', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getButtonWithCreateRights')), 'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getButtonWithDeleteRights')), 'show' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['show'], 'href' => 'act=show', 'icon' => 'show.svg'))),
);
/**
 * Palettes
 */
$arrPalettes = array('title_legend' => array('title', 'useTitleAsName'), 'config_legend' => array('mode', 'tableName'), 'settings_legend:hide' => array('pTable', 'cTables', 'moreTables'), 'list_legend:hide' => array('list_mode', 'list_fields', 'list_flag', 'list_panelLayout', 'list_headerFields', 'list_operations', 'publishedField'), 'output_legend:hide' => array('aliasField', 'sitemapField', 'jumpTo'), 'label_legend:hide' => array('label_overwrite'), 'integration_legend' => array('newSection', 'beSection', 'injectBelow', 'icon', 'showMenu'), 'language_legend:hide' => array('multilanguage'), 'comments_legend:hide' => array('allowComments'), 'protected_legend:hide' => array(), 'expert_legend' => array('active'));
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes']['default'] = $objDcaHelper->generatePalettes($arrPalettes);
// existing mode
$arrPalettes = array();
$arrPalettes['title_legend'] = array('title');
$arrPalettes['config_legend'] = array('mode', 'existingTable', 'pTable');
$arrPalettes['restriction_legend'] = array('restrictCte');
$arrPalettes['expert_legend'] = array('isManageable', 'active');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes']['existing'] = $objDcaHelper->generatePalettes($arrPalettes);
/**
 * Subpalettes and Selectors
 */
$objDcaHelper->addSelector('mode', 'pTable', 'multilanguage');
$objDcaHelper->addSubpalette('moreTables', array('tables'));
$objDcaHelper->addSubpalette('protected', array('user_groups', 'users'));
$objDcaHelper->addSubpalette('newSection', array('sectionName', 'sectionAlias'));
$objDcaHelper->addSubpalette('label_overwrite', array('label_html'));
$objDcaHelper->addSubpalette('multilanguage', array('languages'));
$objDcaHelper->addSubpalette('allowComments', array('com_notify', 'com_sortOrder', 'com_perPage', 'com_moderate', 'com_bbcode', 'com_requireLogin', 'com_disableCaptcha'));
$objDcaHelper->addSubpalette('restrictCte', array('restrictedCte'));
/**
 * Fields
 */
$objDcaHelper->addFields(array(
    // !general
    'id' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL auto_increment"),
    'pid' => array('foreignKey' => 'tl_pct_customelement.title', 'sql' => "int(10) unsigned NOT NULL default '0'", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')),
    'tstamp' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default '0'"),
    'title' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['title'], 'exclude' => \true, 'search' => \true, 'filter' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'clr w50'), 'sql' => "varchar(255) NOT NULL default ''"),
    'useTitleAsName' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['useTitleAsName'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    'protected' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['protected'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => '', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'user_groups' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['user_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_user_group.name', 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')),
    // !settings
    'tableName' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['tableName'], 'exclude' => \true, 'inputType' => 'text', 'save_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'standardizeTableName')), 'eval' => array('tl_class' => 'w50', 'mandatory' => \true, 'unique' => \true, 'rgxp' => 'alias', 'doNotCopy' => \true, 'maxlength' => 128), 'sql' => "varchar(128) NOT NULL default ''"),
    'mode' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['mode'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'new', 'options' => array('new', 'existing'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['mode'], 'eval' => array('tl_class' => 'w50 clr', 'chosen' => \true, 'submitOnChange' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'moreTables' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['moreTables'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'tables' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['tables'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getTables'), 'eval' => array('tl_class' => 'clr', 'multiple' => \true, 'chosen' => \true), 'sql' => "blob NULL"),
    'cTables' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['cTables'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getTables'), 'eval' => array('tl_class' => 'clr', 'multiple' => \true, 'chosen' => \true), 'sql' => "blob NULL"),
    'pTable' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['pTable'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getTables'), 'save_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'updateParentTableRecord')), 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true, 'chosen' => \true, 'submitOnChange' => \true), 'sql' => "blob NULL"),
    'existingTable' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['existingTable'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getTables'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(128) NOT NULL default ''"),
    // !integration
    'beSection' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['beSection'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getMainBackendSections'), 'eval' => array('tl_class' => 'w50 clr', 'chosen' => \true, 'submitOnChange' => \true, 'includeBlankOption' => \true), 'sql' => "varchar(64) NOT NULL default '0'"),
    'injectBelow' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['injectBelow'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getInnerBackendSections'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['injectBelow'], 'eval' => array('tl_class' => 'w50 clr', 'chosen' => \true, 'includeBlankOption' => 0), 'sql' => "varchar(64) NOT NULL default '0'"),
    'newSection' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['newSection'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'sectionName' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['sectionName'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50 clr', 'mandatory' => \true), 'sql' => "varchar(128) NOT NULL default ''"),
    'sectionAlias' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['sectionAlias'], 'exclude' => \true, 'inputType' => 'text', 'save_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'generateSectionAlias')), 'eval' => array('rgxp' => 'folderalias', 'tl_class' => 'w50', 'unique' => \true, 'doNotCopy' => \true), 'sql' => "varchar(255) BINARY NOT NULL default ''"),
    'hidden' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['hidden'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    'showMenu' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['showMenu'], 'exclude' => \true, 'default' => 1, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "char(1) NOT NULL default '1'"),
    'icon' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['icon'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"),
    'active' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['active'], 'exclude' => \true, 'toggle' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    'publishedField' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['publishedField'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getCheckboxAttributes'), 'eval' => array('tl_class' => 'clr', 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "int(10) NOT NULL default '0'"),
    'isManageable' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['isManageable'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''", 'expert' => \true),
    // ![list] fields
    'list_mode' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_mode'], 'exclude' => \true, 'inputType' => 'select', 'default' => 1, 'options' => array(0, 1, 2, 3, 4, 5, '5.1', 6), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_mode']['ref'], 'eval' => array('tl_class' => 'w50'), 'sql' => "char(8) NOT NULL default '1'"),
    'list_fields' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_fields'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getAttributes'), 'eval' => array('tl_class' => 'clr', 'chosen' => \true, 'multiple' => \true, 'includeBlankOption' => \true, 'includeSystemColumns' => \true), 'sql' => "blob NULL"),
    'list_headerFields' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_headerFields'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getParentAttributes'), 'eval' => array('tl_class' => 'clr', 'multiple' => \true, 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "blob NULL"),
    'list_flag' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_flag'], 'exclude' => \true, 'inputType' => 'select', 'default' => 1, 'options' => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_flag']['ref'], 'eval' => array('tl_class' => 'w50 clr', 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "char(8) NOT NULL default '1'"),
    'list_panelLayout' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_panelLayout'], 'exclude' => \true, 'inputType' => 'text', 'default' => 'filter;sort;search,limit', 'eval' => array('tl_class' => 'clr'), 'sql' => "varchar(64) NOT NULL default ''"),
    'list_disableGrouping' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_disableGrouping'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    'list_operations' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_operations'], 'exclude' => \true, 'inputType' => 'checkboxWizard', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getListOperations'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['list_operations'], 'eval' => array('tl_class' => 'clr', 'multiple' => \true), 'sql' => "blob NULL"),
    // ![list][label] fields
    'label_overwrite' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['label_overwrite'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => '', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'label_html' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['label_html'], 'exclude' => \true, 'search' => \true, 'inputType' => 'textarea', 'eval' => array('mandatory' => \true, 'allowHtml' => \true, 'class' => 'monospace', 'rte' => 'ace|html', 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "mediumtext NULL"),
    // !output
    'aliasField' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['aliasField'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getAliasAttributes'), 'eval' => array('tl_class' => 'clr', 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "int(10) NOT NULL default '0'"),
    'sitemapField' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['sitemapField'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getAttributes'), 'eval' => array('tl_class' => 'clr', 'chosen' => \true, 'includeBlankOption' => \true, 'option_values' => array('url', 'text', 'pagetree'), 'option_key' => 'id'), 'sql' => "int(10) NOT NULL default '0'"),
    'jumpTo' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['jumpTo'], 'exclude' => \true, 'inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "int(10) unsigned NOT NULL default '0'", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')),
    // !multilanguage
    'multilanguage' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['multilanguage'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'languages' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['languages'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getLanguagesFormSystem'), 'eval' => array('mandatory' => \true, 'tl_class' => 'clr', 'multiple' => \true, 'chosen' => \true), 'sql' => "blob NULL"),
    // comments
    'allowComments' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['allowComments'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'com_notify' => array('label' => &$GLOBALS['TL_LANG']['tl_news_archive']['notify'], 'default' => 'notify_admin', 'exclude' => \true, 'inputType' => 'select', 'options' => array('notify_admin'), 'reference' => &$GLOBALS['TL_LANG']['tl_news_archive'], 'sql' => "varchar(16) NOT NULL default ''"),
    'com_sortOrder' => array('label' => &$GLOBALS['TL_LANG']['tl_news_archive']['sortOrder'], 'default' => 'ascending', 'exclude' => \true, 'inputType' => 'select', 'options' => array('ascending', 'descending'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'com_perPage' => array('label' => &$GLOBALS['TL_LANG']['tl_news_archive']['perPage'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default '0'"),
    'com_moderate' => array('label' => &$GLOBALS['TL_LANG']['tl_news_archive']['moderate'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    'com_bbcode' => array('label' => &$GLOBALS['TL_LANG']['tl_news_archive']['bbcode'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    'com_requireLogin' => array('label' => &$GLOBALS['TL_LANG']['tl_news_archive']['requireLogin'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    'com_disableCaptcha' => array('label' => &$GLOBALS['TL_LANG']['tl_news_archive']['disableCaptcha'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    // restrictions
    'restrictCte' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['restrictCte'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'restrictedCte' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['restrictedCte'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('\\PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomCatalog', 'getContentElements'), 'reference' => &$GLOBALS['TL_LANG']['CTE'], 'eval' => array('chosen' => \true, 'multiple' => \true, 'mandatory' => \true), 'sql' => "blob NULL"),
));
// load attribute dca files
\PCT\CustomElements\Loader\AttributeLoader::loadDcaFiles('tl_pct_customcatalog');
}
