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
 * ContentAutoGridRow
 */
class ContentAutoGridRow extends \Contao\ContentElement
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_autogrid_row';
	
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
				$this->Template = new \Contao\BackendTemplate('be_autogrid_row');
			}
			
			$this->Template->setData( $this->getModel()->row() );
			
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
	}
}