<?php

namespace ContainerBhvFr3k;

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Trusted/TrustedCookieResponseListener.php';
class TrustedCookieResponseListenerGhost4e97e67 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedCookieResponseListener implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'cookieDomain' => [parent::class, 'cookieDomain', null, 530],
        "\0".parent::class."\0".'cookieName' => [parent::class, 'cookieName', null, 530],
        "\0".parent::class."\0".'cookiePath' => [parent::class, 'cookiePath', null, 530],
        "\0".parent::class."\0".'cookieSameSite' => [parent::class, 'cookieSameSite', null, 530],
        "\0".parent::class."\0".'cookieSecure' => [parent::class, 'cookieSecure', null, 530],
        "\0".parent::class."\0".'trustedTokenLifetime' => [parent::class, 'trustedTokenLifetime', null, 530],
        "\0".parent::class."\0".'trustedTokenStorage' => [parent::class, 'trustedTokenStorage', null, 530],
        'cookieDomain' => [parent::class, 'cookieDomain', null, 530],
        'cookieName' => [parent::class, 'cookieName', null, 530],
        'cookiePath' => [parent::class, 'cookiePath', null, 530],
        'cookieSameSite' => [parent::class, 'cookieSameSite', null, 530],
        'cookieSecure' => [parent::class, 'cookieSecure', null, 530],
        'trustedTokenLifetime' => [parent::class, 'trustedTokenLifetime', null, 530],
        'trustedTokenStorage' => [parent::class, 'trustedTokenStorage', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('TrustedCookieResponseListenerGhost4e97e67', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedCookieResponseListenerGhost4e97e67', 'TrustedCookieResponseListenerGhost4e97e67', false);
}
