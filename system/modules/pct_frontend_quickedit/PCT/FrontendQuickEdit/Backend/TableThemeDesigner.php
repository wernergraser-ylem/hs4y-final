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
use Contao\BackendUser;
use Contao\Config;
use Contao\Input;
use Contao\Message;

/**
 * Class
 * TableUser
 */
class TableThemeDesigner extends Backend
{
	public function __construct()
	{
		parent::__construct();
		$this->import(BackendUser::class, 'User');	
	}

	/**
	 * Modify the DCA
	 * @param object
	 */
	public function modifyDCA($objDC)
	{
		if( $this->User->pct_frontend_quickedit && (boolean)Config::get('pct_themedesigner_hidden') === false )
		{
			Message::addInfo($GLOBALS['TL_LANG']['PCT_FRONTEND_QUICKEDIT']['themedesigner_active_info']);
		}
	}
}
