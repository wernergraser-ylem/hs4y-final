<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Listener_UserProviderService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the private 'security.listener.user_provider' shared service.
     *
     * @return \Symfony\Component\Security\Http\EventListener\UserProviderListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/EventListener/UserProviderListener.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserProviderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/PasswordUpgraderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/ChainUserProvider.php';

        return $container->privates['security.listener.user_provider'] = new \Symfony\Component\Security\Http\EventListener\UserProviderListener(new \Symfony\Component\Security\Core\User\ChainUserProvider(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['contao.security.backend_user_provider'] ?? $container->load('getContao_Security_BackendUserProviderService'));
            yield 1 => ($container->privates['contao.security.frontend_user_provider'] ?? $container->load('getContao_Security_FrontendUserProviderService'));
        }, 2)));
    }
}
