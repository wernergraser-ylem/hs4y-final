<?php

namespace {
/**
 * Load language file
 */
\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadLanguageFile', array('default'));
\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadLanguageFile', array('tl_module'));
\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadLanguageFile', array('tl_content'));
/**
 * Table tl_pct_customelement
 */
$GLOBALS['TL_DCA']['tl_pct_customelement'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ctable' => array('tl_pct_customelement_group'), 'switchToEdit' => \true, 'enableVersioning' => \true, 'onload_callback' => array(array('PCT\\CustomElements\\Backend\\TableCustomElement', 'checkPermission')), 'onsubmit_callback' => array(array('PCT\\CustomElements\\Helper\\DcaHelper', 'setUpdateFlag')), 'oncopy_callback' => array(array('PCT\\CustomElements\\Backend\\TableCustomElement', 'setAttributeUuidOnCopy')), 'sql' => array('keys' => array('id' => 'primary', 'alias' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => 1, 'fields' => array('title'), 'flag' => 1, 'panelLayout' => 'filter;search,limit'), 'label' => array('fields' => array('title'), 'format' => '%s'), 'global_operations' => array('import' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['import'], 'href' => 'key=import', 'class' => 'header_import', 'attributes' => 'onclick="Backend.getScrollOffset();"'), 'all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"')), 'operations' => array('editheader' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['edit'], 'href' => 'act=edit', 'icon' => 'edit.svg', 'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElement', 'editHeader')), 'children' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['edit'], 'href' => 'table=tl_pct_customelement_group', 'icon' => 'children.svg'), 'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['copy'], 'href' => 'act=copy', 'icon' => 'copy.svg', 'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElement', 'copyButton')), 'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"', 'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElement', 'deleteButton')), 'show' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['show'], 'href' => 'act=show', 'icon' => 'show.svg'), 'export' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['export'], 'href' => 'key=export', 'icon' => 'theme_export.svg', 'button_callback' => array('PCT\\CustomElements\\Plugins\\Export\\TableCustomElement', 'exportButton')))),
    // Palettes
    'palettes' => array('__selector__' => array('protected'), 'default' => '{title_legend},title,alias;{settings_legend},isCTE,isFMD,isWrapper;{template_legend},template;{protected_legend:hide},protected;{expert_legend:hide},cssID;'),
    // Subpalettes
    'subpalettes' => array('protected' => 'user_groups,users'),
    // Fields
    'fields' => array('id' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL auto_increment"), 'tstamp' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default '0'"), 'alias' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['alias'], 'exclude' => \true, 'inputType' => 'text', 'search' => \true, 'eval' => array('rgxp' => 'folderalias', 'doNotCopy' => \true, 'unique' => \true, 'maxlength' => 128, 'tl_class' => 'w50'), 'save_callback' => array(array('PCT\\CustomElements\\Backend\\TableCustomElement', 'generateAlias')), 'sql' => "varchar(255) BINARY NOT NULL default ''"), 'title' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['title'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'isCTE' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['isCTE'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"), 'isFMD' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['isFMD'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"), 'isWrapper' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['isWrapper'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('start', 'stop', 'divider'), 'reference' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['isWrapper'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(8) NOT NULL default ''"), 'template' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['template'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'customelement_simple', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElement', 'getTemplates'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''"), 'protected' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['protected'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => '', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"), 'user_groups' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['user_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_user_group.name', 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'cssID' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['cssID'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''")),
);
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '<')) {
    $edit = $GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations']['children'];
    $edit['icon'] = 'edit.svg';
    $editheader = $GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations']['editheader'];
    $editheader['icon'] = 'header.svg';
    unset($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations']['edit']);
    unset($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations']['editheader']);
    \Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations'], 0, array('editheader' => $editheader));
    \Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations'], 0, array('edit' => $edit));
}
}

namespace {
/**
 * Check Permission and inject the custom catalog button
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement');
// Config
$GLOBALS['TL_DCA']['tl_pct_customelement']['config']['ctable'][] = 'tl_pct_customcatalog';
// enable the database check
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'enableDatabaseUpdateCheck');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'enableDatabaseUpdateCheck');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeFileCache');
$pos = \array_search('children', \array_keys($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations']));
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement']['list']['operations'], $pos + 1, array('customcatalog' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['editconfig'], 'href' => 'table=tl_pct_customcatalog', 'icon' => \PCT_CUSTOMCATALOG_PATH . '/assets/img/icon.png', 'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElement', 'customCatalogButton'))));
}
