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


/**
 * Class file
 * ContentAutoGridGrid
 */
class ContentAutoGridGrid extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_autogrid_grid';
		
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
				$this->Template = new \Contao\BackendTemplate('be_autogrid_grid');
			}

			$objModel = $this->getModel();
			$objModel->refresh();
			
			$this->Template->setData( $objModel->row() );
			
			// add AG to the template
			AutoGrid::addToTemplate($this->Template);
			
			return $this->Template->parse();
		}
		
		if( !empty($this->customTpl) )
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
		$arrPreset = \PCT\AutoGrid\GridPreset::getGridPreset($this->autogrid_grid);
		
		if( $this->type == 'autogridGridStart' && !empty($arrPreset) )
		{
			// desktop CSS differs from preset
			if( trim($this->autogrid_css) != trim($arrPreset['grid']['desktop']) )
			{
				$this->Template->hasCustomGrid = true;
				$this->Template->hasCustomDesktopGrid = true;
			}
			// tablet CSS differs from preset
			if( trim($this->autogrid_tablet) != trim($arrPreset['grid']['tablet']) )
			{
				$this->Template->hasCustomGrid = true;
				$this->Template->hasCustomTabletGrid = true;
			}
			// mobile CSS differs from preset
			if( trim($this->autogrid_mobile) != trim($arrPreset['grid']['mobile']) )
			{
				$this->Template->hasCustomGrid = true;
				$this->Template->hasCustomMobileGrid = true;
			}
		}
		
		AutoGrid::addToTemplate($this->Template);
	}
}