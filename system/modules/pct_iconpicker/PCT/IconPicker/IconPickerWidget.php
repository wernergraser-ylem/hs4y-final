<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\IconPicker;

use Contao\Input;
use Contao\System;
use Contao\Widget;

/**
 * Class file
 * IconPickerWidget
 * Generate the font picker widget
 */
class IconPickerWidget extends Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget_iconpicker';

	/**
	 * CSS styles found
	 * @var array
	 */
	protected $arrStyles;
	
	/**
	 * Files
	 */
	protected $arrFiles;
	
	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		$objSession = System::getContainer()->get('request_stack')->getSession();
	
		// Store the keyword
		if (\Contao\Input::post('FORM_SUBMIT') == 'item_selector')
		{
			$objSession->set('icon_selector_search', \Contao\Input::post('keyword'));
			$this->reload();
		}
		
		// Template
		$objTemplate = new \Contao\BackendTemplate($this->strTemplate);
		$objTemplate->empty = $GLOBALS['TL_LANG']['MSC']['fontIconPicker_empty'];
		$objTemplate->strId = $this->strId;
		$objTemplate->value = Input::get('value');

		$objIconPicker = new IconPicker();
		$objIconPicker->addStyleSheetsToPage();
		
		$this->arrFiles = $objIconPicker->getFiles();
		if(empty($this->arrFiles))
		{
			return $objTemplate->parse();
		}
		
		$objFactory = IconPickerFactory::getInstance();
		
		// get all styles from the files
		$this->arrStyles = $objFactory->findStylesInFiles($this->arrFiles);
		if(empty($this->arrStyles))
		{
			return $objTemplate->parse();
		}
		
		// filter the list by search
		$tmp = array();
		if(strlen($objSession->get('icon_selector_search')) > 0)
		{
			$keyword = $objSession->get('icon_selector_search');
			foreach($this->arrStyles as $file => $styles)
			{
				foreach($styles as $i => $element)
				{
					if(strlen(strpos($element['class'], $keyword)) > 0)
					{
						$tmp[$file][] = $element;
					}
				}
			}
			$this->arrStyles = $tmp;
		}
		
		// include be styling 
		$GLOBALS['TL_CSS'][] = 'system/modules/pct_iconpicker/assets/css/iconpicker.css';
		
		$objTemplate->files = $this->arrFiles;
		$objTemplate->styles = $this->arrStyles;
		$objTemplate->search = $objSession->get('icon_selector_search');
		
		return $objTemplate->parse();
	}
	
}