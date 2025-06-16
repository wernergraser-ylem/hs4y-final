<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_customelements_plugin_customcatalog
 * @filter		QueryWrapper
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

/**
 * Class file
 * Wrapper
 */
class Wrapper extends \PCT\CustomElements\Filter
{
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$options = array
		(
			'column'	=> '__wrapper__',
			'where'		=> ($this->get('type') == 'wrapperStart' ? '(' : ')' ),
			'eval'		=> array('combiner' => ' ','isWrapper'=>true,'type'=>$this->get('type')), // bypass the default combiner
		);
		
		return $options;
	}
}