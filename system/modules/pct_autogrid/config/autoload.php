<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2019 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

// path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/pct_autogrid';

/**
 * Register the classes
 */
$classMap = array
(
	'PCT\AutoGrid\Core' 					=> $path.'/PCT/AutoGrid/Core.php',
	'PCT\AutoGrid\Controller' 				=> $path.'/PCT/AutoGrid/Controller.php',
	'PCT\AutoGrid\ContaoCallbacks' 			=> $path.'/PCT/AutoGrid/ContaoCallbacks.php',
	'PCT\AutoGrid\DcaHelper' 				=> $path.'/PCT/AutoGrid/DcaHelper.php',
	'PCT\AutoGrid\ContentAutoGridRow' 		=> $path.'/PCT/AutoGrid/ContentAutoGridRow.php',
	'PCT\AutoGrid\ContentAutoGridCol' 		=> $path.'/PCT/AutoGrid/ContentAutoGridCol.php',
	'PCT\AutoGrid\ContentAutoGridGrid' 		=> $path.'/PCT/AutoGrid/ContentAutoGridGrid.php',
	'PCT\AutoGrid\WidgetAutoGridRow' 		=> $path.'/PCT/AutoGrid/WidgetAutoGridRow.php',
	'PCT\AutoGrid\WidgetAutoGridCol' 		=> $path.'/PCT/AutoGrid/WidgetAutoGridCol.php',
	'PCT\AutoGrid\GridPreset' 				=> $path.'/PCT/AutoGrid/GridPreset.php',
	'PCT\AutoGrid\Backend\PageGridPreset' 	=> $path.'/PCT/AutoGrid/Backend/PageGridPreset.php',
	'PCT\AutoGrid\Models\ContentModel' 		=> $path.'/PCT/AutoGrid/Models/ContentModel.php',
	'PCT\AutoGrid\Models\FormFieldModel' 	=> $path.'/PCT/AutoGrid/Models/FormFieldModel.php',
	'PCT\AutoGrid\Backend\TableContent' 	=> $path.'/PCT/AutoGrid/Backend/TableContent.php',
	'PCT\AutoGrid\Backend\TableFormField' 	=> $path.'/PCT/AutoGrid/Backend/TableFormField.php',
	'PCT\AutoGrid\Backend\TableModule' 		=> $path.'/PCT/AutoGrid/Backend/TableModule.php',
	'PCT\AutoGrid\Backend\TableArticle' 	=> $path.'/PCT/AutoGrid/Backend/TableArticle.php',
	'PCT\AutoGrid\Backend\TableUser' 		=> $path.'/PCT/AutoGrid/Backend/TableUser.php',
	'PCT\AutoGrid\Backend\BackendIntegration'=> $path.'/PCT/AutoGrid/Backend/BackendIntegration.php',
);

$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();

/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'ce_autogrid_row'						=> 'system/modules/pct_autogrid/templates',
	'ce_autogrid_col'						=> 'system/modules/pct_autogrid/templates',
	'ce_autogrid_grid'						=> 'system/modules/pct_autogrid/templates',
	'form_autogrid_row'						=> 'system/modules/pct_autogrid/templates',
	'form_autogrid_col'						=> 'system/modules/pct_autogrid/templates',
	'autogrid'      						=> 'system/modules/pct_autogrid/templates',
	'be_autogrid_wildcard'					=> 'system/modules/pct_autogrid/templates/backend',
	'be_autogrid_infobox'					=> 'system/modules/pct_autogrid/templates/backend',
	'be_js_autogrid'						=> 'system/modules/pct_autogrid/templates/backend',
	'be_autogrid_buttons'					=> 'system/modules/pct_autogrid/templates/backend',
	'be_page_grid_preset'					=> 'system/modules/pct_autogrid/templates/backend',
	'be_mod_grid_preview'					=> 'system/modules/pct_autogrid/templates/backend',
	'be_autogrid_row'						=> 'system/modules/pct_autogrid/templates/backend',
	'be_autogrid_col'						=> 'system/modules/pct_autogrid/templates/backend',
	'be_autogrid_grid'						=> 'system/modules/pct_autogrid/templates/backend',
	'be_autogrid_viewport_panel'			=> 'system/modules/pct_autogrid/templates/backend',
));