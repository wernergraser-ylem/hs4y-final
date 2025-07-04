<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDcaAjaxOperationsListenerService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the public 'Codefog\HasteBundle\EventListener\DcaAjaxOperationsListener' shared autowired service.
     *
     * @return \Codefog\HasteBundle\EventListener\DcaAjaxOperationsListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/codefog/contao-haste/src/EventListener/DcaAjaxOperationsListener.php';

        return $container->services['Codefog\\HasteBundle\\EventListener\\DcaAjaxOperationsListener'] = new \Codefog\HasteBundle\EventListener\DcaAjaxOperationsListener(($container->services['doctrine.dbal.default_connection'] ?? self::getDoctrine_Dbal_DefaultConnectionService($container)), ($container->services['assets.packages'] ?? self::getAssets_PackagesService($container)), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), ($container->services['contao.routing.scope_matcher'] ?? self::getContao_Routing_ScopeMatcherService($container)), ($container->services['security.authorization_checker'] ?? self::getSecurity_AuthorizationCheckerService($container)), ($container->services['contao.csrf.token_manager'] ?? self::getContao_Csrf_TokenManagerService($container)));
    }
}
