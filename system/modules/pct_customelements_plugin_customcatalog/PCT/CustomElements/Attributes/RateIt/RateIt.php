<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @attribute	RateIt
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;


/**
 * Load language files
 */
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('attributes','rateit');


/**
 * Class file
 * RateIt
 */
class RateIt extends \PCT\CustomElements\Core\Attribute
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
			'default'		=> '1',
			'inputType'		=> 'checkbox',
			'eval'			=> $this->getEval(),
			'sql'			=> "char(1) NOT NULL default '1'",
		);

		$arrReturn['eval']['doNotCopy'] = true;
		
		return $arrReturn;
	}
	
	
	/**
	 * Parse widget callback
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC,$varValue)
	{
		if(isset($_POST[$strField]) && $objDC->submitted)
		{
			// validate
			$objWidget->validate();
		}
		
		if($objWidget->hasErrors())
		{
			$objWidget->class = 'error';
		}

		$arrFieldDef = $this->getOptionFieldDefinition();
		
		// create value field
		$this->prepareChildAttribute($arrFieldDef,$strField.'_value');
		// create counter field
		$this->prepareChildAttribute($arrFieldDef,$strField.'_counter');
		
		return $objWidget->parse();
	}
		
	
	/**
	 * Return the field definition for an options field
	 * @param string
	 * @return array
	 */
	public function getOptionFieldDefinition()
	{
		$arrReturn = array
		(
			'label'		=> $GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['rateit_value'],
			'inputType'	=> 'text',
			'exclude'	=> true,
			'sql'		=> "varchar(6) NOT NULL default ''",
			'eval'		=> array('style'=>'display:none;','doNotCopy'=>true),
			'filter'	=> $this->get('be_filter') > 0 ? true : false,
			'saveDataAs'=> 'varchar',
		);
		
		// hide the label in edit mode
		if(\Contao\Input::get('act') == 'edit')
		{
			$arrReturn['label'] = array(' ','');
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Render the attribute and return html
	 * @param string
	 * @param mixed
	 * @param object
	 * @param object
	 * @return string
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		if($varValue < 1)
		{
			return '';
		}
		
		// load language files
		\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('default','rateit');
		
		$objActiveRecord = $objAttribute->getActiveRecord();
		$strTable = $objAttribute->getOrigin()->getTable();
		$intCount = $objActiveRecord->{$strField.'_counter'} ?: 0;
		
		$objTemplate->activeRecord = $objActiveRecord;
		$objTemplate->selector = 'customelement_'.$objActiveRecord->id.'_attr_rateit_'.$objAttribute->get('id');
		$objTemplate->value = $objActiveRecord->{$strField.'_value'};
		$objTemplate->counter = $intCount;
				
		if($objTemplate->isCustomElement)
		{
			// laod option values
			$arrOptionValues = $objAttribute->loadOptionValues($strField);
			$objTemplate->value = $arrOptionValues['value'];
		}
		
		// ip check
		$blnVotingIsAllowed = true;
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		$arrSession = $objSession->get('customelement_attr_rateit_ipcheck');
		if(!is_array($arrSession))
		{
			$arrSession = array();
		}
		
		$strNeedle = \Contao\Environment::get('ip').'::'.$objActiveRecord->id.'_'.$objAttribute->get('id');
		
		$blnVotingIsAllowed = true;
		if(in_array($strNeedle, $arrSession))
		{
			$blnVotingIsAllowed = false;
		}
		
		$objTemplate->votingIsAllowed = $blnVotingIsAllowed;
		
		// save new value and increase counter
		if(\Contao\Input::get('attr_id') == $objAttribute->get('id') && \Contao\Input::get('item_id') == $objActiveRecord->id && \Contao\Input::get('rateit') == 1 && $blnVotingIsAllowed == true)
		{
			$objDatabase = \Contao\Database::getInstance();
			if($objTemplate->isCustomElement)
			{
				$objAttribute->saveValue(\Contao\Input::get('value'),$strField.'_value');
				$objAttribute->saveValue($intCount+1,$strField.'_counter');
			}
			else
			{
				$arrSet = array($strField.'_value'=>\Contao\Input::get('value'),$strField.'_counter'=>$intCount+1);
				$objDatabase->prepare("UPDATE ".$objAttribute->getOrigin()->getTable()." %s WHERE id=?")->set($arrSet)->execute(\Contao\Input::get('item_id'));
			}
			
			// increase counter
			$objDatabase->prepare("UPDATE tl_pct_customelement_attribute %s WHERE id=?")->set(array('rateit_counter'=>$objAttribute->get('rateit_counter')+1))->execute($objAttribute->get('id'));
			
			// set session
			$arrSession[] = $strNeedle;
			$objSession->set('customelement_attr_rateit_ipcheck',$arrSession);
		}
		
		return $objTemplate->parse();
	}


}