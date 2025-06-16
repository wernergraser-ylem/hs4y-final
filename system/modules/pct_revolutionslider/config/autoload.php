<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Revolutionslider
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_revolutionslider';


/**
 * Register the classes
 */
$classMap = array
(
	// RevolutionSlider
	'RevolutionSlider\Backend\TableContent'                  => $path.'/RevolutionSlider/Backend/TableContent.php',
	'RevolutionSlider\Backend\TableRevolutionSlider'         => $path.'/RevolutionSlider/Backend/TableRevolutionSlider.php',
	'RevolutionSlider\Backend\TableRevolutionSliderSlides'   => $path.'/RevolutionSlider/Backend/TableRevolutionSliderSlides.php',
	'RevolutionSlider\Backend\TableUserGroup'                => $path.'/RevolutionSlider/Backend/TableUserGroup.php',
	'RevolutionSlider\Core\Factory'                          => $path.'/RevolutionSlider/Core/Factory.php',
	'RevolutionSlider\Core\InsertTags'                       => $path.'/RevolutionSlider/Core/InsertTags.php',
	'RevolutionSlider\Core\RevolutionSlider'                 => $path.'/RevolutionSlider/Core/RevolutionSlider.php',
	'RevolutionSlider\Core\Slide'                            => $path.'/RevolutionSlider/Core/Slide.php',
	'RevolutionSlider\Core\SlideFactory'                     => $path.'/RevolutionSlider/Core/SlideFactory.php',
	'RevolutionSlider\Frontend\ContentRevolutionSlider'      => $path.'/RevolutionSlider/Frontend/ContentRevolutionSlider.php',
	'RevolutionSlider\Frontend\ContentRevolutionSliderVideo' => $path.'/RevolutionSlider/Frontend/ContentRevolutionSliderVideo.php',
	'RevolutionSlider\Frontend\ContentRevolutionSliderText'  => $path.'/RevolutionSlider/Frontend/ContentRevolutionSliderText.php',
	'RevolutionSlider\Frontend\ContentRevolutionSliderImage' => $path.'/RevolutionSlider/Frontend/ContentRevolutionSliderImage.php',
	'RevolutionSlider\Frontend\ContentRevolutionSliderHyperlink' => $path.'/RevolutionSlider/Frontend/ContentRevolutionSliderHyperlink.php',
	'RevolutionSlider\Models\Slider'						 => $path.'/RevolutionSlider/Models/Slider.php',
	'RevolutionSlider\Models\Slides'						 => $path.'/RevolutionSlider/Models/Slides.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();


/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'ce_revolutionslider'       => 'system/modules/pct_revolutionslider/templates',
	'ce_revolutionslider_video' => 'system/modules/pct_revolutionslider/templates',
	'ce_revolutionslider_text'	=> 'system/modules/pct_revolutionslider/templates',
	'ce_revolutionslider_image'	=> 'system/modules/pct_revolutionslider/templates',
	'ce_revolutionslider_hyperlink'	=> 'system/modules/pct_revolutionslider/templates',
	'js_revoslider_default'     => 'system/modules/pct_revolutionslider/templates',
	'revoslider_default'        => 'system/modules/pct_revolutionslider/templates',
));
