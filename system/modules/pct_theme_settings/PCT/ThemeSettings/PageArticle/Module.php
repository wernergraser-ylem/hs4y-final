<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2019
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_theme_settings
 * @link  http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\ThemeSettings\PageArticle;


/**
 * Class file
 * Module
 */
class Module extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_pagearticle';


	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)	)
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD']['pagearticle'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		global $objPage;
		
		// article
		$intArticle = 0;
		$intArticle_top = 0;
		if( (boolean)$objPage->addArticle === false )
		{
			$arrSources = array();
			$arrSources_top = array();

			$objParents = \Contao\PageModel::findParentsById($objPage->id);
			if($objParents !== null)
			{
				$intLevel = (int)$this->showLevel;
				foreach($objParents as $i => $pageModel)
				{
					// stop level out of scope or no image selected
					if( ($i >= $intLevel && $intLevel > 0) || (boolean)$pageModel->addArticle === false )
					{
						continue;
					}
				
					// collect article resources
					$arrSources[] = $pageModel->article;
					$arrSources_top[] = $pageModel->article_top;
				}
			}
				
			$arrSources = array_reverse( array_filter($arrSources) );
			$i = count($arrSources) - 1;
			$intArticle = $arrSources[$i] ?? 0;

			$arrSources_top = array_reverse( array_filter($arrSources_top) );
			$i = count($arrSources_top) - 1;
			$intArticle_top = $arrSources_top[$i] ?? 0;
		}
		else
		{
			$intArticle = $objPage->article;
			$intArticle_top = $objPage->article_top;
		}
		
		$this->Template->hasArticle = false;

		$this->Template->hasArticle_footer = false;
		$this->Template->hasArticle_top = false;

		if( (int)$intArticle > 0 )
		{
			$this->Template->hasArticle = true;
			$this->Template->hasArticle_footer = true;
			$this->Template->article = $intArticle;
		}

		if( (int)$intArticle_top > 0 )
		{
			$this->Template->hasArticle = true;
			$this->Template->hasArticle_top = true;
			$this->Template->article_top = $intArticle_top;
		}

		$this->article = $intArticle;
		$this->article_top = $intArticle_top;
		
		// page object to template
		$this->Template->Page = $objPage;
	}
}