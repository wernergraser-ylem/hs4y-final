<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core;

/**
 * Class file
 * TemplateAttribute
 */
class TemplateAttribute
{
	public $class, $label, $name, $value, $html, $type = '';
	public $hidden = false;
	public $attribute, $picture = null;
	public $options = array();


	/**
	 * Initialize and attach an attribute object
	 * @param object	CustomElement Attribute
	 */
	public function __construct($objAttribute=null)
	{
		if(!is_object($objAttribute) || empty($objAttribute) || is_null($objAttribute))
		{
			return null;
		}
		$this->attribute = $objAttribute;
	}
	
	
	/**
	 * Return the value of the attribute
	 * @return mixed|null
	 */
	public function value() 
	{ 
		// Store processed values
		if(!isset($this->value) && isset($this->attribute)) 
		{
			$this->value = $this->attribute->load();
		}
		
		// load value hook
		if(isset($this->attribute))
		{
			$this->value = \PCT\CustomElements\Core\Hooks::callstatic('loadValueHook',array($this->value,$this->attribute));
		}

		if( !isset($this->value) )
		{
			return null;
		}
		
		// check if arrays might be empty
		if(is_array($this->value))
		{
			$this->value = array_filter($this->value);
			if(empty($this->value))
			{
				$this->value = null;
			}
		}
		
		return $this->value;
	}
	
	
	/**
	 * Returns the label of a value or the name of the attribute
	 * @param string	A certain value to search
	 * @return string
	 */
	public function label($varValue='')
	{
		if(!isset($this->attribute))
		{
			return '';
		}
		
		if(strlen($varValue) < 1)
		{
			$varValue = $this->value();
		}
		
		$strReturn = $this->attribute->get('title');
		$arrOptions = \Contao\StringUtil::deserialize($this->attribute->get('options'));
		if(!is_array($arrOptions))
		{
			$arrOptions = explode(',', $arrOptions);
		}

		if( empty($arrOptions) && strlen($varValue) < 1)
		{
			return $this->attribute->get('title');
		}
		
		foreach($arrOptions as $option)
		{
			if( \is_string($option) && $option == $varValue )
			{
				$strReturn = $option;
				break;
			}

			if( \is_array($option) && isset($option['value']) && $option['value'] == $varValue)
			{
				$strReturn = $option['label'];
				break;
			}
		}
		
		return $strReturn;
	}
	
	
	/**
	 * Render the attribute and return html string
	 * @return string
	 */
	public function render($strTemplate='') 
	{
		if(!isset($this->attribute))
		{
			return '';
		}
		
		if(strlen($strTemplate) > 0)
		{
			// reset the html variable
			unset($this->html);
			// set new template
			$this->attribute->set('template',$strTemplate);
		}
		
		// Store processed values
		if(!isset($this->html))
		{
			$this->html = $this->attribute->render();
		}
		
		return $this->html;
	}
	
	
	/**
	 * Shortcut to render()
	 */
	public function html($strTemplate='') {return $this->render($strTemplate);}
	
	
	/**
	 * Return an options value
	 * @param string	Name of the option key
	 * @return mixed
	 */
	public function optionvalue($strOption)	
	{
		// Store processed values
		if(!isset($this->options[$strOption]) && isset($this->attribute))
		{
			$this->options = array($strOption => $this->attribute->loadOptionValue($strOption));
		}
		return $this->options[$strOption] ?? null;
	}
	
	
	/**
	 * Shortcut to optionvalue
	 */
	public function option($strOption) {return $this->optionvalue($strOption);}
	
	
	/**
	 * Return the attribute object
	 * @return object
	 */
	public function attribute() {return $this->attribute;}
	
	
	/**
	 * Translate a value
	 * @param string
	 * @param string
	 */
	public function translate($varValue,$strLanguage='')
	{
		if(!isset($this->attribute))
		{
			return $varValue;
		}
		
		return $this->attribute->getTranslatedValue($varValue,$strLanguage);
	}
	
	
	/**
	 * Generate an responsive image
	 * @param string
	 * @return string
	 */
	public function picture($strTemplate='picture_default')
	{
		if(!$this->picture)
		{
			$objFile = \Contao\FilesModel::findByUuid( $this->value() );
			if( $objFile === null )
			{
				return '';
			}
			$objTmp = new \Contao\FrontendTemplate('ce_image');
			
			$arrSize = array_filter( \Contao\StringUtil::deserialize( $this->optionvalue('size')) ?: array() );
			$arrSizeFromAttribute = array_filter( \Contao\StringUtil::deserialize($this->attribute()->get('size')) ?: array() );
			if(count($arrSize) < 1 && count($arrSizeFromAttribute) > 0)
			{
				$arrSize = $arrSizeFromAttribute;
			}
			
			$arrData['singleSRC'] = \Contao\FilesModel::findByUuid( $this->value() )->path;
			$arrData['size'] = $arrSize;
			$arrData['alt'] = $this->optionvalue('alt');
			$arrData['title'] = $this->optionvalue('title');
			
			$container = \Contao\System::getContainer();
			$projectDir = $container->getParameter('kernel.project_dir');
			#$staticUrl = $container->get('contao.assets.files_context')->getStaticUrl();
			$objPicture = $container->get('contao.image.preview_factory')->createPreviewPicture($projectDir . '/' . $objFile->path, $arrSize);
			
			$objTmp->insert($strTemplate,$objPicture);
		}
	}
	
	
	/**
	 * Generate an image and return path to the file as string
	 * @param array		Size array
	 * @return string
	 */
	public function generate($arrSize=array())
	{
		$objAttribute = $this->attribute();
		if(!$objAttribute)
		{
			return '';
		}
		
		switch($objAttribute->get('type'))
		{
			case 'image':
				$objFile = \Contao\FilesModel::findByUuid( $this->value() );
				if( $objFile !== null )
				{
					// no parameter
					if(count($arrSize) < 1)
					{
						$arrSize = \Contao\StringUtil::deserialize($this->optionvalue('size')) ?: array();
						if(!is_array($arrSize))
						{
							$arrSize = explode(',', $arrSize);
						}
						$arrSizeFromAttribute = \Contao\StringUtil::deserialize($objAttribute->get('size')) ?: array();
						if(!is_array($arrSizeFromAttribute))
						{
							$arrSizeFromAttribute = explode(',', $arrSizeFromAttribute);
						}
						
						if(count(array_filter($arrSize,'strlen')) < 1)
						{
							$arrSize = $arrSizeFromAttribute;
						}
					}
					
					$projectDir = \Contao\System::getContainer()->getParameter('kernel.project_dir');
					$image = \Contao\System::getContainer()->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, $arrSize);
					if ($image instanceof \Contao\Image\DeferredImageInterface)
					{
						\Contao\System::getContainer()->get('contao.image.resizer')->resizeDeferredImage($image);
					}
					return $image->getUrl($projectDir);
				}
				break;
			default:
				return $this->render(); 
				break;
		}
		
		return '';
	}
	
}
 