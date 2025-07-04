<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMonolog_Logger_ContaoService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'monolog.logger.contao' shared service.
     *
     * @return \Monolog\Logger
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->services['monolog.logger.contao'] = $instance = new \Monolog\Logger('contao');

        $instance->pushProcessor(($container->privates['contao.monolog.processor'] ?? self::getContao_Monolog_ProcessorService($container)));
        $instance->pushProcessor(($container->privates['contao_manager.monolog.request_processor'] ??= new \Contao\ManagerBundle\Monolog\RequestProcessor()));
        $instance->pushHandler(($container->privates['monolog.handler.console'] ?? self::getMonolog_Handler_ConsoleService($container)));
        $instance->pushHandler(($container->privates['monolog.handler.main'] ?? self::getMonolog_Handler_MainService($container)));
        $instance->pushHandler(($container->privates['contao.monolog.handler'] ?? self::getContao_Monolog_HandlerService($container)));

        return $instance;
    }
}
