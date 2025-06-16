<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
 * @link		http://contao.org
 */

/**
 * Namespaces
 */
namespace RevolutionSlider\Frontend;

use Contao\StringUtil;

/**
 * Class file
 * ContentRevolutionSlider
 */
class ContentRevolutionSlider extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_revolutionslider';
	
	/**
	 * Display wildcard
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			$objSlider = \RevolutionSlider\Models\Slider::findById($this->revolutionslider);		
		
			$this->Template = new \Contao\BackendTemplate('be_wildcard');
			$this->Template->wildcard = '### REVOLUTION SLIDER ###'. '<p class="tl_gray">'.$objSlider->title.'</p>';;
			$this->Template->title = $this->headline;
			
			return $this->Template->parse();
		}
		
		return parent::generate();
	}
	
	/**
	 * Generate the module
	 */
	protected function compile()
	{
		// create new slider instance and generate it
		$objSlider = \RevolutionSlider\Core\Factory::findById($this->revolutionslider);		
		
		// return if slider is obsolete
		if(!$objSlider)
		{
			return;
		}
		
		$objSlider->set('arrParent',$this->arrData);
		$arrCssID = StringUtil::deserialize($objSlider->get('cssID'));
		
		$arrClass = array('rs-container');
		if(strlen($arrCssID[1]) > 0)
		{
			$arrClass = array_merge($arrClass,explode(' ',$arrCssID[1]));
		}
		
		if(!$GLOBALS['REVOLUTIONSLIDER']['isBundledVersion'])
		{
			$arrClass[] = $objSlider->get('sliderStyle');
		}
				
		if(count($arrClass) > 0)
		{
			$this->Template->sliderClass = trim(implode(' ', $arrClass));
		}
		
		$this->Template->slider = $objSlider->render();
	}


}