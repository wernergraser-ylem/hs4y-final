<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2019
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_autogrid
 * @link  http://contao.org
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
 * WidgetAutoGridRow
 */
class WidgetAutoGridRow extends \Contao\Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = false;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_autogrid_row';


	/**
	 * Do not validate
	 */
	public function validate()
	{
		return;
	}


	/**
	 * Parse the widget
	 * @param array;
	 */
	public function parse($arrAttributes=null)
	{
		if($arrAttributes !== null)
		{
			$this->addAttributes($arrAttributes);
		}
		
		return \trim( $this->generate() );
	}


	/**
	 * Generate the widget and return it as string
	 *
	 * @return string The widget markup
	 */
	public function generate()
	{
		// @var object
		$objModel = \Contao\FormFieldModel::findByPk($this->id);

		if( Controller::isBackend() )
		{
			// @var object
			$this->Template = new \Contao\BackendTemplate('be_autogrid_wildcard');
			$this->Template->setData( $objModel->row() );
			return $this->Template->parse();
		}

		// custom template
		if(strlen($this->customTpl) > 0)
		{
			$this->strTemplate = $this->customTpl;
		}
		
		// @var object
		if($this->Template === null)
		{
			$this->Template = new \Contao\FrontendTemplate( $this->strTemplate );
		}
		
		$this->Template->setData( $objModel->row() );
		
		// add autogrid to template
		AutoGrid::addToTemplate($this->Template);

		if( empty($this->Template->class) === true )
		{
			$this->Template->class = '';
		}

		return $this->Template->parse();
	}
}