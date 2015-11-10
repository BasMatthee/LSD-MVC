<?php

namespace Application\Controllers;

use Application\System\ApplicationFront;
use Application\System\Registry;

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

        /** @type \Application\Models\AlertModel $alertModel */
        $alertModel = $this->services->get('application.models.alert');

        /** @type \Application\Models\TestModel $testModel */
        $testModel = $this->services->get('application.models.test');
    }

    /**
     * @return void
     */
    public function index()
    {
        $this->view('index/home');
    }
}