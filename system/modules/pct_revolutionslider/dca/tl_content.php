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

/**
 * Load language files
 */
\Contao\System::loadLanguageFile('tl_revolutionslider_slides');

$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('RevolutionSlider\Backend\TableContent', 'modifyPalettes');	
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('RevolutionSlider\Backend\TableContent', 'hideFields');	

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider'] 			= '{type_legend},type,headline;{select_legend},revolutionslider;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video'] 		= '{type_legend},type,revolutionslider_videoType;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video_local'] 		= '{type_legend},type,revolutionslider_videoType;{source_legend},multiSRC,singleSRC;{video_settings_legend},revolutionslider_video_size,revolutionslider_data_autoplay,revolutionslider_video_loop,revolutionslider_data_nextslideatend,revolutionslider_video_controls;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video_external'] 	= '{type_legend},type,revolutionslider_videoType;{source_legend},url;{video_settings_legend},revolutionslider_video_size,revolutionslider_video_aspect,revolutionslider_data_autoplay,revolutionslider_video_loop,revolutionslider_data_nextslideatend,revolutionslider_video_controls;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_text'] 		= '{type_legend},type;{text_legend},text,revolutionslider_text_fontsize,revolutionslider_text_bold,revolutionslider_text_italic;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_image'] 		= '{type_legend},type;{source_legend},singleSRC;{image_legend},alt,imageTitle,size,imageUrl,fullsize,useSVG;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_hyperlink'] 	= '{type_legend},type;{link_legend},url,target,linkTitle,embed,titleText,rel;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';


/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'revolutionslider_videoType';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'revolutionslider_OUT';
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'revolutionslider_frames';
		
/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['revolutionslider_OUT'] = 'revolutionslider_data_animation_end,revolutionslider_data_easing_OUT,revolutionslider_data_speed_OUT,revolutionslider_data_start_OUT';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['revolutionslider_frames'] = 'revolutionslider_data_frames';

/**
 * Dynamically add the parent table
 */
if (\Contao\Input::get('do') == 'revolutionslider')
{
	$GLOBALS['TL_DCA']['tl_content']['config']['ptable'] = 'tl_revolutionslider_slides';
	$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('RevolutionSlider\Backend\TableContent', 'modifyDCA');
	
	// remove revolutionslider from cte list to avoid adding a rs as content
	unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider']);
		
	// remove cte from selection
	if($GLOBALS['REVOLUTIONSLIDER']['isBundledVersion'])
	{
		$arrAllowedCte = array('headline','text','image','hyperlink','revolutionslider_video');
		$arrAllowedIncludes = array();
		
		$arrAllowed = array_merge($arrAllowedCte,$arrAllowedIncludes);
		foreach($GLOBALS['TL_CTE'] as $node => $arrCte)
		{
			foreach($arrCte as $type => $class)
			{
				if(!in_array($type, $arrAllowed))
				{
					unset($GLOBALS['TL_CTE'][$node][$type]);
				}
			}
		}
	}
	
	// add slider palette on top of all available content elements
	foreach($GLOBALS['TL_DCA']['tl_content']['palettes'] as $cteType => $palette)
	{
		if( in_array($cteType, array('__selector__','revolutionslider')) || in_array($cteType, $GLOBALS['REVOLUTIONSLIDER']['cteIgnoreList']) )
		{
			continue;
		}
		$GLOBALS['TL_DCA']['tl_content']['palettes'][$cteType] = '{effect_legend:hide},revolutionslider_data_animation_start,revolutionslider_data_easing,revolutionslider_data_speed,revolutionslider_data_start,revolutionslider_OUT,revolutionslider_frames,{position_legend:hide},revolutionslider_data_pos9grid,revolutionslider_data_position,revolutionslider_data_position_m;{slide_legend:hide},revolutionslider_parallax,revolutionslider_visibility,revolutionslider_hideMobile;'.$palette;
	}
}
else
{
	$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
	if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) && \Contao\Input::get('do') == 'article')
	{
		// dont show the video cte outside the revolution slider backend
		unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_text']);
		unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_image']);
		unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_hyperlink']);
		unset($GLOBALS['TL_CTE']['revolutionslider_node']['revolutionslider_video']);
	}
}
	
/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'		  => array('RevolutionSlider\Backend\TableContent','getSliders'),
	'eval'                    => array('tl_class'=>'clr w50','insertBlankOption'=>true,'chosen'=>true),
	'wizard' => array
	(
		array('RevolutionSlider\Backend\TableContent', 'getEditSliderButton')
	),
	'sql'					  => "int(10) NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_easing'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_easing'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'		  => array('RevolutionSlider\Core\RevolutionSlider','getTransitionEasings'),
	'eval'                    => array('tl_class'=>'w50','chosen'=>true),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_speed'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_speed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "varchar(8) NOT NULL default '0.5'",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_start'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_start'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'default'				  => 0,
	'eval'                    => array('tl_class'=>'w50','rgxp'=>'digit'),
	'sql'					  => "varchar(4) NOT NULL default ''",
);
	
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_animation_start'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_animation_start'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'				  => 'fade',
	'options_callback'		  => array('RevolutionSlider\Core\RevolutionSlider','getStartAnimationClasses'),
	'reference'				  => $GLOBALS['TL_LANG']['revolutionSliderAnimationClasses'],
	'eval'                    => array('tl_class'=>'w50','chosen'=>true),
	'sql'					  => "varchar(32) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_animation_end'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_animation_end'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'				  => 'fadeout',
	'options_callback'		  => array('RevolutionSlider\Core\RevolutionSlider','getEndAnimationClasses'),
	'reference'				  => $GLOBALS['TL_LANG']['revolutionSliderAnimationClasses'],
	'eval'                    => array('tl_class'=>'clr w50','chosen'=>true),
	'sql'					  => "varchar(16) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_position'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_position'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'w50 clr'),
	'sql'					  => "varchar(96) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_position_m'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_position_m'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true, 'size'=>2, 'tl_class'=>'w50'),
	'sql'					  => "varchar(96) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_pos9grid'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_pos9grid'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'		  		  => array('left top','center top','right top','left center','center center','right center','left bottom','center bottom','right bottom'),
	'reference'				  => $GLOBALS['TL_LANG']['tl_revolutionslider_slides']['data_bgposition'],
	'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>true,'chosen'=>true),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_autoplay'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_autoplay'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_nextslideatend'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_nextslideatend'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_OUT'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_OUT'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr long','submitOnChange'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_videoType'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_videoType'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'default'				  => 'local',
	'options'				  => array('local','external'),
	'reference'				  => $GLOBALS['TL_LANG']['tl_content']['revolutionslider_videoType'],
	'eval'                    => array('submitOnChange'=>true,'chosen'=>true,'tl_class'=>'w50','includeBlankOption'=>true),
	'sql'					  => "varchar(16) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_controls'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_controls'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_loop'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_loop'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_size'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_size'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('multiple'=>true,'rgxp'=>'extnd', 'nospace'=>true, 'tl_class'=>'clr w50', 'size'=>2),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_video_aspect'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_aspect'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('16:9', '16:10', '21:9', '4:3', '3:2'),
	'eval'                    => array('includeBlankOption' => true, 'nospace'=>true, 'tl_class'=>'w50'),
	'sql'                     => "varchar(8) NOT NULL default ''"
);

// rs text element
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_text_bold'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_text_bold'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_text_italic'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_text_italic'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_text_fontsize'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_text_fontsize'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'default'				  => '14',
	'eval'                    => array('tl_class'=>'w50','multiple'=>true,'size'=>2,'rgxp'=>'digit'),
	'sql'					  => "varchar(128) NOT NULL default ''",
);

// OUT going animations
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_easing_OUT'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_easing'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'		  => array('RevolutionSlider\Core\RevolutionSlider','getTransitionEasings'),
	'eval'                    => array('tl_class'=>'w50','chosen'=>true),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_speed_OUT'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_speed'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50 clr','rgxp'=>'digit'),
	'sql'					  => "varchar(8) NOT NULL default '0.5'",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_start_OUT'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_start'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'w50','rgxp'=>'digit'),
	'sql'					  => "varchar(4) NOT NULL default ''",
);

// data-frames
$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_frames'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_frames'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'','submitOnChange'=>true,'decodeEntities'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_frames'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_frames'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('tl_class'=>'clr long'),
	'sql'					  => "mediumtext NULL",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['useSVG'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['useSVG'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'m12 w50'),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_visibility'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_visibility'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array(1,2),
	'reference'				  => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_visibility_ref'],
	'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_parallax'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_parallax'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => \range(1,30),
	'eval'                    => array('tl_class'=>'w50','includeBlankOption'=>true),
	'sql'					  => "char(2) NOT NULL default ''",
);