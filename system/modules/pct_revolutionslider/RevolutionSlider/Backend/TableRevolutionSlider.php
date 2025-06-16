<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright	Tim Gatzky 2013
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace RevolutionSlider\Backend;

/**
 * Imports
 */
use Contao\Image;
use Contao\StringUtil;

/**
 * Class file
 * TableRevolutionSlider
 * Provide methods for table tl_revolutionslider
 */
class TableRevolutionSlider extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import(\Contao\BackendUser::class, 'User');	
	}


	/**
	 * Modify the palettes 
	 * @param object
	 * @return object
	 */
	public function modifyPalettes($objDC)
	{
		if( !$objDC->activeRecord )
		{
			$objDC->activeRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if(!in_array($objDC->activeRecord->sliderStyle, array('fullscreen')))
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['fullScreenOffsetContainer']);
		}

		// navigation thumbs:
		if( !in_array($objDC->activeRecord->navigationType, $GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES']['thumbs']) )
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['thumbAmount']);
		}

		$ref = \array_merge($GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES']['thumbs'],$GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES']['tabs']);
		if( !in_array($objDC->activeRecord->navigationType, $ref) )
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['navigationSize']);
		}
	}


	/**
	 * Return the navigationType array
	 * @param object
	 * @return array
	 */
	public function getNavigationTypes()
	{
		$arrReturn = array();
		foreach($GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES'] as $k => $arr)
		{
			\sort($arr);
			$arrReturn[ $k ] = $arr;
		}
		return $arrReturn;
	}


	/**
	 * Return the arrowType array
	 * @param object
	 * @return array
	 */
	public function getArrowTypes()
	{
		$arrReturn = $GLOBALS['REVOLUTIONSLIDER']['ARROW_STYLES'];
		\sort($arrReturn);
		return $arrReturn;
	}
}
