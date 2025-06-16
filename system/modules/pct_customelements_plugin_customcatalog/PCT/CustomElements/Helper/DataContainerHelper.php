<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */
 
/**
 * Namespace
 */
namespace PCT\CustomElements\Helper;

/**
 * Class file
 * DataContainerHelper
 */
class DataContainerHelper extends \Contao\DC_Table
{
	public function __construct($strTable='', $arrModule=array(), $blnHardLoaded=false)
	{
		if(strlen($strTable) > 0 && $blnHardLoaded)
		{
			parent::__construct($strTable);
		}
		else if(strlen($strTable) > 0)
		{
			$this->strTable = $this->table = $strTable;
		}
		
		if($this->Database === null)
		{
			$this->Database = \Contao\Database::getInstance();
		}
		if($this->Session === null)
		{
			$this->Session = \Contao\Session::getInstance();
		}
	}
}