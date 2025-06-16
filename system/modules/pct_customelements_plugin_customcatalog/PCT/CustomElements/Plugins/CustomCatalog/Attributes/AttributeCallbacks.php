<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */
		
/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Attributes;

use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * AttributeCallbacks
 */
class AttributeCallbacks
{
	/**
	 * Field name
	 * @var string
	 */
	protected $strField;
	
	/**
	 * Value
	 * @var mixed
	 */
	protected $varValue;
	
	/**
	 * Field definition
	 * @var array
	 */
	protected $arrFieldDef;
	
	/**
	 * Attribute object
	 * @var object
	 */
	protected $objAttribute;
	
	
	/**
	 * Render an attribute
	 * @param string
	 * @param string
	 * @param mixed
	 * @param array
	 * @param object
	 * @return string
	 * Called from renderAttribute HOOK
	 */
	public function renderAttribute($strField,$varValue,$objTemplate,$objAttribute)
	{
		if(!$objAttribute)
		{
			return '';
		}
		
		$this->strField = $strField;
		$this->varValue = $varValue;
		$this->objAttribute = $objAttribute;
		
		$objOrigin = $this->objAttribute->get('objOrigin');
		
		if( !isset($objTemplate) || $objTemplate === null )
		{
			$strTemplate = $objAttribute->get('template') ?? '';
			if( empty($strTemplate) )
			{
				$strTemplate = 'customelement_attr_default';
			}
			$objTemplate = new \PCT\CustomElements\Core\FrontendTemplate($strTemplate);
		}
		
		// check if the attribute might has been processed by the render function through a custom element before
		$blnIsCustomElement = false;
		if(isset($objOrigin))
		{
			if(in_array($objOrigin->getTable(), $GLOBALS['PCT_CUSTOMELEMENTS']['allowedTables']))
			{
				$blnIsCustomElement = true; 
			}
		}

		// use the field alias in CC
		if( $blnIsCustomElement === false )
		{
			$strField = $objAttribute->alias;
			$this->strField = $objAttribute->alias;
		}

		// pass more template variables
		$objTemplate->CustomCatalog = $this->objAttribute->get('objCustomCatalog');
		$objTemplate->ActiveRecord = $this->objAttribute->get('objActiveRecord');
		$objTemplate->Attribute = $objAttribute;
		
		$arrCssID = \Contao\StringUtil::deserialize( $this->objAttribute->get('cssID') );
		if( isset($arrCssID[0]) && !empty($arrCssID[0]) )
		{
			$objTemplate->cssID = 'id="'.$arrCssID[0].'"';
		}

		$arrClass = array('ce_'.$this->objAttribute->get('type'),'attribute',$this->objAttribute->get('type'));
		if( isset($arrCssID[1]) )
		{
			$arrClass[] = $arrCssID[1];
		}
		$objTemplate->class = \implode(' ',$arrClass);
		
		// update attribute object
		$objAttribute->Template = $objTemplate;

		if($objAttribute->get('type') == 'image')
		{
			// use CEs own rendering
			if($blnIsCustomElement) 
			{
				return '';
			}	
			$strImage = $this->renderAttributeImage();
			$objTemplate->value = $strImage;
			return $objTemplate->parse();
		}
		else if($objAttribute->get('type') == 'select' && $objAttribute->get('eval_multiple') && version_compare(PCT_CUSTOMELEMENTS_VERSION, '1.7.1','<=') && is_array(\Contao\StringUtil::deserialize($varValue)) )
		{
			$arrFieldDef = $objAttribute->getFieldDefinition();
			
			$arrValues = array();
			foreach(\Contao\StringUtil::deserialize($varValue) as $value)
			{
				if($objAttribute->hasTranslation($value))
				{
					$arrValues[] = $objAttribute->getTranslatedValue($value);
				}
				else
				{
					$arrValues[] = $arrFieldDef['options'][$value];
				}
			}
									
			// generate the attribute and place html in attribute template
			$objTemplate->value = implode(',',$arrValues);
			return $objTemplate->parse();
		}
		else
		{
			// generate the attribute
			$objAttribute = $objAttribute->generate();
			
			if(!$objAttribute || $blnIsCustomElement)
			{
			   return '';
			}
			
			$objActiveRecord = $this->objAttribute->get('objActiveRecord');
			
			// must clone the object here to avoid unwanted overrides
			if($objActiveRecord !== null && strlen(strpos(get_class($objActiveRecord), 'Helper')) > 0)
			{
				$objActiveRecord = clone($objActiveRecord);
			}
			
			$objCC = $this->objAttribute->get('objCustomCatalog');
			$objOrigin = $this->objAttribute->get('objOrigin');
			
			if(!$objOrigin && $objCC !== null)
			{
				$objOrigin = \PCT\CustomElements\Core\Origin::getInstance();
				$objOrigin->set('strTable',$objCC->getTable());
				$objOrigin->set('intPid',$objActiveRecord->id);
				$objOrigin->set('objActiveRecord',$objActiveRecord);
				#$objOrigin->set('objCustomElement',$objCC);
				$objOrigin->set('objCustomCatalog',$objCC);
				if($objCC)
				{
					$objOrigin->set('objCustomElement',$objCC->getCustomElement());
				}
			}
			
			$arrTableContentFields = $GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesSharedWithContao'] ?: array('headline','singleSRC','multiSRC');
			// merge with the list from CE if it exists
			if(is_array($GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao']) && !empty($GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao']))
			{
				$arrTableContentFields = array_merge($GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesSharedWithContao'], $GLOBALS['PCT_CUSTOMELEMENTS']['fieldnamesSharedWithContao']);
			}
			
			foreach($arrTableContentFields as $f)
			{
				if($f != $objAttribute->get('alias') && !empty($objActiveRecord) && isset($objActiveRecord->{$f}))
				{
					$objActiveRecord->{$f} = null;
				}
			}
			
			$objAttribute->setOrigin($objOrigin);
			$objAttribute->setValue($varValue);
			$objAttribute->set('objActiveRecord',$objActiveRecord);
			
			$objAttribute->attribute = $objAttribute;
			$objTemplate->activeRecord = $objActiveRecord;
			$objTemplate->isCustomElement = $blnIsCustomElement;
				
			if(method_exists($objAttribute, 'renderCallback') && !$blnIsCustomElement)
			{
				$arrOptionValues = array();
				// set the options values
				$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
			 	if( !empty($arrOptions) && is_array($arrOptions) && !in_array($objAttribute->get('type'), $GLOBALS['PCT_CUSTOMCATALOG']['ignoreOptionFields']) )
			 	{
				 	foreach($arrOptions as $strOption)
				 	{
						if( \is_array($strOption) )
						{
							continue;
						}

						$arrOptionValues[$strOption] = $objActiveRecord->{$strField.'_'.$strOption};
				 	}
			 	}
			 	
			 	if(count($arrOptionValues) > 0)
			 	{
			 		$objAttribute->setOptionValues($arrOptionValues);
				}
				
				return $objAttribute->renderCallback($strField,\Contao\StringUtil::deserialize($varValue),clone($objTemplate),$objAttribute);
			}
			else
			{
				$objTemplate->value = $varValue;
				return $objTemplate->parse();
			}
 				
		}
		
		return '';
	}


		/**
	 * Render an AttributeImage attribute
	 * @return string
	 */
	protected function renderAttributeImage()
	{
		$objAttribute = $this->objAttribute;
		if(!isset($objAttribute->objCustomCatalog))
		{
			return '';
		}
		
		$strField = $objAttribute->get('alias');
		$objActiveRecord = $objAttribute->get('objActiveRecord');
		
		if($objActiveRecord->numRows < 1 || !isset($objActiveRecord->{$strField}))
		{
			return '';
		}
		
		$objModule = $objAttribute->objCustomCatalog->getOrigin();
		
		// get all possible size sources
		$arrSizeFromModule = array_filter( \Contao\StringUtil::deserialize($objModule->customcatalog_imgSize) ?: array() ?? array() );
		$arrSizeFromAttribute = array_filter( \Contao\StringUtil::deserialize($objAttribute->get('size') ?? array()) ) ;
		$arrSizeFromRecord = array_filter( \Contao\StringUtil::deserialize($objActiveRecord->{$strField.'_size'}) ?? array() );
		$arrSize = array();
		
		// set the size to the default attribute size settings
		$arrSize = $arrSizeFromAttribute;
		
		// if the record overwrites the size
		if(count($arrSizeFromRecord) > 0)
		{
			$arrSize = $arrSizeFromRecord;
		}
		
		// check if list module overwrites
		if(count($arrSizeFromModule) > 0)
		{
			// check if a spezific image attribute is selected
			$arrAttributes = \Contao\StringUtil::deserialize($objModule->customcatalog_attr_image);
			
			if( !empty($arrAttributes) && is_array($arrAttributes) )
			{
				if(in_array($objAttribute->get('alias'), $arrAttributes))
				{
					$arrSize = $arrSizeFromModule;
				}
			}
		}


		$blnOverwriteMeta = false;
		$objOrig = $objActiveRecord;
		$objActiveRecord = new \Contao\ContentModel();
		$objActiveRecord->mergeRow( $objOrig->row() );
		$objActiveRecord->__set('strPk',$objActiveRecord->id);
		
		$arrOptionValues = array_filter( $objAttribute->loadOptionValues($strField) );
		foreach($arrOptionValues as $k => $v)
		{
			$objActiveRecord->{$k} = $objActiveRecord->{$strField.'_'.$k};;
			// meta data fields
			if( \in_array($k, array('title','alt','caption','imageUrl') ) )
			{
				$blnOverwriteMeta = true;
			}
		}
		$objActiveRecord->size = $arrSize;
		$objActiveRecord->href = $objActiveRecord->imageUrl;
		$objActiveRecord->overwriteMeta = $blnOverwriteMeta;
		$objActiveRecord->fullsize = false;
		if( isset($objActiveRecord->{$strField.'_fullsize'}) )
		{
			$objActiveRecord->fullsize = (boolean)$objActiveRecord->{$strField.'_fullsize'};
		}
		
		$objMyAttribute = new \Contao\ContentImage($objActiveRecord);
		$objMyAttribute->type = $this->objAttribute->get('type');
		$objMyAttribute->singleSRC = $this->varValue;
		return \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace( $objMyAttribute->generate() ?? '' );
	}


	/**
	 * Do post rendering processes
	 * @param string $strBuffer 
	 * @param string $strField 
	 * @param mixed $varValue 
	 * @param array $arrFieldDef 
	 * @param object $objAttribute 
	 * @return string 
	 * called from $GLOBALS['CUSTOMELEMENTS_HOOKS']['renderAttribute'] Hook
	 */
	public function postRenderAttribute($strBuffer,$strField,$varValue,$arrFieldDef,$objAttribute)
	{
		return $strBuffer;
	}
	
		
	/**
	 * Render the backend explanation in the backend
	 * @param object
	 * @return string
	 */
	public function renderAttributeBackendExplanation($objDC)
	{
		// fetch Attribute
		$objAttribute = \PCT\CustomElements\Core\AttributeFactory::fetchByAlias($objDC->field);
		if($objAttribute === null || $objAttribute->id < 1)
		{
			return '';
		}
		return '<div class="field backend_explanation">'.$objAttribute->description.'</div>';
	}
	
	
	/**
	 * Modify the field DCA settings on the fly
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @param object
	 * @param object
	 * @return array
	 */
	public function prepareField($arrData,$strField,$objAttribute,$objCC,$objCE,$objSystemIntegration)
	{
		// set the orgin to the customcatalog
		$objAttribute->setOrigin($objCC);
		
		$strTable = $objCC->getTable();
		// modify by type
		switch($objAttribute->get('type'))
		{
			case 'text':
				// decodeEntities by default
				$arrData['fieldDef']['eval']['decodeEntities'] = true;
				break;
			case 'url':
				unset($arrData['fieldDef']['wizard']);
				break;
			case 'textarea':
				
				if($objAttribute->get('eval_rte'))
				{
					$strPath = \Contao\TemplateLoader::getPath( $objAttribute->get('tinyTpl'),'html5' );
					$strCorePath = Controller::rootDir().'/'.PCT_CUSTOMELEMENTS_PATH.'/templates/backend/tinymce.html5';
					
					if($strPath == $strCorePath)
					{
						break;
					}
					
					// set tiny template
					$arrData['fieldDef']['eval']['rte'] = $objAttribute->get('tinyTpl');
				}
				
				break;
			case 'timestamp':
				// filter by months
				$arrData['fieldDef']['flag'] = 7;
				break;
			case 'checkbox':
				// remove any default value if not set before
				if(isset($arrData['fieldDef']['default']) && !$arrData['fieldDef']['default'])
				{
					unset($arrData['fieldDef']['default']);
				}
				break;
			case 'checkboxMenu':
				$arrData['fieldDef']['sql'] = "blob NULL";
				break;
			case 'selectdb':
				// no need to load the references
				if(!$objAttribute->get('be_visible') && !$objAttribute->get('be_filter'))
				{
					return $arrData;
				}
		
				if(\Contao\Input::get('act') != 'edit' && strlen(strpos(\Contao\Environment::get('scriptName'),'install.php')) < 1)
				{
					$strSource = $objAttribute->get('selectdb_table');
					if(\Contao\Database::getInstance()->fieldExists('id',$strSource) && $objAttribute->get('selectdb_key') == 'id')
					{
						$arrData['fieldDef']['foreignKey'] = $objAttribute->get('selectdb_table').'.'.$objAttribute->get('selectdb_value');
						$arrData['fieldDef']['relation'] = array('type'=>'hasMany', 'load'=>'lazy');
					}
					else
					{
						$objDC = new \StdClass();
						$objDC->table = $strTable;
						$objDC->field = $strField;
						$arrData['fieldDef']['options'] = $objAttribute->getOptions($objDC);
					}
					
					if( isset($arrData['fieldDef']['options_callback']) && is_array($arrData['fieldDef']['options_callback']) && count($arrData['fieldDef']['options_callback']) > 0)
					{
						unset($arrData['fieldDef']['options_callback']);
					}
				}
				break;
			case 'select':
				if($objAttribute->get('multiple') || isset($arrData['fieldDef']['eval']['multiple']) && $arrData['fieldDef']['eval']['multiple'] )
				{
					$arrData['fieldDef']['eval']['chosen'] = true;
					$arrData['fieldDef']['sql'] = "blob NULL";
				}
				break;
			case 'backend_explanation':
				$arrData['fieldDef']['input_field_callback'] = array(get_class($this),'renderAttributeBackendExplanation');
				break;
			case 'rateit':
				if ( Controller::isBackend() && \Contao\Input::get('edit') != '' )
				{
					unset($GLOBALS['TL_DCA'][$strTable]['fields'][$strField.'_counter']['inputType']);
					unset($GLOBALS['TL_DCA'][$strTable]['fields'][$strField.'_value']['inputType']);
				}
				break;
			case 'pagetree':
				if( isset($objAttribute->defaultValue) && $objAttribute->defaultValue)
				{
					unset($arrData['fieldDef']['default']);
				}
				break;
			case 'image':
			case 'files':
				unset($arrData['fieldDef']['filter']);
				unset($arrData['fieldDef']['search']);
				unset($arrData['fieldDef']['sorting']);
				break;
		}
		
		// remove any tiny mce relations if field is not a textarea
		if( !in_array($objAttribute->get('type'),array('textarea')) )
		{
			unset($arrData['fieldDef']['eval']['rte']);
		}
		
		// store fields that call custom backend filter
		if(method_exists($objAttribute,'getBackendFilterOptions') || $objAttribute->get('hasCustomBackendFilter') > 0 && ($objAttribute->get('be_filter') > 0 || $objAttribute->get('be_sorting') > 0 || $objAttribute->get('be_search') > 0) )
		{
			$arrData['customcatalog'] = $objCC->get('id');
			$arrData['customelement'] = $objCE->get('id');
			
			$GLOBALS['PCT_CUSTOMCATALOG']['filterFields'][$strTable][$strField] = $arrData;
		}
		
		//	store fields for custom sorting
		$arrListFields = \Contao\StringUtil::deserialize($objCC->get('list_fields'));
		if(!is_array($arrListFields))
		{
			$arrListFields = array();
		}
		
		if($objAttribute->get('be_sorting') || in_array($strField, $arrListFields) || $objAttribute->get('hasCustomBackendSorting') > 0)
		{
			$arrData['customcatalog'] = $objCC->get('id');
			$arrData['customelement'] = $objCE->get('id');
			
			$GLOBALS['PCT_CUSTOMCATALOG']['sortFields'][$strTable][$strField] = $arrData;
		}
		
		if( !isset($GLOBALS['TL_DCA']['tl_pct_customelement_attribute'][$strTable][$objAttribute->get('alias')]['eval']['doNotCheckMultilanguage']) )
		{
			$GLOBALS['TL_DCA']['tl_pct_customelement_attribute'][$strTable][$objAttribute->get('alias')]['eval']['doNotCheckMultilanguage'] = false;
		}
		
		// check unique values in multilanguage
		if( isset($arrData['fieldDef']['eval']['unique']) && $arrData['fieldDef']['eval']['unique'] && $objCC->get('multilanguage') && !$GLOBALS['TL_DCA']['tl_pct_customelement_attribute'][$strTable][$objAttribute->get('alias')]['eval']['doNotCheckMultilanguage'])
		{
			$arrData['fieldDef']['eval']['unique'] = false;
			$arrData['fieldDef']['save_callback'][] = array('\PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper','checkUniqueForLanguages');
		}
		
		if( isset($GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTable]) )
		{
			// translate backend labels 
			if( is_array($GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTable]['fields'][$objAttribute->get('alias')]) || is_array($GLOBALS['TL_LANG']['CUSTOMCATALOG']['*']['fields'][$objAttribute->get('alias')]) )
			{
				$arrData['fieldDef']['label'] = $GLOBALS['TL_LANG']['CUSTOMCATALOG'][$strTable]['fields'][$objAttribute->get('alias')] ?: $GLOBALS['TL_LANG']['CUSTOMCATALOG']['*']['fields'][$objAttribute->get('alias')];
			}
		}

		// tl_member fields should be feEditable
		if( $strTable == 'tl_member' )
		{
			$arrData['fieldDef']['eval']['feEditable'] = true;
			$arrData['fieldDef']['eval']['feViewable'] = true; 
			$arrData['fieldDef']['eval']['feGroup'] = 'personal';
		}
		
		return $arrData;
	}
	
	
	/**
	 * Return the field defintion for an option field for attributes without its own getOptionFieldDefintion method
	 * @param array			An array with information about the field processed
	 * @param string		The field name
	 * @param string		The option name
	 * @param object		The attribute object
	 * @param object		The current custom catalog object
	 * @param object		The current custom element object
	 * @param object		The class object calling (SystemIntegration)
	 * @return array|null	Return empty array or null to skip the field	
	 */
	public function getOptionFieldDefinition($arrData,$strField,$strOption,$objAttribute,$objCC,$objCE,$objSystemIntegration)
	{
		\Contao\Controller::loadDataContainer('tl_content');
		
		$arrReturn = array();
		switch($objAttribute->get('type'))
		{
			case 'url':
				if($strOption == 'lightbox')
				{
					$strOption = 'rel';
				}
				else if($strOption == 'linkText')
				{
					$strOption = 'linkTitle';
				}
				else if($strOption == 'linkText')
				{
					$strOption = 'linkTitle';
				}
				
				if(!isset($GLOBALS['TL_DCA']['tl_content']['fields'][$strOption]))
				{
					return array();
				}
				
				$arrReturn = $GLOBALS['TL_DCA']['tl_content']['fields'][$strOption];
				$arrReturn['eval']['tl_class'] .= ' w50';
				$arrReturn['saveDataAs'] = 'varchar';
				
				break;
			case 'image':
				if($strOption == 'title')
				{
					$arrReturn = $GLOBALS['TL_DCA']['tl_content']['fields']['imageTitle'];
					$arrReturn['eval']['tl_class'] = 'w50';
				}
				break;
		}
		return $arrReturn;
	}
	
}