<?php

// vendor/contao/core-bundle/contao/languages/es/explain.xlf
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['0'] = 'Editor rich text';
$GLOBALS['TL_LANG']['XPL']['insertTags']['0']['1'] = 'Para obtener más información sobre TinyMCE, consulte <a href="https://www.tiny.cloud/tinymce/" target="_blank" rel="noreferrer noopener">https://www.tiny.cloud/tinymce/</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['0'] = 'Etiquetas inserción';
$GLOBALS['TL_LANG']['XPL']['insertTags']['1']['1'] = 'Para obtener más información sobre cómo insertar etiquetas, consulte el <a href="https://to.contao.org/docs/insert-tags?lang=en" target="_blank" rel="noreferrer noopener">manual de Contao</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['0'] = 'Editor de código';
$GLOBALS['TL_LANG']['XPL']['insertTags']['2']['1'] = 'Para obtener más información sobre Ace, consulte <a href="https://ace.c9.io" target="_blank" rel="noreferrer noopener">https://ace.c9.io</a>.';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['0'] = 'Markdown';
$GLOBALS['TL_LANG']['XPL']['insertTags']['3']['1'] = 'Para obtener más información sobre Markdown, consulte el <a href="https://to.contao.org/docs/markdown?lang=en" target="_blank" rel="noreferrer noopener">manual de Contao</a>.';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['0'] = 'colspan';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['0']['1'] = '
Contao admite todos los formatos de fecha y hora que se pueden analizar con la función date() de PHP. Sin embargo, para asegurarse de que cualquier entrada se pueda transformar en una marca de tiempo UNIX, solo puede usar formatos numéricos de fecha y hora (j, d, m, n, y, Y, g, G, h, H, i, s) en el back-end. <br><br><strong>YPuede ingresar diferentes formatos de front-end en las páginas raíz del sitio web.</strong><br><br><em>Aquí hay algunos ejemplos de formatos válidos de fecha y hora</em>:';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['0'] = 'Y-m-d';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['1']['1'] = 'YYYY-MM-DD, internacional ISO 8601, por ejemplo 2005-01-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['0'] = 'm/d/Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['2']['1'] = 'MM/DD/AAAA, Formato inglés, por ejemplo 01/28/2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['0'] = 'd.m.Y';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['3']['1'] = 'DD.MM.AAAA, Formato alemán, por ejemplo 28.01.2005';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['0'] = 'y-n-j';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['4']['1'] = 'YY-M-D, sin ceros al inicio, por ejemplo 05-1-28';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['0'] = 'Ymd';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['5']['1'] = 'YYYYMMDD, timestamp, por ejemplo 20050128';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['0'] = 'H:i:s';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['6']['1'] = '24 horas, minutos y segundos, por ejemplo 20:36:59';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['0'] = 'g:i';
$GLOBALS['TL_LANG']['XPL']['dateFormat']['7']['1'] = '12 horas sin ceros al inicio y minutos, por ejemplo 8:36';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['0'] = 'Atributo tamaños';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['0']['1'] = 'Los <code>tamaños</code> de atributos HTML definen el ancho de diseño previsto de la imagen, combinado opcionalmente con una consulta de medios. Puede usar cualquier valor de longitud CSS en este atributo. <br><br>P.ej. <code>(max-width: 600px) 100vw, 50vw</code> significa que el ancho de la imagen es el 100 % de la ventana gráfica para pantallas pequeñas y el 50 % de la ventana gráfica para pantallas más grandes. <br><br>Y <code>(max-width: 600px) calc(100vw - 20px), 500 px</code> significa que el ancho de la imagen es 20 px más pequeño que la ventana gráfica para pantallas pequeñas y 500 px para pantallas más grandes.<br><br>El atributo de tamaños no debe usarse para diseñar, use CSS en su lugar. El atributo de tamaños no necesariamente tiene que coincidir exactamente con el ancho real de la imagen como se especifica en el CSS.<br><br>Para obtener más información sobre el atributo de tamaños, visite<a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-sizes" target="_blank" rel="noreferrer noopener">w3.org</a>.';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['0'] = 'Factores de escala/<br>densidades de píxeles';
$GLOBALS['TL_LANG']['XPL']['imageSizeDensities']['1']['1'] = 'Si el atributo de tamaños no está definido, esta configuración simplemente define las densidades de píxeles que desea admitir. Las dimensiones de las imágenes se ajustan automáticamente. P.ej. <code>1x, 1.5x, 2x</code> crea el siguiente código HTML: <code>&lt;img srcset="img-a.jpg 1x, img-b.jpg 1.5x, img-c.jpg 2x"&gt;</code><br><br>Si se define el atributo de tamaños, el Se generan los mismos tamaños de imagen, pero se usan descriptores de ancho para el atributo srcset. P.ej. una imagen de 200 píxeles de ancho con las densidades <code>1x, 1.5x, 2x</code> crea el siguiente código HTML: <code>&lt;img srcset="img-a.jpg 200w, img-b.jpg 300w, img-c.jpg 400w"&gt;</code><br><br>Para Para obtener más información sobre el atributo srcset, visite <a href="https://www.w3.org/TR/2016/PR-html51-20160915/semantics-embedded-content.html#element-attrdef-img-srcset" target="_blank" rel="noreferrer noopener">w3.org</a>.';
