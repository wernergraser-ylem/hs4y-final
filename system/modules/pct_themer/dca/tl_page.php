<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] 		= array('\PCT\Themer\Backend','modifyDca');
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] =		 array('\PCT\Themer\Backend', 'showMissingThemeDesignerSavesInfo');
#$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] 		= array('\PCT\Themer\Backend','onVersionChange');
#$GLOBALS['TL_DCA']['tl_page']['config']['onversion_callback'][] 	= array('\PCT\Themer\Backend','onVersionCallback');
#$GLOBALS['TL_DCA']['tl_page']['config']['onsubmit_callback'][] 		= array('\PCT\Themer\Backend','importTheme');
#$GLOBALS['TL_DCA']['tl_page']['config']['onsubmit_callback'][] 		= array('\PCT\Themer\Backend','addNewRecordsToVersion');


/**
 * Operations
 */
$GLOBALS['TL_DCA']['tl_page']['list']['operations']['pct_theme_export'] = array
(
	'label'               => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_export'],
	'href'                => 'key=theme_export&status=run',
	'icon'                => 'theme_export.gif',
	'attributes'          => 'onclick="Backend.getScrollOffset()"',
	'button_callback'     => array('PCT\Themer\Backend', 'exportButton')
);


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace('includeLayout','includeLayout;{pct_theme_legend:hide},pct_theme,pct_themedesigner_hidden;',$GLOBALS['TL_DCA']['tl_page']['palettes']['root']);
$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] = str_replace('includeLayout','includeLayout;{pct_theme_legend:hide},pct_theme,pct_themedesigner_hidden;',$GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback']);


/**
 * Subpalettes
 */
#$GLOBALS['TL_DCA']['tl_page']['subpalettes']['pct_theme_import'] = 'pct_theme_template';
#$GLOBALS['TL_DCA']['tl_page']['subpalettes']['pct_theme_import'] = 'pct_theme_cto';


/**
 * Fields
 */
if( !isset($GLOBALS['PCT_THEMER']['THEMES']) || !is_array($GLOBALS['PCT_THEMER']['THEMES']))
{
	$GLOBALS['PCT_THEMER']['THEMES'] = array();
}
 
 
$arrOptions = array_keys($GLOBALS['PCT_THEMER']['THEMES']);
sort($arrOptions);
$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['pct_theme'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'		  		  => $arrOptions ,
	'reference'				  => &$GLOBALS['TL_LANG']['tl_page']['pct_theme'],
	'eval'                    => array('tl_class'=>'clr','includeBlankOption'=>true,'submitOnChange'=>false,'chosen'=>true),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme_import'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_import'],
	'exclude'                 => true,
	'default'				  => 0,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme_cto'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_cto'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'foreignKey'		  	  => 'tl_theme.name',
	'eval'                    => array('tl_class'=>'clr','mandatory'=>true,'chosen'=>true),
	'sql'					  => "int(10) NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_page']['fields']['pct_themedesigner_hidden'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['pct_themedesigner_hidden'],
	'exclude'                 => true,
	'default'				  => 0,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr'),
	'sql'					  => "char(1) NOT NULL default ''",
);

#$GLOBALS['TL_DCA']['tl_page']['fields']['pct_theme_template'] = array
#(
#	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['pct_theme_template'],
#	'exclude'                 => true,
#	'inputType'               => 'select',
#	'options_callback'		  => array('PCT\ThemerBackend','getTemplates'), 
#	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
#	#'save_callback'			  => array('PCT\Themer' => 'runThemeImport'),
#	'sql'					  => "varchar(96) NOT NULL default ''",
#);

