<?php

// vendor/contao/core-bundle/contao/languages/sr/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Дошло је до грешке';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'У чему је проблем?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Како могу поправити проблем?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Реците ми више';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Да прилагодите ово обавештење, креирајте властити Twig шаблон којим ћете заобићи <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Дошло је до грешке приликом извршавања скрипте. Нешто не ради исправно.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Отворите тренутни фајл логова у директоријуму <code>var/logs</code> и пронађите офговарајућу поруку о грешки (најчешће је то последња).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'Извршавање скрипте је заустављено из разлога јер нешто не ради како треба. Тачна порука грешке је скривена из сигурносних разлога али је можете пронаћи у лог фајловима (погледајте изнад). Ако не разумете поруку о грешци или не знате како да решите проблем, посетите <a href="%s" target="_blank" rel="noreferrer noopener">Contao страницу подршке</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Неисправан токен';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'Захтевани токен не може бити проверен.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = 'Кликните <a href="javascript:window.location.href=window.location.href">овде</a>и покушајте поново. Не користите дугме за повратак у вашем интернет претраживачу.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Ова грешка се дешава када постоји POST захтев без валидног аутентификационг токена. Од Contao 2.10, провера реферала замењена је системом захтеваног токена. Ако проблем потраје, можда користите некомпатибилну "third-party" екстензију или нисте исправно ажурирали своју верзију Contao система.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Више информација ћете проначи на <a href="%s" target="_blank" rel="noreferrer noopener">Contao страницама подршке</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Услуга је недоступна';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'Сајт тренутно није доступан. Молимо вас да покушате касније.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Генерисање URL за фронт енд није успело';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'URL није могао бити генерисан, зато што путања има обавезне параметре који нису дати. Додатне информације (нпр. алиас вести) морају бити на располагању.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Symfony руте могу да садрже варијабле параметре, који се проверавају кориштењем типичних израза. Следећа конфигурација није могла да се реши:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Путања руте';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Име';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Захтевано (Regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Подразумевана вредност';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'празно';
