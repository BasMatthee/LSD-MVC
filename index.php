<?

// Root path defined
define('ROOT_PATH',dirname(__FILE__));

// Include configs
include ROOT_PATH.'/config/conf.core.php';
include ROOT_PATH.'/config/conf.db.php';
include ROOT_PATH.'/config/conf.autoload.php';

// Error reporting (Set mode in core config)
if ($config['mode'] == 'development') {
    
    // On
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    
} else {
    
    // Off
    error_reporting(0);
    ini_set('display_errors',0);
    
}

// Include database
include ROOT_PATH.'/core/inc.db.php';

// Include system files
include ROOT_PATH.'/system/sys.router.php';
include ROOT_PATH.'/system/sys.application.php';
include ROOT_PATH.'/system/sys.register.php';
include ROOT_PATH.'/system/sys.template.php';

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