<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('fa', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'خطایی هنگام احراز هویت رخ داده است.',
    'Authentication credentials could not be found.' => 'شرایط احراز هویت یافت نشد.',
    'Authentication request could not be processed due to a system problem.' => 'درخواست احراز هویت به دلیل  وجود مشکل در سیستم قابل پردازش نمی باشد.',
    'Invalid credentials.' => 'احراز هویت نامعتبر می باشد.',
    'Cookie has already been used by someone else.' => 'Cookie قبلا توسط شخص دیگری استفاده گردیده است.',
    'Not privileged to request the resource.' => 'دسترسی لازم برای درخواست از این منبع را دارا نمی باشید.',
    'Invalid CSRF token.' => 'توکن CSRF معتبر نمی باشد.',
    'No authentication provider found to support the authentication token.' => 'هیچ ارائه دهنده احراز هویتی برای پشتیبانی از توکن احراز هویت پیدا نشد.',
    'No session available, it either timed out or cookies are not enabled.' => 'هیچ جلسه‌ای در دسترس نمی باشد. این میتواند به دلیل پایان یافتن زمان و یا فعال نبودن کوکی ها باشد.',
    'No token could be found.' => 'هیچ توکنی پیدا نشد.',
    'Username could not be found.' => 'نام ‌کاربری پیدا نشد.',
    'Account has expired.' => 'حساب کاربری منقضی گردیده است.',
    'Credentials have expired.' => 'مجوزهای احراز هویت منقضی گردیده‌اند.',
    'Account is disabled.' => 'حساب کاربری غیرفعال می باشد.',
    'Account is locked.' => 'حساب کاربری قفل گردیده است.',
    'Too many failed login attempts, please try again later.' => 'تلاش‌های ناموفق زیادی برای ورود صورت گرفته است، لطفاً بعداً دوباره امتحان کنید.',
    'Invalid or expired login link.' => 'لینک ورود نامعتبر یا تاریخ‌گذشته است.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'تلاش‌های ناموفق زیادی برای ورود صورت گرفته است، لطفاً %minutes% دقیقه دیگر دوباره امتحان کنید.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'تعداد دفعات تلاش برای ورود بیش از حد زیاد است، لطفا پس از %minutes% دقیقه دوباره تلاش کنید.',
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
