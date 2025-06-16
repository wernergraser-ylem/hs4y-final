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
 * Class file
 * RevolutionSlider Factory
 * Provides methods to generate a new slider instance
 */
class Factory
{
	/**
	 * Return Slider object by id
	 * @param integer
	 * @param boolean
	 * @return object	RevolutionSlider
	 */
	public static function findById($intId,$bolFindSlides=true)
	{
		$objSlider = \RevolutionSlider\Models\Slider::findByPk($intId);
		
		if($objSlider === null)
		{
			return null;
		}
		
		// create new Revolution Slider instance
		$objRevoSlider = new \RevolutionSlider\Core\RevolutionSlider($objSlider->row());
		
		// generate slides
		if($bolFindSlides)
		{
			$objRevoSlider->findSlides($intId);
		}
			
		return $objRevoSlider;
	}
}