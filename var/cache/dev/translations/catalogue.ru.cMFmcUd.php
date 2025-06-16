<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('ru', array (
  'security' => 
  array (
    'An authentication exception occurred.' => 'Ошибка аутентификации.',
    'Authentication credentials could not be found.' => 'Аутентификационные данные не найдены.',
    'Authentication request could not be processed due to a system problem.' => 'Запрос аутентификации не может быть обработан в связи с проблемой в системе.',
    'Invalid credentials.' => 'Недействительные аутентификационные данные.',
    'Cookie has already been used by someone else.' => 'Cookie уже был использован кем-то другим.',
    'Not privileged to request the resource.' => 'Отсутствуют права на запрос этого ресурса.',
    'Invalid CSRF token.' => 'Недействительный токен CSRF.',
    'No authentication provider found to support the authentication token.' => 'Не найден провайдер аутентификации, поддерживающий токен аутентификации.',
    'No session available, it either timed out or cookies are not enabled.' => 'Сессия не найдена, ее время истекло, либо cookies не включены.',
    'No token could be found.' => 'Токен не найден.',
    'Username could not be found.' => 'Имя пользователя не найдено.',
    'Account has expired.' => 'Время действия учетной записи истекло.',
    'Credentials have expired.' => 'Время действия аутентификационных данных истекло.',
    'Account is disabled.' => 'Учетная запись отключена.',
    'Account is locked.' => 'Учетная запись заблокирована.',
    'Too many failed login attempts, please try again later.' => 'Слишком много неудачных попыток входа, пожалуйста, попробуйте позже.',
    'Invalid or expired login link.' => 'Ссылка для входа недействительна или просрочена.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Слишком много неудачных попыток входа, повторите попытку через %minutes% минуту.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Слишком много неудачных попыток входа, повторите попытку через %minutes% минуту.|Слишком много неудачных попыток входа, повторите попытку через %minutes% минуты.|Слишком много неудачных попыток входа, повторите попытку через %minutes% минут.',
  ),
  'SchebTwoFactorBundle' => 
  array (
    'auth_code' => 'Код аутентификации',
    'login' => 'Логин',
    'code_invalid' => 'Неправильный код проверки',
    'trusted' => 'Доверять этому компьютеру в дальнейшем',
    'cancel' => 'Отменить',
  ),
  'time' => 
  array (
    'diff.ago.year' => '%count% год назад|%count% года назад|%count% лет назад',
    'diff.ago.month' => '%count% месяц назад|%count% месяца назад|%count% месяцев назад',
    'diff.ago.day' => '%count% день назад|%count% дня назад|%count% дней назад',
    'diff.ago.hour' => '%count% час назад|%count% часа назад|%count% часов назад',
    'diff.ago.minute' => '%count% минуту назад|%count% минуты назад|%count% минут назад',
    'diff.ago.second' => '%count% секунду назад|%count% секунды назад|%count% секунд назад',
    'diff.empty' => 'сейчас',
    'diff.in.second' => 'через %count% секунду|через %count% секунды|через %count% секунд',
    'diff.in.hour' => 'через %count% час|через %count% часа|через %count% часов',
    'diff.in.minute' => 'через %count% минуту|через %count% минуты|через %count% минут',
    'diff.in.day' => 'через %count% день|через %count% дня|через %count% дней',
    'diff.in.month' => 'через %count% месяц|через %count% месяца|через %count% месяцев',
    'diff.in.year' => 'через %count% год|через %count% года|через %count% лет',
    'duration.second' => '1 секунда|%count% секунд',
    'duration.minute' => '1 минута|%count% минут',
    'duration.hour' => '1 час|%count% часов',
    'duration.day' => '1 день|%count% дней',
    'duration.none' => '< 1 секунды',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'Режим отладки',
    'contao_manager_title' => 'Управление обновлениями и расширениями, обслуживание приложения',
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
