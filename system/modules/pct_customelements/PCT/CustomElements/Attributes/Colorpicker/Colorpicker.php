<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage Attribute Text
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */
use PCT\CustomElements\Core\Attribute as Attribute;

/**
 * Class file
 * Colorpicker
 */
class Colorpicker extends Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$eval = array('maxlength'=>6, 'multiple'=>true, 'size'=>2, 'colorpicker'=>true, 'isHexColor'=>true);

		$arrReturn = array
		(
			'label'   => array( $this->get('title'),$this->get('description') ),
			'exclude'  => true,
			'inputType'  => 'text',
			'eval'   => array_merge($this->getEval(),$eval),
			'sql'   => "varchar(64) NOT NULL default ''",
		);
		
		$tl_class = explode(' ', $arrReturn['eval']['tl_class'] ?? '');
		if(!in_array('wizard', $tl_class))
		{
			$tl_class[] = 'wizard';
			$tl_class[] = 'inline';
		}
		$arrReturn['eval']['tl_class'] = implode(' ', $tl_class);

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

		// Color picker
		// taken from DataContainer.php
		if ($arrData['eval']['colorpicker'])
		{
			// Support single fields as well (see #5240)
			$strKey = $arrData['eval']['multiple'] ? $strField . '_0' : $strField;
			
			$wizard = ' ' . \Contao\Image::getHtml('pickcolor.svg', $GLOBALS['TL_LANG']['MSC']['colorpicker'], 'style="vertical-align:top;cursor:pointer" title="'.\Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['colorpicker']).'" id="moo_' . $strField . '"') . '
			<script>
				window.addEvent("domready", function() {
				new MooRainbow("moo_' . $strField . '", {
					id: "ctrl_' . $strKey . '",
					startColor: ((cl = $("ctrl_' . $strKey . '").value.hexToRgb(true)) ? cl : [255, 0, 0]),
					imgPath: "assets/colorpicker/images/",
					onComplete: function(color) {
					$("ctrl_' . $strKey . '").value = color.hex.replace("#", "");
					}
				});
				});
			</script>';
			
			$strBuffer .= $wizard;
		}

		return $strBuffer;
	}
	
	
		/**
	 * Render the attribute and return html
	 * @param string
	 * @param mixed
	 * @param object
	 * @param object
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$varValue = \Contao\StringUtil::deserialize($varValue);
		
		$objColor = static::compileColor($varValue);
		
		// generate the attribute and place html in attribute template
		$objTemplate->value = $objColor->rgba;
			
		return $objTemplate->parse();
	}
	
	
	/**
	 * Compile color values coming from contao colorpicker
	 * @param mixed string||array
	 * @return object
	 */
	public static function compileColor($varColor)
	{
		if(is_string($varColor))
		{
			$varColor = \Contao\StringUtil::deserialize($varColor);
		}

		if(!is_array($varColor))
		{
			$varColor = array($varColor);
		}

		$tmp = $varColor;
		$color = $tmp[0];
		$rgb = array();
		//-- @see Contao\StyleSheets::convertHexColor
		
		// Try to convert using bitwise operation
		if (strlen($color) == 6)
		{
			$dec = hexdec($color);
			$rgb['red'] = 0xFF & ($dec >> 0x10);
			$rgb['green'] = 0xFF & ($dec >> 0x8);
			$rgb['blue'] = 0xFF & $dec;
		}
		// Shorthand notation
		elseif (strlen($color) == 3)
		{
			$rgb['red'] = hexdec(str_repeat(substr($color, 0, 1), 2));
			$rgb['green'] = hexdec(str_repeat(substr($color, 1, 1), 2));
			$rgb['blue'] = hexdec(str_repeat(substr($color, 2, 1), 2));
		}
		//--
		
		$alpha = '1';
		if( isset($tmp[1]) )
		{
			$alpha = (int)$tmp[1] / 100;
		}
		
		$objReturn = new \StdClass;
		$objReturn->alpha = $alpha;
		$objReturn->hex = $color;
		$objReturn->rgb = $rgb;
		$objReturn->rgba = 'rgba('.implode(',', $rgb).','.$alpha.')';
	
		return $objReturn;
	}
}