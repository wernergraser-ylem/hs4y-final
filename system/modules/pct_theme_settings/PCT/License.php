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
namespace PCT;

/**
 * Imports
 */
use Contao\Config;
use Contao\Controller;
use Contao\Date;
use Contao\Email;
use Contao\StringUtil;
use Contao\Environment;
use Contao\File;
use Contao\FrontendTemplate;
use Contao\Input;
use Contao\Message;
use Contao\System;

/**
 * Class file
 * Core
 */
class License
{
	/**
	 * The current domain as string
	 * @var string
	 */
	protected $strDomain = '';
	
	/**
	 * The license key
	 * @var string
	 */
	protected $strLicense = '';
	
	/**
	 * The current host
	 * @var string
	 */
	protected $strHost = '';
	
	/**
	 * License hash
	 * @var string
	 */
	protected $strHash = '';


	/**
	 * Flag if installation is running on command level
	 * @var boolean
	 */
	protected $blnIsCommandLevel = false;

	public function __construct()
	{
		$host = StringUtil::decodeEntities( Environment::get('host') );
		if( (empty($host) === true || \strlen($host) <= 1) )
		{
			$this->blnIsCommandLevel = true;
			return;	
		}
		
		// dyn. host file
		$objHostFile = new File('var/pct_host');
		if( (empty($host) === true || \strlen($host) <= 1) && $objHostFile->exists() === true )
		{
			$host = \trim( $objHostFile->getContent() ?: '' );
		}
		$host = \str_replace(array('http://','https://','www.'), '', $host);
		// resolve single dot at the end 
		$host = \rtrim($host,'.');
		
		$this->strHost = $host;
		$this->strDomain = $host;
		
		// localhost or host is IP
		if( \in_array( Environment::get('ip'), array('127.0.0.1', 'fe80::1', '::1')) || $host == Environment::get('ip') )
		{
			$this->strDomain = $host;
		}
		else
		{
			$arrHost = \parse_url($host) ?? array();
			if( !\is_array($arrHost) || $arrHost === false )
			{
				$this->log('Missing server host information on command level or console. Please provide the host information in a /var/pct_host file. See the documentation for further information.','error');
				return;
			}

			$arrUrl = \array_map('strtolower',$arrHost);
			if( isset($arrUrl['host']) && !empty($arrUrl['host']) )
			{
				$host = $arrUrl['host'];
			}
			
			// strip double domain suffixes
			if( Config::get('pct_license_suffixes') !== null && empty( Config::get('pct_license_suffixes') ) === false )
			{
				$arrSuffixes = array_filter(array_map('trim', array_unique(explode(',', Config::get('pct_license_suffixes')) ) ) );
				foreach( $arrSuffixes as $suffix )
				{
					if( \strpos($host, $suffix) !== false )
					{
						$host = \str_replace($suffix,'',$host).'.'; // leave a dot at the end
						break;
					}
				}
			}
			$tmp = array_reverse( explode('.',$host) );
			$this->strDomain = $tmp[1];
			unset($tmp);
		}
		
		// license file
		$objFile = new File('var/pct_license');
		if( $objFile->exists() )
		{
			$this->strLicense = \trim( $objFile->getContent() ?: '' );
		}
		// build license hash
		$this->strHash = \sha1( \implode('_', array($this->strLicense,$this->strDomain,Date::parse('d-m-Y') ) ) ); 
	}

	/**
	 * Validate the theme license
	 * @return boolean 	Returns true if license is valid, returns false if license is invalid
	 */
	public function validate()
	{
		$arrParams = array
		(
			'domain' 	=> $this->strDomain,
			'key'		=> $this->strLicense,
			'host'		=> $this->strHost,
		);

		$strRequest = \html_entity_decode('https://api.premium-contao-themes.com/license_api.php?'.\http_build_query($arrParams));
		// validate the license
		$curl = \curl_init();
		\curl_setopt($curl, \CURLOPT_RETURNTRANSFER, 1);
		\curl_setopt($curl, \CURLOPT_URL, $strRequest);
		\curl_setopt($curl, \CURLOPT_HEADER, 0);
		\curl_setopt($curl, \CURLOPT_SSL_VERIFYPEER, FALSE);
		\curl_setopt($curl, \CURLOPT_FOLLOWLOCATION, true);
		// get curl response
		$strResponse = \curl_exec($curl);
		// parse response
		$objLicense = \json_decode($strResponse);
		
		// write log file
		if( (boolean)Config::get('pct_license_log') === true )
		{
			// write log file
			$objLogFile = new File('var/pct_validation_log');
			$c = '';
			if( $objLogFile->exists())
			{
				$c = $objLogFile->getContent() ?? '';
			}
			$c .= Date::parse('d-m-Y H:i') .' | '.$strRequest . ' | license status: ' .$objLicense->status .' | curl_error:'.\curl_error($curl)."\n";
			$objLogFile->write($c);
			$objLogFile->close();
			
			
		}

		//! curl error
		if( $objLicense === null && empty( \curl_error($curl) ) === false )
		{
			$this->log( \curl_error($curl),true );
			return true;
		}
		//! status OK
		else if( $objLicense !== null && $objLicense->status == 'OK' )
		{
			// license is ok, create file
			$objFile = new File('var/pct_license');
			if( $objFile->exists() === false )
			{
				$objFile->write( $objLicense->key );
				$objFile->close();
			}

			// log license response
			if( (boolean)Config::get('pct_license_log') === true )
			{
				$this->log('License is valid. Key: '.$this->strLicense.', Domain: '.$this->strDomain,'cron');
			}
			
			return true;
		}
		// !status NOT OK
		else if( $objLicense !== null && $objLicense->status != 'OK' )
		{
			// log license response
			if( (boolean)Config::get('pct_license_log') === true )
			{
				$this->log($objLicense->error,'error');
			}

			return false;
		}
		
		// close curl
		\curl_close($curl);
		unset($curl);

		return false;
	}


	/**
	 * Write system logs
	 * @var string
	 * @var integer
	 */
	protected function log($strLog,$strLogger='')
	{
		$logger = 'monolog.logger.contao.general';
		switch($strLogger)
		{
			case 'cron':
			case 'green':
				$logger = 'monolog.logger.contao.cron';
				break;
			case 'error':
			case 'red':
				$logger = 'monolog.logger.contao.error';
				break;
		}
		System::getContainer()->get($logger)->info($strLog);
	}


	/**
	 * Check current license state
	 * @return void 
	 */
	public function checkIntegrity()
	{
		if( isset($this->blnIsCommandLevel) && $this->blnIsCommandLevel === true )
		{
			return;
		}
		
		$objValidationFile = new File('var/pct_validation');
		$objLockedFile = new File('var/pct_license_locked');
				
		$blnValidate = false;

		// validation file does not exist yet
		if( $objValidationFile->exists() === false )
		{
			$blnValidate = true;
		}
		else 
		{
			$strHash = $objValidationFile->getContent();
			$arrHash = explode(',', $strHash);
			
			// domain has changed
			if( in_array( \sha1( $this->strDomain ), $arrHash) === false )
			{
				if( (boolean)Config::get('pct_license_log') === true )
				{
					$this->log('Domain has changed! Revalidating license...');
				}
				$blnValidate = true;
			}
		}
		
		// manually try to unlock from inside the backend
		$blnSubmitted = false;
		
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) && Input::post('FORM_SUBMIT') == 'UNLOCK' )
		{
			$blnValidate = true;
			$blnSubmitted = true;
		}
		// validate from license server
		else if( Input::post('VALIDATION') !== null && empty( Input::post('VALIDATION') ) === false )
		{
			// secret send
			if( empty( Input::post('SECRET') ) === true || Input::post('SECRET') != \sha1( Date::parse('d-m-Y') ) )
			{
				die( 'Missing secret' );
			}
			// clear pct_validataion
			$objValidationFile->write('');
			$objValidationFile->close();
			
			if( (boolean)Config::get('pct_license_log') === true )
			{
				$this->log('POST Validation: Revalidating license...');
			}
			$blnValidate = true;
			$blnSubmitted = true;
		}
		
		// validate license
		if( $blnValidate === true )
		{
			// true -> license is ok
			if ( $this->validate() === true )
			{
				$strHash = '';
				if( $objValidationFile->exists() )
				{
					$strHash = $objValidationFile->getContent();
				}
				$arrHash = \explode(',', $strHash);
				$arrHash[] = \sha1( $this->strDomain );
				
				$objValidationFile->write( implode(',', \array_filter( \array_unique($arrHash) ) ) );
				$objValidationFile->close();
				// unlock
				if( $objLockedFile->exists() )
				{
					$objLockedFile->delete();
				}
				
			}
			// false -> license is invalid: lock
			else
			{
				$objLockedFile->write( time().' host: '.$this->strHost.' | domain: '.$this->strDomain );
				$objLockedFile->close();

				// write hard lock
				if( Input::post('PCT') !== null )
				{
					$objHardLockedFile = new File('var/pct_license_locked_legal');
					$objHardLockedFile->write( Date::parse('d.m.Y h:i').' host: '.$this->strHost.' | domain: '.$this->strDomain . ' | LOCKED BY PCT DUE TO LICENSE VIOLATIONS' );
					$objHardLockedFile->close();

					die('LEGAL LOCK: '. Date::parse('d.m.Y h:i') .' host: '.$this->strHost.' | domain: '.$this->strDomain);
				}
				
			}
		}

		// reload to flush post
		if( $blnSubmitted )
		{
			if( Input::post('VALIDATION') )
			{
				$arrResponse = array
				(
					'hash' => $this->strHash,
					'locked' => static::isLocked(),
					'revalidated' => $blnValidate,
				);
				die( \json_encode($arrResponse) );
			}
			
			Controller::reload();
		}
	}


	/**
	 * Check if website license is currently locked
	 * @return bool 
	 */
	public static function isLocked()
	{
		$objFile = new File('var/pct_license_locked');
		return (boolean)$objFile->exists();
	}


	/**
	 * Check if website license is currently locked
	 * @return bool 
	 */
	public static function isHardLocked()
	{
		$objFile = new File('var/pct_license_locked_legal');
		return (boolean)$objFile->exists();
	}


	/**
	 * Show backend message when website is locked
	 */
	public function addBackendInfo()
	{
		$objContainer = System::getContainer();
		$request = $objContainer->get('request_stack')->getCurrentRequest();
		if ( $request && $objContainer->get('contao.routing.scope_matcher')->isBackendRequest($request) && static::isLocked() === true ) 
		{
			System::loadLanguageFile('default');
			$objBanner = new FrontendTemplate('be_license_banner');
			$objBanner->pct_license = '';
			$objBanner->request_token = $objContainer->get('contao.csrf.token_manager')->getDefaultTokenValue();;
			$objFile = new File('var/pct_license');
			if( $objFile->exists() === true )
			{
				$objBanner->pct_license = $objFile->getContent();
			}

			// license key submitted
			if( Input::post('FORM_SUBMIT') == 'PCT_LICENSE' && Input::post('license') !== null )
			{
				$objFile->write( trim( Input::post('license') ) );
				$objFile->close();
				// reload here
				Controller::reload();
			}
			
			Message::addRaw( $objBanner->parse() );
		}
	}


	/**
	 * Reduce backend when locked
	 * @param array
	 * @return void 
	 */
	public function checkBackend()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if ( $request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) && static::isLocked() === true ) 
		{
			// hide ThemeDesigner
			unset($GLOBALS['BE_MOD']['design']['pct_themedesigner']);
			// hide DemoInstaller
			unset($GLOBALS['BE_MOD']['design']['pct_demoinstaller']);
			// hide RS
			unset($GLOBALS['BE_MOD']['content']['revolutionslider']);
			// hide CE
			unset($GLOBALS['BE_MOD']['content']['pct_customelements']);
		}
	}


	/**
	 * Clear the frontend when locked
	 * @param mixed $objTemplate 
	 * @return void 
	 */
	public function checkFrontend($objTemplate)
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) === false )
		{
			return;
		}
		// work on fe_page templates only
		else if ( \strpos($objTemplate->getName(), 'fe_page') === false ) 
		{
			return;
		}

		if( static::isHardLocked() === true)
		{
			$objTemplate->sections = array();
			foreach(array('main','left','right','footer','header','body','body_bottom') as $s)
			{
				$objTemplate->{$s} = '';
			}

			System::loadLanguageFile('default');
				
			$objBanner = new FrontendTemplate('fe_license_banner');
			$objTemplate->main = $objBanner->parse();
		}	
	}



	/**
	 * Send admin mail when website is locked
	 * @param array
	 * @return void 
	 */
	public function sendAdminMailWhenLocked()
	{
		if ( static::isLocked() === false ) 
		{
			return;
		}

		System::loadLanguageFile('default');

		$strAdminMail = Config::get('adminEmail') ?? '';
		$strSubject = \sprintf($GLOBALS['TL_LANG']['EXP']['license_locked']['email_subject'],$this->strHost);
		$strText = \sprintf($GLOBALS['TL_LANG']['EXP']['license_locked']['email_text'],$this->strHost);
		$objMail = new Email();
		$objMail->from = $strAdminMail;
		$objMail->fromName = $strAdminMail;
		$objMail->subject = $strSubject;
		$objMail->text = $strText;
		$objMail->priority = 'highest';
		$objMail->sendTo( $strAdminMail );

		$this->log('[License locked] Admin-Mail has been send to '.$strAdminMail);
	}

}