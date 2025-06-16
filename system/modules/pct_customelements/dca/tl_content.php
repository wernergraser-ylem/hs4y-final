<?php

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


/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PCT\CustomElements\Backend\TableContent','modifyDca');


/**
 * Fields
 */
// increase the default field size
$GLOBALS['TL_DCA']['tl_content']['fields']['type']['sql']['length'] = 128;
$GLOBALS['TL_DCA']['tl_content']['fields']['pct_customelement']['sql'] = 'longblob NULL';			


