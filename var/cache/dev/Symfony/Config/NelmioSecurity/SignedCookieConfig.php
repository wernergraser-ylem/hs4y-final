<?php

namespace Symfony\Config\NelmioSecurity;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SignedCookieConfig 
{
    private $names;
    private $secret;
    private $hashAlgo;
    private $legacyHashAlgo;
    private $separator;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function names(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['names'] = true;
        $this->names = $value;

        return $this;
    }

    /**
     * @default '%kernel.secret%'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function secret($value): static
    {
        $this->_usedProperties['secret'] = true;
        $this->secret = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function hashAlgo($value): static
    {
        $this->_usedProperties['hashAlgo'] = true;
        $this->hashAlgo = $value;

        return $this;
    }

    /**
     * Fallback algorithm to allow for frictionless hash algorithm upgrades. Use with caution and as a temporary measure as it allows for downgrade attacks.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function legacyHashAlgo($value): static
    {
        $this->_usedProperties['legacyHashAlgo'] = true;
        $this->legacyHashAlgo = $value;

        return $this;
    }

    /**
     * @default '.'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function separator($value): static
    {
        $this->_usedProperties['separator'] = true;
        $this->separator = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('names', $value)) {
            $this->_usedProperties['names'] = true;
            $this->names = $value['names'];
            unset($value['names']);
        }

        if (array_key_exists('secret', $value)) {
            $this->_usedProperties['secret'] = true;
            $this->secret = $value['secret'];
            unset($value['secret']);
        }

        if (array_key_exists('hash_algo', $value)) {
            $this->_usedProperties['hashAlgo'] = true;
            $this->hashAlgo = $value['hash_algo'];
            unset($value['hash_algo']);
        }

        if (array_key_exists('legacy_hash_algo', $value)) {
            $this->_usedProperties['legacyHashAlgo'] = true;
            $this->legacyHashAlgo = $value['legacy_hash_algo'];
            unset($value['legacy_hash_algo']);
        }

        if (array_key_exists('separator', $value)) {
            $this->_usedProperties['separator'] = true;
            $this->separator = $value['separator'];
            unset($value['separator']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['names'])) {
            $output['names'] = $this->names;
        }
        if (isset($this->_usedProperties['secret'])) {
            $output['secret'] = $this->secret;
        }
        if (isset($this->_usedProperties['hashAlgo'])) {
            $output['hash_algo'] = $this->hashAlgo;
        }
        if (isset($this->_usedProperties['legacyHashAlgo'])) {
            $output['legacy_hash_algo'] = $this->legacyHashAlgo;
        }
        if (isset($this->_usedProperties['separator'])) {
            $output['separator'] = $this->separator;
        }

        return $output;
    }

}
