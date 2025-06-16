<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2021 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\AutoGrid\Backend;


/**
 * Class file
 * TableModule
 */
class TableArticle extends \Contao\Backend
{
	/**
	 * Update AutoGrid references after submit
	 * @param object
	 * 
	 * called from oncopy_callback
	 */
	public function oncopyCallback($intId, $objDC)
	{
		$objTableContent = new TableContent;
		$dc = clone($objDC);
		$dc->table = 'tl_content';
		$dc->pid = $intId;
		$dc->id = $intId;
		$dc->ptable = $objDC->table;
		$objTableContent->selfCheckReferences($dc);
	}

	public function onsubmitCallback($objDC)
	{
		$this->oncopyCallback($objDC->id,$objDC);
	}

	public function onsaveCallback($varValue, $objDC)
	{
		$this->oncopyCallback($objDC->id, $objDC);
		return $varValue;
	}
}