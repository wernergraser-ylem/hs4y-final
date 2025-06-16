<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		hashinserttags
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Class file
 * HashInsertTags
 * Replace InsertTags like ###myInsertTag###
 */
class HashInsertTags extends \Contao\Controller
{
	/**
	 * Search string
	 * @var string
	 */
	protected $strText = '';
	
	/**
	 * Optional parameters
	 * @var string
	 */
	protected $arrParameters = array();
	
	/**
	 * Array of chunks found in search string
	 * @param array
	 */
	protected $arrChunks = array();
	
	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;
	
	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance($strText='')
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static($strText);
		}
		return static::$objInstance;
	}
	
	
	/**
	 * Initialize
	 */
	public function __construct($strText='', $arrParameters=array()) 
	{
		$this->strText = $strText;
		$this->arrParameters = $arrParameters;
	}
	
	/**
	 * Replace hashtag inserttags ###inserttag###
	 * @param string
	 * @return string
	 */
	public function replaceHashInsertTags($strText)
	{
		$this->strText = $strText;
		
		$preg = preg_match_all('/##[^#]+##/i', $this->strText, $this->arrChunks);
		
		if($preg)
		{
			foreach ($this->arrChunks[0] as $strChunk)
			{
				$strElement = str_replace('##', '', $strChunk);
				
				// call hook
				$strReplace = $this->callback($strElement,$this->arrParameters);
				
				if(strlen($strReplace) > 0)
				{
					$this->strText = str_replace('#'.$strChunk.'#', $strReplace, $this->strText);
				}
			}
		}
		
		$preg = preg_match_all('/&#35;&#35;[^&#35;]+&#35;&#35;/i', $this->strText, $this->arrChunks);
		if($preg)
		{
			foreach ($this->arrChunks[0] as $strChunk)
			{
				$strElement = str_replace('&#35;&#35;', '', $strChunk);
				
				// call hook
				$strReplace = $this->callback($strElement,$this->arrParameters);
				
				if(strlen($strReplace) > 0)
				{
					$this->strText = str_replace('&#35;'.$strChunk.'&#35;', $strReplace, $this->strText);
				}
				
			}
		}
		
		return $this->strText;
	}
	
	/**
	 * Call Hook
	 * @param string
	 * @param array
	 * @return string
	 */
	protected function callback($strElement,$arrParams)
	{
		// HOOK 
		if (isset($GLOBALS['TL_HOOKS']['replaceHashInsertTags']) && !empty($GLOBALS['TL_HOOKS']['replaceHashInsertTags']))
		{
			foreach($GLOBALS['TL_HOOKS']['replaceHashInsertTags'] as $callback)
			{
				$strReplace = \Contao\System::importStatic($callback[0])->{$callback[1]}($strElement,$arrParams);
			}
		}
		
		return $strReplace;
	}
}