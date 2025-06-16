<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
 * @link		http://contao.org
 */


/**

Inserttags

{{revolutionslider::*}}
{{revoslider::*}}

*/

/**
 * Namespace
 */
namespace RevolutionSlider\Core;

use Contao\StringUtil;

/**
 * Class file
 * Replace inserttags
 */
class InsertTags extends \Contao\Controller
{
	/**
	 * Replace RevolutionSlider related inserttags
	 *
	 * @param string
	 * @return mixed
	 */
	public function replaceTags($strTag)
	{
		$arrElements = explode('::', $strTag);
		
		switch($arrElements[0])
		{
			case 'title':
			case 'param1':
				return '###'.$arrElements[0].'###';
				break;
			// Render the slider and return html
			case 'revolutionslider': 
			case 'revoslider':
				$objSlider = \RevolutionSlider\Core\Factory::findById($arrElements[1]);		
				
				// return if slider is obsolete
				if(!$objSlider)
				{
					return false;
				}
				
				// mimic a content element, makes it easier with all the wrapping divs
				$objTemplate = new \Contao\FrontendTemplate('ce_revolutionslider');
				$objTemplate->class = 'revolutionslider';
				$arrCssID = StringUtil::deserialize($objSlider->get('cssID'));
		
				$arrClass = explode(' ',$arrCssID[1]);
				$arrClass[] = $objSlider->get('sliderStyle');
				
				$objTemplate->sliderClass = implode(' ', $arrClass);
				$objTemplate->slider = $objSlider->render();
				
				return $objTemplate->parse();
			
				break;
			default:
				return false;
				break;
		}
	}

}