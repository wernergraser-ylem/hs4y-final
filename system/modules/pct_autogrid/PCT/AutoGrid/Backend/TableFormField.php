<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\AutoGrid\Backend;

/**
 * Imports
 */

use Contao\BackendUser;
use PCT\AutoGrid\Models\FormFieldModel as FormFieldModel;

/**
 * Class file
 * TableFormField
 */
class TableFormField extends \Contao\Backend
{
	/**
	 * Table
	 */
	protected $strTable = 'tl_form_field';
	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\Contao\System::import(BackendUser::class, 'User');

		$this->Session = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		if( $this->Database === null )
		{
			$this->Database = \Contao\Database::getInstance();
		}
	}


	/**
	 * Modfy the DCA
	 * @param object
	 */
	public function modifyDCA($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = FormFieldModel::findByPk($objDC->id);
		}
		
		// load specific templates
		if( isset($objDC->activeRecord->type) && \in_array($objDC->activeRecord->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array(\get_class($this),'loadTemplates');
		}
		
		// margin fields and AG fields
		foreach ($GLOBALS['TL_DCA'][$objDC->table]['palettes'] as $k => $v) 
		{
			if( $k == '__selector__' )
			{
				continue;
			}
			
			if( strpos($GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k],'autogrid;') === false )
			{
				// inject autogrid palette
				$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$k] .= ';{autogrid_legend},autogrid;';
			}
		}
	}


	/**
	 * Load templates to customTpl field
	 * @param object
	 * @return array
	 */
	public function loadTemplates($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\FormFieldModel::findByPk($objDC->id);
		}
		
		if( !isset($objDC->activeRecord->type) )
		{
			return array();
		}
		
		$arrReturn = array();

		switch( $objDC->activeRecord->type )
		{
			case 'autogridRowStart':
			case 'autogridRowStop':
				$arrReturn = $this->getTemplateGroup('form_autogrid_row',array(),'form_autogrid_row');
				unset( $arrReturn['form_autogrid_row'] );
				break;
			case 'autogridGridStart':
			case 'autogridGridStop':
				$arrReturn = $this->getTemplateGroup('form_autogrid_grid',array(),'form_autogrid_grid');
				unset( $arrReturn['form_autogrid_grid'] );
				break;
			case 'autogridColStart':
			case 'autogridColStop':
				$arrReturn = $this->getTemplateGroup('form_autogrid_col',array(),'form_autogrid_col');
				unset( $arrReturn['form_autogrid_col'] );
				break;
			default: 
				return $this->getTemplateGroup('form_');
				break;
		}
		
		return $arrReturn;
	}
	

	/**
	 * Create sibling row-stop element
	 * @param integer
	 * @param object
	 */
	public function createSiblingStopElement($objDC)
	{
		$objDC->activeRecord = FormFieldModel::findByPk($objDC->id);

		// no start element or just a submitOnChange
		if( !isset($objDC->activeRecord->type) || array_key_exists($objDC->activeRecord->type, $GLOBALS['PCT_AUTOGRID']['createSiblingOnCreate']) === false || \Contao\Input::post('SUBMIT_TYPE') == 'auto' )
		{
			return;
		}
		
		// element is flagged, check if it has a stop sibling already
		$objStop = null;
		if( $objDC->activeRecord->autogrid_id > 0 )
		{
			$objStop = FormFieldModel::findSiblingByTypeAndPidAndAutoGridId($objDC->activeRecord->type,$objDC->activeRecord->pid,$objDC->activeRecord->autogrid_id);		
		}
		
		if( $objStop !== null )
		{
			return;
		}
		
		$strStop = $GLOBALS['PCT_AUTOGRID']['createSiblingOnCreate'][$objDC->activeRecord->type];
		
		$arrSet = $objDC->activeRecord->row();
		unset($arrSet['id']);
		// reference the start element
		$arrSet['type'] = $strStop;
		$arrSet['sorting'] = $objDC->activeRecord->sorting + 1;
		$arrSet['autogrid_id'] = $objDC->id;
		$this->Database->prepare("INSERT INTO ".$objDC->table." %s")->set($arrSet)->execute();
		
		// update this element
		$objDC->activeRecord->__set('autogrid_id',$objDC->id);
		$objDC->activeRecord->save();
	}


	/**
	 * Delete the sibling STOP element and AG Elements between when a START element is being deleted
	 * @param object
	 * @param integer
	 * 
	 * @called from ondelete_callback
	 */
	public function deleteSiblings($objDC,$intUndo)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = FormFieldModel::findByPk($objDC->id);
		}
		
		if( !isset($objDC->activeRecord->type) )
		{
			return;
		}
		
		$strType = $objDC->activeRecord->type;
		if( array_key_exists($strType, $GLOBALS['PCT_AUTOGRID']['deleteSiblingOnDelete']) === false )
		{
			return;
		}
				
		$objStop = FormFieldModel::findSiblingByTypeAndPidAndAutoGridId($strType,$objDC->activeRecord->pid,$objDC->activeRecord->autogrid_id);
		
		if( $objStop === null )
		{
			return;
		}
		
		$arrEffected = $GLOBALS['PCT_AUTOGRID']['deleteNestedOnDelete'][$strType] ?: array();

		$objBetween = FormFieldModel::findBetween($objDC->id, $objStop->id);
		
		if($objBetween !== null)
		{
			while($objBetween->next())
			{
				// do not delete elements depending on start element
				if( in_array($objBetween->type, $arrEffected) === false )
				{
					continue;
				}

				// check if record is part of AG and delete it
				if( in_array($objBetween->type, $GLOBALS['PCT_AUTOGRID']['wrapperElements']) )
				{
					$dc = clone($objDC);
					$dc->activeRecord = null;
					$dc->intId = $objBetween->id;
					$dc->delete(true);
				}
			}
		}
		
		// delete STOP
		$dc = clone($objDC);
		$dc->activeRecord = null;
		$dc->intId = $objStop->id;
		$dc->delete(true);
	}


	/**
	 * oncopy event listener
	 * @param integer
	 * @param object
	 * 
	 * called from oncopy_callback
	 */
	public function oncopy_toggleAutoGrid($intId,$objDC)
	{
		// do not effect the block-copy-event from AG
		$arrSession = $this->Session->get('NEW_AG_ELEMENTS');
		if( is_array($arrSession[$objDC->table]) === true && empty($arrSession[$objDC->table]) === false && \Contao\Input::get('act') == 'copyAll' )
		{
			return;
		}
		$dc = clone($objDC);
		$dc->id = $intId;
		$this->toggleAutoGrid($objDC);
	}

	
	/**
	 * oncut event listener
	 * @param integer
	 * @param object
	 * 
	 * called from oncut_callback
	 */
	public function oncut_toggleAutoGrid($objDC)
	{
		$this->toggleAutoGrid( clone($objDC) );
	}
	

	/**
	 * Enable or disable AG on contao events or data container information
	 * @param object
	 */
	public function toggleAutoGrid($objDC=null)
	{
		if( $objDC === null || (int)$objDC->id < 1 )
		{
			return;
		}
		
		$objDC->activeRecord = FormFieldModel::findByPk($objDC->id);
		$strSession = 'TOGGLE_AG_ELEMENTS_'.$objDC->table;
		// get further ids that should be ignored
		$arrIgnore = $this->Session->get($strSession) ?: array();
		if( is_array($arrIgnore) === false )
		{
			$arrIgnore = array();
		}
		// do not manipulate elements effected when an AG Start elements is being called
		if( in_array($objDC->activeRecord->type,$GLOBALS['PCT_AUTOGRID']['startElements']) === true )
		{
			$objEffected = FormFieldModel::findAllByStartId($objDC->id);
			// store effected records in session
			if( $objEffected !== null )
			{
				$arrIgnore = array_unique( array_merge($arrIgnore, $objEffected->fetchEach('id')) );
				$this->Session->set($strSession,$arrIgnore);
			}
		}
		// if the element should no be effected return here
		if( in_array($objDC->id, $arrIgnore) === true )
		{
			// reduce array
			unset($arrIgnore[ array_search($objDC->id, $arrIgnore) ]);
			// update session
			$this->Session->set($strSession,$arrIgnore);
			return;
		}

		// check if element is wrapped between autogridRows or autogridCols
		#$objStart = $this->Database->prepare("SELECT * FROM ".$objDC->table." WHERE pid=? AND sorting <= ? AND ".$this->Database->findInSet('type',array('autogridRowStart,autogridColStart'))." ORDER BY sorting ASC")->limit(1)->execute($objDC->activeRecord->pid,$objDC->activeRecord->sorting);
		// check if element is wrapped between autogridRows or autogridCols
		$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridColStart')) ) );
		$objStart = FormFieldModel::findPreviousById($objDC->id, $arrOptions);
		
		// no start element before and AG is active -> disable
		if( (int)$objStart->id < 1 && (boolean)$objDC->activeRecord->autogrid === true )
		{
			return $this->setAutoGrid($objDC->id, false);
		}
		
		// find stop element and elements between
		$objStop = FormFieldModel::findSiblingByTypeAndPidAndAutoGridId($objStart->type,$objStart->pid,$objStart->autogrid_id);		
		$objBetween = FormFieldModel::findBetween($objStart->id,$objStop->id,array(),true);

		$arrBetween = array();
		if( $objBetween !== null )
		{
			$arrBetween = $objBetween->fetchEach('id');
		}
		
		// elements is between grid columns
		if( in_array($objDC->id, $arrBetween) === true && $objStart->type == 'autogridColStart'  )
		{
			return $this->setAutoGrid($objDC->id, false);
		}
		// elements is between flex rows
		else if( in_array($objDC->id, $arrBetween) === true && $objStart->type == 'autogridRowStart'  )
		{
			return $this->setAutoGrid($objDC->id, true);
		}
		// between nothing
		else
		{
			return $this->setAutoGrid($objDC->id, false);
		}
	}


	/**
	 * Update the AutoGrid state for a certain record
	 * @param integer
	 * @param boolean
	 * @param array
	 */
	public function setAutoGrid($intId, $blnValue, $arrSet=array())
	{
		// @var object
		$objModel = FormFieldModel::findByPk($intId);
		$objModel->__set('autogrid',$blnValue);
		if( count($arrSet) > 0 )
		{
			foreach($arrSet as $k => $v)
			{
				$objModel->__set($k,$v);
			}
		}
		$objModel->save();
		return $blnValue;
	}


	/**
	 * Active AutoGrid for new elements in between flex rows
	 * @param integer
	 * @param object
	 * 
	 * called from onsubmit_callback
	 */
	public function activateAutoGridInFlexRows($objDC)
	{
		$objModel = FormFieldModel::findByPk($objDC->id);
		
		// fetch closest start element before
		$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart,autogridColStart','autogridColStop')) ) );
		$objStart = FormFieldModel::findPreviousById($objDC->id, $arrOptions);
		// fetch autogridRowStart if closest element is a colStop
		if( $objStart->type == 'autogridColStop' )
		{
			$arrOptions = array('column'=> array($this->Database->findInSet('type',array('autogridRowStart')) ) );
			$objStart = FormFieldModel::findPreviousById($objDC->id, $arrOptions);
		}
		
		// deactivate autogrid inbetween autogridCols
		if( $objStart->type == 'autogridColStart' )
		{
			$objBetween = FormFieldModel::findAllByStartId($objStart->id);
			if( $objBetween !== null )
			{
				if( in_array($objDC->activeRecord->id, $objBetween->fetchEach('id') ) && (boolean)$objModel->autogrid === true )
				{
					// show backend info
					\Contao\Message::addInfo($GLOBALS['TL_LANG']['AUTOGRID_MESSAGES']['colInfo']);

					// @var object
					$objModel->__set('autogrid',0);
					$objModel->save();
				}
			}
		}
		// activate autogrid inbetween autogridCols
		else if($objStart->type == 'autogridRowStart' )
		{
			$objBetween = FormFieldModel::findAllByStartId($objStart->id);
			if( $objBetween !== null )
			{
				if( in_array($objDC->activeRecord->id, $objBetween->fetchEach('id') ) && (boolean)$objModel->autogrid === false )
				{
					// show backend info
					\Contao\Message::addInfo($GLOBALS['TL_LANG']['AUTOGRID_MESSAGES']['flexInfo']);

					// @var object
					$objModel->__set('autogrid',1);
					if( empty($objModel->autogrid_css) )
					{
						$objModel->__set('autogrid_css','col_12');
					}
					$objModel->save();
				}
			}
		}
	}
}