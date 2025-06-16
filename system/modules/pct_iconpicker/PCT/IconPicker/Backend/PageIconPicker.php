<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

namespace PCT\IconPicker\Backend;

use Contao\Ajax;
use Contao\Backend;
use Contao\BackendUser;
use Contao\DataContainer;
use Contao\Environment;
use Contao\Input;
use Contao\StringUtil;
use Contao\System;

/**
 * Class file
 * PageIconPicker
 */
class PageIconPicker extends Backend
{
	/**
	 * Current Ajax object
	 * @var object
	 */
	protected $objAjax;

	protected $Template = null;


	/**
	 * Initialize the controller
	 *
	 * 1. Import the user
	 * 2. Call the parent constructor
	 * 3. Authenticate the user
	 * 4. Load the language files
	 * DO NOT CHANGE THIS ORDER!
	 */
	public function __construct()
	{
		$this->import(BackendUser::class, 'User');
		parent::__construct();
	}


	/**
	 * Run the controller and parse the template
	 */
	public function run()
	{
		$objSession = System::getContainer()->get('request_stack')->getSession();
		
		$this->Template = new \Contao\BackendTemplate('be_iconpicker');
		$this->Template->main = '';

		// Ajax request
		if ($_POST && Environment::get('isAjaxRequest'))
		{
			$this->objAjax = new Ajax( Input::post('action') );
			$this->objAjax->executePreActions();
		}
		
		$strTable = Input::get('table');
		$strField = Input::get('field');
		$intId = Input::get('id');
		if( $objSession->get('CURRENT_ID') !== null )
		{
			$intId = $objSession->get('CURRENT_ID');
		}

		$this->loadDataContainer($strTable);
		$strDriver = DataContainer::getDriverForTable($strTable);
		$objDca = new $strDriver($strTable);
		
		// AJAX request
		if ($_POST && Environment::get('isAjaxRequest'))
		{
			$this->objAjax->executePostActions($objDca);
		}
		
		$objSession->set('iconPickerRef', Environment::get('request'));

		// Prepare the widget
		$objIconPicker = new $GLOBALS['BE_FFL']['iconPicker'](array(
			'strId'    => $strField,
			'strTable' => $strTable,
			'strField' => $strField,
			'strName'  => $strField,
			'varValue' => array_filter(explode(',', Input::get('value')))
		), $objDca);
		
		$this->Template->main = $objIconPicker->generate();
		$this->Template->title = StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['fontIconPicker']);
		$this->Template->addSearch = true;
		$this->Template->search = $GLOBALS['TL_LANG']['MSC']['search'];
		$this->Template->action = StringUtil::ampersand(Environment::get('request'));
		$this->Template->manager = $GLOBALS['TL_LANG']['MSC']['pageManager'] ?? '';
		$this->Template->managerHref = 'contao/main.php?do=page&amp;popup=1';
		$this->Template->request_token = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
		$this->Template->value = $objSession->get('icon_selector_search') ?? '';
		return $this->Template->parse();
	}
}
