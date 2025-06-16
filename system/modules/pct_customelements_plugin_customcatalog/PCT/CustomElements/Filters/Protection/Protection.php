<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		Checkbox filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;

/**
 * Class file
 * Protection
 */
class Protection extends \PCT\CustomElements\Filter
{
	/**
	 * The attribute
	 * @param object
	 */
	protected $objAttribute = null;
	
	
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// fetch the attribute the filter works on
		$this->objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($this->get('attr_id'));
	
		// point the filter to the attribute or use the urlparameter
		$strName = $this->get('urlparam') ? $this->get('urlparam') : $this->objAttribute->alias;
		
		// set the filter name
		$this->setName($strName);
		
		// point the filter to the attribute
		$this->setFilterTarget($this->objAttribute->alias);
		
		// make filter multiple
		if($this->objAttribute->options == 'member_group')
		{
			$this->set('multiple',true);
		}
		
		// show empty results
		$this->set('showEmptyResults',false);
		if(isset($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['showEmptyResults']))
		{
			$this->set('showEmptyResults',(boolean)$GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['showEmptyResults']);
		}
		
		if($this->get('fuzzy'))
		{
			$this->strictMode(false);
		}
		
		// check if the filter should be resetted, if so reset the filter
		if($this->reset($strName))
		{
			$this->reset();
		}
	}
	
		
	/**
	 * Exclude entries by members or member_grous
	 * @param array		SQL options array
	 * @param object	CustomCatalog object
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */
	public function getQueryOptionCallback()
	{
		$mode = StringUtil::deserialize($this->objAttribute->options);
		
		// skip user or user_group in the front end
		if(in_array($mode, array('user','user_group')))
		{
			return array();
		}

		// @var object Member
		$objUser = \Contao\FrontendUser::getInstance();
		
		// member logged in is not a must
		if( $objUser === null || $objUser->id === null || isset($objUser->id) === false )
		{
			if(!$this->getCustomCatalog()->getModule()->customcatalog_filter_showAll)
			{
				$arrOptions = array
				(
					'column'	=> 'id',
					'operation'	=> 'IN',
					'value'		=> array(-500)	
				);
				return $arrOptions;
			}
			
			return array();
		}
		
		// simulate a Select filter
		$objSelectFilter = new \PCT\CustomElements\Filters\Select($this->getData());
		$objSelectFilter->setOrigin($this->getOrigin());
		$objSelectFilter->setTable($this->getTable());
	
		// user field (integer)
		if($mode == 'member')
		{
			$varValue = $this->getValue();
			
			if(is_array($varValue))
			{
				$varValue = implode('',array_filter($varValue));
			}
			
			// filter automatically by member id
			if(empty($varValue))
			{
				$varValue = $objUser->id;
			}
		}
		else if($mode == 'member_group')
		{
			$objSelectFilter->set('multiple',true);
			
			$varValue = $this->getValue();
				
			// filter automatically by member group
			if(empty($varValue))
			{
				$varValue = StringUtil::deserialize($objUser->groups) ?: array();
			}
		}
		
		// apply values
		$objSelectFilter->setValue($varValue);
		
		return $objSelectFilter->getQueryOptionCallback();	
	}
	
	
	/**
	 * Render the filter and return string
	 * @param string	Name of the attribute
	 * @param mixed		Active filter values
	 * @param object	Template object
	 * @param object	The current filter object
	 * @return string
	 */
	public function renderCallback($strName,$varValue,$objTemplate,$objFilter)
	{
		// skip rendering when fe user is not logged in and filter setting requieres is
		if( \defined('FE_USER_LOGGED_IN') === false && $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['protection']['settings']['feUserLoggedIn'])
		{
			return sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['filterRequiresFeLogin'], 'widget filter protection error no_login '.$objFilter->getName(), $objFilter->getName());
		}
		
		// simulate a Select filter
		$objSelectFilter = new \PCT\CustomElements\Filters\Select($objFilter->getData());
		$objSelectFilter->setOrigin($objFilter->getOrigin());
		$objSelectFilter->setTable($objFilter->getTable());
		
		// fetch the values
		$arrValues = $this->fetchValues($this->getTable(),$this->getFilterTarget());
		
		// labels
		$objLabelSource = null;
		if($objFilter->objAttribute->options == 'member' && !empty($arrValues))
		{
			$strLabelSource = $objFilter->get('labelSource') ?: 'username';
			$objLabelSource = \Contao\MemberModel::findMultipleByIds($arrValues);
		}
		else if($objFilter->objAttribute->options == 'member_group' && !empty($arrValues))
		{
			$strLabelSource = $objFilter->get('labelSource') ?: 'name';
			$objLabelSource = \Contao\MemberGroupModel::findMultipleByIds($arrValues);
		}
		
		if($objLabelSource !== null)
		{
			while($objLabelSource->next())
			{
				$objSelectFilter->addTranslation($objLabelSource->id,$objLabelSource->{$strLabelSource},$GLOBALS['TL_LANGUAGE']);
			}
		}
		
		return $objSelectFilter->renderCallback($strName,$varValue,$objTemplate,$objFilter);
	}
}