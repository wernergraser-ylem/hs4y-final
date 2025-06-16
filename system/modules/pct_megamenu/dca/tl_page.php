<?php

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
$GLOBALS['TL_DCA']['tl_page']['list']['operations']['articles']['button_callback'] = array('PCT\MegaMenu\TablePage', 'editArticlesHelper');


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['pct_megamenu'] = '{title_legend},title,alias,type;{meta_legend},robots,sitemap;{protected_legend:hide},protected;{expert_legend:hide},cssClass,guests;{tabnav_legend:hide},tabindex,accesskey;{publish_legend},published,start,stop';