<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Contao_Command_UserList_LazyService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the private '.contao.command.user_list.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.contao.command.user_list.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('contao:user:list', [], 'Lists Contao back end users.', false, #[\Closure(name: 'contao.command.user_list', class: 'Contao\\CoreBundle\\Command\\UserListCommand')] fn (): \Contao\CoreBundle\Command\UserListCommand => ($container->privates['contao.command.user_list'] ?? $container->load('getContao_Command_UserListService')));
    }
}
