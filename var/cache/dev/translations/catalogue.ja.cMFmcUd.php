<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('ja', array (
  'security' => 
  array (
    'An authentication exception occurred.' => '認証エラーが発生しました。',
    'Authentication credentials could not be found.' => '認証資格がありません。',
    'Authentication request could not be processed due to a system problem.' => 'システムの問題により認証要求を処理できませんでした。',
    'Invalid credentials.' => '資格が無効です。',
    'Cookie has already been used by someone else.' => 'Cookie が別のユーザーで使用されています。',
    'Not privileged to request the resource.' => 'リソースをリクエストする権限がありません。',
    'Invalid CSRF token.' => 'CSRF トークンが無効です。',
    'No authentication provider found to support the authentication token.' => '認証トークンをサポートする認証プロバイダーが見つかりません。',
    'No session available, it either timed out or cookies are not enabled.' => '利用可能なセッションがありません。タイムアウトしたか、Cookie が無効になっています。',
    'No token could be found.' => 'トークンが見つかりません。',
    'Username could not be found.' => 'ユーザー名が見つかりません。',
    'Account has expired.' => 'アカウントが有効期限切れです。',
    'Credentials have expired.' => '資格が有効期限切れです。',
    'Account is disabled.' => 'アカウントが無効です。',
    'Account is locked.' => 'アカウントはロックされています。',
    'Too many failed login attempts, please try again later.' => 'ログイン試行回数を超えました。しばらくして再度お試しください。',
    'Invalid or expired login link.' => 'ログインリンクが有効期限切れ、もしくは無効です。',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'ログイン試行回数が多すぎます。%minutes%分後に再度お試しください。',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'ログイン試行回数が多すぎます。%minutes%分後に再度お試しください。',
  ),
  'time' => 
  array (
    'diff.ago.year' => '%count%年前',
    'diff.ago.month' => '%count%ヶ月前',
    'diff.ago.day' => '%count%日前',
    'diff.ago.hour' => '%count%時間前',
    'diff.ago.minute' => '%count%分前',
    'diff.ago.second' => '%count%秒前',
    'diff.empty' => '今',
    'diff.in.second' => '%count%秒後',
    'diff.in.hour' => '%count%日後',
    'diff.in.minute' => '%count%分後',
    'diff.in.day' => '%count%日後',
    'diff.in.month' => '%count%ヶ月後',
    'diff.in.year' => '%count%年後',
  ),
  'ContaoManagerBundle' => 
  array (
    'debug_mode' => 'デバッグモード',
    'contao_manager_title' => '更新や機能拡張の管理とアプリケーションの保守',
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
