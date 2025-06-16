<?php

namespace {
$GLOBALS['TL_DCA']['tl_module'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_theme', 'enableVersioning' => \true, 'markAsCopy' => 'name', 'onload_callback' => array(array('tl_module', 'addCustomLayoutSectionReferences')), 'sql' => array('keys' => array('id' => 'primary', 'tstamp' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_PARENT, 'fields' => array('name'), 'panelLayout' => 'filter;sort,search,limit', 'defaultSearchField' => 'name', 'headerFields' => array('name', 'author', 'tstamp'), 'child_record_callback' => array('tl_module', 'listModule')), 'label' => array('group_callback' => array('tl_module', 'getGroupHeader'))),
    // Palettes
    'palettes' => array('__selector__' => array('type', 'defineRoot', 'protected', 'reg_assignDir', 'reg_activate'), 'default' => '{title_legend},name,type', 'navigation' => '{title_legend},name,headline,type;{nav_legend},levelOffset,showLevel,hardLimit,showProtected,showHidden;{reference_legend:hide},defineRoot;{template_legend:hide},customTpl,navigationTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'customnav' => '{title_legend},name,headline,type;{nav_legend},pages,showProtected;{template_legend:hide},customTpl,navigationTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'breadcrumb' => '{title_legend},name,headline,type;{nav_legend},showHidden;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'quicknav' => '{title_legend},name,headline,type;{label_legend},customLabel;{nav_legend},showLevel,hardLimit,showProtected,showHidden;{reference_legend:hide},rootPage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'quicklink' => '{title_legend},name,headline,type;{label_legend},customLabel;{nav_legend},pages,showProtected;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'booknav' => '{title_legend},name,headline,type;{nav_legend},showProtected,showHidden;{reference_legend:hide},rootPage;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'articlenav' => '{title_legend},name,headline,type;{config_legend},loadFirst;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'sitemap' => '{title_legend},name,headline,type;{nav_legend},showProtected,showHidden;{reference_legend:hide},rootPage;{template_legend:hide},customTpl,navigationTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'login' => '{title_legend},name,headline,type;{config_legend},autologin,pwResetPage;{redirect_legend},jumpTo,redirectBack;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'logout' => '{title_legend},name,type;{redirect_legend},jumpTo,redirectBack;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'personalData' => '{title_legend},name,headline,type;{config_legend},editable,reqFullAuth;{redirect_legend},jumpTo;{template_legend:hide},memberTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'registration' => '{title_legend},name,headline,type;{config_legend},editable,newsletters,disableCaptcha;{account_legend},reg_groups,reg_allowLogin,reg_assignDir;{redirect_legend},jumpTo;{email_legend},reg_activate;{template_legend:hide},memberTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'changePassword' => '{title_legend},name,headline,type;{redirect_legend},jumpTo;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'lostPassword' => '{title_legend},name,headline,type;{config_legend},reg_skipName,disableCaptcha;{redirect_legend},jumpTo;{email_legend:hide},reg_jumpTo,reg_password;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'closeAccount' => '{title_legend},name,headline,type;{config_legend},reg_close,reg_deleteDir;{redirect_legend},jumpTo;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'form' => '{title_legend},name,headline,type;{include_legend},form;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'search' => '{title_legend},name,headline,type;{config_legend},queryType,fuzzy,contextLength,minKeywordLength,perPage,searchType;{redirect_legend:hide},jumpTo;{reference_legend:hide},pages;{template_legend:hide},searchTpl,customTpl;{image_legend},imgSize;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'articlelist' => '{title_legend},name,headline,type;{config_legend},skipFirst,inColumn;{reference_legend:hide},defineRoot;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'randomImage' => '{title_legend},name,headline,type;{source_legend},multiSRC,imgSize,fullsize,useCaption;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'html' => '{title_legend},name,type;{html_legend},html;{template_legend:hide},customTpl;{protected_legend:hide},protected', 'unfiltered_html' => '{title_legend},name,type;{html_legend},unfilteredHtml;{template_legend:hide},customTpl;{protected_legend:hide},protected', 'template' => '{title_legend},name,headline,type;{template_legend},data,customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'rssReader' => '{title_legend},name,headline,type;{config_legend},rss_feed,numberOfItems,perPage,skipFirst,rss_cache;{template_legend:hide},rss_template;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'feed_reader' => '{title_legend},name,headline,type;{config_legend},rss_feed,numberOfItems,perPage,skipFirst,rss_cache;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'two_factor' => '{title_legend},name,headline,type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID', 'root_page_dependent_modules' => '{title_legend},name,type;{config_legend},rootPageDependentModules;{protected_legend:hide},protected'),
    // Sub-palettes
    'subpalettes' => array('defineRoot' => 'rootPage', 'protected' => 'groups', 'reg_assignDir' => 'reg_homeDir', 'reg_activate' => 'reg_jumpTo,reg_text'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('foreignKey' => 'tl_theme.name', 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'name' => array('sorting' => \true, 'flag' => \Contao\DataContainer::SORT_INITIAL_LETTER_ASC, 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'headline' => array('search' => \true, 'inputType' => 'inputUnit', 'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6'), 'eval' => array('maxlength' => 200, 'tl_class' => 'w50 clr'), 'sql' => "varchar(255) NOT NULL default 'a:2:{s:5:\"value\";s:0:\"\";s:4:\"unit\";s:2:\"h2\";}'"), 'type' => array('sorting' => \true, 'flag' => \Contao\DataContainer::SORT_ASC, 'filter' => \true, 'inputType' => 'select', 'options_callback' => array('tl_module', 'getModules'), 'reference' => &$GLOBALS['TL_LANG']['FMD'], 'eval' => array('helpwizard' => \true, 'chosen' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default 'navigation'"), 'levelOffset' => array('inputType' => 'text', 'eval' => array('maxlength' => 5, 'rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'showLevel' => array('inputType' => 'text', 'eval' => array('maxlength' => 5, 'rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'hardLimit' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25 clr'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'showProtected' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'defineRoot' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'rootPage' => array('inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'navigationTpl' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\Controller::getTemplateGroup('nav_');
    }, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'customTpl' => array('inputType' => 'select', 'eval' => array('chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'pages' => array('inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox', 'isSortable' => \true, 'mandatory' => \true), 'load_callback' => array(array('tl_module', 'setPagesFlags')), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'showHidden' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'customLabel' => array('inputType' => 'text', 'eval' => array('maxlength' => 64, 'rgxp' => 'extnd', 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''"), 'autologin' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'jumpTo' => array('inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'overviewPage' => array('inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'redirectBack' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'pwResetPage' => array('inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'editable' => array('inputType' => 'checkboxWizard', 'options_callback' => array('tl_module', 'getEditableMemberProperties'), 'eval' => array('multiple' => \true), 'sql' => "blob NULL"), 'reqFullAuth' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'memberTpl' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\Controller::getTemplateGroup('member_');
    }, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'form' => array('inputType' => 'select', 'foreignKey' => 'tl_form.title', 'options_callback' => array('tl_module', 'getForms'), 'eval' => array('chosen' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'queryType' => array('inputType' => 'select', 'options' => array('and', 'or'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('helpwizard' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(8) COLLATE ascii_bin NOT NULL default 'and'"), 'fuzzy' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'contextLength' => array('inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'rgxp' => 'natural', 'tl_class' => 'w50', 'placeholder' => array(48, 360)), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'minKeywordLength' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 4"), 'perPage' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'searchType' => array('inputType' => 'select', 'options' => array('simple', 'advanced'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('helpwizard' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default 'simple'"), 'searchTpl' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\Controller::getTemplateGroup('search_');
    }, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'inColumn' => array('inputType' => 'select', 'options_callback' => array('tl_module', 'getLayoutSections'), 'reference' => &$GLOBALS['TL_LANG']['COLS'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'main'"), 'skipFirst' => array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0"), 'loadFirst' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'singleSRC' => array('inputType' => 'fileTree', 'eval' => array('fieldType' => 'radio', 'filesOnly' => \true, 'mandatory' => \true, 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"), 'imgSize' => array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'inputType' => 'imageSize', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(128) COLLATE ascii_bin NOT NULL default ''"), 'useCaption' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'fullsize' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'multiSRC' => array('inputType' => 'fileTree', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox', 'isSortable' => \true, 'files' => \true, 'mandatory' => \true), 'load_callback' => array(array('tl_module', 'setMultiSrcFlags')), 'sql' => "blob NULL"), 'html' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('allowHtml' => \true, 'class' => 'monospace', 'rte' => 'ace|html', 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "text NULL"), 'unfilteredHtml' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('useRawRequestData' => \true, 'class' => 'monospace', 'rte' => 'ace|html', 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "mediumtext NULL"), 'rss_cache' => array('inputType' => 'select', 'options' => array(0, 5, 15, 30, 60, 300, 900, 1800, 3600, 10800, 21600, 43200, 86400), 'eval' => array('tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['CACHE'], 'sql' => "int(10) unsigned NOT NULL default 3600"), 'rss_feed' => array('inputType' => 'textarea', 'eval' => array('mandatory' => \true, 'decodeEntities' => \true, 'style' => 'height:60px'), 'sql' => "text NULL"), 'rss_template' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\Controller::getTemplateGroup('rss_');
    }, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"), 'numberOfItems' => array('label' => &$GLOBALS['TL_LANG']['MSC']['numberOfItems'], 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 3"), 'disableCaptcha' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'reg_groups' => array('inputType' => 'checkbox', 'foreignKey' => 'tl_member_group.name', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'reg_allowLogin' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'reg_skipName' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'reg_close' => array('inputType' => 'select', 'options' => array('close_deactivate', 'close_delete'), 'eval' => array('tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default ''"), 'reg_deleteDir' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'reg_assignDir' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'reg_homeDir' => array('inputType' => 'fileTree', 'eval' => array('fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"), 'reg_activate' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'reg_jumpTo' => array('inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'reg_text' => array('inputType' => 'textarea', 'eval' => array('style' => 'height:120px', 'decodeEntities' => \true, 'alwaysSave' => \true), 'load_callback' => array(array('tl_module', 'getActivationDefault')), 'sql' => "text NULL"), 'reg_password' => array('inputType' => 'textarea', 'eval' => array('style' => 'height:120px', 'decodeEntities' => \true, 'alwaysSave' => \true), 'load_callback' => array(array('tl_module', 'getPasswordDefault')), 'sql' => "text NULL"), 'data' => array('inputType' => 'keyValueWizard', 'sql' => "text NULL"), 'protected' => array('filter' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'groups' => array('inputType' => 'checkbox', 'foreignKey' => 'tl_member_group.name', 'eval' => array('mandatory' => \true, 'multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'cssID' => array('inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'rootPageDependentModules' => array('inputType' => 'rootPageDependentSelect', 'eval' => array('submitOnChange' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => 'blob NULL')),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_module extends \Contao\Backend
{
    /**
     * Return all front end modules as array
     *
     * @return array
     */
    public function getModules()
    {
        $security = \Contao\System::getContainer()->get('security.helper');
        $groups = array();
        foreach ($GLOBALS['FE_MOD'] as $k => $v) {
            foreach (\array_keys($v) as $kk) {
                if ($security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_ACCESS_FRONTEND_MODULE_TYPE, $kk)) {
                    $groups[$k][] = $kk;
                }
            }
        }
        return $groups;
    }
    /**
     * Return all editable fields of table tl_member
     *
     * @return array
     */
    public function getEditableMemberProperties()
    {
        $return = array();
        \Contao\System::loadLanguageFile('tl_member');
        $this->loadDataContainer('tl_member');
        foreach ($GLOBALS['TL_DCA']['tl_member']['fields'] as $k => $v) {
            if ($v['eval']['feEditable'] ?? \null) {
                $return[$k] = $GLOBALS['TL_DCA']['tl_member']['fields'][$k]['label'][0];
            }
        }
        return $return;
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
                $arrForms[$objForms->id] = $objForms->title;
            }
        }
        return $arrForms;
    }
    /**
     * Return all layout sections as array
     *
     * @return array
     */
    public function getLayoutSections()
    {
        $arrSections = array('header', 'left', 'right', 'main', 'footer');
        // Check for custom layout sections
        $objLayout = \Contao\Database::getInstance()->query("SELECT sections FROM tl_layout WHERE sections!=''");
        while ($objLayout->next()) {
            $arrCustom = \Contao\StringUtil::deserialize($objLayout->sections);
            // Add the custom layout sections
            if (!empty($arrCustom) && \is_array($arrCustom)) {
                foreach ($arrCustom as $v) {
                    if (!empty($v['id'])) {
                        $arrSections[] = $v['id'];
                    }
                }
            }
        }
        return \Contao\Backend::convertLayoutSectionIdsToAssociativeArray($arrSections);
    }
    /**
     * Use the module type as group header if sorted by type (see #8402)
     *
     * @param string $group
     * @param string $mode
     * @param string $field
     * @param array  $row
     *
     * @return string
     */
    public function getGroupHeader($group, $mode, $field, $row)
    {
        if ($field == 'type') {
            return $row['type'];
        }
        return $group;
    }
    /**
     * Load the default activation text
     *
     * @param mixed $varValue
     *
     * @return mixed
     */
    public function getActivationDefault($varValue)
    {
        if (\trim($varValue) === '') {
            $varValue = \is_array($GLOBALS['TL_LANG']['tl_module']['emailText'] ?? \null) ? $GLOBALS['TL_LANG']['tl_module']['emailText'][1] : $GLOBALS['TL_LANG']['tl_module']['emailText'] ?? \null;
        }
        return $varValue;
    }
    /**
     * Load the default password text
     *
     * @param mixed $varValue
     *
     * @return mixed
     */
    public function getPasswordDefault($varValue)
    {
        if (\trim($varValue) === '') {
            $varValue = \is_array($GLOBALS['TL_LANG']['tl_module']['passwordText'] ?? \null) ? $GLOBALS['TL_LANG']['tl_module']['passwordText'][1] : $GLOBALS['TL_LANG']['tl_module']['passwordText'] ?? \null;
        }
        return $varValue;
    }
    /**
     * List a front end module
     *
     * @param array $row
     *
     * @return string
     */
    public function listModule($row)
    {
        return '<div class="tl_content_left">' . $row['name'] . ' <span class="label-info">[' . ($GLOBALS['TL_LANG']['FMD'][$row['type']][0] ?? $row['type']) . ']</span></div>';
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
        if ($dc->activeRecord && $dc->activeRecord->type == 'randomImage') {
            $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isGallery'] = \true;
            $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['extensions'] = '%contao.image.valid_extensions%';
        }
        return $varValue;
    }
    /**
     * Dynamically change attributes of the "pages" field
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     */
    public function setPagesFlags($varValue, \Contao\DataContainer $dc)
    {
        if ($dc->activeRecord && $dc->activeRecord->type == 'search') {
            $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['mandatory'] = \false;
            unset($GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isSortable']);
        }
        return $varValue;
    }
}
}

namespace {
// Add palettes to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['faqlist'] = '{title_legend},name,headline,type;{config_legend},faq_categories,faq_readerModule;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['faqreader'] = '{title_legend},name,headline,type;{config_legend},faq_categories,overviewPage,customLabel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['faqpage'] = '{title_legend},name,headline,type;{config_legend},faq_categories;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
// Add fields to tl_module
$GLOBALS['TL_DCA']['tl_module']['fields']['faq_categories'] = array('inputType' => 'checkboxWizard', 'foreignKey' => 'tl_faq_category.title', 'eval' => array('multiple' => \true, 'mandatory' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_module']['fields']['faq_readerModule'] = array('inputType' => 'select', 'options_callback' => array('tl_module_faq', 'getReaderModules'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('table' => 'tl_module', 'type' => 'hasMany', 'load' => 'lazy'));
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_module_faq extends \Contao\Backend
{
    /**
     * Get all FAQ reader modules and return them as array
     *
     * @return array
     */
    public function getReaderModules()
    {
        $arrModules = array();
        $objModules = \Contao\Database::getInstance()->execute("SELECT m.id, m.name, t.name AS theme FROM tl_module m LEFT JOIN tl_theme t ON m.pid=t.id WHERE m.type='faqreader' ORDER BY t.name, m.name");
        while ($objModules->next()) {
            $arrModules[$objModules->theme][$objModules->id] = $objModules->name . ' (ID ' . $objModules->id . ')';
        }
        return $arrModules;
    }
}
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_megamenu
 * @link		http://contao.org
 */
/**
 * Config
 */
#$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\PrivacyManager\Backend\TableModule', 'modifyDca');
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['pct_megamenu'] = '{title_legend},name,headline,type;{reference_legend:hide},defineRoot;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID';
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
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\\CustomElements\\Backend\\TableModule', 'modifyDca');
// increase the default field size
$GLOBALS['TL_DCA']['tl_module']['fields']['type']['sql'] = "varchar(128) NOT NULL default ''";
$GLOBALS['TL_DCA']['tl_module']['fields']['pct_customelement']['sql'] = 'longblob NULL';
}

namespace {
// Add a palette selector
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'news_format';
// Add palettes to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'] = '{title_legend},name,headline,type;{config_legend},news_archives,news_readerModule,numberOfItems,news_featured,news_order,skipFirst,perPage;{template_legend:hide},news_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsreader'] = '{title_legend},name,headline,type;{config_legend},news_archives,news_keepCanonical;{news_overview_legend},overviewPage,customLabel;{template_legend:hide},news_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsarchive'] = '{title_legend},name,headline,type;{config_legend},news_archives,news_readerModule,news_format,news_order,news_jumpToCurrent,perPage;{template_legend:hide},news_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsmenu'] = '{title_legend},name,headline,type;{config_legend},news_archives,news_showQuantity,news_format,news_order;{redirect_legend},jumpTo;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsmenunews_day'] = '{title_legend},name,headline,type;{config_legend},news_archives,news_showQuantity,news_format,news_startDay;{redirect_legend},jumpTo;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
// Add fields to tl_module
$GLOBALS['TL_DCA']['tl_module']['fields']['news_archives'] = array('inputType' => 'checkbox', 'options_callback' => array('tl_module_news', 'getNewsArchives'), 'eval' => array('multiple' => \true, 'mandatory' => \true), 'sql' => "blob NULL", 'relation' => array('table' => 'tl_news_archive', 'type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_module']['fields']['news_featured'] = array('inputType' => 'select', 'options' => array('all_items', 'featured', 'unfeatured', 'featured_first'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default 'all_items'");
$GLOBALS['TL_DCA']['tl_module']['fields']['news_jumpToCurrent'] = array('inputType' => 'select', 'options' => array('hide_module', 'show_current', 'all_items'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_module']['fields']['news_readerModule'] = array('inputType' => 'select', 'options_callback' => array('tl_module_news', 'getReaderModules'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0");
$GLOBALS['TL_DCA']['tl_module']['fields']['news_template'] = array('inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('news_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_module']['fields']['news_format'] = array('inputType' => 'select', 'options' => array('news_day', 'news_month', 'news_year'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('tl_class' => 'w50 clr', 'submitOnChange' => \true), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'news_month'");
$GLOBALS['TL_DCA']['tl_module']['fields']['news_startDay'] = array('inputType' => 'select', 'options' => array(0, 1, 2, 3, 4, 5, 6), 'reference' => &$GLOBALS['TL_LANG']['DAYS'], 'eval' => array('tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0");
$GLOBALS['TL_DCA']['tl_module']['fields']['news_order'] = array('inputType' => 'select', 'options_callback' => array('tl_module_news', 'getSortingOptions'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'order_date_desc'");
$GLOBALS['TL_DCA']['tl_module']['fields']['news_showQuantity'] = array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['news_keepCanonical'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_module_news extends \Contao\Backend
{
    /**
     * Get all news archives and return them as array
     *
     * @return array
     */
    public function getNewsArchives()
    {
        $user = \Contao\BackendUser::getInstance();
        if (!$user->isAdmin && !\is_array($user->news)) {
            return array();
        }
        $arrArchives = array();
        $objArchives = \Contao\Database::getInstance()->execute("SELECT id, title FROM tl_news_archive ORDER BY title");
        $security = \Contao\System::getContainer()->get('security.helper');
        while ($objArchives->next()) {
            if ($security->isGranted(\Contao\NewsBundle\Security\ContaoNewsPermissions::USER_CAN_EDIT_ARCHIVE, $objArchives->id)) {
                $arrArchives[$objArchives->id] = $objArchives->title;
            }
        }
        return $arrArchives;
    }
    /**
     * Get all newsreader modules and return them as array
     *
     * @return array
     */
    public function getReaderModules()
    {
        $arrModules = array();
        $objModules = \Contao\Database::getInstance()->execute("SELECT m.id, m.name, t.name AS theme FROM tl_module m LEFT JOIN tl_theme t ON m.pid=t.id WHERE m.type='newsreader' ORDER BY t.name, m.name");
        while ($objModules->next()) {
            $arrModules[$objModules->theme][$objModules->id] = $objModules->name . ' (ID ' . $objModules->id . ')';
        }
        return $arrModules;
    }
    /**
     * Return the sorting options
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getSortingOptions(\Contao\DataContainer $dc)
    {
        if ($dc->activeRecord && $dc->activeRecord->type == 'newsmenu') {
            return array('order_date_asc', 'order_date_desc');
        }
        return array('order_date_asc', 'order_date_desc', 'order_headline_asc', 'order_headline_desc', 'order_random');
    }
}
}

namespace {
$GLOBALS['TL_DCA']['tl_module']['palettes']['mp_form_steps'] = '
{title_legend},name,headline,type;
{config_legend},form,navigationTpl;
{template_legend:hide},customTpl;
{protected_legend:hide},protected;
{expert_legend:hide},guests,cssID,space';
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
/**
 * Palettes
 */
// backendlogin
$GLOBALS['TL_DCA']['tl_module']['palettes']['backendlogin'] = '{title_legend},name,type,headline;{config_legend},jumpTo;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
}

namespace {
// Add palettes to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['listing'] = '{title_legend},name,headline,type;{config_legend},list_table,list_fields,list_where,list_search,list_sort,perPage,list_info,list_info_where;{template_legend:hide},list_layout,list_info_layout;{protected_legend:hide},protected;{expert_legend:hide},cssID';
// Add fields to tl_module
$GLOBALS['TL_DCA']['tl_module']['fields']['list_table'] = array('inputType' => 'select', 'options_callback' => array('tl_module_listing', 'getAllTables'), 'eval' => array('chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_fields'] = array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "tinytext NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_where'] = array('inputType' => 'text', 'eval' => array('preserveTags' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "tinytext NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_search'] = array('inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "tinytext NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_sort'] = array('inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "tinytext NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_info'] = array('inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "tinytext NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_info_where'] = array('inputType' => 'text', 'eval' => array('preserveTags' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "tinytext NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_layout'] = array('inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('list_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_module']['fields']['list_info_layout'] = array('inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('info_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_module_listing extends \Contao\Backend
{
    /**
     * Get all tables and return them as array
     *
     * @return array
     */
    public function getAllTables()
    {
        $arrTables = \Contao\Database::getInstance()->listTables();
        $arrViews = \Contao\System::getContainer()->get('database_connection')->createSchemaManager()->listViews();
        if (!empty($arrViews)) {
            $arrTables = \array_merge($arrTables, \array_keys($arrViews));
            \natsort($arrTables);
        }
        return \array_values($arrTables);
    }
}
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
 * Config
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\\PrivacyManager\\Backend\\TableModule', 'modifyDca');
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['privacy_in'] = '{title_legend},name,headline,type;{privacy_1_legend},privacy_lbl_1,privacy_txt_1;{privacy_2_legend},privacy_lbl_2,privacy_txt_2;{privacy_3_legend},privacy_lbl_3,privacy_txt_3;{privacy_4_legend},privacy_lbl_4,privacy_txt_4;{config_legend},privacy_text,html,privacy_url_1,privacy_url_2,privacy_preselect,privacy_cookie_expires;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['privacy_out'] = '{title_legend},name,type;{redirect_legend},jumpTo,redirectBack;{protected_legend:hide},protected;{template_legend:hide},customTpl;{expert_legend:hide},guests,cssID,space';
/**
 * Fields
 */
$fields = array('privacy_lbl_1' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_1'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxchars' => 128), 'sql' => "varchar(128) NOT NULL default ''"), 'privacy_txt_1' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_1'], 'exclude' => \true, 'inputType' => 'textarea', 'eval' => array('tl_class' => '', 'allowHtml' => \true), 'sql' => "tinytext NULL"), 'privacy_lbl_2' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_2'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxchars' => 128, 'tl_class' => ''), 'sql' => "varchar(128) NOT NULL default ''"), 'privacy_txt_2' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_2'], 'exclude' => \true, 'inputType' => 'textarea', 'eval' => array('tl_class' => '', 'allowHtml' => \true), 'sql' => "tinytext NULL"), 'privacy_lbl_3' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_3'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxchars' => 128, 'tl_class' => ''), 'sql' => "varchar(128) NOT NULL default ''"), 'privacy_txt_3' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_3'], 'exclude' => \true, 'inputType' => 'textarea', 'eval' => array('tl_class' => '', 'allowHtml' => \true), 'sql' => "tinytext NULL"), 'privacy_lbl_4' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_lbl_4'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxchars' => 128, 'tl_class' => ''), 'sql' => "varchar(128) NOT NULL default ''"), 'privacy_txt_4' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_txt_4'], 'exclude' => \true, 'inputType' => 'textarea', 'eval' => array('tl_class' => '', 'allowHtml' => \true), 'sql' => "tinytext NULL"), 'privacy_url_1' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_url_1'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 255, 'dcaPicker' => \true, 'fieldType' => 'radio', 'filesOnly' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(255) NOT NULL default ''"), 'privacy_url_2' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_url_2'], 'exclude' => \true, 'search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 255, 'dcaPicker' => \true, 'fieldType' => 'radio', 'filesOnly' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(255) NOT NULL default ''"), 'privacy_text' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_text'], 'exclude' => \true, 'inputType' => 'textarea', 'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr'), 'sql' => "text NULL"), 'privacy_cookie_expires' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_cookie_expires'], 'inputType' => 'select', 'default' => 30, 'options' => array(30, 15, 7, 1), 'eval' => array('maxlength' => 5), 'sql' => "smallint(5) unsigned NOT NULL default '0'"), 'privacy_preselect' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['privacy_preselect'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array(1, 2, 3, 4), 'reference' => &$GLOBALS['TL_LANG']['tl_module']['privacy_preselect_ref'], 'eval' => array('tl_class' => 'clr', 'multiple' => \true, 'includeBlankOption' => \true), 'sql' => "varchar(96) NOT NULL default ''"));
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_module']['fields'], 0, $fields);
}

namespace {
// Add a palette selector
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'cal_format';
// Add palettes to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['calendar'] = '{title_legend},name,headline,type;{config_legend},cal_calendar,cal_noSpan,cal_startDay,cal_featured;{redirect_legend},jumpTo;{template_legend:hide},cal_ctemplate,customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['eventlist'] = '{title_legend},name,headline,type;{config_legend},cal_calendar,cal_noSpan,cal_format,cal_featured,cal_order,cal_readerModule,cal_limit,perPage,cal_ignoreDynamic,cal_hideRunning;{template_legend:hide},cal_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['eventreader'] = '{title_legend},name,headline,type;{config_legend},cal_calendar,cal_hideRunning,cal_keepCanonical;{cal_overview_legend},overviewPage,customLabel;{template_legend:hide},cal_template,customTpl;{image_legend},imgSize;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['eventmenu'] = '{title_legend},name,headline,type;{config_legend},cal_calendar,cal_noSpan,cal_format,cal_featured,cal_order,cal_showQuantity;{redirect_legend},jumpTo;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['eventmenucal_day'] = '{title_legend},name,headline,type;{config_legend},cal_calendar,cal_noSpan,cal_format,cal_featured,cal_startDay,cal_showQuantity;{redirect_legend},jumpTo;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
// Add fields to tl_module
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_calendar'] = array('inputType' => 'checkbox', 'options_callback' => array('tl_module_calendar', 'getCalendars'), 'eval' => array('mandatory' => \true, 'multiple' => \true), 'sql' => "blob NULL", 'relation' => array('table' => 'tl_calendar', 'type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_noSpan'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_hideRunning'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_startDay'] = array('inputType' => 'select', 'options' => array(0, 1, 2, 3, 4, 5, 6), 'reference' => &$GLOBALS['TL_LANG']['DAYS'], 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "smallint(5) unsigned NOT NULL default 1");
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_format'] = array('inputType' => 'select', 'options_callback' => array('tl_module_calendar', 'getFormats'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('tl_class' => 'w50 clr', 'submitOnChange' => \true), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'cal_month'");
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_ignoreDynamic'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_order'] = array('inputType' => 'select', 'options' => array('ascending', 'descending'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default 'ascending'");
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_readerModule'] = array('inputType' => 'select', 'options_callback' => array('tl_module_calendar', 'getReaderModules'), 'reference' => &$GLOBALS['TL_LANG']['tl_module'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('table' => 'tl_module', 'type' => 'hasOne', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_limit'] = array('inputType' => 'text', 'eval' => array('rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 0");
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_template'] = array('inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('event_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_ctemplate'] = array('inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('cal_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_showQuantity'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_featured'] = array('inputType' => 'select', 'options' => array('all_items', 'featured', 'unfeatured'), 'reference' => &$GLOBALS['TL_LANG']['tl_module']['events'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default 'all_items'");
$GLOBALS['TL_DCA']['tl_module']['fields']['cal_keepCanonical'] = array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_module_calendar extends \Contao\Backend
{
    /**
     * Get all calendars and return them as array
     *
     * @return array
     */
    public function getCalendars()
    {
        $user = \Contao\BackendUser::getInstance();
        if (!$user->isAdmin && !\is_array($user->calendars)) {
            return array();
        }
        $arrCalendars = array();
        $objCalendars = \Contao\Database::getInstance()->execute("SELECT id, title FROM tl_calendar ORDER BY title");
        $security = \Contao\System::getContainer()->get('security.helper');
        while ($objCalendars->next()) {
            if ($security->isGranted(\Contao\CalendarBundle\Security\ContaoCalendarPermissions::USER_CAN_EDIT_CALENDAR, $objCalendars->id)) {
                $arrCalendars[$objCalendars->id] = $objCalendars->title;
            }
        }
        return $arrCalendars;
    }
    /**
     * Get all event reader modules and return them as array
     *
     * @return array
     */
    public function getReaderModules()
    {
        $arrModules = array();
        $objModules = \Contao\Database::getInstance()->execute("SELECT m.id, m.name, t.name AS theme FROM tl_module m LEFT JOIN tl_theme t ON m.pid=t.id WHERE m.type='eventreader' ORDER BY t.name, m.name");
        while ($objModules->next()) {
            $arrModules[$objModules->theme][$objModules->id] = $objModules->name . ' (ID ' . $objModules->id . ')';
        }
        return $arrModules;
    }
    /**
     * Return the calendar formats depending on the module type
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getFormats(\Contao\DataContainer $dc)
    {
        if ($dc->activeRecord->type == 'eventmenu') {
            return array('cal_day', 'cal_month', 'cal_year');
        }
        return array('cal_list' => array('cal_day', 'cal_month', 'cal_year', 'cal_all'), 'cal_upcoming' => array('next_7', 'next_14', 'next_30', 'next_90', 'next_180', 'next_365', 'next_two', 'next_cur_month', 'next_cur_year', 'next_next_month', 'next_next_year', 'next_all'), 'cal_past' => array('past_7', 'past_14', 'past_30', 'past_90', 'past_180', 'past_365', 'past_two', 'past_cur_month', 'past_cur_year', 'past_prev_month', 'past_prev_year', 'past_all'));
    }
}
}

namespace {
// Add palettes to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['personalData'] = \str_replace(',editable', ',editable,newsletters', $GLOBALS['TL_DCA']['tl_module']['palettes']['personalData']);
$GLOBALS['TL_DCA']['tl_module']['palettes']['subscribe'] = '{title_legend},name,headline,type;{config_legend},nl_channels,nl_hideChannels,disableCaptcha;{text_legend},nl_text;{redirect_legend},jumpTo;{email_legend:hide},nl_subscribe;{template_legend:hide},nl_template;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['unsubscribe'] = '{title_legend},name,headline,type;{config_legend},nl_channels,nl_hideChannels,disableCaptcha;{redirect_legend},jumpTo;{email_legend:hide},nl_unsubscribe;{template_legend:hide},nl_template;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsletterlist'] = '{title_legend},name,headline,type;{config_legend},nl_channels;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsletterreader'] = '{title_legend},name,headline,type;{config_legend},nl_channels,overviewPage,customLabel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
// Add fields to tl_module
$GLOBALS['TL_DCA']['tl_module']['fields']['newsletters'] = array('inputType' => 'checkbox', 'foreignKey' => 'tl_newsletter_channel.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_module']['fields']['nl_channels'] = array('inputType' => 'checkbox', 'options_callback' => array('tl_module_newsletter', 'getChannels'), 'eval' => array('multiple' => \true, 'mandatory' => \true), 'sql' => "blob NULL", 'relation' => array('table' => 'tl_newsletter_channel', 'type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_module']['fields']['nl_text'] = array('inputType' => 'textarea', 'eval' => array('rte' => 'tinyMCE', 'basicEntities' => \true, 'helpwizard' => \true), 'explanation' => 'insertTags', 'sql' => "text NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['nl_hideChannels'] = array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['nl_subscribe'] = array('inputType' => 'textarea', 'eval' => array('style' => 'height:120px', 'decodeEntities' => \true, 'alwaysSave' => \true), 'load_callback' => array(array('tl_module_newsletter', 'getSubscribeDefault')), 'sql' => "text NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['nl_unsubscribe'] = array('inputType' => 'textarea', 'eval' => array('style' => 'height:120px', 'decodeEntities' => \true, 'alwaysSave' => \true), 'load_callback' => array(array('tl_module_newsletter', 'getUnsubscribeDefault')), 'sql' => "text NULL");
$GLOBALS['TL_DCA']['tl_module']['fields']['nl_template'] = array('inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('nl_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_module_newsletter extends \Contao\Backend
{
    /**
     * Load the default subscribe text
     *
     * @param mixed $varValue
     *
     * @return mixed
     */
    public function getSubscribeDefault($varValue)
    {
        if (\trim($varValue) === '') {
            $varValue = $GLOBALS['TL_LANG']['tl_module']['text_subscribe'][1];
        }
        return $varValue;
    }
    /**
     * Load the default unsubscribe text
     *
     * @param mixed $varValue
     *
     * @return mixed
     */
    public function getUnsubscribeDefault($varValue)
    {
        if (\trim($varValue) === '') {
            $varValue = $GLOBALS['TL_LANG']['tl_module']['text_unsubscribe'][1];
        }
        return $varValue;
    }
    /**
     * Get all channels and return them as array
     *
     * @return array
     */
    public function getChannels(\Contao\DataContainer $dc)
    {
        $user = \Contao\BackendUser::getInstance();
        if (!$user->isAdmin && !\is_array($user->newsletters)) {
            return array();
        }
        $strQuery = "SELECT id, title FROM tl_newsletter_channel";
        // Show only channels with a redirect page in the web modules
        if (\in_array($dc->activeRecord->type, array('newsletterlist', 'newsletterreader'))) {
            $strQuery .= " WHERE jumpTo>0";
        }
        $strQuery .= " ORDER BY title";
        $arrChannels = array();
        $objChannels = \Contao\Database::getInstance()->execute($strQuery);
        $security = \Contao\System::getContainer()->get('security.helper');
        while ($objChannels->next()) {
            if ($security->isGranted(\Contao\NewsletterBundle\Security\ContaoNewsletterPermissions::USER_CAN_EDIT_CHANNEL, $objChannels->id)) {
                $arrChannels[$objChannels->id] = $objChannels->title;
            }
        }
        return $arrChannels;
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
 * @package		pct_theme_settings
 * @link		http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_theme_settings');
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableModule', 'modifyDca');
/**
 * Palettes
 */
// Append news sorting field and news filter palette
if (\strpos($GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'], 'news_order') === \false) {
    $GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'] = \str_replace('skipFirst', 'skipFirst,news_order;', $GLOBALS['TL_DCA']['tl_module']['palettes']['newslist']);
}
// pageimage,article
$GLOBALS['TL_DCA']['tl_module']['palettes']['pageimage'] = '{title_legend},name,type;{config_legend},imgSize,bgposition,showLevel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['pagearticle'] = '{title_legend},name,type;{config_legend},showLevel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
// portfoliolist
$GLOBALS['TL_DCA']['tl_module']['palettes']['portfoliolist'] = '{title_legend},name,headline,type;{config_legend},news_archives,numberOfItems,news_featured,perPage,skipFirst,news_order;{layout_legend:hide},style_css,layout_css;{template_legend:hide},news_metaFields,news_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,,space';
// portfoliofilter
$GLOBALS['TL_DCA']['tl_module']['palettes']['portfoliofilter'] = '{title_legend},name,headline,type;{config_legend},news_readerModule;{filter_legend:hide},news_filters,news_sysfilter,news_filter_multiple;{layout_legend:hide},align_css,style_css,color_css;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
// portfolioreader
$GLOBALS['TL_DCA']['tl_module']['palettes']['portfolioreader'] = '{title_legend},name,headline,type;{config_legend},news_archives;{template_legend:hide},news_metaFields,news_template,customTpl;{image_legend:hide},imgSize;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
/**
 * Fields
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_article']['fields'], 0, $GLOBALS['PCT_THEME_SETTINGS']['fields']);
$fields = array(
    'alias' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['alias'], 'exclude' => \true, 'inputType' => 'text', 'search' => \true, 'eval' => array('rgxp' => 'folderalias', 'doNotCopy' => \true, 'unique' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'save_callback' => array(array('PCT\\ThemeSettings\\Backend\\TableModule', 'generateAlias')), 'sql' => "varchar(255) BINARY NOT NULL default ''"),
    'align_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['align_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['align_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['align_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'color_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['color_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'style_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['style_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['style_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['style_css'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'layout_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['layout_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['layout_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['layout_css'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    // news filter
    'news_filters' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['news_filters'], 'exclude' => \true, 'inputType' => 'optionWizard', 'eval' => array('tl_class' => 'clr'), 'sql' => "blob NULL"),
    'news_sysfilter' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['news_sysfilter'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    'news_portfoliolistModule' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['news_portfoliolistModule']),
    'news_filter_multiple' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['news_filter_multiple'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    // page image
    'bgposition' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgposition'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['bgposition_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(32) NOT NULL default ''"),
    'visibility_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    // general margin fields
    'margin_t' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'margin_b' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'margin_t_m' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_t_m'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_top_m_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'margin_b_m' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['margin_b_m'], 'inputType' => 'select', 'options' => &$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_m_classes'], 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_module']['fields'], 0, $fields);
// add sorting as news_order option
$GLOBALS['TL_DCA']['tl_module']['fields']['news_order']['options'][] = 'sorting';
}

namespace {
/**
 * Table tl_module
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_module');
$objActiveRecord = $objDcaHelper->getActiveRecord();
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'modifyDca');
/**
 * Palettes
 */
// customcataloglist
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
\Contao\ArrayUtil::arrayInsert($arrPalettes['title_legend'], 1, 'headline');
$arrPalettes['config_legend'] = array('customcatalog', 'customcatalog_jumpTo');
$arrPalettes['list_legend'] = array('customcatalog_limit', 'customcatalog_offset', 'customcatalog_perPage', 'customcatalog_sortField', 'customcatalog_sorting', 'customcatalog_setVisibles');
$arrPalettes['image_legend:hide'] = array('customcatalog_attr_image', 'customcatalog_imgSize');
$arrPalettes['filter_legend'] = array('customcatalog_filtersets', 'customcatalog_filter_showAll', 'customcatalog_filter_actLang', 'customcatalog_filter_start', 'customcatalog_filter_stop');
$arrPalettes['language_legend'] = array('customcatalog_strictLanguage');
$arrPalettes['template_legend:hide'] = array('customcatalog_template', 'customcatalog_mod_template');
$arrPalettes['advanced_sql_legend:hide'] = array('customcatalog_sqlWhere', 'customcatalog_sqlSorting');
$arrPalettes['protected_legend:hide'] = array('protected', 'hardLimit');
if ($objActiveRecord !== \null) {
    if ($objActiveRecord->type == 'customcataloglist' && \version_compare(\PCT_TABLETREE_VERSION, '1.3.5', '>=')) {
        $arrPalettes['advanced_sql_legend:hide'][] = 'multiSRC';
    }
}
$arrPalettes['expert_legend:hide'] = array('guests', 'cssID', 'space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcataloglist'] = $objDcaHelper->generatePalettes($arrPalettes);
// customcatalogreader
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
\Contao\ArrayUtil::arrayInsert($arrPalettes['title_legend'], 1, 'headline');
$arrPalettes['config_legend'] = array('customcatalog');
$arrPalettes['list_legend'] = array('customcatalog_setVisibles');
$arrPalettes['filter_legend'] = array('customcatalog_filter_actLang');
$arrPalettes['template_legend:hide'] = array('customcatalog_template', 'customcatalog_mod_template');
$arrPalettes['comment_legend:hide'] = array('com_template');
$arrPalettes['protected_legend:hide'] = array('protected');
$arrPalettes['expert_legend:hide'] = array('guests', 'cssID', 'space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcatalogreader'] = $objDcaHelper->generatePalettes($arrPalettes);
// customcatalogfilter
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
\Contao\ArrayUtil::arrayInsert($arrPalettes['title_legend'], 1, 'headline');
$arrPalettes['config_legend'] = array('customcatalog');
$arrPalettes['ffw_legend'] = array('customcatalog_jumpTo');
$arrPalettes['list_legend'] = array('customcatalog_setVisibles');
$arrPalettes['filter_legend'] = array('customcatalog_filtersets', 'customcatalog_filter_submit', 'customcatalog_filter_actLang', 'customcatalog_filter_showAll');
$arrPalettes['template_legend:hide'] = array('customcatalog_mod_template');
$arrPalettes['protected_legend:hide'] = array('protected');
$arrPalettes['expert_legend:hide'] = array('customcatalog_filter_method', 'customcatalog_filter_formID', 'cssID', 'space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcatalogfilter'] = $objDcaHelper->generatePalettes($arrPalettes);
// customcatalog_apistarter
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
\Contao\ArrayUtil::arrayInsert($arrPalettes['title_legend'], 1, 'headline');
$arrPalettes['config_legend'] = array('customcatalog');
$arrPalettes['api_legend'] = array('customcatalog_api');
$arrPalettes['template_legend:hide'] = array('customcatalog_mod_template');
$arrPalettes['advanced_sql_legend:hide'] = array('customcatalog_sqlWhere', 'customcatalog_sqlSorting');
$arrPalettes['protected_legend:hide'] = array('protected');
$arrPalettes['expert_legend:hide'] = array('guests', 'cssID', 'space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcatalog_apistarter'] = $objDcaHelper->generatePalettes($arrPalettes);
/**
 * Subpalettes
 */
$objDcaHelper->addSubpalette('customcatalog_setVisibles', array('customcatalog_visibles'));
/**
 * Fields
 */
$objDcaHelper->addFields(array(
    // config_legend
    'customcatalog' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog'], 'exclude' => \true, 'search' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getCustomCatalogs'), 'eval' => array('tl_class' => '', 'mandatory' => \true, 'maxlength' => 255, 'includeBlankOption' => \true, 'submitOnChange' => \true, 'chosen' => \true), 'sql' => "varchar(128) NOT NULL default ''"),
    'customcatalog_jumpTo' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_jumpTo'], 'exclude' => \true, 'inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio'), 'sql' => "int(10) NOT NULL default '0'", 'relation' => array('type' => 'hasOne', 'load' => 'eager')),
    // list_legend
    'customcatalog_limit' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_limit'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'digit', 'tl_class' => 'w50'), 'sql' => "int(10) NOT NULL default '0'"),
    'customcatalog_offset' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_offset'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'digit', 'tl_class' => 'w50'), 'sql' => "int(10) NOT NULL default '0'"),
    'customcatalog_perPage' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_perPage'], 'exclude' => \true, 'inputType' => 'text', 'default' => 30, 'eval' => array('rgxp' => 'digit', 'tl_class' => 'w50'), 'sql' => "int(10) NOT NULL default '0'"),
    'customcatalog_setVisibles' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_setVisibles']['att'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'customcatalog_visibles' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_visibles'], 'exclude' => \true, 'inputType' => 'checkbox', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getVisibles'), 'eval' => array('tl_class' => '', 'multiple' => \true, 'chosen' => \true), 'sql' => "blob NULL"),
    'customcatalog_sortField' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sortField'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getAttributes'), 'eval' => array('tl_class' => 'w50 clr', 'includeBlankOption' => \true, 'chosen' => \true, 'includeSystemColumns' => \true), 'sql' => "varchar(128) NOT NULL default ''"),
    'customcatalog_sorting' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sorting'], 'exclude' => \true, 'default' => 'desc', 'inputType' => 'select', 'options' => array('asc', 'desc', 'rand'), 'reference' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sorting'], 'eval' => array('tl_class' => 'w50'), 'sql' => "char(4) NOT NULL default ''"),
    // image_legend
    'customcatalog_attr_image' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_attr_image'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getAttributes'), 'eval' => array('tl_class' => 'clr', 'chosen' => \true, 'multiple' => \true, 'option_values' => array('image')), 'sql' => "blob NULL"),
    'customcatalog_imgSize' => array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'exclude' => \true, 'inputType' => 'imageSize', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'options_callback' => static function () {
        return \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions();
    }, 'eval' => array('rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''"),
    // filter_legend
    'customcatalog_filtersets' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filtersets'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getFiltersets'), 'eval' => array('tl_class' => 'clr', 'multiple' => \true, 'chosen' => \true), 'sql' => "blob NULL"),
    'customcatalog_filter_submit' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_submit'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50'), 'sql' => "char(1) NOT NULL default ''"),
    'customcatalog_filter_method' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_method'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('get', 'post'), 'reference' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_method'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(8) NOT NULL default ''"),
    'customcatalog_filter_formID' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_formID'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(128) NOT NULL default ''"),
    'customcatalog_filter_showAll' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_showAll'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50'), 'sql' => "char(1) NOT NULL default '1'"),
    'customcatalog_filter_actLang' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_actLang'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default '1'"),
    'customcatalog_filter_start' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_start'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getFilters'), 'eval' => array('tl_class' => 'w50 clr', 'includeBlankOption' => \true, 'chosen' => \true, 'option_values' => array('timestamp')), 'sql' => "int(10) NOT NULL default '0'"),
    'customcatalog_filter_stop' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_stop'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getFilters'), 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true, 'chosen' => \true, 'option_values' => array('timestamp')), 'sql' => "int(10) NOT NULL default '0'"),
    // template_legend
    'customcatalog_template' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_template'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'customcatalog_default', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getLayoutTemplates'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''"),
    'customcatalog_mod_template' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_template_mod'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getModuleTemplates'), 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''"),
    // advanced_sql_legend
    'customcatalog_sqlWhere' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sqlWhere'], 'exclude' => \true, 'search' => \true, 'inputType' => 'textarea', 'eval' => array('tl_class' => '', 'decodeEntities' => \true, 'placeholder' => 'id=10'), 'sql' => "mediumtext NULL"),
    'customcatalog_sqlSorting' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sqlSorting'], 'exclude' => \true, 'search' => \true, 'inputType' => 'textarea', 'eval' => array('tl_class' => '', 'decodeEntities' => \true, 'placeholder' => 'id DESC, tstamp ASC'), 'sql' => "tinytext NULL"),
    // apis_legend
    'customcatalog_api' => array('label' => &$GLOBALS['TL_LANG']['tl_module']['customcatalog_api'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableModule', 'getApis'), 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true, 'chosen' => \true), 'sql' => "int(10) NOT NULL default '0'"),
));
}

namespace {
\Contao\System::loadLanguageFile('tl_content');
// Add palettes to tl_module
$GLOBALS['TL_DCA']['tl_module']['palettes']['comments'] = '{title_legend},name,headline,type;{comment_legend},com_order,perPage,com_moderate,com_bbcode,com_protected,com_requireLogin,com_disableCaptcha;{template_legend:hide},com_template,customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID';
// Add fields to tl_module
$GLOBALS['TL_DCA']['tl_module']['fields']['com_order'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['com_order'], 'inputType' => 'select', 'options' => array('ascending', 'descending'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default 'ascending'");
$GLOBALS['TL_DCA']['tl_module']['fields']['com_moderate'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['com_moderate'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['com_bbcode'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['com_bbcode'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['com_requireLogin'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['com_requireLogin'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['com_disableCaptcha'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['com_disableCaptcha'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false));
$GLOBALS['TL_DCA']['tl_module']['fields']['com_template'] = array('label' => &$GLOBALS['TL_LANG']['tl_content']['com_template'], 'inputType' => 'select', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('com_');
}, 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''");
}
