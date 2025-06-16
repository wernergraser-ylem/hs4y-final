<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sl', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Prišlo je do izjeme pri preverjanju avtentikacije.',
    'Authentication credentials could not be found.' => 'Poverilnic za avtentikacijo ni bilo mogoče najti.',
    'Authentication request could not be processed due to a system problem.' => 'Zahteve za avtentikacijo ni bilo mogoče izvesti zaradi sistemske težave.',
    'Invalid credentials.' => 'Neveljavne pravice.',
    'Cookie has already been used by someone else.' => 'Piškotek je uporabil že nekdo drug.',
    'Not privileged to request the resource.' => 'Nimate privilegijev za zahtevani vir.',
    'Invalid CSRF token.' => 'Neveljaven CSRF žeton.',
    'No authentication provider found to support the authentication token.' => 'Ponudnika avtentikacije za podporo prijavnega žetona ni bilo mogoče najti.',
    'No session available, it either timed out or cookies are not enabled.' => 'Seja ni na voljo, ali je potekla ali pa piškotki niso omogočeni.',
    'No token could be found.' => 'Žetona ni bilo mogoče najti.',
    'Username could not be found.' => 'Uporabniškega imena ni bilo mogoče najti.',
    'Account has expired.' => 'Račun je potekel.',
    'Credentials have expired.' => 'Poverilnice so potekle.',
    'Account is disabled.' => 'Račun je onemogočen.',
    'Account is locked.' => 'Račun je zaklenjen.',
    'Too many failed login attempts, please try again later.' => 'Preveč neuspelih poskusov prijave, poskusite znova pozneje.',
    'Invalid or expired login link.' => 'Neveljavna ali potekla povezava prijave.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Preveč neuspelih poskusov prijave, poskusite znova čez %minutes% minuto.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Preveč neuspešnih poskusov prijave, poskusite znova čez %minutes% minuto.|Preveč neuspešnih poskusov prijave, poskusite znova čez %minutes% minuti.|Preveč neuspešnih poskusov prijave, poskusite znova čez %minutes% minute.|Preveč neuspešnih poskusov prijave, poskusite znova čez %minutes% minut.',
  ),
  'time' => 
  array (
    'diff.ago.year' => '{1}pred 1 letom|{2}pred %count% letoma|[3, Inf]pred %count% leti',
    'diff.ago.month' => '{1}pred 1 mesecem|{2}pred %count% mesecema|[3, Inf]pred %count% meseci',
    'diff.ago.day' => '{1}pred 1 dnevom|{2}pred %count% dnevoma|[3, Inf]pred %count% dnevi',
    'diff.ago.hour' => '{1}pred 1 uro|{2}pred %count% urama|[3, Inf]pred %count% urami',
    'diff.ago.minute' => '{1}pred 1 minuto|{2}pred %count% minutama|[3, Inf]pred %count% minutami',
    'diff.ago.second' => '{1}pred 1 sekundo|{2}pred %count% sekundama|[3, Inf]pred %count% sekundami',
    'diff.empty' => 'pravkar',
    'diff.in.second' => '{1}za 1 sekundo|{2}za %count% sekundi|[3, Inf]za %count% sekunde',
    'diff.in.hour' => '{1}za 1 uro|{2}za %count% uri|[3, Inf]za %count% ure',
    'diff.in.minute' => '{1}za 1 minuto|{2}za %count% minuti|[3, Inf]za %count% minute',
    'diff.in.day' => '{1}za 1 dan|{2}za %count% dneva|[3, Inf]za %count% dni',
    'diff.in.month' => '{1}za 1 mesec|{2}za %count% meseca|[3, Inf]za %count% mesece',
    'diff.in.year' => '{1}za 1 leto|{2}za %count% leti|[3, Inf]za %count% leta',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'Način za odpravljanje napak',
    'contao_manager_title' => 'Upravljanje posodobitev in dodatkov ter vzdrževanje aplikacije',
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
