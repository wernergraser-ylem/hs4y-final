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

use Contao\ArticleModel;
use Contao\PageModel;
use Contao\System;
use PCT\License;

/**
 * Class file
 * TablePage
 */
class TablePage extends \Contao\Backend
{
	/**
	 * Modify the DCA
	 * @param object $objDC 
	 * @return void 
	 */
	public function modifyDCA($objDC)
	{
		// favicons template selection
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['favicon']['eval']['hideInput'] = true;
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['favicon']['eval']['tl_class'] = ' w50 hidden';
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['robotsTxt']['eval']['tl_class'] = ' clr';
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['hide']['eval']['tl_class'] = ' w50 clr';
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['maintenanceMode']['eval']['tl_class'] = ' clr';
	}


	/**
	 * Add indicator when page has a page-image or page-article selected
	 *
	 * @param array
	 * @param string
	 * @param object
	 * @param string
	 * @param boolean
	 * @param boolean
	 * @return string
	 * 
	 * called from list_label callback
	 */
	public function getLabel($arrRow, $label, $dc=null, $imageAttribute='', $blnReturnImage=false, $blnProtected=false)
	{
		$arrHelperCallback = $GLOBALS['PCT_THEME_SETTINGS']['list_label_callback']['tl_page'];
		
		$objHelper = new $arrHelperCallback[0];
		
		if( isset($arrRow['addImage']) && !empty($arrRow['addImage']) && !empty($arrRow['singleSRC']) )
		{
			$label .= ' <span class="tl_gray" style="font-size:85%">['.$GLOBALS['TL_LANG']['FMD']['pageimage'][0].']</span>';
		}
		#if( $arrRow['addArticle'] && !empty($arrRow['article']) )
		#{
		#	$label .= ' <span class="tl_gray" style="font-size:85%">['.$GLOBALS['TL_LANG']['FMD']['pagearticle'][0].']</span>';
		#}
		
		return $objHelper->{$arrHelperCallback[1]}($arrRow, $label, $dc, $imageAttribute, $blnReturnImage, $blnProtected);
	}

	
	/**
	 * Return the theme helper classes
	 * @param object
	 * @return array
	 */
	public function getThemeHelperClasses($objDC=null)
	{
		$arrReturn = array();
		if( isset($GLOBALS['PCT_THEME_SETTINGS']['helper_classes'][$objDC->table]) && !empty($GLOBALS['PCT_THEME_SETTINGS']['helper_classes'][$objDC->table]) )
		{
			$arrReturn = $GLOBALS['PCT_THEME_SETTINGS']['helper_classes'][$objDC->table];
		}

		return $arrReturn;
	}


	/**
	 * Return all articles in all root pages
	 * @param object
	 * @return array
	 */
	public function getArticles()
	{
		$objArticle = \Contao\ArticleModel::findAll();
		if( $objArticle === null )
		{
			return array();
		}
		
		$arrReturn = array();
		while($objArticle->next())
		{
			$page = PageModel::findByPk( $objArticle->pid );
			$key = $page->title . ' (ID ' . $objArticle->pid . ')';
			$arrReturn[$key][$objArticle->id] = $objArticle->title . ' (' . ($GLOBALS['TL_LANG']['COLS'][$objArticle->inColumn] ?? $objArticle->inColumn) . ', ID ' . $objArticle->id . ')';
		}
		
		return $arrReturn;
	}


	/**
	 * Load the first article from page footer in the current root page when tl_page.article is empty
	 * Effect: tl_page.article
	 * @param object
	 */
	public function loadFirstArticleInPageFooter( $varValue, $objDC )
	{
		if( empty($varValue) === false )
		{
			return $varValue;
		}

		$objPage = PageModel::findBy( array('pid=? AND title=?'), array($objDC->id,'Footer') );
		if( $objPage === null )
		{
			return array();
		}

		$objArticle = ArticleModel::findByPid( $objPage->id,array('limit'=>1,'order' => ArticleModel::getTable().'.sorting' ) );
		if( $objArticle !== null )
		{
			$varValue = $objArticle->id;
		}
		
		return $varValue;
	}


	/**
	 * Load the first article from page footer in the current root page when tl_page.article is empty
	 * Effect: tl_page.article
	 * @param object
	 */
	public function loadFirstArticleInPageTopBar( $varValue, $objDC )
	{
		if( empty($varValue) === false )
		{
			return $varValue;
		}

		$objPage = PageModel::findBy( array('pid=? AND title=?'), array($objDC->id,'TopBar') );
		if( $objPage === null )
		{
			return array();
		}

		$objArticle = ArticleModel::findByPid( $objPage->id,array('limit'=>1,'order' => ArticleModel::getTable().'.sorting' ) );
		if( $objArticle !== null )
		{
			$varValue = $objArticle->id;
		}
		
		return $varValue;
	}


	/**
	 * Filter root, rootFallback pages to non pct_theme pages when license is locked
	 * @param mixed $objDC 
	 * @return void 
	 */
	public function filterPagesOnLockdown($objDC)
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) && License::isLocked() === true ) 
		{
			$objPCT_Roots = PageModel::findBy(array('(type=? OR type=?) && pct_theme!=""'),array('root','rootfallback') );
			if( $objPCT_Roots === null )
			{
				return;
			}

			$objRoots = PageModel::findBy(array('(type=? OR type=?) && id NOT IN('.\implode( ',',$objPCT_Roots->fetchEach('id') ).')'),array('root','rootfallback') );
			if( $objRoots !== null )
			{
				$GLOBALS['TL_DCA'][$objDC->table]['list']['sorting']['root'] = $objRoots->fetchEach('id');
			}
		}
	}
}