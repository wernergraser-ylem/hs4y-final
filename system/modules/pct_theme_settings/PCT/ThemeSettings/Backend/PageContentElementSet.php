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

use Contao\StringUtil;
use Contao\Image;
use Contao\System;
use Contao\Config;
use Contao\Environment;
use Contao\Backend;
use Contao\BackendTemplate;
use Contao\BackendUser;
use Contao\Controller;
use Contao\Input;
use Contao\Model;
use Contao\UserModel;
use stdClass;

/**
 * Class file
 * PageContentElementSet
 */
class PageContentElementSet extends Backend
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
		
		$this->import('Database');
		$this->import(BackendUser::class, 'User');
		System::loadLanguageFile('default');
	}


	/**
	 * Run the controller and parse the template
	 */
	public function run()
	{
		/** @var \Contao\BackendTemplate|object $objTemplate */
		$this->Template = new BackendTemplate('be_page_contentelementset');
		$this->Template->main = '';
		
		$strTable = Input::get('table');
		$strField = Input::get('field');
		$strKey = Input::get('key');
		
		// @var object Session
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get('contentelementsets');
		if( !isset($arrSession['categories']) || !is_array($arrSession['categories']))
		{
			$arrSession['categories'] = array();
		}

		$this->loadDataContainer($strTable);
		
		// Define the current ID
		if( !defined('CURRENT_ID') )
		{
			define('CURRENT_ID', (Input::get('table') ? $objSession->get('CURRENT_ID') : Input::get('id')));
		}

		$GLOBALS['TL_JAVASCRIPT'][] = 'assets/colorbox/js/colorbox.min.js';
		$GLOBALS['TL_CSS'][] = 'assets/colorbox/css/colorbox.min.css';
		$GLOBALS['TL_CSS'][] = 'system/modules/pct_theme_settings/assets/vendor/themify/css/themify-icons.css';

		$this->objDC = new stdClass;
		$this->objDC->table = $strTable;
		$this->objDC->field = $strField;
		$this->objDC->id = Input::get('id');
		
		// Set the active record
		if ($this->Database->tableExists($strTable))
		{
			/** @var string $strModel $strModel */
			$strModel = Model::getClassFromTable($strTable);

			if (class_exists($strModel))
			{
				$objModel = $strModel::findByPk(Input::get('id'));

				if ($objModel !== null)
				{
					$this->objDC->activeRecord = $objModel;
				}
			}
		}
		
		// @var object
		$objContentElementSet = new \PCT\ThemeSettings\ContentElementSet;
		// get all element set templates
		$arrAll = $objContentElementSet->getContentElementSets();
		$_arrElementSets = array();
		$_arrSingles = array();
		// split elements in set and singles
		foreach($arrAll as $k => $v)
		{
			if( \strpos($k,'single') !== false && \strpos($k,'single') === 0)
			{
				$_arrSingles[$k] = $v;
			}
			else
			{
				$_arrElementSets[$k] = $v;
			}
		}
		unset($arrAll);

		// ! reorder singles
		$arrOrder = array();
		foreach($_arrSingles as $k => $v)
		{
			$label = $GLOBALS['TL_LANG']['ELEMENT_SETS'][$k][0] ?? $k;
			$arrOrder[$k] = $label;
		}
		\natcasesort( $arrOrder );
		
		$tmp = array();
		foreach( $arrOrder as $k => $v )
		{
			$tmp[ $k ] = $_arrSingles[$k];
		}
		$_arrSingles = $tmp;
		unset($tmp);

		// ! reorder sets
		$arrOrder = array();
		foreach($_arrElementSets as $k => $v)
		{
			$label = $GLOBALS['TL_LANG']['ELEMENT_SETS'][$k][0] ?? $k;
			$arrOrder[$k] = $label;
		}
		\natcasesort( $arrOrder );
		$tmp = array();
		foreach( $arrOrder as $k => $v )
		{
			$tmp[ $k ] = $_arrElementSets[$k];
		}
		$_arrElementSets = $tmp;
		unset($tmp);

		// !reorder by lookup array
		#if( isset($GLOBALS['PCT_ELEMENTSET_LIBRARY_ORDER']) && \is_array($GLOBALS['PCT_ELEMENTSET_LIBRARY_ORDER']) )
		#{
		#	$orderSingles = array();
		#	$orderSets = array();
		#	foreach($GLOBALS['PCT_ELEMENTSET_LIBRARY_ORDER'] as $key)
		#	{
		#		if( \array_key_exists($key, $_arrSingles) )
		#		{
		#			$orderSingles[ $key ] = $_arrSingles[$key];
		#		}
		#		
		#		if( \array_key_exists($key, $_arrElementSets) )
		#		{
		#			$orderSets[ $key ] = $_arrElementSets[$key];
		#		}
		#	}
#
		#	// append unordered elements
		#	$diff = \array_diff_key($_arrSingles,$orderSingles);
		#	if ( empty($diff) === false )
		#	{
		#		$orderSingles = \array_merge($orderSingles,$diff);
		#	}
		#	$diff = \array_diff_key($_arrElementSets,$orderSets);
		#	if ( empty($diff) === false )
		#	{
		#		$orderSets = \array_merge($orderSets,$diff);
		#	}
		#	
		#	$_arrSingles = $orderSingles;
		#	$_arrElementSets = $orderSets;
		#}
		
		// categories
		$arrCategories = $objContentElementSet->getCategories();
		foreach($arrCategories as $k => $v)
		{
			if( isset($GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$k]) && !empty($GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$k]) )
			{
				$v['label'] = $GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$k];
			}
			$arrCategories[$k] = $v;
		}
		$this->Template->categories = $arrCategories;
		
//!-- singles array
		$arrSingles = array();
		$arrSkipped = array();
		$arrStyles = array();
		$i = 0;
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');

		foreach($_arrSingles as $k => $v)
		{
			$category = $v['category'];
			
			// label
			$label = $GLOBALS['TL_LANG']['ELEMENT_SETS'][$k][0] ?? $k;
			$style = $GLOBALS['TL_LANG']['ELEMENT_SETS'][$k][1] ?? 'Stil:0';
			
			// use label as order key
			$arrOrder[$k] = $label;

			$thumb = strlen($v['thumb']) > 0 ? $v['thumb'] : '';
			$img = '';
			if(file_exists($rootDir.'/'.$thumb))
			{
				$img = Image::getHtml($thumb ,$label ?? '');
			}
			
			// skip when there is no image
			if(strlen($img) < 1)
			{
				if(Config::get('debugMode'))
				{
					$arrSkipped[] = $k;
				}
			}
			
			$arrClass = array('item',$k);
			if($i == 0) {$arrClass[] = 'first';}
			if($i >= count($_arrSingles) -1 ) {$arrClass[] = 'last';}
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			
			// collect output
			$keywords = $GLOBALS['TL_LANG']['ELEMENT_SETS_KEYWORDS'][$k] ?? '';
			if( !empty($keywords) )
			{
				$search = ['Ä','ä','Ö','ö','Ü','ü','ß'];
				$replace = ['Ae','ae','Oe','oe','Ue','ue','ss'];
				$keywords = \str_replace($search,$replace,$keywords);
			}
			$element = array
			(
				'label'	=> $label,
				'style' => $style,
				'id' 	=> $k,
				'src'	=> $thumb,
				'img'	=> $img,
				'name'	=> $k,
				'class'	=> implode(' ', $arrClass),
				'styles' => array(),
				'keywords' => $keywords,
			);

			
			// is style
			$tmp = \explode('-',$k);
			if( isset($tmp[1]) && isset($arrSingles[$category]['elements'][$tmp[0]]) )
			{
				$arrStyles[ $tmp[0] ][$tmp[0]] = $arrSingles[$category]['elements'][$tmp[0]];
				$arrStyles[ $tmp[0] ][$k] = $element;
				continue;
			}
			else
			{
				$element['class'] .= ' active';
			}

			if( empty($GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$category]) )
			{
				$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$category] = $v['category'];
			}

			// collect ordered by category
			$arrSingles[$category]['label'] = $GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$category];
			$arrSingles[$category]['elements'][$k] = $element;
			// add to styles collection
			$arrStyles[$k][$k] = $element;
			
			$i++;
		}



//!-- elementsets array
		$arrElements = array();
		$arrSkipped = array();
		$i = 0;
		
		foreach($_arrElementSets as $k => $v)
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

			// label
			$label = $GLOBALS['TL_LANG']['ELEMENT_SETS'][$k][0] ?? $k;
			$style = $GLOBALS['TL_LANG']['ELEMENT_SETS'][$k][1] ?? 'Stil:0';

			$thumb = strlen($v['thumb']) > 0 ? $v['thumb'] : '';
			$img = '';
			if(file_exists($rootDir.'/'.$thumb))
			{
				$img = Image::getHtml($thumb ,$v['label'] ?? '');
			}
			
			// skip when there is no image
			if(strlen($img) < 1)
			{
				if(Config::get('debugMode'))
				{
					$arrSkipped[] = $k;
				}
			}
			
			$arrClass = array('item',$k);
			if($i == 0) {$arrClass[] = 'first';}
			if($i >= count($_arrElementSets) -1 ) {$arrClass[] = 'last';}
			$i%2 == 0 ? $arrClass[] = 'even' : $arrClass[] = 'odd';
			
			$keywords = $GLOBALS['TL_LANG']['ELEMENT_SETS_KEYWORDS'][$k] ?? '';
			if( !empty($keywords) )
			{
				$search = ['Ä','ä','Ö','ö','Ü','ü','ß'];
				$replace = ['Ae','ae','Oe','oe','Ue','ue','ss'];
				$keywords = \str_replace($search,$replace,$keywords);
			}
			// collect output
			$element = array
			(
				'label'	=> $label,
				'style' => $style,
				'id' 	=> $k,
				'src'	=> $thumb,
				'img'	=> $img,
				'name'	=> $k,
				'class'	=> implode(' ', $arrClass),
				'styles' => array(),
				'keywords' => $keywords,
			);

			// is style
			$tmp = \explode('-',$k);
			if( isset($tmp[1]) )
			{
				$arrStyles[ $tmp[0] ][$tmp[0]] = $arrSingles[$category]['elements'][$tmp[0]];
				$arrStyles[ $tmp[0] ][$k] = $element;
				continue;
			}
			else
			{
				$element['class'] .= ' active';
			}
			
			if( empty($GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$category]) )
			{
				$GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$category] = $v['category'];
			}

			// collect ordered by category
			$arrElements[$category]['label'] = $GLOBALS['TL_LANG']['CONTENTELEMENTSETS']['CATEGORIES'][$category];
			$arrElements[$category]['elements'][$k] = $element;
			// add to styles collection
			$arrStyles[$k][$k] = $element;
			
			$i++;
		}

		// // append styles
		// if( empty($arrStyles) === false )
		// {
		// 	foreach($arrElements as $category => $data)
		// 	{
		// 		foreach($data['elements'] as $k => $data)
		// 		{
		// 			if( isset($arrStyles[$k]) && empty($arrStyles[$k]) === false )
		// 			{
		// 				foreach(\array_keys($arrStyles[$k]) as $name )
		// 				{
		// 					$arrElements[$category]['elements'][$name]['styles'] = $arrStyles[$k];
		// 				}
		// 			}	
		// 		}
		// 	}
		// }

		// place custom on first position
		if( !empty($arrElements['custom']) )
		{
			$tmp = $arrElements['custom'];
			unset($arrElements['custom']);
			\Contao\ArrayUtil::arrayInsert($arrElements,0,array('custom'=>$tmp));
			unset($tmp);
		}

		// reorder in cols
		#$intColumns = 2;
		#$arrColumns = array();
		#$arrProcessed = array();
		#
		#foreach($arrElements as $category => $data)
		#{
		#	// build columns
		#	$index = 0;
		#	for($col = 0; $col < $intColumns; $col++)
		#	{
		#		$i = 0;
		#		foreach($data['elements'] as $element)
		#		{
		#			if($i%$intColumns == $col)
		#			{
		#				$arrColumns[$category][$col][$index] = $element;
		#				$index++;
		#			}
		#			$i++;
		#		}
		#	}
		#}
		#$this->Template->columns = $arrColumns;
		#$this->Template->columnCount = $intColumns;
		
		// favorites ajax call
		if( Input::get('action') == 'updateFavorites' )
		{
			$objModel = UserModel::findByPk( $this->User->id );
			$objModel->__set('pct_element_library_favorites', \array_filter( Input::get('favorites') ?: array()  ) );
			$objModel->save();
		}

		// back button
		$strToken = \Contao\System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();

		$strReferer = Controller::addToUrl('act=paste&mode=create&rkey=contentelementset&rt='.$strToken,true,array('key'));
		
		$this->Template->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="'.StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']).'" href="'.$strReferer.'">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>';
		
		$this->Template->main = '';
		$this->Template->action = StringUtil::ampersand(Environment::get('request'));
		$this->Template->objDataContainer = $this->objDC;
		$this->Template->elements = $arrElements;
		$this->Template->singles = $arrSingles;
		$this->Template->User = $this->User;
		$this->Template->styles = $arrStyles;

		// import
		if(\Contao\Input::post('install') != '' && Input::post('ELEMENTSET') != '')
		{
			$blnSuccess = $objContentElementSet->importByName(Input::post('ELEMENTSET'));
			if($blnSuccess)
			{
				// clear the clipboard
				$arrClipboard = $objSession->get('CLIPBOARD');
				unset($arrClipboard[$strTable]);
				$objSession->set('CLIPBOARD',$arrClipboard);
				
				// back to list view
				$strReferer = Controller::addToUrl('rt='.$strToken.'&clipboard=1',true,array('key','rkey'));
				
				Controller::redirect($strReferer);
			}
		}
		
		return $this->Template->parse();
	}
}