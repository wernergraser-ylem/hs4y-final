<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Listener_DataContainer_PageSearchService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'contao.listener.data_container.page_search' shared service.
     *
     * @return \Contao\CoreBundle\EventListener\DataContainer\PageSearchListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/EventListener/DataContainer/PageSearchListener.php';

        return $container->services['contao.listener.data_container.page_search'] = new \Contao\CoreBundle\EventListener\DataContainer\PageSearchListener(($container->services['contao.framework'] ?? self::getContao_FrameworkService($container)), ($container->services['doctrine.dbal.default_connection'] ?? self::getDoctrine_Dbal_DefaultConnectionService($container)));
    }
}
