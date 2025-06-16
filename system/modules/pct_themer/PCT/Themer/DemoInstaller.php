<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\Themer;

/**
 * Imports
 */
use Contao\Input;
use Contao\System;
use Contao\Message;
use Contao\Environment;
use Contao\Config;
use Contao\StringUtil;

/**
 * Class file
 * DemoInstaller
 */
class DemoInstaller extends \Contao\BackendModule
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_pct_demoinstaller';


	/**
	 * Generate the module
	 *
	 * @throws \Exception
	 */
	protected function compile()
	{
		System::loadLanguageFile('pct_demoinstaller');
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		
		// @var object Session
		$objSession = System::getContainer()->get('request_stack')->getSession()->getBag('contao_backend');
		$arrSession = $objSession->get('pct_demoinstaller');
		if( !isset($arrSession['categories']) || !is_array($arrSession['categories']))
		{
			$arrSession['categories'] = array();
		}
		if( !isset($arrSession['installed']) || !is_array($arrSession['installed']))
		{
			$arrSession['installed'] = array();
		}

		
		$this->Template->content = '';
		$this->Template->href = $this->getReferer(true);
		$this->Template->title = StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']);
		$this->Template->button = $GLOBALS['TL_LANG']['MSC']['backBT'];
		
		if(empty($GLOBALS['PCT_THEMER']['THEMES']) || !is_array($GLOBALS['PCT_THEMER']['THEMES']))
		{
			$this->Template->content = 'No demos available';
			return;
		}
		
		$arrCategories = array();
		$arrThemes = array();
		$arrSkipped = array();
		$i = 0;
		foreach($GLOBALS['PCT_THEMER']['THEMES'] as $k => $v)
		{
			$file = \sprintf($GLOBALS['PCT_THEMER']['fileLogic'],$k);
			
			// skip when template file does not exist
			if( \file_exists($rootDir.'/'.$file) === false )
			{
				continue;
			}
			
			// skip demos
			if( isset($v['installer']) && $v['installer'] === false)
			{
				continue;
			}
			
			if( !isset($v['category']) )
			{
				$v['category'] = array();
			}
			
			if(!is_array($v['category']))
			{
				$v['category'] = array_filter(explode(',',$v['category']));
			}
			
			// collect categories
			foreach($v['category'] as $cat)
			{
				$arrCategories[$cat] = $cat;
			}
			
			// filter active
			if(count($arrSession['categories']) > 0 && !array_intersect($arrSession['categories'],$v['category']))
			{
				continue;
			}
			
			// remove eclipse from name
			$filename = str_replace('eclipse_', '', $k);
			$thumb = $v['thumb'] ?? PCT_THEMER_PATH.'/assets/img/demoinstaller/demo_'.$filename.'.jpg';
			$img = '';
			
			if(file_exists($rootDir.'/'.$thumb))
			{
				// cached
				// no cached
				$img = \Contao\Image::getHtml($thumb,$v['label']);
			}
			
			// skip when there is no image
			if(strlen($img) < 1)
			{
				$i--;
				
				if(Config::get('debugMode'))
				{
					$arrSkipped[] = $k;
				}
				
				continue;
			}
			
			$arrClass = array('item',$k);
			if($i == 0) {$arrClass[] = 'first';}
			if($i >= count($GLOBALS['PCT_THEMER']['THEMES']) -1 ) {$arrClass[] = 'last';}
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			
			// collect output
			$arrThemes[$k] = array
			(
				'label'	=> $v['label'] ?: $k,
				'id' 	=> $k,
				'src'	=> $thumb,
				'img'	=> $img,
				'class'	=> implode(' ', $arrClass),
				'installed' => false,
				'link' => $v['link'],
			);
			
			if(array_key_exists($k, $arrSession['installed']) && \Contao\PageModel::findByPk($arrSession['installed'][$k]) !== null)
			{
				$arrThemes[$k]['installed'] = true;
				$feRedirect = Environment::get('base').'contao/preview?page='.$arrSession['installed'][$k];
				
				$arrThemes[$k]['feRedirect'] = $feRedirect;
			}
			
			$i++;
		}

		// log skipped themes
		if(Config::get('debugMode') && count($arrSkipped) > 0)
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.general')->info( 'Themer: Skipped demo: '.implode(', ', $arrSkipped) );
		}
			
		
		// stort arrays
		$arrCategories = array_filter(array_unique($arrCategories));
		asort($arrCategories);
		
		if( \is_array($arrThemes) === false )
		{
			$arrThemes = array();
		}
		#$arrDemos = array_filter(array_unique($arrDemos));
		ksort($arrThemes);
		
		$this->Template->themes = $arrThemes;

		// check if there is more than one theme record
		
		// @var object	ModelCollection
		$objContaoThemes = \Contao\ThemeModel::findAll();
		if($objContaoThemes === null)
		{
			$this->Template->messages = 'No theme installed yet.';
			return;
		}
		
		// more than one theme record to choose from
		if(count($objContaoThemes->getModels()) > 1)
		{
			$intContaoTheme = $arrSession['contao_theme'];
			
			// contao theme select
			$arrField = array
			(
				'inputType'	=> 'select',
				'label'		=> &$GLOBALS['TL_LANG']['pct_demoinstaller']['contao_theme'],
				'foreignKey'=> 'tl_theme.name',
				#'eval'		=> array('includeBlankOption'=>true),
				'attributes'=>'onchange="asdf"',
			);
			
			$strClass = $GLOBALS['BE_FFL'][$arrField['inputType']];
			$arrAttributes = $strClass::getAttributesFromDca($arrField,'contao_theme',$arrSession['contao_theme']);
			$objWidget = new $strClass($arrAttributes);
			$objWidget->__set('onchange','this.form.submit()');
			$this->Template->contaoThemeWidget = $objWidget->parse();
			
			if(Input::post('FORM_SUBMIT') == 'tl_filter' && Input::post('contao_theme') > 0)
			{
				$arrSession['contao_theme'] = Input::post('contao_theme');
				// set session
				$objSession->set('pct_demoinstaller',$arrSession);
				// reload
				$this->reload();
			}
		}
		else
		{
			$intContaoTheme = $objContaoThemes->id;
		}
		
		// store filter
		if(Input::post('FORM_SUBMIT') == 'tl_filter')
		{
			$arrSession['categories'] = Input::post('categories');
			// set session
			$objSession->set('pct_demoinstaller',$arrSession);
			// reload
			$this->reload();
		}
		
		// run install
		if(Input::post('FORM_SUBMIT') == 'pct_demoinstaller' && Input::post('THEME') != '' && Input::post('install') != '')
		{
			// run installation, returns the page id
			$intPage = $this->install(Input::post('THEME'),$intContaoTheme);
				
			if($intPage > 0)
			{
				Message::addInfo($GLOBALS['TL_LANG']['pct_themer']['import_success']);
			}
			else
			{	
				Message::addError('An error occurred while importing the demo template');
			}

			// mark as installed
			$arrSession['installed'][Input::post('THEME')] = $intPage;
			
			// last one installed
			$arrSession['latest_installed'] = Input::post('THEME');

			// set session
			$objSession->set('pct_demoinstaller',$arrSession);
			// reload
			$this->reload();
		}
		
		// filter form
		$this->Template->action = Environment::get('request');
		
		// category filter select
		$arrField = array
		(
			'inputType'	=> 'select',
			'label'		=> &$GLOBALS['TL_LANG']['pct_demoinstaller']['categories'],
			'options'	=> $arrCategories,
			'reference'	=> $GLOBALS['TL_LANG']['pct_demoinstaller']['categories'],
			'eval'		=> array('includeBlankOption'=>true,'chosen'=>true,'multiple'=>true),
		);
		
		$strClass = $GLOBALS['BE_FFL'][$arrField['inputType']];
		$arrAttributes = $strClass::getAttributesFromDca($arrField,'categories',$arrSession['categories'] ?: array());
		$objWidget = new $strClass($arrAttributes);
		$this->Template->categoryWidget = $objWidget->parse();
		$this->Template->themes = $arrThemes ?: array();
		$this->Template->messages = Message::generate();
		$this->Template->latest_installed = $arrSession['latest_installed'] ?? '';

		$this->Template->showLabel = $GLOBALS['TL_LANG']['pct_demoinstaller']['submit_show'] ?: 'Show me';
		$this->Template->customizeLabel = $GLOBALS['TL_LANG']['pct_demoinstaller']['submit_customize'] ?: 'Customize';
	}
	
	
	/**
	 * Install a demo
	 * @param string	Name of the demo
	 * @param integer	Optional the ID of the contao theme record to install frontend modules in
	 * @return integer	Id of the new root page created or -1 for an error
	 */
	public function install($strTheme,$intContaoTheme=0)
	{
		if(strlen($strTheme) < 1 ||$intContaoTheme < 1 || !is_array($GLOBALS['PCT_THEMER']['THEMES'][$strTheme]))
		{
			return -1;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		
		$arrTheme = $GLOBALS['PCT_THEMER']['THEMES'][$strTheme];
		$strLayout = $arrTheme['layout'] ?? $GLOBALS['PCT_THEMER']['defaultLayout'];
		
		// find the layout
		$objLayout = $objDatabase->prepare("SELECT * FROM tl_layout WHERE pid=? AND name=?")->limit(1)->execute($intContaoTheme,$strLayout);
		
		$time = time();
		
		// create a new root page
		$arrSet = array
		(
			'tstamp'	=> $time,
			'type'		=> 'root',
			'language'	=> 'de',
			'title'		=> $arrTheme['label'] ?: $strTheme,
			'redirect'	=> 'permanent',
			'published'	=> 1,
			'pct_theme'	=> $strTheme,
			'pct_theme_cto'	=> $intContaoTheme
		);
		
		// predefine a page layout if found
		if($objLayout->id > 0)
		{
			$arrSet['includeLayout'] = 1;
			$arrSet['layout'] = $objLayout->id;
		}

		// update root page with custom information
		if( \is_array($GLOBALS['PCT_THEMER']['root']) )
		{
			$arrSet = \array_merge($arrSet,$GLOBALS['PCT_THEMER']['root']);
		}
		
		if( isset($arrTheme['root']) && is_array($arrTheme['root']) )
		{
			$arrSet = \array_merge($arrSet,$arrTheme['root']);
		}
	
		// pageimage
		if( isset($arrSet['addImage']) && (boolean)$arrSet['addImage'] === true && empty($arrSet['singleSRC']) === false )
		{
			$objFile = \Contao\FilesModel::findByPath( $arrSet['singleSRC'] );
			$arrSet['singleSRC'] = $objFile->uuid;
		}
		

		$objInsert = $objDatabase->prepare("INSERT INTO tl_page %s")->set($arrSet)->execute();
		
		// new root id
		$intRoot = $objInsert->__get('insertId');
		
		// update alias
		$objDatabase->prepare("UPDATE tl_page %s WHERE id=?")->set(array('alias' => $strTheme.'_'.$intRoot))->execute($intRoot);
		
		// @var \PCT\Themer
		$objThemer = new \PCT\Themer;
		
		// run import
		if( $objThemer->import($intRoot) )
		{
			return $intRoot;
		}

		return -1;
	}
}