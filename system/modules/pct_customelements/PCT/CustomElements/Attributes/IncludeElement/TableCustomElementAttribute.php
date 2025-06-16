<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2013, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	Attribute IncludeElement
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes\IncludeElement;

use Contao\ArticleModel;
use Contao\ContentModel;
use Contao\FormModel;
use Contao\ModuleModel;
use Contao\PageModel;
use Contao\StringUtil;

/**
 * Class file
 * TableCustomElementAttribute
 */
class TableCustomElementAttribute extends \Contao\Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Modify palette
	 * @param object
	 */
	public function modifyPalette($objDC)
	{
		$objActiveRecord = $objDC->activeRecord;
		$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
		if($objActiveRecord === null && class_exists($strModel))
		{
			$objActiveRecord = $strModel::findByPk($objDC->id);
		}
		else if($objActiveRecord === null && !class_exists($strModel))
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if( $objActiveRecord === null )
		{
			return;
		}
	}

	
	/**
	 * Return possible include elements as array
	 * @param object
	 * @return array
	 */
	public function getIncludeItem($objDC)
	{
		$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
		
		$objActiveRecord = $objDC->activeRecord;
		$strModel = \Contao\Model::getClassFromTable($objDC->table) ?? '';
		if($objActiveRecord === null && class_exists($strModel))
		{
			$objActiveRecord = $strModel::findByPk($objDC->id);
		}
		else
		{
			$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if( $objActiveRecord === null )
		{
			return;
		}

		$arrReturn = array();
		if(strlen($objSession->get('pct_customelement_attribute_include_type')) && $objSession->get('pct_customelement_attribute_include_type') != $objActiveRecord->include_type)
		{
			\Contao\Database::getInstance()->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set(array('include_item'=>0))->execute($objDC->id);
			$objSession->set('pct_customelement_attribute_include_type',$objActiveRecord->include_type);
			$this->reload();
		}
		
		// load tl_content class
		if(!is_array($GLOBALS['TL_DCA']['tl_content']['config']))
		{
			\PCT\CustomElements\Helper\ControllerHelper::callstatic('loadDataContainer',array('tl_content'));
		}
		
		switch($objActiveRecord->include_type)
		{
			case 'article': 
				$arrReturn = $this->getArticles();
				break;
			case 'content': 
				$arrReturn = $this->getCustomElements();
				break;
			case 'form': 
				$arrReturn = $this->getForms();
				break;
			case 'module':
				$arrReturn = $this->getModules();
				break;
			default:
				break;
		}
		
		// store include type
		$objSession->set('pct_customelement_attribute_include_type',$objActiveRecord->include_type);
		
		return $arrReturn;
	}


	/**
	 * Return all articles in all root pages
	 * @return array
	 */
	public function getArticles()
	{
		$objArticle = \Contao\ArticleModel::findAll();
		if( $objArticle === null )
		{
			return array();
		}
		
		$arrReturn = array();
		while($objArticle->next())
		{
			$page = PageModel::findByPk( $objArticle->pid );
			$key = $page->title . ' (ID ' . $objArticle->pid . ')';
			$arrReturn[$key][$objArticle->id] = $objArticle->title . ' (' . ($GLOBALS['TL_LANG']['COLS'][$objArticle->inColumn] ?? $objArticle->inColumn) . ', ID ' . $objArticle->id . ')';
		}
		
		return $arrReturn;
	}


	/**
	 * Return all content elements in articles in all root pages
	 * @return array
	 */
	public function getCustomElements()
	{
		$opt = array
		(
			'column' => 'ptable',
			'value' => 'tl_article'
		);

		$objAlias = ContentModel::findAll( $opt );
		if( $objAlias === null )
		{
			return array();
		}
		
		$arrReturn = array();
		while($objAlias->next())
		{
			$objArticle = ArticleModel::findByPk( $objAlias->pid );
			if( $objArticle === null )
			{
				continue;
			}

			$arrHeadline = StringUtil::deserialize($objAlias->headline, true);

			if (isset($arrHeadline['value']))
			{
				$headline = StringUtil::substr($arrHeadline['value'], 32);
			}
			else
			{
				$headline = StringUtil::substr(preg_replace('/[\n\r\t]+/', ' ', $arrHeadline[0] ?? '' ), 32);
			}

			$text = StringUtil::substr(strip_tags(preg_replace('/[\n\r\t]+/', ' ', $objAlias->text)), 32);
			$strText = ($GLOBALS['TL_LANG']['CTE'][$objAlias->type][0] ?? $objAlias->type) . ' (';

			if ($headline)
			{
				$strText .= $headline . ', ';
			}
			elseif ($text)
			{
				$strText .= $text . ', ';
			}

			$key = $objArticle->title . ' (ID ' . $objAlias->pid . ')';
			
			$arrReturn[$key][$objAlias->id] = $strText . 'ID ' . $objAlias->id . ')';
		}
		
		return $arrReturn;
	}


	/**
	 * Return all forms
	 * @return array
	 */
	public function getForms()
	{
		$objModels = FormModel::findAll();
		if( $objModels  === null )
		{
			return array();
		}
		
		$arrReturn = array();
		while($objModels->next())
		{
			$arrReturn[$objModels->id] = $objModels->title . ' (ID ' . $objModels->id . ')';
		}
		
		return $arrReturn;
	}


	/**
	 * Return all content elements in articles in all root pages
	 * @param object
	 * @return array
	 */
	public function getModules()
	{
		$objModels = ModuleModel::findAll();
		if( $objModels  === null )
		{
			return array();
		}
		
		$arrReturn = array();
		while($objModels->next())
		{
			$arrReturn[$objModels->id] = $objModels->name . ' (ID ' . $objModels->id . ')';
		}
		
		return $arrReturn;
	}
}