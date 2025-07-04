<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Command_CrawlService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the private 'contao.command.crawl' shared service.
     *
     * @return \Contao\CoreBundle\Command\CrawlCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Command/CrawlCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/filesystem/Filesystem.php';

        $container->privates['contao.command.crawl'] = $instance = new \Contao\CoreBundle\Command\CrawlCommand(($container->services['contao.crawl.escargot.factory'] ?? $container->load('getContao_Crawl_Escargot_FactoryService')), ($container->privates['filesystem'] ??= new \Symfony\Component\Filesystem\Filesystem()));

        $instance->setName('contao:crawl');
        $instance->setDescription('Crawls the Contao root pages with the desired subscribers.');

        return $instance;
    }
}
