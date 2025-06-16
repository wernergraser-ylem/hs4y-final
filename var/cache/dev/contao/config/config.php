<?php

namespace {
// Back end modules
$GLOBALS['BE_MOD'] = array(
    // Content modules
    'content' => array('page' => array('tables' => array('tl_page')), 'article' => array('tables' => array('tl_article', 'tl_content'), 'table' => array(\Contao\CoreBundle\Controller\BackendCsvImportController::class, 'importTableWizardAction'), 'list' => array(\Contao\CoreBundle\Controller\BackendCsvImportController::class, 'importListWizardAction')), 'files' => array('tables' => array('tl_files')), 'form' => array('tables' => array('tl_form', 'tl_form_field'), 'option' => array(\Contao\CoreBundle\Controller\BackendCsvImportController::class, 'importOptionWizardAction'))),
    // Design modules
    'design' => array('themes' => array('tables' => array('tl_theme', 'tl_module', 'tl_layout', 'tl_image_size', 'tl_image_size_item'), 'importTheme' => array(\Contao\Theme::class, 'importTheme'), 'exportTheme' => array(\Contao\Theme::class, 'exportTheme')), 'tpl_editor' => array('tables' => array('tl_templates'), 'new_tpl' => array('tl_templates', 'addNewTemplate'), 'compare' => array('tl_templates', 'compareTemplate'))),
    // Account modules
    'accounts' => array('member' => array('tables' => array('tl_member')), 'mgroup' => array('tables' => array('tl_member_group')), 'user' => array('tables' => array('tl_user')), 'group' => array('tables' => array('tl_user_group')), 'login' => array('tables' => array('tl_user'), 'hideInNavigation' => \true, 'disablePermissionChecks' => \true), 'security' => array('callback' => \Contao\ModuleTwoFactor::class, 'hideInNavigation' => \true, 'disablePermissionChecks' => \true), 'favorites' => array('tables' => array('tl_favorites'), 'hideInNavigation' => \true, 'disablePermissionChecks' => \true)),
    // System modules
    'system' => array('settings' => array('tables' => array('tl_settings')), 'maintenance' => array('callback' => \Contao\ModuleMaintenance::class), 'log' => array('tables' => array('tl_log')), 'preview_link' => array('tables' => array('tl_preview_link')), 'opt_in' => array('tables' => array('tl_opt_in'), 'resend' => array('tl_opt_in', 'resendToken')), 'undo' => array('tables' => array('tl_undo'), 'disablePermissionChecks' => \true)),
);
// Front end modules
$GLOBALS['FE_MOD'] = array('navigationMenu' => array('navigation' => \Contao\ModuleNavigation::class, 'customnav' => \Contao\ModuleCustomnav::class, 'breadcrumb' => \Contao\ModuleBreadcrumb::class, 'quicknav' => \Contao\ModuleQuicknav::class, 'quicklink' => \Contao\ModuleQuicklink::class, 'booknav' => \Contao\ModuleBooknav::class, 'articlenav' => \Contao\ModuleArticlenav::class, 'sitemap' => \Contao\ModuleSitemap::class), 'user' => array('login' => \Contao\ModuleLogin::class, 'personalData' => \Contao\ModulePersonalData::class, 'registration' => \Contao\ModuleRegistration::class, 'changePassword' => \Contao\ModuleChangePassword::class, 'lostPassword' => \Contao\ModuleLostPassword::class, 'closeAccount' => \Contao\ModuleCloseAccount::class), 'application' => array('form' => \Contao\Form::class, 'search' => \Contao\ModuleSearch::class), 'miscellaneous' => array('articlelist' => \Contao\ModuleArticleList::class, 'randomImage' => \Contao\ModuleRandomImage::class, 'html' => \Contao\ModuleHtml::class, 'rssReader' => \Contao\ModuleRssReader::class));
// Content elements
$GLOBALS['TL_CTE'] = array('texts' => array(), 'links' => array(), 'files' => array(), 'media' => array(), 'miscellaneous' => array(), 'includes' => array('article' => \Contao\ContentArticle::class, 'alias' => \Contao\ContentAlias::class, 'form' => \Contao\Form::class, 'module' => \Contao\ContentModule::class), 'legacy' => array('accordionSingle' => \Contao\ContentAccordion::class, 'accordionStart' => \Contao\ContentAccordionStart::class, 'accordionStop' => \Contao\ContentAccordionStop::class, 'sliderStart' => \Contao\ContentSliderStart::class, 'sliderStop' => \Contao\ContentSliderStop::class));
// Back end form fields
$GLOBALS['BE_FFL'] = array('text' => \Contao\TextField::class, 'password' => \Contao\Password::class, 'textarea' => \Contao\TextArea::class, 'select' => \Contao\SelectMenu::class, 'checkbox' => \Contao\CheckBox::class, 'checkboxWizard' => \Contao\CheckBoxWizard::class, 'radio' => \Contao\RadioButton::class, 'radioTable' => \Contao\RadioTable::class, 'inputUnit' => \Contao\InputUnit::class, 'trbl' => \Contao\TrblField::class, 'chmod' => \Contao\ChmodTable::class, 'picker' => \Contao\Picker::class, 'pageTree' => \Contao\PageTree::class, 'fileTree' => \Contao\FileTree::class, 'fileUpload' => \Contao\Upload::class, 'tableWizard' => \Contao\TableWizard::class, 'listWizard' => \Contao\ListWizard::class, 'optionWizard' => \Contao\OptionWizard::class, 'moduleWizard' => \Contao\ModuleWizard::class, 'keyValueWizard' => \Contao\KeyValueWizard::class, 'imageSize' => \Contao\ImageSize::class, 'timePeriod' => \Contao\TimePeriod::class, 'metaWizard' => \Contao\MetaWizard::class, 'sectionWizard' => \Contao\SectionWizard::class, 'serpPreview' => \Contao\SerpPreview::class, 'rootPageDependentSelect' => \Contao\RootPageDependentSelect::class);
// Front end form fields
$GLOBALS['TL_FFL'] = array('explanation' => \Contao\FormExplanation::class, 'html' => \Contao\FormHtml::class, 'fieldsetStart' => \Contao\FormFieldsetStart::class, 'fieldsetStop' => \Contao\FormFieldsetStop::class, 'text' => \Contao\FormText::class, 'password' => \Contao\FormPassword::class, 'textarea' => \Contao\FormTextarea::class, 'select' => \Contao\FormSelect::class, 'radio' => \Contao\FormRadio::class, 'checkbox' => \Contao\FormCheckbox::class, 'upload' => \Contao\FormUpload::class, 'range' => \Contao\FormRange::class, 'hidden' => \Contao\FormHidden::class, 'captcha' => \Contao\FormCaptcha::class, 'submit' => \Contao\FormSubmit::class);
// Page types
$GLOBALS['TL_PTY'] = array('regular' => \Contao\PageRegular::class, 'forward' => \Contao\PageForward::class, 'redirect' => \Contao\PageRedirect::class, 'logout' => \Contao\PageLogout::class, 'error_401' => \Contao\PageError401::class, 'error_403' => \Contao\PageError403::class, 'error_404' => \Contao\PageError404::class);
// Maintenance
$GLOBALS['TL_MAINTENANCE'] = array(\Contao\Crawl::class, \Contao\PurgeData::class);
// Purge jobs
$GLOBALS['TL_PURGE'] = array('tables' => array('index' => array('callback' => array(\Contao\Automator::class, 'purgeSearchTables'), 'affected' => array('tl_search', 'tl_search_index', 'tl_search_term')), 'undo' => array('callback' => array(\Contao\Automator::class, 'purgeUndoTable'), 'affected' => array('tl_undo')), 'versions' => array('callback' => array(\Contao\Automator::class, 'purgeVersionTable'), 'affected' => array('tl_version')), 'log' => array('callback' => array(\Contao\Automator::class, 'purgeSystemLog'), 'affected' => array('tl_log')), 'crawl_queue' => array('callback' => array(\Contao\Automator::class, 'purgeCrawlQueue'), 'affected' => array('tl_crawl_queue'))), 'folders' => array('images' => array('callback' => array(\Contao\Automator::class, 'purgeImageCache'), 'affected' => array(\Contao\StringUtil::stripRootDir(\Contao\System::getContainer()->getParameter('contao.image.target_dir')))), 'previews' => array('callback' => array(\Contao\Automator::class, 'purgePreviewCache'), 'affected' => array(\Contao\StringUtil::stripRootDir(\Contao\System::getContainer()->getParameter('contao.image.preview.target_dir')))), 'scripts' => array('callback' => array(\Contao\Automator::class, 'purgeScriptCache'), 'affected' => array('assets/js', 'assets/css')), 'temp' => array('callback' => array(\Contao\Automator::class, 'purgeTempFolder'), 'affected' => array('system/tmp'))), 'custom' => array('pages' => array('callback' => array(\Contao\Automator::class, 'purgePageCache')), 'xml' => array('callback' => array(\Contao\Automator::class, 'generateXmlFiles')), 'symlinks' => array('callback' => array(\Contao\Automator::class, 'generateSymlinks'))));
// Hooks
$GLOBALS['TL_HOOKS'] = array('getSystemMessages' => array(array(\Contao\Messages::class, 'languageFallback')));
// Wrapper elements
$GLOBALS['TL_WRAPPERS'] = array('start' => array('accordionStart', 'sliderStart', 'fieldsetStart'), 'stop' => array('accordionStop', 'sliderStop', 'fieldsetStop'), 'single' => array('accordionSingle'), 'separator' => array());
// Models
$GLOBALS['TL_MODELS'] = array('tl_article' => \Contao\ArticleModel::class, 'tl_content' => \Contao\ContentModel::class, 'tl_files' => \Contao\FilesModel::class, 'tl_form_field' => \Contao\FormFieldModel::class, 'tl_form' => \Contao\FormModel::class, 'tl_image_size_item' => \Contao\ImageSizeItemModel::class, 'tl_image_size' => \Contao\ImageSizeModel::class, 'tl_layout' => \Contao\LayoutModel::class, 'tl_member_group' => \Contao\MemberGroupModel::class, 'tl_member' => \Contao\MemberModel::class, 'tl_module' => \Contao\ModuleModel::class, 'tl_opt_in' => \Contao\OptInModel::class, 'tl_page' => \Contao\PageModel::class, 'tl_theme' => \Contao\ThemeModel::class, 'tl_user_group' => \Contao\UserGroupModel::class, 'tl_user' => \Contao\UserModel::class);
// Other global arrays
$GLOBALS['TL_PERMISSIONS'] = array();
}

namespace {
// Back end modules
$GLOBALS['BE_MOD']['accounts']['debug'] = array('enable' => array(\Contao\ManagerBundle\Controller\DebugController::class, 'enableAction'), 'disable' => array(\Contao\ManagerBundle\Controller\DebugController::class, 'disableAction'), 'hideInNavigation' => \true, 'disablePermissionChecks' => \true);
}

namespace {
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_seo_helper/config/autoload.php';
}
\define('PCT_SEO_HELPER_VERSION', '2.1.0');
if (!isset($GLOBALS['PCT_SEO'])) {
    $GLOBALS['PCT_SEO'] = array();
}
if (!isset($GLOBALS['SEO_SCRIPTS'])) {
    $GLOBALS['SEO_SCRIPTS'] = array();
}
if (!isset($GLOBALS['SEO_SCRIPTS_FILE'])) {
    $GLOBALS['SEO_SCRIPTS_FILE'] = array();
}
if (!isset($GLOBALS['SEO_SCRIPTS_FILE_PROCESSED'])) {
    $GLOBALS['SEO_SCRIPTS_FILE_PROCESSED'] = array();
}
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseFrontendTemplate'][] = array('PCT\\SEO\\ContaoCallbacks', 'parseFrontendTemplateCallback');
$GLOBALS['TL_HOOKS']['parseFrontendTemplate'][] = array('PCT\\SEO\\ContaoCallbacks', 'collectScriptSections');
$GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\SEO\\ContaoCallbacks', 'generatePageCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\SEO\\ContaoCallbacks', 'parseTemplateCallback');
}

namespace {
/**
 * Constants
 */
\define('PCT_TABLETREE_PATH', 'system/modules/pct_tabletree_widget');
\define('PCT_TABLETREE_VERSION', '2.0.2');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_tabletree_widget/config/autoload.php';
}
/**
 * Back end form fields
 */
$GLOBALS['BE_FFL']['pct_tabletree'] = 'PCT\\Widgets\\WidgetTableTree';
// Backend Controller
$GLOBALS['BE_MOD']['content']['pct_customelements_tags']['tabletree'] = array('PCT\\Widgets\\TableTree\\Backend\\PageTableTree', 'run');
$GLOBALS['BE_MOD']['design']['themes']['pct_customelements_tags']['tabletree'] = array('PCT\\Widgets\\TableTree\\Backend\\PageTableTree', 'run');
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['executePostActions'][] = array('PCT\\Widgets\\TableTree\\ContaoCallbacks', 'postActions');
$GLOBALS['TL_HOOKS']['executePreActions'][] = array('PCT\\Widgets\\TableTree\\ContaoCallbacks', 'preActions');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\Widgets\\TableTree\\ContaoCallbacks', 'parseTemplateCallback');
}

namespace {
// Add back end modules
$GLOBALS['BE_MOD']['content']['faq'] = array('tables' => array('tl_faq_category', 'tl_faq'));
// Front end modules
$GLOBALS['FE_MOD']['faq'] = array('faqlist' => \Contao\ModuleFaqList::class, 'faqreader' => \Contao\ModuleFaqReader::class, 'faqpage' => \Contao\ModuleFaqPage::class);
// Style sheet
if (\Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(\Contao\System::getContainer()->get('request_stack')->getCurrentRequest() ?? \Symfony\Component\HttpFoundation\Request::create(''))) {
    $GLOBALS['TL_CSS'][] = 'bundles/contaofaq/faq.min.css|static';
}
// Add permissions
$GLOBALS['TL_PERMISSIONS'][] = 'faqs';
$GLOBALS['TL_PERMISSIONS'][] = 'faqp';
// Models
$GLOBALS['TL_MODELS']['tl_faq_category'] = \Contao\FaqCategoryModel::class;
$GLOBALS['TL_MODELS']['tl_faq'] = \Contao\FaqModel::class;
}

namespace {
// Add the "haste_undo" operation to "undo" module
$GLOBALS['BE_MOD']['system']['undo']['haste_undo'] = [\Codefog\HasteBundle\UndoManager::class, 'onUndoCallback'];
}

namespace {
/**
 * Constants
 */
\define('PCT_MEGAMENU_VERSION', '2.0.2');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_megamenu/config/autoload.php';
}
/** 
 * Frontend Module
 */
$GLOBALS['FE_MOD']['navigationMenu']['pct_megamenu'] = 'PCT\\MegaMenu\\Module';
/**
 * Page type
 */
$GLOBALS['TL_PTY']['pct_megamenu'] = 'PCT\\MegaMenu\\Page';
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('PCT\\MegaMenu\\ContaoCallbacks', 'replaceInsertTagsCallback');
$GLOBALS['TL_HOOKS']['getPageStatusIcon'][] = array('PCT\\MegaMenu\\TablePage', 'getPageIcon');
$GLOBALS['TL_HOOKS']['generateFrontendUrl'][] = array('PCT\\MegaMenu\\ContaoCallbacks', 'generateFrontendUrlCallback');
}

namespace {
/**
 * Constants
 */
\define('PCT_THEME_UPDATER', '4.0.2');
\define('PCT_THEME_UPDATER_PATH', 'system/modules/pct_theme_updater');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/' . \PCT_THEME_UPDATER_PATH . '/config/autoload.php';
}
/**
 * Maintenance
 */
$GLOBALS['TL_MAINTENANCE'][] = 'PCT\\ThemeUpdater\\Maintenance';
/**
 * Globals
 */
$GLOBALS['PCT_THEME_UPDATER']['api_url'] = 'https://api.premium-contao-themes.com';
$GLOBALS['PCT_THEME_UPDATER']['config_url'] = 'https://update.premium-contao-themes.com/updater_pro.json';
$GLOBALS['PCT_THEME_UPDATER']['updater_api_url'] = 'https://update.premium-contao-themes.com/updater.php';
$GLOBALS['PCT_THEME_UPDATER']['tmpFolder'] = 'system/tmp/pct_theme_updater';
$GLOBALS['PCT_THEME_UPDATER']['logFile'] = 'var/pct_themeupdater_log.json';
$GLOBALS['PCT_THEME_UPDATER']['debug'] = \false;
$GLOBALS['PCT_THEME_UPDATER']['THEMES']['eclipseX'] = array(
    'label' => 'EclipseX',
    'zip_folder' => 'eclipseX_zip',
    'mandatory' => array('upload'),
    // mandatory zip content on first level
    'sql_templates' => array('5.3' => 'eclipsex_contao_5_3.sql'),
);
$GLOBALS['PCT_THEME_UPDATER']['THEMES']['eclipseX_cc'] = array(
    'label' => 'EclipseX + CustomCatalog Pro',
    'isCustomCatalog' => \true,
    'zip_folder' => 'eclipseX_cc_zip',
    'mandatory' => array('upload'),
    // mandatory zip content on first level
    'sql_templates' => array('5.3' => 'eclipsex_contao_5_3.sql'),
);
// Logic: STATUS.STEP
$GLOBALS['PCT_THEME_UPDATER']['status'] = array('WELCOME', 'RESET', 'VALIDATION', 'ACCEPTED', 'FILE_EXISTS', 'FILE_NOT_EXISTS', 'INSTALLATION.UNZIP', 'INSTALLATION.COPY_FILES', 'INSTALLATION.CLEAR_CACHE', 'INSTALLATION.DB_UPDATE_MODULES', 'INSTALLATION.SQL_TEMPLATE_WAIT', 'INSTALLATION.SQL_TEMPLATE_IMPORT');
$GLOBALS['PCT_THEME_UPDATER']['breadcrumb_steps'] = array('WELCOME' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['welcome'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['welcome'][1], 'href' => 'status=welcome', 'protected' => \true), 'VALIDATION_UPDATER' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['validation_updater'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['validation_updater'][1], 'href' => 'status=enter_theme_license', 'protected' => \true), 'VALIDATION' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['validation'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['validation'][1], 'href' => 'status=validation', 'protected' => \true), 'ACCEPTED' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['accepted'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['accepted'][1], 'href' => 'status=accepted', 'protected' => \true), 'NOT_ACCEPTED' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['not_accepted'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['not_accepted'][1], 'href' => 'status=not_accepted', 'protected' => \true), 'LOADING' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['loading'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['loading'][1], 'href' => 'status=loading'), 'INSTALLATION.UNZIP' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.unzip'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.unzip'][1], 'href' => 'status=installation&step=unzip'), 'INSTALLATION.COPY_FILES' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.copy_files'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.copy_files'][1], 'href' => 'status=installation&step=copy_files'), 'INSTALLATION.CLEAR_CACHE' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.clear_cache'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.clear_cache'][1], 'href' => 'status=installation&step=clear_cache'), 'INSTALLATION.DB_UPDATE_MODULES' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.db_update_modules'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.db_update_modules'][1], 'href' => 'status=installation&step=db_update_modules'), 'INSTALLATION.SQL_TEMPLATE_WAIT' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.sql_template_wait'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['installation.sql_template_wait'][1], 'href' => 'status=installation&step=sql_template_wait', 'protected' => \true), 'MANUAL_ADJUSTMENT' => array('label' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['manual_adjustment'][0], 'description' => &$GLOBALS['TL_LANG']['PCT_THEME_UPDATER']['BREADCRUMB']['manual_adjustment'][1], 'href' => 'status=manual_adjustment', 'isLink' => \true, 'avoid_complete' => \true));
// redirects
$GLOBALS['PCT_THEME_UPDATER']['routes'] = array('enter_theme_license' => 'enter_updater_license', 'enter_updater_license' => 'ready');
/**
 * Register backend page / key
 */
$GLOBALS['BE_MOD']['system']['pct_theme_updater'] = array('callback' => 'PCT\\ThemeUpdater', 'icon' => \PCT_THEME_UPDATER_PATH . '/assets/img/icon.jpg', 'stylesheet' => \PCT_THEME_UPDATER_PATH . '/assets/css/be_styles.css', 'tables' => array('tl_module'));
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\ThemeUpdater\\SystemCallbacks', 'injectScripts');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\ThemeUpdater\\SystemCallbacks', 'initializeSystemCallback');
$GLOBALS['TL_HOOKS']['executePostActions'][] = array('PCT\\ThemeUpdater\\SystemCallbacks', 'executePostActionsCallback');
}

namespace {
/**
 * Constants
 */
\define('PCT_THEMER_VERSION', '5.0.3');
\define('PCT_THEMER_PATH', 'system/modules/pct_themer');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_themer/config/autoload.php';
}
/**
 * Globals
 */
$GLOBALS['PCT_THEMER']['fileLogic'] = 'templates/demo_installer/demo_%s.php';
// e.g. demo_minimalist.php
$GLOBALS['PCT_THEMER']['appendTitle'] = '';
//  [imported by %s (%s)]
$GLOBALS['PCT_THEMER']['defaultLayout'] = 'Content-Page - Full Width';
if (!isset($GLOBALS['PCT_THEMER']['THEMES'])) {
    $GLOBALS['PCT_THEMER']['THEMES'] = array();
}
$GLOBALS['PCT_THEMER']['multiSRC_fields'] = array('multiSRC');
// blob value fields that contain binary data
$GLOBALS['PCT_THEMER']['singleJumpTo_fields'] = array('jumpTo', 'customcatalog_jumpTo', 'reg_jumpTo');
// relink single pages
$GLOBALS['PCT_THEMER']['multiJumpTo_fields'] = array('pages');
// relink multiple page selections
$GLOBALS['PCT_THEMER']['imageText_fields'] = array('bgimage', 'autogrid_bgimage');
$GLOBALS['PCT_THEMER_CE_FIELDS'] = array('tl_content' => 'pct_customelement', 'tl_module' => 'pct_customelement');
$GLOBALS['PCT_THEMER']['zero_value_fields'] = array('tl_module.numberOfItems', 'tl_content.numberOfItems');
// ThemeDesigner
$GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'] = '%s_%s';
// logic: versionname_timestamp (optional:)_demo-name
$GLOBALS['PCT_THEMEDESIGNER_CSS_FILE'] = 'files/cto_layout/themedesigner/css/%s.css';
$GLOBALS['PCT_THEMEDESIGNER_FONTS_CSS_FILE'] = 'files/cto_layout/themedesigner/fonts_css/%s_fonts.css';
$GLOBALS['PCT_THEMEDESIGNER']['maxFileSize'] = 3000000;
// byte
$GLOBALS['PCT_THEMEDESIGNER']['allowedUploadTypes'] = 'jpg,jpeg,gif,png,svg,gif';
$GLOBALS['PCT_THEMEDESIGNER']['uploadFolder'] = 'files/cto_layout/themedesigner/uploads';
$GLOBALS['PCT_THEMEDESIGNER']['googlefontsFolder'] = 'files/cto_layout/fonts/googlefonts';
$GLOBALS['PCT_THEMEDESIGNER']['bypassServerCache'] = \true;
$GLOBALS['PCT_THEMEDESIGNER']['CSS'] = \PCT_THEMER_PATH . '/assets/css/themedesigner.css';
$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] = \true;
$GLOBALS['PCT_THEMEDESIGNER']['startSection'] = 'LOGO';
if (!isset($GLOBALS['PCT_THEMEDESIGNER']['fonts'])) {
    $GLOBALS['PCT_THEMEDESIGNER']['fonts'] = array();
}
$GLOBALS['PCT_THEMEDESIGNER']['fontPickerStyleIdent'] = '_style';
$GLOBALS['PCT_THEMEDESIGNER']['fontPickerWeightIdent'] = '_weight';
$GLOBALS['PCT_THEMEDESIGNER']['useIframe'] = \true;
$GLOBALS['PCT_THEMEDESIGNER']['showFieldsWithNoDevice'] = \true;
// show or hide fields that have no device definced in config by default
$GLOBALS['PCT_THEMEDESIGNER']['showNaviWithNoDevice'] = \true;
// show or hide fields elements that have no device defined in config
$GLOBALS['PCT_THEMEDESIGNER']['showPaletteWithNoDevice'] = \true;
// show or hide fields elements that have no device defined in config
$GLOBALS['PCT_THEMEDESIGNER']['contaoErrorPages'] = array('error_401', 'error_403', 'error_404', 'error_503');
$GLOBALS['PCT_THEMEDESIGNER']['ajaxUrl'] = \PCT_THEMER_PATH . '/assets/html/themedesigner.php';
if (!isset($GLOBALS['PCT_THEMEDESIGNER']['demoMode'])) {
    $GLOBALS['PCT_THEMEDESIGNER']['demoMode'] = \false;
}
if (!isset($GLOBALS['PCT_THEMEDESIGNER']['excludes'])) {
    $GLOBALS['PCT_THEMEDESIGNER']['excludes'] = array('eclipse_intro');
    // exclude pages by id or by theme
}
if (!isset($GLOBALS['PCT_THEMEDESIGNER']['privacy_session_name'])) {
    $GLOBALS['PCT_THEMEDESIGNER']['privacy_session_name'] = 'user_privacy_settings';
}
// Demo-Installer
$GLOBALS['PCT_DEMOINSTALLER']['SKIP'] = array('tl_module' => array('langswitch', 'search', 'socials', 'login'));
/**
 * Register backend page / key
 */
// Themer
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $GLOBALS['BE_MOD']['content']['page']['theme_export'] = array('PCT\\Themer\\Backend', 'exportTheme');
} else {
    $GLOBALS['BE_MOD']['design']['page']['theme_export'] = array('PCT\\Themer\\Backend', 'exportTheme');
}
// ThemerDesigner
$GLOBALS['BE_MOD']['design']['pct_themedesigner'] = array('tables' => array('tl_pct_themedesigner'), 'icon' => \PCT_THEMER_PATH . '/assets/img/icon.gif', 'stylesheet' => \PCT_THEMER_PATH . '/assets/css/be_styles.css');
// ThemerDesigner
$GLOBALS['BE_MOD']['design']['pct_demoinstaller'] = array('callback' => 'PCT\\Themer\\DemoInstaller', 'icon' => \PCT_THEMER_PATH . '/assets/img/icon_demoinstaller.gif', 'stylesheet' => \PCT_THEMER_PATH . '/assets/css/be_styles.css');
/**
 * Hooks
 */
// Themer
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\Themer', 'addThemeFiles');
$GLOBALS['TL_HOOKS']['getPageLayout'][] = array('PCT\\Themer', 'addThemeFonts');
// ThemeDesigner
if ((bool) \Contao\Database::getInstance()->tableExists('tl_image_size') === \true && ((bool) \Contao\Config::get('pct_themedesigner_off') === \false || (bool) \Contao\Config::get('pct_themedesigner_hidden') === \false)) {
    // define Theme Designer active constant
    \define('THEMEDESIGNER_ACTIVE', 1);
    #$GLOBALS['TL_HOOKS']['getPageIdFromUrl'][]		= array('PCT\ThemeDesigner\Frontend','getPageIdFromUrlCallback');
    $GLOBALS['TL_HOOKS']['loadPageDetails'][] = array('PCT\\ThemeDesigner\\Frontend', 'removeErrorPagesFromPageRegistry');
    $GLOBALS['TL_HOOKS']['loadPageDetails'][] = array('PCT\\ThemeDesigner\\Frontend', 'bypassMaintenanceMode');
    $GLOBALS['TL_HOOKS']['generateFrontendUrl'][] = array('PCT\\ThemeDesigner\\Frontend', 'generateFrontendUrlCallback');
    $GLOBALS['TL_HOOKS']['getPageLayout'][] = array('PCT\\ThemeDesigner', 'loadConfig');
    $GLOBALS['TL_HOOKS']['getPageLayout'][] = array('PCT\\ThemeDesigner', 'addFonts');
    $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\ThemeDesigner', 'addToTemplate');
    $GLOBALS['TL_HOOKS']['getPageLayout'][] = array('PCT\\ThemeDesigner', 'addToLayout');
    $GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\ThemeDesigner', 'ajaxListener');
    $GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\ThemeDesigner', 'addFontsOptin');
    $GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\ThemeDesigner\\Versions', 'formListener');
    $GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('PCT\\ThemeDesigner\\InsertTags', 'replaceTags');
    $GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\ThemeDesigner', 'formListener');
    $request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
    if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
        $GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\ThemeDesigner\\Backend', 'removeIframeSession');
        $GLOBALS['TL_HOOKS']['getSystemMessages'][] = array('PCT\\ThemeDesigner\\Backend', 'isActiveMessage');
        $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\ThemeDesigner\\Backend', 'injectIsActiveMessageInBackendPage');
    }
    // load iframe layout only when TD is visible
    if ((bool) \Contao\Config::get('pct_themedesigner_hidden') === \false) {
        $GLOBALS['TL_HOOKS']['getPageLayout'][] = array('PCT\\ThemeDesigner', 'setLayoutTemplate');
    }
    if (\Contao\Input::get('themedesigner_iframe')) {
        \Contao\Config::set('debugMode', \false);
    }
}
/**
 * Register models
 */
$GLOBALS['TL_MODELS']['tl_pct_themedesigner'] = 'PCT\\ThemeDesigner\\Model';
/**
 * Register theme demos 
 */
// custom default root settings
$GLOBALS['PCT_THEMER']['root'] = array('addArticle' => 1, 'article' => 353);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intro'] = array('label' => 'Intro', 'css' => array('layout.css|static'), 'scripts' => array(), 'googlefonts' => array());
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_minimalist'] = array('label' => 'Minimalist', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-minimalist.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_upside'] = array('label' => 'Upside', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-upside.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructor'] = array('label' => 'Constructor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-constructor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_chef'] = array('label' => 'Chef', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-chef.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agenzy'] = array('label' => 'Agenzy', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'portfolio'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-agenzy.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_finance'] = array('label' => 'Finance', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-finance.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_flatbiz'] = array('label' => 'Flatbiz', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-flatbiz.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_selectist'] = array('label' => 'Selectist', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-selectist.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photographer'] = array('label' => 'Photographer', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-photographer.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_skyfall'] = array('label' => 'Skyfall', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-skyfall.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_archit'] = array('label' => 'Archit', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-archit.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_transporter'] = array('label' => 'Transporter', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-transporter.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_magazine'] = array('label' => 'Magazine', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('blog'), 'layout' => 'Content-Page - Sidebar right', 'link' => 'https://eclipse.premium-contao-themes.com/demo-magazine.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_studio'] = array('label' => 'Studio', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-studio.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_titanum'] = array('label' => 'Titanum', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-titanum.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_universe'] = array('label' => 'Universe', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-universe.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_seomatic'] = array('label' => 'Seomatic', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-seomatic.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medical'] = array('label' => 'Medical', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-medical.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_resort'] = array('label' => 'Resort', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-resort.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_company'] = array('label' => 'Company', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-company.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lawyer'] = array('label' => 'Lawyer', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-lawyer.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sportclub'] = array('label' => 'Sportclub', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-sportclub.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_clearsay'] = array('label' => 'Clearsay', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-clearsay.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fitness'] = array('label' => 'Fitness', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-fitness.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bachelor'] = array('label' => 'Bachelor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-bachelor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_creative'] = array('label' => 'Creative', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-creative.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photo'] = array('label' => 'Photo', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-photo.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_projecta'] = array('label' => 'Projecta', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-projecta.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_blogiq'] = array('label' => 'Blogiq', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('blog'), 'layout' => 'Content-Page - Sidebar right', 'link' => 'https://eclipse.premium-contao-themes.com/demo-blogiq.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_frame'] = array('label' => 'Frame', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-frame.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coach'] = array('label' => 'Coach', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-coach.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advisor'] = array('label' => 'Advisor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-advisor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_planner'] = array('label' => 'Planner', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-planner.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_interior'] = array('label' => 'Interior', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-interior.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fashion'] = array('label' => 'Fashion', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-fashion.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smartbiz'] = array('label' => 'SmartBiz', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-smartbiz.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_charity'] = array('label' => 'Charity', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-charity.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleaner'] = array('label' => 'Cleaner', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-cleaner.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotel'] = array('label' => 'Hotel', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-hotel.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_portfolio'] = array('label' => 'Portfolio', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-portfolio.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_software'] = array('label' => 'Software', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-software.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_energy'] = array('label' => 'Energy', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-energy.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_masonry'] = array('label' => 'Masonry', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-masonry.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automobile'] = array('label' => 'Automobile', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-automobile.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_carpenter'] = array('label' => 'Carpenter', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-carpenter.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_personal'] = array('label' => 'Personal', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-personal.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cosmetica'] = array('label' => 'Cosmetica', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-cosmetica.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_parallax'] = array('label' => 'Parallax', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-parallax.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kids'] = array('label' => 'Kids', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-kids.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_designer'] = array('label' => 'Designer', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('portfolio', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-designer.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropage'] = array('label' => 'Micropage', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-micropage.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropagetwo'] = array('label' => 'Micropage Two', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-micropage-two.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business'] = array('label' => 'Business', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-business.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxhelp'] = array('label' => 'Taxhelp', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-taxhelp.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_journal'] = array('label' => 'Journal', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('blog', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-journal.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_event'] = array('label' => 'Event', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-event.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_plumber'] = array('label' => 'Plumber', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-plumber.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musicalian'] = array('label' => 'Musicalian', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-musicalian.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_author'] = array('label' => 'Author', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-author.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hoster'] = array('label' => 'Hoster', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-hoster.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_restaurant'] = array('label' => 'Restaurant', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-restaurant.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_appify'] = array('label' => 'Appify', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-appify.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onepager'] = array('label' => 'Onepager', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-onepager.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sorento'] = array('label' => 'Sorento', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('onepage', 'creative'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-sorento.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_immorealty'] = array('label' => 'Immo-Realty', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cardealer'] = array('label' => 'Cardealer', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_catalog'] = array('label' => 'Catalog', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accommodation'] = array('label' => 'Accommodation', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coming_soon'] = array('label' => 'Coming Soon', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-coming-soon-onepage.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsquare'] = array('label' => 'Softsquare', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-softsquare.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_dental'] = array('label' => 'Dental', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-dental.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_penthouse'] = array('label' => 'Penthouse', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-penthouse.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallimmo'] = array('label' => 'Small-Immo', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-small-immo.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallagency'] = array('label' => 'Small-Agency', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'portfolio'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-small-agency.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_translogic'] = array('label' => 'Translogic', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-translogic.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporate'] = array('label' => 'Corporate', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-corporate.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_callcenter'] = array('label' => 'Callcenter', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-callcenter.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_businessious'] = array('label' => 'Businessious', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-businessious.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_landy'] = array('label' => 'Landy', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-landy.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architectural'] = array('label' => 'Architectural', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-architectural.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_powerbiz'] = array('label' => 'Powerbiz', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-powerbiz.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_funeral'] = array('label' => 'Funeral', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-funeral.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrial'] = array('label' => 'Industrial', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-industrial.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_invest'] = array('label' => 'Invest', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-invest.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_yoga'] = array('label' => 'Yoga', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-yoga.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurance'] = array('label' => 'Insurance', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-insurance.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_consultant'] = array('label' => 'Consultant', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-consultant.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sporty'] = array('label' => 'Sporty', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-sporty.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accountant'] = array('label' => 'Accountant', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-accountant.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_garden'] = array('label' => 'Garden', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-garden.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffee'] = array('label' => 'Coffee', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-coffee.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pictures'] = array('label' => 'Pictures', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-pictures.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_arc'] = array('label' => 'Arc', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-arc.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_showcase'] = array('label' => 'Showcase', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-showcase.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_organic'] = array('label' => 'Organic', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-organic.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sanitary'] = array('label' => 'Sanitary', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-sanitary.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_alphabiz'] = array('label' => 'AlphaBiz', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-alphabiz.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxi'] = array('label' => 'Taxi', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-taxi.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onelaw'] = array('label' => 'Onelaw', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-onelaw.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_perfumes'] = array('label' => 'Perfumes', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'creative', 'onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-perfumes.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctor'] = array('label' => 'Doctor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-doctor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_beauty'] = array('label' => 'Beauty', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-beauty.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_outdoor'] = array('label' => 'Outdoor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-outdoor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_babypics'] = array('label' => 'Babypics', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-babypics.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pizza'] = array('label' => 'Pizza', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-pizza.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_botox'] = array('label' => 'Botox', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-botox.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architlab'] = array('label' => 'Architlab', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-architlab.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mall'] = array('label' => 'Mall', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-mall.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelpro'] = array('label' => 'Hotel Pro', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-hotel-pro.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_slimbiz'] = array('label' => 'SlimBiz', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-slimbiz.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wedding'] = array('label' => 'Wedding', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other', 'onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-wedding.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nightclub'] = array('label' => 'Nightclub', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-nightclub.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_optician'] = array('label' => 'Optician', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-optician.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_trade'] = array('label' => 'Trade', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-trade.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bakery'] = array('label' => 'Bakery', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-bakery.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advocate'] = array('label' => 'Advocate', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-advocate.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffeeshop'] = array('label' => 'Coffeeshop', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-coffeeshop.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_contractor'] = array('label' => 'Contractor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-contractor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kitchen'] = array('label' => 'Kitchen', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-kitchen.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automechanic'] = array('label' => 'Automechanic', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-automechanic.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_retirement'] = array('label' => 'Retirement', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-retirement.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_petcare'] = array('label' => 'Petcare', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-petcare.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onebiz'] = array('label' => 'OneBiz', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-onebiz.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_directory'] = array('label' => 'Directory', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_physio'] = array('label' => 'Physio', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-physio.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleanup'] = array('label' => 'Cleanup', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-cleanup.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electrician'] = array('label' => 'Electrician', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-electrician.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_steelwork'] = array('label' => 'Steelwork', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-steelworks.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cloudtel'] = array('label' => 'CloudTel', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-cloudtel.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_aperture'] = array('label' => 'Aperture', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative', 'portfolio'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-aperture.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_design'] = array('label' => 'Design', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative', 'portfolio'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-design.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_stylist'] = array('label' => 'Stylist', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-stylist.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_money'] = array('label' => 'Money', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-money.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artfolio'] = array('label' => 'Artfolio', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative', 'portfolio'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-artfolio.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_barber'] = array('label' => 'Barber', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-barber.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_workingspace'] = array('label' => 'WorkingSpace', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-workingspace.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lingoo'] = array('label' => 'Lingoo', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-lingoo.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_apartment'] = array('label' => 'Apartment', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-apartment.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pursuit'] = array('label' => 'Pursuit', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-pursuit.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productline'] = array('label' => 'ProductLine', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-productline.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrytech'] = array('label' => 'IndustryTech', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-industrytech.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructionflex'] = array('label' => 'ConstructionFlex', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-constructionflex.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insuranceking'] = array('label' => 'InsuranceKing', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-insuranceking.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsolutions'] = array('label' => 'SoftSolutions', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-softsolutions.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_credit'] = array('label' => 'Credit', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-credit.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wine'] = array('label' => 'Wine', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-wine.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_woodwork'] = array('label' => 'Woodwork', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-woodwork.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_ebusiness'] = array('label' => 'eBusiness', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-ebusiness.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_comingsoon_onepage'] = array('label' => 'Coming Soon Onepage', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-coming-soon-onepage.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agencyline'] = array('label' => 'AgencyLine', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-agencyline.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelapart'] = array('label' => 'HotelApart', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_decor'] = array('label' => 'Decor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-decor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_buildr'] = array('label' => 'Buildr', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-buildr.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_redbusiness'] = array('label' => 'RedBusiness', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-redbusiness.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_diners'] = array('label' => 'Diners', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-diners.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporateplus'] = array('label' => 'CorporatePlus', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-corporateplus.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cowork'] = array('label' => 'CoWork', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-cowork.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cupcakes'] = array('label' => 'CupCakes', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-cupcakes.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productcatalog'] = array('label' => 'ProductCatalog', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_phonestore'] = array('label' => 'PhoneStore', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-phonestore.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tailor'] = array('label' => 'Tailor', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-tailor.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_highbiz'] = array('label' => 'HighBiz', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-highbiz.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_merchandiser'] = array('label' => 'Merchandiser', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-merchandiser.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_vintage'] = array('label' => 'Vintage', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-vintage.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctors'] = array('label' => 'Doctors', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-doctors.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mybooks'] = array('label' => 'MyBooks', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-mybooks.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agency51'] = array('label' => 'Agency51', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-agency51.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstext'] = array('label' => 'LessText', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-lesstext.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstexttwo'] = array('label' => 'LessTextTwo', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('onepage'), 'layout' => 'One-Page: Horizontal Scrolling', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-lesstexttwo.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tavern'] = array('label' => 'Tavern', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-tavern.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bluespa'] = array('label' => 'Bluespa', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-bluespa.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_whiteone'] = array('label' => 'Whiteone', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-whiteone.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_easyimmo'] = array('label' => 'EasyImmo', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-easyimmo.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_room'] = array('label' => 'Room', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-room.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_webworker'] = array('label' => 'Webworker', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-webworker.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurancegroup'] = array('label' => 'InsuranceGroup', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-insurancegroup.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artgallery'] = array('label' => 'Artgallery', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('creative'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-artgallery.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_toys'] = array('label' => 'Toys', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-toys.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medicine'] = array('label' => 'Medicine', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-medicine.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_audit'] = array('label' => 'Audit', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-audit.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_booklibrary'] = array('label' => 'Book Library', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'installer' => \false);
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musteragentur'] = array('label' => 'Musteragentur', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-musteragentur.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbuilder'] = array('label' => 'X-Builder', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-xbuilder.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbusiness'] = array('label' => 'X-Business', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-xbusiness.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xstudio'] = array('label' => 'X-Studio', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-xstudio.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xindustry'] = array('label' => 'X-Industry', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-xindustry.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xinvestment'] = array('label' => 'X-Investment', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-xinvestment.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xflowerstore'] = array('label' => 'X-Flowerstore', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-xflowerstore.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbar'] = array('label' => 'X-Bar', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-xbar.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electric_pro'] = array('label' => 'Electric-Pro', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-electric-pro.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_take_away'] = array('label' => 'Take Away', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('onepage'), 'layout' => 'One-Page', 'root' => array('addArticle' => ''), 'link' => 'https://eclipse.premium-contao-themes.com/demo-one-page-take-away.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_digitization'] = array('label' => 'Digitization', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-digitization.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_psychology'] = array('label' => 'Psychology', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-psychology.html', 'root' => array('article' => 13536));
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intranet'] = array('label' => 'Intranet', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-intranet.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_visions'] = array('label' => 'Visions', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-visions.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_itservice'] = array('label' => 'ITService', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-itservice.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_west_consulting'] = array('label' => 'West Consulting', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-west-consulting.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_illusion'] = array('label' => 'Illusion', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-illusion.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business_coach'] = array('label' => 'Business Coach', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-business-coach.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_megamenu'] = array('label' => 'Megamenu', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-megamenu.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_contentpages'] = array('label' => 'Presets: Contentpages', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('presets'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-presets-contentpage.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_default'] = array('label' => 'Default Demo (All Features)', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('other'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-default.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_forms'] = array('label' => 'Presets: Forms', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('presets'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-presets-forms.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_footer'] = array('label' => 'Presets: Footer', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('presets'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-presets-footer.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_news_events'] = array('label' => 'Presets: News & Events', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('presets'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-presets-news-events.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_portfolio'] = array('label' => 'Presets: Portfolio', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('presets'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-presets-portfolio.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_rs'] = array('label' => 'Presets: Revolution Slider Basic-Presets', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('presets'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-presets-revolution-slider.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_solis'] = array('label' => 'Solis', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'new'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-solis.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nova'] = array('label' => 'Nova', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'new'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-nova.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lambda'] = array('label' => 'Lambda', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'new'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-lambda.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_brokengrid'] = array('label' => 'BrokenGrid', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'new'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-brokengrid.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_helion'] = array('label' => 'Helion', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'onepage', 'new'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-helion.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_veluna'] = array('label' => 'Veluna', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array('business', 'new'), 'link' => 'https://eclipse.premium-contao-themes.com/demo-veluna.html');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom1'] = array('label' => 'CustomLayout1', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array(''));
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom2'] = array('label' => 'CustomLayout2', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array(''));
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom3'] = array('label' => 'CustomLayout3', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array(''));
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom4'] = array('label' => 'CustomLayout4', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array(''));
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_custom5'] = array('label' => 'CustomLayout5', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array(''));
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_autogrid_testing'] = array('label' => 'AutoGrid Testing', 'css' => array(), 'scripts' => array(), 'googlefonts' => array(), 'category' => array(''), 'installer' => \false);
/* Presets Googlefonts */
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intro']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_default']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_footer']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_forms']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_news_events']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_portfolio']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_presets_contentpages']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_minimalist']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_appify']['googlefonts'] = array('Ubuntu', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sorento']['googlefonts'] = array('Cutive+Mono', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onepager']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_immorealty']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_catalog']['googlefonts'] = array('Lato', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cardealer']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accommodation']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_upside']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructor']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_chef']['googlefonts'] = array('Courgette', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agenzy']['googlefonts'] = array('Montserrat', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_finance']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_flatbiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_selectist']['googlefonts'] = array('Adamina', 'Anton');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photographer']['googlefonts'] = array('Oswald', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_skyfall']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_archit']['googlefonts'] = array('Karla');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_transporter']['googlefonts'] = array('Lato', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_magazine']['googlefonts'] = array('Patua+One', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_studio']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_titanum']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_universe']['googlefonts'] = array('Raleway', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_seomatic']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medical']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_resort']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_company']['googlefonts'] = array('Montserrat', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lawyer']['googlefonts'] = array('Merriweather', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sportclub']['googlefonts'] = array('Oswald', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_clearsay']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fitness']['googlefonts'] = array('Roboto+Condensed', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bachelor']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_creative']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_photo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_projecta']['googlefonts'] = array('Raleway', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_blogiq']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_frame']['googlefonts'] = array('Josefin+Sans', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coach']['googlefonts'] = array('Raleway', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advisor']['googlefonts'] = array('Fjalla+One', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_planner']['googlefonts'] = array('Josefin+Sans', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_interior']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_fashion']['googlefonts'] = array('Advent+Pro', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smartbiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_charity']['googlefonts'] = array('Roboto+Slab', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleaner']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotel']['googlefonts'] = array('Merriweather', 'Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_portfolio']['googlefonts'] = array('Inconsolata', 'Unica+One');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_software']['googlefonts'] = array('Scada', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_energy']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_masonry']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automobile']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_carpenter']['googlefonts'] = array('Merriweather');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_personal']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cosmetica']['googlefonts'] = array('Raleway', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_parallax']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kids']['googlefonts'] = array('Amatic+SC', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_designer']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropage']['googlefonts'] = array('Lato', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_micropagetwo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business']['googlefonts'] = array('Bitter', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxhelp']['googlefonts'] = array('Lato', 'Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_journal']['googlefonts'] = array('Lato', 'Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_event']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_plumber']['googlefonts'] = array('Open+Sans', 'Archivo+Narrow');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musicalian']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_author']['googlefonts'] = array('Gentium+Book+Basic');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hoster']['googlefonts'] = array('Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsquare']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_dental']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_penthouse']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallimmo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_smallagency']['googlefonts'] = array('Inconsolata', 'Josefin+Slab');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_translogic']['googlefonts'] = array('Roboto+Condensed', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporate']['googlefonts'] = array('Droid+Sans', 'Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_callcenter']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_businessious']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architectural']['googlefonts'] = array('Raleway', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_powerbiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_funeral']['googlefonts'] = array('Source+Sans+Pro', 'Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrial']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_invest']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_yoga']['googlefonts'] = array('Cinzel', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurance']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_consultant']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sporty']['googlefonts'] = array('Audiowide', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_accountant']['googlefonts'] = array('Cinzel', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_garden']['googlefonts'] = array('Roboto+Slab');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffee']['googlefonts'] = array('Glass+Antiqua', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pictures']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_arc']['googlefonts'] = array('Cinzel', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_showcase']['googlefonts'] = array('Unica+One', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_organic']['googlefonts'] = array('Roboto+Slab', 'Amatic+SC');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_sanitary']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_alphabiz']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_taxi']['googlefonts'] = array('Exo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onelaw']['googlefonts'] = array('Source+Sans+Pro', 'Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_perfumes']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_restaurant']['googlefonts'] = array('Raleway', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_landy']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctor']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_beauty']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_outdoor']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_babypics']['googlefonts'] = array('Quicksand', 'Sacramento');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pizza']['googlefonts'] = array('Comfortaa', 'Courgette');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_botox']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_architlab']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mall']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelpro']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_slimbiz']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wedding']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nightclub']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_optician']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_trade']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bakery']['googlefonts'] = array('Oswald', 'Sacramento');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_advocate']['googlefonts'] = array('Lato', 'Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_coffeeshop']['googlefonts'] = array('Roboto', 'Glass+Antiqua');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_contractor']['googlefonts'] = array('Poppins', 'Cardo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_kitchen']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_automechanic']['googlefonts'] = array('Oswald');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_retirement']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_petcare']['googlefonts'] = array('Comfortaa', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_onebiz']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_directory']['googlefonts'] = array('Open+Sans', 'Comfortaa');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_physio']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cleanup']['googlefonts'] = array('Courgette', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electrician']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_steelwork']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cloudtel']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_aperture']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_design']['googlefonts'] = array('Raleway');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_stylist']['googlefonts'] = array('Roboto', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_money']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artfolio']['googlefonts'] = array('Poppins', 'Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_barber']['googlefonts'] = array('Lobster', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_workingspace']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lingoo']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_apartment']['googlefonts'] = array('Montserrat', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_pursuit']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productline']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_industrytech']['googlefonts'] = array('Ubuntu');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_constructionflex']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insuranceking']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_softsolutions']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_credit']['googlefonts'] = array('Nunito');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_wine']['googlefonts'] = array('Cormorant', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_woodwork']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_ebusiness']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_comingsoon_onepage']['googlefonts'] = array('Source+Sans+Pro', 'Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_hotelapart']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_decor']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_buildr']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_diners']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_corporateplus']['googlefonts'] = array('Roboto', 'Roboto+Condensed');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cowork']['googlefonts'] = array('Roboto', 'Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_phonestore']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_cupcakes']['googlefonts'] = array('Glass+Antiqua', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_productcatalog']['googlefonts'] = array('Titillium+Web');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tailor']['googlefonts'] = array('Playfair+Display', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_highbiz']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_merchandiser']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_vintage']['googlefonts'] = array('Roboto+Condensed');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_doctors']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_mybooks']['googlefonts'] = array('Merriweather', 'Cinzel');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_agency51']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstext']['googlefonts'] = array('Source+Sans+Pro', 'Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lesstexttwo']['googlefonts'] = array('Roboto+Slab', 'Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_tavern']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_bluespa']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_whiteone']['googlefonts'] = array('Nunito', 'Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_easyimmo']['googlefonts'] = array('Open+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_room']['googlefonts'] = array('Lato', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_insurancegroup']['googlefonts'] = array('Ubuntu');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_artgallery']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_toys']['googlefonts'] = array('Open+Sans', 'Vibur');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_medicine']['googlefonts'] = array('Lato');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_audit']['googlefonts'] = array('Open+Sans', 'Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_booklibrary']['googlefonts'] = array('Open+Sans', 'Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_musteragentur']['googlefonts'] = array('Quicksand');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbuilder']['googlefonts'] = array('Montserrat');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbusiness']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xindustry']['googlefonts'] = array('Roboto', 'Exo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xinvestment']['googlefonts'] = array('Roboto', 'Exo');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xflowerstore']['googlefonts'] = array('Playfair+Display');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_xbar']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_electric_pro']['googlefonts'] = array('Poppins', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_take_away']['googlefonts'] = array('Poppins', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_digitization']['googlefonts'] = array('Open+Sans', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_psychology']['googlefonts'] = array('Open+Sans', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_intranet']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_visions']['googlefonts'] = array('Roboto', 'Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_itservice']['googlefonts'] = array('Source+Sans+Pro');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_west_consulting']['googlefonts'] = array('DM+Serif+Display', 'Nunito+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_illusion']['googlefonts'] = array('Roboto', 'Nunito+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_business_coach']['googlefonts'] = array('Roboto', 'Nunito+Sans');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_megamenu']['googlefonts'] = array('Arsenal', 'Jost');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse__rs_presets']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_solis']['googlefonts'] = array('Manrope');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_nova']['googlefonts'] = array('Manrope');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_lambda']['googlefonts'] = array('Poppins');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_brokengrid']['googlefonts'] = array('Roboto');
$GLOBALS['PCT_THEMER']['THEMES']['eclipse_helion']['googlefonts'] = array('Poppins');
// add templates to the TemplatesLoader
$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
foreach ($GLOBALS['PCT_THEMER']['THEMES'] as $strName => $arrData) {
    if (\array_key_exists('template_path', $arrData) === \false) {
        $arrData['template_path'] = 'templates/demo_installer';
    }
    if (\file_exists($rootDir . '/' . $arrData['template_path'] . '/demo_' . $strName)) {
        \Contao\TemplateLoader::addFiles(array('demo_' . $strName => $arrData['template_path']));
    }
}
}

namespace {
/**
 * Constants
 */
\define('PCT_AUTOGRID_VERSION', '4.1.3');
\define('PCT_AUTOGRID_PATH', 'system/modules/pct_autogrid');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/' . \PCT_AUTOGRID_PATH . '/config/autoload.php';
}
/**
 * Globals
 */
$GLOBALS['PCT_AUTOGRID']['css'] = \PCT_AUTOGRID_PATH . '/assets/css/grid.min.css|static';
$GLOBALS['PCT_AUTOGRID']['be_css'] = \PCT_AUTOGRID_PATH . '/assets/css/be_styles.css';
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $GLOBALS['PCT_AUTOGRID']['be_css'] = \PCT_AUTOGRID_PATH . '/assets/css/be_styles_c5.css';
}
$GLOBALS['PCT_AUTOGRID']['presets_css'] = \PCT_AUTOGRID_PATH . '/assets/css/presets.min.css';
$GLOBALS['PCT_AUTOGRID']['startElements'] = array('autogridColStart', 'autogridRowStart', 'autogridGridStart');
$GLOBALS['PCT_AUTOGRID']['stopElements'] = array('autogridColStop', 'autogridRowStop', 'autogridGridStop');
$GLOBALS['PCT_AUTOGRID']['wrapperElements'] = \array_merge($GLOBALS['PCT_AUTOGRID']['startElements'], $GLOBALS['PCT_AUTOGRID']['stopElements']);
$GLOBALS['PCT_AUTOGRID']['debug'] = \false;
$GLOBALS['PCT_AUTOGRID']['BACKEND']['ajaxInteractionDelay'] = 1200;
// ms before firing an ajax request
$GLOBALS['PCT_AUTOGRID']['createSiblingOnCreate'] = array('autogridRowStart' => 'autogridRowStop', 'autogridColStart' => 'autogridColStop');
$GLOBALS['PCT_AUTOGRID']['deleteSiblingOnDelete'] = array('autogridRowStart' => 'autogridRowStop', 'autogridColStart' => 'autogridColStop', 'autogridGridStart' => 'autogridGridStop');
$GLOBALS['PCT_AUTOGRID']['deleteNestedOnDelete'] = array('autogridGridStart' => array('autogridColStart', 'autogridRowStart'), 'autogridRowStart' => array('autogridColStart'), 'autogridColStart' => array('autogridRowStart', 'autogridGridStart'));
$GLOBALS['PCT_AUTOGRID']['CACHE'] = array();
$GLOBALS['PCT_AUTOGRID']['child_record_callback']['tl_content'] = array('tl_content', 'addCteType');
$GLOBALS['PCT_AUTOGRID']['showButtons'] = array('autogridColStart');
$GLOBALS['PCT_AUTOGRID']['assetsLoaded'] = \false;
$GLOBALS['PCT_AUTOGRID']['autogridRowStarted'] = \false;
$GLOBALS['PCT_AUTOGRID']['autogridColStarted'] = \false;
$GLOBALS['PCT_AUTOGRID']['autogridGridStarted'] = \false;
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR'] = array();
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridRowStart'] = \false;
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridColStart'] = \false;
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridGridStart'] = \false;
// support i18nl10n extension
$bundles = \array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
if (\in_array('i18nl10n', $bundles)) {
    $GLOBALS['PCT_AUTOGRID']['child_record_callback']['tl_content'] = array('tl_content_l10n', 'addCteType');
}
// support RMS
if (\in_array('SrhinowContaoRmsBundle', $bundles)) {
    $GLOBALS['PCT_AUTOGRID']['child_record_callback']['tl_content'] = array('\\Srhinow\\ContaoRmsBundle\\EventListener\\Dca\\Content', 'addCteType');
}
$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR'] = array();
//-- classic human classes
$GLOBALS['PCT_AUTOGRID']['classes_100'] = array('full', 'one_half', 'one_third', 'two_third', 'one_fourth', 'two_fourth', 'three_fourth', 'one_fifth', 'two_fifth', 'three_fifth', 'four_fifth', 'one_sixth', 'two_sixth', 'three_sixth', 'four_sixth', 'five_sixth');
$GLOBALS['PCT_AUTOGRID']['mobile_classes_100'] = array('full', 'one_half_m', 'one_third_m', 'two_third_m', 'one_fourth_m', 'two_fourth_m', 'three_fourth_m', 'one_fifth_m', 'two_fifth_m', 'three_fifth_m', 'four_fifth_m', 'one_sixth_m', 'two_sixth_m', 'three_sixth_m', 'four_sixth_m', 'five_sixth_m');
$GLOBALS['PCT_AUTOGRID']['offsets_100'] = array('offset_one_half', 'offset_one_third', 'offset_two_third', 'offset_one_fourth', 'offset_two_fourth', 'offset_three_fourth', 'offset_one_fifth', 'offset_two_fifth', 'offset_three_fifth', 'offset_four_fifth', 'offset_one_sixth', 'offset_two_sixth', 'offset_three_sixth', 'offset_four_sixth', 'offset_five_sixth');
//-- clockwise classes
$GLOBALS['PCT_AUTOGRID']['classes'] = \array_reverse(array('col_1', 'col_2', 'col_3', 'col_4', 'col_5', 'col_6', 'col_7', 'col_8', 'col_9', 'col_10', 'col_11', 'col_12'));
$GLOBALS['PCT_AUTOGRID']['tablet_classes'] = \array_reverse(array('col_1_t', 'col_2_t', 'col_3_t', 'col_4_t', 'col_5_t', 'col_6_t', 'col_7_t', 'col_8_t', 'col_9_t', 'col_10_t', 'col_11_t', 'col_12_t'));
$GLOBALS['PCT_AUTOGRID']['mobile_classes'] = \array_reverse(array('col_1_m', 'col_2_m', 'col_3_m', 'col_4_m', 'col_5_m', 'col_6_m', 'col_7_m', 'col_8_m', 'col_9_m', 'col_10_m', 'col_11_m', 'col_12_m'));
// offsets
$GLOBALS['PCT_AUTOGRID']['offsets'] = array('offset_col_1', 'offset_col_2', 'offset_col_3', 'offset_col_4', 'offset_col_5', 'offset_col_6', 'offset_col_7', 'offset_col_8', 'offset_col_9', 'offset_col_10', 'offset_col_11', 'offset_col_12');
// align
$GLOBALS['PCT_AUTOGRID']['alignments'] = array('align_left', 'align_center', 'align_right');
$GLOBALS['PCT_AUTOGRID']['alignments::autogridColStart'] = array('align_left_top', 'align_left_center', 'align_left_bottom', 'align_center_top', 'align_center_center', 'align_center_bottom', 'align_right_top', 'align_right_center', 'align_right_bottom');
// gutter
$GLOBALS['PCT_AUTOGRID']['gutters'] = array('gutter_s', 'gutter_m', 'gutter_l', 'gutter_none');
$GLOBALS['PCT_AUTOGRID']['padding_classes'] = array('p-xl', 'p-l', 'p-m', 'p-s', 'p-xs');
/**
 * Field definitions
 */
// autogrid related fields
$GLOBALS['PCT_AUTOGRID']['autogrid_fields'] = array(
    'autogrid' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid'], 'exclude' => \true, 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr', 'submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''"),
    'autogrid_css' => array(
        'label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_css'],
        'exclude' => \true,
        'inputType' => 'select',
        'default' => 'col_12',
        'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getDesktopClasses'),
        'eval' => array('tl_class' => 'w50', 'chosen' => \true, 'decodeEntities' => \true, 'doNotSaveEmpty' => \true),
        'reference' => &$GLOBALS['TL_LANG']['autogrid_css'],
        'sql' => "varchar(64) NOT NULL default ''",
        // grid preset reference
        'grid' => 'desktop',
        'load_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'loadGridDefinition')),
        'save_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'restoreDefaultOnEmpty')),
    ),
    'autogrid_mobile' => array(
        'label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_mobile'],
        'exclude' => \true,
        'inputType' => 'select',
        'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getMobileClasses'),
        'eval' => array('tl_class' => 'w50', 'includeBlankOption' => 1, 'chosen' => \true),
        'reference' => &$GLOBALS['TL_LANG']['autogrid_css'],
        'sql' => "varchar(64) NOT NULL default ''",
        // grid preset reference
        'grid' => 'mobile',
        'load_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'loadGridDefinition')),
        'save_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'restoreDefaultOnEmpty')),
    ),
    'autogrid_tablet' => array(
        'label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_tablet'],
        'exclude' => \true,
        'inputType' => 'select',
        'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getTabletClasses'),
        'eval' => array('tl_class' => 'w50', 'includeBlankOption' => 1, 'chosen' => \true),
        'reference' => &$GLOBALS['TL_LANG']['autogrid_css'],
        'sql' => "varchar(64) NOT NULL default ''",
        // grid preset reference
        'grid' => 'tablet',
        'load_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'loadGridDefinition')),
        'save_callback' => array(array('PCT\\AutoGrid\\DcaHelper', 'restoreDefaultOnEmpty')),
    ),
    'autogrid_offset' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_offset'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getOffsetClasses'), 'reference' => &$GLOBALS['TL_LANG']['autogrid_offset'], 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true, 'chosen' => \true), 'sql' => "varchar(32) NOT NULL default ''"),
    'autogrid_align' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_align'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getAlignmentClasses'), 'reference' => &$GLOBALS['TL_LANG']['autogrid_align'], 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true, 'chosen' => \true), 'sql' => "varchar(32) NOT NULL default ''"),
    'autogrid_align_mobile' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_align_mobile'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getAlignmentClasses'), 'reference' => &$GLOBALS['TL_LANG']['autogrid_align'], 'eval' => array('tl_class' => 'w50', 'includeBlankOption' => \true, 'chosen' => \true), 'sql' => "varchar(32) NOT NULL default ''"),
    'autogrid_gutter' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_gutter'], 'exclude' => \true, 'inputType' => 'select', 'options_callback' => array('PCT\\AutoGrid\\DcaHelper', 'getGutterClasses'), 'reference' => &$GLOBALS['TL_LANG']['autogrid_gutter'], 'eval' => array('includeBlankOption' => \true, 'tl_class' => 'w50'), 'sql' => "varchar(16) NOT NULL default ''"),
    'autogrid_sameheight' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_sameheight'], 'exclude' => \true, 'inputType' => 'checkbox', 'reference' => &$GLOBALS['TL_LANG']['autogrid_sameheight'], 'eval' => array('tl_class' => 'w50 m12'), 'sql' => "char(1) NOT NULL default ''"),
    'autogrid_class' => array('label' => &$GLOBALS['TL_LANG']['dca_autogrid']['autogrid_class'], 'inputType' => 'text', 'eval' => array('tl_class' => 'w50'), 'sql' => "varchar(255) NOT NULL default ''"),
    // reference id
    'autogrid_id' => array('sql' => "int(10) NOT NULL default '0'"),
);
// general fields
$GLOBALS['PCT_AUTOGRID']['fields'] = array();
// wildcard fields
$GLOBALS['PCT_AUTOGRID']['BE_WILDCARD'] = array('autogrid_css', 'autogrid_tablet', 'autogrid_mobile', 'autogrid_gutter', 'autogrid_sameheight');
// define which css fields relate to the type of content element
$GLOBALS['PCT_AUTOGRID']['cssByType']['*'] = array();
/**
 * Field definitions (global)
 */
if (isset($GLOBALS['PCT_AUTOGRID']['GRID_PRESETS']) === \false) {
    $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'] = array();
}
// include presets
$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
if (\file_exists($rootDir . '/' . \PCT_AUTOGRID_PATH . '/config/presets.php')) {
    include_once $rootDir . '/' . \PCT_AUTOGRID_PATH . '/config/presets.php';
}
/**
 * Rgister backend keys
 */
$GLOBALS['BE_MOD']['content']['article']['grid_preset'] = array('PCT\\AutoGrid\\Backend\\PageGridPreset', 'run');
/**
 * Content elements
 */
$GLOBALS['TL_CTE']['autogrid_node'] = array('autogridRowStart' => 'PCT\\AutoGrid\\ContentAutoGridRow', 'autogridRowStop' => 'PCT\\AutoGrid\\ContentAutoGridRow', 'autogridColStart' => 'PCT\\AutoGrid\\ContentAutoGridCol', 'autogridColStop' => 'PCT\\AutoGrid\\ContentAutoGridCol', 'autogridGridStart' => 'PCT\\AutoGrid\\ContentAutoGridGrid', 'autogridGridStop' => 'PCT\\AutoGrid\\ContentAutoGridGrid');
/**
 * Front end form fields
 */
$GLOBALS['TL_FFL']['autogridRowStart'] = 'PCT\\AutoGrid\\WidgetAutoGridRow';
$GLOBALS['TL_FFL']['autogridRowStop'] = 'PCT\\AutoGrid\\WidgetAutoGridRow';
$GLOBALS['TL_FFL']['autogridColStart'] = 'PCT\\AutoGrid\\WidgetAutoGridCol';
$GLOBALS['TL_FFL']['autogridColStop'] = 'PCT\\AutoGrid\\WidgetAutoGridCol';
/**
 * Wrappers
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'autogridColStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'autogridColStop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'autogridRowStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'autogridRowStop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'autogridGridStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'autogridGridStop';
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('PCT\\AutoGrid\\DcaHelper', 'loadAssets');
$GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\AutoGrid\\Core', 'loadAssets');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('PCT\\AutoGrid\\ContaoCallbacks', 'getContentElementCallback');
$GLOBALS['TL_HOOKS']['parseWidget'][] = array('PCT\\AutoGrid\\ContaoCallbacks', 'parseWidgetCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\AutoGrid\\ContaoCallbacks', 'parseTemplateCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\AutoGrid\\Backend\\BackendIntegration', 'parseTemplateCallback');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\AutoGrid\\Controller', 'initSystem');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\AutoGrid\\Controller', 'loadAssets');
$GLOBALS['TL_HOOKS']['addCustomRegexp'][] = array('PCT\\AutoGrid\\ContaoCallbacks', 'addCustomRegexpCallback');
$GLOBALS['TL_HOOKS']['isVisibleElement'][] = array('PCT\\AutoGrid\\ContaoCallbacks', 'isVisibleElementCallback');
}

namespace {
/**
 * Constants
 */
\define('PCT_CUSTOMELEMENTS_PATH', 'system/modules/pct_customelements');
\define('PCT_CUSTOMELEMENTS_VERSION', '5.1.0');
\define('PCT_CUSTOMELEMENTS_FONTAWESOME_VERSION', '4.7.0');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/' . \PCT_CUSTOMELEMENTS_PATH . '/config/autoload.php';
}
/**
 * Globals
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables'] = array('tl_content', 'tl_module', 'tl_page', 'tl_article', 'tl_news_archive', 'tl_news', 'tl_calendar', 'tl_calendar_events', 'tl_revolutionslider_slides', 'tl_revolutionslider');
// list of tables that are allowed to include custom elements
$GLOBALS['PCT_CUSTOMELEMENTS']['restrictedTables'] = array('tl_files', 'tl_templates', 'tl_theme', 'tl_style_sheet', 'tl_layout', 'tl_image_size');
$GLOBALS['PCT_CUSTOMELEMENTS']['defaultWildcardImageSize'] = array('', '50', 'proportional');
$GLOBALS['PCT_CUSTOMELEMENTS_REGISTRY'] = array();
if (!isset($GLOBALS['PCT_CUSTOMELEMENTS']['cache'])) {
    $GLOBALS['PCT_CUSTOMELEMENTS']['cache'] = array();
}
$GLOBALS['PCT_CUSTOMELEMENTS']['debug'] = \false;
$GLOBALS['PCT_CUSTOMELEMENTS']['saveValuesInWizard'] = \true;
// attribute values will be saved in the wizard data array
$GLOBALS['PCT_CUSTOMELEMENTS']['cacheLimit']['wizard'] = 0;
// limit the number of wizard datas cached automatically
$GLOBALS['PCT_CUSTOMELEMENTS']['cacheWizardsInBackend'] = \true;
// if set to true, wizard data will be cached in the backend. (frontend is enabled by default)
$GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao'] = array('headline', 'singleSRC', 'multiSRC', 'cssID', 'guests', 'invisible');
// if your CC has fields that exist in the tl_content table from contao, add the fieldname to this list to avoid that contao processes the field when rendering the attribute e.g. having a field 'headline' in your table and then rendering a files attribute with downlods. Contao renders the headline value as well because it finds the headline field in the active record.
$GLOBALS['PCT_CUSTOMELEMENTS']['exportCustomCatalogTables'] = \false;
// if set to true, the export will include the tables create with customcatalog
$GLOBALS['PCT_CUSTOMELEMENTS']['path_to_export'] = 'templates';
$GLOBALS['PCT_CUSTOMELEMENTS']['path_to_import'] = 'templates';
$bundles = \array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
if (\in_array('pct_theme_templates', $bundles)) {
    $GLOBALS['PCT_CUSTOMELEMENTS']['path_to_import'] = 'system/modules/pct_theme_templates/pct_templates/ce_imports';
}
$GLOBALS['PCT_CUSTOMELEMENTS']['ignoreOptionFields'] = array('list', 'table', 'checkboxMenu', 'select');
// add attributes that uses the options column for simpel optional values not for generic option fields
// content element set export
$GLOBALS['PCT_CUSTOMELEMENTS']['multiSRC_fields'] = array('multiSRC');
$GLOBALS['PCT_CUSTOMELEMENTS']['singleJumpTo_fields'] = array('jumpTo', 'customcatalog_jumpTo', 'reg_jumpTo');
// relink single pages
$GLOBALS['PCT_CUSTOMELEMENTS']['sourceField'] = array('tl_content' => 'pct_customelement', 'tl_module' => 'pct_customelement');
$GLOBALS['PCT_CUSTOMELEMENTS']['basicEntities'] = array('[nbsp]' => '&nbsp;', '[lt]' => '&lt;', '[gt]' => '&gt;', '[shy]' => '&shy;', '[&]' => '&amp;', '[br]' => '</br>', '&#35;' => '#', '&#61;' => '=');
if (!isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']) || !\is_array($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'])) {
    $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'] = array();
}
// register plugins
if (!isset($GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']) || !\is_array($GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS'])) {
    $GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS'] = array();
}
/**
 * Back end modules
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['BE_MOD']['content'], \count($GLOBALS['BE_MOD']['content']), array('pct_customelements' => array('tables' => array('tl_pct_customelement', 'tl_pct_customelement_group', 'tl_pct_customelement_attribute', 'tl_pct_customelement_vault'), 'icon' => \PCT_CUSTOMELEMENTS_PATH . '/assets/img/icon.svg', 'import' => array('PCT\\CustomElements\\Backend\\Import', 'createInterface'), 'export' => array('PCT\\CustomElements\\Plugins\\Export\\Export', 'createInterface'))));
/**
 * Content elements
 */
$GLOBALS['TL_CTE']['pct_customelements_node'] = array();
/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_customelements_node'] = array();
/**
 * Back end form fields
 */
$GLOBALS['BE_FFL']['pct_customelement'] = 'PCT\\CustomElements\\Widgets\\WidgetCustomElement';
/**
 * Register the model classes
 */
$GLOBALS['TL_MODELS']['tl_pct_customelement_attribute'] = 'PCT\\CustomElements\\Models\\AttributeModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement'] = 'PCT\\CustomElements\\Models\\CustomElementModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_group'] = 'PCT\\CustomElements\\Models\\GroupModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_vault'] = 'PCT\\CustomElements\\Models\\VaultModel';
/**
 * Default rendering classes
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['TL_CTE'] = 'PCT\\CustomElements\\Frontend\\ContentCustomElement';
$GLOBALS['PCT_CUSTOMELEMENTS']['TL_FMD'] = 'PCT\\CustomElements\\Frontend\\ModuleCustomElement';
$GLOBALS['PCT_CUSTOMELEMENTS']['palette'] = '{type_legend},type;###CUSTOMELEMENT_WIDGET###';
/**
 * Maintenance
 */
$GLOBALS['TL_MAINTENANCE'][] = 'PCT\\CustomElements\\Core\\Maintenance\\Jobs';
// Jobs
$GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'] = array('resolveVault' => array('callback' => array('PCT\\CustomElements\\Core\\Maintenance\\VaultUpdater', 'resolve'), 'key' => 'resolveVault'));
/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelements';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelementsp';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_groups';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_groupsp';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_attributes';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customelement_attributesp';
$GLOBALS['TL_PERMISSIONS'][] = 'protect_pct_customelement_groups';
$GLOBALS['TL_PERMISSIONS'][] = 'protect_pct_customelement_attributes';
// register attributes
\Contao\ArrayUtil::arrayInsert($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'], 0, array('text' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['text'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Text', 'class' => 'PCT\\CustomElements\\Attributes\\Text', 'icon' => 'fa fa-file-text-o'), 'headline' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['headline'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Headline', 'class' => 'PCT\\CustomElements\\Attributes\\Headline', 'icon' => 'fa fa-header'), 'url' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['url'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Url', 'class' => 'PCT\\CustomElements\\Attributes\\Url', 'icon' => 'fa fa-globe'), 'files' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['files'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Files', 'class' => 'PCT\\CustomElements\\Attributes\\Files', 'icon' => 'fa fa-file-o'), 'textarea' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['textarea'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Textarea', 'class' => 'PCT\\CustomElements\\Attributes\\Textarea', 'icon' => 'fa fa-file-text'), 'select' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['select'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Select', 'class' => 'PCT\\CustomElements\\Attributes\\Select', 'icon' => 'fa fa-sort'), 'checkboxMenu' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['checkboxMenu'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/CheckboxMenu', 'class' => 'PCT\\CustomElements\\Attributes\\CheckboxMenu', 'icon' => 'fa fa-check-square-o'), 'checkbox' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['checkbox'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Checkbox', 'class' => 'PCT\\CustomElements\\Attributes\\Checkbox', 'icon' => 'fa fa-check-square-o'), 'image' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['image'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Image', 'class' => 'PCT\\CustomElements\\Attributes\\Image', 'icon' => 'fa fa-file-image-o'), 'backend_explanation' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['backend_explanation'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/BackendExplanation', 'class' => 'PCT\\CustomElements\\Attributes\\BackendExplanation', 'icon' => 'fa fa-info-circle'), 'include' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['include'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/IncludeElement', 'class' => 'PCT\\CustomElements\\Attributes\\IncludeElement', 'icon' => 'fa fa-code-fork'), 'timestamp' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['timestamp'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Timestamp', 'class' => 'PCT\\CustomElements\\Attributes\\Timestamp', 'icon' => 'fa fa-calendar'), 'table' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['table'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Table', 'class' => 'PCT\\CustomElements\\Attributes\\Table', 'icon' => 'fa fa-table'), 'list' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['list'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/ListElement', 'class' => 'PCT\\CustomElements\\Attributes\\ListElement', 'icon' => 'fa fa-list'), 'number' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['number'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Number', 'class' => 'PCT\\CustomElements\\Attributes\\Number', 'icon' => 'fa fa-calculator'), 'optionWizard' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['optionWizard'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/OptionWizard', 'class' => 'PCT\\CustomElements\\Attributes\\OptionWizard', 'icon' => 'fa fa-reorder'), 'colorpicker' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['colorpicker'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Colorpicker', 'class' => 'PCT\\CustomElements\\Attributes\\Colorpicker', 'icon' => 'fa fa-file-text-o'), 'gallery' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['gallery'], 'path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Attributes/Gallery', 'class' => 'PCT\\CustomElements\\Attributes\\Gallery', 'icon' => 'fa fa-image', 'backendWildcardSize' => array('50', '50', 'center_center'))));
// export plugin
$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']['export'] = array('path' => \PCT_CUSTOMELEMENTS_PATH . '/PCT/CustomElements/Plugins/Export');
/**
 * Hooks
 */
// load attributes
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Loader\\AttributeLoader', 'loadOnSystem');
#// load plugins
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Core\\SystemIntegration', 'initSystem');
#$GLOBALS['TL_HOOKS']['initializeSystem'][] 				= array('PCT\CustomElements\Core\SystemIntegration', 'showVaultMigrationAlert');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Backend\\BackendIntegration', 'loadAssets');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\CustomElements\\Backend\\BackendIntegration', 'injectJavascriptInBackendPage');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\CustomElements\\Backend\\BackendIntegration', 'injectVersionnumberInBackendPage');
\Contao\ArrayUtil::arrayInsert($GLOBALS['TL_HOOKS']['loadDataContainer'], 0, array(array('PCT\\CustomElements\\Helper\\DcaHelper', 'initializeBackend')));
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('PCT\\CustomElements\\Core\\InsertTags', 'replaceTags');
$GLOBALS['TL_HOOKS']['executePostActions'][] = array('PCT\\CustomElements\\Helper\\DcaHelper', 'executePostActions');
$GLOBALS['TL_HOOKS']['executePreActions'][] = array('PCT\\CustomElements\\Helper\\DcaHelper', 'executePreActions');
$GLOBALS['TL_HOOKS']['reviseTable'][] = array('PCT\\CustomElements\\Core\\Vault', 'purgeDuplicates');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['observeClipboard'][] = array('PCT\\CustomElements\\Core\\Callbacks', 'observeClipboard');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['createCopyInVault'][] = array('PCT\\CustomElements\\Core\\Callbacks', 'createCopyInVault');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['removeFromVault'][] = array('PCT\\CustomElements\\Core\\Callbacks', 'removeFromVault');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareForDca'][] = array('PCT\\CustomElements\\Helper\\DcaHelper', 'storeAttributeDCA');
$GLOBALS['TL_HOOKS']['reviseTable'][] = array('PCT\\CustomElements\\Helper\\DcaHelper', 'clearSession');
}

namespace {
// Back end modules
$GLOBALS['BE_MOD']['content']['news'] = array('tables' => array('tl_news_archive', 'tl_news', 'tl_content'), 'table' => array(\Contao\CoreBundle\Controller\BackendCsvImportController::class, 'importTableWizardAction'), 'list' => array(\Contao\CoreBundle\Controller\BackendCsvImportController::class, 'importListWizardAction'));
// Front end modules
$GLOBALS['FE_MOD']['news'] = array('newslist' => \Contao\ModuleNewsList::class, 'newsreader' => \Contao\ModuleNewsReader::class, 'newsarchive' => \Contao\ModuleNewsArchive::class, 'newsmenu' => \Contao\ModuleNewsMenu::class);
// Style sheet
if (\Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(\Contao\System::getContainer()->get('request_stack')->getCurrentRequest() ?? \Symfony\Component\HttpFoundation\Request::create(''))) {
    $GLOBALS['TL_CSS'][] = 'bundles/contaonews/news.min.css|static';
}
// Add permissions
$GLOBALS['TL_PERMISSIONS'][] = 'news';
$GLOBALS['TL_PERMISSIONS'][] = 'newp';
// Models
$GLOBALS['TL_MODELS']['tl_news_archive'] = \Contao\NewsArchiveModel::class;
$GLOBALS['TL_MODELS']['tl_news'] = \Contao\NewsModel::class;
}

namespace {
/*
 * Form fields
 */
$GLOBALS['TL_FFL']['mp_form_pageswitch'] = \Terminal42\MultipageFormsBundle\Widget\PageSwitch::class;
$GLOBALS['TL_FFL']['mp_form_placeholder'] = \Terminal42\MultipageFormsBundle\Widget\Placeholder::class;
}

namespace {
/**
 * Constants
 */
\define('PCT_FRONTEND_QUICKEDIT_VERSION', '2.1.1');
\define('PCT_FRONTEND_QUICKEDIT_PATH', 'system/modules/pct_frontend_quickedit');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_frontend_quickedit/config/autoload.php';
}
/**
 * Globals
 */
$GLOBALS['PCT_FRONTEND_QUICKEDIT'] = array();
$GLOBALS['PCT_FRONTEND_QUICKEDIT_CONFIG'] = array();
$GLOBALS['PCT_QUICKEDIT_INTERFACES'] = array();
$GLOBALS['PCT_QUICKEDIT_MODELS'] = array();
if (!isset($GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES'])) {
    $GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES'] = array();
}
// Settings
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['dataAttributePrefix'] = 'pct-edit__%s';
// the prefix for the data- attribute e.g. data-pctfb_id="123"
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssIdLogic'] = 'pct-edit__%s';
// the unique cssID logic incase an element has no CSS-ID to identify
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['CSS'] = \PCT_FRONTEND_QUICKEDIT_PATH . '/assets/css/styles.css';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['scrollPositionKey'] = 'PCT_FRONTEND_EDIT_SCROLLPOSITION';
// localStorage key for the scroll position
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['sizeClassKey'] = 'PCT_FRONTEND_EDIT_WINDOW_SIZE';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['windowOpenKey'] = 'PCT_FRONTEND_EDIT_WINDOW_SRC';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['liveModeKey'] = 'PCT_FRONTEND_EDIT_LIVE_MODE';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssSizeClasses'] = array('size-s', 'size-l');
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['timer'] = 300;
// timer in seconds before auto refresh
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['cssDisabledClass'] = 'edit-off';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content'] = \true;
// true: click an element will open the editor directly. false: click the "edit" button to open the editor
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::form'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::module'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_news'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::swiper-slider-start'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::portfoliofilter'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::google_map'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::openstreetmap'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::tabs'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::revolutionslider'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_content::autogridColStart'] = \false;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_module'] = \true;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['tl_module::html'] = \true;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['clickToEdit']['isCustomCatalog'] = \true;
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['contentelements::edit_list'] = 'size-l';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['contentelements::editheader'] = 'size-l';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['articles::editheader'] = 'size-l';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['isCustomCatalog::edit'] = 'size-s';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['SIZES']['isCustomCatalog::edit_list'] = 'size-l';
// define templates
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements'] = array('tl_content' => 'interface_contentelement', 'tl_article' => 'interface_article', 'tl_module' => 'interface_module', 'tl_news' => 'interface_news', 'tl_calendar_events' => 'interface_events', 'tl_form' => 'interface_form', 'isCustomCatalog' => 'interface_customcatalog');
// special templates
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::sliderStart'] = 'interface_contentelement_sliderStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::swiper-slider-start'] = 'interface_contentelement_swiper-slider-start';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::autogridColStart'] = 'interface_contentelement_autogridColStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['TEMPLATES']['elements']['tl_content::revolutionslider'] = 'interface_contentelement_revolutionslider';
// excludes
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridGridStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridGridStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridRowStart';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridRowStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'autogridColStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'grid_gallery_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'video_background_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'youtube_background_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'youtube_background_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'bgimage_content_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'imagemap_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'popup_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'frame_end';
#$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'swiper-slider-start';
#$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'swiper-slider-end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'swiper-slider-divider';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'tabs_divider';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'tabs_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'wrap_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'timeline_end';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'bgimage_end';
#$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_text';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_hyperlink';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_video';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'revolutionslider_image';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_content'][] = 'bgimage_content_divider';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_module'][] = 'newsreader';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDES']['tl_module'][] = 'eventreader';
// exclude wrappers and all in between [start] => [stop]
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START']['tl_content']['sliderStart'] = 'sliderStop';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['EXCLUDE_WRAPPER_START']['tl_content']['swiper-slider-start'] = 'swiper-slider-end';
// Offset elemente
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_revolutionslider > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_bgimage > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_player > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .mod_pageimage > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_headerimage > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = '#slider .mod_article:first-child .ce_vertical_spacer_px > .pct_edit_interface';
$GLOBALS['PCT_FRONTEND_QUICKEDIT']['OFFSET_ELEMENTS'][] = 'body.horizontal_scrolling #slider .mod_article > .pct_edit_interface';
// Back end form fields
$GLOBALS['BE_FFL']['pctSizesWizard'] = 'PCT\\FrontendQuickEdit\\Widgets\\SizesWizard';
// Front end modules
$GLOBALS['FE_MOD']['miscellaneous']['backendlogin'] = 'PCT\\FrontendQuickEdit\\Frontend\\ModuleBackendLogin';
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\FrontendQuickEdit\\SystemIntegration', 'loadBackendAssets');
$GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\FrontendQuickEdit\\SystemIntegration', 'loadFrontendAssets');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'getFrontendElementCallback');
$GLOBALS['TL_HOOKS']['getFrontendModule'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'getFrontendElementCallback');
$GLOBALS['TL_HOOKS']['generatePage'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'generatePageCallback');
$GLOBALS['TL_HOOKS']['isVisibleElement'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'isVisibleElementCallback');
$GLOBALS['TL_HOOKS']['parseArticles'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'parseArticlesCallback');
$GLOBALS['TL_HOOKS']['getAllEvents'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'getAllEventsCallback');
$GLOBALS['CUSTOMCATALOG_HOOKS']['getEntries'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'getCustomCatalogEntriesCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'parseTemplateCallback');
$GLOBALS['TL_HOOKS']['parseFrontendTemplate'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'parseFrontendTemplateCallback');
$GLOBALS['TL_HOOKS']['postLogin'][] = array('PCT\\FrontendQuickEdit\\SystemIntegration', 'backendUserLoggedIn');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('PCT\\FrontendQuickEdit\\ContaoCallbacks', 'replaceInsertTagsCallback');
}

namespace {
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_revolutionslider/config/autoload.php';
}
/**
 * Constants
 */
\define('REVOLUTIONSLIDER_VERSION', '6.0.6');
\define('REVOLUTIONSLIDER_PATH', 'system/modules/pct_revolutionslider');
/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['content']['revolutionslider'] = array('tables' => array('tl_revolutionslider', 'tl_revolutionslider_slides', 'tl_content'), 'icon' => \REVOLUTIONSLIDER_PATH . '/assets/img/icon.gif');
/**
 * Content elements
 */
$GLOBALS['TL_CTE']['revolutionslider_node'] = array('revolutionslider' => 'RevolutionSlider\\Frontend\\ContentRevolutionSlider', 'revolutionslider_text' => 'RevolutionSlider\\Frontend\\ContentRevolutionSliderText', 'revolutionslider_video' => 'RevolutionSlider\\Frontend\\ContentRevolutionSliderVideo', 'revolutionslider_image' => 'RevolutionSlider\\Frontend\\ContentRevolutionSliderImage', 'revolutionslider_hyperlink' => 'RevolutionSlider\\Frontend\\ContentRevolutionSliderHyperlink');
/**
 * Register the model classes
 */
$GLOBALS['TL_MODELS']['tl_revolutionslider'] = 'RevolutionSlider\\Models\\Slider';
$GLOBALS['TL_MODELS']['tl_revolutionslider_slides'] = 'RevolutionSlider\\Models\\Slides';
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('RevolutionSlider\\Core\\InsertTags', 'replaceTags');
/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionsliders';
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionslidersp';
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionslider_slides';
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionslider_slidesp';
/**
 * Globals
 */
$GLOBALS['REVOLUTIONSLIDER']['isBundledVersion'] = \false;
// just toggles between a couple features
$GLOBALS['REVOLUTIONSLIDER']['cteIgnoreList'] = array();
// custom ignore list
$GLOBALS['REVOLUTIONSLIDER']['allowedContentElements'] = array('revolutionslider_text', 'revolutionslider_image', 'revolutionslider_hyperlink', 'revolutionslider_video');
$GLOBALS['REVOLUTIONSLIDER']['TRANSITIONS'] = array();
// add more transitions
$GLOBALS['REVOLUTIONSLIDER']['EASINGS'] = array();
// add more easing equations
$GLOBALS['REVOLUTIONSLIDER']['ANIMATIONS']['START'] = array();
// add more animation classes
$GLOBALS['REVOLUTIONSLIDER']['ANIMATIONS']['END'] = array();
// add more animation classes
$GLOBALS['REVOLUTIONSLIDER']['alwaysShowPos9Grid'] = \false;
// set to true to enable the relative position option for any content element
$GLOBALS['REVOLUTIONSLIDER']['scriptPath'] = 'files/cto_layout/scripts/revolution';
// mapping animation to data-frames json
$GLOBALS['REVOLUTIONSLIDER']['FRAMES'] = array(
    'skewfromleftshort' => '{"delay":0,"speed":300,"frame":"0","from":"x:-200px;skX:85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'skewfromrightshort' => '{"delay":0,"speed":300,"frame":"0","from":"x:200px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'skewfromleft' => '{"delay":0,"speed":300,"frame":"0","from":"x:left;skX:45px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'skewfromright' => '{"delay":0,"speed":300,"frame":"0","from":"x:right;skX:-85px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'randomrotate' => '{"delay":0,"speed":300,"frame":"0","from":"x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    // short from left
    'sfl' => '{"delay":0,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    // short from right
    'sfr' => '{"delay":0,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}',
    // short from top
    'sft' => '{"delay":0,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    // short from bottom
    'sfb' => '{"delay":0,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}',
    // long from left
    'lfl' => '{"delay":0,"speed":300,"frame":"0","from":"x:left;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    // long from right
    'lfr' => '{"delay":0,"speed":300,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    // long from top
    'lft' => '{"delay":0,"speed":300,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    // long from bottom
    'lfb' => '{"delay":0,"speed":300,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'fade' => '{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'letterflybottom' => '{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'letterflyleft' => '{"delay":0,"split":"chars","splitdelay":0.1,"speed":2000,"frame":"0","from":"x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'letterflyright' => '{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'letterflytop' => '{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'maskedzoomout' => '{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'popupsmooth' => '{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'rotatefrombottom' => '{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rZ:90deg;sX:2;sY:2;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'rotatefromzero' => '{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'slidemaskfrombottom' => '{"delay":0,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'slidemaskfromleft' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'slidemaskfromright' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'slidemaskfromtop' => '{"delay":0,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'popupsmooth1' => '{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'popupsmooth2' => '{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'smoothmaskfromright' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'smoothmaskfromleft' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'smoothslidefrombottom' => '{"delay":0,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
    'no_animation' => '{"delay":0,"speed":300,"frame":"0","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
);
$GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES'] = array('bullets' => array('bullets_hesperiden', 'bullets_gyges', 'bullets_hades', 'bullets_ares', 'bullets_hebe', 'bullets_hermes', 'bullets_hephaistos', 'bullets_persephone', 'bullets_erinyen', 'bullets_zeus', 'bullets_metis', 'bullets_dione', 'bullets_uranus'), 'tabs' => array('tabs_hesperiden', 'tabs_gyges', 'tabs_hades', 'tabs_ares', 'tabs_hebe', 'tabs_hermes', 'tabs_erinyen', 'tabs_zeus', 'tabs_metis'), 'thumbs' => array('thumbs_hesperiden', 'thumbs_gyges', 'thumbs_hades', 'thumbs_erinyen', 'thumbs_zeus'));
$GLOBALS['REVOLUTIONSLIDER']['ARROW_STYLES'] = array('hesperiden', 'gyges', 'hades', 'ares', 'hebe', 'hermes', 'hephaistos', 'persephone', 'erinyen', 'zeus', 'metis', 'uranus');
// thumbnail sizes
// $GLOBALS['REVOLUTIONSLIDER']['THUMBNAIL_SIZES'] = array(250,250,'center_center');
// $GLOBALS['REVOLUTIONSLIDER']['THUMBNAIL_SIZES_TABS'] = array(180,100,'center_center');
}

namespace {
// Front end module
$GLOBALS['FE_MOD']['application']['listing'] = \Contao\ModuleListing::class;
}

namespace {
/**
 * Constants
 */
\define('PCT_PRIVACY_MANAGER_VERSION', '2.1.1');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_privacy_manager/config/autoload.php';
}
/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_privacy_manager'] = array('privacy_in' => 'PCT\\PrivacyManager\\ModuleOptIn', 'privacy_out' => 'PCT\\PrivacyManager\\ModuleOptOut');
/**
 * Content elements
 */
$GLOBALS['TL_CTE']['media']['privacy_iframe'] = 'PCT\\PrivacyManager\\ContentPrivacyIframe';
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['getPageLayout'][] = array('PCT\\PrivacyManager\\ContaoCallbacks', 'getPageLayoutCallback');
}

namespace {
// Back end modules
$GLOBALS['BE_MOD']['content']['calendar'] = array('tables' => array('tl_calendar', 'tl_calendar_events', 'tl_calendar_feed', 'tl_content'), 'table' => array(\Contao\CoreBundle\Controller\BackendCsvImportController::class, 'importTableWizardAction'), 'list' => array(\Contao\CoreBundle\Controller\BackendCsvImportController::class, 'importListWizardAction'));
// Front end modules
$GLOBALS['FE_MOD']['events'] = array('calendar' => \Contao\ModuleCalendar::class, 'eventreader' => \Contao\ModuleEventReader::class, 'eventlist' => \Contao\ModuleEventlist::class, 'eventmenu' => \Contao\ModuleEventMenu::class);
// Style sheet
if (\Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(\Contao\System::getContainer()->get('request_stack')->getCurrentRequest() ?? \Symfony\Component\HttpFoundation\Request::create(''))) {
    $GLOBALS['TL_CSS'][] = 'bundles/contaocalendar/calendar.min.css|static';
}
// Register hooks
$GLOBALS['TL_HOOKS']['removeOldFeeds'][] = array(\Contao\Calendar::class, 'purgeOldFeeds');
$GLOBALS['TL_HOOKS']['generateXmlFiles'][] = array(\Contao\Calendar::class, 'generateFeeds');
// Add permissions
$GLOBALS['TL_PERMISSIONS'][] = 'calendars';
$GLOBALS['TL_PERMISSIONS'][] = 'calendarp';
$GLOBALS['TL_PERMISSIONS'][] = 'calendarfeeds';
$GLOBALS['TL_PERMISSIONS'][] = 'calendarfeedp';
// Models
$GLOBALS['TL_MODELS']['tl_calendar_events'] = \Contao\CalendarEventsModel::class;
$GLOBALS['TL_MODELS']['tl_calendar_feed'] = \Contao\CalendarFeedModel::class;
$GLOBALS['TL_MODELS']['tl_calendar'] = \Contao\CalendarModel::class;
}

namespace {
// Back end modules
$GLOBALS['BE_MOD']['content']['newsletter'] = array('tables' => array('tl_newsletter_channel', 'tl_newsletter', 'tl_newsletter_recipients'), 'send' => array(\Contao\Newsletter::class, 'send'), 'import' => array(\Contao\Newsletter::class, 'importRecipients'), 'stylesheet' => 'bundles/contaonewsletter/newsletter.min.css');
// Front end modules
$GLOBALS['FE_MOD']['newsletter'] = array('subscribe' => \Contao\ModuleSubscribe::class, 'unsubscribe' => \Contao\ModuleUnsubscribe::class, 'newsletterlist' => \Contao\ModuleNewsletterList::class, 'newsletterreader' => \Contao\ModuleNewsletterReader::class);
// Register hooks
$GLOBALS['TL_HOOKS']['createNewUser'][] = array(\Contao\Newsletter::class, 'createNewUser');
$GLOBALS['TL_HOOKS']['activateAccount'][] = array(\Contao\Newsletter::class, 'activateAccount');
$GLOBALS['TL_HOOKS']['closeAccount'][] = array(\Contao\Newsletter::class, 'removeSubscriptions');
// Add permissions
$GLOBALS['TL_PERMISSIONS'][] = 'newsletters';
$GLOBALS['TL_PERMISSIONS'][] = 'newsletterp';
// Models
$GLOBALS['TL_MODELS']['tl_newsletter_channel'] = \Contao\NewsletterChannelModel::class;
$GLOBALS['TL_MODELS']['tl_newsletter_deny_list'] = \Contao\NewsletterDenyListModel::class;
$GLOBALS['TL_MODELS']['tl_newsletter'] = \Contao\NewsletterModel::class;
$GLOBALS['TL_MODELS']['tl_newsletter_recipients'] = \Contao\NewsletterRecipientsModel::class;
}

namespace {
/**
 * Constants
 */
\define('PCT_THEME_SETTINGS_VERSION', '2.1.1');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_theme_settings/config/autoload.php';
}
/**
 * Globals
 */
$GLOBALS['PCT_THEME_SETTINGS']['newslist_order'] = array('sorting', 'author', 'date');
$GLOBALS['PCT_THEME_SETTINGS']['padding_top_classes'] = array('article-pt', 'article-pt-0', 'article-pt-xxs', 'article-pt-xs', 'article-pt-s', 'article-pt-m', 'article-pt-l', 'article-pt-xl', 'article-pt-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['padding_bottom_classes'] = array('article-pb', 'article-pb-0', 'article-pb-xxs', 'article-pb-xs', 'article-pb-s', 'article-pb-m', 'article-pb-l', 'article-pb-xl', 'article-pb-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['bgcolor_classes'] = array('bg-accent', 'bg-second', 'bg-gray', 'bg-white', 'bg-black', 'bg-customColor1', 'bg-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['article_bgcolor_classes'] = array('article-bg-accent', 'article-bg-second', 'article-bg-gray', 'article-bg-customColor1', 'article-bg-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['width_classes'] = array('fullwidth-boxed', 'fullwidth-boxed-medium', 'fullwidth-boxed-small', 'fullwidth', 'fullwidth-padding-left', 'fullwidth-padding-right', 'fullwidth-padding-both', 'boxed');
$GLOBALS['PCT_THEME_SETTINGS']['bgposition_classes'] = array('bg-left-top', 'bg-left-center', 'bg-left-bottom', 'bg-center-top', 'bg-center-center', 'bg-center-bottom', 'bg-right-top', 'bg-right-center', 'bg-right-bottom', 'parallax');
$GLOBALS['PCT_THEME_SETTINGS']['ol_position_classes'] = array('ol-top', 'ol-right', 'ol-bottom', 'ol-left');
$GLOBALS['PCT_THEME_SETTINGS']['ol_width_classes'] = array('ol-w100', 'ol-w75', 'ol-w50', 'ol-w25');
$GLOBALS['PCT_THEME_SETTINGS']['ol_opacity_classes'] = array('ol-opacity-100', 'ol-opacity-90', 'ol-opacity-80', 'ol-opacity-70', 'ol-opacity-60', 'ol-opacity-50', 'ol-opacity-40', 'ol-opacity-30', 'ol-opacity-20', 'ol-opacity-10');
$GLOBALS['PCT_THEME_SETTINGS']['ol_bgcolor_css_classes'] = array('ol-bg-accent', 'ol-bg-second', 'ol-bg-gray', 'ol-bg-white', 'ol-bg-black');
$GLOBALS['PCT_THEME_SETTINGS']['align_classes'] = array('h-align-center', 'h-align-right');
$GLOBALS['PCT_THEME_SETTINGS']['align_classes::portfoliofilter'] = array('align-left', 'align-center', 'align-right');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes'] = array('style1', 'style2');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::table'] = array('table-clean', 'table-striped', 'table-striped-dark', 'table-custom1');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::hyperlink'] = array('button', 'text');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::list'] = array('style2', 'style3', 'customStyle1', 'customStyle2');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::portfoliofilter'] = array('filter-style1', 'filter-style2');
$GLOBALS['PCT_THEME_SETTINGS']['style_classes::image'] = array('shadow-s', 'shadow-m', 'shadow-l');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes'] = array('txt-color-accent', 'txt-color-second', 'txt-color-white', 'txt-color-gray', 'txt-color-customColor1', 'txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::text'] = array('txt-color-accent', 'txt-color-second', 'txt-color-white', 'txt-color-gray', 'txt-color-customColor1', 'txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::revolutionslider_text'] = array('txt-color-accent', 'txt-color-second', 'txt-color-white', 'txt-color-gray', 'txt-color-customColor1', 'txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::list'] = array('txt-color-accent', 'txt-color-second', 'txt-color-white', 'txt-color-gray', 'txt-color-customColor1', 'txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::table'] = array('txt-color-accent', 'txt-color-second', 'txt-color-white', 'txt-color-gray', 'txt-color-customColor1', 'txt-color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::hyperlink'] = array('btn-accent', 'btn-accent-outline', 'btn-second', 'btn-second-outline', 'btn-white', 'btn-white-outline', 'btn-black', 'btn-black-outline', 'btn-gray', 'btn-gray-outline', 'btn-trnsp', 'btn-trnsp-white', 'btn-customColor1-dark', 'btn-customColor1-light', 'btn-customColor2-dark', 'btn-customColor2-light');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::revolutionslider_hyperlink'] = array('btn-accent', 'btn-accent-outline', 'btn-second', 'btn-second-outline', 'btn-white', 'btn-white-outline', 'btn-black', 'btn-black-outline', 'btn-gray', 'btn-gray-outline', 'btn-trnsp', 'btn-trnsp-white', 'btn-customColor1-dark', 'btn-customColor1-light', 'btn-customColor2-dark', 'btn-customColor2-light');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::portfoliofilter'] = array('txt-color-white');
$GLOBALS['PCT_THEME_SETTINGS']['color_classes::article'] = array('color-accent', 'color-second', 'color-gray', 'color-white', 'color-customColor1', 'color-customColor2');
$GLOBALS['PCT_THEME_SETTINGS']['border_classes'] = array('border-gray-1px', 'border-gray-5px', 'border-gray-10px', 'border-white-1px', 'border-white-5px', 'border-white-10px', 'border-radius-small', 'border-radius-medium', 'border-radius-large');
$GLOBALS['PCT_THEME_SETTINGS']['border_classes::hyperlink'] = array('btn-radius-3', 'btn-radius-5', 'btn-radius-10', 'btn-radius-20', 'btn-radius-50', 'btn-radius-100');
$GLOBALS['PCT_THEME_SETTINGS']['border_classes::revolutionslider_hyperlink'] = array('border-radius-3', 'border-radius-5', 'border-radius-10', 'border-radius-50', 'btn-radius-50', 'btn-radius-100');
$GLOBALS['PCT_THEME_SETTINGS']['format_classes'] = array('format-p-small', 'format-p-medium', 'format-p-large', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6');
$GLOBALS['PCT_THEME_SETTINGS']['format_classes::hyperlink'] = array('btn-size-small', 'btn-size-medium', 'btn-size-large', 'btn-size-full');
$GLOBALS['PCT_THEME_SETTINGS']['format_classes::revolutionslider_hyperlink'] = array('btn-size-small', 'btn-size-medium', 'btn-size-large', 'text-link');
$GLOBALS['PCT_THEME_SETTINGS']['content_width_classes'] = array('width-l', 'width-m', 'width-s');
$GLOBALS['PCT_THEME_SETTINGS']['layout_classes'] = array();
$GLOBALS['PCT_THEME_SETTINGS']['layout_classes::portfoliolist'] = array('portfolio-col1', 'portfolio-col2', 'portfolio-col3', 'portfolio-col4');
$GLOBALS['PCT_THEME_SETTINGS']['visibility_classes'] = array('vis-desktop', 'vis-mobile', 'vis-tablet', 'vis-desktop-mobile', 'vis-desktop-tablet', 'vis-mobile-tablet');
$GLOBALS['PCT_THEME_SETTINGS']['animation_type_classes'] = array('fadeIn animate', 'fadeInLeft animate', 'fadeInRight animate', 'fadeInUp animate', 'fadeInDown animate', 'fadeInLeftBig animate', 'fadeInRightBig animate', 'fadeInUpBig animate', 'fadeInDownBig animate', 'flip animate', 'flipInX animate', 'flipInY animate', 'bounce animate', 'bounceInLeft animate', 'bounceInRight animate', 'bounceInUp animate', 'bounceInDown animate', 'bounceOut animate', 'bounceOutLeft animate', 'bounceOutRight animate', 'imageZoomOut animate', 'imageZoomIn animate', 'imageRotateInfinite animate');
$GLOBALS['PCT_THEME_SETTINGS']['animation_speed_classes'] = array('animate_faster', 'animate_fast', 'animate_slow', 'animate_slower');
$GLOBALS['PCT_THEME_SETTINGS']['animation_delay_classes'] = array('animate_delay_100', 'animate_delay_200', 'animate_delay_300', 'animate_delay_400', 'animate_delay_500', 'animate_delay_600', 'animate_delay_700', 'animate_delay_800', 'animate_delay_900');
// helper classes
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_align'] = array('align-left', 'align-center', 'align-right');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_letter_spacing'] = array('letter-spacing-xxl', 'letter-spacing-xl', 'letter-spacing-l', 'letter-spacing-m', 'letter-spacing-s');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_helper'] = array('line-through', 'uppercase', 'lowercase', 'line-height-1', 'line-height-1-1', 'line-height-1-2', 'line-height-1-3', 'line-height-1-4', 'line-height-1-5', 'line-height-1-6', 'line-height-1-7', 'line-height-1-8', 'line-height-1-9', 'line-height-2');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['mainmenu_helper'] = array('highlight', 'avoid-click', 'open-left', 'click_open', 'click-default', 'scroll_to_anchor');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['headline_styles'] = array('headline_style_h1', 'headline_style_h2', 'headline_style_h3', 'headline_style_h4', 'headline_style_h5', 'headline_style_h6');
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_color'] = array();
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_size'] = array();
$GLOBALS['PCT_THEME_SETTINGS']['helper_css']['negativ_margin'] = array();
// margins
$GLOBALS['PCT_THEME_SETTINGS']['margin_top_classes'] = array('mt-0', 'mt-xxs', 'mt-xs', 'mt-s', 'mt-m', 'mt-l', 'mt-xl', 'mt-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_classes'] = array('mb-0', 'mb-xxs', 'mb-xs', 'mb-s', 'mb-m', 'mb-l', 'mb-xl', 'mb-xxl');
$GLOBALS['PCT_THEME_SETTINGS']['margin_top_m_classes'] = array('mt-0-m', 'mt-xxs-m', 'mt-xs-m', 'mt-s-m', 'mt-m-m', 'mt-l-m', 'mt-xl-m', 'mt-xxl-m');
$GLOBALS['PCT_THEME_SETTINGS']['margin_bottom_m_classes'] = array('mb-0-m', 'mb-xxs-m', 'mb-xs-m', 'mb-s-m', 'mb-m-m', 'mb-l-m', 'mb-xl-m', 'mb-xxl-m');
$GLOBALS['PCT_THEME_SETTINGS']['animate_style_classes'] = array('animate-style1', 'animate-style2', 'animate-style3', 'animate-style3', 'animate-style4', 'animate-style5');
// helper classes field values by table
$GLOBALS['PCT_THEME_SETTINGS']['helper_classes'] = array('tl_content' => array('font_align' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_align'], 'font_letter_spacing' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_letter_spacing'], 'font_helper' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_helper'], 'font_color' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_color'], 'font_size' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['font_size'], 'negativ_margin' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['negativ_margin'], 'headline_styles' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['headline_styles'], 'parallax' => array('parallax-speed-1', 'parallax-speed-2', 'parallax-speed-3', 'parallax-speed-4', 'parallax-speed-5', 'parallax-speed-6', 'parallax-speed-7', 'parallax-speed-8', 'parallax-speed-9', 'parallax-speed-10')), 'tl_page' => array('mainmenu_helper' => $GLOBALS['PCT_THEME_SETTINGS']['helper_css']['mainmenu_helper']));
// merge with custom settings
if (!empty($GLOBALS['PCT_THEME_SETTINGS']['custom']) && \is_array($GLOBALS['PCT_THEME_SETTINGS']['custom'])) {
    $GLOBALS['PCT_THEME_SETTINGS'] = \array_merge($GLOBALS['PCT_THEME_SETTINGS'], $GLOBALS['PCT_THEME_SETTINGS']['custom']);
}
// define which css fields relate to the type of content element
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['*'] = array('visibility_css', 'margin_t', 'margin_b', 'margin_t_m', 'margin_b_m');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['text'] = array('align_css', 'color_css', 'format_css', 'width_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['hyperlink'] = array('align_css', 'color_css', 'style_css', 'format_css', 'border_css', 'animate_style_css', 'icon_position');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['headline'] = array('align_css', 'color_css', 'width_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['accordionSingle'] = array('style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['accordionStart'] = array('style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['table'] = array('style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['image'] = array('align_css', 'border_css', 'style_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['list'] = array('style_css', 'color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['table'] = array('style_css', 'color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['portfoliofilter'] = array('style_css', 'align_css', 'color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['portfoliolist'] = array('style_css', 'layout_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['revolutionslider_hyperlink'] = array('color_css', 'border_css', 'format_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['revolutionslider_text'] = array('color_css');
$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['autogridColStart'] = array('color_css', 'bgcolor_css');
// custom templates by type
if (!isset($GLOBALS['PCT_THEME_SETTINGS']['templateByType'])) {
    $GLOBALS['PCT_THEME_SETTINGS']['templateByType']['headline_seo'] = 'ce_headline_seo';
    $GLOBALS['PCT_THEME_SETTINGS']['templateByType']['text_seo'] = 'ce_text_seo';
}
// fields
$GLOBALS['PCT_THEME_SETTINGS']['fields'] = array();
$GLOBALS['PCT_THEME_SETTINGS']['list_label_callback']['tl_page'] = array('\\tl_page', 'addIcon');
// assets
$GLOBALS['PCT_THEME_SETTINGS']['css'] = 'system/modules/pct_theme_settings/assets/css/be_styles.css';
// import
$GLOBALS['PCT_THEME_SETTINGS']['zero_value_fields'] = array('tl_module.numberOfItems', 'tl_content.numberOfItems');
/**
 * Rgister backend keys
 */
$GLOBALS['BE_MOD']['content']['article']['contentelementset'] = array('PCT\\ThemeSettings\\Backend\\PageContentElementSet', 'run');
$GLOBALS['BE_MOD']['content']['article']['contentelementset_export'] = array('PCT\\ThemeSettings\\Backend\\PageContentElementSetExport', 'run');
// register backend module keys
$bundles = \array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
if (\in_array('news', $bundles) || \in_array('ContaoNewsBundle', $bundles)) {
    $GLOBALS['BE_MOD']['content']['news']['contentelementset'] = array('PCT\\ThemeSettings\\Backend\\PageContentElementSet', 'run');
}
if (\in_array('calendar', $bundles) || \in_array('ContaoCalendarBundle', $bundles)) {
    $GLOBALS['BE_MOD']['content']['calendar']['contentelementset'] = array('PCT\\ThemeSettings\\Backend\\PageContentElementSet', 'run');
}
/**
 * Content elements
 */
$GLOBALS['TL_CTE']['pct_contentelementsets_node']['pct_contentelementset_start'] = '\\Contao\\PCT\\ContentElementSet';
$GLOBALS['TL_CTE']['pct_contentelementsets_node']['pct_contentelementset_stop'] = '\\Contao\\PCT\\ContentElementSet';
/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_theme_settings'] = array('pageimage' => 'PCT\\ThemeSettings\\PageImage\\Module', 'pagearticle' => 'PCT\\ThemeSettings\\PageArticle\\Module');
/**
 * Elementset categories
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['elementSetCategories'] = array('favorites' => array('label' => 'Favoriten', 'icon' => 'ti-star'), 'text' => array('label' => 'Text', 'icon' => 'ti-text'), 'image' => array('label' => 'Bild', 'icon' => 'ti-image'), 'tables_lists' => array('label' => 'Tabellen & Listen', 'icon' => 'ti-list'), 'links' => array('label' => 'Link-Elemente', 'icon' => 'ti-link'), 'accordion_tabs' => array('label' => 'Akkordeon & Tabs', 'icon' => 'ti-layout-tab'), 'slider' => array('label' => 'Slider', 'icon' => 'ti-layout-slider-alt'), 'gallery_videos' => array('label' => 'Galerie & Videos', 'icon' => 'ti-gallery'), 'headers' => array('label' => 'Headers', 'icon' => 'ti-layout-media-center'), 'sections' => array('label' => 'Sektion & Hintergründe', 'icon' => 'ti-layout-accordion-separated'), 'boxes' => array('label' => 'Boxen', 'icon' => 'ti-id-badge'), 'infographics' => array('label' => 'Infografiken', 'icon' => 'ti-pie-chart'), 'downloads' => array('label' => 'Downloads', 'icon' => 'ti-cloud-down'), 'maps' => array('label' => 'Maps', 'icon' => 'ti-map-alt'), 'dividers' => array('label' => 'Trenner & Abstände', 'icon' => 'ti-split-v'));
// order array
$GLOBALS['PCT_ELEMENTSET_LIBRARY_ORDER'] = array();
$GLOBALS['PCT_ELEMENTSET_LIBRARY_CE_FIELDS'] = array('tl_content' => 'pct_customelement', 'tl_module' => 'pct_customelement');
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['compileArticle'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'compileArticleCallback');
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'enableManualSorting');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'replaceInsertTagsCallback');
$GLOBALS['TL_HOOKS']['newsListFetchItems']['PCT_MANUAL_ORDER'] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'newsListFetchItemsCallback');
#$GLOBALS['TL_HOOKS']['newsListCountItems']['PCT_MANUAL_ORDER'] 	= array('PCT\ThemeSettings\ContaoCallbacks','newsListCountItemsCallback');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'getContentElementCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'parseTemplateCallback');
$GLOBALS['TL_HOOKS']['isVisibleElement'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'isVisibleElementCallback');
$GLOBALS['TL_HOOKS']['loadFormField'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'loadFormFieldCallback');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\ThemeSettings\\ContaoCallbacks', 'initializeSystemCallback');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\ThemeSettings\\Backend\\BackendIntegration', 'parseTemplateCallback');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('PCT\\ThemeSettings\\Backend\\BackendIntegration', 'getContentElementCallback');
$GLOBALS['TL_HOOKS']['executePostActions'][] = array('PCT\\ThemeSettings\\Backend\\TableArticle', 'executePostActionsCallback');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\License', 'checkIntegrity');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\License', 'checkBackend');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\License', 'checkFrontend');
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\License', 'addBackendInfo');
$GLOBALS['TL_CRON']['hourly'][] = array('PCT\\License', 'sendAdminMailWhenLocked');
// Content element set export has been called
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('PCT\\ThemeSettings\\Backend\\TableContent', 'exportElements');
}

namespace {
/**
 * Constants
 */
if (\defined('PCT_CUSTOMCATALOG_VERSION') === \false) {
    \define('PCT_CUSTOMCATALOG_VERSION', '5.1.0');
    \define('PCT_CUSTOMCATALOG_PATH', 'system/modules/pct_customelements_plugin_customcatalog');
    \define('PCT_CUSTOMCATALOG_REQ_CE', '5.0.0');
    // the minimum required CustomElements Version
}
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_customelements_plugin_customcatalog/config/autoload.php';
}
$blnRegisterAttributes = \true;
$blnRegisterFilters = \true;
$blnRegisterAPIs = \true;
$blnInitialize = \true;
$blnShowBackendAlert = \false;
// return if customelements module is not installed or Contao has not been installed before, Database class alias does not exist
$bundles = \array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
if (!\in_array('pct_customelements', $bundles) || !\class_exists('Database', \true)) {
    $blnInitialize = \false;
}
/**
 * Globals
 */
if (!isset($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'])) {
    $GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'] = array();
}
if (!isset($GLOBALS['CUSTOMCATALOG_HOOKS'])) {
    $GLOBALS['CUSTOMCATALOG_HOOKS'] = array();
}
if (!isset($GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields'])) {
    $GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields'] = array();
}
if (!isset($GLOBALS['PCT_CUSTOMELEMENTS']['API'])) {
    $GLOBALS['PCT_CUSTOMELEMENTS']['API'] = array();
}
$GLOBALS['PCT_CUSTOMCATALOG']['autoManageDcaFiles'] = \true;
$GLOBALS['PCT_CUSTOMCATALOG']['deleteDcaFileOnCustomCatalogDelete'] = \true;
// when set to true, the generic extension folder in /system/modules will be deleted when the associated customcatalog is being deleted
$GLOBALS['PCT_CUSTOMCATALOG']['deleteLanguageRecordOnBaseRecordDelete'] = \true;
// if set to true, language records related to the base record will be deleted when the base record is being deleted
$GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'] = 'items';
// defines the url parameter for the details link
$GLOBALS['PCT_CUSTOMCATALOG']['urlOrderByParameter'] = 'orderby';
// defines the url parameter for the sorting GET parameter
$GLOBALS['PCT_CUSTOMCATALOG']['urlPerPageParameter'] = 'perPage_c';
// defines the url parameter for pagebreak. the ID of the list module will be added e.g. perPage_c1
$GLOBALS['PCT_CUSTOMCATALOG']['urlPaginationParameter'] = 'page_c';
// defines the url parameter for paginations. the ID of the list module will be added e.g. page_c1
$GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter'] = 'language';
// defines the url parameter for the active language records
$GLOBALS['PCT_CUSTOMCATALOG']['urlCustomParameters'] = array();
// add custom url parameters that will be respected in the url when applying filters
$GLOBALS['PCT_CUSTOMCATALOG']['urlCustomIgnoreParameters'] = array();
// add custom url parameters that will be ignored in the url when applying filters
$GLOBALS['PCT_CUSTOMCATALOG']['resetGETfiltersWithPageReload'] = \true;
// if true, resetting a filter set by a GET parameter will reload the page
$GLOBALS['PCT_CUSTOMCATALOG']['respectActiveGETparams'] = \true;
// if true, GET filters will respect other GET parameters in the url
$GLOBALS['PCT_CUSTOMCATALOG']['debug'] = \false;
$GLOBALS['PCT_CUSTOMCATALOG']['systemColumns'] = array('id', 'pid', 'tstamp', 'sorting', 'ptable');
$GLOBALS['PCT_CUSTOMCATALOG']['reservedWords'] = array();
$GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesSharedWithContao'] = array('headline', 'singleSRC', 'multiSRC', 'cssID', 'guests', 'invisible');
// if your CC has fields that exist in the tl_content table from contao, add the fieldname to this list to avoid that contao processes the field when rendering the attribute e.g. having a field 'headline' in your table and then rendering a files attribute with downlods. Contao renders the headline value as well because it finds the headline field in the active record.
$GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields'] = \array_merge($GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields'], array('list', 'table', 'checkboxMenu', 'checkbox', 'select', 'selectdb', 'headline', 'alias', 'url[pagepicker]', 'iconpicker', 'tags', 'protection', 'timestamp', 'text', 'number', 'metadescription', 'metakeywords', 'protection', 'itemtemplate', 'include', 'pagetree', 'paletteselect', 'translationWidget', 'customelement', 'simpleColumn', 'colorpicker'));
// add attributes that uses the options column for simpel optional values not for generic option fields
$GLOBALS['PCT_CUSTOMCATALOG']['active_modules'] = array();
$GLOBALS['PCT_CUSTOMCATALOG']['manageExistingTables'] = \false;
// set to true if you want customcatalog to manage your existing tables (use with care)
$GLOBALS['PCT_CUSTOMCATALOG']['childTableMustBeAConfiguration'] = \true;
// set here if a selected child table must have a valid,active configuration before it will be handled as a child
$GLOBALS['PCT_CUSTOMCATALOG']['filterSessionName'] = 'customcatalogfilter';
// name of the session key to store active filters in
$GLOBALS['PCT_CUSTOMCATALOG']['backendUrlLogic'] = '%s_%s';
// name of CC _ ID of CC
$GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'] = 'cc_filter_helper';
$GLOBALS['PCT_CUSTOMCATALOG']['folderLogic'] = 'pct_customcatalog_%s';
// name of CC table
$GLOBALS['PCT_CUSTOMCATALOG']['makeReferenceAttributeUnique'] = \false;
// set to true if you don't want to delete the referenced attribute when it's parent attribute is being deleted and if you don't want to copy all data from the default attribute to the referenced attribute. Only the alias will be copied
$GLOBALS['PCT_CUSTOMCATALOG']['configs'] = array();
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['indicateSelectorsInListview'] = \true;
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['selector_css_classes'] = array('cc_green', 'cc_blue', 'cc_red', 'cc_orange', 'cc_yellow', 'cc_lilac', 'cc_dark-grey');
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector'] = array();
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSubpalette'] = array();
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['quickMenuSession'] = 'pct_customcatalog_quickmenu';
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['wildcardLabelFormat'] = '%s: <b>%s</b>';
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['showAllLanguagesInPanel'] = \true;
// set to false to show only languages that have at least one entry
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['urlChildConfigParameter'] = 'config';
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['QLAM']['mode'] = 'copy';
// set to "create" to create new entries without a copy of the reference entry
$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['QLAM']['linkTextLogic'] = '<span class="country">%s</span> (<span class="iso">%s</span>)';
// placeholder will be replaced by the language name (Contao language array) and by the language iso key
$GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesMarkedOnCopy'] = array();
$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassCache'] = \false;
$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] = \false;
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['READER']['baseRecordIsFallback'] = \false;
// if set to true, the base record will be shown as a fallback when the language record return does not exist
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['LIST']['baseRecordIsFallback'] = \true;
// show all base records as fallback when active language filtering is turned on but there are no language records for the current page language
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['LIST']['disableDefaultSorting'] = \true;
// if false, the default sorting will remain active when a user sorting filter is active
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] = \false;
// if true, filtering will respect published entries only
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['showEmptyResults'] = \false;
// if true, values with empty results will not be excluded but show result count (0)
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['renderOptionFields'] = \false;
// set to true, if you want to render optional fields like singleSRC_fullsize etc. in the frontend (values remain available in the template)
$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['renderUnpublishedGroups'] = \false;
// if set to false, unpublished groups will be skiped in Frontend
// API Settings
$GLOBALS['PCT_CUSTOMCATALOG_API']['SETTINGS']['skipObsoleteUpdateData'] = \true;
// if set to true, obsolete update data will be skiped. default: data will become part of the insert data
$GLOBALS['PCT_CUSTOMCATALOG_API']['SETTINGS']['useLocalStorage'] = \true;
// if set to true, default data will be stored in a local file in /system/cache. false will store the data in the session
/**
 * Store active front end language
 */
if (\PCT\CustomElements\Plugins\CustomCatalog\Core\Controller::isFrontend() && \Contao\Config::get('addLanguageToUrl') && \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']) != '') {
    $GLOBALS['PCT_CUSTOMCATALOG']['activeFrontendLanguage'] = \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlLanguageParameter']);
}
/**
 * Enable debug mode
 */
if ((bool) \Contao\Config::get('customcatalog_debug') === \true) {
    $GLOBALS['PCT_CUSTOMCATALOG']['debug'] = \true;
}
/**
 * Register the plugin
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['PLUGINS']['customcatalog'] = array(
    // access
    'tables' => array('tl_pct_customelement', 'tl_pct_customelement_group', 'tl_pct_customelement_attribute'),
    // requirements
    'requires' => array('pct_customelements' => \PCT_CUSTOMCATALOG_REQ_CE),
);
/**
 * Back end modules
 */
// Register more tables to the pct_customelement module
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customcatalog';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customelement_filterset';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customelement_filter';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customcatalog_api';
$GLOBALS['BE_MOD']['content']['pct_customelements']['tables'][] = 'tl_pct_customcatalog_job';
// Register backend keys
if (\Contao\Input::get('table') == 'tl_pct_customcatalog_api') {
    $GLOBALS['BE_MOD']['content']['pct_customelements']['ready'] = array('PCT\\CustomCatalog\\API\\Backend\\BackendPage', 'run');
    $GLOBALS['BE_MOD']['content']['pct_customelements']['run'] = array('PCT\\CustomCatalog\\API\\Backend\\BackendPage', 'run');
    $GLOBALS['BE_MOD']['content']['pct_customelements']['summary'] = array('PCT\\CustomCatalog\\API\\Backend\\BackendPage', 'run');
}
// Register backend key for database update page
$GLOBALS['BE_MOD']['content']['pct_customelements']['db_update'] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\DbUpdatePage', 'run');
/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['pct_customcatalog_node'] = array('customcataloglist' => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleList', 'customcatalogreader' => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleReader', 'customcatalogfilter' => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleFilter', 'customcatalog_apistarter' => 'PCT\\CustomElements\\Plugins\\CustomCatalog\\Frontend\\ModuleApiStarter');
$GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE']['updateBaseEntries'] = array('callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'createBaseLanguageEntriesJob'), 'key' => 'updateBaseEntries');
$GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE']['purgeFileCache'] = array('callback' => array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeFileCacheJob'), 'key' => 'purgeFileCache');
/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'wrapperStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'wrapperStop';
/**
 * Permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customcatalogs';
$GLOBALS['TL_PERMISSIONS'][] = 'pct_customcatalogsp';
/**
 * Register the model classes
 */
$GLOBALS['TL_MODELS']['tl_pct_customcatalog'] = 'PCT\\CustomElements\\Models\\CustomCatalogModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_filter'] = 'PCT\\CustomElements\\Models\\FilterModel';
$GLOBALS['TL_MODELS']['tl_pct_customelement_filterset'] = 'PCT\\CustomElements\\Models\\FiltersetModel';
$GLOBALS['TL_MODELS']['tl_pct_customcatalog_api'] = 'PCT\\CustomCatalog\\Models\\ApiModel';
$GLOBALS['TL_MODELS']['tl_pct_customcatalog_job'] = 'PCT\\CustomCatalog\\Models\\JobModel';
/**
 * Register attributes
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['alias'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['alias'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/Alias', 'class' => 'PCT\\CustomElements\\Attributes\\Alias', 'icon' => 'fa fa-anchor');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metakeywords'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metakeywords'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/MetaKeywords', 'class' => 'PCT\\CustomElements\\Attributes\\MetaKeywords', 'icon' => 'fa fa-share-alt');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metadescription'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['metadescription'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/MetaDescription', 'class' => 'PCT\\CustomElements\\Attributes\\MetaDescription', 'icon' => 'fa fa-share-alt-square');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['pagetree'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['pagetree'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/Pagetree', 'class' => 'PCT\\CustomElements\\Attributes\\Pagetree', 'icon' => 'fa fa-sitemap');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['selectdb'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['selectdb'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/SelectDb', 'class' => 'PCT\\CustomElements\\Attributes\\SelectDb', 'icon' => 'fa fa-sort');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/Geolocation', 'class' => 'PCT\\CustomElements\\Attributes\\Geolocation', 'icon' => 'fa fa-globe');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['rateit'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['rateit'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/RateIt', 'class' => 'PCT\\CustomElements\\Attributes\\RateIt', 'icon' => 'fa fa-star');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['customelement'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['customelement'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/CustomElement', 'class' => 'PCT\\CustomElements\\Attributes\\CustomElement', 'icon' => 'fa fa-star');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['itemtemplate'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['itemtemplate'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/ItemTemplate', 'class' => 'PCT\\CustomElements\\Attributes\\ItemTemplate', 'icon' => 'fa fa-magic');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['translationWidget'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['translationWidget'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/TranslationWidget', 'class' => 'PCT\\CustomElements\\Attributes\\TranslationWidget', 'icon' => 'fa fa-magic');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['simpleColumn'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['simpleColumn'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/SimpleColumn', 'class' => 'PCT\\CustomElements\\Attributes\\SimpleColumn', 'icon' => 'fa fa-database');
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['protection'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['protection'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/Protection', 'class' => 'PCT\\CustomElements\\Attributes\\Protection', 'icon' => 'fa fa-lock', 'settings' => array('feUserLoggedIn' => \true));
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['country'] = array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['country'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Attributes/Country', 'class' => 'PCT\\CustomElements\\Attributes\\Country', 'icon' => 'fa fa-flag');
/**
 * Register filters
 */
\Contao\ArrayUtil::arrayInsert($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'], 0, array('simpleIdList' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['simpleIdList'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/SimpleIdList', 'class' => 'PCT\\CustomElements\\Filters\\SimpleIdList', 'icon' => 'fa fa-list-ol'), 'languageSwitch' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['languageSwitch'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/LanguageSwitch', 'class' => 'PCT\\CustomElements\\Filters\\LanguageSwitch', 'icon' => 'fa fa-language'), 'select' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['select'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Select', 'class' => 'PCT\\CustomElements\\Filters\\Select', 'icon' => 'fa fa-sort'), 'checkbox' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['checkbox'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Checkbox', 'class' => 'PCT\\CustomElements\\Filters\\Checkbox', 'icon' => 'fa fa-check'), 'customsql' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['customsql'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/CustomSql', 'class' => 'PCT\\CustomElements\\Filters\\CustomSql', 'icon' => 'fa fa-database'), 'combiner' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['combiner'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Combiner', 'class' => 'PCT\\CustomElements\\Filters\\Combiner', 'icon' => 'fa fa-cube'), 'text' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['text'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Text', 'class' => 'PCT\\CustomElements\\Filters\\Text', 'icon' => 'fa fa-italic'), 'range' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['range'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Range', 'class' => 'PCT\\CustomElements\\Filters\\Range', 'icon' => 'fa fa-sliders'), 'pagetree' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['pagetree'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Pagetree', 'class' => 'PCT\\CustomElements\\Filters\\Pagetree', 'icon' => 'fa fa-sitemap'), 'selectdb' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['selectdb'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/SelectDb', 'class' => 'PCT\\CustomElements\\Filters\\SelectDb', 'icon' => 'fa fa-sort', 'settings' => array('useIdsAsFilterValue' => \true)), 'hook' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['hook'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Hook', 'class' => 'PCT\\CustomElements\\Filters\\Hook', 'icon' => 'fa fa-chain'), 'timestamp' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['timestamp'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Timestamp', 'class' => 'PCT\\CustomElements\\Filters\\Timestamp', 'icon' => 'fa fa-calendar'), 'sorting_alphabetic' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_alphabetic'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Sorting', 'class' => 'PCT\\CustomElements\\Filters\\Sorting', 'icon' => 'fa fa-sort-alpha-asc'), 'sorting_numeric' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_numeric'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Sorting', 'class' => 'PCT\\CustomElements\\Filters\\Sorting', 'icon' => 'fa fa-sort-numeric-asc'), 'sorting_by_filter' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_by_filter'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/SpecialSorting', 'class' => 'PCT\\CustomElements\\Filters\\SortingByFilter', 'icon' => 'fa fas fa-sort-amount-asc'), 'sorting_by_attribute' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['sorting_by_attribute'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/SpecialSorting', 'class' => 'PCT\\CustomElements\\Filters\\SortingByAttribute', 'icon' => 'fa fas fa-sort-amount-asc'), 'pagebreak' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['pagebreak'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Pagebreak', 'class' => 'PCT\\CustomElements\\Filters\\Pagebreak', 'icon' => 'fa fa-book'), 'geolocation' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['geolocation'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Geolocation', 'class' => 'PCT\\CustomElements\\Filters\\Geolocation', 'icon' => 'fa fa-globe'), 'relatedItems' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['relatedItems'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/RelatedItems', 'class' => 'PCT\\CustomElements\\Filters\\RelatedItems', 'icon' => 'fa fa-smile-o'), 'simpleCondition' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['simpleCondition'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/SimpleCondition', 'class' => 'PCT\\CustomElements\\Filters\\SimpleCondition', 'icon' => 'fa fa-filter'), 'wrapperStart' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['wrapperStart'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Wrapper', 'class' => 'PCT\\CustomElements\\Filters\\Wrapper', 'icon' => 'fa fa-filter'), 'wrapperStop' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['wrapperStop'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Wrapper', 'class' => 'PCT\\CustomElements\\Filters\\Wrapper', 'icon' => 'fa fa-filter'), 'protection' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['protection'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/Protection', 'class' => 'PCT\\CustomElements\\Filters\\Protection', 'icon' => 'fa fa-lock', 'settings' => array('isStrict' => \true)), 'customhtml' => array('label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['FILTERS']['customhtml'], 'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomElements/Filters/CustomHtml', 'class' => 'PCT\\CustomElements\\Filters\\CustomHtml', 'icon' => 'fa fa-terminal')));
/**
 * Register APIs
 */
// the "default" API integrates basic communication via hooks for imports and exports
$GLOBALS['PCT_CUSTOMCATALOG']['API']['standard'] = array(
    'label' => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['API']['standard'],
    'path' => \PCT_CUSTOMCATALOG_PATH . '/PCT/CustomCatalog/APIs/Standard',
    // only needed when nested config folders
    'class' => 'PCT\\CustomCatalog\\API\\Standard\\Core',
    // The default class if no callbacks for modes have been registered
    'modes' => array(
        // register the "import" mode
        'import' => array(
            // register its own callback method
            'callback' => array('PCT\\CustomCatalog\\API\\Standard\\Import', 'run'),
            // register its backend callback to render a backend page: keys: ready, run, summary. Leave empty if you do not want to provide backend executions
            'key' => array('run' => array('PCT\\CustomCatalog\\API\\Standard\\Backend\\ImportPage', 'render_run'), 'summary' => array('PCT\\CustomCatalog\\API\\Standard\\Backend\\ImportPage', 'render_summary')),
            // register its own rules
            'rules' => array('update', 'insert'),
        ),
        // register the "export" mode
        'export' => array(
            // register its own callback method
            'callback' => array('PCT\\CustomCatalog\\API\\Standard\\Export', 'run'),
            // register its backend callback to render a backend page: keys: ready, run, summary. Leave empty if you do not want to provide backend executions
            'key' => array('run' => array('PCT\\CustomCatalog\\API\\Standard\\Backend\\ExportPage', 'render_run'), 'summary' => array('PCT\\CustomCatalog\\API\\Standard\\Backend\\ExportPage', 'render_summary')),
        ),
    ),
);
/**
 * Hooks
 */
#$GLOBALS['TL_HOOKS']['sqlCompileCommands'][]					= array('PCT\CustomElements\Helper\InstallerHelper','sqlCompileCommandsCallback');
// load filters
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Loader\\FilterLoader', 'loadOnSystem');
// load APIs
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Loader\\ApiLoader', 'loadOnSystem');
if (\PCT\CustomElements\Plugins\CustomCatalog\Core\Controller::isBackend()) {
    // integrate backend modules
    $GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\SystemIntegration', 'createBackendModules');
}
// initialize the system
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\SystemIntegration', 'initSystem');
if (\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::isInstallTool() === \false) {
    $GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\SystemIntegration', 'addToDcaPicker');
    $GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'loadAssets');
    $GLOBALS['TL_HOOKS']['parseBackendTemplate'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'displayDatabaseUpdateAlertbox');
    $GLOBALS['TL_HOOKS']['parseBackendTemplate'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'displayBackendAlerts');
    $GLOBALS['TL_HOOKS']['parseBackendTemplate'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'replaceQuickmenuInserttag');
    $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'injectJavascriptInBackendPage');
    $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'injectCSSInBackendPage');
    $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'injectVersionnumberInBackendPage');
    $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'injectLanguagePanelInEditView');
    $GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\SystemIntegration', 'loadCustomCatalog');
    $GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomCatalog\\API\\Cron', 'initialize');
}
$GLOBALS['TL_HOOKS']['initializeSystem'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\SystemIntegration', 'registerEventListeners');
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\SystemIntegration', 'loadLanguageFiles');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\InsertTags', 'replaceTags');
$GLOBALS['TL_HOOKS']['replaceHashInsertTags'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\InsertTags', 'replaceHashTags');
$GLOBALS['TL_HOOKS']['executePreActions'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Quickmenu', 'toggleQuickMenuListener');
$GLOBALS['TL_HOOKS']['executePreActions'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'languagePanelAjaxHelper');
$GLOBALS['TL_HOOKS']['executePreActions'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'databaseUpdateAlertboxAjaxHelper');
$GLOBALS['TL_HOOKS']['executePreActions'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Helper\\DcaHelper', 'executePreActionsCallback');
$GLOBALS['TL_HOOKS']['isAllowedToEditComment'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'isAllowedToEditCommentCallback');
$GLOBALS['TL_HOOKS']['getUserNavigation'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'injectQuickmenuInUserNavigation');
// maintenance
$GLOBALS['TL_HOOKS']['getSearchablePages'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'getSearchablePages');
$GLOBALS['TL_HOOKS']['reviseTable'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeCustomCatalogData');
$GLOBALS['TL_HOOKS']['reviseTable'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'onReviseTableCallback');
$GLOBALS['TL_CRON']['daily'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Core\\Maintenance', 'purgeRevisedLanguageEntries');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareRendering'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Attributes\\AttributeCallbacks', 'renderAttribute');
$GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Attributes\\AttributeCallbacks', 'prepareField');
$GLOBALS['CUSTOMCATALOG_HOOKS']['getOptionFieldDefinition'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Attributes\\AttributeCallbacks', 'getOptionFieldDefinition');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['getQueryOption'][] = array('PCT\\CustomElements\\Filter', 'handleBlobValues');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['child_record_callback'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\TableCustomElementAttribute', 'listAttributesCallback');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['importChain'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\Import', 'addCustomCatalogImports');
$GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'addPaletteSwitchToEditView');
$GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'toggleAttributeLabels');
$GLOBALS['PCT_TABLETREE_HOOKS']['getCustomPanel'][] = array('PCT\\CustomElements\\Plugins\\CustomCatalog\\Backend\\BackendIntegration', 'injectLanguagePanelInTableTree');
}

namespace {
/**
 * Constants
 */
\define('PCT_ICONPICKER_VERSION', '3.0.5');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    include $rootDir . '/system/modules/pct_iconpicker/config/autoload.php';
}
/**
 * Back end form fields
 */
$GLOBALS['BE_FFL']['iconPicker'] = 'PCT\\IconPicker\\IconPickerWidget';
$GLOBALS['BE_MOD']['content']['article']['iconpicker'] = array('PCT\\IconPicker\\Backend\\PageIconPicker', 'run');
$GLOBALS['BE_MOD']['content']['form']['iconpicker'] = array('PCT\\IconPicker\\Backend\\PageIconPicker', 'run');
$GLOBALS['BE_MOD']['content']['calendar']['iconpicker'] = array('PCT\\IconPicker\\Backend\\PageIconPicker', 'run');
$GLOBALS['BE_MOD']['content']['news']['iconpicker'] = array('PCT\\IconPicker\\Backend\\PageIconPicker', 'run');
$GLOBALS['BE_MOD']['design']['themes']['iconpicker'] = array('PCT\\IconPicker\\Backend\\PageIconPicker', 'run');
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    $GLOBALS['BE_MOD']['content']['page']['iconpicker'] = array('PCT\\IconPicker\\Backend\\PageIconPicker', 'run');
} else {
    $GLOBALS['BE_MOD']['design']['page']['iconpicker'] = array('PCT\\IconPicker\\Backend\\PageIconPicker', 'run');
}
/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('PCT\\IconPicker\\ContaoCallbacks', 'getContentElementCallback');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('PCT\\IconPicker\\ContaoCallbacks', 'replaceTags');
$GLOBALS['TL_HOOKS']['parseTemplate'][] = array('PCT\\IconPicker\\ContaoCallbacks', 'parseTemplateCallback');
/**
 * Globals
 */
$GLOBALS['PCT_ICONPICKER']['cteIgnoreList'] = array('html');
// content element blacklist
$GLOBALS['PCT_ICONPICKER']['fflIgnoreList'] = array();
// form field blacklist
$GLOBALS['PCT_ICONPICKER']['pageIgnoreList'] = array('root', 'error_403', 'error_404');
// page type blacklist
$GLOBALS['PCT_ICONPICKER']['iconClasses'] = array('.icon-', '.fa-');
$GLOBALS['PCT_ICONPICKER']['fontaweseomeLocal'] = 'system/modules/pct_iconpicker/assets/vendor/font-awesome/4.7.0/css/font-awesome.min.css';
/**
 * Add an iconpicker attribute
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['iconpicker'] = array('class' => 'PCT\\IconPicker\\AttributeIconPicker');
}

namespace {
if (\version_compare(\Contao\CoreBundle\ContaoCoreBundle::getVersion(), '5.0', '>=')) {
    // restore legacy templates
    $GLOBALS['TL_CTE']['texts']['code'] = \Contao\ContentCode::class;
    $GLOBALS['TL_CTE']['texts']['headline'] = \Contao\ContentHeadline::class;
    $GLOBALS['TL_CTE']['texts']['html'] = \Contao\ContentHtml::class;
    $GLOBALS['TL_CTE']['texts']['list'] = \Contao\ContentList::class;
    $GLOBALS['TL_CTE']['texts']['text'] = \Contao\ContentText::class;
    $GLOBALS['TL_CTE']['texts']['table'] = \Contao\ContentTable::class;
    $GLOBALS['TL_CTE']['links']['hyperlink'] = \Contao\ContentHyperlink::class;
    $GLOBALS['TL_CTE']['links']['toplink'] = \Contao\ContentToplink::class;
    $GLOBALS['TL_CTE']['media']['image'] = \Contao\ContentImage::class;
    $GLOBALS['TL_CTE']['media']['gallery'] = \Contao\ContentGallery::class;
    $GLOBALS['TL_CTE']['media']['player'] = \Contao\ContentPlayer::class;
    $GLOBALS['TL_CTE']['media']['youtube'] = \Contao\ContentYouTube::class;
    $GLOBALS['TL_CTE']['media']['vimeo'] = \Contao\ContentVimeo::class;
    $GLOBALS['TL_CTE']['files']['downloads'] = \Contao\ContentDownloads::class;
    $GLOBALS['TL_CTE']['files']['download'] = \Contao\ContentDownload::class;
    $GLOBALS['TL_CTE']['includes']['teaser'] = \Contao\ContentTeaser::class;
}
function __addToTemplateLoader($folders)
{
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    foreach ($folders as $folder) {
        $files = \glob($folder . '/*.html5');
        if (empty($files) === \true) {
            continue;
        }
        foreach ($files as $file) {
            \Contao\TemplateLoader::addFile(\str_replace('.html5', '', \basename($file)), \str_replace($rootDir, '', $folder));
        }
    }
}
// autoload theme files
if (\strlen(\strpos(\Contao\Environment::get('requestUri'), '/contao/install')) < 1) {
    $rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
    // deprecated as fallback
    $root = $rootDir . '/system/modules/pct_theme_templates/deprecated';
    $folders = \glob($root . '/*', \GLOB_ONLYDIR);
    \__addToTemplateLoader($folders);
    // element library templates
    $root = $rootDir . '/system/modules/pct_theme_templates/pct_templates/element_library';
    $folders = \glob($root . '/*', \GLOB_ONLYDIR);
    \__addToTemplateLoader($folders);
    // load specific templates only when needed
    // demo-installer
    if (\Contao\Input::get('do') == 'pct_demoinstaller') {
        $root = $rootDir . '/system/modules/pct_theme_templates/pct_templates';
        $folders = \glob($root . '/*', \GLOB_ONLYDIR);
        \__addToTemplateLoader($folders);
    } else {
        if (\Contao\Input::get('do') == 'pct_customelements' && \Contao\Input::get('key') == 'import') {
            $root = $rootDir . '/system/modules/pct_theme_templates/pct_templates';
            $folders = \glob($root . '/*', \GLOB_ONLYDIR);
            \__addToTemplateLoader($folders);
        }
    }
}
}

namespace {
// Add content element
$GLOBALS['TL_CTE']['includes']['comments'] = \Contao\ContentComments::class;
// Front end modules
$GLOBALS['FE_MOD']['application']['comments'] = \Contao\ModuleComments::class;
// Back end modules
$GLOBALS['BE_MOD']['content']['comments'] = array('tables' => array('tl_comments'), 'stylesheet' => 'bundles/contaocomments/comments.min.css');
// Models
$GLOBALS['TL_MODELS']['tl_comments'] = \Contao\CommentsModel::class;
$GLOBALS['TL_MODELS']['tl_comments_notify'] = \Contao\CommentsNotifyModel::class;
}
