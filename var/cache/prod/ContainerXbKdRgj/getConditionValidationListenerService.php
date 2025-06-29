<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConditionValidationListenerService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'Terminal42\ConditionalformfieldsBundle\EventListener\ConditionValidationListener' shared autowired service.
     *
     * @return \Terminal42\ConditionalformfieldsBundle\EventListener\ConditionValidationListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/terminal42/contao-conditionalformfields/src/EventListener/ConditionValidationListener.php';

        return $container->services['Terminal42\\ConditionalformfieldsBundle\\EventListener\\ConditionValidationListener'] = new \Terminal42\ConditionalformfieldsBundle\EventListener\ConditionValidationListener(($container->services['doctrine.dbal.default_connection'] ?? self::getDoctrine_Dbal_DefaultConnectionService($container)), ($container->services['translator'] ?? self::getTranslatorService($container)));
    }
}
