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
 * JobInterface
 * Sets the mendatory methods for an api job class
 */
interface JobInterface
{
	/**
	 * Execute the job
	 * @return null|exception
	 */
	public function execute();
}