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
 * @filter		Related item filter
 * @link		http://contao.org
 */


/**
 * Table tl_pct_customelement_filter
 */
$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper::getInstance()->setTable('tl_pct_customelement_filter');
$strType = 'relatedItems';
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Load language file
 */
\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile($objDcaHelper->getTable(),$strType);


/**
 * Palettes
 */
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
$objDcaHelper->removeField('template');
$objDcaHelper->removeField('urlparam');
$objDcaHelper->removeField('cssID');
$arrPalettes = $objDcaHelper->getPalettes();
$arrPalettes['settings_legend'][] = 'mode';

if( isset($objActiveRecord) && $objActiveRecord->type == $strType)
{
	// Palettes
	if($objDcaHelper->getActiveRecord()->mode == 'normal' || !$objDcaHelper->getActiveRecord()->mode)
	{
		$arrPalettes['settings_legend'][] = 'attr_id';
		$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);
	}
	else if($objDcaHelper->getActiveRecord()->mode == 'related')
	{
		$arrPalettes['settings_legend'][] = 'config_id';
		$arrPalettes['settings_legend'][] = 'attr_id';
		$GLOBALS['TL_DCA']['tl_pct_customelement_filter']['palettes'][$strType] = $objDcaHelper->generatePalettes($arrPalettes);
	
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['config_id']['label'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['related_config_id'];
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['config_id']['eval']['submitOnChange'] = true;
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['attr_id']['label'] = $GLOBALS['TL_LANG']['tl_pct_customelement_filter']['related_attr_id'];
		$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['attr_id']['options_callback'] = array('PCT\CustomElements\Filters\RelatedItems\TableHelper','getRelatedAttributes');
	}
	
	$objDcaHelper->addSelector('mode');
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['reference'] = $GLOBALS['TL_LANG'][$objDcaHelper->getTable()]['relatedItem_mode'];
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['inputType'] = 'select';
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['options'] = array('normal','related');
	$GLOBALS['TL_DCA'][$objDcaHelper->getTable()]['fields']['mode']['eval'] = array('submitOnChange'=>true,'chosen'=>true);
}

