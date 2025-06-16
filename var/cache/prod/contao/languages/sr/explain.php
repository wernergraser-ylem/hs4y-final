<?php

// vendor/contao/core-bundle/contao/languages/sr/explain.xlf
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['0'] = 'Rich text editor';
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['1'] = 'Више информација о TinyMCE можете пронаћи на линку <a href="https://www.tiny.cloud/tinymce/" target="_blank" rel="noreferrer noopener">https://www.tiny.cloud/tinymce/</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['0'] = 'Уметни тагове';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['1'] = 'Више информација о таговима потражите у <a href="https://to.contao.org/docs/insert-tags?lang=en" target="_blank" rel="noreferrer noopener">Contao приручнику</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['0'] = 'Едитор кȏда';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['1'] = 'Више информација о Ace, посетите <a href="https://ace.c9.io" target="_blank" rel="noreferrer noopener">https://ace.c9.io</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['0'] = 'Markdown';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['1'] = 'Више информација о markdown-у, потражите у <a href="https://to.contao.org/docs/markdown?lang=en" target="_blank" rel="noreferrer noopener">Contao приручнику</a>.';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['0'] = 'Распон колоне';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['1'] = 'Contao подржава све формате датума и времена који могу да буду обрађени PHP date() функцијом. Међутим, како би били сигурни да било који улаз може да буде конвертован у UNIX timestamp, у БекЕнду можете користити само нумеричке формате датума и времена (j, d, m, n, y, Y, g, G, h, H, i, s).<br><br><strong>Варијанте формата у ФронтЕнду можете променити у дефиницији структуре сајта (root странице).</strong><br><br><em>Ово су неки од прихватљивих формата датума и времена</em>:';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['0'] = 'Y-m-d';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['1'] = 'YYYY-MM-DD, international ISO-8601, нпр. 2005-01-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['0'] = 'm/d/Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['1'] = 'MM/DD/YYYY, Енглески формат, нпр., 01/28/2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['0'] = 'd.m.Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['1'] = 'DD.MM.YYYY, Немачки формат, нпр., 28.01.2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['0'] = 'y-n-j';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['1'] = 'YY-M-D, без водећих нула, нпр., 05-1-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['0'] = 'Ymd';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['1'] = 'YYYYMMDD, timestamp, нпр., 20050128';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['0'] = 'H:i:s';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['1'] = '24 часа, минуте и секунде, нпр., 20:36:59';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['0'] = 'g:i';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['1'] = '12 часова без водеће нуле и минуте, нпр., 8:36';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['0'] = 'Атрибути величина';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['1'] = 'HTML атрибут <code>sizes</code> дефинише приказану величину слике, опционо комбиновано са медијским упитом.  Можете користити CSS вредност да дефинишете ширину.<br><br>Нпр. <code>(max-width: 600px) 100vw, 50vw</code> значи да је слика 100% viewport-а за мале и 50% viewport-а за веће екране.<br><br>И <code>(max-width: 600px) calc(100vw - 20px), 500px</code> значи да је ширина за 20px мања за viewport малих екрана и 500px за веће екране.<br><br> Овај атрибут не би требао да се користи за стилизовање, него за то користите CSS. Вредност атрибута не мора да буде идентична стварној величини слике одређеној са CSS. За више информација о овом атрибуту посетите <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-sizes" target="_blank">w3.org</a>.';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['0'] = 'Густина пиксела/<br>фактор скалирања';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['1'] = 'Ако атрибут величине није дефинисан, ово подешавање дефинише густину пиксела коју желите да подржите. У том случају димензије слике ће бити подешене аутоматски. Нпр. <code>1x, 1.5x, 2x</code>генерише следећи HTML код: <code>&lt;img srcset="img-a.jpg 1x, img-b.jpg 1.5x, img-c.jpg 2x"&gt;</code><br><br>Ако су атрибути величине дефинисани, исте димензије слике ће бити генерисане али ће бити кориштени дескриптори за srcset атрибут. Нпр. слика ширине 200 пиксела са густином <code>1x, 1.5x, 2x</code> генерише следећи HTML код: <code>&lt;img srcset="img-a.jpg 200w, img-b.jpg 300w, img-c.jpg 400w"&gt;</code><br><br>За више информација о атрибуту srcset посетите <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-srcset" target="_blank" rel="noreferrer noopener">w3.org</a>.';
