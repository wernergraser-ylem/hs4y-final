<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @attribute	RateIt
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes\RateIt;

/**
 * Class file
 * TableCustomElementAttribute
 */
class TableCustomElementAttribute extends \Contao\Backend
{
	/**
	 * Update the .options field with a "value" option to simulate a generic option for this attribute
	 * @param object
	 */
	public function updateOptionField($objDC)
	{
		\Contao\Database::getInstance()->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('options'=>array('value','counter')))->execute($objDC->id);
	}
}