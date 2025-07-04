<?php

namespace ContainerXbKdRgj;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContaoFaq_Security_FaqCategoryAccessVoterService extends Contao_ManagerBundle_HttpKernel_ContaoKernelProdContainer
{
    /*
     * Gets the private 'contao_faq.security.faq_category_access_voter' shared service.
     *
     * @return \Contao\FaqBundle\Security\Voter\FaqCategoryAccessVoter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/contao/core-bundle/src/Security/Voter/DataContainer/AbstractDataContainerVoter.php';
        include_once \dirname(__DIR__, 4).'/vendor/contao/faq-bundle/src/Security/Voter/FaqCategoryAccessVoter.php';

        $a = ($container->privates['security.access.decision_manager'] ?? self::getSecurity_Access_DecisionManagerService($container));

        if (isset($container->privates['contao_faq.security.faq_category_access_voter'])) {
            return $container->privates['contao_faq.security.faq_category_access_voter'];
        }

        return $container->privates['contao_faq.security.faq_category_access_voter'] = new \Contao\FaqBundle\Security\Voter\FaqCategoryAccessVoter($a);
    }
}
