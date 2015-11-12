<?php

/**
 * @type array $config
 * @type array $autoload
 */

session_start();

ob_start('ob_gzhandler');

define('ROOT_PATH', dirname(__FILE__));

require_once ROOT_PATH . '/System/AutoLoader.php';
require_once ROOT_PATH . '/Config/configuration.php';
require_once ROOT_PATH . '/Config/database.php';
require_once ROOT_PATH . '/Config/services.php';

spl_autoload_register('Skeleton\System\Autoloader::loader');

if ('development' === $config['mode']) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

require_once ROOT_PATH . '/Infrastructure/inc.db.php';

$registry = new \Skeleton\System\Registry();

$registry->db = $db;
$registry->services = new \Skeleton\System\ServiceContainer($classes, $services);
$registry->template = new \Skeleton\System\Template($registry);
$registry->router = new \Skeleton\System\Router($registry);

$registry->router->render();