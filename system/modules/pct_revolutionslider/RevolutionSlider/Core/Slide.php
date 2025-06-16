<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace RevolutionSlider\Core;

/**
 * Imports
 */
use Contao\Config;
use Contao\FilesModel;
use Contao\Controller;
use Contao\Image;
use Contao\StringUtil;
use Contao\System;

/**
 * Class files
 * RevolutionSliderSlide
 */
class Slide
{
	/**
	 * Content elements array
	 * @var array
	 */
	protected $arrContent = array();
	
	/**
	 * Attributes array
	 * @var array
	 */
	protected $arrAttributes = array();
	
	/**
	 * Data Array
	 * @var array
	 */
	protected $arrData = array();

	/**
	 * Create new instance
	 * @param array
	 */ 
	public function __construct($arrData)
	{
		$this->arrData = $arrData;
		
		// fetch the slider model
		// @var object
		$this->Slider = \RevolutionSlider\Models\Slider::findByPk($arrData['pid']);
		
		$this->arrContent = $this->prepareContent($arrData['id']);
		$this->arrAttributes = array
		(
			'data-transition'	=> $arrData['transition'] ?? '',
			'data-slotamount'	=> $arrData['slotamount'] ?? 4,
		);
		
		// fallback transition
		if(!$this->arrAttributes['data-transition'])
		{
			$this->arrAttributes['data-transition'] = $this->Slider->transition;
		}
		
		// delay
		if($arrData['delay'] > 0)
		{
			$this->arrAttributes['data-delay'] = $arrData['delay'] * 1000;
		}
		
		// masterspeed
		if($arrData['masterspeed'] > 0)
		{
			$this->arrAttributes['data-masterspeed'] = $arrData['masterspeed'] * 1000;
		}
		
		// link slide
		if(strlen($arrData['slideUrl']) > 0)
		{
			$this->arrAttributes['data-link'] = $arrData['slideUrl'];
			$this->arrAttributes['data-target'] = ($arrData['newWindow'] ? '_blank' : '');
		}

		// generate thumbs
		$this->arrAttributes['data-thumb'] = $this->getThumb();
		
		// slide title
		$this->arrAttributes['data-title'] = $arrData['title'];

		// param1
		if( empty($arrData['subtitle']) === false )
		{
			$this->arrAttributes['data-param1'] = $arrData['subtitle'];
		}

		if( $arrData['data_bgcolor'] )
		{
			// bg_color
			$this->arrAttributes['data-bgcolor'] = '#'.$arrData['data_bgcolor'];
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
	 * Prepare the data- attributes logic from an array
	 * @param array
	 * @return string 
	 */
	public static function buildDataAttributeValueFromArray($arrInput)
	{
		if( empty($arrInput) )
		{
			return '';
		}

		$tmp = array();
		foreach($arrInput as $v)
		{
			if( empty($v) )
			{
				continue;
			}
			$tmp[] = "'".$v."'";
		}
		return '['.\implode(',',$tmp).']';
	}


		
	/**
	 * Prepare the slide
	 * Fetch all content elements
	 * @param array
	 * @return array
	 */
	public function prepareContent($intSlide)
	{
		$objContentModels = \Contao\ContentModel::findPublishedByPidAndTable($intSlide,'tl_revolutionslider_slides');
		
		if($objContentModels === null)
		{
			return array();
		}
		
		// generate content
		$arrReturn = array();
		foreach($objContentModels as $objContentModel)
		{
			$cte = $objContentModel->row();
			
			if( !isset($cte['revolutionslider_data_speed']) )
			{
				$cte['revolutionslider_data_speed'] = 0;
			}
			if( !isset($cte['revolutionslider_data_start']) )
			{
				$cte['revolutionslider_data_start'] = 0;
			}
			if( !isset($cte['revolutionslider_data_delay']) )
			{
				$cte['revolutionslider_data_delay'] = 0;
			}
			
						
			// attributes
			$data_position = StringUtil::deserialize($cte['revolutionslider_data_position']);
			$data_position9 = explode(' ',$cte['revolutionslider_data_pos9grid']);
			$data_position_m = StringUtil::deserialize($cte['revolutionslider_data_position_m']);

			$arrAttributes = array
			(
				'data-easing'	=> $cte['revolutionslider_data_easing'],
				'data-speed'	=> ($cte['revolutionslider_data_speed'] > 0 ? $cte['revolutionslider_data_speed'] * 1000 : 0), // sec to ms
				'data-y'		=> (strlen($data_position[1] ?? '') ? $data_position[1]: $data_position9[1] ?? 0),
				'data-start'	=> ($cte['revolutionslider_data_start'] > 0 ? $cte['revolutionslider_data_start'] * 1000 : 100),
				'data-elementdelay' => ($cte['revolutionslider_data_delay'] > 0 ? $cte['revolutionslider_data_delay'] / 100 : 0),
			);

			// DESKTOP, SMARTPHONE
			#$pos_x = $data_position[0];
			#$pos_y = $data_position[1];
			#$pos_x_m = $data_position_m[0];
			#$pos_y_m = $data_position_m[1];
			#$hoffset = 0;
			#$hoffset_m = null;
			#$voffset = 0;
			#$voffset_m = null;

			// positions
			$arrPosition = array
			(
				'x' => $data_position[0] ?? 0,
				'y' => $data_position[1] ?? 0,
				'hoffset' => null,
				'voffset' => null,
			);

			// positions mobile
			$arrPositionM = array
			(
				'x' => $data_position_m[0] ?? 0,
				'y' => $data_position_m[1] ?? 0,
				'hoffset' => null,
				'voffset' => null,
			);

			// h offset
			if(isset($data_position[0]) && (isset($data_position9[0]) && strlen($data_position9[0]) > 0) )
			{
				$arrPosition['x'] = $arrPositionM['x'] = $data_position9[0];
				$arrPosition['hoffset'] = $data_position[0];
				$arrPositionM['hoffset'] = $data_position_m[0];
			}
			
			// v offset
			if(isset($data_position[1]) && (isset($data_position9[1]) && strlen($data_position9[1]) > 0) )
			{
				$arrPosition['y'] = $arrPositionM['y'] = str_replace(array('center'),array('middle'), $data_position9[1]);
				$arrPosition['voffset'] = $data_position[1];
				$arrPositionM['voffset'] = $data_position_m[1];
			}
			
			#$arrAttributes['data-x'] = $this->buildDataAttributeValueFromArray( array($pos_x,$pos_x_m) ); #\sprintf("['%s','%s']",$pos_x,$pos_x_m); #"['$data_position[0]','','','$data_position_m[0]']";
			#$arrAttributes['data-y'] = $this->buildDataAttributeValueFromArray( array($pos_y,$pos_y_m) );
			#$arrAttributes['data-hoffset'] = $this->buildDataAttributeValueFromArray( array($hoffset,$hoffset_m) ); #\sprintf("['%s','%s']",$hoffset,$hoffset_m); #"['$data_position[0]','','','$data_position_m[0]']";
			#$arrAttributes['data-voffset'] = $this->buildDataAttributeValueFromArray( array($voffset,$voffset_m) ); #"['$data_position[0]','','','$data_position_m[0]']";
			
			// check if there is atleas one mobile value and mark this slider as mobile first
			$GLOBALS['REVOLUTIONSLIDER_HAS_MOBILE'][ $this->Slider->id ] = false;
			if( empty( array_filter( $arrPositionM ) ) === false )
			{
				$GLOBALS['REVOLUTIONSLIDER_HAS_MOBILE'][ $this->Slider->id ] = true;
			}
			
			// DESKTOP, SMARTPHONE
			$arrAttributes['data-x'] = \sprintf("['%s','%s']",$arrPosition['x'],$arrPositionM['x']);
			$arrAttributes['data-y'] = \sprintf("['%s','%s']",$arrPosition['y'],$arrPositionM['y']);
			if( empty($arrPosition['hoffset']) === false || empty($arrPositionM['hoffset']) === false )
			{
				$arrAttributes['data-hoffset'] = \sprintf("['%s','%s']",$arrPosition['hoffset'],$arrPositionM['hoffset']);
			}
			if( empty($arrPosition['voffset']) === false || empty($arrPositionM['voffset']) === false )
			{
				$arrAttributes['data-voffset'] = \sprintf("['%s','%s']",$arrPosition['voffset'],$arrPositionM['voffset']); #"['$data_position[0]','','','$data_position_m[0]']";
			}
			$arrAttributes['data-lineheight'] = "['inherit','inherit']";
			$arrAttributes['data-whitespace'] = "nowrap";
			$arrAttributes['data-responsive_offset'] = "on";	
			
			// visibility
			$arrAttributes['data-visibility'] = "['on','on']";
			if( $objContentModel->revolutionslider_visibility == 1 )
			{
				$arrAttributes['data-visibility'] = "['on','off']";
			}
			else if( $objContentModel->revolutionslider_visibility == 2 )
			{
				$arrAttributes['data-visibility'] = "['off','on']";
			}

			// hyperlinks
			if( \in_array($objContentModel->type, array('hyperlink','revolutionslider_hyperlink') )  )
			{
				$arrAttributes['data-responsive'] = "off";
				if( $arrPosition['x'] == 'center' )
				{
					$arrAttributes['data-responsive_offset'] = "off";
				}	
			}

			// data type
			$arrAttributes['data-type'] = 'text';
			if( \in_array($objContentModel->type, array('image','revolutionslider_image') )  )
			{
				$arrAttributes['data-type'] = 'image';
			}

			//! data-fontsize
			$arrFontSize = StringUtil::deserialize($objContentModel->revolutionslider_text_fontsize);
			if( !\is_array($arrFontSize) )
			{
				$arrFontSize = \explode(',',$arrFontSize);
			}

			if( empty($arrFontSize[1]) === false )
			{
				$arrAttributes['data-fontsize'] = \sprintf("['%s','%s']",$arrFontSize[0],$arrFontSize[1]);
			}

			if( \in_array($objContentModel->type, array('hyperlink','revolutionslider_hyperlink') )  )
			{
				unset($arrAttributes['data-fontsize']);
			}
			//--
			
			// out animation attributes
			if( (boolean)$cte['revolutionslider_OUT'] === true)
			{
				$arrAttributes['data-endelementdelay'] 	= ( !empty($objContentModel->revolutionslider_data_start_OUT) ? $cte['revolutionslider_data_start_OUT'] * 1000 : 'wait');
				$arrAttributes['data-endspeed'] 		= $cte['revolutionslider_data_speed_OUT'] * 1000;
				$arrAttributes['data-endeasing'] 		= $cte['revolutionslider_data_easing_OUT'] ?: 'wait';
			}

			// generate the content element
			$strCte = System::getContainer()->get('contao.insert_tag.parser')->replace('{{insert_content::'.$cte['id'].'}}');
			
			//! data-frames
			
			$strFrameJson = $GLOBALS['REVOLUTIONSLIDER']['FRAMES'][ $objContentModel->revolutionslider_data_animation_start ];
			$arrFrameJson = \explode('},{',$strFrameJson);
			$arrFrameJson[0] .= '}';
			$arrFrameJson[1] = '{'.$arrFrameJson[1];
			
			$arrFrames = array
			(
				'start' => \json_decode($arrFrameJson[0],true),
				'end' 	=> \json_decode($arrFrameJson[1],true),
			);

			// map attributes to frame
			$frameFromAttributes = array
			(
				'start' => array
				(
					'delay' => 'data-start',
					'speed' => 'data-speed',
					'ease'	=> 'data-easing',
				),
				'end' => array
				(
					'delay' => 'data-start',
					'speed' => 'data-endspeed',
					'ease'	=> 'data-endeasing',
				),
			);

			// if no out animation is set, use the default
			if( (boolean)$objContentModel->revolutionslider_OUT === false)
			{
				unset( $frameFromAttributes['end'] );
			}
			
			foreach( $frameFromAttributes as $k => $arr)
			{
				foreach( $arr as $frame => $attr )
				{
					if( isset($arrAttributes[ $attr ]) )
					{
						$arrFrames[$k][$frame ] = $arrAttributes[ $attr ];
						// remove from attributes
						unset( $arrAttributes[ $attr ] );
					}
				}
			}

			$json_frames_start = \json_encode($arrFrames['start']);
			$json_frames_end =  \json_encode($arrFrames['end']);
			
			// inject attributes in content element
			$strAttributes = '';
			foreach($arrAttributes as $attr => $value)
			{
				$strAttributes .= $attr .'="'.$value.'" ';
			}
			trim($strAttributes);
			
			$str_data_frames = \sprintf("[%s,%s]", $json_frames_start,$json_frames_end);
			
			//! custom data-frames
			if( (boolean)$objContentModel->revolutionslider_frames === true )
			{
				$str_data_frames = trim($objContentModel->revolutionslider_data_frames);
			}

			// append data-frames
			$strAttributes .= " data-frames='".$str_data_frames."'";
			//--
			$blnDebug = System::getContainer()->getParameter('kernel.debug');
			
			// since we only work on html elements we can easily just replace everything in the first <...>
			if ($blnDebug === true)
			{
				$preg = preg_match('/<!-- TEMPLATE START:(.*?)\>/', $strCte,$result);
				if( $preg )
				{
					$strCte = str_replace($result[0],'',$strCte);
				}
				$preg = preg_match('/<!-- TEMPLATE END:(.*?)\>/', $strCte,$result);
				if( $preg )
				{
					$strCte = str_replace($result[0],'',$strCte);
				}
				$strCte = \trim($strCte);
			}
			$preg = preg_match('/<(.*?)\>/', $strCte,$result);
			if($preg)
			{
				$search = $result[0];
				$replace = sprintf('<%s %s>',$result[1], $strAttributes);
				$strCte = str_replace($search, $replace, $strCte);
			}
			
			// inject attributes
			$strCte = \str_replace('###attributes###',$strAttributes,$strCte);
			$arrReturn[] = $strCte;
			
			// add must have classes
			$preg = preg_match('/class="(.*?)\"/', $strCte,$result);
			if($preg)
			{
				$arrClass = explode(' ', trim($result[1]));
				
				$arrClass[] = 'tp-caption';
				$arrClass[] = 'tp-resizeme';
				#$arrClass[] = 'rs-parallaxlevel-0';
				
				// parallax
				if( (int)$cte['revolutionslider_parallax'] > 0 && empty($cte['revolutionslider_parallax']) === false )
				{
					$arrClass[] = 'rs-parallaxlevel-'.(int)$cte['revolutionslider_parallax'];
				}

				// visibility
				if( (int)$cte['revolutionslider_visibility'] == 1 )
				{
					$arrClass[] = '';
				}
				else if( (int)$cte['revolutionslider_visibility'] == 2 )
				{
					$arrClass[] = '';
				}
				
				// add start animation class (deprecated fallback)
				$arrClass[] = $cte['revolutionslider_data_animation_start'];
				
				// add end animation class (deprecated fallback)
				$arrClass[] = $cte['revolutionslider_data_animation_end'];
				
				$search = $result[0];
				$strCte = str_replace($search, 'class="'.implode(' ', array_unique($arrClass)).'"', $strCte);
			}
		}
		
		return $arrReturn;
	}


	/**
	 * Generate the current thumbnail from the main image or from the slide image and return the filepath
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string	path to thumb
	 */
	protected function getThumb()
	{
		if($this->get('singleSRC') == '' && $this->get('singleSRC_thumb') == '')
		{
			return '';
		}
		
		$src = $this->get('singleSRC_thumb');
		if($src == '')
		{
			$src = $this->get('singleSRC');
		}
		
		$objFile = FilesModel::findByPk($src);
		if( $objFile === null )
		{
			return '';
		}
		
		$size = $GLOBALS['REVOLUTIONSLIDER']['THUMBNAIL_SIZES'] ?? array();
		$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		$image = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, $size)->getUrl($projectDir);

		return $image;
	}
}