<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Migration_CommandCompilerService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the public 'contao.migration.command_compiler' shared service.
     *
     * @return \Contao\CoreBundle\Migration\CommandCompiler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Migration/CommandCompiler.php';

        return $container->services['contao.migration.command_compiler'] = new \Contao\CoreBundle\Migration\CommandCompiler(($container->services['doctrine.dbal.default_connection'] ?? self::getDoctrine_Dbal_DefaultConnectionService($container)), ($container->services['contao.doctrine.schema_provider'] ?? $container->load('getContao_Doctrine_SchemaProviderService')));
    }
}
