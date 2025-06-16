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

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\Input;


/**
 * Imports
 */
use \Contao\Image;
use Contao\StringUtil;
use Contao\System;
use \PCT\CustomElements\Helper\DcaHelper as DcaHelper;

/**
 * Class file
 * TableCustomElementGroup
 * tl_pct_customelement_group
 */
class TableCustomElementGroup extends \Contao\Backend
{
	/**
	 * BE Template
	 * @var string
	 */
	protected $strTemplate = 'be_tl_customelement_group';
	
	/**
	 * BE Mootools Template
	 * @var string
	 */
	protected $strMooTemplate = 'be_moo_fxslide';
	
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
	public function getTemplates($objDC)
	{
		$intPid = $objDC->activeRecord->pid;

		if (\Contao\Input::get('act') == 'overrideAll')
		{
			$intPid = \Contao\Input::get('id');
		}

		return $this->getTemplateGroup('customelement_group');
	}
	
		
	/**
	 * List all groups as main container and fields as childs inside
	 * @param array
	 * @return string
	 */
	public function listGroups($arrRow)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get('pct_customelements_togglers');
			
		$objTemplate = new \Contao\BackendTemplate($this->strTemplate);
		$objTemplate->row = $arrRow;
		$objTemplate->empty = $GLOBALS['TL_LANG']['tl_pct_customelement_group']['empty'];
		
		$blnActive = true;
		if( isset($arrSession['customelement_group_'.$arrRow['id']]) && $arrSession['customelement_group_'.$arrRow['id']] ==	'open')
		{
			$blnActive = false;
		}
		
		$objTemplate->isActive = $blnActive;
		
		$objSecurity = \Contao\System::getContainer()->get('security.helper');

		// fetch childs
		$objChilds = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE pid=? ORDER BY sorting")->execute($arrRow['id']);
		if($objChilds->numRows > 0)
		{
			// load DataContainer of child table
			$this->loadDataContainer('tl_pct_customelement_attribute');
			$this->loadLanguageFile('tl_pct_customelement_attribute');
			
			$objChildTable = new TableCustomElementAttribute();
				
			$arrChilds = array();
			while($objChilds->next())
			{
				// skip attributes the user has no permission to edit
				// need permission: create
				if($this->User->protect_pct_customelement_attributes)
				{
					if(!empty($this->User->pct_customelement_attributes))
					{
						if(!in_array($objChilds->type, $this->User->pct_customelement_attributes) || !$objSecurity->isGranted('contao_user.pct_customelement_attributesp.create'))
						{
							continue;	
						}
					}
				}
				
				$row = $objChilds->row();
				
				// edit button
				$arrButton = $GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['list']['operations']['edit'];
				$arrButton['href'] = 'table=tl_pct_customelement_attribute&amp;act=edit&popup=1&nb=1';
				$title = sprintf($arrButton['label'][1],$row['title']);
				$arrButton['attributes'] = 'onclick="Backend.openModalIframe({\'width\':765,\'title\':\''.$title.'\',\'url\':this.href});return false"';
				$row['__edit__'] = $objChildTable->editButton($row,$arrButton['href'],$arrButton['label'][0],sprintf($arrButton['label'][1],$row['id']),$arrButton['icon'],$arrButton['attributes']);
				
				// delete button
				$arrButton = $GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['list']['operations']['delete'];
				$arrButton['href'] = 'table=tl_pct_customelement_attribute&amp;act=delete';
				$arrButton['attributes'] = 'onclick="if(!confirm(\'' . sprintf($GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['delete'][1],$row['id']) . '\'))return false;Backend.getScrollOffset()"';
				$row['__delete__'] = $objChildTable->deleteButton($row,$arrButton['href'],$arrButton['label'][0],sprintf($arrButton['label'][1],$row['id']),$arrButton['icon'],$arrButton['attributes']);
				
				// toggle visibility button
				$arrButton = $GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['list']['operations']['toggle'];
				$arrButton['href'] = $this->addToUrl('&table=tl_pct_customelement_attribute&act=toggle&amp;field=published');
				$arrButton['href'] = str_replace('id='.\Contao\Input::get('id'), 'id='.$arrRow['id'], $arrButton['href']);
				$arrButton['attributes'] = ''; #'onclick="Backend.getScrollOffset();return AjaxRequest.toggleElementVisibility(this,'.$row['id'].',\'tl_pct_customelement_attribute\')"';
				#$arrButton['attributes'] = 'onclick="Backend.getScrollOffset();"';
				$row['__toggle__'] = $objChildTable->toggleIcon($row,$arrButton['href'],$arrButton['label'][0],sprintf($arrButton['label'][1],$row['id']),$arrButton['icon'],$arrButton['attributes']);
				$arrChilds[] = $row;
			}
		
			$objTemplate->childs = $arrChilds;
		}
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Set a new uuid for each attribute in the new group on copy
	 * @param integer
	 * @param object
	 */
	public function setAttributeUuidOnCopy($intRecord, $objDC)
	{
		// fetch all attributes of the new group
		$objDatabase = \Contao\Database::getInstance();
		$objAttributes = $objDatabase->prepare("SELECT id,uuid FROM tl_pct_customelement_attribute WHERE pid=?")->execute($intRecord);
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
			// clear the uuid field
			$objTableAttributes->clearUuidOnCopy($objAttributes->id,$objDcHelper);
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

		// check if user has permission to see all groups or just the selected ones
		if($this->User->protect_pct_customelement_groups)
		{
			// Set root IDs
			if (!is_array($this->User->pct_customelement_groups) || empty($this->User->pct_customelement_groups))
			{
				$root = array(0);
			}
			else
			{
				$root = $this->User->pct_customelement_groups;
			}
			$GLOBALS['TL_DCA']['tl_pct_customelement_group']['list']['sorting']['root'] = $root;
		}
		
		// Check permissions to add elements
		$objSecurity = \Contao\System::getContainer()->get('security.helper');

		if ( !$objSecurity->isGranted('contao_user.pct_customelement_groupsp.create') )
		{
			$GLOBALS['TL_DCA']['tl_pct_customelement_group']['config']['closed'] = true;
		}
		
		// Check current action
		switch (\Contao\Input::get('act'))
		{
			case 'create':
			case 'select':
			case 'show':
				// Allow
				break;
			
			case 'cut':
			case 'paste':
			case 'copy':
				if (!$objSecurity->isGranted('contao_user.pct_customelement_groupsp.cut'))
				{
					$this->redirect('contao/main.php?act=error');
				}
				break;
			case 'edit':
			case 'toggle':
				// Dynamically add the record to the user profile
				if (!in_array(\Contao\Input::get('id'), $root))
				{
					$arrNew = $this->Session->get('new_records');

					if (is_array($arrNew['tl_pct_customelement_group']) && in_array(\Contao\Input::get('id'), $arrNew['tl_pct_customelement_group']))
					{
						// Add permissions on user level
						if ($this->User->inherit == 'custom' || !$this->User->groups[0])
						{
							$objUser = $this->Database->prepare("SELECT pct_customelement_groups, pct_customelement_groupsp FROM tl_user WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->id);

							$arrPermissions = \Contao\StringUtil::deserialize($objUser->pct_customelement_groupsp);

							if (is_array($arrPermissions) && in_array('create', $arrPermissions))
							{
								$arrElements = \Contao\StringUtil::deserialize($objUser->pct_customelement_groups);
								$arrElements[] = \Contao\Input::get('id');

								$this->Database->prepare("UPDATE tl_user SET pct_customelement_groups=? WHERE id=?")
											   ->execute(serialize($arrElements), $this->User->id);
							}
						}

						// Add permissions on group level
						elseif ($this->User->groups[0] > 0)
						{
							$objGroup = $this->Database->prepare("SELECT pct_customelement_groups, pct_customelement_groupsp FROM tl_user_group WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->groups[0]);

							$arrPermission = \Contao\StringUtil::deserialize($objGroup->pct_customelement_groupsp);

							if (is_array($arrPermission) && in_array('create', $arrPermission))
							{
								$arrElements = \Contao\StringUtil::deserialize($objGroup->pct_customelement_groups);
								$arrElements[] = \Contao\Input::get('id');

								$this->Database->prepare("UPDATE tl_user_group SET pct_customelement_groups=? WHERE id=?")
											   ->execute(serialize($arrElements), $this->User->groups[0]);
							}
						}

						// Add new element to the user object
						$root[] = \Contao\Input::get('id');
						$this->User->pct_customelement_groups = $root;
					}
				}
				// No break;
			case 'delete':
				if (!$objSecurity->isGranted('contao_user.pct_customelement_groupsp.delete'))
				{
					System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to '.\Contao\Input::get('act').' element ID "'.\Contao\Input::get('id').'"');			
			
					$this->redirect('contao/main.php?act=error');
				}
				break;
			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
				$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
				$session = $objSession->all();
				if (\Contao\Input::get('act') == 'deleteAll' && !$objSecurity->isGranted('contao_user.pct_customelement_groupsp.delete'))
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
					System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to '.\Contao\Input::get('act').' element ID "'.\Contao\Input::get('id').'"');			
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}

	
	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$table = 'tl_pct_customelement_group';
		$security = System::getContainer()->get('security.helper');

		if (!$security->isGranted(ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, $table.'::published'))
		{
			return '';
		}

		$href .= '&amp;id=' . $row['id'];

		if (!$row['published'])
		{
			$icon = 'invisible.svg';
		}

		$titleDisabled = (is_array($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label']) && isset($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label'][2])) ? sprintf($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label'][2], $row['id']) : $title;

		$data_icon = 'visible.svg';
		$data_icon_disabled = 'invisible.svg';
		if( version_compare('4.13',ContaoCoreBundle::getVersion(),'<=') )
		{
			$data_icon = \Contao\Image::getPath($data_icon);
			$data_icon_disabled = \Contao\Image::getPath($data_icon_disabled);
		}
		
		return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars(!$row['published'] ? $title : $titleDisabled) . '" data-title="' . StringUtil::specialchars($title) . '" data-title-disabled="' . StringUtil::specialchars($titleDisabled) . '" data-action="contao--scroll-offset#store" onclick="return AjaxRequest.toggleField(this,true)">' . \Contao\Image::getHtml($icon, $label, 'data-icon="'.$data_icon.'" data-icon-disabled="'.$data_icon_disabled.'" data-state="' . ($row['published'] ? 1 : 0) . '"') . '</a> ';
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
		elseif( $objSecurity->isGranted('contao_user.pct_customelement_groupsp.create') )
		{
			return $strButton;			
		}
		else
		{
			return '';
		}
	}

	/**
	 * Return the copy category button
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
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_groupsp.create')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
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
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_groupsp.delete')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
	}
	
	/**
	 * Return the copy,paste button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function cutButton($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_groupsp.cut')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
	}
	
	/**
	 * Generate an unique alias against a customelement
	 * @param string
	 * @param DataContainer
	 * @return string
	 */
	public function generateAliasAgainstCustomElement($strValue, $objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->execute($objDC->id);
		
		if(strlen($strValue) < 1)
		{
			$strValue = \Contao\StringUtil::standardize($objDC->activeRecord->title);
			// use underscore instead of minus
			$strValue = str_replace('-', '_', $strValue);
		}
		
		// fetch the current customelement
		$objCE = $objDatabase->prepare("SELECT id FROM tl_pct_customelement WHERE id=?")->limit(1)->execute($objDC->activeRecord->pid);
		// fetch all groups in the current customelement
		$objGroups = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid=?")->execute($objCE->id);
		// check if any attribute but the current one has the same alias
		$objSiblings = $objDatabase->prepare("
		SELECT id 
		FROM ".$objDC->table." 
		WHERE pid IN(".implode(',', $objCE->fetchEach('id')).")
			AND alias=?
			AND id!=?
		")->limit(1)->execute($strValue,$objDC->id);
		
		if($objSiblings->id > 0)
		{
			return $this->generateAliasAgainstCustomElement($strValue.'_'.$objDC->id,$objDC);
		}
		
		return $strValue;
	}
	
	
	/**
	 * Set alias to doNotCopy when called from group, also clear field in table
	 * @param integer
	 * @param object
	 */
	public function doNotCopyAlias($intId, $objDC)
	{
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['alias']['eval']['doNotCopy'] = true;
		\Contao\Database::getInstance()->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('alias'=>''))->execute($intId);
	}
}