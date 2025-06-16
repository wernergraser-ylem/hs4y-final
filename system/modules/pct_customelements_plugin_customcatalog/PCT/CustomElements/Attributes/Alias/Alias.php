<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpacke	pct_customelements_plugin_customcatalog
 * @attribute	AttributeAlias
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */
use PCT\CustomElements\Core\Attribute as Attribute;
use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage;

/**
 * Class file
 * Alias
 */
class Alias extends Attribute
{
	/**
	 * Do not save the attribute in the vault (do not validate)
	 * @param boolean
	 */
	protected $doNotSave = true;
	
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'text',
			'eval'			=> array_unique(array_merge($this->getEval(),array('rgxp'=>'folderalias', 'unique'=>true, 'doNotCopy'=>true, 'maxlength'=>128))),
			'save_callback'	=> array
			(
				array(get_class($this),'generateAlias'),
			),
			'sql'			=> "TINYTEXT NULL",
		);
		
		return $arrReturn;
	}
	
	
	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @return string
	 */
	public function parseWidgetCallback($objWidget, $strField, $arrFieldDef, $objDC, $varValue)
	{
		return '';
	}
	
	
	/**
	 * Generate an alias and return as string
	 * @param object
	 * @return string
	 */
	public function generateAlias($varValue, $objDC)
	{
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::fetchCurrent();
		if(!$objCC)
		{
			return $varValue;
		}
		
		$objAttribute = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::fetchByCustomCatalog($objDC->field,$objCC->id);
		if(!$objAttribute)
		{
			return $varValue;
		}
		
		$aliasField = $objAttribute->alias;
		$intAttr = $objAttribute->aliasSource;
		
		if(!$intAttr || $intAttr < 1)
		{
			throw new \Exception('Alias source field not available. Please check the attribute settings. You might need to save the alias source again e.g. after an import IDs might have changed.');
		}
		
		$objAttributeSource = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::fetchById($intAttr);
		if(!$varValue || \strlen($varValue) < 1)
		{
			$varValue = StringUtil::standardize($objDC->activeRecord->{$objAttributeSource->alias},true);
		}

		// multisource or free alias
		if( empty($objAttribute->number_format) === false )
		{
			// split inserttags
			$varValue = $objAttribute->number_format;
			if( preg_match_all('/{{[^}]+}}/i', $objAttribute->number_format, $arrMatch, PREG_PATTERN_ORDER) )
			{
				if( !\is_array($arrMatch[0]) )
				{
					$arrMatch[0] = array();
				}
				foreach( $arrMatch[0] as $chunk )
				{
					$f = \str_replace(array('{{','}}'),'',$chunk);
					$value = $objDC->activeRecord->{$f};
					
					// @object Attribute
					$attribute = AttributeFactory::findByCustomCatalog($f,$objCC->id);
					// todo: konversion here
					switch($attribute->type)
					{
						case 'tags':

							break;
					}

					$varValue = \str_replace('{{'.$f.'}}',$value,$varValue);
				}
			}

			// replace regular contao inserttags
			$varValue = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($varValue);
		}

		$strOption = \Contao\StringUtil::deserialize( $objAttribute->options );
		if( empty($strOption) === false )
		{
			$search = array('ä','ü','ö','ß');
			$replace = array('ae','ue','oe','ss');
			switch($strOption)
			{
				case 'lower':
					$varValue = \mb_strtolower($varValue);
				break;
				case 'stnd':
					$varValue = \str_replace($search,$replace,$varValue);
				break;
				case 'stnd_lower':
					$varValue = \mb_strtolower($varValue);
					$varValue = \str_replace($search,$replace,$varValue);
				break;
			}
		}
		
		// doublecheck alias
		$objDatabase = \Contao\Database::getInstance();
		$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance();
		
		// multilanguage
		$strLang = Multilanguage::getActiveBackendLanguage($objDC->table);
		
		// check alias in the base record
		if($objCC->multilanguage && strlen($strLang) < 1)
		{
			if( !$objDcaHelper->isUniqueForLanguage($varValue,$objDC,$strLang) )
			{
				return $this->generateAlias($varValue.'_'.$objDC->id,$objDC);
			}
		}
		// check alias in the language record if not stored empty
		else if($objCC->multilanguage && strlen($strLang) > 0)
		{
			if( !$objDcaHelper->isUniqueForLanguage($varValue,$objDC,$strLang) )
			{
				return $this->generateAlias($varValue.'_'.$objDC->id,$objDC);
				#$arrLanguages = \Contao\System::getLanguages();
				#$strLanguage = $arrLanguages[$strLang] ?: $strLang;
				#throw new \Exception(sprintf($GLOBALS['TL_LANG']['ERR']['unique_multilanguage'],$aliasField,$strLanguage));
			}
		}
		// default alias behaviour
		else
		{
			$objAlias = $objDatabase->prepare("SELECT ".$aliasField." FROM ".$objDC->table." WHERE id!=? AND ".$aliasField."=?")->limit(1)->execute($objDC->id,$varValue);
			if($objAlias->numRows > 0)
			{
				return $this->generateAlias($varValue.'_'.$objDC->id,$objDC);
			}
		}

		return $varValue;
	}
	
	
	/**
	 * Modify the field DCA settings for customcatalogs
	 * @param array
	 * @param string
	 * @param object
	 * @param object
	 * @param object
	 * @param object
	 * @return array
	 * called by prepareField Hook
	 */	
	public function prepareField($arrData,$strField,$objAttribute,$objCC,$objCE,$objSystemIntegration)
	{
		if($objAttribute->get('type') != 'alias' || !$objCC->get('multilanguage') || !$objCC->get('languages'))
		{
			return $arrData;
		}
		
		// the alias should not be hardcoded unique for multilanguage records to accept same alias based on the language not based on the table
		$arrData['fieldDef']['eval']['unique'] = false;
				
		return $arrData;
			
	}
	
}