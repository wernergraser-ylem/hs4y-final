<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Interfaces;

/**
 * Class file
 * Attribute
 */
interface Attribute
{
	/**
	 * Return the DCA field definition
	 * @return array
	 */	
	public function getFieldDefinition();
}