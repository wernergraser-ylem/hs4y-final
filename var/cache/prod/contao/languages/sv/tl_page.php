<?php

// vendor/contao/core-bundle/contao/languages/sv/tl_page.xlf
$GLOBALS['TL_LANG']['tl_page']['title']['0'] = 'Sidnamn';
$GLOBALS['TL_LANG']['tl_page']['title']['1'] = 'Sidans namn så som den visas i navigeringen, ska inte innehålla fler än 65 tecken.';
$GLOBALS['TL_LANG']['tl_page']['type']['0'] = 'Sidtyp';
$GLOBALS['TL_LANG']['tl_page']['type']['1'] = 'Ange en sidtyp beroende på sidans ändamål.';
$GLOBALS['TL_LANG']['tl_page']['alias']['0'] = 'Sidalias';
$GLOBALS['TL_LANG']['tl_page']['alias']['1'] = 'Sidaliaset är en unik referens till sidan som kan användas istället för dess numeriska ID.';
$GLOBALS['TL_LANG']['tl_page']['requireItem']['0'] = 'Kräva ett objekt';
$GLOBALS['TL_LANG']['tl_page']['requireItem']['1'] = 'Utlösa ett 404-fel om sidans URL inte innehåller ett objektalias.';
$GLOBALS['TL_LANG']['tl_page']['routePath']['0'] = 'Ruttväg';
$GLOBALS['TL_LANG']['tl_page']['routePath']['1'] = 'En förhandsvisning av den slutliga sökvägen (eventuellt med platshållare) för att matcha den här sidan.';
$GLOBALS['TL_LANG']['tl_page']['routePriority']['0'] = 'Ruttens prioritet';
$GLOBALS['TL_LANG']['tl_page']['routePriority']['1'] = 'Alternativt konfigurera prioriteten för att påverka ordningen på rutter. Standard: 0';
$GLOBALS['TL_LANG']['tl_page']['pageTitle']['0'] = 'Sidtitel';
$GLOBALS['TL_LANG']['tl_page']['pageTitle']['1'] = 'Sidans titel syns t.ex. i webbsidans TITEL-tagg och i sökresultatet. Den ska inte innehålla mer än 65 tecken. <br />Om du lämnar detta fält tomt kommer sidnamnet att användas i stället.';
$GLOBALS['TL_LANG']['tl_page']['language']['0'] = 'Språk';
$GLOBALS['TL_LANG']['tl_page']['language']['1'] = 'Ange sidans språk enligt ISO-639-standarden (t.ex. "en" för engelska eller "en_US" för amerikansk engelska).';
$GLOBALS['TL_LANG']['tl_page']['robots']['0'] = 'Robot-tag';
$GLOBALS['TL_LANG']['tl_page']['robots']['1'] = 'Här kan du specificera hur sökmotorer ska hantera sidan.';
$GLOBALS['TL_LANG']['tl_page']['maintenanceMode']['0'] = 'Underhållsläge';
$GLOBALS['TL_LANG']['tl_page']['maintenanceMode']['1'] = 'Visa besökare en sida som den här webbplatsen för närvarande underhålls.';
$GLOBALS['TL_LANG']['tl_page']['description']['0'] = 'Sidbeskrivning';
$GLOBALS['TL_LANG']['tl_page']['description']['1'] = 'Du kan ange en kort beskrivning av sidan som kommer att visas av sökmotorerna. <br />En sökmotor indexerar vanligtvis mellan 150 och 300 tecken.';
$GLOBALS['TL_LANG']['tl_page']['redirect']['0'] = 'Omdirigeringstyp';
$GLOBALS['TL_LANG']['tl_page']['redirect']['1'] = 'Tillfälliga omdirigeringar kommer skicka ett HTTP 302-huvud, permanenta ett HTTP 301-huvud.';
$GLOBALS['TL_LANG']['tl_page']['alwaysForward']['0'] = 'Omdirigera alltid';
$GLOBALS['TL_LANG']['tl_page']['alwaysForward']['1'] = 'Omdirigera till målsidan även om det finns fråge- eller sökvägsparametrar.';
$GLOBALS['TL_LANG']['tl_page']['jumpTo']['0'] = 'Omdirigera till';
$GLOBALS['TL_LANG']['tl_page']['jumpTo']['1'] = 'Välj den sida som besökare kommer att omdirigeras till. Lämna tomt för att omdirigera till den första ordinarie undersidan.';
$GLOBALS['TL_LANG']['tl_page']['redirectBack']['0'] = 'Omdirigera till senaste besökta sidan';
$GLOBALS['TL_LANG']['tl_page']['redirectBack']['1'] = 'Omdiriger medlemmen tillbaka till den senast besökta sidan istället för omdirigeringssidan.';
$GLOBALS['TL_LANG']['tl_page']['fallback']['0'] = 'Språkreträtt';
$GLOBALS['TL_LANG']['tl_page']['fallback']['1'] = 'Contao kommer automatiskt att omdirigera en användare till en rotsida på dennes språk eller till språkreträtt-sidan. Om det inte finns någon språkreträtt-sida kommer ett felmeddelande - <em>Ingen sida funnen</em> - att visas.';
$GLOBALS['TL_LANG']['tl_page']['disableLanguageRedirect']['0'] = 'Inaktivera omdirigering av språk';
$GLOBALS['TL_LANG']['tl_page']['disableLanguageRedirect']['1'] = 'Omdirigera inte besökare till denna webbplats rot baserat på deras föredragna webbläsarspråk.';
$GLOBALS['TL_LANG']['tl_page']['favicon']['0'] = 'Favicon';
$GLOBALS['TL_LANG']['tl_page']['favicon']['1'] = 'Här kan du välja ett favicon för webbplatsen.';
$GLOBALS['TL_LANG']['tl_page']['robotsTxt']['0'] = 'Anpassat robots.txt-innehåll';
$GLOBALS['TL_LANG']['tl_page']['robotsTxt']['1'] = 'Här kan du ange anpassat robots.txt-innehåll. Det kan utvidgas automatiskt med tillägg.';
$GLOBALS['TL_LANG']['tl_page']['dns']['0'] = 'Domännamn';
$GLOBALS['TL_LANG']['tl_page']['dns']['1'] = 'Om du tilldelar ett domännamn tilll en hemsidas rotsida kommer besökarna att omdirigeras till denna hemsida när de anger dess domännamn (t.ex.. <em>minsida.se</em> eller <em>subdomän.minsida.se</em>).';
$GLOBALS['TL_LANG']['tl_page']['staticFiles']['0'] = 'Fil-URL';
$GLOBALS['TL_LANG']['tl_page']['staticFiles']['1'] = 'Fil-URL appliceras på <em>tl_files</em>-mappen och alla bilders tumnaglar (optimering av sidladdningshastighet).';
$GLOBALS['TL_LANG']['tl_page']['staticPlugins']['0'] = 'Plugin-URL';
$GLOBALS['TL_LANG']['tl_page']['staticPlugins']['1'] = 'Plugin-URL appliceras på alla resurser i <em>plugins</em>-mappen (optimering av sidladdningshastighet).';
$GLOBALS['TL_LANG']['tl_page']['mailerTransport']['0'] = 'Posttransport';
$GLOBALS['TL_LANG']['tl_page']['mailerTransport']['1'] = 'Här kan du åsidosätta posttransporten som används för att skicka e-post på denna webbplats.';
$GLOBALS['TL_LANG']['tl_page']['enableCanonical']['0'] = 'Gör det möjligt rel="canonical"';
$GLOBALS['TL_LANG']['tl_page']['enableCanonical']['1'] = 'Lägg till rel="canonical"-taggar på webbplatsen.';
$GLOBALS['TL_LANG']['tl_page']['canonicalLink']['0'] = 'Anpassad URL';
$GLOBALS['TL_LANG']['tl_page']['canonicalLink']['1'] = 'Här kan du ställa in en anpassad kanonisk URL som https://example.com/.';
$GLOBALS['TL_LANG']['tl_page']['canonicalKeepParams']['0'] = 'Query parametrar';
$GLOBALS['TL_LANG']['tl_page']['canonicalKeepParams']['1'] = 'Som standard tar Contao bort query-parametrarna i den kanoniska URL:en. Här kan du lägga till en kommaseparerad lista med query-parametrar att bevara. Använd "*" som jokertecken.';
$GLOBALS['TL_LANG']['tl_page']['adminEmail']['0'] = 'E-postadress till hemsidans administratör';
$GLOBALS['TL_LANG']['tl_page']['adminEmail']['1'] = 'Denna e-postadress kommer att användas för att skicka och ta emot systemmeddelanden.';
$GLOBALS['TL_LANG']['tl_page']['dateFormat']['0'] = 'Datumformat';
$GLOBALS['TL_LANG']['tl_page']['dateFormat']['1'] = 'Ange ett datumformat så som det används av PHP-funktionen date().';
$GLOBALS['TL_LANG']['tl_page']['timeFormat']['0'] = 'Tidsformat';
$GLOBALS['TL_LANG']['tl_page']['timeFormat']['1'] = 'Ange ett tidsformat så som det används av PHP-funktionen date().';
$GLOBALS['TL_LANG']['tl_page']['datimFormat']['0'] = 'Datum- och tidsformat';
$GLOBALS['TL_LANG']['tl_page']['datimFormat']['1'] = 'Ange ett datum- och tidsformat så som det används av PHP-funktionen date().';
$GLOBALS['TL_LANG']['tl_page']['validAliasCharacters']['0'] = 'Giltiga alias-tecken';
$GLOBALS['TL_LANG']['tl_page']['validAliasCharacters']['1'] = 'Här kan du välja en anpassad teckenuppsättning för autogenererade alias.';
$GLOBALS['TL_LANG']['tl_page']['useFolderUrl']['0'] = 'Aktivera folder-URL:er';
$GLOBALS['TL_LANG']['tl_page']['useFolderUrl']['1'] = 'Skapa sidalias för mappstil som <em>docs/install/download.html</em> istället för <em>docs-install-download.html</em>.';
$GLOBALS['TL_LANG']['tl_page']['urlPrefix']['0'] = 'URL-prefix';
$GLOBALS['TL_LANG']['tl_page']['urlPrefix']['1'] = 'Ange ett URL-prefix (t.ex. språket) som kommer att läggas före alla sidalias under denna webbplatsrotsida.';
$GLOBALS['TL_LANG']['tl_page']['urlSuffix']['0'] = 'URL suffix';
$GLOBALS['TL_LANG']['tl_page']['urlSuffix']['1'] = 'URL-suffixet läggs till i URI-strängen för att simulera statiska dokument.';
$GLOBALS['TL_LANG']['tl_page']['useSSL']['0'] = 'Protokoll';
$GLOBALS['TL_LANG']['tl_page']['useSSL']['1'] = 'Här kan du välja vilket protokoll som ska användas för webbplatsen.';
$GLOBALS['TL_LANG']['tl_page']['autoforward']['0'] = 'Omdirigering till en annan sida';
$GLOBALS['TL_LANG']['tl_page']['autoforward']['1'] = 'Om du väljer detta alternativ kommer besökaren att omdirigeras till en annan sida (t.ex. en loginsida eller en välkomstsida).';
$GLOBALS['TL_LANG']['tl_page']['protected']['0'] = 'Skydda sidan';
$GLOBALS['TL_LANG']['tl_page']['protected']['1'] = 'Om du anger detta val kan du styra så att bara vissa medlemsgrupper har åtkomst till sidan.';
$GLOBALS['TL_LANG']['tl_page']['groups']['0'] = 'Tillåtna medlemsgrupper';
$GLOBALS['TL_LANG']['tl_page']['groups']['1'] = 'Här kan du tilldela åtkomst till en eller flera medlemsgrupper. Om du inte anger någon grupp kommer alla som loggar in i frontend att ha åtkomst till denna sida.';
$GLOBALS['TL_LANG']['tl_page']['includeLayout']['0'] = 'Tilldela en layout';
$GLOBALS['TL_LANG']['tl_page']['includeLayout']['1'] = 'Som standard använder en sida samma layout som dess föräldrasida. <br />Om du väljer detta val kan du tilldela en ny layout till den aktuella sidan och dess undersidor.';
$GLOBALS['TL_LANG']['tl_page']['layout']['0'] = 'Sidlayout';
$GLOBALS['TL_LANG']['tl_page']['layout']['1'] = 'Du kan hantera sidlayouter med modulen "Teman".';
$GLOBALS['TL_LANG']['tl_page']['subpageLayout']['0'] = 'Undersida layout';
$GLOBALS['TL_LANG']['tl_page']['subpageLayout']['1'] = 'Här kan du välja en annan layout för undersidor.';
$GLOBALS['TL_LANG']['tl_page']['includeCache']['0'] = 'Ställ in cache-timeouts';
$GLOBALS['TL_LANG']['tl_page']['includeCache']['1'] = 'Ställ in cache-timeoutvärden för sidan och dess undersidor.';
$GLOBALS['TL_LANG']['tl_page']['cache']['0'] = 'Delad cache-timeout';
$GLOBALS['TL_LANG']['tl_page']['cache']['1'] = 'Perioden efter vilken sidan inte längre ska betraktas som ny av en delad cache.';
$GLOBALS['TL_LANG']['tl_page']['alwaysLoadFromCache']['0'] = 'Ladda alltid från delad cache';
$GLOBALS['TL_LANG']['tl_page']['alwaysLoadFromCache']['1'] = 'Ladda alltid den här sidan från den delade cachen, även om en medlem är inloggad. Observera att du inte längre kan anpassa sidan för inloggade medlemmar i det här fallet!';
$GLOBALS['TL_LANG']['tl_page']['clientCache']['0'] = 'Privat cache-timeout';
$GLOBALS['TL_LANG']['tl_page']['clientCache']['1'] = 'Perioden efter vilken sidan inte längre ska betraktas som ny av en privat cache.';
$GLOBALS['TL_LANG']['tl_page']['includeChmod']['0'] = 'Tilldela behörigheter';
$GLOBALS['TL_LANG']['tl_page']['includeChmod']['1'] = 'Med behörigheter kan du definiera till vilken gräns en backend-användare kan ändra i en sida och sina artiklar. <br />Om du inte väljer detta alernativ kommer sidan att ha samma behörigheter som sin förälder.';
$GLOBALS['TL_LANG']['tl_page']['cuser']['0'] = 'Ägare';
$GLOBALS['TL_LANG']['tl_page']['cuser']['1'] = 'Ange en användare som ägare av denna sida.';
$GLOBALS['TL_LANG']['tl_page']['cgroup']['0'] = 'Grupp';
$GLOBALS['TL_LANG']['tl_page']['cgroup']['1'] = 'Välj en användargrupp som ägare till sidan.';
$GLOBALS['TL_LANG']['tl_page']['chmod']['0'] = 'Användarbehörighet';
$GLOBALS['TL_LANG']['tl_page']['chmod']['1'] = 'Varje sida har tre behörighetsnivåer: en för Användare, en för Användargrupp och en för Alla. Du kan tilldela olika behörigheter till var och en av dessa nivåer.';
$GLOBALS['TL_LANG']['tl_page']['noSearch']['0'] = 'Sök inte på denna sida';
$GLOBALS['TL_LANG']['tl_page']['noSearch']['1'] = 'Om du väljer detta alternativ kommer denna sida att uteslutas från sökoperationer på hemsidan.';
$GLOBALS['TL_LANG']['tl_page']['cssClass']['0'] = 'Stilmallsklass';
$GLOBALS['TL_LANG']['tl_page']['cssClass']['1'] = 'Klasser(na) kommer att användas i navigationsmenyn och i &lt;body&gt;-tagg.';
$GLOBALS['TL_LANG']['tl_page']['sitemap']['0'] = 'Visa i HTML-webbplatskarta';
$GLOBALS['TL_LANG']['tl_page']['sitemap']['1'] = 'Här kan du definiera om sidan ska visas i HTML-webbplatskartan.';
$GLOBALS['TL_LANG']['tl_page']['hide']['0'] = 'Dölj i navigering';
$GLOBALS['TL_LANG']['tl_page']['hide']['1'] = 'Dölj sidan i navigeringsmenyn.';
$GLOBALS['TL_LANG']['tl_page']['accesskey']['0'] = 'Kortkommando';
$GLOBALS['TL_LANG']['tl_page']['accesskey']['1'] = 'Ett kortkommando är en kombination av [ALT]-tangenten och ett annat tecken som i detta fall ger ett visst objekt fokus.';
$GLOBALS['TL_LANG']['tl_page']['published']['0'] = 'Publicerad';
$GLOBALS['TL_LANG']['tl_page']['published']['1'] = 'Om du markerar detta alternativ kommer sidan att visas för besökarna på din webbplats.';
$GLOBALS['TL_LANG']['tl_page']['start']['0'] = 'Börja visa fr.o.m';
$GLOBALS['TL_LANG']['tl_page']['start']['1'] = 'Om du vill förhindra att sidan visas på hemsidan före ett visst datum/tid kan du ange det här. Annars lämnar du fältet tomt.';
$GLOBALS['TL_LANG']['tl_page']['stop']['0'] = 'Sluta visa fr.o.m';
$GLOBALS['TL_LANG']['tl_page']['stop']['1'] = 'Om du vill förhindra att sidan visas på hemsidan efter ett visst datum/tid kan du ange det här. Annars lämnar du fältet tomt.';
$GLOBALS['TL_LANG']['tl_page']['enforceTwoFactor']['0'] = 'Tillämpa tvåfaktorautentisering';
$GLOBALS['TL_LANG']['tl_page']['enforceTwoFactor']['1'] = 'Tillämpa tvåfaktorautentisering för alla medlemmar.';
$GLOBALS['TL_LANG']['tl_page']['twoFactorJumpTo']['0'] = 'Tvåfaktors omdirigeringssida';
$GLOBALS['TL_LANG']['tl_page']['twoFactorJumpTo']['1'] = 'Välj den sida till vilken medlemmarna kommer att omdirigeras för att ställa in tvåfaktorautentisering.';
$GLOBALS['TL_LANG']['tl_page']['enableCsp']['0'] = 'Aktivera CSP';
$GLOBALS['TL_LANG']['tl_page']['enableCsp']['1'] = 'Aktivera säkerhetspolicy för innehåll för denna webbplats.';
$GLOBALS['TL_LANG']['tl_page']['csp']['0'] = 'Policy för innehållssäkerhet';
$GLOBALS['TL_LANG']['tl_page']['csp']['1'] = 'Här kan du ange anpassade direktiv för säkerhetspolicy för innehåll.';
$GLOBALS['TL_LANG']['tl_page']['cspReportOnly']['0'] = 'Endast rapportering';
$GLOBALS['TL_LANG']['tl_page']['cspReportOnly']['1'] = 'Rapportera endast policyöverträdelser utan att verkställa dem.';
$GLOBALS['TL_LANG']['tl_page']['cspReportLog']['0'] = 'Aktivera loggning av rapporter';
$GLOBALS['TL_LANG']['tl_page']['cspReportLog']['1'] = 'Logga överträdelser av CSP i Contaos systemlogg.';
$GLOBALS['TL_LANG']['tl_page']['title_legend'] = 'Namn och typ';
$GLOBALS['TL_LANG']['tl_page']['routing_legend'] = 'Routing';
$GLOBALS['TL_LANG']['tl_page']['meta_legend'] = 'Metadata';
$GLOBALS['TL_LANG']['tl_page']['canonical_legend'] = 'Kanonisk URL';
$GLOBALS['TL_LANG']['tl_page']['system_legend'] = 'Systeminställningar';
$GLOBALS['TL_LANG']['tl_page']['redirect_legend'] = 'Omdirigeringsinställningar';
$GLOBALS['TL_LANG']['tl_page']['url_legend'] = 'URL-inställningar';
$GLOBALS['TL_LANG']['tl_page']['language_legend'] = 'Språkinställningar';
$GLOBALS['TL_LANG']['tl_page']['website_legend'] = 'Webbplatsinställningar';
$GLOBALS['TL_LANG']['tl_page']['global_legend'] = 'Globala inställningar';
$GLOBALS['TL_LANG']['tl_page']['sitemap_legend'] = 'XML-sajtkarta';
$GLOBALS['TL_LANG']['tl_page']['forward_legend'] = 'Omdirigera automatiskt';
$GLOBALS['TL_LANG']['tl_page']['protected_legend'] = 'Åtkomstkydd';
$GLOBALS['TL_LANG']['tl_page']['layout_legend'] = 'Layout-inställningar';
$GLOBALS['TL_LANG']['tl_page']['cache_legend'] = 'Cache-inställningar';
$GLOBALS['TL_LANG']['tl_page']['chmod_legend'] = 'Användarbehörighet';
$GLOBALS['TL_LANG']['tl_page']['expert_legend'] = 'Expertinställningar';
$GLOBALS['TL_LANG']['tl_page']['tabnav_legend'] = 'Tangentbordsnavigation';
$GLOBALS['TL_LANG']['tl_page']['publish_legend'] = 'Publiceringsinställningar';
$GLOBALS['TL_LANG']['tl_page']['twoFactor_legend'] = 'Tvåfaktorautentisering';
$GLOBALS['TL_LANG']['tl_page']['csp_legend'] = 'Policy för innehållssäkerhet';
$GLOBALS['TL_LANG']['tl_page']['permanent'] = '301 Permanent omdirigering';
$GLOBALS['TL_LANG']['tl_page']['temporary'] = '302 Tillfällig omdirigering';
$GLOBALS['TL_LANG']['tl_page']['map_default'] = 'Förvalt';
$GLOBALS['TL_LANG']['tl_page']['map_always'] = 'Visa alltid';
$GLOBALS['TL_LANG']['tl_page']['map_never'] = 'Visa aldrig';
$GLOBALS['TL_LANG']['tl_page']['layout_inherit'] = 'Ärva sidlayout';
$GLOBALS['TL_LANG']['tl_page']['new']['0'] = 'Ny';
$GLOBALS['TL_LANG']['tl_page']['new']['1'] = 'Skapa en ny sida';
$GLOBALS['TL_LANG']['tl_page']['show'] = 'Visa detaljer för sidan med ID %s';
$GLOBALS['TL_LANG']['tl_page']['edit'] = 'Redigera sidan med ID %s';
$GLOBALS['TL_LANG']['tl_page']['cut'] = 'Flytta sida med ID %s';
$GLOBALS['TL_LANG']['tl_page']['copy'] = 'Kopiera sidan med ID %s';
$GLOBALS['TL_LANG']['tl_page']['copyChildren'] = 'Kopiera sidan med ID %s tillsammans med ev. undersidor';
$GLOBALS['TL_LANG']['tl_page']['delete'] = 'Ta bort sidan med ID %s';
$GLOBALS['TL_LANG']['tl_page']['toggle']['0'] = 'Publicera / avpublicera sida';
$GLOBALS['TL_LANG']['tl_page']['toggle']['1'] = 'Avpublicera sida ID %s';
$GLOBALS['TL_LANG']['tl_page']['toggle']['2'] = 'Publicera sida ID %s';
$GLOBALS['TL_LANG']['tl_page']['pasteinto']['0'] = 'Klistra in efter rubriken';
$GLOBALS['TL_LANG']['tl_page']['pasteinto']['1'] = 'Klistra in i sidan med ID %s';
$GLOBALS['TL_LANG']['tl_page']['pasteafter']['1'] = 'Klistra in efter sidan med ID %s';
$GLOBALS['TL_LANG']['tl_page']['articles'] = 'Redigera artiklarna på sidan med ID %s';
$GLOBALS['TL_LANG']['tl_page']['routeConflicts']['0'] = 'Ruttkonflikter';
$GLOBALS['TL_LANG']['tl_page']['routeConflicts']['1'] = 'Följande sidor har ett liknande alias som kan komma i konflikt med den här sidan. Om webbadressen inte löses korrekt, försök att ändra prioritet för rutterna.';
$GLOBALS['TL_LANG']['tl_page']['relCanonical'] = 'Aktivera kanoniska webbadresser på webbplatsens rotsida för att aktivera denna konfiguration.';
$GLOBALS['TL_LANG']['CACHE']['0'] = '0 (Ingen cachning)';
$GLOBALS['TL_LANG']['CACHE']['5'] = '5 sekunder';
$GLOBALS['TL_LANG']['CACHE']['15'] = '15 sekunder';
$GLOBALS['TL_LANG']['CACHE']['30'] = '30 sekunder';
$GLOBALS['TL_LANG']['CACHE']['60'] = '60 sekunder';
$GLOBALS['TL_LANG']['CACHE']['300'] = '5 minuter';
$GLOBALS['TL_LANG']['CACHE']['900'] = '15 minuter';
$GLOBALS['TL_LANG']['CACHE']['1800'] = '30 minuter';
$GLOBALS['TL_LANG']['CACHE']['3600'] = '60 minuter';
$GLOBALS['TL_LANG']['CACHE']['10800'] = '3 timmar';
$GLOBALS['TL_LANG']['CACHE']['21600'] = '6 timmar';
$GLOBALS['TL_LANG']['CACHE']['43200'] = '12 timmar';
$GLOBALS['TL_LANG']['CACHE']['86400'] = '24 timmar';
$GLOBALS['TL_LANG']['CACHE']['259200'] = '3 dagar';
$GLOBALS['TL_LANG']['CACHE']['604800'] = '7 dagar';
$GLOBALS['TL_LANG']['CACHE']['2592000'] = '30 dagar';
$GLOBALS['TL_LANG']['CACHE']['7776000'] = '3 månader';
$GLOBALS['TL_LANG']['CACHE']['15552000'] = '6 månader';
$GLOBALS['TL_LANG']['CACHE']['31536000'] = '1 år';

// vendor/contao/news-bundle/contao/languages/sv/tl_page.xlf
$GLOBALS['TL_LANG']['tl_page']['newsArchives']['0'] = 'Nyhetsarkiv';
$GLOBALS['TL_LANG']['tl_page']['newsArchives']['1'] = 'Här kan du välja vilka nyhetsarkiv som ska inkluderas i flödet.';
$GLOBALS['TL_LANG']['tl_page']['feedFormat']['0'] = 'Flödesformat';
$GLOBALS['TL_LANG']['tl_page']['feedFormat']['1'] = 'Välj flödesformat.';
$GLOBALS['TL_LANG']['tl_page']['feedSource']['0'] = 'Exportinställningar';
$GLOBALS['TL_LANG']['tl_page']['feedSource']['1'] = 'Här kan du välja vad som ska exporteras.';
$GLOBALS['TL_LANG']['tl_page']['maxFeedItems']['0'] = 'Max antal poster';
$GLOBALS['TL_LANG']['tl_page']['maxFeedItems']['1'] = 'Här kan du begränsa antalet poster i flödet. Sätt till 0 för samtliga.';
$GLOBALS['TL_LANG']['tl_page']['feedFeatured']['0'] = 'Viktiga nyheter';
$GLOBALS['TL_LANG']['tl_page']['feedFeatured']['1'] = 'Här kan du välja hur viktiga nyheter ska hanteras.';
$GLOBALS['TL_LANG']['tl_page']['feedDescription']['0'] = 'Flödesbeskrivning';
$GLOBALS['TL_LANG']['tl_page']['feedDescription']['1'] = 'Här kan du ange en kort beskrivning av kalenderflödet.';
$GLOBALS['TL_LANG']['tl_page']['archives_legend'] = 'Nyhetsarkiv';
$GLOBALS['TL_LANG']['tl_page']['feed_legend'] = 'Flödesinställningar';
$GLOBALS['TL_LANG']['tl_page']['image_legend'] = 'Bildinställningar';
$GLOBALS['TL_LANG']['tl_page']['source_teaser'] = 'Nyhetsartiklarnas ingresser';
$GLOBALS['TL_LANG']['tl_page']['source_text'] = 'Fullständiga berättelser';
$GLOBALS['TL_LANG']['tl_page']['all_items'] = 'Visa alla objekt';
$GLOBALS['TL_LANG']['tl_page']['featured'] = 'Visa endast utvalda objekt';
$GLOBALS['TL_LANG']['tl_page']['unfeatured'] = 'Hoppa över utvalda objekt';
