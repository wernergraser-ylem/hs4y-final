<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCompileFormFieldsListenerService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'Terminal42\MultipageFormsBundle\EventListener\CompileFormFieldsListener' shared service.
     *
     * @return \Terminal42\MultipageFormsBundle\EventListener\CompileFormFieldsListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/terminal42/contao-mp_forms/src/EventListener/CompileFormFieldsListener.php';

        return $container->services['Terminal42\\MultipageFormsBundle\\EventListener\\CompileFormFieldsListener'] = new \Terminal42\MultipageFormsBundle\EventListener\CompileFormFieldsListener(($container->services['Terminal42\\MultipageFormsBundle\\FormManagerFactory'] ?? $container->load('getFormManagerFactoryService')), ($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()));
    }
}
