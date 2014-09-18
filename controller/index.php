<?

class index_controller extends Application {
    
    public function __construct($register) { 
        
        parent::__construct($register);
        
    }
    
    public function index() {
        
        $this->view('index/home');
        
    }
    
}