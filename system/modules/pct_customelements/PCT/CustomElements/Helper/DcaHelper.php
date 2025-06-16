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
namespace PCT\CustomElements\Helper;

/**
 * Imports
 */

use Contao\ArrayUtil;
use Contao\BackendUser;
use Contao\Input;
use Contao\Session;
use Contao\Environment;
use Contao\System;
use Contao\Database;
use Contao\StringUtil;
use Contao\Model;
use Contao\Versions;
use PCT\CustomElements\Core\CustomElements as CustomElements;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Core\AttributeFactory as AttributeFactory;
use PCT\CustomElements\Core\Vault as Vault;
use PCT\CustomElements\Core\Cache as Cache;
use PCT\CustomElements\Core\Controller;
use PCT\CustomElements\Loader\CustomElementsLoader as CustomElementsLoader;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * DcaHelper
 */
class DcaHelper extends System
{
	/**
	 * Session name
	 * @var string
	 */
	protected $strSession = 'pct_customelements';

	/**
	 * Table name for palette handling
	 */
	protected static $strTable = '';
	
	/**
	 * Palette array
	 * @param array
	 */
	protected $arrPalettes = array();


	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;


	/**
	 * Instantiate this class and return it (Factory)
	 * @param string	Can be a table name
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance()
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static();
		}
		return static::$objInstance;
	}
	
	
	/**
	 * Load the custom elements in the type selection
	 * @param object
	 *
	 * called from onload_callback HOOK
	 */
	public function loadInTypeSelection($objDC)
	{
		if(!CustomElements::hasAccessToTable($objDC->table))
		{
			return $objDC;
		}
		
		$arrCustomElements = CustomElements::getInstance()->getCustomElements($objDC->table);
		if(empty($arrCustomElements))
		{
			return array();
		}
		$objLoader = CustomElementsLoader::getInstance();
		
		// inject in type selection
		foreach($arrCustomElements as $alias)
		{
			$objLoader->load($alias,$objDC->table);
		}
	}


	/**
	 * Store the attribute DCA related information in the session
	 * @param array
	 * @param object
	 * @param object
	 * @return array
	 */
	public function storeAttributeDCA($arrData,$objAttribute,$objDC)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		$arrSession = $objSession->get('CUSTOMELEMENTS_DCA');
		if( !isset($arrSession[$objDC->table]) || !is_array($arrSession[$objDC->table]) )
		{
			$arrSession[$objDC->table] = array();
		}

		$strField = $arrData['name'];
		$arrSession[$objDC->table][$strField] = array
		(
			'name' => $strField,
			'id'	=> $arrData['id'],
			'alias' => $arrData['alias'],
		);
		
		$objSession->set('CUSTOMELEMENTS_DCA',$arrSession);

		return $arrData;
	}

	
	/**
	 * Initialize the backend integration
	 * @param string
	 */
	public function initializeBackend($strTable)
	{
		if( Controller::isBackend() === false )
		{
			return;
		}
		
		// return on restricted tables
		if(in_array($strTable, $GLOBALS['PCT_CUSTOMELEMENTS']['restrictedTables']) || !in_array($strTable, $GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables']))
		{
			return;
		}

		$this->setTable($strTable);

		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		$arrDCA_Session = $objSession->get('CUSTOMELEMENTS_DCA');

		// load the custom element
		#$GLOBALS['TL_DCA'][$strTable]['config']['onload_callback'][] = array(get_class($this), 'loadInTypeSelection');
		// observe the clipboard
		#$GLOBALS['TL_DCA'][$strTable]['config']['onload_callback'][] = array(get_class($this), 'observeClipboard');
		// create a temp copy in the vault
		#$GLOBALS['TL_DCA'][$strTable]['config']['oncopy_callback'][] = array(get_class($this), 'createCopyInVault');
		// delete the vault copy if record is not saved
		#$GLOBALS['TL_DCA'][$strTable]['config']['onload_callback'][] = array(get_class($this), 'removeCopyFromVault');
		// clean the vault on delete
		#$GLOBALS['TL_DCA'][$strTable]['config']['ondelete_callback'][] = array(get_class($this), 'removeFromVault');
		// versions
		// activate versioning even when no regular contao field is being saved
		$GLOBALS['TL_DCA'][$strTable]['config']['onsubmit_callback'][] = array(get_class($this), 'createNewVersion');
		
		$objSession->set('CURRENT_CE_TABLE',$strTable);
		if(Input::get('table') != '')
		{
			$objSession->set('CURRENT_CE_TABLE',Input::get('table'));
		}
		
		if(Input::get('id') != '')
		{
			$objSession->set('CURRENT_CE_ID',Input::get('id'));
		}
		
		// load a DCA information from the session
		if( Input::post('name') != '' && Environment::get('isAjaxRequest') )
		{
			$strField = Input::post('name');
			$intAttribute = 0;
			if( isset($arrDCA_Session[$strTable][$strField]['id']) )
			{
				$intAttribute = $arrDCA_Session[$strTable][$strField]['id'];
			}
			
			
			if( $intAttribute > 0 )
			{
				$objAttribute = AttributeFactory::findById( $intAttribute );
				if( $objAttribute )
				{
					$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $objAttribute->getFieldDefinition();
					return;
				}
			}
		}
		if(in_array(Input::get('act'), array('show')) || (Input::post('name') != '' && Environment::get('isAjaxRequest') ) )
		{
		  	$arrFields = $objSession->get('loadCustomElementFields');
		  	if(!is_array($arrFields))
		  	{
			  	$arrFields = array();
			  }
			
			  $arrFields = \array_unique($arrFields);

			$strField = '';
		
			// handle generic child option fields
			if( Input::get('field') != '' )
			{
				$strField = Input::get('field');
			}
			// pretty much all higher hte Contao 4.4
			else if( Input::post('name') != '' )
			{
				$strField = Input::post('name');
			}
		  	
		  	if(in_array($strField, $arrFields))
		  	{
		  	  	if($strTable != Input::get('table') && Input::get('table') != '')
				{
					$strTable = Input::get('table');
				}
				
				// store the current table in the session
				$objSession->set('CURRENT_CE_TABLE',$strTable);
			  	$objSession->set('CURRENT_CE_ID',Input::get('id'));
			
			  	$this->loadFields($strTable,true);
		  	}
		}

		// load field in switch popup
		if( (Input::get('switch') == 1 && strlen(Input::get('field')) > 0) || (Input::get('popup') == 1 && Input::get('target') != '') )
		{
			$strField = '';
		
			// handle generic child option fields
			if( Input::get('field') != '' )
			{
				$strField = Input::get('field');
			}
			// pretty much all higher hte Contao 4.4
			else if( Input::post('name') != '' )
			{
				$strField = Input::post('name');
			}
			else if( Input::get('target') != '' )
			{
				$target = explode('.',Input::get('target'));
				$strTable = $target[0];	
				$strField = $target[1];
			}
			
			$strChildField = '';
			if(strlen(strpos($strField, '_')))
			{
				$arrFieldName = explode('_', $strField);
				$strField = $arrFieldName[0];
				$strChildField =  $arrFieldName[1];
			}

			$objAttribute = AttributeFactory::findByUuid($strField);
			
			// support duplicated fields
			if(!$objAttribute)
			{
				$objAttribute = AttributeFactory::findCloneByUuidAndOrigin($strField,$objSession->get('CURRENT_CE_ID'),$strTable);
			}

			if($objAttribute)
			{
				if(strlen($strChildField) > 0)
				{
					$strField .= '_'.$strChildField;
				}
				
				$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $objAttribute->getFieldDefinition();

				// unset the sql setting here to avoid contaos models to think the field has a real database column
				unset($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['sql']);
			}
		}

		// versions
		if ( Input::get('versions') && Input::get('popup') )
		{
			$arrFields = $objSession->get('loadCustomElementFields');
		  	if(!is_array($arrFields))
		  	{
			  	$arrFields = array();
			}
			
			$objDC = new \StdClass;
			$objDC->table = $strTable;
			
			$arrFields = \array_unique($arrFields);
			foreach($arrFields as $strField)
			{
				$objAttribute = AttributeFactory::findByUuid($strField);
				// support duplicated fields
				if(!$objAttribute)
				{
					$objAttribute = AttributeFactory::findCloneByUuidAndOrigin($strField,$objSession->get('CURRENT_CE_ID'),$strTable);
				}
				if($objAttribute)
				{
					$objDC->field = $strField;
				
					$arrFieldDef = $objAttribute->getFieldDefinition();
					$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $arrFieldDef;
					// unset the sql setting here to avoid contaos models to think the field has a real database column
					unset($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['sql']);

					$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
					$strClass = $GLOBALS['BE_FFL'][$arrFieldDef['inputType']];
					
					$attributes = $strClass::getAttributesFromDca($arrFieldDef,$strField,'',$objDC->field,$objDC->table,$objDC);
					$objWidget = new $strClass($attributes);
					
					$arrChilds = array();
					if(!empty($arrOptions) && is_array($arrOptions))
					{
						if( method_exists($objAttribute,'parseWidgetCallback') )
						{
							$objAttribute->parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC,$objWidget->__get('value'));
						}
						$arrChilds = $objAttribute->get('arrChildAttributes');
					}
					
					if( !empty($arrChilds) )
					{
						foreach($arrChilds as $widget)
						{
							$fieldDef = $widget->fieldDef;
							if (empty($fieldDef['label']))
							{
								$arr = explode('_',$widget->name);
								$f = $arr[1];
								if( $f == 'linkText' )
								{
									$f = 'linkTitle';
								}
								$label = $f;
								if( $GLOBALS['TL_LANG'][$strTable][$f] )
								{
									$label = $GLOBALS['TL_LANG'][$strTable][$f][0];
								}
								$fieldDef['label'][0] = $objAttribute->get('title') .' > ' . $label;
							}
							$GLOBALS['TL_DCA'][$strTable]['fields'][$widget->name] = $fieldDef;	
						}
					}

				}
			}
		}
	   
	   	// load fields in editAll or overrideAll mode
		if(in_array(Input::get('act'), array('editAll','overrideAll')))
		{
			$this->loadFields($strTable,true,true);
		}

		// customelements should be the first one
		if( isset($GLOBALS['TL_DCA'][$strTable]['config']['onload_callback']) && is_array($GLOBALS['TL_DCA'][$strTable]['config']['onload_callback']) && !empty($GLOBALS['TL_DCA'][$strTable]['config']['onload_callback']))
		{
			ArrayUtil::arrayInsert($GLOBALS['TL_DCA'][$strTable]['config']['onload_callback'],0,array(array('PCT\CustomElements\Backend\BackendIntegration','buildBackendView')) );
		}
		else
		{
			$GLOBALS['TL_DCA'][$strTable]['config']['onload_callback'][] = array('PCT\CustomElements\Backend\BackendIntegration','buildBackendView');
		}
	}
	
	
	/**
	 * Set flag that user has changed something
	 * @param object
	 * 
	 * called from onsubit_callback
	 */
	public function setUpdateFlag($objDC = null)
	{
		$strTable = Input::get('table');
		if( $objDC !== null && isset($objDC->table) )
		{
			$strTable = $objDC->table;
		}

		$arrSet = array('tstamp'=>time());
		$objDatabase = Database::getInstance();
			
		// set database flag
		if($strTable == 'tl_pct_customelement')
		{
			$objDatabase->prepare("UPDATE tl_pct_customelement %s WHERE id=?")->set($arrSet)->execute($objDC->id);
			return;
		}
		else if($strTable == 'tl_pct_customelement_group')
		{
			$intId = $objDC->id ?? 0;
			if( Input::get('tid') !== null )
			{
				$intId = Input::get('tid');
			}
			
			$objGroup = $objDatabase->prepare("SELECT pid FROM tl_pct_customelement_group WHERE id=?")->limit(1)->execute($intId);
			$intPid = $objGroup->pid;
			
			$objDatabase->prepare("UPDATE tl_pct_customelement %s WHERE id=?")->set($arrSet)->execute($intPid);
			return;
		}
		else if($strTable == 'tl_pct_customelement_attribute')
		{
			$intId = $objDC->id ?? 0;
			if( Input::get('tid') !== null )
			{
				$intId = Input::get('tid');
			}
			$objAttribute = $objDatabase->prepare("SELECT id,pid FROM tl_pct_customelement_attribute WHERE id=?")->limit(1)->execute($intId);
			$objGroup = $objDatabase->prepare("SELECT id,pid FROM tl_pct_customelement_group WHERE id=?")->limit(1)->execute($objAttribute->pid);
			$intPid = $objGroup->pid;
			
			$objDatabase->prepare("UPDATE tl_pct_customelement %s WHERE id=?")->set($arrSet)->execute($intPid);
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objSession->set('customelements_widget_has_changed',1);
	}
	
	
	/**
	 * Load custom element fields in the Data Container
	 * @param string
	 * @param boolean
	 * @param boolean
	 */
	public function loadFields($strTable,$blnForced=false,$bolOverrideMode=false)
	{
		$intId = Input::get('id');
		
		$arrFields = array();
				
		// get the selection field for the current table
		$selectionfield = CustomElements::getSelectionField($strTable);
		// fetch directely when an id and a table is given and not in editAll or overrideAll mode
		if($intId > 0 && strlen($strTable) > 0 && !$bolOverrideMode)
		{
			$objActiveRecord = null;
			$strModel = Model::getClassFromTable($strTable) ?: '';
			if(class_exists($strModel))
			{
				if( \method_exists($strModel,'setTable') )
				{
					$strModel::setTable( $strTable );
				}
				$objActiveRecord = $strModel::findByPk($intId);
			}
			else
			{
				$objActiveRecord = Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($intId);
			}
			
			ControllerHelper::callstatic('loadDataContainer',array($strTable));
			
			if(!is_array($GLOBALS['TL_DCA'][$strTable]))
			{
				return ;
			}
			
			$objDC = new \PCT\CustomElements\Helper\DataContainerHelper();
			
			$objDC->id = $intId;
			$objDC->activeRecord = $objActiveRecord;
			$objDC->table = $strTable;
			
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
			$arrSession = $objSession->get($this->strSession);
			$arrRegistry = $arrSession['registry'][$objDC->table][$objDC->id] ?? array();
			
			if(Input::get('ajax') && Input::get('uuids'))
			{
				$arrUuids = json_decode(Input::get('uuids'),true);
				foreach($arrUuids as $intAttribute => $strCopyAttribute)
				{
					$objAttribute = AttributeFactory::findById($intAttribute);
					$arrFieldDef = $objAttribute->prepareForDca($objDC);
					$arrFields[] = $arrFieldDef;
					
					$objAttribute->set('uuid',$strCopyAttribute);
					$arrFieldDef = $objAttribute->prepareForDca($objDC);
					$arrFieldDef['name'] = $strCopyAttribute;
						
					$arrFields[] = $arrFieldDef;
				}
			}
			// force loading fields e.g. when content is loaded in a popup
			else if($blnForced && !$bolOverrideMode)
			{
			   $loadAll = true;
			   $strField = Input::get('field') ?: Input::post('field') ?: Input::get('name') ?: Input::post('name');
			   
			   if( Environment::get('isAjaxRequest') )
			   {
				   $strField = Input::post('name');
			   }
			   
			   // load a specific field only
			   if(strlen($strField) > 0)
			   {
				  $objAttribute = AttributeFactory::findByUuid($strField);
				  // try to look up a clone
				  if($objAttribute === null)
				  {
						$objAttribute = AttributeFactory::findCloneByUuidAndOrigin($strField,$intId,$strTable);
				  }
				  
				  if($objAttribute)
				  {
					  $arrFields[] = array('name'=>$strField, 'id'=>$objAttribute->get('id'), 'fieldDef'=>$objAttribute->getFieldDefinition());
					  $loadAll = false;
				  }
				  else
				  {
					  $loadAll = true;
				  }
			   }
			   if($loadAll)
			   {
				   $objCustomElement = CustomElementFactory::findByAlias($objActiveRecord->{$selectionfield});
				  	
				   if($objCustomElement)
				   {
				   		$arrFields = $objCustomElement->getFieldsForDca($objDC);
				   }
			   }
			}
			// load fields from session
			else if(!empty($arrRegistry))
			{
				$arrFields = $arrRegistry;
			}
			
			if(empty($arrFields))
			{
				return;
			}
			
			foreach($arrFields as $field)
			{
				$arrFieldDef = $field['fieldDef'];
				$strField = $field['name'];
				$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $arrFieldDef;
			}
			
			// write registry in global scope
			$GLOBALS['PCT_CUSTOMELEMENTS_REGISTRY'] = $arrRegistry;
			
			// clear the registry session
			$arrSession['registry'] = array();
			$objSession->set($this->strSession,$arrSession);
		}
		// !editAll, overrideAll Mode
		else if($blnForced && $bolOverrideMode)
		{
			$objVault = \PCT\CustomElements\Core\Vault::getInstance();
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
			
			$arrSession = $objSession->all();
			
			\Contao\Controller::loadDataContainer($strTable);
			
			$objDC = new \PCT\CustomElements\Helper\DataContainerHelper( $strTable );
			$objDC->strTable = $strTable;
			$objDC->table = $strTable;
				
			// get the selected fields by the POST variable
			if( isset($_POST['all_fields']) )
			{
				$arrSession['CURRENT'][$strTable] = $_POST['all_fields'];
			}
			
			if(!is_array($arrSession['CURRENT']))
			{
				return;
			}
			
			$arrFields = array();
			foreach($arrSession['CURRENT']['IDS'] as $id)
			{
				if(!$objDC)
				{
					$objDC = new \StdClass;
				}

				$objDC->id = $id;
				$strModel = Model::getClassFromTable($strTable) ?? '';
				if( class_exists($strModel))
				{
					if( \method_exists($strModel,'setTable') )
					{
						$strModel::setTable( $strTable );
					}
				}
				$objActiveRecord =  $strModel::findByPk($id); ##$objDatabase->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($id);
				$blnSubmitted = false;
				
				if($objActiveRecord === null )
				{
					continue;
				}
				
				$objCustomElement = CustomElementFactory::findByAlias($objActiveRecord->$selectionfield);
				if(!$objCustomElement)
				{
					continue;
				}

				$strCustomElement = $objCustomElement->get('alias');
				
				$arrFields = $objCustomElement->getFieldsForDca($objDC);
				if(empty($arrFields)) 
				{
					continue;
				}

				$arrPalettes = $this->getPalettesAsArray('default');
				// add to palettes
				if( !isset($arrPalettes['default']) || !is_array($arrPalettes['default']))
				{
					$arrPalettes['default'] = array();
				}

				// get current wizard
				$arrWizard = $objVault->getWizardData($objDC->id,$objDC->table) ?: array();
				if( !isset($arrWizard) || !\is_array($arrWizard) )
				{
					$arrWizard = array();
				}

				foreach($arrFields as $field)
				{
					$objAttribute = AttributeFactory::findById($field['id']);
					if( $objAttribute === null )
					{
						continue;
					}

					$strAlias = $objAttribute->alias;
					$strOrigField = $field['name'];
					$strField = $field['name'];
					$arrFieldDef = $field['fieldDef'];
					unset($arrFieldDef['eval']['tl_class']);
					
					$label = array();
					if( isset($arrFieldDef['label']) && \is_array($arrFieldDef['label']) )
					{
						$label = $arrFieldDef['label'];
					}
					$label[0] = $objCustomElement->get('title').' > '.  $objAttribute->title;
					$label[0] .= ' <style>label[for=all_'.$strField.'] > span {display:none; }</style>';
					$label[0] .= ' <span class="field">['.$strAlias.']</span>';
					unset($arrFieldDef['label']);
					$arrFieldDef['label'] = $label;
					unset($label);

					// load the current field value
					$arrFieldDef['load_callback'][] = array(get_class($this),'loadFieldValue');
					
					// field submitted
					if (Input::post('FORM_SUBMIT') == $strTable )
					{
						// trick contao with an input field callback to avoid regular saving
						if( !isset($arrFieldDef['input_field_callback']) || !is_array($arrFieldDef['input_field_callback']) )
						{
							$arrFieldDef['input_field_callback'] = array(get_class($this),'bypassContaoSaving');
						}

						$fieldSubmitted = $strField;
						// append the id in editAll mode
						if(Input::get('act') == 'editAll')
						{
							Input::setPost( $strField, null );
							$fieldSubmitted = $strField.'_'.$objDC->id;
						}
						
						if( Input::post($fieldSubmitted) )
						{
							$varValue = Input::postRaw($fieldSubmitted);
							
							// decode entities
							if( isset($arrFieldDef['eval']['decodeEntities']) && $arrFieldDef['eval']['decodeEntities'] )
							{
								$varValue = StringUtil::decodeEntities($varValue);
							}
							
							// store the new value in the wizard data
							$arrWizard['values'][$strField] = $varValue;

							// flag
							$blnSubmitted = true;
						}
					}

					// add to DCA
					$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $arrFieldDef;
					// add to palette
					$arrPalettes['default'][] = $strField;	
					
					// child attributes
					$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
					if( !isset($arrOptions) || !\is_array($arrOptions) )
					{
						$arrOptions = array();
					}
					foreach($arrOptions as $option)
					{
						if( \method_exists($objAttribute,'getOptionFieldDefinition') )
						{
							$field = $strOrigField.'_'.$option;
							
							// get child attribute field data
							$fieldDef = $objAttribute->getOptionFieldDefinition($option);
							unset($fieldDef['eval']['tl_class']);
							
							// load the current field value
							$fieldDef['load_callback'][] = array(get_class($this),'loadFieldValue');
							
							$label = array();
							if( isset($fieldDef['label']) && \is_array($fieldDef['label']) )
							{
								$label = $fieldDef['label'];
							}
							else
							{
								$label = array($option,'');
								if( isset($GLOBALS['TL_LANG'][$strTable][$option]) && \is_array($GLOBALS['TL_LANG'][$strTable][$option]) )
								{
									$label[0] = $GLOBALS['TL_LANG'][$strTable][$option][0];
								}
							}
							$label[0] = $objCustomElement->get('title').' > '.  $objAttribute->title . ' > '. $label[0];
							$label[0] .= ' <style>label[for=all_'.$field.'] > span {display:none; }</style>';
							$label[0] .= ' <span class="field">['.$strAlias.'_'.$option.']</span>';
							unset($fieldDef['label']);
							$fieldDef['label'] = $label;
							unset($label);

							// load image sizes
							if( $objAttribute->type == 'image' && $option == 'size' )
							{
								#$service = 'contao.image.sizes';
								#$fieldDef['options'] = System::getContainer()->get($service)->getAllOptions();
							}	
							
							// field submitted
							if (Input::post('FORM_SUBMIT') == $strTable )
							{
								// trick contao with an input field callback to avoid regular saving
								if( !isset($fieldDef['input_field_callback']) || !is_array($fieldDef['input_field_callback']) )
								{
									$fieldDef['input_field_callback'] = array(get_class($this),'bypassContaoSaving');
								}
								
								$fieldSubmitted = $field;
								// append the id in editAll mode
								if(Input::get('act') == 'editAll')
								{
									Input::setPost( $field, null );
									$fieldSubmitted = $field.'_'.$objDC->id;
								}
								
								if( Input::post($fieldSubmitted) )
								{
									$varValue = Input::post($fieldSubmitted);
								
									// decode entities
									if($arrFieldDef['eval']['decodeEntities'])
									{
										$varValue = StringUtil::decodeEntities($varValue);
									}
									
									// store the new value in the wizard data
									$arrWizard['values'][$field] = $varValue;
									// flag
									$blnSubmitted = true;
								}
							}

							// add to DCA
							$GLOBALS['TL_DCA'][$strTable]['fields'][$field] = $fieldDef;
							// add to palette
							$arrPalettes['default'][] = $field;	
						}
					}
				}
				
				$GLOBALS['TL_DCA'][$strTable]['palettes'][ $strCustomElement ] = $this->generatePalettes($arrPalettes);
				
				// save the wizard
				if ( Input::post('FORM_SUBMIT') == $strTable && $blnSubmitted === true )	
				{
					$objVault->saveWizardData($arrWizard,$objDC->id,$objDC->table);	
				}
			}
		}
	}
	
	
	/**
	 * Bypass contao save routing
	 */
	public function bypassContaoSaving(){}

	
	/**
	 * Load the value to the field from the vault
	 * @param mixed
	 * @param object
	 */
	public function loadFieldValue($varValue, $objDC)
	{
		$objAttribute = Cache::getAttribute($objDC->field);
		if(!$objAttribute)
		{
			$objAttribute = AttributeFactory::findByUuid($objDC->field);
		}
		
		$options = array();
		if($objAttribute)
		{
			$options['saveDataAs'] = $objAttribute->get('saveDataAs');
		}
		
		$varValue = \PCT\CustomElements\Core\Vault::getValue($objDC->field,$objDC->id,$objDC->table,$options);
		
		return \Contao\StringUtil::deserialize($varValue);
	}
	
	
	/**
	 * Create a new version
	 * @param object
	 *
	 * Called from onsubmit_callback
	 */
	public function createNewVersion($objDC)
	{
		// create version
		$objVersions = new \Contao\Versions($objDC->table, $objDC->id);
		$objVersions->initialize();
		$objVersions->create();
	
	}

	
	/**
	 * Clean the vault delete data from revised fields
	 * @param object
	 */
	public function removeFromVault($objDC, $intUndo=null)
	{
		$arrIds = array();
		$objDatabase = Database::getInstance();
			
		if($objDC->table == 'tl_pct_customelement_attribute')
		{
			Vault::removeAttributesById($objDC->id);
			return;
		}
		
		// delete all fields of a group from vault
		else if($objDC->table == 'tl_pct_customelement_group')
		{
			$objAttributes = Database::getInstance()->prepare("SELECT id FROM tl_pct_customelement_attribute WHERE pid=?")->execute($objDC->id);
			if($objAttributes->numRows < 1)
			{
				return;
			}
			
			Vault::removeAttributesById($objAttributes->fetchEach('id'));
			return;
		}
		
		// delete all fields of a custom element from vault
		else if($objDC->table == 'tl_pct_customelement')
		{
			$objGroups = $objDatabase->prepare("SELECT id FROM tl_pct_customelement_group WHERE pid=?")->execute($objDC->id);
			if($objGroups->numRows > 0)
			{
				$objAttributes = $objDatabase->prepare("SELECT id,uuid FROM tl_pct_customelement_attribute WHERE pid IN(".implode(',', $objGroups->fetchEach('id')).")")->execute();
				Vault::removeAttributesById($objAttributes->fetchEach('id'));
			}
			
			// remove revised wizard data
			$objRow = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
			$objCte = $objDatabase->prepare("SELECT id FROM tl_content WHERE type=?")->execute($objRow->alias);
			$objMod = $objDatabase->prepare("SELECT id FROM tl_module WHERE type=?")->execute($objRow->alias);
			$arrIds = array_merge($objCte->fetchEach('id'), $objMod->fetchEach('id'));
			
			if(empty($arrIds))
			{
				return;
			}
			
			// fetch vault entries
			$objVault = $objDatabase->prepare("
			SELECT id FROM tl_pct_customelement_vault 
			WHERE pid IN(".implode(',',$arrIds).") 
				AND ".Database::getInstance()->findInSet('source',$GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables'])
			)->execute();
			
			Vault::removeById($objVault->fetchEach('id'));
			return;
		}
		else if($objDC->table == 'tl_content' || $objDC->table == 'tl_module')
		{
			$objVault = $objDatabase->prepare("SELECT id FROM tl_pct_customelement_vault WHERE pid=? AND source=?")->execute($objDC->id,$objDC->table);
			$arrIds = $objVault->fetchEach('id');
		}
		else if($objDC->table == 'tl_article')
		{
			$arrCustomElements = CustomElements::getInstance()->getCustomElements('tl_content');
			$objCte = $objDatabase->prepare("SELECT id FROM tl_content WHERE pid=? AND ptable='tl_article' AND ".$objDatabase->findInSet('type',$arrCustomElements))->execute($objDC->id);
			if($objCte->numRows > 0)
			{
				$objVault = $objDatabase->prepare("SELECT id FROM tl_pct_customelement_vault WHERE pid IN(".implode(',', $objCte->fetchEach('id')).") AND source=?")->execute('tl_content');
				$arrIds = $objVault->fetchEach('id');
			}
		}
		else if($objDC->table == 'tl_page')
		{
			$arrCustomElements = CustomElements::getInstance()->getCustomElements('tl_content');
			$objArticles = $objDatabase->prepare("SELECT id FROM tl_article WHERE pid=?")->execute($objDC->id);
			if($objArticles->numRows < 1)
			{
				return;
			}
			$objCte = $objDatabase->prepare("SELECT id FROM tl_content WHERE pid IN(".implode(',', $objArticles->fetchEach('id')).") AND ptable='tl_article' AND ".$objDatabase->findInSet('type',$arrCustomElements))->execute();
			if($objCte->numRows > 0)
			{
				$objVault = $objDatabase->prepare("SELECT id FROM tl_pct_customelement_vault WHERE pid IN(".implode(',', $objCte->fetchEach('id')).") AND source=?")->execute('tl_content');
				$arrIds = $objVault->fetchEach('id');
			}
		}
		else
		{
			$arrIds = \PCT\CustomElements\Core\Hooks::callstatic('removeFromVaultHook',array($objDC));
		}
			
		if(count($arrIds) < 1)
		{
			return;
		}
		
		// update the undo statement
		if($intUndo)
		{
			// fetch affected vault record
			$objVault = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_vault WHERE id IN(".implode(',', $arrIds).")")->execute();

			$objUndo = $objDatabase->prepare("SELECT * FROM tl_undo WHERE id=?")->limit(1)->execute($intUndo);
			$arrData = \Contao\StringUtil::deserialize($objUndo->data);
			
			$arrData['tl_pct_customelement_vault'] = $objVault->fetchAllAssoc();
			$objDatabase->prepare("UPDATE tl_undo %s WHERE id=?")->set(array('data'=>serialize($arrData)))->execute($intUndo);
		}
		
		Vault::removeById($arrIds);
	}


	/**
	 * Observe the contao clipboard for custom elements to be duplicated and store the list in the session
	 * @param object
	 */
	public function observeClipboard($objDC)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objDatabase = Database::getInstance();
		$objCustomElement = CustomElements::getInstance();
		$arrClipboard = $objSession->get('CLIPBOARD');
		
		if(Input::get('childs') == 1 && Input::get('act') != '' && Input::get('mode') != '')
		{
			$arrClipboard[$objDC->table]['id'] = array_filter( array_merge(array($objDC->id, Input::get('pid')), $objDatabase->getChildRecords(array($objDC->id),$objDC->table,true)) );
		}
		
		if(empty($arrClipboard[$objDC->table]) || empty($arrClipboard[$objDC->table]['id']))
		{
			return;
		}
		
		$arrIds = $arrClipboard[$objDC->table]['id'];
		if(!is_array($arrIds) )
		{
			$arrIds = array($arrIds);
		}
		
		$strSource = '';
		$arrRootIds = array();
		
		// content custom elements
		if($objDC->table == 'tl_content' || $objDC->table == 'tl_module')
		{
			$arrCustomElements = $objCustomElement->getCustomElements($objDC->table);
			$objCte = $objDatabase->prepare("SELECT id,pid".($objDC->table == 'tl_content' ? ",sorting" : "")." FROM ".$objDC->table." WHERE id IN(".implode(',', $arrIds).") AND " . $objDatabase->findInSet('type',$arrCustomElements) . ($objDC->table == 'tl_content' ? " ORDER BY sorting" : ""))->execute();
			if($objCte->numRows < 1)
		   	{
				return;
			}
			while($objCte->next())
			{
				$arrRootIds[$objCte->sorting] = $objCte->id; 
			}
		}
		else if($objDC->table == 'tl_article')
		{
			$arrCustomElements = $objCustomElement->getCustomElements('tl_content');
			foreach($arrIds as $pid)
			{
				$objCte = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE pid=? AND " . $objDatabase->findInSet('type',$arrCustomElements) . " ORDER BY sorting")->execute($pid);
				if($objCte->numRows < 1)
			   	{
					return;
				}
				while($objCte->next())
				{
					$arrRootIds[$pid][$objCte->sorting] = $objCte->id;
				}
			}
		}
		else if($objDC->table == 'tl_news_archive')
		{
			$arrCustomElements = $objCustomElement->getCustomElements('tl_content');
			foreach($arrIds as $pid)
			{
				$objCte = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE pid=? AND ptable='tl_news' AND " . $objDatabase->findInSet('type',$arrCustomElements) . " ORDER BY sorting")->execute($pid);
				if($objCte->numRows < 1)
			   	{
					return;
				}
				while($objCte->next())
				{
					$arrRootIds[$pid][$objCte->sorting] = $objCte->id;
				}
			}
		}
		else if($objDC->table == 'tl_page')
		{
			$strSource = 'tl_article';
			
			// check for root pages
			$arrChilds = array();
			foreach($arrIds as $i => $id)
			{
				$objRootPage = $objDatabase->prepare("SELECT id,type FROM tl_page WHERE id=? AND type=?")->limit(1)->execute($id,'root');
				if($objRootPage->numRows > 0)
				{
					$arrChilds = array_merge($arrChilds,$objDatabase->getChildRecords(array($id),$objDC->table,true));
					unset($arrIds[$i]);
				}
			}
			
			if(!is_array($arrIds)) {$arrIds = array();}
			
			if(count($arrChilds) > 0)
			{
				$arrIds = array_unique(array_merge($arrIds,$arrChilds));
			}
				
			// no pages that can contain articles are selected
			if(count($arrIds) < 1)
			{
				return;
			}
			
			$objArticles = $objDatabase->prepare("SELECT id,pid FROM tl_article WHERE pid IN(".implode(',', $arrIds).") ORDER BY sorting")->execute();
			if($objArticles->numRows < 1)
			{
				return ;
			}
			
			while($objArticles->next())
			{
				$arrCustomElements = $objCustomElement->getCustomElements('tl_content');
				
				$objCte = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE pid=? AND " . $objDatabase->findInSet('type',$arrCustomElements) . " ORDER BY sorting")->execute($objArticles->id);
				if($objCte->numRows < 1)
			   	{
				   	continue;
				}
				while($objCte->next())
				{
					$arrRootIds[$objArticles->id][$objCte->sorting] = $objCte->id;
				}
			}
		}
		else
		{
			// allow other extensions to manipulate the output
			$arrCallback = \PCT\CustomElements\Core\Hooks::callstatic('observeClipboardHook',array($arrIds,$objDC->table,$objDC));
			
			$strSource = $arrCallback['source'];
			$arrRootIds = $arrCallback['ids'];
		}
		
		if(strlen($strSource) < 1)
		{
			$strSource = $objDC->table;
		}
		
		// set session
		$arrSession['clipboard'][$strSource]['PID'] = $arrRootIds;
		$objSession->set($this->strSession,$arrSession);
	}

	
	/**
	 * Store all the vault data in the session when duplicating a contao element
	 * @param integer	id of the new record
	 * @param object
	 *
	 * called from oncopy_callback
	 */
	public function createCopyInVault($intRecord, $objDC)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$objDatabase = Database::getInstance();
		$objCustomElement = CustomElements::getInstance();
		
		$arrSession = $objSession->get($this->strSession);
		
		$strTable = $objDC->table;

		if($objDC->table == 'tl_content' || $objDC->table == 'tl_module')
		{
			$this->duplicateVaultEntry($intRecord,$objDC->id,$strTable);
			return;
		}
		// tl_article
		else if($objDC->table == 'tl_article' || $objDC->table == 'tl_news' || $objDC->table == 'tl_calendar_events')
		{
			$arrCustomElements = $objCustomElement->getCustomElements('tl_content');
			// fetch the new entries
			$objNewCte = $objDatabase->prepare("SELECT * FROM tl_content WHERE pid=? AND ptable=? AND ".$objDatabase->findInSet('type',$arrCustomElements)." ORDER BY sorting")->execute($intRecord,$objDC->table);
			if($objNewCte->numRows < 1)
			{
				return;
			}

			if( empty($arrSession['clipboard'][$objDC->table]['PID'][$objDC->id]) && \Contao\Input::get('act') == 'copy' )
			{
				$objDC->_sourcePid = $objDC->id;
			}

			if( $objDC->_sourcePid )
			{
				$objOldCte = $objDatabase->prepare("SELECT * FROM tl_content WHERE pid=? AND ptable=? ORDER BY sorting")->execute($objDC->_sourcePid,$objDC->table);
				while($objOldCte->next())
				{
					$arrSession['clipboard'][$objDC->table]['PID'][$objDC->id][$objOldCte->sorting] = $objOldCte->id;
				}
			}

			while($objNewCte->next())
			{
				$intSourcePid = $arrSession['clipboard'][$objDC->table]['PID'][$objDC->id][$objNewCte->sorting];
				$this->duplicateVaultEntry($objNewCte->id,$intSourcePid,'tl_content');
			}
			return;
		}
		// tl_news_archive
		else if($objDC->table == 'tl_news_archive')
		{
			$arrCustomElements = $objCustomElement->getCustomElements('tl_content');
			// fetch source news entries
			$objOld = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE ptable='tl_news' AND ".$objDatabase->findInSet('type',$arrCustomElements)." AND pid IN (SELECT id FROM tl_news WHERE pid=? GROUP BY id) ORDER BY sorting")->execute($objDC->id);
			if($objOld->numRows < 1) 
			{
				return;
			}
			
			// collect old article ids by their sorting
			$ids = array();
			while($objOld->next())
			{
				$ids[$objOld->sorting] = $objOld->id;
			}
			
			// fetch the new entries
			$objNewCte = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_content WHERE ptable='tl_news' AND ".$objDatabase->findInSet('type',$arrCustomElements)." AND pid IN (SELECT id FROM tl_news WHERE pid=? GROUP BY id)  ORDER BY sorting")->execute($intRecord);
			if($objNewCte->numRows < 1)
			{
				return;
			}

			while($objNewCte->next())
			{
				$intSourcePid = $ids[$objNewCte->sorting];
				$this->duplicateVaultEntry($objNewCte->id,$intSourcePid,'tl_content');
			}
			
			return;

		}
		// tl_page
		else if($objDC->table == 'tl_page')
		{
			$hasChilds = (count($objDatabase->getChildRecords(array($intRecord),$objDC->table,true)) > 0 ? true : false);

			// check if the new page is a root page
			$objPage = $objDatabase->prepare("SELECT type FROM ".$objDC->table." WHERE id=? AND type=?")->limit(1)->execute($intRecord,'root');
			if($objPage->type == 'root' || $hasChilds === true)
			{
				$arrNewIds = $objDatabase->getChildRecords(array($intRecord),$objDC->table,true);
				$arrOldIds = $objDatabase->getChildRecords(array($objDC->id),$objDC->table,true);
				
				$dc = clone($objDC);
				foreach($arrNewIds as $i => $newRecord)
				{
					$dc->id = $arrOldIds[$i];
					$dc->intId = $arrOldIds[$i];
					$this->createCopyInVault($newRecord,$dc);
				}
			}

			$arrIds = array($objDC->id);
			
			// fetch old articles
			$objOld = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_article WHERE pid=? ORDER BY sorting")->execute($objDC->id);
			if($objOld->numRows < 1) {return;}
			
			// collect old article ids by their sorting
			$ids = array();
			while($objOld->next())
			{
				$ids[$objOld->sorting] = $objOld->id;
			}

			$objArticles = $objDatabase->prepare("SELECT id,pid,sorting FROM tl_article WHERE pid=? ORDER BY pid")->execute($intRecord);
			if($objArticles->numRows < 1)
			{
				return ;
			}

			// clone the datacontainer and mimic a call from a tl_article table
			$dc = clone($objDC);
			$dc->table = 'tl_article';
			while($objArticles->next())
			{
				$dc->id = $ids[$objArticles->sorting];
				$dc->intId = $ids[$objArticles->sorting];
				$dc->_sourcePid = $ids[$objArticles->sorting];
				// call recursive
				$this->createCopyInVault($objArticles->id,$dc);	
			}
			return ;
		}
		else
		{
			// allow other extensions to create copies in the vault on the fly
			\PCT\CustomElements\Core\Hooks::callstatic('createCopyInVaultHook',array($intRecord,$objDC,$this));
			return;
		}
	}
	
	
	/**
	 * Duplicate the vault entries for a specific contao element
	 * @param integer	the id of the target element
	 * @param integer	the id of the source element
	 * @param string	table
	 */
	public function duplicateVaultEntry($intTargetPid,$intSourcePid,$strSource)
	{
		if(!$intTargetPid || !$intSourcePid || strlen($strSource) < 1)
		{
			return;
		}
		
		$objDatabase = Database::getInstance();
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		// fetch source data from vault
		$objVault = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_vault WHERE pid=? AND source=?")->execute($intSourcePid,$strSource);
		if($objVault->numRows < 1)
		{
		   return;
		}
			
		$arrSession = $objSession->get($this->strSession);
		
		$time = time();
		$arrVault = $objVault->fetchAllAssoc();
		foreach($arrVault as $i => $arrEntry)
		{
			unset($arrEntry['id']);
			
			$arrSet = array();
			foreach($arrEntry as $k => $v)
			{
				$arrSet[$k] = $v;
			}
			
			// set pid of the new vault entry to the new entry id
			$arrSet['pid'] = $intTargetPid;
			$arrSet['source'] = $strSource;
			$arrSet['tstamp'] = $time;
			
			// insert row
			$objDatabase->prepare("INSERT INTO tl_pct_customelement_vault %s")->set($arrSet)->execute();
			
			$arrSession['copydata'][$strSource][$intTargetPid]['data'] = $arrSet;
		}
		
		$objSession->set($this->strSession,$arrSession);
	}
	

	/**
	 * Remove the temp copies from vault
	 * @param object
	 */
	public function removeCopyFromVault($objDC)
	{
		if(Input::get('act') == 'edit')
		{
			return;
		}
		
		$objDatabase = Database::getInstance();
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		$arrSession = $objSession->get($this->strSession);
		if(empty($arrSession['copydata'][$objDC->table]))
		{
			return;
		}
		
		foreach($arrSession['copydata'][$objDC->table] as $intId => $data)
		{
			// check if entry was created
			$objEntry = $objDatabase->prepare("SELECT id FROM ".$objDC->table." WHERE id=?")->execute($intId);
			
			// if user created the entry, its all good. move to the next and remove the session data for this entry
			if($objEntry->numRows > 0)
			{
				unset($arrSession['copydata'][$objDC->table][$intId]);
				continue;
			}
			
			// remove from vault
			$objDC->id = $intId;
			$this->removeFromVault($objDC);
			unset($arrSession['copydata'][$objDC->table][$intId]);
		}
		
		$objSession->set($this->strSession,$arrSession);
	}
	
	
	/**
	 * Execute Post Ajax Actions
	 * @param string
	 * @param object
	 */
	public function executePostActions($strAction,$objDC)
	{
		switch($strAction)
		{
			case 'toggleCustomElementSlide':
				$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
				$arrSession = $objSession->get('pct_customelements_togglers');
				if(!is_array($arrSession) || !isset($arrSession))
				{
					$arrSession = array();
				}
				$elem = Input::post('toggler');
				$state = Input::post('state');
				$arrSession[$elem] = $state;
				$objSession->set('pct_customelements_togglers',$arrSession);
				return;
				break;
			default:
				break;
		}
	}
	
	
	/**
	 * Tell CE to load the generic fields on any ajax request
	 * @param string
	 */
	public function executePreActions($strAction)
	{
		switch($strAction)
		{
			case 'reloadFiletree':
			case 'reloadPagetree':
			case 'reloadTabletree':
			case 'loadCustomElementFields':
				$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
				$strTable = Input::get('table') ?: Input::post('table');
				if(strlen($strTable) < 1)
				{
					$strTable = $objSession->get('CURRENT_CE_TABLE');
				}
				
				$intId = Input::get('id') ?: Input::post('id');
				if(!$intId)
				{
					$intId = $objSession->get('CURRENT_CE_ID');
				}
				
				// load CE related fields only on ajax requests
				if(Environment::get('isAjaxRequest'))
				{
					$strField = Input::post('name') ?: Input::post('field');
					
					$arrFields = $objSession->get('loadCustomElementFields') ?: array();
					if(in_array($strField, $arrFields))
					{
						return $this->loadFields($strTable,true);
					}
					
					// check if there is a wizard and if the field exists
					$arrWizard = \PCT\CustomElements\Core\Vault::getInstance()->getWizardData($intId,$strTable);
					if(!empty($arrWizard['uuid']) && is_array( $arrWizard['uuid']))
					{
						if(in_array($strField, $arrWizard['uuid']))
						{
							return $this->loadFields($strTable,true);
						}
					}
				}
					
				break;
		}
	}
	
	
	/**
	 * Set the table
	 * @param string
	 */
	public function setTable($strValue)
	{
		static::$strTable = $strValue;
		return $this;
	}
	
	
	/**
	 * Get the table
	 * @param string
	 */
	public function getTable()
	{
		return static::$strTable;	
	}
	
	
	/**
	 * Get the current palette
	 * @return array
	 */
	public function getPalettes()
	{
		return $this->arrPalettes;
	}
	
	
	/**
	 * Set a new palette
	 * @param array
	 */
	public function setPalettes($arrPalettes, $strInterface='')
	{
		$this->arrPalettes = $arrPalettes;
	}
	
	
	/**
	 * Split a palette string into an array
	 * @param string
	 * @return array
	 */
	protected function splitPalette($strPalette)
	{
		$arrReturn = array();

		// remove empty palettes
		$arrPalettes = explode(';', $strPalette);
		$arrPalettes = array_filter($arrPalettes,'strlen');

		if(empty($arrPalettes))
		{
			return array();
		}

		foreach($arrPalettes as $key => $palette)
		{
			// legends
			$preg = preg_match('/{(.*?)\}/', $palette,$result);
			$legend = '';
			if($preg)
			{
				$legend = $result[0];
				$key = $result[1];
			}
			// fields
			$arrFields = explode(',', $palette);

			if(empty($arrFields))
			{
				continue;
			}
			// filter the fields
			foreach($arrFields as $i => $f)
			{
				if($f == $legend)
				{
					unset($arrFields[$i]); continue;
				}
			}
			$arrFields = array_filter($arrFields,'strlen');
			$arrReturn[$key] = $arrFields;
		}

		return $arrReturn;
	}


	/**
	 * Return all palettes as an array of a certain table
	 * @param string
	 * @param string
	 * @return array
	 */
	public function getAllPalettesAsArray()
	{
		return $this->getPalettesAsArray($this->getTable());
	}


	/**
	 * Return a palette as an array of a certain table
	 * @param string  Table name, DCA table name
	 * @param string  Interface selector (default: mytable.type)
	 * @return array
	 */
	public function getPalettesAsArray($strInterface='')
	{
		$strTable = $this->getTable();
		
		ControllerHelper::callstatic('loadDataContainer',array($strTable));

		if(empty($GLOBALS['TL_DCA'][$strTable]['palettes']) || !isset($GLOBALS['TL_DCA'][$strTable]['palettes']))
		{
			return array();
		}

		$arrReturn = array();
		if(strlen($strInterface) > 0 && isset($GLOBALS['TL_DCA'][$strTable]['palettes'][$strInterface]))
		{
			$palette = $GLOBALS['TL_DCA'][$strTable]['palettes'][$strInterface];
			$arrReturn = $this->splitPalette($palette);
		}
		else
		{
			foreach($GLOBALS['TL_DCA'][$strTable]['palettes'] as $k => $palette)
			{
				if($k == '__selector__')
				{
					$arrReturn[$k] = $palette;
					continue;
				}
				$arrReturn[$k] = $this->splitPalette($palette);
			}
		}
		
		// set as current palette
		$this->setPalettes($arrReturn);
		
		return $arrReturn;
	}
	
	
	/**
	 * Remove a palette and return stack
	 * @param string
	 * @return array
	 */
	public function removeField($strField)
	{
		$arrPalettes = $this->getPalettes();
		if(empty($arrPalettes))
		{
			return false;
		}
		foreach($arrPalettes as $k => $palette)
		{
			foreach($palette as $i => $f)
			{
				if($strField == $f)
				{
					unset($arrPalettes[$k][$i]);
				}
			}
		}
		
		// set as current palette
		$this->setPalettes($arrPalettes);
		
		return $arrPalettes;
	}
	
	
	/**
	 * Remove a palette by its name and return stack
	 * @param string
	 * @return array
	 */
	public function removePalette($strPalette)
	{
		$arrPalettes = $this->getPalettes();
		
		if(count($arrPalettes) < 1)
		{
			return false;
		}
		
		foreach($arrPalettes as $k => $palette)
		{
			if($strPalette == $k || $strPalette == $k.':hide' || $strPalette == $k.'_legend' || $strPalette == $k.'_legend:hide')
			{
				unset($arrPalettes[$k]);
			}
		}
		
		// set as current palette
		$this->setPalettes($arrPalettes);
		
		return $arrPalettes;
	}
	
	
	/**
	 * Remove a stack of palettes by an array and return new stack
	 * @param array
	 * @return array
	 */
	public function removePalettes($arrPalettes)
	{
		foreach($arrPalettes as $strPalette)
		{
			$this->removePalette($strPalette);
		}
		
		return $this->getPalettes();
	}
	
	
	/**
	 * Check if a field exists in the palettes or in a specified palette
	 * @param string	Fieldname
	 * @param string	Palette / Legendname
	 */
	public function fieldExists($strField, $strPalette='', $strInterface='default')
	{
		$arrPalettes = $this->getPalettes();
		
		if( isset($arrPalettes[$strPalette]) && is_array($arrPalettes[$strPalette]))
		{
			if(in_array($strField, $arrPalettes[$strPalette]))
			{
				return true;
			}
		}
		
		// search for the field
		foreach($arrPalettes as $legend => $arrPalette)
		{
			if(in_array($strField, $arrPalette))
			{
				return true;
			}
		}
		
		return false;
	}


	/**
	 * Generate the palettes string from an array
	 * @param array
	 * @return string
	 */
	public function generatePalettes($arrPalettes=array(),$bolIsPanelLayout=false)
	{
		if(empty($arrPalettes))
		{
			$arrPalettes = $this->getPalettes();
		}
		
		if(empty($arrPalettes))
		{
			return '';
		}

		$strReturn = '';
		foreach($arrPalettes as $legend => $arrFields)
		{
			if(!$bolIsPanelLayout)
			{
				$strReturn .= '{'.$legend.'}'.',';
			}

			if(!is_array($arrFields))
			{
				$arrFields = array($arrFields);
			}

			foreach($arrFields as $i => $field)
			{
				if( \is_array($field) )
				{
					$field = \implode(',',$field);
				}
				$strReturn .= $field.',';
			}
			$strReturn = substr($strReturn, 0,-1);
			$strReturn .= ';';
		}
		return $strReturn;
	}


	/**
	 * Generate a subpalette array
	 * @param array
	 * @return array
	 */
	public function generateSubpalettes($arrSubpalettes)
	{
		if(empty($arrSubpalettes))
		{
			return array();
		}

		$arrReturn = array();
		foreach($arrSubpalettes as $k => $fields)
		{
			if(empty($fields)) {continue;}
			$arrReturn[$k] = implode(',', $fields);
		}

		return $arrReturn;
	}


	/**
	 * Return a panal layout string as array
	 * @param string
	 * @return array
	 */
	public function getPanelLayoutAsArray($strPanel)
	{
		return $this->splitPalette($strPanel);
	}


	/**
	 * Generate the panel layout string from an arrray
	 * @param array
	 * @return string
	 */
	public function generatePanelLayout($arrPanel)
	{
		return $this->generatePalettes($arrPanel,true);
	}


	/**
	 * Add a new selector field
	 * @param string
	 * @return array
	 */
	public function addSelector($strField)
	{
		$strTable = $this->getTable();
		
		ControllerHelper::callstatic('loadDataContainer',array($strTable));
		
		// create selector array
		if(!isset($GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__']))
		{
			$GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__'] = array();
		}
		
		if(!in_array($strField, $GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__']))
		{
			$GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__'][] = $strField;
		}
	}
	
	
	/**
	 * Add a new subpalett to a selector
	 * @param string	Name of the selector
	 * @param array		The palette array
	 */
	public function addSubpalette($strSelector, $arrPalettes)
	{
		$strTable = $this->getTable();
		
		ControllerHelper::callstatic('loadDataContainer',array($strTable));
		
		// create selector array
		if( !isset($GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__']) || !is_array($GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__']))
		{
			$GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__'] = array();
		}
		
		// add the selector field if not done before
		if(!in_array($strSelector, $GLOBALS['TL_DCA'][$strTable]['palettes']['__selector__']))
		{
			$this->addSelector($strSelector);
		}
		
		$subs = $this->generateSubpalettes(array($strSelector=>$arrPalettes));
		
		$GLOBALS['TL_DCA'][$strTable]['subpalettes'][$strSelector] = $subs[$strSelector];
	}


	/**
	 * Return the active record db result
	 * @param integer
	 * @param string
	 * @return object
	 */
	public function getActiveRecord($intId=0)
	{
		if($intId < 1)
		{
			$intId = Input::get('id');
		}
		
		$strTable = $this->getTable();
		
		if(strlen($strTable) < 1)
		{
			$strTable = Input::get('table');
		}

		// check if table exists
		if(!Database::getInstance()->tableExists($strTable) || !$intId || !$strTable)
		{
			return null;
		}
		
		$objReturn = null;
		$strClass = Model::getClassFromTable($strTable);
		if( !empty($strClass) )
		{
			$objReturn = $strClass::findByPk( $intId );
		}
		else
		{
			$objReturn = Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($intId);
		}

		if( $objReturn === null )
		{
			return null;
		}

		return $objReturn;
	}
	
	
	/**
	 * Insert a palette at a certain position
	 * http://mutinyworks.com/blog/2012/05/25/insert-into-associative-array-at-position-php/
	 */
	public function insertPalette(&$arr, $arrInsert, $intPosition)
	{
		$c = $arr;
		$a = array_splice($arr, 0, $intPosition);
		$b = array_splice($c, $intPosition);
		return $a + $arrInsert + $b;
	}
	 
	 
	/**
	 * Add fields to the dca
	 * @param array
	 */
	public function addFields($arrFields)
	{
		$strTable = $this->getTable();
		
		if(!isset($GLOBALS['TL_DCA'][$strTable]['fields']))
		{
			$GLOBALS['TL_DCA'][$strTable]['fields'] = array();
		}
		
		$GLOBALS['TL_DCA'][$strTable]['fields'] = array_merge($GLOBALS['TL_DCA'][$strTable]['fields'],$arrFields);
	}
	
	
	/**
	 * Add a field to the dca
	 * @param array		Field definition
	 */
	public function addField($strField, $arrFieldDef)
	{
		$strTable = $this->getTable();
		
		if(!is_array($GLOBALS['TL_DCA'][$strTable]['fields']))
		{
			$GLOBALS['TL_DCA'][$strTable]['fields'] = array();
		}
		
		$GLOBALS['TL_DCA'][$strTable]['fields'][$strField] = $arrFieldDef;
	}
	
	 
	/**
	 * Toggle the publish / visiblity state of any element / row
	 * @param integer
	 * @param boolean
	 * @param string
	 * @param string
	 */
	public function toggleElementVisibility($intId, $blnVisible, $strTable, $strPublishField='published')
	{
		// Check permissions to edit
		Input::setGet('id', $intId);
		Input::setGet('act', 'toggle');
		Input::setGet('ttable', $strTable);
		
		// set the update flat
		$dc = new \StdClass();
		$dc->table = $strTable;
		$dc->id = $intId;
		$dc->activeRecord = Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($intId);
		
		$this->setUpdateFlag($dc);
		
		#$this->table = $strTable;
		#$this->id = $intId;
		
		$this->User = BackendUser::getInstance();
		
		// Check permissions to publish
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		if (!$this->User->isAdmin && !$objSecurity->isGranted('contao_user.alexf',$strTable.'::'.$strPublishField) )
		{
		    System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to publish/unpublish item ID "'.$intId.'"');		
		 	\Contao\Controller::redirect('contao/main.php?act=error');
		}

		$objVersions = new Versions($strTable, $intId);
		$objVersions->initialize();
		
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA'][$strTable]['fields'][$strPublishField]['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA'][$strTable]['fields'][$strPublishField]['save_callback'] as $callback)
			{
				$blnVisible = System::importStatic($callback[0])->{$callback[1]}($blnVisible, $dc);
			}
		}
		
		// Update the database
		Database::getInstance()->prepare("UPDATE ".$strTable." SET tstamp=". time() .", ".$strPublishField."='" . ($blnVisible ? 1 : '') . "' WHERE id=?")->execute($intId);

		$objVersions->create();
		
		System::getContainer()->get('monolog.logger.contao.general')->info('A new version of record '.$strTable.'".id='.$intId.'" has been created');	
	}
	

	/**
	 * Clear the session when user leaves the editing mode
	 * called from reviseTable Hook
	 */
	public function clearSession()
	{
		if( \Contao\Input::get('act') == '' || \Contao\Input::get('act') == null )
		{
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
			$objSession->remove($this->strSession);
			$objSession->remove('loadCustomElementFields');
			$objSession->remove('CUSTOMELEMENTS_DCA');
		}
	}
}