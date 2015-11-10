<?php
namespace Application\System;

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

        if (!isset($_SESSION[get_config('sess')]['is_admin']) || $_SESSION[get_config('sess')]['is_admin'] == 0) {
            redirect('auth/login');
        }
    }

    /**
     * @return mixed
     */
    public function index()
    {
    }
}