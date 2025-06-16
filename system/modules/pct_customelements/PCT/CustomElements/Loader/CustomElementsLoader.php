<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Loader;

/**
 * Imports
 */
use PCT\CustomElements\Core\CustomElements as CustomElements;
use PCT\CustomElements\Core\CustomElement as CustomElement;
use PCT\CustomElements\Core\Cache as Cache;

/**
 * Class file
 * CustomElementsLoader
 */
class CustomElementsLoader
{
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
	/**
	 * Instantiate this class and return it (Factory)
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
	 * Load all custom elements as frontend modules
	 */
	public function loadFrontendModules()
	{
		$objCEHelper = CustomElements::getInstance();
		$arrDefaultTables = $objCEHelper->getDefaultAllowedTables();
		if(empty($arrDefaultTables))
		{
			$arrDefaultTables = array('tl_content','tl_module');
		}
		
		$objCustomElements = \Contao\Database::getInstance()->prepare("
			SELECT 
				*
			FROM 
				tl_pct_customelement AS ce 
			WHERE ce.alias!=''
		")->execute();

		if($objCustomElements->numRows < 1)
		{
			return;
		}
		
		while($objCustomElements->next())
		{
			$strAlias = $objCustomElements->alias;
			
		   if($objCustomElements->isCTE)
		   {
		   	// use default class
		   	if(!isset($GLOBALS['TL_CTE']['pct_customelements_node'][$strAlias]))
		   	{
		   		$GLOBALS['TL_CTE']['pct_customelements_node'][$strAlias] = $GLOBALS['PCT_CUSTOMELEMENTS']['TL_CTE'];
		   	}
		   	
		   	// set name
		   	$GLOBALS['TL_LANG']['CTE'][$strAlias] = array($GLOBALS['TL_LANG']['CTE'][$strAlias] ?: $objCustomElements->title,$strAlias);
		   }
		   if($objCustomElements->isFMD)
		   {
		   	// use default class
		   	if(!$GLOBALS['FE_MOD']['pct_customelements_node'][$strAlias])
		   	{
		   		$GLOBALS['FE_MOD']['pct_customelements_node'][$strAlias] = $GLOBALS['PCT_CUSTOMELEMENTS']['TL_FMD'];
		   	}
		   	
		   	// set name
		   	$GLOBALS['TL_LANG']['CTE'][$strAlias] = array($GLOBALS['TL_LANG']['FMD'][$strAlias] ?: $objCustomElements->title,$strAlias);
		   }
		   
		   $objCE = new CustomElement($objCustomElements->row());
		   
		   // add CE to the cache
		   Cache::addCustomElement($objCE->get('id'),$objCE);
		   Cache::addCustomElement($objCE->get('alias'),$objCE);
		}
	}
	
	
	/**
	 * Load a custom elements as a frontend module
	 * @param string	Alias of the custom element
	 * @param string
	 */
	public function load($strAlias,$strTable)
	{
		$objCEHelper = CustomElements::getInstance();
		if($strTable == 'tl_content')
		{
			// use default class
			if(!isset($GLOBALS['TL_CTE']['pct_customelements_node'][$strAlias]))
			{
				$GLOBALS['TL_CTE']['pct_customelements_node'][$strAlias] = $GLOBALS['PCT_CUSTOMELEMENTS']['TL_CTE'];
			}
			
			// load the translation
			$GLOBALS['TL_LANG']['CTE'][$strAlias] =  $objCEHelper->findTranslatedNameByAlias($strAlias,$strTable);
		}
		else if($strTable == 'tl_module')
		{
			// use default class
			if(!$GLOBALS['FE_MOD']['pct_customelements_node'][$strAlias])
			{
				$GLOBALS['FE_MOD']['pct_customelements_node'][$strAlias] = $GLOBALS['PCT_CUSTOMELEMENTS']['TL_FMD'];
			}
			
			// load the translation
			$GLOBALS['TL_LANG']['FMD'][$strAlias] = $objCEHelper->findTranslatedNameByAlias($strAlias,$strTable);
		}
		else
		{
			// HOOK: allow other tables to load a custom element
		}
	}
	
}