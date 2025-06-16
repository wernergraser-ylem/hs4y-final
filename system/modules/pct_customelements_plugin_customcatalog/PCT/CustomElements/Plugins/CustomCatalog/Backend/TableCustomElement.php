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
 * @link  http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Plugins\CustomCatalog\Backend;

/**
 * Imports
 */
use PCT\CustomElements\Core\CustomElements as CustomElements;

/**
 * Class TableCustomElement
 */
class TableCustomElement extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		\Contao\System::import(\Contao\BackendUser::class, 'User');
	}
	

	/**
	 * Return the custom catalog
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function customCatalogButton($row, $href, $label, $title, $icon, $attributes)
	{
		$objSecurity = \Contao\System::getContainer()->get('security.helper');
		return ($this->User->isAdmin || $objSecurity->isGranted('contao_user.pct_customcatalogsp.create')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.\Contao\StringUtil::specialchars($title).'"'.$attributes.'>'.\Contao\Image::getHtml($icon, $label).'</a> ' : \Contao\Image::getHtml(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
	
}