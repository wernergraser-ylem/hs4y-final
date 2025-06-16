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
 * Namespaces
 */
namespace PCT\AutoGrid;


/**
 * Imports
 */
use PCT\AutoGrid\Core as AutoGrid;
use PCT\AutoGrid\Models\ContentModel as ContentModel;


/**
 * Class file
 * ContentAutoGridCol
 */
class ContentAutoGridCol extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_autogrid_col';
	
	
	/**
	 * Display wildcard or backend preview
	 */
	public function generate()
	{
		if( Controller::isBackend() )
		{
			$this->Template = new \Contao\BackendTemplate('be_autogrid_wildcard');
			
			if( $this->isGridPreview )
			{
				$this->Template = new \Contao\BackendTemplate('be_autogrid_col');
			}
			
			$objModel = $this->getModel();
			$objModel->refresh();

			$this->Template->setData( $objModel->row() );
			
			// add AG to the template
			AutoGrid::addToTemplate($this->Template);
			
			return $this->Template->parse();
		}
		
		if(strlen($this->customTpl) > 0 && $this->customTpl != $this->strTemplate)
		{
			$this->strTemplate = $this->customTpl;
		}

		return \trim( parent::generate() );
	}
	
	/**
	 * Generate the module
	 */
	protected function compile()
	{
		AutoGrid::addToTemplate($this->Template);
		
		// same-height
		$objGrid = $this->Template->AutoGrid->GridStart;
		
		// inside row
		$objRowStart = $this->Template->AutoGrid->RowStart;
		
		// sticky
		$this->Template->AutoGrid->sticky = $this->autogrid_sticky;
		if( isset($this->autogrid_sticky) && (boolean)$this->autogrid_sticky === true )
		{
			$classes = \explode(' ',$this->Template->AutoGrid->classes ?? array() );
			$classes[] = 'sticky';
			$this->Template->AutoGrid->classes = \implode(' ',$classes);

			// active attributes div
			$this->Template->AutoGrid->hasAttributes = true;
		}
		
		$sameHeight = false;
		// deactivate same-height
		if( $objGrid !== null && isset($objGrid->autogrid_sameheight) )
		{
			$sameHeight = (boolean)$objGrid->autogrid_sameheight;
		}

		if( $objRowStart !== null && isset($objRowStart->autogrid_sameheight) )
		{
			$sameHeight = (boolean)$objRowStart->autogrid_sameheight;
		}
				
		// has attributes
		if( ($this->Template->AutoGrid->hasStyles || $sameHeight === true || $this->autogrid_padding_css) && $this->type == 'autogridColStart')
		{
			$this->Template->AutoGrid->hasAttributes = true;
			$GLOBALS['PCT_AUTOGRID']['HAS_ATTRIBUTES_'.$this->autogrid_id] = true;
		}
		// background has been started and should now be closed
		if($this->type == 'autogridColStop' && isset($GLOBALS['PCT_AUTOGRID']['HAS_ATTRIBUTES_'.$this->autogrid_id]) && $GLOBALS['PCT_AUTOGRID']['HAS_ATTRIBUTES_'.$this->autogrid_id] === true)
		{
			$this->Template->AutoGrid->hasAttributes = true;
			unset($GLOBALS['PCT_AUTOGRID']['HAS_ATTRIBUTES_'.$this->autogrid_id]);
		}

		if($sameHeight === true  && $this->type == 'autogridColStart')
		{
			$this->Template->AutoGrid->hasAttributes = true;
			$this->Template->AutoGrid->shstart = true;
			$GLOBALS['PCT_AUTOGRID']['SAME-HEIGHT_START_'.$this->autogrid_id] = true;
		}

		// same-height has been started and should now be closed
		if($this->type == 'autogridColStop' && isset($GLOBALS['PCT_AUTOGRID']['SAME-HEIGHT_START_'.$this->autogrid_id]) && $GLOBALS['PCT_AUTOGRID']['SAME-HEIGHT_START_'.$this->autogrid_id] === true)
		{
			$this->Template->AutoGrid->hasAttributes = true;
			$this->Template->AutoGrid->shstop = true;
			unset($GLOBALS['PCT_AUTOGRID']['SAME-HEIGHT_START_'.$this->autogrid_id]);
		}
		
		
		
	}
}