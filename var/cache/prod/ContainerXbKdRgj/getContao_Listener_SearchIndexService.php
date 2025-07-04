<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Listener_SearchIndexService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the private 'contao.listener.search_index' shared service.
     *
     * @return \Contao\CoreBundle\EventListener\SearchIndexListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/EventListener/SearchIndexListener.php';

        $a = ($container->services['messenger.default_bus'] ?? $container->load('getMessenger_DefaultBusService'));

        if (isset($container->privates['contao.listener.search_index'])) {
            return $container->privates['contao.listener.search_index'];
        }

        return $container->privates['contao.listener.search_index'] = new \Contao\CoreBundle\EventListener\SearchIndexListener($a, '/_fragment', '/contao', 3);
    }
}
