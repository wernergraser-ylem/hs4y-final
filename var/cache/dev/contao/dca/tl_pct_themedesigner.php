<?php

namespace {
$arrThemes = $GLOBALS['PCT_THEMER']['THEMES'];
if (!\is_array($arrThemes)) {
    $arrThemes = array();
}
$arrLabels = array();
foreach ($arrThemes as $k => $v) {
    $arrLabels[$k] = $v['label'] ?? '';
}
/**
 * Table tl_pct_themedesigner
 */
$GLOBALS['TL_DCA']['tl_pct_themedesigner'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'closed' => \true, 'ondelete_callback' => array(array('PCT\\ThemeDesigner\\Backend', 'deleteCSSFile')), 'onload_callback' => array(array('PCT\\ThemeDesigner\\Backend', 'showUserInformationWhenActive')), 'sql' => array('keys' => array('id' => 'primary')), 'notCopyable' => \true, 'notSortable' => \true, 'notEditable' => \true),
    // List
    'list' => array('sorting' => array('mode' => 0, 'flag' => 1, 'fields' => array('theme'), 'panelLayout' => 'filter;sort,search,limit'), 'label' => array('fields' => array('tstamp', 'theme', 'description'), 'label_callback' => array('PCT\\ThemeDesigner\\Backend', 'listLabel')), 'global_operations' => array('toggleMode' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['toggleMode'], 'href' => 'themedesigner_hidden=' . (\Contao\Config::get('pct_themedesigner_hidden') ? '0' : '1'), 'class' => 'header_toggle_mode' . (\Contao\Config::get('pct_themedesigner_hidden') ? ' is_active ' : ' is_live '), 'attributes' => 'onclick="Backend.getScrollOffset();"', 'button_callback' => array('PCT\\ThemeDesigner\\Backend', 'getToggleThemeDesignerButton')), 'all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"')), 'operations' => array('delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_themedesigner']['delete'], 'href' => 'act=delete', 'icon' => 'delete.gif', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'), 'active' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_themedesigner']['active'], 'icon' => \PCT_THEMER_PATH . '/assets/img/active_on.gif', 'button_callback' => array('PCT\\ThemeDesigner\\Backend', 'getActiveButton')))),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default '0'"), 'theme' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_themedesigner']['theme'], 'filter' => \true, 'options' => \array_keys($arrThemes), 'reference' => $arrLabels, 'sql' => "varchar(128) NOT NULL default ''"), 'description' => array('sql' => "varchar(255) NOT NULL default ''"), 'active' => array('sql' => "char(1) NOT NULL default ''", 'save_callback' => array(array('PCT\\ThemeDesigner\\Backend', 'writeCSS'))), 'data' => array('sql' => "blob NULL")),
);
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2021 Leo Feyer
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */
$GLOBALS['TL_DCA']['tl_pct_themedesigner']['config']['onload_callback'][] = array('PCT\\FrontendQuickEdit\\Backend\\TableThemeDesigner', 'modifyDCA');
}
