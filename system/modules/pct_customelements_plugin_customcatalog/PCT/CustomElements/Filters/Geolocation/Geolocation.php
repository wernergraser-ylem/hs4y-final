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
 * @filter		Geolocation filter
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Filters;

use Contao\StringUtil;
use Contao\System;

/**
 * Class file
 * Geolocation
 */
class Geolocation extends \PCT\CustomElements\Filter
{
	/**
	 * The attribute
	 * @param object
	 */
	protected $objAttribute = null;
	
	
	/**
	 * Init
	 */
	public function __construct($arrData=array())
	{
		$this->setData($arrData);
		
		// fetch the attribute the filter works on
		$this->objAttribute = \PCT\CustomElements\Core\AttributeFactory::findById($this->get('attr_id'));
		// point the filter to the attribute
		$this->setFilterTarget($this->objAttribute->alias);
	
		// use the filter title or use the urlparameter as filter name
		$strName = $this->get('urlparam') ? $this->get('urlparam') : StringUtil::standardize($this->get('title'));
		
		// set the filter name
		$this->setName($strName);

		// set geocoder
		$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url'] = 'https://nominatim.openstreetmap.org/search?email=mein@mail.de';
		$strGeocoderKey = trim( $this->get('defaultMulti') ?? '' );
		if( !empty($strGeocoderKey) )
		{
			$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url'] = "https://maps.googleapis.com/maps/api/geocode/json?key=".$strGeocoderKey;
		}
	}
	
	
	/**
	 * Prepare the sql query array for this filter and return it as array
	 * @return array
	 * 
	 * called from getQueryOption() in \PCT\CustomElements\Filter
	 */	
	public function getQueryOptionCallback()
	{
		$varValue = implode('',$this->getValue());
		
		if(empty($varValue))
		{
			return array();
		}
		
		$objDatabase = \Contao\Database::getInstance();
		$objCache = new \PCT\CustomElements\Plugins\CustomCatalog\Core\Cache();
		$arrIds = array();
		
		$strName = $this->getName();
		$t = $this->getFilterTarget();
		$decimal = (isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['defaultRounding']) ? $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['defaultRounding'] : 3);
		
		$arrDefaultCenter = StringUtil::deserialize($this->get('defaultValue')) ?: array();
		$numCenterLAT = $arrDefaultCenter[0] ?: -1;
		$numCenterLON = $arrDefaultCenter[1] ?: -1;
		$numRadius = $varValue;
		$blnUseMiles = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['useMiles'] ?: false;
		
		$strAddressValue = implode('',$this->getValue($strName.'_address'));
		
		// read from cache
		$blnCache = false;
		if(isset($GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER_RESULTS'][$strName]))
		{
			$numCenterLAT = $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER_RESULTS'][$strName][0];
			$numCenterLON = $GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER_RESULTS'][$strName][1];
			$blnCache = true;
		}
		
		// read coordinates from GET only. No address given
		if(strlen($strAddressValue) < 1 && isset($_GET[$strName.'_lat']) && isset($_GET[$strName.'_lon']) )
		{
			$numCenterLAT = \Contao\Input::get($strName.'_lat');
			$numCenterLON = \Contao\Input::get($strName.'_lon');
			$blnCache = true;
		}
		
		// find the coordinates via google maps api request
		if(strlen($strAddressValue) > 0 && !$blnCache)
		{
			// find the coordinates via google maps api
			$arrCoordinates = $this->objAttribute->findCoordinates($strAddressValue);
			
			// cache result
			if(!empty($arrCoordinates))
			{
				$numCenterLAT = $arrCoordinates['lat'];
				$numCenterLON = $arrCoordinates['lng'];
				
				//-- in global scoppe
				$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER_RESULTS'][$strName][0] = $numCenterLAT;
				$GLOBALS['PCT_CUSTOMELEMENTS']['CACHE']['FILTER_RESULTS'][$strName][1] = $numCenterLON;
				//-- in object scope
				$this->set('latitude',$numCenterLAT);
				$this->set('longitude',$numCenterLON);
				//-- in session
				$objSession = \Contao\System::getContainer()->get('request_stack')->getSession();
				$arrSession = $objSession->get($strName);
				// store the search coordinates and the radius in the session
				$arrSession = array
				(
					'location' 	=> array('lat'=>$numCenterLAT,'lng'=>$numCenterLON),
					'radius'	=> $numRadius,
					'hash'		=> sha1( ($numCenterLAT + $numCenterLON + $numRadius) . $strAddressValue )
				);
				$objSession->set($strName,$arrSession);
			}
		}
		
		if( ($numCenterLAT < 0 || $numCenterLON < 0) && $GLOBALS['PCT_CUSTOMCATALOG']['debug'] === true )
		{
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('No coordinates found for perimeter search: Geolocation filter ('.$this->id.')');
			return array();
		}
		
		
		$numCenterLAT = round($numCenterLAT,$decimal);
		$numCenterLON = round($numCenterLON,$decimal);
		
		//-- query
		$strPublished = ($GLOBALS['PCT_CUSTOMCATALOG']['FRONTEND']['FILTER']['publishedOnly'] ? $this->getCustomCatalog()->getPublishedField() : '');
		
		$strSelectLAT = "SUBSTRING_INDEX(".$t.",',',1)";
		$strSelectLON = "SUBSTRING_INDEX(".$t.",',',-1)";
		
		// haversine formular
		$strQuery = "
			SELECT id, ".(strlen($strPublished) > 0 ? $strPublished.",": "").($blnUseMiles ? "3959" : "6371")." * 
				acos
				( 
					cos(radians(".$numCenterLAT.")) 
					* cos(radians( ".$strSelectLAT.")) 
					* cos( radians( ".$strSelectLON.") - radians(".$numCenterLON.") ) 
					+ sin(radians(".$numCenterLAT.")) 
					* sin(radians( ".$strSelectLAT.")) 
				) AS distance FROM ".$this->getTable()." HAVING distance <= ".$numRadius."
		";
		
		if(strlen($strPublished) > 0)
		{
			$strQuery .= " AND ".$strPublished."=1";
		}

		$strQuery .= " ORDER BY distance";
		
		// look up from cache
		$objResult = $objCache::getDatabaseResult('Geolocation::getQueryOptionsCallback'.(strlen($strPublished) > 0 ? 'Published' : ''),$strName);
		if($objResult === null)
		{
			$objResult = $objDatabase->prepare($strQuery)->execute();
			// add to cache
			$objCache::addDatabaseResult('Geolocation::getQueryOptionsCallback'.(strlen($strPublished) > 0 ? 'Published' : ''),$strName,$objResult);
		}
		
		if($objResult->numRows < 1)
		{
		   return array();
		}
		else
		{
		   $arrIds = $objResult->fetchEach('id');
		}
		
		$options = array
		(
			'column'	=> 'id',
			'operation'	=> 'IN',
			'value'		=> $arrIds,
		);
		
		return $options;
	}
	
	
	/**
	 * Return all records ordered by distance in a certain radius
	 * @param string $strAddress
	 * @param integer $intRadiant
	 * @return array
	 */
	public function findRecordsAroundAddress($strAddress, $numRadius=100, $strPublishedField='')
	{
		if( empty($strAddress) )
		{
			return array();
		}
		
		// @var string The alias of the geolocation attribute 
		$strField = $this->getFilterTarget();
		// @var string The current table
		$strTable = $this->getTable();
		
		$objAttribute = new \PCT\CustomElements\Attributes\Geolocation;
		$arrCoordinates = $objAttribute->findCoordinates($strAddress);
		if( empty($arrCoordinates) )
		{
			return array();
		}
		
		$numCenterLAT = $arrCoordinates['lat'];
		$numCenterLON = $arrCoordinates['lng'];
		$blnUseMiles = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['useMiles'] ?: false;
		
		$strSelectLAT = "SUBSTRING_INDEX(".$strField.",',',1)";
		$strSelectLON = "SUBSTRING_INDEX(".$strField.",',',-1)";
		
		// haversine formular
		$strQuery = "
		SELECT id, ".(strlen($strPublishedField) > 0 ? $strPublishedField.",": "").($blnUseMiles ? "3959" : "6371")." * 
			acos
			( 
				cos(radians(".$numCenterLAT.")) 
				* cos(radians( ".$strSelectLAT.")) 
				* cos( radians( ".$strSelectLON.") - radians(".$numCenterLON.") ) 
				+ sin(radians(".$numCenterLAT.")) 
				* sin(radians( ".$strSelectLAT.")) 
			) AS distance FROM ".$strTable." HAVING distance <= ".$numRadius."
		";
		
		if(strlen($strPublishedField) > 0)
		{
			$strQuery .= " AND ".$strPublishedField."=1";
		}
		$strQuery .= " ORDER BY distance";
		
		$objResult = \Contao\Database::getInstance()->prepare($strQuery)->execute();
		return $objResult->fetchEach('id');
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
		\PCT\CustomElements\Loader\FilterLoader::loadLanguageFile('default','geolocation');
		
		$objTemplate->name = $strName;
		$objTemplate->label = $this->get('label') ?:  $this->get('title');
		$objTemplate->label_location = $GLOBALS['MSC']['GEOLOCATION']['label_location'];
		
		$objTemplate->minValue = $objTemplate->min = $objTemplate->actMinValue = $this->get('min_value');
		$objTemplate->maxValue = $objTemplate->max = $objTemplate->actMaxValue = $this->get('max_value');
		$objTemplate->stepsValue = $objTemplate->steps = $this->get('steps_value');
		
		$varValue = (is_array($varValue) ? implode('',$varValue) : $varValue);
		$objTemplate->value = $varValue ?: '0';
		
		$strWidgets = '';
		
		$strWidgets .= sprintf('<input type="range" name="%s" value="%s" min="%s" max="%s" step="%s">',
			$strName,
			$varValue,
			$this->get('min_value'),
			$this->get('max_value'),
			$this->get('steps_value')
		);
		
		$varAddressValue = $this->getValue($strName.'_address');
		if(is_array($varAddressValue))
		{
			$varAddressValue = implode('', $varAddressValue);
		}
		
		// text address input
		$strWidgets .= sprintf('<input type="text" name="%s" value="%s">',
			$strName.'_address',
			$varAddressValue
		);
		
		// find the coordinates
		$arrCoordinates = array();
		if(strlen($varAddressValue) > 0)
		{
			$arrCoordinates = $this->objAttribute->findCoordinates($varAddressValue);
		}
		
		// current location values
		$numCenterLAT = $arrCoordinates['lat'] ?? -1;
		$numCenterLON = $arrCoordinates['lng'] ?? -1;
		$numRadius = implode('',$this->getValue($strName));
		
		$objTemplate->value_address = $varAddressValue;
		$objTemplate->address = $varAddressValue;
		$objTemplate->widget = $strWidgets;
		
		$objTemplate->latitude = $numCenterLAT;
		$objTemplate->longitude = $numCenterLON;
		$objTemplate->radius = $numRadius;
		$objTemplate->hasCoordinates = !empty($arrCoordinates);
		
		if(!empty($arrCoordinates) && (\Contao\Input::get($strName.'_lat') != $numCenterLAT || \Contao\Input::get($strName.'_lat') != $numCenterLON)  )
		{
			$arrUrl = parse_url( \PCT\CustomElements\Helper\Functions::addToUrl($strName.'_lat='.$numCenterLAT.'&'.$strName.'_lon='.$numCenterLON) );
			$objTemplate->appendParameters = $arrUrl['query'];
		}
		
		return $objTemplate->parse();
	}

}