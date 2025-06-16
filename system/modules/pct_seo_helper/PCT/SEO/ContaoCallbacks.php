<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2019 Leo Feyer
 *
 * @copyright	Tim Gatzky 2019, Premium-Contao-Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package 	pct_seo_helper
 * @link    	https://contao.org, https://www.premium-contao-themes.com
 * @license 	http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Namespace
 */
namespace PCT\SEO;

use Contao\File;
use Contao\System;

/**
 * Class file
 * ContaoCallbacks
 */
class ContaoCallbacks
{
	/**
	 * Add the 'loading' attribute to <img> elements
	 * @param object
	 */
	public function parseFrontendTemplateCallback($strBuffer, $strTemplate)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			return $strBuffer;
		}
		
		$strLoading = \Contao\Config::get('pct_seo_image_loading');

		if( empty($strLoading) === true )
		{
			return $strBuffer;
		}

		// find images
		if( preg_match_all('/(<img[^>]+>)/i', $strBuffer, $arrMatches) )
		{
			foreach( $arrMatches as $match )
			{
				if( empty($match) === true )
				{
					continue;
				}

				$image = $match[0];
				// skip images already processed or containing an loading attribute
				if( in_array($image,$GLOBALS['PCT_SEO']['processedImages'] ?? array() ) == true || strpos($image,'loading=') !== false )
				{
					continue;
				}
				// insert loading attribute
				$new_image = str_replace('<img','<img loading="'.$strLoading.'"',$image);
				// replace in html string
				$strBuffer = str_replace($image,$new_image,$strBuffer);
				// mark as being processed
				$GLOBALS['PCT_SEO']['processedImages'][] = $image;
				$GLOBALS['PCT_SEO']['processedImages'][] = $new_image;
			}
		}

		return $strBuffer;
	}


	/**
	 * Add variables to fe_page Template
	 * @param mixed $objTemplate 
	 * @return void 
	 */
	public function parseTemplateCallback($objTemplate)
	{
		if ( \strpos($objTemplate->getName(), 'fe_page') === false ) 
		{
			$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
					
			$GLOBALS['PCT_SEO']['FE_PAGE_PROCESSED'] = true;
			// handle SEP_SCRIPT_FILEs that has not been added to fe_page yet (e.g. coming from inserttags)	
			if( isset($GLOBALS['SEO_SCRIPTS_FILE']) && empty($GLOBALS['SEO_SCRIPTS_FILE']) === false )
			{
				$strProtocol = \PCT\SEO::getProtocol();
				
				$tmp = \array_unique( \array_filter($GLOBALS['SEO_SCRIPTS_FILE']) );
				
				foreach($tmp as $file)
				{
					$file = str_replace(array('|static','|print','|async'), '', $file);
					
					// skip files already processed or that does not exist
					if( in_array($file, $GLOBALS['SEO_SCRIPTS_FILE_PROCESSED']) || \file_exists($rootDir.'/'.$file) === false )
					{
						continue;
					}

					if( $strProtocol == 'http2' )
					{
						$GLOBALS['TL_JQUERY'][]	= '<script src="'.$file.'?v='.\filemtime($rootDir.'/'.$file).'"></script>';
						// remember processed files
						$GLOBALS['SEO_SCRIPTS_FILE_PROCESSED'][] = $file;
					}
				}
				unset($tmp);
			}
			
			return;
		}

		global $objPage;

		if( strlen($objPage->pct_structured_data) > 0 )
		{
			$objTemplate->pct_structured_data = \Contao\StringUtil::decodeEntities($objPage->pct_structured_data);
		}

		// HTTP1/2
		if( empty(\Contao\Config::get('pct_seo_protocol')) === false )
		{
			// add a template variable
			$objTemplate->seo_protocol = \PCT\SEO::getProtocol(); // http1, http2
		}
		
		// SEO scripte single src files
		$objTemplate->seo_scripts_files = array();
		
		// if ThemeDesigner is active, place all SEO SCRIPT FILES in TL_JAVASCRIPT
		if( (boolean)\Contao\Config::get('pct_themedesigner_hidden') === false && isset($GLOBALS['SEO_SCRIPTS_FILE']) && !empty($GLOBALS['SEO_SCRIPTS_FILE']) )
		{
			$tmp = \array_unique( \array_filter($GLOBALS['SEO_SCRIPTS_FILE']) );
			foreach($tmp as $file)
			{
				#$GLOBALS['TL_JQUERY'][]	= '<script src="'.$file.'"></script>';
				$GLOBALS['TL_JAVASCRIPT'][]	= $file;
			}
			unset($GLOBALS['SEO_SCRIPTS_FILE']);
		}
	}

	
	/**
	 * Find comment section in templates to extract
	 * @param mixed $objTemplate 
	 * @return void 
	 */
	public function collectScriptSections($strBuffer, $strTemplate)
	{
		$arrMatches = array();
		$preg = preg_match_all('/SEO-SCRIPT-START(.*?)SEO-SCRIPT-STOP/s', $strBuffer,$arrMatches);
		if( !$preg )
		{
			return $strBuffer;
		}
		
		$block_start = '<!-- SEO-SCRIPT-START -->';
		$block_stop = '<!-- SEO-SCRIPT-STOP -->';
		
		foreach($arrMatches[1] as $match)
		{
			$match = ltrim(ltrim($match),'-->');
			$match = rtrim(rtrim($match),'<!--');
			// add to end of body
			#$GLOBALS['TL_BODY'][] = $match;
			// remove script from source code
			$strBuffer = str_replace(array($block_start,$block_stop,$match), '', $strBuffer);

			$GLOBALS['SEO_SCRIPTS'][] = $match;
		}
		
		return $strBuffer;
	}



	/**
	 * Add page record information directly to the fe_page template
	 * @param object
	 * @param object
	 */
	public function generatePageCallback($objPage, $objLayout, $objPageRegular)
	{	
		// HTTP1/2
		if( empty(\Contao\Config::get('pct_seo_protocol')) === false )
		{
			$strProtocol = \PCT\SEO::getProtocol(); // http1, http2
			
			$version = str_replace(array('http','https'),'',$strProtocol);
			$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
			
			if( isset($GLOBALS['TL_CSS']) && \is_array($GLOBALS['TL_CSS']) )
			{
				$GLOBALS['TL_CSS'] = \array_unique($GLOBALS['TL_CSS']);
			}
			
			if( isset($GLOBALS['TL_JAVASCRIPT']) && \is_array($GLOBALS['TL_JAVASCRIPT']) )
			{
				$GLOBALS['TL_JAVASCRIPT'] = \array_unique($GLOBALS['TL_JAVASCRIPT']);
			}
			
			// http1.x
			if( version_compare($version,'2','<') )
			{
				// add |static
				if( !empty($GLOBALS['TL_JAVASCRIPT']) && \is_array($GLOBALS['TL_JAVASCRIPT']) )
				{
					foreach( $GLOBALS['TL_JAVASCRIPT'] as $i => $v )
					{
						if( strpos($v,'|static') !== false )
						{
							continue;
						}

						$v = str_replace('|static','',$v);
						if( strpos($v, '|') !== false )
						{
							$tmp = explode('|', $v);
							$v = $tmp[0];
							unset($tmp);
						}

						if( \file_exists($rootDir.'/'.$v) )
						{
							$GLOBALS['TL_JAVASCRIPT'][$i] = $v.'|static|'.@\filemtime($rootDir.'/'.$v);
						}
					}
				}
				if( !empty($GLOBALS['TL_CSS']) && \is_array($GLOBALS['TL_CSS']) )
				{
					foreach( $GLOBALS['TL_CSS'] as $i => $v )
					{
						if( strpos($v,'|static') !== false )
						{
							continue;
						}
						
						$v = str_replace('|static','',$v);
						if( strpos($v, '|') !== false )
						{
							$tmp = explode('|', $v);
							$v = $tmp[0];
							unset($tmp);
						}
						
						if( \file_exists($rootDir.'/'.$v) )
						{
							$GLOBALS['TL_CSS'][$i] = $v.'|static|'.@\filemtime($rootDir.'/'.$v);
						}
					}
				}
			}
			// http2.x
			else if( version_compare($version,'2','>=') )
			{
				// strip |static
				if( !empty($GLOBALS['TL_JAVASCRIPT']) && \is_array($GLOBALS['TL_JAVASCRIPT']) )
				{
					foreach( $GLOBALS['TL_JAVASCRIPT'] as $i => $v )
					{
						$v = str_replace('|static','',$v);
						if( strpos($v, '|') !== false )
						{
							$tmp = explode('|', $v);
							$v = $tmp[0];
							unset($tmp);
						}

						if( \file_exists($rootDir.'/'.$v) )
						{
							$GLOBALS['TL_JAVASCRIPT'][$i] = $v.'|'.@\filemtime($rootDir.'/'.$v);
						}
					}
				}
				if( !empty($GLOBALS['TL_CSS']) && \is_array($GLOBALS['TL_CSS']) )
				{
					$GLOBALS['TL_CSS'] = \array_unique($GLOBALS['TL_CSS']);
					foreach( $GLOBALS['TL_CSS'] as $i => $v )
					{
						$v = str_replace('|static','',$v);
						if( strpos($v, '|') !== false )
						{
							$tmp = explode('|', $v);
							$v = $tmp[0];
							unset($tmp);
						}

						if( \file_exists($rootDir.'/'.$v) )
						{
							$GLOBALS['TL_CSS'][$i] = $v.'|'.@\filemtime($rootDir.'/'.$v);
						}
					}
				}
			}
		}
	}
}