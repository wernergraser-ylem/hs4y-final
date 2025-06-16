<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) Leo Feyer
 *
 * @copyright Tim Gatzky 2020
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\PrivacyManager;


/**
 * Class file
 * ModuleOptOut
 */
class ModuleOptOut extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_auto_optout';

	/**
	 * The Session and cookie name
	 * @var string
	 */
	protected $strSession = 'user_privacy_settings';
	
	
	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD']['privacy_out'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		return parent::generate();
	}

	
	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function compile()
	{
		global $objPage;
		
		$objJumpTo = null;
		if($this->jumpTo)
		{
			$objJumpTo = \Contao\PageModel::findByPk($this->jumpTo);
		}
		
		$this->Template->session_name = $this->strSession;
		
		$strRedirect = '';
		
		// Set last page visited
		if ($this->redirectBack)
		{
			$strRedirect = $this->getReferer();
		}
		// Redirect to jumpTo page
		elseif ($objJumpTo !== null && $objJumpTo->id != $objPage->id)
		{
			/** @var \PageModel $objTarget */
			$objRouter = \Contao\System::getContainer()->get('contao.routing.content_url_generator');
			$strRedirect = $objRouter->generate($objJumpTo);
		}
		
		// check against url
		if( $strRedirect == \Contao\Environment::get('request') )
		{
			$strRedirect = '';
		}
		
		if($strRedirect)
		{
			$this->Template->redirect = $strRedirect;
		}
	}
}