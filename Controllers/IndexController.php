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
    }

    /**
     * @return void
     */
    public function index()
    {
        /** @type \Skeleton\Application\Alert\AlertService $alertService */
        $alertService = $this->services->get('application.services.alert');

        $alertService->add('This is a positive alert.', 'success');
        $alertService->add('This is an informative alert.', 'info');
        $alertService->add('This is a warning.', 'warning');
        $alertService->add('This is an error!', 'danger');

        $this->view('index/home');
    }
}