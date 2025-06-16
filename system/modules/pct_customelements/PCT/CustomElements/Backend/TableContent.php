<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017, Premium Contao Webworks, Premium Contao Themes
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
 * TableContent
 */
class TableContent extends \Contao\Backend
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
	 * Modify the DCA
	 * @param object
	 * 
	 * called from onload_callback
	 */
	public function modifyDCA($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ContentModel::findByPk($objDC->id);
		}
		
		$objCustomElemnts = new \PCT\CustomElements\Core\CustomElements;
		
		$strSelectionField = $objCustomElemnts->getSelectionField($objDC->table);
		$arrCustomElements = $objCustomElemnts->getCustomElements($objDC->table);
		if( $objDC->activeRecord !== null && \in_array($objDC->activeRecord->{$strSelectionField}, $arrCustomElements) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array('PCT\CustomElements\Backend\BackendIntegration','getTemplates');
		}

		foreach($arrCustomElements as $strAlias)
		{
			$wrapper_key = '';
			if( isset($GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['start']) && \in_array($strAlias, $GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['start']) )
			{
				$wrapper_key = 'start';
			}
			else if( isset($GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['stop']) && \in_array($strAlias, $GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['stop']) )
			{
				$wrapper_key = 'stop';
			}
			else if( isset($GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['seperator']) && \in_array($strAlias, $GLOBALS['PCT_CUSTOMELEMENTS_WRAPPERS']['separator']) )
			{
				$wrapper_key = 'seperator';
			}

			if( empty($wrapper_key) === false && \Contao\Input::get('act') === null )
			{
				$GLOBALS['TL_LANG']['CTE']['pct_customelements_node'] = '';
				$GLOBALS['TL_WRAPPERS'][$wrapper_key][] = $strAlias;
				#if( \Contao\Input::get('act') == '' || \Contao\Input::get('act') === null || \Contao\Input::get('act') == 'select' )
				#{
				#	unset($GLOBALS['TL_CTE']['pct_customelements_node'][$strAlias]);
				#}
			}
		}	
	}
}
