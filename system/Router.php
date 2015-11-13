<?php
namespace Skeleton\System;

use Skeleton\System\Containers\ConfigurationContainer;

/**
 * Class Router
 */
class Router
{
    /** @type array */
    private $uri = array();
    /** @type Registry */
    private $registry;
    /** @type ConfigurationContainer */
    private $configuration;

    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {
        $this->registry = $registry;

        $this->configuration = $registry->services->get('system.configuration_container');

        if (isset($_GET['uri'])) {
            $this->uri = array_filter(
                explode('/', $_GET['uri'])
            );
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function render()
    {
        $controller = 'Index';
        $action = 'index';
        $urlPosition = 0;

        if (isset($this->uri[$urlPosition])) {
            $controller = $this->uri[$urlPosition];

            if (isset($this->uri[($urlPosition + 1)])) {
                $action = $this->uri[($urlPosition + 1)];
            }
        }

        $filename = ROOT_PATH . '/Controllers/' . $controller . 'Controller.php';

        if (false === file_exists($filename)) {
            throw new \Exception('Controller not found: ' . $filename);
        }

        require_once $filename;

        $className = $controller . 'Controller';

        $className = '\\Skeleton\\Controllers\\' . $className;

        $controller = new $className($this->registry);

        /** @type Application $controller */
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            if (false === method_exists($controller, 'index')) {
                throw new \Exception('Index action not found: ' . $filename);
            }

            $controller->index();
        }
    }
}