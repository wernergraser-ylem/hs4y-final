<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\AutoGrid\Backend;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\StringUtil;
use PCT\AutoGrid\Controller;

/**
 * Class file
 * BackendIntegration
 */
class BackendIntegration extends \Contao\Backend
{
	/**
	 * Load Autogrid scripts to backend template
	 * @object template
	 */
	public function parseTemplateCallback($objTemplate)
	{
		if( Controller::isFrontend() )
		{
			return;
		}
		
		if( in_array(\Contao\Input::get('act'), array('edit','show')) || \Contao\Input::get('switch') != '' || \Contao\Environment::get('isAjaxRequest') )
		{
			return;
		}
		else if( (boolean)\Contao\Config::get('pct_autogrid_disable_be_preview') === true )
		{
			return;
		}
		
		if($objTemplate->getName() == 'be_main')
		{
			// <head>
			#$objTemplate->javascripts .= '<script>jQuery.noConflict();</script>';
			
			// pass Autogrid related head content TL_HEAD 
			if( isset($GLOBALS['TL_HEAD::PCT_AUTOGRID']) && is_array($GLOBALS['TL_HEAD::PCT_AUTOGRID']) && empty($GLOBALS['TL_HEAD::PCT_AUTOGRID']) === false)
			{
				// stip duplicate gridPreview keys 
				if( isset($GLOBALS['PCT_AUTOGRID']['autogridGridPreviews']) && empty($GLOBALS['PCT_AUTOGRID']['autogridGridPreviews']) === false )
				{
					$arrProcessed = array();
					foreach($GLOBALS['PCT_AUTOGRID']['autogridGridPreviews'] as $id => $data)
					{
						if( in_array($id, $arrProcessed) )
						{
							unset($GLOBALS['PCT_AUTOGRID']['autogridGridPreviews'][$id]);
							continue;
						}
						$arrProcessed = array_unique( \array_merge($data['ids'] ?? array(), $arrProcessed) );
					}
				}
				
				$objTemplate->javascripts .= implode('',$GLOBALS['TL_HEAD::PCT_AUTOGRID']);
			
				// @var object
				$objAutoGridTpl = new \Contao\BackendTemplate('be_js_autogrid');
				$objAutoGridTpl->context = 'body';
				$objAutoGridTpl->table = \Contao\Input::get('table');
				$objAutoGridTpl->contao_version = ContaoCoreBundle::getVersion();
				
				// viewport panel 
				$objViewportPanel = new \Contao\BackendTemplate('be_autogrid_viewport_panel');
				$strViewportPanel = $objViewportPanel->parse();
				$objAutoGridTpl->viewport_panel = StringUtil::substrHtml($strViewportPanel,strlen($strViewportPanel));

				// </body>
				$objTemplate->mootools .= $objAutoGridTpl->parse();
				
				// check if current list-view will have AG elements
				if( isset($GLOBALS['PCT_AUTOGRID']['autogridGridPreviews']) && empty($GLOBALS['PCT_AUTOGRID']['autogridGridPreviews']) === false )
				{
					$objTemplate->attributes .= ' data-has_autogrid="true"';
				}
			}
		}
	}
}