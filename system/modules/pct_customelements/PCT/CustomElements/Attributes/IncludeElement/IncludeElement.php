<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	AttributeInclude
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */

use Contao\Controller;
use PCT\CustomElements\Attributes\IncludeElement\TableCustomElementAttribute;
use PCT\CustomElements\Core\Attribute as Attribute;
use PCT\CustomElements\Core\AttributeFactory;
use PCT\CustomElements\Core\Controller as CoreController;

/**
 * Class file
 * IncludeElement
 */
class IncludeElement extends Attribute
{
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
			'inputType'		=> 'select',
			'eval'			=> $this->getEval(),
			'sql'			=> "int(10) unsigned NOT NULL default '0'",
			'options_callback' => array(\get_class($this),'getOptions'),
		);

		$sql_version = \Contao\Database::getInstance()->prepare('SELECT @@version AS version')->execute();
		if( \version_compare($sql_version->version,'8','>=') && \strpos( \strtolower($sql_version->version), 'mariadb') === false )
		{
			$arrReturn['sql'] = "int unsigned NOT NULL default '0'";
		}
		
		$arrReturn['eval']['chosen'] = true;
		// store attribute ID
		$arrReturn['ce_attribute'] = $this->id;

		return $arrReturn;
	}


	/** 
	 * Return the select field options as array
	 * @return array
	 */
	public function getOptions($objDC)
	{
		$intAttribute = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['ce_attribute'];
		$objAttribute = AttributeFactory::findById($intAttribute);
		if( $objAttribute === null )
		{
			return array();
		}

		$arrReturn = array();
		
		$blnInstallTool = false;
		if(strlen(strpos(\Contao\Environment::get('scriptName'), '/contao/install.php')) > 0 || strlen(strpos(\Contao\Environment::get('requestUri'), '/contao/install')) > 0)
		{
			$blnInstallTool = true;
		}
		
		// fetch include options
		if(strlen($objAttribute->get('include_type')) > 0 && CoreController::isBackend() && !$blnInstallTool)
		{
			Controller::loadDataContainer('tl_content');

			$tableHelper = new TableCustomElementAttribute();
			switch($objAttribute->get('include_type'))
			{
				case 'article': 
					$arrReturn = $tableHelper->getArticles();
					break;
				case 'content': 
					$arrReturn = $tableHelper->getCustomElements();
					break;
				case 'form': 
					$arrReturn = $tableHelper->getForms();
					break;
				case 'module':
					$arrReturn = $tableHelper->getModules();
					break;
				default:
					break;
			}
		}
		
		return $arrReturn;
	}

	
	/**
	 * Parse widget callback, render the attribute in the backend
	 * @param object
	 * @return string
	 */
	public function parseWidgetCallback($objWidget)
	{
	   if(!$this->get('include_item'))
	   {
	   		return $objWidget->parse();
	   }
	   
	   return '';
	}

	/**
	 * Render the attribute and return html
	 * @return array
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$item = $this->get('include_item');
		
		if(!$item)
		{
			$item = $varValue;
		}
		
		$objContainer = \Contao\System::getContainer();

		$strBuffer = '';
		switch($this->get('include_type'))
		{
			case 'article':
				$strBuffer = $objContainer->get('contao.insert_tag.parser')->replace('{{insert_article::'.$item.'}}');
				break;
			case 'content': 
				$strBuffer = $objContainer->get('contao.insert_tag.parser')->replace('{{insert_content::'.$item.'}}');
				break;
			case 'form': 
				$strBuffer = $objContainer->get('contao.insert_tag.parser')->replace('{{insert_form::'.$item.'}}');
				break;
			case 'module':
				$strBuffer = $objContainer->get('contao.insert_tag.parser')->replace('{{insert_module::'.$item.'}}');
				break;
			default:
				break;
		}
		
		$objTemplate->value = $strBuffer;
		
		return $objTemplate->parse();
	}
}