<?php

namespace Symfony\Config\FosHttpCache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Invalidation'.\DIRECTORY_SEPARATOR.'RuleConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class InvalidationConfig 
{
    private $enabled;
    private $expressionLanguage;
    private $rules;
    private $_usedProperties = [];

    /**
     * Allows to disable the listener for invalidation. Enabled by default if the cache manager is configured. When disabled, the cache manager is no longer flushed automatically.
     * @default 'auto'
     * @param ParamConfigurator|true|false|'auto' $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * Service name of a custom ExpressionLanguage to use.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function expressionLanguage($value): static
    {
        $this->_usedProperties['expressionLanguage'] = true;
        $this->expressionLanguage = $value;

        return $this;
    }

    /**
     * Set what requests should invalidate which target routes.
    */
    public function rule(array $value = []): \Symfony\Config\FosHttpCache\Invalidation\RuleConfig
    {
        $this->_usedProperties['rules'] = true;

        return $this->rules[] = new \Symfony\Config\FosHttpCache\Invalidation\RuleConfig($value);
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('enabled', $value)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $value['enabled'];
            unset($value['enabled']);
        }

        if (array_key_exists('expression_language', $value)) {
            $this->_usedProperties['expressionLanguage'] = true;
            $this->expressionLanguage = $value['expression_language'];
            unset($value['expression_language']);
        }

        if (array_key_exists('rules', $value)) {
            $this->_usedProperties['rules'] = true;
            $this->rules = array_map(fn ($v) => new \Symfony\Config\FosHttpCache\Invalidation\RuleConfig($v), $value['rules']);
            unset($value['rules']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['expressionLanguage'])) {
            $output['expression_language'] = $this->expressionLanguage;
        }
        if (isset($this->_usedProperties['rules'])) {
            $output['rules'] = array_map(fn ($v) => $v->toArray(), $this->rules);
        }

        return $output;
    }

}
