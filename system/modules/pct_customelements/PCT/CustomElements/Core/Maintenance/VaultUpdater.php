<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2016, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Core\Maintenance;

/**
 * Imports
 */

use Contao\Backend;
use Contao\BackendTemplate;
use Contao\Database;
use Contao\Environment;
use Contao\Input;
use Contao\StringUtil;
use Contao\System;
use PCT\CustomElements\Models\AttributeModel;

/**
 * Class file
 * VaultUpdater
 */
class VaultUpdater extends Backend
{
	/**
	 * Run the update routines
	 * @return boolean
	 * Idea taken from \RebuildIndex
	 */
	public function run()
	{
		\error_reporting(E_ERROR | E_PARSE | E_NOTICE);
		
		$this->Session = System::getContainer()->get('request_stack')->getSession();

		// render the page
		$objTemplate = new \Contao\BackendTemplate('be_maintenance_vaultupdater');
		$objTemplate->action = StringUtil::ampersand(\Contao\Environment::get('request'));
		$objTemplate->indexContinue = $GLOBALS['TL_LANG']['MSC']['continue'];
		$objTemplate->theme = \Contao\Backend::getTheme();
		
		if($_GET['back'] || \Contao\Input::get('back'))
		{
			\Contao\Controller::redirect( \Contao\Controller::getReferer() );
		}
			
		// remove all attribute data from vault
		if(\Contao\Input::get('key') == 'removeAttributeDataFromVault')
		{
			$objTemplate->isActive = true;
			$objTemplate->headline = $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault'][0];
			
			$objDatabase = \Contao\Database::getInstance();
			$objEffected = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_vault WHERE type!=?")->execute('wizard');
			
			$strBuffer = sprintf($GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault_effected'],$objEffected->numRows);
			
			$objTemplate->runLabel = $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault_runLabel'];
			if(\Contao\Input::get('removeAttributeDataFromVault') == $objTemplate->runLabel)
			{
				$objDatabase->prepare("DELETE FROM tl_pct_customelement_vault WHERE type!=?")->execute('wizard');
				
				\Contao\Controller::redirect($this->addToUrl('removeAttributeDataFromVault='));
			}
			
			$objTemplate->content = $strBuffer;
		}

		$objTemplate->backLabel = $GLOBALS['TL_LANG']['MSC']['goBack'];
		
		return $objTemplate->parse();
	}


	/**
	 * Copy CE data from vault to it's new destination and resolve the entry
	 * @return boolean
	 */
	public function resolve()
	{
		$this->Session = System::getContainer()->get('request_stack')->getSession();

		$objDatabase = Database::getInstance();
					
		// update a certain wizard
		$vault_id = Input::get('vault_id');
		if($vault_id > 0)
		{
			$objRow = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_vault WHERE id=?")->limit(1)->execute($vault_id);
			if($objRow->numRows > 0)
			{
				$varData = $objRow->data_blob;

				$strField = 'pct_customelement';
				// generic attribute
				if( $objRow->attr_id > 0 )
				{
					$objAttribute = AttributeModel::findByPk( $objRow->attr_id );
					$strField = $objAttribute->alias;
					if( $objAttribute->type == 'customelement' )
					{
						$strField .= '_data';
					}
				}

				$strTable = $objRow->source;

				// return if table does not exist
				if( !$objDatabase->tableExists($strTable) )
				{
					System::getContainer()->get('monolog.logger.contao.error')->info( 'Vault: Table '.$strTable.' does not exist' );			

					throw new \Exception('Vault: Table '.$strTable.' does not exist');
					return false;
				}

				// return if field does not exist
				if( !$objDatabase->fieldExists($strField,$strTable) )
				{
					System::getContainer()->get('monolog.logger.contao.error')->info( 'Vault: Field '.$strField.' does not exist in '.$strTable);			

					throw new \Exception('Vault:  Field '.$strField.' does not exist in '.$strTable);
					return false;
				}

				// check if target entry exists
				$objEntry = $objDatabase->prepare("SELECT id FROM ".$strTable." WHERE id=?")->execute($objRow->pid);
				if ( $objEntry->numRows < 1 )
				{
					System::getContainer()->get('monolog.logger.contao.error')->info('Entry does not exist: '.$strTable.'.id='.$objRow->pid );			

					#throw new \Exception('Entry does not exist: '.$strTable.'.id='.$objRow->pid);
					
					// delete vault entry
					$objDatabase->prepare("DELETE FROM tl_pct_customelement_vault WHERE id=?")->execute( $objRow->id );
					return true;
				}

				$objDatabase->prepare("UPDATE ".$strTable." %s WHERE id=?")->set( array($strField => $varData) )->execute( $objRow->pid );

				// delete vault entry
				$objDatabase->prepare("DELETE FROM tl_pct_customelement_vault WHERE id=?")->execute( $objRow->id );

				return true;
			}
			else
			{
				$this->Session->set('REBUILD_INDEX_ERROR','Wrong or obsolete Vault data');
				return false;
			}
		}
		
		// render the page
		$objTemplate = new BackendTemplate('be_maintenance_resolvevault');
		$objTemplate->action = \Contao\StringUtil::ampersand(Environment::get('request'));
		$objTemplate->isActive = (Input::get('key') == 'resolveVault');
		$objTemplate->indexContinue = $GLOBALS['TL_LANG']['MSC']['continue'];
		$objTemplate->theme = Backend::getTheme();
		$objTemplate->note = $GLOBALS['TL_LANG']['tl_maintenance']['indexNote'];
		
		// Add the error message
		if ($this->Session->get('REBUILD_INDEX_ERROR') != '')
		{
			$objTemplate->indexMessage = $this->Session->get('REBUILD_INDEX_ERROR');
			$this->Session->set('REBUILD_INDEX_ERROR','');
		}
		
		$strBuffer = '';
		$objVault = $objDatabase->prepare("SELECT * FROM tl_pct_customelement_vault WHERE type=?")->execute('wizard');
		if( $objVault->numRows < 1 )
		{
			$objTemplate->content = 'No Data found';
			$objTemplate->completed = true;
			$objTemplate->complete = $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['vaultUpdateComplete'];
		}
		else
		{
			while($objVault->next())
			{
				$title = 'Vault (id='.$objVault->id.') -> '.$objVault->source.' (id='.$objVault->pid.')';
				$strBuffer .= '<span class="page_url vault_data" data-vault_id="'.$objVault->id.'">' . $title . '</span><br>';
			}
			
			$objTemplate->content = $strBuffer;
			$objTemplate->loading = $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['vaultUpdateLoading'];
			$objTemplate->complete = $GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['vaultUpdateComplete'];
			$objTemplate->isRunning = true;
		}
		return $objTemplate->parse();
	}
	
}