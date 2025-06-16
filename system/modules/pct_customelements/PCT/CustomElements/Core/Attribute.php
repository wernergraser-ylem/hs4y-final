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

use Contao\StringUtil;
use PCT\CustomElements\Core\Vault as Vault;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Core\FrontendTemplate as FrontendTemplate;


/**
 * Class file
 * Attribute
 */
#[\AllowDynamicProperties]
class Attribute extends \PCT\CustomElements\Core\Controller implements \PCT\CustomElements\Interfaces\Attribute
{
	/**
	 * Widget
	 * @var object
	 */
	// !$objWidget
	protected $objWidget;
	
	/**
	 * Origin object
	 * @var object
	 */
	// !$objOrigin
	protected $objOrigin = null;
	
	/**
	 * Child attributes array
	 * @var array
	 */
	// !$arrChildAttributes
	protected $arrChildAttributes = array();
	
	/**
	 * Template for a single field
	 * @var string
	 */
	// !$strFieldTemplate
	protected $strFieldTemplate = 'be_field_customelement';
	
	/**
	 * Value
	 * @var mixed
	 */
	// !$varValue
	protected $varValue = null;
	
	/**
	 * Modified array
	 * @var array
	 */
	// !$arrModified
	protected $arrModified = array();
	
	/**
	 * Options values array
	 * @var array
	 */
	// !$arrOptionValues
	protected $arrOptionValues = array();
	
	/**
	 * Translated labels array
	 * @var array
	 * 
	 */
	// !$arrTranslatedLabel
	protected $arrTranslations = array();

	/**
	 * Flag that a custom template is used
	 * @protected boolean
	 */
	protected $isCustomTemplate = false;

	/**
	 * Uuid of the attribute
	 * @protected boolean
	 */
	public $uuid = '';

	/**
	 * Flag if an attribute is a copy
	 * @protected boolean
	 */
	public $isCopy = false;

	/**
	 * Flag if an attribute should be copied
	 * @protected boolean
	 */
	public $createCopy = false;

	/**
	 * Counter of copy
	 * @protected boolean
	 */
	public $numCopy = 0;

	/**
	 * Flag if an attribute is sortable
	 * @protected boolean
	 */
	public $sortable = false;

	
	/**
	 * Create a new instance
	 * @param array
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		$this->isCopy = false;
	}
	
	
	/**
	 * Generate the attribute
	 * @return object Attribute
	 */
	public function generate()
	{
		$arrData = $this->getData();
		
		if(empty( $arrData ))
		{
			return null;
		}
		
		return \PCT\CustomElements\Core\AttributeFactory::findById( $this->get('id') );
	}
	
	
//! --- Interface ---	
	
	
	/**
	 * @inheritdoc
	 */
	public function getFieldDefinition()
	{
		return array();
	}	
	

//! --- Vault ---	
	/**
	 * Set value for this attribute
	 * @param mixed
	 */
	public function setValue($varValue)
	{
		$this->set('varValue',$varValue);
		// mark this variable as modified
		$this->setModified('varValue');
	}
	
	
	/**
	 * Return the value
	 * @return mixed
	 */
	public function getValue()
	{
		$varValue = $this->get('varValue');
		
		// load value hook
		$varValue = \PCT\CustomElements\Core\Hooks::callstatic('loadValueHook',array($varValue,$this));
		
		return $varValue;
	}
	
	
	/**
	 * Store an attribute value to the vault
	 * @param mixed		Value
	 * @param string	Name of the attribute (uuid)
	 * @param integer	Id of the (contao) element
	 * @param string	Source table e.g. tl_content
	 * @param array		Optional settings array
	 */
	protected function saveValue($varValue,$strField,$intPid=0,$strTable='',$arrOptions=array())
	{
		// set the current value in object scope when it is not a child
		if(!$this->isChild($strField))
		{
			$this->setValue($varValue);
		}
	}
	
	
	/**
	 * Public shortcut to saveValue
	 * @see saveValue
	 */
	public function save($varValue,$intPid=0,$strTable='',$arrOptions=array())
	{
		$strField = $this->uuid ? $this->uuid : $this->get('uuid');
		$this->saveValue($varValue,$strField,$intPid,$strTable,$arrOptions);
	}

	
	/**
	 * Load the attribute value from the vault
	 * @param string	Name of the attribute (uuid)
	 * @param integer	Id of the (contao) element
	 * @param string	Source table e.g. tl_content
	 * @param array		Optional settings array
	 * @return string
	 */
	protected function loadValue($strField,$intPid=0,$strTable='',$arrOptions=array())
	{
		// return the value if set from outside
		if($this->isModified('varValue') && !$this->isChild($strField))
		{
			$varValue = $this->getValue();
		}
		else
		{
			$objOrigin = $this->get('objOrigin');
			if( $objOrigin === null )
			{
				$objOrigin = Origin::getInstance();
			}
			
			if($intPid < 1) {$intPid = $objOrigin::get('pid');}
			if(strlen($strTable) < 1) {$strTable = $objOrigin::get('table');}
			
			$this->set('objOrigin',$objOrigin);
			
			if(empty($arrOptions))
			{
				$arrOptions = $this->getData();
			}
			
			$objCustomElement = $this->getCustomElement();

			$arrOptions['saveDataAs'] = isset($arrOptions['saveDataAs']) ? $arrOptions['saveDataAs'] : $this->get('saveDataAs');
			$arrOptions['attr_id'] = isset($arrOptions['attr_id']) ? $arrOptions['attr_id'] : $this->get('id');
			$arrOptions['type'] = isset($arrOptions['type']) ? $arrOptions['type'] : $this->get('type');
			$arrOptions['genericAttribute'] = $objCustomElement->getGenericAttribute();
			
			// fetch the value from the vault
			$varValue = Vault::getAttributeValueByUuid($strField,$intPid,$strTable,$arrOptions);
			
			// set the current value in object scope when it is not a child
			if(!$this->isChild($strField))
			{
				$this->setValue($varValue);
			}
		}
		
		// load value hook
		$varValue = \PCT\CustomElements\Core\Hooks::callstatic('loadValueHook',array($varValue,$this));
		
		return $varValue;
	}
	
	
	/**
	 * Public shortcut to saveValue
	 * @see saveValue
	 */
	public function load($intPid=0,$strTable='',$arrOptions=array())
	{
		$strField = $this->uuid ? $this->uuid : $this->get('uuid');
		return $this->loadValue($strField,$intPid,$strTable,$arrOptions);
	}
	
	
	/**
	 * Load an options value
	 * @param string	Name of the option key
	 * @param integer
	 * @param string
	 * @param array
	 * @return mixed
	 */
	public function loadOptionValue($strOption,$intPid=0,$strTable='',$arrOptions=array())
	{
		if($this->isModified('arrOptionValues'))
		{
			return $this->arrOptionValues[$strOption] ?? null;
		}
		
		$strField = $this->uuid ? $this->uuid : $this->get('uuid');
		$strField .= '_'.$strOption;
		return $this->loadValue($strField,$intPid,$strTable,$arrOptions);
	}
	
	
	/**
	 * Load all option values and return them as associated array
	 * @param string
	 * @param integer
	 * @param string
	 * @return array
	 */
	public function loadOptionValues($strField,$intPid=0,$strTable='')
	{
		if($this->isModified('arrOptionValues'))
		{
			return $this->get('arrOptionValues');
		}
		
		$objOrigin = $this->get('objOrigin');
		if($intPid < 1 && isset($objOrigin)) {$intPid = $objOrigin::get('pid');}
		if(strlen($strTable) < 1 && isset($objOrigin)) {$strTable = $objOrigin::get('table');}
		
		if($intPid < 1 && strlen($strTable) < 1)
		{
			return array();
		}
		
		// get the values from the wizard
		$arrWizard = Vault::getWizardData($intPid,$strTable);
		$arrOptions = StringUtil::deserialize($this->get('options'));
		
		if(!is_array($arrOptions))
		{
			$arrOptions = array_filter(explode(',', $arrOptions));
		}
		
		if(!empty($arrWizard['values']) && !empty($arrOptions) && is_array($arrOptions) && !in_array($this->get('type'), $GLOBALS['PCT_CUSTOMELEMENTS']['ignoreOptionFields']))
		{
			$arrOptionValues = array();
			foreach($arrOptions as $option)
			{
				if(isset($arrWizard['values'][$strField.'_'.$option]))
				{
					$arrOptionValues[] = $arrWizard['values'][$strField.'_'.$option];
				}
			}
			
			$this->setOptionValues($arrOptionValues);
		
			return $arrOptionValues;
		}

		return array();
	}
	
	
	/**
	 * Allow to set the options value array from outside
	 * @param array
	 */
	public function setOptionValues($arrValues)
	{
		$this->set('arrOptionValues',$arrValues);
		
		// flag this variable to be modified
		$this->setModified('arrOptionValues');
	}
	
	
	/**
	 * (DEPRECATED)
	 * Load the attribute value from the vault
	 * @param string
	 * @param integer
	 * @param string
	 * @return mixed
	 */
	public function findValueByField($strField,$strSaveDataAs='')
	{
		return $this->loadValue($strField,null,null,array('saveDataAs'=>$strSaveDataAs));
	}

	
	/**
	 * Return the active record from the origin
	 * @param boolean	Flag to create a pseudo record
	 * @param string	The table to create the record from
	 * @return object
	 */
	public function getActiveRecord($bolIsPseudo=false, $strTable='tl_content')
	{
		if($this->get('objActiveRecord'))
		{
			$objReturn = $this->get('objActiveRecord');
			$objReturn = clone($objReturn);
			if( $objReturn->id === null || (int)$this->get('objActiveRecord')->id > 0 )
			{
				$objReturn->id = $this->get('objActiveRecord')->id;
			}
			return $objReturn;
		}
		
		if($this->get('objOrigin') && !$bolIsPseudo)
		{
			$objReturn = $this->get('objOrigin')->get('activeRecord');
			if( $objReturn->id === null )
			{
				$objReturn->id = $this->get('objOrigin')->get('activeRecord')->id;
			}
		}
		else if($bolIsPseudo)
		{
			$objReturn = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute(-1);
			$this->set('objActiveRecord',$objReturn);
		}
		else
		{
			return null;
		}
		
		// strip the active record from contao fields
		if(!empty($objReturn) && is_array($GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao']) && count($GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao']) > 0)
		{
			foreach($GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao'] as $f)
			{
				if(isset($objReturn->{$f}))
				{
					$objReturn->{$f} = null;
				}
			}
		}
		
		if( $objReturn === null )
		{
			return null;
		}
		
		return clone( $objReturn );
	}
	
	 
//! --- DCA handling ---	


	/**
	 * Generate the field and return html string
	 * @param array
	 * @param object
	 * @return string
	 */
	public function generateWidget($objDC)
	{
		$varValue = '';
		$strBuffer = '';
		$objDC = clone($objDC);
		
		// get attribute session
		if( !isset($this->Session) || $this->Session === null )
		{
			$this->Session = \Contao\System::getContainer()->get('request_stack')->getSession();
		}

		$arrSession = $this->Session->get('pct_customelement_attribute');
		if( \is_array($arrSession) === false )
		{
			$arrSession = array();
		}
		// get attribute registry session
		$arrCeSession = $this->Session->get('pct_customelements');
		if( \is_array($arrCeSession) === false )
		{
			$arrCeSession = array();
		}
		$arrRegistry = $arrCeSession['registry'][$objDC->table][$objDC->id] ?? array();
		if(!is_array($arrRegistry))
		{
			$arrRegistry = array();
		}
		
		// set name / uuid
		$this->set('uuid',$objDC->field);
		
		// get the field definition for this attribute
		$arrFieldDef = $this->getFieldDefinition();
		$this->set('dataContainer', $objDC);
		#$arrFieldDef['dataContainer'] = $objDC;

		// translate the labels and descriptions
		$arrTranslatedLabel = $this->getTranslatedLabel();
		if(is_array($arrTranslatedLabel) && !empty($arrTranslatedLabel)) 
		{
			$arrFieldDef['label'] = $arrTranslatedLabel;
		}
		
		// TL_DCA, dcaconfig.php
		$strAlias = $this->get('alias');
		#if($this->createCopy || $this->isCopy)
		#{
		#	$strAlias = $this->get('alias').'#'.$this->numCopy;
		#}
		if( isset($GLOBALS['CE_DCA'][$objDC->table]['fields'][$strAlias]) || isset($GLOBALS['CE_DCA'][$objDC->table]['fields'][$objDC->field]) )
		{
			$f = $strAlias;
			if( isset($GLOBALS['CE_DCA'][$objDC->table]['fields'][$objDC->field]) )
			{
				$f = $objDC->field;
			}
			$label = $arrFieldDef['label'];
			$arrFieldDef = \array_replace_recursive($arrFieldDef,$GLOBALS['CE_DCA'][$objDC->table]['fields'][$f]);
			if( empty($arrFieldDef['label']) )
			{
				$arrFieldDef['label'] = $label;
			}
		}
		
		// mark attribute as sortable
		$this->sortable = false;
		if( isset($arrFieldDef['sortable']) )
		{
			$this->sortable = $arrFieldDef['sortable'];
		}
		
		// put the field in the data container
		$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field] = $arrFieldDef;
		
		// catch the submitted value
		if(\Contao\Input::post('FORM_SUBMIT') == $objDC->table && isset($_POST[$objDC->field]) && !$this->get('doNotSave'))
		{
			$varValue = \Contao\Input::post($objDC->field);
			if( isset($arrFieldDef['eval']['rte']) && $arrFieldDef['eval']['rte'] || isset($arrFieldDef['eval']['allowHtml']) && $arrFieldDef['eval']['allowHtml'])
			{
				$varValue = \Contao\Input::postRaw($objDC->field);
			}
			
			if($this->sortable && \Contao\Input::post('orderSRC_'.$objDC->field))
			{
				$varValue = \Contao\Input::post('orderSRC_'.$objDC->field);
			}
			
			// remove the temp. value when user submitted the widget
			if(isset($arrSession[$objDC->field]))
			{
				unset($arrSession[$objDC->field]);
				$this->Session->set('pct_customelement_attribute',$arrSession);
			}
		}
		else
		{
			$varValue = $this->load($objDC->id,$objDC->table);
			
			// store field value from parent in session when created via ajax
			if($this->isCopy && (\Contao\Input::get('ajax') || \Contao\Input::post('ajax')))
			{
			  	$this->set('uuid',$objDC->pattr_uuid);
				$varValue = $this->load($objDC->id,$objDC->table);
				$session = array($objDC->field => array('value'=>$varValue));
				$this->Session->set('pct_customelement_attribute',$session);
			}
		}
		
		// load the temp. value from the session if it exists
		if( isset($arrSession[$objDC->field]) && $arrSession[$objDC->field])
		{
			$varValue = $arrSession[$objDC->field]['value'];
		}
		
		// load default value
		if(!isset($varValue) && $this->get('defaultValue') || $varValue == false)
		{
			// double check if the field really has no entry in the vault yet
			if(!Vault::fieldExists($objDC->field,$objDC->id,$objDC->table))
			{
				$varValue = $this->get('defaultValue');
			}
		}
		
		// trigger load callback
		if( isset($arrFieldDef['load_callback']) && is_array($arrFieldDef['load_callback']))
		{
			$objDC->objAttribute = $this;
			foreach($arrFieldDef['load_callback'] as $callback)
			{
				if (is_array($callback))
				{
				   $varValue = ControllerHelper::importStatic($callback[0])->{$callback[1]}($varValue,$objDC,$this);	
				}
				else if(is_callable($callback))
				{
				   $varValue = $callback($varValue,$objDC,$this);
				}
			}
		}
		
		// Store the field definitions in the session for further use
		$arrRegistry[$objDC->field] = array
		(
			'id'		=> $this->get('id'),
			'name'		=> $objDC->field,
			'fieldDef'	=> $arrFieldDef,
		);
		$arrCeSession['registry'][$objDC->table][$objDC->id] = $arrRegistry; 
		$this->Session->set('pct_customelements',$arrCeSession);
		//--
		
		$objActiveRecord = $objDC->activeRecord;
		$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
		if($objActiveRecord === null && class_exists($strModel))
		{
			$objActiveRecord = $strModel::findByPk($objDC->id);
		}
		else if($objActiveRecord === null && !class_exists($strModel))
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		// create the widget
		$strClass = $GLOBALS['BE_FFL'][$arrFieldDef['inputType']];
		if(strlen($strClass) < 1 || !class_exists($strClass))
		{
			return '';
		}
		
		$arrFieldDef['activeRecord'] = $objActiveRecord;
		
		// replace null values with empty arrays because contaos validator might run in foreach loops (e.g. Contao\InputUnit)
		if($varValue === null)
		{
			$varValue = '';
		}

		if( !isset($arrFieldDef['label'][0]) )
		{
			$arrFieldDef['label'][0] = $this->get('title');
		}
		if( !isset($arrFieldDef['label'][1]) )
		{
			$arrFieldDef['label'][1] = $this->get('description');
		}
		
		$arrAttributes = $strClass::getAttributesFromDca($arrFieldDef,$objDC->field,$varValue,$objDC->field,$objDC->table,$objDC);
		
		$objWidget = new $strClass($arrAttributes);
		$objWidget->__set('activeRecord',$objActiveRecord);

		// handle binary data
		#if(!empty($varValue) && !is_array($varValue))
		#{
		#	if($this->saveDataAs == 'binary' || \Contao\Validator::isBinaryUuid($varValue))
		#	{
		#		$objWidget->__set('value',\Contao\StringUtil::binToUuid($varValue));
		#	}
		#}
		
		// trigger save callbacks on submit
		if(\Contao\Input::post('FORM_SUBMIT') == $objDC->table && !$this->get('doNotSave'))
		{
			$submitted_value = $varValue;
			// store sorted values
			if($this->sortable && \Contao\Input::post('orderSRC_'.$objDC->field))
			{
				$varValue = \Contao\Input::post('orderSRC_'.$objDC->field);
			}
			// trigger save callback
			if( isset($arrFieldDef['save_callback']) && is_array($arrFieldDef['save_callback']))
			{
				$objDC->objAttribute = $this;
				foreach($arrFieldDef['save_callback'] as $callback)
				{
					if (is_array($callback))
					{
					   $varValue = ControllerHelper::importStatic($callback[0])->{$callback[1]}($varValue,$objDC,$this);	
					}
					else if(is_callable($callback))
					{
					   $varValue = $callback($varValue,$objDC,$this);
					}
				}
			}
			
			// do not save the value if return value is an object (exception) 
			if(is_object($varValue))
			{
				$error = $varValue->getMessage();
				
				$objWidget->addError($error);
				
				// reset to the input value and store error in session for reload
				$varValue = $submitted_value;
			}
		}
		
		// trigger load callback
		if(!\Contao\Input::post('FORM_SUBMIT'))
		{
			if( isset($arrFieldDef['load_callback']) && is_array($arrFieldDef['load_callback']))
			{
				$objDC->objAttribute = $this;
				foreach($arrFieldDef['load_callback'] as $callback)
				{
					if (is_array($callback))
					{
					   $varValue = ControllerHelper::importStatic($callback[0])->{$callback[1]}($varValue,$objDC,$this);	
					}
					else if(is_callable($callback))
					{
					   $varValue = $callback($varValue,$objDC,$this);
					}
				}
			}
		}
		
		if( isset($arrSession[$objDC->field]['error']) &&  $arrSession[$objDC->field]['error'])
		{
			$objWidget->addError($arrSession[$objDC->field]['error']);
		}
		
		// set value as POST value for the validator
		if( !\Contao\Environment::get('isAjaxRequest') )
		{
			$v = $objWidget->__get('value');
			if(!is_array($v) && $v !== null)
			{
				if(\Contao\Validator::isBinaryUuid($v))
				{
					$v = \Contao\StringUtil::binToUuid($v);
				}
				$objWidget->__set('value',$v);
			}
			
			\Contao\Input::setPost($objDC->field,$objWidget->__get('value'));
		}
		
		// decode entities
		if( isset($arrFieldDef['eval']['decodeEntities']) && $arrFieldDef['eval']['decodeEntities'] )
		{
			$objWidget->__set('value', \Contao\StringUtil::decodeEntities($objWidget->__get('value')) );
		}

		// picker
		if( isset($arrFieldDef['eval']['dcaPicker']) && ( !isset($objWidget->wizard) || strlen($objWidget->wizard) < 1 ) )
		{
			$objWidget->wizard = \Contao\Backend::getDcaPickerWizard($arrFieldDef['eval']['dcaPicker'], $objDC->table, $objDC->field, $objDC->field);
		}
		
		// check if the attribute itself calls its generateWidget function
		if(method_exists($this,'parseWidgetCallback'))
		{
			if( !isset($arrFieldDef['dataContainer']) || !$arrFieldDef['dataContainer'])
			{
				$arrFieldDef['dataContainer'] = $objDC;
			}
			$strBuffer = \call_user_func_array(array($this, 'parseWidgetCallback'), array($objWidget,$objDC->field,$arrFieldDef,$objDC,$objWidget->__get('value')) );
		}
		else
		{
			// validate the input
			if( \Contao\Input::post($objDC->field) !== null )
			{
				$objWidget->validate();
			}
			
			if($objWidget->hasErrors())
			{
				$objWidget->class = 'error';
			}
			
			$strBuffer = $objWidget->parse();
		}
		
		
		// if the widget has an error store the value in the session, do not save in the vault
		if($objWidget->hasErrors())
		{
			$objDC->noReload = true;
			$session = array($objDC->field => array('value'=>$varValue,'error'=>$error ?? '' ));
			$this->Session->set('pct_customelement_attribute',$session);
		}
		else
		{
			if($varValue != '' || (isset($arrFieldDef['eval']['doNotSaveEmpty']) && !$arrFieldDef['eval']['doNotSaveEmpty']) || !$this->get('doNotSave'))
			{
				if($varValue === '')
				{
					$varValue = \Contao\Widget::getEmptyValueByFieldType($arrFieldDef['sql']);
				}
			}
			
			// save value
			$this->save($varValue,$objDC->id,$objDC->table);	
		}
		
		// do not render the field at all when the output is none
		if(strlen($strBuffer) < 1)
		{
			return '';
		}
		
		// make the field sortable
		if($this->sortable && strlen(strpos($strBuffer, 'orderSRC_'.$objDC->field)) < 1)
		{
			$doc = new \DOMDocument();
			@$doc->loadHTML(preg_replace("/&(?!(?:apos|quot|[gl]t|amp);|#)/", "&amp;",$strBuffer));
			$elem = $doc->getElementById('sort_'.$objDC->field);
			
			if($elem)
			{
				$isGallery = $arrFieldDef['eval']['isGallery'] ?? false;

				$class = $doc->createAttribute('class');
				$class->value = 'sortable' .  ( $isGallery == true ? ' sgallery' : '' );
				$elem->appendChild($class);
				
				$str = '<p class="sort_hint">' . $GLOBALS['TL_LANG']['MSC']['dragItemsHint'] . '</p>';
				$str .= $elem->C14N();
				$str .= '<input type="hidden" id="ctrl_orderSRC_'.$objDC->field.'" name="orderSRC_'.$objDC->field.'" value="'.$varValue.'">';
				$str .= '<script>Backend.makeMultiSrcSortable("sort_'.$objDC->field.'", "ctrl_orderSRC_'.$objDC->field.'","ctrl_orderSRC_'.$objDC->field.'")</script>';
				// replace sort container
				$preg = preg_match('/<ul(.*?)\/ul>/', $strBuffer,$result); 
				if($preg)
				{
					$strBuffer = str_replace($result[0], $str, $strBuffer);
				}
			}
			// fallback if DOMDocument fails
			else
			{
				$preg = preg_match('/<ul id="sort_'.$objDC->field.'"(.*?)\/ul>/', $strBuffer,$result); 
				if($preg)
				{
					$tmp = $result[0];
					// inject the class
					$elem = preg_replace('/class="/', 'class="sortable ', $tmp, 1);
					
					$str = '<p class="sort_hint">' . $GLOBALS['TL_LANG']['MSC']['dragItemsHint'] . '</p>';
					$str .= $elem;
					$str .= '<input type="hidden" id="ctrl_orderSRC_'.$objDC->field.'" name="orderSRC_'.$objDC->field.'" value="'.$varValue.'">';
					$str .= '<script>Backend.makeMultiSrcSortable("sort_'.$objDC->field.'", "ctrl_orderSRC_'.$objDC->field.'")</script>';
					
					$strBuffer = str_replace($result[0], $str, $strBuffer);
				}
			}
		}
		
		// handle wizards (taken from DataContainer.php)
		$wizard = '';
		if ( isset($arrFieldDef['wizard']) && is_array($arrFieldDef['wizard']))
		{
			foreach ($arrFieldDef['wizard'] as $callback)
			{
				$dc = clone($objDC);
				$dc->strField = $objDC->field;
				$dc->strInputName = $objDC->field;
				
				if (is_array($callback))
				{
					$objCallback = new $callback[0];
					if( \method_exists($objCallback,$callback[1]) )
					{
						$wizard .= $objCallback->{$callback[1]}($dc);
					}
				}
				elseif (is_callable($callback))
				{
					$wizard .= $callback($dc);
				}
			}
			
			if(strlen($wizard) > 0)
			{
				$objWidget->wizard = $wizard;
				$strBuffer .= $wizard;
			}
		}
		
		if(strlen($strBuffer) > 0)
		{
			if(!strlen(strpos('tl_help tl_tip', $strBuffer)) && strlen($objWidget->description) > 0)
			{
				$strBuffer .= '<p class="tl_help tl_tip">'.$objWidget->description.'</p>';
			}
		}
		
		// add the loadCustomElementFields flag if the attribute opens popups
		if( (isset($arrFieldDef['isPopup']) && $arrFieldDef['isPopup'] == true) || in_array($arrFieldDef['inputType'], array('fileTree', 'pageTree')) )
		{
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();

			$arrSession = $objSession->get('loadCustomElementFields');
			if(!is_array($arrSession))
			{
				$arrSession = array();
			}
			$arrSession[] = $objDC->field;
			
			$objSession->set('loadCustomElementFields', array_unique( array_filter( $arrSession) ) );
		}
		
		
		$objFieldTemplate = new \Contao\BackendTemplate($this->strFieldTemplate);
		$objFieldTemplate->setData($this->getData());
		$arrClass = array($arrFieldDef['eval']['tl_class'] ?? '' );
		#$arrClass[] = $objDC->field;
		$arrClass[] = 'uuid_'.$objDC->field;
		if( isset($arrFieldDef['eval']['chosen']) ) {$arrClass[] = 'chosen';}
		$objFieldTemplate->cssID = 'id="'.$objDC->field.'"';
		$objFieldTemplate->class = trim(implode(' ', $arrClass));
		$objFieldTemplate->html = $strBuffer;
		
		// add data-attributes
		$arrDataAttributes = array
		(
			'data-attr_id'		=> $this->get('id'),
			'data-attr_uuid'	=> $this->get('uuid'),
		);
		$strDataAttributes = '';
		foreach($arrDataAttributes as $k => $v)
		{
			$strDataAttributes .= $k.'="'.$v.'" ';
		}
		$objFieldTemplate->data_attributes = $strDataAttributes;
		
		// add to output list
		$arrOutput[] = $objFieldTemplate->parse();
		
		//! generate the child attributes
		if($this->hasChilds())
		{
			$arrChilds = $this->get('arrChildAttributes');
			foreach($arrChilds as $name => $objChildWidget)
			{
				$objChildWidget->value = $this->loadValue($objChildWidget->name,$objDC->id,$objDC->table,$objChildWidget->fieldDef);
				
				// save child widget information
				if(isset($_POST[$objChildWidget->name]) && !$this->get('doNotSave'))
				{
					$objChildWidget->validate();
					if($objChildWidget->hasErrors())
					{
						$objDC->noReload = true;
					}
					else
					{
						// save the value
						$varValue = \Contao\Input::post($objChildWidget->name);
						$this->saveValue($varValue,$objChildWidget->name,$objDC->id,$objDC->table,$objChildWidget->fieldDef);
					}
				}
				
				$strChild = $objChildWidget->parse();
				
				// handle wizards in child attributes
				if(!empty($objChildWidget->fieldDef['wizard']) && is_array($objChildWidget->fieldDef['wizard']))
				{
					foreach($objChildWidget->fieldDef['wizard'] as $callback)
					{
						$objCaller = new $callback[0];
						$objGenericDC = clone($objDC);
						$objGenericDC->field = $objChildWidget->name;
						$strChild .= $objCaller->{$callback[1]}($objGenericDC);
					}
				}
				
				if(strlen($objChildWidget->description) > 0)
				{
					$strChild .= '<p class="tl_help tl_tip">'.$objChildWidget->description.'</p>';
				}
				
				$objFieldTemplate = new \Contao\BackendTemplate($this->strFieldTemplate);
				$arrClass = array($objChildWidget->fieldDef['eval']['tl_class']);
				$objFieldTemplate->class = trim(implode(' ', $arrClass));
				$objFieldTemplate->html = $strChild;
				
				// add data-attributes
				$arrDataAttributes = array
				(
					'data-attr_id'		=> $this->get('id'),
					'data-attr_uuid'	=> $objChildWidget->name,
				);
				$strDataAttributes = '';
				foreach($arrDataAttributes as $k => $v)
				{
					$strDataAttributes .= $k.'="'.$v.'" ';
				}
				$objFieldTemplate->data_attributes = $strDataAttributes;
				
				$arrOutput[] = $objFieldTemplate->parse();
			}
		}
		
		$strBuffer = implode('', $arrOutput);
		
		// wrap widgets with child attributes in a seperate div
		if($this->hasChilds())
		{
			$strBuffer = '<div class="field_group '.$this->get('uuid').'">'.$strBuffer.'<div class="clear"></div></div>';
		}
		
		$objWidget->buffer = $strBuffer;		
	
		// allow manipulations on the widget after it gets parsed
		$strBufferFromHook = \PCT\CustomElements\Core\Hooks::callstatic('parseWidgetHook',array($objWidget,$objDC->field,$arrFieldDef,$objDC));
		if(strlen($strBufferFromHook))
		{
			$strBuffer = $strBufferFromHook;
		}
		
		return $strBuffer;
	}

		
	/**
	 * Prepare an attribute for DCA
	 * @param object
	 * @return array
	 */
	public function prepareForDca($objDC)
	{
		// create a clone of the current datacontainer object to allow custom manipulations on the data container without interfering other fields
		$objDC = clone($objDC);
		
		$strName = $this->get('uuid');
		$strAlias = $this->get('alias');
		
		// generate a new unique id for a cloned attribute
		if( isset($this->createCopy) && (boolean)$this->createCopy === true )
		{
			$this->isCopy = 1;
			$numCopy = $this->numCopy ? $this->numCopy : 1;
			$objDC->pattr_uuid = $strName;
			$objDC->ref_table = 'tl_pct_customelement_attribute';
			// check if a uuid has been created by javascript already
			if(\Contao\Input::get('ajax') && \Contao\Input::get('uuids') )
			{
				$arrUuids = \json_decode(StringUtil::decodeEntities(\Contao\Input::get('uuids')),true);
				$strName = $arrUuids[$this->get('id')];
			}
			else
			{
				$strName = AttributeFactory::generateUuid($objDC);
			}
			
			$strAlias = $this->get('alias').'#'.$numCopy;
		}
		
		// set the new field name
		$objDC->field = $strName;
		
		// get the field definition for this attribute
		$arrData = $this->getFieldDefinition();
		
		// translate the labels and descriptions
		$arrTranslatedLabel = $this->getTranslatedLabel();
		if(is_array($arrTranslatedLabel)) 
		{
			$arrData['label'] = $arrTranslatedLabel;
		}
		
		// HOOK: allow other extensions to manupulate the attribute Data Container array
		$arrData = \PCT\CustomElements\Core\Hooks::callstatic('getDcaHook',array($arrData,$this,$objDC));
		
		$arrReturn = array
		(
			'name'		=> $strName,
			'alias'		=> $strAlias,
			'id'		=> $this->get('id'),
			'fieldDef'	=> $arrData,
		);

		if( !is_array($arrReturn) )
		{
			$arrReturn = (array)$arrReturn;
		}
		
		// mark field as copy
		if( (isset($this->createCopy) && $this->createCopy) || (isset($this->isCopy) && $this->isCopy) )
		{
			$arrReturn['isCopy'] = 1;
			$arrReturn['pattr_uuid'] = $this->get('uuid');
		}
		
		// generate the html output
		if(!\Contao\Input::get('switch') && !\Contao\Input::get('show') && \Contao\Input::get('act') == 'edit')
		{
			$arrReturn['html'] = $this->generateWidget($objDC);
		}
		
		// HOOK: allow other extensions to manupulate the attribute output
		$arrReturn = \PCT\CustomElements\Core\Hooks::callstatic('prepareForDcaHook',array($arrReturn,$this,$objDC));
		
		return $arrReturn;
	}
	
	
	/**
	 * Return true if the attribute has child attributes
	 * @return boolean
	 */
	public function hasChilds()
	{
		$arrChilds = $this->get('arrChildAttributes');
		if(!empty($arrChilds)) {return true;}
		return false;
	}
	
	
	/**
	 * Return true if the attribute is a child attribute
	 * @return boolean
	 */
	public function isChild($strField)
	{
		// custom catalog field without underscore
		if($strField == $this->get('alias'))
		{
			return false;
		}
		
		if(strlen(strpos($strField, '_')) > 0)
		{
			$arrField = explode('_', $strField);
			// custom catalog field with underscore
			if(in_array($this->get('alias'), $arrField))
			{
				return false;
			}
						
			return true;
		}
		return false;
	}
	
	
	/**
	 * Return the custom element object
	 * @return object
	 */
	public function getCustomElement()
	{
		if($this->get('objCustomElement'))
		{
			return $this->get('objCustomElement');
		}
		
		$objOrigin = $this->getOrigin();
		if($objOrigin)
		{
			$objCustomElement = $objOrigin->getCustomElement();
		}
		
		if(!isset($objCustomElement))
		{
			$objCustomElement = \PCT\CustomElements\Core\CustomElementFactory::findByAttributeId($this->get('id'));
		}
		
		$this->set('objCustomElement',$objCustomElement);
		
		return $objCustomElement;
	}


	/**
	 * Add a child attribute to the list
	 * @param object	Widget
	 * @return array
	 */
	public function addChildAttribute($objAttribute)
	{
		$arrChilds = $this->get('arrChildAttributes');
		$arrChilds[] = $objAttribute;
		$this->set('arrChildAttributes',$arrChilds);
	}


	/**
	 * Add a child attribute to the list
	 * @param array
	 * @return object
	 */
	public function prepareChildAttribute($arrFieldDef,$strName)
	{
		$strClass = $GLOBALS['BE_FFL'][$arrFieldDef['inputType']];
		if($strClass === null)
		{
			return null;
		}

		$objDC = $this->get('dataContainer') ?? null;
		if( isset($arrFieldDef['dataContainer']) )
		{
			$objDC = $arrFieldDef['dataContainer'];
		}
		
		$arrAttributes = $strClass::getAttributesFromDca($arrFieldDef,$strName,'',$strName,$objDC->table,$objDC);
		$objWidget = new $strClass($arrAttributes);
		$objWidget->fieldDef = $arrFieldDef;
		
		if( isset($arrFieldDef['eval']['dcaPicker']) && strlen($objWidget->wizard) < 1)
		{
			$objWidget->wizard = \Contao\Backend::getDcaPickerWizard($arrFieldDef['eval']['dcaPicker'], $objDC->table, $strName, $strName);
		}

		// add the attribute to the child list
		$this->addChildAttribute($objWidget);
		
		return $objWidget;
	}


	/**
	 * Return the evaluation array
	 * @param array
	 * @return array
	 */
	public function getEval($arrEvalMerge = array())
	{
		$arrReturn = array();
		$arrSystemCols = AttributeFactory::getSystemColumns();
		
		$arrTlClass = array();
		foreach($this->arrData as $strKey => $varValue)
		{
			if(in_array($strKey, $arrSystemCols) || !$varValue)
			{
				continue;
			}
			
			if(strlen(strpos($strKey,'eval')))
			{
				$k = ltrim($strKey,'eval');
				$k = ltrim($k,'_');
				#$k = strtolower($k);
				
				// handle tl_class
				if(strlen(strpos($k,'tl_class')))
				{
					$varValue = str_replace('tl_class_', '', $k);
					$arrTlClass[] = $varValue;
					continue;
				}
				
				// handle tl_style
				if(strlen(strpos($k,'tl_style')))
				{
					$k = 'style';
				}
				
				$arrReturn[$k] = $varValue;
			}
		}
		
		if(count($arrEvalMerge) > 0)
		{
			$arrReturn = array_unique(array_merge($arrReturn, $arrEvalMerge));
		}
				
		if(count($arrTlClass) > 0)
		{
			if( isset($arrEvalMerge['tl_class']) && !empty($arrEvalMerge['tl_class']) )
			{
				$class = explode(' ', $arrEvalMerge['tl_class']);
				$arrTlClass = array_unique(array_merge($class));
			}
			
			$arrReturn['tl_class'] = implode(' ', $arrTlClass);
		}

		if( isset($arrReturn['path']) )
		{
			$objFile = \Contao\FilesModel::findByPk( trim($arrReturn['path']) );
			if( $objFile !== null )
			{	
				$arrReturn['path'] = $objFile->path;	
			}
			else
			{
				unset( $arrReturn['path'] );
			}
		}
		
		return $arrReturn;
	}
	

//! --- Frontend output ---	


	/**
	 * Render the attribute and return html string
	 * @return string
	 */
	public function render()
	{
		$objOrigin = $this->get('objOrigin');
		
		$strField = $this->get('uuid');
		$varValue = null;
		
		$strTemplate = $this->get('template');
		
		// set default template
		if( empty($strTemplate) )
		{
			$strTemplate = 'customelement_attr_default';
			$this->set('template',$strTemplate);
		}
		
		// check if we use a regular contao template or custom template
		if(strlen(strpos($strTemplate, 'customelement_attr')) < 1)
		{
			$this->isCustomTemplate = true;
		}
		
		$objTemplate = new FrontendTemplate($strTemplate);
		$objTemplate->setData($this->get('arrData'));
		$objTemplate->origin = $objOrigin;
		
		
		// check if the attribute has not been modified from outside
		if($objOrigin != null && !$this->isModified('varValue'))
		{
			$varValue = $this->loadValue($strField,$objOrigin::get('pid'),$objOrigin::get('table'));
		}
		else
		{
			$varValue = $this->getValue();
		}

		// do not replaceInsertTags in raw Values
		$objTemplate->rawValue = $varValue;
		
		if( isset($varValue) && \is_string($varValue) && !empty($varValue) )
		{
			// replace inserttags
			$varValue  = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($varValue);
			// replace basic entities
			$varValue = \Contao\StringUtil::decodeEntities( $varValue );
			$varValue = \str_replace( \array_keys($GLOBALS['PCT_CUSTOMELEMENTS']['basicEntities']) ,\array_values($GLOBALS['PCT_CUSTOMELEMENTS']['basicEntities']),$varValue);
		}
		
		$objTemplate->value = $varValue;
		
		// add raw values
		$objTemplate->raw = $this;
		$objTemplate->attribute = $this;
		
		$arrCssID = \Contao\StringUtil::deserialize($this->get('cssID'));
		$objTemplate->cssID = $arrCssID[0] ? 'id="'.$arrCssID[0].'"' : '';
		$arrClass = array('ce_'.$this->get('type'),'attribute',$this->get('type'));
		if(strlen($arrCssID[1]) > 0)
		{
			$arrClass = array_merge($arrClass,explode(' ',$arrCssID[1]));
		}
		$objTemplate->class = implode(' ', $arrClass);
		
		// HOOK: alternative routine to renderCallback to render an attribute
		$strBufferFromHook = \PCT\CustomElements\Core\Hooks::callstatic('prepareRenderingHook',array($strField,$varValue,clone($objTemplate),$this));
		
		// check if the attribute itself calls its render function
		if(method_exists($this, 'renderCallback') && strlen($strBufferFromHook) < 1)
		{
			$strBuffer = \call_user_func_array(array($this, 'renderCallback'), array($strField,$varValue,clone($objTemplate),$this) );
		}
		else if(strlen($strBufferFromHook) > 0)
		{
			$strBuffer = $strBufferFromHook;
			$strBufferFromHook = '';
		}
		else
		{
			$strBuffer = $objTemplate->parse();
		}
		
		// trigger HOOK: allow manipulations on the output
		$strBufferFromHook = \PCT\CustomElements\Core\Hooks::callstatic('renderAttributeHook',array($strBuffer,$strField,$varValue,$this));
		if(strlen($strBufferFromHook) > 0)
		{
			$strBuffer = $strBufferFromHook;
		}
		
		return $strBuffer;
	}


//! --- translations and multilanguage support ---


	/**
	 * Find translations for labels in the backend and return them as array
	 * @param string
	 * @param object
	 * @return null|array
	 */
	public function getTranslatedLabel()
	{
		$arrReturn = array();
		$strKey = $this->getCustomElement()->get('alias');
		$strField = $this->get('alias');
		
		\Contao\System::loadLanguageFile('default',$GLOBALS['TL_LANGUAGE']);
		
		// fallback
		if( isset($GLOBALS['TL_LANG'][$strKey][$strField]) && is_array($GLOBALS['TL_LANG'][$strKey][$strField]))
		{
			$arrReturn = array($GLOBALS['TL_LANG'][$strKey][$strField][0] ?: '',$GLOBALS['TL_LANG'][$strKey][$strField][1] ?: '');
		}
		
		// new structure
		if( isset($GLOBALS['TL_LANG']['CUSTOMELEMENTS'][$strKey]['fields'][$strField]) && ( is_array($GLOBALS['TL_LANG']['CUSTOMELEMENTS'][$strKey]['fields'][$strField]) || is_array($GLOBALS['TL_LANG']['CUSTOMELEMENTS']['*']['fields'][$strField]) ) )
		{
			$arrReturn = $GLOBALS['TL_LANG']['CUSTOMELEMENTS'][$strKey]['fields'][$strField] ?: is_array($GLOBALS['TL_LANG']['CUSTOMELEMENTS']['*']['fields'][$strField]);
		}
		
		return $arrReturn;
	}

	
	/**
	 * Return the translations array
	 * @return array
	 */
	public function getTranslations()
	{
		return $this->get('arrTranslations');
	}
	
	
	/**
	 * Add a translation for a value to the labels array
	 * @param string	Value key
	 * @param string	Label
	 * @param string	The language code e.g. de, en...
	 */
	public function addTranslation($strValue,$strLabel,$strLanguage)
	{
		// mark as modified	
		$this->setModified('arrTranslations');
		
		$arrTranslations = $this->get('arrTranslations');
		
		// set the translated label for the language
		$arrTranslations[$strValue][$strLanguage] = $strLabel;
		
		$this->set('arrTranslations',$arrTranslations);
	}
	
	
	
	/**
	 * Return boolean true if a value has a translation and set the translated value for further use
	 * @param string
	 * @return boolean
	 */
	public function hasTranslation($strValue,$strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			$strLanguage = \Contao\Input::get('language') ?: \Contao\Input::get('lang') ?: $GLOBALS['TL_LANGUAGE'];
		}
		
		// replace the minus with an underscore
		if($strLanguage == $GLOBALS['TL_LANGUAGE'] && Controller::isFrontend() )
		{
			$strLanguage = str_replace('-','_',$strLanguage);
		}

		\Contao\System::loadLanguageFile('default',$strLanguage);
		
		$arrTranslations = $this->getTranslations();
		$strKey = $this->getCustomElement()->get('alias');
		$strField = $this->get('alias');
		
		// look in global language array
		if(isset($GLOBALS['TL_LANG'][$strKey][$strField][$strValue]))
		{
			$this->setTranslatedValue($strValue,$GLOBALS['TL_LANG'][$strKey][$strField][$strValue],$strLanguage);
			$this->addTranslation($strValue,$GLOBALS['TL_LANG'][$strKey][$strField][$strValue],$strLanguage);
		}
		else
		{
			// hook here
			$strTranslation = \PCT\CustomElements\Core\Hooks::callstatic('translateValueHook',array($strField,$strValue,$strKey,$this) );
			if( !empty($strTranslation) )
			{
				$this->setTranslatedValue($strValue,$strTranslation,$strLanguage);
				$this->addTranslation($strValue,$GLOBALS['TL_LANG'][$strKey][$strField][$strValue],$strLanguage);
			}
		}

		if(isset($arrTranslations[$strValue][$strLanguage]))
		{
			return true;
		}
		
		return false;
	}
	
	
	/**
	 * Return the translated value
	 * @param string
	 * @param string
	 */
	public function getTranslatedValue($strValue,$strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			$strLanguage = \Contao\Input::get('language') ?: \Contao\Input::get('lang') ?: $GLOBALS['TL_LANGUAGE'];
		}
		
		// replace the minus with an underscore
		if($strLanguage == $GLOBALS['TL_LANGUAGE'] && Controller::isFrontend() )
		{
			$strLanguage = str_replace('-','_',$strLanguage);
		}
		
		// search for the translation
		if(!$this->hasTranslation($strValue,$strLanguage))
		{
			return $strValue;
		}
		
		$arrTranslations = $this->getTranslations();

		return $arrTranslations[$strValue][$strLanguage];
	}
	
	
	/**
	 * Set the translated value
	 * @param string
	 * @param string
	 */
	public function setTranslatedValue($strValue,$strTranslation,$strLanguage='')
	{
		if(strlen($strLanguage) < 1)
		{
			$strLanguage = \Contao\Input::get('language') ?: \Contao\Input::get('lang') ?: $GLOBALS['TL_LANGUAGE'];
		}
		$this->addTranslation($strValue,$strTranslation,$strLanguage);
	}


	/**
	 * Check the access rights of the user
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
				if(in_array($group, \Contao\StringUtil::deserialize($objUser->groups) ?: array()) )
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