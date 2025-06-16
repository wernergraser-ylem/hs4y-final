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
namespace PCT\AutoGrid;

use Contao\System;

/**
 * Class file
 * Controller
 */
class Controller extends \Contao\Controller
{
	/**
	 * Update the autogrid_id references for new created elements on copy etc.
	 * @param array
	 * @return array
	 */
	public static function updateElementsWithIdentifyier($strTable, $arrElements)
	{
		$objDatabase = \Contao\Database::getInstance();
		$processed = array();
		$updated = array();
	
		$strModel = '';
		switch($strTable)
		{
			case 'tl_content':
				$strModel = 'PCT\AutoGrid\Models\ContentModel';
			break;
			case 'tl_form_field':
				$strModel = 'PCT\AutoGrid\Models\FormFieldModel';
			break;
			default: 
				$strModel = \Contao\Model::getClassFromTable($strTable);
			break;
		}

		foreach($arrElements as $id)
		{
			if( \in_array($id, $processed) )
			{
				continue;
			}

			$objModel = $strModel::findByPk($id);
			$objStop = null;
			
			if( \in_array($objModel->type, $GLOBALS['PCT_AUTOGRID']['startElements']) )
			{
				$autogrid_id = $objModel->autogrid_id;
				if( (int)$autogrid_id < 1 )
				{
					$autogrid_id = $objModel->id;
				}

				$type = str_replace('Start', 'Stop', $objModel->type);
				
				// fetch STOP [tl_content]
				if( $strTable == 'tl_content' )
				{
					$objStop = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE id!=? AND pid=? AND ptable=? AND type=? AND autogrid_id=? AND id IN(".\implode(',',$arrElements).")")->limit(1)
					->execute($objModel->id,$objModel->pid,$objModel->ptable,$type,$autogrid_id);
				}
				else if( $strTable == 'tl_form_field' )
				{
					$objStop = $objDatabase->prepare("SELECT * FROM ".$strTable." WHERE id!=? AND pid=? AND type=? AND autogrid_id=? AND id IN(".\implode(',',$arrElements).")")->limit(1)
					->execute($objModel->id,$objModel->pid,$type,$autogrid_id);
				}
			}

			if( $objStop === null || (int)$objStop->id < 1 )
			{
				System::getContainer()->get('monolog.logger.contao.error')->info('No STOP element found for '.$strTable.'.'.$id);
				continue;
			}

			$start = $id;
			$stop = $objStop->id;
			$ident = $start;
			
			// flag start and stop with identifyer
			$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set( array('autogrid_id'=>$ident) )->execute($start);
			$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set( array('autogrid_id'=>$ident) )->execute($stop);

			$updated[] = $start;
			$updated[] = $stop;

			$processed[] = $start;
			$processed[] = $stop;
		}

		return $updated;
	}


	/**
	 * Update the autogrid_id references for new created elements that do not have an autogrid_id yet
	 * @param array
	 * @return array
	 */
	public static function updateElementsWithoutIdentifyier($strTable, $arrElements)
	{
		$objDatabase = \Contao\Database::getInstance();
		$processed = array();
		$updated = array();
		foreach($arrElements as $type => $arrIds)
		{
			if(in_array($type, $processed))
			{
				continue;
			}
			
			$k = str_replace('Start','Stop',$type);
			$arrStops = $arrElements[$k];
			foreach($arrIds as $i => $id)
			{
				$start = $id;
				$stop = $arrStops[$i];
				$ident = $start;
				// flag start and stop with identifyer
				$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set( array('autogrid_id'=>$ident) )->execute($start);
				$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set( array('autogrid_id'=>$ident) )->execute($stop);
				
				$updated[] = $start;
				$updated[] = $stop;
			}
			
			// remove stops of sibling type
			unset($arrElements[$k]);
			// mark type as being processed
			$processed[] = $type;
			$processed[] = $k;
		}
		
		return $updated;
	}


	/**	
	 * Init system
	 * called from initializeSystem Hook
	 */
	public function initSystem()
	{
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		
		// register backend keys
		if( Controller::isBackend() && ( \in_array('news', $bundles) || \in_array('ContaoNewsBundle',$bundles) ) )
		{
			$GLOBALS['BE_MOD']['content']['news']['grid_preset'] = array('PCT\AutoGrid\Backend\PageGridPreset','run'); 
		}
		if( Controller::isBackend() && ( \in_array('calendar', $bundles) || \in_array('ContaoCalendarBundle',$bundles) ) )
		{
			$GLOBALS['BE_MOD']['content']['calendar']['grid_preset'] = array('PCT\AutoGrid\Backend\PageGridPreset','run'); 
		}
	}


	/**
	 * Include grid css and jquery on backend template
	 * called from initializeSystem Hook
	 */
	public function loadAssets()
	{
		if( Controller::isBackend() === false || strlen(strpos(\Contao\Environment::get('requestUri'), '/contao/install')) > 0 )
		{
			return;
		}

		if( !\Contao\System::getContainer()->get('contao.security.token_checker')->hasBackendUser() )
		{
			return;
		}
		
		if(in_array(\Contao\Input::get('act'), array('edit','show')) || (\Contao\Input::get('field') != '' || \Contao\Input::get('name') != '' || \Contao\Input::get('switch') != '') || \Contao\Environment::get('isAjaxRequest') )
		{
			return;
		}
		else if( (boolean)\Contao\Config::get('pct_autogrid_disable_be_preview') === true || (boolean)$GLOBALS['PCT_AUTOGRID']['assetsLoaded'] === true )
		{
			// flag
			$GLOBALS['PCT_AUTOGRID']['assetsLoaded'] = true;
			return;
		}

		// define Contaos static urls
		#static::setStaticUrls();
			
		// load backend css, grid_presets.css
		$GLOBALS['TL_CSS'][] = $GLOBALS['PCT_AUTOGRID']['css'];
		$GLOBALS['TL_CSS'][] = $GLOBALS['PCT_AUTOGRID']['be_css'];
		$GLOBALS['TL_CSS'][] = $GLOBALS['PCT_AUTOGRID']['presets_css'];
		
		// load jquery
		$GLOBALS['TL_JAVASCRIPT'][] = 'assets/jquery/js/jquery.min.js|static';
		$GLOBALS['TL_HEAD::PCT_AUTOGRID'][] = '<script>jQuery.noConflict();</script>';
		
		// flag
		$GLOBALS['PCT_AUTOGRID']['assetsLoaded'] = true;
	}


	/**
	 * Check if system is in back end
	 * @return bool 
	 */
	public static function isBackend()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) ) 
		{
			return true;
		}
		return false;
	}


	/**
	 * Check if system is in front end
	 * @return bool 
	 */
	public static function isFrontend()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) ) 
		{
			return true;
		}
		return false;
	}


	/**
	 * Return default request token
	 * @return string 
	 */
	public static function request_token()
	{
		return System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
	}


	/**
	 * Return project directory
	 * @return string
	 */
	public static function rootDir()
	{
		return System::getContainer()->getParameter('kernel.project_dir');
	}
}