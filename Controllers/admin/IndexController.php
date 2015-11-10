<?php

namespace Skeleton\Controllers\Admin;

use Skeleton\System\ApplicationAdmin;
use Skeleton\System\Registry;

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