<?php

namespace {
/**
 * Table tl_pct_customelement_filterset
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_filterset'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_pct_customcatalog', 'ctable' => array('tl_pct_customelement_filter'), 'switchToEdit' => \true, 'enableVersioning' => \true, 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index')), 'onsubmit_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad')), 'ondelete_callback' => array(array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad'))),
    // List
    'list' => array('sorting' => array('mode' => 4, 'fields' => array('title'), 'headerFields' => array('title'), 'flag' => 1, 'panelLayout' => 'filter;search,limit', 'child_record_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilterset', 'listRecords')), 'label' => array('fields' => array('title'), 'format' => '%s'), 'global_operations' => array('all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"')), 'operations' => array('editheader' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['editheader'], 'href' => 'act=edit', 'icon' => 'edit.svg'), 'children' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['edit'], 'href' => 'table=tl_pct_customelement_filter', 'icon' => 'children.svg'), 'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['copy'], 'href' => 'act=copy', 'icon' => 'copy.svg'), 'cut' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['cut'], 'href' => 'act=paste&amp;mode=cut', 'icon' => 'cut.gif'), 'toggle' => array(
        'label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['toggle'],
        'icon' => 'visible.svg',
        'href' => 'act=toggle&amp;field=published',
        #'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s);"',
        'button_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementFilterset', 'toggleIcon'),
    ), 'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'), 'show' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['show'], 'href' => 'act=show', 'icon' => 'show.svg'))),
    // Palettes
    'palettes' => array('__selector__' => array(), 'default' => '{title_legend},title;{expert_legend},published;'),
    // Subpalettes
    'subpalettes' => array(),
    // Fields
    'fields' => array('id' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('foreignKey' => 'tl_pct_customelement.title', 'sql' => "int(10) unsigned NOT NULL default '0'", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'tstamp' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default '0'"), 'title' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['title'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'published' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_filterset']['published'], 'exclude' => \true, 'toggle' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''")),
);
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '<')) {
    $edit = $GLOBALS['TL_DCA']['tl_pct_customelement_filterset']['list']['operations']['children'];
    $edit['icon'] = 'edit.svg';
    $editheader = $GLOBALS['TL_DCA']['tl_pct_customelement_filterset']['list']['operations']['editheader'];
    $editheader['icon'] = 'header.svg';
    unset($GLOBALS['TL_DCA']['tl_pct_customelement_filterset']['list']['operations']['edit']);
    unset($GLOBALS['TL_DCA']['tl_pct_customelement_filterset']['list']['operations']['editheader']);
    \Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement_filterset']['list']['operations'], 0, array('editheader' => $editheader));
    \Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement_filterset']['list']['operations'], 0, array('edit' => $edit));
}
}
