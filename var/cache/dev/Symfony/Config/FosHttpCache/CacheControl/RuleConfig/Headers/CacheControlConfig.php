<?php

namespace Symfony\Config\FosHttpCache\CacheControl\RuleConfig\Headers;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CacheControlConfig 
{
    private $maxAge;
    private $sMaxage;
    private $private;
    private $public;
    private $mustRevalidate;
    private $proxyRevalidate;
    private $noTransform;
    private $noCache;
    private $noStore;
    private $staleIfError;
    private $staleWhileRevalidate;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxAge($value): static
    {
        $this->_usedProperties['maxAge'] = true;
        $this->maxAge = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function sMaxage($value): static
    {
        $this->_usedProperties['sMaxage'] = true;
        $this->sMaxage = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function private($value): static
    {
        $this->_usedProperties['private'] = true;
        $this->private = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function public($value): static
    {
        $this->_usedProperties['public'] = true;
        $this->public = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function mustRevalidate($value): static
    {
        $this->_usedProperties['mustRevalidate'] = true;
        $this->mustRevalidate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function proxyRevalidate($value): static
    {
        $this->_usedProperties['proxyRevalidate'] = true;
        $this->proxyRevalidate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function noTransform($value): static
    {
        $this->_usedProperties['noTransform'] = true;
        $this->noTransform = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function noCache($value): static
    {
        $this->_usedProperties['noCache'] = true;
        $this->noCache = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function noStore($value): static
    {
        $this->_usedProperties['noStore'] = true;
        $this->noStore = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function staleIfError($value): static
    {
        $this->_usedProperties['staleIfError'] = true;
        $this->staleIfError = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function staleWhileRevalidate($value): static
    {
        $this->_usedProperties['staleWhileRevalidate'] = true;
        $this->staleWhileRevalidate = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('max_age', $value)) {
            $this->_usedProperties['maxAge'] = true;
            $this->maxAge = $value['max_age'];
            unset($value['max_age']);
        }

        if (array_key_exists('s_maxage', $value)) {
            $this->_usedProperties['sMaxage'] = true;
            $this->sMaxage = $value['s_maxage'];
            unset($value['s_maxage']);
        }

        if (array_key_exists('private', $value)) {
            $this->_usedProperties['private'] = true;
            $this->private = $value['private'];
            unset($value['private']);
        }

        if (array_key_exists('public', $value)) {
            $this->_usedProperties['public'] = true;
            $this->public = $value['public'];
            unset($value['public']);
        }

        if (array_key_exists('must_revalidate', $value)) {
            $this->_usedProperties['mustRevalidate'] = true;
            $this->mustRevalidate = $value['must_revalidate'];
            unset($value['must_revalidate']);
        }

        if (array_key_exists('proxy_revalidate', $value)) {
            $this->_usedProperties['proxyRevalidate'] = true;
            $this->proxyRevalidate = $value['proxy_revalidate'];
            unset($value['proxy_revalidate']);
        }

        if (array_key_exists('no_transform', $value)) {
            $this->_usedProperties['noTransform'] = true;
            $this->noTransform = $value['no_transform'];
            unset($value['no_transform']);
        }

        if (array_key_exists('no_cache', $value)) {
            $this->_usedProperties['noCache'] = true;
            $this->noCache = $value['no_cache'];
            unset($value['no_cache']);
        }

        if (array_key_exists('no_store', $value)) {
            $this->_usedProperties['noStore'] = true;
            $this->noStore = $value['no_store'];
            unset($value['no_store']);
        }

        if (array_key_exists('stale_if_error', $value)) {
            $this->_usedProperties['staleIfError'] = true;
            $this->staleIfError = $value['stale_if_error'];
            unset($value['stale_if_error']);
        }

        if (array_key_exists('stale_while_revalidate', $value)) {
            $this->_usedProperties['staleWhileRevalidate'] = true;
            $this->staleWhileRevalidate = $value['stale_while_revalidate'];
            unset($value['stale_while_revalidate']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['maxAge'])) {
            $output['max_age'] = $this->maxAge;
        }
        if (isset($this->_usedProperties['sMaxage'])) {
            $output['s_maxage'] = $this->sMaxage;
        }
        if (isset($this->_usedProperties['private'])) {
            $output['private'] = $this->private;
        }
        if (isset($this->_usedProperties['public'])) {
            $output['public'] = $this->public;
        }
        if (isset($this->_usedProperties['mustRevalidate'])) {
            $output['must_revalidate'] = $this->mustRevalidate;
        }
        if (isset($this->_usedProperties['proxyRevalidate'])) {
            $output['proxy_revalidate'] = $this->proxyRevalidate;
        }
        if (isset($this->_usedProperties['noTransform'])) {
            $output['no_transform'] = $this->noTransform;
        }
        if (isset($this->_usedProperties['noCache'])) {
            $output['no_cache'] = $this->noCache;
        }
        if (isset($this->_usedProperties['noStore'])) {
            $output['no_store'] = $this->noStore;
        }
        if (isset($this->_usedProperties['staleIfError'])) {
            $output['stale_if_error'] = $this->staleIfError;
        }
        if (isset($this->_usedProperties['staleWhileRevalidate'])) {
            $output['stale_while_revalidate'] = $this->staleWhileRevalidate;
        }

        return $output;
    }

}
