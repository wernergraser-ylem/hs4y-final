<?php

namespace {
\Contao\System::loadLanguageFile('tl_pct_customelement_attribute');
/**
 * Table tl_pct_customelement_vault
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_vault'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'closed' => \true, 'enableVersioning' => \true, 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index', 'source' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => 1, 'fields' => array('source', 'type'), 'headerFields' => array('source', 'type'), 'panelLayout' => 'filter,search,limit'), 'label' => array('fields' => array('type'), 'format' => '%s'), 'global_operations' => array('all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"')), 'operations' => array('edit' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_vault']['edit'], 'href' => 'act=edit', 'icon' => 'edit.svg'), 'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_vault']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['delete'][1] . '\'))return false;Backend.getScrollOffset()"'), 'show' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_vault']['show'], 'href' => 'act=show', 'icon' => 'show.svg'))),
    // Palettes
    'palettes' => array('__selector__' => array(), 'default' => '{title_legend},type,title;{settings_legend},colName;{template_legend},template;{expert_legend:hide},cssID,published;'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('sql' => "int(10) unsigned NOT NULL default '0'"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default '0'"), 'source' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_vault']['source'], 'exclude' => \true, 'filter' => \true, 'inputType' => 'text', 'eval' => array('readonly' => \true), 'sql' => "varchar(32) NOT NULL default ''"), 'type' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_vault']['type'], 'filter' => \true, 'sql' => "varchar(32) NOT NULL default ''"), 'attr_id' => array('sql' => "int(10) unsigned NOT NULL default '0'"), 'attr_uuid' => array('sql' => "varchar(255) NOT NULL default ''"), 'cattr_uuid' => array('sql' => "varchar(255) NOT NULL default ''"), 'data' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_vault']['data'], 'sql' => "varchar(255) NOT NULL default ''"), 'data_binary' => array('sql' => "binary(16) NULL"), 'data_blob' => array('sql' => "longblob NULL"), 'data_text' => array('sql' => "mediumtext NULL")),
);
// do not create table
// if it already exists, keep it as fallback
if (\Contao\Database::getInstance()->tableExists('tl_pct_customelement_vault') === \false) {
    unset($GLOBALS['TL_DCA']['tl_pct_customelement_vault']);
}
}
