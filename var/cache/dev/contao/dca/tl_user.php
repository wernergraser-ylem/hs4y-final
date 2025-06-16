<?php

namespace {
$GLOBALS['TL_DCA']['tl_user'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'enableVersioning' => \true, 'onload_callback' => array(array('tl_user', 'handleUserProfile'), array('tl_user', 'addTemplateWarning')), 'onsubmit_callback' => array(array('tl_user', 'storeDateAdded'), array('tl_user', 'updateCurrentUser')), 'sql' => array('keys' => array('id' => 'primary', 'tstamp' => 'index', 'username' => 'unique', 'email' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_SORTABLE, 'fields' => array('dateAdded'), 'panelLayout' => 'filter;sort,search,limit', 'defaultSearchField' => 'name'), 'label' => array('fields' => array('', 'name', 'username', 'dateAdded'), 'showColumns' => \true, 'label_callback' => array('tl_user', 'addIcon')), 'operations' => array('su' => array('href' => 'key=su', 'icon' => 'su.svg', 'button_callback' => array('tl_user', 'switchUser')))),
    // Palettes
    'palettes' => array('__selector__' => array('inherit', 'admin'), 'login' => '{name_legend},name,email;{backend_legend},language,uploader,showHelp,thumbnails,useRTE,useCE,doNotCollapse;{session_legend},session;{password_legend},password;{theme_legend:hide},backendTheme', 'admin' => '{name_legend},username,name,email;{backend_legend:hide},language,uploader,showHelp,thumbnails,useRTE,useCE,doNotCollapse;{theme_legend:hide},backendTheme;{password_legend:hide},password,pwChange;{admin_legend},admin;{account_legend},disable,start,stop', 'default' => '{name_legend},username,name,email;{backend_legend:hide},language,uploader,showHelp,thumbnails,useRTE,useCE,doNotCollapse;{theme_legend:hide},backendTheme;{password_legend:hide},password,pwChange;{admin_legend},admin;{groups_legend},groups,inherit;{account_legend},disable,start,stop', 'group' => '{name_legend},username,name,email;{backend_legend:hide},language,uploader,showHelp,thumbnails,useRTE,useCE,doNotCollapse;{theme_legend:hide},backendTheme;{password_legend:hide},password,pwChange;{admin_legend},admin;{groups_legend},groups,inherit;{account_legend},disable,start,stop', 'extend' => '{name_legend},username,name,email;{backend_legend:hide},language,uploader,showHelp,thumbnails,useRTE,useCE,doNotCollapse;{theme_legend:hide},backendTheme;{password_legend:hide},password,pwChange;{admin_legend},admin;{groups_legend},groups,inherit;{modules_legend},modules,themes,frontendModules;{elements_legend},elements,fields;{pagemounts_legend},pagemounts,alpty;{filemounts_legend},filemounts,fop;{imageSizes_legend},imageSizes;{forms_legend},forms,formp;{amg_legend},amg;{account_legend},disable,start,stop', 'custom' => '{name_legend},username,name,email;{backend_legend:hide},language,uploader,showHelp,thumbnails,useRTE,useCE,doNotCollapse;{theme_legend:hide},backendTheme;{password_legend:hide},password,pwChange;{admin_legend},admin;{groups_legend},groups,inherit;{modules_legend},modules,themes,frontendModules;{elements_legend},elements,fields;{pagemounts_legend},pagemounts,alpty;{filemounts_legend},filemounts,fop;{imageSizes_legend},imageSizes;{forms_legend},forms,formp;{amg_legend},amg;{account_legend},disable,start,stop'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'username' => array('search' => \true, 'sorting' => \true, 'flag' => \Contao\DataContainer::SORT_INITIAL_LETTER_ASC, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'extnd', 'nospace' => \true, 'unique' => \true, 'maxlength' => 64, 'tl_class' => 'w50', 'autocapitalize' => 'off', 'autocomplete' => 'username'), 'sql' => "varchar(64) BINARY NULL"), 'name' => array('search' => \true, 'sorting' => \true, 'flag' => \Contao\DataContainer::SORT_INITIAL_LETTER_ASC, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 255, 'tl_class' => 'w50 clr'), 'sql' => "varchar(255) NOT NULL default ''"), 'email' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'email', 'maxlength' => 255, 'unique' => \true, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'language' => array('default' => \Contao\CoreBundle\Util\LocaleUtil::formatAsLocale($GLOBALS['TL_LANGUAGE']), 'filter' => \true, 'inputType' => 'select', 'eval' => array('mandatory' => \true, 'tl_class' => 'w50'), 'options_callback' => static fn() => \Contao\System::getContainer()->get('contao.intl.locales')->getEnabledLocales(\null, \Contao\Input::get('do') != 'user'), 'sql' => "varchar(64) NOT NULL default ''"), 'backendTheme' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\Backend::getThemes();
    }, 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'uploader' => array('inputType' => 'select', 'options' => array('DropZone', 'FileUpload'), 'reference' => &$GLOBALS['TL_LANG']['tl_user'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'showHelp' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \true)), 'thumbnails' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \true)), 'useRTE' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \true)), 'useCE' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \true)), 'doNotCollapse' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'password' => array('label' => &$GLOBALS['TL_LANG']['MSC']['password'], 'inputType' => 'password', 'eval' => array('mandatory' => \true, 'preserveTags' => \true, 'minlength' => \Contao\Config::get('minPasswordLength'), 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'pwChange' => array('inputType' => 'checkbox', 'filter' => \true, 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'admin' => array('exclude' => \false, 'inputType' => 'checkbox', 'filter' => \true, 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'groups' => array('filter' => \true, 'inputType' => 'checkboxWizard', 'foreignKey' => 'tl_user_group.name', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'belongsToMany', 'load' => 'lazy')), 'inherit' => array('inputType' => 'radio', 'options' => array('group', 'extend', 'custom'), 'reference' => &$GLOBALS['TL_LANG']['tl_user'], 'eval' => array('helpwizard' => \true, 'submitOnChange' => \true), 'sql' => "varchar(12) NOT NULL default 'group'"), 'modules' => array('inputType' => 'checkbox', 'options_callback' => array('tl_user', 'getModules'), 'reference' => &$GLOBALS['TL_LANG']['MOD'], 'eval' => array('multiple' => \true, 'helpwizard' => \true, 'collapseUncheckedGroups' => \true), 'sql' => "blob NULL"), 'themes' => array('inputType' => 'checkbox', 'options' => array('modules', 'layout', 'image_sizes', 'theme_import', 'theme_export'), 'reference' => &$GLOBALS['TL_LANG']['MOD'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL"), 'elements' => array('inputType' => 'checkbox', 'options_callback' => array('tl_user', 'getContentElements'), 'reference' => &$GLOBALS['TL_LANG']['CTE'], 'eval' => array('multiple' => \true, 'helpwizard' => \true, 'collapseUncheckedGroups' => \true), 'sql' => "blob NULL"), 'fields' => array('inputType' => 'checkbox', 'options' => \array_keys($GLOBALS['TL_FFL']), 'reference' => &$GLOBALS['TL_LANG']['FFL'], 'eval' => array('multiple' => \true, 'helpwizard' => \true), 'sql' => "blob NULL"), 'frontendModules' => array('inputType' => 'checkbox', 'reference' => &$GLOBALS['TL_LANG']['FMD'], 'eval' => array('multiple' => \true, 'helpwizard' => \true, 'collapseUncheckedGroups' => \true), 'sql' => "blob NULL"), 'pagemounts' => array('inputType' => 'pageTree', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox'), 'sql' => "blob NULL", 'relation' => array('table' => 'tl_page', 'type' => 'hasMany', 'load' => 'lazy')), 'alpty' => array('default' => array('regular', 'redirect', 'forward'), 'inputType' => 'checkbox', 'reference' => &$GLOBALS['TL_LANG']['PTY'], 'eval' => array('multiple' => \true, 'helpwizard' => \true), 'sql' => "blob NULL"), 'filemounts' => array('inputType' => 'fileTree', 'eval' => array('multiple' => \true, 'fieldType' => 'checkbox'), 'sql' => "blob NULL"), 'fop' => array('label' => &$GLOBALS['TL_LANG']['FOP']['fop'], 'default' => array('f1', 'f2', 'f3'), 'inputType' => 'checkbox', 'options' => array('f1', 'f2', 'f3', 'f4', 'f5', 'f6'), 'reference' => &$GLOBALS['TL_LANG']['FOP'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL"), 'imageSizes' => array('inputType' => 'checkbox', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true, 'collapseUncheckedGroups' => \true), 'options_callback' => static function () {
        return \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions();
    }, 'sql' => "blob NULL"), 'forms' => array('inputType' => 'checkbox', 'foreignKey' => 'tl_form.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'formp' => array('inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL"), 'amg' => array('inputType' => 'checkbox', 'foreignKey' => 'tl_member_group.name', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'disable' => array('reverseToggle' => \true, 'filter' => \true, 'flag' => \Contao\DataContainer::SORT_INITIAL_LETTER_DESC, 'inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'start' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''"), 'stop' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''"), 'session' => array('input_field_callback' => array('tl_user', 'sessionField'), 'options' => array('purge_session', 'purge_images', 'purge_previews', 'purge_pages'), 'eval' => array('doNotShow' => \true, 'doNotCopy' => \true), 'sql' => array('type' => 'blob', 'length' => \Doctrine\DBAL\Platforms\AbstractMySQLPlatform::LENGTH_LIMIT_MEDIUMBLOB, 'notnull' => \false)), 'dateAdded' => array('label' => &$GLOBALS['TL_LANG']['MSC']['dateAdded'], 'default' => \time(), 'sorting' => \true, 'flag' => \Contao\DataContainer::SORT_DAY_DESC, 'eval' => array('rgxp' => 'datim', 'doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default 0"), 'secret' => array('eval' => array('doNotShow' => \true, 'doNotCopy' => \true), 'sql' => "binary(128) NULL default NULL"), 'useTwoFactor' => array('eval' => array('isBoolean' => \true, 'doNotCopy' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'lastLogin' => array('eval' => array('rgxp' => 'datim', 'doNotShow' => \true, 'doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default 0"), 'currentLogin' => array('label' => &$GLOBALS['TL_LANG']['MSC']['lastLogin'], 'sorting' => \true, 'flag' => \Contao\DataContainer::SORT_DAY_DESC, 'eval' => array('rgxp' => 'datim', 'doNotCopy' => \true), 'sql' => "int(10) unsigned NOT NULL default 0"), 'backupCodes' => array('eval' => array('doNotCopy' => \true, 'doNotShow' => \true), 'sql' => "text NULL"), 'trustedTokenVersion' => array('eval' => array('doNotCopy' => \true, 'doNotShow' => \true), 'sql' => "int(10) unsigned NOT NULL default 0")),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_user extends \Contao\Backend
{
    /**
     * @var int
     */
    private static $origUserId;
    /**
     * Handle the profile page.
     *
     * @param DataContainer $dc
     */
    public function handleUserProfile(\Contao\DataContainer $dc)
    {
        if (\Contao\Input::get('do') != 'login') {
            return;
        }
        // Should not happen because of the redirect but better safe than sorry
        if (\Contao\Input::get('act') != 'edit' || \Contao\BackendUser::getInstance()->id != \Contao\Input::get('id')) {
            throw new \Contao\CoreBundle\Exception\AccessDeniedException('Not allowed to edit this page.');
        }
        $GLOBALS['TL_DCA'][$dc->table]['config']['closed'] = \true;
        $GLOBALS['TL_DCA'][$dc->table]['config']['hideVersionMenu'] = \true;
        $GLOBALS['TL_DCA'][$dc->table]['palettes'] = array('__selector__' => $GLOBALS['TL_DCA'][$dc->table]['palettes']['__selector__'], 'default' => $GLOBALS['TL_DCA'][$dc->table]['palettes']['login']);
        $arrFields = \Contao\StringUtil::trimsplit('[,;]', $GLOBALS['TL_DCA'][$dc->table]['palettes']['default'] ?? '');
        foreach ($arrFields as $strField) {
            $GLOBALS['TL_DCA'][$dc->table]['fields'][$strField]['exclude'] = \false;
        }
    }
    /**
     * Add a warning if there are users with access to the template editor.
     */
    public function addTemplateWarning()
    {
        if (\Contao\Input::get('act') && \Contao\Input::get('act') != 'select') {
            return;
        }
        $objResult = \Contao\Database::getInstance()->query("\n\t\t\tSELECT\n\t\t\t\tEXISTS(SELECT * FROM tl_user WHERE admin = 0 AND inherit != 'group' AND modules LIKE '%\"tpl_editor\"%') as showTemplateWarning,\n\t\t\t\tEXISTS(SELECT * FROM tl_user WHERE admin = 0 AND inherit != 'group' AND themes LIKE '%\"theme_import\"%') as showThemeWarning,\n\t\t\t\tEXISTS(SELECT * FROM tl_user WHERE inherit != 'group' AND elements LIKE '%\"unfiltered_html\"%') as showUnfilteredHtmlWarning\n\t\t");
        if ($objResult->showTemplateWarning) {
            \Contao\Message::addInfo($GLOBALS['TL_LANG']['MSC']['userTemplateEditor']);
        }
        if ($objResult->showThemeWarning) {
            \Contao\Message::addInfo($GLOBALS['TL_LANG']['MSC']['userThemeImport']);
        }
        if ($objResult->showUnfilteredHtmlWarning) {
            \Contao\Message::addInfo($GLOBALS['TL_LANG']['MSC']['userUnfilteredHtml']);
        }
    }
    /**
     * Add an image to each record
     *
     * @param array         $row
     * @param string        $label
     * @param DataContainer $dc
     * @param array         $args
     *
     * @return array
     */
    public function addIcon($row, $label, \Contao\DataContainer $dc, $args)
    {
        $image = $row['admin'] ? 'admin' : 'user';
        $disabled = $row['start'] !== '' && $row['start'] > \time() || $row['stop'] !== '' && $row['stop'] <= \time();
        if ($row['useTwoFactor']) {
            $image .= '_two_factor';
        }
        $icon = $image;
        if ($disabled || $row['disable']) {
            $image .= '--disabled';
        }
        $args[0] = \sprintf('<div class="list_icon_new" style="background-image:url(\'%s\')" data-icon="%s" data-icon-disabled="%s">&nbsp;</div>', \Contao\Image::getUrl($image), \Contao\Image::getUrl($icon), \Contao\Image::getUrl($icon . '--disabled'));
        return $args;
    }
    /**
     * Generate a "switch account" button and return it as string
     *
     * @param array  $row
     * @param string $href
     * @param string $label
     * @param string $title
     * @param string $icon
     *
     * @return string
     *
     * @throws Exception
     */
    public function switchUser($row, $href, $label, $title, $icon)
    {
        $security = \Contao\System::getContainer()->get('security.helper');
        if (!$security->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            return '';
        }
        $disabled = \false;
        if (\Contao\BackendUser::getInstance()->id == $row['id']) {
            $disabled = \true;
        } elseif ($security->isGranted('ROLE_PREVIOUS_ADMIN')) {
            if (self::$origUserId === \null) {
                $origToken = $security->getToken()->getOriginalToken();
                $origUser = $origToken->getUser();
                if ($origUser instanceof \Contao\BackendUser) {
                    self::$origUserId = $origUser->id;
                }
            }
            if (self::$origUserId == $row['id']) {
                $disabled = \true;
            }
        }
        if ($disabled) {
            return \Contao\Image::getHtml(\str_replace('.svg', '--disabled.svg', $icon)) . ' ';
        }
        $router = \Contao\System::getContainer()->get('router');
        $url = $router->generate('contao_backend', array('_switch_user' => $row['username']));
        return '<a href="' . $url . '" title="' . \Contao\StringUtil::specialchars($title) . '">' . \Contao\Image::getHtml($icon, $label) . '</a> ';
    }
    /**
     * Return a checkbox to delete session data
     *
     * @param DataContainer $dc
     *
     * @return string
     */
    public function sessionField(\Contao\DataContainer $dc)
    {
        $allowedOptions = $GLOBALS['TL_DCA']['tl_user']['fields']['session']['options'] ?? array();
        if (\Contao\Input::post('FORM_SUBMIT') == 'tl_user') {
            $arrPurge = \Contao\Input::post('purge');
            if (\is_array($arrPurge)) {
                $automator = new \Contao\Automator();
                $arrPurge = \array_values(\array_intersect($arrPurge, $allowedOptions));
                if (\in_array('purge_session', $arrPurge)) {
                    $objSessionBag = \Contao\System::getContainer()->get('request_stack')->getSession()->getBag('contao_backend');
                    $objSessionBag->clear();
                    \Contao\Message::addConfirmation($GLOBALS['TL_LANG']['tl_user']['sessionPurged']);
                }
                if (\in_array('purge_images', $arrPurge)) {
                    $automator->purgeImageCache();
                    \Contao\Message::addConfirmation($GLOBALS['TL_LANG']['tl_user']['htmlPurged']);
                }
                if (\in_array('purge_previews', $arrPurge)) {
                    $automator->purgePreviewCache();
                    \Contao\Message::addConfirmation($GLOBALS['TL_LANG']['tl_user']['previewPurged']);
                }
                if (\in_array('purge_pages', $arrPurge)) {
                    $automator->purgePageCache();
                    \Contao\Message::addConfirmation($GLOBALS['TL_LANG']['tl_user']['tempPurged']);
                }
                $this->reload();
            }
        }
        $options = array();
        $labels = array('purge_session' => $GLOBALS['TL_LANG']['tl_user']['sessionLabel'], 'purge_images' => $GLOBALS['TL_LANG']['tl_user']['htmlLabel'], 'purge_previews' => $GLOBALS['TL_LANG']['tl_user']['previewLabel'], 'purge_pages' => $GLOBALS['TL_LANG']['tl_user']['tempLabel']);
        foreach ($allowedOptions as $i => $operation) {
            $options[] = \sprintf('<input type="checkbox" name="purge[]" id="opt_purge_%d" class="tl_checkbox" value="%s" data-action="focus->contao--scroll-offset#store"> <label for="opt_purge_%d">%s</label>', $i, $operation, $i, $labels[$operation]);
        }
        return '
<div class="widget">
  <fieldset class="tl_checkbox_container">
    <legend>' . $GLOBALS['TL_LANG']['tl_user']['session'][0] . '</legend>
    <input type="checkbox" id="check_all_purge" class="tl_checkbox" onclick="Backend.toggleCheckboxGroup(this, \'ctrl_purge\')"> <label for="check_all_purge" class="check-all"><em>' . $GLOBALS['TL_LANG']['MSC']['selectAll'] . '</em></label><br>
    ' . \implode('<br>', $options) . '
  </fieldset>' . $dc->help() . '
</div>';
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
     * Store the date when the account has been added
     *
     * @param DataContainer $dc
     */
    public function storeDateAdded(\Contao\DataContainer $dc)
    {
        // Return if there is no active record (override all)
        if (!$dc->activeRecord || $dc->activeRecord->dateAdded > 0) {
            return;
        }
        // Fallback solution for existing accounts
        if ($dc->activeRecord->lastLogin > 0) {
            $time = $dc->activeRecord->lastLogin;
        } else {
            $time = \time();
        }
        \Contao\Database::getInstance()->prepare("UPDATE tl_user SET dateAdded=? WHERE id=?")->execute($time, $dc->id);
    }
    /**
     * Update the current user if something changes, otherwise they would be
     * logged out automatically
     *
     * @param DataContainer $dc
     */
    public function updateCurrentUser(\Contao\DataContainer $dc)
    {
        $user = \Contao\BackendUser::getInstance();
        if ($user->id == $dc->id) {
            $user->findBy('id', $user->id);
        }
    }
}
}

namespace {
// Extend the default palettes
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('faq_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('faqs', 'faqp'), 'faq_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('extend', 'tl_user')->applyToPalette('custom', 'tl_user');
// Add fields to tl_user
$GLOBALS['TL_DCA']['tl_user']['fields']['faqs'] = array('inputType' => 'checkbox', 'foreignKey' => 'tl_faq_category.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user']['fields']['faqp'] = array('inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */
/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['extend'] = \str_replace('fop;', 'fop;{pct_customelement_legend},pct_customelements,pct_customelementsp,protect_pct_customelement_groups,pct_customelement_groupsp,protect_pct_customelement_attributes,pct_customelement_attributesp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['extend']);
$GLOBALS['TL_DCA']['tl_user']['palettes']['custom'] = \str_replace('fop;', 'fop;{pct_customelement_legend},pct_customelements,pct_customelementsp,protect_pct_customelement_groups,pct_customelement_groupsp,protect_pct_customelement_attributes,pct_customelement_attributesp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['custom']);
/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['__selector__'][] = 'protect_pct_customelement_groups';
$GLOBALS['TL_DCA']['tl_user']['palettes']['__selector__'][] = 'protect_pct_customelement_attributes';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_user']['subpalettes']['protect_pct_customelement_groups'] = 'pct_customelement_groups';
$GLOBALS['TL_DCA']['tl_user']['subpalettes']['protect_pct_customelement_attributes'] = 'pct_customelement_attributes';
/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customelements'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelements'], 'exclude' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_pct_customelement.title', 'eval' => array('multiple' => \true, 'submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customelementsp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelementsp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['protect_pct_customelement_groups'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['protect_pct_customelement_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customelement_groups'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelement_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableUserGroup', 'getCustomElementGroups'), 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customelement_groupsp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelement_groupsp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'delete', 'cut'), 'reference' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelement_groupsp'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['protect_pct_customelement_attributes'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['protect_pct_customelement_attributes'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customelement_attributes'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelement_groups'], 'exclude' => \true, 'inputType' => 'checkbox', 'options_callback' => array('PCT\\CustomElements\\Backend\\TableUserGroup', 'getCustomElementAttributes'), 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customelement_attributesp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelement_attributesp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'delete', 'cut'), 'reference' => &$GLOBALS['TL_LANG']['tl_user']['pct_customelement_attributesp'], 'eval' => array('multiple' => \true, 'tl_class' => 'clr'), 'sql' => "blob NULL");
}

namespace {
// Extend the default palettes
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('news_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('news', 'newp'), 'news_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('extend', 'tl_user')->applyToPalette('custom', 'tl_user');
// Add fields to tl_user
$GLOBALS['TL_DCA']['tl_user']['fields']['news'] = array('inputType' => 'checkbox', 'foreignKey' => 'tl_news_archive.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user']['fields']['newp'] = array('inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_user']['config']['onload_callback'][] = array('PCT\\FrontendQuickEdit\\Backend\\TableUser', 'modifyDCA');
/**
 * Palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['login'] .= ';{pct_frontend_quickedit_legend:hide},pct_frontend_quickedit';
/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_frontend_quickedit'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_frontend_quickedit'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''");
}

namespace {
// Extend the default palettes
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('calendars_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('calendars', 'calendarp', 'calendarfeeds', 'calendarfeedp'), 'calendars_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('extend', 'tl_user')->applyToPalette('custom', 'tl_user');
// Add fields to tl_user
$GLOBALS['TL_DCA']['tl_user']['fields']['calendars'] = array('inputType' => 'checkbox', 'foreignKey' => 'tl_calendar.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user']['fields']['calendarp'] = array('inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['calendarfeeds'] = array('inputType' => 'checkbox', 'foreignKey' => 'tl_calendar_feed.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user']['fields']['calendarfeedp'] = array('inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
// Extend the default palettes
\Contao\CoreBundle\DataContainer\PaletteManipulator::create()->addLegend('newsletter_legend', 'amg_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_BEFORE)->addField(array('newsletters', 'newsletterp'), 'newsletter_legend', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)->applyToPalette('extend', 'tl_user')->applyToPalette('custom', 'tl_user');
// Add fields to tl_user
$GLOBALS['TL_DCA']['tl_user']['fields']['newsletters'] = array('inputType' => 'checkbox', 'foreignKey' => 'tl_newsletter_channel.title', 'eval' => array('multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy'));
$GLOBALS['TL_DCA']['tl_user']['fields']['newsletterp'] = array('inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 * @copyright	Tim Gatzky 2023, Premium Contao Themes
 * @package 	pct_theme_settings
 * @link    	https://contao.org
 */
/**
 * Palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['login'] .= ';{pct_element_library_legend:hide},pct_element_library_favorites';
/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_element_library_favorites'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_element_library_favorites'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'multiple' => \true), 'sql' => "text NULL", 'options_callback' => array('PCT\\ThemeSettings\\Backend\\TableUser', 'getElementFavorites'));
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
$GLOBALS['TL_DCA']['tl_user']['config']['onload_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableUser', 'loadCustomCatalogDca');
/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['extend'] = \str_replace('fop;', 'fop;{pct_customcatalog_legend},pct_customcatalogs,pct_customcatalogsp,protect_pct_customcatalog_groups,pct_customcatalog_groupsp,protect_pct_customcatalog_attributes,pct_customcatalog_attributesp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['extend']);
$GLOBALS['TL_DCA']['tl_user']['palettes']['custom'] = \str_replace('fop;', 'fop;{pct_customcatalog_legend},pct_customcatalogs,pct_customcatalogsp,protect_pct_customcatalog_groups,pct_customcatalog_groupsp,protect_pct_customcatalog_attributes,pct_customcatalog_attributesp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['custom']);
/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customcatalogs'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customcatalogs'], 'exclude' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_pct_customcatalog.title', 'eval' => array('multiple' => \true, 'submitOnChange' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_user']['fields']['pct_customcatalogsp'] = array('label' => &$GLOBALS['TL_LANG']['tl_user']['pct_customcatalogsp'], 'exclude' => \true, 'inputType' => 'checkbox', 'options' => array('create', 'delete'), 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('multiple' => \true), 'sql' => "blob NULL");
}
