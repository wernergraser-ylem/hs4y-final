<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\ThemeDesigner;

/**
 * Imports
 */
use Contao\Database;
use Contao\Input;
use Contao\Config;
use Contao\Date;
use Contao\Image;
use Contao\Environment;
use Contao\StringUtil;
use Contao\System;
use Contao\Versions;
use Contao\BackendUser;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Message;

/**
 * Class file
 * Backend
 *
 */
class Backend extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		System::import(BackendUser::class, 'User');
		$this->Session = \Contao\System::getContainer()->get('request_stack')->getSession();
		if( $this->Database === null )
		{
			$this->Database = \Contao\Database::getInstance();
		}
	}
	
	
	/**
	 * Remove the iframe session when user changes to front end
	 */
	public function removeIframeSession()
	{
		if(Input::get('do') == 'feRedirect' || strlen(strpos(Environment::get('request'), 'preview.php')) > 0 || Environment::get('scriptName') == '/app.php')
		{
			unset($_SESSION['PCT_THEMEDESIGNER']['IFRAME_URL']);
		}
	}


	/**
	 * Show an information message when TD is active
	 * @param object
	 */
	public function showUserInformationWhenActive()
	{
		if( (boolean)Config::get('pct_themedesigner_hidden') !== true )
		{
			Message::addInfo($GLOBALS['TL_LANG']['pct_themedesigner']['backend_info']);
		}
	}
	
	
	/**
	 * Check if TD is active and add backend message
	 * @return string
	 */
	public function isActiveMessage()
	{
		if(version_compare(ContaoCoreBundle::getVersion(), '4', '<'))
		{
			return '';
		}

		// hide themedesigner when triggered
		if( Input::get('themedesigner_hidden') != '')
		{
			Config::persist('pct_themedesigner_hidden', (Input::get('themedesigner_hidden') == 1 ? true : false) );
			$this->redirect( $this->getReferer() );
		}
		
		$strToken = \Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();

		if(strlen(strpos(Environment::get('request'), '/alerts')) > 0 && (boolean)Config::get('pct_themedesigner_hidden') === true)
		{
			return '<p class="tl_green tl_confirm">'.$GLOBALS['TL_LANG']['pct_themedesigner']['backend_info_green'].'</p>';
		}
		else if((boolean)Config::get('pct_themedesigner_hidden') === true)
		{
			return '';
		}
		
		return '<p class="tl_error"><a href="'.$this->addToUrl('themedesigner_hidden=1&isActiveMessage=1&rt='.$strToken).'" title="'.StringUtil::specialchars($GLOBALS['TL_LANG']['pct_themedesigner']['backend_info']).'">'.$GLOBALS['TL_LANG']['pct_themedesigner']['backend_info'].'</a></p>';
	}
	
	
	/**
	 * Inject the backend messages that the theme designer is active
	 * @param object
	 *
	 * Called from [parseTemplate] Hook
	 */
	public function injectIsActiveMessageInBackendPage($objTemplate)
	{
		// ThemeDesigner already hidden or inactive
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		if($objTemplate->getName() == 'be_main' && (boolean)Config::get('pct_themedesigner_hidden') === true || !in_array('pct_themer', $bundles) || version_compare(ContaoCoreBundle::getVersion(), '4', '>='))
		{
			return;
		}
		
		$strBackendInfo = $GLOBALS['TL_LANG']['pct_themedesigner']['backend_info'];
		$strHref = $this->addToUrl('themedesigner_hidden=1&rt='.\Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue());
		
		if(!$objTemplate->isMaintenanceMode)
		{
			$objTemplate->isMaintenanceMode = true;
			$objTemplate->maintenanceHref = $strHref;
			$objTemplate->maintenanceMode = $strBackendInfo;
		}
		else
		{
			$objTemplate->isCoreOnlyMode = true;
			$objTemplate->coreOnlyHref = $strHref;
			$objTemplate->coreOnlyMode = $strBackendInfo;
		}
	}

	
	/**
	 * Modify the DCA on load
	 * @param object
	 */
	public function listLabel($arrRow, $strLabel)
	{
		$strFormat = Config::get('datimFormat');
		if(!$strFormat)
		{
			$strFormat = 'd.m.Y H:i';
		}
		
		$strLabel = '<span style="color:#b3b3b3;padding-right:3px">['.Date::parse($strFormat ,$arrRow['tstamp']). ']</span>'.$arrRow['description'];
		
		return '<div class="ellipsis">' . $strLabel . '</div>';
	}
	
	
	/**
	 * Write the CSS file from the active version
	 * @param mixed
	 * @param object
	 */
	public function writeCSS($varValue,$objDC)
	{
		$intVersion = Input::get('tid');
		if($intVersion < 1 || strlen($intVersion) < 1)
		{
			return $varValue;
		}
		
		// @var object \PCT\ThemeDesigner\Model
		$objVersion = \PCT\ThemeDesigner\Model::findByPk( $intVersion );
		if ( \defined('PCT_THEME') === false )
		{
			\define('PCT_THEME', $objVersion->theme);
		}
		
		$arrData = StringUtil::deserialize($objVersion->data);
		
		// @var object \PCT\ThemeDesigner
		$objTD = new \PCT\ThemeDesigner;
		
		// prepare the css string	
		$strCSS = $objTD->prepareCSS($arrData);
		
		// write the css file
		$objFile = null;
		if(strlen($strCSS) > 0)
		{
			$strVersion = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILENAME'],StringUtil::standardize($objVersion->description),time(),$objVersion->theme);
			
			$objFile = $objTD->writeCSS($strCSS,$strVersion);
		}
		
		// new file successfully written
		if($objFile !== null)
		{
			// log
			System::getContainer()->get('monolog.logger.contao.general')->info("ThemeDesigner: CSS file created from version (id:$intVersion)");
		}
		
		return $varValue;
	}
	
	
	/**
	 * Return the "toggle active" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getActiveButton($row, $href, $label, $title, $icon, $attributes)
	{
		if(Input::get('tid') > 0 && Input::get('active') != '')
		{
			$this->toggleActiveState(Input::get('tid'), Input::get('active'));
		}
		
		$href .= '&amp;tid='.$row['id'].'&amp;active='.($row['active'] ? '0' : 1);

		if (!$row['active'])
		{
			$icon = str_replace('_on.gif','_off.gif',$icon);
		}
		
		if($row['active'])
		{
			return Image::getHtml($icon, $label);
		}
		return '<a href="'.$this->addToUrl($href).'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.Image::getHtml($icon, $label, 'data-state="' . (!$row['active'] ? 0 : 1) . '"').'</a> ';
	}
	
	
	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 */
	public function toggleActiveState($intId, $blnVisible)
	{
		// Check permissions to edit
		Input::setGet('tid',$intId);
		
		$objVersions = new Versions('tl_pct_themedesigner', $intId);
		$objVersions->initialize();
		
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_pct_themedesigner']['fields']['active']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_pct_themedesigner']['fields']['active']['save_callback'] as $callback)
			{
				$blnVisible = System::importStatic($callback[0])->{$callback[1]}($blnVisible, $this);
			}
		}
		
		$objVersion = \PCT\ThemeDesigner\Model::findByPk($intId);
		
		// Update the database
		Database::getInstance()->prepare("UPDATE tl_pct_themedesigner %s WHERE id=?")->set( array('active' => ($blnVisible ? 1 : '')) )->execute($intId);

		// Remove active state from all other elements
		Database::getInstance()->prepare("UPDATE tl_pct_themedesigner %s WHERE id!=? AND theme=?")->set(array('active'=>''))->execute($intId,$objVersion->theme);

		$objVersions->create();
		
		System::getContainer()->get('monolog.logger.contao.general')->info('A new version of record "tl_pct_themedesigner.id='.$intId.'" has been created');
		
		$this->redirect( Backend::addToUrl('',true,array('tid','active')) );
	}


	/**
	 * Return the "toggle theme designer " button and toggle the config
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getToggleThemeDesignerButton($href, $label, $title, $class, $attributes)
	{
		if( Input::get('themedesigner_hidden') != '')
		{
			Config::persist('pct_themedesigner_hidden', (Input::get('themedesigner_hidden') == 1 ? true : false) );
			$this->redirect( $this->getReferer() );
		}
		return '<a href="'.$this->addToUrl($href).'" class="'.$class.'" title="'.StringUtil::specialchars($title).'"'.$attributes.'>'.$label.'</a> ';
	}
	
	
	/**
	 * Remove related CSS file
	 * @param object
	 */
	public function deleteCSSFile($objDC)
	{
		$strFile = sprintf($GLOBALS['PCT_THEMEDESIGNER_CSS_FILE'],$objDC->activeRecord->theme.'_'.StringUtil::standardize($objDC->activeRecord->description));
		$objFile = new \Contao\File($strFile,true);
		if($objFile->exists())
		{
			$objFile->delete();
		}
	}
}