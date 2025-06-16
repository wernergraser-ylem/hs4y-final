<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2019
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_theme_settings
 * @link		http://contao.org
 */
 

/**
 * Namespace
 */
namespace PCT\ThemeSettings\Backend;

use Contao\ArrayUtil;
use Contao\BackendTemplate;
use Contao\Backend;
use Contao\BackendUser;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\Environment;
use Contao\PageModel;
use Contao\StringUtil;
use Contao\ContentModel;
use Contao\System;
use Contao\Image;
use Contao\Input;
use Contao\Model;
use Contao\Versions;

/**
 * Class file
 * TableContent
 */
class TableContent extends Backend
{
	/**
	 * Include theme settings fields in active palettes
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = ContentModel::findByPk($objDC->id);
		}

		// insert content element set operaion button
		$objContentElementSet = new \PCT\ThemeSettings\ContentElementSet;
		$arrContentElements = $objContentElementSet->getContentElementSets();
		if(!empty($arrContentElements))
		{
			$tmp = array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['new_contentelementset'],
				'icon'				  => 'system/modules/pct_theme_settings/assets/img/new_set.svg',
				'href'                => 'act=paste&amp;mode=create&amp;rkey=contentelementset',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'	
			);
			
			$pos = 1;
			
			$skip = array('revolutionslider');
			if( !\in_array(Input::get('do'), $skip) )
			{
				ArrayUtil::arrayInsert($GLOBALS['TL_DCA'][$objDC->table]['list']['global_operations'],$pos,array('contentelementset'=>$tmp));
			}
		}

		// redirect to key=contentelementset after user clicked the paste button
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			if( \Contao\Input::get('rkey') == 'contentelementset' && \Contao\Input::get('act') == 'create')
			{
				\Contao\Controller::redirect( \Contao\Controller::addToUrl('rkey=&amp;key=contentelementset&rt='.\Contao\Input::get('rt')) );
			}

			// Content element set export has been called, redirect to export page
			if( (boolean)\Contao\Config::get('contentelementset_export') === true && \Contao\Input::post('contentelementset_export') != '' && !empty($_POST['IDS']))
			{
				// store the selected element ids in the session
				$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
				$objSession->set( 'contentelementset_export_ids',\Contao\Input::post('IDS') );
				
				$_SESSION['contentelementset_export_ids'] = \Contao\Input::post('IDS');
				
				// redirect to the export interface	
				\Contao\Controller::redirect( \Contao\Controller::addToUrl('key=contentelementset_export&rt='.\Contao\Input::get('rt')) );
			}
		}

		// append fields in multi edit mode
		if( in_array( Input::get('act'), array('editAll','overrideAll'))  )
		{
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
			$arrSession = $objSession->all();
			
			if( isset($arrSession['CURRENT']) && isset($arrSession['CURRENT']['IDS']) )
			{
				$objModels = ContentModel::findMultipleByIds( $arrSession['CURRENT']['IDS'] );
				if( $objModels !== null )
				{
					$arrProcessed = array();
					foreach( $objModels as $objModel )
					{
						if( \in_array($objModel->type, $arrProcessed) )
						{
							continue;
						}

						$fields = array('animation_type','animation_speed','animation_delay','visibility_css','helper_css','margin_t','margin_t_m','margin_b','margin_b_m');
						$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objModel->type] .= ','.implode(',',$fields);		
							
						// load options by type
						foreach(array('style','color','border','format') as $k)
						{
							if( isset($GLOBALS['PCT_THEME_SETTINGS'][$k.'_classes::'.$objModel->type]) )
							{
								$GLOBALS['TL_DCA'][$objDC->table]['fields'][$k.'_css']['options'] = $GLOBALS['PCT_THEME_SETTINGS'][$k.'_classes::'.$objModel->type];
							}
						}
						
						$arrProcessed[] = $objModel->type;
					}
				}
			}
			unset($arrProcessed);
		}

		// visibility_css
		$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'] = \str_replace('stop','stop,visibility_css',$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default']);		
		
		// helper_css
		$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'] = \str_replace('cssID','cssID,helper_css',$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default']);		
		
		// animation classes 
		$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'] = \str_replace('customTpl','customTpl,{animation_settings:hide},animation_type,animation_speed,animation_delay;',$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default']);		
		
		if( isset($objDC->activeRecord->type) && !empty($objDC->activeRecord->type) )
		{
			// load options by type
			foreach(array('style','color','border','format') as $k)
			{
				if( isset($GLOBALS['PCT_THEME_SETTINGS'][$k.'_classes::'.$objDC->activeRecord->type]) )
				{
					$GLOBALS['TL_DCA'][$objDC->table]['fields'][$k.'_css']['options'] = $GLOBALS['PCT_THEME_SETTINGS'][$k.'_classes::'.$objDC->activeRecord->type];
				}
			} 
			
			// table has different style classes
			if($objDC->activeRecord->type == 'table')
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['style_css']['eval']['tl_class'] .= ' clr';
			}
			else if($objDC->activeRecord->type == 'list')
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['listtype']['eval']['tl_class'] .= ' w50';
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['listitems']['eval']['tl_class'] .= ' clr';
			}
			else if($objDC->activeRecord->type == 'text')
			{
			}
			else if($objDC->activeRecord->type == 'hyperlink')
			{
			}
			else if($objDC->activeRecord->type == 'headline')
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['align_css']['eval']['tl_class'] .= ' clr';
			}
			else if($objDC->activeRecord->type == 'image')
			{
				$GLOBALS['TL_DCA'][$objDC->table]['fields']['align_css']['eval']['tl_class'] .= ' clr';
			}
			else if($objDC->activeRecord->type == 'accordionSingle' || $objDC->activeRecord->type == 'accordionStart')
			{
				unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['style_css']['eval']['includeBlankOption']);
			}

			if( isset($GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]) )
			{
				// visibility_css
				$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = \str_replace('stop','stop,visibility_css',$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]);
				// helper_css, margins
				$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = \str_replace('cssID','cssID,helper_css,margin_t,margin_b,margin_t_m,margin_b_m',$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]);
				// animation classes
				$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type] = \str_replace('customTpl;','customTpl;{animation_settings:hide},animation_type,animation_speed,animation_delay;',$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$objDC->activeRecord->type]);
			}
		}
	}


	/**
	 * Return the theme helper classes
	 * @param object
	 * @return array
	 */
	public function getThemeHelperClasses($objDC=null)
	{
		$arrReturn = array();
		if( isset($GLOBALS['PCT_THEME_SETTINGS']['helper_classes'][$objDC->table]) && !empty($GLOBALS['PCT_THEME_SETTINGS']['helper_classes'][$objDC->table]) )
		{
			$arrReturn = $GLOBALS['PCT_THEME_SETTINGS']['helper_classes'][$objDC->table];
		}

		return $arrReturn;
	}


	/**
	 * Enable viewport panel
	 */
	public function enableViewportPanel()
	{
		$GLOBALS['PCT_THEME_SETTINGS']['includeViewport'] = true;
	}


	/**
	 * Add the set export button to the multi select formular buttons
	 * @param array
	 * @return array
	 * Called from buttons_callback Hook
	 */
	public function buttonsCallback($arrButtons)
	{
		$objUser = BackendUser::getInstance();
		if(!$objUser->isAdmin || (boolean)\Contao\Config::get('contentelementset_export') === false)
		{
			return $arrButtons;
		}
		
		$arrButtons['contentelementset_export'] = '<input type="submit" name="contentelementset_export" id="contentelementset_export" class="tl_submit contentelementset_export" accesskey="e" value="'.$GLOBALS['TL_LANG']['MSC']['contentelementsets_export'].'">';
		
		return $arrButtons;
	}


	/**
	 * Export the selected content elements
	 * @param object
	 * Called from loadDataContainer Hook
	 */
	public function exportElements($strTable)
	{
		if($strTable != 'tl_content' || empty($_POST['IDS']) || \Contao\Input::post('contentelementset_export') === null ||  \Contao\Input::post('contentelementset_export') == '' )
		{
			return;
		}
		
		$objContentModels = \Contao\ContentModel::findMultipleByIds( \Contao\Input::post('IDS') );
		if($objContentModels === null)
		{
			return;
		}
		
		// find all installed content element CustomElements
		$arrCustomElements = \PCT\CustomElements\Core\CustomElements::getInstance()->getCustomElements($strTable);
		
		$arrExport = array();
		foreach($objContentModels as $objModel)
		{
			$arrRow = $objModel->row();
			
			$arrExport['tl_content'][] = $arrRow;
			
			// tl_pct_customelement_vault
			if(in_array($objModel->type,$arrCustomElements))
			{
				$arrWizardData = \PCT\CustomElements\Core\Vault::getWizardData($objModel->id,$strTable);
				if(!empty($arrWizardData))
				{
					$arrExport['tl_pct_customelement_vault'][] = $arrWizardData;
				}
			}
		}
	}


	/**
	 * Append the themesettings button to the opertaions list
	 * @param object
	 * called from onload_callback
	 */
	public function addThemeSettingsButton($objDC)
	{
		ArrayUtil::arrayInsert($GLOBALS['TL_DCA'][$objDC->table]['list']['operations'],count($GLOBALS['TL_DCA'][$objDC->table]['list']['operations'] ?? array()),array
		(
			'theme_settings' => array
			(
				'href'                => 'act=edit',
				'icon'                => 'system/modules/pct_theme_settings/assets/img/margins.svg',
				'title' 			  => $GLOBALS['TL_LANG']['theme_settings'] ?? 'theme_settings',
				'button_callback'     => array(\get_class($this), 'themeSettingsButton'),
			))
		);
	}


	/**
	 * Return the theme settings button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * 
	 * @return string
	 */
	public function themeSettingsButton($row, $href, $label, $title, $icon, $attributes)
	{
		$security = System::getContainer()->get('security.helper');

		if (!$security->isGranted(ContaoCorePermissions::USER_CAN_EDIT_FIELDS_OF_TABLE, 'tl_content'))
		{
			return Image::getHtml(preg_replace('/\.svg$/i', '_.svg', $icon)) . ' ';
		}

		if( isset($GLOBALS['TL_LANG']['theme_settings']) )
		{
			$title = $GLOBALS['TL_LANG']['theme_settings'];
		}

		$objThemeSettingsButton = new BackendTemplate('be_content_themesettingsbutton');
		$objThemeSettingsButton->setData( $row );

		return '<a href="' . $this->addToUrl($href . '&amp;id=' . $row['id']) . '" title="' . StringUtil::specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label) . $objThemeSettingsButton->parse(); '</a> ';
	}

	
	/*
	* Toggle theme settings field ajax listener
	* @param object
	*/
	public function toggleThemeSettingsFieldValue($objDC)
	{
		if( (boolean)Environment::get('isAjaxRequest') === false || (int)Input::post('elem') < 1 || Input::post('action') != 'toggleThemeSettingsFieldValue' )
		{
			return;
		}

		$intId = (int)Input::post('elem');
		$varValue =  Input::post('state');
		$strField = Input::post('field');
		
		$arrFields = \explode(',',$strField);
		$arrValues = \explode(',',$varValue);
		
		// @var object Version
		$objVersions = new Versions($objDC->table, $intId );
		$objVersions->initialize();
 	
		// @var object
		$objModel = Model::getClassFromTable($objDC->table)::findByPk( $intId  );
		
		foreach($arrFields as $i => $strField)
		{
			$varValue = $arrValues[$i] ?? '';
			// update the record
		
			// Trigger the save_callback
			if ( isset($GLOBALS['TL_DCA'][$objDC->table]['fields'][$strField]['save_callback']) && is_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$strField]['save_callback']))
			{
				foreach ($GLOBALS['TL_DCA'][$objDC->table]['fields'][$strField]['save_callback'] as $callback)
				{
					$varValue = System::importStatic($callback[0])->{$callback[1]}($varValue,$objDC);
				}
			}

			$objModel->__set('tstamp', time() );
			$objModel->__set($strField,$varValue);
			$objModel->save();
		}
	   // create new version
	   $objVersions->create();
   }


   /**
	* Handle POST ajax actions
	* @param stirng
	* @param object
    */
   public function executePostActionsCallback($strAction, $objDC)
   {
		if( $strAction == 'toggleThemeSettingsFieldValue' )
		{
			$this->toggleThemeSettingsFieldValue($objDC);
		}
   }
}