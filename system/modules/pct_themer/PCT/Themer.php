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
 * Class file
 * Themer
 *
 * Provide various methods to apply theme data
 */
class Themer
{
	/**
	 * Theme Demo name
	 * @var string
	 */
	protected $strTheme = '';
	
	/**
	 * Root page id
	 * @var integer
	 */
	protected $intRoot = 0;
	
	/**
	 * Root page object
	 * @var object
	 */
	protected $objRoot;
	
	
	/**
	 * Set the theme name
	 * @var string
	 */
	public function setName($strValue)
	{
		$this->strTheme = $strValue;
	}
	
	
	/**
	 * Return the theme name
	 * @return string
	 */
	public function getName()
	{
		return $this->strTheme;
	}
	
	
	/**
	 * Set root page object
	 * @var object
	 */
	public function setRootPage($objValue)
	{
		$this->objRoot = $objValue;
		$this->intRoot = $objValue->id;
	}
	
	
	/**
	 * Return the root page id
	 * @return object
	 */
	public function getRootPage()
	{
		return $this->objRoot;
	}


	/**
	 * Run the import for a root page
	 * @param integer	Root page id
	 * @return boolean
	 */
	public function import($intRoot)
	{
		$obj = new \PCT\Themer\Import;
		
		// set the root page
		$objRoot = \Contao\PageModel::findByPk($intRoot);
		$this->setRootPage($objRoot);
		
		// set the name
		$strTheme = $GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['label'] ?: $objRoot->pct_theme;
		$this->setName($strTheme);
		
		// run
		return $obj->run($intRoot);
	}
	
	
	/**
	 * Build the query string
	 * @param array
	 * @return string
	 */
	protected function buildInsert($strTable,$arrFields,$arrValues,$blnRowPerRow=true)
	{
		if(strlen($strTable) < 1 || count($arrFields) < 1 || count($arrValues) < 1)
		{
			return '';
		}
		
		$strReturn ='INSERT INTO `'.$strTable.'`';
		
		$fields = array();
		foreach($arrFields as $f)
		{
			$fields[] = '`'.$f.'`';
		}
		$strReturn .= '('.implode(',', $fields).')';
		
		$strReturn .= ' VALUES ';
		$values = array();
		foreach($arrValues as $v)
		{
			$values[] = '`'.$v.'`';
		}
		$strReturn .= '('.implode(',', $values).')';
		
		$strReturn .= '; ';
		
		return $strReturn;
	}
	
	
	/**
	 * Merge two arrays into one
	 * @param array		The new array to merge
	 * @param array		The array to merge into
	 */
	public function mergeData($arrInput, $arrHaystack=array())
	{
		if(count($arrInput) < 1)
		{
			return $arrHaystack;
		}
		
		$diff = array_diff_key($arrInput,$arrHaystack);
		
		// append the differences
		if(is_array($diff) && count($diff) > 0)
		{
			$arrHaystack += $diff;
		}
		
		// append existing keys
		foreach($arrInput as $k => $v)
		{
			if(!is_array($v))
			{
				$v = array($v);
			}
			
			if(array_key_exists($k, $arrHaystack))
			{
				$arrHaystack[$k] = array_merge($arrHaystack[$k], $v);
			}
		}
		
		return $arrHaystack;
	}


	
// ! -- Page, PageLayout

	
	/**
	 * Add theme files to the page
	 * @param object
	 * @param object
	 * called from: generatePage Hook
	 */
	public function addThemeFiles($objTemplate)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			return;
		}
		
		if ( \strpos($objTemplate->getName(), 'fe_page') === false ) 
		{
			return;
        }
        
        global $objPage;
		
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		if(strlen($objRoot->pct_theme) < 1 || !is_array($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]))
		{
			return;
		}
		
		//-- apply css
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
				
		if( \is_array($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['css']) === false )
		{
			$GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['css'] = array();
		}
		
		if( !empty($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['css']) )
		{
			// combine more than one file
			if(count($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['css']) > 1 )
			{
				$objCombiner = new \Contao\Combiner();
				foreach($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['css'] as $f)
				{
					$f = str_replace('|static', '', $f);
					$file = \PCT_THEMER_PATH.'/assets/'.$objRoot->pct_theme.'/css/'.$f;
					if( \file_exists($rootDir.'/'.$file) )
					{
						$objCombiner->add($file);
					}
				}
				$objTemplate->pct_layout_css = trim($objCombiner->getCombinedFile());
			}
			// single file
			else
			{
				$f = str_replace('|static', '', implode('', $GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['css']));
				$file = \PCT_THEMER_PATH.'/assets/'.$objRoot->pct_theme.'/css/'.$f;
				if( \file_exists($rootDir.'/'.$file) )
				{
					$objTemplate->pct_layout_css = $file;
				}
			}
		}
		
		//-- apply scripts
		
		if( \is_array($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['scripts']) === false )
		{
			$GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['scripts'] = array();
		}

		// combine more than one file
		if( !empty($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['scripts']) )
		{
			if( count($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['scripts']) > 1 )
			{
				$objCombiner = new \Contao\Combiner(); 
				foreach($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['scripts'] as $f)
				{
					$f = str_replace('|static', '', $f);
					$file = \PCT_THEMER_PATH.'/assets/'.$objRoot->pct_theme.'/scripts/'.$f;
					if( \file_exists($rootDir.'/'.$file) )
					{
						$objCombiner->add($file);
					}
				}
				$objTemplate->pct_layout_js = trim($objCombiner->getCombinedFile());
			}
			// single file
			else
			{
				$f = str_replace('|static', '', implode('', $GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['scripts']));
				$file = \PCT_THEMER_PATH.'/assets/'.$objRoot->pct_theme.'/scripts/'.$f;
				if( \file_exists($rootDir.'/'.$file) )
				{
					$objTemplate->pct_layout_js = $file;
				}
			}
		}
	}
	
	
	/**
	 * Add theme fonts to the page layout
	 * @param object
	 * @param object
	 * called from: getPageLayout Hook
	 */
	public function addThemeFonts($objPage, $objLayout)
	{
		$objRoot = \Contao\PageModel::findByPk($objPage->rootId);
		if(strlen($objRoot->pct_theme) < 1 || !is_array($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]))
		{
			return;
		}
		
		if( isset($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['googlefonts']) && !empty($GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]) )
		{
			$arrFonts = explode('|', $objLayout->webfonts);
			$arrFonts = array_unique( array_merge($arrFonts,$GLOBALS['PCT_THEMER']['THEMES'][$objRoot->pct_theme]['googlefonts']) );
			$objLayout->webfonts = implode('|', $arrFonts);
		}
	}
}