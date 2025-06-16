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

use Contao\System;

/**
 * Class file
 * TableCustomElement
 */
class TableCustomElement extends \Contao\Backend
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
	 * Return templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getTemplates()
	{
		$arrCustomElementTpl = $this->getTemplateGroup('customelement');
		
		// filter Attribute templates '..._attr_...'
		if(!empty($arrCustomElementTpl) && is_array($arrCustomElementTpl))
		{
			foreach($arrCustomElementTpl as $i => $strTpl)
			{
				if(strlen(strpos($strTpl, '_attr_')) > 0)
				{
					unset($arrCustomElementTpl[$i]);
				}
			}
		}
		
		// fallback
		$arrCustomElementLayoutTpl = $this->getTemplateGroup('customelement_layout');
		
		return array_unique(array_merge($arrCustomElementTpl,$arrCustomElementLayoutTpl));
	}
	
	
	/**
	 * Return cte templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getCteTemplates($objDC)
	{
		$intPid = $objDC->activeRecord->pid;

		if (\Contao\Input::get('act') == 'overrideAll')
		{
			$intPid = \Contao\Input::get('id');
		}

		return $this->getTemplateGroup('ce_customelement');
	}
	
	
	/**
	 * Return cte templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getModTemplates($objDC)
	{
		$intPid = $objDC->activeRecord->pid;

		if (\Contao\Input::get('act') == 'overrideAll')
		{
			$intPid = \Contao\Input::get('id');
		}

		return $this->getTemplateGroup('mod_customelement');
	}


	
	/**
	 * Return member groups as array
	 * @param DataContainer
	 * @return array
	 */
	public function getMemberGroups($objDC)
	{
		$objGroups = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_member_group")->execute();
		if($objGroups->numRows < 1)
		{
			return array();
		}
		return $objGroups->fetchEach('id');
	}

	
	/**
	 * Generate an unique alias
	 * @param string
	 * @param DataContainer
	 * @return string
	 */
	public function generateAlias($strValue, $objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->execute($objDC->id);
		
		if(strlen($strValue) < 1)
		{
			$strValue = \Contao\StringUtil::standardize($objDC->activeRecord->title);
			// use underscore instead of minus
			$strValue = str_replace('-', '_', $strValue);
		}
		
		// check against another content elements registered from an a different extension with the same reference name
		#if($objActiveRecord->isCTE)
		#{
		#	foreach($GLOBALS['TL_CTE'] as $arrNode => $arrType)
		#	{
		#		if(array_key_exists($strValue, $arrType))
		#		{
		#			throw new \Exception('Duplicate Alias');
		#		}
		#	}
		#}
		#
		#// check against another front end modules registered from an a different extension with the same reference name
		#if($objActiveRecord->isMOD)
		#{
		#	foreach($GLOBALS['TL_FMD'] as $arrNode => $arrType)
		#	{
		#		if(array_key_exists($strValue, $arrType))
		#		{
		#			throw new \Exception('Duplicate Alias');
		#		}
		#	}
		#}
		
		
		// check against other custom elements
		$objSiblings = $objDatabase->prepare("SELECT id FROM ".$objDC->table." WHERE alias=? AND id!=?")
						->limit(1)
						->execute($strValue,$objDC->id);
		if($objSiblings->numRows > 0)
		{
			throw new \Exception('Duplicate Alias');
		}
		
		return $strValue;
	}
	
	
	/**
	 * Set a new uuid for each attribute in the new group on copy
	 * @param integer
	 * @param object
	 */
	public function setAttributeUuidOnCopy($intRecord, $objDC)
	{
		#// fetch all attributes of the new group
		$objDatabase = \Contao\Database::getInstance();
		$objAttributes = $objDatabase->prepare("SELECT id,uuid FROM tl_pct_customelement_attribute WHERE pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid=?)")->execute($intRecord);
		if($objAttributes->numRows < 1)
		{
		   return;
		} 
		
		$this->loadDataContainer('tl_pct_customelement_attribute');
		
		$objDcHelper = new \PCT\CustomElements\Helper\DataContainerHelper();
		$objDcHelper->table = 'tl_pct_customelement_attribute';
		
		// use the table attribute class as helper
		$objTableAttributes = new \PCT\CustomElements\Backend\TableCustomElementAttribute;
		
		while($objAttributes->next())
		{
		   $objDcHelper->id = $objAttributes->id;
		   // generate and set a new uuid
		   $objTableAttributes->generateUuidOnCopy($objAttributes->id,$objDcHelper);
		}
	}
	
	
	/**
	 * Check permissions
	 */
	public function checkPermission()
	{
		if ($this->User->isAdmin)
		{
			return;
		}
		
		// Set root IDs
		if (!is_array($this->User->pct_customelements) || empty($this->User->pct_customelements))
		{
			$root = array(0);
		}
		else
		{
			$root = $this->User->pct_customelements;
		}
		
		$GLOBALS['TL_DCA']['tl_pct_customelement']['list']['sorting']['root'] = $root;
		
		$objSecurity = \Contao\System::getContainer()->get('security.helper');

		// Check permissions to add new elements
		if ( $objSecurity->isGranted('contao_user.pct_customelementsp.create') === false )
		{
			$GLOBALS['TL_DCA']['tl_pct_customelement']['config']['closed'] = true;
		}
		
		// Check current action
		switch (\Contao\Input::get('act'))
		{
			case 'create':
			case 'select':
			case 'show':
				// Allow
				break;
			case 'edit':
				// Dynamically add the record to the user profile
				if (!in_array(\Contao\Input::get('id'), $root))
				{
					$arrNew = $this->Session->get('new_records');
	
					if (is_array($arrNew['tl_pct_customelement']) && in_array(\Contao\Input::get('id'), $arrNew['tl_pct_customelement']))
					{
						// Add permissions on user level
						if ($this->User->inherit == 'custom' || !$this->User->groups[0])
						{
							$objUser = $this->Database->prepare("SELECT pct_customelements, pct_customelementsp FROM tl_user WHERE id=?")
								->limit(1)
								->execute($this->User->id);
	
							$arrPermissions = \Contao\StringUtil::deserialize($objUser->pct_customelementsp);
	
							if (is_array($arrPermissions) && in_array('create', $arrPermissions))
							{
								$arrElements = \Contao\StringUtil::deserialize($objUser->pct_customelements);
								$arrElements[] = \Contao\Input::get('id');
	
								$this->Database->prepare("UPDATE tl_user SET pct_customelements=? WHERE id=?")
								->execute(serialize($arrElements), $this->User->id);
							}
						}
						// Add permissions on group level
						elseif ($this->User->groups[0] > 0)
						{
							$objGroup = $this->Database->prepare("SELECT pct_customelements, pct_customelementsp FROM tl_user_group WHERE id=?")
							->limit(1)
							->execute($this->User->groups[0]);
	
							$arrPermissions = \Contao\StringUtil::deserialize($objGroup->pct_customelementsp);
	
							if (is_array($arrPermissions) && in_array('create', $arrPermissions))
							{
								$arrElements = \Contao\StringUtil::deserialize($objGroup->pct_customelements);
								$arrElements[] = \Contao\Input::get('id');
	
								$this->Database->prepare("UPDATE tl_user_group SET pct_customelements=? WHERE id=?")
								->execute(serialize($arrElements), $this->User->groups[0]);
							}
						}
	
						// Add new element to the user object
						$root[] = \Contao\Input::get('id');
						$this->User->pct_customelements = $root;
					}
					break;
				}
	
			// No break;
			case 'delete':
				if ( $objSecurity->isGranted('contao_user.pct_customelementsp.delete') === false )
				{
					System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to '.\Contao\Input::get('act').' element ID "'.\Contao\Input::get('id').'"' );			
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
				
				$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
				$session = $objSession->all();
				
				if (\Contao\Input::get('act') == 'deleteAll' && $objSecurity->isGranted('contao_user.pct_customelementsp.delete') === false )
				{
					$session['CURRENT']['IDS'] = array();
				}
				else
				{
					$session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $root);
				}
				$objSession->replace($session);
				break;
	
			default:
				if (strlen(\Contao\Input::get('act')))
				{
					System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to '.\Contao\Input::get('act').' element ID "'.\Contao\Input::get('id').'"' );			
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}

	
	/**
	 * Return the edit header button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function editHeader($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		$strButton = '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ';
		if($this->User->isAdmin)
		{
			return $strButton;	
		}
		elseif( $objSecurity->isGranted('contao_user.pct_customelementsp.create') )
		{
			return $strButton;			
		}
		else
		{
			return '';
		}
	}

	/**
	 * Return the copy button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function copyButton($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelementsp.create')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
	}

	/**
	 * Return the delete archive button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function deleteButton($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelementsp.delete')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
	}

	/**
	 * Return the export button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function exportButton($row, $href, $label, $title, $icon, $attributes)
	{
		# TODO Systemeinstellung
		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ';
	}
	
}