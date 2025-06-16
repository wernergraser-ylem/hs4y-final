<?php

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
$GLOBALS['TL_DCA']['tl_article']['config']['oncopy_callback'][] = array('PCT\AutoGrid\Backend\TableArticle', 'oncopyCallback');
$GLOBALS['TL_DCA']['tl_article']['config']['onsubmit_callback'][] = array('PCT\AutoGrid\Backend\TableArticle', 'onsubmitCallback');
$GLOBALS['TL_DCA']['tl_article']['fields']['published']['save_callback'][] = array('PCT\AutoGrid\Backend\TableArticle', 'onsaveCallback');