<?php

// vendor/contao/core-bundle/contao/languages/nl/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Er is een fout opgetreden';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'Wat is er aan de hand?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Hoe kan ik het probleem verhelpen?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Vertel me meer';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Om deze mededeling aan te passen, maakt u een standaard Twig template welke <em>%s</em> overschrijft.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Er is een fout opgetreden tijdens het uitvoeren van het script. Iets werkt niet helemaal correct.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Open het huidige log bestand in de <code>var/logs</code>  map en zoek naar de bijbehorende foutmelding (meestal de laatste).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'De uitvoering van het script is gestopt, omdat er iets niet goed werkt. De eigenlijke foutmelding wordt om veiligheidsredenen door deze melding verborgen en is terug te vinden in het huidige logbestand (zie hierboven). Als u de foutmelding niet begrijpt of niet weet hoe u het probleem kunt oplossen, raadpleeg de <a href="%s" target="_blank" rel="noreferrer noopener">Contao support pagina</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Ongeldig request token';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'Het request token kon niet worden gecontroleerd.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = '<a href="javascript:window.location.href=window.location.href">Klik hier</a> en probeer het opnieuw. Gebruik niet de terug-knop van uw browser.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Deze fout treedt op als er een POST-request zonder geldig authenticatie token wordt gedaan. In Contao 2,10 is de referer check vervangen door een request token systeem. Als het probleem zich blijft voortdoen maakt u mogelijk gebruik van een niet-compatibele extensie van derden of uw Contao installatie is niet correct geüpdatet.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Ga voor meer informatie naar de <a href="%s" target="_blank" rel="noreferrer noopener">Contao support pagina</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Dienst niet beschikbaar';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'De website is momenteel niet beschikbaar. Kom later nog een keer terug.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Kan front-end-URL niet genereren';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'De URL kon niet worden gegenereerd, omdat de route verplichte parameters heeft die niet zijn opgegeven. Aanvullende informatie (bijvoorbeeld een nieuwsalias) moet worden verstrekt.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Symfony-routes kunnen variabele parameters hebben, die worden gevalideerd met behulp van reguliere expressies. De volgende configuratie kon niet worden opgelost:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Routepad';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Naam';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Vereiste (Regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Standaard waarde';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'leeg';
