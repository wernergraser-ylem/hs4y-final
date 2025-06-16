<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2018
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

use Contao\Backend;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Database;
use Contao\File;
use Contao\Files;
use Contao\StringUtil;
use Contao\System;
use PCT\CustomElements\Helper\InstallerHelper;

/**
 * Class file
 * DbUpdatePage
 */
class DbUpdatePage extends Backend
{
	/**
	 * Template
	 * @var string
	 */
	protected $strSession = 'cc_database_update';


	
	/**
	 * Initialize the controller
	 */
	public function __construct()
	{
		parent::__construct();
		$this->Session = System::getContainer()->get('request_stack')->getSession();
		$this->Database = Database::getInstance();
		System::loadLanguageFile('default');
		System::loadLanguageFile('tl_pct_customcatalog');
	}


	/**
	 * Run the controller and parse the template
	 */
	public function run()
	{
		// deactivate DCA Cache
		$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] = true;
		
		$strForm = 'DB_UPDATE';
		$objTemplate = new \Contao\BackendTemplate('be_page_db_update');
		$objTemplate->formID = $strForm;
		
		$arrErrors = array();
		
		// @var object Session
		$arrSession = $this->Session->get($this->strSession);
		
		// get tables affected
		$objTemplate->tables = $this->Session->get('pct_customcatalog_databaseUpdateTables');

		
/**
 * //! Run submitted
 */ 		
 		// redirect to clear cache status 		
		if(\Contao\Input::post('FORM_SUBMIT') == $strForm && \Contao\Input::post('run') != '')
		{
			$this->redirect( \Contao\Backend::addToUrl('status=clear_cache&tables='.implode(',', \Contao\Input::post('tables'))) );
		}


/**
 * //! Status: Done
 */
 		if(\Contao\Input::get('status') == 'done')
		{
			$objTemplate->status = 'DONE';
			$objTemplate->statements = $arrSession['statements'] ?? array();
			$arrTables = \Contao\Input::get('tables');
			if(!is_array($arrTables))
			{
				$arrTables = explode(',',$arrTables);
			}
			$objTemplate->tables = $arrTables;
			// clear session
			$this->Session->set($this->strSession,array());

			return $objTemplate->parse();
		}


/**
 * //! Status: Error
 */	
 		if(\Contao\Input::get('status') == 'error' && !empty($arrSession['errors']))
		{
			$arrErrors = $arrSession['errors'];
			if(!is_array($arrErrors))
			{
				$arrErrors = explode(',', $arrErrors);
			}
			$objTemplate->errors = $arrErrors;
			return $objTemplate->parse();
		}

		
			
/**
 * //! Status: Clear cache [clear_cache]
 */	
		if(\Contao\Input::get('status') == 'clear_cache')
		{
			$objTemplate->status = 'CLEAR_CACHE';
			
			$arrTables = \Contao\Input::get('tables');
			if(!is_array($arrTables))
			{
				$arrTables = explode(',',$arrTables);
			}

			try
			{
				foreach($arrTables as $strTable)
				{
					$strFile = System::getContainer()->getParameter('kernel.cache_dir') . '/contao/sql/' . $strTable . '.php';
					if( \file_exists($strFile) )
					{
						\unlink( $strFile );
					}
				}
			}
			catch(\Exception $e)
			{
				$arrErrors[] = $e->getMessage();
			}
			
			if(!empty($arrErrors))
			{
				// log
				\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('CC Database Update returns errors: '.implode(', ', $arrErrors));
				// track error				
				$arrSession['errors'] = $arrErrors;
				$this->Session->set($this->strSession,$arrSession);
				// redirect to error page
				$this->redirect( \Contao\Backend::addToUrl('status=error',true,array('tables')) );
			}

			// all good, redirect to database update
			$this->redirect( \Contao\Backend::addToUrl('status=db_update') );
		}


/**
 * //! Status: Database update [db_update]
 */		
		if(\Contao\Input::get('status') == 'db_update')
		{
			$objTemplate->status = 'DB_UPDATE';
			$arrTables = \Contao\Input::get('tables');
			if(!is_array($arrTables))
			{
				$arrTables = explode(',',$arrTables);
			}
			$objTemplate->tables = $arrTables;
			
			$arrStatements = array();
			
			try
			{
				$objInstallHelper = new InstallerHelper;
				$arrSQL = $objInstallHelper->sqlCompileCommandsCallback(array());

				if(!empty($arrSQL) && is_array($arrSQL) && !empty($arrTables))
				{
					foreach($arrTables as $table)
					{
						foreach($arrSQL as $operation => $sql)
						{
							foreach($sql as $statement)
							{
								// the table exists in the statement
								if( strlen(strpos($statement,$table)) > 0 )
								{
									// track the statements executed
									$arrStatements[] = $statement;
									// execute
									$this->Database->query( $statement );
								}
							}
						}
					}
				}		
			}
			catch(\Exception $e)
			{
				$arrErrors[] = $e->getMessage();
			}
			
			if(!empty($arrErrors))
			{
				// log
				System::getContainer()->get('monolog.logger.contao.error')->info('CC Database Update returns errors: '.implode(', ', $arrErrors));
				// track error				
				$arrSession['errors'] = $arrErrors;
				$this->Session->set($this->strSession,$arrSession);
				
				// redirect to error page
				$this->redirect( \Contao\Backend::addToUrl('status=error',true,array('tables')) );
			}
			
			// track statements
			$arrSession['statements'] = $arrStatements;
			$this->Session->set($this->strSession,$arrSession);
				
			// redirect to result page
			$this->redirect( Backend::addToUrl('status=done') );
		}
		
		return $objTemplate->parse();	
	}
}