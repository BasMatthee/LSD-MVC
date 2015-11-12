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
 *
 * @type array $config
 */
$classes = array(
    'application.services.alert.class' => 'Skeleton\Application\Alert\AlertService',
    'application.helpers.assets.class' => 'Skeleton\Application\Asset\AssetHelper',
    'system.configuration_container.class' => 'Skeleton\System\Containers\ConfigurationContainer',
);

$services = array(
    'system.configuration_container' => array(
        'class' => 'system.configuration_container.class',
        'parameters' => array($config),
    ),
    'application.services.alert' => array(
        'class' => 'application.services.alert.class',
        'parameters' => array('%system.configuration_container%'),
    ),
    'application.helpers.assets' => array(
        'class' => 'application.helpers.assets.class',
        'parameters' => array('%system.configuration_container%'),
    ),
);