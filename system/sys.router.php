<?

class Router {
    
    private $uri = array();
    private $register;
    
    public function __construct($register) {
        
        $this->register = $register;
        
        if (isset($_GET['uri'])) {
            
            // Extract URI
            $this->uri = explode('/',$_GET['uri']);
            $this->uri = array_filter($this->uri);
            
        }
        
    }
    
    public function render() {
        
        if (isset($this->uri[0])) {
            
            $controller = $this->uri[0];
            
        } else {
            
            // Default
            $controller = 'index';
            
        }
        
        if (isset($this->uri[1])) {
            
            $action = $this->uri[1];
            
        } else {
            
            // Default
            $action = 'index';
            
        }
        
        $controller_file = ROOT_PATH.'/controller/'.$controller.'.php';
        
        // Does controller really exist?
        if (file_exists($controller_file) === false) {
            
            throw new Exception('Controller not found: '. $controller_file);
            return false;
            
        }
        
        // Include controller
        include_once $controller_file;
        
        $classname = $controller.'_controller';
        
        $controller = new $classname($this->register);
        
        // Execute
        $controller->$action();
        
    }
    
}