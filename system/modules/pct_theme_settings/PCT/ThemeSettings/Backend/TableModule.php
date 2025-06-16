<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 * @link		http://contao.org
 */
 

/**
 * Namespace
 */
namespace PCT\ThemeSettings\Backend;

use Contao\StringUtil;

/**
 * Class file
 * TableModule
 */
class TableModule extends \Contao\Backend
{
	/**
	 * Remove the autogrid fields in autogrid_wrapper elements
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ModuleModel::findByPk($objDC->id);
		}
		
		if( $objDC->activeRecord === null )
		{
			return;
		}

		// margin fields, alias field
		foreach ($GLOBALS['TL_DCA'][$objDC->table]['palettes'] as $k => $v) 
		{
			if( $k == '__selector__' )
			{
				continue;
			}
			// inject after cssID field
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k] = str_replace('cssID', 'cssID,margin_t,margin_b,margin_t_m,margin_b_m,', $GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k]);

			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k] = str_replace('name', 'name,alias,', $GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k]);
		
		}

		// load options by type
		foreach(array('style','align','color','layout') as $k)
		{
			if( isset($GLOBALS['PCT_THEME_SETTINGS'][$k.'_classes::'.$objDC->activeRecord->type]) )
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields'][$k.'_css']['options'] = $GLOBALS['PCT_THEME_SETTINGS'][$k.'_classes::'.$objDC->activeRecord->type];
			}
		}

		// visibility_css
		$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'] = \str_replace('cssID','cssID,visibility_css',$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default']);		
		if( isset($GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = \str_replace('cssID','cssID,visibility_css',$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]);		
		}

		if($objDC->activeRecord->type == 'newslist')
		{
			$arrSortings = $GLOBALS['PCT_THEME_SETTINGS']['newslist_order'];
			
			$arrCallback = $GLOBALS['TL_DCA']['tl_module']['fields']['news_order']['options_callback'];
			if( isset($arrCallback) && \is_array($arrCallback) )
			{
				if( \method_exists($arrCallback[0],$arrCallback[1]) )
				{
					$arr = \Contao\System::importStatic($arrCallback[0])->{$arrCallback[1]}($objDC);
					if( \is_array($arr) )
					{
						$arrSortings = \array_merge($arrSortings, $arr);
					}
				}
			}
			// remove the callback to work with the regular options array
			unset( $GLOBALS['TL_DCA'][$objDC->table]['fields']['news_order']['options_callback'] );

			$GLOBALS['TL_DCA'][$objDC->table]['fields']['news_order']['options'] = array_unique($arrSortings);
		}
		// portfoliolist
		else if($objDC->activeRecord->type == 'portfoliolist')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array(get_class($this),'getModulePortfolioListTemplates');
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['news_template']['options_callback'] = array(get_class($this),'getPortfolioTemplates');
		}
		// portfoliolist
		else if($objDC->activeRecord->type == 'portfolioreader')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array(get_class($this),'getModulePortfolioReaderTemplates');
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['news_template']['options_callback'] = array(get_class($this),'getPortfolioTemplates');
		}
		// portfoliofilter
		else if($objDC->activeRecord->type == 'portfoliofilter')
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['news_readerModule'] = array_merge($GLOBALS['TL_DCA'][$objDC->table]['fields']['news_readerModule'], $GLOBALS['TL_DCA'][$objDC->table]['fields']['news_portfoliolistModule']);
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['news_readerModule']['options_callback'] = array(get_class($this),'getPortfolioListModules');
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array(get_class($this),'getModulePortfolioFilterTemplates');
		}
	}


	/**
	 * Return the module portfoliolist templates: mod_portfoliolist_
	 * @return array
	 */
	public function getModulePortfolioListTemplates()
	{
		return $this->getTemplateGroup('mod_portfoliolist');
	}


	/**
	 * Return the module portfoliolist templates: mod_portfoliolist_
	 * @return array
	 */
	public function getModulePortfolioReaderTemplates()
	{
		return $this->getTemplateGroup('mod_portfolioreader');
	}


	/**
	 * Return the item portfolio templates: portfolio_
	 * @return array
	 */
	public function getPortfolioTemplates()
	{
		return $this->getTemplateGroup('portfolio');
	}


	/**
	 * Return the module portfoliofilter templates: mod_portfoliolist_
	 * @return array
	 */
	public function getModulePortfolioFilterTemplates()
	{
		return $this->getTemplateGroup('mod_portfoliofilter');
	}


	/**
	 * Return all portfoliolist modules
	 * @return array
	 */
	public function getPortfolioListModules()
	{
		$arrModules = array();
		$objModules = $this->Database->execute("SELECT m.id, m.name, t.name AS theme FROM tl_module m LEFT JOIN tl_theme t ON m.pid=t.id WHERE m.type='portfoliolist' ORDER BY t.name, m.name");

		while( $objModules->next() )
		{
			$arrModules[$objModules->theme][$objModules->id] = $objModules->name . ' (ID ' . $objModules->id . ')';
		}

		return $arrModules;
	}


	/**
	 * Generate a module alias
	 * @param string
	 * @param object
	 * @return string
	 */
	public function generateAlias($varValue, $objDC)
	{
		if( empty($varValue) )
		{
			$varValue = StringUtil::generateAlias( $objDC->activeRecord->name );
		}
		
		return $varValue;
	}
}