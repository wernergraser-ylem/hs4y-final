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
 * Namespace
 */
namespace RevolutionSlider\Core;

/**
 * Imports
 */
use RevolutionSlider\Core\SlideFactory as SlideFactory;
use Contao\FrontendTemplate;
use Contao\FilesModel;
use Contao\Picture;
use Contao\Controller;
use Contao\StringUtil;
use Contao\System;

/**
 * Class file
 * RevolutionSlider Core Class
 * Provide methods to initialize a slider and add necessary scripts to the page
 */
class RevolutionSlider extends Controller
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'revoslider_default';
	
	/**
	 * Data Array
	 * @var array
	 */
	protected $arrData = array();
	
	/**
	 * Store information about parent element (cte, mod, ...)
	 * @var array
	 */
	protected $arrParent = array();

	/**
	 * Slides array
	 * @var array
	 */
	protected $arrSlides = array();

	/**
	 * Create new instance
	 * @param array
	 */
	public function __construct($arrData=array())
	{
		if(!empty($arrData))
		{
			$this->arrData = $arrData;
		}
	}

	/**
	 * Set Data
	 * @param array
	 */
	public function setData($arrData)
	{
		$this->arrData = $arrData;
	}

	/**
	 * Getters
	 * @param string
	 */
	public function get($strKey)
	{
		if(isset($this->$strKey))
		{
			return $this->$strKey;
		}
		else if(array_key_exists($strKey, $this->arrData))
		{
			return $this->arrData[$strKey];
		}
		else
		{
			return null;
		}	
	}
	
	/**
	 * Setters
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		if(isset($this->$strKey))
		{
			$this->$strKey = $varValue;
		}
		else if(array_key_exists($strKey, $this->arrData))
		{
			$this->arrData[$strKey] = $varValue;
		}
		else
		{
			return null;
		}
	}
	
	/**
	 * Generate a slider and return html and javascript
	 * @return string	html
	 */
	public function render()
	{
		global $objPage;
		$strLanguage = str_replace('-','_',$objPage->language);
		
		// slider template
		if($this->arrData['sliderTemplate'] != $this->strTemplate)
		{
			$this->strTemplate = $this->arrData['sliderTemplate'];
		}
		$objTemplate = new FrontendTemplate($this->strTemplate);
		$objTemplate->setData($this->arrData);
		
		$arrCssId = StringUtil::deserialize($this->get('cssID'));
		$arrClass = explode(' ', $arrCssId[1]);
		$arrClass[] = $this->get('sliderStyle');
		$arrClass[] = 'tp-banner';
		
		if(in_array($this->get('sliderStyle'), array('responsive','boxed')))
		{
			$arrClass[] = 'fullwidthbanner-container';
		}
		else if(in_array($this->get('sliderStyle'), array('fullscreen')))
		{
			$arrClass[] = 'fullscreen-container';
		}
		
		$arrParent = $this->get('arrParent');
		
		//-- generate an unique css class or use ID as jquery selector
		$strSelector = 'my_revolutionslider_'.$this->get('id');
		
		if($arrParent['id'] > 0)
		{
			$strSelector = 'my_revolutionslider_'.$arrParent['id'];
		}
		
		if(strlen($arrCssId[0]) > 0)
		{
			$objTemplate->sliderID = 'id="'.$arrCssId[0].'"';
			$strSelector = '#'.$arrCssId[0];
		}
		else
		{
			$arrClass[] = $strSelector;
			$strSelector = '.'.$strSelector;
		}
		
		// use css id from content elemenet
		if($arrParent['cssID'])
		{
			$arrCssId = StringUtil::deserialize($arrParent['cssID']);
			if(strlen($arrCssId[0]) > 0)
			{
				$objTemplate->sliderID = 'id="revolutionslider_'.$arrCssId[0].'"';
				$strSelector = '#revolutionslider_'.$arrCssId[0];
			}
		}
		//--
		
		//-- slides
		$arrMediaQueries = array();
		$arrSlides = array();
		if(!empty($this->arrSlides) && is_array($this->arrSlides))
		{
			foreach($this->arrSlides as $i => $objSlide)
			{
				$arrRow = $objSlide->get('arrData');
				
				// classes
				$class =array('slide','slide_'.$i);
				$i%2 == 0 ? $class[] = 'even' : $arrClass[] = 'odd';
				if($i == 0) $class[] = 'first';
				if($i == count($this->arrSlides) - 1) $class[] = 'last';
				
				$cssID = StringUtil::deserialize($objSlide->get('cssID'));
				$class = array_merge(explode(' ', $cssID[1]),$class);
				$image = '';

				// slide <li> attributes
				$arrAttributes = array();
				if(count($objSlide->get('arrAttributes')) > 0)
				{
					foreach($objSlide->get('arrAttributes') as $attr => $value)
					{
						$value = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($value);
						$arrAttributes[] = $attr.'="'.$value.'"';
					}
				}
				
				//-- content	
				$arrContent = $objSlide->get('arrContent');
				
				// fallback
				if(!$objSlide->get('background'))
				{
					$objSlide->set('background','image');
				}
				
				// inject main slide image on first position
				$arrSlides[$i]['source'] = '';
				if($objSlide->get('background') == 'image')
				{
					unset($arrAttributes['bg-color']);

					$objFile = FilesModel::findByPk($objSlide->get('singleSRC'));
					if( $objFile !== null )
					{
						$arrMeta = StringUtil::deserialize($objFile->meta);
						$size = StringUtil::deserialize($objSlide->get('size'));
						$src = $objFile->path;
						
						$projectDir = System::getContainer()->getParameter('kernel.project_dir');
						$image = System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, $size)->getUrl($projectDir);
						
						$title = $arrMeta[$strLanguage]['title'] ?? '';
						if( isset($arrRow['lazyload']) && $arrRow['lazyload'])
						{
							$dummy = REVOLUTIONSLIDER_PATH.'/assets/img/dummy.png';
							$dummy = System::getContainer()->get('contao.insert_tag.parser')->replace('{{image::'.$dummy.'?class=slideimage}}');

							$image = str_replace('>',' data-lazyload="'.$image.'" title="'.$title.'">', $dummy);
						}
						else
						{
							if(strlen($image) > 0)
							{
								$image = \Contao\Image::getHtml($image,$title,'title="'.$title.'"');
							}
						}
					}
					
					$bgattr = array
					(
						'data-bgfit' 		=> $objSlide->get('data_bgfit') ? $objSlide->get('data_bgfit') : 'cover',
						'data-bgposition' 	=> $objSlide->get('data_bgposition') ? $objSlide->get('data_bgposition') : 'center center',
						'data-bgrepeat' 	=> $objSlide->get('data_bgrepeat') ? 'repeat' : 'no-repeat',
					);
					
					// add ken burns options
					if($objSlide->get('kenburns'))
					{
						$bgattr['data-kenburns'] = 'on';
						$bgattr['data-bgparallax'] = "off";
						$bgattr['class'] = "rev-slidebg";
						$data_scale = StringUtil::deserialize($objSlide->get('data_bgscale'));
			
						$bgattr['data-bgposition'] = $objSlide->get('data_bgposition');
						$bgattr['data-bgpositionend'] = $objSlide->get('data_bgposition_OUT');
						$bgattr['data-bgfit'] = $bgattr['data-scalestart'] = (strlen($data_scale[0] > 0) ? $data_scale[0] : '100');
						$bgattr['data-bgfitend'] = $bgattr['data-scaleend'] = (strlen($data_scale[1] > 0) ? $data_scale[1] : '100');
						$bgattr['data-duration'] = $objSlide->get('data_duration') * 1000;
						$bgattr['data-ease'] = $objSlide->get('data_ease');
					}
					
					$strbgattr = '';
					foreach($bgattr as $k => $v)
					{
						$strbgattr .= $k.'="'.$v.'" ';
					}
					$strbgattr = substr($strbgattr,0,-1);
					
					$image = str_replace('>',' '.$strbgattr.'>', $image);
				}
				// colored bg
				else if($objSlide->get('background') == 'colored')
				{
					$color = $objSlide->get('data_bgcolor') ? '#'.$objSlide->get('data_bgcolor') : 'transparent';
					$image = '<img src="'.REVOLUTIONSLIDER_PATH.'/assets/img/transparent.png" alt="transparent.png" style="background-color:'.$color.'" data-bgfit="cover" data-bgcolor="'.$color.'" data-bgposition="left top" data-bgrepeat="no-repeat">';
				}
				else if($objSlide->get('background') == 'transparent')
				{
					unset($arrAttributes['bg-color']);
					$image = '<img src="'.REVOLUTIONSLIDER_PATH.'/assets/img/transparent.png" alt="transparent.png" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">';
				}
				// video
				else if( in_array($objSlide->get('background'), array('videomp4','external')) )
				{
					unset($arrAttributes['bg-color']);
					$source = $objSlide->get('background');
					
					$vidId = '';
					if( $objSlide->get('videoURL') && $objSlide->get('background') == 'external' )
					{
						$src = $objSlide->get('videoURL');
						$parse_url= parse_url($src);
						$preg = preg_match("/&(.*?)\&/", str_replace('.','&',$parse_url['host']) ,$match);
						$host = $match[1];
						$vidId = end( array_filter( \explode('/',$parse_url['path']) ) );
						switch($host)
						{
							case 'youtube':
							case 'youtu': // youtu.be
							case 'youtube-nocookie':
								$source = 'youtube';
								break;
							case 'vimeo':
								$source = 'vimeo';
								break;
							default: 
								$source = 'custom';
								break;
						}
					}

					$arrSlides[$i]['source'] = $source;
					$arrSlides[$i]['isVideo'] = true;
					$arrSlides[$i]['videomp4'] = FilesModel::findByPk( $objSlide->get('videoSRC') )->path;
					$arrSlides[$i]['videoId'] = $vidId;
					$arrSlides[$i]['poster'] = FilesModel::findByPk( $objSlide->get('singleSRC') )->path;
					$arrSlides[$i]['nextslideatend'] = (boolean)$objSlide->get('nextslideatend');
					$arrSlides[$i]['loop'] = (boolean)$objSlide->get('loop');
				}

				// responsive images
				if( $objSlide->get('singleSRC') && $objSlide->get('background') == 'image' )
				{
					$class[] = 'rs_mq_image_'.$this->get('id').'_'.$i;
					$objFile = FilesModel::findByPk( $objSlide->get('singleSRC') );
					
					$sources = array();
					if( $objFile !== null )
					{
						$size = \Contao\StringUtil::deserialize( $objSlide->get('size') );
						$container = \Contao\System::getContainer();
						$projectDir = $container->getParameter('kernel.project_dir');
						$staticUrl = $container->get('contao.assets.files_context')->getStaticUrl();
						$objPicture = $container->get('contao.image.preview_factory')->createPreviewPicture($projectDir . '/' . $objFile->path, $size);
						$img = $objPicture->getImg($projectDir, $staticUrl);
						$sources = $objPicture->getSources($projectDir, $staticUrl);
					}
					
					if( !empty($sources) )
					{
						foreach($sources ?: array() as $data)
						{
							if( !isset($data['media']) || strlen($data['media']) < 1 )
							{
								continue;
							}
							$arrMediaQueries[] = '@media ('.$data['media'].') {.rs_mq_image_'.$this->get('id').'_'.$i.' .tp-bgimg {background-image:url("'.$data['src'].'") !important;}}';
						}
					}
				}
				
				// inset main image on first position
				if( empty($image) === false )
				{
					\Contao\ArrayUtil::arrayInsert($arrContent,0,$image);
				}
				
				$arrSlides[$i]['id']			= $objSlide->get('id');
				$arrSlides[$i]['content'] 		= $arrContent;
				$arrSlides[$i]['attributes']	= implode(' ', $arrAttributes);
				$arrSlides[$i]['class']			= implode(' ', array_filter( array_unique($class) ) );
				$arrSlides[$i]['cssID']			= (strlen($cssID[0]) ? 'id="'.$cssID[0].'"' : '');
				$arrSlides[$i]['row']			= $arrRow;
				$arrSlides[$i]['raw']			= $objSlide;
				$arrSlides[$i]['data']			= $arrRow;
			}
		}
		
		// call hook
		if (isset($GLOBALS['RS_HOOKS']['addSlides']) && !empty($GLOBALS['RS_HOOKS']['addSlides']))
		{
			foreach($GLOBALS['RS_HOOKS']['addSlides'] as $callback)
			{
				$arrSlides = \Contao\System::importStatic($callback[0])->{$callback[1]}($arrSlides,$this,$this);
			}
		}

		if(empty($arrSlides))
		{
			$arrClass[] = 'empty';
			// add status messages
			$objTemplate->emptyMsg = $GLOBALS['TL_LANG']['REVOLUTIONSLIDER']['empty'];
			
			return $objTemplate->parse();
		}
		
		$objTemplate->slides = $arrSlides;
		//--
		
		//-- js template
		$objJsTemplate = new FrontendTemplate($this->arrData['jsTemplate']);
		$objJsTemplate->setData($this->arrData);
		$objJsTemplate->selector = $strSelector;
		$objJsTemplate->stopOnHover = (boolean)$this->get('stopOnHover');
		$objJsTemplate->delay = ($this->arrData['delay'] ? $this->arrData['delay'] * 1000 : 0);
		$objJsTemplate->slideCount = count($this->arrSlides);

		$arrSize = StringUtil::deserialize($this->arrData['sliderSize']);
		$objJsTemplate->startWidth = ($arrSize[0] ? $arrSize[0] : 0);
		$objJsTemplate->startHeight = ($arrSize[1] ? $arrSize[1] : 0);
		$objJsTemplate->startWithSlide = ($this->get('startWithSlide') > 0 ? $this->get('startWithSlide') : 0);
		$objJsTemplate->sliderLayout = $this->get('sliderStyle');
		$objJsTemplate->navigationStyle = '';
		$objJsTemplate->arrowStyle = '';

		// modes
		$objJsTemplate->fullscreen = false;
		$objJsTemplate->fullwidth = true;
		switch($this->get('sliderStyle'))
		{
			case 'responsive':
				$objJsTemplate->sliderLayout = 'auto';
				break;
			case 'fullscreen': 
				$objJsTemplate->fullscreen = true;
				$objJsTemplate->fullwidth = false;
				$objJsTemplate->sliderLayout = 'fullscreen';
				break;
			case 'boxed': 
				$objJsTemplate->sliderLayout = 'auto';
				break;
			default:
				break;
		}

		// breakpoint
		$objJsTemplate->breakpoint_mobile = $this->get('sliderBreakPoint') ?: 768; 
		
		// navigation type
		if(!$this->get('addNavigation') || !$this->get('navigationType'))
		{
			$objJsTemplate->navigationType = 'none';
		}
		else
		{
			$tmp = explode('_', $this->get('navigationType'));
			switch($this->get('navigationType'))
			{
				case 'preview1':
				case 'preview2':
				case 'preview3':
				case 'preview4':
					$objJsTemplate->navigationType = 'none';
					$objJsTemplate->navigationStyle = $this->get('navigationType');
					break;
				default:
					$objJsTemplate->navigationType = $tmp[0];
					$objJsTemplate->navigationStyle = $tmp[1];
					break;
			}
		}
		
		// thumbnails
		if($this->get('addThumbs'))
		{
			$arrSize = StringUtil::deserialize($this->get('thumbSize'));
			$objJsTemplate->thumbWidth = ($arrSize[0] ? $arrSize[0] : 0);
			$objJsTemplate->thumbHeight = ($arrSize[1] ? $arrSize[1] : 0);
		}
		
		// arrow navigation
		$objJsTemplate->arrowStyle = '';
		if(!$this->get('addArrows'))
		{
			$objJsTemplate->arrowStyle = 'none';
		}

		//! navigation

		// navigation size
		$arrNaviSize = $GLOBALS['REVOLUTIONSLIDER']['THUMBNAIL_SIZES'] ?? array();
		if (\in_array( $this->get('navigationType'), $GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES']['tabs']) )
		{
			$arrNaviSize = $GLOBALS['REVOLUTIONSLIDER']['THUMBNAIL_SIZES_TABS'] ?? array();
		}
		
		$tmp = StringUtil::deserialize( $this->get('navigationSize') );
		if( empty($tmp) === false )
		{
			if( \is_array($tmp) === false )
			{
				$tmp = \implode(',',$tmp);
			}
			$arrNaviSize[0] = $tmp[0]; 
			$arrNaviSize[1] = $tmp[1];
		}
		unset($tmp);

		if( !isset($arrNaviSize[0]) )
		{
			$arrNaviSize[0] = '';
		}
		if( !isset($arrNaviSize[1]) )
		{
			$arrNaviSize[1] = '';
		}
		
		$objJsTemplate->navigationWidth = $arrNaviSize[0] ?? '';
		$objJsTemplate->navigationHeight = $arrNaviSize[1] ?? '';

		$objJsTemplate->bullets = false;
		$objJsTemplate->thumbs = false;
		$objJsTemplate->tabs = false;
		$objJsTemplate->thumbWidth = '';
		$objJsTemplate->thumbHeight = '';
		
		// bullets
		if (\in_array( $this->get('navigationType'), $GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES']['bullets']) )
		{
			$objJsTemplate->bullets = true;
			$objJsTemplate->navigationStyle = str_replace('bullets_','',$this->get('navigationType'));
		}
		// tabs
		else if (\in_array( $this->get('navigationType'), $GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES']['tabs']) )
		{
			$objJsTemplate->tabs = true;
			$objJsTemplate->navigationStyle = str_replace('tabs_','',$this->get('navigationType'));
			$objJsTemplate->tabsWidth = $arrNaviSize[0];
			$objJsTemplate->tabsHeight = $arrNaviSize[1];
		}
		// thumbs
		else if (\in_array( $this->get('navigationType'), $GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES']['thumbs']) )
		{
			$objJsTemplate->thumbs = true;
			$objJsTemplate->navigationStyle = str_replace('thumbs_','',$this->get('navigationType'));
			$objJsTemplate->thumbWidth = $arrNaviSize[0];
			$objJsTemplate->thumbHeight = $arrNaviSize[1];
		}

		// arrows
		if ( empty($this->get('arrowStyle')) === false )
		{
			$objJsTemplate->arrows = true;
			$objJsTemplate->arrowStyle = str_replace('arrows_','',$this->get('arrowStyle'));
		}

	
		// shuffle
		$objJsTemplate->shuffle = $this->get('shuffle');
	
		//overlay
		$objJsTemplate->overlay = $this->get('overlay');
		$arrClass[] = $this->get('overlay');

		// loop settings
		$objJsTemplate->stopAtSlide = -1;
		if($this->get('stopAtSlide') >= 0 && $this->get('stopAtSlide') != '')
		{
			$objJsTemplate->stopAtSlide = $this->get('stopAtSlide');
		}
		$objJsTemplate->stopAfterLoops = -1;
		if($this->get('stopAfterLoops') >= 0 && $this->get('stopAfterLoops') != '')
		{
			$objJsTemplate->stopAfterLoops = $this->get('stopAfterLoops');
		}

		// mobile switch
		$objJsTemplate->hasMobile = false;
		$objTemplate->hasMobile = false;
		if( isset($GLOBALS['REVOLUTIONSLIDER_HAS_MOBILE'][ $this->get('id') ]) && (boolean)$GLOBALS['REVOLUTIONSLIDER_HAS_MOBILE'][ $this->get('id') ] === true )
		{
			$objJsTemplate->hasMobile = true;
			$objTemplate->hasMobile = true;
		}
		
		// parse js template
		$objTemplate->javascript =  \str_replace(array('###title###','###param1###'),array('{{title}}','{{param1}}'),$objJsTemplate->parse() );
		
		// add classes
		$objTemplate->class = implode(' ', $arrClass);
		
		// template vars
		$arrSize = StringUtil::deserialize($this->arrData['sliderSize']);
		$objTemplate->startWidth = $arrSize[0];
		$objTemplate->startHeight = $arrSize[1];
		$objTemplate->mediaqueries = $arrMediaQueries;
		$objTemplate->selector = $strSelector;
		
		return $objTemplate->parse();
	}
	
	/**
	 * Set Template
	 * @param string
	 */
	public function setTemplate($strTemplate)
	{
		$this->strTemplate = $strTemplate;
	}
	
	/**
	 * Find and set all slide objects for this slider and return as array
	 * @param integer
	 * @return array
	 */
	public function findSlides($intId)
	{
		$this->arrSlides = SlideFactory::findAllBySlider($intId);		
		return $this->arrSlides;
	}
	
	/**
	 * Return all transition options as array
	 * @return array
	 */
	public function getTransitions()
	{
		$arrReturn = array(
			'boxslide','boxfade', 'slotzoom-horizontal', 'slotzoom-vertical',
			'slotslide-horizontal', 'slotslide-vertical', 
			'slotfade-horizontal','slotfade-vertical', 
			'slideleft', 'slideright', 'slideup' ,'slidedown',
			'slidehorizontal', 'slidevertical',	
			'fade',	'random'
		);
		
		// new regular
		array_push($arrReturn,
			'fadefromright','fadefromleft','fadefromtop','fadefrombottom',
			'fadetoleftfadefromright','fadetorightfadefromleft','fadetotopfadefrombottom','fadetobottomfadefromtop',
			'parallaxtoright','parallaxtoleft','parallaxtotop','parallaxtobottom',
			'scaledownfromright','scaledownfromleft','scaledownfromtop','scaledownfrombottom',
			'zoomout','zoomin',
			'slotzoom-horizontal','slotzoom-vertical',
			'random-static'
		);
	
		// premiums
		$arrPremiums = array
		(
			 'curtain-1', 'curtain-2', 'curtain-3',
			 '3dcurtain-vertical','3dcurtain-horizonal',
			 'cube','cube-horizontal',
			 'papercut',
			 'flyin',
			 'turnoff','turnoff-vertical',
			 'random-premium'
		);
		
		// HOOK allow more transitions via global var
		if(!empty($GLOBALS['REVOLUTIONSLIDER']['TRANSITIONS']) && is_array($GLOBALS['REVOLUTIONSLIDER']['TRANSITIONS']))
		{
			$arrReturn = array_merge($arrReturn, $GLOBALS['REVOLUTIONSLIDER']['TRANSITIONS']);
		}
		
		$arrReturn = array_unique(array_merge($arrReturn, $arrPremiums));

		// order
		sort($arrReturn);

		return $arrReturn;
	}
	
	/**
	 * Return easing options as array
	 * @return array
	 */	
	public function getTransitionEasings()
	{
		$arrReturn = array
		(
			 'easeInBack','easeOutBack', 'easeOutBack', 'easeInOutBack',
			 'easeInQuad', 'easeOutQuad', 'easeInOutQuad',  
			 'easeOutQuart', 'easeInOutQuart',
			 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart',
			 'easeInQuint', 'easeOutQuint', 'easeInOutQuint',
			 'easeInSine', 'easeOutSine', 'easeInOutSine', 
			 'easeInExpo', 'easeOutExpo', 'easeInOutExpo',
			 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 
			 'easeInElastic', 'easeOutElastic','easeInOutElastic',  
			 'easeInBounce', 'easeOutBounce', 'easeInOutBounce',
		);
		
		// new easings
		#$arrReturn['new'] = array
		#(
		#	'Linear.easeNone Power0.easeIn (linear)',
		#	'Power0.easeInOut (linear)',
		#	'Power0.easeOut (linear)','Power1.easeIn', 'Power1.easeInOut',
		#	'Power1.easeOut',
		#	'Power2.easeIn', 'Power2.easeInOut',
		#	'Power2.easeOut', 'Power3.easeIn', 
		#	'Power3.easeInOut', 'Power3.easeOut', 'Power4.easeIn', 'Power4.easeInOut', 'Power4.easeOut',
		#	'Quad.easeIn (same as Power1.easeIn)','Quad.easeInOut (same as Power1.easeInOut)',
		#	'Quad.easeOut (same as Power1.easeOut)', 'Cubic.easeIn (same as Power2.easeIn)', 'Cubic.easeInOut (same as Power2.easeInOut)', 'Cubic.easeOut (same as Power2.easeOut)',
		#	'Quart.easeIn (same as Power3.easeIn)',
		#	'Quart.easeInOut (same as Power3.easeInOut)',
		#	'Quart.easeOut (same as Power3.easeOut)',
		#	'Quint.easeIn (same as Power4.easeIn)',
		#	'Quint.easeInOut (same as Power4.easeInOut)',
		#	'Quint.easeOut (same as Power4.easeOut)',
		#	'Strong.easeIn (same as Power4.easeIn)', 'Strong.easeInOut (same as Power4.easeInOut)',
		#	'Strong.easeOut (same as Power4.easeOut)',
		#	'Back.easeIn','Back.easeInOut',	'Back.easeOut',
		#	'Bounce.easeIn','Bounce.easeInOut', 'Bounce.easeOut', 
		#	'Circ.easeIn', 'Circ.easeInOut', 'Circ.easeOut', 
		#	'Elastic.easeIn', 'Elastic.easeInOut', 'Elastic.easeOut', 'Expo.easeIn', 'Expo.easeInOut', 'Expo.easeOut',
		#	'Sine.easeIn', 'Sine.easeInOut', 'Sine.easeOut', 'SlowMo.ease'
		#);
		
		// HOOK allow more easings via global var
		if(!empty($GLOBALS['REVOLUTIONSLIDER']['EASINGS']) && is_array($GLOBALS['REVOLUTIONSLIDER']['EASINGS']))
		{
			$arrReturn['custom'] = $GLOBALS['REVOLUTIONSLIDER']['EASINGS'];
		}
		
		return $arrReturn;
	}
	
	/**
	 * Return start animations classes as array
	 * @return array
	 */	
	public function getStartAnimationClasses()
	{
		// data-frame presets
		$arrReturn = \array_keys($GLOBALS['REVOLUTIONSLIDER']['FRAMES']);
		// hook
		$arrReturn = \array_merge($arrReturn, $GLOBALS['REVOLUTIONSLIDER']['ANIMATIONS']['START']);
		
		\sort( \array_unique($arrReturn) );
		
		return $arrReturn;
	}
	
	/**
	 * Return end animations classes as array
	 * @return array
	 */	
	public function getEndAnimationClasses()
	{
		$arrReturn = array
		(
			'stt',	// - Short to Top
			'stb',	// - Short to Bottom
			'str',	// - Short to Right
			'stl',	// - Short to Left
			'ltt',	// - Long to Top
			'ltb',	// - Long to Bottom
			'ltr',	// - Long to Right
			'ltl',	//- Long to Left
			'fadeout',	// - fading
			'randomrotateout',	//- Fade in, Rotate from a Random position and Degree
			'skewfromleft',
			'skewfromright',
			'skewfromleftshort',
			'skewfromrightshort'
		);
		
		// append data-frame presets
		$arrReturn = \array_merge($arrReturn, array_keys($GLOBALS['REVOLUTIONSLIDER']['FRAMES'] ?: array()) );
		// HOOK
		$arrReturn = \array_merge($arrReturn, $GLOBALS['REVOLUTIONSLIDER']['ANIMATIONS']['END']);
		
		\sort( \array_unique($arrReturn) );

		return $arrReturn;
	}

}