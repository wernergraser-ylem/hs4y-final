<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

/**
 * Imports
 */

use Contao\BackendUser;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\Database;
use Contao\Environment;
use Contao\StringUtil;
use Contao\System;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory as AttributeFactory;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Helper\InstallerHelper;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage;

/**
 * Class BackendIntegration
 */
class BackendIntegration extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import(\Contao\BackendUser::class, 'User');
	}

	
	/**
	 * Load styles in backend
	 * called from loadDataContainer HOOK
	 */
	public function loadAssets()
	{
		if( Controller::isBackend() )
		{
			$GLOBALS['TL_CSS'][] = PCT_CUSTOMCATALOG_PATH.'/assets/css/styles.css';
			$GLOBALS['TL_JAVASCRIPT'][] = PCT_CUSTOMCATALOG_PATH.'/assets/js/be_scripts.js';
		}
	}
	

//! Quickmenu	
	
	/**
	 * Inject the quickmenu
	 * @param array
	 * @param boolean
	 * @return array
	 *
	 * called from $GLOBALS['TL_HOOKS']['getUserNavigation']
	 */
	public function injectQuickmenuInUserNavigation($arrModules, $blnShowAll)
	{
		if( version_compare(PCT_CUSTOMELEMENTS_VERSION, PCT_CUSTOMCATALOG_REQ_CE,'<') || !\Contao\Database::getInstance()->tableExists('tl_pct_customcatalog') || \Contao\System::getContainer()->getParameter('kernel.environment') == 'dev' )
		{
			return $arrModules;
		}

		$objUser = \Contao\BackendUser::getInstance();
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		if( $objUser === null || !$objUser->isAdmin || !$objSecurity->isGranted('contao_user.pct_customcatalogsp.create') )
		{
			return $arrModules;
		}
		
		$objCC_Models = CustomCatalogFactory::fetchAllActive();
		if($objCC_Models === null)
		{
			return $arrModules;
		}
		
		// count the number of configurations
		$arrCount = \PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::getConfigCount();
		
		foreach($objCC_Models as $objDbCCs)
		{
			$objCE = CustomElementFactory::findById($objDbCCs->pid);
			if($objCE === null || !$objDbCCs->showMenu)
			{
				continue;
			}
			
			$strTable = ( $objDbCCs->mode == 'new' ? $objDbCCs->tableName : $objDbCCs->existingTable );
			$sectionAlias = $objDbCCs->beSection;
			$intConfig = $objDbCCs->id;
			
			$strAlias =\PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::getBackendModuleAlias($objDbCCs->id);	
			
			if($objDbCCs->newSection)
			{
				$sectionAlias = $objDbCCs->sectionAlias;
			}
			
			if(!isset($arrModules[$sectionAlias]['modules']) || !is_array($arrModules[$sectionAlias]['modules']))
			{
				continue;
			}
			
			$modules = array();
			foreach($arrModules[$sectionAlias]['modules'] as $i => $module)
			{
				if(!is_array($module['tables']))
				{
					$modules[$i] = $module;
					continue;
				}
				
				if(!in_array($strTable, $module['tables']))
				{
					$modules[$i] = $module;
					continue;
				}
				
				$label = $module['label'];
				
				$objTemplate = new \Contao\BackendTemplate('be_cc_quickmenu');
				$objTemplate->config = $intConfig;
				$objTemplate->alias = $strAlias;
				$objTemplate->menu = \HashInsertTags::getInstance()->replaceHashInsertTags('###be_cc_navigation::'.$strAlias.'::'.$intConfig.'###');
				
				$strMenu = trim( $objTemplate->parse() );
				
				// store menu in Global for further usage
				$GLOBALS['CC_QUICKMENU'][$intConfig] = array
				(
					'config' => $intConfig,
					'alias' => $strAlias,
					'html' => $strMenu,
				);
				
				$module['class'] = 'navigation customcatalog item contao_'.str_replace('.','', ContaoCoreBundle::getVersion() ).' '.$strAlias;
				$module['label'] = $label.'###be_cc_navigation::'.$strAlias.'::'.$intConfig.'###';
				
				#$modules[$i.'_ccmenu'] = $arrMenu;
				$modules[$i] = $module;
			}
			$arrModules[$sectionAlias]['modules'] = $modules;
		}
		
		return $arrModules;
	}


	/**
	 * Replace the quickmenu token in the backend template
	 * @param string
	 * @param string
	 * @return string
	 *
	 * called from $GLOBALS['TL_HOOKS']['parseBackendTemplate']
	 */
	public function replaceQuickmenuInserttag($strBuffer, $strTemplate)
	{
		if( $strTemplate == 'be_main' && empty($GLOBALS['CC_QUICKMENU']) === false && \is_array($GLOBALS['CC_QUICKMENU'])  )
		{
			foreach($GLOBALS['CC_QUICKMENU'] as $arr)
			{
				#$arr['html'] = '</a>'.$arr['html'].'';
				$strBuffer = str_replace('###be_cc_navigation::'.$arr['alias'].'::'.$arr['config'].'###',$arr['html'],$strBuffer);
			}
		}
		return $strBuffer;
	}

	
	/**
	 * Return the url ob the backend without any parameters
	 * @return string
	 */
	protected function getCleanUrl($bolRequestToken=true)
	{
		$return = \Contao\Environment::get('base').\Contao\Environment::get('script');
		if( Controller::isFrontend() && $bolRequestToken && !\Contao\Config::get('disableRefererCheck'))
		{
			$return .= '?rt='.Controller::request_token();
		}
		return $return;
	}
	
	
	/**
	 * Return the config overview button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToConfigsOverviewButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href.'&amp;id='.$row['id'];
		$href = \Contao\StringUtil::decodeEntities($href);
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) ? '<a href="'.$href.'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span><span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span><span class="link off">'.$label.'</span>';
	}


	/**
	 * Return the custom catalog config button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToConfigButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href;
		$href = \Contao\StringUtil::decodeEntities($href);
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) ? '<a href="'.$href.'&amp;id='.$row['id'].'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span><span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span><span class="link off">'.$label.'</span>';
	}
	
	
	/**
	 * Return the group view button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToGroupsButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href;
		$href = \Contao\StringUtil::decodeEntities($href);
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_groupsp.create')) ? '<a href="'.$href.'&amp;id='.$row['id'].'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span><span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span><span class="link off">'.$label.'</span>';
	}
	
	
	/**
	 * Return the group view button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToGroupsOverviewButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href.'&amp;id='.$row['id'];
		$href = \Contao\StringUtil::decodeEntities($href);
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_groupsp.create')) ? '<a href="'.$href.'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span><span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span><span class="link off">'.$label.'</span>';
	}

	
	/**
	 * Return the attribute button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToAttributeButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href.'&amp;id='.$row['id'];
		$href = \Contao\StringUtil::decodeEntities($href);
		
		$strFontIcon = '';
		if( isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$row['type']]['icon']) )
		{
			$strFontIcon = '<i class="icon '.$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES'][$row['type']]['icon'].'"></i>';
		}
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_attributep.create')) ? '<a href="'.$href.'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span>'.$strFontIcon.'<span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span>'.$strFontIcon.'<span class="link off">'.$label.'</span>';
	}
	
	
	/**
	 * Return the group view button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToAttributesOverviewButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href.'&amp;id='.$row['id'];
		$href = \Contao\StringUtil::decodeEntities($href);
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_attributep.create')) ? '<a href="'.$href.'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span><span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span><span class="link off">'.$label.'</span>';
	}
	
	
	/**
	 * Return the filterset overview button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToFiltersetsOverviewButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href;
		$href = \Contao\StringUtil::decodeEntities($href);
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_filtersetp.create')) ? '<a href="'.$href.'&amp;id='.$row['id'].'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span><span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span><span class="link off">'.$label.'</span>';
	}
	
	
	/**
	 * Return the attribute button for the side menu
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function goToFilterButton($row, $href, $label, $title, $icon, $attributes)
	{
		$href = $this->getCleanUrl().'&'.$href.'&amp;id='.$row['id'];
		$href = \Contao\StringUtil::decodeEntities($href);
		
		$strFontIcon = '';
		if($GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$row['type']]['icon'])
		{
			$strFontIcon = '<i class="icon '.$GLOBALS['PCT_CUSTOMELEMENTS']['FILTERS'][$row['type']]['icon'].'"></i>';
		}
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customelement_filterp.create')) ? '<a class="edit_button" href="'.$href.'" title="'.\Contao\StringUtil::specialchars($title).'" '.$attributes.'>'.'<span class="image_container">'.\Contao\Image::getHtml($icon, $label).'</span>'.$strFontIcon.'<span class="link">'.$label.'</span></a> ' : '<span class="image_container">'.\Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).'</span>'.$strFontIcon.'<span class="link off">'.$label.'</span>';
	}
	

	/**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$objCC = CustomCatalogFactory::fetchCurrent();
		
		$objAttribute = AttributeFactory::fetchById($objCC->publishedField);
		if( $objAttribute === null )
		{
			return '';
		}

		$strField = $objAttribute->alias;
		$strTable = $objCC->tableName;
		
		if($objCC->mode == 'existing')
		{
			$strTable = $objCC->existingTable;
		}
		
		$security = System::getContainer()->get('security.helper');
		if (!$security->isGranted(ContaoCorePermissions::USER_CAN_EDIT_FIELD_OF_TABLE, $strTable.'::'.$strField))
		{
			return '';
		}

		$href .= '&amp;id=' . $row['id'];

		if (!$row[$strField])
		{
			$icon = 'invisible.svg';
		}

		$titleDisabled = (is_array($GLOBALS['TL_DCA'][$strTable]['list']['operations']['toggle']['label']) && isset($GLOBALS['TL_DCA'][$strTable]['list']['operations']['toggle']['label'][2])) ? sprintf($GLOBALS['TL_DCA'][$strTable]['list']['operations']['toggle']['label'][2], $row['id']) : $title;

		return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars(!$row[$strField] ? $title : $titleDisabled) . '" data-title="' . StringUtil::specialchars($title) . '" data-title-disabled="' . StringUtil::specialchars($titleDisabled) . '" data-action="contao--scroll-offset#store" onclick="return AjaxRequest.toggleField(this,true)">' . \Contao\Image::getHtml($icon, $label, 'data-icon="visible.svg" data-icon-disabled="invisible.svg" data-state="' . ($row[$strField] ? 1 : 0) . '"') . '</a> ';
	}
	
	
	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnVisible)
	{
		if(strlen(\Contao\Input::get('table')) < 1)
		{
			$objCC = CustomCatalogFactory::fetchCurrent(\Contao\Input::get('do'));
		}
		else
		{
			$objCC = CustomCatalogFactory::fetchByTableName(\Contao\Input::get('table'));
		}
		
		$objAttribute = AttributeFactory::fetchById($objCC->publishedField);
		
		$strField = $objAttribute->alias;
		$strTable = $objCC->tableName;
		
		if($objCC->mode == 'existing')
		{
			$strTable = $objCC->existingTable;
		}
		
		// Check permissions to edit
		\Contao\Input::setGet('id', $intId);
		\Contao\Input::setGet('act', 'toggle');
		
		// Check permissions to publish
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		if (!$this->User->isAdmin && !$objSecurity->isGranted('contao_user.alexf',$strTable.'::'.$strField))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to publish/unpublish item ID "'.$intId.'"');
		   $this->redirect('contao/main.php?act=error');
		}

		$objVersions = new \Contao\Versions($strTable, $intId);
		$objVersions->initialize();
		
		// Trigger the save_callback
		if ( isset($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['save_callback']) && is_array($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['save_callback'] as $callback)
			{
				$objCaller = new $callback[0];
				$blnVisible = $objCaller->$callback[1]($blnVisible, $this);
			}
		}
		
		// Update the database
		\Contao\Database::getInstance()->prepare("UPDATE ".$strTable." SET tstamp=". time() .", ".$strField."='" . ($blnVisible ? 1 : '') . "' WHERE id=?")->execute($intId);

		$objVersions->create();
		
		\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('A new version of record "'.$strTable.'.id='.$intId.'" has been created');
	}
	
	
	/**
	 * Return the button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleAnyIcon($row, $href, $label, $title, $icon, $attributes)
	{
		$objCC = CustomCatalogFactory::fetchCurrent();
		
		$blnPreg = preg_match_all('/data-(.*?)="(.*?)\"/', $attributes,$arrResult);
		if(!$blnPreg)
		{
			return '';
		}
		
		$arrDataAttributes = array();
		
		foreach($arrResult[0] as $i => $v)
		{
			$str = $arrResult[1][$i];
			$var = $arrResult[2][$i];	
			$arrDataAttributes[$str] = $var;
		}
		
		$objAttribute = AttributeFactory::findById($arrDataAttributes['attr_id']);
		if(!$objAttribute)
		{
			return '';
		}
		
		$strField = $objAttribute->get('alias');
		$strTable = $objCC->tableName;
		
		if($objCC->mode == 'existing')
		{
			$strTable = $objCC->existingTable;
		}
		
		if (strlen(\Contao\Input::get('taid')))
		{
			$this->toggleAnyState(\Contao\Input::get('taid'), (\Contao\Input::get('state') == 1));
			$this->redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$objAttribute->hasAccess())
		{
			return '';
		}

		$href .= '&amp;taid='.$row['id'].'&amp;state='.($row[$strField] ? '' : 1);
		
		$icon = '';
		if (!$row[$strField])
		{
			$icon = \Contao\FilesModel::findByPk($objAttribute->get('icon_off'))->path ?: '';
		}
		else
		{
			$icon = \Contao\FilesModel::findByPk($objAttribute->get('icon'))->path ?: '';
		}
		$size = array('16','16','center_center');
		$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		$image = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$icon, $size)->getUrl($projectDir);

		$href = ControllerHelper::callstatic('addToUrl',array($href));
		
		// set the href directly
		return '<a href="'.$href.'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($image, $label).'</a> ';
	}
	
	
	
	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 */
	public function toggleAnyState($intId, $blnVisible)
	{
		$objCC = CustomCatalogFactory::fetchCurrent();
		
		$objAttribute = AttributeFactory::fetchById(\Contao\Input::get('attr_id'));
		
		$strField = $objAttribute->alias;
		$strTable = $objCC->tableName;
		
		if($objCC->mode == 'existing')
		{
			$strTable = $objCC->existingTable;
		}
		
		// Check permissions to edit
		\Contao\Input::setGet('id', $intId);
		\Contao\Input::setGet('act', 'toggle');
		
		// Check permissions to publish
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		if (!$this->User->isAdmin && !$objSecurity->isGranted('contao_user.alexf',$strTable.'::'.$strField))
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('Not enough permissions to publish/unpublish item ID "'.$intId.'"');
		   $this->redirect('contao/main.php?act=error');
		}

		$objVersions = new \Contao\Versions($strTable, $intId);
		$objVersions->initialize();
		
		// Trigger the save_callback
		if ( isset($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['save_callback']) && is_array($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA'][$strTable]['fields'][$strField]['save_callback'] as $callback)
			{
				$objCaller = new $callback[0];
				$blnVisible = $objCaller->$callback[1]($blnVisible, $this);
			}
		}
		
		// Update the database
		\Contao\Database::getInstance()->prepare("UPDATE ".$strTable." SET tstamp=". time() .", ".$strField."='" . ($blnVisible ? 1 : '') . "' WHERE id=?")->execute($intId);

		$objVersions->create();
		\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('A new version of record "'.$strTable.'.id='.$intId.'" has been created');
	}

//! language panels	
	
	/**
	 * Set the backend language on backend ajax requests e.g. from the CustomElements.toggleLanguageSwitch ajax request
	 * Called from executePreActions Hook
	 */
	public function languagePanelAjaxHelper($strAction)
	{
		if($strAction == 'toggleLanguageSwitch')
		{
			// reset backend messages
			\Contao\Message::reset();
			
			// set the new backend language
			Multilanguage::setActiveBackendLanguage(\Contao\Input::post('language'),\Contao\Input::post('table'));
			
			// set new backend info message
			$objDC = new \StdClass;
			$objDC->table = \Contao\Input::post('table');
			$this->showActiveLanguageHint($objDC);
		}
	}
	
	
	/**
	 * Create the language panel select field
	 * @param object
	 * @return string
	 */
	public function languagePanel($objDC)
	{
		// fetch custom catalog
		$objDbCC = CustomCatalogFactory::fetchCurrent();
		if( $objDbCC === null || !$objDbCC->multilanguage || strlen($objDbCC->languages) < 1)
		{
			return '';
		}
		
		if(\Contao\Input::get('act') == 'edit' && !isset($objDC->activeRecord) )
		{
			$objDC->id = \Contao\Input::get('id');
			$objDC->activeRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$strLanguage = Multilanguage::getActiveBackendLanguage($objDC->table);
		$strSource = ($objDbCC->mode == 'new' ? $objDbCC->tableName : $objDbCC->existingTable);

		// show the language info
		$this->showActiveLanguageHint($objDC);
		
		// show lang entry directly
		if(\Contao\Input::get('langswitch') != '')
		{
			// set new backend language
			Multilanguage::setActiveBackendLanguage(\Contao\Input::get('language'),$objDC->table);
			
			// update the language info
			$this->showActiveLanguageHint($objDC);
			
			// remove GET parameters
			$url = \PCT\CustomElements\Helper\Functions::removeFromUrl('langswitch');
			$url = \PCT\CustomElements\Helper\Functions::removeFromUrl('language',$url);
			
			// redirect
			$this->redirect( $url );
		}
		
		// remove active language form session and from be url, redirect to kill POST
		if(!\Contao\Input::post('language') && (\Contao\Input::post('FORM_SUBMIT') == 'tl_filters' || \Contao\Input::post('FORM_SUBMIT') == 'pct_tableTreeWidget'))
		{
			Multilanguage::resetLanguageByTable($objDC->table);
			// reload for session updates
			if(\Contao\Input::get('act') == 'edit')
			{
				// update the language info
				$this->showActiveLanguageHint($objDC);
				
				$this->reload();
			}
			
			// add the language to the url of the tabletree widget
			if(\Contao\Input::post('FORM_SUBMIT') == 'pct_tableTreeWidget')
			{
				$this->redirect(\Contao\Environment::get('scriptName').''.$this->addToUrl( 'language=' ) );
			}
		}
		// set active language to session and add language GET parmameter to url, redirect to kill POST
		else if(strlen(\Contao\Input::post('language')) > 0 && (\Contao\Input::post('FORM_SUBMIT') == 'tl_filters' || \Contao\Input::post('FORM_SUBMIT') == 'pct_tableTreeWidget'))
		{
			Multilanguage::setActiveBackendLanguage(\Contao\Input::post('language'),$objDC->table);
			
			// reload the page in edit mode for session changes take effect immmediatelly
			if(\Contao\Input::get('act') == 'edit')
			{
				// update the language info
				$this->showActiveLanguageHint($objDC);
				
				$this->reload();
			}
			
			// add the language to the url of the tabletree widget
			if(\Contao\Input::post('FORM_SUBMIT') == 'pct_tableTreeWidget')
			{
				$this->redirect(\Contao\Environment::get('scriptName').''.$this->addToUrl( 'language='.\Contao\Input::post('language') ) );
			}
		}
		
		// hide any other language option in edit mode when no base entry exists
		$blnShowOnlyBaseAndActive = false;
		if(\Contao\Input::get('act') == 'edit' && strlen($strLanguage) > 0 && !\Contao\Input::get('langpid'))
		{
			$intBaseRecord = Multilanguage::getBaseRecordId($objDC->id,$objDC->table,$strLanguage );
			if($intBaseRecord < 1)
			{
				$blnShowOnlyBaseAndActive = true;
			}
		}
		
		$arrReference =  \Contao\System::getContainer()->get('contao.intl.locales')->getLocales(null, true); #$this->getLanguages();
		$arrLanguages = \Contao\StringUtil::deserialize($objDbCC->languages);
		if(!is_array($arrLanguages))
		{
			$arrLanguages = array();
		}
		
		if($blnShowOnlyBaseAndActive && count($arrLanguages) > 0)
		{
			$arrLanguages = array_intersect($arrLanguages, array($strLanguage));
		}
		
		// hide all other language options when user creates a base entry
		if(\Contao\Input::get('act') == 'edit' && isset($objDC->activeRecord) && $objDC->activeRecord->tstamp < 1 && strlen($strLanguage) < 1)
		{
			$arrLanguages = array();
		}
		
		$arrOptions = array(0=>array('value'=>'','label'=>'-'));
		
		// in list view, only show the languages for which entries exist
		if(!\Contao\Input::get('act') && !$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['showAllLanguagesInPanel'])
		{
		   $objLanguages = $objDatabase->prepare("SELECT DISTINCT lang FROM tl_pct_customcatalog_language WHERE lang!='' AND source=?")->execute($strSource);
		
		   if($objLanguages->numRows > 0)
		   {
		   	while($objLanguages->next())
		   	{
		   		$arrOptions[] = array('value'=>$objLanguages->lang,'label'=>$arrReference[$objLanguages->lang]);
		   	}
		   }
		}
		// in all other views, show the whole list of languages available for the custom catalog
		else
		{
		   foreach($arrLanguages as $k)
		   {
		   		$arrOptions[] = array('value'=>$k,'label'=>$arrReference[$k]);
		   }
		}
		
		// hide the blank option when user is about to create a language entry
		if(\Contao\Input::get('act') == 'edit' && isset($objDC->activeRecord) && $objDC->activeRecord->tstamp < 1 && strlen($strLanguage) > 0)
		{
			unset($arrOptions[0]);
		}
		
		$arrData = array
		(
			'label'				=> &$GLOBALS['TL_LANG']['tl_pct_customelement_group']['panel']['language'],
			'inputType'			=> 'select',
			'options'			=> $arrOptions,
			'eval'				=> array('tl_class'=>'w50','includeBlankOption'=>true),
		);
		
		$objSelect = new \Contao\SelectMenu($arrData);
		$objSelect->id = 'languageselect_'.$objDC->id ?? 0;
		$objSelect->name = 'language';
		$objSelect->class .= 'language'; 
		$objSelect->value = $strLanguage;
		$objSelect->__set('onchange',"AjaxRequest.toggleLanguageSwitch(this.value,'".$objDC->table."');");
		
		$strBuffer = 
		'<div id="language_panel" class="language_container panel align_right">'.
		'<span class="label"><strong>'.$GLOBALS['TL_LANG']['tl_pct_customelement_group']['panel']['language'][0].'</strong></span>'.
		'<span class="select field">'.$objSelect->generate().'</span>'.
		'</div>';
		
		return $strBuffer;
	}
	
	
	/**
	 * Inject the language panel in the edit view template
	 * @param object
	 * 
	 * Called from [parseTemplate] Hook
	 */
	public function injectLanguagePanelInEditView($objTemplate)
	{
		if($objTemplate->getName() == 'be_main' && in_array(\Contao\Input::get('do'), $GLOBALS['PCT_CUSTOMCATALOG']['active_modules']) && \Contao\Input::get('act') == 'edit')
		{
			$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findCurrent();
			if($objCC)
			{
				if($objCC->getTable())
				{
					$strPanel = \HashInsertTags::getInstance()->replaceHashInsertTags('###form_panel_language::'.$objCC->getTable().'###');
					$objTemplate->main = $strPanel . $objTemplate->main;
				}
			}
		}
	}
	
	
	/**
	 * Inject the language panel in the table tree widget
	 * @param object
	 * @param object
	 * @return string
	 */
	public function injectLanguagePanelInTableTree($objDC,$objCaller)
	{
		$objCC = CustomCatalogFactory::findByTableName($objDC->table);
		if(!$objCC)
		{
			return '';
		}
		
		if(!$objCC->get('multilanguage') || !$objCC->hasLanguageRecords())
		{
			return '';
		}
		
		$strLanguage = \PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage::getLanguage($objDC->table);
		
		// add language as get parameter
		if(\Contao\Input::get('language') != $strLanguage && strlen($strLanguage) > 0)
		{
			\Contao\Controller::redirect( \Contao\Environment::get('request') . $this->addToUrl('language='.$strLanguage)  );
		}
		
		// remove get parameter
		if(\Contao\Input::get('language') != '' && strlen($strLanguage) < 1)
		{
			\Contao\Controller::redirect( \Contao\Environment::get('request') . $this->addToUrl('language=')  );
		}
		
		if($objDC->source != 'tl_pct_customelement_tags')
		{
			// check the source table for language records
			$objCount = \Contao\Database::getInstance()->prepare("SELECT COUNT(id) AS count FROM tl_pct_customcatalog_language WHERE source=?")->execute($objDC->source);
			if($objCount->count < 1)
			{
				return '';
			}	
		}
		
		$strBuffer = $this->languagePanel($objDC);
		return $strBuffer;
	}
	
	
	/**
	 * Remove the flag that the update alert 
	 */
	public function enableDatabaseUpdateCheck()
	{
		if( Controller::isBackend() && \Contao\Input::get('SUBMIT_TYPE') != 'auto')
		{
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
			$objSession->set('pct_customcatalog_disableDatabaseUpdateCheck',0);
		}
	}

	
	/**
	 * Display the red backend alertbox when the database structure of one of the custom catalog tables is not up to date
	 * @param string
	 * @param string
	 * @return string
	 * called from parseBackendTemplate Hook
	 */
	// ! displayDatabaseUpdateAlertbox
	public function displayDatabaseUpdateAlertbox($strBuffer,$strTemplate)
	{
		if($strTemplate != 'be_main' || \Contao\Input::get('popup') > 0 )
		{
			return $strBuffer;
		}

		// never performan db update
		if( isset($GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['disableDatabaseUpdateCheck']) && (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['disableDatabaseUpdateCheck'] === true )
		{
			return $strBuffer;
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
					
		$blnShowAlert = false;
		$arrCCs = array();
		$blnRun = (boolean)$objSession->get('pct_customcatalog_disableDatabaseUpdateCheck') == true ? false : true;
		
		// deactivate DCA Cache
		$blnDCA = (boolean)$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'];
		$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] = true;

		// Database update performed, recheck once
		if( \Contao\Input::get('key') == 'db_update' && \Contao\Input::get('status') == 'done' )
		{
			$blnRun = true;
		}
		
		// run the database check for new fields
		if( $blnRun )
		{
			$objDatabase = Database::getInstance();

			$GLOBALS['CC_DATABASE_UPDATE'] = true;
			
			// tables to perform check on
			$objCCs = CustomCatalogFactory::findAllActive();
			if( $objCCs === null )
			{
				return;
			}
			
			$arrTables = array();

			// load data containers and collect tables to perform a database check on
			foreach($objCCs as $objCC)
			{
				$table = ($objCC->mode == 'new' ? $objCC->tableName : $objCC->existingTable);
				if( !$objDatabase->tableExists($table) )
				{
					$arrCCs[] = $table;
					break;
				}
	
				// tell CC to force load the CC via loadDataContainer hook
				$GLOBALS['PCT_CUSTOMCATALOG']['loadDataContainer'][$table] = true;
				\Contao\Controller::loadDataContainer($table);

				$arrTables[] = $table;

				$arrDCA_Fields = $GLOBALS['TL_DCA'][$table]['fields'] ?? array();
				
				// remove fields with no sql definition
				foreach( $arrDCA_Fields as $field => $data  )
				{
					if( !isset($data['sql']) || empty($data['sql']) )
					{
						unset( $arrDCA_Fields[$field] );
					}
				}
				
				$arrFields = \array_keys($arrDCA_Fields);
				
				// field list is different
				$arrDbFields = $objDatabase->getFieldNames($table);
				if( \array_diff($arrFields, $arrDbFields) )
				{
					$arrCCs[] = $table;
					break;
				}
				// check if fields exist
				foreach( $arrFields as $field)
				{
					if( $objDatabase->fieldExists($field, $table) === false )
					{
						$arrCCs[] = $table;
						break;
					}
				}
				// Installer logic
				$objInstallHelper = new InstallerHelper;
				$arrSQL = $objInstallHelper->sqlCompileCommandsCallback(array());
				if(!empty($arrSQL) && is_array($arrSQL) )
				{
					foreach($arrSQL as $sql)
					{
						foreach($sql as $statement)
						{
							// the table exists in the statement and the statement is not a COLLATE change
							if( strlen(strpos($statement,$table)) > 0 && strlen(strpos($statement, 'COLLATE')) < 1 )
							{
								$arrCCs[] = $table;
								break;
							}
						}
					}
				}
			}

			$arrCCs = \array_unique($arrCCs);
			
			// store the tables names in the session
			$objSession->set('pct_customcatalog_databaseUpdateTables',$arrCCs);
			
			// check performed. Disable it now
			$objSession->set('pct_customcatalog_disableDatabaseUpdateCheck',1);
		}

		if(!$blnRun)
		{
			$arrCCs = $objSession->get('pct_customcatalog_databaseUpdateTables');
		}

		// set cache value
		(boolean)$GLOBALS['PCT_CUSTOMCATALOG']['SETTINGS']['bypassDCACache'] = $blnDCA;
		
		if(empty($arrCCs) && !$blnShowAlert)
		{
			return $strBuffer;
		}
		
		$version = ContaoCoreBundle::getVersion();
		$text = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['updateDbAlert'],implode(',',array_unique($arrCCs))) ?: 'Please update the database';
		$href = \Contao\Backend::addToUrl('do=pct_customelements&key=db_update',true,array('table','status'));
		$link = $GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['updateDbAlert_submit'] ?: 'Install tool';
		$attributes = '';
		
		$GLOBALS['PCT_CUSTOMELEMENTS']['MESSAGES']['error'][] = '<span class="hide_box"><i class="fa fa-times-circle"></i></span><a href="'.$href.'" class="tl_submit" '.$attributes.'>'.$link.'</a>'.$text;;
		
		return $strBuffer;
	}
	
	
	/**
	 * Hide the database update alert box
	 * @param string
	 * called from executePreAction Hook
	 */
	public function databaseUpdateAlertboxAjaxHelper($strAction)
	{
		if($strAction == 'hideDatabaseUpdateAlertbox')
		{
			$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
			$objSession->set('pct_customcatalog_disableDatabaseUpdateCheck',1);
			$objSession->remove('pct_customcatalog_databaseUpdateTables');
		}
	}
	
	
	/**
	 * Create an area at the first body element for CC related alerts
	 * @param string
	 * @param string
	 * called from parseBackendTemplate Hook
	 */
	public function displayBackendAlerts($strBuffer, $strTemplate)
	{
		if($strTemplate != 'be_main')
		{
			return $strBuffer;
		}

		// show alerts to admins only
		$objUser = BackendUser::getInstance();
		if( !isset($objUser) || $objUser === null || !$objUser->isAdmin  )
		{
			return $strBuffer;
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrMessages = $objSession->get('PCT_CUSTOMELEMENTS_BACKEND_MESSAGES') ?: array();
		
		if(isset($GLOBALS['PCT_CUSTOMELEMENTS']['MESSAGES']) && is_array($GLOBALS['PCT_CUSTOMELEMENTS']['MESSAGES']) && count($GLOBALS['PCT_CUSTOMELEMENTS']['MESSAGES']) > 0)
		{
			$arrMessages = array_merge($arrMessages,$GLOBALS['PCT_CUSTOMELEMENTS']['MESSAGES']);
		}
			
		if(count($arrMessages) < 1)
		{
			return $strBuffer;
		}
		
		$strAlertBox = '<div id="pct_alertbox">%s</div>';
		
		$strMessages = '';
		foreach($arrMessages as $strType => $messages)
		{
			$class = array($strType);
			if($strType == 'error')
			{
				$class[] = 'tl_error';
				$class[] = 'tl_permalert';
			}
			foreach($messages as $ms)
			{
				$strMessages .= '<div class="message '.implode(' ', $class).'"><div class="block">'.$ms.'</div></div>';
			}
		}
		$strAlertBox = sprintf('<div id="pct_alertbox"><div class="inner">%s</div></div>',$strMessages);
		
		$preg = preg_match('/<body(.*?)\>/', $strBuffer,$result);
		if($preg)
		{
			$strBuffer = str_replace($result[0], $result[0].$strAlertBox, $strBuffer);
		}
		
		return $strBuffer;
	}
	
		
	/**
	 * Display a backend hint if user works in language records
	 * @param object
	 */
	public function showActiveLanguageHint($objDC)
	{
		$strLanguage = \PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage::getLanguage($objDC->table);
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findCurrent();
		if($objCC === null)
		{
			return;
		}
				
		if(strlen($strLanguage) > 0 && $objCC->getTable() == $objDC->table && $objCC->languages)
		{
			\Contao\Message::reset('TL_INFO');
		
			$arrLanguages = \Contao\System::getContainer()->get('contao.intl.locales')->getLocales(null, true);
			\Contao\Message::addInfo( sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['activeLanguageInfo'], $arrLanguages[$strLanguage]) );
		}
		else
		{
			\Contao\Message::reset('TL_INFO');
		}
	}
	
	
	/**
	 * Inject javascript templates in the backend page
	 * @param object
	 * 
	 * Called from [parseTemplate] Hook
	 */
	public function injectJavascriptInBackendPage($objTemplate)
	{
		if($objTemplate->getName() == 'be_main')
		{
			$objBeScripts = new \Contao\BackendTemplate('be_scripts');
			$objTemplate->javascripts .= $objBeScripts->parse();
		}
	}
	
	
	/**
	 * Inject version number in the backend page
	 * @param object
	 * 
	 * Called from [parseTemplate] Hook
	 */
	public function injectVersionnumberInBackendPage($objTemplate)
	{
		if($objTemplate->getName() == 'be_main' && in_array(\Contao\Input::get('do'), $GLOBALS['PCT_CUSTOMCATALOG']['active_modules']))
		{
			$objTemplate->headline .= '<span class="version">'.PCT_CUSTOMCATALOG_VERSION.'</span>';			
		}
	}
	
	
	/**
	 * Inject css templates in the backend page
	 * @param object
	 * 
	 * Called from [parseTemplate] Hook
	 */
	public function injectCSSInBackendPage($objTemplate)
	{
		// backend icons in contao 4.4
		if($objTemplate->getName() == 'be_main')
		{
			// check if all requirements has been passed to initialize
			$objCCs = CustomCatalogFactory::findAllActive();
			if($objCCs === null)
			{
				return;
			}
			
			$arrCSS = array();
			foreach($objCCs as $objCC)
			{
				if(!$objCC->get('icon'))
				{
					continue;
				}
				
				$objFile = \Contao\FilesModel::findByPk($objCC->get('icon'));
				if( $objFile == null )
				{
					continue;
				}
				
				// icon
				$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
				$strIcon = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, array('16','16','center_center') )->getUrl($projectDir);
				$strAlias = \PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration::getBackendModuleAlias($objCC->id);
				
				$objCSS = new \Contao\BackendTemplate('be_module_icon_css');
				$objCSS->table = $objCC->getTable();
				$objCSS->icon = $strIcon;
				$objCSS->alias = $strAlias;
				
				$arrCSS[] = $objCSS->parse();
			}
			
			$objTemplate->javascripts .= '<style>'.implode('', $arrCSS).'</style>';
		}
	}
	
	
//! add paletteswitchs

 
	/**
	 * Add a paletteswitch attribute to the current edit interfaces if it does not contain one
	 * @param object
	 *
	 * called from: $GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer']
	 */
	public function addPaletteSwitchToEditView($objDC)
	{
		$arrFields = $GLOBALS['TL_DCA'][$objDC->table]['fields'];
		
		if( !isset($GLOBALS['TL_DCA'][$objDC->table]['palettes']['__selector__']) || empty($GLOBALS['TL_DCA'][$objDC->table]['palettes']['__selector__']) )
		{
			return;
		}
		
		$objDcaHelper = \PCT\CustomElements\Plugins\CustomCatalog\Helper\Dcahelper::getInstance()->setTable($objDC->table);
		
		$arrAllPalettes = $objDcaHelper->getPalettesAsArray();
		unset($arrAllPalettes['__selector__']);
		
		if(count($arrAllPalettes) < 2)
		{
			return;
		}	
		
		// find paletteswitch attributes in selectors
		foreach($GLOBALS['TL_DCA'][$objDC->table]['palettes']['__selector__'] as $field)
		{
			$objAttribute = AttributeFactory::findByCustomCatalog($field, $objDC->table);
			if(!$objAttribute)
			{
				continue;
			}
			
			if($objAttribute->get('type') != 'paletteselect')
			{
				continue;
			}
			
			$arrSelectors[$objAttribute->get('alias')] = $objAttribute;
		}
		
		// no paletteswitch attributes at all, show backend info
		if(count($arrSelectors) < 1)
		{
			\Contao\Message::addInfo($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['missingPaletteswitchInfo']);
			return;
		}
	
		if(!$objDC->activeRecord && $objDC->id > 0)
		{
			$objDC->activeRecord = $objDatabase = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		// find active view
		$strActive = '';
		foreach(array_keys($arrSelectors) as $selector)
		{
			// user is selecting
			if(\Contao\Input::post('FORM_SUBMIT') == $objDC->table && isset($_POST[$selector]) )
			{
				$strActive = \Contao\Input::post($selector);;
			}
			else if(array_key_exists($objDC->activeRecord->{$selector}, $arrAllPalettes))
			{
				$strActive = $objDC->activeRecord->{$selector};
			}
		}
		
		// is default
		if(strlen($strActive) < 1)
		{
			$strActive = 'default';
		}
		
		if(!array_key_exists($strActive,$arrAllPalettes))
		{
			return;
		}
		
		$arrPalettes = $arrAllPalettes[$strActive];
		
		foreach(array_keys($arrSelectors) as $selector)
		{
			$contains = array();
			$skip = array();
			// search all palettes
			foreach($arrPalettes as $palette => $fields)
			{
				if(in_array($selector, $fields))
				{
					$contains[] = $palette;
				}
			}
			
			// the current interface has at least one palette select
			if(count($contains) > 0)
			{
				continue;
			}
			else
			{
				// insert a new palette with the paletteswitch attribute
				\Contao\ArrayUtil::arrayInsert($arrPalettes,0,array('paletteselect'=>$selector));
			}
			
			$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$strActive] = $objDcaHelper->generatePalettes($arrPalettes);
		}
	}
	
	
	/**
	 * Toggle the field labels by the active selector
	 * @param object
	 *
	 * called from: $GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer']
	 */
	public function toggleAttributeLabels($objDC,$objCCResult)
	{
		$arrSelectors = $GLOBALS['TL_DCA'][$objDC->table]['palettes']['__selector__'] ?? array();
		if(!is_array($arrSelectors) || count($arrSelectors) < 1)
		{
			return;
		}
		
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findByTableName($objDC->table);
		
		if(!$objDC->activeRecord && $objDC->id > 0)
		{
			$objDC->activeRecord = $objDatabase = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		// find active view
		$strActive = '';
		foreach($arrSelectors as $selector)
		{
			$objAttribute = AttributeFactory::findByCustomCatalog($selector, $objDC->table);
			if(!$objAttribute)
			{
				continue;
			}
			
			if($objAttribute->get('type') != 'paletteselect')
			{
				continue;
			}
			
			// user is selecting
			if(\Contao\Input::post('FORM_SUBMIT') == $objDC->table && isset($_POST[$selector]) )
			{
				$strActive = \Contao\Input::post($selector);;
			}
			else
			{
				$strActive = $objDC->activeRecord->{$selector};
			}
		}
		
		if(strlen($strActive) < 1)
		{
			return;
		}
		
		// overwrite the label if attribute is referenced
		foreach($GLOBALS['TL_DCA'][$objDC->table]['fields'] as $field => $arrFieldDef)
		{
			if(in_array($field, $GLOBALS['PCT_CUSTOMCATALOG']['systemColumns']))
			{
				continue;
			}
			
			// find the attribute withing group of the selected groupset
			$objAttribute = $objCC->getAttribute($field,$strActive);
			if(!$objAttribute)
			{
				continue;
			}
		}
	}


	/**
	 * Allow backend user to edit comments
	 * @parma integer
	 * @param string
	 * @return void||boolean
	 */
	public function isAllowedToEditCommentCallback($intParent, $strSource)
	{
		if( \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::validateByTableName($strSource) )
		{
			return true;
		}
	}
}
	
