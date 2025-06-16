<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2020, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Backend;

/**
 * Class file
 * TableModule
 */
class TableModule extends \Contao\Backend
{	
	/**
	 * Modify the DCA
	 * @param object
	 * 
	 * called from onload_callback
	 */
	public function modifyDCA($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ModuleModel::findByPk($objDC->id);
		}
		
		$objCustomElemnts = new \PCT\CustomElements\Core\CustomElements;
		
		$strSelectionField = $objCustomElemnts->getSelectionField($objDC->table);
		$arrCustomElements = $objCustomElemnts->getCustomElements($objDC->table);
		if( $objDC->activeRecord !== null && \in_array($objDC->activeRecord->{$strSelectionField}, $arrCustomElements) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array('PCT\CustomElements\Backend\BackendIntegration','getTemplates');
		}
	}
}
