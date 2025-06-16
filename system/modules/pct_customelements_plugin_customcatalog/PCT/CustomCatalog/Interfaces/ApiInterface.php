<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomCatalog\Interfaces;

/**
 * Class file
 * ApiInterface
 * Sets the mendatory methods for an api class
 */
interface ApiInterface
{
	/**
	 * Run the api
	 */
	public function run();
}