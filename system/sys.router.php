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
        
        // Default
        $controller = 'index';
        
        // Default
        $action = 'index';
        
        // Admin path prefix
        $admin_prefix = '';
        
        $url_position = 0;
        
        if (isset($this->uri[$url_position])) {
            
            $controller = $this->uri[$url_position];
            
            if ($controller == get_config('admin_path')) {
                
                $admin_prefix = get_config('admin_path').'/';
                
                $url_position++;
                
                if (isset($this->uri[$url_position])) {
                    
                    $controller = $this->uri[$url_position];
                    
                } else {
                    
                    $controller = 'index';
                    
                }
                
            }
            
            if (isset($this->uri[($url_position+1)])) {
                
                $action = $this->uri[($url_position+1)];
                
            }
            
        }
        
        $controller_file = ROOT_PATH.'/controller/'.$admin_prefix.$controller.'_controller.php';
        
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
        if (method_exists($controller,$action)) {
            
            $controller->$action();
            
        } else {
            
            $controller->index();
            
        }
        
    }
    
}