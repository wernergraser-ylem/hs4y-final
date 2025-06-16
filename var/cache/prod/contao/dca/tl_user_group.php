<?php

namespace {
\Contao\System::loadLanguageFile('tl_user');
$GLOBALS['TL_DCA']['tl_user_group'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'enableVersioning' => \true, 'onload_callback' => array(array('tl_user_group', 'addTemplateWarning')), 'sql' => array('keys' => array('id' => 'primary', 'tstamp' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_SORTED, 'fields' => array('name'), 'flag' => \Contao\DataContainer::SORT_INITIAL_LETTER_ASC, 'panelLayout' => 'filter;search,limit', 'defaultSearchField' => 'name'), 'label' => array('fields' => array('name'), 'format' => '%s', 'label_callback' => array('tl_user_group', 'addIcon'))),
    // Palettes
    'palettes' => array('default' => '{title_legend},name;{modules_legend},modules,themes,frontendModules;{elements_legend},elements,fields;{pagemounts_legend},pagemounts,alpty;{filemounts_legend},filemounts,fop;{imageSizes_legend},imageSizes;{forms_legend},forms,formp;{amg_legend},amg;{alexf_legend:hide},alexf;{account_legend},disable,start,stop'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'name' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'unique' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'modules' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['modules'], 'filter' => \true, 'inputType' => 'checkbox', 'options_callback' => array('tl_user_group', 'getModules'), 'reference' => &$GLOBALS['TL_LANG']['MOD'], 'eval' => array('multiple' => \true, 'helpwizard' => \true, 'collapseUncheckedGroups' => \true), 'sql' => "blob NULL"), 'themes' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['themes'], 'filter' => \true, 'inputType' => 'checkbox', 'options' => array('modules', 'layout', 'image_sizes', 'theme_import', 'theme_export'), 'reference' => &$GLOBALS['TL_LANG']['MOD'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL"), 'elements' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['elements'], 'filter' => \true, 'inputType' => 'checkbox', 'options_callback' => array('tl_user_group', 'getContentElements'), 'reference' => &$GLOBALS['TL_LANG']['CTE'], 'eval' => array('multiple' => \true, 'helpwizard' => \true, 'collapseUncheckedGroups' => \true), 'sql' => "blob NULL"), 'fields' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['fields'], 'filter' => \true, 'inputType' => 'checkbox', 'options' => \array_keys($GLOBALS['TL_FFL']), 'reference' => &$GLOBALS['TL_LANG']['FFL'], 'eval' => array('multiple' => \true, 'helpwizard' => \true), 'sql' => "blob NULL"), 'frontendModules' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['frontendModules'], 'filter' => \true, 'inputType' => 'checkbox', 'reference' => &$GLOBALS['TL_LANG']['FMD'], 'eval' => array('multiple' => \true, 'helpwizard' => \true, 'collapseUncheckedGroups' => \true), 'sql' => "blob NULL"), 'pagemounts' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['pagemounts'], 'inputType' => 'pageTree', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox'), 'sql' => "blob NULL", 'relation' => array('table' => 'tl_page', 'type' => 'hasMany', 'load' => 'lazy')), 'alpty' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['alpty'], 'default' => array('regular', 'redirect', 'forward'), 'inputType' => 'checkbox', 'reference' => &$GLOBALS['TL_LANG']['PTY'], 'eval' => array('multiple' => \true, 'helpwizard' => \true), 'sql' => "blob NULL"), 'filemounts' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['filemounts'], 'inputType' => 'fileTree', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox'), 'sql' => "blob NULL"), 'fop' => array('label' => &$GLOBALS['TL_LANG']['FOP']['fop'], 'default' => array('f1', 'f2', 'f3'), 'inputType' => 'checkbox', 'options' => array('f1', 'f2', 'f3', 'f4', 'f5', 'f6'), 'reference' => &$GLOBALS['TL_LANG']['FOP'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL"), 'imageSizes' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['imageSizes'], 'inputType' => 'checkbox', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true, 'collapseUncheckedGroups' => \true), 'options_callback' => static function () {
        return \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions();
    }, 'sql' => "blob NULL"), 'forms' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['forms'], 'inputType' => 'checkbox', 'foreignKey' => 'tl_form.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'formp' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['formp'], 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL"), 'amg' => array('label' => &$GLOBALS['TL_LANG']['tl_user']['amg'], 'inputType' => 'checkbox', 'foreignKey' => 'tl_member_group.name', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'alexf' => array('search' => \true, 'inputType' => 'checkbox', 'options_callback' => array('tl_user_group', 'getExcludedFields'), 'eval' => array('multiple' => \true, 'size' => 36, 'collapseUncheckedGroups' => \true), 'sql' => "blob NULL"), 'disable' => array('reverseToggle' => \true, 'filter' => \true, 'inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'start' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''"), 'stop' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''")),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_user_group extends \Contao\Backend
{
    /**
     * Add a warning if there are users with access to the template editor.
     */
    public function addTemplateWarning()
    {
        if (\Contao\Input::get('act') && \Contao\Input::get('act') != 'select') {
            return;
        }
        $objResult = \Contao\Database::getInstance()->query("SELECT EXISTS(SELECT * FROM tl_user_group WHERE modules LIKE '%\"tpl_editor\"%') as showTemplateWarning, EXISTS(SELECT * FROM tl_user_group WHERE themes LIKE '%\"theme_import\"%') as showThemeWarning, EXISTS(SELECT * FROM tl_user_group WHERE modules LIKE '%\"themes\"%' AND themes LIKE '%\"modules\"%' AND (alexf LIKE '%\"tl_module::list_table\"%' OR alexf LIKE '%\"tl_module::list_fields\"%' OR alexf LIKE '%\"tl_module::list_where\"%' OR alexf LIKE '%\"tl_module::list_search\"%' OR alexf LIKE '%\"tl_module::list_sort\"%' OR alexf LIKE '%\"tl_module::list_info\"%' OR alexf LIKE '%\"tl_module::list_info_where\"%')) as showListingWarning, EXISTS(SELECT * FROM tl_user_group WHERE alexf LIKE '%\"tl_content::unfilteredHtml\"%' OR alexf LIKE '%\"tl_module::unfilteredHtml\"%' OR elements LIKE '%\"unfiltered_html\"%') as showUnfilteredHtmlWarning");
        if ($objResult->showTemplateWarning > 0) {
            \Contao\Message::addInfo($GLOBALS['TL_LANG']['MSC']['groupTemplateEditor']);
        }
        if ($objResult->showThemeWarning > 0) {
            \Contao\Message::addInfo($GLOBALS['TL_LANG']['MSC']['groupThemeImport']);
        }
        if ($objResult->showListingWarning > 0) {
            \Contao\Message::addInfo($GLOBALS['TL_LANG']['MSC']['groupListingModule']);
        }
        if ($objResult->showUnfilteredHtmlWarning > 0) {
            \Contao\Message::addInfo($GLOBALS['TL_LANG']['MSC']['groupUnfilteredHtml']);
        }
    }
    /**
     * Add an image to each record
     *
     * @param array  $row
     * @param string $label
     *
     * @return string
     */
    public function addIcon($row, $label)
    {
        $image = 'group';
        $disabled = $row['start'] !== '' && $row['start'] > \time() || $row['stop'] !== '' && $row['stop'] <= \time();
        $icon = $image;
        if ($disabled || $row['disable']) {
            $image .= '--disabled';
        }
        return \sprintf('<div class="list_icon" style="background-image:url(\'%s\')" data-icon="%s" data-icon-disabled="%s">%s</div>', \Contao\Image::getUrl($image), \Contao\Image::getUrl($icon), \Contao\Image::getUrl($icon . '--disabled'), $label);
    }
    /**
     * Return all modules except profile modules
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getModules(\Contao\DataContainer $dc)
    {
        $arrModules = array();
        foreach ($GLOBALS['BE_MOD'] as $k => $v) {
            if (empty($v)) {
                continue;
            }
            foreach ($v as $kk => $vv) {
                if (isset($vv['disablePermissionChecks']) && $vv['disablePermissionChecks'] === \true) {
                    unset($v[$kk]);
                }
            }
            $arrModules[$k] = \array_keys($v);
        }
        $modules = \Contao\StringUtil::deserialize($dc->activeRecord->modules);
        // Unset the template editor unless the user is an administrator or has been granted access to the template editor
        if (!\Contao\BackendUser::getInstance()->isAdmin && (!\is_array($modules) || !\in_array('tpl_editor', $modules)) && ($key = \array_search('tpl_editor', $arrModules['design'])) !== \false) {
            unset($arrModules['design'][$key]);
            $arrModules['design'] = \array_values($arrModules['design']);
        }
        return $arrModules;
    }
    /**
     * Return all content elements
     *
     * @return array
     */
    public function getContentElements()
    {
        return \array_map('array_keys', $GLOBALS['TL_CTE']);
    }
    /**
     * Return all excluded fields as HTML drop down menu
     *
     * @return array
     */
    public function getExcludedFields()
    {
        $processed = array();
        $files = \Contao\System::getContainer()->get('contao.resource_finder')->findIn('dca')->depth(0)->files()->name('*.php');
        foreach ($files as $file) {
            if (\in_array($file->getBasename(), $processed)) {
                continue;
            }
            $processed[] = $file->getBasename();
            $strTable = $file->getBasename('.php');
            \Contao\System::loadLanguageFile($strTable);
            $this->loadDataContainer($strTable);
        }
        $arrReturn = array();
        $user = \Contao\BackendUser::getInstance();
        // Get all excluded fields
        foreach ($GLOBALS['TL_DCA'] as $k => $v) {
            if (\is_array($v['fields'] ?? \null)) {
                foreach ($v['fields'] as $kk => $vv) {
                    // Hide the "admin" field if the user is not an admin (see #184)
                    if ($k == 'tl_user' && $kk == 'admin' && !$user->isAdmin) {
                        continue;
                    }
                    if (\Contao\DataContainer::isFieldExcluded($k, $kk)) {
                        $arrReturn[$k][\Contao\StringUtil::specialchars($k . '::' . $kk)] = isset($vv['label'][0]) ? $vv['label'][0] . ' <span class="label-info">[' . $kk . ']</span>' : $kk;
                    }
                }
            }
        }
        \ksort($arrReturn);
        return $arrReturn;
    }
}
}

namespace {
// Extend the default palette
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('faq_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('faqs', 'faqp'), 'faq_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('default', 'tl_user_group');
// Add fields to tl_user_group
$GLOBALS['TL_DCA']['tl_user_group']['fields']['faqs'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['faqs'], 'inputType' => 'checkbox', 'foreignKey' => 'tl_faq_category.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user_group']['fields']['faqp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['faqp'], 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_pct_customelements
 * @link		http://contao.org
 */
/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['default'] = \str_replace('fop;', 'fop;{pct_customelement_legend},pct_customelements,pct_customelementsp,protect_pct_customelement_groups,pct_customelement_groupsp,protect_pct_customelement_attributes,pct_customelement_attributesp;', $GLOBALS['TL_DCA']['tl_user_group']['palettes']['default']);
/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['__selector__'][] = 'protect_pct_customelement_groups';
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['__selector__'][] = 'protect_pct_customelement_attributes';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_user_group']['subpalettes']['protect_pct_customelement_groups'] = 'pct_customelement_groups';
$GLOBALS['TL_DCA']['tl_user_group']['subpalettes']['protect_pct_customelement_attributes'] = 'pct_customelement_attributes';
/**
 * Add fields to tl_user_group
 */
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelements'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelements'], 'exclude' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_pct_customelement.title', 'eval' => array('multiple' => \true, 'submitOnChange' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelementsp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelementsp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['protect_pct_customelement_groups'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['protect_pct_customelement_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_groups'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableUserGroup', 'getCustomElementGroups'), 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_groupsp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_groupsp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'delete', 'cut'), 'reference' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_groupsp'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['protect_pct_customelement_attributes'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['protect_pct_customelement_attributes'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_attributes'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_attributes'], 'exclude' => \true, 'inputType' => 'checkbox', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableUserGroup', 'getCustomElementAttributes'), 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customelement_attributesp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_attributesp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'edit', 'delete', 'cut'), 'reference' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customelement_attributesp'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
}

namespace {
// Extend the default palette
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('news_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('news', 'newp'), 'news_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('default', 'tl_user_group');
// Add fields to tl_user_group
$GLOBALS['TL_DCA']['tl_user_group']['fields']['news'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['news'], 'inputType' => 'checkbox', 'foreignKey' => 'tl_news_archive.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user_group']['fields']['newp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['newp'], 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
// Extend the default palette
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('calendars_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('calendars', 'calendarp', 'calendarfeeds', 'calendarfeedp'), 'calendars_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('default', 'tl_user_group');
// Add fields to tl_user_group
$GLOBALS['TL_DCA']['tl_user_group']['fields']['calendars'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['calendars'], 'inputType' => 'checkbox', 'foreignKey' => 'tl_calendar.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user_group']['fields']['calendarp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['calendarp'], 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['calendarfeeds'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['calendarfeeds'], 'inputType' => 'checkbox', 'foreignKey' => 'tl_calendar_feed.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user_group']['fields']['calendarfeedp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['calendarfeedp'], 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
// Extend the default palette
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('newsletter_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('newsletters', 'newsletterp'), 'newsletter_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('default', 'tl_user_group');
// Add fields to tl_user_group
$GLOBALS['TL_DCA']['tl_user_group']['fields']['newsletters'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['newsletters'], 'inputType' => 'checkbox', 'foreignKey' => 'tl_newsletter_channel.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user_group']['fields']['newsletterp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['newsletterp'], 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_user_group']['config']['onload_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableUserGroup', 'loadCustomCatalogDca');
/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['default'] = \str_replace('fop;', 'fop;{pct_customcatalog_legend},pct_customcatalogs,pct_customcatalogsp;', $GLOBALS['TL_DCA']['tl_user_group']['palettes']['default']);
/**
 * Add fields to tl_user_group
 */
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customcatalogs'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customcatalogs'], 'exclude' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_pct_customcatalog.title', 'eval' => array('multiple' => \true, 'submitOnChange' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user_group']['fields']['pct_customcatalogsp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user_group']['pct_customcatalogsp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}
