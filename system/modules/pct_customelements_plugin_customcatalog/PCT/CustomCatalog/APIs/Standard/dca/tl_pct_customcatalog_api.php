<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @api			Standard API class
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customcatalog_api
 */
$GLOBALS['TL_DCA']['tl_pct_customcatalog_api']['palettes']['type_standard_mode_import']	= '{title_legend},type,mode,be_description;{settings_legend},title,description;{data_legend},source;{update_legend},uniqueTarget,uniqueSource,allowUpdate,allowDelete,allowInsert,purgeTable;{cronjob_legend:hide},cronjob;{backup_legend:hide},backup;{resources_legend:hide},maxRange;{expert_legend},published';
$GLOBALS['TL_DCA']['tl_pct_customcatalog_api']['palettes']['type_standard_mode_export']	= '{title_legend},type,mode,be_description;{settings_legend},title,description;{data_legend},target;{cronjob_legend:hide},cronjob;{resources_legend:hide},maxRange,isPublished;{expert_legend},published';

