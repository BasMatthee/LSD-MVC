<?php

/**
 * @type array $config
 * @type array $autoload
 */

session_start();

ob_start('ob_gzhandler');

define('ROOT_PATH', dirname(__FILE__));

require_once ROOT_PATH . '/System/Autoloader.php';
spl_autoload_register('Skeleton\System\Autoloader::loader');

require_once ROOT_PATH . '/Config/configuration.php';
require_once ROOT_PATH . '/Config/database.php';
require_once ROOT_PATH . '/Config/services.php';

if ('development' === $config['mode']) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

require_once ROOT_PATH . '/Infrastructure/inc.db.php';
require_once ROOT_PATH . '/Helpers/core_helper.php';

$registry = new \Skeleton\System\Registry();
$registry->services = new \Skeleton\System\ServiceContainer($classes, $services);
$registry->config = $config;
$registry->db = $db;
$registry->template = new \Skeleton\System\Template($registry);

$registry->router = new \Skeleton\System\Router($registry);

$registry->router->render();