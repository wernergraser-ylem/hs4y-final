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
namespace PCT;

/**
 * Imports
 */
use Contao\StringUtil;
use Contao\System;
use Contao\CoreBundle\ContaoCoreBundle;

/**
 * Class file
 * ThemerDesigner
 */
class ThemeDesigner
{
	/**
	 * The template file
	 * @var string
	 */
	protected $strTemplate = 'themedesigner';
	
	/**
	 * The javascript template file
	 * @var string
	 */
	protected $strJsTemplate = 'js_themedesigner';

	/**
	 * The naviagtion template file
	 * @var string
	 */
	protected $strNavTemplate = 'themedesigner';
	
	/**
	 * The session name
	 * @var string
	 */
	protected $strSession = 'PCT_THEMEDESIGNER';
	
	/**
	 * The config array
	 * @var array
	 */
	protected $arrConfig = array();
	
	/**
	 * The data array
	 * @param array
	 */
	protected $arrData = array();
	
	/**
	 * The css data array
	 * @param array
	 */
	protected $arrDataCSS = array();
	
	/**
	 * Modified array
	 * @param array
	 */
	protected $arrModified = array();
	
	
	/**
	 * Init
	 */
	public function __construct($arrData=null)
	{
		if( !isset($GLOBALS['PCT_THEMEDESIGNER_CONFIG']) )
		{
			$GLOBALS['PCT_THEMEDESIGNER_CONFIG'] = array();
		}

		$this->arrConfig = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'] ?: array();
		
		// apply data
		if(is_array($arrData))
		{
			$this->setData($arrData);
		}
	}


// TODO: !Config


	/**
	 * Set constants and include the preset config
	 */
	public function loadConfig($objPage)
	{
		// check if Themer loads a layout
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		$strTheme = $objRoot->pct_theme ?: 'eclipse_default';
		
		// define constant
		if( \defined('PCT_THEME') === false )
		{
			define('PCT_THEME',$strTheme);
		}
		
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');

		if(file_exists($rootDir.'/'.PCT_THEMER_PATH.'/config/themedesigner_config.php'))
		{
			require_once $rootDir.'/'.PCT_THEMER_PATH.'/config/themedesigner_config.php';
		}

		// include from templates folder
		if(file_exists($rootDir.'/templates/themedesigner/themedesigner_config.php'))
		{
			include_once $rootDir.'/templates/themedesigner/themedesigner_config.php';
		}
		
		// load presets
		if(file_exists($rootDir.'/'.PCT_THEMER_PATH.'/config/themedesigner_presets.php'))
		{
			include_once $rootDir.'/'.PCT_THEMER_PATH.'/config/themedesigner_presets.php';
		}

		// HOOK to field definitions
		if(is_array($GLOBALS['PCT_THEMEDESIGNER_FIELDS']) && !empty($GLOBALS['PCT_THEMEDESIGNER_FIELDS']))
		{
			foreach($GLOBALS['PCT_THEMEDESIGNER_CONFIG'] as $k => $v)
			{
				if( empty($v['fields']) )
				{
					continue;
				}
				
				foreach($v['fields'] as $kk => $vv)
				{
					if( !isset($GLOBALS['PCT_THEMEDESIGNER_FIELDS'][$kk]) )
					{
						continue;
					}
					$GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$k]['fields'][$kk] = &$GLOBALS['PCT_THEMEDESIGNER_FIELDS'][$kk];
				}	
			}
		}
		
		// load custom form templates
		foreach($GLOBALS['PCT_THEMEDESIGNER_CONFIG'] as $arrConfig)
		{
			if(!isset($arrConfig['fields']))
			{
				continue;
			}
			
			foreach($arrConfig['fields'] as $field)
			{
				if(strlen($field['template']) > 0)
				{
					$path = PCT_THEMER_PATH.'/templates/themedesigner/forms';
					if(file_exists($rootDir.'/'.$path.'/'.$field['template'].'.html5'))
					{
						\Contao\TemplateLoader::addFiles(array($field['template'] => $path));
					}
				}
			}
		}
	}
	
	
	/**
	 * Observe inputs
	 * @param object
	 */
	public function formListener($objPage)
	{
		// do a reset 
		if((int)\Contao\Input::get('themedesigner_reset') === 1 && (boolean)\Contao\Config::get('pct_themedesigner_hidden') === false)
		{
			$this->reset();
		}
	}


	/**
	 * Return the current theme demo name as string
	 * @return string
	 */
	public function getTheme()
	{
		if(defined('PCT_THEME'))
		{
			return PCT_THEME;
		}
		
		global $objPage;
		// check if Themer loads a layout
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		return $objRoot->pct_theme ?: 'eclipse_default';
	}
	
	
	/**
	 * Set the current data array
	 * @param array
	 * @param boolean
	 */
	public function setData($arrData,$blnForCSS=false)
	{
		if($blnForCSS)
		{
			$this->arrDataCSS = $arrData;
			$this->markAsModified('arrDataCSS');
		}
		else
		{
			$this->arrData = $arrData;
			$this->markAsModified('arrData');
		}
	}
	
	
	/**
	 * Mark a variable as being modified
	 * @param string 
	 */
	public function markAsModified($strKey)
	{
		$this->arrModified[$strKey] = true;
	}
	
	
	/**
	 * Check if a variable is modified
	 * @param string 
	 */
	public function isModified($strKey)
	{
		if(array_key_exists($strKey, $this->arrModified))
		{
			return true;
		}
		return false;
	}
	
	
// !Ajax	
	
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
		
		$strAction = '';
		$varValue = null;
		$strField = '';
		
		// POST listener
		if(\Contao\Input::post('themedesigner'))
		{
			$strAction = \Contao\Input::post('action');
			$varValue = \Contao\Input::post('value');
			$strField = \Contao\Input::post('field');
			
			if($strAction == 'upload')
			{
				$this->addUpload($strField,$_FILES[$strField]);
			}
		}
		
		// GET listener
		else if(\Contao\Input::get('themedesigner'))
		{
			$strAction = \Contao\Input::get('action');
			$varValue = \Contao\Input::get('value');
			$strField = \Contao\Input::get('field');
		}
		
		// store value in the session
		if(strlen($strField) > 0)
		{
			// @var object \Session
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
			$arrSession = $objSession->get( $this->strSession );
			$arrSession['VALUES'][$strField] = $varValue;
			$objSession->set( $this->strSession,$arrSession );
		}
		
		// multiple fields and values
		if( \Contao\Input::get('fields') && \Contao\Input::get('values') )
		{
			
		}
	}
	
	
	/**
	 * Validate a value and return its proper converted value for CSS usage
	 * @param string||mixed		The value by the form field
	 * @param string			The field name
	 * @param array				The field definition
	 * @return string			The value proper for CSS usage
	 */
	public function validateValueForCSS($varValue, $strField='', $arrField=array())
	{
		// decode any html entities coming from ajax
		$varReturn = html_entity_decode($varValue);
		
		// font family
		if( isset($arrField['config']['isFontPicker']) )
		{
			// font family is set
			$arrFont = $this->getFonts($varValue);
			if( isset($arrFont['family']) )
			{
				$varReturn = $arrFont['family'];
			}
		}

		return $varReturn;
	}


// !Field and value management	
	
	/**
	 * Find a value by a field name
	 * @param string
	 * @return mixed||null
	 */
	public function findValueByField($strSelector, $arrField=array())
	{
		$arrSession = $this->getSession();
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();

		// ident for font picker style selection
		$strStyleIdent = $GLOBALS['PCT_THEMEDESIGNER']['fontPickerStyleIdent'] ?: '_style';
		$strWeightIdent = $GLOBALS['PCT_THEMEDESIGNER']['fontPickerWeightIdent'] ?: '_weight';
		
		$blnIsFontStyle = false;
		$blnIsFontWeight = false;
		
		if(strlen(strpos($strSelector, $strStyleIdent)) > 0)
		{
			$blnIsFontStyle = true;
		}
		else if(strlen(strpos($strSelector, $strWeightIdent)) > 0)
		{
			$blnIsFontWeight = true;
		}
		
		$selector = $strSelector;
		if($blnIsFontStyle === true || $blnIsFontWeight === true)
		{
			$tmp = explode('_', $strSelector);
			$selector = $tmp[0];
			unset($tmp);
		}
		
		if(count($arrField) < 1)
		{
			// field definition
			$arrField = $this->getFieldDefinition($selector);
		}

		$varReturn = null;
		// value from ajax
		if(\Contao\Environment::get('isAjaxRequest') && \Contao\Input::get('field') == $strSelector)
		{
			$varReturn = \Contao\Input::get('value');
		}
		// value from session in Frontend
		else if(isset($arrSession['VALUES'][$strSelector]) && $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) )
		{
			$varReturn = $arrSession['VALUES'][$strSelector];
		}
		// value from data array
		else if( \array_key_exists($strSelector,$this->arrData) )
		{
			$varReturn = $this->arrData[$strSelector];
		}
		// fallback load default value
		else if(isset($arrField['default']))
		{
			$varReturn = $arrField['default'];
			
			if( ($blnIsFontStyle === true || $blnIsFontWeight === true) && isset($arrField['default_style']) )
			{
				$tmp = explode(':', $arrField['default_style']);
				if($blnIsFontStyle)
				{
					$varReturn = $tmp[0];
				}
				if($blnIsFontWeight)
				{
					$varReturn = $tmp[1];
				}
				unset($tmp);
			}
		}
		
		return $varReturn;
	}
	
	
	/**
	 * Get a field definition and return its array
	 * @param string	Field name or selector
	 * @param string	The config section 
	 * @return array
	 */
	public function getFieldDefinition($strField)
	{
		if(strlen($strField) < 1)
		{
			return array();
		}
		
		$arrConfig = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'];
		
		// brute force
		if($GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] === true)
		{
			foreach($arrConfig as $strSection => $arrData)
			{
				if(!isset($arrData['fields']))
				{
					continue;
				}
				
				if(!is_array($arrData['fields']))
				{
					continue;
				}
				
				if(!array_key_exists($strField, $arrData['fields']))
				{
					continue;
				}
				
				foreach($arrData['fields'] as $name => $arrField)
				{
					if($name == $strField)
					{
						return $arrField;
					}
					else if( isset($arrField['name']) && $arrField['name'] == $strField)
					{
						return $arrField;
					}
				}
			}
		}
		else
		{
			$tmp = explode('__', $strField);
			if(count($tmp) > 1)
			{
				$strSection = $tmp[0];
				$strField = $tmp[1];
			}
			
			return isset($arrConfig[$strSection]['fields'][$strField]) ? $arrConfig[$strSection]['fields'][$strField] : array();
		}
	}
	
	
	/**
	 * Find a field definition by a field name
	 * @param string
	 */
	public static function findByName($strField)
	{
		$_this = new static();
		return $_this->getFieldDefinition($strField);
	}


// !Fonts management
	
	
	/**
	 * Return all field definitions by a type
	 * @return array
	 */
	public static function getFontPickers()
	{
		$arrReturn = array();
		
		foreach($GLOBALS['PCT_THEMEDESIGNER_CONFIG'] as $strSection => $arrData)
		{
			if( empty($arrData['fields']) )
			{
				continue;
			}
			
			foreach($arrData['fields'] as $strField => $arrField)
			{
				if($GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] === false)
				{
					$strField = $strSection.'__'.$strField;
				}
				
				if(isset($arrField['config']['isFontPicker']))
				{
					$arrReturn[$strField] = $arrField;
				}
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return a font definition or all fonts as array
	 * @param string	Font key
	 * @return array
	 */
	public static function getFonts($strFont='')
	{
		if(strlen($strFont) < 1)
		{
			return $GLOBALS['PCT_THEMEDESIGNER']['fonts'] ?? array();
		}
		else
		{
			return $GLOBALS['PCT_THEMEDESIGNER']['fonts'][$strFont] ?? array();
		}
	}
	
	
// !CSS	
	
	
	/**
	 * Prepare the CSS
	 * @param array		The values array
	 * @return string	The css 
	 */
	public function prepareCSS($arrData)
	{
		// @var object \FontendTemplate
		$objTemplate = new \Contao\FrontendTemplate('stylesheet');
		$objTemplate->setDebug(false);
		
		if( \defined('LAYOUT_CSS_IS_ACTIVE') )
		{
			$objTemplate->layout_css_is_active = true;
		}
		
		$arrStyles = array();
		$objTemplate->PCT_THEME = PCT_THEME;
		foreach($arrData as $key => $value)
		{
			if( empty($value) === true )
			{
				continue;
			}

			// remove caching helpers
			if( (is_object($value) || is_array($value)) && !empty($value))
			{
				foreach($value as $k => $v)
				{
					// remove caching helpers
					if(strlen(strpos($v, '?')) > 0)
					{
						$tmp = explode('?', $v);
						if(is_object($value))
						{
							$value->{$k} = $tmp[0];
						}
						else if(is_array($value))
						{
							$value[$k] = $tmp[0];
						}
					}

				}
			}
			else if(strlen(strpos($value, '?')) > 0)
			{
				$value = rtrim($value,'?');
			}

			$objTemplate->{$key} = $value;
			$arrStyles[$key] = $value;
		}
		$objTemplate->styles = $arrStyles;
		
		// parse template and replace Inserttags
		$strReturn = $objTemplate->parse();
		
		// set absolute paths
		#$preg = \preg_match_all('/files(.*?)\)/',$strReturn,$arrPaths);
		#if( $preg )
		#{
		#	foreach($arrPaths[0] as $strPath)
		#	{
		#		$strReturn = \str_replace( $strPath, '/'.ltrim($strPath,'/'), $strReturn );
		#	}
		#}
#
		#$preg = \preg_match_all('/assets(.*?)\)/',$strReturn,$arrPaths);
		#if( $preg )
		#{
		#	foreach($arrPaths[0] as $strPath)
		#	{
		#		$strReturn = \str_replace( $strPath,'/'.ltrim($strPath,'/'), $strReturn );
		#	}
		#}
		
		// absolute paths should be relative to CSS file
		$preg = preg_match_all('/files(.*?)\)/',$strReturn,$arrPaths);
		if($preg)
		{
			$separator = '/';
			$_arrBase = array_filter(explode($separator, str_replace(basename($GLOBALS['PCT_THEMEDESIGNER_CSS_FILE']),'',$GLOBALS['PCT_THEMEDESIGNER_CSS_FILE']) ));
		    
			foreach($arrPaths[0] as $strPath)
			{
				$strPath = rtrim($strPath,')');
				
				$pathinfo = pathinfo( rtrim($strPath,')') );
				$path = $pathinfo['dirname'];
				$file = $pathinfo['basename'];
				
				$_arrPath = explode($separator,$path);
				
				$relative = '';
				foreach(array_diff($_arrPath,$_arrBase) as $a)
				{
					$relative .= '../'.$a;
				}
				$relative .= '/'.$file;
				
				$strReturn = str_replace($strPath, $relative, $strReturn);
			}
		}

		$strReturn = preg_replace("/^\s*/m", "", $strReturn);
			
		return $strReturn;
	}
	
	
	/**
	 * Prepare the javascript CSS
	 * @param array		The values array
	 * @return string	The css 
	 */
	public function prepareJavascriptCSS($arrData)
	{
		// @var object \FontendTemplate
		$objTemplate = new \Contao\FrontendTemplate('js_stylesheet');
		$objTemplate->setDebug(false);
		$objTemplate->arrCSS = array();
		$objTemplate->arrFields = array();
		
		if( \defined('LAYOUT_CSS_IS_ACTIVE') )
		{
			$objTemplate->layout_css_is_active = true;
		}
		
		// @var object ThemeDesigner
		$objTemplate->ThemeDesigner = new \PCT\ThemeDesigner;
		
		// take the current stylesheet template and observe it
		// @var \File
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');

		$objFile = new \Contao\File( str_replace($rootDir,'',\Contao\TemplateLoader::getPath('stylesheet','html5')), true );
		
		$strContent = $objFile->getContent();
		#$arrContent = $objFile->getContentAsArray();
		
		# remove everything between /* and */
		$strContent = preg_replace("!/\*.*?\*/!ms", "", $strContent);
		
		$strContent = str_replace("\r", '', $strContent);
		
		# remove everything between /* and */
		
		$strJS = $strContent;
		
		// remove php comments
		#$strJS = preg_match("!/<?php*?\>/!ms", "", $strJS);
		
		// capsule if
		#$strJS = str_replace(array('):','endif;'), array(') {','}'),$strJS);
		
		// remove all php calls
		/*
		$strJS = str_replace(array('<?php','endif;','<?=','?>'), '',$strJS);
		*/
		
		$inserttag_sign = '#';
		$this_replacer = 'objData';
		
		// replace the php $this
		// capsule field calls in inserttag style
		#$strJS = preg_replace("/this->(.*?);/", str_repeat($inserttag_sign, 3).'$1'.str_repeat($inserttag_sign, 3),$strJS);
		
		#$strJS = str_replace('$'.$inserttag_sign, $inserttag_sign, $strJS);
		
		# remove whitespaces after semicolons
		#$strJS = preg_replace("/;\s+/m", "; ", $strJS);
		
		# remove whitespaces after {
		#$strJS = preg_replace("/{\s+/m", "{ ", $strJS);
		
		# remove whitespace before {
		#$strJS = preg_replace("/\s+{/m", " {", $strJS);
		
		# replace several newlines with one
		#$strJS = preg_replace("/\n{2,}/m", "\n", $strJS);
		
		# Leading whitespace
		$strJS = preg_replace("/^\s*/m", "", $strJS);
		
		// break content into single lines
		$arrLines = array_map('trim',array_filter(preg_split('/$\R?^/m', $strJS),'strlen'));
		
		// remove php document start
		$arrLines[0] = str_replace('<?php','',$arrLines[0]);
		
		$arrValidCssChars = array('.','@','#');
		
		$arrJScontent = array();
		
		$if_open = false;
		$definitions = array();
		foreach($arrLines as $i => $strLine)
		{
			$firstChar = substr($strLine, 0,1);
			
			// if start
			if(strlen(strpos($strLine, '<?php if')) > 0)
			{
				// start a new defintion collection
				$definitions = array("css += '");
				
				// mark as open if statement
				$if_open = true;
				
				// strip the php call
				$strLine = trim( str_replace( array('<?php',':','?>'), array('','','{'), $strLine ) );
				
				// replace the $this-> call
				
				// extract variable
				#$var = str_replace('$this->','',substr($strLine, strpos($strLine, '(') + 1, strrpos($strLine,')') - strlen($strLine) ) );
				
				$strLine = str_replace( array('$this->','->'), array($this_replacer.'.','.'), $strLine);
				
				$arrJScontent[$i] = "\n".$strLine;
			}
			
			// endif
			else if(strlen(strpos($strLine, '<?php endif')) > 0)
			{
				// strip the php call
				$strLine = trim( str_replace( array('<?php','endif;','?>'), array('','','}'), $strLine ) );
				
				// if statement closes
				$if_open = false;
				
				$definition = implode("", $definitions)."';";

				// insert the definition on a line before
				$arrJScontent[$i-1] = $definition;
				
				$arrJScontent[$i] = $strLine."\n";
			}
			else
			{
				// strip php calls
				$strLine = trim( str_replace( array('<?=','?>'), '', $strLine ) );
				
				// replace the $this-> call
				
				$preg = preg_match_all("/this->(.*?)\;/", $strLine,$arrVars);
				if($preg)
				{
					foreach($arrVars[1] as $i => $var)
					{
						$search = $arrVars[0][$i];
						
						//remove unwanted chars
						$var = trim( str_replace(array('(',')'),'',$var) );
						
						// split nested vars like $a->b->c
						$arr = array_filter(explode('->', $var));
						
						$tmp = '';
						$replace = array();
						foreach($arr as $v)
						{
							#$tmp .= '["'.$v.'"]';
							$tmp .= '.'.$v.'';
						}
						$tmp = $this_replacer.$tmp;
						$strLine = str_replace($search, "'+".trim($tmp)."+'", $strLine);
						unset($tmp);
					}
					
					$strLine = str_replace(array('$this->','$'), '', $strLine);
					// replace whitespace before units and end of call
					$strLine = str_replace(array(' px', ' %'), array('px','%'), $strLine);
				}
				
				// remove double semicolons and space and backslahes like in content: "\abc";
				$strLine = str_replace(array(';;',' ;','\\'),array(';',';','\\\\'), $strLine);
				
				// remove unexpected strings
				if(strlen(strpos($strLine, "''")) > 0)
				{
					$strLine = str_replace("''", '""', $strLine);
				}
				
				if($if_open)
				{
					$definitions[] = $strLine . ' ';
				}
				// single line style
				else
				{
					$arrJScontent[$i] = "css +='".$strLine."';";
				}
				
				continue;
			}
		}
		
		#\Contao\ArrayUtil::arrayInsert($arrJScontent, 0, array("var css = '';"));
		
		$objTemplate->arrJavascript = $arrJScontent;
		$objTemplate->js = implode("\n", $arrJScontent);
		$objTemplate->baseVariables = 'var css = ""; var objData = {}; var PCT_THEME = "'.PCT_THEME.'"';	
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Get the current data as array
	 * @param boolean	For CSS use or raw data use 
	 * @return array
	 */
	public function getData($blnForCSS=false)
	{
		if($this->isModified('arrData') && !$blnForCSS)
		{
			return $this->arrData;
		}
		
		if($this->isModified('arrDataCSS') && $blnForCSS)
		{
			return $this->arrDataCSS;
		}
		
		// ident for font picker style selection
		$strStyleIdent = $GLOBALS['PCT_THEMEDESIGNER']['fontPickerStyleIdent'] ?: '_style';
		$strWeightIdent = $GLOBALS['PCT_THEMEDESIGNER']['fontPickerWeightIdent'] ?: '_weight';
		
		// get session data
		$arrSession = $this->getSession();
		
		// switches are part of the secion session
		$arrSwitch = $arrSession['SWITCH'] ?? array();
		
		// write sections as template variables
		$arrSections = $this->getMainSections();
		
		$arrReturn = array();
		$arrCounter = array();
		
		foreach($this->arrConfig as $section => $data)
		{
			if(!$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'])
			{
				$arrReturn[$section] = array();
			}
			
			if(isset($data['fields']) && !empty($data['fields']))
			{
				foreach($data['fields'] as $name => $arrField)
				{
					$selector = $section.'__'.$name;
					
					// if TD are unique by their name, use them
					if((boolean)$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'] === true)
					{
						$selector = $name;
					}
					
					if( isset($arrField['name']) )
					{
						$selector = $arrField['name'];
					}
					
					$strSwitch = $selector.(!empty($arrCounter['SWITCHES'][$selector]) ? '__'.$arrCounter['SWITCHES'][$selector] : '');
					
					if( isset($arrField['switch']) && !empty($arrField['switch']) )
					{
						$strSwitch = $arrField['switch'];
					}

					if( !isset($arrCounter['SWITCHES'][$selector]) )
					{
						$arrCounter['SWITCHES'][$selector] = 0;
					}
					
					$arrCounter['SWITCHES'][$selector]++;
					
					if(!isset($arrField['config']['notActiveByDefault']))
					{
						$arrField['config']['notActiveByDefault'] = false;
					}

					// bypass fields that are supposed to be turned off
					if( (isset($arrSwitch[$strSwitch]) && (boolean)$arrSwitch[$strSwitch] === false) || (!isset($arrSwitch[$strSwitch]) && (boolean)$arrField['config']['notActiveByDefault'] === true) )
					{
						continue;
					}
					
					// find the value
					$value = $this->findValueByField($selector,$arrField);
					
					// upload fields with array values
					if($arrField['inputType'] == 'upload' && is_array($value))
					{
						$objFile = new \Contao\File($value['file'],true);
						
						// convert to base64
						if($objFile->exists())
						{
							$value['base64'] = base64_encode( $objFile->getContent() );
						}
												
						$tmp = new \StdClass;
						foreach($value as $k => $v)
						{
							$tmp->{$k} = $v;
						}
						
						// set template var
						if(!$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'])
						{
							$arrReturn[$section][$selector] = $tmp;
						}
						else
						{
							$arrReturn[$selector] = $tmp;
						}
						
						unset($tmp);
						
						continue;
					}
					
					if(!isset($arrField['eval']['doNotValidateValue']) && $blnForCSS)
					{	
						// validate value
						$value = $this->validateValueForCSS($value, $selector, $arrField);
						
					}
					
					// skip empty values
					if( !isset($value) || $value === null )
					{
						continue;
					}
					
					$objJson = json_decode($value);
					if(is_object($objJson))
					{
						$value = $objJson;
					}
					
					// set template var for font picker styles
					if( isset($arrField['config']['isFontPicker']) )
					{
						$arrReturn[$selector.$strStyleIdent] = $this->findValueByField($selector.$strStyleIdent);
						$arrReturn[$selector.$strWeightIdent] = $this->findValueByField($selector.$strWeightIdent);
					}
					
					// set template var
					if(!$GLOBALS['PCT_THEMEDESIGNER']['useFlatSelectors'])
					{
						$arrReturn[$section][$selector] = $value;
					}
					else
					{
						$arrReturn[$selector] = $value;
					}
				}
			}
		}
		
		$arrReturn['PCT_THEME'] = PCT_THEME;
		
		// set data
		$this->setData($arrReturn,$blnForCSS);
		
		return $arrReturn;
	}
	
	
	/**
	 * Get the current data arrays formatted for CSS usage
	 * @return array
	 */
	public function getDataForCSS()
	{
		return $this->getData(true);
	}


// ! Frontend

	
	/**
	 * Set the page layout
	 * @param object
	 * @param object
	 * called from : getPageLayout Hook
	 */
	public function setLayoutTemplate($objPage, $objLayout)
	{
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		
		// Render maintenance page if no backend user is logged in
		if( \version_compare(ContaoCoreBundle::getVersion(),'4.13','>=') && $objRoot->maintenanceMode )
		{
			$objTemplate = new \Contao\FrontendTemplate('fe_page');
			if( $objTemplate->hasAuthenticatedBackendUser() === false )
			{
				return;
			}	
		}

		// Page is excluded by id or theme
		if(is_array($GLOBALS['PCT_THEMEDESIGNER']['excludes']))
		{
			if(in_array($objPage->id, $GLOBALS['PCT_THEMEDESIGNER']['excludes']) || in_array($objRoot->pct_theme, $GLOBALS['PCT_THEMEDESIGNER']['excludes']))
			{
				return;
			}
		}

		// Page tree is excluded by page setting
		if( (boolean)$objRoot->pct_themedesigner_hidden === true )
		{
			return;
		}
		
		$arrSession = $this->getSession();
		
		$strIframeUrl = $arrSession['IFRAME_URL'] ?? '';
		$strSessionKey = $this->strSession.'_'.$this->getTheme();
		
		$tmp = explode('?', $strIframeUrl);
		$strIframeUrl = $tmp[0];
				
		// redirect the whole TD page when the iframe page is a root page or has a whole new root page
		if($strIframeUrl != '' && $strIframeUrl != \Contao\Environment::get('request'))
		{
			$objPages = \Contao\PageModel::findByAliases(array(str_replace(array('index.php/','.html'),'',$strIframeUrl)));
			if($objPages !== null && isset($objPages[0]) )
			{
				$objIframePage = $objPages[0];
				if( $objIframePage->type == 'root' || $objIframePage->rootId != $objPage->rootId)
				{
					unset($arrSession['IFRAME_URL']);
					unset($_SESSION[$strSessionKey]['IFRAME_URL']);
					$this->setSession($arrSession);
					
					$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
					
					\Contao\Controller::redirect( $objRouter->generate($objIframePage) );	
				}
			}
			else
			{
				unset($arrSession['IFRAME_URL']);
				unset($_SESSION[$strSessionKey]['IFRAME_URL']);
				$this->setSession($arrSession);
				\Contao\Controller::reload();	
			}
		}
		
		// already on the same page and its not a root page
		if($strIframeUrl != '' && $strIframeUrl == \Contao\Environment::get('request'))
		{
			unset($arrSession['IFRAME_URL']);
			unset($_SESSION[$strSessionKey]['IFRAME_URL']);
			$this->setSession($arrSession);
			\Contao\Controller::reload();	
		}
		
		if((boolean)\Contao\Input::get('themedesigner_iframe') === true || (boolean)$GLOBALS['PCT_THEMEDESIGNER']['useIframe'] === false)
		{
			$objJsTemplate = new \Contao\FrontendTemplate('js_themedesigner_iframe_helper');
			$objJsTemplate->themedesigner_ident = $arrSession['IDENT'];
			$objJsTemplate->reset = \Contao\Input::get('themedesigner_reset');
			$objJsTemplate->cookie = 'THEMEDESIGNER_IFRAME_'.$this->getTheme();
			$objJsTemplate->theme = $this->getTheme();
			$GLOBALS['TL_JQUERY'][] = $objJsTemplate->parse();
			return;
		}
		
		$objLayout->template = 'fe_page_themedesigner';
	}
	
	
	/**
	 * Add the Google fonts to the page layout
	 * @param object
	 * @param object
	 * called from : getPageLayout Hook
	 */
	public function addFonts($objPage, $objLayout)
	{
		$objTD = new \PCT\ThemeDesigner;
		
		// @var object
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		
		// @var object
		$objActiveVersion = \PCT\ThemeDesigner\Model::findActiveByTheme($objRoot->pct_theme ?: 'eclipse_default');
	
		// load last active version
		if($objActiveVersion !== null && (boolean)\Contao\Config::get('pct_themedesigner_hidden') === true)
		{
			$arrData = StringUtil::deserialize($objActiveVersion->data) ?: array();
			if( !empty($arrData['VALUES']) && is_array($arrData['VALUES']))
			{
				$arrData = $arrData['VALUES'];
			}
		}
		else
		{
			// get current TD data
			$arrData = $objTD->getData();
		}
		
		// get all font pickers
		$arrFontPickers = $objTD->getFontPickers();
		
		// check if any font is selected
		$arrMatch = array_intersect(array_keys($arrData ?: array()), array_keys($arrFontPickers ?: array()));
		
		// no fonts selected by user but the layout comes with fontpicker information
		if(count($arrMatch) < 1 && count($arrFontPickers) > 0)
		{
			$arrMatch = array_keys($arrFontPickers);
			foreach($arrFontPickers as $font => $data)
			{
				$font = $data['default'];
				if( !isset($data['default_style']) )
				{
					$data['default_style'] = '';
				}

				$arrData[$font] = array
				(
					'label' => $data['label'],
					'styles' => array($data['default_style']),
					'default' => $data['default'],
				);
			}
		}
		else if(count($arrMatch) < 1 && count($arrFontPickers) < 1)
		{
			return;
		}
		
		$arrFonts = array();
		foreach($arrMatch as $field)
		{
			if(is_array($field))
			{
				continue;
			}
			
			if(!isset($arrData[$field]))
			{
				continue;
			}
			
			$font = $arrData[$field];
			$weights = array();
			
			// font definition
			$arrFont = $objTD->getFonts( $font );
			if(empty($arrFont))
			{
				continue;
			}
			
			// default weight
			if( isset($arrFont['default']) && strlen(strpos($arrFont['default'], ':')) > 0)
			{
				$s = explode(':', $arrFont['default']);
				$weights[] = $s[1];
			}
			
			// style weights
			if(!empty($arrFont['styles']))
			{
				foreach($arrFont['styles'] as $style)
				{
					$s = explode(':', $style);
					if($s[1])
					{
						$weights[] = $s[1];
					}
				}
			}
			
			$arrFonts[] = $font.(count($weights) > 0 ? ':'.implode(',', array_unique($weights)) : '');
		}
		
		$arrFonts = array_unique($arrFonts);
		if(count($arrFonts) < 1)
		{
			return;
		}

		$arrFonts = array_filter( array_unique( array_merge($arrFonts, explode('|', $objLayout->webfonts) ) ) );
		
		$objLayout->webfonts = implode('|', $arrFonts);
	}
	
	
	/**
	 * Add user privacy sensitive javascript to load webfonts depending on user privacy selection
	 * @param object
	 * @param object
	 * @param object
	 * called from getPageLayout Hook
	 */
	public function addFontsOptin($objPage, $objLayout, $objPageRegular)
	{
		// include fonts in themedesigner iframe
		if( (int)\Contao\Input::get('themedesigner_iframe') == 1 && isset($objLayout->webfonts) && !empty($objLayout->webfonts) )
		{
			$GLOBALS['TL_HEAD'][] = '<link href="https://fonts.googleapis.com/css?family='.$objLayout->webfonts.'" rel="stylesheet">';
			return;
		}

		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		$strTheme = $objRoot->pct_theme ?: 'eclipse_default';
		
		// @var object
		$objActiveVersion = \PCT\ThemeDesigner\Model::findActiveByTheme($strTheme);
		$strVersion = '';
		if( $objActiveVersion !== null )
		{
			$strVersion = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'],$objActiveVersion->id,$objActiveVersion->tstamp);
		}
		
		$strWebfonts = $objLayout->webfonts ?? '';
		// clear the regular webfonts to avoid loading by Contao
		$objLayout->webfonts = '';
		
		// @var object
		#$objTemplate = new \Contao\FrontendTemplate('js_themedesigner_webfonts_optin');
		#$objTemplate->webfonts = $strWebfonts;
		#$objTemplate->privacy_session_name = $GLOBALS['PCT_THEMEDESIGNER']['privacy_session_name'] ?? ''; 
		#$strBuffer = $objTemplate->parse();
		#$objLayout->webfonts_optin = $strBuffer;
		#$objPageRegular->Template->webfonts_optin = $strBuffer;

		// @var object
		$objTemplate = new \Contao\FrontendTemplate('css_webfonts');
		$objTemplate->setDebug(false);
		$objTemplate->webfonts = $strWebfonts;
		
		$arrFonts = array();
		foreach( \explode('|',$strWebfonts) as $font )
		{
			if( empty($font) )
			{
				continue;
			}

			$a = \explode(':',$font);
			$arrFonts[ $a[0] ] = $a[1] ?? '';
		}


		$objTemplate->fonts = $arrFonts;
		$objTemplate->path = '/'.$GLOBALS['PCT_THEMEDESIGNER']['googlefontsFolder'];

		$strBuffer = $objTemplate->parse();
		$objLayout->webfonts_local = $strBuffer;

		// add to page head
		$objFile = new \Contao\File( \sprintf($GLOBALS['PCT_THEMEDESIGNER_FONTS_CSS_FILE'],$strVersion) );
		$objFile->write( $strBuffer );
		$objFile->close();
		$GLOBALS['TL_CSS'][] = $objFile->path;
		
		#$GLOBALS['TL_HEAD'][] = $strBuffer;
		
		// add to option vairable
		$objPageRegular->Template->webfonts_local = $strBuffer;
	}
		
	
	/**
	 * Add theme designer to the page template
	 * @param object
	 * @param object
	 * @param object
	 * called from: parseTemplate Hook
	 */
	public function addToTemplate($objTemplate)
	{	
		// ThemeDesigner is turned off
		if(\Contao\Config::get('pct_themedesigner_hidden') && \Contao\Config::get('pct_themedesigner_off'))
		{
			return;
		}
		
		// work on fe_page templates only
		if ( \strpos($objTemplate->getName(), 'fe_page') === false ) 
		{
			return;
		}

		global $objPage;

		// check if Themer loads a layout
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		// define constants
		if(strlen($objRoot->pct_theme) > 0)
		{
			if( \defined('LAYOUT_CSS_IS_ACTIVE') === false )
			{
				\define('LAYOUT_CSS_IS_ACTIVE',1);
			}
			$strTheme = $objRoot->pct_theme;
		}
		else
		{
			$strTheme = 'eclipse_default';
		}
		
		// Page is excluded by id or theme
		if(is_array($GLOBALS['PCT_THEMEDESIGNER']['excludes']))
		{
			if(in_array($objPage->id, $GLOBALS['PCT_THEMEDESIGNER']['excludes']) || in_array($strTheme, $GLOBALS['PCT_THEMEDESIGNER']['excludes']))
			{
				return;
			}
		}
		
		// load an active version
		// @var object 
		$objActiveVersion = \PCT\ThemeDesigner\Model::findActiveByTheme($strTheme);
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		
		// regular fe_page template is being rendered
		if ( $objTemplate->getName() !== 'fe_page_themedesigner' ) 
		{
			$objTemplate->pct_layout_css = '';
			
			$strVersion = '';
			if( $objActiveVersion !== null )
			{
				$strVersion = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'],$objActiveVersion->id,$objActiveVersion->tstamp);
			}
			
			// layout.css by the theme designer is final
			$strLayoutCss = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILE'],$strVersion);
			if( \file_exists($rootDir.'/'.$strLayoutCss) === false )
			{
				$strLayoutCss = sprintf( \str_replace('assets','files',$GLOBALS['PCT_THEMEDESIGNER_CSS_FILE']) ,$strVersion);
			}
			
			if( (\Contao\Config::get('pct_themedesigner_hidden') || (boolean)$objRoot->pct_themedesigner_hidden === true) && \file_exists($rootDir.'/'.$strLayoutCss))
			{
				$strFile = \trim($strLayoutCss);
				$objTemplate->pct_layout_css = $strFile;
				$objTemplate->pct_layout_css_uncached = $strFile.'?'.time();	
			}

			return;
		}

		// Render maintenance page if no backend user is logged in
		if( \version_compare(ContaoCoreBundle::getVersion(),'4.13','>=') && $objRoot->maintenanceMode && $objTemplate->hasAuthenticatedBackendUser() === false )
		{
			return;
		}

		// Do not render theme designer by page setting
		if( (boolean)$objRoot->pct_themedesigner_hidden === true )
		{
			return;
		}

		// --- THEME DESIGNER 
		
		// load config
		$this->loadConfig($objPage);
		
		// get session
		$arrSession = $this->getSession();

		// mobile
		if( isset($arrSession['MOBILE']) && (boolean)$arrSession['MOBILE'])
		{
			$objTemplate->isMobileView = true;
		}

		// zoom
		if( isset($arrSession['ZOOM']) && !empty($arrSession['ZOOM']) )
		{
			$objTemplate->zoom = $arrSession['ZOOM'];
		}

		// device
		if( isset($arrSession['DEVICE']) && !empty($arrSession['DEVICE']) )
		{
			$objTemplate->device = $arrSession['DEVICE'];
		}

		// ThemeDesigner is hidden
		if(\Contao\Config::get('pct_themedesigner_hidden') || \Contao\Environment::get('isAjaxRequest') || \Contao\Input::get('themedesigner_iframe'))
		{
			return;
		}
							
		// --- Frontend output from here
		// if session is empty and an active version exists, fill up the session and reload the page
		if($objActiveVersion !== null && !isset($arrSession['VALUES']))
		{
			$arrSession = StringUtil::deserialize($objActiveVersion->data) ?: array();
			if( !isset($arrSession['VALUES']) )
			{
				$arrSession['VALUES'] = array();
			}
			
			// avoid applying an empty data array
			if(count($arrSession) > 0)
			{
				$this->setSession( $arrSession );
				\Contao\Controller::reload();
			}
		}

		$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
		
		// load language file
		\Contao\System::loadLanguageFile('themedesigner');
		
		// @var object \PCT\ThemeDesigner\Navigation
		$objNavi = new \PCT\ThemeDesigner\Navigation;
		$strNavi = $objNavi->render( $this->strNavTemplate );
		
		// add to page template
		$objTemplate->pct_themedesigner_navigation = $strNavi;
		
		// @var object \PCT\ThemeDesigner\Versions
		$objVersions = new \PCT\ThemeDesigner\Versions;
		$strVersions = $objVersions->render();
		
		// add to page template
		$objTemplate->pct_themedesigner_versions = $strVersions;
		
		// @var object \PCT\ThemeDesigner
		$objTD = new \PCT\ThemeDesigner;
		$strTD = $objTD->render( $this->strTemplate );
		
		// add to page template
		$objTemplate->pct_themedesigner = $strTD;
	
		// minify button toggler
		$objTemplate->pct_themedesigner_toggler = '<a id="themedesigner_toggler" title="'.$GLOBALS['TL_LANG']['pct_themedesigner']['toggler_title'].'" class="'.($arrSession['MINIFIED'] ? 'active' : '').'" data-state="'.(!$arrSession['MINIFIED'] ? 1 : 0).'" class="themedesigner_minify"></a>';
		
		// reset button
		
		$objTemplate->pct_themedesigner_reset = '<a id="themedesigner_reset" title="'.$GLOBALS['TL_LANG']['pct_themedesigner']['reset_title'].'" class="themedesigner_reset_button" href="'.$objRouter->generate($objPage).'?themedesigner_reset=1'.'" title="ThemeDesigner reset"></a>';
		
		// mobile button
		$objTemplate->pct_themedesigner_mobile = '<a id="themedesigner_mobile" title="'.$GLOBALS['TL_LANG']['pct_themedesigner']['mobile_title'].'" class="themedesigner_mobile_button"></a>';
		
		// quick info
		$objQuickinfo = new \PCT\ThemeDesigner\Quickinfo;
		$strQuickinfo = $objQuickinfo->render();
		
		$objTemplate->pct_themedesigner_quickinfo = $strQuickinfo;
		
		// no save info
		$objVersions = \PCT\ThemeDesigner\Model::findByTheme(PCT_THEME);
		if($objVersions === null)
		{
			$objTemplate->pct_themedesigner_nosave = $GLOBALS['TL_LANG']['pct_themedesigner']['nosave_info'] ?: 'No save data yet';
		}	
	}


	/**
	 * Add theme designer to the page layout and include scripts via GLOBALS
	 * @param object
	 * @param object
	 * called from: getPageLayout Hook
	 */
	public function addToLayout($objPage, $objLayout)
	{	
		// ThemeDesigner is turned off
		if(\Contao\Config::get('pct_themedesigner_hidden') && \Contao\Config::get('pct_themedesigner_off'))
		{
			return;
		}

		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		
		// Page is excluded by root page setting
		if( (boolean)$objRoot->pct_themedesigner_hidden === true )
		{
			return;
		}
		
		// check if Themer loads a layout
		// define constants
		if(strlen($objRoot->pct_theme) > 0)
		{
			\define('LAYOUT_CSS_IS_ACTIVE',1);
			$strTheme = $objRoot->pct_theme;
		}
		else
		{
			$strTheme = 'eclipse_default';
		}

		// Page is excluded by id or theme
		if(is_array($GLOBALS['PCT_THEMEDESIGNER']['excludes']))
		{
			if(in_array($objPage->id, $GLOBALS['PCT_THEMEDESIGNER']['excludes']) || in_array($strTheme, $GLOBALS['PCT_THEMEDESIGNER']['excludes']))
			{
				return;
			}
		}

		// @var object
		$objActiveVersion = \PCT\ThemeDesigner\Model::findActiveByTheme($strTheme);
		$strVersion = '';
		if( $objActiveVersion !== null )
		{
			$strVersion = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'],$objActiveVersion->id,$objActiveVersion->tstamp);
		}
		// layout.css by the theme designer is final
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		$strLayoutCss = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILE'],$strVersion);
		$strFile = '';
		if(\Contao\Config::get('pct_themedesigner_hidden') && \file_exists($rootDir.'/'.$strLayoutCss))
		{
			$strFile = trim($strLayoutCss);
			return;
		}

		// load config
		$this->loadConfig($objPage);
		
		// get session
		$arrSession = $this->getSession();
		
		// add body classes
		$arrClasses = array('themedesigner_active');
		if(\Contao\Config::get('pct_themedesigner_hidden'))
		{
			$arrClasses[] = 'themedesigner_hidden';
		}
		
		// minified
		if(isset($arrSession['MINIFIED']) && (boolean)$arrSession['MINIFIED'] )
		{
			$arrClasses[] = 'themedesigner_minified';
		}
		
		// mobile
		if(isset($arrSession['MOBILE']) && (boolean)$arrSession['MOBILE'] )
		{
			$arrClasses[] = 'themedesigner_mobile';
			
			if(\Contao\Input::get('themedesigner_iframe'))
			{
				$arrClasses[] = 'mobile';
			}
		}

		// zoom
		$intZoom = $arrSession['ZOOM'] ?? 100;
		if($intZoom > 0)
		{
			$arrClasses[] = 'zoom_'.$intZoom;
			
			if(\Contao\Input::get('themedesigner_iframe'))
			{
				$arrClasses[] = 'zoom_'.$intZoom;
			}
		}

		// device
		$strDevice = $arrSession['DEVICE'] ?? 'desktop';
		if($strDevice)
		{
			$arrClasses[] = 'themedesigner_'.$strDevice;
			
			if(\Contao\Input::get('themedesigner_iframe'))
			{
				$arrClasses[] = $strDevice.' themedesigner_'.$strDevice;
			}
		}

		// add themedesigner classes to body 
		if( (boolean)\Contao\Config::get('pct_themedesigner_hidden') === false )
		{
			$objLayout->cssClass .= ' '.\implode(' ',$arrClasses);
		}
		
		// include Javascript CSS only when TD is not hidden and active or no active version exists
		if((boolean)\Contao\Config::get('pct_themedesigner_hidden') === false || $objActiveVersion === null)
		{
			$arrData = $this->getData();
			
			// load data from last active session
			if($objActiveVersion !== null && (empty($arrData) || empty($arrSession)))
			{
				$arrData = StringUtil::deserialize($objActiveVersion->data) ?: array();
				$this->setData($arrData);
			}
			
			// prepare the css for javascript usage
			$strCSSforJS = $this->prepareJavascriptCSS($arrData);
			
			// include the Javascript CSS
			$GLOBALS['TL_JQUERY'][] = $strCSSforJS;
		}
		
		// ThemeDesigner is hidden
		if(\Contao\Config::get('pct_themedesigner_hidden') || \Contao\Environment::get('isAjaxRequest') || \Contao\Input::get('themedesigner_iframe'))
		{
			return;
		}
						
		// if session is empty and an active version exists, fill up the session and reload the page
		if($objActiveVersion !== null && empty($arrSession))
		{
			$arrSession = StringUtil::deserialize($objActiveVersion->data) ?: array();
			
			// avoid applying an empty data array
			if(count($arrSession) > 0)
			{
				$this->setSession( $arrSession );
				\Contao\Controller::reload();
			}
		}
		
		// load language file
		\Contao\System::loadLanguageFile('themedesigner');
		
		// load ThemeDesigner js class
		$objJsTemplate = new \Contao\FrontendTemplate( $this->strJsTemplate );
		$objJsTemplate->setDebug(false);
		$objJsTemplate->whoAmI = $this->strJsTemplate;
		$objJsTemplate->stylesheet = $strFile;
		$objJsTemplate->timestamp = time();
		$objJsTemplate->theme = $strTheme;
		$objJsTemplate->device = $strDevice;
		$objJsTemplate->zoom = $intZoom;

		// load themedesigner script
		$GLOBALS['TL_JQUERY'][] = $objJsTemplate->parse();
		
		// load styling
		$GLOBALS['TL_CSS'][] = $GLOBALS['PCT_THEMEDESIGNER']['CSS'];
		
		// no save info
		$objVersions = \PCT\ThemeDesigner\Model::findByTheme(PCT_THEME);
		if($objVersions === null)
		{
			// add body class
			$objLayout->cssClass .= ' themedesigner_unsaved';
		}
	}


//! File management, stylesheet creation
	
	
	/**
	 * Create the stylesheet from the current data and return its path
	 * @param string	The current theme name
	 * return string
	 */
	public function createStylesheet($strTheme='')
	{
		// prepare the css
		$strCSS = $this->prepareCSS( $this->getData(true) );
		
		// write the css file and set as new layout.css
		$objFile = $this->writeCSS($strCSS,$strTheme);
		
		$strFile = '';
		
		$time = time();
		if($objFile->exists())
		{
			$strFile = trim($objFile->path);
			// append timestamp to trick server caches
			if($GLOBALS['PCT_THEMEDESIGNER']['bypassServerCache'])
			{
				$strFile .= '?'.$time;
			}
		}
		
		return $strFile;
	}
	
		
	/**
	 * Public access to writeFile() method
	 * @param string
	 * @return object
	 */
	public function writeCSS($strCSS,$strTheme='')
	{
		return $this->writeFile(sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILE'],$strTheme),$strCSS);
	}

	
	/**
	 * Write the css file and return its path and file name
	 * @param string	Path
	 * @param string	Content
	 * @return object
	 */
	protected function writeFile($strFile,$strContent)
	{
		if(strlen($strFile) < 1)
		{
			$strFile = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILE'],'');
		}
		
		$objFile = new \Contao\File($strFile);
		$strContent = str_replace( array("\t","\r"), "", $strContent);
		$strContent = preg_replace(array('/^[\t ]+/m', '/[\t ]+$/m', '/\n\n+/'), array('', '', "\n"), $strContent);
		
		if(\Contao\Config::get('gzipScripts'))
		{
			$objMinify = new \MatthiasMullie\Minify\CSS();
			$objMinify->add($strContent);
			$strContent = $objMinify->minify();
		}
		
		if( !$objFile->exists() )
		{
			\Contao\File::putContent($strFile,$strContent);
		}
		else
		{
			$objFile->write($strContent);
		}
		
		return $objFile;
	}
	
// TODO: !render
	
	/**
	 * Render the ThemeDesigner and return it as html string
	 * @return string
	 */
	public function render($strTemplate='themedesigner')
	{
		$objTemplate = new \Contao\FrontendTemplate($strTemplate);
		$objTemplate->type = 'themedesigner';
		
		$arrSession = $this->getSession();
		$strContent = '';
		
		// devices
		$objDevicesAndZoom = new \Contao\FrontendTemplate('td_devices_and_zoom');
		$objDevicesAndZoom->device = $arrSession['DEVICE'] ?? 'desktop';
		$objDevicesAndZoom->zoom = $arrSession['ZOOM'] ?? 100;
		// render devices and zoom
		$strContent .= $objDevicesAndZoom->parse();

		// get the main sections
		$arrSections = $this->getSections();
		if(count($arrSections) < 1)
		{
			$objTemplate->empty = true;
			return $objTemplate->parse();
		}
		
		$objTemplate->sections = $arrSections;	
		
		// prepare section
		$arrItems = array();
		
		foreach($arrSections as $section)
		{
			$objSection = new \PCT\ThemeDesigner\Section($section);
			if($objSection === null)
			{
				continue;
			}
			
			$strSection = $objSection->render();
			if(empty($strSection))
			{
				continue;
			}
			
			$strContent .= $strSection;
			
			$class = array($section);
			
			$arrItems[] = array
			(
				'section' 	=> $section,
				'html'		=> $strSection,
				'class'		=> implode(' ', $class),
			);
		}
		
		if(!empty($arrItems))
		{
			$last = count($arrItems) - 1;
			
			$arrItems[0]['class'] = trim($arrItems[0]['class']) . ' first';
			$arrItems[$last]['class'] = trim($arrItems[$last]['class']) . ' last';
		}
		
		$objTemplate->items = $arrItems;
		$objTemplate->content = $strContent;
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Return the main section names as array
	 * @return array
	 */
	public static function getMainSections()
	{
		if(!is_array($GLOBALS['PCT_THEMEDESIGNER_CONFIG']) || empty($GLOBALS['PCT_THEMEDESIGNER_CONFIG']))
		{
			return array();
		}
		
		$arrChilds = array();
		
		// find child sections
		foreach($GLOBALS['PCT_THEMEDESIGNER_CONFIG'] as $config)
		{
			if( !empty($config['csection']) )
			{
				$arrChilds = array_merge($arrChilds, array_filter($config['csection']) );
			}
		}
		
		return array_diff( array_keys($GLOBALS['PCT_THEMEDESIGNER_CONFIG']),$arrChilds );
	}
	
	
	/**
	 * Return all section names as array
	 * @return array
	 */
	public function getSections()
	{
		if(!is_array($GLOBALS['PCT_THEMEDESIGNER_CONFIG']) || empty($GLOBALS['PCT_THEMEDESIGNER_CONFIG']))
		{
			return array();
		}
		
		return array_keys($GLOBALS['PCT_THEMEDESIGNER_CONFIG']);
	}


// ! Session management
		
	
	/**
	 * Return the current session as array
	 * @return array
	 */
	public function getSession()
	{
		$objSession = System::getContainer()->get('request_stack')->getSession();
		$strTheme = $this->getTheme();
		$strSession = $this->strSession.'_'.$strTheme;
		
		$arrReturn = $objSession->get($strSession);
		
		if(!is_array($arrReturn))
		{
			$arrReturn = array();
		}

		if( !isset($_SESSION[$strSession]) )
		{
			$_SESSION[$strSession] = array();
		}
		
		// merge with default php session. This is nessessary for upload files
		if(is_array($_SESSION[$strSession]) && count($_SESSION[$strSession]) > 0)
		{
			$arrIntersect = array_intersect_key($_SESSION[$strSession],$arrReturn);
			if(is_array($arrIntersect) && count($arrIntersect) > 0)
			{
				foreach($arrIntersect as $k => $arr)
				{
					if(!is_array($arrReturn[$k]))
					{
						$arrReturn[$k] = array();
					}
					
					if(is_array($arr))
					{
						$arrReturn[$k] = array_merge($arrReturn[$k],$arr);
					}
					else
					{
						$arrReturn[$k] = $arr;
					}
				}
			}
			
			$arrDiff = array_diff_key($_SESSION[$strSession], $arrReturn);
			if(is_array($arrDiff) && count($arrDiff) > 0)
			{
				foreach($arrDiff as $k => $arr)
				{
					$arrReturn[$k] = $arr;
				}
			}
			
			// merge complete, remove temp. php helper session
			unset($_SESSION[$strSession]);
			
			// write session
			$objSession->set($strSession,$arrReturn);
			
			return $arrReturn;
		}


		if( !isset($arrReturn['MINIFIED']) )
		{
			$arrReturn['MINIFIED'] = false;
		}

		if( !isset($arrReturn['SWITCH']) )
		{
			$arrReturn['SWITCH'] = array();
		}

		if( !isset($arrReturn['IDENT']) )
		{
			$arrReturn['IDENT'] = 0;
		}
		
		if( !isset($arrReturn['IFRAME_URL']) )
		{
			$arrReturn['IFRAME_URL'] = '';
		}
		
		return $arrReturn; 
	}


	/**
	 * Set a session array
	 * @param array||null
	 */
	public function setSession($arrSession=null)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		// remove the whole session
		if($arrSession === null)
		{
			$objSession->remove($this->strSession.'_'.$this->getTheme());
			unset($_SESSION[$this->strSession.'_'.$this->getTheme()]);
			return;
		}
		
		$objSession->set($this->strSession.'_'.$this->getTheme(),$arrSession);
	}
		
	
	/**
	 * Reset and reload
	 * @param boolean
	 */
	public function reset()
	{
		global $objPage;
		
		// clear session
		$this->setSession();

		$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
		
		// reload page without parameter
		\Contao\Controller::redirect( $objRouter->generate($objPage) );
	}
	

	/**
	 * Add an uploaded file
	 * @param array		Data array of the upload
	 */
	public function addUpload($strField,$arrFile)
	{
		$maxSize = \Contao\System::getReadableSize( $GLOBALS['PCT_THEMEDESIGNER']['maxFileSize'] );
		
		$arrFile['name'] = \Contao\StringUtil::sanitizeFileName($arrFile['name']);
		
		if (!is_uploaded_file($arrFile['tmp_name']))
		{
			if ($arrFile['error'] == 1 || $arrFile['error'] == 2)
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('File "'.$arrFile['name'].'" exceeds the maximum file size of '.$maxSize);
			}
		}
		
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		
		$strExtension = pathinfo($arrFile['name'], PATHINFO_EXTENSION);
		
		// standardize file names
		$arrFile['name'] = str_replace(' ', '_',$arrFile['name']);
		
		$arrUploadTypes = StringUtil::trimsplit(',', $GLOBALS['PCT_THEMEDESIGNER']['allowedUploadTypes']);

		// not allowed file type
		if(!in_array($strExtension, $arrUploadTypes))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('File "'.$arrFile['name'].'" is a not allowed file type');
		}
		
		$arrImageSize = @getimagesize($arrFile['tmp_name']);
		
		// svg is not an image type in php
		if($strExtension == 'svg')
		{
			$arrImageSize['mime'] = 'image/svg+xml';
		}
		
		$objFiles = \Contao\Files::getInstance();
		$strDest = $GLOBALS['PCT_THEMEDESIGNER']['uploadFolder'] ?: 'system/tmp/themedesigner';
		
		// is image
		if($arrImageSize)
		{
			if(!is_dir($rootDir.'/'.$strDest))
			{
				$objFiles->mkdir($strDest);
			}
			
			$strFile = $strDest.'/'.$arrFile['name'];
			
			$blnSuccess = $objFiles->move_uploaded_file($arrFile['tmp_name'], $strFile);
			
			if(!$blnSuccess)
			{
				\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('File "'.$strFile.'" could not be created or moved to destination: '.$strDest);
				return;
			}
			
			$image = array
			(
				'mime' 		=> $arrImageSize['mime'],
				'extension'	=> $strExtension,
				'file'		=> $strFile,
				'name'		=> $arrFile['name'],
				#'size'		=> $arrImageSize,
			);
			
			$arrSession = $this->getSession();
			$arrSession['VALUES'][$strField] = $image;
			$this->setSession($arrSession);
			
			$_SESSION[$this->strSession.'_'.$this->getTheme()]['VALUES'][$strField] = $image;
		}
	}
}