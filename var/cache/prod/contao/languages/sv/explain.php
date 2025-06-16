<?php

// vendor/contao/core-bundle/contao/languages/sv/explain.xlf
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['0'] = 'Rich text editor';
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['1'] = 'För mer information om TinyMCE, se <a href="https://www.tiny.cloud/tinymce/" target="_blank" rel="noreferrer noopener">https://www.tiny.cloud/tinymce/</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['0'] = 'Insert taggar';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['1'] = 'Mer information om insert tags finns i <a href="https://to.contao.org/docs/insert-tags?lang=en" target="_blank" rel="noreferrer noopener">Contao-handboken</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['0'] = 'Kodredigerare';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['1'] = 'För mer information om Ace, se <a href="https://ace.c9.io" target="_blank" rel="noreferrer noopener">https://ace.c9.io</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['0'] = 'Markdown';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['1'] = 'För att lära dig mer om markdown, se <a href="https://to.contao.org/docs/markdown?lang=en" target="_blank" rel="noreferrer noopener">Contaos manual</a>.';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['0'] = 'colspan';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['1'] = 'Contao stöder alla datum- och tidsformat som kan tolkas med PHP-funktionen date(). Men för att säkerställa att alla indata kan omvandlas till en UNIX-tidsstämpel kan du bara använda numeriska datum- och tidsformat (j, d, m, n, y, Y, g, G, h, H, i, s) i back-end-sidan. <br><br><strong>Du kan ange olika front-end-format på webbplatsens rotsidor.</strong><br><br><em> Här är några exempel på giltiga datum- och tidsformat</em>:';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['0'] = 'Y-m-d';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['1'] = 'YYYY-MM-DD, internationell ISO 8601, t.ex. 2005-01-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['0'] = 'm/d/Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['1'] = 'MM/DD/YYYY, Engelskt format, t.ex. 01/28/2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['0'] = 'd.m.Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['1'] = 'DD.MM.YYYY, Tyskt format, t.ex. 28.01.2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['0'] = 'y-n-j';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['1'] = 'YY-M-D, utan inledande nollor, t.ex. 05-1-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['0'] = 'Ymd';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['1'] = 'YYYYMMDD, tidsstämpel, t.ex. 20050128';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['0'] = 'H:i:s';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['1'] = '24 timmar, minuter och sekunder, t.ex. 20:36:59';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['0'] = 'g:i';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['1'] = '12 timmar utan inledande nollor och med minuter, t.ex. 8:36';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['0'] = 'Storleksattribut';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['1'] = 'HTML-attribut <code>storlekarna</code> definierar bildens avsedda layoutbredd, eventuellt i kombination med en mediefråga. Du kan använda vilket CSS-längdvärde som helst i det här attributet,<br><br> t.ex. <code>(max-width: 600px) 100vw, 50vw</code> betyder att bildens bredd är 100% av visningsporten för små skärmar och 50% av visningsporten för större skärmar. <br><br>Och <code>(max-width: 600px) calc(100vw - 20px), 500px</code> betyder att bildens bredd är 20px mindre än viewporten för små skärmar och 500px för större skärmar.<br><br>Storleksattributet ska inte användas för styling, använd CSS istället. Storleksattributet behöver inte nödvändigtvis matcha den faktiska bildbredden som anges i CSS.<br><br> För mer information om storleksattributet besök <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-sizes" target="_blank" rel="noreferrer noopener">w3.org</a>.';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['0'] = 'Pixel-täthet/<br>skalningsfaktorer';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['1'] = 'Om storleksattributet inte är definierat, definierar den här inställningen helt enkelt de pixeltätheter som du vill stödja. Måtten på bilderna justeras automatiskt. T.ex. <code>1x, 1,5x, 2x</code> skapar följande HTML-kod: <code>&lt;img srcset="img-a.jpg 1x, img-b.jpg 1,5x, img-c.jpg 2x"&gt;</code><br><br>Om storleksattributet är definierat, samma bildstorlekar genereras men width ddeskriptorer används för srcset-attributet. T.ex. en 200 pixel bred bild med tätheterna <code>1x, 1,5x, 2x</code> skapar följande HTML-kod: <code>&lt;img srcset="img-a.jpg 200w, img-b.jpg 300w, img-c.jpg 400w"&gt;</code><br><br>För mer information om srcset-attributet besök <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-srcset" target="_blank" rel="noreferrer noopener">w3.org</a>.';
