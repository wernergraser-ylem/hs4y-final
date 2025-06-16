<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

 
/**
 * Namespace
 */
namespace PCT\Themesettings\Backend;

use Contao\Backend;
use Contao\StringUtil;

/**
 * Class
 * TableUser
 */
class TableUser extends Backend
{
	public function getElementFavorites($objDC)
	{
		if( empty($objDC->activeRecord->{$objDC->field}) )
		{
			return array();
		}
		return \array_values( StringUtil::deserialize($objDC->activeRecord->{$objDC->field}) );
	}
}
