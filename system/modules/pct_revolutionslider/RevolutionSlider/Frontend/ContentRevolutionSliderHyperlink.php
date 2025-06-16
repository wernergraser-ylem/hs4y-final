<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package  	pct_revolutionslider
 * @link 		http://contao.org
 */

/**
 * Namespace
 */
namespace RevolutionSlider\Frontend;


/**
 * Class file
 */
class ContentRevolutionSliderHyperlink extends \Contao\ContentHyperlink
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_revolutionslider_hyperlink';

	/**
	 * Display wildcard
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			$this->Template = new \Contao\BackendTemplate('be_wildcard');
			$this->Template->wildcard = '### REVOLUTION SLIDER HYPERLINK ###'.($this->url ? '<p>'.$this->url.'</p>' : '');
			$this->Template->title = $this->headline;
			
			return $this->Template->parse();
		}
		
		if(strlen($this->customTpl) > 0 && $this->customTpl != $this->strTemplate)
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
		$arrCssID = $this->cssID;
		$arrClass = explode(' ', $arrCssID[1]);
		$arrClass[] = $this->strTemplate;
		$arrClass[] = 'caption';
		$arrClass[] = 'tp-caption';
		// parallax
		if( $this->revolutionslider_parallax )
		{
			$arrClass[] = 'rs-parallaxlevel-'.$this->revolutionslider_parallax;
		}
		$arrCssID[1] = trim(implode(' ', array_unique($arrClass)));
		$this->cssID = $arrCssID;
		
		return parent::compile();
	}
}