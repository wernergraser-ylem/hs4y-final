<?php
/**
 * Contao Open Source CMS
 * 
 * Copyright (C) Leo Feyer
 * 
 * @copyright	Tim Gatzky 2021, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_templates
 * @link		http://contao.org
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Environment;
use Contao\Input;
use Contao\System;
use Contao\TemplateLoader;

if( \version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
{
	// restore legacy templates
	$GLOBALS['TL_CTE']['texts']['code'] = \Contao\ContentCode::class;
	$GLOBALS['TL_CTE']['texts']['headline'] = \Contao\ContentHeadline::class;
	$GLOBALS['TL_CTE']['texts']['html'] = \Contao\ContentHtml::class;
	$GLOBALS['TL_CTE']['texts']['list'] = \Contao\ContentList::class;
	$GLOBALS['TL_CTE']['texts']['text'] = \Contao\ContentText::class;
	$GLOBALS['TL_CTE']['texts']['table'] = \Contao\ContentTable::class;
	$GLOBALS['TL_CTE']['links']['hyperlink'] = \Contao\ContentHyperlink::class;
	$GLOBALS['TL_CTE']['links']['toplink'] = \Contao\ContentToplink::class;
	$GLOBALS['TL_CTE']['media']['image'] = \Contao\ContentImage::class;
	$GLOBALS['TL_CTE']['media']['gallery'] = \Contao\ContentGallery::class;
	$GLOBALS['TL_CTE']['media']['player'] = \Contao\ContentPlayer::class;
	$GLOBALS['TL_CTE']['media']['youtube'] = \Contao\ContentYouTube::class;
	$GLOBALS['TL_CTE']['media']['vimeo'] = \Contao\ContentVimeo::class;
	$GLOBALS['TL_CTE']['files']['downloads'] = \Contao\ContentDownloads::class;
	$GLOBALS['TL_CTE']['files']['download'] = \Contao\ContentDownload::class;
	$GLOBALS['TL_CTE']['includes']['teaser'] = \Contao\ContentTeaser::class; 
}

function __addToTemplateLoader($folders)
{
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	foreach($folders as $folder)
	{
		$files = \glob($folder.'/*.html5');
		if( empty($files) === true)
		{
			continue;
		}
		foreach($files as $file)
		{
			TemplateLoader::addFile( str_replace('.html5','', \basename($file)) ,\str_replace($rootDir,'',$folder) );
		}
	}
}
	 
 // autoload theme files
 if( strlen(strpos(Environment::get('requestUri'), '/contao/install')) < 1 )
 {
	$rootDir = System::getContainer()->getParameter('kernel.project_dir');
	
	// deprecated as fallback
	$root = $rootDir.'/system/modules/pct_theme_templates/deprecated';
	$folders = \glob($root.'/*',GLOB_ONLYDIR);
	__addToTemplateLoader($folders);

	// element library templates
	$root = $rootDir.'/system/modules/pct_theme_templates/pct_templates/element_library';
	$folders = \glob($root.'/*',GLOB_ONLYDIR);
	__addToTemplateLoader($folders);

	// load specific templates only when needed
	// demo-installer	
	if( Input::get('do') == 'pct_demoinstaller' )
	{
		$root = $rootDir.'/system/modules/pct_theme_templates/pct_templates';
		$folders = \glob($root.'/*',GLOB_ONLYDIR);
		__addToTemplateLoader($folders);
	}
	// customelements template import
	else if( Input::get('do') == 'pct_customelements' && Input::get('key') == 'import' )
	{
		$root = $rootDir.'/system/modules/pct_theme_templates/pct_templates';
		$folders = \glob($root.'/*',GLOB_ONLYDIR);
		__addToTemplateLoader($folders);
	}
	
	
 }
 