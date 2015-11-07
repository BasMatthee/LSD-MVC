<?php

/**
 * Class index_controller
 */
class index_controller extends ApplicationFront
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
        $this->view('index/home');
    }
}