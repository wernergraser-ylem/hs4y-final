<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFeedReaderControllerService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the public 'Contao\CoreBundle\Controller\FrontendModule\FeedReaderController' shared service.
     *
     * @return \Contao\CoreBundle\Controller\FrontendModule\FeedReaderController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Fragment/FragmentOptionsAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/AbstractFragmentController.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/FrontendModule/AbstractFrontendModuleController.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/FrontendModule/FeedReaderController.php';

        $container->services['Contao\\CoreBundle\\Controller\\FrontendModule\\FeedReaderController'] = $instance = new \Contao\CoreBundle\Controller\FrontendModule\FeedReaderController(($container->privates['contao.feed.feedio'] ?? $container->load('getContao_Feed_FeedioService')), ($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)), ($container->services['cache.system'] ?? self::getCache_SystemService($container)));

        $instance->setContainer(($container->privates['.service_locator.gSfX.Ym'] ?? $container->load('get_ServiceLocator_GSfX_YmService'))->withContext('Contao\\CoreBundle\\Controller\\FrontendModule\\FeedReaderController', $container));

        return $instance;
    }
}
