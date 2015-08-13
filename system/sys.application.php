<?

abstract class Application {
    
    private $register;
    private $data = array();
    
    public function __construct($register) {
        
        $this->db = $register->db;
        
        // Cleanup
        unset($register->vars['route']);
        unset($register->vars['db']);
        
        $this->register       = $register;
        $this->register->data = array();
        
        // Autoload init
        $this->autoloader();
        
    }
    
    /**
     * @param string $view
     */
    public function view($view, $data = array()) {
        
        $this->register->data = array_merge($this->register->data, $data);
        
        $this->register->template->show($view);
        
    }
    
    public function init_model($model) {
        
        include_once ROOT_PATH.'/model/'.$model.'_model.php';
        
        $classname = ucfirst($model).'_model';
        
        $this->model->$model = new $classname;
        
        $this->register->template->model->$model = &$this->model->$model;
        
    }
    
    // Helper, library and model autoloader
    private function autoloader() {
        
        foreach ($this->register->autoload as $type => $loader) {
            
            foreach ($loader as $load) {
                
                include_once ROOT_PATH.'/'.$type.'/'.$load.'_'.$type.'.php';
                
                // Create instance if not a helper
                if ($type != 'helper') {
                    
                    $classname = ucfirst($load).'_'.$type;
                    
                    $this->$type->$load = new $classname;
                    
                    $this->register->template->$type->$load = &$this->$type->$load;
                    
                }
                
            }
            
        }
        
    }
    
    abstract function index();
    
}

class ApplicationAdmin extends Application {
    
    public function __construct($register) {
        
        parent::__construct($register);
        
        // Secure admin area
        if (!isset($_SESSION[get_config('sess')]['is_admin']) || $_SESSION[get_config('sess')]['is_admin'] == 0) {
            
            redirect('auth/login');
            
        }
        
    }
    
    public function index() {
        
        
        
    }
    
}

class ApplicationFront extends Application {
    
    public function __construct($register) {
        
        parent::__construct($register);
        
        // Secure admin area
        if (!isset($_SESSION[get_config('sess')]['user_id'])) {
            
            redirect('auth/login');
            
        }
        
    }
    
    public function index() {
        
        
        
    }
    
}