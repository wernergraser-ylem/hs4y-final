<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeFiles
 * @link		http://contao.org
 */

/**
 * Hooks
 */
$GLOBALS['CUSTOMELEMENTS_HOOKS']['toggleIcon'][] = array('PCT\CustomElements\Attributes\Files\TableHelper','toggleIcon');
$GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue'][] 	= array('PCT\CustomElements\Attributes\Files','processWildcardValue');
