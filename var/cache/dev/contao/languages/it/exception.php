<?php

// vendor/contao/core-bundle/contao/languages/it/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Si è verificato un errore';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'Qual\'è il problema?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Come posso risolvere il problema?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Fornisci maggiori informazioni';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Per personalizzare questo avviso, occorre creare un file template personalizzato denominato <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Si è verificato un errore durante l\'esecuzione di questo script. Qualcosa non funziona correttamente.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Apri il file di log nel percorso <code>var/logs</code> e cerca il messaggio di errore (solitamente in fondo al file).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = '\'esecuzione dello script si è arrestato, perché qualcosa non funziona correttamente. Il messaggio di errore effettivo è nascosto da questo avviso per motivi di sicurezza e può essere trovato nel file di log corrente (vedi sopra). Se non capisci il messaggio di errore o non sai come risolvere il problema, visita la pagina di  <a href="%s" target="_blank" rel="noreferrer noopener">supporto di Contao </a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Token non valido';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'Il token non poteva essere verificato.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = 'Per favore, <a href="javascript:window.location.href=window.location.href">clicca qui</a> e riprova. Non usare il pulsante indietro del tuo browser.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Questo errore si verifica se c\'è una richiesta POST senza un token di autenticazione valido. In Contao 2.10, il referer check è stato sostituito con un sistema di richiesta token. Se il problema persiste, è possibile che si stia utilizzando un\'estensione di terzi non compatibile o non si abbia aggiornato correttamente l\'installazione di Contao.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Per maggiori informazioni, visita la <a href="%s" target="_blank" rel="noreferrer noopener">pagina di supporto di Contao</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Servizio non disponibile';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'Il sito web non è al momento disponibile. ';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Impossibile generare l\'URL del front end';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'Non è stato possibile generare l\'URL, perché la rotta ha dei parametri obbligatori che non sono indicati. Devono essere fornite informazioni aggiuntive (ad esempio un alias di notizie).';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Le rotte di Symfony possono avere parametri variabili, che vengono validati usando espressioni regolari. La seguente configurazione non ha potuto essere risolta:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Percorso';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Nome';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Requisito (Regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Valore';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'vuoto';
