<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright 	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author  	Tim Gatzky <info@tim-gatzky.de>
 * @package  	pct_revolutionslider
 * @link 		http://contao.org
 */

/**
 * Namespace
 */
namespace RevolutionSlider\Frontend;

use Contao\File;
use Contao\FilesModel;

/**
 * Class file
 */
class ContentRevolutionSliderImage extends \Contao\ContentImage
{
	/**
	 * Template
	 * @var
	 */
	protected $strTemplate = 'ce_revolutionslider_image';

	/**
	 * Display wildcard
	 */
	public function generate()
	{
		$objContainer = \Contao\System::getContainer();
				
		$request = $objContainer->get('request_stack')->getCurrentRequest();
		if ( $request && $objContainer->get('contao.routing.scope_matcher')->isBackendRequest($request) )
		{
			$strImage = '';
			if($this->singleSRC)
			{
				$objFile = FilesModel::findByPk($this->singleSRC);
				$projectDir = $objContainer->getParameter('kernel.project_dir');
				$image = $objContainer->get('contao.image.factory')->create($projectDir.'/'.$objFile->path, array('150','75','center_center'));
				if ($image instanceof \Contao\Image\DeferredImageInterface)
				{
					$objContainer->get('contao.image.resizer')->resizeDeferredImage($image);
				}
				$strImage = $image->getUrl($projectDir);;
				
				if( \file_exists($projectDir.'/'.$strImage) )
				{
					$strImage = $objContainer->get('contao.insert_tag.parser')->replace('{{image::'.$strImage.'}}');
				}
				
				if( $this->useSVG && \file_exists($projectDir.'/'.$strImage) )
				{
					$f = new File($strImage);
					if( $f !== null )
					{
						$strImage = $f->getContent();
					}
				}
			}
			
			$this->Template = new \Contao\BackendTemplate('be_wildcard');
			$this->Template->wildcard = $strImage;
			$this->Template->title = $this->headline;

			return $this->Template->parse();
		}
		
		if(strlen($this->customTpl) > 0 && $this->customTpl != $this->strTemplate)
		{
			$this->strTemplate = $this->customTpl;
		}

		return parent::generate();
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{
		if($this->singleSRC == '')
		{
			return '';
		}
		
		$arrCssID = $this->cssID;
		$arrClass = explode(' ', $arrCssID[1]);
		$arrClass[] = $this->strTemplate;
		$arrClass[] = 'caption';
		$arrClass[] = 'tp-caption';
		// parallax
		if( $this->revolutionslider_parallax )
		{
			$arrClass[] = 'rs-parallaxlevel-'.$this->revolutionslider_parallax;
		}
		$arrCssID[1] = trim(implode(' ', array_unique($arrClass)));
		$this->cssID = $arrCssID;
		$this->getModel()->__set('cssID',$arrCssID);
		
		if( !empty($this->alt) || !empty($this->imageTitle) || !empty($this->imageUrl) )
		{
			$this->getModel()->__set('overwriteMeta',true);
			$this->overwriteMeta = true;
		}

		return parent::compile();
	}
}