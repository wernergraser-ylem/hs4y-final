<?php

namespace ContainerQ5MxqW9;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getBackendPreviewSwitchControllerService extends Contao_ManagerBundle_HttpKernel_ContaoKernelDevDebugContainer
{
    /**
     * Gets the public 'Contao\CoreBundle\Controller\BackendPreviewSwitchController' shared service.
     *
     * @return \Contao\CoreBundle\Controller\BackendPreviewSwitchController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/BackendPreviewSwitchController.php';

        return $container->services['Contao\\CoreBundle\\Controller\\BackendPreviewSwitchController'] = new \Contao\CoreBundle\Controller\BackendPreviewSwitchController(($container->services['contao.security.frontend_preview_authenticator'] ?? $container->load('getContao_Security_FrontendPreviewAuthenticatorService')), ($container->services['contao.security.token_checker'] ?? self::getContao_Security_TokenCheckerService($container)), ($container->services['doctrine.dbal.default_connection'] ?? self::getDoctrine_Dbal_DefaultConnectionService($container)), ($container->services['security.helper'] ?? self::getSecurity_HelperService($container)), ($container->services['twig'] ?? self::getTwigService($container)), ($container->services['router'] ?? self::getRouterService($container)), ($container->services['contao.csrf.token_manager'] ?? self::getContao_Csrf_TokenManagerService($container)), ($container->services['translator'] ?? self::getTranslatorService($container)), [], '');
    }
}
