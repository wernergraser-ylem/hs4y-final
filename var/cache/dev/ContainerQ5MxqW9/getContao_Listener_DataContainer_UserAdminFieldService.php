<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Listener_DataContainer_UserAdminFieldService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the public 'contao.listener.data_container.user_admin_field' shared service.
     *
     * @return \Contao\CoreBundle\EventListener\DataContainer\UserAdminFieldListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/EventListener/DataContainer/UserAdminFieldListener.php';

        return $container->services['contao.listener.data_container.user_admin_field'] = new \Contao\CoreBundle\EventListener\DataContainer\UserAdminFieldListener(($container->services['security.helper'] ?? self::getSecurity_HelperService($container)));
    }
}
