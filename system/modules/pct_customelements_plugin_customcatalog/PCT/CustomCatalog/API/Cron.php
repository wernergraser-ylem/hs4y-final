<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2016
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage pct_customelements_plugin_customcatalog
 */


/**
 * Namespace
 */
namespace PCT\CustomCatalog\API;

/**
 * Class file
 * Cron
 */
class Cron
{
	/**
	 * Initialize contao lazy man cronjobs
	 *
	 * called by: initializeSystem Hook
	 */
	public function initialize()
	{
		$objDatabase = \Contao\Database::getInstance();
		// return of api table does not exist yet
		if(!$objDatabase->tableExists('tl_pct_customcatalog_api'))
		{
			return;
		}
		
		$objApis = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customcatalog_api WHERE published=1 AND cronjob=1 AND cron!=''")->execute();
		if($objApis->numRows < 1)
		{
			return;
		}
		
		while($objApis->next())
		{
			$GLOBALS['TL_CRON'][$objApis->cron][] = array(\get_class($this),'run_'.$objApis->cron);
		}
	}

	/**
	 * Run minutely cronjobs
	 */
	public function run_minutely()
	{
		$this->run('minutely');
	}

	/**
	 * Run hourly cronjobs
	 */
	public function run_hourly()
	{
		$this->run('hourly');
	}

	/**
	 * Run daily cronjobs
	 */
	public function run_daily()
	{
		$this->run('daily');
	}

	/**
	 * Run weekly cronjobs
	 */
	public function run_weekly()
	{
		$this->run('weekly');
	}

	/**
	 * Run the api by its cron settig
	 * @param string 'weekly','daily','hourly','minutely' 
	 */
	protected function run($strCron)
	{
		$objDatabase = \Contao\Database::getInstance();
		// find all active apis that have a cronjob enabled for one of the intervals executed
		$objApis = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_api WHERE published=1 AND cronjob=1 AND cron=?")->execute($strCron);
		if($objApis->numRows < 1)
		{
			return;
		}

		// run apis
		while($objApis->next())
		{
			$objApi = \PCT\CustomCatalog\API\Factory::findById($objApis->id);
			if($objApi === null)
			{
				continue;
			}
			
			if((boolean)\Contao\Config::get('customcatalog_api_stopOnCriticalErrors') === true)
			{
				\Contao\Config::set('customcatalog_api_stopOnCriticalErrors',false);
			}
			
			// write log
			\Contao\System::getContainer()->get('monolog.logger.contao.cron')->info('Run API '.$objApi->id);

			$objApi->run();
		}
	}
}