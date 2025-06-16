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
 * Globals
 */
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['backendWildcardMapSize'] = array(350,150);
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['defaultRounding'] = 8;
$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['useMiles'] = false;

// geolocation google maps geocoder url for api requests
if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url']) ) 
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url'] = 'https://maps.googleapis.com/maps/api/geocode/json?key=';	
	// use nominatim
	#$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['geocoder_url'] = 'https://nominatim.openstreetmap.org/search';
}
// define the number of retries to fetch an address when the OVER_QUERY_LIMIT has been exceeded.
if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_retrys']) )
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_retrys'] = 3;
}
// timeout in seconds before starting a new retry
if( !isset($GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_timeout']) )
{
	$GLOBALS['PCT_CUSTOMELEMENTS']['ATTRIBUTES']['geolocation']['google']['over_query_limit_timeout'] = 2;
}

/**
 * Hooks
 */
$GLOBALS['CUSTOMELEMENTS_HOOKS']['processWildcardValue'][] = array('PCT\CustomElements\Attributes\Geolocation','processWildcardValue');
$GLOBALS['CUSTOMCATALOG_HOOKS']['prepareDataContainer'][] = array('PCT\CustomElements\Attributes\Geolocation','modifyDca');