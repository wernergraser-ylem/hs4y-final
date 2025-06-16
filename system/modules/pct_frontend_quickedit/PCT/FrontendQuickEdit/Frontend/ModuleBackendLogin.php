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
namespace PCT\FrontendQuickEdit\Frontend;

/**
 * Imports
 */
use Contao\Environment;
use Contao\PageModel;
use Contao\System;
use PCT\FrontendQuickEdit\Controller;

/**
 * Class file
 * BackendLogin
 */
class ModuleBackendLogin extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_backendlogin';


	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ($request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD']['backendLogin'][0]) . ' ###';
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
		$objRouter = System::getContainer()->get('contao.routing.content_url_generator');

		$this->Template->href = Environment::get('base').'contao/login';
		$this->Template->lb_href = Environment::get('base').'contao/login?'.\http_build_query( array('fqe'=>1,'rt'=>Controller::request_token(),'page'=>$objPage->id) );
		$this->Template->selector = 'mod_'.$this->type.'_'.$this->id;
		if( $this->jumpTo )
		{
			$this->Template->redirect = Environment::get('base'). $objRouter(PageModel::findById($this->jumpTo))->generate();
		}

		if( System::getContainer()->get('contao.security.token_checker')->hasBackendUser() === true )
		{
			$this->Template->redirect = Environment::get('base').$objRouter(PageModel::findById($objPage->id))->generate();
			$this->Template->href = Environment::get('base').'contao/logout';
			$this->Template->lb_href = Environment::get('base').'contao/logout';
		}

	}
}