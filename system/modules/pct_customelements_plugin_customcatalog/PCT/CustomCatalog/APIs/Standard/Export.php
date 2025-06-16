<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomCatalog\API\Standard;

/**
 * Class file
 * Export
 * Provide various functions to export CC data
 */
class Export extends \PCT\CustomCatalog\API\Base
{
	/**
	 * Public flag: Close api after completing the jobs
	 * Will return before sending any set data to the export department
	 * @param boolean
	 */
	public $doExport = true;
	
	/**
	 * The file object created on file exports
	 * @var object 
	 */
	protected $objFile;
	
	
	/**
	 * Run
	 * {@inheritdoc}
	 * (is mandatory by interface)
	 */
	public function run()
	{
		$objDatabase = \Contao\Database::getInstance();
		
		// track start time
		$this->report('startTime',time());
		
		// @var \CustomCatalog || \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog
		$objCC = $this->getCustomCatalog();
		if($objCC === null)
		{
			return;
		}
		
		$strTable = $objCC->getTable();
		if(strlen($strTable) < 1)
		{
			$this->throwException('Table name should not be empty');
		}
		// check if the table exists
		else if(!$objDatabase->tableExists($strTable))
		{
			$this->throwException('Table does not exist');
		}

		// track table
		$this->report('table',$strTable);
		
		// set table
		$this->setTable($strTable);
		
		//-- valid processing from here
		
		// send start event
		$this->start();
		
		// get the jobs
		$this->arrJobs = $this->getActiveJobs();
		
		// get the affected records (current records in target table)
		$arrRecords = $this->getRecords();

		if(empty($arrRecords))
		{
			$this->addError("No export data found for table $strTable");
		}
		
		// close the process with errors
		if( $this->hasErrors() )
		{
			$this->closeWithError('Closed the API process at '.\Contao\Date::parse('d.m.Y H:i',time()).' with errors:'.$this->getErrorsAsString());
			return;
		}
			
		// run the jobs
		$arrSet = $this->runJobs();
	
		// set the output
		$this->setOutput($arrSet);
		
		// no export data
		if(count($arrSet) < 1)
		{
			$this->addError("No export data for table ".$strTable);
			
			// complete
			$this->done();
			return;	
		}
		
		// bypass the whole output department
		if(!$this->doExport)
		{
			// complete early
			$this->done();
			
			return;
		}
		
		// do the export
		$this->export($arrSet);

		// done
		$this->done();
		
		// throw errors
		if($this->hasCriticalErrors() && (boolean)\Contao\Config::get('customcatalog_api_stopOnCriticalErrors') === true)
		{
			$strErrors = $this->getErrorsAsString('CRITICAL');
			$this->throwException($strErrors);
		}
	}
	
	
	/**
	 * Do the export
	 * @param array|null
	 */
	public function export($arrSet=null)
	{
		if($arrSet === null)
		{
			$arrSet = $this->getOutput();
		}
		
		if(!is_array($arrSet))
		{
			return;
		}
		
		// clean the set array
		$arrSet = array_filter($arrSet);
		
		if(count($arrSet) < 1)
		{
			return;
		}
		
		$strTable = $this->getTable();
		
		//! HOOK export
		if($this->target == 'hook' && strlen($this->hookSRC) > 0)
		{
			$callback = explode('::', $this->hookSRC);
			if(!empty($callback))
			{
				try
				{
					\Contao\System::importStatic($callback[0])->{$callback[1]}($arrSet,$strTable,$this);
				}
				catch(\Exception $e)
				{
					// track as critical
					$this->addCriticalError( $e->getMessage() );
				}
			}
		}
		//! TEMPLATE export
		else if($this->target == 'template')
		{
			$strFilename = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($this->filenameLogic);
			$strFile = 'templates/'.$strFilename.'.html5';
			
			$strContent = $this->prepareFileContent($arrSet);
			
			$objFile = null;
			
			// write the file
			try
			{
				$objFile = $this->writeFile($strFile,$strContent);
			}
			catch(\Exception $e)
			{
				// track as critical
				$this->addCriticalError( $e->getMessage() );
			}
			
			// track if file build was not successfull
			if($objFile === null)
			{
				$this->addError("File ($strFile) could not be created");
			}
			
			// set the file in object scope
			$this->objFile = $objFile;
			
			// send file to browser
			if($objFile !== null && (boolean)$this->sendToBrowser)
			{
				$objFile->sendToBrowser();
			}
		}	
		//! CSV export
		else if($this->target == 'csv')
		{
			$strFilename = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($this->filenameLogic);
			
			$strPath = \Contao\Config::get('uploadPath') ?? 'files';
			if(!empty($this->path))
			{
				$strPath = \Contao\FilesModel::findByPk($this->path)->path;
			}
		
			$objFile = null;
			$strFile = $strPath.'/'.$strFilename.'.csv';
			$strDelimiter = $this->getDelimiter();
			
			// fields
			$arrFields = array_keys( min($arrSet) );
			
			$strContent = '';
			
			foreach($arrFields as $v)
			{
				$strContent .= $v.$strDelimiter;
			}
			$strContent = substr($strContent,0, (strlen($strDelimiter) * -1) ) . "\n";
			
			foreach($arrSet as $row)
			{
				if(count($row) < 1)
				{
					continue;
				}
				
				// capsule values
				foreach(array_values($row) as $v)
				{
					$strContent .= $v.$strDelimiter;
				}
				
				// remove last delimiter and start new line
				$strContent = substr($strContent,0,(strlen($strDelimiter) * -1)) . "\n";
			}
			
			// write the file
			try
			{
				$objFile = $this->writeFile($strFile,$strContent,false);
			}
			catch(\Exception $e)
			{
				// track as critical
				$this->addCriticalError( $e->getMessage() );
			}
			
			// track if file build was not successfull
			if($objFile === null)
			{
				$this->addError("File ($strFile) could not be created");
			}
			
			// set the file in object scope
			$this->objFile = $objFile;
			
			// send file to browser
			if($objFile !== null && (boolean)$this->sendToBrowser)
			{
				$objFile->sendToBrowser();
			}
		}
	}
	
	
	/**
	 * Return the file as object
	 * @return object
	 */
	public function getFile()
	{
		return $this->objFile;
	}
	
		
	/**
	 * Prepare the file content from a structured table record array
	 * @param array|null
	 * @return string
	 */
	public function prepareFileContent($arrData)
	{
		if(count($arrData) < 1)
		{
			return '';
		}
		
$arrParts = array();

//-- head
$strHead = 
"<?php
/**
 * CustomCatalog API export: ".$this->getTable()."
 * @api: ".$this->getName()." : ".$this->getTitle()."
 * @tstamp: ".\Contao\Date::parse('d.m.Y H:i',time())."
 */

";

		$arrParts[0] = $strHead;
		$arrParts[1] = '$'.$this->getTable().' = '.strval(var_export($arrData, true)).';';
		
		return implode('', $arrParts);
	}

	
	
	/**
	 * Write the template file
	 * @param string
	 * @param string
	 * @param boolean		Trim lines
	 * @return object
	 */
	public function writeFile($strFile,$strContent,$blnTrim=true)
	{
		$objFile = new \Contao\File($strFile);
		$strContent = str_replace( array("\t","\r"), "", $strContent);
		$strContent = preg_replace(array('/^[\t ]+/m', '/[\t ]+$/m', '/\n\n+/'), array('', '', "\n"), $strContent);
		
		#$objMinify = new MatthiasMullie\Minify\JS();
		#$objMinify->add($strContent);
		#$strContent = $objMinify->minify();
		
		if(!$objFile->exists())
		{
			\Contao\File::putContent($strFile,$strContent);
		}
		else
		{
			$objFile->write($strContent);
			$objFile->close();
		}
		
		return $objFile;
	}

}