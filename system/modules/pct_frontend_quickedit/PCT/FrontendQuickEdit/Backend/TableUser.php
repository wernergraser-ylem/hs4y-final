<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_autogrid
 * @link		http://contao.org
 */

 
/**
 * Namespace
 */
namespace PCT\FrontendQuickEdit\Backend;

use Contao\Backend;
use Contao\Config;
use Contao\Input;
use Contao\Message;
use Contao\System;

/**
 * Class
 * TableUser
 */
class TableUser extends Backend
{
	/**
	 * Modify the DCA
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if ( Input::get('do') != 'login' )
		{
			return;
		}

		// show ThemeDesigner hint and set checkbox to readonly
		$bundles = array_keys(System::getContainer()->getParameter('kernel.bundles'));
		if( \in_array('pct_themer', $bundles) && (boolean)Config::get('pct_themedesigner_hidden') === false )
		{
			Message::addError( \sprintf('<a href="'.$this->addToUrl('do=pct_themedesigner',true,array('act','id')).'" title="%s">%s</a>', $GLOBALS['TL_LANG']['PCT_FRONTEND_QUICKEDIT']['themedesigner_active_error'], $GLOBALS['TL_LANG']['PCT_FRONTEND_QUICKEDIT']['themedesigner_active_error']) );
			$GLOBALS['TL_DCA']['tl_user']['fields']['pct_frontend_quickedit']['eval']['disabled'] = true;
		}
	}
}
