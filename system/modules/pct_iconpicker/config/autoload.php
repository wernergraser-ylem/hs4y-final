<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Pct_iconpicker
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_iconpicker';

/**
 * Register the classes
 */
$classMap = array
(
	'PCT\IconPicker\IconPicker' 			=> $path.'/PCT/IconPicker/IconPicker.php',
	'PCT\IconPicker\ContaoCallbacks' 		=> $path.'/PCT/IconPicker/ContaoCallbacks.php',
	'PCT\IconPicker\IconPickerFactory' 		=> $path.'/PCT/IconPicker/IconPickerFactory.php',
	'PCT\IconPicker\IconPickerWidget' 		=> $path.'/PCT/IconPicker/IconPickerWidget.php',
	'PCT\IconPicker\Backend\TableFormField'  => $path.'/PCT/IconPicker/Backend/TableFormField.php',
	'PCT\IconPicker\Backend\TableContent' 	=> $path.'/PCT/IconPicker/Backend/TableContent.php',
	'PCT\IconPicker\Backend\TableCustomElementAttribute' 	=> $path.'/PCT/IconPicker/Backend/TableCustomElementAttribute.php',	
	'PCT\IconPicker\AttributeIconPicker'	=> $path.'/PCT/IconPicker/AttributeIconPicker.php',
	'PCT\IconPicker\Backend\PageIconPicker' => $path.'/PCT/IconPicker/Backend/PageIconPicker.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();


/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'be_iconpicker' 					=> 'system/modules/pct_iconpicker/templates',
	'be_widget_iconpicker' 				=> 'system/modules/pct_iconpicker/templates',
));
