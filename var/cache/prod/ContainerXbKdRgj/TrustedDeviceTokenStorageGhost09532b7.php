<?php

namespace ContainerXbKdRgj;

include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-trusted-device/Security/TwoFactor/Trusted/TrustedDeviceTokenStorage.php';
class TrustedDeviceTokenStorageGhost09532b7 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Trusted\TrustedDeviceTokenStorage implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'cookieName' => [parent::class, 'cookieName', null, 530],
        "\0".parent::class."\0".'requestStack' => [parent::class, 'requestStack', null, 530],
        "\0".parent::class."\0".'tokenGenerator' => [parent::class, 'tokenGenerator', null, 530],
        "\0".parent::class."\0".'trustedTokenList' => [parent::class, 'trustedTokenList', null, 16],
        "\0".parent::class."\0".'updateCookie' => [parent::class, 'updateCookie', null, 16],
        'cookieName' => [parent::class, 'cookieName', null, 530],
        'requestStack' => [parent::class, 'requestStack', null, 530],
        'tokenGenerator' => [parent::class, 'tokenGenerator', null, 530],
        'trustedTokenList' => [parent::class, 'trustedTokenList', null, 16],
        'updateCookie' => [parent::class, 'updateCookie', null, 16],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('TrustedDeviceTokenStorageGhost09532b7', false)) {
    \class_alias(__NAMESPACE__.'\\TrustedDeviceTokenStorageGhost09532b7', 'TrustedDeviceTokenStorageGhost09532b7', false);
}
