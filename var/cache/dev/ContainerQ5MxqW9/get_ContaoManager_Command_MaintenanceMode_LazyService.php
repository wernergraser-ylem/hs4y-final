<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ContaoManager_Command_MaintenanceMode_LazyService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the private '.contao_manager.command.maintenance_mode.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.contao_manager.command.maintenance_mode.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('contao:maintenance-mode', [], 'Changes the state of the system maintenance mode.', false, #[\Closure(name: 'contao_manager.command.maintenance_mode', class: 'Contao\\ManagerBundle\\Command\\MaintenanceModeCommand')] fn (): \Contao\ManagerBundle\Command\MaintenanceModeCommand => ($container->privates['contao_manager.command.maintenance_mode'] ?? $container->load('getContaoManager_Command_MaintenanceModeService')));
    }
}
