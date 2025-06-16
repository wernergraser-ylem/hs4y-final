<?php

// vendor/contao/core-bundle/contao/languages/en/tl_settings.xlf
$GLOBALS['TL_LANG']['tl_settings']['adminEmail']['0'] = 'E-mail address of the system administrator';
$GLOBALS['TL_LANG']['tl_settings']['adminEmail']['1'] = 'This e-mail address will be used to send and receive system messages.';
$GLOBALS['TL_LANG']['tl_settings']['dateFormat']['0'] = 'Date format';
$GLOBALS['TL_LANG']['tl_settings']['dateFormat']['1'] = 'The date format string will be parsed with the PHP date() function.';
$GLOBALS['TL_LANG']['tl_settings']['timeFormat']['0'] = 'Time format';
$GLOBALS['TL_LANG']['tl_settings']['timeFormat']['1'] = 'The time format string will be parsed with the PHP date() function.';
$GLOBALS['TL_LANG']['tl_settings']['datimFormat']['0'] = 'Date and time format';
$GLOBALS['TL_LANG']['tl_settings']['datimFormat']['1'] = 'The date and time format string will be parsed with the PHP date() function.';
$GLOBALS['TL_LANG']['tl_settings']['timeZone']['0'] = 'Time zone';
$GLOBALS['TL_LANG']['tl_settings']['timeZone']['1'] = 'Please select the server time zone.';
$GLOBALS['TL_LANG']['tl_settings']['resultsPerPage']['0'] = 'Items per page';
$GLOBALS['TL_LANG']['tl_settings']['resultsPerPage']['1'] = 'Here you can define the number of items per page in the back end.';
$GLOBALS['TL_LANG']['tl_settings']['maxResultsPerPage']['0'] = 'Maximum items per page';
$GLOBALS['TL_LANG']['tl_settings']['maxResultsPerPage']['1'] = 'This overall limit takes effect if a user chooses the "show all records" option.';
$GLOBALS['TL_LANG']['tl_settings']['allowedTags']['0'] = 'Allowed HTML tags';
$GLOBALS['TL_LANG']['tl_settings']['allowedTags']['1'] = 'Here you can enter a list of allowed HTML tags that will not be stripped.';
$GLOBALS['TL_LANG']['tl_settings']['allowedAttributes']['0'] = 'Allowed HTML attributes';
$GLOBALS['TL_LANG']['tl_settings']['allowedAttributes']['1'] = 'List of allowed HTML attributes that will not be stripped. The tag or attribute name <code>*</code> stands for all tags or attributes. Wildcards can be used for attributes with dashes like <code>data-*</code>.';
$GLOBALS['TL_LANG']['tl_settings']['allowedAttributesWarning'] = 'Allowing <code>*</code> attributes can be exploited for XSS attacks. Only do this if all backend users are trusted!';
$GLOBALS['TL_LANG']['tl_settings']['allowedDownload']['0'] = 'Download file types';
$GLOBALS['TL_LANG']['tl_settings']['allowedDownload']['1'] = 'Here you can enter a comma separated list of downloadable file types.';
$GLOBALS['TL_LANG']['tl_settings']['uploadTypes']['0'] = 'Upload file types';
$GLOBALS['TL_LANG']['tl_settings']['uploadTypes']['1'] = 'Here you can enter a comma separated list of uploadable file types.';
$GLOBALS['TL_LANG']['tl_settings']['maxFileSize']['0'] = 'Maximum upload file size';
$GLOBALS['TL_LANG']['tl_settings']['maxFileSize']['1'] = 'Here you can enter the maximum upload file size in bytes (1 MB = 1000 kB = 1000000 byte).';
$GLOBALS['TL_LANG']['tl_settings']['imageWidth']['0'] = 'Maximum image width';
$GLOBALS['TL_LANG']['tl_settings']['imageWidth']['1'] = 'Here you can enter the maximum width for image uploads in pixels.';
$GLOBALS['TL_LANG']['tl_settings']['imageHeight']['0'] = 'Maximum image height';
$GLOBALS['TL_LANG']['tl_settings']['imageHeight']['1'] = 'Here you can enter the maximum height for image uploads in pixels.';
$GLOBALS['TL_LANG']['tl_settings']['undoPeriod']['0'] = 'Storage time for undo steps';
$GLOBALS['TL_LANG']['tl_settings']['undoPeriod']['1'] = 'Here you can enter the storage time for undo steps in seconds (24 hours = 86400 seconds).';
$GLOBALS['TL_LANG']['tl_settings']['versionPeriod']['0'] = 'Storage time for versions';
$GLOBALS['TL_LANG']['tl_settings']['versionPeriod']['1'] = 'Here you can enter the storage time for different versions of a record in seconds (90 days = 7776000 seconds).';
$GLOBALS['TL_LANG']['tl_settings']['logPeriod']['0'] = 'Storage time for log entries';
$GLOBALS['TL_LANG']['tl_settings']['logPeriod']['1'] = 'Here you can enter the storage time for log entries in seconds (14 days = 1209600 seconds).';
$GLOBALS['TL_LANG']['tl_settings']['defaultUser']['0'] = 'Default page owner';
$GLOBALS['TL_LANG']['tl_settings']['defaultUser']['1'] = 'Here you can select a user as the default owner of a page.';
$GLOBALS['TL_LANG']['tl_settings']['defaultGroup']['0'] = 'Default page group';
$GLOBALS['TL_LANG']['tl_settings']['defaultGroup']['1'] = 'Here you can select a user group as the default owner of a page.';
$GLOBALS['TL_LANG']['tl_settings']['defaultChmod']['0'] = 'Default access rights';
$GLOBALS['TL_LANG']['tl_settings']['defaultChmod']['1'] = 'Please assign the default access rights for pages and articles.';
$GLOBALS['TL_LANG']['tl_settings']['date_legend'] = 'Date and time';
$GLOBALS['TL_LANG']['tl_settings']['global_legend'] = 'Global configuration';
$GLOBALS['TL_LANG']['tl_settings']['backend_legend'] = 'Back end configuration';
$GLOBALS['TL_LANG']['tl_settings']['security_legend'] = 'Security settings';
$GLOBALS['TL_LANG']['tl_settings']['files_legend'] = 'Files and images';
$GLOBALS['TL_LANG']['tl_settings']['uploads_legend'] = 'Upload settings';
$GLOBALS['TL_LANG']['tl_settings']['timeout_legend'] = 'Timeout values';
$GLOBALS['TL_LANG']['tl_settings']['chmod_legend'] = 'Default access rights';
$GLOBALS['TL_LANG']['tl_settings']['configuredInApp'] = 'This setting has been defined in the app configuration and cannot be changed here anymore.';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2016
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_settings']['pct_themer_export'] = array('Theme-Export erlauben', 'Erlaubt den Export einer Wurzelseite inkl. aller relevanter Daten und erstellt ein pct_themer_import Template (admins only)');
$GLOBALS['TL_LANG']['tl_settings']['pct_themer_published'] = array('Nur veröffentlichte Seiten', 'Nur veröffentlichte Seiten werden berücksichtigt.');
$GLOBALS['TL_LANG']['tl_settings']['pct_themedesigner_off'] = array('ThemeDesigner deactivate', 'Choose here to disable the whole ThemeDesigner module');
$GLOBALS['TL_LANG']['tl_settings']['pct_themedesigner_hidden'] = array('ThemeDesigner hidden', 'Hide the ThemeDesigner');
$GLOBALS['TL_LANG']['tl_settings']['pct_themedesigner_nofonts'] = array('Do not load fonts', 'Choose here to disable the autoloading of fonts.');
/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_settings']['pct_themer'] = 'Premium Contao Themes - Settings';
$GLOBALS['TL_LANG']['tl_settings']['pct_themerdesigner_legend'] = 'Premium Contao Themes - ThemeDesigner - Settings';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2022
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_settings']['pct_license_log'] = array('Log license requests', 'License requests will be logged in the system log.');
$GLOBALS['TL_LANG']['tl_settings']['pct_license_suffixes'] = array('Custom domain suffix resolution', 'Please provide duplicate domain suffixes so the domain name/stem can be validated. (Only required if the domain has multiple endings, e.g. mydomain.com.eu)');
$GLOBALS['TL_LANG']['tl_settings']['contentelementset_export'] = array('Export content elements as sets', 'Adds the export as content element set button to the multiple edit function for content elements (admins only)');
/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_settings']['pct_theme_settings_legend'] = 'Theme - settings';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2015
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_list_baseRecordIsFallback'] = array('Base-language record is fallback in lists', 'Choose here if the base records should be the fallback in CustomCatalog lists.');
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_reader_baseRecordIsFallback'] = array('Base-language record is fallback in readers', 'Choose here if the base record should be the fallback in CustomCatalog readers.');
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_strictMode'] = array('Strict filter mode', 'Filters without results will create an "immpossible" sql query to force an empty result. (List mode settings will be respected)');
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_api_stopOnCriticalErrors'] = array('Show critial errors after finshing', 'Shows critical errors that occure during the api process after completing the whole process.');
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_showEmptyResults'] = array('Show empty results', 'Filter values without results will not be excluded but show a count of zero (0)');
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_debug'] = array('Debug mode', 'Activates the debug mode, that will log several information like database queries etc.');
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_bypassDCACache'] = array('Disable DCA cache', 'Disables the DCA caching function');
/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_settings']['customcatalog_legend'] = 'CustomCatalog-Settings';

// system/modules/pct_iconpicker/languages/en/tl_settings.xlf
$GLOBALS['TL_LANG']['tl_settings']['iconStylesheets']['0'] = 'Choose more font icon collection stylesheets';
$GLOBALS['TL_LANG']['tl_settings']['iconStylesheets']['1'] = 'Choose more font icon stylesheets';
$GLOBALS['TL_LANG']['tl_settings']['customIconClasses']['0'] = 'Custom icon CSS classes';
$GLOBALS['TL_LANG']['tl_settings']['customIconClasses']['1'] = 'Enter your own icon classes like (.myIcons-,.myIcons2-)';
$GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource']['0'] = 'Fontawesome';
$GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource']['1'] = 'Load fontaweseome from the selected source.';
$GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource']['local'] = 'Local: (cto_layout/css/fontaweseome) or from CustomElements';
$GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource']['cdn'] = 'CDN';
$GLOBALS['TL_LANG']['tl_settings']['fontaweseomeSource']['off'] = 'Off, do not load';
$GLOBALS['TL_LANG']['tl_settings']['iconpicker_legend'] = 'IconPicker settings';
