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

Inserttags

{{vault::ID-DES-ATTRIBUTES::ID-DES-CONTAO-ELEMENTS::TABELLE-DES-CONTAO-ELEMENTS}}

*/

/**
 * Namespace
 */
namespace PCT\CustomElements\Core;

/**
 * Imports
 */
use PCT\CustomElements\Core\Vault as Vault;

/**
 * Class file
 * Replace inserttags
 */
class InsertTags extends \Contao\Controller
{
	/**
	 * Replace CustomElement related inserttags
	 *
	 * @param string
	 * @return mixed
	 */
	public function replaceTags($strTag)
	{
		$arrElements = explode('::', $strTag);
		
		switch($arrElements[0])
		{
			// return a custom element value
			// Logic: {{customelement::SOURCE::PID::ATTRIBUTE#COUNTER::(GENERICATTRIBUTE-ID)}}
			case 'customelement':
				
				$strSource = $arrElements[1];
				$intPid = $arrElements[2];
				$strAttribute = $arrElements[3];
				$intGenericAttribute = $arrElements[4] ?: 0;
				
				$arrWizard = \PCT\CustomElements\Core\Vault::getWizardData($intPid,$strSource,$intGenericAttribute);
				if(empty($arrWizard) || !is_array($arrWizard['groups']))
				{
					return false;
				}
				
				// search the attribute in the wizard
				foreach($arrWizard['groups'] as $i => $arrGroup)
				{
					if(empty($arrGroup['attributes']) || !is_array($arrGroup['attributes']))
					{
						continue;
					}
					
					foreach($arrGroup['attributes'] as $ii => $arrAttribute)
					{
						if($arrAttribute['alias'] == $strAttribute)
						{
							return $arrWizard['values'][ $arrAttribute['uuid'] ];
						}
					}
				}
				
				return '';
				
				break;
			// Return the value of an attribute from the vault
			case 'vault': 
				$attr = $arrElements[1];
				$pid = $arrElements[2];
				$source = $arrElements[3];
				if(empty($pid) || empty($source))
				{
					return ''; // do not return false here
 				}
 				
 				// by uuid OR alias
 				if(is_string($attr))
 				{
	 				$isCopy = false;
	 				$alias = '';
					if(strlen(strpos($attr, '#')))
					{
						$arr = explode('#', $attr);
						$alias = $arr[0];
						$numCopy = $arr[1];
						$isCopy = true;
					}
 					
 					if(!$isCopy)
 					{
	 					$objAttribute = AttributeFactory::findByAlias($attr);
 					}
 					// locate the attribute in a wizard
	 				else
	 				{
		 				$objAttribute = AttributeFactory::findByAliasAndOrigin($attr,$pid,$source);
		 			}
		 		}
	 			// by ID
 				else if(is_numeric($attr))
 				{
 					$objAttribute = AttributeFactory::findById($attr);
 				}
 				
 				if(!$objAttribute)
				{
					return '';
				}
				
				$varValue = Vault::getAttributeValueByUuid($objAttribute->get('uuid'),$pid,$source);
				
				return $varValue;
				break;
			case 'pct_customelement_version':
				return PCT_CUSTOMELEMENTS_VERSION;
				break;
			case 'customelements_debug':
				if(!$GLOBALS['PCT_CUSTOMELEMENTS']['debug'])
				{
					return "Debugging is turned off. Set \"\$GLOBALS['PCT_CUSTOMELEMENTS']['debug'] = true;\"\\";
				}
				switch($arrElements[1])
				{
					case 'time':
						return $GLOBALS['PCT_CUSTOMELEMENTS']['process']['time'];
						break;
					case 'attributes':
						return $GLOBALS['PCT_CUSTOMELEMENTS']['process']['attributes'];
						break;
					case 'count':
					case 'customelements':
						return $GLOBALS['PCT_CUSTOMELEMENTS']['process']['customelements'];
						break;
				}
				// do not break here
			default:
				return false;
				break;
		}
	}

}