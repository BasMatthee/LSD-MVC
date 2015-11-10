<?php

namespace Application\Controllers\Admin;

use Application\System\ApplicationAdmin;
use Application\System\Registry;

/**
 * Class IndexController
 */
class IndexController extends ApplicationAdmin
{
    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {
        parent::__construct($registry);
    }

    /**
     * @return void
     */
    public function index()
    {
        redirect('admin/dashboard');
    }
}