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
namespace PCT\AutoGrid;

/**
 * Imports
 */
use PCT\AutoGrid\Core as AutoGrid;


/**
 * Class file
 * ContaoCallbacks
 */
class ContaoCallbacks
{
	/**
	 * Autogrid Wrapper template
	 * @var string
	 */
	public $strAutoGridTemplate = 'autogrid';

	/**
	 * Handle content elements
	 * @param object
	 * @param string
	 * @param object
	 * @return string
	 */
	public function getContentElementCallback($objRow, $strBuffer, $objElement)
	{
		if( Controller::isBackend() )
		{
			return $strBuffer;
		}
		else if(in_array($objRow->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']))
		{
			$preg = preg_match('/class="(.*?)\"/', $strBuffer,$result);
			if($preg && strpos($strBuffer, 'ce_'.$objElement->type))
			{
				$classes = array_diff( explode(' ', $result[1]), array('ce_'.$objElement->type) );
				$strBuffer = str_replace($result[1], implode(' ', $classes), $strBuffer);
			}
			return $strBuffer;
		}

		if( (boolean)$objRow->autogrid === false )
		{
			return $strBuffer;
		}

		// wrap the element in the AutoGrid wrapper
		// @var object
		$objTemplate = new \Contao\FrontendTemplate( $this->strAutoGridTemplate );
		$objTemplate->setData( $objRow->row() );
		$objTemplate->html = $strBuffer;
		// add autogrid template variable Template->autogrid
		AutoGrid::addToTemplate($objTemplate);
		
		return $objTemplate->parse();
	}


	/**
	 * Collect include elements for further usage
	 * @param object
	 * @param boolean
	 * @return boolean
	 */
	public function isVisibleElementCallback($objRow, $blnReturn)
	{
		if( Controller::isBackend() )
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
		if( Controller::isBackend() )
		{
			return;
		}

		$objRow = clone($objTemplate);
		if( (int)$objTemplate->origID > 0 )
		{
			$objRow = \Contao\ContentModel::findByPk( $objTemplate->origID );
		}
		
		$arrClasses = explode(' ', $objTemplate->class);

		// remove the ce_TYPE class
		if(in_array($objRow->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']))
		{
			unset( $arrClasses[ array_search('ce_'.$objRow->type,$arrClasses) ] );
		}

		if( !isset($GLOBALS['PCT_AUTOGRID']['cssByType'][$objRow->type]) )
		{
			$GLOBALS['PCT_AUTOGRID']['cssByType'][$objRow->type] = array();
		}

		// collect css classes depending on the element type
		$arrFields = array_merge($GLOBALS['PCT_AUTOGRID']['cssByType'][$objRow->type] ?: array(),$GLOBALS['PCT_AUTOGRID']['cssByType']['*'] );
		foreach($arrFields as $field)
		{
			$arrClasses[] = $objRow->{$field};
		}
	
		$arrClasses = array_unique( array_filter($arrClasses) );
		
		// add to Contaos $this->class
		if( empty($arrClasses) === false)
		{
			$objTemplate->class = implode(' ', $arrClasses);
		}

		if( empty($objRow->AutoGrid) === true )
		{
			// add AutoGrid to template
			AutoGrid::addToTemplate($objTemplate,$objRow);
		}
	}


	/**
	* Handle form fields widgets
	* @param widget
	* @return widget
	*/
	public function parseWidgetCallback($strBuffer,$objWidget)
	{
		if( Controller::isBackend() )
		{
			return $strBuffer;
		} 
		elseif ( (boolean)$objWidget->autogrid === false ) 
		{
			return $strBuffer;
		}
		
		$objRow = \Contao\FormFieldModel::findByPk($objWidget->id);
		
		// @var object
		$objTemplate = new \Contao\FrontendTemplate( $this->strAutoGridTemplate );
		$objTemplate->setData( $objRow->row() );
		$objTemplate->html = $strBuffer;
		// add autogrid template variable Template->AutoGrid
		AutoGrid::addToTemplate($objTemplate);
		
		return $objTemplate->parse();
	}


	/**
	 * Validate the user grid layout setting
	 * @param string
	 * @param mixed
	 * @param object
	 * 
	 * called from addCustomRegexp Hook
	 */
	public function addCustomRegexpCallback($strRegexp, $varValue, $objWidget)
	{
		if($strRegexp != 'grid')
		{
			return false;
		}

		$objDC = $objWidget->__get('dataContainer');
		
		$strClass = \Contao\Model::getClassFromTable($objDC->table);
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = $strClass::findByPk($objDC->id);
		}
		

		$arrPreset = \PCT\AutoGrid\GridPreset::getGridPreset( $objDC->activeRecord->autogrid_grid );
		$intColumns = (int)$arrPreset['columns'] ?: 0;
		
		// validate against max columns
		if( $intColumns > 0 )
		{
			$values = explode(' ', $varValue);
			$count = count($values);

			// too many columns
			if( $count != $intColumns )
			{
				$objWidget->addError( sprintf($GLOBALS['TL_LANG']['XPT']['grid_rgxp']['column_count'], $count, $intColumns) );
				return true;
			}

			// check the units are %
			foreach($values as $i => $value)
			{
				// no percent orlast character is not percent
				if( strlen(strpos($value,'%')) < 1 || \substr($value,-1) != '%' )
				{
					$objWidget->addError( $GLOBALS['TL_LANG']['XPT']['grid_rgxp']['wrong_or_missing_unit'] );
					return true;
				}

				// no numeric value
				if( $value == '%' && strlen($value) == 1 )
				{
					$objWidget->addError( sprintf($GLOBALS['TL_LANG']['XPT']['grid_rgxp']['no_numeric_value'], $i+1) );
					return true;
				}

				// has alpha values
				$v = str_replace('%','',$value);
				if( !is_integer($v) && !is_numeric($v) )
				{
					$objWidget->addError( sprintf($GLOBALS['TL_LANG']['XPT']['grid_rgxp']['invalid_value'], $i+1) );
					return true;
				}
				
				// must be higher than 0
				if( $v <= 0 )
				{
					$objWidget->addError( sprintf($GLOBALS['TL_LANG']['XPT']['grid_rgxp']['higher_than_zero'], $i+1) );
					return true;
				}
			}
		}

		return false;
	}
}