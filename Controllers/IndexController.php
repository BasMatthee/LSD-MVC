<?php

namespace Skeleton\Controllers;

use Skeleton\System\ApplicationFront;
use Skeleton\System\Registry;

/**
 * Class IndexController
 */
class IndexController extends ApplicationFront
{
    /**
     * @param Registry $registry
     * @constructor
     */
    public function __construct(Registry $registry)
    {
        parent::__construct($registry);

        /** @type \Skeleton\Application\Alert\AlertService $alertService */
        $alertService = $this->services->get('application.services.alert');
    }

    /**
     * @return void
     */
    public function index()
    {
        $this->view('index/home');
    }
}