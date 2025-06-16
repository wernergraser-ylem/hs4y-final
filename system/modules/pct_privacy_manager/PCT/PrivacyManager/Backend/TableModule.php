<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2019
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_privacy_manager
 * @link  http://contao.org
 */
 

/**
 * Namespace
 */
namespace PCT\PrivacyManager\Backend;

/**
 * Class file
 * TableModule
 */
class TableModule extends \Contao\Backend
{
	/**
	 * Remove the autogrid fields in autogrid_wrapper elements
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = \Contao\ModuleModel::findByPk($objDC->id);
		}
		
		if($objDC->activeRecord !== null && $objDC->activeRecord->type == 'privacy_in')
		{
			// show backend info about log file
			if(\Contao\Input::get('act') == 'edit')
			{
				\Contao\Message::addInfo($GLOBALS['TL_LANG']['PCT_THEME_SETTINGS']['MESSAGES']['privacyLogFileInfo']);
			}
			
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['html']['label'] = &$GLOBALS['TL_LANG'][$objDC->table]['privacy_information'];
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['html']['eval'] = array('rte'=>'tinyMCE', 'helpwizard'=>true);
			
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['label'] = &$GLOBALS['TL_LANG'][$objDC->table]['privacy_template'];
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['default'] = 'mod_privacy_default';
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['options_callback'] = array(get_class($this), 'getPrivacyTemplates');
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['eval']['includeBlankOption'] = false;
		}
	}


	/**
	 * Return the privacy templates: mod_privacy_
	 * @return array
	 */
	public function getPrivacyTemplates()
	{
		return $this->getTemplateGroup('mod_privacy_');
	}
}