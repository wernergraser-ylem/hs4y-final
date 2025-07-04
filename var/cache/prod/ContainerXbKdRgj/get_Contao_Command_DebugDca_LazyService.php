<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Contao_Command_DebugDca_LazyService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the private '.contao.command.debug_dca.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.contao.command.debug_dca.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('debug:dca', [], 'Dumps the DCA configuration for a table.', false, #[\Closure(name: 'contao.command.debug_dca', class: 'Contao\\CoreBundle\\Command\\DebugDcaCommand')] fn (): \Contao\CoreBundle\Command\DebugDcaCommand => ($container->privates['contao.command.debug_dca'] ?? $container->load('getContao_Command_DebugDcaService')));
    }
}
