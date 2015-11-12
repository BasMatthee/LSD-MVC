<?php

namespace Skeleton\System;

/**
 * Class Template
 */
class Template
{
    /** @type Registry */
    private $registry;
    /** @type ServiceContainer */
    private $services;

    /**
     * @param Registry $registry
     * @constructor.
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;

        $this->services = $this->registry->services;

        $this->configuration = $this->services->get('system.configuration_container');
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