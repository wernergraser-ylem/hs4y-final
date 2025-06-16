<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute Files
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes\Files;

/**
 * Class file
 * TableHelper
 */
class TableHelper extends \Contao\Backend
{
	/**
	 * Toggle the backend icon
	 * @param string
	 * @param array
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($strTable, $arrRow, $strIcon)
	{
		if($arrRow['type'] != 'files')
		{
			return $strIcon;
		}
		
		if($arrRow['isDownload'])
		{
			return 'fa fa-download';
		}
		
		if($arrRow['eval_multiple'])
		{
			return 'fa fa-files-o';
		}
		
		return $strIcon;
	}
}