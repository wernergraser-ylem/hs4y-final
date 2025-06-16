<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

namespace Contao\PCT;

/**
 * Class file
 * ContentElementSet
 */
class ContentElementSet extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_pct_contentelementset';
	
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			$lable = $this->alt ?: $this->type;
			if( isset($GLOBALS['TL_LANG']['CONTENTELEMENTSETS'][$this->alt]) && strlen($GLOBALS['TL_LANG']['CONTENTELEMENTSETS'][$this->alt]) > 0)
			{
				$lable = $GLOBALS['TL_LANG']['CONTENTELEMENTSETS'][$this->alt];
			}
			
			$strReturn = '<p class="tl_small">'.$lable.'</p>';
			if ($this->headline != '')
			{
				$strReturn .= '<p><'. $this->hl .'>'. $this->headline .'</'. $this->hl .'></p>';
			}
			return $strReturn;
		}
		
		return parent::generate();
	}
	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		$arrCssId = \Contao\StringUtil::deserialize($this->cssID);
		
		if( isset($arrCssId[1]) && is_array($arrCssId) )
		{
			$arrCssId[1] .= ' '.$this->alt;	
		}
		
		if($this->type == 'pct_contentelementset_start')
		{
			$this->Template->isStart = true;
			
		}
		else if($this->type == 'pct_contentelementset_stop')
		{
			$this->Template->isStop = true;
		}
		
		$this->cssID = $arrCssId;
	}

}