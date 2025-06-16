<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 * @link		http://contao.org
 */
 
 
/**
 * Namespace
 */
namespace PCT\ThemeSettings;

/**
 * Imports
 */
use Contao\Validator;
use Contao\FilesModel;
use Contao\StringUtil;

/**
 * Class file
 * Core
 */
class Core
{
	/**
	 * Add the theme setting related information to the article template
	 * @param object	The template object
	 * @param object	The database result or model oobject
	 * @return object	The template object
	 */
	public static function addToTemplate($objTemplate,$objRow)
	{
		// @var object
		$objTheme = new \StdClass;
		$objTheme->raw = $objRow;
		$objTheme->layout_css = $objRow->layout_css;
		// paddings
		$objTheme->padding_top = $objRow->padding_t;
		$objTheme->padding_bottom = $objRow->padding_b;
		// margins
		$objTheme->margin_top = $objRow->margin_t;
		$objTheme->margin_bottom = $objRow->margin_b;
		
		$objTheme->ol_position = $objRow->ol_position;
		$objTheme->ol_width = $objRow->ol_width;
		$objTheme->ol_opacity = $objRow->ol_opacity;
		$objTheme->ol_bgcolor_css = $objRow->ol_bgcolor_css;
		$objTheme->bg_styles = '';
		$objTheme->color_css = $objRow->color_css;
		$objTheme->parallax = false;
		$objTheme->fullscreen = false;
		$objTheme->overlay = false;
		$objTheme->hasMediaQueries = false;
		
		$arrClasses = array($objRow->layout_css,$objRow->padding_t,$objRow->padding_b,$objRow->margin_t,$objRow->margin_b,$objRow->margin_t_m,$objRow->margin_b_m,$objRow->ol_position,$objRow->ol_width,$objRow->ol_opacity,$objRow->ol_bgcolor_css,$objRow->color_css);
		
		// add parallax class
		if($objRow->background && $objRow->bgposition == 'parallax')
		{
			$objTheme->parallax = true;
			$arrClasses[] = 'parallax';
		}

		// add visibility class
		if( empty($objRow->visibility_css) === false )
		{
			$arrClasses[] = $objRow->visibility_css;
		}
		
		// collect styles
		$arrStyles = array();
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');

		// background settings
		if($objRow->background)
		{
			$objTheme->background = true;
			
			if($objRow->bgcolor)
			{
				// @var object
				$objColor = static::compileColor($objRow->bgcolor);
				// add to Theme
				$objTheme->BackgroundColor = $objColor;
				
				if( empty($objColor->rgb) === false )
				{
					$style = 'background-color:'.$objColor->rgba.';';
					$arrStyles['background-color'] = $style;
				}
			}
			// background image
			if( empty($objRow->bgimage) === false )
			{
				$objFile = FilesModel::findByPath($objRow->bgimage);
				
				if ( (boolean)Validator::isStringUuid($objRow->bgimage) === true )
				{
					$objFile = FilesModel::findByUuid($objRow->bgimage);
				}
				
				if( $objFile === null && \file_exists($rootDir.'/'.$objRow->bgimage) === true )
				{
					$objFile = \Contao\Dbafs::addResource($objRow->bgimage);
				}

				// responsive image
				$strFile = $objFile->path;
				if( empty($objRow->size) === false && \file_exists($rootDir.'/'.$objFile->path)  )
				{
					$arrRow = array();
					$arrRow['singleSRC'] = $objFile->path;
					$arrRow['size'] = $objRow->size;
					
					$container = \Contao\System::getContainer();
					$projectDir = $container->getParameter('kernel.project_dir');
					$picture = $container->get('contao.image.preview_factory')->createPreviewPicture($projectDir . '/' . $objFile->path, $objRow->size);
					$staticUrl = $container->get('contao.assets.files_context')->getStaticUrl();
					
					$img = $picture->getImg($projectDir, $staticUrl);
					$sources = $picture->getSources($projectDir, $staticUrl);
					
					// media queries
					$arrMediaQueries = array();
					foreach($sources ?: array() as $data)
					{
						if( !isset($data['media']) || \strlen($data['media']) < 1 )
						{
							continue;
						}
						$arrMediaQueries[] = '@media '.$data['media'].' { .resp_image_'.$objRow->id.' { background-image:url('.$data['src'].') !important; }}';
					}
					$objTheme->hasResponsiveImage = true;
					$objTheme->hasMediaQueries = true;
					$objTheme->mediaqueries = \implode('',$arrMediaQueries);
					$arrClasses[] = 'resp_image_'.$objRow->id;
				}
				$style = "background-image:url('".$strFile."');";
				$arrStyles['background-image'] = $style;
			}
			// background position
			if($objRow->bgposition)
			{
				#$style = 'background-position:'.$objRow->bgposition.';';
				#$arrStyles['background-position'] = $style;
				$arrClasses[] = $objRow->bgposition;
			}
			// background repeat
			if($objRow->bgrepeat)
			{
				$style = 'background-repeat:'.$objRow->bgrepeat.';';
				$arrStyles['background-repeat'] = $style;
			}
			// background size
			if($objRow->bgsize)
			{
				$style = 'background-size:'.$objRow->bgsize.';';
				$arrStyles['background-size'] = $style;
			}
			// background color class
			$arrClasses[] = $objRow->bgcolor_css;
			
			// fullscreen
			$objTheme->fullscreen = $objRow->fullscreen;
			// just the background styles to this point
			$objTheme->bg_styles = array_filter(array_map('trim',$arrStyles));
		}
		
		// overlay
		if($objRow->overlay)
		{
			$objTheme->overlay = true;
			// @var object
			$objOverlay = new \StdClass;
			// collect overlay classes
			$classes = array( $objRow->ol_bg_color_css, $objRow->ol_position, $objRow->ol_width, $objRow->ol_opacity );
			// overlay height
			$objOverlay->height = '';
			if($objRow->ol_height)
			{
				$tmp = StringUtil::deserialize($objRow->ol_height);
				$objOverlay->height = $tmp['value'].str_replace('pct','%',$tmp['unit']);
				unset($tmp);
			}
			// compile classes
			$objOverlay->classes = implode(' ', array_filter($classes) );
			// add to Theme object
			$objTheme->Overlay = $objOverlay;
			
			unset($classes);		
		}
		
		// custom styles
		if($objRow->styles)
		{
			$arrStyles['custom'] = $objRow->styles;
		}
		
		// clean up
		$arrStyles = array_filter(array_map('trim',$arrStyles));
		
		$objTheme->styles = array();
		if(!empty($arrStyles))
		{
			$objTheme->hasStyles = true;
			$objTheme->styles = $arrStyles;
		}
		
		$objTheme->classes = implode(' ', array_unique( array_filter($arrClasses) ) );
		$objTemplate->Theme = $objTheme;
		return $objTemplate;
	}
	
	
	/**
	 * Compile color values coming from contao colorpicker
	 * @param mixed string||array
	 * @return object
	 */
	public static function compileColor($varColor)
	{
		if(is_string($varColor))
		{
			$varColor = StringUtil::deserialize($varColor);
		}
		
		$tmp = $varColor;
		$color = $tmp[0];
		$rgb = array();
		//-- @see Contao\StyleSheets::convertHexColor
		
		// Try to convert using bitwise operation
		if (strlen($color) == 6)
		{
			$dec = hexdec($color);
			$rgb['red'] = 0xFF & ($dec >> 0x10);
			$rgb['green'] = 0xFF & ($dec >> 0x8);
			$rgb['blue'] = 0xFF & $dec;
		}
		// Shorthand notation
		elseif (strlen($color) == 3)
		{
			$rgb['red'] = hexdec(str_repeat(substr($color, 0, 1), 2));
			$rgb['green'] = hexdec(str_repeat(substr($color, 1, 1), 2));
			$rgb['blue'] = hexdec(str_repeat(substr($color, 2, 1), 2));
		}
		//--
		
		$alpha = '1';
		if($tmp[1])
		{
			$alpha = (int)$tmp[1] / 100;
		}
		
		$objReturn = new \StdClass;
		$objReturn->alpha = $alpha;
		$objReturn->hex = $color;
		$objReturn->rgb = $rgb;
		$objReturn->rgba = 'rgba('.implode(',', $rgb).','.$alpha.')';
	
		return $objReturn;
	}
}