<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Twig_FormatterRuntimeService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the private 'contao.twig.formatter_runtime' shared service.
     *
     * @return \Contao\CoreBundle\Twig\Runtime\FormatterRuntime
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/RuntimeExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Twig/Runtime/FormatterRuntime.php';

        return $container->privates['contao.twig.formatter_runtime'] = new \Contao\CoreBundle\Twig\Runtime\FormatterRuntime(($container->services['contao.framework'] ?? self::getContao_FrameworkService($container)));
    }
}
