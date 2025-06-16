<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
 * @link		http://contao.org
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\System;

if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	include( $rootDir.'/system/modules/pct_revolutionslider/config/autoload.php' );
}

/**
 * Constants
 */
define('REVOLUTIONSLIDER_VERSION', '6.0.6');
define('REVOLUTIONSLIDER_PATH', 'system/modules/pct_revolutionslider');



/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['content']['revolutionslider'] = array
(
	'tables' 		=> array('tl_revolutionslider','tl_revolutionslider_slides','tl_content'),
	'icon'   		=> REVOLUTIONSLIDER_PATH.'/assets/img/icon.gif',
);

/**
 * Content elements
 */
$GLOBALS['TL_CTE']['revolutionslider_node'] = array
(
	'revolutionslider' 			=> 'RevolutionSlider\Frontend\ContentRevolutionSlider',
	'revolutionslider_text'		=> 'RevolutionSlider\Frontend\ContentRevolutionSliderText',
	'revolutionslider_video'	=> 'RevolutionSlider\Frontend\ContentRevolutionSliderVideo',
	'revolutionslider_image'	=> 'RevolutionSlider\Frontend\ContentRevolutionSliderImage',
	'revolutionslider_hyperlink'=> 'RevolutionSlider\Frontend\ContentRevolutionSliderHyperlink',
);

/**
 * Register the model classes
 */
$GLOBALS['TL_MODELS']['tl_revolutionslider'] 		= 'RevolutionSlider\Models\Slider';
$GLOBALS['TL_MODELS']['tl_revolutionslider_slides'] = 'RevolutionSlider\Models\Slides';

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] 			= array('RevolutionSlider\Core\InsertTags', 'replaceTags');

/**
 * Add permissions
 */
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionsliders';
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionslidersp';
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionslider_slides';
$GLOBALS['TL_PERMISSIONS'][] = 'revolutionslider_slidesp';

/**
 * Globals
 */
$GLOBALS['REVOLUTIONSLIDER']['isBundledVersion']		= false;	// just toggles between a couple features
$GLOBALS['REVOLUTIONSLIDER']['cteIgnoreList'] 			= array();	// custom ignore list
$GLOBALS['REVOLUTIONSLIDER']['allowedContentElements']  = array('revolutionslider_text','revolutionslider_image','revolutionslider_hyperlink','revolutionslider_video');
$GLOBALS['REVOLUTIONSLIDER']['TRANSITIONS']				= array();	// add more transitions
$GLOBALS['REVOLUTIONSLIDER']['EASINGS']					= array();	// add more easing equations
$GLOBALS['REVOLUTIONSLIDER']['ANIMATIONS']['START']		= array();	// add more animation classes
$GLOBALS['REVOLUTIONSLIDER']['ANIMATIONS']['END']		= array();	// add more animation classes
$GLOBALS['REVOLUTIONSLIDER']['alwaysShowPos9Grid']		= false;	// set to true to enable the relative position option for any content element
$GLOBALS['REVOLUTIONSLIDER']['scriptPath']				= 'files/cto_layout/scripts/revolution';
// mapping animation to data-frames json 
$GLOBALS['REVOLUTIONSLIDER']['FRAMES'] = array
(
	'skewfromleftshort' => '{"delay":0,"speed":300,"frame":"0","from":"x:-200px;skX:85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'skewfromrightshort' => '{"delay":0,"speed":300,"frame":"0","from":"x:200px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'skewfromleft' => '{"delay":0,"speed":300,"frame":"0","from":"x:left;skX:45px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'skewfromright' => '{"delay":0,"speed":300,"frame":"0","from":"x:right;skX:-85px;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'randomrotate' => '{"delay":0,"speed":300,"frame":"0","from":"x:{-250,250};y:{-150,150};rX:{-90,90};rY:{-90,90};rZ:{-360,360};sX:0;sY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	// short from left
	'sfl' => '{"delay":0,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	// short from right
	'sfr' => '{"delay":0,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}',
	// short from top
	'sft' => '{"delay":0,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	// short from bottom
	'sfb' => '{"delay":0,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}',
	// long from left
	'lfl' => '{"delay":0,"speed":300,"frame":"0","from":"x:left;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	// long from right
	'lfr' => '{"delay":0,"speed":300,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	// long from top
	'lft' => '{"delay":0,"speed":300,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	// long from bottom
	'lfb' => '{"delay":0,"speed":300,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'fade' => '{"delay":0,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'letterflybottom' => '{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'letterflyleft' => '{"delay":0,"split":"chars","splitdelay":0.1,"speed":2000,"frame":"0","from":"x:[-105%];z:0;rX:0deg;rY:0deg;rZ:-90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'letterflyright' => '{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'letterflytop' => '{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'maskedzoomout' => '{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'popupsmooth' => '{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'rotatefrombottom' => '{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rZ:90deg;sX:2;sY:2;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'rotatefromzero' => '{"delay":0,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'slidemaskfrombottom' => '{"delay":0,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'slidemaskfromleft' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'slidemaskfromright' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'slidemaskfromtop' => '{"delay":0,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'popupsmooth1' => '{"delay":0,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'popupsmooth2' => '{"delay":0,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'smoothmaskfromright' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'smoothmaskfromleft' => '{"delay":0,"speed":1500,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'smoothslidefrombottom' => '{"delay":0,"speed":2000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
	'no_animation' => '{"delay":0,"speed":300,"frame":"0","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}',
);
$GLOBALS['REVOLUTIONSLIDER']['NAVIGATION_TYPES'] = array
(
	'bullets' => array
	(
		'bullets_hesperiden',
		'bullets_gyges',
		'bullets_hades',
		'bullets_ares',
		'bullets_hebe',
		'bullets_hermes',
		'bullets_hephaistos',
		'bullets_persephone',
		'bullets_erinyen',
		'bullets_zeus',
		'bullets_metis',
		'bullets_dione',
		'bullets_uranus'
	),
	'tabs' => array
	(
		'tabs_hesperiden',
		'tabs_gyges',
		'tabs_hades',
		'tabs_ares',
		'tabs_hebe',
		'tabs_hermes',
		'tabs_erinyen',
		'tabs_zeus',
		'tabs_metis',
	),
	'thumbs' => array
	(
		'thumbs_hesperiden',
		'thumbs_gyges',
		'thumbs_hades',
		'thumbs_erinyen',
		'thumbs_zeus',
	),
);
$GLOBALS['REVOLUTIONSLIDER']['ARROW_STYLES'] = array
(
	'hesperiden',
	'gyges',
	'hades',
	'ares',
	'hebe',
	'hermes',
	'hephaistos',
	'persephone',
	'erinyen',
	'zeus',
	'metis',
	'uranus'
);
// thumbnail sizes
// $GLOBALS['REVOLUTIONSLIDER']['THUMBNAIL_SIZES'] = array(250,250,'center_center');
// $GLOBALS['REVOLUTIONSLIDER']['THUMBNAIL_SIZES_TABS'] = array(180,100,'center_center');