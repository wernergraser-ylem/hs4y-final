<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SchebTwoFactor'.\DIRECTORY_SEPARATOR.'TrustedDeviceConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SchebTwoFactor'.\DIRECTORY_SEPARATOR.'BackupCodesConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SchebTwoFactorConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $persister;
    private $modelManagerName;
    private $securityTokens;
    private $ipWhitelist;
    private $ipWhitelistProvider;
    private $twoFactorTokenFactory;
    private $twoFactorProviderDecider;
    private $twoFactorCondition;
    private $codeReuseCache;
    private $codeReuseCacheDuration;
    private $codeReuseDefaultHandler;
    private $trustedDevice;
    private $backupCodes;
    private $_usedProperties = [];

    /**
     * @default 'scheb_two_factor.persister.doctrine'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function persister($value): static
    {
        $this->_usedProperties['persister'] = true;
        $this->persister = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function modelManagerName($value): static
    {
        $this->_usedProperties['modelManagerName'] = true;
        $this->modelManagerName = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function securityTokens(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['securityTokens'] = true;
        $this->securityTokens = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function ipWhitelist(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['ipWhitelist'] = true;
        $this->ipWhitelist = $value;

        return $this;
    }

    /**
     * @default 'scheb_two_factor.default_ip_whitelist_provider'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function ipWhitelistProvider($value): static
    {
        $this->_usedProperties['ipWhitelistProvider'] = true;
        $this->ipWhitelistProvider = $value;

        return $this;
    }

    /**
     * @default 'scheb_two_factor.default_token_factory'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function twoFactorTokenFactory($value): static
    {
        $this->_usedProperties['twoFactorTokenFactory'] = true;
        $this->twoFactorTokenFactory = $value;

        return $this;
    }

    /**
     * @default 'scheb_two_factor.default_provider_decider'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function twoFactorProviderDecider($value): static
    {
        $this->_usedProperties['twoFactorProviderDecider'] = true;
        $this->twoFactorProviderDecider = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function twoFactorCondition($value): static
    {
        $this->_usedProperties['twoFactorCondition'] = true;
        $this->twoFactorCondition = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function codeReuseCache($value): static
    {
        $this->_usedProperties['codeReuseCache'] = true;
        $this->codeReuseCache = $value;

        return $this;
    }

    /**
     * @default 60
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function codeReuseCacheDuration($value): static
    {
        $this->_usedProperties['codeReuseCacheDuration'] = true;
        $this->codeReuseCacheDuration = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function codeReuseDefaultHandler($value): static
    {
        $this->_usedProperties['codeReuseDefaultHandler'] = true;
        $this->codeReuseDefaultHandler = $value;

        return $this;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false,"manager":"scheb_two_factor.default_trusted_device_manager","lifetime":5184000,"extend_lifetime":false,"key":null,"cookie_name":"trusted_device","cookie_secure":"auto","cookie_domain":null,"cookie_path":"\/","cookie_same_site":"lax"}
     * @return \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig : static)
     */
    public function trustedDevice(array $value = []): \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['trustedDevice'] = true;
            $this->trustedDevice = $value;

            return $this;
        }

        if (!$this->trustedDevice instanceof \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig) {
            $this->_usedProperties['trustedDevice'] = true;
            $this->trustedDevice = new \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "trustedDevice()" has already been initialized. You cannot pass values the second time you call trustedDevice().');
        }

        return $this->trustedDevice;
    }

    /**
     * @template TValue
     * @param TValue $value
     * @default {"enabled":false,"manager":"scheb_two_factor.default_backup_code_manager"}
     * @return \Symfony\Config\SchebTwoFactor\BackupCodesConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\SchebTwoFactor\BackupCodesConfig : static)
     */
    public function backupCodes(array $value = []): \Symfony\Config\SchebTwoFactor\BackupCodesConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['backupCodes'] = true;
            $this->backupCodes = $value;

            return $this;
        }

        if (!$this->backupCodes instanceof \Symfony\Config\SchebTwoFactor\BackupCodesConfig) {
            $this->_usedProperties['backupCodes'] = true;
            $this->backupCodes = new \Symfony\Config\SchebTwoFactor\BackupCodesConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "backupCodes()" has already been initialized. You cannot pass values the second time you call backupCodes().');
        }

        return $this->backupCodes;
    }

    public function getExtensionAlias(): string
    {
        return 'scheb_two_factor';
    }

    public function __construct(array $value = [])
    {
        if (array_key_exists('persister', $value)) {
            $this->_usedProperties['persister'] = true;
            $this->persister = $value['persister'];
            unset($value['persister']);
        }

        if (array_key_exists('model_manager_name', $value)) {
            $this->_usedProperties['modelManagerName'] = true;
            $this->modelManagerName = $value['model_manager_name'];
            unset($value['model_manager_name']);
        }

        if (array_key_exists('security_tokens', $value)) {
            $this->_usedProperties['securityTokens'] = true;
            $this->securityTokens = $value['security_tokens'];
            unset($value['security_tokens']);
        }

        if (array_key_exists('ip_whitelist', $value)) {
            $this->_usedProperties['ipWhitelist'] = true;
            $this->ipWhitelist = $value['ip_whitelist'];
            unset($value['ip_whitelist']);
        }

        if (array_key_exists('ip_whitelist_provider', $value)) {
            $this->_usedProperties['ipWhitelistProvider'] = true;
            $this->ipWhitelistProvider = $value['ip_whitelist_provider'];
            unset($value['ip_whitelist_provider']);
        }

        if (array_key_exists('two_factor_token_factory', $value)) {
            $this->_usedProperties['twoFactorTokenFactory'] = true;
            $this->twoFactorTokenFactory = $value['two_factor_token_factory'];
            unset($value['two_factor_token_factory']);
        }

        if (array_key_exists('two_factor_provider_decider', $value)) {
            $this->_usedProperties['twoFactorProviderDecider'] = true;
            $this->twoFactorProviderDecider = $value['two_factor_provider_decider'];
            unset($value['two_factor_provider_decider']);
        }

        if (array_key_exists('two_factor_condition', $value)) {
            $this->_usedProperties['twoFactorCondition'] = true;
            $this->twoFactorCondition = $value['two_factor_condition'];
            unset($value['two_factor_condition']);
        }

        if (array_key_exists('code_reuse_cache', $value)) {
            $this->_usedProperties['codeReuseCache'] = true;
            $this->codeReuseCache = $value['code_reuse_cache'];
            unset($value['code_reuse_cache']);
        }

        if (array_key_exists('code_reuse_cache_duration', $value)) {
            $this->_usedProperties['codeReuseCacheDuration'] = true;
            $this->codeReuseCacheDuration = $value['code_reuse_cache_duration'];
            unset($value['code_reuse_cache_duration']);
        }

        if (array_key_exists('code_reuse_default_handler', $value)) {
            $this->_usedProperties['codeReuseDefaultHandler'] = true;
            $this->codeReuseDefaultHandler = $value['code_reuse_default_handler'];
            unset($value['code_reuse_default_handler']);
        }

        if (array_key_exists('trusted_device', $value)) {
            $this->_usedProperties['trustedDevice'] = true;
            $this->trustedDevice = \is_array($value['trusted_device']) ? new \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig($value['trusted_device']) : $value['trusted_device'];
            unset($value['trusted_device']);
        }

        if (array_key_exists('backup_codes', $value)) {
            $this->_usedProperties['backupCodes'] = true;
            $this->backupCodes = \is_array($value['backup_codes']) ? new \Symfony\Config\SchebTwoFactor\BackupCodesConfig($value['backup_codes']) : $value['backup_codes'];
            unset($value['backup_codes']);
        }

        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['persister'])) {
            $output['persister'] = $this->persister;
        }
        if (isset($this->_usedProperties['modelManagerName'])) {
            $output['model_manager_name'] = $this->modelManagerName;
        }
        if (isset($this->_usedProperties['securityTokens'])) {
            $output['security_tokens'] = $this->securityTokens;
        }
        if (isset($this->_usedProperties['ipWhitelist'])) {
            $output['ip_whitelist'] = $this->ipWhitelist;
        }
        if (isset($this->_usedProperties['ipWhitelistProvider'])) {
            $output['ip_whitelist_provider'] = $this->ipWhitelistProvider;
        }
        if (isset($this->_usedProperties['twoFactorTokenFactory'])) {
            $output['two_factor_token_factory'] = $this->twoFactorTokenFactory;
        }
        if (isset($this->_usedProperties['twoFactorProviderDecider'])) {
            $output['two_factor_provider_decider'] = $this->twoFactorProviderDecider;
        }
        if (isset($this->_usedProperties['twoFactorCondition'])) {
            $output['two_factor_condition'] = $this->twoFactorCondition;
        }
        if (isset($this->_usedProperties['codeReuseCache'])) {
            $output['code_reuse_cache'] = $this->codeReuseCache;
        }
        if (isset($this->_usedProperties['codeReuseCacheDuration'])) {
            $output['code_reuse_cache_duration'] = $this->codeReuseCacheDuration;
        }
        if (isset($this->_usedProperties['codeReuseDefaultHandler'])) {
            $output['code_reuse_default_handler'] = $this->codeReuseDefaultHandler;
        }
        if (isset($this->_usedProperties['trustedDevice'])) {
            $output['trusted_device'] = $this->trustedDevice instanceof \Symfony\Config\SchebTwoFactor\TrustedDeviceConfig ? $this->trustedDevice->toArray() : $this->trustedDevice;
        }
        if (isset($this->_usedProperties['backupCodes'])) {
            $output['backup_codes'] = $this->backupCodes instanceof \Symfony\Config\SchebTwoFactor\BackupCodesConfig ? $this->backupCodes->toArray() : $this->backupCodes;
        }

        return $output;
    }

}
