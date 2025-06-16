<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_autogrid
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\AutoGrid;

/**
 * Imports
 */
use PCT\AutoGrid\Models\ContentModel as ContentModel;
use PCT\AutoGrid\Models\FormFieldModel as FormFieldModel;


/**
 * Class file
 * DcaHelper
 */
class DcaHelper extends \Contao\Backend
{
	/**
	 * Include the backend javascript to the backend page head
	 * @param string
	 * called from loadDataContainer HOOKs
	 */
	public function loadAssets()
	{
		if( Controller::isBackend() && \Contao\Input::get('act') != 'edit')
		{
			$GLOBALS['TL_JAVASCRIPT'][] = PCT_AUTOGRID_PATH.'/assets/js/be_autogrid.js';
		}
	}

	/**
	 * Return the option array for the regular select widget
	 * @param object DataContainer
	 * @return array
	 */
	public function getDesktopClasses()
	{
		return $GLOBALS['PCT_AUTOGRID']['classes'] ?: array();
	}


	/**
	 * Return the option array for the mobile classes
	 * @param object DataContainer
	 * @return array
	 */
	public function getMobileClasses()
	{
		return $GLOBALS['PCT_AUTOGRID']['mobile_classes'] ?: array();
	}


	/**
	 * Return the option array for the tablet classes
	 * @param object DataContainer
	 * @return array
	 */
	public function getTabletClasses()
	{
		return $GLOBALS['PCT_AUTOGRID']['tablet_classes'] ?: array();
	}


	/**
	 * Return the option array for the alignment select widget depending on the element type
	 * @param object DataContainer
	 * @return array
	 */
	public function getAlignmentClasses($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$strClass = \Contao\Model::getClassFromTable($objDC->table);
			$objDC->activeRecord = $strClass::findByPk($objDC->id);
		}
		
		$arrReturn = $GLOBALS['PCT_AUTOGRID']['alignments'] ?: array();
		// HOOK: set option depending on the element type
		if( isset($GLOBALS['PCT_AUTOGRID']['alignments::'.$objDC->activeRecord->type]) && is_array($GLOBALS['PCT_AUTOGRID']['alignments::'.$objDC->activeRecord->type]) === true )
		{
			$arrReturn = $GLOBALS['PCT_AUTOGRID']['alignments::'.$objDC->activeRecord->type];
		}
		return $arrReturn;
	}


	/**
	 * Return the option array for the offset classes select widget
	 * @param object DataContainer
	 * @return array
	 */
	public function getOffsetClasses()
	{
		return $GLOBALS['PCT_AUTOGRID']['offsets'] ?: array();
	}

	
	/**
	 * Return the option array for the padding classes select widget
	 * @param object DataContainer
	 * @return array
	 */
	public function getPaddingClasses()
	{
		return $GLOBALS['PCT_AUTOGRID']['padding_classes'] ?: array();
	}


	/**
	 * Return the option array for the gutter classes select widget
	 * @param object DataContainer
	 * @return array
	 */
	public function getGutterClasses()
	{
		return $GLOBALS['PCT_AUTOGRID']['gutters'] ?: array();
	}
	
	
	/**
	 * Return the option array for the grid preset 
	 * @param object DataContainer
	 * @return array
	 */
	public function getGridPresets()
	{
		if( !is_array($GLOBALS['PCT_AUTOGRID']['GRID_PRESETS']) )
		{
			return array();
		}
		
		return array_keys($GLOBALS['PCT_AUTOGRID']['GRID_PRESETS']);
	}


	/**
	 * Modify Contao DCA
	 * @param object
	 */
	// !modifyDCA
	public function modifyDCA($objDC)
	{
		$strClass = \Contao\Model::getClassFromTable($objDC->table);
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = $strClass::findByPk($objDC->id);
		}

		// add rgxp to autogrid_css in grid-presets
		if( $objDC->activeRecord !== null && $objDC->activeRecord->type == 'autogridGridStart' )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['autogrid_css']['eval']['rgxp'] = 'grid';
		}
		
		// tl_content: remove autogrid elements from type selection
		if( $objDC->table == 'tl_content' && in_array(\Contao\Input::get('act'), array('edit')) && !empty( $objDC->activeRecord->type ) )
		{
			$GLOBALS['TL_LANG']['CTE']['autogridRowStart'][0] = $GLOBALS['TL_LANG']['CTE']['autogridRowStart']['listLabel'][0];
			
			/// remove AG elements besides the one active
			foreach(array('autogridGridStart','autogridGridStop','autogridRowStop','autogridColStop') as $k )
			{
				// remove element besides autogridColStart when inside a autogridRowStart
				if( $objDC->activeRecord->type != $k )
				{
					unset($GLOBALS['TL_CTE']['autogrid_node'][$k]);
				}
			}

			// check if autogridColStart is inbetween an autogridRowStart
			$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridGridStart')) ) );
			$objStart = ContentModel::findPreviousById($objDC->id, $arrOptions);
			$objBetween = ContentModel::findAllByStartId($objStart->id ?? 0);
			if( $objBetween !== null )
			{
				if( $objDC->activeRecord->type != 'autogridColStart' && !in_array($objDC->activeRecord->id, $objBetween->fetchEach('id') ) )
				{
					unset($GLOBALS['TL_CTE']['autogrid_node']['autogridColStart']);
				}

				if( $objStart->type == 'autogridGridStart' )
				{
					unset($GLOBALS['TL_CTE']['autogrid_node']['autogridColStart']);
				}

				if( !\in_array($objStart->type, array('autogridRowStart','autogridGridStart')) )
				{
					unset($GLOBALS['TL_CTE']['autogrid_node']['autogridColStart']);
				}
				
				// set the palettes depending on start element
				if( isset($GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_'.$objStart->type]) )
				{
					$GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart'] = $GLOBALS['TL_DCA']['tl_content']['palettes']['autogridColStart_'.$objStart->type];
				}
			}
			// autogridCols must be inbetween elements
			else 
			{
				unset($GLOBALS['TL_CTE']['autogrid_node']['autogridColStart']);
			}
		}
		// tl_form_field
		else if( $objDC->table == 'tl_form_field' && in_array(\Contao\Input::get('act'), array('edit')) )
		{
			unset($GLOBALS['TL_FFL']['autogridRowStop']);
			unset($GLOBALS['TL_FFL']['autogridColStop']);
		}
		
		// remove ,type, selection from DCA for existing autogridRowStart Elements
		if( $objDC->activeRecord !== null && $objDC->activeRecord->type == 'autogridRowStart' && $objDC->activeRecord->tstamp > 0 )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = str_replace(',type','',$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]);
		}
		
		//-- toggle the autogrid selector and its behaviour inbetween autogridRows, autogridCols
		$blnShowAutoGrid = false;
		// tl_content
		if( $objDC->table == 'tl_content' && in_array(\Contao\Input::get('act'), array('edit')) )
		{
			$strClass= 'PCT\AutoGrid\Models\ContentModel';
			if( $objDC->table == 'tl_form_field' )
			{
				$strClass = 'PCT\AutoGrid\Models\FormFieldModel';
			}
			
			// fetch closest start element before
			$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridColStart','autogridColStop')) ) );
			$objStart = $strClass::findPreviousById($objDC->id, $arrOptions);
			// fetch autogridRowStart if closest element is a colStop
			if( isset($objStart->type) && $objStart->type == 'autogridColStop' )
			{
				$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart')) ) );
				$objStart = $strClass::findPreviousById($objDC->id, $arrOptions);
			}

			// inbetween autogridCols
			if( isset($objStart->type) && $objStart->type == 'autogridColStart' )
			{
				$objBetween = $strClass::findAllByStartId($objStart->id);
				if( $objBetween !== null )
				{
					if( in_array($objDC->activeRecord->id, $objBetween->fetchEach('id') ) )
					{
						$blnShowAutoGrid = false;
					}
				}
			}
			// inbetween autogridRows
			else if( isset($objStart->type) && $objStart->type == 'autogridRowStart' )
			{
				$objBetween = $strClass::findAllByStartId($objStart->id);
				if( $objBetween !== null )
				{
					if( in_array($objDC->activeRecord->id, $objBetween->fetchEach('id') ) )
					{
						$blnShowAutoGrid = true;
						// AG is mandatory in flex
						$GLOBALS['TL_DCA'][$objDC->table]['fields']['autogrid']['eval']['mandatory'] = true;
					}
				}
			}
		}
		else
		{
			$blnShowAutoGrid = true;
			unset( $GLOBALS['TL_DCA'][$objDC->table]['fields']['autogrid']['eval']['mandatory'] );
		}
	
		if( $blnShowAutoGrid === false )
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['autogrid']);
			return;
		}
		// --

		if( $objDC->activeRecord !== null && in_array($objDC->activeRecord->type,$GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
		{
			unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['autogrid']);
		}
	}
	

	/**
	 * Manipulate autogrid_css fields onload
	 * @param mixed
	 * @param object
	 * @return mixed
	 */
	public function loadGridDefinition($varValue, $objDC)
	{
		$strClass = \Contao\Model::getClassFromTable($objDC->table);
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = $strClass::findByPk($objDC->id);
		}

		if($objDC->activeRecord->type == 'autogridGridStart')
		{
			// change field type to text
			$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['inputType'] = 'text';
			
			// find preset definition
			$arrGridPreset = $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][$objDC->activeRecord->autogrid_grid];
			
			if( is_array($arrGridPreset) && !empty($arrGridPreset) )
			{
				$key = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['grid'];
				// set new value
				if( empty($varValue) )
				{
					$varValue = $arrGridPreset['grid'][$key];
				}
				// set default value
				$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['default'] = $varValue;
			}
		}
		return $varValue;
	}


	/**
	 * Restore the default values when saved empty
	 * @param mixed
	 * @param object
	 * @return mixed
	 */
	public function restoreDefaultOnEmpty($varValue, $objDC)
	{
		if( empty($varValue) === false || (isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['doNotSaveEmpty']) && (boolean)$GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['doNotSaveEmpty'] === false) )
		{
			return $varValue;
		}
		
		$strClass = \Contao\Model::getClassFromTable($objDC->table);
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = $strClass::findByPk($objDC->id);
		}

		if($objDC->activeRecord->type == 'autogridGridStart' && isset($GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][$objDC->activeRecord->autogrid_grid]))
		{
			$key = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['grid'];
			$varValue = $GLOBALS['PCT_AUTOGRID']['GRID_PRESETS'][$objDC->activeRecord->autogrid_grid]['grid'][$key];
		}

		return $varValue;
	}


	/**
	 * Return the "new flex grid" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getNewFlexButton($href, $label, $title, $class, $attributes)
	{
		$strButtons = '<ul class="selection">';
		for($i=1; $i<=4; $i++)
		{
			$_href = $this->addToUrl('act=paste&amp;mode=create&amp;flex_cols='.$i);
			$_title = $title.': '.$GLOBALS['TL_LANG']['MSC']['new_flex']['cols_'.$i];
			$_link = $GLOBALS['TL_LANG']['MSC']['new_flex']['cols_'.$i];
			$strButtons .= '<li class="item cols_'.$i.'" data-cols="'.$i.'"><a href="'.$_href.'" title="'.$_title.'"><span class="icon"></span><span class="label">'.$_link.'</span></a></li>';
		}
		// grid preset button
		$strGridPresetButton = '<a href="'.$this->addToUrl('act=paste&amp;mode=create&amp;rkey=grid_preset').'" class="grid_preset" title="'.$GLOBALS['TL_LANG']['MSC']['new_grid'][1].'" onclick="Backend.getScrollOffset()" accesskey="e"><span class="icon"></span><span class="label">'.$GLOBALS['TL_LANG']['MSC']['new_grid'][0].'</span></a>';
		
		$strButtons .= '<li class="grid_preset">'.$strGridPresetButton.'</li>';
		$strButtons .= '</ul>';
		return '<span id="ag_new_flex" class="'.$class.' new_flex" title="'. \Contao\StringUtil::specialchars($title).'"'.$attributes.'><span class="label">'.$label.'</span>'.$strButtons.'</span> ';
	}


	/**
	 * Listen to autogrid UP/DOWN button on ajax
	 * @param object
	 */
	public function buttonAjaxListener($objDC)
	{
		if( (boolean)\Contao\Environment::get('isAjaxRequest') === false || \Contao\Input::get('autogrid') == '' || (int)\Contao\Input::get('elem') < 1 || \Contao\Input::get('class') == '' )
		{
			return;
		}

		$strClass = \Contao\Model::getClassFromTable($objDC->table);
		$objModel = $strClass::findByPk( (int)\Contao\Input::get('elem') );
		if( $objModel === null )
		{
			return;
		}

		$strField = 'autogrid_css';
		$strValue = \Contao\Input::get('class');
		if( \Contao\Input::get('viewport') == 'tablet' )
		{
			$strField = 'autogrid_tablet';
			$strValue .= '_t';
		}
		else if( \Contao\Input::get('viewport') == 'mobile' )
		{
			$strField = 'autogrid_mobile';
			$strValue .= '_m';
		}

		$objModel->__set($strField,$strValue);
		$objModel->save();
	}


	/**
	 * Return the "delete_block" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
   public function getDeleteBlockButton($row, $href, $label, $title, $icon, $attributes)
   {
		if( !in_array($row['type'], $GLOBALS['PCT_AUTOGRID']['startElements']) )
		{
			return '';
		}
		return '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ';
   }


	/**
	 * Delete block listener
	 * @param object
	 */
	public function deleteBlockListener($objDC)
	{
		if( \Contao\Input::get('action') == 'delete_block' && (int)\Contao\Input::get('id') > 0 )
		{
			// simulate deleteAll call
			\Contao\Input::setGet('act','deleteAll');

			$objModels = null;
			if( $objDC->table == 'tl_content' )
			{
				$objModels = ContentModel::findAllByStartId($objDC->id);
			}
			else if( $objDC->table == 'tl_form_field' )
			{
				$objModels = FormFieldModel::findAllByStartId($objDC->id);
			}
			
			if( $objModels === null )
			{
				return;
			}

			// delete them all
			foreach($objModels as $model)
			{
				$dc = clone($objDC);
				$dc->activeRecord = null;
				$dc->intId = $model->id;
				$dc->delete(true);
			}

			// redirect to backend page
			$this->redirect( \Contao\Controller::getReferer() );
		}
	}
	

	/**
	 * Save the uuid instead of file path
	 * @var string
	 * @var object
	 * @return string
	 */
	public function saveUuidFromPath($varValue, $objDC)
	{
		if( empty($varValue) )
		{
			return $varValue;
		}

		$objFile = \Contao\Dbafs::addResource( str_replace(array('%20'),array(' '), \urldecode($varValue) ) );
		if( $objFile === null )
		{
			return '';
		}
		
		return \Contao\StringUtil::binToUuid( $objFile->uuid );
	}


	/**
	 * Load the file path from the uuid
	 * @var string
	 * @var object
	 * @return string
	 */
	public function loadPathFromUuid($varValue, $objDC)
	{
		$objFile = \Contao\FilesModel::findByPk($varValue);
		if( $objFile === null )
		{
			return $varValue;
		}
		return $objFile->path;
	}
}