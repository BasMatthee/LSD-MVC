<?php
namespace Skeleton\System;

/**
 * Class ApplicationFront
 */
class ApplicationFront extends Application
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
     * @return mixed
     */
    public function index()
    {
    }
}