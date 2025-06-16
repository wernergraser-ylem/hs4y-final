<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_themer
 */

/**
 * Namespace
 */
namespace PCT\ThemeDesigner;

/**
 * Class file
 * Navigation
 */
class Navigation
{
	/**
	 * The template for each navigation level
	 * @var string
	 */
	protected $strNavTemplate = 'td_nav';
	
	/**
	 * Store navigations items
	 * @var array
	 */
	protected $arrItems = array();
	
	/**
	 * Set a hard limit
	 * @var integer
	 */
	protected $intHardLimit = 0;
	
	/**
	 * Start section
	 * @var string
	 */
	protected $strSection = '';
	
	/**
	 * ThemeDesigner config array
	 * @var array
	 */
	protected $arrConfig = array();
	
	/**
	 * Store subsections
	 * @param array
	 */
	protected $arrSubSections= array();
	
	/**
	 * Store the trail
	 * @param array
	 */
	protected $arrTrail = array();
	
	/**
	 * The active section name
	 * @param string
	 */
	protected $strActive = '';
	
	
	/**
	 * Init
	 */
	public function __construct($intHardLimit=0)
	{
		if(!is_array($GLOBALS['PCT_THEMEDESIGNER_CONFIG']))
		{
			return;
		}
		
		$this->arrConfig = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'];
		$this->intHardLimit = $intHardLimit;
		
		$this->ThemeDesigner = new \PCT\ThemeDesigner;
		$arrSession = $this->ThemeDesigner->getSession();
		
		$this->strActive = $arrSession['NAVI']['active'] ?? '';
		
		if(\Contao\Input::get('section') != '')
		{
			$this->strActive = \Contao\Input::get('section');
		}
	}
	
	
	/**
	 * Setter
	 * @param string
	 * @param mixed
	 */
	public function set($strKey, $varValue)
	{
		switch($strKey)
		{
			case 'template':
				$strKey = 'strNavTemplate';
				break;
			case 'section':
				$strKey = 'strSection';
				break;
			case 'hardlimit':
				$strKey = 'intHardLimit';
				break;
		}
		
		$this->{$strKey} = $varValue;
	}
	
	
	/**
	 * Getter
	 * @param string
	 */
	public function get($strKey)
	{
		return $this->{$strKey};
	}
	
	
	/**
	 * Catch ajax requests
	 * @param object
	 * @param object
	 * @param object
	 * called from: generatePage Hook
	 */
	public function ajaxListener()
	{
		if( !\Contao\Environment::get('isAjaxRequest') )
		{
			return ;
		}
		
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		$arrSession = $objSession->get($this->strSession);
		if(!is_array($arrSession))
		{
			$arrSession = array();
		}
		
		
		switch(\Contao\Input::get('action'))
		{
			case 'showSection':
				// store active section name
				$arrSession['active'] = \Contao\Input::get('section');
				break;
			case 'toggleSection':
				
				if($arrSession['active'] != \Contao\Input::get('section'))
				{
					$arrSession['active'] = \Contao\Input::get('section');
				}
				else
				{
					unset($arrSession['active']);
				}
				
				break;
		}
		
		$objSession->set($this->strSession,$arrSession);
	}

	
	/**
	 * Render the navigation block
	 * @return string
	 */
	public function render($strTemplate='themedesigner',$arrSections=array())
	{
		$objTemplate = new \Contao\FrontendTemplate($strTemplate);
		
		if(count($arrSections) < 1)
		{
			$arrSections = \PCT\ThemeDesigner::getMainSections();
		}
		
		$objTemplate->content = $this->renderNavigation( $arrSections );
		$objTemplate->type = 'navigation';
		$objTemplate->items = $this->arrItems;
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Render the navigation items and return the html string
	 * @param string
	 * @param integer
	 * @return string
	 */
	protected function renderNavigation($arrSections=array(),$intLevel=0, $strParent='')
	{
		if(count($arrSections) < 1 || ($this->intHardLimit > 0 && $intLevel >= $this->intHardLimit) )
		{
			return '';
		}
		
		$intLevel++;
		
		$objTemplate = new \Contao\FrontendTemplate( $this->strNavTemplate );
		$objTemplate->type = get_class($this);
		$objTemplate->level = 'level_'.$intLevel;
		$arrSession = $this->ThemeDesigner->getSession();
		if( !isset($arrSession['DEVICE']) )
		{
			$arrSession['DEVICE'] = 'desktop';
		}
		
		$arrReturn = array();
		
		foreach($arrSections as $section)
		{
			if(!array_key_exists($section, $this->arrConfig))
			{
				continue;
			}
			
			// beginn trail
			$this->arrTrail[$section] = $section;
			
			// hide in menu
			if( isset($GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['config']['hideInMenu']) && (boolean)$GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['config']['hideInMenu'] === true)
			{
				continue;
			}
			
			$label = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['label'] ?? array($section,'');
			$attributes = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['attributes'] ?? '';
			$arrDevices = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['devices'] ?? array();

			$blnClickable = true;
			if(isset($GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['config']['clickable']))
			{
				$blnClickable = (boolean)$GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['config']['clickable'];
			}
			
			$data_attributes = 'data-section="'.$section.'"';
			
			// clickable attribute
			$data_attributes .= ' data-clickable="'.($blnClickable === false ? 0 : 1).'"';
			
			// data-device attribute
			if( !empty($arrDevices) )
			{
				$data_attributes .= ' data-devices="'.implode(',',$arrDevices).'"';
			}

			$item = array
			(
				'section' 			=> $section,
				'title' 			=> $label[0],
				'description' 		=> $label[1],
				'attributes'		=> $attributes.$data_attributes,
				'link'				=> $label[0],
				'href'				=> \Contao\Environment::get('request').'#td_'.$section,
				'data_attributes'	=> $data_attributes,
				'clickable'			=> $blnClickable,
				'target' 			=> '',
				'isActive'			=> false,
			);
			
			// active
			if(\Contao\Input::get('section') == $section || $this->strActive == $section)
			{
				$item['isActive'] = true;
			}
			
			$subitems = '';
			
			// render subsections
			$childs = $GLOBALS['PCT_THEMEDESIGNER_CONFIG'][$section]['csection'] ?? array();
			
			if(!empty($childs) && is_array($childs))
			{
				// mark as subsection to avoid first level rendering
				foreach($childs as $child)
				{
					$this->arrSubSections[] = $child;
				}
				
				$subitems = $this->renderNavigation($childs, $intLevel, $section);
			}
					
			$class = array('item',$section, ($blnClickable === false ? 'not_clickable' : 'clickable') );
			if(strlen($subitems) > 0)
			{
				$class[] = 'submenu';
				$item['hasSubitems'] = true;
			}

			// hide by devices
			if( ( (boolean)$GLOBALS['PCT_THEMEDESIGNER']['showNaviWithNoDevice'] === false && empty($arrDevices) ) || (!in_array($arrSession['DEVICE'] ?: '',$arrDevices) && !empty($arrDevices)) )
			{
				$class[] = 'hidden';
			}

			$item['subitems'] = $subitems;
			$item['class'] = implode(' ', $class);
			
			$arrReturn[] = $item;
		}
		
		// remove first level subsections
		if($intLevel == 1 && count($this->arrSubSections) > 0 && count($arrReturn) > 0)
		{
			foreach($this->arrSubSections as $section)
			{
				foreach($arrReturn as $i => $data)
				{
					if($data['section'] == $section && $section != $this->strSection)
					{
						unset($arrReturn[$i]);
						unset($this->arrTrail[$section]);
					}
				}
			}
		}
		
		if(!empty($arrReturn))
		{
			$last = count($arrReturn) - 1;

			$arrReturn[0]['class'] = trim($arrReturn[0]['class'] . ' first');
			$arrReturn[$last]['class'] = trim($arrReturn[$last]['class'] . ' last');
		}
		
		$this->arrItems = $arrReturn;
		
		$objTemplate->items = $arrReturn;
		
		return (!empty($arrReturn) ? $objTemplate->parse() : '');
	}
}