<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\ThemeDesigner;

use PCT\ThemeDesigner;

/**
 * Class file
 * Section
 */
class Section extends \PCT\ThemeDesigner
{
	/**
	 * The template for each section
	 * @var string
	 */
	protected $strTemplate = 'td_section';
	
	/**
	 * Store navigations items
	 * @var array
	 */
	protected $arrItems = array();
	
	/**
	 * Start section
	 * @var string
	 */
	protected $strSection = '';
	
	/**
	 * ThemeDesigner config array
	 * @var array
	 */
	protected $arrConfig = array();
	
	/**
	 * Store subsections
	 * @param array
	 */
	protected $arrSubSections= array();
	
	/**
	 * Active flag
	 * @param boolean
	 */
	protected $blnIsActive = false;
	
	/**
	 * Active palette name
	 * @param boolean
	 */
	protected $strActivePalette = '';

	/**
	 * Theme Designer object
	 * @var ThemeDesigner
	 */
	protected $ThemeDesigner = null;
	
	/**
	 * Init
	 * @return null
	 */
	public function __construct($strSection='')
	{
		if(!is_array($GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$strSection]) || empty($GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$strSection]) )
		{
			return;
		}
		
		$this->ThemeDesigner = new \PCT\ThemeDesigner;
		$this->arrConfig = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$strSection];
		$this->strSection = $strSection;
		
		$arrSession = $this->ThemeDesigner->getSession();
		
		if($GLOBALS['PCT_THEMEDESIGNER']['startSection'] == $strSection && empty($arrSession['NAVI']['active']))
		{
			$this->blnIsActive = true;
		}
		// GET parameter override
		else if(\Contao\Input::get('section') != '' && \Contao\Input::get('section') == $strSection)
		{
			$this->blnIsActive = true;
		}
		
		// user changed section
		if( isset($arrSession['NAVI']['active']) && $arrSession['NAVI']['active'] == $strSection)
		{
			$this->blnIsActive = true;
		}
		
		// active palette
		if(\Contao\Input::get('palette') != '')
		{
			$this->strActivePalette = \Contao\Input::get('palette');
		}
	}
	
	
	/**
	 * Setter
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		switch($strKey)
		{
			case 'template':
				$strKey = 'strTemplate';
				break;
		}
		
		$this->{$strKey} = $varValue;
	}
	
	
	/**
	 * Getter
	 * @param string
	 */
	public function get($strKey)
	{
		return $this->{$strKey};
	}
	
	
	/**
	 * Catch ajax requests
	 * @param object
	 * @param object
	 * @param object
	 * called from: generatePage Hook
	 */
	public function ajaxListener()
	{
		if( !\Contao\Environment::get('isAjaxRequest') )
		{
			return ;
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get('PCT_THEMEDESIGNER_SECTION');
		if(!is_array($arrSession))
		{
			$arrSession = array
			(
				'active' => array(),
			);
		}
		
		
		switch(\Contao\Input::get('action'))
		{
			// toggle palette
			case 'togglePalette':
				$strIdent = \Contao\Input::get('section').'__'.\Contao\Input::get('palette');
				$arrSession['toggler'][$strIdent] = \Contao\Input::get('active');
				break;
			// toggle switch
			case 'toggleSwitch':
				$strIdent = \Contao\Input::get('name');
				$arrSession['switch'][$strIdent] = \Contao\Input::get('active');
				break;
		}
		
		$objSession->set('PCT_THEMEDESIGNER_SECTION',$arrSession);
	}

	
	
	/**
	 * Render the section and return html string
	 * @param string
	 * @return string
	 */
	public function render($strTemplate='td_section')
	{
		if(empty($this->strSection) || !is_array($this->arrConfig))
		{
			return '';
		}
		
		// Section session
		$arrSession = $this->ThemeDesigner->getSession();
		if( !isset($arrSession['DEVICE']) )
		{
			$arrSession['DEVICE'] = 'desktop';
		}
		
		// @var object \Contao\FrontendTemplate
		$objTemplate = new \Contao\FrontendTemplate($strTemplate);
		$objTemplate->section = $this->strSection;
		$objTemplate->config = $this->arrConfig;
		
		$arrConfig = $this->arrConfig;
		
		// label
		$arrLabel = $this->arrConfig['label'] ?: array($this->strSection,'');
		$objTemplate->label = $arrLabel;
		$objTemplate->title = $arrLabel[0];
		$objTemplate->description = $arrLabel[1];
		$objTemplate->isActive = $this->blnIsActive;
		
		// palettes / subsections / togglers
		$arrPalettes = array();
		if(!empty($this->arrConfig['palettes']) && is_array($this->arrConfig['palettes']))
		{
			$i = 0;
			foreach($this->arrConfig['palettes'] as $palette => $fields)
			{
				$tmp = explode(':', $palette);	
				$strPalette = $tmp[0];
				$isActive = false;
				
				// state from array key
				if(isset($tmp[1]) && $tmp[1] == 'active')
				{
					$isActive = true;
				}
				
				unset($tmp);
				
				// state from session
				if(isset($arrSession['TOGGLER'][$this->strSection.'__'.$strPalette]))
				{
					$isActive = $arrSession['TOGGLER'][$this->strSection.'__'.$strPalette];
				}
				
				$arrPalette = array('selector' => $this->strSection.'::'.$strPalette);
				$arrPalette['label'] = $GLOBALS['TL_LANG']['PCT_THEMEDESIGNER']['PALETTES'][$strPalette] ?? $strPalette;
				
				$arrPalette['isActive'] = false;
				if($isActive)
				{
					$arrPalette['isActive'] = true;
				}
			
				// is accordion
				$isAccordion = false;
				$arrPalette['isAccordion'] = false;
				if(is_array($this->arrConfig['accordion']))
				{
					if(in_array($strPalette, $this->arrConfig['accordion']))
					{
						$isAccordion = true;
						$arrPalette['isAccordion'] = true;
					}
				}

				// devices
				$arrDevices = $this->arrConfig['palettes_devices'][$strPalette] ?? array();
				$arrPalette['devices'] = implode(',', $arrDevices);

				// toggler label
				$arrPalette['toggler_label'] = $arrPalette['label'];
				if($this->arrConfig['toggler_label'][$strPalette])
				{
					$arrPalette['toggler_label'] = $this->arrConfig['toggler_label'][$strPalette];
				}
				
				$class = array($strPalette);
				$i == 0 ? $class[] = 'first' : '';
				$i == count($this->arrConfig['palettes']) - 1 ? $class[] = 'last' : '';
				$i%2 == 0 ? $class[] = 'even' : $class[] = 'odd';
				
				$arrFields = array();
				if(count($fields) > 0)
				{
					$strParentSwitch = '';
					$arrParentSwitch = array();
					
					// generate fields
					foreach($fields as $field)
					{
						// @var object
						$objWidget = $this->prepareWidget($field);
						if($objWidget === null)
						{
							continue;
						}
						
						// fields are active by default
						$active = true;
						
						$arrField = $this->arrConfig['fields'][$field];
						$_field = array();
						
						// disable
						if( isset($arrField['config']['notActiveByDefault']) && (boolean)$arrField['config']['notActiveByDefault'] === true )
						{
							$active = false;
						}
						
						// set a unique selector
						$selector = $this->strSection.'__'.$field;
						
						// if TD are unique by their name, use them
						if((boolean)$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] === true)
						{
							$selector = $field;
						}
						
						if( isset($arrField['name']) && strlen($arrField['name']) > 0)
						{
							$selector = $arrField['name'];
						}
						
						$strSwitch = $selector.(!empty($GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['SWITCHES'][$selector]) ? '__'.$GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['SWITCHES'][$selector] : '');
						if( isset($arrField['switch']) && strlen($arrField['switch']) > 0)
						{
							$strSwitch = $arrField['switch'];
						}
						
						if( isset($this->arrConfig['switch'][$strSwitch]) && strlen($this->arrConfig['switch'][$strSwitch]) > 0)
						{
							$strSwitch = $this->arrConfig['switch'][$strSwitch];
						}
						
						// state from session
						if(isset($arrSession['SWITCH'][$strSwitch]))
						{
							$active = $arrSession['SWITCH'][$strSwitch];
						}

						// devices
						$activeDevice = (boolean)$GLOBALS['PCT_THEMEDESIGNER']['showFieldsWithNoDevice'];
						if( !isset($arrField['devices']) || !is_array($arrField['devices']) )
						{
							$arrField['devices'] = array();
						}
						// device by session
						if( isset($arrSession['DEVICE']) && !empty($arrField['devices']) )
						{
							$activeDevice = in_array($arrSession['DEVICE'],$arrField['devices']);
						}
	
						$_field['switch'] = $strSwitch;
						$_field['label'] = $arrField['label'];
						$_field['name'] = $arrField['label'][0];
						$_field['description'] = $arrField['label'][1];
						$_field['selector'] = $objWidget->selector;
						$_field['isActive'] = $active;
						$_field['fieldDef'] = $arrField;
						$_field['devices'] = implode(',',$arrField['devices']);
						$_field['isDevice'] = $activeDevice;
						$_field['isFirstChildSwitch'] = false;
						$_field['isLastChildSwitch'] = false;
						$_field['isChildSwitch'] = false;
						$_field['parentSwitch'] = array();

						// parent switch
						if(isset($this->arrConfig['cswitch'][$strSwitch]))
						{
							$_field['isParentSwitch'] = true;
							$strParentSwitch = $strSwitch;
							$arrParentSwitch = $_field;
						}
						// child switch
						if(strlen($strParentSwitch) > 0 && is_array($this->arrConfig['cswitch'][$strParentSwitch]))
						{
							$first = $this->arrConfig['cswitch'][$strParentSwitch][0];
							$last = $this->arrConfig['cswitch'][$strParentSwitch][ count($this->arrConfig['cswitch'][$strParentSwitch]) - 1 ];
							
							if(in_array($strSwitch,$this->arrConfig['cswitch'][$strParentSwitch]))
							{
								$_field['parentSwitch'] = $arrParentSwitch;
								$_field['isChildSwitch'] = true;
								if($first == $strSwitch)
								{
									$_field['isFirstChildSwitch'] = true;
								}
								if($last == $strSwitch)
								{
									$_field['isLastChildSwitch'] = true;
								}
							}
						}
						
						if(!$objWidget->description)
						{
							$objWidget->description = $arrField['label'][1];
						}
						
						$objWidget->selector = $selector;
						$objWidget->unique_selector = $selector.(!empty($GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['SWITCHES'][$selector]) ? '__'.$GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['SWITCHES'][$selector] : '');
						$objWidget->name = $selector;
						$objWidget->id = $selector;
						$objWidget->section = $this->strSection;
						$objWidget->switch = $strSwitch;
						$objWidget->counter = $GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['FIELDS'][$selector] ?? 0;
						
						$arrAttributes = array();
						if( isset($arrField['attributes']) && is_array($arrField['attributes']))
						{
							$arrAttributes = $arrField['attributes'];
						}
						
						// selectors
						$strJquerySelector = '';
						if( isset($arrField['selector']) && is_array($arrField['selector']) && count($arrField['selector']))
						{
							foreach($arrField['selector'] as $_value => $_fields)
							{
								if(!is_array($_fields) || count($_fields) < 1)
								{
									continue;
								}
								
								$jquery = "<script>jQuery('*[data-td_selector=".$selector."]').change(function(event) { %s });</script>";
								$func = sprintf("ThemeDesigner.selector(%s,%s,%s);","'$selector'","'$_value'","'".\json_encode($_field)."'");
								
								$objSelectorTemplate = new \Contao\FrontendTemplate('js_themedesigner_selector');
								$objSelectorTemplate->isSelector = true;
								$objSelectorTemplate->effected = $_fields;
								$objSelectorTemplate->json_effected = json_encode($_fields);
								$objSelectorTemplate->selector = $selector;
								$objSelectorTemplate->value = $_value;
								$objSelectorTemplate->prebuild = sprintf($jquery,$func);
								
								$strJquerySelector .= \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace( $objSelectorTemplate->parse() );
							}
						}
						
						$strWidget = $objWidget->parse( $arrAttributes );
						
						// append the selector script
						$strWidget .= $strJquerySelector;
						
						// append custom html to the widget
						if( isset($arrField['appendHtml']) && strlen($arrField['appendHtml']) > 0)
						{
							$strWidget .= $arrField['appendHtml'];
						}
						
						$_field['html'] = $strWidget;
						
						// set field
						$arrFields[$field] = $_field;
						
						// internal counters
						if( !isset($GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['SWITCHES'][$selector]) )
						{
							$GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['SWITCHES'][$selector] = 0;
						}
						if( !isset($GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['FIELDS'][$selector]) )
						{
							$GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['FIELDS'][$selector] = 0;
						}
						$GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['SWITCHES'][$selector]++;
						$GLOBALS['PCT_THEMEDESIGNER_HELPER']['COUNTER']['FIELDS'][$selector]++;
					}
				}
				
				// hide by devices
				$arrPalette['isDevice'] = true;
				if( ( (boolean)$GLOBALS['PCT_THEMEDESIGNER']['showPaletteWithNoDevice'] === false && empty($arrDevices) ) || (!in_array($arrSession['DEVICE'] ?: '',$arrDevices) && !empty($arrDevices)) )
				{
					$arrPalette['isDevice'] = false;
				}
				
				$arrPalette['class'] = implode(' ', $class);
				$arrPalette['fields'] = $arrFields;
				
				$arrPalettes[$strPalette] = $arrPalette;
				
				// higher index
				$i++;	
			}
		}
		
		$objTemplate->palettes = $arrPalettes;
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Generate the widget and return it as object
	 * @param string	Name of the field
	 * @param mixed		Value of the field
	 * @return object
	 */
	protected function prepareWidget($strName, $varValue=null)
	{
		$arrField = $this->arrConfig['fields'][$strName] ?? array();
		if(empty($arrField))
		{
			return null;
		}
		
		// @var object \Widget
		$strClass = $GLOBALS['TL_FFL'][$arrField['inputType']];
		if(!class_exists($strClass))
		{
			return null;
		}
		
		// set a unique selector
		$strSelector = $this->strSection.'__'.$strName;
		
		// if TD are unique by their name, use them
		if((boolean)$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] === true)
		{
			$strSelector = $strName;
		}
		
		if( isset($arrField['name']) && strlen($arrField['name']) > 0)
		{
			$strSelector = $arrField['name'];
		}
		
		// include blank option
		#if($arrField['eval']['includeBlankOption'] && is_array($arrField['options']))
		#{
		#	\Contao\ArrayUtil::arrayInsert($arrField['options'],0,array( '-' ));
		#}
		
		// find value
		$varValue = $this->findValueByField($strSelector);
		
		if( !isset($arrField['eval']['doNotValidateValue']) || !$arrField['eval']['doNotValidateValue'])
		{
			$varValue = $this->validateValueForCSS($varValue);
		}
		
		// getAttributesFromDca($arrData, $strName, $varValue=null, $strField='', $strTable='', $objDca=null)
		$objWidget = new $strClass($strClass::getAttributesFromDca($arrField, $strName, $varValue));
		
		if($objWidget === null)
		{
			return null;
		}
		
		// set custom template
		if(strlen($arrField['template']) > 0)
		{
			$objWidget->customTpl = $arrField['template'];
			$objWidget->__set('template', $arrField['template']);
		}
		
		return $objWidget;
	}
	
	
	/**
	 * Prepare the field selectors
	 */
	
}