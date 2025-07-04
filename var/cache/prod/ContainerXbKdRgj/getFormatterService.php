<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFormatterService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'Codefog\HasteBundle\Formatter' shared autowired service.
     *
     * @return \Codefog\HasteBundle\Formatter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/codefog/contao-haste/src/Formatter.php';

        $a = ($container->services['doctrine.dbal.default_connection'] ?? self::getDoctrine_Dbal_DefaultConnectionService($container));

        if (isset($container->services['Codefog\\HasteBundle\\Formatter'])) {
            return $container->services['Codefog\\HasteBundle\\Formatter'];
        }

        return $container->services['Codefog\\HasteBundle\\Formatter'] = new \Codefog\HasteBundle\Formatter(($container->services['contao.framework'] ?? self::getContao_FrameworkService($container)), $a, ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()));
    }
}
