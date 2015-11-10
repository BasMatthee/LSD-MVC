<?php
/**
 * services.php
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 LEVIY <https://www.leviy.com>
 */
$classes = array(
    'alert' => 'Skeleton\Application\Alert\AlertService',
);

$services = array(
    'application.services.alert' => array(
        'class' => 'alert',
        'parameters' => array(),
    ),
);