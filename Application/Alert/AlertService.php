<?php

namespace Skeleton\Application\Alert;

/**
 * Class AlertService
 */
class AlertService
{
    /** @type array */
    public $alerts = array();

    /**
     * @constructor
     */
    public function __construct()
    {
        if (isset($_SESSION[get_config('sess')]['alerts'])) {
            $this->alerts = $_SESSION[get_config('sess')]['alerts'];
        }
    }

    /**
     * @param string $alert
     * @param string $alert_type
     */
    public function add($alert, $alert_type = 'success')
    {
        $this->alerts[] = array(
            'alert' => $alert,
            'type' => $alert_type
        );

        $this->updateSession();
    }

    /**
     * @return string
     */
    public function getAll()
    {
        $output = '';

        foreach ($this->alerts as $alert) {
            $output .= '<div class="alert alert-' . $alert['type'] . '">' . $alert['alert'] . '</div>';
        }

        $this->alerts = array();
        $this->updateSession();

        return $output;
    }

    /**
     * @return void
     */
    public function updateSession()
    {
        $_SESSION[get_config('sess')]['alerts'] = $this->alerts;
    }
} 