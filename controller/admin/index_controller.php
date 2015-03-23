<?

class index_controller extends ApplicationAdmin {
    
    public function __construct($register) {
        
        parent::__construct($register);
        
    }
    
    public function index() {
        
        redirect('admin/dashboard');
        
    }
    
}