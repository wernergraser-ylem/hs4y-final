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

use Contao\StringUtil;

/**
 * Class file
 */
class ContentRevolutionSliderText extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_revolutionslider_text';

	/**
	 * Display wildcard
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			$this->Template = new \Contao\BackendTemplate('be_wildcard');
			$this->Template->wildcard = '### REVOLUTION SLIDER TEXT ###'.($this->text ? '<p>'.$this->text.'</p>' : '');
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
		if($this->revolutionslider_text_bold)
		{
			$arrClass[] = 'bold';
		}
		if($this->revolutionslider_text_invertcolor)
		{
			$arrClass[] = 'invertcolor';
		}
		if($this->revolutionslider_text_italic)
		{
			$arrClass[] = 'italic';
		}
		// parallax
		if( $this->revolutionslider_parallax )
		{
			$arrClass[] = 'rs-parallaxlevel-'.$this->revolutionslider_parallax;
		}
		
		$arrCssID[1] = trim(implode(' ', array_unique($arrClass)));
		$this->cssID = $arrCssID;
		
		// fontsize
		$arrFontSize = StringUtil::deserialize($this->revolutionslider_text_fontsize);
		if( !\is_array($arrFontSize) )
		{
			$arrFontSize = \explode(',',$arrFontSize);
		}

		$arrStyles = array
		(
			'font-size'	=> $arrFontSize[0].'px' ?: 'inherit', 
		);
		
		$this->Template->styles = $this->prepareStyles($arrStyles);
	}
	
	
	/**
	 * Generate the inline style string
	 * @param array
	 * @return string
	 */
	protected function prepareStyles($arrStyles)
	{
		if(empty($arrStyles))
		{
			return '';
		}
		
		$strReturn = '';
		foreach($arrStyles as $k => $v)
		{
			$strReturn .= $k.':'.$v.';';
		}
		$strReturn = substr($strReturn,0,-1);
		
		return $strReturn;
	}
}