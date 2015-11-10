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
    public function set_alert($alert, $alert_type = 'success')
    {
        $this->alerts[] = array(
            'alert' => $alert,
            'type' => $alert_type
        );

        $this->update_alerts();
    }

    /**
     * @return string
     */
    public function get_alerts()
    {
        $output = '';

        foreach ($this->alerts as $alert) {
            $output .= '<div class="alert alert-' . $alert['type'] . '">' . $alert['alert'] . '</div>';
        }

        $this->alerts = array();
        $this->update_alerts();

        return $output;
    }

    /**
     * @return void
     */
    public function update_alerts()
    {
        $_SESSION[get_config('sess')]['alerts'] = $this->alerts;
    }
} 