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
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\CustomElements\Backend\TableModule','modifyDca');

// increase the default field size
$GLOBALS['TL_DCA']['tl_module']['fields']['type']['sql'] = "varchar(128) NOT NULL default ''";
$GLOBALS['TL_DCA']['tl_module']['fields']['pct_customelement']['sql'] = 'longblob NULL';
