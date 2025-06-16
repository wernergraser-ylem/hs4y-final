<?php

namespace {
$this->loadDataContainer('tl_page');
$GLOBALS['TL_DCA']['tl_article'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ptable' => 'tl_page', 'ctable' => array('tl_content'), 'switchToEdit' => \true, 'enableVersioning' => \true, 'markAsCopy' => 'title', 'onload_callback' => array(array('tl_article', 'adjustDca'), array('tl_article', 'addCustomLayoutSectionReferences'), array('tl_page', 'addBreadcrumb')), 'sql' => array('keys' => array('id' => 'primary', 'tstamp' => 'index', 'alias' => 'index', 'pid,published,inColumn,start,stop' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_TREE_EXTENDED, 'panelLayout' => 'filter;search', 'defaultSearchField' => 'title'), 'label' => array('fields' => array('title', 'inColumn'), 'format' => '%s <span class="label-info">[%s]</span>', 'label_callback' => array('tl_article', 'addIcon'))),
    // Select
    'select' => array('buttons_callback' => array(array('tl_article', 'addAliasButton'))),
    // Palettes
    'palettes' => array('__selector__' => array('protected'), 'default' => '{title_legend},title,alias,author;{layout_legend},inColumn;{teaser_legend:hide},teaserCssID,showTeaser,teaser;{syndication_legend},printable;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{publish_legend},published,start,stop'),
    // Sub-palettes
    'subpalettes' => array('protected' => 'groups'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('foreignKey' => 'tl_page.title', 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'belongsTo', 'load' => 'lazy')), 'sorting' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'title' => array('inputType' => 'text', 'search' => \true, 'eval' => array('mandatory' => \true, 'decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'alias' => array('inputType' => 'text', 'search' => \true, 'eval' => array('rgxp' => 'alias', 'doNotCopy' => \true, 'maxlength' => 255, 'tl_class' => 'w50 clr'), 'save_callback' => array(array('tl_article', 'generateAlias')), 'sql' => "varchar(255) BINARY NOT NULL default ''"), 'author' => array('default' => static fn() => \Contao\BackendUser::getInstance()->id, 'search' => \true, 'filter' => \true, 'inputType' => 'select', 'foreignKey' => 'tl_user.name', 'eval' => array('doNotCopy' => \true, 'mandatory' => \true, 'chosen' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'inColumn' => array('filter' => \true, 'inputType' => 'select', 'options_callback' => array('tl_article', 'getActiveLayoutSections'), 'eval' => array('mandatory' => \true, 'tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['COLS'], 'sql' => "varchar(32) NOT NULL default 'main'"), 'showTeaser' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'teaserCssID' => array('inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'teaser' => array('inputType' => 'textarea', 'search' => \true, 'eval' => array('rte' => 'tinyMCE', 'basicEntities' => \true, 'tl_class' => 'clr'), 'sql' => "text NULL"), 'printable' => array('inputType' => 'checkbox', 'options' => array('print', 'facebook', 'twitter'), 'eval' => array('multiple' => \true), 'reference' => &$GLOBALS['TL_LANG']['tl_article'], 'sql' => "varchar(255) NOT NULL default ''"), 'customTpl' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\Controller::getTemplateGroup('mod_article_', array(), 'mod_article');
    }, 'eval' => array('chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''"), 'protected' => array('filter' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'groups' => array('filter' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_member_group.name', 'eval' => array('mandatory' => \true, 'multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'cssID' => array('inputType' => 'text', 'eval' => array('multiple' => \true, 'size' => 2, 'tl_class' => 'w50 clr'), 'sql' => "varchar(255) NOT NULL default ''"), 'published' => array('toggle' => \true, 'filter' => \true, 'inputType' => 'checkbox', 'eval' => array('doNotCopy' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'start' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''"), 'stop' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''")),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_article extends \Contao\Backend
{
    /**
     * Check permissions to edit table tl_page
     */
    public function adjustDca()
    {
        $user = \Contao\BackendUser::getInstance();
        if ($user->isAdmin) {
            return;
        }
        // Set the default page user and group
        $GLOBALS['TL_DCA']['tl_page']['fields']['cuser']['default'] = (int) \Contao\Config::get('defaultUser') ?: $user->id;
        $GLOBALS['TL_DCA']['tl_page']['fields']['cgroup']['default'] = (int) \Contao\Config::get('defaultGroup') ?: (int) ($user->groups[0] ?? 0);
        // Restrict the page tree
        if (empty($user->pagemounts) || !\is_array($user->pagemounts)) {
            $GLOBALS['TL_DCA']['tl_page']['list']['sorting']['root'] = array(0);
        } else {
            $GLOBALS['TL_DCA']['tl_page']['list']['sorting']['root'] = $user->pagemounts;
        }
    }
    /**
     * Add an image to each page in the tree
     *
     * @param array  $row
     * @param string $label
     *
     * @return string
     */
    public function addIcon($row, $label)
    {
        $sub = 0;
        $unpublished = $row['start'] && $row['start'] > \time() || $row['stop'] && $row['stop'] <= \time();
        if ($unpublished || !$row['published']) {
            ++$sub;
        }
        if ($row['protected']) {
            $sub += 2;
        }
        $image = 'articles.svg';
        if ($sub > 0) {
            $image = 'articles_' . $sub . '.svg';
        }
        $attributes = \sprintf('data-icon="%s" data-icon-disabled="%s"', $row['protected'] ? 'articles_2.svg' : 'articles.svg', $row['protected'] ? 'articles_3.svg' : 'articles_1.svg');
        $href = \Contao\System::getContainer()->get('router')->generate('contao_backend_preview', array('page' => $row['pid'], 'article' => $row['alias'] ?: $row['id']));
        return '<a href="' . \Contao\StringUtil::specialcharsUrl($href) . '" title="' . \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['view']) . '" target="_blank">' . \Contao\Image::getHtml($image, '', $attributes) . '</a> ' . $label;
    }
    /**
     * Auto-generate an article alias if it has not been set yet
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return string
     *
     * @throws Exception
     */
    public function generateAlias($varValue, \Contao\DataContainer $dc)
    {
        $aliasExists = static function (string $alias) use($dc) : bool {
            if (\in_array($alias, array('top', 'wrapper', 'header', 'container', 'main', 'left', 'right', 'footer'), \true)) {
                return \true;
            }
            return \Contao\Database::getInstance()->prepare("SELECT id FROM tl_article WHERE alias=? AND id!=?")->execute($alias, $dc->id)->numRows > 0;
        };
        // Generate an alias if there is none
        if (!$varValue) {
            $varValue = \Contao\System::getContainer()->get('contao.slug')->generate((string) $dc->activeRecord->title, (int) $dc->activeRecord->pid, $aliasExists);
        } elseif (\preg_match('/^[1-9]\\d*$/', $varValue)) {
            throw new \Exception(\sprintf($GLOBALS['TL_LANG']['ERR']['aliasNumeric'], $varValue));
        } elseif ($aliasExists($varValue)) {
            throw new \Exception(\sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
        }
        return $varValue;
    }
    /**
     * Return all active layout sections as array
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getActiveLayoutSections(\Contao\DataContainer $dc)
    {
        // Show only active sections
        if ($dc->activeRecord->pid ?? \null) {
            $arrSections = array();
            $objPage = \Contao\PageModel::findWithDetails($dc->activeRecord->pid);
            // Get the layout sections
            if ($objPage->layout) {
                $objLayout = \Contao\LayoutModel::findById($objPage->layout);
                if ($objLayout === \null) {
                    return array();
                }
                $arrModules = \Contao\StringUtil::deserialize($objLayout->modules);
                if (empty($arrModules) || !\is_array($arrModules)) {
                    return array();
                }
                // Find all sections with an article module (see #6094)
                foreach ($arrModules as $arrModule) {
                    if ($arrModule['mod'] == 0 && ($arrModule['enable'] ?? \null)) {
                        $arrSections[] = $arrModule['col'];
                    }
                }
            }
        } else {
            $arrSections = array('header', 'left', 'right', 'main', 'footer');
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
        }
        return \Contao\Backend::convertLayoutSectionIdsToAssociativeArray($arrSections);
    }
    /**
     * Automatically generate the folder URL aliases
     *
     * @param array         $arrButtons
     * @param DataContainer $dc
     *
     * @return array
     */
    public function addAliasButton($arrButtons, \Contao\DataContainer $dc)
    {
        $security = \Contao\System::getContainer()->get('security.helper');
        if (!$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, 'tl_article::alias')) {
            return $arrButtons;
        }
        // Generate the aliases
        if (\Contao\Input::post('alias') !== \null && \Contao\Input::post('FORM_SUBMIT') == 'tl_select') {
            $router = \Contao\System::getContainer()->get('router');
            $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
            $session = $objSession->all();
            $ids = $session['CURRENT']['IDS'] ?? array();
            foreach ($ids as $id) {
                $objArticle = \Contao\ArticleModel::findById($id);
                if ($objArticle === \null) {
                    continue;
                }
                $dc->id = $id;
                $dc->activeRecord = $objArticle;
                $strAlias = '';
                // Generate new alias through save callbacks
                if (\is_array($GLOBALS['TL_DCA'][$dc->table]['fields']['alias']['save_callback'] ?? \null)) {
                    foreach ($GLOBALS['TL_DCA'][$dc->table]['fields']['alias']['save_callback'] as $callback) {
                        if (\is_array($callback)) {
                            $strAlias = \Contao\System::importStatic($callback[0])->{$callback[1]}($strAlias, $dc);
                        } elseif (\is_callable($callback)) {
                            $strAlias = $callback($strAlias, $dc);
                        }
                    }
                }
                // The alias has not changed
                if ($strAlias == $objArticle->alias) {
                    continue;
                }
                if (!$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::DC_PREFIX . 'tl_article', new \Contao\CoreBundle\Security\DataContainer\UpdateAction('tl_article', $objArticle->row(), array('alias' => $strAlias)))) {
                    continue;
                }
                // Initialize the version manager
                $objVersions = new \Contao\Versions('tl_article', $id);
                $objVersions->setEditUrl($router->generate('contao_backend', array('do' => 'article', 'act' => 'edit', 'id' => $id, 'rt' => '1')));
                $objVersions->initialize();
                // Store the new alias
                \Contao\Database::getInstance()->prepare("UPDATE tl_article SET alias=? WHERE id=?")->execute($strAlias, $id);
                // Create a new version
                $objVersions->create();
            }
            $this->redirect($this->getReferer());
        }
        // Add the button
        $arrButtons['alias'] = '<button type="submit" name="alias" id="alias" class="tl_submit" accesskey="a">' . $GLOBALS['TL_LANG']['MSC']['aliasSelected'] . '</button> ';
        return $arrButtons;
    }
}
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2021 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_article']['config']['oncopy_callback'][] = array('PCT\\AutoGrid\\Backend\\TableArticle', 'oncopyCallback');
$GLOBALS['TL_DCA']['tl_article']['config']['onsubmit_callback'][] = array('PCT\\AutoGrid\\Backend\\TableArticle', 'onsubmitCallback');
$GLOBALS['TL_DCA']['tl_article']['fields']['published']['save_callback'][] = array('PCT\\AutoGrid\\Backend\\TableArticle', 'onsaveCallback');
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright   Tim Gatzky 2019
 * @author      Tim Gatzky <info@tim-gatzky.de>
 * @package     pct_theme_settings
 * @link        http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_theme_settings');
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableArticle', 'addThemeSettingsButton');
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableArticle', 'filterPagesOnLockdown');
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\BackendIntegration', 'loadAssets');
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TableArticle', 'toggleThemeSettingsFieldValue');
/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'background';
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'overlay';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['background'] = 'bgcolor,bgcolor_css,bgimage,size,bgposition,bgrepeat,bgsize,fullscreen,offsetCssID';
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['overlay'] = 'ol_bgcolor_css,ol_position,ol_width,ol_height,ol_opacity';
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = \str_replace('customTpl', 'customTpl;{theme_settings:hide},layout_css,color_css,padding_t,padding_b,background,overlay;{animation_settings:hide},animation_type,animation_speed,animation_delay;', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = \str_replace('stop', 'stop,visibility_css', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);
/**
 * Fields
 */
$fields = array(
    // background
    'background' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['background'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    'bgcolor' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 6, 'multiple' => \true, 'size' => 2, 'colorpicker' => \true, 'isHexColor' => \true, 'decodeEntities' => \true, 'tl_class' => 'clr w50 wizard'), 'sql' => "varchar(64) NOT NULL default ''"),
    'bgimage' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgimage'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50 wizard'), 'eval' => array('filesOnly' => \true, 'extensions' => \Contao\Config::get('validImageTypes'), 'fieldType' => 'radio', 'dcaPicker' => array('do' => 'files', 'context' => 'file', 'icon' => 'pickfile.svg', 'fieldType' => 'radio', 'filesOnly' => \true, 'extensions' => \Contao\Config::get('validImageTypes')), 'tl_class' => 'w50 wizard'), 'save_callback' => array(array('PCT\\ThemeSettings\\Backend\\TableArticle', 'saveUuidFromPath')), 'load_callback' => array(array('PCT\\ThemeSettings\\Backend\\TableArticle', 'loadPathFromUuid')), 'sql' => "varchar(255) NOT NULL default ''"),
    'bgposition' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgposition'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['bgposition_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(32) NOT NULL default ''"),
    'bgrepeat' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgrepeat'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('repeat', 'repeat-x', 'repeat-y', 'no-repeat'), 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'bgsize' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgsize'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
    'size' => array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'inputType' => 'imageSize', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'options_callback' => static function () {
        return \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions();
    }, 'eval' => array('rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(128) COLLATE ascii_bin NOT NULL default ''"),
    'bgcolor_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    // overlay
    'overlay' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['overlay'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"),
    'ol_position' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_position'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['ol_position_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \false, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'ol_width' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_width'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['ol_width_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'ol_height' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_height'], 'exclude' => \true, 'inputType' => 'inputUnit', 'options' => array('px', 'pct'), 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['units'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(128) NOT NULL default ''"),
    'ol_bgcolor_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_bgcolor_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['ol_bgcolor_css_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
    'ol_opacity' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['ol_opacity'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['ol_opacity_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
    'fullscreen' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['fullscreen'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr m12 w50'), 'sql' => "char(1) NOT NULL default ''"),
    'offsetCssID' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['offsetCssID'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(196) NOT NULL default ''"),
    'layout_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['layout_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['width_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \false, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'color_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['color_classes::article'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    // general
    'padding_t' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['padding_t'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['padding_top_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \false, 'tl_class' => 'clr w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'padding_b' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['padding_b'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['padding_bottom_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \false, 'tl_class' => 'w50', 'chosen' => \true), 'sql' => "varchar(16) NOT NULL default ''"),
    'visibility_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    // animation
    'animation_type' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_type'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['animation_type_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_type'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(96) NOT NULL default ''"),
    'animation_speed' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_speed'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['animation_speed_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_speed'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
    'animation_delay' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['animation_delay'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['animation_delay_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['animation_delay'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"),
);
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_article']['fields'], 0, $fields);
}
