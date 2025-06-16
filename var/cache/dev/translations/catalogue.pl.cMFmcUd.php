<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('pl', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Wystąpił błąd uwierzytelniania.',
    'Authentication credentials could not be found.' => 'Dane uwierzytelniania nie zostały znalezione.',
    'Authentication request could not be processed due to a system problem.' => 'Żądanie uwierzytelniania nie mogło zostać pomyślnie zakończone z powodu problemu z systemem.',
    'Invalid credentials.' => 'Nieprawidłowe dane.',
    'Cookie has already been used by someone else.' => 'To ciasteczko jest używane przez kogoś innego.',
    'Not privileged to request the resource.' => 'Brak uprawnień dla żądania wskazanego zasobu.',
    'Invalid CSRF token.' => 'Nieprawidłowy token CSRF.',
    'No authentication provider found to support the authentication token.' => 'Nie znaleziono mechanizmu uwierzytelniania zdolnego do obsługi przesłanego tokenu.',
    'No session available, it either timed out or cookies are not enabled.' => 'Brak danych sesji, sesja wygasła lub ciasteczka nie są włączone.',
    'No token could be found.' => 'Nie znaleziono tokenu.',
    'Username could not be found.' => 'Użytkownik o podanej nazwie nie istnieje.',
    'Account has expired.' => 'Konto wygasło.',
    'Credentials have expired.' => 'Dane uwierzytelniania wygasły.',
    'Account is disabled.' => 'Konto jest wyłączone.',
    'Account is locked.' => 'Konto jest zablokowane.',
    'Too many failed login attempts, please try again later.' => 'Zbyt dużo nieudanych prób logowania, proszę spróbować ponownie później.',
    'Invalid or expired login link.' => 'Nieprawidłowy lub wygasły link logowania.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Zbyt wiele nieudanych prób logowania, spróbuj ponownie po upływie %minutes% minut.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Zbyt wiele nieudanych prób logowania, spróbuj ponownie za %minutes% minutę.|Zbyt wiele nieudanych prób logowania, spróbuj ponownie za %minutes% minuty.|Zbyt wiele nieudanych prób logowania, spróbuj ponownie za %minutes% minut.',
  ),
  'SchebTwoFactorBundle' => 
  array (
    'auth_code' => 'Kod uwierzytelnienia',
    'choose_provider' => 'Przełącz metodę uwierzytelniania',
    'login' => 'Zaloguj',
    'code_invalid' => 'Kod weryfikacyjny jest niepoprawny.',
    'trusted' => 'Jestem na zaufanym komputerze',
    'cancel' => 'Anuluj',
  ),
  'time' => 
  array (
    'diff.ago.year' => 'rok temu|%count% lata temu|%count% lat temu',
    'diff.ago.month' => 'miesiąc temu|%count% miesiące temu|%count% miesięcy temu',
    'diff.ago.day' => 'wczoraj|%count% dni temu|%count% dni temu',
    'diff.ago.hour' => 'godzinę temu|%count% godziny temu|%count% godzin temu',
    'diff.ago.minute' => 'minutę temu|%count% minuty temu|%count% minut temu',
    'diff.ago.second' => 'sekundę temu|%count% sekundy temu|%count% sekund temu',
    'diff.empty' => 'teraz',
    'diff.in.second' => 'za sekundę|za %count% sekundy|za %count% sekund',
    'diff.in.hour' => 'za godzinę|za %count% godziny|za %count% godzin',
    'diff.in.minute' => 'za minutę|za %count% minuty|za %count% minut',
    'diff.in.day' => 'jutro|za %count% dni|za %count% dni',
    'diff.in.month' => 'za miesiąc|za %count% miesiące|za %count% miesięcy',
    'diff.in.year' => 'za rok|za %count% lata|za %count% lat',
    'duration.second' => '1 sekunda|%count% sekundy|%count% sekund',
    'duration.minute' => '1 minuta|%count% minuty|%count% minut',
    'duration.hour' => '1 godzina|%count% godziny|%count% godzin',
    'duration.day' => '1 dzień|%count% dni',
    'duration.none' => '< 1 sekunda',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'Tryb debugowania',
    'contao_manager_title' => 'Zarządzaj aktualizacjami i rozszerzeniami oraz utrzymuj aplikację',
  ),
));

$catalogueEn = new MessageCatalogue('en', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'An authentication exception occurred.',
    'Authentication credentials could not be found.' => 'Authentication credentials could not be found.',
    'Authentication request could not be processed due to a system problem.' => 'Authentication request could not be processed due to a system problem.',
    'Invalid credentials.' => 'Invalid credentials.',
    'Cookie has already been used by someone else.' => 'Cookie has already been used by someone else.',
    'Not privileged to request the resource.' => 'Not privileged to request the resource.',
    'Invalid CSRF token.' => 'Invalid CSRF token.',
    'No authentication provider found to support the authentication token.' => 'No authentication provider found to support the authentication token.',
    'No session available, it either timed out or cookies are not enabled.' => 'No session available, it either timed out or cookies are not enabled.',
    'No token could be found.' => 'No token could be found.',
    'Username could not be found.' => 'Username could not be found.',
    'Account has expired.' => 'Account has expired.',
    'Credentials have expired.' => 'Credentials have expired.',
    'Account is disabled.' => 'Account is disabled.',
    'Account is locked.' => 'Account is locked.',
    'Too many failed login attempts, please try again later.' => 'Too many failed login attempts, please try again later.',
    'Invalid or expired login link.' => 'Invalid or expired login link.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Too many failed login attempts, please try again in %minutes% minute.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Too many failed login attempts, please try again in %minutes% minutes.',
  ),
  'SchebTwoFactorBundle' => 
  array (
    'auth_code' => 'Authentication Code',
    'choose_provider' => 'Switch authentication method',
    'login' => 'Login',
    'code_invalid' => 'The verification code is not valid.',
    'trusted' => 'I\'m on a trusted device',
    'cancel' => 'Cancel',
    'code_reused' => 'This 2FA code has already been used.',
  ),
  'time' => 
  array (
    'diff.ago.year' => '1 year ago|%count% years ago',
    'diff.ago.month' => '1 month ago|%count% months ago',
    'diff.ago.day' => '1 day ago|%count% days ago',
    'diff.ago.hour' => '1 hour ago|%count% hours ago',
    'diff.ago.minute' => '1 minute ago|%count% minutes ago',
    'diff.ago.second' => '1 second ago|%count% seconds ago',
    'diff.empty' => 'now',
    'diff.in.second' => 'in 1 second|in %count% seconds',
    'diff.in.hour' => 'in 1 hour|in %count% hours',
    'diff.in.minute' => 'in 1 minute|in %count% minutes',
    'diff.in.day' => 'in 1 day|in %count% days',
    'diff.in.month' => 'in 1 month|in %count% months',
    'diff.in.year' => 'in 1 year|in %count% years',
    'duration.second' => '1 second|%count% seconds',
    'duration.minute' => '1 minute|%count% minutes',
    'duration.hour' => '1 hour|%count% hours',
    'duration.day' => '1 day|%count% days',
    'duration.none' => '< 1 second',
    'age' => '1 year old|%count% years old',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'Debug mode',
    'contao_manager_title' => 'Manage updates and extensions and maintain the application',
  ),
  'conditionalformfields' => 
  array (
    'operand' => 'Unexpected operator "{value}" around position {cursor}.',
    'function' => 'Unexpected function "{value}" around position {cursor}.',
    'field' => 'Unknown field name "{value}" around position {cursor}.',
    'variable' => 'Unsupported variable name "{value}" around position {cursor}.',
  ),
));
$catalogue->addFallbackCatalogue($catalogueEn);

return $catalogue;
