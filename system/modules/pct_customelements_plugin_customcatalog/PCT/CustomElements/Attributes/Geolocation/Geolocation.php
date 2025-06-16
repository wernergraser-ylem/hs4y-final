<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2015, Premium Contao Webworks, Premium Contao Themes
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		pct_customelements
 * @subpacke	pct_customelements_plugin_customcatalog
 * @attribute	Geolocation
 * @link		http://contao.org
 */

/**
 * Namespace
 */
namespace PCT\CustomElements\Attributes;

/**
 * Imports
 */

use Contao\StringUtil;

/**
 * Class file
 * Geolocation
 */
class Geolocation extends \PCT\CustomElements\Core\Attribute
{
	/**
	 * Retry counter for Google OVER_QUERY_LIMITs
	 * @var integer
	 */
	protected $intRetryCounter = 0;
	
	
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
			'eval'			=> array_merge($arrEval,array('multiple'=>true,'size'=>2)),
			'sql'			=> "varchar(255) NOT NULL default ''",
			'save_callback'	=> array(array(get_class($this), 'onSaveCallback')),
			'load_callback'	=> array(array(get_class($this), 'onLoadCallback')),
		);
		
		return $arrReturn;
	}
	
	
	/**
	 * Store value as deserialized values seperated with a commata
	 * @param mixed
	 * @param object
	 */
	public function onSaveCallback($varValue, $objDC)
	{
		if(\Contao\Input::get('act') == 'overrideAll')
		{
			return $varValue;
		}
		
		if(!$objDC->activeRecord)
		{
			$objDC->activeRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		$varValue = StringUtil::deserialize($varValue);
		
		$varValue = array_filter($varValue,'strlen');
		
		if( !isset($varValue[0]) )
		{
			$varValue[0] = 0;
		}
		if( !isset($varValue[1]) )
		{
			$varValue[1] = 0;
		}
		
		$decimal = (isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['defaultRounding']) ? $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['defaultRounding'] : 3);
		if($decimal > 0 && $decimal != null)
		{
			$varValue = array(round($varValue[0],$decimal),round($varValue[1],$decimal));
		}
		
		// filter 0,0 even it might be a correct coordination
		$varValue = array_filter($varValue);
		
		// find coordinated if empty
		if(empty($varValue))
		{
			$usePOST = false;
			
			// first saving
			if($objDC->activeRecord->tstamp < 1)
			{
				$usePOST = true;
			}
			
			$strField = $objDC->field;
			$arrAddress = array();
			$arrAddress[] = ($usePOST ? \Contao\Input::post($strField.'_street') : $objDC->activeRecord->{$strField.'_street'});
			$arrAddress[] = ($usePOST ? \Contao\Input::post($strField.'_zipcode') : $objDC->activeRecord->{$strField.'_zipcode'});
			$arrAddress[] = ($usePOST ? \Contao\Input::post($strField.'_city') : $objDC->activeRecord->{$strField.'_city'});
			$arrAddress[] = ($usePOST ? \Contao\Input::post($strField.'_country') : $objDC->activeRecord->{$strField.'_country'});
			
			$varValue = $this->findCoordinates(implode(',', array_filter($arrAddress,'strlen') ));
		}
		
		if(is_array($varValue))
		{
			$varValue = implode(',', $varValue);
		}
		
		return $varValue;
	}
	
	
	/**
	 * Contao expects a serialized array as value.
	 * @param mixed
	 * @param object
	 */
	public function onLoadCallback($varValue)
	{
		if(is_array($varValue))
		{
			$varValue = implode(',', $varValue);
		}
		
		return serialize(explode(',', $varValue));
	}
	
	
	/**
	 * Modify the dca for CustomCatalogs
	 * @param array		The current field data array
	 * @param string	The name of the field
	 * @param object	The Attribute instance
	 * @param object	The CustomCatalog configuration
	 * @param object	The CustomElement configuration
	 * @param object	The SystemIntegration instance
	 * @return array	The DCA array
	 * @called from prepareField CUSTOMCATALOG  HOOK
	 */
	public function modifyDca($arrDCA,$objCC,$objCE,$objSystemIntegration)
	{
		$objGeolocationAttributes = \Contao\Database::getInstance()->prepare("SELECT * FROM tl_pct_customelement_attribute WHERE pid IN(SELECT id FROM tl_pct_customelement_group WHERE pid=? GROUP BY id) AND type=?")
						->execute($objCE->get('id'),'geolocation');
		if($objGeolocationAttributes->numRows < 1)
		{
			return $arrDCA;
		}
		
		while($objGeolocationAttributes->next())
		{
			$strField = $objGeolocationAttributes->alias;
			
			if(!isset($arrDCA['fields'][$strField]))
			{
				continue;
			}
			
			$arrFieldDef = $arrDCA['fields'][$strField];
			
			// if no options set, remove the whole field from DCA
			if(strlen($objGeolocationAttributes->options) < 1)
			{
				unset($arrDCA['fields'][$strField]);
				continue;
			}
			
			// check if the coords field is supposed to be rendered in the backend
			$arrOptions = StringUtil::deserialize($objGeolocationAttributes->options);
			if(!in_array('coords', $arrOptions))
			{
				unset($arrDCA['fields'][$strField]);
				$arrDCA['fields'][$strField]['sql'] = $arrFieldDef['sql'];
				continue;
			}
			
			unset($arrDCA['fields'][$strField.'_coords']);
		}
		
		return $arrDCA;
	}
	
	
	/**
	 * Parse widget callback
	 * Render the attribute for CustomElements
	 */
	public function parseWidgetCallback($objWidget,$strField,$arrFieldDef,$objDC,$varValue)
	{
		$arrOptions = StringUtil::deserialize($this->get('options'));
		if(empty($arrOptions) || !is_array($arrOptions))
		{
			return '';
		}
		
		// if the coords field is not supposed to be rendered, just write the label
		if(!in_array('coords', $arrOptions))
		{
		  	$strBuffer = '<h3>'.$arrFieldDef['label'][0].'</h3>';
		}
		else
		{
			if(isset($_POST[$strField]) && $objDC->submitted)
			{
				// validate
				$objWidget->validate();
			}

			if($objWidget->hasErrors())
			{
				$objWidget->class = 'error';
			}
			
			$strBuffer = $objWidget->parse();
		}
		
		$arrOptions = StringUtil::deserialize($this->get('options'));
		
		if(empty($arrOptions) || !is_array($arrOptions))
		{
			return $strBuffer;
		}
		
		// remove the coordinates field because it will be rendered by default if set
		if(in_array('coords', $arrOptions))
		{
			unset($arrOptions[array_search('coords',$arrOptions)]);
		}
		
		$arrLabels = $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['geolocation'];
		$arrFieldDef = array
		(
			'inputType' => 'text',
			'exclude'	=> true,
			'eval'		=> array('tl_class'=>'w50'),
			'sql'		=> "varchar(255) NOT NULL default ''",
			'saveDataAs'=> 'varchar',
		);
		
		foreach($arrOptions as $strOption)
		{
			$strName = $strField.'_'.$strOption;
			$arrLabel = $arrLabels[$strOption];
			if(!is_array($arrLabel))
			{
				$arrLabel = array($arrLabel);
			}
						
			$arrFieldDef['label'] = $arrLabel;
			$this->prepareChildAttribute($arrFieldDef,$strName);
		}
		
		return $strBuffer;
	}
	
	
	/**
	 * Render the attribute and return html
	 * @param string
	 * @param mixed
	 * @param object
	 * @param object
	 * @return string
	 */
	public function renderCallback($strField,$varValue,$objTemplate,$objAttribute)
	{
		$varValue = StringUtil::deserialize($varValue);
		
		if(!is_array($varValue))
		{
			$varValue = explode(',', $varValue);
		}
		
		// LATitude
		$strLAT = \floatval( $varValue[0] ?? 0);
		// LONgitude
		$strLON = \floatval( $varValue[1] ?? 0 );

		if( (isset($strLAT) && abs($strLAT) > 0) && (isset($strLON) && abs($strLON) > 0) )
		{
			$objTemplate->hasCoordinates = true;
		}
		
		$objOrigin = $objAttribute->getOrigin();
		$objActiveRecord = $objAttribute->getActiveRecord();
		
		$objTemplate->latitude = $strLAT;
		$objTemplate->longitude = $strLON;
		$objTemplate->size = StringUtil::deserialize($objAttribute->get('size'));
		
		// laod option values
		$arrOptionValues = $objAttribute->loadOptionValues($strField);
		unset($arrOptionValues['coords']);
		
		$arrAddress = array();
		if(!empty($arrOptionValues) && is_array($arrOptionValues))
		{
			foreach($arrOptionValues as $k => $v)
			{
				$objTemplate->{$k} = $v;
				$arrAddress[] = $v;
			}
		}
		
		$objTemplate->formattedAddress = implode(',', $arrAddress);
		$objTemplate->value = $strLAT.','.$strLON;
		$objTemplate->selector = 'googlemap_'.$objActiveRecord->id.'_attr_'.$objAttribute->get('id').($objAttribute->isCopy ? '_'.$objAttribute->get('uuid'):'');
		
		// load languages files for the template
		\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('default','geolocation');
		
		return $objTemplate->parse();
	}
	
	
	/**
	 * Generate wildcard value
	 * @param mixed
	 * @param object	DatabaseResult
	 * @param integer	Id of the Element ( >= CE 1.2.9)
	 * @param string	Name of the table ( >= CE 1.2.9)
	 * @return string
	 */
	 public function processWildcardValue($varValue,$objAttribute,$intElement=0,$strTable='')
	 {
		if($objAttribute->get('type') != 'geolocation')
	 	{
	 		return $varValue;
	 	}
	 	
	 	if( (!$objAttribute->getOrigin() && $intElement < 1 && empty($varValue)) || !$objAttribute->get('options'))
	 	{
		 	return '';
	 	}
	 	
	 	
	 	$objActiveRecord = $objAttribute->get('objActiveRecord');
	 	if(!$objActiveRecord)
	 	{
	 		$objActiveRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$strTable." WHERE id=?")->limit(1)->execute($intElement);
		}
		
		$objAttribute->set('objActiveRecord',$objActiveRecord);
		 	
	 	if(count($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['backendWildcardMapSize']) > 0)
	 	{
		 	$objAttribute->set('size',serialize($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['backendWildcardMapSize']));
		}
	 	$objTemplate = new \Contao\FrontendTemplate($objAttribute->get('template'));
		 
		// is a custom catalog
	 	if(\PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::findCurrent() || \PCT\CustomElements\Plugins\CustomCatalog\Core\CustomCatalogFactory::validateByTableName($strTable) == true)
	 	{
		 	$strField = $objAttribute->get('alias');
		 	
		 	$arrOptionValues = array();
		 	$arrOptions = StringUtil::deserialize($objAttribute->get('options'));
		 	if(!empty($arrOptions) && is_array($arrOptions))
		 	{
			 	foreach($arrOptions as $strOption)
			 	{
				 	$arrOptionValues[$strOption] = $objActiveRecord->{$strField.'_'.$strOption};
			 	}
		 	}
		 	$objAttribute->setOptionValues($arrOptionValues);
		 	
		 	$strBuffer = $this->renderCallback($strField,$varValue,$objTemplate,$objAttribute);
	 	}
	 	// render the wildcard for a custom element item
	 	else
	 	{
	 	 	$strField = $objAttribute->get('uuid');
		 	
		 	$objOrigin = \PCT\CustomElements\Core\Origin::getInstance();
		 	$objOrigin->set('intPid',$intElement);
		 	$objOrigin->set('strTable',$strTable);
		 	$objAttribute->setOrigin($objOrigin);
		 	
		 	$strBuffer = $this->renderCallback($strField,$varValue,$objTemplate,$objAttribute);
		}
		
		return $strBuffer;
	 }
	
	
	/**
	 * Return the field definition for an options field
	 * @param string
	 * @return array
	 */
	public function getOptionFieldDefinition($strOption)
	{
		\PCT\CustomElements\Loader\AttributeLoader::loadLanguageFile('tl_pct_customelement_attribute','geolocation');

		$arrReturn = array
		(
			'label'		=> $GLOBALS['TL_LANG']['tl_pct_customelement_attribute']['geolocation'][$strOption],
			'inputType' => 'text',
			'exclude'	=> true,
			'eval'		=> array('tl_class'=>'w50'),
			'sql'		=> "varchar(255) NOT NULL default ''",
			'saveDataAs'=> 'varchar',
		);
		
		return $arrReturn;
	}


	/**
	 * Find coordinates by an address string
	 * @param string
	 * @param boolean
	 * @return array
	 */
	public function findCoordinates($strAddress,$blnCached=true)
	{
		// look up from cache
		if($blnCached && $this->isModified('findCoordinates'))
		{
			return $this->get('findCoordinates');
		}
		
		// look up from global cache based on address data
		$arrCache = \PCT\CustomElements\Core\Cache::getData();
		if($blnCached && isset($arrCache['GEOLOCATION']['findCoordinates'][$strAddress]) && is_array($arrCache['GEOLOCATION']['findCoordinates'][$strAddress]))
		{
			return $arrCache['GEOLOCATION']['findCoordinates'][$strAddress];
		}
	
		$arrReturn = array();
		$strService = 'google';
		
		$objResponse = null;
		$strBase = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url'] ?: 'https://maps.googleapis.com/maps/api/geocode/json?key=';
		// deprecated fallback
		if(isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['geocoder_url']))
		{
			$strBase = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['geocoder_url'];
		}
		
		$strRequest = $strBase.'&address='.str_replace(' ','+',$strAddress);
		// openstreetmap
		if(isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url']))
		{
			$strBase = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url'];
		}
		if(strlen(strpos($strBase,'openstreetmap')) > 0)
		{
			$params = array('format'=>'json','addressdetails'=>1);
			$queries = parse_url($strBase,PHP_URL_QUERY) ?: '';
			// check for a custom email 
			if(strlen(strpos($queries, 'email')) < 1)
			{
				$params['email'] = \Contao\Config::get('adminEmail');
			}
			$search = ['Ä','ä','Ö','ö','Ü','ü','ß'];
			$replace = ['Ae','ae','Oe','oe','Ue','ue','ss'];
			$strAddress = str_replace($search, $replace, $strAddress);
			$params['q'] = str_replace(' ','+',$strAddress);
			
			$strRequest = urldecode( $strBase.($queries != '' ? '&' : '?').http_build_query($params) );
			$strService = 'openstreetmap';
			
			unset($params);
			unset($queries);
		}
	
		// use curl
		$_curl = curl_init();
        curl_setopt($_curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($_curl, CURLOPT_URL, $strRequest);
        $strResponse= curl_exec($_curl);
        curl_close($_curl);
	    
	    // log
		\Contao\System::getContainer()->get('monolog.logger.contao.general')->info('Geolocation: Request sent to '.$strRequest);
		if(strlen($strResponse) > 0)
		{
			$objResponse = json_decode($strResponse);
		}
		
		// convert openstreetmap data to google response data format
		if($strService == 'openstreetmap' && !empty($objResponse[0]))
		{
			$objResponse[0]->status = 'OK';
			$results = array
			(
				'geometry'=>array 
				(
					'location'=>array
					(
						'lat' => $objResponse[0]->lat,
						'lng' => $objResponse[0]->lon
					)
				)
			);
			
			$objResponse[0]->results = array( json_decode(json_encode($results), FALSE) );
			$objResponse = $objResponse[0];
		}
		
		if($objResponse->status == 'OK')
		{
			$arrReturn['lat'] = $objResponse->results[0]->geometry->location->lat;
			$arrReturn['lng'] = $objResponse->results[0]->geometry->location->lng;
		}
		// OVER_QUERY_LIMIT
		else if($objResponse->status == 'OVER_QUERY_LIMIT' && $this->intRetryCounter < $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_retrys'])
		{
			// wait
			sleep( $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_timeout'] ?: 2 );
			// increase counter
			$this->intRetryCounter++;
			// log
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('Geolocation: OVER_LIMIT_QUERY retry (#'.$this->intRetryCounter.'):  for address '.$strAddress);
			// retry
			return $this->findCoordinates($strAddress,$blnCached);
		}
		else
		{
			if(!isset($objResponse->status))
			{
				"Request failed";
			}
			// log
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('Geolocation: Response status: '.$objResponse->status.' for address "'.$strAddress.'"'.(!empty($objResponse->error_message) ? ' | Error: '.$objResponse->error_message : ''));
		}
		
		if($blnCached)
		{
			$this->set('findCoordinates',$arrReturn);
			$this->markAsModified('findCoordinates');
			// write in global cache as well
			$arrCache['GEOLOCATION']['findCoordinates'][$strAddress] = $arrReturn;
		}
		
		return $arrReturn;
	}
	
	
	/**
	 * Find the distance between to addresses using google maps distance matrix API https://developers.google.com/maps/documentation/distance-matrix/intro?hl=de
	 * @param string	Address A
	 * @param string	Address B
	 * @param array		Optional array
	 *
	 * $arrOptions
	 * @property "request"	Optional request string
	 */
	public function findDistance($strAddressA, $strAddressB,$arrOptions=array(), $blnCached=true)
	{
		// look up from cache
		if($blnCached && $this->isModified('findDistance'))
		{
			return $this->get('findDistance');
		}
		
		if(strlen($strAddressA) < 1 || strlen($strAddressB) < 1)
		{
			return -1;
		}
		
		// look up from global cache based on address data
		$arrCache = \PCT\CustomElements\Core\Cache::getData();
		if($blnCached && isset($arrCache['GEOLOCATION']['findDistance'][$strAddressA.'__'.$strAddressB]) && is_array($arrCache['GEOLOCATION']['findDistance'][$strAddressA.'__'.$strAddressB]))
		{
			return $arrCache['GEOLOCATION']['findDistance'][$strAddressA.'__'.$strAddressB];
		}
		
		// API key
		if($arrOptions['apikey'])
		{
			$this->set('apikey',$arrOptions['apikey']);
		}
		
		$objReturn = new \stdClass;
		
		$strRequest = 'https://maps.googleapis.com/maps/api/distancematrix/json?origins='.str_replace(' ','+',$strAddressA).'&destinations='.str_replace(' ','+',$strAddressB).($this->get('apikey') ? '&key='.$this->get('apikey') : '');
		
		// get request string from globale
		if(isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['distancematrix_url']))
		{
			$strRequest = $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['distancematrix_url'].'&origins='.str_replace(' ','+',$strAddressA).'&destinations='.str_replace(' ','+',$strAddressB);
		}
		
		// optional request string
		if(strlen($arrOptions['request']) > 0)
		{
			$strRequest = $arrOptions['request'];
		}
		
		$objResponse = null;
		
		// use curl
		$_curl = curl_init();
        curl_setopt($_curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($_curl, CURLOPT_URL, $strRequest);
        $strResponse= curl_exec($_curl);
        curl_close($_curl);
		
		// log
		\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('Geolocation: Request sent to '.$strRequest);

		if(strlen($strResponse) > 0)
		{
			$objResponse = json_decode($strResponse);
		}
		
		$intDistance = -1;
		$strDistance = '';
		if($objResponse->status == 'OK')
		{
			if($objResponse->status == 'OK')
			{
				$intDistance = $objResponse->rows[0]->elements[0]->distance->value;
				$strDistance = $objResponse->rows[0]->elements[0]->distance->text;
			}
		}
		// OVER_QUERY_LIMIT
		else if($objResponse->status == 'OVER_QUERY_LIMIT' && $this->intRetryCounter < $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_retrys'])
		{
			// wait
			sleep( $GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_timeout'] ?: 2 );
			// increase counter
			$this->intRetryCounter++;
			// log
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info('Geolocation: OVER_LIMIT_QUERY retry (#'.$this->intRetryCounter.'):  for address '.$strAddressA.'__'.$strAddressB);

			// retry
			return $this->findDistance($strAddressA, $strAddressB,$arrOptions,$blnCached);
		}
		else
		{
			if(!isset($objResponse->status))
			{
				"Request failed";
			}
			
			$objReturn->hasError = true;
			$objReturn->error = $objResponse->status;
			
			// log
			\Contao\System::getContainer()->get('monolog.logger.contao.error')->info( 'Geolocation: Response status: '.$objResponse->status.' for distance "'.$strAddressA . ' to '.$strAddressB.'"'.(!empty($objResponse->error_message) ? ' | Error: '.$objResponse->error_message : '') );
		}
		
		$objReturn->distance = array('value'=>$intDistance,'text'=>$strDistance);
		$objReturn->response = $objResponse;
		
		// cache
		if($blnCached)
		{
			$this->set('findDistance',$objReturn);
			$this->markAsModified('findDistance');
			// write in global cache as well
			$arrCache['GEOLOCATION']['findCoordinates'][$strAddressA.'__'.$strAddressB] = $objReturn;
		}
		
		return $objReturn;
	}
	
	
	/**
	 * Shortcut to findDistance using only the target address
	 * @inheritdoc
	 */
	public function findDistanceTo($strAddressB,$arrOptions=array())
	{
		$objActiveRecord = $this->getActiveRecord();
		
		// laod option values
		$arrOptionValues = $this->loadOptionValues( $this->get('alias') );
		unset($arrOptionValues['coords']);
		
		$arrAddress = array();
		if(!empty($arrOptionValues) && is_array($arrOptionValues))
		{
			foreach($arrOptionValues as $k => $v)
			{
				$arrAddress[] = $v;
			}
		}
		
		return $this->findDistance(implode(' ',$arrAddress),$strAddressB, $arrOptions);
	}
	
	
	/**
	 * Find the distance using coordinates
	 * @param string|array	A coordinates string in standard decimal format e.g. latitude,longitude or an array [0] => latitude [1] => longitude
	 * @param string|array	A coordinates string in standard decimal format e.g. latitude,longitude or an array [0] => latitude [1] => longitude
	 * @param integer		Round the distance to n digits
	 * @return object
	 */
	public function findDistanceByCoords($varCoordsA, $varCoordsB, $intDecimal=2, $arrOptions=array())
	{
		if(empty($varCoordsA) || empty($varCoordsB))
		{
			return null;
		}
		
		$numRadius = 6371.0; // km
		$strUnit = 'km';
		
		// apply custom radius e.g. for calculating in miles or seamiles
		if($arrOptions['radius'])
		{
			$numRadius = $arrOptions['radius'];
		}
		
		// custom unit
		if($arrOptions['unit'])
		{
			$strUnit = $arrOptions['unit'];
		}
		
		if(!is_array($varCoordsA))
		{
			$varCoordsA = array_map('trim',explode(',', $varCoordsA));
		}
		
		if(!is_array($varCoordsB))
		{
			$varCoordsB = array_map('trim',explode(',', $varCoordsB));
		}
		
		$lat1 = $varCoordsA[0];
		$lng1 = $varCoordsA[1];
		$lat2 = $varCoordsB[0];
		$lng2 = $varCoordsB[1];
		
		// Haversine based on : http://phplernen.org/snippets/entfernung-zwischen-zwei-geokoordinaten-berechnen/
		$dlng 	= static::calc_radians($lng2-$lng1);
		$dlat 	= static::calc_radians($lat2-$lat1);
		$a 		= pow(sin($dlat/2),2) + cos(static::calc_radians($lat1)) * cos(static::calc_radians($lat2)) * pow(sin($dlng/2),2);
		$angle 	= 2 * atan2(sqrt($a),sqrt(1-$a));
		
		$numDistance = $angle * $numRadius;
		$numRawDistance = $numDistance;
		
		if($intDecimal > -1)
		{
			$numDistance = number_format($numDistance,$intDecimal);
		}
		
		$objReturn = new \StdClass;
		$objReturn->distance = array
		(
			'value' => $numDistance,
			'text' 	=> $numDistance .' '.$strUnit,
			'raw'	=> $numRawDistance,
 		);
 		
 		return $objReturn;
	}
	
	
	/**
	 * Calculate the radians of a value
	 * @param number|float
	 * @return number|float
	 */
	protected static function calc_radians($numValue)
	{
		return $numValue * pi() / 180;
	}
}