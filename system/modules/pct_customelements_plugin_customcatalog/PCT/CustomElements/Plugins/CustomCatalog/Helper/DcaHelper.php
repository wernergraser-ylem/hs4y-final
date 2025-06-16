<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage pct_customelements_plugin_customcatalog
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Helper;

/**
 * Imports
 */

use Contao\ArrayUtil;
use Contao\StringUtil;
use Contao\System;
use Contao\BackendUser;
use Contao\CoreBundle\ContaoCoreBundle;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalog as CustomCatalog;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Cache as Cache;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks as Hooks;
use PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory as CustomCatalogFactory;
use PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory as AttributeFactory;
use PCT\CustomElements\Helper\ControllerHelper as ControllerHelper;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Multilanguage;

/**
 * Class
 * DcaHelper
 * Provide various function to help managing data container arrays
 */
class DcaHelper extends \PCT\CustomElements\Helper\DcaHelper
{
	/**
	 * Data array
	 * @var array
	 */
	protected $arrData = array();

	/**
	 * Current object instance (Singleton)
	 * @var object
	 */
	protected static $objInstance;

	/**
	 * Instantiate this class and return it (Factory)
	 * @return object
	 * @throws Exception
	 */
	public static function getInstance()
	{
		if (!is_object(static::$objInstance))
		{
			static::$objInstance = new static();
		}
		return static::$objInstance;
	}


	/**
	 * Getters
	 * @param string
	 */
	public function get($strKey)
	{
		if(isset($this->$strKey))
		{
			return $this->$strKey;
		}
		else if(array_key_exists($strKey, $this->arrData))
		{
			return $this->arrData[$strKey];
		}
		else
		{
			return null;
		}
	}


	/**
	 * Setters
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		if(isset($this->$strKey) || is_null($this->$strKey))
		{
			$this->$strKey = $varValue;
		}
		else if(array_key_exists($strKey, $this->arrData))
		{
			$this->arrData[$strKey] = $varValue;
		}
		else
		{
			return null;
		}
	}

// !module folder handling


	/**
	 * Return true if a dca file already exists for a custom catalog
	 * @param string
	 * @return boolean
	 */
	public function dcaFileExists($strTable)
	{
		$extension = 'php';
		
		$f_dca = 'system/modules/'.sprintf($GLOBALS['PCT_CUSTOMCATALOG']['folderLogic'],$strTable).'/dca/'.$strTable.'.'.$extension;
		$objFile = new \Contao\File($f_dca,true);
		if($objFile->exists())
		{
			return true;
		}
		return false;
	}


	/**
	 * Remove the dca file and the folder in /system/modules
	 * @param string	Tablename of the customcatalog
	 */
	public function deleteDcaFile($strTable)
	{
		if(!$this->dcaFileExists($strTable))
		{
			return true;
		}
		if(!$GLOBALS['PCT_CUSTOMCATALOG']['autoManageDcaFiles'] || !$GLOBALS['PCT_CUSTOMCATALOG']['deleteDcaFileOnCustomCatalogDelete'])
		{
			return true;
		}

		$folder = 'system/modules/'.sprintf($GLOBALS['PCT_CUSTOMCATALOG']['folderLogic'],$strTable);
		if(!is_dir(Controller::rootDir().'/'.$folder))
		{
			return true;
		}
		$objFolder = new \Contao\Folder($folder);
		$objFolder->delete();

		// return recursive to doublecheck the deletion of the folder
		return $this->deleteDcaFile($strTable);
	}
		

// !DataContainerArray

	/**
	 * Return the default data container array structure
	 * @return array
	 */
	public static function getDefaultDataContainerArray()
	{
		$arrReturn = array
		(
			// Config
			'config' => array
			(
				'dataContainer'               => \Contao\DC_Table::class,
				#'switchToEdit'                => true,
				'enableVersioning'            => true,
				'sql' => array
				(
					'keys' => array
					(
						'id'   => 'primary',
						'pid'   => 'index',
						'tstamp' => 'index',
						'sorting' => 'index',
					)
				)
			),
			// List
			'list' => array
			(
				'sorting' => array
				(
					'mode'                    => 2,
					'fields'                  => array(),
					'headerFields'            => array('id'),
				),
				'label' => array
				(
					'fields'                  => array('id'),
					'format'                  => '%s',
				),
				'global_operations' => array
				(
					'all' => array
					(
						'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
						'href'                => 'act=select',
						'class'               => 'header_edit_all',
						'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
					),
				),
				'operations' => array
				(
					'edit' => array
					(
						'label'               => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['edit'],
						'href'                => 'act=edit',
						'icon'                => 'edit.svg',
					),
					'copy' => array
					(
						'label'               => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['copy'],
						'href'                => 'act=copy',
						'icon'                => 'copy.svg',
					),
					'delete' => array
					(
						'label'               => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['delete'],
						'href'                => 'act=delete',
						'icon'                => 'delete.svg',
						'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
					),
					'show' => array
					(
						'label'               => &$GLOBALS['TL_LANG']['tl_pct_customcatalog']['show'],
						'href'                => 'act=show',
						'icon'                => 'show.svg'
					),
				)
			),
			// Palettes
			'palettes' => array('__selector__' => array(),'default'=> ''),
			// Subpalettes
			'subpalettes' => array(),
			'fields' => array
			(
				'id' => array
				(
					'eval'       => array('doNotCopy'=>true),
					'sql'                     => "int(10) unsigned NOT NULL auto_increment",
				),
				'pid' => array
				(
					'sql'                     => "int(10) unsigned NOT NULL default '0'",
				),
				'tstamp' => array
				(
					'eval'       => array('doNotCopy'=>true),
					'sql'                     => "int(10) unsigned NOT NULL default '0'",
				),
				'sorting' => array
				(
					'sql'                     => "int(10) unsigned NOT NULL default '0'",
				),
				'ptable' => array
				(
					'sql'                     => "varchar(64) NOT NULL default ''",
				),
			),
		);

		// flag this as default array
		$arrReturn['isDefaultCustomCatalogDCA'] = true;

		return $arrReturn;
	}


	/**
	 * Compare a given data container array structure to the default structure for a custom catalog so it fits the minimum requirements
	 * @param array
	 */
	public static function checkDataContainerArrayAgainstDefault($arrDCA)
	{
		$arrDefault = static::getDefaultDataContainerArray();
		
		// the return dca array will no be the default one anymore
		unset($arrDefault['isDefaultCustomCatalogDCA']);
		
		#$arrReturn = \PCT\CustomElements\Helper\Functions::array_combine_recursive($arrDCA,$arrDefault);
		$arrReturn = \PCT\CustomElements\Helper\Functions::array_merge_recursive_ex($arrDefault,$arrDCA);
		
		// flag as private DCA array
		$arrReturn['isPrivateCustomCatalogDCA'] = true;
		
		return $arrReturn;
	}


	/**
	 * Generate the list labels
	 * @param array
	 * @return string
	 */
	public function generateListLabels($arrRow)
	{
		$objCC = CustomCatalogFactory::findCurrent();
		if(!$objCC || empty($arrRow))
		{
			return $arrRow['id'];
		}
		
		$strTable = $objCC->getTable();
		
		// create an origin object
		$objOrigin = \PCT\CustomElements\Core\Origin::getInstance();
		$objOrigin->set('intPid',$arrRow['id']);
		$objOrigin->set('strTable',$strTable);
		
		$objActiveRecord = new \StdClass;
		foreach($arrRow as $k => $v)
		{
			$objActiveRecord->{$k} = $v;
		}
		$objOrigin->set('objActiveRecord',$objActiveRecord);
		
		// process the regular wildcards
		if(strlen(trim($objCC->get('label_html'))) < 1 || $objCC->get('label_overwrite') < 1)
		{
			$arrValues = array();
			$arrIgnore = array();
			$arrOrder = array();

			foreach($arrRow as $strField => $varValue)
			{
				// do not show system columns in listview
				if(in_array($strField, $GLOBALS['PCT_CUSTOMCATALOG']['systemColumns']))
				{
					continue;
				}
				
				// skip a couple generic fields
				$arrFieldName = explode('_', $strField);
				if(in_array($arrFieldName[0], array('orderSRC')))
				{
					continue;
				}
				
				$objAttribute = AttributeFactory::findByCustomCatalog($strField,$objCC->get('id'));
				
				if( isset($objAttribute) && $objAttribute !== null)
				{
					if($objAttribute->get('be_visible') < 1 || $objAttribute->get('published') < 1)
					{
						// options
						$arrOptions = \Contao\StringUtil::deserialize($objAttribute->get('options'));
						if(!empty($arrOptions) && is_array($arrOptions))
						{
							foreach($arrOptions as $strOption)
							{
								if ( is_array($strOption) )
								{
									continue;
								}
								
								unset($arrValues[$strField.'_'.$strOption]);
								$arrIgnore[] = $strField.'_'.$strOption;
							}
						}
						continue;
					}
				
					// set origin
					$objAttribute->setOrigin($objOrigin);
					
					// trigger HOOK: allow other extensions to manipulate the wildcard value
					$varValueFromHook = \PCT\CustomElements\Core\Hooks::callstatic('processWildcardValue',array($varValue,$objAttribute,$arrRow['id'],$strTable));
					if($varValueFromHook != null || !empty($varValueFromHook))
					{
						$varValue = $varValueFromHook;
					}
					
					$arrValues[$strField] = sprintf($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['wildcardLabelFormat'],$strField,$varValue);
				}
				else
				{
					$tmp = \Contao\StringUtil::deserialize($varValue);
					if( isset($tmp) && !empty($tmp) && is_array($tmp) && !ArrayUtil::isAssoc($tmp) )
					{
						$varValue = implode(',', $tmp);
					}
					$arrValues[$strField] = sprintf($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['wildcardLabelFormat'],$strField,$varValue);
				}

				if( isset($objAttribute->sorting) && $objAttribute->sorting > 0 )
				{
					$arrOrder[$objAttribute->sorting] = $strField;
				}
			}
			
			// make sure all fields to be ignored will be wiped out
			if(count($arrIgnore) > 0 && count($arrValues) > 0)
			{
				foreach($arrIgnore as $v)
				{
					unset($arrValues[$v]);
				}
			}
			
			if(count($arrValues) < 1)
			{
				foreach($GLOBALS['PCT_CUSTOMCATALOG']['systemColumns'] as $col)
				{
					$arrValues[] = $arrRow[$col];
				}
			}

			// reorder
			ksort($arrOrder);
			
			$tmp = array();
			foreach($arrOrder as $strField)
			{
				$tmp[] = $arrValues[$strField];
			}
			$arrValues = $tmp;
			unset($tmp);

			$strReturn = implode('; ', $arrValues);
		}
		// custom labels
		else
		{
			$strBuffer = $objCC->get('label_html');
			
			// check for inserttags
			$preg = preg_match_all('/{{[^}]+}}/i', $strBuffer, $arrChunks);
			if(!$preg)
			{
				$arrChunks = array();
			}
	
			// append inserttag with a little more information about the attribute
			foreach($arrChunks as $arrChunk)
			{
				foreach($arrChunk as $chunk)
				{
					$replace = '';
					$k =  str_replace(array('{{','}}'),'',$chunk);
	
					// template inserttag e.g. {{template::be_label}}
					if(strlen(strpos($k, 'template::')) > 0)
					{
						$t = explode('::', $k);
						$objTemplate = new \Contao\BackendTemplate($t[1]);
						$objTemplate->setData($arrRow);
						$objTemplate->objCustomCatalog = $objCC;
						$objTemplate->strTable = $strTable;
						$strBuffer = str_replace($chunk, $objTemplate->parse(), $strBuffer);
						unset($t);
						unset($objTemplate);
						continue;
					}				
						
					$params = '';
	
					// check if inserttag has options
					if(strlen(strpos($k, '?')))
					{
						// we can use the parse_url method here to strip the parameters from the tag
						$arr = \parse_url( StringUtil::decodeEntities($k) );
						$k = $arr['path'];
						$params = $arr['query'];
					}
					if(!$arrRow[$k])
					{
						$replace = (isset($arrRow[$k]) ? $arrRow[$k] : '');
						$strBuffer = str_replace($chunk, $replace, $strBuffer);
						continue;
					}

					// find the attribute
					$objAttribute = AttributeFactory::findByCustomCatalog($k,$objCC->get('id'));
					
					if($objAttribute)
					{
						$objAttribute->setOrigin($objOrigin);
						
						$v = $arrRow[$k];
		
						$replace = '';
						switch($objAttribute->get('type'))
						{
							case 'image':
								// multiple images
								if($objAttribute->get('eval_multiple'))
								{
									$v = \Contao\StringUtil::deserialize($arrRow[$k]);
									$src = \Contao\FilesModel::findMultipleByUuids($v)->path;
									break;
								}
			
								$src = \Contao\FilesModel::findByPk($v)->path;
								
								// break when empty
								if(strlen($src) < 1)
								{
									$replace = '';
									break;
								}
								
								if($params)
								{
									$replace = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace('{{image::'.$src.'?'.$params.'}}');
								}
								else
								{
									$size = $objAttribute->get('size');  // set default output
									if($size[0] < 1 && $size[1] < 1)
									{
										$size = array('',50,'proportional');
									}
									$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
									$image = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$src, $size)->getUrl($projectDir);
									
									$replace = ControllerHelper::callstatic('generateImage',array($image,$k));
								}
							break;
							case 'files':
								$replace = \Contao\FilesModel::findByPk($v)->path;
								// multiple
								// multiple images
								if($objAttribute->get('eval_multiple'))
								{
									$v = \Contao\StringUtil::deserialize($arrRow[$k]);
									$src = \Contao\FilesModel::findMultipleByUuids($v)->path;
									break;
								}
			
								break;
							default:
								$objBackendIntegration = new \PCT\CustomElements\Backend\BackendIntegration();
								
								$objAttribute->setOrigin($objOrigin);
								$objAttribute->set('objCustomCatalog',$objCC);
								$objAttribute->set('arrRow',$arrRow);
								$objAttribute->setValue($v);
								$objAttribute->set('strInserttag',$chunk);
								
								// trigger HOOK: allow other extensions to manipulate the wildcard value
								$varValueFromHook = \PCT\CustomElements\Core\Hooks::callstatic('processWildcardValue',array($v,$objAttribute,$arrRow['id'],$strTable));
								if($varValueFromHook != null)
								{
									$v = $varValueFromHook;
								}

								// call the wildcard rendering process from CustomElements if attribute is a CustomElement widget
								// #528
								if($varValueFromHook === null && $objAttribute->get('type') == 'customelement')
								{
									$varValueFromHook = $objBackendIntegration->generateBackendWildcard($objCC->get('pid'),$arrRow['id'],$strTable);
								}
								
								if($varValueFromHook != null)
								{
									$v = $varValueFromHook;
								}

								// use rendering methods
								$query = \explode('=',$params);
								if( \in_array($query[0], array('html','render') ) )
								{
									$objCallbacks = new \PCT\CustomElements\Plugins\CustomCatalog\Attributes\AttributeCallbacks();

									$objTemplate = null;
									if( empty($query[1]) === false )
									{
										$objTemplate = new \Contao\BackendTemplate($query[1]);
										$objTemplate->setData($arrRow);
										$objTemplate->objCustomCatalog = $objCC;
										$objTemplate->strTable = $strTable;
									}
									$v = $objCallbacks->renderAttribute($k,$v,$objTemplate,$objAttribute);
								}
								
								$replace = $v;
								break;
						}
					}
					else
					{
						$replace = (isset($arrRow[$k]) ? $arrRow[$k] : '');
					}
					
					if(strlen($replace) < 1)
					{
						continue;
					}
	
					$strBuffer = str_replace($chunk, $replace, $strBuffer);
				}
			}
			
			$objDC = new \StdClass;
			$objDC->table = $strTable;
			$objDC->activeRecord = $arrRow;
			
			// replace customcatalog inserttags
			$objInsertTags = \PCT\CustomElements\Plugins\CustomCatalog\Core\InsertTags::getInstance();
			$strBuffer = $objInsertTags->replaceCustomCatalogInsertTags($strBuffer,$objCC,$objDC);
			
			$strReturn = $strBuffer;
			if( empty($strBuffer) === true )
			{
				$strReturn = \Contao\System::getContainer()->get('contao.insert_tag.parser')->replace($strBuffer);
			}
		}
		
		return $strReturn;
	}


	/**
	 * Hook function for custom operation buttons and buttons not in the default dca set
	 * @param string
	 * @param object CustomCatalog
	 * @param object CustomElement
	 * @paraam object
	 * @return array
	 */
	public function getCustomButton($strKey,$objCC=null,$objCE=null,$objSystemHelper=null)
	{
		$strTable = '';
		
		if($objCC !== null)
		{
			$strTable = $objCC->getTable();
		}
		
		$arrReturn = array();
		$strLanguage = Multilanguage::getActiveBackendLanguage($strTable);
		
		switch($strKey)
		{
			case 'edit':
				$arrReturn = array
				(
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['edit'],
					'href'                => 'act=edit',
					'icon'                => 'edit.svg',
					'button_callback'	  => array(get_class($this),'getEditButton')
				);
				return $arrReturn;
				break;
		case 'delete':
				$arrReturn = array
				(
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['delete'],
					'href'                => 'act=delete',
					'icon'                => 'delete.svg',
					'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
					'button_callback'	  => array(get_class($this),'getDeleteButton')
				);
				break;
				return $arrReturn;
			case 'cut':
				$arrReturn = array
				(
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['cut'],
					'href'                => 'act=paste&amp;mode=cut'.($strLanguage ? '&amp;lang='.$strLanguage : ''),
					'icon'                => 'cut.gif',
					'attributes'          => 'onclick="Backend.getScrollOffset()"',
				);
				return $arrReturn;
				break;
			case 'editheader':
				$arrReturn = array
				(
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['edit'],
					'href'                => 'act=edit'.($strLanguage ? '&amp;lang='.$strLanguage : ''),
					'icon'                => 'edit.svg',
					'button_callback'	  => array(get_class($this),'getEditHeaderButton')
				);
				if( \version_compare(ContaoCoreBundle::getVersion(),'5.0','<') )
				{
					$arrReturn['icon'] = 'header.svg';
				}
				return $arrReturn;
			case 'editchild':
				$arrReturn = array
				(
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['edit_child'],
					'href'                => 'table=%s'.($strLanguage ? '&amp;lang='.$strLanguage : ''),
					'icon'                => 'children.svg',
				);
				if( \version_compare(ContaoCoreBundle::getVersion(),'5.0','<') )
				{
					$arrReturn['icon'] = 'edit.svg';
				}
				break;
			case 'toggle':
				
				$strPublishedField = $objCC->getPublishedField();
				$arrReturn = array
				(
					'href'                => 'act=toggle&amp;field='.$strPublishedField,
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['toggle'],
					'icon'                => 'visible.svg',
					#'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
					'button_callback'     => array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration', 'toggleIcon')
				);
				break;
			case 'copyChilds':
				$arrReturn = array
				(
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['copyChilds'],
					'href'                => 'act=paste&amp;mode=copy&amp;childs=1'.($strLanguage ? '&amp;lang='.$strLanguage : ''),
					'icon'                => 'copychilds.gif',
					'attributes'          => 'onclick="Backend.getScrollOffset()"',
				);
			// language switch
			case 'langswitch':
				$arrReturn = array
				(
					'label'               => &$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['langswitch'],
					'href'                => '',
					'attributes'          => 'onclick="Backend.getScrollOffset();"',
					'button_callback'     => array(get_class($this),'getLanguageSwitchButton')
				);
				break;
			default:
				// check if buttons is a toggler from a checkbox attribute
				$objAttribute = null;
				if(Cache::getAttribute('cc_'.$objCC->db_result->id.'_'.$strKey))
				{
					$objAttribute = Cache::getAttribute('cc_'.$objCC->db_result->id.'_'.$strKey);
				}
				else
				{
					$objAttribute = AttributeFactory::findByAlias($strKey);
				}
				
				if($objAttribute)
				{
					$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
					
					$strIconOn = '';
					$strIconOff = '';
					$size = array('16','16','center_center');

					$objFile = \Contao\FilesModel::findByPk($objAttribute->get('icon'));
					if( $objFile !== null )
					{
						$strIconOn = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, $size)->getUrl($projectDir);
					}
					
					$objFile = \Contao\FilesModel::findByPk($objAttribute->get('icon_off'));
					if( $objFile !== null )
					{
						$strIconOff = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, $size)->getUrl($projectDir);
					}
					
					$arrReturn = array
					(
						'label'               => array($objAttribute->get('title'),$objAttribute->get('description')),
						'icon'                => $strIconOn,
						'attr_id'			  => $objAttribute->get('id'),
						'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleAnyState(this,%s)" data-attr_id="'.$objAttribute->get('id').'" data-icon="'.$strIconOn.'" data-icon_off="'.$strIconOff.'"',
						'button_callback'     => array('PCT\CustomElements\Plugins\CustomCatalog\Backend\BackendIntegration', 'toggleAnyIcon')
					);
				}
				
				// hook here?
			break;
		}

		return $arrReturn;
	}
	
	
	/**
	 * Return the edit button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getEditButton($row, $href, $label, $title, $icon, $attributes,$strTable)
	{
		$this->import(BackendUser::class,'User');
		$strLanguage = Multilanguage::getActiveBackendLanguage($strTable);
		$strToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();

		$langpid = Multilanguage::getBaseRecordId($row['id'],$strTable,$strLanguage);
		
		$href .= ($langpid > 0 ? '&amp;langpid='.$langpid : '');
		
		if( Controller::isBackend() || (!\Contao\Config::get('disableRefererCheck') && Controller::isFrontend() ) )
		{
			$href .= '&amp;rt='.$strToken;
		}
		
		if(strlen(strpos($href, 'table=')) < 1)
		{
			$href .= '&amp;table='.$strTable;
		}
		
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) ? '<a href="'.\Contao\Backend::addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
	
	
	/**
	 * Return the editheader button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getEditHeaderButton($row, $href, $label, $title, $icon, $attributes,$strTable)
	{
		$this->import(BackendUser::class,'User');
		$strLanguage = Multilanguage::getActiveBackendLanguage($strTable);
		$strToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
		$langpid = Multilanguage::getBaseRecordId($row['id'],$strTable,$strLanguage);
		$href .= ($langpid > 0 ? '&amp;langpid='.$langpid : '');
		
		if( Controller::isBackend() || (!\Contao\Config::get('disableRefererCheck') && Controller::isFrontend() ) )
		{
			$href .= '&amp;rt='.$strToken;
		}
		
		if(strlen(strpos($href, 'table=')) < 1)
		{
			$href .= '&amp;table='.$strTable;
		}
		
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) ? '<a href="'.\Contao\Backend::addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
	
	
	/**
	 * Return the delete button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function getDeleteButton($row, $href, $label, $title, $icon, $attributes,$strTable)
	{
		$this->import(BackendUser::class,'User');
		$strLanguage = Multilanguage::getActiveBackendLanguage($strTable);
		$strToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
		$langpid = Multilanguage::getBaseRecordId($row['id'],$strTable,$strLanguage);
		$href .= ($langpid > 0 ? '&amp;langpid='.$langpid : '');
		
		if( Controller::isBackend() || (!\Contao\Config::get('disableRefererCheck') && Controller::isFrontend() ) )
		{
			$href .= '&amp;rt='.$strToken;
		}
		
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) ? '<a href="'.\Contao\Backend::addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
	
	
	/**
	 * Return the paste button without the paste into link
	 */
	public function getPasteButtonWithoutPasteInto($objDC, $arrRow, $strTable, $cr, $arrClipboard=null)
	{
		$imagePasteAfter = \Contao\Image::getHtml('pasteafter.gif', sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['pasteafter'][1], $arrRow['id']));
		$imagePasteInto = \Contao\Image::getHtml('pasteinto.gif', sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['pasteinto'][1], $arrRow['id']));
		
		$labelPasteAfter = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['pasteafter'][1], $arrRow['id']);
		$labelPasteInto = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['pasteinto'][1], $arrRow['id']);
		$strToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
		
		if ( (isset($GLOBALS['TL_DCA'][$objDC->table]['config']['ptable']) && $strTable == $GLOBALS['TL_DCA'][$objDC->table]['config']['ptable']) || $arrRow['id'] == 0)
		{
			$labelPasteInto = $GLOBALS['TL_LANG'][$objDC->table]['pasteafter'][1] ?? $GLOBALS['TL_LANG']['DCA']['pasteafter'][1] ?? 'Paste';
			
			return '<a href="'.\Contao\Backend::addToUrl('act='.$arrClipboard['mode'].'&amp;mode=2&amp;pid='.$arrRow['id'].(!\is_array($arrClipboard['id']) ? '&amp;id=' . $arrClipboard['id'] : '').'&amp;rt='.$strToken).'" title="'.$labelPasteInto.'" onclick="Backend.getScrollOffset()">'.$imagePasteInto.'</a>';
		}

		if( ($arrClipboard['mode'] == 'cut' && $arrClipboard['id'] == $arrRow['id'])  || ($arrClipboard['mode'] == 'cutAll' && in_array($arrRow['id'], $arrClipboard['id'])) )
		{
			return \Contao\Image::getHtml('pasteafter_.gif');
		}
		else
		{
			$labelPasteAfter = $GLOBALS['TL_LANG'][$objDC->table]['pasteafter'][1] ?? $GLOBALS['TL_LANG']['DCA']['pasteafter'][1] ?? 'Paste';
			return '<a href="'.\Contao\Backend::addToUrl('act='.$arrClipboard['mode'].'&amp;mode=1&amp;pid='.$arrRow['id'].'&amp;rt='.$strToken.(!is_array($arrClipboard['id']) ? '&amp;id='.$arrClipboard['id'] : '')).'" title="'.$labelPasteAfter.'" onclick="Backend.getScrollOffset()">'.$imagePasteAfter.'</a>';
		}
	}
	
	
	/**
	 * Return the language switch operation button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string 
	 */
	public function getLanguageSwitchButton($row, $href, $label, $title, $icon, $attributes,$strTable)
	{
		$objCC = CustomCatalogFactory::findByTableName($strTable);
		if($objCC === null)
		{
			return '';
		}
		
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		if(!$objCC->multilanguage || strlen($objCC->languages) < 1 || (!$this->User->isAdmin && !$objSecurity->isGranted('contao_user.pct_customcatalogsp.create')))
		{
			return '';
		}
		
		$arrLanguages = \Contao\StringUtil::deserialize($objCC->languages);
		$arrContaoLanguages = \Contao\System::getContainer()->get('contao.intl.locales')->getLocales(null, true); #\Contao\Controller::getLanguages();
		$strLanguage = Multilanguage::getActiveBackendLanguage($strTable);
		$strToken = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
		
		// remove the current language from the language switch because the regular edit button will work
		if(in_array($strLanguage, $arrLanguages))
		{
			unset($arrLanguages[array_search($strLanguage, $arrLanguages)]);
			// insert the base record on first position
			\Contao\ArrayUtil::arrayInsert($arrLanguages,0,array('__base__'));
		}
		
		// find base records
		$langpid = Multilanguage::getBaseRecordId($row['id'],$strTable,$strLanguage);
		
		// add langswitchand the language parent id GET parameters
		$strUrlBase = \Contao\Backend::addToUrl($href.'&langswitch=1'.($langpid > 0 ? '&langpid='.$langpid : ''));
		
		// request token
		if( Controller::isBackend() || (!\Contao\Config::get('disableRefererCheck') && Controller::isFrontend() ) )
		{
			$strUrlBase .= '&amp;rt='.$strToken;
		}
		$strBuffer = '<span class="languageswitch"><i class="fa fa-flag"></i><ul>';
		$arrList = array();
		foreach($arrLanguages as $lang)
		{
			$href = $strUrlBase;
			$class = $lang;
				
			// base record
			if($lang == '__base__')
			{
				$title = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['langswitch_base'][1],$langpid);
				$href = \PCT\CustomElements\Helper\Functions::addToUrl('act=edit&id='.$langpid,$href);
				$text = '<span class="link">'.$GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['langswitch_base'][0].'</span>';
				$class .= ' edit';
			}
			// language records
			else
			{
				// check if language entry has been created yet
				$langid = Multilanguage::getLanguageRecordId($langpid,$strTable,$lang);
				
				// edit existing language record
				if($langid > 0)
				{
					$title = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['langswitch_edit'][1],$langid,strtoupper($lang));
					$href = \PCT\CustomElements\Helper\Functions::addToUrl('act=edit&id='.$langid.'&amp;language='.$lang,$href);
					$class .= ' edit';
				}
				// new language record
				else
				{
					$title = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['langswitch_new'][1],strtoupper($lang));
					
					// create new
					if($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['QLAM']['mode'] == 'create')
					{
						$href = \PCT\CustomElements\Helper\Functions::addToUrl('act=create&amp;language='.$lang,$href);
					}
					// create copy
					else
					{
						$href = \PCT\CustomElements\Helper\Functions::addToUrl('act=copy&id='.$row['id'].'&amp;language='.$lang,$href);
					}
					
					$class .= ' new';
				}
				
				// link text
				$text = '<span class="link">'.sprintf($GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['QLAM']['linkTextLogic'],$arrContaoLanguages[$lang],$lang).'</span>';
			}
			
			$strBuffer .= '<li class="'.$class.' sibling">'.'<a href="'.urldecode($href).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.$text.'</a> '.'</li>';
		}
		$strBuffer .= '</ul></span>';
		
		return $strBuffer;
	}


	/**
	 * Default list child records callback
	 * @param array
	 * @return string
	 */
	public function listChildRecords($arrRow)
	{
		return '<div class="tl_content_left">' . $this->generateListLabels($arrRow). '</div>';
	}


	/**
	 * Return the header fields of a parent custom catalog as array
	 * @param string
	 * @return array
	 */
	public function getParentHeaderFields($strParent)
	{
		$objCC = CustomCatalogFactory::findByTableName($strParent);
		if(!$objCC)
		{
			return array();
		}

		$objCE = CustomElementFactory::findById($objCC->get('pid'));
		if(!$objCE)
		{
			return array('id');
		}

		if(!$objCE->getGroups())
		{
			return array('id');
		}

		$arrReturn = array();
		foreach($objCE->getGroups() as $objGroup)
		{
			if(!$objGroup->getAttributes())
			{
				continue;
			}

			foreach($objGroup->getAttributes() as $objAttribute)
			{
				if(!$objAttribute->get('be_visible'))
				{
					continue;
				}

				switch($objAttribute->get('type'))
				{
				case 'image':case 'files':
					// ignore any file types in header fields
					break;
				default:
					$arrReturn[] = $objAttribute->get('alias') ? $objAttribute->get('alias') : $objAttribute->get('id');
					break;
				}

			}
		}

		return $arrReturn;
	}
	
	
	/**
	 * General create callback, called anytime a custom catalog record is being created
	 * @param string
	 * @param integer
	 * @param array
	 * @param object
	 */
	// !oncreate_callback
	public function generalCreateCallback($strTable,$intRecord,$arrData=array(),$objDC=null)
	{
		$objDbCC = CustomCatalogFactory::fetchByTableName($strTable);

		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession()->getBag('contao_backend');
		$new_records = $objSession->get('new_records');
		
		if( !is_array($new_records[$strTable]) )
		{
			$new_records[$strTable] = array();
		}

		if($objDbCC->multilanguage && !in_array($intRecord, $new_records[$strTable]) )
		{
			$new_records[$strTable][] = $intRecord;
			$objSession->set('new_records',$new_records);
		}

		// HOOK call the general Hook
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('generalDataContainerHook',array('oncreate',$objDC,null,$objDbCC));
	}
	

	/**
	 * General onsubmit callback, called anytime a custom catalog record is being submitted
	 * @param object
	 */
	// !onsubmit_callback
	public function generalSubmitCallback($objDC=null)
	{
		if($objDC === null)
		{
			return;
		}

		// objDC @var FrontendUser||mixed
		if( \method_exists($objDC,'getTable') )
		{
			$objDC->table = $objDC->getTable();
		}

		if( empty($objDC->table) )
		{
			$objDC->table = $objDC->__get('table');
		}

		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		$strLanguage = Multilanguage::getActiveBackendLanguage($objDC->table);
		$objDbCC = CustomCatalogFactory::fetchByTableName($objDC->table);
		
		if( isset($objDbCC->multilanguage) && $objDbCC->multilanguage && \Contao\Input::get('act') == 'edit')
		{
			// reset the backend messages
			\Contao\Message::reset();
			
			$langpid = (int)\Contao\Input::get('langpid');
			$langcid = (int)\Contao\Input::get('langcid'); // for base records coming from language record

			// is base record, without langpid GET parameter
			if(strlen($strLanguage) < 1 && (\Contao\Input::get('langpid') < 1 || !\Contao\Input::get('langpid')) )
			{
				$langpid = $objDC->id;
			}
			
			// update the lang reference
			if( $langcid > 0 )
			{
				Multilanguage::updateLanguageRecord($langcid,$objDC->table,array('pid'=>$objDC->id,'tstamp'=>time()));
			}

			if( Multilanguage::isLanguageRecord($objDC->id,$objDC->table,$strLanguage) === false )
			{
				Multilanguage::insertNewLanguageEntry($objDC->id,$langpid,$objDC->table,$strLanguage);
			}

			
			// in mode5 check if language entry is nested and has a language parent
			if(in_array($objDbCC->list_mode,array(5)) && strlen($strLanguage) > 0 && $objActiveRecord->pid > 0)
			{
				$objLanguageParent = null;
				if(Multilanguage::isBaseRecord($objActiveRecord->pid,$objDC->table))
				{
					$objLanguageParent = Multilanguage::findBaseRecord($objActiveRecord->pid,$objDC->table,$strLanguage);
				}
				else
				{
					$objLanguageParent = Multilanguage::findLanguageRecord($objActiveRecord->pid,$objDC->table,$strLanguage);
				}
				
				if($objLanguageParent->id > 0)
				{
					// update this record with the new pid
					$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set( array('pid'=>$objLanguageParent->id) )->execute($objDC->id);
				}
			}
		}

		// purge the DCA cache
		if( isset($objDbCC->multilanguage) )
		{
			Maintenance::purgeFileCache( $objDbCC->id );
		}

		// HOOK call the general Hook
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('generalDataContainerHook',array('onsubmit',$objDC,$objActiveRecord,$objDbCC));
	}
	
	
	/**
	 * General onload callback, called anytime a custom catalog record is being loaded
	 * @param object
	 */
	// !onload_callback
	public function generalLoadCallback($objDC=null)
	{
		if($objDC === null)
		{
			return;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		if( $objDatabase->tableExists($objDC->table) === false )
		{
			return;
		}

		// objDC @var FrontendUser||mixed
		if( \method_exists($objDC,'getTable') )
		{
			$objDC->table = $objDC->getTable();
		}

		if( empty($objDC->table) )
		{
			$objDC->table = $objDC->__get('table');
		}
		
		
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$objDbCC = null;
		// look up from cache
		if(Cache::getCustomCatalog($objDC->table))
		{
			$objCC = Cache::getCustomCatalog($objDC->table);
			$objDbCC = $objCC->db_result;
		}
		else
		{
			$objDbCC = CustomCatalogFactory::fetchByTableName($objDC->table);
		}

		if( $objDbCC == null )
		{
			return;
		}

		$strLanguage = Multilanguage::getActiveBackendLanguage($objDC->table);

		// remove non standard filters from session
		$this->removeFiltersFromSession($objDC);
		
		// apply custom sortings
		$this->applyCustomSortings($objDC);
		
		// remove the active language session if multilanguage has been turned of
		if( $objDC !== null && $objDbCC !== null && !$objDbCC->multilanguage && strlen($strLanguage) > 0 && $objDbCC->languages)
		{
			Multilanguage::resetLanguageByTable($objDC->table);
			\Contao\Controller::reload();
		}
		
		// reset the filter if no language references exist anymore (e.g. after deleting), resets the language panel also
		if($objDbCC !== null && $objDbCC->multilanguage && $objDbCC->languages && !\Contao\Input::get('act') && strlen( $strLanguage ) > 0 && !$GLOBALS['PCT_CUSTOMCATALOG']['BACKEND']['showAllLanguagesInPanel'])
		{
		   $objLanguages = $objDatabase->prepare("SELECT lang FROM tl_pct_customcatalog_language WHERE lang=? AND source=?")->execute($strLanguage,$objDC->table);
		   if($objLanguages->numRows < 1)
		   {
			   Multilanguage::resetLanguageByTable($objDC->table);
			   \Contao\Controller::reload();
		   }
		}
		
		// multilanguage
		if($objDbCC !== null && $objDbCC->multilanguage && \Contao\Input::get('act') == 'edit' && $objDbCC->languages && \Contao\Input::get('langswitch') == '')
		{
			$langpid = (int)\Contao\Input::get('langpid');
			$langcid = (int)\Contao\Input::get('langcid');

			// record not been saved yet
			if($objActiveRecord->tstamp < 1)
			{
				if(strlen($strLanguage) > 0)
				{
					\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['languageEntryPreviewInfo'],$strLanguage));
				}
				else
				{
					\Contao\Message::addInfo($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['baseEntryPreviewInfo']);
					// language reference info
					if( $langcid > 0 )
					{
						\Contao\Message::addInfo(sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMCATALOG']['MSC']['baseEntryReferenceInfo'],$langcid));
					}
				}
			}
			
			$blnIsBase = Multilanguage::isBaseRecord($objDC->id,$objDC->table);
			$blnIsLanguage = Multilanguage::isLanguageRecord($objDC->id,$objDC->table,$strLanguage);
			$arrSiblings = array();
			if($blnIsBase)
			{
				$arrSiblings = Multilanguage::findAssocLanguageSiblings($objDC->id,$objDC->table);
			}
			else
			{
				$arrSiblings = Multilanguage::findAssocLanguageSiblings($langpid,$objDC->table);
			}

			// create a new base record when coming from a language record
			if($objActiveRecord->tstamp > 0 && !$blnIsBase && strlen($strLanguage) < 1 && count($arrSiblings) > 0 && $langpid < 1 && !$blnIsLanguage && !\Contao\Environment::get('isAjaxRequest'))
			{
				$newId = $objDC->copy(true);
				
				// trigger the oncreate callback
				$this->generalCreateCallback($objDC->table,$newId);
					
				// update the new base record an set the tstamp to 0 so it is handled like a new created entry
				$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set( array('tstamp'=>0) )->execute($newId);
				
				// HOOK
				$objInfo = new \StdClass();
				$objInfo->action = 'create';
				$objInfo->newId = $newId;
				$objInfo->currId = $objDC->id;
				$objInfo->language = $strLanguage;
				$objInfo->isBaseRecord = true;
				Hooks::callstatic('newLanguageEntryHook',array($objInfo,$objDC,$objCC));
				
				// redirect to the new entry
				\Contao\Controller::redirect( \Contao\Backend::addToUrl('&amp;id='.$newId.'&langcid='.$objDC->id.'&rt='.Controller::request_token()) );
			}

			// show info when language record has no base record yet
			// dynamically create new entries
			if($objActiveRecord->tstamp > 0 && \Contao\Input::post('FORM_SUBMIT') != 'tl_fiters' && !\Contao\Environment::get('isAjaxRequest'))
			{
				// create base record and redirect to it
				if(strlen($strLanguage) < 1 && !$blnIsBase && count($arrSiblings) < 1 && $langpid != $objDC->id)
				{
					$newId = $objDC->copy(true);
				
					// trigger the oncreate callback
					$this->generalCreateCallback($objDC->table,$newId);
					
					// update the new base record an set the tstamp to 0 so it is handled like a new created entry
					$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set( array('tstamp'=>0) )->execute($newId);
					
					// HOOK
					$objInfo = new \StdClass();
					$objInfo->action = 'create';
					$objInfo->newId = $newId;
					$objInfo->currId = $objDC->id;
					$objInfo->language = $strLanguage;
					$objInfo->isBaseRecord = true;
					Hooks::callstatic('newLanguageEntryHook',array($objInfo,$objDC,$objCC));
					
					#// redirect to the new entry
					\Contao\Controller::redirect( \Contao\Backend::addToUrl('&amp;id='.$newId.'&rt='.Controller::request_token()) );
				}
				// create a new language record and redirect to it
				else if(strlen($strLanguage) > 0 && empty($arrSiblings[$strLanguage]) && !$blnIsLanguage)
				{
					$newId = $objDC->copy(true);
					
					// trigger the oncreate callback
					$this->generalCreateCallback($objDC->table,$newId);
					
					// update the new base record an set the tstamp to 0 so it is handled like a new created entry
					$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set( array('tstamp'=>0) )->execute($newId);
					
					// coming from base record
					if($langpid < 1 && $langpid != $objDC->id)
					{
						$langpid = $objDC->id;
					}
					
					$objDC->langpid = $langpid;
					
					// HOOK
					$objInfo = new \StdClass();
					$objInfo->action = 'create';
					$objInfo->newId = $newId;
					$objInfo->currId = $objDC->id;
					$objInfo->language = $strLanguage;
					$objInfo->isBaseRecord = false;
					Hooks::callstatic('newLanguageEntryHook',array($objInfo,$objDC,$objCC));
					
					\Contao\Controller::redirect( \Contao\Backend::addToUrl('langpid='.$langpid.'&amp;id='.$newId.'&rt='.Controller::request_token()) );
				}
				else
				{
					// WELCOME HOME
				}
				
				// add the langpid to the url if not done yet
				if($langpid < 1 && strlen($strLanguage) > 0 && $blnIsLanguage)
				{
				   $langpid = Multilanguage::getBaseRecordId($objDC->id,$objDC->table,$strLanguage);
				   if($langpid)
				   {
					\Contao\Controller::redirect( \Contao\Backend::addToUrl('langpid='.$langpid.'&rt='.Controller::request_token(),true,array('langcid')) );
				   }
				}
				
				// back to mother entry
				if($langpid > 0 && $langpid != $objDC->id && strlen($strLanguage) < 1)
				{
					\Contao\Controller::redirect( \Contao\Backend::addToUrl('id='.$langpid.'&rt='.Controller::request_token(),true,array('langcid')) );
				}
				
				// toggle between language records
				if(strlen($strLanguage) > 0 && $arrSiblings[$strLanguage] > 0 && $arrSiblings[$strLanguage] != $objDC->id)
				{
					\Contao\Controller::redirect( \Contao\Backend::addToUrl('id='.$arrSiblings[$strLanguage].'&rt='.Controller::request_token(),true,array('langcid')) );
				}
				
			}
			
		}
		
		// remove duplicate fields in subpalettes loaded by CE widget attributes in editAll or overrideAll mode (#594)
		if( in_array(\Contao\Input::get('act'), array('editAll','overrideAll')) && !empty($GLOBALS['TL_DCA'][$objDC->table]['palettes']) && is_array($GLOBALS['TL_DCA'][$objDC->table]['palettes']) )
		{
			foreach($GLOBALS['TL_DCA'][$objDC->table]['palettes'] as $selector => $palette)
			{
				if(is_array($palette) || is_array($selector) || !is_string($palette)) 
				{
					continue;
				}
				
				$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$selector] = implode(',', array_unique( explode(',',$palette) ) );
			}
		}
		
		// HOOK call the generalOnloadHook
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('loadDataContainerHook',array($objDC,$objActiveRecord,$objDbCC));
		
		// HOOK call the general action Hook
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('generalDataContainerHook',array('onload',$objDC,$objActiveRecord,$objDbCC));
	}
	
	
	/**
	 * General oncut callback, called anytime a custom catalog record has been pasted
	 * @param object
	 */
	// !oncut_callback
	public function generalCutCallback($objDC=null)
	{
		if($objDC === null)
		{
			return;
		}

		// objDC @var FrontendUser||mixed
		if( \method_exists($objDC,'getTable') )
		{
			$objDC->table = $objDC->getTable();
		}

		if( empty($objDC->table) )
		{
			$objDC->table = $objDC->__get('table');
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$objDbCC = null;
		// look up from cache
		if(Cache::getCustomCatalog($objDC->table))
		{
			$objCC = Cache::getCustomCatalog($objDC->table);
			$objDbCC = $objCC->db_result;
		}
		else
		{
			$objDbCC = CustomCatalogFactory::fetchByTableName($objDC->table);
		}
		
		// multilanguage update the sorting in mode 5
		if($objDbCC->multilanguage && in_array($objDbCC->list_mode, array(5,'5.1')) && $objDbCC->languages)
		{
			$lang = Multilanguage::getActiveBackendLanguage($objDC->table);
			$root = $objActiveRecord->id;
			$sorting = $objActiveRecord->sorting;
			
			$arrSet = array('sorting'=>$objActiveRecord->sorting);
			
			$arrIds = array();
			
			$objLangSiblings = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE pid=? AND source=?")->execute($objDC->id,$objDC->table);
			if($objLangSiblings->numRows > 0)
			{
				$arrIds = array_merge($arrIds,$objLangSiblings->fetchEach('id'));
			}
			
			$objLangRecord = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE id=? AND source=?")->limit(1)->execute($objDC->id,$objDC->table);
			if($objLangRecord->numRows > 0)
			{
				$arrIds = array_merge($arrIds,$objLangRecord->fetchEach('pid'));
				
				$objLangSiblings = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE pid=? AND source=?")->execute($objLangRecord->pid,$objDC->table);
				if($objLangSiblings->numRows > 0)
				{
					$arrIds = array_merge($arrIds,$objLangSiblings->fetchEach('id'));
				}
			}
			
			$arrIds = array_diff(array_unique($arrIds),array($objDC->id));
			
			if(count($arrIds) > 0)
			{
				$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id IN(".implode(',', array_unique($arrIds) ).")")->set($arrSet)->execute();
			}
		}

		// purge the DCA cache
		if($objDbCC->multilanguage)
		{
			Maintenance::purgeFileCache( $objDbCC->id );
		}
		
		// HOOK call the general Hook
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('generalDataContainerHook',array('oncut',$objDC,$objActiveRecord,$objDbCC));
	}
	
	
	/**
	 * General oncopy callback, called anytime a custom catalog record is being duplicated
	 * @param integer
	 * @param object
	 */
	// !oncopy_callback
	public function generalCopyCallback($intRecord, $objDC=null)
	{
		if($objDC === null)
		{
			return;
		}

		// objDC @var FrontendUser||mixed
		if( \method_exists($objDC,'getTable') )
		{
			$objDC->table = $objDC->getTable();
		}

		if( empty($objDC->table) )
		{
			$objDC->table = $objDC->__get('table');
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$objDbCC = null;
		// look up from cache
		if(Cache::getCustomCatalog($objDC->table))
		{
			$objCC = Cache::getCustomCatalog($objDC->table);
			$objDbCC = $objCC->db_result;
		}
		else
		{
			$objDbCC = CustomCatalogFactory::fetchByTableName($objDC->table);
		}
		
		// mark the alias reference field with "copy"
		if($objDbCC->aliasField > 0)
		{
			$objAliasAttribute = AttributeFactory::fetchById($objDbCC->aliasField);
			$objAliasSource = null;
			if($objAliasAttribute->aliasSource > 0)
			{
				$objAliasSource = AttributeFactory::fetchById($objAliasAttribute->aliasSource);
			}
			
			if(strlen($objActiveRecord->{$objAliasSource->alias}) > 0)
			{
				$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array( $objAliasSource->alias => sprintf($GLOBALS['TL_LANG']['MSC']['copyOf'], $objActiveRecord->{$objAliasSource->alias}) ))->execute($intRecord);
			}
		}
		
		// mark custom fields with "copy"
		if(is_array($GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesMarkedOnCopy']) && !empty($GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesMarkedOnCopy']))
		{
			$arrSet = array();
			foreach($GLOBALS['PCT_CUSTOMCATALOG']['fieldnamesMarkedOnCopy'] as $f)
			{
				if(strlen($objActiveRecord->{$f}) > 0)
				{
					$arrSet[$f] = sprintf($GLOBALS['TL_LANG']['MSC']['copyOf'], $objActiveRecord->{$f});
				}
			}
			
			if(count($arrSet) > 0)
			{
				$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set($arrSet)->execute($intRecord);
			}	
		}

		// purge the DCA cache
		if($objDbCC->multilanguage)
		{
			Maintenance::purgeFileCache( $objDbCC->id );
		}
		
		// HOOK call the general Hook
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('generalDataContainerHook',array('oncopy',$objDC,$objActiveRecord,$objDbCC));
	}
	
	
	/**
	 * General ondelete callback, called anytime a custom catalog record is being deleted
	 * @param integer
	 * @param object
	 */
	// !ondelete_callback
	public function generalDeleteCallback($objDC=null,$intUndo)
	{
		if($objDC === null)
		{
			return;
		}

		// objDC @var FrontendUser||mixed
		if( \method_exists($objDC,'getTable') )
		{
			$objDC->table = $objDC->getTable();
		}
		
		$objDbCC = null;
		// look up from cache
		if(Cache::getCustomCatalog($objDC->table))
		{
			$objCC = Cache::getCustomCatalog($objDC->table);
			$objDbCC = $objCC->db_result;
		}
		else
		{
			$objDbCC = CustomCatalogFactory::fetchByTableName($objDC->table);
		}
		
		// delete the language reference
		if($objDbCC->multilanguage)
		{
			$strLang = Multilanguage::getActiveBackendLanguage($objDC->table);
			$arrPurge = array();
			$arrData = array();
			
			$objDatabase = \Contao\Database::getInstance();
			
			if($intUndo)
			{
				$objUndo = $objDatabase->prepare("SELECT * FROM tl_undo WHERE id=?")->limit(1)->execute($intUndo);
				$arrData = \Contao\StringUtil::deserialize($objUndo->data);
			}
			
			// fetch all other language records
			$objLang = null;
			
			// is base record: fetch all language records
			if(strlen($strLang) < 1)
			{
				$objLang = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE pid=? AND source=?")->execute($objDC->id,$objDC->table);
			}
			// is language record
			else
			{
				$objLang = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE id=? AND source=?")->execute($objDC->id,$objDC->table);
			}
			
			if($objLang->numRows > 0)
			{
				while($objLang->next())
				{
					$arrRow = $objLang->row();
					
					// add to the undo data
					$arrData['tl_pct_customcatalog_language'][] = $arrRow;
					
					// delete the language record on base record delete
					if(strlen($strLang) < 1 && $objLang->id != $objDC->id && $GLOBALS['PCT_CUSTOMCATALOG']['deleteLanguageRecordOnBaseRecordDelete'])
					{
						$arrPurge[$objDC->table][] = $objLang->id;
						
						$objRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->execute($objLang->id);
							
						$arrData[$objDC->table][] = $objRecord->row();
					}
				}
			}
			
			if(count($arrPurge) > 0)
			{
				foreach($arrPurge as $strTable => $arrIds)
				{
					$objDatabase->prepare("DELETE FROM ".$strTable." WHERE ".$objDatabase->findInSet('id',$arrIds))->execute();
				}
			}
			
			// update the undo record
			if($intUndo && count($arrData) > 0)
			{
				$objDatabase->prepare("UPDATE tl_undo %s WHERE id=?")->set(array('data'=>serialize($arrData)))->execute($intUndo);
			}
		}
		
		$objDC->intUndo = $intUndo;

		// purge the DCA cache
		if($objDbCC->multilanguage)
		{
			Maintenance::purgeFileCache( $objDbCC->id );
		}
		
		// HOOK call the generalOnloadHook
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Hooks::callstatic('generalDataContainerHook',array('ondelete',$objDC,null,$objDbCC));
	}


//! Backend filter, sorting, search helper


	/**
	 * Must remove filter field from Session because contao adds a nonsense query for each filter field
	 * @param object
	 * @param string
	 */
	public function removeFiltersFromSession($objDC)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'];
		$arrSession = $objSession->all();
		
		$objSessionBag = $objSession->getBag('contao_backend');
		$arrSessionBag = $objSessionBag->all();

		if( !isset($GLOBALS['PCT_CUSTOMCATALOG']['filterFields'][$objDC->table]) || empty($GLOBALS['PCT_CUSTOMCATALOG']['filterFields'][$objDC->table]))
		{
			return;
		}

		$arrFilterFields = $GLOBALS['PCT_CUSTOMCATALOG']['filterFields'][$objDC->table];
		
		foreach( \array_keys($arrFilterFields) as $strField )
		{
			//-- filters
			$value = $arrSession['filter'][$objDC->table][$strField] ?? '';
			
			if( isset($arrSessionBag['filter'][$objDC->table][$strField]) && $arrSessionBag['filter'][$objDC->table][$strField] )
			{
				$value = $arrSessionBag['filter'][$objDC->table][$strField];
			}
			
			// remove the custom filter field from the regular contao session because the values won't fit
			unset($arrSession['filter'][$objDC->table][$strField]);
			
			// open a helper session
			if(\Contao\Input::post($strField) != 'tl_'.$strField && strlen($value) > 0)
			{
				$arrSession[$strSession][$objDC->table][$strField] = $value;
			}
			// remove the value from the helper session
			else if(\Contao\Input::post($strField) == 'tl_'.$strField)
			{
				unset($arrSession[$strSession][$objDC->table][$strField]);
			}
			//--
			
			//-- search
			if( isset($arrSession['search'][$objDC->table]['field']) && $arrSession['search'][$objDC->table]['field'] == $strField)
			{
				$value = $arrSession['search'][$objDC->table]['value'];
				
				unset($arrSession['search'][$objDC->table]['value']);
				unset($arrSession['search'][$objDC->table]['field']);
				
				// open a helper session
				$arrSession[$strSession.'_search'][$objDC->table]['value'] = $value;
				$arrSession[$strSession.'_search'][$objDC->table]['field'] = $strField;
			}
			//--

			// remove from contao_backend session bag
			#unset($arrSessionBag['filter'][$objDC->table][$strField]);
			#unset($arrSessionBag['search'][$objDC->table]['value']);
			$objSessionBag->replace($arrSessionBag);
		}
		
		$objSession->replace($arrSession);
	}
	
	
	/**
	 * Apply custom sortings
	 * @param object
	 */
	public function applyCustomSortings($objDC)
	{
		$objCC = \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findByTableName($objDC->table);
		if($objCC === null || empty($GLOBALS['PCT_CUSTOMCATALOG']['sortFields'][$objDC->table]) )
		{
			return ;
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'];
		$arrSession = $objSession->all($strSession);
		
		$arrSortFields = $GLOBALS['PCT_CUSTOMCATALOG']['sortFields'][$objDC->table]; 
		$blnApply = false;
		$strSession = $GLOBALS['PCT_CUSTOMCATALOG']['backendFilterSession'];
		

		$strBeSorting = $arrSession['sorting'][$objDC->table] ?? '';
		
		//	store fields for custom sorting
		$arrListFields = \Contao\StringUtil::deserialize($objCC->get('list_fields')) ?: array();
		
		// replace custom order parts with their regular field names
		if( isset($arrSession[$strSession]['sortings'][$objDC->table]) && is_array($arrSession[$strSession]['sortings'][$objDC->table]) && count($arrSession[$strSession]['sortings'][$objDC->table]) > 0)
		{
			foreach($arrSession[$strSession]['sortings'][$objDC->table] as $strField => $value)
			{
				if(strlen(strpos($strBeSorting, $value)) > 0)
				{
					$strBeSorting = str_replace($value, $strField, $strBeSorting);
				}
			} 
		}
		
		// current sortings applied by backend user
		$arrTl_sort = explode(',', $strBeSorting); 
		
		$arrSortings = array();
		foreach($arrSortFields as $strField => $arrData)
		{
			// prozess only when needed
			// continue if the user uses manual sorting but the field is not selected
			if(!in_array($strField, $arrTl_sort) && !empty($arrSession['sorting'][$objDC->table]))
			{
				continue;
			}
			
			$objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($arrData['id']);
			$objAttribute->setOrigin($objCC);
			$objAttribute->set('objCustomCatalog',$objCC);
			
			$strSorting = '';
			if(method_exists($objAttribute, 'getBackendSortingOptions'))
			{
				$strSorting = $objAttribute->getBackendSortingOptions($arrData,$strField,$objAttribute,$objDC);
			}
			
			$arrSortings[$strField] = $strSorting;
		}
		
		$arrSortings = array_unique( array_filter($arrSortings) );
		
		// apply user sortings
		if( isset($arrSession['sorting'][$objDC->table]) && strlen($arrSession['sorting'][$objDC->table]) > 0 && count($arrSortings) > 0)
		{
			$arrTl_sort = explode(',', $arrSession['sorting'][$objDC->table] ); 
			
			if(array_intersect($arrTl_sort, array_keys($arrSortings)))
			{
				$blnApply = true;
			}			
		}
		// default sorting
		else if( !isset($arrSession['sorting'][$objDC->table]) || strlen($arrSession['sorting'][$objDC->table]) < 1 && count($arrSortings) > 0)
		{
			$blnApply = true;
		}
		
		// apply
		if($blnApply)
		{
			// store the custom sortings
			$arrSession[$strSession]['sortings'][$objDC->table] = $arrSortings;
			
			// set contaos sorting session
			$arrSession['sorting'][$objDC->table] = implode(',', $arrSortings);
			
			$objSession->replace($arrSession);
		}
	}


	/**
	 * Remove content elements from the global array
	 * @param array		Stack of elements to be removed
	 */
	public function removeContentElements($arrExclude)
	{
		if(count($arrExclude) < 1 || empty($GLOBALS['TL_CTE'])|| !is_array($GLOBALS['TL_CTE']))
		{
			return;
		}
		
		foreach($arrExclude as $flag)
		{
			foreach($GLOBALS['TL_CTE'] as $k => $v)
			{
				if(isset($GLOBALS['TL_CTE'][$k][$flag]))
				{
					unset($GLOBALS['TL_CTE'][$k][$flag]);
				}
			}
		}
	}
	
	
	/**
	 * Check if a value is unique against the language and return boolean
	 * @param string
	 * @param object
	 * @param string
	 * @return boolean
	 */
	public function isUniqueForLanguage($varValue,$objDC,$strLanguage='')
	{
		if(strlen($strLanguage) < 1 && (strlen($objDC->language) > 0 || strlen($objDC->lang) > 0) )
		{
			$strLanguage = $objDC->language ?: $objDC->lang;
		}
		$objDatabase = \Contao\Database::getInstance();
		$strTable = $objDC->table;
		$strField = $objDC->field;
		
		$objLanguageSiblings = $objDatabase->prepare("SELECT * FROM tl_pct_customcatalog_language WHERE lang=? AND source=? AND id!=?")->execute($strLanguage,$strTable,$objDC->id);

		if($objLanguageSiblings->numRows > 0)
		{
			$objAlias = $objDatabase->prepare("SELECT id,".$strField." FROM ".$objDC->table." WHERE id IN(". implode(',', $objLanguageSiblings->fetchEach('id') ).") AND ".$strField."=?")
			->execute($varValue);
			
			// at least one entry with the same alias existis for the language
			if($objAlias->numRows > 0)
			{
				return false;
			}
		}
		
		
		return true;
	}
	
	
	/**
	 * Unique verification in a multilanguge environment
	 * Designed to use in a save_callback for a DCA field
	 * @param mixed
	 * @param object
	 * @return mixed
	 */
	public function checkUniqueForLanguages($varValue,$objDC)
	{
		$strLanguage = Multilanguage::getActiveBackendLanguage($objDC->table);
		if(strlen($strLanguage) < 1 && (strlen($objDC->language) > 0 || strlen($objDC->lang) > 0) )
		{
			$strLanguage = $objDC->language ?: $objDC->lang;
		}
		
		if(!$this->isUniqueForLanguage($varValue,$objDC,$strLanguage))
		{
			if(strlen($strLanguage) < 1)
			{
				throw new \Exception($GLOBALS['TL_LANG']['ERR']['unique']);
			}
			
			throw new \Exception(sprintf($GLOBALS['TL_LANG']['ERR']['unique_multilanguage'],$objDC->field,'"'.$strLanguage.'"'));
		}
		
		return $varValue;
	}


	/**
	 * @inherit doc
	 */
	public function splitPalette($strPalette)
	{
		return parent::splitPalette($strPalette);
	}


	/**
	 * Load CC related DataContainers on Ajax events
	 * @param string
	 */
	public function executePreActionsCallback($strAction)
	{
		switch($strAction)
		{
			case 'reloadFiletree':
			case 'reloadPagetree':
			case 'reloadTabletree':
				$strTable = \Contao\Input::get('table') ?: \Contao\Input::post('table');
				// look up from backend modules
				$arrTables = array($strTable);
				if( empty($strTable) && \Contao\Input::get('do') != '' )
				{
					foreach($GLOBALS['BE_MOD'] as $arrSections)
					{
						foreach($arrSections as $module => $data)
						{
							if( \Contao\Input::get('do') == $module && is_array($data['tables']) )
							{
								$arrTables = array_merge($arrTables, $data['tables']);
							}
						}
					}
				}
				
				$arrTables = array_unique( array_filter($arrTables) );

				if( empty($arrTables) )
				{
					throw new \Exception('No DCA information found');
				}

				foreach( $arrTables as $strTable )
				{
					if( CustomCatalogFactory::validateByTableName($strTable) )
					{
						$objCCs = \PCT\CustomElements\Models\CustomCatalogModel::findAllActive(array());
					
						foreach($objCCs as $objCC)
						{
							$table = $objCC->mode == 'existing' ? $objCC->existingTable : $objCC->tableName;
							if( $table != $strTable )
							{
								continue;
							}
							$objSystem = new \PCT\CustomElements\Plugins\CustomCatalog\Core\SystemIntegration;
							$objSystem->loadDCA($objCC->id);
						}
					}
				}
				break;
		}
	}


	/**
	 * Purge the file cache on file save_callbacks
	 * @param mixed
	 * @param object
	 * 
	 * triggerd by save_callback
	 */
	public function purgeFileCacheOnSaveCallback($varValue,$objDC)
	{
		\PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance::purgeFileCache($objDC);
		return $varValue;
	}
}