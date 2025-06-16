<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 		Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author  		Tim Gatzky <info@tim-gatzky.de>
 * @package  		pct_customelements
 * @link  			http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Backend;

/**
 * Imports
 */
use PCT\CustomElements\Core\CustomElements as CustomElements;
use PCT\CustomElements\Core\CustomElementFactory as CustomElementFactory;
use PCT\CustomElements\Core\Cache as Cache;
use Contao\BackendUser;
use PCT\CustomElements\Core\Controller;

/**
 * Class file
 * BackendIntegration
 * Provide methods to generate the backend interface for the custom elements
 */
class BackendIntegration extends \Contao\Backend
{
	/**
	 * Current widget
	 * @param object
	 */
	protected $objWidget;
	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import(BackendUser::class, 'User');
	}


	/**
	 * Generate the backend view for the current custom element
	 * @param DataContainer
	 * @return DataContainer
	 *
	 * called from onload_callback HOOK
	 */
	public function buildBackendView($objDC)
	{
		if(\Contao\Input::get('act') != 'edit')
		{
			return $objDC;
		}
		
		$objActiveRecord = $objDC->activeRecord;
		$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
		if($objActiveRecord === null && class_exists($strModel))
		{
			if( \method_exists($strModel,'setTable') )
			{
				$strModel::setTable( $objDC->table );
			}
			$objActiveRecord = $strModel::findByPk($objDC->id);
		}
		else if($objActiveRecord === null && !class_exists($strModel))
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		// get the selection field for the current table
		$selectionfield = CustomElements::getSelectionField($objDC->table);
		
		if(strlen($selectionfield) < 1)
		{
			return;
		}
		
		// return if field is already been created
		if(in_array($GLOBALS['TL_DCA'][$objDC->table]['fields'][$selectionfield]['inputType'],array('pct_customelements','pct_customelement')) )
		{
			return;
		}
		
		$objCustomElement = CustomElementFactory::findByAlias($objActiveRecord->{$selectionfield});
		if(!$objCustomElement)
		{
			return;
		}
		
		// return if no permission
		if(!$objCustomElement->hasAccess())
		{
			return;
		}

		// check if CE is really enabled for being a content element or module
		if( ($objDC->table == 'tl_content' && !$objCustomElement->isCTE) || ($objDC->table == 'tl_module' && !$objCustomElement->isFMD) )
		{
			return;
		}

		$strType = $objActiveRecord->{$selectionfield};
				
		// Prepare the CustomElementWidget as wrapper for all the fields etc
		$strGenericCustomElementField = 'customelement_widget_'.$objDC->id;
		$GLOBALS['TL_DCA'][$objDC->table]['fields'][$strGenericCustomElementField] = array
		(
			'label'     	=> array('',''),
			'exclude'    	=> false,
			'inputType'    => 'pct_customelement',
			'input_field_callback'  => array(get_class($this),'generateGenericCustomElementField'),
		);
		
		// search for a placeholder
		if(strlen(strpos($GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'],'###CUSTOMELEMENT_WIDGET###')) > 0)
		{
			$strPalette = str_replace('###CUSTOMELEMENT_WIDGET###', $strGenericCustomElementField, $GLOBALS['TL_DCA'][$objDC->table]['palettes']['default']);
		}
		else
		{
			$objDcaHelper = \PCT\CustomElements\Helper\DcaHelper::getInstance()->setTable($objDC->table);
			
			// get current default palettes
			$arrPalettes = $objDcaHelper->getPalettesAsArray('default');
			
			// build default palettes
			$arrPalettes['custom_legend'] = array($strGenericCustomElementField);
			$arrPalettes['protected_legend:hide'] = array('protected');
			$arrPalettes['template_legend:hide'] = array('customTpl');
			$arrPalettes['expert_legend:hide'] = array('guests','cssID','space');
			$arrPalettes['invisible_legend:hide'] = array('invisible','start','stop');
			
			// set palettes
			$strPalette = $objDcaHelper->generatePalettes($arrPalettes);
		}
		
		// set the palette
		$GLOBALS['TL_DCA'][$objDC->table]['palettes'][$strType] = $strPalette;
		
		// handle tables with no type selction
		if(count($GLOBALS['TL_DCA'][$objDC->table]['palettes']) < 2)
		{
			$GLOBALS['TL_DCA'][$objDC->table]['palettes']['default'] = $strPalette;
		}
		
		// custom legend
		$GLOBALS['TL_LANG'][$objDC->table]['custom_legend'] = sprintf($GLOBALS['TL_LANG']['PCT_CUSTOMELEMENTS']['custom_legend'],$objCustomElement->get('title'));
		
		return $objDC;
	}
	
	
	/**
	 * Add the customelement templates to the custom template selection
	 * @param object
	 * @return array
	 */
	public function getTemplates($objDC=null)
	{
		if( $objDC->activeRecord === null )
		{
			$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
			if(class_exists($strModel))
			{
				$objDC->activeRecord = $strModel::findByPk($objDC->id);
			}
			else
			{
				$objDC->activeRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
			}
		}

		$strSelectionField = CustomElements::getSelectionField($objDC->table);
		$objCustomElemnts = new CustomElements;

		$arrCustomElements = $objCustomElemnts->getCustomElements($objDC->table);
		if( \in_array($objDC->activeRecord->{$strSelectionField}, $arrCustomElements) === false )
		{
			return \Contao\Controller::getTemplateGroup('ce_' . $objDC->activeRecord->type . '_', array(), 'ce_' . $objDC->activeRecord->type);
		}
		
		$objCE = CustomElementFactory::findByAlias($objDC->activeRecord->{$strSelectionField});
		$arrTemplates = $this->getTemplateGroup($objCE->template, array(), $objCE->template);
		
		if( !isset($GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['eval']['includeBlankOption']) || (boolean)$GLOBALS['TL_DCA'][$objDC->table]['fields']['customTpl']['eval']['includeBlankOption'] === false )
		{
			unset( $arrTemplates[$objCE->template] );
		}
		
		$arrContaos = array();
		if($objDC->table == 'tl_content')
		{
			$arrContaos = $this->getTemplateGroup('ce_');
		}
		else if($objDC->table == 'tl_module')
		{
			$arrContaos = $this->getTemplateGroup('mod_');
		}

		return array_merge($arrTemplates,$arrContaos);
	}

	

	/**
	 * Return the default palette for a table
	 * @param string
	 * @return string
	 */
	protected function getDefaultPalette($strTable)
	{
		$this->loadDataContainer($strTable);
		return $GLOBALS['TL_DCA'][$strTable]['palettes']['default'];
	}


	/**
	 * Create the widget and return it as object
	 * @param object DataContainer
	 * @return object
	 */
	public function prepareGenericCustomElementWidget($objDC)
	{
		$objActiveRecord = $objDC->activeRecord;
		$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
		if($objActiveRecord === null && class_exists($strModel))
		{
			$objActiveRecord = $strModel::findByPk($objDC->id);
		}
		else if($objActiveRecord === null && !class_exists($strModel))
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$strGenericCustomElementField = 'generic_customelement_'.$objDC->id;
		$objWidget = new $GLOBALS['BE_FFL']['pct_customelement']
		(
			array
			(
				'strId'    => $strGenericCustomElementField,
				'strTable' => $objDC->table,
				'strField' => $strGenericCustomElementField,
				'strName'  => $strGenericCustomElementField,
				'varValue' => '',
				'objDataContainer' => $objDC,
				'objActiveRecord' => $objActiveRecord,
			),
			$objDC
		);
		
		return $objWidget;
	}


	/**
	 * Generate the widget and return as string
	 * @param object DataContainer
	 * @return string
	 */
	public function generateGenericCustomElementField($objDC)
	{
		$objWidget = $this->prepareGenericCustomElementWidget($objDC);
		$strBuffer = $objWidget->generate();
		
		return $strBuffer;
	}
	
	
	/**
	 * Generate backend wildcard
	 * @param integer	Id of the custom element to be displayed
	 * @param integer	Id of the contao element carrying the custom element
	 * @param string	The source table e.g. tl_content or tl_module
	 */
	public function generateBackendWildcard($intCustomElement,$intElement,$strTable)
	{
		$objDatabase = \Contao\Database::getInstance();
		
		// check if element is an include element
		if($strTable == 'tl_content')
		{
			$objElement = \Contao\ContentModel::findByPk($intElement);
			if($objElement->type == 'alias')
			{
				$intElement = $objElement->cteAlias;
			}
			// type module
			else if($objElement->type == 'module')
			{
				$strTable = 'tl_module';
				$intElement = $objElement->id;
			}
		}
		else if($strTable == 'tl_module')
		{
			$objElement = \Contao\ModuleModel::findByPk($intElement);
		}
		
		// fetch the customelement
		$objCustomElement = CustomElementFactory::findById($intCustomElement);
		if($objCustomElement === null)
		{
			return;
		}
		
		// fetch attributes to be displayed in the wildcard
		$objAttributes = \PCT\CustomElements\Core\AttributeFactory::findMultipleByCustomElement($intCustomElement);
		$objVault = \PCT\CustomElements\Core\Vault::getInstance();
		
		$strReturn = '<div class="customelement_wildcard">';
		$strReturn .= '<p class="type">### CUSTOM CONTENT ELEMENT ###</p>';
		$strReturn .= '<p class="title '.($strTable == 'tl_module' ? 'include_module' : '').'">### '.$objCustomElement->get('title').' ###</p>';
		
		if($objAttributes !== null)
		{
			$strReturn .= '<ul class="attributes">';
			foreach($objAttributes as $objAttribute)
			{
				if( $objAttribute === null || !$objAttribute->published || !$objAttribute->be_visible )
				{
					continue;
				}
				
				$value = $objVault::getValue($objAttribute->get('uuid'),$intElement,$strTable,array('saveDataAs'=>$objAttribute->get('saveDataAs')));
				
				if(!$objAttribute->getOrigin())
				{
					$objOrigin = \PCT\CustomElements\Core\Origin::getInstance();
					$objOrigin->set('intPid',$intElement);
					$objOrigin->set('strTable',$strTable);
					$objAttribute->setOrigin($objOrigin);
				}
				
				// trigger HOOK: allow other extensions to manipulate the wildcard value
				$valueFromHook = \PCT\CustomElements\Core\Hooks::callstatic('processWildcardValue',array($value,$objAttribute,$intElement,$strTable));
				if(isset($valueFromHook) && !empty($valueFromHook))
				{
					$value = $valueFromHook;
				}
				
				// implode arrays
				if(is_array($value))
				{
					$value = implode(',', $value);
				}
				
				$strReturn .= '<li class="sibling"><span class="title cell first">'.$objAttribute->get('title').'</span><span class="value cell last">'.$value.'</span></li>';
			}
			$strReturn .= '</ul>';
		}
		
		$strReturn .= '</div>';
		
		// add the stylesheet
		$this->loadAssets();
		
		// trigger HOOK: allow other extensions to manipulate the wildcard output
		$strReturn = \PCT\CustomElements\Core\Hooks::callstatic('generateWildcardHook',array($strReturn,$objAttributes,$this));
		
		return $strReturn;
	}
	
	
	/**
	 * Load stylesheets and scripts
	 */
	public function loadAssets()
	{
		if( Controller::isBackend() === false )
		{
			return;
		}

		$GLOBALS['TL_CSS'][] = PCT_CUSTOMELEMENTS_PATH.'/assets/css/styles.css';
		// load contao fonts
		$GLOBALS['TL_CONFIG']['loadGoogleFonts'] = true;
		
		// load font-awesome
		if(\Contao\Config::get('fontaweseome') == 'cdn')
		{
			$GLOBALS['TL_CSS'][] = '//maxcdn.bootstrapcdn.com/font-awesome/'.PCT_CUSTOMELEMENTS_FONTAWESOME_VERSION.'/css/font-awesome.min.css';
		}
		else
		{
			$GLOBALS['TL_CSS'][] = PCT_CUSTOMELEMENTS_PATH.'/assets/font-awesome/'.PCT_CUSTOMELEMENTS_FONTAWESOME_VERSION.'/css/font-awesome.min.css';
		}
		
		// load js
		$GLOBALS['TL_JAVASCRIPT'][] = PCT_CUSTOMELEMENTS_PATH.'/assets/js/CustomElements.js';
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
			$objJsMooFxSlide = new \Contao\BackendTemplate('be_js_moo_fxslide');
			$objTemplate->javascripts .= $objJsMooFxSlide->parse();
		}
	}	
	
	
	/**
	 * Inject the versionnumber in the backend page
	 * @param object
	 * 
	 * Called from [parseTemplate] Hook
	 */
	public function injectVersionnumberInBackendPage($objTemplate)
	{
		if($objTemplate->getName() == 'be_main' && \Contao\Input::get('do') == 'pct_customelements')
		{
			// show customcatalog version number
			$objTemplate->headline .= '<span class="version">'.PCT_CUSTOMELEMENTS_VERSION.'</span>';
		}
	}
}