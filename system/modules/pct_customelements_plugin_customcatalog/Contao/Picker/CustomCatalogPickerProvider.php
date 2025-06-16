<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

namespace Contao\Picker;

use Contao\BackendUser;
use Contao\CoreBundle\Framework\FrameworkAwareInterface;
use Contao\CoreBundle\Framework\FrameworkAwareTrait;
use Contao\CoreBundle\Picker\AbstractPickerProvider;
use Contao\CoreBundle\Picker\DcaPickerProviderInterface;
use Contao\CoreBundle\Picker\PickerConfig;

/**
 * Provides the news picker.
 *
 * @author Andreas Schempp <https://github.com/aschempp>
 */
class CustomCatalogPickerProvider extends AbstractPickerProvider implements DcaPickerProviderInterface, FrameworkAwareInterface
{
    use FrameworkAwareTrait;
    
    public $strTable = '';
    public $strName = '';
    public $strBackendModule = '';

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->strName;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsContext($context): bool
    {
        $user = BackendUser::getInstance();
        $objSecurity = \Contao\System::getContainer()->get('security.helper');
       return 'link' === $context && $objSecurity->isGranted('contao_user.pct_customcatalogsp.create');
    }

    /**
     * {@inheritdoc}
     */
    public function supportsValue(PickerConfig $config): bool
    {
        return false !== strpos($config->getValue(), '{{cc_url::'.$this->strTable);
    }

    /**
     * {@inheritdoc}
     */
    public function getDcaTable(PickerConfig|null $config = null): string
    {
        return $this->strTable;
    }

    /**
     * {@inheritdoc}
     */
    public function getDcaAttributes(PickerConfig|null $config = null): array
    {
        $attributes = ['fieldType' => 'radio'];

        if ($source = $config->getExtra('source')) 
        {
            $attributes['preserveRecord'] = $source;
        }

        if ($this->supportsValue($config)) 
        {
            $attributes['value'] = str_replace(['{{cc_url::'.$this->strTable.'::', '}}'], '', $config->getValue());
        }
        
        return $attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function convertDcaValue(PickerConfig $config, mixed $value): int|string
    {
        return '{{cc_url::'.$this->strTable.'::'.$value.'}}';
    }

    /**
     * {@inheritdoc}
     */
    protected function getRouteParameters(PickerConfig|null $config = null): array
    {
        $params = ['do' => $this->strBackendModule ];

        if (null === $config || !$config->getValue() || false === strpos($config->getValue(), '{{cc_url::'.$this->strTable)) 
        {
            return $params;
        }

        return $params;
    }
}
