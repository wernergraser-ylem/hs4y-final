<?php

// vendor/contao/core-bundle/contao/languages/it/explain.xlf
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['0'] = 'Rich Text Editor';
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['1'] = 'Per ulteriori informazioni su TinyMCE, visita<a href="https://www.tiny.cloud/tinymce/" target="_blank" rel="noreferrer noopener">https://www.tiny.cloud/tinymce/</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['0'] = 'Inserisci tag';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['1'] = 'Per ulteriori informazioni sugli insert tag, guarda <a href="https://to.contao.org/docs/insert-tags?lang=en" target="_blank" rel="noreferrer noopener">il manuale Contao</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['0'] = 'Editor Codice';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['1'] = 'Per ulteriori informazioni su Ace, visitata <a href="https://ace.c9.io" target="_blank" rel="noreferrer noopener">https://ace.c9.io</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['0'] = 'Markdown';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['1'] = 'Per ulteriori informazioni sul markdown, consulta <a href="https://to.contao.org/docs/markdown?lang=en" target="_blank" rel="noreferrer noopener">il manuale Contao</a>.';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['0'] = 'colspan';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['1'] = 'Contao supporta tutti i formati per data e ora, basati sulla funzione PHP date(). Ad ogni modo, per assicurare che ogni input dell\'utente possa essere trasformato in un UNIX timestamp, è possibile usare solo formati numerici (j, d, m, n, y, Y, g, G, h, H, i, s) nel backend <br><br><strong>E\' possibile utilizzare formati diversi indicandoli nella struttura di una pagina root</strong><br><br><em>Ecco alcuni esempi di formati validi</em>:';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['0'] = 'd-m-Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['1'] = 'YYYY-MM-DD, ISO 8601 internazionale. Es: 2005-01-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['0'] = 'd/m/Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['1'] = 'MM/DD/YYYY, Formato inglese, es. 01/28/2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['0'] = 'd.m.Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['1'] = 'DD.MM.YYYY, formato tedesco, es. 28.01.2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['0'] = 'y-n-j';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['1'] = 'YY-M-D, senza zeri. Es: 05-1-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['0'] = 'Ymd';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['1'] = 'YYYYMMDD, timestamp. Es: 20050128';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['0'] = 'H:i:s';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['1'] = '24 ore, minuti e secondi. Es: 20:36:59';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['0'] = 'g:i';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['1'] = '12 ore senza zeri e minuti. Es: 8:36';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['0'] = 'Dimensioni attributi';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['1'] = 'L\'attributo HTML <code>sizes</code> definisce la larghezza del layout dell\'immagine, opzionalmente combinato con una media query. Puoi usare qualsiasi valore di lunghezza CSS in questo attributo,<br><br> Per esempio <code>(max-width: 600px) 100vw, 50vw</code> significa che la larghezza dell\'immagine è il 100% del viewport per schermi piccoli e il 50% del viewport per schermi più grandi. <br><br>E <code>(max-width: 600px) calc(100vw - 20px), 500px</code> significa che la larghezza dell\'immagine è 20px più piccola del viewport per schermi piccoli e 500px per schermi più grandi. <br><br>L\'attributo sizes non dovrebbe essere usato per lo stile, usa invece i CSS. L\'attributo sizes non deve necessariamente corrispondere esattamente alla larghezza effettiva dell\'immagine come specificato nel CSS. <br><br>Per maggiori informazioni sull\'attributo sizes visita <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-sizes" target="_blank" rel="noreferrer noopener">w3.org</a>.';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['0'] = 'Densità pixel/<br>fattore di scala';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['1'] = 'Se l\'attributo sizes non è definito, questa impostazione definisce semplicemente le densità di pixel che volete supportare. Le dimensioni delle immagini sono regolate automaticamente. Ad es. <code>1x, 1.5x, 2x</code> crea il seguente codice HTML: <code>&lt;img srcset="img-a.jpg 1x, img-b.jpg 1.5x, img-c.jpg 2x"&gt;</code><br><br>Se l\'attributo sizes è definito, vengono generate le stesse dimensioni delle immagini ma vengono utilizzati descrittori di larghezza per l\'attributo srcset. Per esempio, un\'immagine larga 200 pixel con le densità <code>1x, 1.5x, 2x</code> crea il seguente codice HTML: <code>&lt;img srcset="img-a.jpg 200w, img-b.jpg 300w, img-c.jpg 400w"&gt;</code><br><br>Per maggiori informazioni sull\'attributo srcset visitate <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-srcset" target="_blank" rel="noreferrer noopener">w3.org</a>.';
