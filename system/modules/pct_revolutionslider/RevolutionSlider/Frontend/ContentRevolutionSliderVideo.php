<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  revolutionslider
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace RevolutionSlider\Frontend;

/**
 * Imports
 */
use Contao\FilesModel;
use Contao\StringUtil;

/**
 * Class file
 */
class ContentRevolutionSliderVideo extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_revolutionslider_video';

	/**
	 * Display wildcard
	 */
	public function generate()
	{
		if($this->ptable == 'tl_article')
		{
			$this->isStandalone = true;
		}
		
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			$arrSize = StringUtil::deserialize($this->revolutionslider_video_size) ;
			if( !isset($arrSize[0]) )
			{
				$arrSize[0] = 0;
			}
			if( !isset($arrSize[1]) )
			{
				$arrSize[1] = 0;
			}
			
			// display video sources
			$strInfo = '<p class="tl_gray">W:'.$arrSize[0] .' H:'.$arrSize[1] .'</p>';
			
			if($this->revolutionslider_videoType == 'external')
			{
				$strInfo .= '<p>'.$this->url.'</p>';
			}
			else if($this->revolutionslider_videoType == 'local' && strlen($this->multiSRC) > 0)
			{
				$strInfo .= '<p>'.FilesModel::findByUuid( $this->multiSRC )->path.'</p>';
			}

			$this->Template = new \Contao\BackendTemplate('be_wildcard');
			$this->Template->wildcard = $strInfo;
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
		$arrCssID = StringUtil::deserialize($this->cssID);
		$arrClass = explode(' ', $arrCssID[1]);
		
		$this->Template = new \Contao\FrontendTemplate($this->strTemplate);
		$this->Template->setData($this->arrData);
		
		$arrSize = StringUtil::deserialize($this->revolutionslider_video_size);
		$arrSize[0] = \str_replace(array(' ','px','em','rm'),'',$arrSize[0]);
		$arrSize[1] = \str_replace(array(' ','px','em','rm'),'',$arrSize[1]);

		$this->Template->startWidth = $arrSize[0];
		$this->Template->startHeight = $arrSize[1];
		$this->Template->selector = 'revolutionslidervideo'.$this->id;

		$arrAttributes = array();
		$arrSources = array();
		if($this->revolutionslider_videoType == 'external' && strlen($this->url) > 0)
		{
			$src = $this->url;
			
			$parse_url= parse_url($src);
			$preg = preg_match("/&(.*?)\&/", str_replace('.','&',$parse_url['host']) ,$match);
			$host = $match[1];
			
			$vidId = end( array_filter( \explode('/',$parse_url['path']) ) );
			// set video id
			$this->Template->videoId = $vidId;
			switch($host)
			{
				case 'youtube':
				case 'youtu': // youtu.be
				case 'youtube-nocookie':
					$this->Template->source = 'youtube';
					#$src = $this->addToAnyUrl($src,'enablejsapi=1');
					break;
				case 'vimeo':
					$this->Template->source = 'vimeo';
					break;
				default:
					$this->Template->source = 'custom';
					break;
			}

			$iframe_params = array();
			if($this->revolutionslider_video_fullscreen || $this->isStandalone)
			{
				$iframe_params[] = 'allowfullscreen';
			}

			if($this->revolutionslider_data_autoplay)
			{
				$iframe_params[] = 'autoplay';
				$src = $this->addToAnyUrl($src,'autoplay=1');
				$src = $this->addToAnyUrl($src,'mute=1');
			}
			
			$this->Template->videoparameters = $parse_url['query'] ?? '';
			$this->Template->iframe_params = $iframe_params;
			$this->Template->iframe =  '<iframe src="'.$src.'" width="'.$arrSize[0].'" height="'.$arrSize[1].'" '.implode(' ', $iframe_params).'></iframe>';
		}
		// local HTML5 video files
		else if($this->revolutionslider_videoType == 'local' && strlen($this->multiSRC) > 0)
		{
			$this->Template->source = 'local';
			$this->Template->videomp4 = FilesModel::findByUuid( $this->multiSRC )->path;
		}
		else
		{
			// HOOK here?
		}
		
		// poster
		if($this->singleSRC)
		{
			$this->Template->poster = FilesModel::findByPk($this->singleSRC)->path;
		}
		
		// aspect
		if( $this->revolutionslider_video_aspect )
		{
			$this->Template->aspectratio = $this->revolutionslider_video_aspect;
			$this->Template->aspect = \str_replace(':','',$this->revolutionslider_video_aspect);
			$arrClass[] = 'responsive ratio-'.$this->Template->aspect ;
		}

		if( empty( array_filter($arrSize) ) === true || ($arrSize[0] == '100%' && $arrSize[1] == '100%') )
		{
			$this->Template->forceFullWidth = true;
			$arrClass[] = 'fullscreenvideo';
		}
		
		// parallax
		if( $this->revolutionslider_parallax )
		{
			$arrClass[] = 'rs-parallaxlevel-'.$this->revolutionslider_parallax;
		}
		
		$arrCssID[1] = implode(' ', array_filter(array_unique($arrClass),'strlen') );
		
		$this->cssID = $arrCssID;
		$this->Template->class = $arrCssID[1];
		$this->Template->attributes = trim(implode(' ', $arrAttributes));
		$this->Template->files = $arrSources;
		$this->Template->nextslideatend = (boolean)$this->revolutionslider_data_nextslideatend;
		$this->Template->controls = (boolean)$this->revolutionslider_video_controls;
		$this->Template->loop = (boolean)$this->revolutionslider_video_loop;
		$this->Template->no_video_support = $GLOBALS['TL_LANG']['REVOLUTIONSLIDER']['browser_does_not_support_video'] ? $GLOBALS['TL_LANG']['REVOLUTIONSLIDER']['browser_does_not_support_video'] : 'Your browser does not support the video tag.';
		$this->Template->boxed = (boolean)$this->revolutionslider_video_boxed;
		$this->Template->width = $arrSize[0];
		$this->Template->height = $arrSize[1];
		$this->Template->autoplay = (boolean)$this->revolutionslider_data_autoplay;
		
		return $this->Template->parse();
	}
	
	
	/**
	 * Add param to url string
	 * @param string	Base url
	 * @param string	Query string
	 * @return string
	 */
	protected function addToAnyUrl($strUrl, $strQuery='')
	{
		$arrUrl = explode('?',StringUtil::decodeEntities($strUrl));
		$strBase = $arrUrl[0];
		
		$arrParams = explode('?',StringUtil::decodeEntities($strQuery));
		
		$arrQuery = array();
		$arrReturn = array();
		
		if($arrUrl[1])
		{
			$arrQuery = explode('&',$arrUrl[1]);
		}
		
		foreach($arrParams as $param)
		{
			$tmp = explode('=',$param);
			$pk = $tmp[0];
			$pv = $tmp[1];
			// add the parameter
			$arrReturn[$pk] = $pv;
			
			if(empty($arrQuery)) {continue;}
			
			foreach($arrQuery as $param)
			{
				$tmp = explode('=',$param);
				$qk = $tmp[0];
				$qv = $tmp[1];
				
				// overwrite existing params
				if($qk == $pk)
				{
					$qv = $pv;
				}
				$arrReturn[$qk] = $qv;
			}
		}
		
		// build url and return
		$strReturn = $strBase . '?';
		foreach($arrReturn as $k => $v)
		{
			$strReturn .= $k."=".$v."&";
		}
		$strReturn = substr($strReturn,0,-1);
		return $strReturn;
	}
	
	
}