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
 * @filter		Pagebreak filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;

/**
 * Class file
 * Pagebreak
 */
class Pagebreak extends \PCT\CustomElements\Filter
{
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// set the filter name
		$this->setName($GLOBALS['PCT_CUSTOMCATALOG']['urlPerPageParameter'].$this->get('module_id'));
		
		// check if the filter should be resetted, if so reset the filter
		if($this->reset( $this->getName() ))
		{
			$this->reset();
		}
	}
		

	/**
	 * Render the filter and return string
	 * @param string	Name of the attribute
	 * @param mixed		Active filter values
	 * @param object	Template object
	 * @param object	The current filter object
	 * @return string
	 */
	public function renderCallback($strName,$varValue,$objTemplate,$objFilter)
	{
		$values = StringUtil::deserialize($this->get('defaultMulti'));
		$options = array();
		$isSelected = false;
		
		// build options array
		if(!empty($values) && is_array($values))
		{
			foreach($values as $i => $v)
			{
				$tmp = array
				(
					'id'		=> $strName.'_'.$i,
					'value'		=> $v,
					'label'		=> $v,
					'selected'	=> '',
				);
				if($this->isSelected($v))
				{
					$tmp['selected'] = $this->get('isRadio') ? 'checked' : 'selected';
					$isSelected = true;
				}
				$options[] = $tmp;
			}
		}
		
		// insert blank option for resetting the filter
		if($this->get('includeReset'))
		{
			$label = '-';
			$blank = array('value'=>$strName.'_reset','label'=>$label,'selected'=>'');
			\Contao\ArrayUtil::arrayInsert($options,0,array($blank));
		}
		
		$objTemplate->options = $options;
		$objTemplate->name = $strName;
		$objTemplate->radio = $this->get('isRadio');
		$objTemplate->label = $this->get('label');
		
		return $objTemplate->parse();
	}


}