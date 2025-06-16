<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2019
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_theme_settings
 * @link  http://contao.org
 */


/**
 * Namespace
 */
namespace PCT\ThemeSettings\PageImage;


/**
 * Class file
 * Module
 */
class Module extends \Contao\Module
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_pageimage';


	/**
	 * Display a wildcard in the back end
	 *
	 * @return string
	 */
	public function generate()
	{
		$request = \Contao\System::getContainer()->get('request_stack')->getCurrentRequest();
		if( $request && \Contao\System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)	)
		{
			/** @var \BackendTemplate|object $objTemplate */
			$objTemplate = new \Contao\BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . \strtoupper($GLOBALS['TL_LANG']['FMD']['pageimage'][0]) . ' ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}
		
		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{
		global $objPage;
		$_objPage = clone($objPage);
		
		// no image on current page, check for inheritance
		if( (boolean)$objPage->addImage === false )
		{
			$arrPages = array();

			$objParents = \Contao\PageModel::findParentsById($objPage->id);
			if($objParents !== null)
			{
				$intLevel = (int)$this->showLevel;
				foreach($objParents as $i => $pageModel)
				{
					// stop level out of scope or no image selected
					if( ($i >= $intLevel && $intLevel > 0) || (boolean)$pageModel->addImage === false )
					{
						continue;
					}
				
					// collect page models
					$arrPages[] = $pageModel;
				}
			}
				
			$arrPages = array_reverse( array_filter($arrPages) );
			
			$i = count($arrPages) - 1;
			if( isset($arrPages[$i]) )
			{
				$_objPage = $arrPages[$i];
			}
		}
		
		$objFile = \Contao\FilesModel::findByPk( $_objPage->singleSRC );
		if( $objFile !== null && (boolean)$_objPage->addImage === true  )
		{
			$arrData = array_merge( $this->getModel()->row() ,$_objPage->row() );
			
			$arrData['singleSRC'] = $objFile->path;
			$arrData['size'] = $arrData['imgSize'];
			
			if( empty($_objPage->pageTitle) === false )
			{
				$arrData['title'] = $_objPage->pageTitle;
			}
			
			#$this->addImageToTemplate($this->Template, $arrData);
			$size = $arrData['imgSize'];
			$container = \Contao\System::getContainer();
			$projectDir = $container->getParameter('kernel.project_dir');
			$staticUrl = $container->get('contao.assets.files_context')->getStaticUrl();
			$objPicture = $container->get('contao.image.preview_factory')->createPreviewPicture($projectDir . '/' . $objFile->path, $arrData['imgSize']);
			$img = $objPicture->getImg($projectDir, $staticUrl);
			$sources = $objPicture->getSources($projectDir, $staticUrl);
			
			$arrMediaQueries = array();
			foreach($sources ?: array() as $data)
			{
				if( \strlen($data['media']) < 1 )
				{
					continue;
				}
				$arrMediaQueries[] = '@media '.$data['media'].' { .resp_pageimage_'.$this->id.' .inside { background-image:url('.$data['src'].') !important; }';
			}
			$this->Template->hasResponsiveImage = true;
			$this->Template->hasMediaQueries = true;
			$this->Template->mediaqueries = \implode('',$arrMediaQueries);
			$this->Template->picture = $sources ?? array();
			$this->Template->image = $img;
			
			$arrCssId = $this->cssID;
			$arrCssId[1] .= ' resp_pageimage_'.$this->id;
			$this->cssID = $arrCssId;
		}
		
		// source page object to template
		$this->Template->Page = $_objPage;
	}
}