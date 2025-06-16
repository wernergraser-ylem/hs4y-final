<?php

// vendor/contao/core-bundle/contao/languages/en/tl_maintenance.xlf
$GLOBALS['TL_LANG']['tl_maintenance']['cacheTables']['0'] = 'Purge data';
$GLOBALS['TL_LANG']['tl_maintenance']['cacheTables']['1'] = 'Please select the data you want to purge or rebuild.';
$GLOBALS['TL_LANG']['tl_maintenance']['job'] = 'Job';
$GLOBALS['TL_LANG']['tl_maintenance']['description'] = 'Description';
$GLOBALS['TL_LANG']['tl_maintenance']['clearCache'] = 'Purge data';
$GLOBALS['TL_LANG']['tl_maintenance']['cacheCleared'] = 'The data has been purged';
$GLOBALS['TL_LANG']['tl_maintenance']['updateHelp'] = 'Please enter your %s here.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['index']['0'] = 'Purge the search index';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['index']['1'] = 'Truncates the tables <code>tl_search</code>, <code>tl_search_index</code> and <code>tl_search_term</code>. Afterwards, you have to rebuild the search index (see above).';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['undo']['0'] = 'Purge the undo table';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['undo']['1'] = 'Truncates the <code>tl_undo</code> table which stores the deleted records. This job permanently deletes these records.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['versions']['0'] = 'Purge the version table';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['versions']['1'] = 'Truncates the <code>tl_version</code> table which stores the previous versions of a record. This job permanently deletes these records.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['log']['0'] = 'Purge the system log';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['log']['1'] = 'Truncates the <code>tl_log</code> table which stores all the system log entries. This job permanently deletes these records.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['crawl_queue']['0'] = 'Purge the crawl queue';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['crawl_queue']['1'] = 'Truncates the <code>tl_crawl_queue</code> table which stores all the queue information from crawl processes.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['images']['0'] = 'Purge the image cache';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['images']['1'] = 'Removes the automatically generated images and then purges the shared cache, so there are no links to deleted resources.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['previews']['0'] = 'Purge the preview cache';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['previews']['1'] = 'Removes the automatically generated preview images and then purges the shared cache, so there are no links to deleted resources.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['scripts']['0'] = 'Purge the script cache';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['scripts']['1'] = 'Removes the automatically generated <code>.css</code> and <code>.js</code> files and then purges the shared cache, so there are no links to deleted resources.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['pages']['0'] = 'Purge the shared cache';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['pages']['1'] = 'Removes the cached versions of the front end pages.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['temp']['0'] = 'Purge the temp folder';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['temp']['1'] = 'Removes the temporary files.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['xml']['0'] = 'Recreate the XML files';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['xml']['1'] = 'Recreates the XML files in the <code>share</code> folder and then purges the shared cache, so there are no links to deleted resources.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['symlinks']['0'] = 'Recreate the symlinks';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['symlinks']['1'] = 'Recreates the symlinks in the public folder (document root).';
$GLOBALS['TL_LANG']['tl_maintenance']['crawler'] = 'Crawler';
$GLOBALS['TL_LANG']['tl_maintenance']['startCrawling'] = 'Start crawling';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscribers']['0'] = 'Enabled features';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscribers']['1'] = 'The crawler crawls all URLs it finds. Here you can decide what to do with these results.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDepth']['0'] = 'Maximum depth';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDepth']['1'] = 'The maximum depth to crawl.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlMember']['0'] = 'Front end member';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlMember']['1'] = 'Automatically log in a front end member to index protected pages.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlHint'] = 'Your website is currently crawled with %d concurrent requests. If your server can handle more than %1$d concurrent requests, ask your system administrator to increase the <code>%s</code> setting in the system configuration to speed up the crawling process. Refer to the <a href="%s" target="_blank" rel="noreferrer noopener">Contao manual</a> for more information.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlWaitToBeFinished'] = 'The crawler is currently working. Please wait for it to finish to see the results.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDebugLog'] = 'Debug log';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDebugLogExplain'] = 'If errors occurred or pages were skipped, check the debug log for more information.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDownloadLog'] = 'Download log';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscriberNames']['search-index'] = 'Update the search index';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscriberNames']['broken-link-checker'] = 'Check for broken links';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2024
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['jobs'] = 'Theme Updater Tasks';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['run_job'] = 'Start';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['jobs_done'] = 'Task(s) [%s] executed';
/**
 * Jobs
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['news_order'][0] = 'News List Sorting';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['news_order'][1] = 'Change news list sorting "date DESC" (Unknown Option) to "order_date_desc"';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['center_center_to_crop'][0] = 'Update Image Size Selections';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['center_center_to_crop'][1] = 'Change image size setting "CENTER_CENTER" (Unknown Option) to "CROP"';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['form_textfield_form_text'][0] = 'Form Field Template Selections';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['form_textfield_form_text'][1] = 'Update text form field template selections from form_textfield to form_text';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2014
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['jobs'] = 'CustomElements jobs';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['run_job'] = 'Run';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['job_done'] = 'Job [%s] completed';
/**
 * Jobs
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardupdater'][0] = 'Update wizards';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardupdater'][1] = 'Updates the CustomElements widgets/wizards to the latest structure. (From version 1.1.8 the widgets store the data in the current structure. Diese function is mainly use full for older CustomElements data.)';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardUpdateComplete'] = 'Update all CustomElement widgets/wizard.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardUpdateLoading'] = 'Updating CustomElement Widgets...';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardupdater']['empty'] = 'No widgets found.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeupdater'][0] = 'Convert attribute data';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeupdater'][1] = 'Moves the vault data for the defined attributes (see config.php) from one vault column to another one. The target column is set by the Attributes "saveDataAs" variable by default. Use with care. When moving data from one MySQL column to another one data might get lost or unusable due to mysql column definition.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeUpdateComplete'] = 'Update attribute-Data';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeUpdateLoading'] = 'Updating attribute data...';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeupdater']['empty'] = 'No attribute data found.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault'][0] = 'Delete all attribute related data from the vault';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault'][1] = 'Deletes all attribute related entries from the tl_pct_customelement_vault table except the widget data. This process can not be undone.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault_effected'] = 'Entries effected: %s';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault_runLabel'] = 'Proceed';

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
 * Jobs
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['updateBaseEntries'][0] = 'Update language base entries';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['updateBaseEntries'][1] = 'Update all base entries in multilingual CCs. If no reference exists it will be created.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['purgeFileCache'][0] = 'Clear JSON-DCA-Cache';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['purgeFileCache'][1] = 'Clears the DCA-cache in var/cache/.../cc_dca';
