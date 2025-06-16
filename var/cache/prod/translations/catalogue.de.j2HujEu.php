<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('de', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Es ist ein Fehler bei der Authentifikation aufgetreten.',
    'Authentication credentials could not be found.' => 'Es konnten keine Zugangsdaten gefunden werden.',
    'Authentication request could not be processed due to a system problem.' => 'Die Authentifikation konnte wegen eines Systemproblems nicht bearbeitet werden.',
    'Invalid credentials.' => 'Fehlerhafte Zugangsdaten.',
    'Cookie has already been used by someone else.' => 'Cookie wurde bereits von jemand anderem verwendet.',
    'Not privileged to request the resource.' => 'Keine Rechte, um die Ressource anzufragen.',
    'Invalid CSRF token.' => 'Ungültiges CSRF-Token.',
    'No authentication provider found to support the authentication token.' => 'Es wurde kein Authentifizierungs-Provider gefunden, der das Authentifizierungs-Token unterstützt.',
    'No session available, it either timed out or cookies are not enabled.' => 'Keine Session verfügbar, entweder ist diese abgelaufen oder Cookies sind nicht aktiviert.',
    'No token could be found.' => 'Es wurde kein Token gefunden.',
    'Username could not be found.' => 'Der Benutzername wurde nicht gefunden.',
    'Account has expired.' => 'Der Account ist abgelaufen.',
    'Credentials have expired.' => 'Die Zugangsdaten sind abgelaufen.',
    'Account is disabled.' => 'Der Account ist deaktiviert.',
    'Account is locked.' => 'Der Account ist gesperrt.',
    'Too many failed login attempts, please try again later.' => 'Zu viele fehlgeschlagene Anmeldeversuche, bitte versuchen Sie es später noch einmal.',
    'Invalid or expired login link.' => 'Ungültiger oder abgelaufener Anmelde-Link.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Zu viele fehlgeschlagene Anmeldeversuche, bitte versuchen Sie es in einer Minute noch einmal.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Zu viele fehlgeschlagene Anmeldeversuche, bitte versuchen Sie es in %minutes% Minuten noch einmal.',
  ),
  'SchebTwoFactorBundle' => 
  array (
    'auth_code' => 'Bestätigungs-Code',
    'choose_provider' => 'Authentifizierungs-Methode wechseln',
    'login' => 'Login',
    'code_invalid' => 'Der Bestätigungs-Code ist nicht korrekt.',
    'trusted' => 'Dies ist ein vertrauenswürdiger Computer',
    'cancel' => 'Abbrechen',
    'code_reused' => 'Dieser 2FA-Code wurde bereits benutzt.',
  ),
  'time' => 
  array (
    'diff.ago.year' => 'vor einem Jahr|vor %count% Jahren',
    'diff.ago.month' => 'vor einem Monat|vor %count% Monaten',
    'diff.ago.day' => 'vor einem Tag|vor %count% Tagen',
    'diff.ago.hour' => 'vor einer Stunde|vor %count% Stunden',
    'diff.ago.minute' => 'vor einer Minute|vor %count% Minuten',
    'diff.ago.second' => 'vor einer Sekunde|vor %count% Sekunden',
    'diff.empty' => 'jetzt',
    'diff.in.second' => 'in einer Sekunde|in %count% Sekunden',
    'diff.in.hour' => 'in einer Stunde|in %count% Stunden',
    'diff.in.minute' => 'in einer Minute|in %count% Minuten',
    'diff.in.day' => 'in einem Tag|in %count% Tagen',
    'diff.in.month' => 'in einem Monat|in %count% Monaten',
    'diff.in.year' => 'in einem Jahr|in %count% Jahren',
    'duration.second' => '1 Sekunde|%count% Sekunden',
    'duration.minute' => '1 Minute|%count% Minuten',
    'duration.hour' => '1 Stunde|%count% Stunden',
    'duration.day' => '1 Tag|%count% Tage',
    'duration.none' => '< 1 Sekunde',
    'age' => '1 Jahr alt|%count% Jahre alt',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'Debug-Modus',
    'contao_manager_title' => 'Updates und Erweiterungen verwalten und die Applikation warten',
  ),
  'conditionalformfields' => 
  array (
    'operand' => 'Unerwartete Operation "{value}" bei Position {cursor}.',
    'function' => 'Unerwartete Funktion "{value}" bei Position {cursor}.',
    'field' => 'Unbekanntes Feld "{value}" bei Position {cursor}.',
    'variable' => 'Ungültige Variable "{value}" bei Position {cursor}.',
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
