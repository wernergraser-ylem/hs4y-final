<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sk', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Pri overovaní došlo k chybe.',
    'Authentication credentials could not be found.' => 'Overovacie údaje neboli nájdené.',
    'Authentication request could not be processed due to a system problem.' => 'Požiadavok na overenie nemohol byť spracovaný kvôli systémovej chybe.',
    'Invalid credentials.' => 'Neplatné prihlasovacie údaje.',
    'Cookie has already been used by someone else.' => 'Cookie už bolo použité niekým iným.',
    'Not privileged to request the resource.' => 'Nemáte oprávnenie pristupovať k prostriedku.',
    'Invalid CSRF token.' => 'Neplatný CSRF token.',
    'No authentication provider found to support the authentication token.' => 'Poskytovateľ pre overovací token nebol nájdený.',
    'No session available, it either timed out or cookies are not enabled.' => 'Session nie je k dispozíci, vypršala jej platnosť, alebo sú zakázané cookies.',
    'No token could be found.' => 'Token nebol nájdený.',
    'Username could not be found.' => 'Prihlasovacie meno nebolo nájdené.',
    'Account has expired.' => 'Platnosť účtu skončila.',
    'Credentials have expired.' => 'Platnosť prihlasovacích údajov skončila.',
    'Account is disabled.' => 'Účet je zakázaný.',
    'Account is locked.' => 'Účet je zablokovaný.',
    'Too many failed login attempts, please try again later.' => 'Príliš mnoho neúspešných pokusov o prihlásenie. Skúste to prosím znovu neskôr.',
    'Invalid or expired login link.' => 'Neplatný alebo expirovaný odkaz na prihlásenie.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Príliš veľa neúspešných pokusov o prihlásenie. Skúste to znova o %minutes% minútu.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Príliš veľa neúspešných pokusov o prihlásenie, skúste to prosím znova o %minutes% minútu.|Príliš veľa neúspešných pokusov o prihlásenie, skúste to prosím znova o %minutes% minúty.|Príliš veľa neúspešných pokusov o prihlásenie, skúste to prosím znova o %minutes% minút.',
  ),
  'SchebTwoFactorBundle' => 
  array (
    'auth_code' => 'Overovací kód',
    'login' => 'Prihlásiť',
    'code_invalid' => 'Overovací kód nie je správny.',
    'trusted' => 'Som na dôveryhodnom počítači',
    'cancel' => 'Cancel',
  ),
  'time' => 
  array (
    'diff.ago.year' => 'pred rokom|[2, Inf]pred %count% rokmi',
    'diff.ago.month' => 'pred mesiacom|[2, Inf]pred %count% mesiacmi',
    'diff.ago.day' => '{1}včera|{2}predvčerom|[3, Inf]pred %count% dňami',
    'diff.ago.hour' => 'pred hodinou|[2, Inf]pred %count% hodinami',
    'diff.ago.minute' => 'pred minútou|[2, Inf]pred %count% minútami',
    'diff.ago.second' => 'pred sekundou|[2, Inf]pred %count% sekundami',
    'diff.empty' => 'teraz',
    'diff.in.second' => '{1}za sekundu|[2, 4]za %count% sekundy|[5, Inf]za %count% sekúnd',
    'diff.in.hour' => '{1}za hodinu|[2, 4]za %count% hodiny|[5, Inf]za %count% hodín',
    'diff.in.minute' => '{1}za minútu|[2, 4]za %count% minúty|[5, Inf]za %count% minút',
    'diff.in.day' => '{1}zajtra|{2}pozajtra|[3, 4]za %count% dni|[5, Inf]za %count% dní',
    'diff.in.month' => '{1}za mesiac|[2, 4]za %count% mesiace|[5, Inf]za %count% mesiacov',
    'diff.in.year' => '{1}za rok|[2, 4]za %count% roky|[5, Inf]za %count% rokov',
    'duration.second' => '1 sekunda|[2, 4]%count% sekundy|[5, Inf]%count% sekúnd',
    'duration.minute' => '1 minúta|[2, 4]%count% minúty|[5, Inf]%count% minút',
    'duration.hour' => '1 hodina|[2, 4]%count% hodiny|[5, Inf]%count% hodín',
    'duration.day' => '1 deň|[2, 4]%count% dni|[5, Inf]%count% dní',
    'duration.none' => '< 1 sekunda',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'Debug mode',
    'contao_manager_title' => 'Spravujte aktualizácie a rozšírenia a spravujte aplikáciu',
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
