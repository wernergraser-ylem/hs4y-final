<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Backend;

/**
 * Class file
 * TableUserGroups
 * Provide methods for table tl_user_groups
 */
class TableUserGroup extends \Contao\Backend
{	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import(\Contao\BackendUser::class, 'User');	
	}

	
	/**
	 * Get all groups of the custom elements selected an return as array
	 * @param object
	 * @return array
	 */
	public function getCustomElementGroups($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		if(!$objDC->activeRecord->pct_customelements)
		{
			return array();
		}
		
		$arrPids = \Contao\StringUtil::deserialize($objDC->activeRecord->pct_customelements);
	
		if(!is_array($arrPids))
		{
			$arrPids = explode(',', $arrPids);
		}
	
		if(empty($arrPids))
		{
			return array();
		}
		
		$objResult = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid IN(".implode(',',$arrPids).") ORDER BY sorting,pid")->execute();
		
		if($objResult->numRows < 1)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objResult->next())
		{
			$objParent = $objDatabase->prepare("SELECT id,title FROM tl_pct_customelement WHERE id=?")->limit(1)->execute($objResult->pid);
			
			$strLabel = $objParent->title . ' >> ' . $objResult->title . ' (id:' .$objResult->id.')';
			$arrReturn[$objResult->id] = $strLabel;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Get all available attributes on global scope
	 * @param object
	 * @return array
	 */
	public function getCustomElementAttributes($objDC)
	{
		$objCE = new \PCT\CustomElements\Core\CustomElements;
		$arrAttributs = $objCE->getAttributes();
		
		if(empty($arrAttributs))
		{
			return array();
		}
		
		$names = $objCE->getAttributeNames();
		
		$arrReturn = array();
		foreach($arrAttributs as $attribute => $definition)
		{
			$arrReturn[$attribute] = $names[$attribute];
		}
		
		return $arrReturn;
	}
	
}
