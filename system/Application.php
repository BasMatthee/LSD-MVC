<?php

namespace Skeleton\System;

use Skeleton\System\Containers\ConfigurationContainer;
use Skeleton\System\Containers\ServiceContainer;

/**
 * Class Application
 */
abstract class Application
{
    /** @type Registry */
    private $registry;
    /** @type array */
    private $data = array();
    /** @type \mysqli */
    public $db;
    /** @type ServiceContainer */
    protected $services;
    /** @type ConfigurationContainer */
    protected $configuration;

    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {
        $this->db = $registry->db;

        unset($registry->vars['route']);
        unset($registry->vars['db']);

        $this->registry = $registry;
        $this->services = $this->registry->services;

        $this->registry->data = array();

        $this->configuration = $this->services->get('system.configuration_container');
    }

    /**
     * @param string $view
     * @param array $data
     * @return void
     */
    public function view($view, $data = array())
    {
        $this->registry->data = array_merge($this->registry->data, $data);
        $this->registry->template->show($view);
    }

    /**
     * @param string $location
     * @param bool $external
     */
    public function redirect($location, $external = false)
    {
        if ($external) {
            header('Location: ' . $location);
            exit;
        } else {
            header('Location: ' . $this->configuration->get('home_url'), $location);
            exit;
        }
    }

    /**
     * @return string
     */
    public abstract function index();
}