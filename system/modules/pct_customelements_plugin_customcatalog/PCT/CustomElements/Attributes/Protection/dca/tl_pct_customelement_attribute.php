<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_cusotmelements_plugin_customcatalog
 * @attribute	Proctection
 * @link		http://contao.org
 */

/**
 * Table tl_pct_customelement_attribute
 */
$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_attribute');
$objActiveRecord = $objDcaHelper->getActiveRecord();
$strType = 'protection';

/**
 * Load language file
 */
\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile($objDcaHelper->getTable(),$strType);


/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$arrPalettes['settings_legend'] = array('options','defaultValue','isDownload');
$arrPalettes['be_setting_legend'][] = 'eval_includeBlankOption';
$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);

if( isset($objActiveRecord) && $objActiveRecord->type == $strType )
{
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['options'] = array
	(
		'label'			=> $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType]['label'],
		'inputType'		=> 'radio',
		'options'		=> array('user','user_group','member','member_group'),
		'reference'		=> $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['options'][$strType],
		'eval'			=> array('submitOnChange'=>true)
	);
	
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['isDownload']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isDownload'][$strType]['label'];
	
	// defaultValue
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['eval']['tl_class'] = 'clr w50';
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['eval']['includeBlankOption'] = true;
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['eval']['chosen'] = true;
	
	$mode = \Contao\StringUtil::deserialize($objActiveRecord->options);
	if($mode == 'user')
	{
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['inputType'] = 'select';
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['foreignKey'] = 'tl_user.username';
		// isDownload
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['isDownload']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isDownload'][$strType]['label'];
	}
	else if($mode == 'user_group')
	{
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['inputType'] = 'checkbox';
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['eval']['multiple'] = true;
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['foreignKey'] = 'tl_user_group.name';
		// isDownload
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['isDownload']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isDownload'][$strType]['label'];
	
	}
	// frontend
	else if($mode == 'member')
	{
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['inputType'] = 'select';
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['foreignKey'] = 'tl_member.username';
	}
	else if($mode == 'member_group')
	{
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['inputType'] = 'checkbox';
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['eval']['multiple'] = true;
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['defaultValue']['foreignKey'] = 'tl_member_group.name';
	}
	
	// reuse the "isDownload" field for the option to include the current user/user_group when submitting empty
	// isDownload
	if(in_array($mode, array('user','member')))
	{
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['isDownload']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isDownload'][$strType]['label'];
	}
	else if(in_array($mode, array('user_group','member_grup')))
	{
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['isDownload']['label'] = &$GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['isDownload'][$strType]['label_group'];
	}
	
	
	
}