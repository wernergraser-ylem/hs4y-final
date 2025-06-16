<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
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

/**
 * Table tl_revolutionslider
 */
$GLOBALS['TL_DCA']['tl_revolutionslider'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'               => DC_Table::class,
		'ctable'                      => array('tl_revolutionslider_slides'),
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array('RevolutionSlider\Backend\TableRevolutionSlider', 'modifyPalettes'),
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'tstamp' => 'index'
			)
		)
	),
	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
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
			   'label'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['edit'],
			   'href'                => 'act=edit',
			   'icon'                => 'edit.svg',
			),
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['edit'],
				'href'                => 'table=tl_revolutionslider_slides',
				'icon'                => 'children.svg',
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.svg',
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.svg',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.svg'
			),
		)
	),
	
	// Palettes
	'palettes' => array
	(
		'__selector__'				  => array(),
		'default'					=> '{title_legend},title;{settings_legend},sliderStyle,sliderSize,sliderBreakPoint,fullScreenOffsetContainer,transition,delay;{more_legend:hide},sliderType,overlay;{navigation_legend:hide},navigationType,navigationSize,thumbAmount;{arrow_legend:hide},arrowStyle,arrowSize;{loop_legend:hide},shuffle,stopOnHover,startWithSlide,stopAtSlide,stopAfterLoops;{template_legend:hide},sliderTemplate,jsTemplate;{expert_legend:hide},cssID;',
	#	'navigationType_thumbs'		=> '{title_legend},title;{settings_legend},sliderStyle,sliderSize,fullScreenOffsetContainer,transition,delay;{more_legend:hide},sliderType,overlay;{navigation_legend:hide},navigationType,arrowStyle,thumbSize,thumbAmount;{loop_legend:hide},shuffle,stopOnHover,startWithSlide,stopAtSlide,stopAfterLoops;{template_legend:hide},sliderTemplate,jsTemplate;{expert_legend:hide},cssID;',
	#	'arrowStyle_thumbs'			=> '{title_legend},title;{settings_legend},sliderStyle,sliderSize,fullScreenOffsetContainer,transition,delay;{more_legend:hide},sliderType,overlay;{navigation_legend:hide},navigationType,arrowStyle,thumbSize;{loop_legend:hide},shuffle,stopOnHover,startWithSlide,stopAtSlide,stopAfterLoops;{template_legend:hide},sliderTemplate,jsTemplate;{expert_legend:hide},cssID;'
	),
	// Fields
	'fields' => array
	(
		'id' => array
		(
			'eval'					  => array('doNotCopy'=>true),
			'sql'                     => "int(10) unsigned NOT NULL auto_increment",
		),
		'tstamp' => array
		(
			'eval'					  => array('doNotCopy'=>true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'					  => "varchar(255) NOT NULL default ''",
		),
		'cssID' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_module']['cssID'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'w50'),
			'sql'					  => "varchar(255) NOT NULL default ''",
		),
		'sliderStyle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['sliderStyle'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'				  => 'auto',
			'options'				  => array('auto','fullscreen'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['sliderStyle'],
			'eval'                    => array('tl_class'=>'w50','chosen'=>true,'submitOnChange'=>true),
			'sql'					  => "varchar(64) NOT NULL default ''",
		),
		'sliderSize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['sliderSize'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'w50','mandatory'=>true),
			'sql'					  => "varchar(255) NOT NULL default ''",
		),
		'sliderBreakPoint' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['sliderBreakPoint'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'default'				  => '768',
			'eval'                    => array('tl_class'=>'clr w50','placeholder'=>'768','rgxp'=>'num'),
			'sql'					  => "varchar(255) NOT NULL default ''",
		),
		'sliderType' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['sliderType'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'				  => 'standard',
			'options'				  => array('standard','carousel'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['sliderType'],
			'eval'                    => array('tl_class'=>'w50','chosen'=>true),
			'sql'					  => "varchar(32) NOT NULL default ''",
		),
		'fullScreenOffsetContainer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['fullScreenOffsetContainer'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'					  => "varchar(64) NOT NULL default ''",
		),
		'transition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['transition'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'default'				  => 'fade',
			'options_callback'		  => array('RevolutionSlider\Core\RevolutionSlider', 'getTransitions'),
			'eval'                    => array('tl_class'=>'clr w50','chosen'=>true),
			'sql'					  =>  "varchar(64) NOT NULL default ''",
		),
		'delay' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['delay'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'default'				  => 4,
			'eval'                    => array('tl_class'=>'w50'),
			'sql'					  => "int(10) NOT NULL default '4'",
		),
		'shuffle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['shuffle'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr w50'),
			'sql'					  => "char(1) NOT NULL default ''",
		),
		'navigationType' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['navigationType'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'		  => array('RevolutionSlider\Backend\TableRevolutionSlider', 'getNavigationTypes'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['navigationType'],
			'eval'                    => array('includeBlankOption'=>true,'tl_class'=>'w50','chosen'=>true,'submitOnChange'=>true),
			'sql'					  => "varchar(64) NOT NULL default ''",
		),
		'navigationSize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['navigationSize'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class'=>'w50','size'=>2,'multiple'=>true),
			'sql'					  => "varchar(64) NOT NULL default ''",
		),
		'arrowStyle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['arrowStyle'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'		  => array('RevolutionSlider\Backend\TableRevolutionSlider', 'getArrowTypes'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_revolutionslider']['arrowStyle'],
			'eval'                    => array('includeBlankOption'=>true,'chosen'=>true,'tl_class'=>'w50'),
			'sql'					  => "varchar(32) NOT NULL default ''",
		),
		'stopOnHover' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['stopOnHover'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
			'sql'					  =>  "char(1) NOT NULL default '1'",
		),
		'overlay' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['overlay'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'				  => array('twoxtwo','threexthree','noise'),
			'reference'				  => $GLOBALS['TL_LANG']['tl_revolutionslider']['overlay'],
			'eval'                    => array('tl_class'=>'clr w50','includeBlankOption'=>true),
			'sql'					  => "varchar(16) NOT NULL default ''",
		),
		// loop settings
		'startWithSlide' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['startWithSlide'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'num', 'tl_class'=>'w50'),
			'sql'					  => "char(3) NOT NULL default ''",
		),
		'stopAtSlide' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['stopAtSlide'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'num', 'tl_class'=>'w50'),
			'sql'					  => "char(3) NOT NULL default ''",
		),
		'stopAfterLoops' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['stopAfterLoops'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'num', 'tl_class'=>'w50'),
			'sql'					  => "char(3) NOT NULL default ''",
		),
		// thumbnails
		'thumbAmount' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['thumbAmount'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'default'				  => 3,
			'eval'                    => array('rgxp'=>'num', 'tl_class'=>'clr w50'),
			'sql'					  => "int(4) NOT NULL default '3'",
		),	
		'sliderTemplate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['sliderTemplate'],
			'exclude'                 => true,
			'default'				  => 'revoslider_default',
			'inputType'               => 'select',
			'options_callback' => static function () {
				return \Contao\Controller::getTemplateGroup('revoslider_');
			},
			'eval'                    => array('tl_class'=>'w50','chosen'=>true),
			'sql'					  => "varchar(64) NOT NULL default ''",
		),
		'jsTemplate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_revolutionslider']['jsTemplate'],
			'exclude'                 => true,
			'default'				  => 'js_revoslider_default',
			'inputType'               => 'select',
			'options_callback' => static function () {
				return \Contao\Controller::getTemplateGroup('js_revoslider_');
			},
			'eval'                    => array('tl_class'=>'w50','chosen'=>true),
			'sql'					  => "varchar(64) NOT NULL default ''",
		),
	)
);



if( \version_compare(ContaoCoreBundle::getVersion(),'5.0','<') )
{
	$edit = $GLOBALS['TL_DCA']['tl_revolutionslider']['list']['operations']['edit'];
	$edit['icon'] = 'edit.svg';
	$editheader = $GLOBALS['TL_DCA']['tl_revolutionslider']['list']['operations']['editheader'];
	$editheader['icon'] = 'header.svg';

	unset($GLOBALS['TL_DCA']['tl_revolutionslider']['list']['operations']['edit']);
	unset($GLOBALS['TL_DCA']['tl_revolutionslider']['list']['operations']['editheader']);
	
	ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_revolutionslider']['list']['operations'],0,array('editheader'=>$editheader));
	ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_revolutionslider']['list']['operations'],0,array('edit'=>$edit));
}