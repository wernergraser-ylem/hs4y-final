<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Mailer_AvailableTransportsService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the public 'contao.mailer.available_transports' shared service.
     *
     * @return \Contao\CoreBundle\Mailer\AvailableTransports
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Mailer/AvailableTransports.php';

        return $container->services['contao.mailer.available_transports'] = new \Contao\CoreBundle\Mailer\AvailableTransports(($container->services['translator'] ?? self::getTranslatorService($container)));
    }
}
