<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2013
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  revolutionslider
 * @link  http://contao.org
 * @license  http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace RevolutionSlider\Backend;

/**
 * Imports
 */
use Contao\Input;
use Contao\Image;
use Contao\Database;
use Contao\StringUtil;

/**
 * Class file
 * TableContent
 * Provide methods for table tl_content in do='revolutionslider'
 */
class TableContent extends \Contao\Backend
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
	 * Modify the DCA
	 * @param object
	 */
	public function modifyDCA($objDC)
	{
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['type']['default'] = 'revolutionslider_text';
		unset($GLOBALS['TL_DCA'][$objDC->table]['fields']['type']['options_callback']);
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['type']['options'] = $GLOBALS['REVOLUTIONSLIDER']['allowedContentElements'];
	}


	/**
	 * Return all slider ids as array
	 * @param object
	 * @return array
	 */
	public function getSliders()
	{
		$objSliders = \RevolutionSlider\Models\Slider::findAll();
		
		if($objSliders === null)
		{
			return array();
		}
		
		$arrReturn = array();
		while($objSliders->next())
		{
			$arrReturn[$objSliders->id] = $objSliders->title . ' (id:'.$objSliders->id.')';
		}
		
		asort($arrReturn);

		return $arrReturn;
	}


	/**
	 * Get all slides of the current slider an return as array
	 * @param object
	 * @return array
	 */
	public function getSlides($objDC)
	{
		$objSlides = Database::getInstance()->prepare(
			"SELECT * FROM tl_revolutionslider_slides WHERE pid=
			(
				SELECT pid FROM tl_revolutionslider_slides WHERE id=?
			) AND id!=? ORDER BY sorting"
		)->execute($objDC->activeRecord->pid,$objDC->activeRecord->pid);

		if($objSlides->numRows < 1)
		{
			return array();
		}

		$arrReturn = array();
		while($objSlides->next())
		{
			$arrReturn[$objSlides->id] = $objSlides->title . ' (id:' .$objSlides->id.')';
		}

		return $arrReturn;
	}

	/**
	 * Modify the palettes depending on selected video type
	 * @param object
	 * @return object
	 */
	public function modifyPalettes($objDC)
	{
		if(Input::get('act') != 'edit')
		{
			return $objDC;
		}

		$objDatabase = Database::getInstance();
		$objActiveRecord = $objDC->activeRecord;
		if(!$objActiveRecord)
		{
			$objActiveRecord = $objDatabase->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if($objActiveRecord->type == 'revolutionslider_video')
		{
			// toggle palettes by video source
			if( $objActiveRecord->revolutionslider_videoType )
			{
				$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video'] = $GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video_'.$objActiveRecord->revolutionslider_videoType];
			}
			
			// RS Video standalone
			if( $objActiveRecord->ptable == 'tl_article')
			{
				$GLOBALS['TL_DCA']['tl_content']['palettes']['revolutionslider_video']  = '{type_legend},type,headline;{source_legend},revolutionslider_videoType,multiSRC,url,singleSRC;{video_settings_legend},revolutionslider_data_autoplay,revolutionslider_video_loop,revolutionslider_video_controls,revolutionslider_video_size;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';
			}
			
			#fix: overwrite default contao fields only when revolutionslider_video is active
			// singleSRC
			$GLOBALS['TL_DCA']['tl_content']['fields']['singleSRC']['label'] = &$GLOBALS['TL_LANG']['tl_content']['revolutionslider_video_singleSRC'];
			$GLOBALS['TL_DCA']['tl_content']['fields']['singleSRC']['eval']['mandatory'] = false;
			// multi src
			$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['mandatory'] = false;
			if( !isset($GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['tl_class']) )
			{
				$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['tl_class'] = '';
			}
			$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['tl_class'] .= ' w50';
			$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['multiple'] = false;
			$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['extensions'] = 'mp4';
			$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['filesOnly'] = true;
			$GLOBALS['TL_DCA']['tl_content']['fields']['multiSRC']['eval']['fieldType'] = 'radio';
			
			// url
			$GLOBALS['TL_DCA']['tl_content']['fields']['url']['label'] = &$GLOBALS['TL_LANG']['tl_content']['revolutionslider']['url'];
			$GLOBALS['TL_DCA']['tl_content']['fields']['url']['inputType'] = 'text';
			$GLOBALS['TL_DCA']['tl_content']['fields']['url']['wizard'] = null;
			$GLOBALS['TL_DCA']['tl_content']['fields']['url']['eval'] = array('mandatory'=>false);
		}
		
		
		if($objActiveRecord->type == 'revolutionslider_text')
		{
			$GLOBALS['TL_DCA']['tl_content']['fields']['text']['label'] = $GLOBALS['TL_LANG']['tl_content']['revolutionslider_text'];
			$GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval'] = array('style'=>'min-height:40px;','allowHtml'=>true);
		}
			
		if(!in_array($objActiveRecord->type, array('revolutionslider_text','revolutionslider_video','revolutionslider_hyperlink','revolutionslider_image') ) && !$GLOBALS['REVOLUTIONSLIDER']['alwaysShowPos9Grid'])
		{
			unset($GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_pos9grid']);
		}
		else
		{
			$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_position']['label'] = $GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_position_offset'];
			$GLOBALS['TL_DCA']['tl_content']['fields']['revolutionslider_data_position_m']['label'] = $GLOBALS['TL_LANG']['tl_content']['revolutionslider_data_position_offset_m'];
		}
	}
	
	
	/**
	 * Hide revolution slider fields outside its backend module
	 * @param object
	 */
	public function hideFields($objDC)
	{
		// fix #15: hide slider fields in editAll and overrideAll mode
		if(Input::get('do') != 'revolutionslider' && in_array(Input::get('act'),array('editAll','overrideAll')) )
		{
			foreach($GLOBALS['TL_DCA']['tl_content']['fields'] as $k => $v)
			{
				if(strlen(strpos($k, 'revolutionslider')) < 1 || $k === 'revolutionslider')
				{
					continue;
				}
				unset($GLOBALS['TL_DCA']['tl_content']['fields'][$k]);
			}
		}
	}


	/**
	 * Return the edit slider button next to the slider select
	 * @param object
	 * @return string
	 */
	public function getEditSliderButton($objDC)
	{
		if( (int)$objDC->value < 1 )
		{
			return '';
		}
		
		$title = $GLOBALS['TL_LANG']['tl_content']['editalias'];
		if ( \is_array($GLOBALS['TL_LANG']['tl_content']['editalias']) )
		{
			$title = $GLOBALS['TL_LANG']['tl_content']['editalias'][1];
		}
		$url = $this->addToUrl('do=revolutionslider&table=tl_revolutionslider_slides&id='.$objDC->value.'&popup=1',true,array('act'));
		return ' <a href="'.$url.'" title="' . sprintf(StringUtil::specialchars($title), $objDC->value) . '" onclick="Backend.openModalIframe({\'title\':\'' . StringUtil::specialchars(str_replace("'", "\\'", sprintf($title, $objDC->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.svg', $title) . '</a>';
	}
}
