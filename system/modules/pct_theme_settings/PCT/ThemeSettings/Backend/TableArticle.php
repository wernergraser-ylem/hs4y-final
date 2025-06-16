<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 * @link		http://contao.org
 */
 

/**
 * Namespace
 */
namespace PCT\ThemeSettings\Backend;

use Contao\BackendTemplate;
use Contao\Backend;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\Environment;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\ArrayUtil;
use Contao\System;
use Contao\Image;
use Contao\Input;
use Contao\Model;
use Contao\Versions;
use PCT\License;

/**
 * Class file
 * TableArticle
 */
class TableArticle extends Backend
{
	/**
	 * Append the themesettings button to the opertaions list
	 * @param object
	 * called from onload_callback
	 */
	public function addThemeSettingsButton($objDC)
	{
		ArrayUtil::arrayInsert($GLOBALS['TL_DCA'][$objDC->table]['list']['operations'],count($GLOBALS['TL_DCA'][$objDC->table]['list']['operations'] ?? array()),array
		(
			'theme_settings' => array
			(
				'href'                => 'act=edit',
				'icon'                => 'modules.svg',
				'title' 			  => $GLOBALS['TL_LANG']['theme_settings'] ?? 'theme_settings',
				'button_callback'     => array(\get_class($this), 'themeSettingsButton'),
			))
		);
	}


	/**
	 * Save the uuid instead of file path
	 * @var string
	 * @var object
	 * @return string
	 */
	public function saveUuidFromPath($varValue, $objDC)
	{
		$objFile = \Contao\FilesModel::findByPath($varValue);
		if( $objFile === null )
		{
			return $varValue;
		}
		return \Contao\StringUtil::binToUuid( $objFile->uuid );
	}


	/**
	 * Load the file path from the uuid
	 * @var string
	 * @var object
	 * @return string
	 */
	public function loadPathFromUuid($varValue, $objDC)
	{
		$objFile = \Contao\FilesModel::findByPk($varValue);
		if( $objFile === null )
		{
			return $varValue;
		}
		return $objFile->path;
	}


	/**
	 * Filter root, rootFallback pages to non pct_theme pages when license is locked
	 * @param mixed $objDC 
	 * @return void 
	 */
	public function filterPagesOnLockdown($objDC)
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) && License::isLocked() === true ) 
		{
			$objPCT_Roots = PageModel::findBy(array('(type=? OR type=?) && pct_theme!=""'),array('root','rootfallback') );
			if( $objPCT_Roots === null )
			{
				return;
			}

			$objRoots = PageModel::findBy(array('(type=? OR type=?) && id NOT IN('.\implode( ',',$objPCT_Roots->fetchEach('id') ).')'),array('root','rootfallback') );
			if( $objRoots !== null )
			{
				$GLOBALS['TL_DCA']['tl_page']['list']['sorting']['root'] = $objRoots->fetchEach('id');
			}
		}
	}


	/**
	 * Return the theme settings button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * 
	 * @return string
	 */
	public function themeSettingsButton($row, $href, $label, $title, $icon, $attributes)
	{
		$security = System::getContainer()->get('security.helper');

		if (!$security->isGranted(ContaoCorePermissions::USER_CAN_EDIT_FIELDS_OF_TABLE, 'tl_article'))
		{
			return Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)) . ' ';
		}

		$objPage = PageModel::findById($row['pid']);

		if( !$security->isGranted(ContaoCorePermissions::USER_CAN_EDIT_ARTICLES, $objPage->row()) )
		{
			return Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)) . ' ';
		}

		if( isset($GLOBALS['TL_LANG']['theme_settings']) )
		{
			$title = $GLOBALS['TL_LANG']['theme_settings'];
		}

		$objThemeSettingsButton = new BackendTemplate('be_article_themesettingsbutton');
		$objThemeSettingsButton->setData( $row );

		return '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . StringUtil::specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . $objThemeSettingsButton->parse(); '</a> ';
	}

	
	/*
	* Toggle theme settings field ajax listener
	* @param object
	*/
	public function toggleThemeSettingsFieldValue($objDC)
	{
		if( (boolean)Environment::get('isAjaxRequest') === false || (int)Input::post('elem') < 1 || Input::post('action') != 'toggleThemeSettingsFieldValue' )
		{
			return;
		}

		$intId = (int)Input::post('elem');
		$varValue =  Input::post('state');
		$strField = Input::post('field');
		
		$arrFields = \explode(',',$strField);
		$arrValues = \explode(',',$varValue);
		
		// @var object Version
		$objVersions = new Versions($objDC->table, $intId );
		$objVersions->initialize();
 	
		// @var object
		$objModel = Model::getClassFromTable($objDC->table)::findByPk( $intId  );
		
		foreach($arrFields as $i => $strField)
		{
			$varValue = $arrValues[$i] ?? '';
			// update the record
		
			// Trigger the save_callback
			if ( isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$strField]['save_callback']) && is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$strField]['save_callback']))
			{
				foreach ($GLOBALS['TL_DCA'][$objDC->table]['fields'][$strField]['save_callback'] as $callback)
				{
					$varValue = System::importStatic($callback[0])->{$callback[1]}($varValue,$objDC);
				}
			}

			$objModel->__set('tstamp', time() );
			$objModel->__set($strField,$varValue);
			$objModel->save();
		}
	   // create new version
	   $objVersions->create();
   }


   /**
	* Handle POST ajax actions
	* @param stirng
	* @param object
    */
   public function executePostActionsCallback($strAction, $objDC)
   {
		if( $strAction == 'toggleThemeSettingsFieldValue' )
		{
			$this->toggleThemeSettingsFieldValue($objDC);
		}
   }
}