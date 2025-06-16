<?php

// vendor/contao/core-bundle/contao/languages/de/explain.xlf
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['0'] = 'Rich-Text-Editor';
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['1'] = 'Weitere Informationen zu TinyMCE finden Sie unter <a href="https://www.tiny.cloud/tinymce/" target="_blank" rel="noreferrer noopener">https://www.tiny.cloud/tinymce/</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['0'] = 'Insert-Tags';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['1'] = 'Weitere Informationen zu Insert-Tags finden Sie im <a href="https://to.contao.org/docs/insert-tags?lang=de" target="_blank" rel="noreferrer noopener">Contao-Handbuch</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['0'] = 'Code-Editor';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['1'] = 'Weitere Informationen zu Ace finden Sie unter <a href="https://ace.c9.io" target="_blank" rel="noreferrer noopener">https://ace.c9.io</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['0'] = 'Markdown';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['1'] = 'Weitere Informationen zu Markdown finden Sie im <a href="https://to.contao.org/docs/markdown?lang=de" target="_blank" rel="noreferrer noopener">Contao-Handbuch</a>. ';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['0'] = 'colspan';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['1'] = 'Contao unterstützt alle Datums- und Zeitformate, die mit der PHP-Funktion date() geparst werden können. Um alle Eingaben in einen UNIX-Zeitstempel umwandeln zu können, sind im Backend jedoch ausschließlich numerische Formate (j, d, m, n, y, Y, g, G, h, H, i, s) erlaubt.<br><br><strong>Abweichende Frontend-Formate können in den Website-Startpunkten erfasst werden.</strong><br><br><em>Hier sind einige Beispiele gültiger Datums- und Zeitangaben</em>:';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['0'] = 'Y-m-d';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['1'] = 'JJJJ-MM-TT, international ISO-8601, z. B. 2005-01-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['0'] = 'm/d/Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['1'] = 'MM/TT/JJJJ, Englisches Format, z. B. 01/28/2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['0'] = 'd.m.Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['1'] = 'TT.MM.JJJJ, Deutsches Format, z. B. 28.01.2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['0'] = 'y-n-j';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['1'] = 'JJ-M-T, ohne führende Nullen, z. B. 05-1-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['0'] = 'Ymd';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['1'] = 'JJJJMMTT, Zeitstempel, z. B. 20050128';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['0'] = 'H:i:s';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['1'] = '24 Stunden, Minuten und Sekunden, z. B. 20:36:59';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['0'] = 'g:i';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['1'] = '12 Stunden ohne führende Nullen sowie Minuten, z. B. 8:36';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['0'] = 'Sizes-Attribut';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['1'] = 'Das HTML-Attribut <code>sizes</code> definiert die gewünschte Layout-Breite des Bildes, optional in Kombination mit einem Media-Query. Sie können einen beliebigen CSS-Wert für die Breite verwenden.<br><br>Z. B. bedeutet <code>(max-width: 600px) 100vw, 50vw</code>, dass das Bild auf kleinen Bildschirmen 100% der Breite des Viewports einnimmt und auf großen Bildschirmen 50% der Breite des Viewports.<br><br>Und <code>(max-width: 600px) calc(100vw - 20px), 500px</code> bedeutet, dass das Bild auf kleinen Bildschirmen 20px schmaler ist als der Viewport und auf großen Bildschirmen 500px breit.<br><br>Das sizes-Attribut sollte nicht für das Styling verwendet werden; verwenden Sie dafür CSS. Das sizes-Attribut muss nicht unbedingt mit der per CSS definierten Bildbreite übereinstimmen.<br><br>Weitere Informationen zum sizes-Attribut finden Sie auf <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-sizes" target="_blank" rel="noreferrer noopener">w3.org</a>.';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['0'] = 'Pixeldichte/<br>Skalierungsfaktor';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['1'] = 'Ist das sizes-Attribut nicht definiert, legt diese Einstellung einfach die Pixeldichten fest, die unterstützt werden sollen. Die Bildgrößen werden automatisch angepasst. Z. B. generiert <code>1x, 1.5x, 2x</code> folgenden HTML-Code: <code>&lt;img srcset="img-a.jpg 1x, img-b.jpg 1.5x, img-c.jpg 2x"&gt;</code><br><br>Ist das sizes-Attribut definiert, werden dieselben Bildgrößen erstellt, jedoch werden für das srcset-Attribut Breitenbeschreibungen verwendet. Z. B. generiert ein 200 Pixel breites Bild mit den Pixeldichten <code>1x, 1.5x, 2x</code> folgenden HTML-Code: <code>&lt;img srcset="img-a.jpg 200w, img-b.jpg 300w, img-c.jpg 400w"&gt;</code><br><br>Weitere Informationen zum srcset-Attribut finden Sie auf <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-srcset" target="_blank" rel="noreferrer noopener">w3.org</a>.';
