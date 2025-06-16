<?php

// vendor/contao/core-bundle/contao/languages/ru/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Произошла ошибка';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'В чем проблема?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Как можно устранить проблему?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Пожалуйста, расскажите мне больше';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Для настройки данного уведомления, создайте файл Twig-шаблона, переопределив <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Произошла ошибка при выполнении этого сценария. Что-то не работает надлежащим образом.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Откройте файл журнала в каталоге <code>var/logs</code> и найдите соответствующее сообщение об ошибке (как правило, это последняя запись).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'Выполнение скрипта остановлено, потому, что что-то работает неправильно. Фактическое сообщение об ошибке скрыто этим уведомлением по соображениям безопасности и может быть найдено в текущем файле журнала (см. выше). Если вы не понимаете сообщение об ошибке или не знаете, как решить проблему, посетите <a href="%s" target="_blank" rel="noreferrer noopener">cтраницу поддержки Contao</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Ошибка запроса токена';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'Запрашиваемый токен не может быть проверен.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = 'Пожалуйста, <a href="javascript:window.location.href=window.location.href">нажмите здесь</a> и повторите попытку. Не используйте кнопку назад вашего браузера.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Эта ошибка происходит, если есть POST запрос без действительного токена аутентификации. В Contao 2.10, проверка реферера была заменена системой запрос токена. Если проблема сохраняется, возможно, используются несовместимые сторонние расширения или неправильно обновлена установка Contao.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Для получения дополнительной информации, посетите <a href="%s" target="_blank" rel="noreferrer noopener">страницу поддержки Contao</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Сервис недоступен';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'Сейчас веб-сайт недоступен. Пожалуйста, зайдите позже.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Невозможно создать URL-адрес внешнего интерфейса';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'Не удалось создать URL-адрес, так как маршрут имеет обязательные параметры, которые не заданы. Необходимо предоставить дополнительную информацию (наприм., алиас новости).';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Маршруты Symfony могут иметь переменные параметры, которые проверяются с помощью регулярных выражений. Не удалось разрешить следующую конфигурацию:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Путь маршрута';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Имя';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Требование (регулярное выражение)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Значение по умолчанию';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'пустой';
