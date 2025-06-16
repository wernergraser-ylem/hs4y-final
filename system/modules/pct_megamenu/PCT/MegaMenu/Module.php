<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_megamenu
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\MegaMenu;

/**
 * Imports
 */
use Contao\ArticleModel;
use Contao\BackendTemplate;
use Contao\Database;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\System;
use stdClass;

/**
 * Class file
 * ModuleMegaMenu
 */
class Module extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_pct_megamenu';


	/**
	 * Display wildcard
	 */
	public function generate()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) ) 
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			$objTemplate->wildcard = '### ' .strtoupper($GLOBALS['TL_LANG']['FMD']['pct_megamenu'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;		
			return $objTemplate->parse();
		}

		return parent::generate();	
	}


	/**
	 * Generate the module
	 * @return string
	 */
	protected function compile()
	{
		global $objPage;
		
		$arrRoot = array($objPage->rootId);
		if ($this->defineRoot && $this->rootPage > 0)
		{
			$arrRoot = array($this->rootPage);
		}
		
		$tl_page = PageModel::getTable();
		
		$arrIds = array_merge($arrRoot, Database::getInstance()->getChildRecords($arrRoot,$tl_page,true) ?: array() );
		$objPages = PageModel::findBy(array( $tl_page.".type='pct_megamenu' AND ".$tl_page.".published=1". (!empty($arrIds) ? ' AND '.$tl_page.'.id IN('.\implode(',',$arrIds).')' : '')), array() );
		if( $objPages === null )
		{
			$this->Template->empty = true;
		}

		$arrItems = array();
		$intTotal = 0;
		if( $objPages !== null )
		{
			$intTotal = $objPages->count();
			foreach( $objPages as $i => $objPageModel )
			{
				$arrClass = array('item','item_'.$i,'page_'.$objPageModel->id, StringUtil::standardize($objPageModel->alias));
				($i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd');
				($i == 0 ? $arrClass[] = 'first' : '');
				($i == $intTotal - 1 ? $arrClass[] = 'last' : '');

				if( $objPage->id == $objPageModel->id )
				{
					$arrClass[] = 'is-current-page';
				}

				// Articles
				$objArticles = ArticleModel::findPublishedByPidAndColumn($objPageModel->id,'main');
				
				$arrItems[] = array
				(
					'id'	=> $objPageModel->id,
					'class' => \implode(' ',$arrClass),
					'page'	=> $objPageModel,
					'articles' => $objArticles ?: new stdClass,
				);
			}
		}
		
		$this->Template->total = $intTotal;
		$this->Template->items = $arrItems;
		$this->Template->pages = $objPages;
	}
}