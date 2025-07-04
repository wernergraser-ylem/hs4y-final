<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContao_Fragment_Contao_ContentElement_DownloadService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the public 'contao.fragment._contao.content_element.download' shared service.
     *
     * @return \Contao\CoreBundle\Controller\ContentElement\DownloadsController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Fragment/FragmentOptionsAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/AbstractFragmentController.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/ContentElement/AbstractContentElementController.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/ContentElement/AbstractDownloadContentElementController.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Controller/ContentElement/DownloadsController.php';

        $container->services['contao.fragment._contao.content_element.download'] = $instance = new \Contao\CoreBundle\Controller\ContentElement\DownloadsController(($container->services['security.helper'] ?? self::getSecurity_HelperService($container)), ($container->privates['contao.filesystem.virtual.files'] ?? $container->load('getContao_Filesystem_Virtual_FilesService')));

        $a = $container->load('get_ServiceLocator_Qz8CPql_Contao_Fragment_Contao_ContentElement_DownloadService');

        $instance->setContainer($a);
        $instance->setFragmentOptions(['type' => 'download', 'category' => 'files', 'template' => 'content_element/download', 'method' => NULL, 'renderer' => NULL, 'nestedFragments' => false, 'priority' => 0, 'debugController' => 'Contao\\CoreBundle\\Controller\\ContentElement\\DownloadsController']);
        $instance->setContainer($a);

        return $instance;
    }
}
