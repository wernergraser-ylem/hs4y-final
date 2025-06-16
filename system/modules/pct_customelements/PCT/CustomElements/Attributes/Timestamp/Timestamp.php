<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @attribute	Attribute Timestamp
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;

/**
 * Class file
 * Timestamp
 */
class Timestamp extends Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'text',
			'eval'			=> $this->getEval(),
			'sql'			=> "int(10) unsigned NOT NULL default '0'",
		);

		$sql_version = \Contao\Database::getInstance()->prepare('SELECT @@version AS version')->execute();
		if( \version_compare($sql_version->version,'8','>=') && \strpos( \strtolower($sql_version->version), 'mariadb') === false )
		{
			$arrReturn['sql'] = "int unsigned NOT NULL default '0'";
		}
		
		$options = \Contao\StringUtil::deserialize($this->get('options'));
		if(empty($options))
		{
			return $arrReturn;
		}
		
		if(in_array('datepicker',$options))
		{
			$arrReturn['eval']['datepicker'] = true;
			$arrReturn['eval']['tl_class'] = implode(' ', array_merge(explode(' ', $arrReturn['eval']['tl_class'] ?? ''),array('wizard')));
			$arrReturn['eval']['rgxp'] = $this->get('date_rgxp');
			$arrReturn['sql'] = "varchar(10) NOT NULL default ''";
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @return string
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC)
	{
		// validate the input
		$objWidget->validate();

		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}
		
		$strBuffer = $objWidget->parse();
		
		$arrData = $this->getFieldDefinition();
		
		// Date picker
		// taken from DataContainer.php
		if ($arrFieldDef['eval']['datepicker'])
		{
			$rgxp = $arrFieldDef['eval']['rgxp'];
			$format = \Contao\Date::formatToJs($GLOBALS['TL_CONFIG'][$rgxp.'Format']);
			$time = '';
			switch ($rgxp)
			{
				case 'datim':
					$time = ",\n      timePicker:true";
					break;

				case 'time':
					$time = ",\n      pickOnly:\"time\"";
					break;

				default:
					$time = '';
					break;
			}
			
			$wizard = \Contao\Image::getHtml('assets/datepicker/images/icon.svg', '', 'title="'.\Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['datepicker']).'" id="toggle_' . $objWidget->id . '" style="cursor:pointer"');
						
			$wizard .= '
			  <script>
			    window.addEvent("domready", function() {
			      new Picker.Date($("ctrl_' . $objWidget->id . '"), {
			        draggable: false,
			        toggle: $("toggle_' . $objWidget->id . '"),
			        format: "' . $format . '",
			        positionOffset: {x:-211,y:-209}' . $time . ',
			        pickerClass: "datepicker_bootstrap",
			        useFadeInOut: !Browser.ie,
			        startDay: ' . $GLOBALS['TL_LANG']['MSC']['weekOffset'] . ',
			        titleFormat: "' . $GLOBALS['TL_LANG']['MSC']['titleFormat'] . '"
			      });
			    });
			  </script>';
			
			$strBuffer .= $wizard;
		}
		
		return $strBuffer;
	}

	/**
	 * Rewrite date format and return html in the frontend
	 * @param string
	 * @param string		Unix timestamp
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @return string
	 * called renderCallback method
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		if(!$objAttribute->get('date_format'))
		{
			return $varValue;
		}
		
		$objTemplate->value = \Contao\Date::parse($objAttribute->get('date_format'),$varValue);
		
		return $objTemplate->parse();
	}
	
	/**
	 * Convert value to unix timestamp before saving to the Vault
	 * @param object
	 * @param array
	 * @return array
	 * called from: storeValue Hook
	 */
	public function storeValueCallback($objAttribute,$arrSet)
	{
		if($objAttribute->get('type') != 'timestamp')
		{
			return $arrSet;
		}
		
		if(empty($arrSet['data']))
		{
			return $arrSet;
		}
		
		$rgxp = $objAttribute->get('date_rgxp');
		$format = $GLOBALS['TL_CONFIG'][$rgxp.'Format'];
		
		// convert date string to unix timestamp
		$objDate = new \Contao\Date($arrSet['data'],$format);
		$arrSet['data'] = $objDate->__get('tstamp');
		
		return $arrSet;
	}
	
	
	/**
	 * Render wildcard value
	 * @param mixed
	 * @param object	
	 * @param integer	Id of the Element ( >= CE 1.2.9)
	 * @param string	Name of the table ( >= CE 1.2.9)
	 * @return string
	 */
	public function processWildcardValue($varValue,$objAttribute)
	{
		if($objAttribute->get('type') != 'timestamp')
	 	{
	 		return $varValue;
	 	}
	 	
	 	$strFormat = $objAttribute->get('date_format');
	 	if(strlen($strFormat) < 1)
	 	{
		 	$rgxp = $objAttribute->get('date_rgxp');
		 	$strFormat = $GLOBALS['TL_CONFIG'][$rgxp.'Format'];	 	
		}
		
	 	return \Contao\Date::parse($strFormat,$varValue);
	}
}