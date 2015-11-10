<?php

namespace Skeleton\System;

/**
 * Class Template
 */
class Template
{
    /** @type Registry */
    private $registry;

    /**
     * @param Registry $registry
     * @constructor.
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;
        $this->services = $registry->services;
    }

    /**
     * @param string $view
     */
    public function show($view)
    {
        foreach ($this->registry->data as $key => $value) {
            $$key = $value;
        }

        include ROOT_PATH . '/Views/' . $view . '.php';
    }
}