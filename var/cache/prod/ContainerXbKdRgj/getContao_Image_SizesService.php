<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Image_SizesService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'contao.image.sizes' shared service.
     *
     * @return \Contao\CoreBundle\Image\ImageSizes
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Image/ImageSizes.php';

        return $container->services['contao.image.sizes'] = new \Contao\CoreBundle\Image\ImageSizes(($container->services['doctrine.dbal.default_connection'] ?? self::getDoctrine_Dbal_DefaultConnectionService($container)), ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container)), ($container->services['translator'] ?? self::getTranslatorService($container)));
    }
}
