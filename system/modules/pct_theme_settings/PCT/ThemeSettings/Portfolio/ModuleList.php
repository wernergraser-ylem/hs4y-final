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
namespace PCT\ThemeSettings\Portfolio;

/**
 * Imports
 */
use Contao\ModuleNewsList as ModuleNewsList;


/**
 * Class file
 * ModuleList
 */
class ModuleList extends ModuleNewsList
{
	/**
	 * The Template
	 * @var string
	 */
	protected $strTemplate = 'mod_portfoliolist';
	
	
	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)	)
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . strtoupper($GLOBALS['TL_LANG']['FMD'][$this->type][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if( empty($this->customTpl) === false )
		{
			$this->strTemplate = $this->customTpl;
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		parent::compile();

		$this->Template->portfolioID = 'portfoliolist_'.$this->id;	
	}
}