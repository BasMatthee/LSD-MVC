<?php

namespace Skeleton\Application\Alert;

use Skeleton\System\Containers\ConfigurationContainer;

/**
 * Class AlertService
 */
class AlertService
{
    /** @type array */
    public $alerts = array();
    /** @type string */
    public $sessionName;

    /**
     * @param ConfigurationContainer $configuration
     * @constructor
     */
    public function __construct(ConfigurationContainer $configuration)
    {
        $this->sessionName = $configuration->get('session');

        if (isset($_SESSION[$this->sessionName]['alerts'])) {
            $this->alerts = $_SESSION[$this->sessionName]['alerts'];
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
        $_SESSION[$this->sessionName]['alerts'] = $this->alerts;
    }
} 