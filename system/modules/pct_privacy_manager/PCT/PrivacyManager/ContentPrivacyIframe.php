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
 * Imports
 */
use \Contao\StringUtil;

/**
 * Class file
 * ContentPrivacyIframe
 */
class ContentPrivacyIframe extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_privacy_iframe';

	
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

			$objTemplate->wildcard = $this->privacy_url;
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			
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
		$arrSize = StringUtil::deserialize( $this->privacy_size ) ?? array();
		$this->Template->width = $arrSize[0] ?? '';
		$this->Template->height = $arrSize[1] ?? '';
		$this->Template->privacy = $this->privacy_level;
	}
}