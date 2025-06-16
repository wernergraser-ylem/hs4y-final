<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core;


/**
 * Class file
 * Hooks
 * Collect all callback function
 */
class Hooks
{
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 */
	public static function getInstance()
	{
		return new static();
	}

	/**
	 * Call Contao Controller function
	 * @param string Name of function
	 * @param array
	 */
	public function call($strMethod, $arrArguments)
	{
		if (method_exists($this, $strMethod))
		{
			return call_user_func_array(array($this, $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: PCT\CustomElements\Core\Hook::' . $strMethod);
	}

	/**
	 * Call function
	 * @param string
	 * @param array
	 */
	public static function callstatic($strMethod, $arrArguments)
	{
		if (method_exists(static::getInstance(), $strMethod))
		{
			return call_user_func_array(array(static::getInstance(), $strMethod), $arrArguments);
		}
		throw new \RuntimeException('undefined method: PCT\CustomElements\Core\Hook::' . $strMethod);
	}


	/**
	 * Call the generateWildcard HOOK
	 * @param string
	 * @param array
	 * @param object
	 * @return string
	 * Triggered in: PCT\CustomElements\Backend\BackendIntegration
	 */
	protected function generateWildcardHook($strBuffer,$arrAttributes,$objCaller)
	{
		// HOOK: allow other extensions to manipulate the wildcard output
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['generateWildcard']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['generateWildcard']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['generateWildcard'] as $callback)
			{
				$strBuffer = \Contao\System::importStatic($callback[0])->{$callback[1]}($strBuffer,$arrAttributes,$objCaller);
			}
		}

		return $strBuffer;
	}
	
	
	/**
	 * Call the generateWildcardValue HOOK
	 * @param string
	 * @param object
	 * @return string
	 * Triggered in: PCT\CustomElements\Backend\BackendIntegration
	 */
	protected function processWildcardValue($varValue,$objAttribute,$intElement,$strTable)
	{
		$arrValues = array();
		
		// HOOK: allow other extensions to manipulate the wildcard output
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue'] as $callback)
			{
				$new = \Contao\System::importStatic($callback[0])->{$callback[1]}($varValue,$objAttribute,$intElement,$strTable);
				if($new != $varValue)
				{
					$arrValues[$objAttribute->get('id')] = $new;
				}
			}
		}
		
		return $arrValues[$objAttribute->get('id')] ?? '';
	}


	/**
	 * Array options callback HOOK
	 * @param array
	 * @return array
	 * Triggered in: PCT\CustomElements\Helper\QueryBuilder
	 */
	protected function sqlQueryHook($arrOptions,$objCaller=null)
	{
		// HOOK allow other extensions to manipulate the options array
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['sqlQuery']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['sqlQuery']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['sqlQuery'] as $callback)
			{
				$arrOptions = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrOptions,$objCaller);
			}
		}
		return $arrOptions;
	}


	/**
	 * Allow manipulations on the attribute widget after it gets parsed
	 * @param object
	 * @param string
	 * @param array
	 * @param object
	 * Triggered in: PCT\CustomElements\Core\Attribute
	 */
	protected function parseWidgetHook($objWidget,$strField,$arrFieldDef,$objDC)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['parseWidget']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['parseWidget']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['parseWidget'] as $callback)
			{
				return \Contao\System::importStatic($callback[0])->{$callback[1]}($objWidget,$strField,$arrFieldDef,$objDC);
			}
		}
	}


	/**
	 * Called before the data is stored in the vault
	 * @param object
	 * @param array
	 * @return array
	 */
	protected function storeValueHook($intAttribute,$arrSet)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['storeValue']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['storeValue']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['storeValue'] as $callback)
			{
				$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($intAttribute);
				$arrSet = \Contao\System::importStatic($callback[0])->{$callback[1]}($objAttribute,$arrSet);
			}
		}
		return $arrSet;
	}
	
	
	/**
	 * Call the prepareRendering HOOK
	 * Triggered as an alternative rendering routine for any attribute 
	 * @param string
	 * @param string
	 * @param mixed
	 * @param array
	 * @param object
	 */
	protected function prepareRenderingHook($strField,$varValue,$objTemplate,$objAttribute)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareRendering']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareRendering']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareRendering'] as $callback)
			{
				$strBuffer = \Contao\System::importStatic($callback[0])->{$callback[1]}($strField,$varValue,$objTemplate,$objAttribute);
			}
		}
		return $strBuffer ?? '';
	}


	/**
	 * Call the renderAttribute HOOK
	 * Triggered before an attribute is rendered to the the frontend
	 * @param string
	 * @param string
	 * @param mixed
	 * @param array
	 * @param object
	 */
	protected function renderAttributeHook($strBuffer,$strField,$varValue,$objAttribute)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['renderAttribute']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['renderAttribute']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['renderAttribute'] as $callback)
			{
				$strBuffer = \Contao\System::importStatic($callback[0])->{$callback[1]}($strBuffer,$strField,$varValue,$objAttribute->getFieldDefinition(),$objAttribute);
			}
		}
		return $strBuffer;
	}
	
	
	/**
	 * Called when the clipboard is running in copy mode
	 * Expects an array of ids of the customelements that should be copied as return value
	 * @param array		Ids of elements in the clipboard
	 * @param string	Table name
	 * @param object	DataContainer object
	 * @return			array[source] = source table name e.g. tl_content; array[ids] = the ids of the content elements
	 * Triggered in: 	PCT\CustomElements\Helper\DcaHelper
	 */
	protected function observeClipboardHook($arrClipboard, $strTable, $objDC)
	{
		$arrReturn = array();
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['observeClipboard']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['observeClipboard']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['observeClipboard'] as $callback)
			{
				$arrReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrClipboard, $strTable, $objDC);
			}
		}
		return $arrReturn;
	}
	
	
	/**
	 * Called when a new copy in the vault should be created
	 * @param integer	Id of the new record created by contao
	 * @param object	The DataContainer object
	 * @param object	The DcaHelper class object
	 * Triggered in: 	PCT\CustomElements\Helper\DcaHelper
	 */
	protected function createCopyInVaultHook($intRecord,$objDC,$objDcaHelper)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['createCopyInVault']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['createCopyInVault']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['createCopyInVault'] as $callback)
			{
				\Contao\System::importStatic($callback[0])->{$callback[1]}($intRecord,$objDC->table,$objDC,$objDcaHelper);
			}
		}
	}
	
	
	/**
	 * Called when a contao element has been deleted
	 * @param integer	Id of the new record created by contao
	 * @param string	
	 * @param object	
	 * Triggered in: 	PCT\CustomElements\Helper\DcaHelper
	 */
	protected function removeFromVaultHook($objDC)
	{
		$arrReturn = array();
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['removeFromVault']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['removeFromVault']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['removeFromVault'] as $callback)
			{
				$arrReturn = \Contao\System::importStatic($callback[0])->{$callback[1]}($objDC->id,$objDC->table,$objDC);
			}
		}
		return $arrReturn;
	}
	
	
	/**
	 * Manipulate the dca of an attribute on the fly
	 * @param array		Current field definition
	 * @param object	Attribute
	 * @param object	DataContainer
	 * @return array
	 */
	protected function getDcaHook($arrData,$objAttribute,$objDC)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['getDCA']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['getDCA']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['getDCA'] as $callback)
			{
				$arrData = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrData,$objAttribute,$objDC);
			}
		}
		return $arrData;
	}
	
	
	/**
	 * Manipulate the backend output of an attribute on the fly
	 * @param array		Current field definition
	 * @param object	Attribute
	 * @param object	DataContainer
	 * @return array
	 */
	protected function prepareForDcaHook($arrOutput,$objAttribute,$objDC)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareForDca']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareForDca']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['prepareForDca'] as $callback)
			{
				$arrOutput = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrOutput,$objAttribute,$objDC);
			}
		}
		
		return $arrOutput;
	}
	
	
	/**
	 * Manipulate the backend list output of the contao list view
	 * @param string	Name of the table
	 * @param array		Current db record
	 * @param string	The icon as html string
	 * @param string	Current prerendered output
	 * @return string	New output
	 */
	protected function child_record_callback($strTable, $arrRow, $strIcon, $strBuffer)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['child_record_callback']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['child_record_callback']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['child_record_callback'] as $callback)
			{
				$strBuffer = \Contao\System::importStatic($callback[0])->{$callback[1]}($strTable, $arrRow, $strIcon, $strBuffer);
			}
		}
		
		return $strBuffer;
	}
	
	
	/**
	 * Toggle the backend icon
	 * @param array		Current field definition
	 * @param object	Attribute
	 * @param object	DataContainer
	 * @return array
	 */
	protected function toggleIconHook($strTable, $arrRow, $strIcon)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['toggleIcon']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['toggleIcon']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['toggleIcon'] as $callback)
			{
				$strIcon = \Contao\System::importStatic($callback[0])->{$callback[1]}($strTable, $arrRow, $strIcon);
			}
		}
		
		return $strIcon;
	}
	
	
	/**
	 * Import chain
	 * @param array		Current field definition
	 * @param object	Attribute
	 * @param object	DataContainer
	 * @return array
	 */
	protected function importChainHook($objCaller)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['importChain']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['importChain']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['importChain'] as $callback)
			{
				$objCaller = \Contao\System::importStatic($callback[0])->{$callback[1]}($objCaller);
			}
		}
		return $objCaller;
	}
	
	
	/**
	 * Load attribute value Hook
	 * Triggered when calling the ->value() Method for a TemplateAttribute in the Frontend
	 * @param array		Current field definition
	 * @param object	Attribute
	 * @param object	DataContainer
	 * @return array
	 */
	protected function loadValueHook($varValue,$objAttribute=null)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['loadValue']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['loadValue']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['loadValue'] as $callback)
			{
				$varValue = \Contao\System::importStatic($callback[0])->{$callback[1]}($varValue,$objAttribute);
			}
		}
		return $varValue;
	}
	
	
	/**
	 * Translate attribute value Hook
	 * Triggered when an attribute or filter processes its frontend output. Allow custom translated labels for values
	 * @param array		Current field definition
	 * @param object	Attribute
	 * @param object	DataContainer
	 * @return string
	 */
	protected function translateValueHook($strField,$strValue,$strCustomElement,$objAttribute)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['translateValue']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['translateValue']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['translateValue'] as $callback)
			{
				$strTranslation = \Contao\System::importStatic($callback[0])->{$callback[1]}($strField,$strValue,$strCustomElement,$objAttribute);
			}
		}
		return $strTranslation ?? '';
	}
	
	
	/**
	 * On factory create instance Hook
	 * Triggered when an CustomElement | Group | Attribute has been created by their Factory::create method
	 * @param object	The object created by the factory
	 * @param object	The ContaoModel related
	 */
	protected function onFactoryCreateHook($objElement,$objModel)
	{
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['onFactoryCreate']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['onFactoryCreate']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['onFactoryCreate'] as $callback)
			{
				\Contao\System::importStatic($callback[0])->{$callback[1]}($objElement,$objModel);
			}
		}
	}
}