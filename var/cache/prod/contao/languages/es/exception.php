<?php

// vendor/contao/core-bundle/contao/languages/es/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Ha ocurrido un error';
$GLOBALS['TL_LANG']['XPT']['matter'] = '¿Qué pasa?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Como puedo solucionar el problema?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Quiero saber más, por favor';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Para personalizar este aviso, crea una plantilla personalizada Twig primordial <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Ha ocurrido un error al ejecutar este script. Algo no funciona adecuadamente. ';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Abra el archivo de registro actual en el directorio <code>var/logs</code> y busque el mensaje de error asociado (generalmente el último).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'La ejecución del script se detuvo porque algo no funciona correctamente. El mensaje de error real está oculto en este aviso por razones de seguridad y se puede encontrar en el archivo de registro actual (ver arriba). Si no comprende el mensaje de error o no sabe cómo solucionar el problema, visite la <a href="%s" target="_blank" rel="noreferrer noopener">página de soporte de Contao</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Solicitud token inválida';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'El token solicitado no pudo verificarse.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = 'Por favor, haga <a href="javascript:window.location.href=window.location.href">clic aquí</a> y vuelva a intentarlo. No utilice el botón Atrás de su navegador.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Este tipo de error ocurre si una solicitud de POST se ha realizada sin una autentificación válida del token. En Contao 2.10, el referer check ha sido reemplazado con una solicitud token del sistema. Si los problemas persisten, seguramente esta usando extensiones de terceros que son incompatibles o la actualización e instalación de Contao no ha sido correcta.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Para más información visite la <a href="%s" target="_blank" rel="noreferrer noopener">página de soporte de Contao</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Servicio no disponible';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'El sitio web no está disponible actualmente. Por favor inténtelo más tarde.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'No se puede generar la URL del front-end';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'No se pudo generar la URL porque la ruta tiene parámetros obligatorios que no se dan. Se debe proporcionar información adicional (por ejemplo, un alias de noticias).';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Las rutas de Symfony pueden tener parámetros variables, que se validan mediante expresiones regulares. No se pudo resolver la siguiente configuración:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Ruta path';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Nombre';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Requisito (Regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Valor defecto';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'vacío';
