<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\IconPicker;

/**
 * Class file
 * AttributeIconPicker
 */
class AttributeIconPicker extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrEval = $this->getEval();
		
		$arrReturn = array
		(
			'label'			=> array( $this->get('title'),$this->get('description') ),
			'exclude'		=> true,
			'inputType'		=> 'text',
			'eval'			=> $arrEval,
			'sql'			=> "varchar(64) NOT NULL default ''"
		);
		
		$options = \Contao\StringUtil::deserialize( $this->get('options') );
		
		if(empty($options) || !is_array($options))
		{
			return $arrReturn;
		}
		
		if(in_array('iconpicker',$options))
		{
			$arrReturn['wizard'] = array
			(
				'wizard' => array
				(
					'PCT\IconPicker\IconPicker', 'fontIconPicker'
				),
			);

			if( !isset($arrReturn['eval']['tl_class']) )
			{
				$arrReturn['eval']['tl_class'] = '';
			}
			
			$arrReturn['eval']['tl_class'] .= ' wizard';
		}
		
		return $arrReturn;
	}
	
}