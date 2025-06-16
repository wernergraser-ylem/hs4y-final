<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

use Contao\ArrayUtil;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\DC_Table;


/**
 * Load language file
 */
\Contao\System::loadLanguageFile('tl_module');
\Contao\System::loadLanguageFile('tl_content');
\Contao\System::loadLanguageFile('tl_pct_customelement');
\Contao\System::loadLanguageFile('tl_pct_customelement_group');


/**
 * Table tl_pct_customelement_group
 */
$GLOBALS['TL_DCA']['tl_pct_customelement_group'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'               => DC_Table::class,
		'ptable'					  => 'tl_pct_customelement',
		'ctable'                      => array('tl_pct_customelement_attribute'),
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onload_callback' 			  => array
		(
			array('PCT\CustomElements\Backend\TableCustomElementGroup', 'checkPermission'),
		),
		'onsubmit_callback'			  => array
		(
			array('PCT\CustomElements\Helper\DcaHelper', 'setUpdateFlag'),
		),
		'oncut_callback'			  => array
		(
			array('PCT\CustomElements\Helper\DcaHelper', 'setUpdateFlag'),
		),
		'oncopy_callback'			  => array
		(
			array('PCT\CustomElements\Backend\TableCustomElementGroup', 'setAttributeUuidOnCopy'),
			array('PCT\CustomElements\Backend\TableCustomElementGroup', 'doNotCopyAlias'),
		),
		'ondelete_callback'			  => array
		(
			array('PCT\CustomElements\Helper\DcaHelper', 'setUpdateFlag'),
			array('PCT\CustomElements\Helper\DcaHelper', 'removeFromVault')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index',
				'tstamp' => 'index'
			)
		)
	),
	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('sorting'),
			'headerFields'            => array('title'),
			'panelLayout'             => 'search,limit',
			'child_record_callback'   => array('PCT\CustomElements\Backend\TableCustomElementGroup', 'listGroups'),
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			),
		),
		'operations' => array
		(
			'editheader' => array
			(
			   'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['edit'],
			   'href'                => 'act=edit',
			   'icon'                => 'edit.svg',
			   'button_callback'     => array('PCT\CustomElements\Backend\TableCustomElementGroup', 'editHeader'),
			),
			'children' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['edit'],
				'href'                => 'table=tl_pct_customelement_attribute',
				'icon'                => 'children.svg',
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.svg',
				'button_callback'     => array('PCT\CustomElements\Backend\TableCustomElementGroup', 'copyButton'),
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.svg',
				'button_callback'     => array('PCT\CustomElements\Backend\TableCustomElementGroup', 'cutButton'),
			),
			'toggle' => array
			(
				'href'                => 'act=toggle&amp;field=published',
				'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['toggle'],
				'icon'                => 'visible.svg',
				'button_callback'     => array('PCT\CustomElements\Backend\TableCustomElementGroup', 'toggleIcon')
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['tl_pct_customelement_group']['delete'][1] . '\'))return false;Backend.getScrollOffset()"',
				'button_callback'     => array('PCT\CustomElements\Backend\TableCustomElementGroup', 'deleteButton'),
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.svg'
			),
		)
	),
	// Palettes
	'palettes' => array
	(
		'__selector__'				  => array('protected'),
		'default'                  	  => '{title_legend},title,headline;{settings_legend},isLegend,allowCopy,allowCut,hidden,legend_hide;{template_legend},template;{protected_legend:hide},protected;{expert_legend},cssID,alias,published;'
	),
	// Subpalettes
	'subpalettes' => array
	(
		'protected'					  => 'user_groups,users'
	),
	// Fields
	'fields' => array
	(
		'id' => array
		(
			'eval'					  => array('doNotCopy'=>true),
			'sql'                     => "int(10) unsigned NOT NULL auto_increment",
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_pct_customelement.title',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'lazy')
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
		),
		'sorting' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['alias'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'folderalias', 'doNotCopy'=>false, 'unique'=>false, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('PCT\CustomElements\Backend\TableCustomElementGroup', 'generateAliasAgainstCustomElement')
			),
			'sql'                     => "varchar(255) BINARY NOT NULL default ''"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>''),
			'sql'					  =>  "varchar(255) NOT NULL default ''",
		),
		'allowCopy' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['allowCopy'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'					  => "char(1) NOT NULL default ''",
		),
		'allowCut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['allowCut'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'					  => "char(1) NOT NULL default ''",
		),
		'hidden' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['hidden'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'					  => "char(1) NOT NULL default ''",
		),
		'legend_hide' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['legend_hide'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'					  => "char(1) NOT NULL default ''",
		),
		#'template' => array
		#(
		#	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['template'],
		#	'exclude'                 => true,
		#	'inputType'               => 'select',
		#	'options_callback'        => array('PCT\CustomElements\Backend\TableCustomElementGroup', 'getTemplates'),
		#	'eval'                    => array('tl_class'=>''),
		#	'sql'					  => "varchar(64) NOT NULL default ''",
		#),
		'protected' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement']['protected'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'','submitOnChange'=>true),
			'sql'					  => "char(1) NOT NULL default ''",
		),
		'user_groups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement']['user_groups'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'foreignKey'              => 'tl_user_group.name',
			'eval'                    => array('multiple'=>true,'tl_class'=>'clr',),
			'sql'					  => "blob NULL",
			'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		),
		#'users' => array
		#(
		#	'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['users'],
		#	'exclude'                 => true,
		#	'inputType'               => 'checkbox',
		#	'foreignKey'              => 'tl_user.name',
		#	'eval'                    => array('multiple'=>true,'tl_class'=>'clr',),
		#	'sql'					  => "blob NULL",
		#	'relation'                => array('type'=>'hasMany', 'load'=>'lazy')
		#),
		'cssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cssID'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'w50'),
			'sql'					  =>  "varchar(255) NOT NULL default ''",
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 1,
			'toggle'				  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);


if( \version_compare(ContaoCoreBundle::getVersion(),'5.0','<') )
{
	$edit = $GLOBALS['TL_DCA']['tl_pct_customelement_group']['list']['operations']['children'];
	$edit['icon'] = 'edit.svg';
	$editheader = $GLOBALS['TL_DCA']['tl_pct_customelement_group']['list']['operations']['editheader'];
	$editheader['icon'] = 'header.svg';

	unset($GLOBALS['TL_DCA']['tl_pct_customelement_group']['list']['operations']['edit']);
	unset($GLOBALS['TL_DCA']['tl_pct_customelement_group']['list']['operations']['editheader']);
	
	ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement_group']['list']['operations'],0,array('editheader'=>$editheader));
	ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_pct_customelement_group']['list']['operations'],0,array('edit'=>$edit));
}