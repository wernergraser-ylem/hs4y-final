<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\ThemeSettings\Backend;

use stdClass;

/**
 * Class file
 * PageContentElementSetExport
 */
class PageContentElementSetExport extends \Contao\Backend
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
		parent::__construct();
		\Contao\System::import('Database');
		\Contao\System::loadLanguageFile('default');
	}


	/**
	 * Run the controller and parse the template
	 */
	public function run()
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		/** @var \Contao\BackendTemplate|object $objTemplate */
		$this->Template = new \Contao\BackendTemplate('be_page_contentelementset_export');
		$this->Template->main = '';
		
		$strTable = \Contao\Input::get('table');
		$strField = \Contao\Input::get('field');
		$strKey = \Contao\Input::get('key');
		
		$this->loadDataContainer($strTable);
		
		$this->objDC = new stdClass;
		$this->objDC->table = $strTable;
		$this->objDC->field = $strField;
		$this->objDC->id = \Contao\Input::get('id');
		
		// Set the active record
		if ($this->Database->tableExists($strTable))
		{
			$strModel = \Contao\Model::getClassFromTable($strTable) ?? '';
			if ( !empty($strModel) && class_exists($strModel))
			{
				$objModel = $strModel::findByPk(\Contao\Input::get('id'));

				if ($objModel !== null)
				{
					$this->objDC->activeRecord = $objModel;
				}
			}
		}
		
		// back button
		$this->Template->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="'.\Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']).'" href="'.\Contao\Controller::getReferer().'">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>';
		
		$arrIds = $objSession->get('contentelementset_export_ids') ?: $_SESSION['contentelementset_export_ids'];
		
		// @var object
		$objElements = \Contao\ContentModel::findMultipleByIds($arrIds);
		
		if(empty($arrIds) || $objElements === null)
		{
			$this->Template->messages = $GLOBALS['TL_LANG']['contentelementsets_export']['empty'] ?: 'No elements selected';
			return $this->Template->parse();
		}
		
		$this->Template->elementIds = $arrIds;
		$this->Template->elements = array_values($objElements->fetchEach('type'));
		$this->Template->headline_elements = $GLOBALS['TL_LANG']['contentelementsets_export']['headline_elements'] ?: 'Ingredients: ';
		
		// @var object
		$objContentElementSet = new \PCT\ThemeSettings\ContentElementSet;
		
		// name input
		$arrField = array
		(
			'inputType'	=> 'text',
			'label'		=> &$GLOBALS['TL_LANG']['contentelementsets_export']['name'],
		);
		
		$strClass = $GLOBALS['BE_FFL'][$arrField['inputType']];
		$arrAttributes = $strClass::getAttributesFromDca($arrField,'name');
		$objWidget = new $strClass($arrAttributes);
		$this->Template->nameInput = $objWidget->parse();



		// category select
		$arrField = array
		(
			'inputType'	=> 'select',
			'label'		=> &$GLOBALS['TL_LANG']['contentelementsets']['categories'],
			'options'	=> array_keys( $objContentElementSet->getCategories() ),
			'reference'	=> $GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'],
			'eval'		=> array('includeBlankOption'=>true,'chosen'=>true),
		);
		
		$strClass = $GLOBALS['BE_FFL'][$arrField['inputType']];
		$arrAttributes = $strClass::getAttributesFromDca($arrField,'category');
		$objWidget = new $strClass($arrAttributes);
		$this->Template->categorySelect = $objWidget->parse();
		
		// submit label
		$this->Template->submitLabel = $GLOBALS['TL_LANG']['contentelementsets_export']['submit'] ?: 'Run export';
		
		$this->Template->headline = $GLOBALS['TL_LANG']['tl_content']['contentelementset_export'][0] ?: 'Export content element set';
		$this->Template->main = '';
		$this->Template->action = \Contao\StringUtil::ampersand( \Contao\Environment::get('request') );
		$this->Template->objDataContainer = $this->objDC;
		
		// run export
		$objFile = null;
		$strSession = 'contentelementset_export_'.\Contao\Input::get('id');
		
		if(\Contao\Input::post('run_contentelementset_export') != '')
		{
			$arrParams = array
			(
				'name'			=> \Contao\Input::post('name'),
				'category'		=> \Contao\Input::post('category'),
				'thumb'			=> '',
				'elements'		=> implode(',', array_values($objElements->fetchEach('type')) ),
			);
			
			$objFile = $objContentElementSet->exportByIds($arrIds,$arrParams);
			
			$objSession->set($strSession,$objFile->uuid);
		}
		
		if($objSession->get($strSession))
		{
			$objFile = \Contao\FilesModel::findByPk( $objSession->get($strSession) );
		}
		
		$this->Template->file = $objFile;
		
		return $this->Template->parse();
	}
}