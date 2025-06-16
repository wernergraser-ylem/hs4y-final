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
namespace PCT\CustomElements\Plugins\CustomCatalog\Core;


/**
 * Class file
 * RowTemplate
 */
class RowTemplate extends \PCT\CustomElements\Core\FrontendTemplate
{
	/**
	 * Template file
	 * @var string
	 */
	protected $strTemplate = 'customcatalog_item_default';
	
	
	/**
	 * Initialize
	 * @param string
	 */
	public function __construct($strTemplate='')
	{
		if(strlen(trim($strTemplate)) > 0)
		{
			$this->set('strTemplate',$strTemplate);
		}
	}
	
	
	/**
	 * Getters
	 * @param string
	 * @return mixed
	 */
	public function get($strKey)
	{
		if(isset($this->{$strKey}))
		{
			return $this->$strKey;
		}
		elseif(isset(static::$strKey))
		{
			return static::$strKey;
		}
		elseif(isset($this->arrData[$strKey]))
		{
			return $this->arrData[$strKey];
		}
		else
		{
			switch($strKey)
			{
				case 'fields':
				case 'customelement_fields':
					return $this->fields();
				case 'groups':
				case 'customelement_groups':
					return $this->groups();
					break;
				case 'group':
					return $this->customelement_group[$strKey] ?: array();
					break;
			}
		}
	}
	
	
	/**
	 * Setters
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		if(isset($this->$strKey))
		{
			$this->$strKey = $varValue;
		}
		elseif(isset(static::$strKey))
		{
			static::$strKey = $varValue;
		}
		elseif(isset($this->arrData[$strKey]))
		{
			$this->arrData[$strKey] = $varValue;
		}
		else
		{
			switch($strKey)
			{
				case 'field':
				case 'customelement_field':
					$this->customelement_field = $varValue;
					break;
				case 'fields':
				case 'customelement_fields':
					$this->customelement_fields = $varValue;
					break;
				case 'groups':
					$this->customelement_groups = $varValue;
					break;
				case 'group':
					$this->customelement_group = $varValue;
					break;
				default: 
					$this->{$strKey} = $varValue;
					break;
			}
		}
	}
	
	
	/**
	 * Set data array
	 * @param array
	 */
	public function setData($arrData)
	{
		if(!is_array($arrData))
		{
			return;
		}
		
		$this->arrData = $arrData;
	}
	
	
	/**
	 * Return the data array
	 * @param array
	 */
	public function getData()
	{
		return $this->arrData;
	}
	
	
	/**
	 * Parse a template for
	 * @param object	Database Result
	 */
	public function render($strTemplate='')
	{
		if(strlen(trim($strTemplate)) > 0)
		{
			$this->set('strTemplate',$strTemplate);
		}
		
		$objTemplate = new \PCT\CustomElements\Core\FrontendTemplate($this->get('strTemplate'));
		$objTemplate->setData($this->getData());
		$objTemplate->field = $this->get('field');	// associated fields with row count
		$objTemplate->fields = $this->get('fields'); // associated fields without row count
		$objTemplate->groups = $this->get('groups'); // associated groups
		$objTemplate->links = $this->get('links');
		
		return $objTemplate->parse();
	}


	/**
	 * Shortcut to render
	 */
	public function html($strTemplate='') {return $this->render($strTemplate);}
	
	
	/**
	 * Return information from the link array
	 * @param string	The selector e.g. details or the tablename of a child table to fetch information from
	 * @return string
	 */
	public function links($strKey)
	{
		$arrLinks = $this->get('links');
		if(empty($arrLinks) || (!isset($arrLinks[$strKey]) && !isset($arrLinks['childs'][$strKey])) )
		{
			return '';
		}
		
		$arrLink = $arrLinks[$strKey] ?: $arrLinks['childs'][$strKey];
		
		// make it an object
		$objLink = new \StdClass();
		foreach($arrLink as $k => $v)
		{
			$objLink->{$k} = $v;
		}
		
		return $objLink;
	}
	
	
	/**
	 * Return the customcatalog object from an template
	 * @return object
	 */
	public function getCustomCatalog()
	{
		return $this->get('objCustomCatalog') ?: null;
	}
	
	
	/**
	 * Shortcut to @getCustomCatalog()
	 */
	public function customcatalog() {return $this->getCustomCatalog();}
	
	
	/**
	 * Return the active record for the row entry
	 * @return array
	 */
	public function activeRecord()
	{
		if($this->get('objActiveRecord'))
		{
			return $this->get('objActiveRecord');
		}
		else
		{
			$objResult = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$this->getCustomCatalog()->getTable()." WHERE id=?")->limit(1)->execute($this->get('id'));
			return $objResult;
		}
	}
	
	
	/**
	 * Prepare comments and return all comments related data as a object
	 * @param string	The comments template
	 * @param object	Individual settings
	 * @return object
	 */
	public function getComments($strTemplate='com_default',$objSettings=null)
	{
		// return the processed comments object
		if($this->get('objComments'))
		{
			return $this->get('objComments');
		}
		
		$objCC = $this->customcatalog();
		
		if($objSettings === null)
		{
			$objSettings = $this->customcatalog()->db_result;
		}
		
		if(strlen($objSettings->strTemplate) > 0 && $objSettings->strTemplate != $strTemplate)
		{
			$strTemplate = $objSettings->strTemplate;
		}
		
		$objTemplate = $this;#new \Contao\FrontendTemplate($this->get('strTemplate'));
		$objComments = new \Contao\Comments();
		
		// Notify the system administrator
		$arrNotifies = array($GLOBALS['TL_ADMIN_EMAIL']);
		
		if(is_array($objSettings->notifies) && !empty($objSettings->notifies))
		{
			$arrNotifies = array_unique(array_merge($arrNotifies,$objSettings->notifies));
		}
		
		$objConfig = new \stdClass();
		$objConfig->perPage = $objSettings->com_perPage;
		$objConfig->order = $objSettings->com_sortOrder;
		$objConfig->template = $strTemplate;
		$objConfig->requireLogin = $objSettings->com_requireLogin;
		$objConfig->disableCaptcha = $objSettings->com_disableCaptcha;
		$objConfig->bbcode = $objSettings->com_bbcode;
		$objConfig->moderate = $objSettings->com_moderate;
		
		$intParent = $this->activeRecord()->id;
		
		// backdoor and fallback
		if(isset($GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS'][$objCC->getTable()]['uniqueComments']) && $GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS'][$objCC->getTable()]['uniqueComments'] === false)
		{
			$intParent = $objCC->get('id');
		}
		
		$objComments->addCommentsToTemplate($objTemplate, $objConfig, $objCC->getTable(), $intParent, $arrNotifies);
		
		$objReturn = new \StdClass();
		$objReturn->addComment = $objTemplate->addComment;
		$objReturn->headline = $objTemplate->addComment;
		$objReturn->comments = $objTemplate->comments;
		$objReturn->pagination = $objTemplate->commentsPagination;
		$objReturn->fields = $objTemplate->fields;
		$objReturn->Template = $objTemplate;
		$objReturn->Comments = $objComments;
		
		// set the comments object
		$this->set('objComments',$objReturn);
		
		return $objReturn;
	}
	
	
	/**
	 * Returns the comment form as string
	 * @param string	Template
	 * @return string	Html output
	 */
	public function getCommentForm($strTemplate='mod_comment_form')
	{
		$this->fields = $this->getComments()->fields;
		return include $this->getTemplate($strTemplate, 'html5');
	}
	
	
	/**
	 * Returns just the comments as array
	 * @return array
	 */
	public function comments()
	{
		return $this->getComments()->comments;
	}
}
 