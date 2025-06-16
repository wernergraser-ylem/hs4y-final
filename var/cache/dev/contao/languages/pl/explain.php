<?php

// vendor/contao/core-bundle/contao/languages/pl/explain.xlf
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['0'] = 'Przyjazny edytor tekstu';
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['1'] = 'Więcej informacji na temat edytora TinyMCE znajdziesz na <a href="https://www.tiny.cloud/tinymce/" target="_blank" rel="noreferrer noopener">https://www.tiny.cloud/tinymce/</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['0'] = 'Wstawianie tagów';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['1'] = 'Aby uzyskać więcej informacji na temat insert tagów, zobacz <a href="https://to.contao.org/docs/insert-tags?lang=en" target="_blank" rel="noreferrer noopener">Podręcznik Contao</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['0'] = 'Edytor kodu';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['1'] = 'Więcej informacji na temat edytora Ace znajdziesz na <a href="https://ace.c9.io" target="_blank" rel="noreferrer noopener">https://ace.c9.io</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['0'] = 'Markdown';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['1'] = 'Aby dowiedzieć się więcej o markdown, zobacz <a href="https://to.contao.org/docs/markdown?lang=en" target="_blank" rel="noreferrer noopener">Podręcznik Contao</a>.';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['0'] = 'colspan';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['1'] = 'Contao wspiera kilka różnych formatów daty i czasu, których podstawą jest funkcja PHP date(). Jednakże, aby być pewnym, że wszelkie dane wprowadzane przez użytkownika da się przekonwertować na UNIXowy znacznik czasu (timestamp), można używać jedynie numerycznych formatów daty i czasu (j, d, m, n, y, Y, g, G, h, H, i, s) w backendzie. <br><br><strong>Możesz wprowadzić różne formaty dla frontendu w ustawieniach punktów startowych serwisów.</strong><br><br><em>Oto kilka przykładów prawidłowych formatów daty i czasu</em>:';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['0'] = 'Y-m-d';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['1'] = 'YYYY-MM-DD, format międzynarodowy ISO 8601, np. 2005-01-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['0'] = 'm/d/Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['1'] = 'MM/DD/YYYY, angielski format, np. 01/28/2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['0'] = 'd.m.Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['1'] = 'DD.MM.YYYY, Niemiecki format, np. 28.01.2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['0'] = 'y-n-j';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['1'] = 'YY-M-D, czyli rok, miesiąc (bez zera na początku w przypadku miesięcy od 1 do 9), dzień, np. 05-1-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['0'] = 'Ymd';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['1'] = 'YYYYMMDD, tzw. znacznik czasu (timestamp), np. 20050128';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['0'] = 'H:i:s';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['1'] = '24 godziny, minuty i sekundy, np. 20:36:59';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['0'] = 'g:i';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['1'] = '12 godziny (bez zera na początku w przypadku godzin od 0 do 1) oraz minuty, np. 8:36';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['0'] = 'Atrybuty rozmiarów';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['1'] = 'Atrybut HTML <code>sizes</code> określa wyświetlaną szerokość obrazka, opcjonalnie połączoną z media query. Możesz użyć dowolnej wartości CSS, aby określić szerokość.<br><br>Np. <code>(max-width: 600px) 100vw, 50vw</code> oznacza szerokość obrazka 100% dla urządzeń z małymi ekranami i 50% szerokości dla urządzeń z dużymi ekranami.<br><br>A <code>(max-width: 600px) calc(100vw - 20px), 500px</code> oznacza szerokość obrazka mniejszą o 20px dla urządzeń z małymi ekranami i 500px dla urządzeń z dużymi ekranami.<br><br>Rozmiar nie powinien być używany do stylizacji, użyj zamiast tego CSS. Rozmiar nie musi być dokładnie zgodny z rzeczywistą szerokością obrazu, jak określono w CSS.<br><br>Po więcej informacji na temat atrybutu sizes odwiedź <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-sizes" target="_blank" rel="noreferrer noopener">w3.org</a>.';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['0'] = 'Gęstości pikseli / współczynniki skalowania';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['1'] = 'Jeśli atrybut sizes nie jest określony, to ustawienie po prostu określi gęstość pikseli, którą chcesz wspierać. Rozmiary obrazków są dostosowane automatycznie. Np. <code>1x, 1.5x, 2x</code> tworzy następujący kod HTML:</code>&lt;img srcset="img-a.jpg 1x, img-b.jpg 1.5x, img-c.jpg 2x"&gt;</code><br><br>Jeśli atrybut sizes jest określony, te same rozmiary obrazków są wygenerowane, ale deskryptory szerokości są użyte w atrybucie srcset. Np. obrazek o szerokości 200 pikseli z gęstościami <code>1x, 1.5x, 2x</code> tworzy następujący kod HTML:</code>&lt;img srcset="img-a.jpg 200w, img-b.jpg 300w, img-c.jpg 400w"&gt;</code><br><br>Po więcej informacji na temat atrybutu srcset odwiedź <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-srcset" target="_blank" rel="noreferrer noopener">w3.org</a>.';
