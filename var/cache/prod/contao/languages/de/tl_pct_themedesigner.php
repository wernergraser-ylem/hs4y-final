<?php

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2016
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
$GLOBALS['TL_LANG']['tl_pct_themedesigner']['delete'][0] = 'Datensatz %s löschen';
$GLOBALS['TL_LANG']['tl_pct_themedesigner']['delete'][1] = 'Datensatz %s löschen';
$GLOBALS['TL_LANG']['tl_pct_themedesigner']['active'][0] = 'Version %s aktivieren';
$GLOBALS['TL_LANG']['tl_pct_themedesigner']['active'][1] = 'Version %s aktivieren';
$GLOBALS['TL_LANG']['tl_pct_themedesigner']['theme'][0] = 'Theme';
$GLOBALS['TL_LANG']['tl_pct_themedesigner']['theme'][1] = '';
$GLOBALS['TL_LANG']['tl_pct_customelement']['toggleMode'] = 'Aktivieren';
if ((bool) \Contao\Config::get('pct_themedesigner_hidden') === \false) {
    $GLOBALS['TL_LANG']['tl_pct_customelement']['toggleMode'] = 'Deaktivieren';
}
