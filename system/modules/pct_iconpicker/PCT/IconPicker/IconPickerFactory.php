<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\IconPicker;

/**
 * Class file
 * IconPickerFactory
 * Provide various function to handle stylesheets 
 */
class IconPickerFactory
{
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
	/**
	 * Instantiate this class and return it (Factory)
	 * @return PCT_IconPickerFactory
	 * @throws Exception
	 */
	public static function getInstance()
	{
		if (!is_object(self::$objInstance))
		{
			self::$objInstance = new self();
		}

		return self::$objInstance;
	}
	
	/**
	 * Cache name
	 * @var string
	 */
	protected $strCache = 'iconpicker';
	
	/**
	 * CSS class selector
	 * @var string
	 */
	public $strSelector = '.icon-';
	
	
	/**
	 * Find all styles in a list of stylesheet files
	 * @param array
	 * @return array/boolean
	 */
	public function findStylesInFiles($arrFiles)
	{
		if(empty($arrFiles))
		{
			return false;
		}
		
		$arrReturn = array();
		foreach($arrFiles as $file)
		{
			$arrReturn[$file] = $this->findStylesInFile($file);
		}
		
		return $arrReturn;
	}
	
	/**
	 * Find all styles in a stylesheet and return as array
	 * @param string
	 * @return array
	 */
	public function findStylesInFile($strFile)
	{
		$arrStyles = $this->getStylesFromStylesheet($strFile);
		if(empty($arrStyles))
		{
			return array();
		}
		
		$arrProcessed = array();
		$arrReturn = array();
		foreach($arrStyles as $i => $style)
		{
		   $arr = array_filter(explode(':', $style),'strlen');
		   if(count($arr) < 1)
		   {
			   continue;
		   }

		   $cls = ltrim($arr[0],'.');
		   if( \in_array($cls, $arrProcessed) )
		   {
			   continue;
		   }

		   $arrClass = explode(' ',$cls);
		   if(strlen(strpos($strFile, 'awesome')) > 0 && !in_array('fa', $arrClass))
		   {
			   $arrClass[] = 'fa';
		   }
		   
		   $arrReturn[] = array
		   (
			   	'class'		=> implode(' ', $arrClass),
			   	'label'		=> $arr[0],
			);

			$arrProcessed[] = $cls;
		}

		
		return $arrReturn;
	}
	
	/**
	 * Search styles in the content of a stylesheet file and return matches as array
	 * @param string
	 * @return array
	 */
	protected function getStylesFromStylesheet($strFile)
	{
		$blnExternal = false;
		$strContent = '';

		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');

		if(!file_exists($rootDir .'/'.$strFile) || !is_readable($rootDir.'/'.$strFile) )
		{
			$strContent = $this->loadExternalFile($strFile);
			
			if(strlen($strContent) > 0)
			{
				$blnExternal = true;
			}
			else
			{
				return array();
			}
		}
		
		$arrSelectors = $GLOBALS['PCT_ICONPICKER']['iconClasses'] ?: array($this->strSelector);
		if(!in_array($this->strSelector, $arrSelectors))
		{
			$arrSelectors[] = $this->strSelector;
		}
		
		// custom icon selectors
		if(\Contao\Config::getInstance()->get('customIconClasses'))
		{
			$arrSelectors = array_merge($arrSelectors, explode(',',\Contao\StringUtil::deserialize(\Contao\Config::getInstance()->get('customIconClasses'))) );
		}
		
		if(count($arrSelectors) < 1)
		{
			return array();
		}
		
		if(!$blnExternal && strlen($strContent) < 1)
		{
			$objFile = new \Contao\File($strFile,false);
			$strContent = $objFile->getContent();
		}
				
		# remove everything between /* and */
		$strContent = preg_replace("!/\*.*?\*/!ms", "", $strContent);
		
		# remove whitespaces after semicolons
		$strContent = preg_replace("/;\s+/m", "; ", $strContent);
		
		# remove whitespaces after {
		$strContent = preg_replace("/{\s+/m", "{ ", $strContent);
		
		# remove whitespace before {
		$strContent = preg_replace("/\s+{/m", " {", $strContent);
		
		# replace several newlines with one
		$strContent = preg_replace("/\n{2,}/m", "\n", $strContent);
		
		# Leading whitespace
		$strContent = preg_replace("/^\s*/m", "", $strContent);
		
		# Multiple whitespaces
		$strContent = preg_replace("/ +/m", "", $strContent);
		$strContent = str_replace(' ', '', $strContent);
		
		// remove all defining styles like: [class^="icon-"]
		foreach($arrSelectors as $strSelector)
		{
			$strSelector = str_replace('.', '', $strSelector);
			$strContent = str_replace(array('[class^="'.$strSelector.'"]','[class*="'.$strSelector.'"]'), '', $strContent);
		}
		
		// find styles
		$arrReturn = array();
		foreach($arrSelectors as $strSelector)
		{
			$preg = preg_match_all('/'.$strSelector.'(.+?):before(.+?)[{(.+?)}]/', $strContent, $match);
			if(!$preg)
			{
				continue;
			}
			
			// remove multple classes
			foreach($match[0] as $i => $v)
			{
				$arr = array_filter(explode('.', $v),'strlen');
				if(count($arr) > 1)
				{
					foreach($arr as $vv)
					{
						if(strlen(strpos($vv,':before')) > 0)
						{
							$match[0][$i] = '.'.$vv;	
						}
					}
				}
			}
			
			$arrReturn = array_merge($arrReturn,$match[0]);
		}

		return $arrReturn;
	}
	
	
	/**
	 * Load the external file
	 * @param string
	 * @return string
	 */
	protected function loadExternalFile($strUrl)
	{
		// strip slashes at the beginning
		$strUrl = ltrim($strUrl,'/');
		
		$ch = curl_init();
		
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $strUrl);
	
	    $strReturn = curl_exec($ch);
	    curl_close($ch);
	
	    return $strReturn;
	}
	

}