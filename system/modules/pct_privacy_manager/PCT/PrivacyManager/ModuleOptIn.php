<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) Leo Feyer
 *
 * @copyright Tim Gatzky 2020
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\PrivacyManager;

/**
 * Imports
 */
use \Contao\StringUtil;

/**
 * Class file
 * ModuleOptIn
 */
class ModuleOptIn extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_privacy_default';
	
	/**
	 * The Session
	 * @var string
	 */
	protected $strSession = 'user_privacy_settings';
	

	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD']['privacy_in'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		if( $this->customTpl != $this->strTemplate && empty($this->customTpl) === false )
		{
			$this->strTemplate = $this->customTpl;
		}
		
		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		global $objPage;
		
		$this->Template->session_name = $this->strSession;
		
		// labels and descriptions
		$this->Template->label_1 = $this->privacy_lbl_1;
		$this->Template->label_2 = $this->privacy_lbl_2;
		$this->Template->label_3 = $this->privacy_lbl_3;
		$this->Template->label_4 = $this->privacy_lbl_4;
		$this->Template->description_1 = $this->privacy_txt_1;
		$this->Template->description_2 = $this->privacy_txt_2;
		$this->Template->description_3 = $this->privacy_txt_3;
		$this->Template->description_4 = $this->privacy_txt_4;
		$tmp = array();
		
		$arrPreselected = \Contao\StringUtil::deserialize( $this->privacy_preselect );
		if( !\is_array($arrPreselected) )
		{
			$arrPreselected = \explode(',',$arrPreselected);
		}
		$arrPreselected = \array_filter($arrPreselected);

		foreach( $arrPreselected as $v )
		{
			$tmp[$v] = true;
		}
		$this->Template->preselected = $tmp;
		unset($tmp);
		
		// links
		if($this->privacy_url_1)
		{
			$this->Template->link_1 = $this->privacy_url_1;
			if( strlen(strpos($this->privacy_url_1, '{{')) > 0 )
			{
				$arr = explode('::', str_replace(array('{{','}}','|urlattr'),'',$this->privacy_url_1));
				$this->Template->link_1 = '{{link::'.$arr[1].'}}';
				// is imprint page
				if( (int)$arr[1] == $objPage->id )
				{
					$this->Template->isImprintPage = true;
					$this->Template->hide_optin = true;
				}	
			}
			unset($arr);
		}
		if($this->privacy_url_2)
		{
			$this->Template->link_2 = $this->privacy_url_2;
			if( strlen(strpos($this->privacy_url_2, '{{')) > 0 )
			{
				$arr = explode('::', str_replace(array('{{','}}','|urlattr'),'',$this->privacy_url_2));
				$this->Template->link_2 = '{{link::'.$arr[1].'}}';
				// is privacy page
				if( (int)$arr[1] == $objPage->id )
				{
					$this->Template->isPrivacyPage = true;
					$this->Template->hide_optin = true;
				}
			}
			unset($arr);
		}

		// Create an opt-in log file "user_privacy_settings.log" in the system/config folder
		$strFileDir = 'system/config';
		if( \Contao\Environment::get('isAjaxRequest') && \Contao\Input::get($this->strSession) != '')
		{
			$objFile = new \Contao\File($strFileDir.'/user_privacy_settings.log');
			$strContent = '';
			if( $objFile->exists() )
			{
				$strContent = $objFile->getContent();
			}
			$objFile->write( $strContent . \Contao\Date::parse('d-m-Y G:i:s').' '.\Contao\Config::get('timeZone').';IP='.\Contao\Environment::get('ip').';DOMAIN:'.\Contao\Environment::get('base').';PRIVACY='.\Contao\Input::get('user_privacy_settings')."\n" );
			$objFile->close();
		}
		
		// page object to template
		$this->Template->Page = $objPage;
	}
}