<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;

/**
 * Class File
 * CustomElementFactory
 */
class CustomElement extends \PCT\CustomElements\Core\CustomElement
{
	/**
	 * Prepare the custom element for the global use in a Data Container and in the System
	 * Generates a CustomElement with all groups and attributes
	 * @param boolean
	 * @return object CustomElement
	 */
	public function prepareForDca($blnPublished=false)
	{
		if(!$this->arrData)
		{
			return null;
		}

		$arrCache = Cache::getData();

		$objAttributes = Cache::getDatabaseResult('AttributeFactory::fetchAllByCustomElement',$this->get('id'));
		$objGroups = Cache::getDatabaseResult('GroupFactory::fetchAllByCustomElement',$this->get('id'));

		// build from cache
		if($objAttributes !== null && $objGroups !== null)
		{
			while($objAttributes->next())
			{
				$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($objAttributes->id);
				if($objAttribute === null)
				{
					continue;
				}
				$arrAttributes[ $objAttributes->pid ][ $objAttributes->sorting ] = $objAttribute;
			}

			if(empty($arrAttributes))
			{
				return $this;
			}

			$arrGroups = array();
			while($objGroups->next())
			{
				$objGroup = \PCT\CustomElements\Core\GroupFactory::findById($objGroups->id);
				if($objGroup === null || !is_array($arrAttributes[$objGroup->id]))
				{
					continue;
				}
				
				// order by sorting
				ksort($arrAttributes[$objGroup->id]);
				
				// attach attributes to group object
				$objGroup->setAttributes( $arrAttributes[$objGroup->id] );
				
				$arrGroups[] = $objGroup;
			}

			// attach groups to the custom element object
			$this->set('arrGroups',$arrGroups);

			return $this;
		}

		$objDatabase = \Contao\Database::getInstance();
		$objGroups = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid=? ORDER BY sorting")->execute($this->get('id'));
		if($objGroups->numRows < 1)
		{
			return $this;
		}

		$arrGroups = array();
		while($objGroups->next())
		{
			$objGroup = \PCT\CustomElements\Core\GroupFactory::findById($objGroups->id);
			if($objGroup === null)
			{
				continue;
			}

			// find all attributes for the database update
			if(\Contao\Input::get('update') == 'database' || !$blnPublished)
			{
				$objGroup->set('arrAttributes', \PCT\CustomElements\Core\AttributeFactory::findByParentId($objGroup->get('id')));
			}
			// find only published attributes
			else
			{
				$objGroup->set('arrAttributes', \PCT\CustomElements\Core\AttributeFactory::findPublishedByParentId($objGroup->get('id')));
			}

			$arrGroups[] = $objGroup;
		}
		$this->set('arrGroups',$arrGroups);
		return $this;
	}
}