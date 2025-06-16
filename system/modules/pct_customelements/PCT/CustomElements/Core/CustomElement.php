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
 * Imports
 */

use Contao\Model;
use PCT\CustomElements\Core\GroupFactory as GroupFactory;
use PCT\CustomElements\Core\FrontendTemplate as FrontendTemplate;
use PCT\CustomElements\Core\AttributeFactory as AttributeFactory;


/**
 * Class file
 * CustomElement
 * Generate CustomElements
 */
class CustomElement extends \PCT\CustomElements\Core\Controller
{
	/**
	 * Groups array
	 * @var array
	 */
	protected $arrGroups	= array();
	
	/**
	 * Wizard data array
	 * @var array
	 */
	protected $arrWizard	= array();
	
	/**
	 * Active Record database object
	 * @var array
	 */
	protected $objActiveRecord;
	
	/**
	 * Origin array containing all important information about
	 * the element created this custom element
	 * @var array
	 */
	protected $objOrigin;
	
	/**
	 * Allow to bypass the origin object (resolves in loosing the connection to the vault)
	 * @var boolean
	 */
	protected $bolBypassOrigin = false;
	
	/**
	 * Flag if it is generic
	 * @var boolean
	 */
	protected $blnIsGeneric = false;
	
	/**
	 * The generic attribute id
	 * @var integer
	 */
	protected $intGenericAttribute = 0;
	
	
	/**
	 * Create a new instance
	 * @param array
	 */
	public function __construct($arrData=array())
	{
		if(count($arrData) > 0)
		{
			$this->setData($arrData);
		}
	}


	/**
	 * Generate the custom element
	 * @return object CustomElement
	 */
	public function generate()
	{
		if(empty($this->arrData))
		{
			return null;
		}
		
		// create the origin from url
		if( !$this->getOrigin() && !$this->get('bolBypassOrigin') && empty( \Contao\Input::get('table') ) === false )
		{
			$strModel = \Contao\Model::getClassFromTable( \Contao\Input::get('table') );
			if (class_exists($strModel))
			{
				if( \method_exists($strModel,'setTable') )
				{
					$strModel::setTable( \Contao\Input::get('table') );
				}
				$objModel = $strModel::findByPk(\Contao\Input::get('id'));
			}
			$objOrigin = new \PCT\CustomElements\Core\Origin();
			$objOrigin->set('intPid',\Contao\Input::get('id'));
			$objOrigin->set('strTable',\Contao\Input::get('table'));
			$objOrigin->set('objActiveRecord',$objModel);
			$objOrigin->set('intGenericAttribute',$this->getGenericAttribute());
			
			$this->setOrigin($objOrigin);
		}
		
		// find groups and attributes
		$groups = GroupFactory::findPublishedByParentId( $this->get('id') );
		
		$arrGroups = array();
		if(count($groups) > 0)
		{
			foreach($groups as $objGroup)
			{
				$objGroup->setOrigin($this->getOrigin());
				
				$arrAttributes = array();
				if( !empty($objGroup->getAttributes()) )
				{
					foreach($objGroup->getAttributes() as $objAttribute)
					{
						// continue on old or obsolete attributes (e.g. deinstalled from system)
						if(!$objAttribute)
						{
							continue;
						}
						$objAttribute->setOrigin($this->getOrigin());
						$arrAttributes[] = $objAttribute;
					}
					$objGroup->set('arrAttributes',$arrAttributes);
				}
				$arrGroups[] = $objGroup;
			}
		}
		$this->set('arrGroups',$arrGroups);
		
		return $this;
	}		
		
	
	/**
	 * Return all attributes for the dca
	 * @param object
	 * @return array
	 */
	public function getFieldsForDca($objDC)
	{
		$arrGroups = \PCT\CustomElements\Core\Vault::getWizardData($objDC->id,$objDC->table,$this->getGenericAttribute());
		
		// new structure
		if(isset($arrGroups['alias']))
		{
			$arrGroups = $arrGroups['groups'];
		}
		
		if(empty($arrGroups))
		{
			return array();
		}
		
		$arrFields = array();
		foreach($arrGroups as $group)
		{
			if(empty($group['attributes']))
			{
				continue;
			}
			
			foreach($group['attributes'] as $attr)
			{
				$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($attr['id']);
				if(!$objAttribute)
				{
					continue;
				}
				$objAttribute->set('uuid',$attr['uuid']);
				
				// pass the CustomElement to the attribute
				$objAttribute->set('objCustomElement',$this);

				$arrFields[ $attr['uuid'] ] = $objAttribute->prepareForDca($objDC);
			}
		}

		$strModel = \Contao\Model::getClassFromTable( $objDC->table );
		if (class_exists($strModel))
		{
			if( \method_exists($strModel,'setTable') )
			{
				$strModel::setTable( $objDC->table );
			}
			$objModel = $strModel::findByPk( $objDC->id );
		}
		if( $objModel !== null )
		{
			// groups from CE
			$objCE = CustomElementFactory::findByAlias( $objModel->type );
			if( $objCE !== null )
			{
				$objCE->generate();
				
				foreach($objCE->get('arrGroups') ?? array() as $objGroup)
				{
					foreach($objGroup->getAttributes()  as $objAttribute)
					{
						$arrFields[ $objAttribute->uuid ] = $objAttribute->prepareForDca($objDC);
					}
				}
			}
		}
		
		return $arrFields;
	}
	
	
	/**
	 * Render a custom content element and return html
	 * @return string
	 */
	public function render($objTemplate=null)
	{
		// get the origin information
		$objOrigin = $this->getOrigin();
		
		if(empty($objTemplate))
		{
			$objTemplate = new FrontendTemplate($this->get('template'));
			$objTemplate->setData($this->get('arrData'));
			$objTemplate->origin($objOrigin);
		}
		
		$objTemplate = $this->addToTemplate($objTemplate);
		
		$arrCssID = \Contao\StringUtil::deserialize($this->get('cssID'));
		$objTemplate->cssID = $arrCssID[0] ? 'id="'.$arrCssID[0].'"' : '';
		
		$arrClass = array($this->get('template'));
		if(strlen($arrCssID[1]) > 0)
		{
			$arrClass = array_unique(array_merge($arrClass,explode(' ',$arrCssID[1])));
		}
		$objTemplate->class = implode(' ', $arrClass);

		$strBuffer = $objTemplate->parse();
		
		return $strBuffer;
	}
	
	
	/**
	 * Add the custom element data to a template object
	 * @param object
	 */
	public function addToTemplate($objTemplate)
	{
		$process_start = 0;
		if($GLOBALS['PCT_CUSTOMELEMENTS']['debug'])
		{
			// start time measurement
			$process_start = microtime(true);
		}
		
		// get the origin information
		$objOrigin = $this->getOrigin();
		if( empty($objOrigin) )
		{
			return $objTemplate;
		}

		$objTemplate->origin = $objOrigin;
		
		$objActiveRecord = null;

		$strClass = \Contao\Model::getClassFromTable($objOrigin->get('strTable'));
		if( !empty($strClass) )
		{
			if( \method_exists($strClass,'setTable') )
			{
				$strClass::setTable( $objOrigin->get('strTable') );
			}
			
			$objActiveRecord = $strClass::findByPk( $objOrigin->get('intPid') );
			$objOrigin->set('activeRecord',$objActiveRecord);
		}
		
		// get the wizard data
		$arrData = $this->getWizardData();
		if(count($arrData) < 1)
		{
			$objTemplate->empty = $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['empty'];
			return $objTemplate;
		}
		
		// new structure
		if($arrData['groups'] || $arrData['alias'])
		{
		   $arrGroups = $arrData['groups'];
		}
		else
		{
		   $arrGroups = $arrData;
		   unset($arrGroups['tstamp']);
		}
		
		if(empty($arrGroups))
		{
		   $objTemplate->empty = $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['empty'];
		   return $objTemplate;
		}
		
		$arrTplGroups = array();		
		$arrTplAttributes = array();
		$arrElements = array();			// all attributes generated (html)
		$arrFieldsAssoc = array();		// key is alias and alias#countCopy
		$arrGroupsAssoc = array();		// key is alias and alias#countCopy
		$intCountCopies = 0;
		$tmpCountGroups = array();		// count how many copies of the same group exists per per group id
		
		foreach($arrGroups as $i => $group)
		{
			$groupId = $group['group_id'];
			$groupAlias = $group['group_alias'] ?? $GLOBALS['PCT_CUSTOMELEMENTS']['cache']['group'][$groupId]['alias'];
			
			$isCopy = false;
			if( isset($group['isCopy']) || isset($group['is_copy']) )
			{
				$isCopy = true;
			}
			
			$objGroup = null;
			
			if(strlen($groupAlias) > 0)
			{
				$objGroup = GroupFactory::findByAliasAndCustomElement($groupAlias,$this->get('alias'));
			}
			// hardcore fallback to first CE version
			else if($groupId > 0 && strlen($groupAlias) < 1)
			{
				$objGroup = GroupFactory::findById($groupId);
			}
			
			if($objGroup === null)
			{
				continue;
			}
			
			// continue if group is unpublished or empty
			if(!$objGroup->get('published') || empty($group['attributes']) )
			{
				continue;
			}
			
			// start indexing
			if(!isset($tmpCountGroups[$groupId]))
			{
				$tmpCountGroups[$groupId] = 0;
			}
			
			$fields = array();
			foreach($group['attributes'] as $z => $attr)
			{
				$attr_id = $attr['id'];
				$attr_uuid = $attr['uuid'];
				$attr_alias = $attr['alias'];
				
				if($isCopy && strlen(strpos($attr_alias, '#')) > 0)
				{
					$arr = explode('#', $attr_alias);
					$attr_alias = $arr[0];
					unset($arr);
				}
				
				$objAttribute = null;
				
				// look up from cache
				if(Cache::getAttribute('ce_'.$this->get('id').'_'.$attr_alias))
				{
					$objAttribute = Cache::getAttribute('ce_'.$this->get('id').'_'.$attr_alias);
				}
				else
				{
					// store processed attribute objects in the cache
					$objAttribute = AttributeFactory::findByAliasAndCustomElement($attr_alias,$this->get('id'));
					
					if($objAttribute)
					{
						Cache::addAttribute($objAttribute->get('id'),$objAttribute);
						Cache::addAttribute('ce_'.$this->get('id').'_'.$objAttribute->get('alias'),$objAttribute);
					}
				}
				
				if(!$objAttribute)
				{
					continue;
				}
				
				// flag as copy and update the uuid for generic attributes
				if($isCopy)
				{
					$objAttribute->isCopy = true;
					$objAttribute->uuid = $attr['uuid'];
				}
				
				// pass the origin object to the attribute
				$objAttribute->setOrigin($objOrigin);
				// pass the active record as model
				$objAttribute->set('objActiveRecord', $objActiveRecord );
				
				// get value
				$varValue = $arrData['values'][$attr['uuid']] ?? null;

				// check if wizard has the value data
				if(!empty($arrData['values'][$attr['uuid']]))
				{
					// check if images have the correct binary or uuid format
					if($objAttribute->get('type') == 'image' || $objAttribute->get('saveDataAs') == 'binary')
					{
						if(!\Contao\Validator::isUuid($varValue))
						{
							$varValue = \PCT\CustomElements\Core\Vault::getAttributeValueByUuid( ($isCopy ? $objAttribute->uuid : $objAttribute->get('uuid') ),$objOrigin::get('pid'),$objOrigin::get('table'),array('saveDataAs'=>$objAttribute->get('saveDataAs')));
						}
						else if(\Contao\Validator::isBinaryUuid($varValue))
						{
							if(class_exists('\Contao\StringUtil'))
							{
								$varValue = \Contao\StringUtil::binToUuid($varValue);
							}
							else
							{
								$varValue = \Contao\StringUtil::binToUuid($varValue);
							}
						}
					}
					
					// set the option values
					$arrOptionValues = array();
					$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
					if(is_array($arrOptions) && strlen($attr_uuid) > 0)
					{
						foreach($arrOptions as $option)
						{
							if(is_array($option))
							{
								continue;
							}
							
							if(isset($arrData['values'][$attr_uuid.'_'.$option]))
							{
								$arrOptionValues[$option] = $arrData['values'][$attr_uuid.'_'.$option];
							}
						}
					}
					
					if(count($arrOptionValues) > 0)
					{
						$objAttribute->setOptionValues($arrOptionValues);
					}
				}
				
				// set attribute value
				$objAttribute->setValue($varValue);
				
				$strKey = $objAttribute->get('alias');
				
				// field classes
			   	$arrClass = array('field_'.$z,$objAttribute->get('type'));
			   	$z == 0 ? $arrClass[] = 'first' : '';
			   	$z%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			   	$z >= count($group['attributes'])-1 ? $arrClass[] = 'last' : '';
			   
				// create TemplateAttribute object
				$objTplAttribute = new TemplateAttribute($objAttribute);
				$objTplAttribute->class = implode(' ', $arrClass);
				$objTplAttribute->label = $objAttribute->get('title');
				$objTplAttribute->name = $attr['uuid'];
				$objTplAttribute->value = $varValue;

				// store the field associated with a counter
			   	$strAssocKey = $strKey.'#'.$tmpCountGroups[$groupId];
			   	
			   	$arrFieldsAssoc[$strAssocKey] = $objTplAttribute;
			   	$arrFieldsAssoc[$strKey] = $objTplAttribute;
			   	
			   	$fields[] = $objTplAttribute;
				$arrTplAttributes[] = $objTplAttribute;
				
				// count the attributes processed when debugging is enabled
				if($GLOBALS['PCT_CUSTOMELEMENTS']['debug'])
				{
					$GLOBALS['PCT_CUSTOMELEMENTS']['process']['attributes']++;
				}
			}
			
			// group classes
			$arrClass = array('group','group_'.$i,$groupAlias);
			$i == 0 ? $arrClass[] = 'first' : '';
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			$i >= count($arrGroups)-1 ? $arrClass[] = 'last' : '';
			
			if($tmpCountGroups[$groupId] == 0)
			{
				$arrClass[] = 'parent';
			}
			else
			{
				$arrClass[] = 'copy copy_'.$tmpCountGroups[$groupId];
			}
			
			$strCssId = '';
			if($objGroup->cssID)
			{
				$cssID = \Contao\StringUtil::deserialize( $objGroup->cssID );
				if(strlen($cssID[0]) > 0)
				{
					$strCssId = 'id="'.$cssID[0].'"';
				}
				
				if(strlen($cssID[1]) > 0)
				{
					$arrClass[] = $cssID[1];
				}
			}
			
			$arrTplGroups[] = array
			(
				'class'		=> implode(' ', array_unique($arrClass)),
				'fields'	=> $fields,
				'cssID'		=> $strCssId,
			);
			
			// collect assoc groups
			$arrGroupsAssoc[$groupAlias][] = $fields;
			// higher the counter
			++$tmpCountGroups[$groupId];
		}
		
		$objTemplate->customelement_elements = $arrTplAttributes;
		$objTemplate->customelement_groups = $arrTplGroups;
		$objTemplate->customelement_attributes = $arrTplAttributes;
		$objTemplate->customelement_field = $arrFieldsAssoc;
		$objTemplate->customelement_fields = $arrTplAttributes;
		$objTemplate->customelement_group = $arrGroupsAssoc;
		
		// free temporary variables
		unset($tmpCountGroups);
		unset($arrTplAttributes);
		unset($arrTplGroups);
		unset($arrFieldsAssoc);
		unset($arrGroupsAssoc);
		
		// stop time measurement
		if($GLOBALS['PCT_CUSTOMELEMENTS']['debug'])
		{
			$process_completed = sprintf('%.3f', microtime(true) - $process_start);
			$GLOBALS['PCT_CUSTOMELEMENTS']['process']['time'] += $process_completed;
			$GLOBALS['PCT_CUSTOMELEMENTS']['process']['customelements']++;
		}
		
		return $objTemplate;
	}
	

	/**
	 * Find an attribute in the custom elements by its alias and return it
	 * @param string
	 * @return object
	 */
	public function getAttributeByAlias($strAttributeAlias)
	{
		return \PCT\CustomElements\Core\AttributeFactory::findByAlias($strAttributeAlias);
	}
	
	
	/**
	 * Return the groups array/objecs. Generate the custom element if it has not done before
	 * @return array
	 */
	public function getGroups()
	{
		return $this->get('arrGroups');
	}
	
	
	/**
	 * Return all attributes of the custom element as array
	 * @return array
	 */
	public function getAttributes()
	{
		\PCT\CustomElements\Core\AttributeFactory::findMultipleByCustomElement($this->id);
	}


	/**
	 * Fetch the wizard data and return it as array
	 * @return array
	 */
	public function getWizardData()
	{
		return \PCT\CustomElements\Core\Vault::getWizardData($this->getOrigin()->get('intPid'),$this->getOrigin()->get('strTable'),$this->getGenericAttribute());
	}
	
	
	/**
	 * Set a generic attribute id
	 * @param integer
	 */
	public function setGenericAttribute($intValue)
	{
		$this->set('intGenericAttribute',$intValue);
		$this->set('blnIsGeneric',true);
	}
	
	
	/**
	 * Return the generic attribute id
	 * @return integer
	 */
	public function getGenericAttribute()
	{
		return $this->get('intGenericAttribute') ?: 0;
	}
	
	
	/**
	 * Return true if the custom element created by an attribute => is generic
	 * @param boolean
	 */
	public function isGeneric()
	{
		return $this->get('blnIsGeneric') ? true : false;
	}
	
	
	/**
	 * Check if a backend user has access to the custom element
	 * @param string
	 * @param string
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
				if( in_array($group, \Contao\StringUtil::deserialize($objUser->groups)) )
				{
					return true;
				}
			}
		}
		
		// check if user itself has access
		$users = \Contao\StringUtil::deserialize($this->get('users') );
		if(!empty($users) && is_array($users))
		{
			if( in_array($objUser->id,$users) )
			{
				return true;
			}
		}
		
		return false;
	}

}