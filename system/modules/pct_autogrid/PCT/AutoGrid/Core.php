<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\AutoGrid;

/**
 * Imports
 */
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;
use Contao\Validator;
use PCT\AutoGrid\Models\ContentModel;

/**
 * Class file
 * Core
 */
class Core
{
	/**
	 * Include grid css on page generation
	 */
	public function loadAssets()
	{
		$GLOBALS['TL_CSS'][] = $GLOBALS['PCT_AUTOGRID']['css'];
	}
	
		
	/**
	 * Add AG related template variables to a template object
	 * @param object	FrontendTemplate
	 * @param object	Database Result or Model
	 * @return object	FrontendTemplate
	 */
	// !addToTemplate
	public static function addToTemplate($objTemplate,$objRow=null)
	{
		if( $objRow === null )
		{
			$objRow = $objTemplate;
		}

		if( in_array($objRow->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
		{
			$objRow->autogrid = true;
		}

		$arrClasses = array();
		
		// @var object
		$objAutoGrid = new \StdClass;
		$objAutoGrid->hasContent = false;
		$objAutoGrid->Image = null;
		$objAutoGrid->shstart = false;
		$objAutoGrid->shstop = false;
		$objAutoGrid->hasStyles = false;
		$objAutoGrid->hasAttributes = false;
		$objAutoGrid->hasCustomGrid = false;
		$objAutoGrid->start = null;
		$objAutoGrid->stop = null;
		$objAutoGrid->isActive = (boolean)$objRow->autogrid;
		$objAutoGrid->desktop = $objRow->autogrid_css;
		$objAutoGrid->align = $objRow->autogrid_align;
		if( $objRow->autogrid_align_mobile )
		{
			$objAutoGrid->align_mobile = 'm_'.$objRow->autogrid_align_mobile;
		}
		$objAutoGrid->tablet = $objRow->autogrid_tablet;
		$objAutoGrid->mobile = $objRow->autogrid_mobile;
		$objAutoGrid->offset = $objRow->autogrid_offset;
		$objAutoGrid->gutter = $objRow->autogrid_gutter;
		$objAutoGrid->same_height = $objRow->autogrid_sameheight;
		$objAutoGrid->class = $objRow->autogrid_class;
		$objAutoGrid->preset = $objRow->autogrid_grid;
		$objAutoGrid->no_gutter = false; // deprecated
		$objAutoGrid->styles = array();
		$objAutoGrid->sticky = (boolean)$objRow->autogrid_sticky ?? false;
		$objAutoGrid->autogrid_sticky_offset = $objRow->autogrid_sticky_offset ?? '';
		
		// data- attributes
		$arrAttributes = array();
		if( in_array($objRow->type, $GLOBALS['PCT_AUTOGRID']['startElements']) )
		{
			$objAutoGrid->start = true;
		}
		if( in_array($objRow->type, $GLOBALS['PCT_AUTOGRID']['stopElements']) )
		{
			$objAutoGrid->stop = true;
		}

		// margins
		$objMargins = new \StdClass;
		$objMargins->top = $objRow->margin_t ?? '';
		$objMargins->top_mobile = $objRow->margin_t_m ?? '';
		$objMargins->bottom = $objRow->margin_b ?? '';
		$objMargins->bottom_mobile = $objRow->margin_b_m ?? '';
		$objMargins->classes = implode(' ', array_filter(array($objRow->margin_t,$objRow->margin_t_m,$objRow->margin_b,$objRow->margin_b_m)) ); 
		$objAutoGrid->Margins = $objMargins;
		
		// data collection
		$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR'][$objRow->type] = $objRow;
		if( in_array($objRow->type, $GLOBALS['PCT_AUTOGRID']['startElements']) )
		{
			$k = $objRow->type;
			$GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR'][$k] = $objRow;
			
			$objAutoGrid->GridStart = (isset($GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridGridStart']) ? $GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridGridStart'] : null);
			$objAutoGrid->ColStart = (isset($GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridColStart']) ? $GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridColStart'] : null);
			$objAutoGrid->RowStart = (isset($GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridRowStart']) ? $GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridRowStart'] : null);
		}
		else if( in_array($objRow->type, $GLOBALS['PCT_AUTOGRID']['stopElements']) )
		{
			$k = str_replace('Stop','Start',$objRow->type);
			
			$objAutoGrid->GridStart = (isset($GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridGridStart']) ? $GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridGridStart'] : null);
			$objAutoGrid->ColStart = (isset($GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridColStart']) ? $GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridColStart'] : null);
			$objAutoGrid->RowStart = (isset($GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridRowStart']) ? $GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR']['autogridRowStart'] : null);
			unset($GLOBALS['PCT_AUTOGRID_DATA_COLLECTOR'][$k]);

			$objAutoGrid->stop = true;
		}
		
		// Grid presets
		if($objRow->type == 'autogridGridStart')
		{
			$arrGridPreset = $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][$objRow->autogrid_grid] ?: array();
			
			// grid preset default values
			if( empty($objRow->autogrid_tablet) && empty($arrGridPreset) === false ) 
			{ 
				$objRow->autogrid_tablet = $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][$objRow->autogrid_grid]['grid']['tablet'];
			}
			if( empty($objRow->autogrid_mobile) && empty($arrGridPreset) === false ) 
			{ 
				$objRow->autogrid_mobile = $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][$objRow->autogrid_grid]['grid']['mobile'];
			}
			
			// @var object
			$objGrid = new \StdClass;
			$objGrid->config = $arrGridPreset;
			$objGrid->name = $objRow->autogrid_grid;
			$objGrid->desktop = $objRow->autogrid_css;
			$objGrid->tablet = $objRow->autogrid_tablet;
			$objGrid->mobile = $objRow->autogrid_mobile;
			
			if( !empty($arrGridPreset) )
			{
				// compile grid classes
				if( $objRow->autogrid_css )
				{
					$objGrid->desktop = 'd_'.rtrim(str_replace(array('%',' '), array('_'), $objRow->autogrid_css),'_');
				}
				if( $objGrid->tablet )
				{
					$objGrid->tablet = 't_'.rtrim(str_replace(array('%',' '), array('_'), $objRow->autogrid_tablet),'_');
				}
				if( $objGrid->mobile )
				{
					$objGrid->mobile = 'm_'.rtrim(str_replace(array('%',' '), array('_'), $objRow->autogrid_mobile),'_');
				}
				// add to classes
				$arrClasses = array_merge($arrClasses, array($objGrid->desktop,$objGrid->tablet,$objGrid->mobile) );
				
				// override AutoGrid vars
				$objAutoGrid->desktop = $objGrid->desktop;
				$objAutoGrid->tablet = $objGrid->tablet;
				$objAutoGrid->mobile = $objGrid->mobile;
			}
			// flag as custom grid definition
			else
			{
				$objGrid->isCustomGrid = true;
			}
			
			if( trim($objRow->autogrid_css) != trim($arrGridPreset['grid']['desktop']) )
			{
				$objAutoGrid->hasCustomGrid = true;
			}

			if( trim($objRow->autogrid_tablet) != trim($arrGridPreset['grid']['tablet']) )
			{
				$objAutoGrid->hasCustomGrid = true;
			}

			if( trim($objRow->autogrid_mobile) != trim($arrGridPreset['grid']['mobile']) )
			{
				$objAutoGrid->hasCustomGrid = true;
			}

			// add to AutoGrid object
			$objAutoGrid->Grid = $objGrid;
		}
		else
		{
			$arrClasses[] = $objRow->autogrid_css;
			$arrClasses[] = $objRow->autogrid_tablet;
			$arrClasses[] = $objRow->autogrid_mobile;
		}
		
		// append more classes
		$arrClasses = array_merge($arrClasses, array($objRow->autogrid_offset,$objRow->autogrid_align,@$objAutoGrid->align_mobile,$objRow->autogrid_gutter,$objRow->autogrid_class));

		// collect styles
		$arrStyles = array();
		
		// color
		$arrColor = StringUtil::deserialize($objRow->autogrid_bgcolor) ?: array();
		if( empty(array_filter($arrColor)) === false )
		{
			$color = $arrColor[0];
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
			if($arrColor[1])
			{
				$alpha = (int)$arrColor[1] / 100;
			}
			$style = 'background-color:rgba('.implode(',', $rgb).','.$alpha.');';
			$arrStyles['background-color'] = $style;
		}
		
		// background image
		if( empty($objRow->autogrid_bgimage) === false )
		{
			$objFile = FilesModel::findByPath($objRow->autogrid_bgimage);
			if ( (boolean)Validator::isStringUuid($objRow->autogrid_bgimage) === true )
			{
				$objFile = FilesModel::findByUuid($objRow->autogrid_bgimage);
			}

			$rootDir = System::getContainer()->getParameter('kernel.project_dir');
			if( $objFile === null && \file_exists($rootDir.'/'.$objRow->autogrid_bgimage) === true )
			{
				$objFile = \Contao\Dbafs::addResource($objRow->autogrid_bgimage);
			}

			if( $objFile !== null )
			{
				$objAutoGrid->Image = null;
				$style = "background-image:url('".$objFile->path."');";
				$arrStyles['background-image'] = $style;
				$tmp = new \StdClass;
				// add image to temp object
				$figureBuilder = System::getContainer()->get('contao.image.studio')->createFigureBuilder();
				$figureBuilder->fromPath($objFile->path, false);
				$figure = $figureBuilder->buildIfResourceExists();
				if( $figure !== null )
				{
					$figure->applyLegacyTemplateData($tmp);
					$objAutoGrid->Image = $tmp;
				}
				unset($tmp);
			}
			
			// check if column is empty or not
			$objNext = null;
			if( in_array($objRow->ptable, array('tl_article','tl_news','tl_calender_events')) === true || empty($objRow->ptable) === true )
			{
				$objNext = ContentModel::findNextPublished($objRow);
			}
			
			if( in_array($objNext->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) === false || $objNext->type == 'autogridRowStart' )
			{
				$objAutoGrid->hasContent = true;
			}
		}
		// background position
		if($objRow->autogrid_bgposition)
		{
			$style = 'background-position:'.$objRow->autogrid_bgposition.';';
			$arrStyles['background-position'] = $style;		
		}
		// background repeat
		if($objRow->autogrid_bgrepeat)
		{
			$style = 'background-repeat:'.$objRow->autogrid_bgrepeat.';';
			$arrStyles['background-repeat'] = $style;
		}
		// background size
		if($objRow->autogrid_bgsize)
		{
			$style = 'background-size:'.$objRow->autogrid_bgsize.';';
			$arrStyles['background-size'] = $style;
		}
		
		// padding
		if($objRow->autogrid_padding)
		{
			$tmp = array_filter( StringUtil::deserialize($objRow->autogrid_padding) ?: array() );
			$unit = $tmp['unit'] ?? '';
			unset($tmp['unit']);
			foreach($tmp as $k => $v)
			{
				$arrStyles['padding-'.$k] = 'padding-'.$k.':'.$v.$unit.';';
			}
		}
		
		// custom styles
		if($objRow->autogrid_styles)
		{
			$arrStyles['custom'] = $objRow->autogrid_styles;
		}
		
		// clean up
		$arrStyles = array_filter(array_map('trim',$arrStyles));
		
		if(!empty($arrStyles))
		{
			$objAutoGrid->hasStyles = true;
			$objAutoGrid->styles = $arrStyles;
		}
		
		// compile css classes
		$objAutoGrid->classes = implode(' ', array_unique( array_filter($arrClasses) ) );
		
		// data- attributes
		$objAutoGrid->attributes = implode(' ', array_unique( array_filter($arrAttributes) ) );

		$objTemplate->AutoGrid = $objAutoGrid;
		return $objTemplate;
	}
}