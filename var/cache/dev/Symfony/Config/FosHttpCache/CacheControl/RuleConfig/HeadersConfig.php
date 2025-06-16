<?php

namespace Symfony\Config\FosHttpCache\CacheControl\RuleConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Headers'.\DIRECTORY_SEPARATOR.'CacheControlConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HeadersConfig 
{
    private $overwrite;
    private $cacheControl;
    private $etag;
    private $lastModified;
    private $reverseProxyTtl;
    private $vary;
    private $_usedProperties = [];

    /**
     * Whether to overwrite cache headers for this rule, defaults to the cache_control.defaults.overwrite setting
     * @default 'default'
     * @param ParamConfigurator|'default'|true|false $value
     * @return $this
     */
    public function overwrite($value): static
    {
        $this->_usedProperties['overwrite'] = true;
        $this->overwrite = $value;

        return $this;
    }

    /**
     * Add the specified cache control directives.
    */
    public function cacheControl(array $value = []): \Symfony\Config\FosHttpCache\CacheControl\RuleConfig\Headers\CacheControlConfig
    {
        if (null === $this->cacheControl) {
            $this->_usedProperties['cacheControl'] = true;
            $this->cacheControl = new \Symfony\Config\FosHttpCache\CacheControl\RuleConfig\Headers\CacheControlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cacheControl()" has already been initialized. You cannot pass values the second time you call cacheControl().');
        }

        return $this->cacheControl;
    }

    /**
     * Set a simple ETag which is just the md5 hash of the response body. You can specify which type of ETag you want by passing "strong" or "weak".
     * @default false
     * @param ParamConfigurator|'weak'|'strong'|false $value
     * @return $this
     */
    public function etag($value): static
    {
        $this->_usedProperties['etag'] = true;
        $this->etag = $value;

        return $this;
    }

    /**
     * Set a default last modified timestamp if none is set yet. Value must be parseable by DateTime
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function lastModified($value): static
    {
        $this->_usedProperties['lastModified'] = true;
        $this->lastModified = $value;

        return $this;
    }

    /**
     * Specify an X-Reverse-Proxy-TTL header with a time in seconds for a caching proxy under your control.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function reverseProxyTtl($value): static
    {
        $this->_usedProperties['reverseProxyTtl'] = true;
        $this->reverseProxyTtl = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed>|string $value
     *
     * @return $this
     */
    public function vary(ParamConfigurator|string|array $value): static
    {
        $this->_usedProperties['vary'] = true;
        $this->vary = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('overwrite', $value)) {
            $this->_usedProperties['overwrite'] = true;
            $this->overwrite = $value['overwrite'];
            unset($value['overwrite']);
        }

        if (array_key_exists('cache_control', $value)) {
            $this->_usedProperties['cacheControl'] = true;
            $this->cacheControl = new \Symfony\Config\FosHttpCache\CacheControl\RuleConfig\Headers\CacheControlConfig($value['cache_control']);
            unset($value['cache_control']);
        }

        if (array_key_exists('etag', $value)) {
            $this->_usedProperties['etag'] = true;
            $this->etag = $value['etag'];
            unset($value['etag']);
        }

        if (array_key_exists('last_modified', $value)) {
            $this->_usedProperties['lastModified'] = true;
            $this->lastModified = $value['last_modified'];
            unset($value['last_modified']);
        }

        if (array_key_exists('reverse_proxy_ttl', $value)) {
            $this->_usedProperties['reverseProxyTtl'] = true;
            $this->reverseProxyTtl = $value['reverse_proxy_ttl'];
            unset($value['reverse_proxy_ttl']);
        }

        if (array_key_exists('vary', $value)) {
            $this->_usedProperties['vary'] = true;
            $this->vary = $value['vary'];
            unset($value['vary']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['overwrite'])) {
            $output['overwrite'] = $this->overwrite;
        }
        if (isset($this->_usedProperties['cacheControl'])) {
            $output['cache_control'] = $this->cacheControl->toArray();
        }
        if (isset($this->_usedProperties['etag'])) {
            $output['etag'] = $this->etag;
        }
        if (isset($this->_usedProperties['lastModified'])) {
            $output['last_modified'] = $this->lastModified;
        }
        if (isset($this->_usedProperties['reverseProxyTtl'])) {
            $output['reverse_proxy_ttl'] = $this->reverseProxyTtl;
        }
        if (isset($this->_usedProperties['vary'])) {
            $output['vary'] = $this->vary;
        }

        return $output;
    }

}
