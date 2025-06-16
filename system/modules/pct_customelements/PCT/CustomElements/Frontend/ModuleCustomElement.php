<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Frontend;

/**
 * Import
 */

use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Backend\BackendIntegration as BackendHelper;
use PCT\CustomElements\Core\Controller;
use PCT\CustomElements\Core\FrontendTemplate as FrontendTemplate;

/**
 * Class file
 * ModuletCustomElement
 * Render a custom element from a module
 */
class ModuleCustomElement extends \Contao\Module
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'customelement_simple';
	
	/**
	 * CustomElement object
	 * @var object
	 */
	protected $objCE = null;
	
	/**
	 * Display wildcard
	 */
	public function generate()
	{
		if ( Controller::isBackend() )
		{
			$this->objCE = CustomElementFactory::findByAlias($this->type);
			
			$objModel = $this->objModel;
			$intId = $this->id;
			$strTable = 'tl_module';
			if($objModel->origId > 0 && $objModel->origId != $intId)
			{
				$intId = $objModel->origId;
				$strTable = 'tl_content';
			}
			
			$strWildcard = '';
			if(!empty($this->objCE))
			{
				$objBackendHelper = new BackendHelper();
				$strWildcard = $objBackendHelper->generateBackendWildcard($this->objCE->get('id'),$intId,$strTable);
			}
			
			$this->Template = new \Contao\BackendTemplate('be_ce_wildcard');
			$this->Template->wildcard = $strWildcard;
			
			return $this->Template->parse();
		}
		
		$this->objCE = CustomElementFactory::findByAlias($this->type);
		if(empty($this->objCE))
		{
			return parent::generate();
		}
		
		// set template
		if(strlen($this->objCE->get('template')) > 0 && $this->objCE->get('template') != $this->strTemplate)
		{
			$this->strTemplate = $this->objCE->get('template');
		}
		
		// customTpl
		if(strlen($this->customTpl) > 0 && $this->customTpl != $this->strTemplate)
		{
			$this->strTemplate = $this->customTpl;
		}
		
		// cssID
		$arrCssID = \Contao\StringUtil::deserialize($this->cssID);
		
		if(!is_array($arrCssID))
		{
			$arrCssID = explode(',',$this->cssID);
		}
		
		$arrCssID = array_filter($arrCssID,'strlen');
		
		if(count($arrCssID) < 1)
		{
			$this->cssID = $this->objModel->cssID = \Contao\StringUtil::deserialize($this->objCE->get('cssID'));
		}
		else
		{
			$arr = \Contao\StringUtil::deserialize($this->objCE->get('cssID'));
			if( isset($arrCssID[0]) && strlen($arrCssID[0]) > 0)
			{
				$arr[0] = $arrCssID[0];
			}
			if( isset($arrCssID[1]) && strlen($arrCssID[1]) > 0)
			{
				$arr[1] = $arrCssID[1];
			}
			$this->cssID = $this->objModel->cssID = $arr;
		}
		
		return parent::generate();
	}

	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		$objOrigTemplate = $this->Template;
		
		$this->Template = new FrontendTemplate($this->strTemplate);
		$this->Template->setData($objOrigTemplate->getData());
		
		$objModel = $this->objModel;
		$intId = $this->id;
		if($objModel->origId > 0 && $objModel->origId != $intId)
		{
			$intId = $objModel->origId;
		}
		
		$objOrigin = new \PCT\CustomElements\Core\Origin();
		$objOrigin->set('intPid',$intId);
		$objOrigin->set('strTable',$objModel::getTable());
		$objOrigin->set('objActiveRecord',$objModel);
		
		$this->objCE->setOrigin( $objOrigin );
	
		$this->Template = $this->objCE->addToTemplate($this->Template);
	}
}