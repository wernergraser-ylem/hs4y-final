<?php

// vendor/contao/core-bundle/contao/languages/pl/exception.xlf
$GLOBALS['TL_LANG']['XPT']['error'] = 'Wystąpił błąd';
$GLOBALS['TL_LANG']['XPT']['matter'] = 'Co się stało?';
$GLOBALS['TL_LANG']['XPT']['howToFix'] = 'Jak mogę naprawić ten problem?';
$GLOBALS['TL_LANG']['XPT']['more'] = 'Dowiedz się więcej';
$GLOBALS['TL_LANG']['XPT']['hint'] = 'Aby zmienić to powiadomienie, utwórz własną templatkę Twig nadpisującą <em>%s</em>.';
$GLOBALS['TL_LANG']['XPT']['errorOccurred'] = 'Wysąpił błąd podczas wykonywania skryptu. Coś nie działa prawidłowo.';
$GLOBALS['TL_LANG']['XPT']['errorFixOne'] = 'Otwórz aktualny plik logów w katalogu <code>var/logs</code> i znajdź powiązany błąd (zawyczaj jest ostatni).';
$GLOBALS['TL_LANG']['XPT']['errorExplain'] = 'Wykonanie skryptu zostało zatrzymane, ponieważ coś nie działa poprawnie. Rzeczywisty komunikat o błędzie jest ukryty z powodów bezpieczeństwa i można go znaleźć w bieżącym pliku dziennika (patrz powyżej). Jeśli nie rozumiesz komunikatu o błędzie lub nie wiesz, jak rozwiązać problem, odwiedź <a href="%s" target="_blank" rel="noreferrer noopener">stronę wsparcia Contao</a>.';
$GLOBALS['TL_LANG']['XPT']['requestToken'] = 'Nieprawidłowy request token';
$GLOBALS['TL_LANG']['XPT']['invalidToken'] = 'Request token nie został zweryfikowany.';
$GLOBALS['TL_LANG']['XPT']['tokenRetry'] = '<a href="javascript:window.location.href=window.location.href">Kliknij tutaj</a> i spróbuj ponownie. Nie używaj przycisku wstecz w swojej przeglądarce.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainOne'] = 'Ten problem pojawia się, gdy występuje zapytanie POST bez prawidłowego tokena autoryzyjącego. W Contao 2.10, sprawdzanie referer został zastąpione przez system request token. Jeśli ten problem się utrzymuje, być może używasz niekompatyblinych rozszerzeń trzecich lub nieprawidłowo aktualizowałeś Contao.';
$GLOBALS['TL_LANG']['XPT']['tokenExplainTwo'] = 'Aby uzyskać więcej informacji, odwiedź <a href="%s" target="_blank" rel="noreferrer noopener">stronę wsparcia Contao</a>.';
$GLOBALS['TL_LANG']['XPT']['unavailable'] = 'Serwis niedostępny';
$GLOBALS['TL_LANG']['XPT']['maintenance'] = 'Strona jest obecnie niedostępna. Spróbuj ponownie później.';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['title'] = 'Nie udało się wygenerować URL front end';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['matter'] = 'URL nie mógł zostać wygenerowany, ponieważ ścieżka posiada obowiązkowe parametry, które nie zostały podane. Należy podać dodatkowe informacje (np. alias wiadomości).';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['explain'] = 'Ścieżki Symfony mogą mieć zmienne parametry, które są sprawdzane przy użyciu wyrażeń regularnych. Następująca konfiguracja nie może zostać rozwiązana:';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['path'] = 'Ścieżka';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterName'] = 'Nazwa wyświetlana';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterRequirement'] = 'Wymagania (regex)';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterDefault'] = 'Zawartość';
$GLOBALS['TL_LANG']['XPT']['missingRouteParameters']['parameterEmpty'] = 'puste';
