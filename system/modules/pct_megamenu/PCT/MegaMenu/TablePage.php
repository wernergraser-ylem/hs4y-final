<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_megamenu
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\MegaMenu;

use Contao\PageModel;

/**
 * Class file
 * TablePage
 */
class TablePage extends \Contao\Backend
{
	/**
	 * Return the page icon
	 * @param object
	 * @param string
	 * @return string
	 */
	public function getPageIcon($objPage, $strImage)
	{
		if( $objPage->type != 'pct_megamenu' )
		{
			return $strImage;
		}

		$strImage = 'page_megamenu_1.svg';
		if( !$objPage->published )
		{
			$strImage = 'page_megamenu_0.svg';
		}
		return 'system/modules/pct_megamenu/assets/img/'.$strImage;
	}
}