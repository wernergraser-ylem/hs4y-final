<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

use Contao\CoreBundle\ContaoCoreBundle;

/**
 * Class TableCustomElement
 */
class TableCustomElementAttribute extends \PCT\CustomElements\Backend\TableCustomElementAttribute
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\Contao\System::import(\Contao\BackendUser::class, 'User');
	}
	
	
	/**
	 * Modify the dca onload
	 */
	public function modifyDca($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable($objDC->table);
		$arrPalettes = $objDcaHelper->getPalettesAsArray($objActiveRecord->type);
		
		// indivdual palettes from here
		switch($objActiveRecord->type)
		{
			case 'alias':
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['options']['label'] = &$GLOBALS['TL_LANG'][$objDC->table]['options'][$objActiveRecord->type];
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['options'][$objActiveRecord->type]['options'] = array('lower','stnd','stnd_lower');
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['options']['inputType'] = 'select';
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['options']['eval']['multiple'] = false;
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['options']['eval']['includeBlankOption'] = true;
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['options'][$objActiveRecord->type]['reference'] = &$GLOBALS['TL_LANG'][$objDC->table]['options'][$objActiveRecord->type];
				
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['eval_mandatory']['eval']['tl_class'] .= ' m12';
				$arrPalettes['eval_legend'][] = 'options';
				break;
			case 'checkbox':
				$arrPalettes = $objDcaHelper->getPalettesAsArray('tl_pct_customelement_attribute');
				$arrPalettes = $arrPalettes[$objActiveRecord->type];
				$arrPalettes['be_setting_legend'][] = 'be_filter';
				$arrPalettes['be_setting_legend'][] = 'isSelector';
				$arrPalettes['be_setting_legend'][] = 'isToggler';
				break;
			case 'image':
			case 'files':
			
				break;
			case 'text':
				$arrPalettes = $objDcaHelper->getPalettesAsArray('tl_pct_customelement_attribute');
				$arrPalettes = $arrPalettes[$objActiveRecord->type];
				$arrPalettes['eval_legend'][] = 'eval_unique';
				break;
			case 'pagetree':
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['defaultValue']['label'] = &$GLOBALS['TL_LANG'][$objDC->table]['eval_path_pageTree'];
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['defaultValue']['inputType'] = 'pageTree';
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['defaultValue']['foreinKey'] = 'tl_page.title';
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['defaultValue']['eval']['tl_class'] = 'clr m12';
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['defaultValue']['eval']['multiple'] = true;
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['defaultValue']['eval']['fieldType'] = 'checkbox';
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['defaultValue']['eval']['relation'] = array('type'=>'hasOne', 'load'=>'eager');
				break;
			default:
				if(isset($arrPalettes['be_setting_legend']))
				{
					$arrPalettes['be_setting_legend'][] = 'be_filter';
					$arrPalettes['be_setting_legend'][] = 'be_search';
					$arrPalettes['be_setting_legend'][] = 'be_sorting';
				}
				break;
		}


		$be_settings = array('be_filter','be_search','be_sorting');
		if( isset($arrPalettes['be_setting_legend']) && \is_array($arrPalettes['be_setting_legend']) )
		{
			$intersect = \array_intersect($arrPalettes['be_setting_legend'], $be_settings);

			if( \in_array('__BESETTINGS__',$arrPalettes['be_setting_legend']) )
			{
				$arrPalettes['be_setting_legend'] = array_unique( \array_merge($arrPalettes['be_setting_legend'],$be_settings) );
			}
			
			$count_values = \array_count_values($arrPalettes['be_setting_legend']);
			// remove unwanted backend settings
			if( empty($intersect) === false && \is_array($intersect) )
			{
				foreach($intersect as $k)
				{
					if( $count_values[$k] > 1 )
					{
						unset( $arrPalettes['be_setting_legend'][ \array_search($k,$arrPalettes['be_setting_legend']) ] );
					}
				}
			}
		}
		
		// make sure the expert settings block is always the last one
		$pos = count($arrPalettes)-1;
		$arr = array_keys($arrPalettes) ?: array();
		$strLastKey = $arr[$pos];
		if( !in_array($strLastKey ,array('expert_legend','expert_legend:hide')) )
		{
			$tmp = $arrPalettes['expert_legend'] ?? '';
			unset($arrPalettes['expert_legend']);
			$arrPalettes['expert_legend'] = $tmp;
			unset($tmp);
		}

		$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objActiveRecord->type] = $objDcaHelper->generatePalettes($arrPalettes);
	}
	
	
	/**
	 * Pick a color from the color presets. If color has been picked before, pick another one
	 */
	protected function pickColorForSelector($intSelector)
	{
		$arrColors = $GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['selector_css_classes'];
		
		// pick a color
		if(!is_array($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector'][$intSelector]))
		{
			$arrColors = array_values($arrColors);
			
			$intIndex = 0;
			if(is_array($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector']))
			{
				foreach($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector'] as $data)
				{
					if(in_array($data['color'], $arrColors))
					{
						$intIndex++;
					}
				}
			}
			
			if($intIndex > count($arrColors))
			{
				$intIndex = 0; // back to first color
			}
			
			return $arrColors[$intIndex];
		}
		else
		{
			return $GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector'][$intSelector]['color'];
		}
	}
	 
	
	/**
	 * List attributes: Overwrite the labels in the attribute list view
	 * @param string
	 * @param array
	 * @param string
	 * @param string
	 * @return string
	 */
	public function listAttributesCallback($strTable,$arrRow,$icon,$strBuffer)
	{
		if($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['indicateSelectorsInListview'] == true)
		{
			$intId = $arrRow['id'];
			$blnIsSelector = false;
			
			if( isset($arrRow['isSelector']) && $arrRow['isSelector'] == true )
			{
				$blnIsSelector = true;
			}
			
			// check if attribute is part of an subpalette
			if(!array_key_exists($intId, $GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSubpalette']) && !$blnIsSelector)
			{
				$objSelectors = \Contao\Database::getInstance()->prepare("SELECT id,subpalettes FROM tl_pct_customelement_attribute WHERE isSelector=1 AND subpalettes IS NOT NULL")->execute();
				if($objSelectors->numRows > 0)
				{
					while($objSelectors->next())
					{
						$strColor = $this->pickColorForSelector($objSelectors->id);
						
						$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector'][$objSelectors->id] = array('color'=>$strColor);
						
						$arrSubs = \Contao\StringUtil::deserialize($objSelectors->subpalettes);
						if(!is_array($arrSubs))
						{
							$arrSubs = array_filter( explode(',', $arrSubs) );
						}
						
						if(empty($arrSubs))
						{
							continue;
						}
						
						$objOrderedSubs = \Contao\Database::getInstance()->execute("SELECT * FROM tl_pct_customelement_attribute WHERE id IN(".implode(',', $arrSubs).") ORDER BY sorting");
						$i = 0;
						while($objOrderedSubs->next())
						{
							$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSubpalette'][$objOrderedSubs->id][$objSelectors->id] = array
							(
								'selector'	=> $objSelectors->id,
								'color'		=> $strColor,
								'last'		=> ($i >= $objOrderedSubs->numRows - 1) ? $objOrderedSubs->id : 0,
							);
							++$i;
						}
					}
				}
			}
			
			// attribute is in at least on subpalette
			if(array_key_exists($intId, $GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSubpalette']))
			{
				$arrAttributes = array();
				$arrAttributes[] = 'data-contao="'.substr(ContaoCoreBundle::getVersion(),0,1).'"';

				$blnPreg = preg_match('/class="(.*?)\"/', $strBuffer,$arrResult);
				
				$arrClass = explode(' ', $arrResult[1]);
				$arrClass[] = 'isSubpalette';
				$arrClass[] = 'indent';
				$arrClass[] = 'contao-'.ContaoCoreBundle::getVersion();
				
				$arrData = $GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSubpalette'][$intId];
				$arrSelectors = array_keys($arrData);
				
				$arrAttributes[] = 'data-attr_selectors="'.implode(',', $arrSelectors).'"';
				
				$isLast = false;
				$arrColors = array();
				foreach($arrData as $intSelector => $arr)
				{
					$strColor = $this->pickColorForSelector($intSelector);
					
					$arrClass[] = $strColor;
					$arrColors[] = $strColor;
					if($arr['last'] == $intId)
					{
						$arrClass[] = 'last';
						$arrClass[] = 'wrapper_stop';
					}
				}
				
				$arrAttributes[] = 'data-color="'.implode(',', $arrColors).'"';
				
				$strBuffer = str_replace($arrResult[1], implode(' ', $arrClass), $strBuffer);
							
				// add attributes
				$strBuffer = str_replace('<div', '<div '.implode(' ', $arrAttributes), $strBuffer);
			}
	
				
			// indicate selector attributes
			if($blnIsSelector)
			{
				$arrAttributes = array();
				$arrAttributes[] = 'data-contao="'.substr(ContaoCoreBundle::getVersion(),0,1).'"';

				$blnPreg = preg_match('/class="(.*?)\"/', $strBuffer,$arrResult);
				
				$arrClass = explode(' ', $arrResult[1]);
				$arrClass[] = 'isSelector';
				$arrClass[] = 'wrapper_start';
				$arrClass[] = $strColor;
				$arrClass[] = 'contao-'.ContaoCoreBundle::getVersion();
				
				$strColor = $this->pickColorForSelector($intId);
					
				if(!is_array($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector'][$intId]))
				{
					$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSelector'][$intId] = array('color'=>$strColor);
				}
				
				$arrSubs = \Contao\StringUtil::deserialize($arrRow['subpalettes']);
				if(count($arrSubs) > 0)
				{
					$objOrderedSubs = \Contao\Database::getInstance()->execute("SELECT * FROM tl_pct_customelement_attribute WHERE id IN(".implode(',', $arrSubs).") ORDER BY sorting");
					$i = 0;
					while($objOrderedSubs->next())
					{
						$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['isSubpalette'][$objOrderedSubs->id][$intId] = array
						(
							'selector'	=> $intId,
							'color'		=> $strColor,
							'last'		=> ($i >= $objOrderedSubs->numRows - 1) ? true:false,
						);
						++$i;
					}
				}
				
				$strBuffer = str_replace($arrResult[1], implode(' ', $arrClass), $strBuffer);
				
				// add attributes
				$arrAttributes[] = 'data-attr_selector="'.$intId.'"';
				$arrAttributes[] = 'data-color="'.$strColor.'"';
				
				$strBuffer = str_replace('<div', '<div '.implode(' ', $arrAttributes), $strBuffer);
			}
		}	
		
		return $strBuffer;
	}

	
	/**
	 * Get all attributes that are not part of a subpalette yet as array
	 * @param object
	 * @return array
	 */
	public function getAttributesForSubpalettes($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->execute($objDC->id);
		
		// fetch all other selectors and collect attributes to be ignored because they are already part of a selector
		$arrIgnore = array();
		$objSelectors = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id!=? AND pid=? AND isSelector=1")->execute($objActiveRecord->id,$objActiveRecord->pid);
		if($objSelectors->numRows > 0)
		{
			while($objSelectors->next())
			{
				$arrIgnore[] = $objSelectors->id;
				$arr = \Contao\StringUtil::deserialize($objSelectors->subpalettes);
				if(empty($arr) || !is_array($arr))
				{
					continue;
				}
				$arrIgnore = array_unique(array_merge($arrIgnore,$arr));
			}
		}
		
		$objAttributes = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id!=? AND pid=?".(count($arrIgnore) > 0 ? " AND id NOT IN(".implode(',', $arrIgnore).")": "") )->execute($objActiveRecord->id,$objActiveRecord->pid);
		if(!$objAttributes)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objAttributes->next())
		{
			$sub = \Contao\StringUtil::deserialize($objAttributes->subpalettes);
			$arrReturn[$objAttributes->id] = $objAttributes->title;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Return all attributes of the same type as the current attribute and of the same custom element
	 * @param object
	 * @return array
	 */
	public function getSiblingAttributes($objDC)
	{
		$this->loadLanguageFile('tl_pct_customelement_group');
		
		$objDatabase = \Contao\Database::getInstance();
		
		$objCE = $objDatabase->prepare("SELECT * FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?)")->limit(1)->execute($objDC->activeRecord->pid);
		if($objCE->numRows < 1)
		{
			return array();
		}
		
		$defaultOnly = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['includeAllGroupsets'] ? false : true;
		
		$objSiblings = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id !=? AND type=? AND pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid IN(?) ".($defaultOnly ? " AND (selector='' OR selector IS NULL) " : "")." GROUP BY id)")->execute($objDC->id,$objDC->activeRecord->type,$objCE->id);
		if($objSiblings->numRows < 1)
		{
			return array();
		}
		
		$strGroupSet = '['.$GLOBALS['TL_LANG']['tl_pct_customelement_group']['panel']['groupset']['default'].']';
		
		$arrReturn = array();
		while($objSiblings->next())
		{
			$objGroupSet = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_groupset WHERE alias=(SELECT selector FROM tl_pct_customelement_group WHERE id=?)")->limit(1)->execute($objSiblings->pid);
			
			if($objGroupSet->title)
			{
				$strGroupSet = $objGroupSet->title . ' ['.$objGroupSet->alias.']';
			}
			
			$arrReturn[$objSiblings->id] = $objSiblings->title . '['.$objSiblings->alias.']' . ' in ' . $strGroupSet;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Generate the alias for the paletteselect attribute
	 * @param mixed
	 * @param object
	 */
	public function generateAliasBySiblingAlias($varValue, $objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$unique = true;
		
		$objSibling = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE type=? AND id!=?")->execute($objDC->activeRecord->type,$objDC->id);
		if($objSibling->numRows < 1)
		{
			$unique = true;
		}
		else
		{
			$unique = false;
		}
		
		if($unique)
		{
			return $this->generateAliasAgainstCustomElement($varValue,$objDC);
		}
		
		$objCE = $objDatabase->prepare("SELECT id FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?)")->limit(1)->execute($objDC->activeRecord->pid);
		while($objSibling->next())
		{
			// fetch CE id
			$objSiblingCE = $objDatabase->prepare("SELECT id FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?)")->limit(1)->execute($objSibling->pid);
			if($objSiblingCE->id == $objCE->id)
			{
				// set field to readonly on this step
				return $objSibling->alias;
			}
		}
	
		return $varValue;	
	}
	
	
	/**
	 * Sanitize alias against reserved words
	 * @param mixed
	 * @param object
	 */
	public function sanitizeAlias($varValue,$objDC)
	{
		if(strlen($varValue) > 0)
		{		
			$v = strtoupper($varValue);
			$arrReserved = array_map('strtoupper',\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::getReservedWords());
			if(in_array($v, $arrReserved) || array_key_exists($v, $arrReserved))
			{
				$this->loadLanguageFile('exeption');
				throw new \Exception(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['XPT']['reservedSqlWord'],$varValue));
			}
		}
		return $varValue;
	}
	
	
	/**
	 * Disable the automatic alias generation for alias in default palettes that has an alias already
	 * @param object
	 * called from onsubmit_callback
	 */
	public function disableAliasGeneration($objDC)
	{
		// check if parent group is a groupset
		$objGroup = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_group WHERE id=?")->limit(1)->execute($objDC->activeRecord->pid);
		if(!strlen($objGroup->selector) && strlen($objDC->activeRecord->alias) > 0)
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['alias']['save_callback'] = array();
		}
	}
	
	
	/**
	 * Return all attributes as array
	 * @param object
	 * @return array
	 */
	public function getAttributes($objDC)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		$objCE = $objDatabase->prepare("SELECT id FROM tl_pct_customelement WHERE id=(SELECT pid FROM tl_pct_customelement_group WHERE id=?)")->limit(1)->execute($objDC->activeRecord->pid);
		
		$objAttributes = \PCT\CustomElements\Core\AttributeFactory::fetchMultipleByCustomElement($objCE->id);
		if(!$objAttributes)
		{
			return array();
		}
		
		$values = array();
		if(is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values']))
		{
			$values = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['options_values'];
		}
		
		$distinct = $GLOBALS['TL_DCA'][$objDC->table]['fields'][$objDC->field]['eval']['distinctField'] ?? '';
		
		$arrReturn = array();
		$arrDistinct = array();
		while($objAttributes->next())
		{
			if(strlen($distinct) > 0)
			{
				if(in_array($objAttributes->{$distinct},$arrDistinct))
				{
					continue;
				}
				$arrDistinct[] = $objAttributes->{$distinct};
			}
			
			if(count($values) > 0)
			{
				if(in_array($objAttributes->type, $values))
				{
					$arrReturn[$objAttributes->id] = $objAttributes->title . ' ['.$objAttributes->alias.']';
					continue;
				}
			}
			else
			{
				$arrReturn[$objAttributes->id] = $objAttributes->title . ' ['.$objAttributes->alias.']';
			}
		}
		
		return $arrReturn;
	}
}