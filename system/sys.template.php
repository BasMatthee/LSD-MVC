<?

class Template {
    
    private $register;
    
    public function __construct($register) {
        
        $this->register = $register;
        
    }
    
    public function render_view() {
        
        
        
    }
    
    public function show($view) {
        
        foreach ($this->register->data as $key => $value) {
            
            $$key = $value;
            
        }
        
        include ROOT_PATH.'/view/'.$view.'.php';
        
    }
    
}