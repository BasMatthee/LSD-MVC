<?php
/**
 * services.php
 *
 * This is where the services are defined. It is also possible to use defined
 * services as parameters. Once a service class has been instantiated, the same
 * object is served from that moment. Classes will be instantiated only once and
 * only if the service is used. Unused services will never be instantiated.
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