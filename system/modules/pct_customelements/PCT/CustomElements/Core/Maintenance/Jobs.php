<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core\Maintenance;

use Contao\Backend;
use Contao\Database;
use Contao\MaintenanceModuleInterface;
use Contao\StringUtil;

/**
 * Class file
 * Jobs
 */
class Jobs extends Backend implements MaintenanceModuleInterface
{
	public function isActive() 
	{
		// chekc if a module with its own page is active
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'] as $arrJob)
		{
			if(\Contao\Input::get('key') == $arrJob['key'])
			{
				return true;
			}	
		}
	}
	
	
	/**
	 * Generate the job list
	 * @return string
	 */
	public function run()
	{
		// remove vault migration if tl_pct_customelements_vault does not exist
		$objDatabase = Database::getInstance();
		if( $objDatabase->tableExists('tl_pct_customelement_vault') === false )
		{
			unset( $GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE']['resolveVault'] );
		}

		if( empty($GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE']) )
		{
			return '';
		}

		#$this->Session = \Contao\System::getContainer()->get('request_stack')->getSession();
		$this->Session = \Contao\System::getContainer()->get('request_stack')->getSession();

		// load assets
		$objBackendHelper = new \PCT\CustomElements\Backend\BackendIntegration();
		$objBackendHelper->loadAssets();
		
		$arrJobs = array();
		$objTemplate = new \Contao\BackendTemplate('be_maintenance_jobs');
		
		$isActive = false;
		$objTemplate->isActive = false;
		
		// Confirmation message
		if ($this->Session->get('PCT_CUSTOMELEMENTS_MESSAGE') != '')
		{
			$objTemplate->message = sprintf('<p class="tl_confirm">%s</p>' . "\n", $this->Session->get('PCT_CUSTOMELEMENTS_MESSAGE'));
			$this->Session->set('PCT_CUSTOMELEMENTS_MESSAGE','');
		}
		
		// Run the jobs
		if (\Contao\Input::post('FORM_SUBMIT') == 'tl_pct_customelements_jobs')
		{
			$arrJob = \Contao\Input::post('pct_customelement');
			if (!empty($arrJob) && is_array($arrJob))
			{
				foreach ($arrJob as $job)
				{
					$title = $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements'][$job][0];
						
					// check if job calls its own blank page
					if(strlen($GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'][$job]['key'])>0)
					{
						$url = $this->addToUrl('key='.$GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'][$job]['key']);
						$this->redirect($url);
					}
					else
					{
						list($class, $method) = $GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'][$job]['callback'];
						$this->import($class);
						$this->$class->$method();
					}
				}
			}

			$this->Session->set('PCT_CUSTOMELEMENTS_MESSAGE',sprintf($GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['job_done'],$title));
			$this->reload();
		}
		else if(\Contao\Input::get('key') !== '')
		{
			$key = \Contao\Input::get('key');
			if( isset($GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'][$key]) && is_array($GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'][$key]))
			{
				list($class, $method) = $GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'][$key]['callback'];
				$this->import($class);
				return $this->$class->$method();
			}
		}
		
		
		
		foreach($GLOBALS['PCT_CUSTOMELEMENTS']['MAINTENANCE'] as $key => $jobs)
		{
			$arrJobs[$key] = array
			(
				'id' => 'pct_customelements_jobs_' . $key,
				'name' => $key,
				'title' => $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements'][$key][0],
				'description' => $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements'][$key][1],
				'affected' => ''
			);
			
		}
		
		$objTemplate->jobs = $arrJobs;
		$objTemplate->action = StringUtil::ampersand(\Contao\Environment::get('request'));
		$objTemplate->headline = $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['jobs'];
		$objTemplate->job = $GLOBALS['TL_LANG']['tl_maintenance']['job'];
		$objTemplate->description = $GLOBALS['TL_LANG']['tl_maintenance']['description'];
		$objTemplate->submit = \Contao\StringUtil::specialchars($GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['run_job']);
		$objTemplate->help = ($GLOBALS['TL_CONFIG']['showHelp'] && ($GLOBALS['TL_LANG']['tl_maintenance']['cacheTables'][1] != '')) ? $GLOBALS['TL_LANG']['tl_maintenance']['cacheTables'][1] : '';
		
		return $objTemplate->parse();
	}	
}