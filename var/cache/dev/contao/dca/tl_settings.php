<?php

namespace {
$GLOBALS['TL_DCA']['tl_settings'] = array(
    // Config
    'config' => array('dataContainer' => \Contao\DC_File::class, 'closed' => \true),
    // Palettes
    'palettes' => array('default' => '{global_legend},adminEmail;{date_legend},dateFormat,timeFormat,datimFormat,timeZone;{backend_legend:hide},resultsPerPage,maxResultsPerPage;{security_legend:hide},allowedTags,allowedAttributes;{files_legend:hide},allowedDownload;{uploads_legend:hide},uploadTypes,maxFileSize,imageWidth,imageHeight;{timeout_legend:hide},undoPeriod,versionPeriod,logPeriod;{chmod_legend},defaultUser,defaultGroup,defaultChmod'),
    // Fields
    'fields' => array('dateFormat' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'helpwizard' => \true, 'decodeEntities' => \true, 'tl_class' => 'w25'), 'explanation' => 'dateFormat'), 'timeFormat' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'decodeEntities' => \true, 'tl_class' => 'w25')), 'datimFormat' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'decodeEntities' => \true, 'tl_class' => 'w25')), 'timeZone' => array('inputType' => 'select', 'options_callback' => static function () {
        return \array_values(\DateTimeZone::listIdentifiers());
    }, 'eval' => array('chosen' => \true, 'tl_class' => 'w25')), 'adminEmail' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'friendly', 'decodeEntities' => \true, 'tl_class' => 'w50')), 'resultsPerPage' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'minval' => 1, 'nospace' => \true, 'tl_class' => 'w50 clr')), 'maxResultsPerPage' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w50')), 'allowedTags' => array('inputType' => 'text', 'eval' => array('useRawRequestData' => \true, 'tl_class' => 'long')), 'allowedAttributes' => array('label' => &$GLOBALS['TL_LANG']['tl_settings']['allowedAttributes'], 'inputType' => 'keyValueWizard', 'eval' => array('tl_class' => 'clr'), 'load_callback' => array(static function ($varValue) {
        $showWarning = \false;
        foreach (\Contao\StringUtil::deserialize($varValue, \true) as $row) {
            if (\in_array('*', \Contao\StringUtil::trimsplit(',', $row['value']), \true)) {
                $showWarning = \true;
                break;
            }
        }
        if ($showWarning) {
            $GLOBALS['TL_DCA']['tl_settings']['fields']['allowedAttributes']['label'][1] = '<span class="tl_red">' . $GLOBALS['TL_LANG']['tl_settings']['allowedAttributesWarning'] . '</span>';
        }
        return $varValue;
    }), 'save_callback' => array(static function ($strValue) {
        $arrValue = \Contao\StringUtil::deserialize($strValue, \true);
        $arrAllowedAttributes = array();
        foreach ($arrValue as $arrRow) {
            foreach (\Contao\StringUtil::trimsplit(',', \strtolower($arrRow['key'])) as $strKey) {
                $arrAllowedAttributes[$strKey] = \array_merge($arrAllowedAttributes[$strKey] ?? array(), \Contao\StringUtil::trimsplit(',', \strtolower($arrRow['value'])));
                $arrAllowedAttributes[$strKey] = \array_filter(\array_unique($arrAllowedAttributes[$strKey]));
                \sort($arrAllowedAttributes[$strKey]);
            }
        }
        \ksort($arrAllowedAttributes);
        $arrValue = array();
        foreach ($arrAllowedAttributes as $strTag => $arrAttributes) {
            $arrValue[] = array('key' => $strTag, 'value' => \implode(',', $arrAttributes));
        }
        return \serialize($arrValue);
    })), 'allowedDownload' => array('inputType' => 'text', 'eval' => array('tl_class' => 'w50')), 'uploadTypes' => array('inputType' => 'text', 'eval' => array('tl_class' => 'w50')), 'maxFileSize' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w50')), 'imageWidth' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w50')), 'imageHeight' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w50')), 'undoPeriod' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w33')), 'versionPeriod' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w33')), 'logPeriod' => array('inputType' => 'text', 'eval' => array('mandatory' => \true, 'rgxp' => 'natural', 'nospace' => \true, 'tl_class' => 'w33')), 'defaultUser' => array('inputType' => 'select', 'foreignKey' => 'tl_user.username', 'eval' => array('chosen' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50')), 'defaultGroup' => array('inputType' => 'select', 'foreignKey' => 'tl_user_group.name', 'eval' => array('chosen' => \true, 'includeBlankOption' => \true, 'tl_class' => 'w50')), 'defaultChmod' => array('inputType' => 'chmod', 'eval' => array('tl_class' => 'clr'))),
);
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
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{pct_seo_legend:hide},pct_seo_image_loading,pct_seo_protocol';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_seo_image_loading'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['pct_seo_image_loading'], 'inputType' => 'select', 'options' => array('auto', 'eager', 'lazy'), 'eval' => array('includeBlankOption' => \true), 'sql' => "varchar(8) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_seo_protocol'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['pct_seo_protocol'], 'inputType' => 'select', 'options' => array('auto', 'http1', 'http2'), 'eval' => array('includeBlankOption' => \true), 'sql' => "varchar(8) NOT NULL default ''");
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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{pct_themerdesigner_legend:hide},pct_themedesigner_hidden;';
/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['__selector__'][] = 'pct_themedesigner_hidden';
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_settings']['subpalettes']['pct_themedesigner_hidden'] = 'pct_themedesigner_off';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_themedesigner_off'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['pct_themedesigner_off'], 'inputType' => 'checkbox', 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_themedesigner_hidden'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['pct_themedesigner_hidden'], 'inputType' => 'checkbox', 'eval' => array('submitOnChange' => \true), 'sql' => "char(1) NOT NULL default ''");
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */
/**
 * Load language files
 */
\Contao\System::loadLanguageFile('dca_autogrid');
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{autogrid_legend:hide},pct_autogrid_disable_be_preview';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_autogrid_disable_be_preview'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['pct_autogrid_disable_be_preview'], 'inputType' => 'checkbox', 'sql' => "char(1) NOT NULL default ''");
}

namespace {
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2022, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 */
/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{pct_theme_settings_legend:hide},pct_license_log,pct_license_suffixes,contentelementset_export;';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_license_log'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['pct_license_log'], 'inputType' => 'checkbox', 'eval' => array(), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['pct_license_suffixes'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['pct_license_suffixes'], 'inputType' => 'text', 'eval' => array('tl_class' => 'long', 'placeholder' => '.com.eu,.de.eu'), 'sql' => "smalltext NULL");
$GLOBALS['TL_DCA']['tl_settings']['fields']['contentelementset_export'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['contentelementset_export'], 'inputType' => 'checkbox', 'sql' => "char(1) NOT NULL default ''");
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
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_settings');
/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_list_baseRecordIsFallback';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_reader_baseRecordIsFallback';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_strictMode';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_showEmptyResults';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_debug';
$arrPalettes['customcatalog_legend:hide'][] = 'customcatalog_bypassDCACache';
$arrPalettes['customcatalog_api_legend:hide'][] = 'customcatalog_api_stopOnCriticalErrors';
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = $objDcaHelper->generatePalettes($arrPalettes);
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_list_baseRecordIsFallback'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_list_baseRecordIsFallback'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_reader_baseRecordIsFallback'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_reader_baseRecordIsFallback'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_api_stopOnCriticalErrors'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_api_stopOnCriticalErrors'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_strictMode'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_strictMode'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'clr w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_showEmptyResults'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_showEmptyResults'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_debug'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_debug'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
$GLOBALS['TL_DCA']['tl_settings']['fields']['customcatalog_bypassDCACache'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customcatalog_bypassDCACache'], 'inputType' => 'checkbox', 'eval' => array('tl_class' => 'w50'), 'sql' => "char(1) NOT NULL default ''");
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
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{iconpicker_legend:hide},iconStylesheets,customIconClasses,fontaweseomeSource;';
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['iconStylesheets'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['iconStylesheets'], 'inputType' => 'fileTree', 'eval' => array('tl_class' => 'clr w50', 'filesOnly' => \true, 'multiple' => \true, 'fieldType' => 'checkbox'));
$GLOBALS['TL_DCA']['tl_settings']['fields']['customIconClasses'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['customIconClasses'], 'inputType' => 'text', 'eval' => array('tl_class' => 'clr long'), 'sql' => "blob NULL");
$GLOBALS['TL_DCA']['tl_settings']['fields']['fontaweseomeSource'] = array('label' => &$GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource'], 'inputType' => 'select', 'default' => 'local', 'options' => array('local', 'cdn'), 'reference' => $GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource'], 'eval' => array('tl_class' => '', 'includeBlankOption' => \true), 'sql' => "varchar(16) NOT NULL default ''");
}
