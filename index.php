<?php

/**
 * @type array $config
 * @type array $autoload
 */

session_start();

ob_start('ob_gzhandler');

define('ROOT_PATH', dirname(__FILE__));

require_once ROOT_PATH . '/config/conf.core.php';
require_once ROOT_PATH . '/config/conf.db.php';
require_once ROOT_PATH . '/config/conf.autoload.php';

if ('development' === $config['mode']) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

require_once ROOT_PATH . '/core/inc.db.php';

require_once ROOT_PATH . '/system/sys.router.php';
require_once ROOT_PATH . '/system/sys.application.php';
require_once ROOT_PATH . '/system/sys.registry.php';
require_once ROOT_PATH . '/system/sys.template.php';
require_once ROOT_PATH . '/system/sys.model.php';

require_once ROOT_PATH . '/helper/core_helper.php';

$registry = new Registry();
$registry->config = $config;
$registry->autoload = $autoload;
$registry->db = $db;
$registry->template = new Template($registry);

$registry->router = new Router($registry);

$registry->router->render();