<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Widgets;

/**
 * Imports
 */

use Contao\ArrayUtil;
use Contao\StringUtil;
use PCT\CustomElements\Core\CustomElements as CustomElements;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Core\AttributeFactory as AttributeFactory;
use PCT\CustomElements\Core\Controller;
use PCT\CustomElements\Core\GroupFactory as GroupFactory;
use PCT\CustomElements\Core\Vault as Vault;

/**
 * Class file
 * WidgetCustomElement
 */
class WidgetCustomElement extends \Contao\Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput  = false;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate   = 'be_widget_customelement';

	/**
	 * Groups
	 * @var array
	 */
	protected $arrGroups  = array();

	/**
	 * Fields array
	 * @var array
	 */
	protected $arrFields = array();

	/**
	 * Attributes array
	 * @var array
	 */
	protected $arrAttributes = array();

	/**
	 * DataContainer
	 * @var object
	 */
	protected $objDataContainer = null;

	/**
	 * Active database result
	 * @var object
	 */
	protected $objActiveRecord = null;
	
	/**
	 * Custom element object
	 * @var object
	 */
	protected $objCustomElement = null;

	/**
	 * Selection field
	 * @var string
	 */
	protected $strSelectionField = '';
	
	

	/**
	 * Initialize the widget
	 * @param array
	 */
	public function __construct($arrAttributes=array())
	{
		$this->import(\Contao\BackendUser::class, 'User');	
		
		if($arrAttributes)
		{
			$this->arrAttributes = $arrAttributes;
		}
		
		if($this->arrAttributes['objDataContainer'])
		{
			$this->objDataContainer = $this->arrAttributes['objDataContainer'];
		}
		
		if($this->arrAttributes['objActiveRecord'])
		{
			$this->objActiveRecord = $this->arrAttributes['objActiveRecord'];
		}
		
		// set the custom element
		if( isset($this->arrAttributes['objCustomElement']) )
		{
			$this->setCustomElement($this->arrAttributes['objCustomElement']);
		}
		
		// set the selection field 
		if( isset($this->arrAttributes['strSelectionField']) )
		{
			$this->strSelectionField = $this->arrAttributes['strSelectionField'];
		}
		else
		{
			// get the selection field for the current table
			$this->strSelectionField = CustomElements::getSelectionField(\Contao\Input::get('table'));
		}
		
		// has an attribute id
		if( isset($this->arrAttributes['intGenericAttribute']) && $this->arrAttributes['intGenericAttribute'] > 0)
		{
			$this->intGenericAttribute = $this->arrAttributes['intGenericAttribute'];
		}
		
		parent::__construct($arrAttributes);
	}


	/**
	 * Getters
	 * @param string
	 */
	public function get($strKey)
	{
		if(isset($this->$strKey))
		{
			return $this->$strKey;
		}
		else if(array_key_exists($strKey, $this->arrAttributes))
		{
			return $this->arrAttributes[$strKey];
		}
		else
		{
			return null;
		}
	}


	/**
	 * Setters
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		if(isset($this->$strKey) || is_null($this->$strKey))
		{
			$this->$strKey = $varValue;
		}
		else if(array_key_exists($strKey, $this->arrAttributes))
		{
			$this->arrAttributes[$strKey] = $varValue;
		}
		else
		{
			return null;
		}
	}


	/**
	 * Get the data container object
	 * @return object
	 */
	public function getDC()
	{
		if(!$this->get('objDataContainer'))
		{
			$objDC = new \PCT\CustomElements\Helper\DataContainerHelper();
			$objDC->table = \Contao\Input::get('table');
			$objDC->id = \Contao\Input::get('id');
			$this->set('objDataContainer',$objDC);
		}
		
		return $this->get('objDataContainer');
	}


	/**
	 * Get the active db record
	 * @return object
	 */
	public function getActiveRecord()
	{
		if(!$this->get('objActiveRecord'))
		{
			$strModel = \Contao\Model::getClassFromTable($this->getDC()->table) ?? '';
			if(class_exists($strModel))
			{
				if( \method_exists($strModel,'setTable') )
				{
					$strModel::setTable( $this->getDC()->table );
				}
				$objActiveRecord = $strModel::findByPk($this->getDC()->id);
			}
			else
			{
				$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$this->getDC()->table." WHERE id=?")->limit(1)->execute($this->getDC()->id);
			}
			
			$this->set('objActiveRecord',$objActiveRecord);
			
			return $objActiveRecord;
		}
		
		return $this->get('objActiveRecord');
	}


// ! From Record	
	
	/**
	 * Build the groups from a database record
	 * @return array
	 */
	public function buildGroupsFromRecord($arrData)
	{
		$arrReturn = array();
		$arrUuids = array();
		
		$arrReturn['alias'] = $arrData['alias'];
		$arrReturn['tstamp'] = $arrData['tstamp'];
		$intGeneric = $arrData['generic_attribute'] ?? 0;
		
		$tstamp = $arrReturn['tstamp'];

		$arrReturn['clones'] = array();
		$arrClones = array();
		if( isset($arrData['clones']) && is_array($arrData['clones']) )
		{
			$arrReturn['clones'] = $arrData['clones'];
			$arrClones = $arrReturn['clones'];
		}

		// backwards compatibility: migrate the old array structure
		if(is_array($arrData['groups']))
		{
			$arrData = $arrData['groups'];
		}
		
		unset($arrData['tstamp']);
		unset($arrData['clones']);
		unset($arrData['uuids']);
		
		// check flag if we need to update the whole wizard
		if(CustomElementFactory::hasChangedByTimestamp($tstamp))
		{
			// check if there are new groups
			$arrCompare = $this->buildGroupsFromObject();
			
			$arrValidatedGroups = array();
			foreach($arrData as $i => $data)
			{
				$ident = $data['ident'];
				$groupId = $data['group_id'];
				$isCopy = $data['isCopy'] ?? false;
				$copyIndex = $data['numCopy'] ?? 0;
				$group_alias = $data['group_alias'];
				
				// check if group is still published
				$objGroup = GroupFactory::findPublishedById($groupId);
				
				if($objGroup === null)
				{
					$arrValidatedGroups[] = $groupId;
					continue;
				}
				
				$arrData[$i]['sorting'] = $objGroup->get('sorting');
				
				// check attributes in the current group
				$arrAttributes = $objGroup->getAttributes();
				if(empty($arrAttributes))
				{
					continue;
				}
				
				$tmp = array();
				foreach($arrAttributes as $objAttribute)
				{
					if(!$objAttribute)
					{
						continue;
					}

					// store the generic attribute
					$objAttribute->genericAttribute = $intGeneric;

					$uuid = $objAttribute->get('uuid');
					// find the uuid for the attribute from the list of copies of this attribute
					if($isCopy)
					{
						$uuid = $arrClones[$objAttribute->get('id')][$copyIndex] ?? '';
						if(!$uuid || strlen($uuid) < 1)
						{
							$uuid = AttributeFactory::generatePassword();
						}
					}
					$tmp[] = array('id'=>$objAttribute->get('id'),'uuid'=>$uuid);
				}
				$arrData[$i]['attributes'] = $tmp;
				unset($tmp);
				
				$arrValidatedGroups[] = $groupId;
			}
			
			// remove processed groups from compare array
			if(count($arrValidatedGroups) > 0 && count($arrCompare) > 0)
			{
				foreach($arrCompare as $k => $objGroup)
				{
					if(in_array($objGroup->id, $arrValidatedGroups))
					{
						unset($arrCompare[$k]);
						continue;
					}
				}
			}
			
			// append new groups if there are still groups left
			if(count($arrCompare) > 0)
			{
				foreach($arrCompare as $k => $objGroup)
				{
					if( !isset($objGroup->numCopy) )
					{
						$objGroup->numCopy = 0;
					}

					$newData = array
					(
						'ident' 	=> $objGroup->get('id').'_'.($objGroup->numCopy > 0 ? $objGroup->numCopy : 0),
						'group_id'	=> $objGroup->get('id'),
					);
					
					if( isset($objGroup->isCopy) && $objGroup->isCopy) 
					{
						$newData['isCopy'] = true;
					}
					
					$newData['sorting'] = $objGroup->get('sorting');
					
					$arrAttributes = $objGroup->getAttributes();
					if(empty($arrAttributes) || count($arrAttributes) < 1)
					{
						continue;
					}
					
					$tmp = array();
					foreach($arrAttributes as $objAttribute)
					{
						$uuid = $objAttribute->get('uuid');
						// generate a new uuid here for new attributes in duplicated groups to make field unique
						if( isset($objGroup->isCopy) && $objGroup->isCopy ) 
						{
							$uuid = AttributeFactory::generatePassword();
						}
						$tmp[] = array('id'=>$objAttribute->get('id'),'uuid'=>$uuid);
					}
					$newData['attributes'] = $tmp;
					unset($tmp);
					
					$arrData[] = $newData;
				}
			}
			
			if(empty($arrData))
			{
				return array();
			}
			
			$arrOrdered = array();

			// bring groups in correct order
			foreach($arrData as $k => $data)
			{
				$sorting = $data['sorting'] ?? 0;
				
				if( isset($arrOrdered[$sorting]) && isset($data['numCopy']) )
				{
					$sorting += $data['numCopy'];
				}

				$arrOrdered[$sorting] = $data;
			}
			ksort($arrOrdered);
		
			$arrData = $arrOrdered;
		}
		
		if(empty($arrData))
		{
			return array();
		}
		
		foreach($arrData as $index => $data)
		{
			$objGroup = null;
			// look up from cache
			if(isset($GLOBALS['PCT_CUSTOMELEMENTS']['cache']['group'][$data['group_id']]))
			{
				$objGroup = clone($GLOBALS['PCT_CUSTOMELEMENTS']['cache']['group'][$data['group_id']]);
			}
			else
			{
				// store a copy of the processed group object in the cache for further use
				$objGroup = GroupFactory::findById($data['group_id']);
				if(!$objGroup)
				{
					continue;
				}
				$GLOBALS['PCT_CUSTOMELEMENTS']['cache']['group'][$data['group_id']] = clone($objGroup);
			}
				
			$copyCount = 0;
			
			// remember the copy
			if( isset($data['isCopy']) && $data['isCopy'])
			{
				$objGroup->isCopy = 1;
				$objGroup->numCopy = $data['numCopy'];
				$objGroup->pgroup = $data['pgroup'];
				$objGroup->identifyer = $data['ident'];
				$copyCount = $objGroup->numCopy;
			}
			
			$arrAttributes = array();
			foreach($data['attributes'] as $attribute)
			{
				$objAttribute = AttributeFactory::findPublishedById($attribute['id']);
				if(!$objAttribute)
				{
					continue;
				}

				// pass the CustomElement object to the attribute
				$objAttribute->set('objCustomElement', $this->getCustomElement() );
				$objAttribute->genericAttribute = $intGeneric;

				// flag as copy and update the uuid for generic attributes
				if( isset($data['isCopy']) && $data['isCopy'])
				{
					$objAttribute->isCopy = true;
					$objAttribute->uuid = $attribute['uuid'];
				}
				
				$arrAttributes[] = $objAttribute;
				$arrUuids[] = $attribute['uuid']; 
			}
			
			$objGroup->set('arrAttributes',$arrAttributes);
				
			$arrReturn['groups'][] = $objGroup;
			unset($objGroup);
		}
		
		$arrReturn['uuids'] = $arrUuids;
		return $arrReturn;
	}
	
	
	/**
	 * Build groups from a CustomElement object
	 * @return array
	 */
	public function buildGroupsFromObject()
	{
		$objDC = $this->getDC();
		$strModel = \Contao\Model::getClassFromTable( $objDC->table );
		if (class_exists($strModel))
		{
			if( \method_exists($strModel,'setTable') )
			{
				$strModel::setTable( $objDC->table );
			}
			$objModel = $strModel::findByPk($objDC->id);
		}

		$objCustomElement = $this->getCustomElement();
		
		$objOrigin = new \PCT\CustomElements\Core\Origin();
		$objOrigin->set('intPid',$objDC->id );
		$objOrigin->set('strTable', $objDC->table );
		$objOrigin->set('objActiveRecord',$objModel);
		$objOrigin->set('intGenericAttribute',$objCustomElement->getGenericAttribute());
		
		$objCustomElement->setOrigin($objOrigin);
		$objCustomElement->generate();
		
		return $objCustomElement->getGroups();
	}
	
	
	/**
	 * Return the custom element corresponding to the widget
	 * @return object
	 */
	public function getCustomElement()
	{
		// allow individual custom elements
		if($this->get('objCustomElement'))
		{
			return $this->get('objCustomElement');
		}
		
		return \PCT\CustomElements\Core\CustomElementFactory::findByAlias($this->getActiveRecord()->{$this->strSelectionField});
	}
	
	
	/**
	 * Set a custom element for this widget
	 * @param object
	 */
	public function setCustomElement($objCustomElement)
	{
		$this->set('objCustomElement',$objCustomElement);
	}

// ! Generate: Build the wizard	
	
	/**
	 * Build the groups for a specific record
	 * @param integer
	 * @param string	Table name
	 * @return array
	 */
	protected function buildGroups($intPid=0,$strTable='')
	{
		if($intPid < 1) {$intPid = $this->getDC()->id;}
		if(strlen($strTable) < 1) {$strTable = $this->getDC()->table;}
		
		$selectionfield = $this->strSelectionField;
		$arrGroups = array();
		$arrClones = array();
		
		$bolReload = false;
		$blnSave = false;
		
		// fetch the custom element data
		$objCustomElement = $this->getCustomElement();
		$intGeneric = $objCustomElement->getGenericAttribute() ?: '';
		$strAlias = $objCustomElement->get('alias');
		#$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();

		$arrWizard = Vault::getWizardData($intPid,$strTable,$intGeneric);

		if(!is_array($arrWizard))
		{
			return array();
		}
		
		// check integrity e.g. after importing a customelement preset
		if(isset($arrWizard['customelement']) && $arrWizard['customelement'] != $objCustomElement->get('id'))
		{
			$arrWizard = $this->checkIntegrity($arrWizard);
		}
		else if(count($arrWizard) > 0 && $arrWizard['alias'] == $this->getActiveRecord()->{$selectionfield} && $arrWizard['tstamp'] != $objCustomElement->get('tstamp'))
		{
			$arrWizard = $this->checkIntegrity($arrWizard);
		}
		
		// build the structure by existing data
		if(count($arrWizard) > 0 && is_array($arrWizard))
		{
			$data = array();
			// build the groups by an existing record (default behavior)
			if($arrWizard['alias'] == $this->getActiveRecord()->{$selectionfield})
			{
				$data = $this->buildGroupsFromRecord($arrWizard);
			}
			// rebuild because the CE has changed
			else if($arrWizard['alias'] != $this->getActiveRecord()->{$selectionfield})
			{
				$data['groups'] = $this->buildGroupsFromObject();
			}
			// check the wizard structure and rebuild it if it is not up to date
			else
			{
				$data = $this->migrate($arrWizard);
			}
			
			$arrGroups = $data['groups'] ?? array();
			$arrClones = $data['clones'] ?? array();
		}
		else
		{
			$arrGroups = $this->buildGroupsFromObject();
		}
		
		if(empty($arrGroups))
		{
			return array();
		}
		
		if(!is_array($arrClones))
		{
			$arrClones = array();
		}
		
		//! duplicate a group
		$strCommand = '';
		if( \Contao\Input::get('cmd_copygroup') && \Contao\Input::get('ce_attr') == $intGeneric )
		{
			$strCommand = 'cmd_copygroup';
			$tmp = explode('_', \Contao\Input::get($strCommand));
			$groupId = $tmp[1];
			$ident = $tmp[1].'_'.$tmp[2];
			$index = $this->findIndexByIdentifyer($ident, $arrGroups);
			
			// find highest copy count and current number of copies
			$copy = 0;
			$count = 0;
			foreach($arrGroups as $group)
			{
				if($groupId == $group->get('id'))
				{
					$copy++;
				}
				if($groupId == $group->get('id') && $group->numCopy > $count)
				{
					$count = $group->numCopy;
				}
			}

			if( isset($arrGroups[$index]) )
			{
				// create clone
				$objClone = clone($arrGroups[$index]);
				$objClone->createCopy = true;
				$objClone->isCopy = true;
				$objClone->numCopy = $copy; #$objClone->numCopy > 0 ? $objClone->numCopy + 1 : 1;
				$objClone->count = $count;
				$objClone->pgroup = $arrGroups[$index]->get('id'); 
				ArrayUtil::arrayInsert($arrGroups,$index+1,array($objClone));
			}
			
			// reload if it is not an ajax request
			if(!\Contao\Input::get('ajax'))
			{
				$bolReload = true;
			}
		
			$blnSave = true;
		}
		//! remove a group
		$arrRemoveClones = array();
		if( \Contao\Input::get('cmd_deletegroup') && \Contao\Input::get('ce_attr') == $intGeneric )
		{
			$strCommand = 'cmd_deletegroup';
			$ident = str_replace('group_', '', \Contao\Input::get($strCommand));
			$index = $this->findIndexByIdentifyer($ident, $arrGroups);
			$objRemove = $arrGroups[$index] ?? null;
			if ( $objRemove !== null )
			{
				$arrAttributes = $objRemove->get('arrAttributes');
				if(count($arrAttributes) > 0)
				{
					foreach($arrAttributes as $objAttribute)
					{
						if( isset($arrClones[$objAttribute->get('id')][$objRemove->numCopy]) && $arrClones[$objAttribute->get('id')][$objRemove->numCopy])
						{
							$arrRemoveClones[] = $arrClones[$objAttribute->get('id')][$objRemove->numCopy];
							// remove the clone
							unset($arrClones[$objAttribute->get('id')][$objRemove->numCopy]);
						}
					}
				}
				
				// delete the group
				unset($arrGroups[$index]);
				
				// reload if it is an ajax request
				if(!\Contao\Input::get('ajax'))
				{
					$bolReload = true;
				}
				
				$blnSave = true;
			}
		}
		
		//! move a group
		if(\Contao\Input::get('cmd_cutgroup') && \Contao\Input::get('ce_attr') == $intGeneric)
		{
			$strCommand = 'cmd_cutgroup';
			$pid = $this->findIndexByIdentifyer(\Contao\Input::get('pgroup'), $arrGroups);
			$ident = str_replace('group_', '', \Contao\Input::get($strCommand));
			if(\Contao\Input::get('mode') == 'paste')
			{
				$index = $this->findIndexByIdentifyer($ident, $arrGroups);
				
				$cutGroup = $arrGroups[$pid];
				
				unset( $arrGroups[$pid] );


				ArrayUtil::arrayInsert($arrGroups,$index,array($cutGroup));
				
				// reload if it is not an ajax request
				if(!\Contao\Input::get('ajax'))
				{
					$bolReload = true;
				}
			}
			
			$blnSave = true;
		}
		
		$objDC = $this->getDC();
		$arrTmp = array();
		$arrData = array();
		$arrUuids = $arrWizard['uuids'] ?? array();
		$arrValues = $arrWizard['values'] ?? array();
		
		$blnSubmitted = false;
		if(\Contao\Input::post('FORM_SUBMIT') == $objDC->table)
		{
			$blnSubmitted = true;
			$blnSave = true;
		}
		
		foreach($arrGroups as $index => $objGroup)
		{
			// check permission and published settings
			if(!$objGroup->hasAccess() || !$objGroup->get('published'))
			{
				continue;
			}

			if( !isset($objGroup->numCopy) )
			{
				$objGroup->numCopy = 0;
			}
			if( !isset($objGroup->isCopy) )
			{
				$objGroup->isCopy = 0;
			}
			
			$ident = $objGroup->get('id').'_'.$objGroup->numCopy;
			
			$arrData[$index] = array
			(
				'ident'			=> $ident,
				'group_id'		=> $objGroup->get('id'),
				'group_alias'	=> $objGroup->get('alias'),
				'attributes' 	=> array(),
			);
			
			// mark group as copy or remember that it is a copy
			if($objGroup->isCopy)
			{
				$arrData[$index]['isCopy']		= 1;
				$arrData[$index]['pgroup']		= $objGroup->pgroup;
				$arrData[$index]['numCopy']		= $objGroup->numCopy;
			}
			
			$arrAttributes = $objGroup->get('arrAttributes');
			
			if(count($arrAttributes) < 1)
			{
				continue;
			}
			
			$arrFields = array();
			foreach($arrAttributes as $i => $objAttribute)
			{
				// check permission
				if(!$objAttribute->hasAccess())
				{
					continue;
				}
				
				$objAttribute->set('objCustomElement',$objCustomElement);
				$objAttribute->genericAttribute = $intGeneric;
				// pass the CustomElement object to the attribute

				$strField = $objAttribute->get('uuid');
								
				// flag attribute to create a whole new copy
				if( isset($objGroup->createCopy) && $objGroup->createCopy)
				{
					$objAttribute->createCopy = true;
				}
				
				// tell the attribute that it is from a cloned group
				if( isset($objGroup->isCopy) && $objGroup->isCopy)
				{
					$objAttribute->isCopy = true;
					$objAttribute->numCopy = $objGroup->numCopy > 0 ? $objGroup->numCopy : 1;
					$objAttribute->posCopy = $index;
					
					$strField = $objAttribute->uuid;
				}
				
				// get the value from the wizard data
				if(isset($arrWizard['values']) && isset($arrWizard['values'][$strField]) && !$blnSave && !$blnSubmitted)
				{
					$varValue = $arrWizard['values'][$strField];
					
					// binary data
					if(!is_array($varValue))
					{
						if(\Contao\Validator::isStringUuid($varValue))
						{
							$varValue = \Contao\StringUtil::uuidToBin($varValue);
						}
					}
					$objAttribute->setValue($varValue);
				}
				
				// generate the attribute
				$arrField = $objAttribute->prepareForDca($objDC);
				$strField = $arrField['name'];
				
				// wizard data
				$arrData[$index]['attributes'][$i] = array
				(
					'uuid'	=> $strField,
					'id'	=> $arrField['id'],
					'alias'	=> $objAttribute->get('alias'),
				);
				
				if( isset($objAttribute->isCopy) && $objAttribute->isCopy )
				{
					$arrData[$index]['attributes'][$i]['alias'] = $objAttribute->get('alias').'#'.$objGroup->numCopy;
				}
				
				// store the value
				if($blnSubmitted)
				{
					$saveDataAs = $objAttribute->get('saveDataAs') ?: 'data';
					$value = \Contao\Input::postRaw($strField);
					
					// run the storeValue Hook here
					$arrSet = \PCT\CustomElements\Core\Hooks::callstatic( 'storeValueHook',array($objAttribute->get('id'),array($saveDataAs=>$value)) );
					
					if($arrSet[$saveDataAs] != $value)
					{
						$value = $arrSet[$saveDataAs];
					}
					
					// set value
					$arrValues[$strField] = $value;
					
					// store option values
					$arrOptions = StringUtil::deserialize($objAttribute->get('options'));
					if(!empty($arrOptions) && is_array($arrOptions))
					{
						foreach($arrOptions as $option)
						{
							if( \is_array($option) )
							{
								continue;
							}

							$field = $strField.'_'.$option;
							if(isset($_POST[$field]))
							{
								$arrValues[$field] = \Contao\Input::postRaw($field);
							}
						}
					}
				}
				
				// store the clone 
				if( isset($objAttribute->createCopy) && $objAttribute->createCopy)
				{
					$arrClones[$objAttribute->get('id')][$objAttribute->numCopy] = $strField;
				}
				
				$arrFields[] = $arrField;
				// store generated fields in public scope
				$this->arrFields[] = $arrField;
				
				// reset to avoid recreation on page reload
				$objAttribute->createCopy = false;
				
				$arrUuids[] = $strField;
			}
				
			// update the group object with the generated fields
			$objGroup->set('arrFields',$arrFields);
			
			$arrTmp[$index] = $objGroup;
		}
		$arrGroups = $arrTmp;
		unset($arrTmp);
		
		$arrSetData = array();
		if($blnSubmitted)
		{
			$arrSetData['values'] = $arrValues;
		}

		$arrUuids = array_unique($arrUuids);
		
		// store the processed field uuids in the session
		$objSession->set('loadCustomElementFields',$arrUuids);
		
		if($blnSave)
		{
			$arrSetData['groups'] = $arrData;
			if( empty($arrClones) === false )
			{
				$arrSetData['clones'] = $arrClones;
			}
			$arrSetData['tstamp'] = $objCustomElement->get('tstamp');
			$arrSetData['alias'] = $strAlias;
			$arrSetData['uuids'] = $arrUuids;
			$arrSetData['values'] = $arrValues;
			$arrSetData['version'] = PCT_CUSTOMELEMENTS_VERSION;
			$arrSetData['customelement'] = $objCustomElement->get('id');
			
			if( $intGeneric > 0 )
			{
				$arrSetData['generic_attribute'] = $intGeneric;
			}
		
			// update the wizard record
			$arrOptions = array
			(
				'data'			=> $strAlias,
			);
			
			// store the attribute id to the wizard data
			if( $intGeneric > 0 )
			{
				$arrOptions['attr_id'] = $intGeneric;
			}
			
			Vault::saveWizardData($arrSetData,$intPid,$strTable,$arrOptions);

			// clear sessions
			#$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();

			// clear the registry sessions
			$arrSession = $objSession->get('pct_customelements');
			unset($arrSession['registry']);
			$objSession->set('pct_customelements',$arrSession);
			
			if($blnSubmitted)
			{
				// clear the processed field uuids in the session
				$objSession->remove('loadCustomElementFields');
				// clear the dca session
				$arrDcaSession = $objSession->get('CUSTOMELEMENTS_DCA');
				unset($arrDcaSession[$strTable]);
				$objSession->set('CUSTOMELEMENTS_DCA',$arrDcaSession);
			}
		}
		
		
		if($bolReload)
		{
			$url = preg_replace('/&(amp;)?cid=[^&]*/i', '', preg_replace('/&(amp;)?'.preg_quote($strCommand, '/') . '=[^&]*/i', '', \Contao\Environment::get('request')));
			$url = preg_replace('/&(amp;)?pgroup=[^&]*/i', '', preg_replace('/&(amp;)?'.preg_quote('pgroup', '/') . '=[^&]*/i', '', $url));
			$url = preg_replace('/&(amp;)?mode=[^&]*/i', '', preg_replace('/&(amp;)?'.preg_quote('mode', '/') . '=[^&]*/i', '',$url));
			
			$this->redirect($url);
		}
		
		return $arrGroups;
	}	
	

	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		// include the styling
		$GLOBALS['TL_CSS'][] = 'system/modules/pct_customelements/assets/css/styles.css';

		// include the scripts
		#$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pct_customelements/assets/js/be_moo_fxslide.js';

		// prepare the groups
		$this->set('arrGroups', $this->buildGroups() );
		
		// create the backend template
		$objTemplate = new \Contao\BackendTemplate($this->strTemplate);
		
		// session
		#$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();

		$arrtogglerSession = $objSession->get('pct_customelements_togglers');
		
		if(count($this->get('arrGroups')) < 1)
		{
			$objTemplate->empty = $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['widget']['empty'];
			return $objTemplate->parse();
		}
		
		// count the number of copies for each group
		$arrCopyCount = array();
		foreach($this->get('arrGroups') as $index => $objGroup)
		{
			$arrCopyCount[$objGroup->get('id')] = 0;
			if($objGroup->isCopy)
			{
				$arrCopyCount[$objGroup->get('id')] += 1;
			}
		}

		// generic CE
		$objCustomElement = $this->getCustomElement();
		
		$intGeneric = $objCustomElement->getGenericAttribute();
		
		// generate the html output
		$i = 0;
		$arrGroups = array();
		foreach($this->get('arrGroups') as $index => $objGroup)
		{
			// unique identifyer for this group
			$ident = $objGroup->get('id').'_'.$objGroup->numCopy;
			// current copies count
			$copyCount = $arrCopyCount[$objGroup->get('id')] ?? 0;
			
			if(count($objGroup->get('arrFields')) < 1)
			{
				continue;
			}
			
			$arrFields = array();
			foreach($objGroup->get('arrFields') as $z => $arrField)
			{
				// field classes
				$arrClass = array('field_'.$z);
				$z == 0 ? $arrClass[] = 'first' : '';
				$z%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
				$z >= count($objGroup->get('arrFields'))-1 ? $arrClass[] = 'last' : '';
				
				// add a sortable class
				if( isset($arrField['fieldDef']['sortable']) && $arrField['fieldDef']['sortable']) 
				{
					$arrClass[] = 'is_sortable';
				}
				
				// inject classes
				$preg = preg_match('/class="(.*?)\"/', $arrField['html'],$result);
				if($preg)
				{
					$class = explode(' ', $result[1]);
					$arrClass = array_unique(array_merge($arrClass,$class));
					$arrField['html'] = str_replace($result[1], implode(' ', $arrClass), $arrField['html']);
				}
			
				$arrFields[] = $arrField;
				
			}
			
			// group classes
			$arrClass = array('group','group_'.$i);
			$i == 0 ? $arrClass[] = 'first' : '';
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			$i >= count($this->get('arrGroups'))-1 ? $arrClass[] = 'last' : '';
			
			// add class hidden
			if($objGroup->get('hidden'))
			{
				$arrClass[] = 'hidden';
			}
			
			// legend hide
			if($objGroup->get('legend_hide'))
			{
				$arrClass[] = 'legend_hide';
			}

			// create buttons
			$arrButtons = array();
			if( $objGroup->isCopy )
			{
				$arrButtons['delete'] = $this->deleteButton($objGroup,$ident);
			}
			$arrButtons['copy'] = $this->copyButton($objGroup,$ident);
			$arrButtons['cut'] = $this->cutButton($objGroup,$ident);
			

			$strButtons = implode('', $arrButtons);
			
			// title
			$strTitle = $objGroup->getTranslatedLabel() ?: $objGroup->get('title');
			
			$blnActive = true;
			
			if(!isset($arrtogglerSession['group_toggler_'.$ident]) && $objGroup->get('legend_hide'))
			{
				$blnActive = false;
			}
			
			if( isset($arrtogglerSession['group_toggler_'.$ident]) && $arrtogglerSession['group_toggler_'.$ident] == 'open')
			{
				$blnActive = false;
			}
			
			$arrGroups[] = array
			(
				'id'  		=> $objGroup->get('id'),
				'ident'		=> $ident,
				'count'		=> ($copyCount > 0 ? $copyCount : 0),
				'numcopy'	=> ($objGroup->numCopy > 0 ? $objGroup->numCopy : 0),
				'cssID'		=> 'id="group_'.$ident.'"', 
				'title'  	=> $strTitle,
				'class'   	=> trim(implode(' ', $arrClass)),
				'fields'  	=> $arrFields,
				'buttons'  	=> $strButtons,
				'isLegend' 	=> $objGroup->get('isLegend'),
				'legend_hide' => $objGroup->get('legend_hide') ? 'legend_hide' : '',
				'isActive' => $blnActive,
			);

			$i++;
		}
		
		$objTemplate->groups = $arrGroups;
		$objTemplate->genericAttribute = $intGeneric;
		$objTemplate->customelement_raw = $objCustomElement;
		
		// remove the update flag
		$objSession->remove('customelements_widget_has_changed');
		
		// render a clipboard delete button
		if(\Contao\Input::get('cmd_cutgroup') && (\Contao\Input::get('ce_attr') == $intGeneric || \Contao\Input::get('ce_attr') == ''))
		{
			$objTemplate->clipboard = $this->clearClipboardButton();
		}
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Get all generic fields that should be injected in the current DCA
	 * @object DataContainer
	 * @return array
	 */
	protected function prepareForWidgets()
	{
		$arrReturn = array();
		
		$arrGroups = array();
		if(empty($this->arrGroups))
		{
			$arrGroups = $this->buildGroups();
		}
		else
		{
			$arrGroups = $this->arrGroups;
		}
		
		if(empty($arrGroups))
		{
			return array();
		}
		
		foreach($arrGroups as $index => $objGroup)
		{
			$arrAttributes = $objGroup->get('arrAttributes');
			foreach($arrAttributes as $objAttribute)
			{
				// tell the attribute that it is from a cloned group
				if($objGroup->createCopy)
				{
					$objAttribute->createCopy = true;
				}
				$arrFields[] = $objAttribute->prepareForDca($this->getDC());
			}
			
			$arrReturn[$index] = array
			(
				'group_id'	=> $objGroup->get('id'),
				'index'		=> $index,
				'fields' 	=> $arrFields,
			);
		}
		
		return $arrReturn;
	}
	
	/**
	 * Return all fields that need to be rendered
	 * @param DataContainer
	 * @return array
	 */
	public function getFields()
	{
		if(!empty($this->get('arrFields')))
		{
			return $this->get('arrFields');
		}
		
		$arrGroups = $this->prepareForWidgets();
		$arrFields = array();
		foreach($arrGroups as $arrGroup)
		{
			foreach($arrGroup['fields'] as $field)
			{
				$arrFields[] = $field;
			}
		}
		
		return $arrFields;
	}


	/**
	 * Build the groups view in widget
	 * @param array
	 * @return array
	 */
	protected function mergeGroups($objGroup,$start=0,$arrGroups=array())
	{
		$arrAttributes = $objGroup->get('arrAttributes');
		if(count($arrAttributes) < 1)
		{
			return null;
		}
		
		$start++;
		$objNextGroup = $arrGroups[$start];
		if($objNextGroup)
		{
			$arrNextAttributes = $objNextGroup->get('arrAttributes');
			if(!$objNextGroup->get('isLegend') && !empty($arrNextAttributes))
			{
				$objGroup->set('arrAttributes',array_merge($arrAttributes,$arrNextAttributes) );
				unset($arrGroups[$start]);
			}
			return $this->mergeGroups($objGroup,$start,$arrGroups);
		}
		
		return $arrGroups;
	}


	/**
	 * Return the copy group button
	 * @param object
	 * @return string
	 */
	public function copyButton($objGroup,$intGroupIndex)
	{
		$objCustomElement = $this->getCustomElement();
		$intGeneric = $objCustomElement->getGenericAttribute();
		
		$fileType = 'svg';

		$selector = 'group_'.$intGroupIndex;
		$icon = 'copy.svg';
		$class = 'button copy_group';
		
		$token = \Contao\Input::get('rt');
		if(empty($token))
		{
			$token = Controller::request_token();
		}
		
		$href = $this->addToUrl('cmd_copygroup='.$selector.( (int)$intGeneric > 0 ? '&ce_attr='.$intGeneric : '').'&rt='.$token);
		$title = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['button_copy'], $objGroup->get('id'));
		if($objGroup->get('allowCopy'))
		{
			$attributes = 'onclick="Backend.getScrollOffset(); return CustomElements.duplicateGroup(this,'.$selector.');"';
			$link = \Contao\Image::getHtml($icon, $objGroup->get('title'));
			$strReturn = sprintf('<a class="%s" href="%s" title="%s" %s>'.$link.'</a>',$class,$href,$title,$attributes);
		}
		else
		{
			$attributes = '';
			$link = \Contao\Image::getHtml(preg_replace('/\.'.$fileType.'$/i', '_.'.$fileType, $icon));
			$strReturn = sprintf('<span class="%s" title="%s" %s>'.$link.'</span>',$class,$href,$title,$attributes);
		}
		
		return $strReturn;
	}
	
	
	/**
	 * Return the delete group button
	 * @param object
	 * @return string
	 */
	public function deleteButton($objGroup,$intGroupIndex)
	{
		$selector = 'group_'.$intGroupIndex;
		$icon = 'delete.svg';
		$link = \Contao\Image::getHtml($icon, $objGroup->get('title'));
		$class = 'button delete_group';
		$token = \Contao\Input::get('rt');
		if(empty($token))
		{
			$token = Controller::request_token();
		}
		$href = $this->addToUrl('&cmd_deletegroup='.$selector.'&rt='.$token);
		$title = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['button_delete'], $objGroup->get('id'));
		$attributes = 'onclick="Backend.getScrollOffset();return CustomElements.deleteGroup(this,'.$selector.');"';
		$strReturn = sprintf('<a class="%s" href="%s" title="%s" %s>'.$link.'</a>',$class,$href,$title,$attributes);
		return $strReturn;
	}
	
	/**
	 * Return the cut/paste button
	 * @param object
	 * @return string
	 */
	public function cutButton($objGroup,$intGroupIndex)
	{
		$fileType = 'svg';
		$selector = 'group_'.$intGroupIndex;
		$icon = 'cut.'.$fileType;
		$intGeneric = $this->getCustomElement()->getGenericAttribute();
		
		$token = \Contao\Input::get('rt');
		if(empty($token))
		{
			$token = Controller::request_token();
		}
		$class = 'button cut_group';
		$href = $this->addToUrl('cmd_cutgroup=group_'.$intGroupIndex.'&mode=cut&pgroup='.$intGroupIndex.($intGeneric ? '&ce_attr='.$intGeneric:'').'&rt='.$token );
	
		// paste mode, show clipboard
		if(\Contao\Input::get('mode') == 'cut' && (\Contao\Input::get('ce_attr') == $intGeneric || \Contao\Input::get('ce_attr') == '') )
		{
			$icon = 'pasteafter.'.$fileType;
			$href = $this->addToUrl('cmd_cutgroup='.$selector.'&mode=paste'.($intGeneric ? '&ce_attr='.$intGeneric:'').'&rt='.$token);
		}

		$title = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['button_cut'], $objGroup->get('id'));
		if($objGroup->get('allowCut') && \Contao\Input::get('cmd_cutgroup') != $selector)
		{
			$attributes = 'onclick="Backend.getScrollOffset();"';
			$link = \Contao\Image::getHtml($icon, $objGroup->get('title'));
			$strReturn = sprintf('<a class="%s" href="%s" title="%s" %s>'.$link.'</a>',$class,$href,$title,$attributes);
		}
		else
		{
			$attributes = '';
			$link = \Contao\Image::getHtml(preg_replace('/\.'.$fileType.'$/i', '_.'.$fileType, $icon));
			$strReturn = sprintf('<span class="%s" title="%s" %s>'.$link.'</span>',$class,$href,$title,$attributes);
		}

		return $strReturn;
	}
	
	/**
	 * Return the clear clipboard button
	 * @param object
	 * @return string
	 */
	public function clearClipboardButton()
	{
		$url = preg_replace('/&(amp;)?cmd_cutgroup=[^&]*/i', '', preg_replace('/&(amp;)?'.preg_quote('cmd_cutgroup', '/') . '=[^&]*/i', '', \Contao\Environment::get('request')));
		$url = preg_replace('/&(amp;)?pgroup=[^&]*/i', '', preg_replace('/&(amp;)?'.preg_quote('pgroup', '/') . '=[^&]*/i', '', $url));
		$url = preg_replace('/&(amp;)?mode=[^&]*/i', '', preg_replace('/&(amp;)?'.preg_quote('mode', '/') . '=[^&]*/i', '',$url));
		
		#$link = \Contao\Image::getHtml($icon, $label);
		$link = $GLOBALS['TL_LANG']['MSC']['clearClipboard'];
		$class = 'button header_clipboard';
		
		$token = \Contao\Input::get('rt');
		if(empty($token))
		{
			$token = Controller::request_token();
		}
		
		$href = $url.'&rt='.$token;
		$title = 'clear clipboard';
		$attributes = 'onclick="Backend.getScrollOffset();"';
		$strReturn = sprintf('<a class="%s" href="%s" title="%s" %s>'.$link.'</a>',$class,$href,$title,$attributes);
		
		return $strReturn;
	}
			
	
	/**
	 * Search the groups array for a identifyer and return position in array
	 * @param string
	 * @param array
	 * @return integer
	 */
	protected function findIndexByIdentifyer($strIdentifyer, $arrGroups)
	{
		foreach($arrGroups as $i => $objGroup)
		{
			if( !isset($objGroup->numCopy) )
			{
				$objGroup->numCopy = 0;
			}

		   $s = $objGroup->get('id').'_'. $objGroup->numCopy;
		   if($s == $strIdentifyer)
		   {
			   return $i;
		   }
		}
		
		return -1;
	}
	
	
	/**
	 * Load a version
	 * @param string	Tablename
	 * @param integer	The record ID
	 * @param integer	The Version identifier
	 */
	public function loadVersion($strTable,$intRecord,$intVersion)
	{
		\Contao\System::import('BackendUser','User');
		
		$objDatabase = \Contao\Database::getInstance();
		$objVersion = $objDatabase->prepare("SELECT * FROM tl_version WHERE fromTable=? AND pid=? AND version=? AND userid=? AND username=?")
		->limit(1)->execute($strTable,$intRecord,$intVersion,$this->User->id, $this->User->username);
		if($objVersion->numRows < 1)
		{
			return;
		}
		
		$arrVersion = \Contao\StringUtil::deserialize($objVersion->data);
		
		return (isset($arrVersion['pct_customelements']) ? $arrVersion['pct_customelements'] : array());
	}
	
	
	/**
	 * Check the integrity of a wizard data structure and return the updated structure
	 * @param array
	 * @return array
	 */
	public function checkIntegrity($arrData)
	{
		if(count($arrData['groups']) < 1)
		{
			return $arrData;
		}
		
		$groups = array();
		foreach($arrData['groups'] as $i => $group)
		{
			$groupId = $group['group_id'];
			$groupAlias = $group['group_alias'] ?? '';
			if( empty($groupAlias) && isset($GLOBALS['PCT_CUSTOMELEMENTS']['cache']['group'][$groupId]['alias']) )
			{
				$groupAlias = $GLOBALS['PCT_CUSTOMELEMENTS']['cache']['group'][$groupId]['alias'];
			}

			$isCopy = false;
			if( (isset($group['isCopy']) && $group['isCopy']) || (isset($group['is_copy']) && $group['is_copy']) )
			{
				$isCopy = true;
			}
			
			$objGroup = null;
			
			if(strlen($groupAlias) > 0)
			{
				$objGroup = GroupFactory::findByAliasAndCustomElement($groupAlias,$this->getCustomElement()->get('alias'));
			}
			// hardcore fallback to first CE version
			else if($groupId > 0 && strlen($groupAlias) < 1)
			{
				$objGroup = GroupFactory::findById($groupId);
			}
			
			if($objGroup === null)
			{
				unset($arrData['groups'][$i]);
			}
			
			if(!$objGroup)
			{
				continue;
			}
			
			if( isset($group['group_id']) && $group['group_id'] != $objGroup->get('id'))
			{
				$group['group_id'] = $objGroup->get('id');
				$group['ident'] = $objGroup->get('id').'_0';
			}
			
			if( isset($group['numCopy']) && $group['numCopy'] > 0)
			{
				$group['ident'] = $objGroup->get('id').'_'.$group['numCopy'];
				$group['pgroup'] = $objGroup->get('id');
			}
			
			if(!empty($group['attributes']) && is_array($group['attributes']))
			{
				$attributes = array();
				foreach($group['attributes'] as $attribute)
				{
					$attr_id = $attribute['id'];
					$attr_alias = $attribute['alias'];
					if(strlen(strpos($attr_alias, '#')) > 0)
					{
						$arr = explode('#', $attr_alias);
						$attr_alias = $arr[0];
						unset($arr);
					}
					
					$objAttribute = AttributeFactory::findByUuidAndCustomElement($attribute['uuid'],$this->getCustomElement()->get('alias'));
					if(!$objAttribute)
					{
						$objAttribute = AttributeFactory::findByAliasAndCustomElement($attribute['alias'],$this->getCustomElement()->get('id'));
					}
					
					if(!$objAttribute)
					{
						continue;
					}
					
					$attribute['id'] = $objAttribute->get('id');
					
					// updates the clones
					if( isset($arrData['clones'][$attr_id]) )
					{
						$arrData['clones'][$objAttribute->get('id')] = $arrData['clones'][$attr_id];
					}
					
					$attributes[] = $attribute;
				}
				$group['attributes'] = $attributes;
			}
			$groups[] = $group;
		}
		$arrData['groups'] = $groups;
		
		return $arrData;
	}
	
	
	/**
	 * Migrate the old (< 1.1.6) wizard structure to the new one
	 * @param array
	 * @return array
	 *
	 * new structure
	 * [alias]		the alias of the current CE
	 * [groups]		contains the groups
	 * [clones]		contians the uuids of the copies for each attribute
	 * [tstamp]		the timestamp of the last update
	 * [uuids]		list of all attribute uuids in the widget
	 */
	public function migrate($arrData)
	{
		$tstamp = $arrData['tstamp'];
		unset($arrData['tstamp']);
		
		if(empty($arrData))
		{
			return array();
		}
		
		$selectionfield = $this->strSelectionField;
		if(!$selectionfield)
		{
			$selectionfield = \PCT\CustomElements\Core\CustomElements::getSelectionField($this->getActiveRecord()->table);
		}
		
		$objCustomElement = \Contao\Database::getInstance()->prepare("SELECT id,tstamp,alias FROM tl_pct_customelement WHERE alias=?")->limit(1)->execute($this->getActiveRecord()->{$selectionfield});
		if($objCustomElement->numRows < 1 || strlen($objCustomElement->alias) < 1)
		{
			return array();
		}
		
		$arrNew = array();
		
		$arrNew['tstamp'] = $tstamp;
		$arrNew['alias'] = $objCustomElement->alias;
		
		$clones = array();
		$groups = array();
		$uuids = array();
		foreach($arrData as $i => $data)
		{
			$copyIndex = ($data['numCopy'] > 0 ? $data['numCopy'] : 0);
			$ident = $data['group_id'].'_'.$copyIndex;
			$isCopy = $data['is_copy'];
			
			$groups[$i] = array
			(
				'ident'		=> $ident,
				'group_id'	=> $data['group_id'],
				'numCopy'	=> $data['numCopy'],
				'isCopy'	=> $data['is_copy'],
				'pgroup'	=> $data['pgroup'],
			);
						
			if(empty($data['attributes']))
			{
				continue;
			}
			
			$tmp = array();
			foreach($data['attributes'] as $attr)
			{
				$uuid = $attr['uuid'];
				$id = $attr['id'];
				
				if($isCopy)
				{
					$clones[$id][$copyIndex] = $uuid;
				}
				$tmp[] = array('id'=>$id,'uuid'=>$uuid);
			}
			$groups[$i]['attributes'] = $tmp;
			unset($tmp);
		}
		
		if(empty($groups))
		{
			return array();
		}
		
		// prepare the groups
		$arrGroups = array();
		foreach($groups as $index => $data)
		{
			$objGroup = GroupFactory::findById($data['group_id']);
			if(!$objGroup)
			{
				continue;
			}
			
			$copyCount = 0;
			
			// remember the copy
			if($data['isCopy'])
			{
				$objGroup->isCopy = 1;
				$objGroup->numCopy = $data['numCopy'];
				$objGroup->pgroup = $data['pgroup'];
				$objGroup->identifyer = $data['ident'];
				$copyCount = $objGroup->numCopy;
			}
			
			$arrAttributes = array();
			foreach($data['attributes'] as $attribute)
			{
				$objAttribute = AttributeFactory::findPublishedById($attribute['id']);
				if(!$objAttribute)
				{
					continue;
				}
				
				// update the uuid for generic attributes
				$objAttribute->set('uuid',$attribute['uuid']);
				
				// flag as copy
				if($objGroup->isCopy)
				{
					$strAlias = $objAttribute->get('alias');
					$objAttribute->set('isCopy',1);
				}
				$arrAttributes[] = $objAttribute;
				$uuids[] = $attribute['uuid'];
			}
			
			$objGroup->set('arrAttributes',$arrAttributes);
			
			$arrGroups[] = $objGroup;
		}
		
		$arrNew['groups'] = $arrGroups;
		$arrNew['clones'] = $clones;
		$arrNew['uuids'] = $uuids;
		
		return $arrNew;
	}
	
	
}