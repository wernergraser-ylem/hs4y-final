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
use RevolutionSlider\Core\Slide;

/**
 * Class file
 * RevolutionSlider SlideFactory
 * Provides methods to generate slider slides
 */
class SlideFactory
{
	/**
	 * Return a slide object by id
	 * @param integer
	 * @return object	RevoutionSliderSlide
	 */
	public static function findById($intId)
	{
		$objSlide = \RevolutionSlider\Models\Slides::findByPk($intId);
		
		if($objSlide === null)
		{
			return null;
		}
		
		return new Slide($objSlide->row());
	}
	
	/**
	 * Return all RevolutionSliderSlide objects from a slider
	 * @param integer
	 * @return array
	 */
	public static function findAllBySlider($intSlider)
	{
		// fetch slides
		$objModels = \RevolutionSlider\Models\Slides::findBy( array('pid=?','published=?'), array($intSlider,1), array('order' => 'sorting') );
		if( $objModels === null )
		{
			return array();
		}

		$arrReturn = array();
		foreach($objModels as $objModel)
		{
			$objSlide = new Slide($objModel->row());
			$arrReturn[] = $objSlide;
		}
		
		return $arrReturn;
	}
}