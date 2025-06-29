<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Listener_DataContainer_LogoutPageRedirectService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'contao.listener.data_container.logout_page_redirect' shared service.
     *
     * @return \Contao\CoreBundle\EventListener\DataContainer\LogoutPageRedirectListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/EventListener/DataContainer/LogoutPageRedirectListener.php';

        return $container->services['contao.listener.data_container.logout_page_redirect'] = new \Contao\CoreBundle\EventListener\DataContainer\LogoutPageRedirectListener();
    }
}
