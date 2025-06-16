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
 * @api			Standard API class
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomCatalog\API\Standard;

/**
 * Class file
 * Core
 * Provides basic api functions and delegates the import and export features
 */
class Core extends \PCT\CustomCatalog\API\Base
{
	/**
	 * Run
	 * {@inheritdoc}
	 * (is mandatory by interface)
	 */
	public function run()
	{
		// check if a certain mode is selected and has a custom callback class
		$arrCallback = $GLOBALS['PCT_CUSTOMCATALOG']['API'][$this->type]['modes'][$this->mode]['callback'];
		if(is_array($arrCallback) && !empty($arrCallback))
		{
			$objCallback = new $arrCallback[0]( $this->getData() );
			$objCallback->{$arrCallback[1]}();
		}
	}
}