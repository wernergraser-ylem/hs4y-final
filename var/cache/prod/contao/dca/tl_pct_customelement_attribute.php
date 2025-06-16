<?php

namespace {
foreach (array('default', 'tl_module', 'tl_content', 'tl_pct_customelement', 'attributes', 'tl_pct_customelement_attribute') as $k) {
    \Contao\System::loadLanguageFile($k);
}
/**
 * Table tl_pct_customelement_attribute
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_pct_customelement_group', 'enableVersioning' => \true, 'onload_callback' => array(array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'checkPermission'), array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'loadFieldDefinitionByAttributeType')), 'onsubmit_callback' => array(array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'generateUuidOnSubmit'), array('PCT\\CustomElements\\Helper\\DcaHelper', 'setUpdateFlag')), 'oncut_callback' => array(array('PCT\\CustomElements\\Helper\\DcaHelper', 'setUpdateFlag')), 'oncopy_callback' => array(array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'clearUuidOnCopy'), array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'generateUuidOnCopy'), array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'doNotCopyAlias')), 'ondelete_callback' => array(array('PCT\\CustomElements\\Helper\\DcaHelper', 'setUpdateFlag'), array('PCT\\CustomElements\\Helper\\DcaHelper', 'removeFromVault')), 'sql' => array('keys' => array('id' => 'primary', 'pid' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => 4, 'fields' => array('sorting'), 'headerFields' => array('title'), 'panelLayout' => 'search,limit', 'child_record_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'listAttributes')), 'label' => array('Attributes' => array('title', 'type'), 'format' => '%s', 'label_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'getLabel')), 'global_operations' => array('all' => array('label' => &$GLOBALS['TL_LANG']['MSC']['all'], 'href' => 'act=select', 'class' => 'header_edit_all', 'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"')), 'operations' => array('edit' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['edit'], 'href' => 'act=edit', 'icon' => 'edit.svg', 'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'editButton')), 'copy' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['copy'], 'href' => 'act=paste&amp;mode=copy', 'icon' => 'copy.svg', 'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'copyButton')), 'cut' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['cut'], 'href' => 'act=paste&amp;mode=cut', 'icon' => 'cut.svg', 'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'cutButton')), 'delete' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['delete'], 'href' => 'act=delete', 'icon' => 'delete.svg', 'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['delete'][1] . '\'))return false;Backend.getScrollOffset()"', 'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'deleteButton')), 'toggle' => array(
        'href' => 'act=toggle&amp;field=published',
        'label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['toggle'],
        'icon' => 'visible.svg',
        #'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
        'button_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'toggleIcon'),
    ), 'show' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['show'], 'href' => 'act=show', 'icon' => 'show.svg'))),
    // Palettes
    'palettes' => array('__selector__' => array('protected', 'type'), 'default' => '{title_legend},type,be_description,title,description;'),
    // Subpalettes
    'subpalettes' => array('protected' => 'user_groups,users'),
    // Fields
    'fields' => array(
        'id' => array('eval' => array('doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL auto_increment"),
        'pid' => array('foreignKey' => 'tl_pct_customelement_group.title', 'sql' => "int(10) unsigned NOT NULL default '0'", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')),
        'sorting' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'tstamp' => array('sql' => "int(10) unsigned NOT NULL default '0'"),
        'uuid' => array('inputType' => 'text', 'eval' => array('doNotCopy' => \true, 'readonly' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
        #'clones' => array
        #(
        #	'sql'                     => "blob NULL"
        #),
        'alias' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['alias'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'folderalias', 'doNotCopy' => \false, 'unique' => \false, 'maxlength' => 128, 'tl_class' => 'w50'), 'save_callback' => array(array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'generateAliasAgainstCustomElement')), 'sql' => "varchar(255) BINARY NOT NULL default ''"),
        'type' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['type'], 'default' => 'text', 'exclude' => \true, 'filter' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'getAttributes'), 'reference' => $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES'], 'eval' => array('chosen' => \true, 'submitOnChange' => \true), 'sql' => "varchar(32) NOT NULL default ''"),
        'title' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['title'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        // be description
        'be_description' => array('label' => array(), 'exclude' => \true, 'eval' => array('tl_class' => 'long clr'), 'input_field_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'getBackendDescription')),
        'description' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['description'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'clr long', 'allowHtml' => \true), 'sql' => "varchar(255) NOT NULL default ''"),
        'template' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['template'], 'exclude' => \true, 'default' => 'customelement_attr_default', 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'getTemplates'), 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''"),
        'protected' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['protected'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => '', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
        'user_groups' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement']['user_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_user_group.name', 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')),
        'cssID' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['cssID'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'published' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['published'], 'exclude' => \true, 'filter' => \true, 'toggle' => \true, 'flag' => 1, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
        'options' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'], 'exclude' => \true, 'inputType' => 'checkboxWizard', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'getAttributeOptions'), 'load_callback' => array(
            #	array('PCT\CustomElements\Backend\TableCustomElementAttribute','loadFieldDefinitionByAttributeType'),
            array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'loadFieldLabelByAttributeType'),
        ), 'eval' => array('tl_class' => 'clr', 'multiple' => \true), 'sql' => "blob NULL"),
        'hidden' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['hidden'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'defaultValue' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['defaultValue'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'long', 'allowHtml' => \true), 'sql' => "mediumtext NULL"),
        'size' => array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'inputType' => 'imageSize', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'options_callback' => static function () {
            return \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions();
        }, 'eval' => array('rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true, 'tl_class' => 'w50 clr'), 'sql' => "varchar(128) COLLATE ascii_bin NOT NULL default ''"),
        // eval default fields
        'eval_mandatory' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_mandatory'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_rgxp' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_rgxp'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableCustomElementAttribute', 'getRgpxOptions'), 'reference' => $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_rgxp'], 'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'includeBlankOption' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
        'eval_rowscols' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_rowscols'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'multiple' => \true, 'size' => 2), 'sql' => "varchar(255) NOT NULL default ''"),
        'eval_multiple' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_multiple'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_size' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_size'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'maxlength' => 3, 'rgxp' => 'digit'), 'sql' => "char(3) NOT NULL default ''"),
        'eval_rte' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_rte'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_submitOnChange' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_submitOnChange'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_allowHtml' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_allowHtml'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_files' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_files'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_filesOnly' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_filesOnly'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_extensions' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_extensions'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'eval_path' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_path'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('fieldType' => 'radio', 'tl_class' => 'w50'), 'sql' => "binary(16) NULL"),
        'eval_attributeType' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_attributeType'], 'exclude' => \true, 'inputType' => 'radio', 'options' => array('radio', 'checkbox'), 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
        'eval_includeBlankOption' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_includeBlankOption'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_datepicker' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_datepicker'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_pagepicker' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_pagepicker'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_tl_style' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_tl_style'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
        'eval_minlength' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_minlength'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "int(10) NOT NULL default '0'"),
        'eval_maxlength' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_maxlength'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "int(10) NOT NULL default '0'"),
        // field alignments, tl_class
        'eval_tl_class_w50' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_tl_class_w50'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_tl_class_clr' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_tl_class_clr'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_tl_class_m12' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_tl_class_m12'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        'eval_tl_class_long' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_tl_class_long'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
        // more backend rendering options
        'be_visible' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['be_visible'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"),
    ),
);
// Load the default palette before loading attribute palettes and any other dca file for this table
$objTable = new \PCT\CustomElements\Backend\TableCustomElementAttribute();
$objTable->loadDefaultPalette('tl_pct_customelement_attribute');
\PCT\CustomElements\Loader\AttributeLoader::loadDcaFiles('tl_pct_customelement_attribute');
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFiles('tl_pct_customelement_attribute');
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */
/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
// Modify the dca on load
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onload_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementAttribute', 'modifyDca');
// Disable the save_callback for the alias field
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementAttribute', 'disableAliasGeneration');
// Enable the database update alert check
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'enableDatabaseUpdateCheck');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'enableDatabaseUpdateCheck');
// Let the quickmenu rebuild
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'rebuildMenuOnPageLoad');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['onsubmit_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeFileCache');
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['config']['ondelete_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeFileCache');
/**
 * Subpalettes
 */
$objDcaHelper->addSubpalette('isSelector', array('subpalettes'));
$objDcaHelper->addSubpalette('isToggler', array('icon', 'icon_off'));
/**
 * Fields
 */
$objDcaHelper->addFields(array('isSelector' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isSelector'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"), 'subpalettes' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['subpalettes']['attribute_mode'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementAttribute', 'getAttributesForSubpalettes'), 'eval' => array('tl_class' => 'clr', 'multiple' => \true, 'chosen' => \true), 'sql' => "blob NULL"), 'be_filter' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['be_filter'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "char(1) NOT NULL default ''"), 'be_search' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['be_search'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"), 'be_sorting' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['be_sorting'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"), 'isToggler' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isToggler'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"), 'icon' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['icon'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio', 'tl_class' => 'clr w50', 'mandatory' => \true), 'sql' => "binary(16) NULL"), 'icon_off' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['icon_off'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio', 'tl_class' => 'w50', 'mandatory' => \true), 'sql' => "binary(16) NULL"), 'eval_unique' => array('label' => &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['eval_unique'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''")));
// sanitize alias
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['alias']['save_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementAttribute', 'sanitizeAlias');
// purge file cache
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['published']['save_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper', 'purgeFileCacheOnSaveCallback');
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
$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['config']['onload_callback'][] = array('PCT\\IconPicker\\Backend\\TableCustomElementAttribute', 'modifyDca');
}
