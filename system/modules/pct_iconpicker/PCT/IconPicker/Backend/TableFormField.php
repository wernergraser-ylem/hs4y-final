<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\IconPicker\Backend;

use PCT\IconPicker\IconPicker;

/**
 * Class file
 * TableFormField
 */
class TableFormField extends \Contao\Backend
{
	/**
	 * Overwrite the backend output of a form field row and inject font icon class
	 * @param array
	 * @return string
	 */
	public function listFormFields($arrRow)
	{
		// add the stylesheets to the page
		$objPicker = new IconPicker();
		$objPicker->addStyleSheetsToPage();

		$objHelper = new \tl_form_field();
		
		$arrClass = explode(' ', $arrRow['class']);
		
		if(!in_array($arrRow['fontIcon'], $arrClass))
		{
			$arrClass[] = $arrRow['fontIcon'];
		}
		
		$arrRow['class'] = trim(implode(' ', $arrClass));
		
		return $objHelper->listFormFields($arrRow);
	}
}