<?php
/**
 * services.php
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 Bas Matthee <http://www.bas-matthee.nl>
 */
$classes = array(
    'application.services.alert.class' => 'Skeleton\Application\Alert\AlertService',
    'application.helpers.assets.class' => 'Skeleton\Application\Asset\AssetHelper',
);

$services = array(
    'application.services.alert' => array(
        'class' => 'application.services.alert.class',
        'parameters' => array(),
    ),
    'application.helpers.assets' => array(
        'class' => 'application.helpers.assets.class',
        'parameters' => array(get_config('home_url')),
    ),
);