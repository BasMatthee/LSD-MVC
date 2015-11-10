<?php

namespace Application\System;

/**
 * Class Registry
 *
 * @property array $config
 * @property array $data
 *
 * @property \mysqli $db
 *
 * @property Router $router
 * @property Template $template
 * @property ServiceContainer $services
 */
class Registry
{
    /** @type array */
    public $vars = array();

    /**
     * @param $index
     * @param $value
     */
    public function __set($index, $value)
    {
        $this->vars[$index] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->vars[$key];
    }

}