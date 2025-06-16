<?php

// vendor/contao/core-bundle/contao/languages/sv/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Ett fel uppstod';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'Vad är problemet?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Hur kan jag åtgärda problemet?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Berätta mer';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'För att anpassa detta meddelande, skapa en anpassad Twig mall som skriver över <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Ett fel uppstod under körning av skriptet. Något fungerar inte som det ska.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Öppna den aktuella loggfilen i <code>var/logs</code>-katalogen och hitta tillhörande felmeddelande (vanligtvis det sista).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'Skriptkörningen avbröts, eftersom något inte fungerar korrekt. Själva felmeddelandet döljs av detta meddelande av säkerhetsskäl och finns i den aktuella loggfilen (se ovan). Om du inte förstår felmeddelandet eller inte vet hur du åtgärdar problemet, besök <a href="%s" target="_blank" rel="noreferrer noopener">Contaos supportsida</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Felaktigt token';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'Token kunde inte verifieras.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = '<a href="javascript:window.location.href=window.location.href">Klicka här</a> och försök igen. Använd inte bakåtknappen i din webbläsare.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Detta felmeddelande visas om det finns en POST-förfrågan utan giltigt autentiserings-token. I Contao 2.10 så har hänvisningskontrollen ersatts av ett token-system. Om problemet kvarstår så kan det bero på en 3:e-partsmodul som inte är kompatibel eller så är din Contao-installation inte uppdaterad på ett korrekt sätt.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'För mer information, besök <a href="%s" target="_blank" rel="noreferrer noopener">Contaos supportsida</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Tjänsten är ej tillgänglig';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'Hemsidan är för tillfället inte tillgänglig. Vänligen återkom lite senare.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Det gick inte att generera front-end-URL';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'URL: en kunde inte genereras, eftersom rutten har obligatoriska parametrar som inte anges. Ytterligare information (t.ex. ett nyhetsalias) måste tillhandahållas.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Symfony-rutter kan ha variabla parametrar som valideras med reguljära uttryck. Följande konfiguration kunde inte lösas:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Ruttväg';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Namn och mediatyper';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Krav (Regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Förvalt värde';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'tom';
