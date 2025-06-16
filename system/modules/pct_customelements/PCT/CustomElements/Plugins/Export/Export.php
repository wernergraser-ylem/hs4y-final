<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\Export;

use Contao\CoreBundle\ContaoCoreBundle;

/**
 * Class file
 * Export
 */
class Export extends \Contao\Backend
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_page_export';
	
	/**
	 * Alias fo the custom element
	 * @var string
	 */
	protected $strCustomElementAlias = '';
	
	/**
	 * Id of the customelement
	 * @var integer
	 */
	protected $intCustomElement = 0;
	
	/**
	 * Collect all sql statements
	 * @var array
	 */
	protected $arrStatements = array();
	
	/**
	 * The file 
	 * @var string
	 */
	protected $strFile = '';
	
	/**
	 * Send the file after creation to the browser
	 * @var boolean
	 */
	public $blnSendFileToBrowser = false;
	
	/**
	 * Has error flag
	 * @var boolean
	 */
	protected $hasError = false;
	
	
	/**
	 * Initialize and authenticate backend user
	 */
	public function __construct()
	{
		// load language files
		$this->loadLanguageFile('default');
		$this->loadLanguageFile('import');
		
		// include styles
		$GLOBALS['TL_CSS'][] = PCT_CUSTOMELEMENTS_PATH.'/assets/css/styles.css';
	}
	
	
	/**
	 * Getter
	 */
	public function get($strKey)
	{
		return $this->{$strKey} ?: null;
	}
	

	/**
	 * Create the backend inferface
	 * @return string
	 */
	public function createInterface($objDC)
	{
		$objTemplate = new \Contao\BackendTemplate($this->strTemplate);

		// back button
		$objTemplate->back = '<a class="header_back" onclick="Backend.getScrollOffset()" accesskey="b" title="" href="'.$this->getReferer().'">'.$GLOBALS['TL_LANG']['MSC']['goBack'].'</a>';
		
		if(\Contao\Input::get('download'))
		{
			$this->blnSendFileToBrowser = true;
		}
		
		// run the export
		$this->run();
		
		if($this->hasError)
		{
			$objTemplate->hasError = true;
			$objTemplate->error = $this->error;
		}
		
		$objTemplate->file = $this->strFilename;
		$objTemplate->path = $this->strPath;
		$objTemplate->success = sprintf($GLOBALS['TL_LANG']['page_export']['success'], $this->strFilename, $this->strPath);
		
		$reload = $this->addToUrl('download=1');
		$objTemplate->download = sprintf('<a href="%s">%s</a>',$reload,'Download: '.$this->strFilename);
		
		return $objTemplate->parse();
	}
	
	
	
	/**
	 * Run the export
	 * @param object
	 */
	public function run()
	{
		if(\Contao\Input::get('id') < 1)
		{
			return $this->done();
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$arrStatements = array();
		$blnCustomCatalog = $objDatabase->tableExists('tl_pct_customcatalog') ? true : false;
		
		$intCE = \Contao\Input::get('id');
		$this->intCustomElement = $intCE;
		
		$objCE = $objDatabase->prepare("SELECT * FROM tl_pct_customelement WHERE id=?")->limit(1)->execute($intCE);
		if($objCE->numRows < 1)
		{
			return $this->done();
		}
		
		$this->strCustomElementTitle = $objCE->title;
		$this->strCustomElementAlias = $objCE->alias;
		
		$strFilename = 'import_'.$this->strCustomElementAlias .'.html5';
		$strPath = (strlen($GLOBALS['PCT_CUSTOMELEMENTS']['path_to_export']) > 0 ? '/'.$GLOBALS['PCT_CUSTOMELEMENTS']['path_to_export'] : '/system/cache');
		
		$this->strPath = $strPath;
		$this->strFilename = $strFilename; 
		$this->strFile = $strPath.'/'.$strFilename;
		
		// !collect customelement
		$tmp = array( $this->prepareStatement($objCE->row()) );
		$this->arrStatements[] = array('table'=>'tl_pct_customelement','data'=>$tmp);
		unset($tmp);
		
		// !collect groups
		$objGroups = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_group WHERE pid=? ORDER BY sorting")->execute($intCE);
		
		$tmp = array();
		while($objGroups->next())
		{
			$tmp[] = $this->prepareStatement( $objGroups->row() );
		}
		$this->arrStatements[] = array('table'=>'tl_pct_customelement_group','data'=>$tmp);
		unset($tmp);
		
		$arrGroupIds = $objGroups->fetchEach('id');
		
		// !collect attributes
		if(count($arrGroupIds) > 0)
		{
			$objAttributes = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE pid IN(".implode(',', $arrGroupIds).")")->execute();
			$tmp = array();
			while($objAttributes->next())
			{
				$tmp[] = $this->prepareStatement( $objAttributes->row() );
			}
			$this->arrStatements[] = array('table'=>'tl_pct_customelement_attribute','data'=>$tmp);
			unset($tmp);
		}
		
		
		// !STOP : create template if customcatalog is not running
		if(!$blnCustomCatalog)
		{
			return $this->done();
		}
		
		// !collect groupsets
		if( $objDatabase->tableExists('tl_pct_customelement_groupset') )
		{
			$objGroupsets = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_groupset WHERE pid IN(".implode(',', $arrGroupIds).")")->execute();
			if($objGroupsets->numRows > 0)
			{
				$tmp = array();
				while($objGroupsets->next())
				{
					$tmp[] = $this->prepareStatement( $objGroupsets->row() );
				}
				$this->arrStatements[] = array('table'=>'tl_pct_customelement_groupset','data'=>$tmp);
				unset($tmp);
			}
		}
		
		// !collect customcatalogs
		if( $objDatabase->tableExists('tl_pct_customcatalog') )
		{
			$objCCs = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid=?")->execute($intCE);
			if($objCCs->numRows < 1)
			{
				return $this->done();
			}
			
			$tmp = array();
			while($objCCs->next())
			{
				$tmp[] = $this->prepareStatement( $objCCs->row() );
			}
			$this->arrStatements[] = array('table'=>'tl_pct_customcatalog','data'=>$tmp);
			unset($tmp);
			
			// !collect filters
			$arrCCs = $objCCs->fetchEach('id');
			
			$objFiltersets = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_filterset WHERE pid IN(".implode(',', $arrCCs).")")->execute();
			if($objFiltersets->numRows > 0)
			{
				$tmp = array();
				while($objFiltersets->next())
				{
					$tmp[] = $this->prepareStatement( $objFiltersets->row() );
				}
				$this->arrStatements[] = array('table'=>'tl_pct_customelement_filterset','data'=>$tmp);
				unset($tmp);
			
				$arrFiltersets = $objFiltersets->fetchEach('id');
				$objFilters = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_filter WHERE pid IN(".implode(',', $arrFiltersets).")")->execute();
				if($objFilters->numRows > 0)
				{
					$tmp = array();
					while($objFilters->next())
					{
						$tmp[] = $this->prepareStatement( $objFilters->row() );
					}
					$this->arrStatements[] = array('table'=>'tl_pct_customelement_filter','data'=>$tmp);
					unset($tmp);
				}
			}
		}
		// !customcatalog external tables
		if($GLOBALS['PCT_CUSTOMELEMENTS']['exportCustomCatalogTables'] && $objDatabase->tableExists('tl_pct_customcatalog') )
		{
			$objCCs = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog WHERE pid=? AND mode=? AND tableName!=''")->execute($intCE,'new');
			if($objCCs->numRows < 1)
			{
				return $this->done();
			}
			
			while($objCCs->next())
			{
				$strTable = $objCCs->tableName;
				if(!$objDatabase->tableExists($strTable))
				{
					continue;
				}
				
				$objTable = $objDatabase->prepare("SELECT * FROM ".$strTable)->execute();
				if($objTable->numRows > 0)
				{
					$tmp = array();
					while($objTable->next())
					{
						$tmp[] = $this->prepareStatement( $objTable->row() );
					}
					$this->arrStatements[] = array('table'=>$strTable,'data'=>$tmp);
					unset($tmp);
				}
			
				// !collect language records
				$objLanguages = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE source=?")->execute($strTable);
				if($objLanguages->numRows > 0)
				{
					$tmp = array();
					while($objLanguages->next())
					{
						$tmp[] = $this->prepareStatement( $objLanguages->row() );
					}
					$this->arrStatements[] = array('table'=>'tl_pct_customcatalog_language','data'=>$tmp);
					unset($tmp);
				}	
			}
		}
									
		return $this->done();
	}
	
	
	/**
	 * All done, write file and send it to the browser or display information
	 * @return boolean
	 */
	protected function done()
	{
		// allow modifications from outside
		// HOOK 
		if (isset($GLOBALS['CUSTOMELEMENTS_HOOKS']['getExportChain']) && !empty($GLOBALS['CUSTOMELEMENTS_HOOKS']['getExportChain']))
		{
			foreach($GLOBALS['CUSTOMELEMENTS_HOOKS']['getExportChain'] as $callback)
			{
				$this->arrStatements = static::importStatic($callback[0])->{$callback[1]}($this->arrStatements,$this);
			}
		}
		
		if(empty($this->arrStatements))
		{
			return false;
		}
		
		$strContent = $this->prepareTemplateContent($this->arrStatements);
		$objFile = $this->writeFile($this->strFile,$strContent);
		if(!$objFile)
		{
			$this->hasError = true;
			$this->error = 'File ('.$this->strFile.') could not be created.';
			return false;
		}
		
		if($objFile && $this->blnSendFileToBrowser)
		{
			$objFile->sendToBrowser();
		}
		
		return true;
	}
	
	
	
	
	
	/**
	 * Write the template file
	 * @param string
	 * @param string
	 * @return boolean
	 */
	protected function writeFile($strFile,$strContent)
	{
		$objFile = new \Contao\File($strFile);
		$strContent = str_replace("\t", "", $strContent);
		
		if(!$objFile->exists())
		{
			\Contao\File::putContent($strFile,$strContent);
		}
		else
		{
			$objFile->write($strContent);
		}
		return $objFile;
	}
	
	
	/**
	 * Build sql array
	 * @param string
	 * @param array
	 */
	protected function prepareStatement($arrData)
	{
		$arr = array
		(
			'action'	=> 'INSERT INTO',
			'fields'	=> array_keys($arrData),
			'values'	=> array_values($arrData),
		);
		return $arr;
	}
	
	
	/**
	 * Build the query string
	 * @param array
	 * @return string
	 */
	protected function buildInsert($strTable,$arrFields,$arrValues,$blnRowPerRow=true)
	{
		if(strlen($strTable) < 1 || empty($arrFields) || empty($arrValues))
		{
			return '';
		}
		
		$strReturn ='INSERT INTO `'.$strTable.'`';
		
		$fields = array();
		foreach($arrFields as $f)
		{
			$fields[] = '`'.$f.'`';
		}
		$strReturn .= '('.implode(',', $fields).')';
		
		$strReturn .= ' VALUES ';
		$values = array();
		foreach($arrValues as $v)
		{
			$values[] = '`'.$v.'`';
		}
		$strReturn .= '('.implode(',', $values).')';
		
		$strReturn .= '; ';
		
		return $strReturn;
	}
	
	
	/**
	 * Write the template file from statement array
	 * @param array
	 * @return string	filename
	 */
	protected function prepareTemplateContent($arrStatements)
	{
		$strReturn = '';

$arrParts = array();

//-- head
$strHead = 
"<?php
/**
 * Hello, I'm an an customelement template file from your CustomElement: ".$this->strCustomElementTitle."
 */
 ";

//-- sql
		$strSQL = '
/** sql statements **/
$arrImport["sql"] = 
';
		
$strInsert = '';
		foreach($arrStatements as $arr)
		{
			$strTable = $arr['table'];
			foreach($arr['data'] as $data)
			{
$strInsert .= $this->buildInsert($strTable,$data['fields'],$data['values']);
$strInsert .= '
';
			}
		}
		$strSQL .= "'".$strInsert."';";
		
//-- info block
$strInfo = '

/** information **/
';
$strInfo .= '$arrImport["info"]["CONTAO_VERSION"] = "'.ContaoCoreBundle::getVersion().'";
';		
$strInfo .= '$arrImport["info"]["CE_VERSION"] = "'.PCT_CUSTOMELEMENTS_VERSION.'";
';		
//--

// build string
$arrParts[0] = $strHead;
$arrParts[1] = $strInfo;
$arrParts[2] = $strSQL;

$strReturn = implode('', $arrParts);

		return $strReturn;
	}
	
	
}