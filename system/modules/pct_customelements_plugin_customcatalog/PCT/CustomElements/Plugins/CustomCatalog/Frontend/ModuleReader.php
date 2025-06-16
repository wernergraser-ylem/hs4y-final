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
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Frontend;

/**
 * Imports
 */

use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage;

/**
 * Class file
 * ModuleReader
 */
class ModuleReader extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_customcatalog';
	
	/**
	 * Flag if the reader should render content elements
	 */
	protected $blnRenderContentElements = false;
	
	
	/**
	 * Display wildcard
	 */
	public function generate()
	{
		if ( Controller::isBackend() )
		{
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');
			$objTemplate->wildcard = $strWildcard = '### ' . strtoupper($GLOBALS['TL_LANG']['FMD']['customcatalogreader'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			
			return $objTemplate->parse();
		}

		// set template
		if($this->customcatalog_mod_template != $this->strTemplate)
		{
			$this->strTemplate = $this->customcatalog_mod_template;
		}
		
		// set GET parameter
		if (!isset($_GET[ $GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'] ]) && isset($_GET['auto_item']))
		{
			\Contao\Input::setGet($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'], \Contao\Input::get('auto_item'));
		}
		
		// allow tl_content 
		if(\Contao\Input::get('table') == 'tl_content')
		{
			\Contao\Input::setGet('table', \Contao\Input::get('table'));
			\Contao\Input::setGet('pid', \Contao\Input::get('pid'));
			
			\Contao\Input::setGet($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter'], \Contao\Input::get('pid'));
			
			$this->blnRenderContentElements = true;
		}
		// return and do not index the page when there is no entry
		else if (!\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']) || !$this->customcatalog || strlen($this->customcatalog) < 1)
		{
			global $objPage;
			$objPage->noSearch = 1;
			$objPage->cache = 0;
			return '';
		}
		
		return parent::generate();
	}


	/**
	 * Generate the module
	 * @return string
	 */
	protected function compile()
	{
		$objCC = CustomCatalogFactory::findByModule($this->objModel);
		if(!$objCC)
		{
			return '';
		}
		
		global $objPage;
			
		// fill the cache
		\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::fillCache($objCC->id);
		
		$strLanguage = '';
		if( $objCC->get('multilanguage') && ($this->customcatalog_filter_actLang || $objCC->get('aliasField') > 0) )
		{
			$strLanguage = Multilanguage::getActiveFrontendLanguage();
		}
		
		// render the regular details page of a customcatalog entry
		$objEntry = $objCC->findPublishedItemByIdOrAlias(\Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']),$strLanguage);
	
		// show 404 if entry does not exist
		if( !isset($objEntry) || $objEntry === null || $objEntry->id < 1)
		{
			$objPage->noSearch = 1;
			$objPage->cache = 0;
			
			// throw a page not found exception
			if( \class_exists('Contao\CoreBundle\Exception\PageNotFoundException') )
			{
				throw new \Contao\CoreBundle\Exception\PageNotFoundException('Page not found: ' . \Contao\Environment::get('uri'));
			}
			else
			{
				/** @var \PageError404 $objHandler */
				$objHandler = new $GLOBALS['TL_PTY']['error_404']();
				$objHandler->generate($objPage->id);
			}
			return '';
		}
		
		// generate canonical tag when url parameter is the same as the entry id
		if($objCC->get('aliasField') > 0 && \Contao\Input::get($GLOBALS['PCT_CUSTOMCATALOG']['urlItemsParameter']) == $objEntry->id)
		{
			$GLOBALS['TL_HEAD']['cc_reader_canonical'] = '<link rel=“canonical“ href="'.\Contao\Environment::get('base').$objCC->generateDetailsUrl($objEntry,$objPage).'"/>';  
		}
		
		// prepare the filter. Just filter by the id of the entry
		$objFilter = new \PCT\CustomElements\Filters\SimpleFilter(array($objEntry->id));
					
		// set the filter
		$objCC->setFilter($objFilter);
		
		// total number of items
		$intTotal = $objCC->getTotal();
		
		// render / generate custom catalog		
		$this->Template->CustomCatalog = $objCC;
		
		// append content elements
		if($this->blnRenderContentElements)
		{
			$objEntry = $objCC->findPublishedItemByIdOrAlias(\Contao\Input::get('pid'),$strLanguage);
		
			$objEntries = $objCC->fetchPublishedContentElementsById($objEntry->id);

			// total number of items
			$intTotal = $objEntries->numRows;
			
			// render the content elements
			$strContent = $objCC->renderContentElements($objEntries);
			
			$this->Template->tl_content .= $strContent;
			$this->Template->customcatalog .= $strContent;
		}
		
		// comments
		$bundles = array_keys(\Contao\System::getContainer()->getParameter('kernel.bundles'));
		if($objCC->get('allowComments') > 0 && in_array('comments', $bundles) || in_array('comments-bundle', $bundles))
		{
			// Adjust the comments headline level
			$intHl = min(intval(str_replace('h', '', $this->hl)), 5);
			$this->Template->hlc = 'h' . ($intHl + 1);

			$this->Template->allowComments = true;
			$objComments = new \Contao\Comments();
			
			// Notify the system administrator
			$arrNotifies = array($GLOBALS['TL_ADMIN_EMAIL']);
			
			// Notify a different person
			if(strlen($objCC->get('com_notify')) > 0 && $objCC->get('com_notify') != 'notify_admin')
			{
				$arrNotifies = array($objCC->get('com_notify'));
			}
			
			$objConfig = new \stdClass();
			$objConfig->perPage = $objCC->get('com_perPage');
			$objConfig->order = $objCC->get('com_sortOrder');
			$objConfig->template = $this->com_template;
			$objConfig->requireLogin = $objCC->get('com_requireLogin');
			$objConfig->disableCaptcha = $objCC->get('com_disableCaptcha');
			$objConfig->bbcode = $objCC->get('com_bbcode');
			$objConfig->moderate = $objCC->get('com_moderate');
			
			$intParent = $objEntry->id;
			if($intParent < 1)
			{
				$intParent = $objCC->get('id');
			}
			
			// backdoor and fallback
			if(isset($GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS'][$objCC->getTable()]['uniqueComments']) && $GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS'][$objCC->getTable()]['uniqueComments'] === false)
			{
				$intParent = $objCC->get('id');
			}
			
			$objComments->addCommentsToTemplate($this->Template, $objConfig, $objCC->getTable(), $intParent, $arrNotifies);
		}
		
		// readerpagination
		$this->Template->pagination = '';
		
		$arrCssID = \Contao\StringUtil::deserialize($this->cssID);
		$arrClasses = explode(' ', $arrCssID[1]);
		$arrClasses[] = $objCC->getTable();
		$arrCssID[1] = implode(' ', array_filter(array_unique($arrClasses),'strlen') );
		
		$this->cssID = $arrCssID;
		
		// back link
		$this->Template->referer = '{{env::referer}}';
		$this->Template->back = $GLOBALS['TL_LANG']['MSC']['goBack'];
		
		// class variables for inheritage
		$this->CustomCatalog = $objCC;
	}



}