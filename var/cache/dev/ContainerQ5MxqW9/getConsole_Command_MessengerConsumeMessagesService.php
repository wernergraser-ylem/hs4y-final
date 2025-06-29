<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_MessengerConsumeMessagesService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the private 'console.command.messenger_consume_messages' shared service.
     *
     * @return \Symfony\Component\Messenger\Command\ConsumeMessagesCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/SignalableCommandInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Command/ConsumeMessagesCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/EventListener/ResetServicesListener.php';

        $a = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->privates['console.command.messenger_consume_messages'])) {
            return $container->privates['console.command.messenger_consume_messages'];
        }

        $container->privates['console.command.messenger_consume_messages'] = $instance = new \Symfony\Component\Messenger\Command\ConsumeMessagesCommand(($container->privates['messenger.routable_message_bus'] ?? $container->load('getMessenger_RoutableMessageBusService')), ($container->privates['messenger.receiver_locator'] ?? $container->load('getMessenger_ReceiverLocatorService')), $a, ($container->privates['monolog.logger.messenger'] ?? $container->load('getMonolog_Logger_MessengerService')), ['contao_failure', 'contao_prio_high', 'contao_prio_normal', 'contao_prio_low'], new \Symfony\Component\Messenger\EventListener\ResetServicesListener(($container->services['services_resetter'] ?? $container->load('getServicesResetterService'))), ['messenger.bus.default'], NULL, NULL);

        $instance->setName('messenger:consume');
        $instance->setDescription('Consume messages');

        return $instance;
    }
}
