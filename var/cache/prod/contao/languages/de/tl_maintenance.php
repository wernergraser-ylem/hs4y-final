<?php

// vendor/contao/core-bundle/contao/languages/de/tl_maintenance.xlf
$GLOBALS['TL_LANG']['tl_maintenance']['cacheTables']['0'] = 'Daten bereinigen';
$GLOBALS['TL_LANG']['tl_maintenance']['cacheTables']['1'] = 'Bitte wählen Sie die zu bereinigenden bzw. neu zu erstellenden Daten aus.';
$GLOBALS['TL_LANG']['tl_maintenance']['job'] = 'Job';
$GLOBALS['TL_LANG']['tl_maintenance']['description'] = 'Beschreibung';
$GLOBALS['TL_LANG']['tl_maintenance']['clearCache'] = 'Daten bereinigen';
$GLOBALS['TL_LANG']['tl_maintenance']['cacheCleared'] = 'Die Daten wurden bereinigt';
$GLOBALS['TL_LANG']['tl_maintenance']['updateHelp'] = 'Bitte geben Sie Ihre %s ein.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['index']['0'] = 'Suchindex löschen';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['index']['1'] = 'Leert die Tabellen <code>tl_search</code>, <code>tl_search_index</code> und <code>tl_search_term</code>. Anschließend muss der Suchindex neu aufgebaut werden (siehe oben).';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['undo']['0'] = 'Papierkorb leeren';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['undo']['1'] = 'Leert die Tabelle <code>tl_undo</code>, in der die gelöschten Datensätze gespeichert werden. Die Daten werden hierdurch endgültig gelöscht.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['versions']['0'] = 'Versionen löschen';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['versions']['1'] = 'Leert die Tabelle <code>tl_version</code>, in der die Versionen eines Datensatzes gespeichert werden. Die Daten werden hierdurch endgültig gelöscht.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['log']['0'] = 'System-Log löschen';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['log']['1'] = 'Leert die Tabelle <code>tl_log</code>, in der die System-Log-Einträge gespeichert werden. Die Daten werden hierdurch endgültig gelöscht.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['crawl_queue']['0'] = 'Die Crawl-Queue leeren';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['crawl_queue']['1'] = 'Leert die Tabelle <code>tl_crawl_queue</code>, in der die Queue-Informationen des Crawl-Prozesses gespeichert werden.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['images']['0'] = 'Bildercache leeren';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['images']['1'] = 'Löscht die automatisch erstellten Bilder und leert anschließend den Shared-Cache, damit keine ungültigen Links zurückbleiben.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['previews']['0'] = 'Vorschau-Cache leeren';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['previews']['1'] = 'Löscht die automatisch erstellen Vorschaubilder und leert anschließend den Shared-Cache, damit keine ungültigen Links zurückbleiben.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['scripts']['0'] = 'Skriptcache leeren';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['scripts']['1'] = 'Löscht die automatisch erstellten <code>.css</code>- und <code>.js</code>-Dateien und leert anschließend den Shared-Cache, damit keine ungültigen Links zurückbleiben.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['pages']['0'] = 'Shared-Cache leeren';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['pages']['1'] = 'Löscht die gespeicherten Versionen der Frontend-Seiten.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['temp']['0'] = 'Temp-Ordner leeren';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['temp']['1'] = 'Löscht die temporären Dateien.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['xml']['0'] = 'XML-Dateien neu schreiben';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['xml']['1'] = 'Schreibt die XML-Dateien im Ordner <code>share</code> neu und leert anschließend den Shared-Cache, damit keine ungültigen Links zurückbleiben.';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['symlinks']['0'] = 'Symlinks neu erstellen';
$GLOBALS['TL_LANG']['tl_maintenance_jobs']['symlinks']['1'] = 'Legt die Symlinks im öffentlichen Ordner (Document-Root) neu an.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawler'] = 'Crawler';
$GLOBALS['TL_LANG']['tl_maintenance']['startCrawling'] = 'Crawler starten';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscribers']['0'] = 'Aktivierte Funktionen';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscribers']['1'] = 'Der Crawler analysiert alle URLs, die er findet. Hier können Sie festlegen, was mit den Ergebnissen geschehen soll.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDepth']['0'] = 'Maximale Tiefe';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDepth']['1'] = 'Die maximale Crawl-Tiefe.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlMember']['0'] = 'Frontend-Mitglied';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlMember']['1'] = 'Um geschützte Seiten zu indizieren, muss ein Frontend-Mitglied angemeldet werden.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlHint'] = 'Die Webseite wird momentan mit %d gleichzeitigen Requests gecrawlt. Wenn ihr Server mehr als %1$d gleichzeitige Requests verarbeiten kann, bitten Sie den Systemadministrator, die Einstellung <code>%s</code> in der Systemkonfiguration zu erhöhen, um den Crawling-Prozess zu beschleunigen. Weitere Informationen dazu finden Sie im <a href="%s" target="_blank" rel="noreferrer noopener">Contao-Handbuch</a>.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlWaitToBeFinished'] = 'Der Crawler arbeitet gerade. Bitte warten Sie bis er fertig ist, um die Ergebnisse zu sehen.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDebugLog'] = 'Debug-Log';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDebugLogExplain'] = 'Wenn Fehler aufgetreten sind oder Seiten übersprungen wurden, überprüfen Sie das Debug-Log.';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlDownloadLog'] = 'Log herunterladen';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscriberNames']['search-index'] = 'Den Suchindex aktualisieren';
$GLOBALS['TL_LANG']['tl_maintenance']['crawlSubscriberNames']['broken-link-checker'] = 'Nach defekten Links suchen';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2024
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['jobs'] = 'Theme-Updater Aufgaben';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['run_job'] = 'Starten';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['jobs_done'] = 'Aufgabe(n) [%s] ausgeführt';
/**
 * Jobs
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['news_order'][0] = 'Nachrichtenlisten Sortierung';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['news_order'][1] = 'Nachrichtenlisten Sortierung "date DESC" (Unbekannte Option) ändern in "order_date_desc"';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['center_center_to_crop'][0] = 'Bildgrößen-Auswahlen updaten';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['center_center_to_crop'][1] = 'Bildgrößen Einstellung "CENTER_CENTER" (Unbekannte Option) ändern in "CROP"';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['form_textfield_form_text'][0] = 'Formularfeld Templates-Auswahlen';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_themeupdater']['form_textfield_form_text'][1] = 'Text-Formularfeld Templates-Auswahlen updaten von form_textfield nach form_text';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2014
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['jobs'] = 'CustomElements Aufgaben';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['run_job'] = 'Starten';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['job_done'] = 'Aufgabe [%s] ausgeführt';
/**
 * Jobs
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardupdater'][0] = 'Wizard Updaten';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardupdater'][1] = 'Aktualisiert den Aufbau aller CustomElements Widget/Wizard-Daten und speichert diese nach dem aktuellen Version-Muster. (Ab Version 1.1.8 speichert jedes Widget in der aktuellen Struktur. Diese Funktion dient besonders dem Updaten älterer CustomElements Daten)';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardUpdateComplete'] = 'Alle CustomElement Widgets/Wizards aktualisiert.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardUpdateLoading'] = 'CustomElement Widgets werden aktualisiert...';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['wizardupdater']['empty'] = 'Keine Widgets gefunden.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeupdater'][0] = 'Attribute konvertieren';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeupdater'][1] = 'Aktualisiert die Datenspalten ausgewählter oder aller Attribute im Vault und schreibt diese entsprechend der Vorgabe um. Die Variable "saveDataAs" jedes Attributes steuert die Zielspalte im Vault. Standard ist [data] (varchar(255)). Sicherheitshinweis: Beim Umziehen von einer Datenquelle zu einer anderen können Datenverloren gehen z.b. von data_text zu data. Siehe MySQL Datenspalten und ihre Wertebereiche.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeUpdateComplete'] = 'Alle Attributes-Daten aktualisiert';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeUpdateLoading'] = 'Attribut-Daten werden aktualisiert...';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeupdater']['empty'] = 'Keine Attribut-Daten gefunden.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault'][0] = 'Attribute-Daten aus Vault löschen';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault'][1] = 'Löscht alle Attribute-bezogenen Einträge aus tl_pct_customelement_vault, ausser die CE-Widget Datensätze. Dieser Vorgang ist nicht umkehrbar und dient dem Beräumen der Datenbank.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault_effected'] = 'Datensätze gefunden: %s';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['removeAttributeDataFromVault_runLabel'] = 'Ausführen';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['resolveVault'][0] = 'Vault-Datenübertragung';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['resolveVault'][1] = 'Überträgt alle CustomElement-Daten aus dem Vault (tl_pct_customelement_vault) in die referenzierten Datensätze und löscht nach erfolgreicher Übertragung den Datensatz aus dem Vault. Datensätze deren Ziel-Datensätze nicht existieren (verwaiste Daten), werden aus dem Vault entfernt.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['vaultUpdateLoading'] = 'Daten werden aktualisiert...';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['resolveVault']['empty'] = 'Keine Daten gefunden.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['attributeUpdateComplete'] = 'Alle Daten aktualisiert';

/**
 * Contao 
 * German translation file 
 * 
 * copyright  Tim Gatzky 2015
 * author     Tim Gatzky <info@tim-gatzky.de>
 * Translator:  
 * 
 * This file was created automatically be the Contao extension repository translation module.
 * Do not edit this file manually. Contact the author or translator for this module to establish 
 * permanent text corrections which are update-safe. 
 */
/**
 * Jobs
 */
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['updateBaseEntries'][0] = 'Basis-Spracheinträge erstellen';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['updateBaseEntries'][1] = 'Legt neue Basis-Spracheinträge-Referenzen an für bestehende Einträge.';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['purgeFileCache'][0] = 'DCA-Cache leeren';
$GLOBALS['TL_LANG']['tl_maintenance']['pct_customelements']['purgeFileCache'][1] = 'Leert den DCA-Cache in var/cache/.../cc_dca';
