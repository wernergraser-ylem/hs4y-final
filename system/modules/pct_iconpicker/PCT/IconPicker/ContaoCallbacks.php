<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\IconPicker;

use Contao\Input;
use Contao\StringUtil;
use Contao\System;

/**
 * Class file
 * ContaoCallbacks
 */
class ContaoCallbacks extends \Contao\Backend
{
	/**
	 * Inject font icon class in content elements
	 * @param object
	 * @param string
	 * @return string
	 * called from getContentElement HOOK
	 */
	public function getContentElementCallback($objRow, $strBuffer, $objElement)
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if(!$objElement->addFontIcon || strlen($objElement->fontIcon) < 1 || System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			return $strBuffer;
		}

		$objIconPicker = new IconPicker;
		
		// add stylesheets
		$objIconPicker->addStyleSheetsToPage();
		
		// do not manipulate the output when passing a custom template
		if(strlen($objElement->customTpl) > 0)
		{
			return $strBuffer;
		}
			
		switch($objElement->type)
		{
			case 'list':
				$items = \Contao\StringUtil::deserialize($objElement->listitems);
				if(empty($items))
				{
					break;
				}
				
				$tmp = array();
				foreach($items as $item)
				{
					$tmp[] = '<span class="icon">{{icon::'.$objRow->fontIcon.'}}</span><span class="list-content">'.$item.'</span>';
				}
				$objElement->listitems = $tmp;
				unset($tmp);
				
				$strBuffer = $objElement->generate();
				$strBuffer = \str_replace('ce_list','ce_list hasIcon',$strBuffer);
				
				return $strBuffer;

				break;
			// inject in anchor only
			case 'hyperlink':
			case 'revolutionslider_hyperlink':
			case 'toplink':
				
				$strBuffer = \str_replace($objElement->linkTitle, '{{icon::'.$objElement->fontIcon.'}}<span>'.$objElement->linkTitle.'</span>', $strBuffer);
				$strBuffer = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($strBuffer);
				
				break;
			// inject in headlines only
			case 'text':
			case 'table':
			case 'code':
			case 'image':
			case 'gallery':
			case 'video':
			case 'sliderStart':
			case 'youtube':
			case 'download': case 'downloads':
			case 'comments':
			case 'form':
				$arrClass = array($objElement->fontIcon);
				$preg = preg_match('/<h(.*?)\>/', $strBuffer,$result);
				if($preg)
				{
					$hl = $result[1];
					
					$preg_class = preg_match('/class="(.*?)\"/', $result[0],$res_class);
					if($preg_class)
					{
						$class = explode(' ', $res_class[1]);
						$arrClass = array_unique(array_merge($arrClass, $class));
						$hl = substr($result[1],0,1);
					}
					
					$strBuffer = preg_replace('/<h(.*?)\>/', '<h'.$hl.' class="'.trim(implode(' ', $arrClass)).'">',$strBuffer);
				}
				break;
			default:
				$arrCssID = \Contao\StringUtil::deserialize($objElement->cssID);
				$arrClass = array($objElement->fontIcon);
				$arrClass[] = trim($arrCssID[1]);
				$preg = preg_match('/class="(.*?)\"/', $strBuffer,$result);
				if($preg)
				{
					$class = explode(' ', $result[1]);
					$arrClass = array_unique(array_merge($arrClass, $class));
				}
				$strBuffer = str_replace($result[1], trim(implode(' ', $arrClass)), $strBuffer);
				break;
		}
	
		return $strBuffer;
	}

	
	/**
	 * Replace IconPicker inserttags
	 * @param string
	 */
	public function replaceTags($strElement)
	{
		$arrElements = explode('::', $strElement);
		
		switch($arrElements[0])
		{
			case 'icon':
				$strClass = $arrElements[1];
				if(strlen(strpos($strClass, 'fa-')) > 0)
				{
					$strClass .= ' fa';
				}
				return sprintf('<i class="%s"></i>',$strClass);
				break;
			default: 
				return false; 
				break;
		}
	}


	/**
	 *  Add information to the backend main template
	 * @param object
	 * called from parseTemplate Hook
	 */
	public function parseTemplateCallback($objTemplate)
	{
		if($objTemplate->getName() == 'be_main' && Input::get('key') == 'iconpicker')
		{
			$objTemplate->attributes .= ' data-page="iconpicker"';
		}
	}	
}