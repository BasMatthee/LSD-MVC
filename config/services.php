<?php
/**
 * services.php
 *
 * @author Bas Matthee <basmatthee@gmail.com>
 * @copyright Copyright (c) 2015 LEVIY <https://www.leviy.com>
 */
$classes = array(
    'alert' => 'Application\Models\AlertModel',
    'test' => 'Application\Models\TestModel',
);

$services = array(
    'application.models.alert' => array(
        'class' => 'alert',
        'parameters' => array(),
    ),
    'application.models.test' => array(
        'class' => 'test',
        'parameters' => array(
            '%application.models.alert%',
            '12345',
        ),
    ),
);