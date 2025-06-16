<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2024
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  pct_customelements
 * @subpackage pct_customelements_plugin_customcatalog
 */

namespace PCT\CustomCatalog\EventListener;

use PCT\CustomElements\Plugins\CustomCatalog\Core\Maintenance;

class SitemapListener
{
    public static function invoke($event)
    {
        $objMaintenance = new Maintenance;
        $arrPages = $objMaintenance->getSearchablePages( array() );
        foreach($arrPages as $strUrl)
        {
            $event->addUrlToDefaultUrlSet($strUrl);
        }
    }
}
