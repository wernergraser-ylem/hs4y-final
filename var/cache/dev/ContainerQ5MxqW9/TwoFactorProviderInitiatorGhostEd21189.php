<?php

namespace ContainerQ5MxqW9;
include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Provider/TwoFactorProviderInitiator.php';

class TwoFactorProviderInitiatorGhostEd21189 extends \Scheb\TwoFactorBundle\Security\TwoFactor\Provider\TwoFactorProviderInitiator implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'providerRegistry' => [parent::class, 'providerRegistry', null, 530],
        "\0".parent::class."\0".'twoFactorProviderDecider' => [parent::class, 'twoFactorProviderDecider', null, 530],
        "\0".parent::class."\0".'twoFactorTokenFactory' => [parent::class, 'twoFactorTokenFactory', null, 530],
        'providerRegistry' => [parent::class, 'providerRegistry', null, 530],
        'twoFactorProviderDecider' => [parent::class, 'twoFactorProviderDecider', null, 530],
        'twoFactorTokenFactory' => [parent::class, 'twoFactorTokenFactory', null, 530],
    ];
}

// Help opcache.preload discover always-needed symbols
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('TwoFactorProviderInitiatorGhostEd21189', false)) {
    \class_alias(__NAMESPACE__.'\\TwoFactorProviderInitiatorGhostEd21189', 'TwoFactorProviderInitiatorGhostEd21189', false);
}
