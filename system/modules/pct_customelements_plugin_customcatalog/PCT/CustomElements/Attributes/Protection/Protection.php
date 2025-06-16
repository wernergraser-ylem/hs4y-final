<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpackage	pct_cusotmelements_plugin_customcatalog
 * @attribute	Protection
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

use Contao\StringUtil;
use PCT\CustomElements\Plugins\CustomCatalog\Core\Controller;

/**
 * Class file
 * Protection
 */
class Protection extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Return the field definition
	 * @return array
	 */
	public function getFieldDefinition()
	{
		$arrReturn = array
		(
			'label'				=> array( $this->get('title'),$this->get('description') ),
			'exclude'			=> true,
			'inputType'			=> 'select',
			'sql'				=> "int(10) NOT NULL default '0'",
			'relation'          => array('type'=>'hasOne', 'load'=>'lazy'),
			'eval'				=> $this->getEval(),
			'attribute_type'	=> $this->get('type'),
		);

		$sql_version = \Contao\Database::getInstance()->prepare('SELECT @@version AS version')->execute();
		if( \version_compare($sql_version->version,'8','>=') && \strpos( \strtolower($sql_version->version), 'mariadb') === false )
		{
			$arrReturn['sql'] = "int unsigned NOT NULL default '0'";
		}
		
		// default value
		if($this->get('defaultValue'))
		{
			$arrReturn['default'] = $this->get('defaultValue');
		}
		
		$mode = StringUtil::deserialize($this->get('options'));
		
		if( in_array($mode, array('user_group','member_group')) )
		{
			$arrReturn['inputType'] = "checkbox";
			$arrReturn['eval']['multiple'] = true;
			$arrReturn['sql'] = "blob NULL";
			$arrReturn['relation']['type'] = 'hasMany';
		}
		
		// backend
		if($mode == 'user')
		{
			$arrReturn['foreignKey'] = 'tl_user.username';
		}
		else if($mode == 'user_group')
		{
			$arrReturn['foreignKey'] = 'tl_user_group.name';
		}
		// frontend
		else if($mode == 'member')
		{
			$arrReturn['foreignKey'] = 'tl_member.username';
		}
		else if($mode == 'member_group')
		{
			$arrReturn['foreignKey'] = 'tl_member_group.name';
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Add a proctection attribute to the protection plan
	 * @param array		DCA definition
	 * @param string	Field name 
	 * @param object	The attribute object
	 * @param object	The CustomCatalog object
	 * @param object	The CustomElement object
	 * called from $GLOBALS['CUSTOMCATALOG_HOOKS']['prepareField'] Hook
	 */
	public function addToProtectionPlan($arrData,$fieldName,$objAttribute,$objCC,$objCE)
	{
		if($objAttribute->get('type') != 'protection' || !$objAttribute->get('published'))
		{
			return $arrData;
		}
		
		// collect the protection fields per table
		$GLOBALS['PCT_CUSTOMCATALOG']['PROTECTION_HELPER'][$objCC->getTable()]['fields'][] = array('name'=>$fieldName,'attribute'=>$objAttribute,'data'=>$arrData); 
	
		return $arrData;
	}
	
	
	/**
	 * Modify the DCA array
	 * @param object
	 * called from $GLOBALS['CUSTOMCATALOG_HOOKS']['loadDataContainer'] Hook
	 */
	public function applyBackendFilter($objDC)
	{
		$objUser = \Contao\BackendUser::getInstance();
		if($objUser->isAdmin)
		{
			return ;
		}
		
		$arrGroups = StringUtil::deserialize($objUser->groups) ?: array();
		
		$arrFields = $GLOBALS['PCT_CUSTOMCATALOG']['PROTECTION_HELPER'][$objDC->table]['fields'] ?? array();
		
		if(!is_array($arrFields) || empty($arrFields))
		{
			return;
		}
		
		$arrIds = array();
		$arrUserFields = array();
		$arrGroupFields = array();
		
		$arrOptions = array('table' => $objDC->table);
		$arrOptions['columns'] = array();
		
		$blnApply = false;
		foreach($arrFields as $arrField)
		{
			$objAttribute = $arrField['attribute'];
			
			$mode = StringUtil::deserialize($objAttribute->get('options'));
			
			// exclude member and member_group fields because they are uninteresting in the backend
			if( in_array($mode, array('member','member_group')) )
			{
				continue;
			}
			
			
			// atleast one protection attribute is for backend users, backend groups
			$blnApply = true;
			
			// user field (integer)
			if($mode == 'user')
			{
				$arrUserFields[] = $arrField['name'];
				// default value
				$defaultValue = $objAttribute->get('defaultValue');
				
				$arrOptions['columns'][] = array
				(
					'column' 		=> $arrField['name'],
					'where' 		=> '('.$arrField['name'].'='.$objUser->id. ($defaultValue ? ' OR '.$arrField['name'].'='. $defaultValue .')' : ')'),
					'eval'			=> array('combiner'=>'OR')
				);
			}
			// user_group (blob)
			else if($mode == 'user_group')
			{
			   $arrGroupFields[] = $arrField['name'];
			   
			   $arrOptions['columns'][] = array
			   (
			   		'column' 		=> $arrField['name'],
					'where' 		=> $arrField['name'].' IS NOT NULL ',
					'eval'			=> array('combiner'=>'OR')
			   );
			}
			
			$arrOptions['fields'][] = $arrField['name'];
			
		}
		
		if( $blnApply === false )
		{
			return;
		}
		
		$arrOptions['fields'][] = 'id';
		
		// fetch rows
		$objRows = \PCT\CustomElements\Plugins\CustomCatalog\Helper\QueryBuilder::getInstance()->fetch($arrOptions);
		
		// default value
		$defaultValue = $objAttribute->get('defaultValue');
				
		while( $objRows->next() )
		{
			// user fields
			foreach($arrUserFields as $field)
			{
				if( $objUser->id == $defaultValue || $objRows->{$field} == $objUser->id )
				{
					$arrIds[] = $objRows->id;
				}
			}
			// user_group fields		
			foreach($arrGroupFields as $field)
			{
				$groups = StringUtil::deserialize($objRows->{$field});
				if(!is_array($groups))
				{
					$groups = array();
				}
				
				if(array_intersect($groups, $arrGroups))
				{
					$arrIds[] = $objRows->id;
				}
			}
		}

		// apply backend filter
		$GLOBALS['TL_DCA'][$objDC->table]['list']['sorting']['filter'][] = array('FIND_IN_SET(id,?)',implode(',',array_unique($arrIds)));
	}
	
	
	/**
	 * Auto-submit the current backend user or backend usergroup information
	 * @param string	Current DCA action
	 * @param object	The DataContainer object
	 * @param object	The active record object
	 * @param object	The database result object 
	 * called from generalDataContainer Hook
	 */
	public function autoSubmitUserData($strAction,$objDC,$objActiveRecord,$objDbCC)
	{
		if($strAction != 'onsubmit' || $objDbCC === null)
		{
			return;
		}
		
		$objDatabase = \Contao\Database::getInstance();
		
		// find current user/member
		$objUser = null;
		if( Controller::isBackend() )
		{
			$objUser = \Contao\BackendUser::getInstance();
		}
		else if( Controller::isFrontend() )
		{
			$objUser = \Contao\FrontendUser::getInstance();
		}
		
		// user could not be resolved or is not logged in
		if($objUser === null)
		{
			return;
		}
		
		// find protection attributes for the current customcatalog
		$arrAttributes = \PCT\CustomElements\Plugins\CustomCatalog\Core\AttributeFactory::findAllByTypeAndCustomCatalog('protection',$objDbCC->id,true);
		if(empty($arrAttributes))
		{
			return;
		}
		
		$arrSet = array();
		foreach($arrAttributes as $objAttribute)
		{
			$field = $objAttribute->get('alias');
			if(!$objDatabase->fieldExists($field,$objDC->table) || !empty($objActiveRecord->{$field}) || !$objAttribute->get('isDownload'))
			{
				continue;
			}
			
			$mode = StringUtil::deserialize( $objAttribute->get('options') );
			
			// single level
			if( in_array($mode,array('user','member')) )
			{
				$arrSet[ $field ] = $objUser->id;
			}
			// group level
			else if( in_array($mode,array('user_group','member_group')) )
			{
				// do not save groups for admin users
				if( Controller::isBackend() && $objUser->isAdmin)
				{
					continue;
				}
				
				$arrSet[ $field ] = $objUser->groups;
			}
		}
		
		
		// update the record
		if(!empty($arrSet))
		{
			$objDatabase->prepare("UPDATE ".$objDC->table." %s WHERE id=?")->set( $arrSet )->execute($objDC->id);
		}
	}	
}