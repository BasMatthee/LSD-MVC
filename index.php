<?

session_start();

ob_start('ob_gzhandler');

// Root path defined
define('ROOT_PATH',dirname(__FILE__));

// Include configs
require_once ROOT_PATH.'/config/conf.core.php';
require_once ROOT_PATH.'/config/conf.db.php';
require_once ROOT_PATH.'/config/conf.autoload.php';

// Error reporting (Set mode in core config)
if ($config['mode'] == 'development') {
    
    // On
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    
} elseif ($config['mode'] == 'production') {
    
    // Off
    error_reporting(0);
    ini_set('display_errors',0);
    
}

// Include database
require_once ROOT_PATH.'/core/inc.db.php';

// Include system files
require_once ROOT_PATH.'/system/sys.router.php';
require_once ROOT_PATH.'/system/sys.application.php';
require_once ROOT_PATH.'/system/sys.register.php';
require_once ROOT_PATH.'/system/sys.template.php';
require_once ROOT_PATH.'/system/sys.model.php';

// Include the core helper
require_once ROOT_PATH.'/helper/core_helper.php';

// Prepare register
$register           = new Register();
$register->config   = $config;
$register->autoload = $autoload;
$register->db       = $db;
$register->template = new Template($register);

// Start application
$register->router   = new Router($register);

// Render application
$register->router->render();