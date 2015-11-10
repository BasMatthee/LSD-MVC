<?php

namespace Skeleton\System;

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
        $this->registry->data = array();

        $this->services = $registry->services;
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
     * @return string
     */
    public abstract function index();
}