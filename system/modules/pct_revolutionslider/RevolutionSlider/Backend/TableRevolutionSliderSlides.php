<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		revolutionslider
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace RevolutionSlider\Backend;

/**
 * Imports
 */

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\Input;
use Contao\Image;
use Contao\StringUtil;
use RevolutionSlider\Models\Slides;

/**
 * Class file
 * TableRevolutionSliderSlides
 * Provide methods for table tl_revolutionslider_slides
 */
class TableRevolutionSliderSlides extends \Contao\Backend
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
	 * Load styles
	 * @param object
	 */
	public function loadStyles($objDC)
	{
		$GLOBALS['TL_CSS'][] = REVOLUTIONSLIDER_PATH.'/assets/css/be_style.css';
	}
	
	
	/**
	 * List slides
	 * @param array
	 * @return string
	 */
	public function listSlides($arrRow)
	{
		return '<div class="tl_content_left">' . $arrRow['title'] . '</div>';
	}


	/**
	 * Modify the DCA 
	 * @param object
	 */
	public function modifyDCA($objDC)
	{
		if( $objDC->activeRecord === null )
		{
			$objDC->activeRecord = Slides::findByPk( $objDC->id );
		}

		// video MP4 background
		if( isset($objDC->activeRecord->background) && \in_array($objDC->activeRecord->background, array('videomp4','external')) )
		{
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['singleSRC']['label'] = &$GLOBALS['TL_LANG'][$objDC->table]['singleSRC_video'];
			$GLOBALS['TL_DCA'][$objDC->table]['fields']['singleSRC']['eval']['mandatory'] = false;
		}
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
		$table = 'tl_revolutionslider_slides';
		
		$href .= '&amp;id=' . $row['id'];

		if (!$row['published'])
		{
			$icon = 'invisible.svg';
		}

		$titleDisabled = (is_array($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label']) && isset($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label'][2])) ? sprintf($GLOBALS['TL_DCA'][$table]['list']['operations']['toggle']['label'][2], $row['id']) : $title;

		$data_icon = 'visible.svg';
		$data_icon_disabled = 'invisible.svg';
		if( version_compare('4.13',ContaoCoreBundle::getVersion(),'<=') )
		{
			$data_icon = \Contao\Image::getPath($data_icon);
			$data_icon_disabled = \Contao\Image::getPath($data_icon_disabled);
		}
		
		return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars(!$row['published'] ? $title : $titleDisabled) . '" data-title="' . StringUtil::specialchars($title) . '" data-title-disabled="' . StringUtil::specialchars($titleDisabled) . '" data-action="contao--scroll-offset#store" onclick="return AjaxRequest.toggleField(this,true)">' . \Contao\Image::getHtml($icon, $label, 'data-icon="'.$data_icon.'" data-icon-disabled="'.$data_icon_disabled.'" data-state="' . ($row['published'] ? 1 : 0) . '"') . '</a> ';
	}
	
	
	/**
	 * Return the link picker wizard
	 * @param DataContainer
	 * @return string
	 */
	public function pagePicker($objDC)
	{
		return ' <a href="contao/page.php?do=' . Input::get('do') . '&amp;table=' . $objDC->table . '&amp;field=' . $objDC->field . '&amp;value=' . str_replace(array('{{link_url::', '}}'), '', $objDC->value) . '" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['pagepicker']) . '" onclick="Backend.getScrollOffset();Backend.openModalSelector({\'width\':765,\'title\':\'' . StringUtil::specialchars(str_replace("'", "\\'", $GLOBALS['TL_LANG']['MOD']['page'][0])) . '\',\'url\':this.href,\'id\':\'' .$objDC->field . '\',\'tag\':\'ctrl_'. $objDC->field . ((Input::get('act') == 'editAll') ? '_' . $objDC->id : '') . '\',\'self\':this});return false">' . Image::getHtml('pickpage.gif', $GLOBALS['TL_LANG']['MSC']['pagepicker'], 'style="vertical-align:top;cursor:pointer"') . '</a>';
	}
}
