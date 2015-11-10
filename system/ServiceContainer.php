<?php
namespace Application\System;

/**
 * ServiceContainer
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 LEVIY <https://www.leviy.com>
 * @package Application\System
 */
class ServiceContainer
{
    /** @type array */
    private $services;
    /** @type array */
    private $classConfiguration = array();
    /** @type array */
    private $serviceConfiguration = array();

    /**
     * @param array $classes
     * @param array $services
     * @constructor
     */
    public function __construct(array $classes, array $services)
    {
        $this->classConfiguration = $classes;
        $this->serviceConfiguration = $services;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        if (!isset($this->services[$key])) {
            $this->initialize($key);
        }

        return $this->services[$key];
    }

    /**
     * @param string $key
     */
    private function initialize($key)
    {
        $service = $this->serviceConfiguration[$key];
        $class = $this->classConfiguration[$service['class']];

        if (0 !== count($service['parameters'])) {
            $preparedParameters = array();
            foreach ($service['parameters'] as $parameter) {
                if (false !== strpos($parameter, '%')) {
                    $subKey = str_replace('%', '', $parameter);

                    $parameter = $this->get($subKey);
                }

                $preparedParameters[] = $parameter;
            }

            $reflection = new \ReflectionClass($class);
            $this->services[$key] = $reflection->newInstanceArgs($preparedParameters);
        } else {
            $this->services[$key] = new $class;
        }
    }
}