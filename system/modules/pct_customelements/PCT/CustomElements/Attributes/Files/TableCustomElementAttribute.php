<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2020, Premium Contao Webworks, Premium Contao Themes
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
 * TableCustomElementAttribute
 */
class TableCustomElementAttribute extends \Contao\Backend
{
	/**
	 * Modify palette
	 * @param object
	 */
	public function modifyPalette($objDC)
	{
		$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
		if($objDC->activeRecord === null && class_exists($strModel))
		{
			$objDC->activeRecord = $strModel::findByPk($objDC->id);
		}
		else if($objDC->activeRecord === null && !class_exists($strModel))
		{
			$objDC->activeRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if( $objDC->activeRecord === null || $objDC->activeRecord->type != 'files' )
		{
			return;
		}

		$GLOBALS['TL_DCA'][$objDC->table]['fields']['eval_multiple']['eval']['submitOnChange'] = true;

		if( !$objDC->activeRecord->eval_multiple )
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['sortBy']);
		}

		if( $objDC->activeRecord->eval_multiple )
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['options']);
		}


		
	}
}