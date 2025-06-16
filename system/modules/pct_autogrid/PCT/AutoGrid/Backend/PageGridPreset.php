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

use Contao\BackendUser;
use Contao\StringUtil;
use Contao\System;

/**
 * Class file
 * PageGridPreset
 */
class PageGridPreset extends \Contao\Backend
{
	/**
	 * DataContainer object
	 * @var object 
	 */
	protected $objDC;

	protected $Template = null;


	/**
	 * Initialize the controller
	 */
	public function __construct()
	{
		\Contao\System::import(BackendUser::class, 'User');
		parent::__construct();
		
		\Contao\System::import('Database');
		\Contao\System::loadLanguageFile('default');
	}


	/**
	 * Run the controller and parse the template
	 */
	public function run()
	{
		/** @var \BackendTemplate|object $objTemplate */
		$this->Template = new \Contao\BackendTemplate('be_page_grid_preset');
		$this->Template->main = '';
		
		$strTable = \Contao\Input::get('table');
		$strField = \Contao\Input::get('field');
		$strKey = \Contao\Input::get('key');
		
		// @var object Session
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		$arrSession = $objSession->get('grid_presets');
		if( !isset($arrSession['categories']) || !is_array($arrSession['categories']))
		{
			$arrSession['categories'] = array();
		}
		
		// Define the current ID
		if( !defined('CURRENT_ID') )
		{
			define('CURRENT_ID', (\Contao\Input::get('table') ? $objSession->get('CURRENT_ID') : \Contao\Input::get('id')));
		}
		
		if(!$GLOBALS['TL_DCA'][$strTable]['config']['dataContainer'])
		{
			$this->loadDataContainer($strTable);
		}
		
		$this->objDC = new \StdClass;
		$this->objDC->table = $strTable;
		$this->objDC->field = $strField;
		$this->objDC->id = \Contao\Input::get('id');
		
		// Set the active record
		if ($this->Database->tableExists($strTable))
		{
			/** @var \Model $strModel $strModel */
			$strModel = \Contao\Model::getClassFromTable($strTable);

			if (class_exists($strModel ?? ''))
			{
				$objModel = $strModel::findByPk(\Contao\Input::get('id'));

				if ($objModel !== null)
				{
					$this->objDC->activeRecord = $objModel;
				}
			}
		}
		
		// @var object
		$objGridPreset = new \PCT\AutoGrid\GridPreset;
		
		$arrElementSets = $objGridPreset->getGridPresets();
		
		$arrElements = array();
		$arrCategories = $objGridPreset->getCategories();
		$arrSkipped = array();
		$i = 0;
		foreach($arrElementSets as $k => $v)
		{
			$category = $v['category'];
			
			// filter by category
			if(!empty($arrSession['categories']))
			{
				if(!in_array($category,$arrSession['categories']))
				{
					continue;
				}
			}
			
			$thumb = $v['thumb'];
			$img = '';
			$rootDir = System::getContainer()->getParameter('kernel.project_dir');
			if(file_exists($rootDir.'/'.$thumb))
			{
				$img = \Contao\Image::getHtml($thumb ,$v['label']);
			}
			
			// skip when there is no image
			if(strlen($img) < 1)
			{
				if(\Contao\Config::get('debugMode'))
				{
					$arrSkipped[] = $k;
				}
			}
			
			$arrClass = array('item',$k);
			if($i == 0) {$arrClass[] = 'first';}
			if($i >= count($arrElementSets) -1 ) {$arrClass[] = 'last';}
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			
			// collect output
			$element = array
			(
				'label'	=> $v['label'] ?: $k,
				'id' 	=> $k,
				'src'	=> $thumb,
				'img'	=> $img,
				'name'	=> $k,
				'class'	=> implode(' ', $arrClass),
				'config' => $arrElementSets[$k],
			);
			
			// collect ordered by category
			$arrElements[$category]['label'] = $GLOBALS['TL_LANG']['page_grid_preset']['categories'][$category] ?: $category;
			$arrElements[$category]['elements'][$k] = $element;
			
			unset($element);
			
			$i++;
		}
		
		// reorder in cols
		$intColumns = 4;
		$arrColumns = array();
		
		foreach($arrElements as $category => $data)
		{
			// build columns
			$index = 0;
			for($col = 0; $col < $intColumns; $col++)
			{
				$i = 0;
				foreach($data['elements'] as $element)
				{
					if($i%$intColumns == $col)
					{
						$arrColumns[$category][$col][$index] = $element;
						$index++;
					}
					$i++;
				}
			}
		}
		$this->Template->columns = $arrColumns;
		$this->Template->columnCount = $intColumns;
		
		// stort arrays
		$arrCategories = array_filter(array_unique($arrCategories));
		asort($arrCategories);
		
		// store filter
		if(\Contao\Input::post('FORM_SUBMIT') == 'tl_filter')
		{
			$arrSession['categories'] = \Contao\Input::post('categories');
			// set session
			$objSession->set('grid_presets',$arrSession);
			// reload
			$this->reload();
		}
		
		// category filter select
		$arrField = array
		(
			'inputType'	=> 'select',
			'label'		=> &$GLOBALS['TL_LANG']['page_grid_preset']['categories'],
			'options'	=> array_values($arrCategories),
			'reference'	=> $GLOBALS['TL_LANG']['page_grid_preset']['categories'],
			'eval'		=> array('includeBlankOption'=>true,'chosen'=>true,'multiple'=>true),
		);
		
		$strClass = $GLOBALS['BE_FFL'][$arrField['inputType']];
		$arrAttributes = $strClass::getAttributesFromDca($arrField,'categories',$arrSession['categories'] ?: array());
		$objWidget = new $strClass($arrAttributes);
		$this->Template->categoryWidget = $objWidget->parse();
		
		// back button
		$strToken = \Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
		$strReferer = \Contao\Controller::addToUrl('act=paste&mode=create&rkey=grid_preset&rt='.$strToken,true,array('key'));
		
		$this->Template->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="'. StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']).'" href="'.$strReferer.'">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>';
		
		$this->Template->main = '';
		$this->Template->action = StringUtil::ampersand(\Contao\Environment::get('request'));
		$this->Template->objDataContainer = $this->objDC;
		$this->Template->elements = $arrElements;
		
		// import
		if( \Contao\Input::post('FORM_SUBMIT') == 'GRID_PRESET' && \Contao\Input::post('ELEMENT') != '' )
		{
			$blnSuccess = $objGridPreset->importByName(\Contao\Input::post('ELEMENT'));
			
			if($blnSuccess)
			{
				// clear the clipboard
				$arrClipboard = $objSession->get('CLIPBOARD');
				unset($arrClipboard[$strTable]);
				$objSession->set('CLIPBOARD',$arrClipboard);
				
				// back to list view
				\Contao\Controller::redirect( \Contao\Backend::addToUrl('',true,array('act','mode','key','rkey')) );
			}
		}
		
		return $this->Template->parse();
	}
}