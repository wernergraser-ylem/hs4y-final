<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2021 Leo Feyer
 
 * @copyright	Tim Gatzky 2021, Premium Contao Themes
 * @package 	pct_frontend_quickedit
 * @link    	https://contao.org
 */

$GLOBALS['TL_DCA']['tl_pct_themedesigner']['config']['onload_callback'][] = array('PCT\FrontendQuickEdit\Backend\TableThemeDesigner', 'modifyDCA');