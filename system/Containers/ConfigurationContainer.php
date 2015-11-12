<?php
namespace Skeleton\System\Containers;

/**
 * ConfigurationContainer
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 LEVIY <https://www.leviy.com>
 * @package Skeleton\System
 */
class ConfigurationContainer
{
    /** @type array */
    private $configuration;

    /**
     * @param array $configuration
     * @constructor
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function get($key, $default = null)
    {
        return (isset($this->configuration[$key])) ? $this->configuration[$key] : $default;
    }
}