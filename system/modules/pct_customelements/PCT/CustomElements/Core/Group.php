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
namespace PCT\CustomElements\Core;

/**
 * Class file
 * Group
 */
class Group extends \PCT\CustomElements\Core\Controller
{
	/**
	 * Attributes array
	 * @var array
	 */
	protected $arrAttributes	= array();
	
	
	/**
	 * Init
	 */
	public function __construct(array $arrData=array())
	{
		$this->setData($arrData);
	}
	
		
	/**
	 * Return the customelements object
	 * @return object
	 */
	public function getCustomElement()
	{
		return CustomElementFactory::findById($this->get('pid'));
	}


	/**
	 * Generate the group and fill with attributes
	 */
	public function generate()
	{
		$this->set('arrAttributes', AttributeFactory::findPublishedByParentId( $this->get('id')) );	
	}
	
	
	/**
	 * Set the attributes by an array or by the attribute factory
	 * @param array		Array of attributes
	 */
	public function setAttributes($arrAttributes=array())
	{
		$this->set('arrAttributes', $arrAttributes);
		
		// mark as modified
		$this->markAsModified('arrAttributes');
	}
	
	
	/**
	 * Return the attributes array/objects. Generate the group if it has not been done before
	 * @return array
	 */
	public function getAttributes()
	{
		if(!$this->isModified('arrAttributes'))
		{
			$this->setAttributes(AttributeFactory::findPublishedByParentId( $this->get('id')) );	
		}
		return $this->get('arrAttributes');
	}
	
	
	/**
	 * Return a translation for the group title
	 * @param string	Alias of the CustomElement or any source
	 * @param boolean	Toggle between CE and CC
	 * @return string
	 */
	public function getTranslatedLabel($strKey='')
	{
		$strReturn = '';
		
		if(strlen($strKey) < 1)
		{
			$strKey = $this->getCustomElement()->get('alias');
		}
		
		$strAlias = $this->get('alias');
		
		
		if( isset($GLOBALS['TL_LANG']['CUSTOMELEMENTS']) && is_string($GLOBALS['TL_LANG']['CUSTOMELEMENTS'][$strKey]['palettes'][$strAlias]) || isset($GLOBALS['TL_LANG']['CUSTOMELEMENTS']) && is_string($GLOBALS['TL_LANG']['CUSTOMELEMENTS']['*']['palettes'][$strAlias]))
		{
			$strReturn = $GLOBALS['TL_LANG']['CUSTOMELEMENTS'][$strKey]['palettes'][$strAlias] ?: $GLOBALS['TL_LANG']['CUSTOMELEMENTS']['*']['palettes'][$strAlias];
		}
		
		return $strReturn;
	}	
	
	
	/**
	 * Check if a backend user has access to the group
	 * @param integer
	 * @return boolean
	 */
	public function hasAccess()
	{
		if( Controller::isFrontend() || !$this->get('protected'))
		{
			return true;
		}
		
		$objUser = \Contao\BackendUser::getInstance();
		
		if($objUser->isAdmin)
		{
			return true;
		}
		
		// check if user has group access
		$usergroups = \Contao\StringUtil::deserialize($this->get('user_groups'));
		if(!empty($usergroups) && is_array($usergroups))
		{
			foreach($usergroups as $group)
			{
				if(in_array($group, $objUser->groups))
				{
					return true;
				}
			}
		}
		
		// check if user itself has access
		$users = \Contao\StringUtil::deserialize($this->get('users'));
		if(!empty($users) && is_array($users))
		{
			if(in_array($objUser->id,$users))
			{
				return true;
			}
		}

		return false;
	}
}