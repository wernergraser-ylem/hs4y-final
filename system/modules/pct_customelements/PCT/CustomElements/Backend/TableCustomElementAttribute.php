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
 * Imports
 */

use Contao\System;
use Contao\BackendUser;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\StringUtil;
use PCT\CustomElements\Core\Controller;
use \PCT\CustomElements\Core\CustomElements;
use \PCT\CustomElements\Helper\DcaHelper as DcaHelper;

/**
 * Class file
 * TableCustomElement
 */
class TableCustomElementAttribute extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import(BackendUser::class, 'User');
	}

		
	/**
	 * Load palettes
	 * @param object
	 */
	public function loadDefaultPalette($strTable)
	{
		$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable($strTable);
		$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
		$arrPalettes['settings_legend'] = array('__FIELDDEFINITION__'); // fallback
		$arrPalettes['eval_legend'] = array('__EVAL__'); // fallback
		$arrPalettes['be_setting_legend'] = array('__BESETTINGS__','eval_tl_class_w50','eval_tl_class_clr','be_visible'); // fallback
		$arrPalettes['template_legend:hide'] = array('template');
		$arrPalettes['protected_legend:hide'] = array('protected');
		$arrPalettes['expert_legend'] = array('cssID','alias','published');
		$GLOBALS['TL_DCA'][$strTable]['palettes']['default'] = $objDcaHelper->generatePalettes($arrPalettes);

		\PCT\CustomElements\Loader\AttributeLoader::loadDcaFiles($strTable);
		\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFiles($strTable);
	}
	

	/**
	 * List fields
	 * @param array
	 * @return string
	 */
	public function listAttributes($arrRow)
	{
		$type = $arrRow['type'];
		
		$classes = array($type);
		
		$icon = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$type]['icon'] ?? '';
			
		// call the toggleIcon Hook
		$icon = \PCT\CustomElements\Core\Hooks::callstatic('toggleIconHook',array('tl_pct_customelement_attribute',$arrRow,$icon));
		
		$imgIcon = '';
		$cssIcon = '';
		if(strlen($icon) > 0)
		{
			if(is_file( Controller::rootDir() .'/'.$icon))
			{
				$imgIcon = $icon;
			}
			else
			{
				$cssIcon = $icon;
			}
		}
		else
		{
			$cssIcon = 'fa fa-file-o';
		}
		
		$strIcon = '<i class="icon '.$cssIcon.'"></i>';
		if(strlen($imgIcon) > 0)
		{
			$strIcon = '<img class="icon" src="'.$imgIcon.'"/>';
		}
		
		$arrSup = array();
		if($arrRow['eval_tl_class_w50'])
		{
			$classes[] = 'tl_w50';
			$arrSup[] = 'w50';
		}
		if($arrRow['eval_tl_class_clr'])
		{
			$classes[] = 'tl_clr';
			$arrSup[] = 'clr';
		}
		if($arrRow['eval_tl_class_long'])
		{
			$classes[] = 'tl_long';
			$arrSup[] = 'long';
		}
		
		$strSup = '';
		if(count($arrSup) > 0)
		{
			$strSup = '<sup>'.implode(' ', $arrSup).'</sup>';
		}
		
		$strBuffer = sprintf('<div class="tl_content_left '.implode(' ', $classes).'">%s'.$arrRow['title'].'%s</div>',$strIcon,$strSup);
		
		// call the custom child_record_callback Hook
		$strBuffer = \PCT\CustomElements\Core\Hooks::callstatic('child_record_callback',array('tl_pct_customelement_attribute',$arrRow,$icon,$strBuffer));
		
		return $strBuffer;
	}
	
	
	/**
	 * Generate label
	 * @param array
	 * @return string
	 */
	public function getLabel($arrRow)
	{
		$strLabel = $arrRow['title'] . '['.$arrRow['type'].']';
	
		return '<div class="tl_content_left">' . $strLabel . '</div>';
	}
	
	
	/**
	 * Return templates as array
	 * @param DataContainer
	 * @return array
	 */
	public function getTemplates($objDC)
	{
		$arrReturn = array_merge($this->getTemplateGroup('customelement_attr'), $this->getTemplateGroup('ce_'));

		return $arrReturn;
	}
	
	
	/**
	 * Return the backend description
	 * @param object
	 * @return string
	 */
	public function getBackendDescription($objDC)
	{
		if(!$objDC->activeRecord->type)
		{
			return '';
		}
		
		$this->loadLanguageFile('default');
		\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('attributes',$objDC->activeRecord->type);
		
		$strBuffer = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$objDC->activeRecord->type]['label'][1] ?? '';
		if(strlen($strBuffer) < 1)
		{
			return '';
		}
		
		return '<div class="field widget backend_explanation clr contao-ht35">'.$strBuffer.'</div>';
	}
	
	
	/**
	 * Get the options from an attribute and return as array
	 * @param DataContainer
	 * @return array
	 */
	public function getAttributeOptions($objDC)
	{
		return $GLOBALS['TL_DCA'][$objDC->table]['fields']['options'][$objDC->activeRecord->type]['options'] ?? array();
	}
	
	
	/**
	 * Load the field defintion
	 * @param DataContainer
	 * @return array
	 */
	public function loadFieldDefinitionByAttributeType($objDC)
	{
		$objActiveRecord = $objDC->activeRecord;
		$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
		if($objActiveRecord === null && class_exists($strModel))
		{
			$objActiveRecord = $strModel::findByPk($objDC->id);
		}
		else
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		// if field is new or undefined allow the attribute to define it (impossible when called from a load_callback)
		$field = 'options';
		if( isset($objActiveRecord->type) && isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$field]) && isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$field][$objActiveRecord->type]) && is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$field][$objActiveRecord->type]) )
		{
			foreach($GLOBALS['TL_DCA'][$objDC->table]['fields'][$field][$objActiveRecord->type] as $k => $v)
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields'][$field][$k] = $v;
			}
		}
	}
	

	/**
	 * Load the field label
	 * @param DataContainer
	 * @return array
	 */
	public function loadFieldLabelByAttributeType($varValue='', $objDC)
	{
		$label = $GLOBALS['TL_LANG'][$objDC->table][$objDC->field][$objDC->activeRecord->type] ?? array();
		if($label)
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['label'] = &$label;
		}
		
		// Load references
		if( isset($GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields'][$objDC->field][$objDC->activeRecord->type]['reference']) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['reference'] = &$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['fields'][$objDC->field][$objDC->activeRecord->type]['reference'];
		}
		else
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['reference'] = &$GLOBALS['TL_LANG'][$objDC->table][$objDC->field][$objDC->activeRecord->type] ?? array();
		}
		
		return $varValue;
	}
	
	
	/**
	 * Toggle view
	 */
	public function switchPalette($objDC)
	{
		if(isset($GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]))
		{
			$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'] = $GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type];
		}
	}

	/**
	 * Load dca files from attributes
	 * @param object
	 * @return object
	 */
	public function loadExternalDcaFiles()
	{
		if(empty($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']) || !is_array($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']))
		{
			return;
		}
		
		$strTable = 'tl_pct_customelement_attribute';
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'] as $type => $data)
		{
			// attribute path
			$file = Controller::rootDir().'/'.PCT_CUSTOMELEMENTS_PATH.'/'.$data['path'].'/dca/'.$strTable.'.php';
			if(file_exists($file))
			{
				require_once($file);
			}
		}
	}
	
	/**
	 * Load language files from attributes
	 * @param object
	 * @return object
	 */
	public function loadExternalLanguageFiles()
	{
		if(empty($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']) || !is_array($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']))
		{
			return;
		}
		
		$strTable = 'tl_pct_customelement_attribute';
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'] as $type => $data)
		{
			// attribute path
			$language = $GLOBALS['TL_LANGUAGE'];
			$file = Controller::rootDir().'/'.PCT_CUSTOMELEMENTS_PATH.'/'.$data['path'].'/languages/'.$language.'/'.$strTable.'.php';
			if(file_exists($file))
			{
				require_once($file);
			}
		}
	}
	
	
	/**
	 * Set alias to doNotCopy when called from attribute, also clear field in table
	 * @param integer
	 * @param object
	 */
	public function doNotCopyAlias($intId, $objDC)
	{
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['alias']['eval']['doNotCopy'] = true;
		\Contao\Database::getInstance()->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('alias'=>''))->execute($intId);
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
		
		if(strlen($strValue) < 1)
		{
			$strValue = \Contao\StringUtil::standardize($objDC->activeRecord->title);
			// use underscore instead of minus
			$strValue = str_replace('-', '_', $strValue);
		}
		
		// check against other custom elements
		$objSiblings = $objDatabase->prepare("SELECT id FROM ".$objDC->table." WHERE alias=? AND id!=?")
						->limit(1)
						->execute($strValue,$objDC->id);
		if($objSiblings->numRows > 0)
		{
			return $this->generateAlias($strValue.'_'.$objDC->id,$objDC);
		}
		
		// write alias with underscore when the CE is a CustomCatalog
		if($objDatabase->tableExists('tl_pct_customcatalog'))
		{
			// fetch the current customelement
			$objCE = $objDatabase->prepare("SELECT id FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?)")->limit(1)->execute($objDC->activeRecord->pid);
			$objCC = $objDatabase->prepare("SELECT id FROM tl_pct_customcatalog WHERE pid=?")->limit(1)->execute($objCE->id);
			if($objCC->numRows > 0)
			{
				$strValue = str_replace('-', '_', $strValue);
			}
		}
		
		return $strValue;
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
		
		if(strlen($strValue) < 1)
		{
			$strValue = \Contao\StringUtil::standardize($objDC->activeRecord->title);
			// use underscore instead of minus
			$strValue = str_replace('-', '_', $strValue);
		}
		
		// fetch the current customelement
		$objCE = $objDatabase->prepare("SELECT id FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?)")->limit(1)->execute($objDC->activeRecord->pid);
		// fetch all groups in the current customelement
		$objGroups = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid=?")->execute($objCE->id);
		// check if any attribute but the current one has the same alias
		$objSiblings = $objDatabase->prepare("
		SELECT id 
		FROM ".$objDC->table." 
		WHERE pid IN(".implode(',', $objGroups->fetchEach('id')).")
			AND alias=?
			AND id!=?
		")->limit(1)->execute($strValue,$objDC->id);
		
		if($objSiblings->id > 0)
		{
			return $this->generateAliasAgainstCustomElement($strValue.'_'.$objDC->id,$objDC);
		}
		
		if($objDatabase->tableExists('tl_pct_customcatalog'))
		{
			$objCC = $objDatabase->prepare("SELECT id FROM tl_pct_customcatalog WHERE pid=?")->limit(1)->execute($objCE->id);
			if($objCC->numRows > 0)
			{
				$strValue = str_replace('-', '_', $strValue);
			}
		}
		
		return $strValue;
	}
	
	
	/**
	 * Generate a unique name when attribute is been saved
	 * @param object DataContainer
	 * @param string
	 * @param integer
	 * @return object DataContainer
	 */
	public function generateUuidOnSubmit($objDC, $intLength=15)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$strUuid = '';
		$objUuid = $objDatabase->prepare("SELECT id,uuid FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		if($objUuid->numRows > 0 && strlen($objUuid->uuid) > 0)
		{
			$objSiblings = $objDatabase->prepare("SELECT id FROM ".$objDC->table." WHERE uuid=? AND id!=?")->limit(1)->execute($objUuid->uuid,$objDC->id);
			
			if($objSiblings->numRows > 0)
			{
				$strUuid = $this->generateUuid($objUuid->uuid, $objDC);
			}
		}
		else
		{
			$strUuid = $this->generateUuid(null, $objDC);
		}
		
		if( !isset($strUuid) || strlen($strUuid) < 1)
		{
			return $objDC;
		}
		
		$objSiblings = $objDatabase->prepare("SELECT id FROM ".$objDC->table." WHERE uuid=? AND id!=?")->limit(1)->execute($strUuid,$objDC->id);
		if($objSiblings->numRows > 0)
		{
			return $this->generateUuid($strUuid, $objDC, $intLength+1);
		}
		
		// set uuid
		$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('uuid'=>$strUuid))->execute($objDC->id);
		
		return $objDC;
	}
	
	/**
	 * Generate a unique name when an attribute is been duplicated 
	 * @param object DataContainer
	 * @param string
	 * @param integer
	 * @return object DataContainer
	 */
	public function generateUuidOnCopy($intRecord, $objDC, $intLength=15)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$objUuid = $objDatabase->prepare("SELECT id,uuid FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($intRecord);
		if($objUuid->numRows > 0 && strlen($objUuid->uuid) > 0)
		{
			$strUuid = $this->generateUuid($objUuid->uuid, $objDC);
		}
		else
		{
			$strUuid = $this->generateUuid(null, $objDC);
		}

		// set uuid
		$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('uuid'=>$strUuid))->execute($intRecord);
		
		return $objDC;
	}
	
	/**
	 * Clear uuid on copy
	 * @param integer
	 * @param object
	 */
	public function clearUuidOnCopy($intRecord, $objDC, $intLength=15)
	{
		\Contao\Database::getInstance()->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('uuid'=>''))->execute($intRecord);
	}
	
	/**
	 * Generate a unique name for the field
	 * @param mixed
	 * @param object
	 * @param integer
	 */
	public function generateUuid($varValue, $objDC, $intLength=15)
	{
		if(!$varValue)
		{
			$varValue = $this->generatePassword($intLength,'1234567890abcdefghijklmnopqrstuvwxyz');
		}
		
		$objSiblings = \Contao\Database::getInstance()->prepare("SELECT id FROM ".$objDC->table." WHERE uuid=? AND id!=?")->limit(1)->execute($varValue,$objDC->id);
		if($objSiblings->numRows > 0)
		{
			return $this->generateUuid(null, $objDC, $intLength+1);
		}
		
		return $varValue;
	}
	
	/**
	 * Generate a random string
	 * @param integer
	 * @return string
	 */
	protected function generatePassword($intLength=8,$strCharSet='')
	{
		if(!$strCharSet)
		{
			$strCharSet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		}
		
		$max = strlen($strCharSet);
		$rand = \rand(0,$max);
		
		$return = '';
		for($i = 0; $i <= $intLength-1; $i++)
		{
			$rand = \rand(0,$max);
			$return .= substr($strCharSet, $rand,1);
		}
		
		return $return;
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

		// check if user has permission to see all attributes or just the selected ones
		if($this->User->protect_pct_customelement_attributes)
		{
			// Set root IDs
			if (!is_array($this->User->pct_customelement_attributes) || empty($this->User->pct_customelement_attributes))
			{
				$root = array(0);
			}
			else
			{
				// fetch all allowed attributes
				$objIds = \Contao\Database::getInstance()->execute("SELECT id FROM tl_pct_customelement_attribute WHERE ".\Contao\Database::getInstance()->findInSet('type',$this->User->pct_customelement_attributes));
								
				if($objIds->numRows < 1)
				{
					$root = array(0);
				}
				else
				{
					$root = $objIds->fetchEach('id');
				}
			}
			$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['list']['sorting']['root'] = $root;
		}
		
		// Check permissions to add elements
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		
		if ( $objSecurity->isGranted('contao_user.pct_customelement_attributesp.create') === false )
		{
			$GLOBALS['TL_DCA']['tl_pct_customelement_attribute']['config']['closed'] = true;
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
				if ( $objSecurity->isGranted('contao_user.pct_customelement_attributesp.cut') === false )
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

					if (is_array($arrNew['tl_pct_customelement_attribute']) && in_array(\Contao\Input::get('id'), $arrNew['tl_pct_customelement_attribute']))
					{
						// Add permissions on user level
						if ($this->User->inherit == 'custom' || !$this->User->groups[0])
						{
							$objUser = $this->Database->prepare("SELECT pct_customelement_attributes, pct_customelement_attributesp FROM tl_user WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->id);

							$arrPermissions = \Contao\StringUtil::deserialize($objUser->pct_customelement_attributesp);

							if (is_array($arrPermissions) && in_array('create', $arrPermissions))
							{
								$arrElements = \Contao\StringUtil::deserialize($objUser->pct_customelement_attributes);
								$arrElements[] = \Contao\Input::get('id');

								$this->Database->prepare("UPDATE tl_user SET pct_customelement_attributes=? WHERE id=?")
											   ->execute(serialize($arrElements), $this->User->id);
							}
						}

						// Add permissions on group level
						elseif ($this->User->groups[0] > 0)
						{
							$objGroup = $this->Database->prepare("SELECT pct_customelement_attributes, pct_customelement_attributesp FROM tl_user_group WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->groups[0]);

							$arrPermission = \Contao\StringUtil::deserialize($objGroup->pct_customelement_attributesp);

							if (is_array($arrPermission) && in_array('create', $arrPermission))
							{
								$arrElements = \Contao\StringUtil::deserialize($objGroup->pct_customelement_attributes);
								$arrElements[] = \Contao\Input::get('id');

								$this->Database->prepare("UPDATE tl_user_group SET pct_customelement_attributes=? WHERE id=?")
											   ->execute(serialize($arrElements), $this->User->groups[0]);
							}
						}

						// Add new element to the user object
						$root[] = \Contao\Input::get('id');
						$this->User->pct_customelement_attributes = $root;
					}
				}
				// No break;
			case 'delete':
				if ( $objSecurity->isGranted('contao_user.pct_customelement_groupsp.delete') === false )
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
				
				if (\Contao\Input::get('act') == 'deleteAll' && !$objSecurity->isGranted('contao_user.pct_customelement_groupsp.delete') === false )
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
	 * Return the edit field button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function editButton($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_attributesp.edit')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
	}
	
	/**
	 * Return the delete field button
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
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_attributesp.delete')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
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
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_attributesp.create')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
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
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_attributesp.cut')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)).' ';
	}
	
	/**
	 * Return available field types as array
	 * @param DataContainer
	 */
	public function getAttributes($objDC)
	{
		$objCE= new CustomElements();
		
		$return = $objCE->getAttributeNames();
		natcasesort($return);
		return $return;
	}
	
	/**
	 * Return rgxp options as array
	 * @return array
	 */
	public function getRgpxOptions()
	{
		return array('alias','alnum','alpha','date','datim','digit','email','emails','extnd','friendly','folderalias','phone','prcnt','url','time');
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
		$table = 'tl_pct_customelement_attribute';
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
}