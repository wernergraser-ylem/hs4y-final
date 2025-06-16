<?php

namespace Symfony\Config\FosHttpCache\UserContext;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MatchConfig 
{
    private $matcherService;
    private $accept;
    private $method;
    private $_usedProperties = [];

    /**
     * Service id of a request matcher that tells whether the request is a context hash request.
     * @default 'fos_http_cache.user_context.request_matcher'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function matcherService($value): static
    {
        $this->_usedProperties['matcherService'] = true;
        $this->matcherService = $value;

        return $this;
    }

    /**
     * Specify the accept HTTP header used for context hash requests.
     * @default 'application/vnd.fos.user-context-hash'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function accept($value): static
    {
        $this->_usedProperties['accept'] = true;
        $this->accept = $value;

        return $this;
    }

    /**
     * Specify the HTTP method used for context hash requests.
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function method($value): static
    {
        $this->_usedProperties['method'] = true;
        $this->method = $value;

        return $this;
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('matcher_service', $value)) {
            $this->_usedProperties['matcherService'] = true;
            $this->matcherService = $value['matcher_service'];
            unset($value['matcher_service']);
        }

        if (array_key_exists('accept', $value)) {
            $this->_usedProperties['accept'] = true;
            $this->accept = $value['accept'];
            unset($value['accept']);
        }

        if (array_key_exists('method', $value)) {
            $this->_usedProperties['method'] = true;
            $this->method = $value['method'];
            unset($value['method']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['matcherService'])) {
            $output['matcher_service'] = $this->matcherService;
        }
        if (isset($this->_usedProperties['accept'])) {
            $output['accept'] = $this->accept;
        }
        if (isset($this->_usedProperties['method'])) {
            $output['method'] = $this->method;
        }

        return $output;
    }

}
