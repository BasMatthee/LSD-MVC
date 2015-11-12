<?php
namespace Skeleton\System;

/**
 * Class ApplicationAdmin
 */
class ApplicationAdmin extends Application
{
    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {
        parent::__construct($registry);

        $session = $this->configuration->get('session');

        if (!isset($_SESSION[$session]['is_admin']) || $_SESSION[$session]['is_admin'] == 0) {
            $this->redirect('auth/login');
        }
    }

    /**
     * @return mixed
     */
    public function index()
    {
    }
}