<?php

// vendor/contao/core-bundle/contao/languages/cs/explain.xlf
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['0'] = 'Textový editor';
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['1'] = 'Více informací o TinyMCE najdete na <a href="https://www.tiny.cloud/tinymce/" target="_blank" rel="noreferrer noopener">http://www.tiny.cloud/tinymce/</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['0'] = 'Vložit tagy';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['1'] = 'Více informací o insert tag najdete v <a href="https://to.contao.org/docs/insert-tags?lang=en" target="_blank" rel="noreferrer noopener">návodu Contaa</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['0'] = 'Editor kódu';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['1'] = 'Pro více informací o ACE navštivte prosím <a href="https://ace.c9.io" target="_blank" rel="noreferrer noopener">http://ace.c9.io</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['0'] = 'Markdown';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['1'] = 'Dozvědět se víc o markdownu můžete v <a href="https://to.contao.org/docs/markdown?lang=en" target="_blank" rel="noreferrer noopener">Dokumentaci Contaa</a>';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['0'] = 'colspan';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['1'] = 'Contao podporuje všechny formáty data a času, které lze analyzovat pomocí funkce PHP date(). Chcete-li však zajistit, že jakýkoli vstup lze převést na časové razítko UNIX, můžete použít pouze číselné formáty data a času (j, d, m, n, y, Y, g, G, h, H, i, s) v backendu.<br><br><strong>Na kořenových stránkách webu můžete zadat různé formáty frontendu.</strong><br><br><em>Zde je několik příkladů platných formátů data a času</em>:';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['0'] = 'Y-m-d';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['1'] = 'RRRR-MM-DD, mezinárodní ISO 8601 př.: 2005-01-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['0'] = 'm/d/Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['1'] = 'MM/DD/YYYY, anglický formát, např. 01/28/2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['0'] = 'd.m.Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['1'] = 'DD.MM.YYYY, český formát, např. 28.01.2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['0'] = 'y-n-j';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['1'] = 'RR-M-D, bez prvních nul př.: 05-1-25';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['0'] = 'Ymd';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['1'] = 'YYYYMMDD, časová značka př.: 20050128';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['0'] = 'H:i:s';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['1'] = '24 hodin, minut a sekund, např. 20:36:59';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['0'] = 'g:i';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['1'] = '12 hodin bez nul a minut na začátku, např. 8:36';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['0'] = 'Vlastnosti rozměrů';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['1'] = 'Atribut HTML <code>rozměry</code> určuje zobrazovanou šířku obrázku, kterou lze také kombinovat s media query. Můžete použít jakoukoli hodnotu CSS, abyste určili šířku. <br><br>Např. definice <code> (max-width: 600px) 100vw, 50vw</code> znamená, že je šířka obrázku 100% na malých displayích a 500% na velkých displayích. <br><br>A definice <code>(max-width: 600px) calc(100vw - 20px), 500px</code> znamená, že je šířka obrázku menší o 20px než rozměr malých displayů a 500px pro větší displaye. <br><br>Rozměry by se neměly používat pro formátování, místo toho použijte CSS. Atributy rozměrů nemusí přesně souznít s opravdovými rozměry obrázku, které jsou specifikované v CSS. <br><br> Více informací najdete na <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-sizes" target="_blank" rel="noreferrer noopener">w3.org</a>.';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['0'] = 'Hustota pixelů/<br>faktory přizpůsobení rozměrů';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['1'] = 'Pokud nejsou zadány vlastnosti rozměrů, určí toto nastavení hustotu obrázkových bodů, kterou chcete podpořit. Rozměry obrázku budou automaticky přizpůsobené. Např. <code>1x, 1.5x, 2x</code> vytvoří následující HTML kód: <code>&lt;img srcset="img-a.jpg 1x, img-b.jpg 1.5x, img-c.jpg 2x"&gt;</code><br><br> Pokud jsou vlastnosti rozměrů zadané, bude vygenerován stejný rozměr obrázku, jen se budou vlastnosti šířky použité pro atribut srcset. Např. 200 pixelů široký obrázek s hustotou <code>1x, 1.5x, 2x</code> vytvoří následující HTML kód:  <code>&lt;img srcset="img-a.jpg 200w, img-b.jpg 300w, img-c.jpg 400w"&gt;</code><br><br> Více informací naleznete na <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-srcset" target="_blank" rel="noreferrer noopener">w3.org</a>.';
