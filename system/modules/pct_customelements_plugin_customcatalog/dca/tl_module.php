<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Imports
 */
use PCT\CustomElements\Plugins\CustomCatalog\Helper\DcaHelper as DcaHelper;
use Contao\ArrayUtil;

/**
 * Table tl_module
 */
$objDcaHelper = DcaHelper::getInstance()->setTable('tl_module');
$objActiveRecord = $objDcaHelper->getActiveRecord();

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule', 'modifyDca');


/**
 * Palettes
 */
// customcataloglist
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
ArrayUtil::arrayInsert($arrPalettes['title_legend'],1,'headline');
$arrPalettes['config_legend'] 				= array('customcatalog','customcatalog_jumpTo');
$arrPalettes['list_legend']					= array('customcatalog_limit','customcatalog_offset','customcatalog_perPage','customcatalog_sortField','customcatalog_sorting','customcatalog_setVisibles');
$arrPalettes['image_legend:hide']			= array('customcatalog_attr_image','customcatalog_imgSize');
$arrPalettes['filter_legend']				= array('customcatalog_filtersets','customcatalog_filter_showAll','customcatalog_filter_actLang','customcatalog_filter_start','customcatalog_filter_stop');
$arrPalettes['language_legend']				= array('customcatalog_strictLanguage');
$arrPalettes['template_legend:hide'] 		= array('customcatalog_template','customcatalog_mod_template');
$arrPalettes['advanced_sql_legend:hide'] 	= array('customcatalog_sqlWhere','customcatalog_sqlSorting');
$arrPalettes['protected_legend:hide'] 		= array('protected','hardLimit');
if( $objActiveRecord !== null )
{
	if($objActiveRecord->type == 'customcataloglist' && version_compare(PCT_TABLETREE_VERSION, '1.3.5','>='))
	{
		$arrPalettes['advanced_sql_legend:hide'][] = 'multiSRC';
	}
}
$arrPalettes['expert_legend:hide'] 			= array('guests','cssID','space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcataloglist'] = $objDcaHelper->generatePalettes($arrPalettes);
// customcatalogreader
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
ArrayUtil::arrayInsert($arrPalettes['title_legend'],1,'headline');
$arrPalettes['config_legend'] 				= array('customcatalog');
$arrPalettes['list_legend']					= array('customcatalog_setVisibles');
$arrPalettes['filter_legend']				= array('customcatalog_filter_actLang');
$arrPalettes['template_legend:hide'] 		= array('customcatalog_template','customcatalog_mod_template');
$arrPalettes['comment_legend:hide'] 		= array('com_template');
$arrPalettes['protected_legend:hide'] 		= array('protected');
$arrPalettes['expert_legend:hide'] 			= array('guests','cssID','space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcatalogreader'] = $objDcaHelper->generatePalettes($arrPalettes);
// customcatalogfilter
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
ArrayUtil::arrayInsert($arrPalettes['title_legend'],1,'headline');
$arrPalettes['config_legend'] 				= array('customcatalog');
$arrPalettes['ffw_legend']					= array('customcatalog_jumpTo');
$arrPalettes['list_legend']					= array('customcatalog_setVisibles');
$arrPalettes['filter_legend']				= array('customcatalog_filtersets','customcatalog_filter_submit','customcatalog_filter_actLang','customcatalog_filter_showAll');
$arrPalettes['template_legend:hide'] 		= array('customcatalog_mod_template');
$arrPalettes['protected_legend:hide'] 		= array('protected');
$arrPalettes['expert_legend:hide'] 			= array('customcatalog_filter_method','customcatalog_filter_formID','cssID','space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcatalogfilter'] = $objDcaHelper->generatePalettes($arrPalettes);
// customcatalog_apistarter
$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
ArrayUtil::arrayInsert($arrPalettes['title_legend'],1,'headline');
$arrPalettes['config_legend'] 				= array('customcatalog');
$arrPalettes['api_legend']					= array('customcatalog_api');
$arrPalettes['template_legend:hide'] 		= array('customcatalog_mod_template');
$arrPalettes['advanced_sql_legend:hide'] 	= array('customcatalog_sqlWhere','customcatalog_sqlSorting');
$arrPalettes['protected_legend:hide'] 		= array('protected');
$arrPalettes['expert_legend:hide'] 			= array('guests','cssID','space');
$GLOBALS['TL_DCA']['tl_module']['palettes']['customcatalog_apistarter'] = $objDcaHelper->generatePalettes($arrPalettes);


/**
 * Subpalettes
 */
$objDcaHelper->addSubpalette('customcatalog_setVisibles',array('customcatalog_visibles'));


/**
 * Fields
 */
$objDcaHelper->addFields(array
(
	// config_legend
	'customcatalog' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog'],
		'exclude'         		=> true,
		'search'          		=> true,
		'inputType'       		=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getCustomCatalogs'),
		'eval'            		=> array('tl_class'=>'','mandatory'=>true, 'maxlength'=>255,'includeBlankOption'=>true,'submitOnChange'=>true,'chosen'=>true),
		'sql'			  		=> "varchar(128) NOT NULL default ''",
	),
	'customcatalog_jumpTo' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_jumpTo'],
		'exclude'         		=> true,
		'inputType'       		=> 'pageTree',
		'foreignKey'            => 'tl_page.title',
		'eval'                    => array('fieldType'=>'radio'),
		'sql'			  		=> "int(10) NOT NULL default '0'",
		'relation'              => array('type'=>'hasOne', 'load'=>'eager')
	),
	// list_legend
	'customcatalog_limit' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_limit'],
		'exclude'         		=> true,
		'inputType'       		=> 'text',
		'eval'            		=> array('rgxp'=>'digit','tl_class'=>'w50'),
		'sql'			  		=> "int(10) NOT NULL default '0'",
	),
	'customcatalog_offset' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_offset'],
		'exclude'         		=> true,
		'inputType'       		=> 'text',
		'eval'            		=> array('rgxp'=>'digit','tl_class'=>'w50'),
		'sql'			  		=> "int(10) NOT NULL default '0'",
	),
	'customcatalog_perPage' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_perPage'],
		'exclude'         		=> true,
		'inputType'       		=> 'text',
		'default'				=> 30,
		'eval'            		=> array('rgxp'=>'digit','tl_class'=>'w50'),
		'sql'			  		=> "int(10) NOT NULL default '0'",
	),
	'customcatalog_setVisibles' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_setVisibles']['att'],
		'exclude'         		=> true,
		'inputType'       		=> 'checkbox',
		'eval'            		=> array('tl_class'=>'clr','submitOnChange'=>true),
		'sql'			  		=> "char(1) NOT NULL default ''",
	),
	'customcatalog_visibles' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_visibles'],
		'exclude'         		=> true,
		'inputType'       		=> 'checkbox',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getVisibles'),
		'eval'            		=> array('tl_class'=>'','multiple'=>true,'chosen'=>true),
		'sql'			  		=> "blob NULL",
	),
	'customcatalog_sortField' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sortField'],
		'exclude'         		=> true,
		'inputType'       		=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getAttributes'),
		'eval'            		=> array('tl_class'=>'w50 clr','includeBlankOption'=>true,'chosen'=>true,'includeSystemColumns'=>true),
		'sql'			  		=> "varchar(128) NOT NULL default ''",
	),
	'customcatalog_sorting' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sorting'],
		'exclude'         		=> true,
		'default'				=> 'desc',
		'inputType'       		=> 'select',
		'options'				=> array('asc','desc','rand'),
		'reference'				=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sorting'],
		'eval'            		=> array('tl_class'=>'w50'),
		'sql'			  		=> "char(4) NOT NULL default ''",
	),
	// image_legend
	'customcatalog_attr_image' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_attr_image'],
		'exclude'         		=> true,
		'inputType'       		=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getAttributes'),
		'eval'            		=> array('tl_class'=>'clr','chosen'=>true,'multiple'=>true,'option_values'=>array('image')),
		'sql'			  		=> "blob NULL",	
	),
	'customcatalog_imgSize' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['MSC']['imgSize'],
		'exclude'				=> true,
		'inputType' 			=> 'imageSize',
		'reference' 			=> &$GLOBALS['TL_LANG']['MSC'],
		'options_callback' => static function ()
		{
			return \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions();
		},
		'eval'      			=> array('rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'),
		'sql'       			=> "varchar(64) NOT NULL default ''"
	),
	
	// filter_legend
	'customcatalog_filtersets' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filtersets'],
		'exclude'         		=> true,
		'inputType'       		=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getFiltersets'),
		'eval'            		=> array('tl_class'=>'clr','multiple'=>true,'chosen'=>true),
		'sql'			  		=> "blob NULL",
	),
	'customcatalog_filter_submit' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_submit'],
		'exclude'         		=> true,
		'inputType'       		=> 'checkbox',
		'eval'            		=> array('tl_class'=>'clr w50'),
		'sql'			  		=> "char(1) NOT NULL default ''",
	),
	
	'customcatalog_filter_method' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_method'],
		'exclude'         		=> true,
		'inputType'       		=> 'select',
		'options'				=> array('get','post'),
		'reference'				=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_method'],
		'eval'            		=> array('tl_class'=>'w50'),
		'sql'			  		=> "varchar(8) NOT NULL default ''",
	),
	'customcatalog_filter_formID' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_formID'],
		'exclude'         		=> true,
		'inputType'       		=> 'text',
		'eval'            		=> array('tl_class'=>'w50'),
		'sql'			  		=> "varchar(128) NOT NULL default ''",
	),
	'customcatalog_filter_showAll' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_showAll'],
		'exclude'         		=> true,
		'inputType'       		=> 'checkbox',
		'eval'            		=> array('tl_class'=>'clr w50'),
		'sql'			  		=> "char(1) NOT NULL default '1'",
	),
	'customcatalog_filter_actLang' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_actLang'],
		'exclude'         		=> true,
		'inputType'       		=> 'checkbox',
		'eval'            		=> array('tl_class'=>'w50'),
		'sql'			  		=> "char(1) NOT NULL default '1'",
	),
	'customcatalog_filter_start' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_start'],
		'exclude'         		=> true,
		'inputType'				=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getFilters'),
		'eval'					=> array('tl_class'=>'w50 clr','includeBlankOption'=>true,'chosen'=>true,'option_values'=>array('timestamp')),
		'sql'					=> "int(10) NOT NULL default '0'"
	),
	'customcatalog_filter_stop' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_filter_stop'],
		'exclude'         		=> true,
		'inputType'				=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getFilters'),
		'eval'					=> array('tl_class'=>'w50','includeBlankOption'=>true,'chosen'=>true,'option_values'=>array('timestamp')),
		'sql'					=> "int(10) NOT NULL default '0'"
	),

	
	// template_legend
	'customcatalog_template' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_template'],
		'exclude'         		=> true,
		'inputType'       		=> 'select',
		'default'				=> 'customcatalog_default',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getLayoutTemplates'),
		'eval'            		=> array('tl_class'=>'w50','chosen'=>true),
		'sql'			  		=> "varchar(64) NOT NULL default ''",
	),
	'customcatalog_mod_template' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_template_mod'],
		'exclude'         		=> true,
		'inputType'       		=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getModuleTemplates'),
		'eval'            		=> array('tl_class'=>'w50','chosen'=>true),
		'sql'			  		=> "varchar(64) NOT NULL default ''",
	),
	
	// advanced_sql_legend
	'customcatalog_sqlWhere' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sqlWhere'],
		'exclude'         		=> true,
		'search'          		=> true,
		'inputType'       		=> 'textarea',
		'eval'            		=> array('tl_class'=>'','decodeEntities'=>true,'placeholder'=>'id=10'),
		'sql'			  		=> "mediumtext NULL",
	),
	'customcatalog_sqlSorting' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_sqlSorting'],
		'exclude'         		=> true,
		'search'          		=> true,
		'inputType'       		=> 'textarea',
		'eval'            		=> array('tl_class'=>'','decodeEntities'=>true,'placeholder'=>'id DESC, tstamp ASC'),
		'sql'			  		=> "tinytext NULL",
	),
	
	// apis_legend
	'customcatalog_api' => array
	(
		'label'           		=> &$GLOBALS['TL_LANG']['tl_module']['customcatalog_api'],
		'exclude'         		=> true,
		'inputType'       		=> 'select',
		'options_callback'		=> array('PCT\CustomElements\Plugins\CustomCatalog\Backend\TableModule','getApis'),
		'eval'            		=> array('tl_class'=>'w50','includeBlankOption'=>true,'chosen'=>true),
		'sql'			  		=> "int(10) NOT NULL default '0'",
	),
));