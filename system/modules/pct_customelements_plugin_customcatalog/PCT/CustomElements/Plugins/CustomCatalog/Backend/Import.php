<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 	Tim Gatzky 2015
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package  	pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

/**
 * Imports
 */
use PCT\CustomElements\Core\CustomElements as CustomElements;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog as CustomCatalog;

/**
 * Class TableCustomElement
 */
class Import extends \PCT\CustomElements\Backend\Import
{
	/**
	 * Add the custom catalog tables to the import chain
	 */
	public function addCustomCatalogImports($objCaller)
	{
		// reset the update check flag
		$objBackendIntegration = new \PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration();
		$objBackendIntegration->enableDatabaseUpdateCheck();
		
		// tl_pct_customcatalog
		$objCaller->arrImportChain['tl_pct_customcatalog'] = array
		(
			'reference' => array('pid','tl_pct_customelement.id'),
			'master'	=> 'id',	
		);
		
		// tl_pct_customcatalog_groupset
		$objCaller->arrImportChain['tl_pct_customcatalog_groupset'] = array
		(
			'reference' => array('pid','tl_pct_customelement.id'),
			'master'	=> 'id',	
		);
		
		// tl_pct_customcatalog_filterset
		$objCaller->arrImportChain['tl_pct_customcatalog_filterset'] = array
		(
			'reference' => array('pid','tl_pct_customcatalog.id'),
			'master'	=> 'id',	
		);
		
		// tl_pct_customcatalog_filterset
		$objCaller->arrImportChain['tl_pct_customcatalog_filter'] = array
		(
			'reference' => array('pid','tl_pct_customcatalog_filterset.id'),
			'master'	=> 'id',	
		);
		
		// tl_pct_customcatalog_language
		#$objCaller->arrImportChain['tl_pct_customcatalog_language'] = array
		#(
		#	'reference' => array(),
		#	'master'	=> 'id',	
		#);
		
		// tl_pct_customcatalog_tags
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		if(in_array('pct_customelements_attribute_tags', $bundles))
		{
			$objCaller->arrImportChain['tl_pct_customelement_tags'] = array
			(
				'reference' => array(),
				'master'	=> 'id',	
			);
		}
		
		$this->arrImportChain = $objCaller->arrImportChain;
	}
}