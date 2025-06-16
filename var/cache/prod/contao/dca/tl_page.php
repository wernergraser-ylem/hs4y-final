<?php

namespace {
$GLOBALS['TL_DCA']['tl_page'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_Table::class, 'ctable' => array('tl_article'), 'enableVersioning' => \true, 'markAsCopy' => 'title', 'onload_callback' => array(array('tl_page', 'adjustDca'), array('tl_page', 'addBreadcrumb'), array('tl_page', 'setRootType'), array('tl_page', 'showFallbackWarning')), 'oncut_callback' => array(array('tl_page', 'scheduleUpdate')), 'ondelete_callback' => array(array('tl_page', 'scheduleUpdate')), 'onsubmit_callback' => array(array('tl_page', 'scheduleUpdate')), 'oninvalidate_cache_tags_callback' => array(array('tl_page', 'addSitemapCacheInvalidationTag')), 'sql' => array('keys' => array('id' => 'primary', 'tstamp' => 'index', 'alias' => 'index', 'type,dns,fallback,published,start,stop' => 'index', 'pid,published,type,start,stop' => 'index'))),
    // List
    'list' => array('sorting' => array('mode' => \Contao\DataContainer::MODE_TREE, 'rootPaste' => \true, 'showRootTrails' => \true, 'icon' => 'pagemounts.svg', 'panelLayout' => 'filter;search', 'defaultSearchField' => 'title'), 'label' => array('fields' => array('title'), 'format' => '%s', 'label_callback' => array('tl_page', 'addIcon')), 'operations' => array('articles' => array('href' => 'do=article', 'icon' => 'article.svg'))),
    // Select
    'select' => array('buttons_callback' => array(array('tl_page', 'addAliasButton'))),
    // Palettes
    'palettes' => array('__selector__' => array('type', 'fallback', 'autoforward', 'protected', 'includeLayout', 'includeCache', 'includeChmod', 'enforceTwoFactor', 'enableCsp'), 'default' => '{title_legend},title,type', 'regular' => '{title_legend},title,type;{routing_legend},alias,requireItem,routePath,routePriority,routeConflicts;{meta_legend},pageTitle,robots,description,serpPreview;{canonical_legend:hide},canonicalLink,canonicalKeepParams;{protected_legend:hide},protected;{layout_legend:hide},includeLayout;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass,sitemap,hide,guests,noSearch;{tabnav_legend:hide},accesskey;{publish_legend},published,start,stop', 'forward' => '{title_legend},title,type;{routing_legend},alias,routePath,routePriority,routeConflicts;{meta_legend},pageTitle,robots;{redirect_legend},jumpTo,redirect,alwaysForward;{protected_legend:hide},protected;{layout_legend:hide},includeLayout;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass,sitemap,hide,guests;{tabnav_legend:hide},accesskey;{publish_legend},published,start,stop', 'redirect' => '{title_legend},title,type;{routing_legend},alias,routePath,routePriority,routeConflicts;{meta_legend},pageTitle,robots;{redirect_legend},redirect,url,target;{protected_legend:hide},protected;{layout_legend:hide},includeLayout;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass,sitemap,hide,guests;{tabnav_legend:hide},accesskey;{publish_legend},published,start,stop', 'root' => '{title_legend},title,type;{routing_legend},alias;{meta_legend},pageTitle;{url_legend},dns,useSSL,urlPrefix,urlSuffix,validAliasCharacters,useFolderUrl;{language_legend},language,fallback,disableLanguageRedirect;{website_legend:hide},maintenanceMode;{csp_legend},enableCsp;{global_legend:hide},mailerTransport,enableCanonical,adminEmail,dateFormat,timeFormat,datimFormat,staticFiles,staticPlugins;{protected_legend:hide},protected;{layout_legend},includeLayout;{twoFactor_legend:hide},enforceTwoFactor;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{publish_legend},published,start,stop', 'rootfallback' => '{title_legend},title,type;{routing_legend},alias;{meta_legend},pageTitle;{url_legend},dns,useSSL,urlPrefix,urlSuffix,validAliasCharacters,useFolderUrl;{language_legend},language,fallback,disableLanguageRedirect;{website_legend:hide},favicon,robotsTxt,maintenanceMode;{csp_legend},enableCsp;{global_legend:hide},mailerTransport,enableCanonical,adminEmail,dateFormat,timeFormat,datimFormat,staticFiles,staticPlugins;{protected_legend:hide},protected;{layout_legend},includeLayout;{twoFactor_legend:hide},enforceTwoFactor;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{publish_legend},published,start,stop', 'logout' => '{title_legend},title,type;{routing_legend},alias,routePath,routePriority,routeConflicts;{forward_legend},jumpTo,redirectBack;{protected_legend:hide},protected;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass,sitemap,hide;{tabnav_legend:hide},accesskey;{publish_legend},published,start,stop', 'error_401' => '{title_legend},title,type;{meta_legend},pageTitle,robots,description;{forward_legend},autoforward;{layout_legend:hide},includeLayout;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass;{publish_legend},published,start,stop', 'error_403' => '{title_legend},title,type;{meta_legend},pageTitle,robots,description;{forward_legend},autoforward;{layout_legend:hide},includeLayout;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass;{publish_legend},published,start,stop', 'error_404' => '{title_legend},title,type;{meta_legend},pageTitle,robots,description;{forward_legend},autoforward;{layout_legend:hide},includeLayout;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass;{publish_legend},published,start,stop', 'error_503' => '{title_legend},title,type;{meta_legend},pageTitle,robots,description;{forward_legend},autoforward;{layout_legend:hide},includeLayout;{cache_legend:hide},includeCache;{chmod_legend:hide},includeChmod;{expert_legend:hide},cssClass;{publish_legend},published,start,stop'),
    // Sub-palettes
    'subpalettes' => array('autoforward' => 'jumpTo', 'protected' => 'groups', 'includeLayout' => 'layout,subpageLayout', 'includeCache' => 'clientCache,cache,alwaysLoadFromCache', 'includeChmod' => 'cuser,cgroup,chmod', 'enforceTwoFactor' => 'twoFactorJumpTo', 'enableCsp' => 'csp,cspReportOnly,cspReportLog'),
    // Fields
    'fields' => array('id' => array('sql' => "int(10) unsigned NOT NULL auto_increment"), 'pid' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'sorting' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'tstamp' => array('sql' => "int(10) unsigned NOT NULL default 0"), 'title' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'basicEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'type' => array('filter' => \true, 'inputType' => 'select', 'eval' => array('helpwizard' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['PTY'], 'sql' => "varchar(64) NOT NULL default 'regular'"), 'alias' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'folderalias', 'doNotCopy' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) BINARY NOT NULL default ''"), 'requireItem' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'routePath' => array(), 'routePriority' => array('inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "int(10) NOT NULL default 0"), 'routeConflicts' => array(), 'pageTitle' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'basicEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'language' => array('search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'maxlength' => 64, 'nospace' => \true, 'decodeEntities' => \true, 'doNotCopy' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''", 'save_callback' => array(static function ($value) {
        // Make sure there is at least a basic language
        if (!\preg_match('/^[a-z]{2,}/i', $value)) {
            throw new \RuntimeException($GLOBALS['TL_LANG']['ERR']['language']);
        }
        return \Contao\CoreBundle\Util\LocaleUtil::canonicalize($value);
    })), 'robots' => array('search' => \true, 'inputType' => 'select', 'options' => array('index,follow', 'index,nofollow', 'noindex,follow', 'noindex,nofollow'), 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'description' => array('search' => \true, 'inputType' => 'textarea', 'eval' => array('style' => 'height:60px', 'decodeEntities' => \true, 'tl_class' => 'clr'), 'sql' => "text NULL"), 'serpPreview' => array('label' => &$GLOBALS['TL_LANG']['MSC']['serpPreview'], 'inputType' => 'serpPreview', 'eval' => array('title_tag_callback' => array('tl_page', 'getTitleTag'), 'titleFields' => array('pageTitle', 'title'), 'tl_class' => 'clr'), 'sql' => \null), 'redirect' => array('inputType' => 'select', 'options' => array('permanent', 'temporary'), 'eval' => array('tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['tl_page'], 'sql' => "varchar(32) NOT NULL default 'permanent'"), 'alwaysForward' => array('exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'jumpTo' => array(
        'inputType' => 'pageTree',
        'foreignKey' => 'tl_page.title',
        'eval' => array('fieldType' => 'radio'),
        // do not set mandatory (see #5453)
        'save_callback' => array(array('tl_page', 'checkJumpTo')),
        'sql' => "int(10) unsigned NOT NULL default 0",
        'relation' => array('type' => 'hasOne', 'load' => 'lazy'),
    ), 'redirectBack' => array('inputType' => 'checkbox', 'sql' => array('type' => 'boolean', 'default' => \false)), 'url' => array('label' => &$GLOBALS['TL_LANG']['MSC']['url'], 'search' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 2048, 'dcaPicker' => \true, 'tl_class' => 'w50 clr'), 'sql' => "varchar(2048) NOT NULL default ''"), 'target' => array('label' => &$GLOBALS['TL_LANG']['MSC']['target'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'dns' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'load_callback' => array(array('tl_page', 'loadDns')), 'save_callback' => array(array('tl_page', 'checkDns')), 'sql' => "varchar(255) NOT NULL default ''"), 'staticFiles' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'trailingSlash' => \false, 'tl_class' => 'w50'), 'save_callback' => array(array('tl_page', 'checkStaticUrl')), 'sql' => "varchar(255) NOT NULL default ''"), 'staticPlugins' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'trailingSlash' => \false, 'tl_class' => 'w50'), 'save_callback' => array(array('tl_page', 'checkStaticUrl')), 'sql' => "varchar(255) NOT NULL default ''"), 'fallback' => array('inputType' => 'checkbox', 'eval' => array('doNotCopy' => \true, 'submitOnChange' => \true, 'tl_class' => 'w50 clr'), 'save_callback' => array(array('tl_page', 'checkFallback')), 'sql' => array('type' => 'boolean', 'default' => \false)), 'disableLanguageRedirect' => array('inputType' => 'checkbox', 'eval' => array('doNotCopy' => \true, 'tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'favicon' => array('inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio', 'extensions' => 'ico,svg,png'), 'sql' => "binary(16) NULL"), 'robotsTxt' => array('inputType' => 'textarea', 'eval' => array('doNotCopy' => \true, 'decodeEntities' => \true), 'sql' => "text NULL"), 'maintenanceMode' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'mailerTransport' => array('inputType' => 'select', 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true), 'sql' => "varchar(255) NOT NULL default ''"), 'enableCanonical' => array('inputType' => 'checkbox', 'default' => \true, 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'canonicalLink' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'url', 'decodeEntities' => \true, 'maxlength' => 2048, 'dcaPicker' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(2048) NOT NULL default ''"), 'canonicalKeepParams' => array('inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'maxlength' => 255, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'adminEmail' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 255, 'rgxp' => 'friendly', 'decodeEntities' => \true, 'placeholder' => \Contao\Config::get('adminEmail'), 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'dateFormat' => array('search' => \true, 'inputType' => 'text', 'eval' => array('helpwizard' => \true, 'decodeEntities' => \true, 'placeholder' => \Contao\Config::get('dateFormat'), 'tl_class' => 'w50'), 'explanation' => 'dateFormat', 'sql' => "varchar(32) NOT NULL default ''"), 'timeFormat' => array('search' => \true, 'inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'placeholder' => \Contao\Config::get('timeFormat'), 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'datimFormat' => array('search' => \true, 'inputType' => 'text', 'eval' => array('decodeEntities' => \true, 'placeholder' => \Contao\Config::get('datimFormat'), 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'validAliasCharacters' => array('inputType' => 'select', 'options_callback' => static function () {
        return \Contao\System::getContainer()->get('contao.slug.valid_characters')->getOptions();
    }, 'eval' => array('includeBlankOption' => \true, 'decodeEntities' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'useFolderUrl' => array('exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'urlPrefix' => array('inputType' => 'text', 'eval' => array('rgxp' => 'folderalias', 'doNotCopy' => \true, 'maxlength' => 128, 'tl_class' => 'w50'), 'sql' => "varchar(128) BINARY NOT NULL default ''"), 'urlSuffix' => array('exclude' => \true, 'inputType' => 'text', 'eval' => array('nospace' => 'true', 'maxlength' => 16, 'tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"), 'useSSL' => array('inputType' => 'select', 'options' => array('http://', 'https://'), 'eval' => array('tl_class' => 'w50', 'isAssociative' => \true), 'sql' => array('type' => 'boolean', 'default' => \true)), 'autoforward' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'protected' => array('filter' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'groups' => array('filter' => \true, 'inputType' => 'checkbox', 'foreignKey' => 'tl_member_group.name', 'eval' => array('mandatory' => \true, 'multiple' => \true), 'sql' => "blob NULL", 'relation' => array('type' => 'hasMany', 'load' => 'lazy')), 'includeLayout' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'layout' => array('search' => \true, 'inputType' => 'select', 'foreignKey' => 'tl_layout.name', 'eval' => array('chosen' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'subpageLayout' => array('search' => \true, 'inputType' => 'select', 'foreignKey' => 'tl_layout.name', 'eval' => array('chosen' => \true, 'tl_class' => 'w50', 'includeBlankOption' => \true, 'blankOptionLabel' => &$GLOBALS['TL_LANG']['tl_page']['layout_inherit']), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'includeCache' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'cache' => array('search' => \true, 'inputType' => 'select', 'options' => array(0, 5, 15, 30, 60, 300, 900, 1800, 3600, 10800, 21600, 43200, 86400, 259200, 604800, 2592000, 7776000, 15552000, 31536000), 'reference' => &$GLOBALS['TL_LANG']['CACHE'], 'eval' => array('tl_class' => 'w50 clr'), 'sql' => "int(10) unsigned NOT NULL default 0"), 'alwaysLoadFromCache' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50 m12'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'clientCache' => array('search' => \true, 'inputType' => 'select', 'options' => array(0, 5, 15, 30, 60, 300, 900, 1800, 3600, 10800, 21600, 43200, 86400, 259200, 604800, 2592000), 'reference' => &$GLOBALS['TL_LANG']['CACHE'], 'eval' => array('tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0"), 'includeChmod' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'cuser' => array('default' => (int) \Contao\Config::get('defaultUser'), 'search' => \true, 'inputType' => 'select', 'foreignKey' => 'tl_user.name', 'eval' => array('mandatory' => \true, 'chosen' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'cgroup' => array('default' => (int) \Contao\Config::get('defaultGroup'), 'search' => \true, 'inputType' => 'select', 'foreignKey' => 'tl_user_group.name', 'eval' => array('mandatory' => \true, 'chosen' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'chmod' => array('default' => \Contao\Config::get('defaultChmod'), 'inputType' => 'chmod', 'eval' => array('tl_class' => 'clr'), 'sql' => "varchar(255) NOT NULL default ''"), 'noSearch' => array('filter' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'cssClass' => array('search' => \true, 'inputType' => 'text', 'eval' => array('maxlength' => 64, 'tl_class' => 'w50'), 'sql' => "varchar(64) NOT NULL default ''"), 'sitemap' => array('inputType' => 'select', 'options' => array('map_default', 'map_always', 'map_never'), 'eval' => array('maxlength' => 32, 'tl_class' => 'w50'), 'reference' => &$GLOBALS['TL_LANG']['tl_page'], 'sql' => "varchar(32) NOT NULL default ''"), 'hide' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'guests' => array('exclude' => \true, 'filter' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w25'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'accesskey' => array('search' => \true, 'inputType' => 'text', 'eval' => array('rgxp' => 'alnum', 'maxlength' => 1, 'tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''"), 'published' => array('toggle' => \true, 'filter' => \true, 'inputType' => 'checkbox', 'eval' => array('doNotCopy' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'start' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''"), 'stop' => array('inputType' => 'text', 'eval' => array('rgxp' => 'datim', 'datepicker' => \true, 'tl_class' => 'w50 wizard'), 'sql' => "varchar(10) NOT NULL default ''"), 'enforceTwoFactor' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'twoFactorJumpTo' => array('inputType' => 'pageTree', 'foreignKey' => 'tl_page.title', 'eval' => array('fieldType' => 'radio', 'mandatory' => \true), 'save_callback' => array(array('tl_page', 'checkJumpTo')), 'sql' => "int(10) unsigned NOT NULL default 0", 'relation' => array('type' => 'hasOne', 'load' => 'lazy')), 'enableCsp' => array('inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => array('type' => 'boolean', 'default' => \false)), 'csp' => array('inputType' => 'textarea', 'default' => "default-src 'self'", 'eval' => array('mandatory' => \true, 'decodeEntities' => \true), 'sql' => array('type' => 'text', 'notnull' => \false)), 'cspReportOnly' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false)), 'cspReportLog' => array('inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => array('type' => 'boolean', 'default' => \false))),
);
/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @internal
 */
class tl_page extends \Contao\Backend
{
    /**
     * Check permissions to edit table tl_page
     *
     * @throws AccessDeniedException
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
            $root = array(0);
        } else {
            $root = $user->pagemounts;
        }
        $GLOBALS['TL_DCA']['tl_page']['list']['sorting']['rootPaste'] = \false;
        $GLOBALS['TL_DCA']['tl_page']['list']['sorting']['root'] = $root;
    }
    /**
     * Add the breadcrumb menu
     */
    public function addBreadcrumb()
    {
        \Contao\Backend::addPagesBreadcrumb();
    }
    /**
     * Make new top-level pages root pages
     *
     * @param DataContainer $dc
     */
    public function setRootType(\Contao\DataContainer $dc)
    {
        if (\Contao\Input::get('act') != 'create') {
            return;
        }
        // Insert into
        if (\Contao\Input::get('pid') == 0) {
            $GLOBALS['TL_DCA']['tl_page']['fields']['type']['default'] = 'root';
        } elseif (\Contao\Input::get('mode') == \Contao\DataContainer::PASTE_AFTER) {
            $objPage = \Contao\Database::getInstance()->prepare("SELECT * FROM " . $dc->table . " WHERE id=?")->limit(1)->execute(\Contao\Input::get('pid'));
            if ($objPage->pid == 0) {
                $GLOBALS['TL_DCA']['tl_page']['fields']['type']['default'] = 'root';
            }
        }
    }
    /**
     * Return the title tag from the associated page layout
     *
     * @param PageModel $page
     *
     * @return string
     */
    public function getTitleTag(\Contao\PageModel $page)
    {
        $page->loadDetails();
        if (!($layout = \Contao\LayoutModel::findById($page->layout))) {
            return '';
        }
        $origObjPage = $GLOBALS['objPage'] ?? \null;
        // Override the global page object, so we can replace the insert tags
        $GLOBALS['objPage'] = $page;
        $title = \implode('%s', \array_map(static function ($strVal) {
            return \str_replace('%', '%%', \Contao\System::getContainer()->get('contao.insert_tag.parser')->replaceInline($strVal));
        }, \explode('{{page::pageTitle}}', $layout->titleTag ?: '{{page::pageTitle}} - {{page::rootPageTitle}}', 2)));
        $GLOBALS['objPage'] = $origObjPage;
        return $title;
    }
    /**
     * Show a warning if there is no language fallback page
     */
    public function showFallbackWarning()
    {
        if (\in_array(\Contao\Input::get('act'), array('paste', 'select', \null))) {
            $messages = new \Contao\Messages();
            \Contao\Message::addRaw($messages->languageFallback());
        }
    }
    /**
     * Schedule a sitemap update
     *
     * This method is triggered when a single page or multiple pages are
     * modified (edit/editAll), moved (cut/cutAll) or deleted
     * (delete/deleteAll). Since duplicated pages are unpublished by default,
     * it is not necessary to schedule updates on copyAll as well.
     *
     * @param DataContainer $dc
     */
    public function scheduleUpdate(\Contao\DataContainer $dc)
    {
        // Return if there is no ID
        if (!$dc->activeRecord?->id || \Contao\Input::get('act') == 'copy') {
            return;
        }
        $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
        // Store the ID in the session
        $session = $objSession->get('sitemap_updater');
        $session[] = \Contao\PageModel::findWithDetails($dc->activeRecord->id)->rootId;
        $objSession->set('sitemap_updater', \array_unique($session));
    }
    /**
     * Check the sitemap alias
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function checkFeedAlias($varValue, \Contao\DataContainer $dc)
    {
        // No change or empty value
        if (!$varValue || $varValue == $dc->value) {
            return $varValue;
        }
        $varValue = \Contao\StringUtil::standardize($varValue);
        // see #5096
        $arrFeeds = (new \Contao\Automator())->purgeXmlFiles(\true);
        // Alias exists
        if (\in_array($varValue, $arrFeeds)) {
            throw new \Exception(\sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
        }
        return $varValue;
    }
    /**
     * Prevent circular references
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function checkJumpTo($varValue, \Contao\DataContainer $dc)
    {
        if ($varValue == $dc->id) {
            throw new \Exception($GLOBALS['TL_LANG']['ERR']['circularReference']);
        }
        return $varValue;
    }
    /**
     * Load the DNS settings
     *
     * @param string $varValue
     *
     * @return string
     */
    public function loadDns($varValue)
    {
        return \Contao\Idna::decode($varValue);
    }
    /**
     * Check the DNS settings
     *
     * @param string $varValue
     *
     * @return string
     */
    public function checkDns($varValue)
    {
        if (!$varValue) {
            return '';
        }
        // The first part will match IPv6 addresses in square brackets. The
        // second part will match domain names and IPv4 addresses.
        \preg_match('#^(?:[a-z]+://)?(\\[[0-9a-f:]+]|[\\pN\\pL._-]*)#ui', $varValue, $matches);
        return \Contao\Idna::encode($matches[1]);
    }
    /**
     * Make sure there is only one fallback per domain (thanks to Andreas Schempp)
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function checkFallback($varValue, \Contao\DataContainer $dc)
    {
        if (!$varValue) {
            return '';
        }
        $objPage = \Contao\Database::getInstance()->prepare("SELECT id FROM tl_page WHERE type='root' AND fallback=1 AND dns=? AND id!=?")->execute($dc->activeRecord->dns, $dc->activeRecord->id);
        if ($objPage->numRows) {
            throw new \Exception($GLOBALS['TL_LANG']['ERR']['multipleFallback']);
        }
        return $varValue;
    }
    /**
     * Check a static URL
     *
     * @param mixed $varValue
     *
     * @return mixed
     */
    public function checkStaticUrl($varValue)
    {
        if ($varValue) {
            $varValue = \preg_replace('@https?://@', '', $varValue);
        }
        return $varValue;
    }
    /**
     * Add an image to each page in the tree
     *
     * @param array         $row
     * @param string        $label
     * @param DataContainer $dc
     * @param string        $imageAttribute
     * @param boolean       $blnReturnImage
     * @param boolean       $blnProtected
     * @param boolean       $isVisibleRootTrailPage
     *
     * @return string
     */
    public function addIcon($row, $label, \Contao\DataContainer|null $dc = \null, $imageAttribute = '', $blnReturnImage = \false, $blnProtected = \false, $isVisibleRootTrailPage = \false)
    {
        return \Contao\Backend::addPageIcon($row, $label, $dc, $imageAttribute, $blnReturnImage, $blnProtected, $isVisibleRootTrailPage);
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
        if (!$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, 'tl_page::alias')) {
            return $arrButtons;
        }
        // Generate the aliases
        if (\Contao\Input::post('alias') !== \null && \Contao\Input::post('FORM_SUBMIT') == 'tl_select') {
            $router = \Contao\System::getContainer()->get('router');
            $objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
            $session = $objSession->all();
            $ids = $session['CURRENT']['IDS'] ?? array();
            foreach ($ids as $id) {
                $objPage = \Contao\PageModel::findWithDetails($id);
                if ($objPage === \null) {
                    continue;
                }
                $dc->id = $id;
                $dc->activeRecord = $objPage;
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
                if ($strAlias == $objPage->alias) {
                    continue;
                }
                if (!$security->isGranted(\Contao\CoreBundle\Security\ContaoCorePermissions::DC_PREFIX . 'tl_article', new \Contao\CoreBundle\Security\DataContainer\UpdateAction('tl_page', $objPage->row(), array('alias' => $strAlias)))) {
                    continue;
                }
                // Initialize the version manager
                $objVersions = new \Contao\Versions('tl_page', $id);
                $objVersions->setEditUrl($router->generate('contao_backend', array('do' => 'page', 'act' => 'edit', 'id' => $id, 'rt' => '1')));
                $objVersions->initialize();
                // Store the new alias
                \Contao\Database::getInstance()->prepare("UPDATE tl_page SET alias=? WHERE id=?")->execute($strAlias, $id);
                // Create a new version
                $objVersions->create();
                // Update the record stored in the page registry (see #6542)
                \Contao\PageModel::findById($id)->alias = $strAlias;
            }
            $this->redirect($this->getReferer());
        }
        // Add the button
        $arrButtons['alias'] = '<button type="submit" name="alias" id="alias" class="tl_submit" accesskey="a">' . $GLOBALS['TL_LANG']['MSC']['aliasSelected'] . '</button> ';
        return $arrButtons;
    }
    /**
     * @param DataContainer $dc
     *
     * @return array
     */
    public function addSitemapCacheInvalidationTag($dc, array $tags)
    {
        $pageModel = \Contao\PageModel::findWithDetails($dc->id);
        if ($pageModel === \null) {
            return $tags;
        }
        return \array_merge($tags, array('contao.sitemap.' . $pageModel->rootId));
    }
}
}

namespace {
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2019 Leo Feyer
 *
 * @copyright	Tim Gatzky 2019, Premium-Contao-Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package 	pct_seo_helper
 * @link    	https://contao.org, https://www.premium-contao-themes.com
 * @license 	http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = \str_replace('description', 'description,pct_structured_data', $GLOBALS['TL_DCA']['tl_page']['palettes']['regular']);
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['pct_structured_data'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['pct_structured_data'], 'exclude' => \true, 'inputType' => 'textarea', 'eval' => array('allowHtml' => \true, 'class' => 'monospace', 'rte' => 'ace|html'), 'sql' => "mediumtext NULL");
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_megamenu
 * @link		http://contao.org
 */
/**
 * List
 */
$GLOBALS['TL_DCA']['tl_page']['list']['operations']['articles']['button_callback'] = array('PCT\\MegaMenu\\TablePage', 'editArticlesHelper');
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['pct_megamenu'] = '{title_legend},title,alias,type;{meta_legend},robots,sitemap;{protected_legend:hide},protected;{expert_legend:hide},cssClass,guests;{tabnav_legend:hide},tabindex,accesskey;{publish_legend},published,start,stop';
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('\\PCT\\Themer\\Backend', 'modifyDca');
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('\\PCT\\Themer\\Backend', 'showMissingThemeDesignerSavesInfo');
#$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] 		= array('\PCT\Themer\Backend','onVersionChange');
#$GLOBALS['TL_DCA']['tl_page']['config']['onversion_callback'][] 	= array('\PCT\Themer\Backend','onVersionCallback');
#$GLOBALS['TL_DCA']['tl_page']['config']['onsubmit_callback'][] 		= array('\PCT\Themer\Backend','importTheme');
#$GLOBALS['TL_DCA']['tl_page']['config']['onsubmit_callback'][] 		= array('\PCT\Themer\Backend','addNewRecordsToVersion');
/**
 * Operations
 */
$GLOBALS['TL_DCA']['tl_page']['list']['operations']['pct_theme_export'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_export'], 'href' => 'key=theme_export&status=run', 'icon' => 'theme_export.gif', 'attributes' => 'onclick="Backend.getScrollOffset()"', 'button_callback' => array('PCT\\Themer\\Backend', 'exportButton'));
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = \str_replace('includeLayout', 'includeLayout;{pct_theme_legend:hide},pct_theme,pct_themedesigner_hidden;', $GLOBALS['TL_DCA']['tl_page']['palettes']['root']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] = \str_replace('includeLayout', 'includeLayout;{pct_theme_legend:hide},pct_theme,pct_themedesigner_hidden;', $GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback']);
/**
 * Subpalettes
 */
#$GLOBALS['TL_DCA']['tl_page']['subpalettes']['pct_theme_import'] = 'pct_theme_template';
#$GLOBALS['TL_DCA']['tl_page']['subpalettes']['pct_theme_import'] = 'pct_theme_cto';
/**
 * Fields
 */
if (!isset($GLOBALS['PCT_THEMER']['THEMES']) || !\is_array($GLOBALS['PCT_THEMER']['THEMES'])) {
    $GLOBALS['PCT_THEMER']['THEMES'] = array();
}
$arrOptions = \array_keys($GLOBALS['PCT_THEMER']['THEMES']);
\sort($arrOptions);
$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['pct_theme'], 'exclude' => \true, 'inputType' => 'select', 'options' => $arrOptions, 'reference' => &$GLOBALS['TL_LANG']['tl_page']['pct_theme'], 'eval' => array('tl_class' => 'clr', 'includeBlankOption' => \true, 'submitOnChange' => \false, 'chosen' => \true), 'sql' => "varchar(64) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme_import'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_import'], 'exclude' => \true, 'default' => 0, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme_cto'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_cto'], 'exclude' => \true, 'inputType' => 'select', 'foreignKey' => 'tl_theme.name', 'eval' => array('tl_class' => 'clr', 'mandatory' => \true, 'chosen' => \true), 'sql' => "int(10) NOT NULL default '0'");
$GLOBALS['TL_DCA']['tl_page']['fields']['pct_themedesigner_hidden'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['pct_themedesigner_hidden'], 'exclude' => \true, 'default' => 0, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''");
#$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme_template'] = array
#(
#	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_template'],
#	'exclude'                 => true,
#	'inputType'               => 'select',
#	'options_callback'		  => array('PCT\ThemerBackend','getTemplates'),
#	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
#	#'save_callback'			  => array('PCT\Themer' => 'runThemeImport'),
#	'sql'					  => "varchar(96) NOT NULL default ''",
#);
}

namespace {
/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['news_feed'] = '{title_legend},title,type;{routing_legend},alias,routePath,routePriority,routeConflicts;{archives_legend},newsArchives;{feed_legend},feedFormat,feedSource,maxFeedItems,feedFeatured,feedDescription;{image_legend},imgSize;{cache_legend:hide},includeCache;{expert_legend:hide},cssClass,sitemap,hide,noSearch;{publish_legend},published,start,stop';
$GLOBALS['TL_DCA']['tl_page']['fields']['newsArchives'] = array('exclude' => \true, 'search' => \true, 'inputType' => 'checkbox', 'eval' => array('multiple' => \true, 'mandatory' => \true), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_page']['fields']['feedFormat'] = array('exclude' => \true, 'inputType' => 'select', 'options' => array('rss' => 'RSS 2.0', 'atom' => 'Atom', 'json' => 'JSON'), 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'rss'");
$GLOBALS['TL_DCA']['tl_page']['fields']['feedSource'] = array('exclude' => \true, 'inputType' => 'select', 'options' => array('source_teaser', 'source_text'), 'reference' => &$GLOBALS['TL_LANG']['tl_page'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(32) COLLATE ascii_bin NOT NULL default 'source_teaser'");
$GLOBALS['TL_DCA']['tl_page']['fields']['maxFeedItems'] = array('exclude' => \true, 'inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'tl_class' => 'w50'), 'sql' => "smallint(5) unsigned NOT NULL default 25");
$GLOBALS['TL_DCA']['tl_page']['fields']['feedFeatured'] = array('exclude' => \true, 'inputType' => 'select', 'options' => array('all_items', 'featured', 'unfeatured'), 'reference' => &$GLOBALS['TL_LANG']['tl_page'], 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(16) COLLATE ascii_bin NOT NULL default 'all_items'");
$GLOBALS['TL_DCA']['tl_page']['fields']['feedDescription'] = array('exclude' => \true, 'inputType' => 'textarea', 'eval' => array('style' => 'height:60px', 'tl_class' => 'clr'), 'sql' => "text NULL");
$GLOBALS['TL_DCA']['tl_page']['fields']['imgSize'] = array('label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'], 'exclude' => \true, 'inputType' => 'imageSize', 'reference' => &$GLOBALS['TL_LANG']['MSC'], 'eval' => array('rgxp' => 'natural', 'includeBlankOption' => \true, 'nospace' => \true, 'helpwizard' => \true, 'tl_class' => 'w50'), 'options_callback' => array('contao.listener.image_size_options', '__invoke'), 'sql' => "varchar(255) NOT NULL default ''");
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
\Contao\System::loadLanguageFile('tl_content');
/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TablePage', 'filterPagesOnLockdown');
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('PCT\\ThemeSettings\\Backend\\TablePage', 'modifyDCA');
/**
 * List
 */
$GLOBALS['TL_DCA']['tl_page']['list']['label']['label_callback'] = array('PCT\\ThemeSettings\\Backend\\TablePage', 'getLabel');
/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addImage';
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addArticle';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addImage'] = 'singleSRC,imgHeadline,imgSubheadline,style_css,height_css,bgcolor_css,color_css';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addArticle'] = 'article,article_top';
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = \str_replace('includeLayout;', 'includeLayout;{theme_settings:hide},addImage,addArticle,ribbon,analytics_google,analytics_matomo,google_maps;', $GLOBALS['TL_DCA']['tl_page']['palettes']['root']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] = \str_replace('includeLayout;', 'includeLayout;{theme_settings:hide},addImage,ribbon,addArticle,analytics_google,analytics_matomo,google_maps;', $GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = \str_replace('includeLayout;', 'includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;', $GLOBALS['TL_DCA']['tl_page']['palettes']['regular']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['forward'] = \str_replace('includeLayout;', 'includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;', $GLOBALS['TL_DCA']['tl_page']['palettes']['forward']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['redirect'] = \str_replace('includeLayout;', 'includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;', $GLOBALS['TL_DCA']['tl_page']['palettes']['redirect']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['error_403'] = \str_replace('includeLayout;', 'includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;', $GLOBALS['TL_DCA']['tl_page']['palettes']['error_403']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['error_404'] = \str_replace('includeLayout;', 'includeLayout;{theme_settings:hide},addImage,addArticle,ribbon;', $GLOBALS['TL_DCA']['tl_page']['palettes']['error_404']);
foreach (array('root', 'rootfallback', 'regular', 'forward', 'redirect', 'error_403', 'error_404', 'pct_megamenu') as $type) {
    $GLOBALS['TL_DCA']['tl_page']['palettes'][$type] = \str_replace('stop', 'stop,visibility_css', $GLOBALS['TL_DCA']['tl_page']['palettes'][$type]);
    $GLOBALS['TL_DCA']['tl_page']['palettes'][$type] = \str_replace('cssClass', 'cssClass,helper_css', $GLOBALS['TL_DCA']['tl_page']['palettes'][$type]);
}
// favicons template selection
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = \str_replace('maintenanceMode', 'favicon_tpl,maintenanceMode', $GLOBALS['TL_DCA']['tl_page']['palettes']['root']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] = \str_replace('favicon', 'favicon,favicon_tpl', $GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback']);
/**
 * Fields
 */
$fields = array('ribbon' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['ribbon'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'maxlength' => 255), 'sql' => "varchar(255) NOT NULL default ''"), 'addImage' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['addImage'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"), 'singleSRC' => array('label' => &$GLOBALS['TL_LANG']['tl_content']['singleSRC'], 'exclude' => \true, 'inputType' => 'fileTree', 'eval' => array('filesOnly' => \true, 'fieldType' => 'radio', 'tl_class' => 'clr'), 'sql' => "binary(16) NULL"), 'style_css' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['style_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('style1', 'style2', 'style3'), 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['style_css'], 'eval' => array('tl_class' => 'clr w50', 'includeBlankOption' => \false), 'sql' => "varchar(32) NOT NULL default ''"), 'height_css' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['height_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => array('height-xxl', 'height-xl', 'height-l', 'height-m', 'height-s', 'height-xs', 'height-xxs'), 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['height_css'], 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true), 'sql' => "varchar(32) NOT NULL default ''"), 'imgHeadline' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['imgHeadline'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'clr w50', 'maxlength' => 255), 'sql' => "varchar(255) NOT NULL default ''"), 'imgSubheadline' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['imgSubheadline'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'maxlength' => 255), 'sql' => "varchar(255) NOT NULL default ''"), 'addArticle' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['addArticle'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true, 'tl_class' => 'clr'), 'sql' => "char(1) NOT NULL default ''"), 'article' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['article'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\ThemeSettings\\Backend\\TablePage', 'getArticles'), 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default '0'"), 'article_top' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['article_top'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\ThemeSettings\\Backend\\TablePage', 'getArticles'), 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'tl_class' => 'w50'), 'sql' => "int(10) unsigned NOT NULL default '0'"), 'visibility_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'] ?? array(), 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['visibility_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'bgcolor_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['bgcolor_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['values'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'color_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'exclude' => \true, 'inputType' => 'select', 'options' => $GLOBALS['PCT_THEME_SETTINGS']['color_classes'], 'reference' => $GLOBALS['TL_LANG']['dca_theme_settings']['color_css'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(32) NOT NULL default ''"), 'analytics_google' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['analytics_google'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'analytics_matomo' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['analytics_matomo'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50', 'size' => 2, 'multiple' => \true), 'sql' => "varchar(255) NOT NULL default ''"), 'google_maps' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['google_maps'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"), 'helper_css' => array('label' => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\ThemeSettings\\Backend\\TablePage', 'getThemeHelperClasses'), 'reference' => &$GLOBALS['TL_LANG']['dca_theme_settings']['helper_css'], 'eval' => array('includeBlankOption' => \true, 'chosen' => \true, 'multiple' => \true, 'tl_class' => 'w50'), 'sql' => "text null"), 'favicon_tpl' => array('label' => &$GLOBALS['TL_LANG']['tl_page']['favicon_tpl'], 'exclude' => \true, 'inputType' => 'select', 'default' => 'favicons', 'options_callback' => static function () {
    return \Contao\Controller::getTemplateGroup('favicons');
}, 'eval' => array('chosen' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(64) COLLATE ascii_bin NOT NULL default ''"));
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_page']['fields'], 0, $fields);
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
/**
 * Selector
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'addFontIcon';
/**
 * Palettes
 */
$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
    if (!\is_array($GLOBALS['PCT_ICONPICKER']['pageIgnoreList'])) {
        $GLOBALS['PCT_ICONPICKER']['pageIgnoreList'] = array();
    }
    foreach ($GLOBALS['TL_DCA']['tl_page']['palettes'] as $type => $palette) {
        if (!\in_array($type, $GLOBALS['PCT_ICONPICKER']['pageIgnoreList']) && $type != '__selector__') {
            $GLOBALS['TL_DCA']['tl_page']['palettes'][$type] .= ';{fontIcon_legend:hide},addFontIcon;';
        }
    }
}
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['addFontIcon'] = 'fontIcon';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['addFontIcon'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['addFontIcon'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_page']['fields']['fontIcon'] = array('label' => &$GLOBALS['TL_LANG']['tl_page']['fontIcon'], 'exclude' => \true, 'inputType' => 'text', 'eval' => array('tl_class' => 'clr w50'), 'explanation' => 'fontIcons', 'wizard' => array(array('PCT\\IconPicker\\IconPicker', 'fontIconPicker')), 'sql' => "varchar(32) NOT NULL default ''");
}
