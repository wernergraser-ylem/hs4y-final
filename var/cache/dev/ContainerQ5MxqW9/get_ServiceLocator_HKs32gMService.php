<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_HKs32gMService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.HKs32gM' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.HKs32gM'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'event_dispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
            'security.event_dispatcher.contao_backend' => ['privates', 'debug.security.event_dispatcher.contao_backend', 'getDebug_Security_EventDispatcher_ContaoBackendService', false],
            'security.event_dispatcher.contao_frontend' => ['privates', 'debug.security.event_dispatcher.contao_frontend', 'getDebug_Security_EventDispatcher_ContaoFrontendService', false],
        ], [
            'event_dispatcher' => '?',
            'security.event_dispatcher.contao_backend' => '?',
            'security.event_dispatcher.contao_frontend' => '?',
        ]);
    }
}
