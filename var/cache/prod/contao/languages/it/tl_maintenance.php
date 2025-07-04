<?php

// vendor/contao/core-bundle/contao/languages/it/tl_maintenance.xlf
$GLOBALS['TL_LANG']['tl_maintenance']['cacheTables']['0'] = 'Elimina dati sessione';
$GLOBALS['TL_LANG']['tl_maintenance']['cacheTables']['1'] = 'Seleziona la tipologia di dati temporanei da eliminare';
$GLOBALS['TL_LANG']['tl_maintenance']['job'] = 'Attività';
$GLOBALS['TL_LANG']['tl_maintenance']['description'] = 'Descrizione';
$GLOBALS['TL_LANG']['tl_maintenance']['clearCache'] = 'Elimina dati sessione';
$GLOBALS['TL_LANG']['tl_maintenance']['cacheCleared'] = 'I file temporanei sono stati eliminati';
$GLOBALS['TL_LANG']['tl_maintenance']['updateHelp'] = 'Inserire il %s qui.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['index']['0'] = 'Ripulisci gli indici del motore di ricerca interno';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['index']['1'] = 'Ripulisci le tabelle  <code>tl_search</code>, <code>tl_search_index</code> e <code>tl_search_term</code>. Successivamente, sarà necessario ricostruire l\'indice di ricerca (vedere sopra).';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['undo']['0'] = 'Ripulisci la tabella degli elementi eliminati';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['undo']['1'] = 'Tronca la tabella <code>tl_undo</code> che memorizza i record eliminati. Questa operazione elimina definitivamente questi elementi.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['versions']['0'] = 'Ripulisci la tabella delle versioni';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['versions']['1'] = 'Tronca la tabella <code>tl_version</code> che memorizza le versioni precedenti di un record. Questo lavoro elimina definitivamente questi record.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['log']['0'] = 'Ripulisci il registro eventi';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['log']['1'] = 'Tronca la tabella <code>tl_log</code>  che memorizza tutte le voci del registro di sistema. Questo lavoro elimina definitivamente questi record.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['crawl_queue']['0'] = 'Elimina la coda di scansione';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['crawl_queue']['1'] = 'Tronca il <code>tl_crawl_queue</code> tabella che memorizza tutte le informazioni sulla coda dai processi di ricerca per indicizzazione.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['images']['0'] = 'Ripulisci la cache delle immagini';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['images']['1'] = 'Rimuove le immagini generate automaticamente ed elimina la cache condivisa, in questo modo si eliminano anche riferimenti a risorse eliminate.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['previews']['0'] = 'Svuota la cache di anteprima';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['previews']['1'] = 'Rimuove le immagini generate automaticamente ed elimina la cache condivisa, in questo modo si eliminano anche riferimenti a risorse eliminate.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['scripts']['0'] = 'Ripulisci la cache degli script';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['scripts']['1'] = 'Rimuove i file<code>.css</code> e <code>.js</code> generati automaticamente ed elimina elimina la cache condivisa, per cui non ci sono collegamenti alle risorse eliminate.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['pages']['0'] = 'Ripulisci la cache del condivisa';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['pages']['1'] = 'Rimuove la cache delle pagine di front end';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['temp']['0'] = 'Ripulisci la cartella temporanea';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['temp']['1'] = 'Rimuovi i file temporanei';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['xml']['0'] = 'Ricrea i file XML';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['symlinks']['0'] = 'Ricrea i link simbolici';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['symlinks']['1'] = 'Ricrea i symlinks nella cartella pubblica (root del documento).';
$GLOBALS['TL_LANG']['tl_maintenance']['crawler'] = 'Spider ';
$GLOBALS['TL_LANG']['tl_maintenance']['startCrawling'] = 'Avvia spieder';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscribers']['0'] = 'Funzionalità abilitate';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscribers']['1'] = 'Il crawler esegue la scansione di tutti gli URL che trova. Qui puoi decidere cosa fare con questi risultati.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDepth']['0'] = 'Profondità massima';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDepth']['1'] = 'La profondità massima da scansionare.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlMember']['0'] = 'Front end membro';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlMember']['1'] = 'Accedi automaticamente come un membro front-end per indicizzare le pagine protette.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlHint'] = 'Il sito web è attualmente sottoposto a crawling con %d richieste contemporanee. Se il server è in grado di gestire più di %1$drichieste contemporanee, chiedere all\'amministratore di sistema di aumentare l\'impostazione <code>%s</code> nella configurazione del sistema per accelerare il processo di crawling. Per ulteriori informazioni, consultare il manuale <a href="%s" target="_blank" rel="noreferrer noopener">Contao</a> .';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlWaitToBeFinished'] = 'Il crawler sta attualmente funzionando. Attendi il termine per vedere i risultati.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDebugLog'] = 'Log di debug';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDebugLogExplain'] = 'Se si sono verificati errori o sono state saltate delle pagine, controllare il log di debug per ulteriori informazioni.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDownloadLog'] = 'Scarica il log';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscriberNames']['search-index'] = 'Aggiorna l\'indice di ricerca';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscriberNames']['broken-link-checker'] = 'Controlla collegamenti interrotti';
