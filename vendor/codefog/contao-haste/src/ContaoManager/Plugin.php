<?php

declare(strict_types=1);

namespace Codefog\HasteBundle\ContaoManager;

use Codefog\HasteBundle\CodefogHasteBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(CodefogHasteBundle::class)
                ->setReplace(['haste'])
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
