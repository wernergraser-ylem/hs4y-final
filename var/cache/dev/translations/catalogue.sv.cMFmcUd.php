<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sv', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Ett autentiseringsfel har inträffat.',
    'Authentication credentials could not be found.' => 'Uppgifterna för autentisering kunde inte hittas.',
    'Authentication request could not be processed due to a system problem.' => 'Autentiseringen kunde inte genomföras på grund av systemfel.',
    'Invalid credentials.' => 'Felaktiga uppgifter.',
    'Cookie has already been used by someone else.' => 'Cookien har redan använts av någon annan.',
    'Not privileged to request the resource.' => 'Saknar rättigheter för resursen.',
    'Invalid CSRF token.' => 'Ogiltig CSRF-token.',
    'No authentication provider found to support the authentication token.' => 'Ingen leverantör för autentisering hittades för angiven autentiseringstoken.',
    'No session available, it either timed out or cookies are not enabled.' => 'Ingen session finns tillgänglig, antingen har den förfallit eller är cookies inte aktiverat.',
    'No token could be found.' => 'Ingen token kunde hittas.',
    'Username could not be found.' => 'Användarnamnet kunde inte hittas.',
    'Account has expired.' => 'Kontot har förfallit.',
    'Credentials have expired.' => 'Uppgifterna har förfallit.',
    'Account is disabled.' => 'Kontot är inaktiverat.',
    'Account is locked.' => 'Kontot är låst.',
    'Too many failed login attempts, please try again later.' => 'För många misslyckade inloggningsförsök, försök igen senare.',
    'Invalid or expired login link.' => 'Ogiltig eller utgången inloggningslänk.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'För många misslyckade inloggningsförsök, försök igen om %minutes% minut.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'För många misslyckade inloggningsförsök, vänligen försök igen om %minutes% minuter.',
  ),
  'SchebTwoFactorBundle' => 
  array (
    'auth_code' => 'Inloggningskod',
    'choose_provider' => 'Växla inloggningsmetod',
    'login' => 'Logga in',
    'code_invalid' => 'Inloggningskoden är felaktig',
    'trusted' => 'Jag använder en pålitlig dator',
    'cancel' => 'Avbryt',
  ),
  'time' => 
  array (
    'diff.ago.year' => '%count% år sedan',
    'diff.ago.month' => '1 månad sedan|%count% månader sedan',
    'diff.ago.day' => '1 dag sedan|%count% dagar sedan',
    'diff.ago.hour' => '1 timme sedan|%count% timmar sedan',
    'diff.ago.minute' => '1 minut sedan|%count% minuter sedan',
    'diff.ago.second' => '1 sekund sedan|%count% sekunder sedan',
    'diff.empty' => 'nu',
    'diff.in.second' => 'om 1 sekund|om %count% sekunder',
    'diff.in.hour' => 'om 1 timme|om %count% timmar',
    'diff.in.minute' => 'om 1 minut|om %count% minuter',
    'diff.in.day' => 'om 1 dag|om %count% dagar',
    'diff.in.month' => 'om 1 månad|om %count% månader',
    'diff.in.year' => 'om %count% år',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'Felsökningsläge',
    'contao_manager_title' => 'Hantera uppdateringar och tillägg och underhåll applikationen',
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
