<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_iconpicker
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\IconPicker;

use Contao\Controller;
use Contao\Input;
use Contao\StringUtil;
use Contao\System;

/**
 * Class file
 * IconPicker
 * Provide various function to extend contao with font icon classes and the font picker widget link
 */
class IconPicker
{
	/**
	 * Add icon style sheets to the page <head>
	 */
	public function addStyleSheetsToPage()
	{
		$request = System::getContainer()->get('request_stack')->getCurrentRequest();
		if( System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) )
		{
			return;
		}

		// load backend styles
		$GLOBALS['TL_CSS'][] = 'system/modules/pct_iconpicker/assets/css/iconpicker.css';
		
		// load stylesheet files
		$arrFiles = $this->getFiles();
		
		foreach($arrFiles as $file)
		{
			$GLOBALS['TL_CSS'][] = $file;
		}
	}


	/**
	 * Return the files list
	 * @return array
	 */
	public function getFiles()
	{
		$arrFiles = array();
		
		$rootDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		// load local file in backend
		if( \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request) && file_exists($rootDir.'/'.$GLOBALS['PCT_ICONPICKER']['fontaweseomeLocal']))
		{
			$arrFiles[] = $GLOBALS['PCT_ICONPICKER']['fontaweseomeLocal'];
		}
		// front end
		else if( \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isFrontendRequest($request) )
		{
			$arrFiles[] = $GLOBALS['PCT_ICONPICKER']['fontaweseomeLocal'];
		}

		// add custom icon stylesheets
		if( isset($GLOBALS['TL_CONFIG']['iconStylesheets']) && \is_array($GLOBALS['TL_CONFIG']['iconStylesheets']) )
		{
			foreach(\Contao\StringUtil::deserialize($GLOBALS['TL_CONFIG']['iconStylesheets']) as $v)
			{
				$file = \Contao\FilesModel::findByPk($v)->path;
				//ignore default icon file
				if( isset($GLOBALS['PCT_ICONPICKER']['pct_defaultCssIconFile']) && $file == $GLOBALS['PCT_ICONPICKER']['pct_defaultCssIconFile'])
				{
					continue;
				}
				
				$arrFiles[] = $file;	
			}
		}

		return $arrFiles;
	}

	
	/**
	 * Return the font icon picker
	 * @param object
	 * @return string
	 */
	public function fontIconPicker($objDC)
	{
		$GLOBALS['TL_CSS'][] = 'system/modules/pct_iconpicker/assets/css/iconpicker.css';
		
		$intId = $objDC->id;
		if( isset($objDC->activeRecord->pid) )
		{
			$intId = $objDC->activeRecord->pid;
		}
		
		$token = System::getContainer()->get('contao.csrf.token_manager')->getDefaultTokenValue();
	
		#$href = 'system/modules/pct_iconpicker/assets/html/iconpicker.php?do=' . \Contao\Input::get('do'). '&amp;table=' . $objDC->table. '&amp;id='.$intId.'&amp;field=' . $objDC->field . '&amp;value=' . $objDC->value.'&amp;rt='.$token.'&amp;switch=1';
		$params = array
		(
			'key' => 'iconpicker',
			'do' => Input::get('do'),
			'table' => $objDC->table,
			'field' => $objDC->field,
			'value' => $objDC->value,
			'rt' => $token,
			'switch' => 1
		);
		#do=' . \Contao\Input::get('do'). '&amp;table=' . $objDC->table. '&amp;id='.$intId.'&amp;field=' . $objDC->field . '&amp;value=' . $objDC->value.'&amp;rt='.$token.'&amp;switch=1';
		
		$href = Controller::addToUrl( \http_build_query($params),true,array('act') );
		$link = \Contao\Image::getHtml('system/modules/pct_iconpicker/assets/img/icon.svg', $GLOBALS['TL_LANG']['MSC']['fontIconPicker'], 'style=";cursor:pointer"');
		$inputName = $objDC->field;
		
		$return = '<a href="' . StringUtil::ampersand($href) . '" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['fontIconPicker']) . '" id="pp_' . $inputName . '">' . $link . '</a>
		<script>
			$("pp_' . $inputName . '").addEvent("click", function(e) {
			e.preventDefault();
			Backend.openModalSelector({
				"id": "'.$objDC->field.'",
				"title": ' .json_encode($GLOBALS['TL_LANG']['MSC']['fontIconPicker']) . ',
				"url": this.href + "&value=" + document.getElementById("ctrl_' . $inputName . '").value,
				"callback": function(picker, value) 
				{
					$("ctrl_' . $inputName . '").value = value.join(",");
					$("ctrl_' . $inputName . '").fireEvent("change");
				}.bind(this)
			});
			});
		</script>';
		$return .= '<div class="icon"><i class="'.$objDC->value.'"></i></div>';
		
		// load CSS files to backend
		$this->addStyleSheetsToPage();

		return $return;
	}
	

	/**
	 * Attach the current icon to the field value
	 */
	public function attachIcon($varValue,$objDC)
	{
		if(!$varValue)
		{
			return $varValue;
		}
		
		$this->addStyleSheetsToPage();
		
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['fontIcon']['eval']['tl_class'] .= ' pct_iconpicker_widget contao-ht35'.$varValue;
		
		return $varValue;
	}	
}