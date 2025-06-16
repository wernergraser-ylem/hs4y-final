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
namespace PCT;


/**
 * Imports
 */
use Contao\Environment;
use Contao\UserModel;
use Contao\NewsModel;
use Contao\CalendarEventsModel;
use Contao\Controller;
use Contao\Date;
use Contao\System;

/**
 * Class file
 * SEO
 */
class SEO
{
	/**
	 * Return the seo protocol depending on system settings
	 * @return string
	 */
	public static function getProtocol()
	{
		if( empty(\Contao\Config::get('pct_seo_protocol')) === true)
		{
			return '';
		}
		
		$strReturn = strtolower( \Contao\Config::get('pct_seo_protocol') );

		// by SERVER
		if( \Contao\Config::get('pct_seo_protocol') == 'auto' )
		{
			$strReturn = str_replace(array('http','https','/'),'',strtolower( $_SERVER['SERVER_PROTOCOL'] ));
			$strReturn = 'http'.explode('.',$strReturn)[0];
		}

		return $strReturn;
	}


	/**
	 * Generate a google json ld string for structured data depending on an incoming template||stdclass object
	 * @param object
	 * @param array
	 * @return string JSON
	 */
	public static function writeJSON($objTemplate, $arrCustom=array())
	{
		$strTemplate = $objTemplate->strTemplate;
		
		if( \method_exists($objTemplate,'getName') )
		{
			$strTemplate = $objTemplate->getName();
		}
		
		$tmp = \explode('_',$strTemplate);
		switch($tmp[0])
		{
			// Events
			case 'event':
				$arrJSON = static::getJsonByEvents($objTemplate);
				break;
			// News
			case 'news':
				$arrJSON = static::getJsonByNews($objTemplate);
				break;
			default: 
				break;
		}
		unset($tmp);

		// custom data
		if( empty($arrCustom) === false && \is_array($arrCustom) )
		{
			$arrJSON = \array_merge($arrJSON, $arrCustom);
		}

		$strJSON = \json_encode($arrJSON,JSON_UNESCAPED_SLASHES);

		// HOOK
		if (empty($GLOBALS['SEO']['writeJSON']) === false && \is_array($GLOBALS['SEO']['writeJSON']) === true )
		{
			foreach($GLOBALS['SEO']['writeJSON'] as $callback)
			{
				$strJSON = \Contao\System::importStatic($callback[0])->{$callback[1]}($objTemplate,$arrJSON);
			}
		}
	
		// add json to page
		$GLOBALS['TL_HEAD'][] = '<script type="application/ld+json">'. $strJSON . '</script>';
	}


	/**
	 * Prepare a google json structured data array based on an events template object
	 * @param object
	 * @param array
	 * @return string JSON
	 */
	protected static function getJsonByEvents($objTemplate)
	{
		if( empty($objTemplate) === true )
		{
			return '';
		}

		// @var object
		$objRow = CalendarEventsModel::findByPk($objTemplate->id);
		// @var object
		$objAuthor = UserModel::findByPk($objRow->author);
		
		$intStart = $objRow->startDate;
		$intStop = $objRow->endDate;
		if( (boolean)$objRow->addTime === true )
		{
			$intStart = $objRow->startTime;
			$intStop = $objRow->endTime;
		}
		
		$arrReturn = array
		(
			'@context' 	=> 'https://schema.org',
			'@type' 	=> 'Event',
			'mainEntityOfPage' => array
			(
				'@type' => 'WebPage',
				'@id' 	=> Environment::get('base').System::getContainer()->get('contao.insert_tag.parser')->replace('{{event_url::'.$objTemplate->id.'}}'),
			),
			'name' => \strip_tags( $objTemplate->title ),
			'description' => \strip_tags($objTemplate->teaser),
			'startDate' => Date::parse('c',$intStart),
			'endDate' => Date::parse('c',$intStop),
			'author' => array
			(
				"@type" => "Person",
				"name" => $objAuthor->name,
			),
			'location' => array
			(
				'@type' => 'Place',
				'name' => $objTemplate->location,
			),
		);

		// image
		if( $objTemplate->addImage )
		{
			$arrReturn['image'] = Environment::get('base').$objTemplate->singleSRC;
		}
		
		return $arrReturn;
	}


	/**
	 * Prepare a google json structured data array based on a news template object
	 * @param object
	 * @param array
	 * @return array
	 */
	protected static function getJsonByNews($objTemplate)
	{
		if( empty($objTemplate) === true )
		{
			return '';
		}

		// @var object
		$objRow = NewsModel::findByPk($objTemplate->id);
		// @var object
		$objAuthor = UserModel::findByPk($objRow->author);

		$arrReturn = array
		(
			'@context' 	=> 'https://schema.org',
			'@type' 	=> 'NewsArticle',
			'mainEntityOfPage' => array
			(
				'@type' => 'WebPage',
				'@id' 	=> Environment::get('base').System::getContainer()->get('contao.insert_tag.parser')->replace('{{news_url::'.$objTemplate->id.'}}'),
			),
			'headline' => \strip_tags( $objTemplate->headline ?: $objTemplate->name ),
			'description' => \strip_tags($objTemplate->teaser),
			'datePublished' => Date::parse('c',$objTemplate->timestamp),
			'dateModified' => Date::parse('c',$objTemplate->tstamp),
			'author' => array
			(
				"@type" => "Person",
				"name" => $objAuthor->name,
			)
		);

		// image
		if( $objTemplate->addImage )
		{
			$arrReturn['image'] = Environment::get('base').$objTemplate->singleSRC;
		}

		return $arrReturn;
	}

	
	
	/**
	 * Prepare the file paths coming from SEO SCRIPT FILES and return them as relative paths in an array
	 * @return array
	 */	
	public static function getSeoScriptFiles()
	{
		$arrReturn = array();
		
		if( !isset($GLOBALS['SEO_SCRIPTS_FILE_PROCESSED']) )
		{
			$GLOBALS['SEO_SCRIPTS_FILE_PROCESSED'] = array();
		}
		
		if( isset($GLOBALS['SEO_SCRIPTS_FILE']) && !empty($GLOBALS['SEO_SCRIPTS_FILE']) )
		{
			$files = array();
			$tmp = \array_unique( \array_filter($GLOBALS['SEO_SCRIPTS_FILE']) );
			foreach($tmp as $file)
			{
				$arr = parse_url($file);
				if( isset($arr['path']) && !empty($arr['path']) )
				{
					$file = $arr['path'];
				}
				$file = str_replace(array('|static','|print','|async'), '', $file);
				
				// skip files already processed
				if( in_array($file, $GLOBALS['SEO_SCRIPTS_FILE_PROCESSED']) )
				{
					continue;
				}
				
				$arrReturn[] = $file;
				// remember processed files
				$GLOBALS['SEO_SCRIPTS_FILE_PROCESSED'][] = $file;
			}
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Prepare the inline scripts coming from SEO_SCRIPT_START/STOP wrappers and return them collected as array
	 * @return array
	 */	
	public static function getSeoScripts()
	{
		$arrReturn = array();
		foreach( $GLOBALS['SEO_SCRIPTS'] as $script )
		{
			// remove <script>,</script>
			$arrReturn[] = \str_replace(array('<script>','</script>'), '', $script);
		}	
		return $arrReturn;
	}
	
}