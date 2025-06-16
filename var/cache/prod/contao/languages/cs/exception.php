<?php

// vendor/contao/core-bundle/contao/languages/cs/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Došlo k chybě';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'Co se stalo?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Jak můžu odstranit danou chybu?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Dozvědět se více';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Pro přizpůsobení této poznámky vytvořte vlastní předlohu Twig, ta přepíše <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Došlo k chybě během spouštění tohoto skriptu. Něco nepracuje správným způsobem.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Otevřete současný soubor log ve složce <code>var/logs</code> a najděte dané chybové hlášení (pravděpodobně jedno z posledních)';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'Spouštění skriptu bylo pozastaveno, protože něco nefunguje správně. Daná chybová zpráva je z bezpečnostních důvodů skrytá u této poznámky a lze ji najít v souboru (viz výše). Pokud nerozumíte chybové zprávě nebo nevíte, jak lze daný problém opravit, navštivte <a href="%s" target="_blank" rel="noreferrer noopener">stránku podpory Contaa</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Neplatný požadavek tokenu';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'Požadovaný token nemohl být ověřený.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = 'Prosím klikněte znovu na <a href="javascript:window.location.href=window.location.href">tento odkaz</a>. Nepoužívejte prosím tlačítko pro krok zpět Vašeho prohlížeče. ';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Chyba nastane, pokud je nastavený přenos POST bez platného potvrzovacího tokenu. V Contau 2.10 byla tato kontrola nahrazená tokenovým systémem. Přetrvává-li daný problém, nejspíš používáte nekompatibilní rozšíření třetích stran nebo není dobré zaktualizována instalace Vašeho Contaa.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Více informací najdete na <a href="%s" target="_blank" rel="noreferrer noopener"> stránce podpory Contaa</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Servis je nedostupný';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'Webová stránka je momentálně nedostupná. Vraťte se sem později. ';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Nešlo vytvořit frontendovou URL';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'Nešlo vytvořit URL, protože má cesta povinné parametry, které nejsou zadány. Další informace (např. aliase novinky) se musí poskytnout.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Cesty Symfony mohou mít rozličné parametry, které jsou platné použitím regulérních výrazů. Následující nastavení nešlo vyřešit:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Cesta';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Jméno';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Požadavek (Regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Výchozí hodnota';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'prázdný';
