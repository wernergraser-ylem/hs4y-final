<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2019
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_theme_settings
 * @link  http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\ThemeSettings;

use Contao\ModuleModel;
use Contao\StringUtil;


/**
 * Class file
 * ContaoCallbacks
 *
 * Provide various callbacks to contao hooks
 */
class ContaoCallbacks
{
	/**
	 * Run scripts on Contao init
	 * @ called from initializeSystem Hook
	 */
	public function initializeSystemCallback()
	{
		// append themify-icons.css to Iconpicker
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		if( \file_exists($rootDir.'/files/cto_layout/css/themify-icons.css') )
		{
			$arrFiles = \Contao\StringUtil::deserialize( \Contao\Config::get('iconStylesheets') ) ?: array();
			$arrFiles[] = \Contao\StringUtil::binToUuid( \Contao\Dbafs::addResource('files/cto_layout/css/themify-icons.css')->uuid );
			\Contao\Config::set('iconStylesheets',$arrFiles);
			
			$arrClasses = \explode(',', \Contao\Config::get('customIconClasses') ?: '');
			$arrClasses[] = '.ti-';
			$arrClasses[] = '.ti-themify';
			\Contao\Config::set('customIconClasses', \implode(',',array_unique($arrClasses)));
		}
	}


	/**
	 * Add the theme setting related information to the article template
	 * @param object The article template object
	 * @param array  The db row information
	 * @param object The class object
	 *
	 * called from compileArticle Hook
	 */
	public function compileArticleCallback($objTemplate,$arrData,$objArticle)
	{
		\PCT\ThemeSettings\Core::addToTemplate($objTemplate,$objArticle);
	}
	
	
	/**
	 * Inject theme classes in content elements
	 * @param object
	 * @param string
	 * @param objElement
	 * @return string
	 */
	public function getContentElementCallback($objRow, $strBuffer, $objElement)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) === false )
		{
			return $strBuffer;
		}
		
		// handle include elements
		//if( $objElement->type == 'alias' )
		//{
		//	$objModel = \Contao\ContentModel::findByPk($objElement->cteAlias);
		//	if ($objModel === null)
		//	{
		//		return $strBuffer;
		//	}
		//	
		//	$strClass = \Contao\ContentElement::findClass($objModel->type);
		//	if( class_exists($strClass) === false)
		//	{
		//		return $strBuffer;
		//	}
		//	
		//	$objOrigElement = new $strClass($objModel);
		//	
		//	// run recursive here to get all the autogrid features for the original element
		//	return $this->getContentElementCallback($objModel,$strBuffer,$objOrigElement);
		//}
		
		$blnGenerate = false;

		// set the ce_headline_seo template for headlines when seo is active and no custom template is set
		if($objElement->type == 'headline' && $objRow->seo  && empty($objRow->customTpl))
		{
			$objElement->customTpl = $GLOBALS['PCT_THEME_SETTINGS']['templateByType']['headline_seo'];
			$blnGenerate = true;
		}
		else if($objElement->type == 'text' && $objRow->seo && empty($objRow->customTpl))
		{
			$objElement->customTpl = $GLOBALS['PCT_THEME_SETTINGS']['templateByType']['text_seo'];
			$blnGenerate = true;
		}
		// C5 accordion, slider
		else if( \in_array($objRow->type,array('accordion','slider') ) )
		{
			$arrCssId = StringUtil::deserialize($objRow->cssID);
			
			$template = new \stdClass;
			$template->class = \implode(' ', \explode(' ',$arrCssId[1] ?? '') );
			$template->origID = $objRow->id;
			$this->parseTemplateCallback($template);
			
			$arrCssId[1] = $template->class;
			
			$objRow->__set('cssID',$arrCssId);
			$objRow->__set('helper_css',StringUtil::deserialize($objRow->helper_css));
			
			return $objElement->generate();
		}

		if($blnGenerate === true)
		{
			$strClass = \Contao\ContentElement::findClass($objRow->type);
			if( class_exists($strClass) === false)
			{
				return $strBuffer;
			}
			// set new template
			$objRow->customTpl = $objElement->customTpl;
			// @var object
			$objElement = new $strClass($objRow);
			// regenerate the element with the new template
			$strBuffer = $objElement->generate();
		}
	
		return $strBuffer;
	}


	/**
	* Handle form fields widgets
	* @param widget
	* @return widget
	*/
	public function loadFormFieldCallback($objWidget)
	{
		if( empty($objWidget->visibility_css) === false )
		{
			$objWidget->class = ' '.$objWidget->visibility_css;
		}
		return $objWidget;
	}


	/**
	 * Collect include elements for further usage
	 * @param object
	 * @param boolean
	 * @return boolean
	 */
	public function isVisibleElementCallback($objRow, $blnReturn)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) === false )
		{
			return $blnReturn;
		}

		$objModel = null;

		// include module
		if( $objRow->type == 'module' )
		{
			$objModel = \Contao\ModuleModel::findByPk($objRow->module);
		}
		// include form
		else if( $objRow->type == 'form' )
		{
			$objModel = \Contao\FormModel::findByPk($objRow->form);
		}
		// include content element
		else if( $objRow->type == 'alias' )
		{
			$objModel = \Contao\FormModel::findByPk($objRow->cteAlias);
		}
		// include article
		else if( $objRow->type == 'article' )
		{
			$objModel = \Contao\ArticleModel::findByPk($objRow->articleAlias);
		}

		// frontend module
		if( $objRow->getTable() == 'tl_module' )
		{
			$arrCssId = \Contao\StringUtil::deserialize($objRow->cssID);
			if( empty($objRow->visibility_css) === false )
			{
				$arrCssId[1] .= ' '.$objRow->visibility_css;
			}
			$objRow->__set('cssID',$arrCssId);
		}

		if( $objModel !== null )
		{
			$objModel->__set('origID',$objRow->id);
			$objModel->__set('isInclude',true);
		}
		
		return $blnReturn;
	}


	/**
	 * Add information to the template object
	 * @param object
	 */
	public function parseTemplateCallback($objTemplate)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) === false )
		{
			return $objTemplate;
		}

		$objRow = clone($objTemplate);
		if( (int)$objTemplate->origID > 0 )
		{
			$objRow = \Contao\ContentModel::findByPk( $objTemplate->origID );
		}
		
		$arrClasses = explode(' ', $objTemplate->class);

		if( !isset($GLOBALS['PCT_THEME_SETTINGS']['cssByType'][$objRow->type]) )
		{
			$GLOBALS['PCT_THEME_SETTINGS']['cssByType'][$objRow->type] = array();
		}

		// collect css classes depending on the element type
		$arrFields = array_merge($GLOBALS['PCT_THEME_SETTINGS']['cssByType'][$objRow->type] ?: array(),$GLOBALS['PCT_THEME_SETTINGS']['cssByType']['*'] );
		foreach($arrFields as $field)
		{
			$arrClasses[] = $objRow->{$field};
		}

		// helper classes
		if( isset($objRow->helper_css) && !empty($objRow->helper_css) )
		{
			$arrClasses[] = \implode(' ',StringUtil::deserialize( $objRow->helper_css ) );
		}

		// animation classes
		foreach( array('animation_type','animation_speed','animation_delay') as $field)
		{
			if( isset($objRow->{$field}) && !empty($objRow->{$field}) )
			{
				$arrClasses[] = $objRow->{$field};
			}
		}

		// icon picker is active
		if( isset($objRow->{'addFontIcon'}) && !empty($objRow->{'addFontIcon'}) && !empty($objRow->{'fontIcon'}) )
		{
			$arrClasses[] = 'has-icon';
			if( $objRow->type == 'hyperlink' && ( !isset($objRow->{'icon_position'}) || empty($objRow->{'icon_position'}) ) )
			{
				$arrClasses[] = 'icon-pos-before';
			}
		}
		
		$arrClasses = array_unique( array_filter($arrClasses) );
		
		// add to Contaos $this->class
		if( empty($arrClasses) === false)
		{
			$objTemplate->class = implode(' ', $arrClasses);
		}
	}
	

	// !Inserttags


	/**
	 * Replace insert tags
	 * @param string
	 * @return boolean||mixed
	 *
	 * called from replaceInsertTags Hook
	 */
	public function replaceInsertTagsCallback($strElement)
	{
		$arrElements = explode('::', $strElement);
		
		// label-
		if( strlen(strpos($arrElements[0], 'label-')) > 0 )
		{
			$arr = $arrElements;
			$arrElements[0] = 'label-';
			$arrElements[1] = str_replace('label-','',$arr[0]);
			$arrElements[2] = $arr[1];
			unset($arr);
		}
		
		// color-
		if( strlen(strpos($arrElements[0], 'color-')) > 0 )
		{
			$arr = $arrElements;
			$arrElements[0] = 'color-';
			$arrElements[1] = str_replace('color-','',$arr[0]);
			$arrElements[2] = $arr[1];
			unset($arr);
		}
		
		switch($arrElements[0])
		{
			// color-
			case 'color-':
				return '<span class="color-'.$arrElements[1].'">'.$arrElements[2].'</span>';
				break;
			// label-
			case 'label-':
				return '<span class="label-'.$arrElements[1].'">'.$arrElements[2].'</span>';
				break;
			// module by alias
			case 'module':
			case 'insert_module_alias':
				$objModule = ModuleModel::findBy( array(ModuleModel::getTable().'.alias=?'),array($arrElements[1]) );
				if( $objModule !== null )
				{
					return '{{insert_module::'.$objModule->id.'}}';
				}
				return '';
				break;
			default:
				break;
		}

		return false;
	}


	// !News


	/**
	 * Enable manual sorting for tl_news
	 * @param string
	 * @called from loadDataContainer Hook
	 */
	public function enableManualSorting($strTable)
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) === false )
		{
			return;
		}
		
		if($strTable != 'tl_news')
		{
			return;
		}

		$objArchive = null;
		$intArchive = 0;
		if(!\Contao\Input::get('act'))
		{
			$intArchive = \Contao\Input::get('id');
		}
		else if(in_array(\Contao\Input::get('act'),array('cut','copyAll')) || in_array(\Contao\Input::get('mode'),array('cut','cutAll')) )
			{
				$objActiveRecord = \Contao\NewsModel::findByPk( \Contao\Input::get('id') );
				$intArchive = $objActiveRecord->pid;
			}

		#$objArchive = $objArchive = \Contao\NewsArchiveModel::findByPk($intArchive);
		$objArchive = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_news_archive WHERE id=?")->limit(1)->execute($intArchive);
		
		if($objArchive->manualSorting)
		{
			$GLOBALS['TL_DCA']['tl_news']['list']['sorting']['fields'] = array('sorting');

			// add the sorting field as backend sorting option
			$GLOBALS['TL_DCA']['tl_news']['fields']['sorting']['sorting'] = true;

			// bypass the permission check on cut, cutAll to allow manual sorting
			if( \in_array(\Contao\Input::get('act'),array('cut','cutAll')) )
			{
				if(is_array($GLOBALS['TL_DCA']['tl_news']['config']['onload_callback']))
				{
					foreach($GLOBALS['TL_DCA']['tl_news']['config']['onload_callback'] as $i => $callback)
					{
						if(!is_array($callback) || empty($callback))
						{
							continue;
						}

						if($callback[0] == 'tl_news' && $callback[1] == 'checkPermission')
						{
							unset($GLOBALS['TL_DCA']['tl_news']['config']['onload_callback'][$i]);
						}
					}
				}
			}
		}
	}


	/**
	 * Apply manual sorting for news
	 * @param array
	 * @param boolean
	 * @param integer
	 * @param integer
	 * @return object||null||false
	 * called from $GLOBALS['TL_HOOKS']['newsListFetchItems']
	 */
	public function newsListFetchItemsCallback($arrArchives, $blnFeatured, $intLimit, $intOffset, $objModule)
	{
		if( $objModule->news_order != 'sorting' )
		{
			return false;
		}
		
		$arrOptions = array( 'order' => 'sorting' );
		
		// news list filtering
		// fetch portfoliofilters related to this list
		#$objFilterModules = \Contao\ModuleModel::findBy( array('news_readerModule','news_sysfilter'), array($objModule->id,1) );
		#if( $objFilterModules !== null )
		#{
		#	$arrIds = static::filterNews($arrArchives, $blnFeatured, $intLimit, $intOffset, $arrOptions);
		#	if( !empty($arrIds) )
		#	{
		#		$arrOptions['column'] = array($strTable.'.id IN('.implode(',', $arrIds).')');
		#	}
		#}
		
		return \Contao\NewsModel::findPublishedByPids($arrArchives, $blnFeatured, $intLimit, $intOffset, $arrOptions);
	}


	/**
	 * Calculate the number of news items after applying the filter
	 * @param array
	 * @param boolean
	 * @param object
	 * @return object||integer||boolean(false)
	 *
 	 * called from $GLOBALS['TL_HOOKS']['newsListCountItems']
	 */
	public function newsListCountItemsCallback($arrArchives, $blnFeatured, $objModule)
	{
		// fetch portfoliofilters related to this list
		#$objFilterModules = \Contao\ModuleModel::findBy( array('news_readerModule','news_sysfilter'), array($objModule->id,1) );
		
		#if( $objFilterModules === null || \Contao\Input::get('filter') == '' )
		#{
		#	return false;
		#}
		
		$arrIds = static::filterNews($arrArchives, $blnFeatured, 0, 0, array());
		
		return count($arrIds);
	}
	
	
	/**
	 * Filter news entries
	 * @param array
	 * @param boolean
	 * @param integer
	 * @param integer
	 * @return array
	 */
	public static function filterNews($arrArchives, $blnFeatured, $intLimit, $intOffset, $arrOptions)
	{
		if( \Contao\Input::get('filter') == '' )
		{
			return array();
		}
		
		$strTable = \Contao\NewsModel::getTable();
		
		// active url filters
		$arrFilters = array_filter( explode(',', \Contao\Input::get('filter') ) );
		
		$arrOptions['column'] = array($strTable.'.addFilter=1');
		
		// fetch all entries 
		$objEntries = \Contao\NewsModel::findPublishedByPids($arrArchives,$blnFeatured,$intLimit,$intOffset,$arrOptions);
		if($objEntries === null)
		{
			return array();
		}
		
		$arrIds = array();
		foreach($objEntries as $objModel)
		{
			$filter = StringUtil::deserialize($objModel->filters);
			
			if( empty( array_intersect($filter, $arrFilters) ) )
			{
				continue;
			}
			
			$arrIds[] = $objModel->id;
		}
		
		return $arrIds;
	}
}